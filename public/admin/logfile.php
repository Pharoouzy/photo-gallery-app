<?php 
	
	include '../../includes/initialize.php';
	$_SESSION['login'] = true;
	if (!$session->is_loggedin()) {
		redirect('index.php');
	}

	$logfile = SITE_ROOT.DS."logs".DS."logs.log";
	if (isset($_GET['clear']) && ($_GET['clear'] === 'true')) {
		file_put_contents($logfile, '');
		// Add the first log entry
		$datetime = date('Y-m-d H:i:s');
		$action = 'Logs Cleared';
		$message = "by User ID {$session->user_id}";
		$content = "[ {$datetime} ] | {$action}:- {$message}\r\n";
		log_action($action, $message);
		// redirect to this same page so that the URL won't
		// have "clear=true" anymore
		redirect('logfile.php');
	}
	include_layout_template('admin_header');

?>
	<main style="padding: 30px;">
		<a href="index.php" class="btn green">Back</a>
		<p>Log File</p>

		<a class="btn red" href="logfile.php?clear=true">Clear log file</a>
		<?php
			if (file_exists($logfile) && is_readable($logfile) && $handle = fopen($logfile, 'r')) {
				echo "<table class='table-responsive highlight container'>";
				while (!feof($handle)) {
					$entry = fgets($handle);
					if (trim($entry) != "") {
						echo "<tr><td>{$entry}</td></tr>";
					}
				}
				echo "</table>";
				fclose($handle);
			}
			else{
				echo "Could not read from {$logfile}";
			}
		?>
	</main>
<?php include_layout_template('admin_footer'); ?>

