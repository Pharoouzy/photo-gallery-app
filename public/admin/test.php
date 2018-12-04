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

	// $user = new User();
	// $user->username = "IRichey";
	// $user->password = "123";
	// $user->firstname = "Okoh";
	// $user->lastname = "Micheal";
	// $user->create();

	// $user = User::find_by_id(4);
	// $user->username = "RicheyPro";
	// $user->password = "1234";
	// $user->update();

	// $user = User::find_by_id(2);
	// $user->username = "RicheyPro";
	// $user->password = "12345";
	// $user->save();

	// $user = User::find_by_id(2);
	// $user->delete();
	// echo $user->firstname;

?>
	<main>
		<div style="padding: 20px;">
			<p>
				Welcome: <code><?php echo $loggedin_user->username; ?></code>
			</p>
		</div>
	</main>
	<?php include_layout_template('admin_footer'); ?>