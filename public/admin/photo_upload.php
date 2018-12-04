<?php 

	require_once('../../includes/initialize.php');
	$_SESSION['login'] = true;
	include_layout_template('admin_header');

	if (!$session->is_loggedin()) {
		redirect('login.php');
	}
	else{
		$user = User::find_by_id($session->user_id);
	}

	$max_file_size = 1048576; // expressed in byte
	// 10240 = 10KB
	// 102400 = 100KB
	// 1048576 = 1MB
	// 10485760 = 10MB
	if (isset($_POST['upload'])) { // Form has been sumbitted.
		$photo = new Photograph();
		$photo->caption = $_POST['caption'];
		$photo->attach_file($_FILES['file_upload']);

		if ($photo->save()) {
			// Success
			$session->message("Photograph uploaded successfully.");
			redirect('photos.php');
			$action = "Login Failed";
			$msg = "{$user->username} Uploaded a photo {{$photo->filename}}";
			log_action($action, $msg);
		}
		else{
			// Failure
			$message = join("<br>", $photo->errors);
		}
	}

?>
	<main>
		<div style="height: 40px;"></div>
		<div class="container">
			<form autocomplete="off" enctype="multipart/form-data" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" class="row">
				<input type="hidden" hidden name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>">
				<div class="col s12 l3 m12"></div>
				<div class="col s12 l6 m12 card-panel" style="padding: 50px;">
					<h5 class="center">Photo Upload</h5>
					<p class="center red-text"><?php echo message($message); ?></p>
					<!-- file input box -->
					<div class="row">
						<div class="file-field input-field col s12">
							<div class="btn">
						        <span>Choose Photo</span>
						        <input name="file_upload" type="file">
						    </div>
						    <div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						    </div>
						</div>
					</div>
					<!-- Caption input field -->
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">closed_caption</i>
							<input type="text" id="caption" name="caption" class="validate">
							<label for="caption">Caption</label>
						</div>
					</div>
					<div class="input-field row">
						<div class="col s12 l4"></div>
						<button class="col s12 l4 btn red" type="submit" name="upload">Upload</button>
						<div class="col s12 l4"></div>
					</div>
				</div>
				<div class="col s12 l3 m12"></div>
			</form>
		</div>
	</main>
<?php include_layout_template('admin_footer'); ?>