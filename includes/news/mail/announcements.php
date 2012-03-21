<p style="font-size:22px;font-weight:100;display:block;">UCF Announcements</p>
<?
foreach(get_announcement_details() as $announcement) { 
	extract($announcement);
	?>
	<p style="padding-top:0;margin:0;">
		<a style="font-weight:100;color:#9d1a1a;font-size:16px;text-decoration:none;" href="<?=$permalink?>">
			<?=$title?>
		</a>
	</p>
	<br />
<?
}