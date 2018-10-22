<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;padding-bottom:15px;">
		<tr>
<?
	$count = 0;
	foreach(get_featured_stories_details() as $details) {
		extract($details);
		if($count == 2) break;
	?>
		<tr>
			<td style="padding-bottom: 20px; padding-top: 20px; padding-left: 0; padding-right: 0;">
				<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
					<tbody>
						<tr>
							<td style="padding-left: 0; padding-right: 0;">
								<a href="<?php echo $permalink; ?>">
									<img class="responsiveimg" border="0" width="600" style="border:none;" src="<?php echo $image; ?>" />
								</a>
							</td>
						</tr>
						<tr>
							<td class="montserratbold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: bold; padding-top: 15px; padding-bottom: 4px; line-height: 1.1; color: #000; text-align: left;" align="left">
							<a href="<?php echo $permalink; ?>" style="color: #000; text-decoration: none;"><?php echo $title; ?></a>
							</td>
						</tr>
						<tr>
							<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.4; color: #000; text-align: left;" align="left">
							<?php echo $description; ?>
							<a href="<?php echo $permalink; ?>" style="color: #006699; text-decoration: underline;"></br>Read More.</a>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<?
		$count++;
	}
?>
	</tr>
</table>
<div style="text-align:right; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
	<a href="<?php echo FEATURED_STORIES_MORE_URL?>">More UCF Stories</a>
</div>
