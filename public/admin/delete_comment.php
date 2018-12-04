<?php 

	require_once('../../includes/initialize.php');
	if (!$session->is_loggedin()) {
		redirect('login.php');
	}
	// must have an ID
	if (empty($_GET['id'])) {
		$session->message("No comment ID was provided.");
		redirect("photos.php?id={$comment->photograph_id}");
	}

	$comment = Comment::find_by_id($_GET['id']);
	if ($comment && $comment->delete()) {
		$session->message("The comment was deleted.");
		redirect("photos.php");
	}
	else{
		$session->message("The comment could not be deleted.");
		redirect("photos.php");
	}

	if (isset($db)) {
		$db->close_connection();
	}

?>