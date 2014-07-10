<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;padding-bottom:15px;">
		<tr>
<?
	$count = 0;
	foreach(get_featured_stories_details() as $details) {
		extract($details);
		if($count == 2) break;
	?>
		<td class="<?=($count == 0) ? 'ccollapse100pb': 'ccollapse100'?>" style="vertical-align:top;width:250px;<?=($count == 0) ? ' padding-right:25px;': ''?>">
			<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
				<tr>
					<td class="featuredimgwrap" style="width:110px;vertical-align:top;">
						<a style="color:#333;text-decoration:none;" href="<?=$permalink?>">
							<img class="featuredimg" src="<?=$thumbnail_src?>" style="border:none;" />
						</a>
					</td>
					<td class="featuredtext" style="width:200px;vertical-align:top;">
						<div style="margin-bottom:5px;">
							<a href="<?=$permalink?>" style="color:#000001;text-decoration:none;">
								<span style="font-weight:bold;font-size:14px;padding-bottom:5px;display:block;color:#000001"><?=$title?></span>
							</a>
						</div>
						<a href="<?=$permalink?>" style="color:#000001;text-decoration:none;">
							<span style="font-weight:200;font-size:14px;line-height:1.4em;color:#000001;"><?=truncate($description, 25)?></span>
						</a>
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
