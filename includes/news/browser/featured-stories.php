
<?
$count = 0;
foreach(get_featured_stories_details() as $details) {
	extract($details);
	if($count == 2) break;
	?>
	<div class="featured-story">
		<img src="<?=$thumbnail_src?>" />
		<div class="content">
			<h3><?=$title?></h3>
			<p><?=$description?></p>
		</div>
	</div>
	<?
	$count++;
}
?>