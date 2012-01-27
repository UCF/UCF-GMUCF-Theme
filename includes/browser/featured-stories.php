<ul id="featured_stories">
<?
foreach(get_featured_stories_details() as $details) {
	extract($details);
	?>
	<li>
		<img src="<?=$thumbnail_src?>" />
		<h3><?=$title?></h3>
		<p><?=$description?></p>
	</li>
	<?
}
?>
</ul>