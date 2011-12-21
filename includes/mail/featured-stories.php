<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
<?
	foreach(get_featured_stories_details() as $details) {
		extract($details);
	?>
		<tr>
			<td style="vertical-align:top;padding-bottom:40px;">
				<a style="color:#333;text-decoration:none;" href="<?=$permalink?>">
					<img src="<?=$thumbnail_src?>" style="border:none;" />
				</a>
			</td>
			<td style="padding-left:20px;padding-bottom:40px;">
				<a style="font-size:16px;color:#333;text-decoration:none;font-weight:bold;" href="<?=$permalink?>"
					<span style="line-height:1.3em;">
						<?=$title?>
					</span>
					<p style="font-family:Georgia,serif;font-size:14px;margin:3px 0 0 0;font-weight:100;line-height:1.4em;">
						<?=$description?>
					</p>
				</a>
			</td>
		</tr>
		<?
	}
?>
</table>
<a style="font-weight:100;color:#9d1a1a;font-size:16px;text-decoration:underline;" href="<?=FEATURED_STORIES_MORE_URL?>">More UCF Stories</a>
