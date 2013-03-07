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
	<p><a class="ignore_external" href="<?=ANNOUNCEMENTS_MORE_URL?>">More Announcements</a></p>
</div>