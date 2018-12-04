<?php 

	require_once('../includes/initialize.php');
	include_layout_template('header');
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

	if (isset($_POST['submit'])) {
		$author = trim($_POST['author']);
		$body = trim($_POST['body']);

		$new_comment = Comment::make($photo->id, $author, $body);
		if ($new_comment && $new_comment->save()) {
			// comment saved
			// NO message needed; seeing the comment is proof enough.
			// Important! You could just let the page render from here.
			// But then if the page is reloaded, the form will try
			// to resubmit the comment. So reditect instead:
			redirect("photo.php?id=".$photo->id);
		}
		else{
			// Failed
			$message = "There was an error that prevented the comment from being saved.";
		}
	}
	else {
		$author = '';
		$body = '';
	}

	$comments = $photo->comments();//Comment::find_comments_on($photo->id);


?>
	<main>
		<div style="height: 30px;"></div>
		<div class="container">
			<table class="table-responsive striped">
				<div class="row">
					<div class="col s12 l1 m7"></div>
					<div class="col s12 l10 m7"><img class="center materialboxed responsive-img" src="<?php echo $photo->image_path(); ?>"></div>
					<div class="col s12 l1 m7"></div>
				</div>
				<tr>
					<td>Photo Name: <?php echo $photo->filename; ?></td>
					<td>Caption: <?php echo $photo->caption; ?></td>
				</tr>
				<tr>
					<td>Size: <?php echo $photo->size_as_text(); ?></td>
					<td>Photo Type: <?php echo $photo->type; ?></td>
				</tr>
				</div>
			</table>
			<div id='comment' class="row">
				<div class="col s12 l8">
					<h5>Comments</h5>
					<ul class="collection">
						<?php foreach ($comments as $comment) { ?>
					    <li class="collection-item avatar">
					      <i class="material-icons circle">person</i>
					      <span class="title"><?php echo htmlentities($comment->author); ?> wrote:</span>
					      <p><?php echo strip_tags($comment->body, '<srtong><em><p>'); ?><br>
					      <strong class="grey-text"><small><i><?php echo datetime_to_text($comment->created); ?></i></small></strong>
					      </p>
					      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
					    </li>
						<?php } if(empty($comments)){ echo "No Comments"; } ?>
					</ul>
				</div>
			</div>
			<!-- list comment -->
			<div id="comment-form">
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
			</div>
		</div>
	</main>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.materialboxed').materialbox();
	});
</script>

<?php include_layout_template('footer'); ?>
