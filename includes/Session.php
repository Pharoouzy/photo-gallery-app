<?php 
	/**
	 * A class to help work with Sessions
	 * In our case, primarily to manage logging users in and out
	 *
	 * Keep in mind when working with Sessions that it is generally
	 * inadvisable to store DB-related Objects in Sessions
	 */
	class Session {

		private $loggedin = false;
		public $user_id;
		public $message;

		function __construct() {
			session_start();
			$this->check_message();
			$this->check_login();
			// if ($this->loggedin) {
			// 	// actions to take right away if user is logged in
			// }
			// else {
			// 	// actions to take right away if user is not logged in
			// }
		}

		public function is_loggedin(){
			return $this->loggedin;
		}

		public function login($user){
			// database should find user base on username or password
			if ($user) {
				$this->user_id = $_SESSION['user_id'] = $user->id;
				$this->loggedin = true;
			}
		}

		// public function getId(){
		// 	if (isset($_SESSION[])) {
		// 		# code...
		// 	}
		// }

		public function logout(){
			unset($_SESSION['user_id']);
			unset($this->user_id);
			$this->loggedin = false;
		}

		public function message($msg = ""){
			if (!empty($msg)) {
				// then this is "set message"
				// make sure you understand why $this->message=$msg wouldn't work
				$_SESSION['message'] = $msg;
			}
			else{
				// then this is "get message"
				return $this->message;
			}
		}

		private function check_login(){
			if (isset($_SESSION['user_id'])) {
				$this->user_id = $_SESSION['user_id'];
				$this->loggedin = true;
			}
			else{
				unset($this->user_id);
				$this->loggedin = false;
			}
		}

		private function check_message(){
			// Is there a message tored in the session
			if (isset($_SESSION['message'])) {
				// Add it as an attribute and erase the stored version
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);
			}
			else{
				$this->message = "";
			}
		}
	}

	$session = new Session();
	$message = $session->message();
?>