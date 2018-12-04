<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/icon.css">
	<style type="text/css">
		body{
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}
		main{
			flex: 1 0 auto;
		}
	</style>
</head>
<body class="red lighten-5">
	<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	<header>
		<div class="navbar-fixed">
		    <nav class="grey">
		      <div class=" nav-wrapper container">
		        <a href="javascript:void(0)" class="brand-logo">Photo Gallery</a>
		        <ul class="right hide-on-med-and-down">
		        <?php
		        	if ($_SESSION['login']){
		        ?>
		          <li><a href="photos.php">Photo Gallery</a></li>
		          <li><a href="profile.php">Profile</a></li>
		          <li><a href="logfile.php">View Log File</a></li>
		          <li><a href="photo_upload.php">Upload Photo</a></li>
		          <li><a href="logout.php">Logout</a></li>
		      	<?php } ?>
		        </ul>
		      </div>
		    </nav>
	  	</div>
	</header>