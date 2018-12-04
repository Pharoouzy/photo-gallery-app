<?php 
	// $login = false;
	require_once('../../includes/initialize.php');
	$_SESSION['login'] = true;
	if (!$session->is_loggedin()) {
		redirect('login.php');
	}
	else{
		$loggedin_user = User::find_by_id($session->user_id);
	}
	include_layout_template('admin_header');
?>
	<main>
		<div style="padding: 20px;">
			<?php echo message($message); ?>
			<p>
				Welcome: <code><?php echo $loggedin_user->username; ?></code>
				<!-- <marquee> -->
					<h1 class="card-panel center">There is <?php echo count(Photograph::getAllData()); ?> pictures in Gallery</h1>
				<!-- </marquee> -->
			</p>
		</div>
	</main>
	<?php include_layout_template('admin_footer'); ?>