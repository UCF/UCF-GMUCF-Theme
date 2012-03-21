<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;padding-bottom:15px;">
		<tr>
<?
	$count = 0;
	foreach(get_featured_stories_details() as $details) {
		extract($details);
		if($count == 2) break;
	?>
		<td style="vertical-align:top;width:250px;<?=($count == 0) ? ' padding-right:25px;': ''?>">
			<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
				<tr>
					<td style="width:110px;vertical-align:top;">
						<a style="color:#333;text-decoration:none;" href="<?=$permalink?>">
							<img src="<?=$thumbnail_src?>" style="border:none;" />
						</a>
					</td>
					<td style="200px;vertical-align:top;">
						<span style="font-weight:bold;font-size:14px;"><?=$title?></span>
						<br />
						<span style="font-weight:200;font-size:14px;"><?=truncate($description, 25)?></span>
					</td>
				</tr>
			</table>
		</td>
		<?
		$count++;
	}
?>
	</tr>
</table>
<div style="text-align:right">
	<a style="font-weight:100;color:#9d1a1a;font-size:16px;text-decoration:underline;" href="<?=FEATURED_STORIES_MORE_URL?>">More UCF Stories</a>
</div>
