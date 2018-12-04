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

	if (empty($_GET['id'])) {
		$session->message("No Photograph ID was provided.");
		redirect('index.php');
	}
	// find all photos
	$photo = Photograph::find_by_id($_GET['id']);
	if (!$photo) {
		$session->message("The photo could not be located.");
		redirect('index.php');
	}

	$comments = $photo->comments();


?>
	<main>
		<div style="height: 30px;"></div>
		<div class="container">
			<div id='comment' class="row">
				<div class="col s12 l12 m12">
					<h5>Comments on <?php echo $photo->filename; ?></h5>
					<ul class="collection">
						<?php foreach ($comments as $comment) { ?>
					    <li class="collection-item avatar">
					      	<i class="material-icons circle">person</i>
					      	<span class="title"><?php echo htmlentities($comment->author); ?> wrote:</span>
					      	<p>
					      	<?php echo strip_tags($comment->body, '<srtong><em><p>'); ?><br>
					      	<strong class="grey-text"><small><i><?php echo datetime_to_text($comment->created); ?></i></small></strong>
					      	</p>
					     	<div class="">
							<a onclick="return confirm('Are you sure you want to delete comment?');" class="secondary-content" href="delete_comment.php?id=<?php echo $comment->id; ?>"><i class="material-icons">delete</i></a>
						</div>
						<?php } if(empty($comments)){ echo "No Comments"; } ?>
					</ul>
				</div>
			</div>
			<!-- list comment -->
			<!-- <div id="comment-form">
				<h3>New Commnent</h3>
				<form method="POST" action="photo.php?id=<?php echo $photo->id; ?>">
					<div class="row">
				        <div class="input-field col s6">
				          	<i class="material-icons prefix">account_circle</i>
				          	<input name="author" id="author" type="text" class="validate" value="<?php echo $author; ?>">
				          	<label for="author">Author Name</label>
				        </div>
				    </div>
					<div class="row">
					    <div class="col s12">
					      <div class="row">
					        <div class="input-field col s6">
					          <i class="material-icons prefix">comment</i>
					          <textarea name="body" id="comment" class="materialize-textarea"><?php echo $body; ?></textarea>
					          <label for="comment">Comment</label>
					        </div>
					      </div>
					    </div>
					</div>
					<div class="row">
						<input type="submit" name="submit" value="Submit commnent" class="col s6 btn red">
					</div>
				</form>
			</div> -->
		</div>
	</main>
<?php include_layout_template('admin_footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.materialboxed').materialbox();
	});
</script>