<?php 

	require_once('../../includes/initialize.php');
		$_SESSION['login'] = true;
	if ($session->is_loggedin()) {
		redirect('index.php');
	}
	else{
		$_SESSION['login'] = false;
	}
	include_layout_template('admin_header');
	$message = "";
	// Remember to give your form's submit tag a name="submit attribute!"
	if (isset($_POST['submit'])) { // Form has been sumbitted.
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		// check database to see if username/password exist.
		$found_user = User::authenticate($username, $password);

		if ($found_user) {
			$session->login($found_user);
			$action = "Login";
			$message = "{$founder_user->username} Logged in";
			log_action($action, $message);
			redirect('index.php');
		}
		else{
			// username/password combo was not found in the database
			$action = "Login Failed";
			$message = "{$username} Unable to login with {{$password}}";
			log_action($action, $message);
			$message = "Username/password combination incorrect.";
			// echo "Username/password combination incorrect.";
		}
	}
	else{ // Form has not been submitted
		$username = '';
		$password = '';
	}
?>

	<main>
		<div style="height: 40px;"></div>
		<div class="container">
			<form autocomplete="off" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" class="row">
				<div class="col s12 l3 m12"></div>
				<div class="col s12 l6 m12 card-panel" style="padding: 50px;">
					<h5 class="center">Admin Login</h5>
					<p class="center red-text"><?php echo $message; ?></p>
					<!-- Username input box -->
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">person</i>
							<input type="text" id="username" name="username" class="validate" value="<?php echo htmlentities($username); ?>">
							<label for="username">Username</label>
						</div>
					</div>
					<!-- Password input field -->
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input type="password" id="password" name="password" class="validate" value="<?php echo htmlentities($password); ?>">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="input-field row">
						<div class="col s12 l4"></div>
						<button class="col s12 l4 btn red" type="submit" name="submit">Login</button>
						<div class="col s12 l4"></div>
					</div>
				</div>
				<div class="col s12 l3 m12"></div>
			</form>
		</div>
	</main>

<?php include_layout_template('admin_footer'); ?>