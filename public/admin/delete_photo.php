<?php 

	require_once('../../includes/initialize.php');
	if (!$session->is_loggedin()) {
		redirect('login.php');
	}
	// must have an ID
	if (empty($_GET['id'])) {
		$session->message("No photograph ID was provided.");
		redirect('photos.php');
	}

	$photo = Photograph::find_by_id($_GET['id']);
	if ($photo && $photo->destroy()) {
		$session->message("The photo {$photo->filename} was deleted.");
		redirect("photos.php");
	}
	else{
		$session->message("The photo could not be deleted.");
		redirect("photos.php");
	}

	if (isset($db)) {
		$db->close_connection();
	}

?>