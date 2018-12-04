<?php

	/**
	 *  Photograph Class
	 *
	 */

	require_once(LIB_PATH.'Database.php');

	class Photograph extends DatabaseObject {

		protected static $table_name = 'photographs';
		protected static $db_fields = array('id', 'filename', 'type', 'size', 'caption');
		public $id;
		public $filename;
		public $type;
		public $size;
		public $caption;

		private $temp_path;
		protected $upload_dir = "assets/images";
		public $errors = array();

		protected $upload_errors = array(
			
			UPLOAD_ERR_OK => "No errors",
			UPLOAD_ERR_INI_SIZE => "Larger than upload_max_file_size",
			UPLOAD_ERR_FORM_SIZE => "Larger than MAX_FILE_SIZE",
			UPLOAD_ERR_PARTIAL	=> "Partial Upload",
			UPLOAD_ERR_NO_FILE => "No file",
			UPLOAD_ERR_NO_TMP_DIR => "No temp dir",
			UPLOAD_ERR_CANT_WRITE => "Can't write to disk",
			UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
		); 

		// Pass in $_FILE(['upload_file']) as an argument
		public function attach_file($file){
			// Perform error checking on the form parameters
			if (!$file || empty($file) || !is_array($file)) {
				// error: nothing uploaded or wrong argument usage
				$this->errors[] = "No file was uploaded.";
				return false;
			}
			else if ($file['error'] != 0) {
				// error: report what PHP says went wrong
				$this->errors[] = $this->upload_errors[$file['error']];
				return false;
			}
			else {
				// Set object attributes to the form parameters.
				$this->temp_path = $file['tmp_name'];
				$this->filename = basename($file['name']);
				$this->type = $file['type'];
				$this->size = $file['size'];
				// Don't worry about saving anything to the database yet
				return true;
			}
		}

		public function save_with_file(){

		}

		public function count_all(){
			return self::find_by_sql("SELECT COUNT(*) FROM ".self::$table_name);
		}

		// if we later use late static binding
		public function save(){
			// parent::save();
			// A new record won't have an id yet
			if(isset($this->id)){
				// Really just to update the caption
				$this->update();
			}
			else {
				// make sure there are no errors
				if (!empty($this->errors)) {
					return false;
				}

				// Make sure the caption is not too long for DB
				if (strlen($this->caption) > 255) {
					$this->errors[] = "The caption can only be 255 characters long.";
					return false;
				}

				// can't save without filename and temp location
				if (empty($this->filename) || empty($this->temp_path)) {
					$this->errors[] = "The file location was not available.";
					return false;
				}

				// Determin the target_path
				$target_path = SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->filename;

				// Make sure a file doesn't already exist in the target loaction
				if (file_exists($target_path)) {
				 	$this->errors[] = "The file {$this->filename} already exists.";
				 	return false;
				 } 

				// Attempt to move the file
				if (move_uploaded_file($this->temp_path, $target_path)) {
					// Success
					// save a corresponding entry to the database
					if($this->create()){
						// We are done with temp_path, the file isn't there anymore
						unset($this->temp_path);
						return true;
					}
				}
				else {
					// Failure
					$this->errors[] = "The file upload failed, possibly due to incorrect permission on the upload folder.";
				 	return false;
				}
			} 
		}

		public function destroy(){
			// First remove the database entry
			if ($this->delete()) {
				// then remove the file
				// Note that even though the database entry is gone, this object
				// is still around (which lets us use $this->image_path()).
				$target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
				return unlink($target_path) ? true : false;
			}
			else{
				// database delete failed
				return false;
			}
			
		}

		public function image_path(){
			return $this->upload_dir.DS.$this->filename;
		}

		public function size_as_text(){
			if ($this->size < 1024) {
				return "{$this->size} bytes";
			}
			else if ($this->size < 1048576) {
				$size_kb = round($this->size / 1024);
				return "{$size_kb} KB";
			}
			else{
				$size_mb = round($this->size / 1048576);
				return "{$size_mb} MB";
			}
		}

		public function comments(){
			return Comment::find_comments_on($this->id);
		}
		// Common Database Methods
		public static function getAllData(){
			return self::find_by_sql("SELECT * FROM ".self::$table_name);
		}

		public static function find_by_id($id = 0){
			global $db;
			$result = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id=".$db->escape_value($id)." LIMIT 1");

			return !empty($result) ? array_shift($result) : false;
		}

		public static function find_by_sql($sql=""){
			global $db;
			$result = $db->query($sql);
			$object_array = array();
			while ($row = $db->fetch_array($result)) {
				$object_array[] = self::instantiate($row);
			}

			return $object_array;

		}

		private static function instantiate($record){
			// Could check that $record exists and is an array
			// Simple, long-form approach:
			$object = new self;

		 	// More dynamic, short-form approach:
		 	// to check if the class has an attribute
		 	foreach ($record as $attribute => $value) {
		 		if ($object->has_attribute($attribute)) {
		 			$object->$attribute = $value;
		 		}
		 	}
		 	return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (including private ones!) as the keys and their current values as the value
			// $object_vars = get_object_vars($this);
			$object_vars = $this->attributes();
			// We don't care about the value, we just want to know if the key exists
			// Will return true or false
			return array_key_exists($attribute, $object_vars);
		}

		protected function attributes(){
			//return an array of attribute keys and their values
			$attributes = array();
			foreach (self::$db_fields as $field) {
				if (property_exists($this, $field)) {
					$attributes[$field] = $this->$field;//dynamic field
				}
			}
			return $attributes;
		}

		protected function sanitized_attributes(){
			global $db;
			$clean_attributes = array();
			// sanitie the values before submitting
			// note: does not alter the actual value of each attribute
			foreach ($this->attributes() as $key => $value) {
				$clean_attributes[$key] = $db->escape_value($value);
			}

			return $clean_attributes;
		}

		public function create(){
			global $db;
			// DOn't forget ur SQL syntax and good habits:
			// - INSERT INTO table (key, key) VALUES ('value', 'value')
			// - single-quotes around all values
			// - escape all values to prevent SQL injection
			$attributes = $this->attributes();
			$sql = "INSERT INTO ".self::$table_name." (".join(", ", array_keys($attributes)).") VALUES ('".join("', '", array_values($attributes))."')";
			// echo $sql."<br>";
			if ($db->query($sql)) {
				$this->id = $db->insert_id();
				return true;
			}
			else{
				return false;
			}
		}

		public function update(){
			global $db;
			// DOn't forget ur SQL syntax and good habits:
			// - UPDATE table SET key='value', key='value' WHERE condition
			// - single-quotes around all values
			// - escape all values to prevent SQL injection
			$attributes = $this->sanitized_attributes();
			$attributes_pairs = array();
			foreach ($attributes as $key => $value) {
				$attributes_pairs[] = "{$key}='{$value}'";
			}
			$sql = "UPDATE ".self::$table_name." SET ".join(", ", $attributes_pairs)." WHERE id='".$db->escape_value($this->id)."'";
			$db->query($sql);
			return ($db->affected_rows() == 1) ? true :false;
		}

		public function delete(){
			global $db;
			// DOn't forget ur SQL syntax and good habits:
			// - DELETE FROM table WHERE condition LIMIT 1
			// - single-quotes around all values
			// - escape all values to prevent SQL injection
			// use LIMIT 1
			$sql = "DELETE FROM ".self::$table_name." WHERE id='".$db->escape_value($this->id)."' LIMIT 1";
			$db->query($sql);
			return ($db->affected_rows() == 1) ? true :false;
		}
	}


?>