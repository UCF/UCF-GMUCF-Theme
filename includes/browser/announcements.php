<ul id="announcements">
	<?
	foreach(get_announcement_details() as $announcement) { 
		extract($announcement);
	?>
		<li>
			<a href="<?=$permalink?>">
				<?=$title?>
			</a>
		</li>
<?	} ?>
</ul>