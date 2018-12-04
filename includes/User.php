<?php

	/**
	 * If It's going to need the database, then it's 
	 *probably smart to require it before we start.
	 */

	require_once(LIB_PATH.'Database.php');

	class User extends DatabaseObject {

		protected static $table_name = 'users';
		protected static $db_fields = array('id', 'username', 'password', 'lastname', 'firstname');
		public $id;
		public $username;
		public $password;
		public $firstname;
		public $lastname;

		public static function authenticate($username, $password){
			global $db;
			$username = $db->escape_value($username);
			$password = $db->escape_value(md5($password));

			$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
			$result = self::find_by_sql($sql);
			return !empty($result) ? array_shift($result) : false;
		}

		public function fullname(){
			if (isset($this->firstname) && isset($this->lastname)) {
				return $this->firstname . " " . $this->lastname;
			}
			else{
				return "";
			}
		}

		// // common Database Methods

		public static function getAllData(){
			return self::find_by_sql("SELECT * FROM ".self::$table_name);
		}

		public static function find_by_id($id = 0){
			global $db;
			$result = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
			// $found = $db->fetch_array($result);
			// return $found;

			return !empty($result) ? array_shift($result) : false;
		}

		public static function find_by_sql($sql=""){
			global $db;
			$result = $db->query($sql);
			// if ($result) {
			// 	return $result;
			// }
			// else{
			// 	return "Failed";
			// }
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
			// $object->id = $record['id'];
		 	// 	$object->username = $record['username'];
		 	// 	$object->lastname = $record['lastname'];
		 	// 	$object->firstname = $record['firstname'];

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
			// $sql = "INSERT INTO ".self::$table_name." (username, password, firstname, lastname) VALUES ('".$db->escape_value($this->username)."', '".$db->escape_value(md5($this->password))."', '".$db->escape_value($this->firstname)."', '".$db->escape_value($this->lastname)."')";
			$sql = "INSERT INTO ".self::$table_name." (".join(", ", array_keys($attributes)).") VALUES ('".join("', '", array_values($attributes))."')";
			echo $sql."<br>";
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
			// $sql = "UPDATE ".self::$table_name." SET username='".$db->escape_value($this->username)."', password='".$db->escape_value(md5($this->password))."', firstname='".$db->escape_value($this->firstname)."', lastname='".$db->escape_value($this->lastname)."' WHERE id='".$db->escape_value($this->id)."'";
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