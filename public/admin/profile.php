<?php 

	require_once('../../includes/initialize.php');
	$_SESSION['login'] = true;
	include_layout_template('admin_header');

	if (!$session->is_loggedin()) {
		redirect('login.php');
	}
	else{
		$loggedin_user = User::find_by_id($session->user_id);
	}

?>
	<main>
		<div style="padding: 20px;">
			<p>
				Welcome: <code><?php echo $loggedin_user->username; ?></code>
			</p>
		</div>
	</main>
	<?php include_layout_template('admin_footer'); ?>