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
	// $photos = Photograph::getAllData();

	$pagination = new Pagination($page, $per_page, $total_count);
	// Instead of finding all records, just find the records
	// for this page
	$sql ="SELECT * FROM photographs LIMIT ". $per_page . " OFFSET ". $pagination->offset();
	$photos = Photograph::find_by_sql($sql);

	// Need to add ?page=$page to all links we want to
	// maintain the current page (or store $page in $session)

?>
	<main>
		<div style="height: 30px;"></div>
		<div class="container">
			<div class="row">
				<?php 
					foreach ($photos as $photo) :
				?>
				<div class="col s12 l3 m8">
					<img class="materialboxed responsigve-img" src="<?php echo $photo->image_path(); ?>" height="120" width="200">
					<a href="photo.php?id=<?php echo $photo->id; ?>"><?php echo $photo->caption; ?></a>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="row">
				<div class="col s12 l12 m12">
					<ul class="pagination">
					<?php 
						// echo $page;
						// echo $pagination->total_pages();
						if ($pagination->total_pages() >= 1) {
							if ($pagination->has_previous_page()) {
								
							}
							echo '<li class="waves-effect"><a href="index.php?page='.$pagination->previous_page().'"><i class="material-icons">chevron_left</i></a></li>';
							for($i=1; $i <= $pagination->total_pages(); $i++){
								if ($i == $page) {
									echo '<li class="active"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
								}
								else {
									echo '<li class=""><a href="index.php?page='.$i.'">'.$i.'</a></li>';
								}
								
							}
							echo '<li class="waves-effect"><a href="index.php?page='.$pagination->next_page().'"><i class="material-icons">chevron_right</i></a></li>';
							if ($pagination->has_next_page()) {
								
							}
						}
						else{
							echo "string";
						}
					?>
					    
					    <!-- <li class="active"><a href="#!">1</a></li>
					    <li class="waves-effect"><a href="#!">2</a></li>
					    <li class="waves-effect"><a href="#!">3</a></li>
					    <li class="waves-effect"><a href="#!">4</a></li>
					    <li class="waves-effect"><a href="#!">5</a></li> -->
					</ul>
				</div>
			</div>
		</div>
	</main>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.materialboxed').materialbox();
	});
</script>

<?php include_layout_template('footer'); ?>
