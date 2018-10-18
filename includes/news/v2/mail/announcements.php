<h2>Announcements</h1>

<ul>
<?php
$announcements = get_announcement_details();

if(count($announcements) == 0) { ?>
	<p>No announcements found for today.</p>
<?php
} else {
	foreach($announcements as $announcement) :
		extract($announcement);
	?>
		<li>
			<a href="<?=$permalink?>">
				<?=$title?>
			</a>
		</li>
	<?php
	endforeach;
}
?>
</ul>

<a href="<?php echo ANNOUNCEMENTS_MORE_URL; ?>">
	More Announcements
</a>
