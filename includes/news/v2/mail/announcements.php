<h2>Announcements</h1>

<ul>
<?php
foreach(get_announcement_details() as $announcement) :
	extract($announcement);
?>
	<li>
		<a href="<?=$permalink?>">
			<?=$title?>
		</a>
	</li>
<?php endforeach; ?>
</ul>

<a href="<?=ANNOUNCEMENTS_MORE_URL?>">
	More Announcements
</a>
