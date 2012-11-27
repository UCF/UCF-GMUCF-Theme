<div id="announcements">
	<h2>UCF Announcements</h2>
	<ul>
		<?
		foreach(get_announcement_details() as $announcement) { 
			extract($announcement);
		?>
			<li>
				<a href="<?=$permalink?>" class="ignore-external">
					<?=$title?>
				</a>
			</li>
	<?	} ?>
	</ul>
</div>