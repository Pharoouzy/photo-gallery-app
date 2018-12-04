<?php 

	function strip_zero_from_date($marked_str=''){
			// remove the marked zeros
		$no_zeros = str_replace('*0', '', $marked_str);
		// remove any remaining marks
		$cleaned_string = str_replace('*', '', $no_zeros);

		return $cleaned_string;
	}

	function redirect($location = NULL){
		if ($location != NULL) {
			header("Location: {$location}");
			exit();
		}
	}

	function message($message){
		return $message;
	}

	// auto register all classes
	spl_autoload_register(function($class_name){
		$class_name = $class_name;
		$filepath = realpath(dirname(__FILE__));
		$path = LIB_PATH."{$class_name}.php";
		if (file_exists($path)) {
			include_once($path);
		}
		else{
			die("Class {$class_name} could not be found.");
		}
	});

	function include_layout_template($template = ""){
		include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template.'.php');
	}

	// log message to logfile
	function log_action($action, $message=""){
		$filename = SITE_ROOT.DS.DS."logs".DS."logs.log";
		$new = file_exists($filename) ? false : true;
		if ($handle = fopen($filename, 'a')) {
			$datetime = date('Y-m-d H:i:s');
			$content = "[ {$datetime} ] | {$action}:- {$message}\r\n";
			fwrite($handle, $content);
			fclose($handle);
			if ($new) { chmod($filename, 0755); }
		}
		else {
			echo "Could not open log file for written.";

		}
	}

	function datetime_to_text($datetime = ""){
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
	}

?>