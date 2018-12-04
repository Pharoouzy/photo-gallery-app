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
	$photos = Photograph::getAllData();


?>
	<main>
		<div style="height: 30px;"></div>
		<div class="container">
			<?php echo message($message); ?>
			<table class="highlight table-responsive">
				<thead>
					<tr>
						<th>Image</th>
						<th>Filename</th>
						<th>Caption</th>
						<th>Size</th>
						<th>Type</th>
						<th>Comments</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($photos as $photo) :
				?>
				<tr>
					<td><img class="materialboxed responsdive-img" src="../<?php echo $photo->image_path(); ?>" width="100"></td>
					<td><?php echo $photo->filename; ?></td>
					<td><?php echo $photo->caption; ?></td>
					<td><?php echo $photo->size_as_text(); ?></td>
					<td><?php echo $photo->type; ?></td>
					<td>
						<a href="comments.php?id=<?php echo $photo->id; ?>"><?php echo count($photo->comments()); ?></a>
					</td>
					<td><a onclick="return confirm('Are you sure you want to delete photo?');" href="delete_photo.php?id=<?php echo $photo->id; ?>"><i class="material-icons">delete</i></a></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</main>
<?php include_layout_template('admin_footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.materialboxed').materialbox();
	});
</script>