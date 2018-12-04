<?php

	require_once(LIB_PATH.'Database.php');

	class Comment extends DatabaseObject {

		protected static $table_name = 'comments';
		protected static $db_fields = array('id', 'photograph_id', 'created', 'author', 'body');
		public $id;
		public $photograph_id;
		public $created;
		public $author;
		public $body;

		// make() for new comment
		public static function make($photo_id, $author="Anonymous", $body){
			if (!empty($photo_id) && !empty($body) && !empty($author)) {
				$comment = new Comment();
				$comment->photograph_id = (int)$photo_id;
				$comment->created = date("Y-m-d H:i:s", time());
				$comment->author = $author;
				$comment->body = $body;

				return $comment;
			}
			else{
				return false;
			}
		}

		public static function find_comments_on($photo_id=0){
			global $db;
			$sql = "SELECT * FROM ".self::$table_name." WHERE photograph_id = ".$db->escape_value($photo_id)." ORDER BY created DESC";

			return self::find_by_sql($sql);
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

		public function save(){
			// to check if the data is in d db
			// A new record won't have an id yet
			return isset($this->id) ? $this->update() : $this->create(); 
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
			$sql1 = "ALTER TABLE ".self::$table_name." AUTO_INCREMENT = 1";
			$db->query($sql);
			$db->query($sql1);
			return ($db->affected_rows() == 1) ? true :false;
		}
	}


?>