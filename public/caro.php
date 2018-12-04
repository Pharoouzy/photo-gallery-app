<?php 

	require_once('../includes/initialize.php');
	include_layout_template('header');
	// 1. the current page number ($current_page)
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

	// 2. records per page ($per_page)
	$per_page = 1;
	// 3. Total record count ($total_count)
	$total_count = Photograph::count_all();

	// find all photos
	// use pagination instead
	$photos = Photograph::getAllData();

	$pagination = new Pagination($page, $per_page, $total_count);
	// Instead of finding all records, just find the records
	// for this page
	$sql ="SELECT * FROM photographs LIMIT ". $per_page . " OFFSET ". $pagination->offset();
	// $photos = Photograph::find_by_sql($sql);

	// Need to add ?page=$page to all links we want to
	// maintain the current page (or store $page in $session)

?>
	<main>
		<div style="height: 30px;"></div>
		<div class="container">
			<div class="carousel">
				<?php 
					$i = 1;
					foreach ($photos as $photo) :
						++$i;
				?>
				<a class="carousel-item" href="#<?php echo $i; ?>"><img src="<?php echo $photo->image_path(); ?>"><?php echo $photo->caption; ?></a>
				<?php endforeach; ?>
			</div>
		</div>
		<br>
	</main>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.carousel').carousel();
	    $('.materialboxed').materialbox();
	});
</script>

<?php include_layout_template('footer'); ?>