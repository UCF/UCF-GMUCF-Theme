<h2>Announcements</h1>

<?php
$announcements = get_announcement_details();

if( count( $announcements ) == 0 ) { ?>
	<p>No announcements found for today.</p>
<?php
} else {
	?>
	<ul>
	<?php
	foreach( $announcements as $announcement ) :
		extract( $announcement );
	?>
		<li>
			<a href="<?php echo $permalink; ?>">
				<?php echo $title;?>
			</a>
		</li>
	<?php
	endforeach;
	?>
	</ul>
	<?php
}
?>

<a href="<?php echo ANNOUNCEMENTS_MORE_URL; ?>">
	More Announcements
</a>
