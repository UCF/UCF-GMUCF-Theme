<div id="announcements">
	<h2>UCF Announcements</h2>
	<ul>
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
</div>