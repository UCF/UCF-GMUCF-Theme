<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
<?
	$featured_stories = get_featured_stories_details();
	$total = count( $featured_stories );
	$limit = 4;

	foreach( $featured_stories as $index => $details ) {
		extract( $details );
		if( $index == $limit ) break;
		if( $index == $total ) break;
	?>
		<tr>
			<td style="padding-bottom: 30px; padding-top: 30px; padding-left: 0; padding-right: 0;<?php if( $index < $total - 1 && $index < $limit ) echo " border-bottom: solid 1px #aaa;"; ?>">
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
							<a href="<?php echo $permalink; ?>" style="color: #006699; text-decoration: underline;">Read More...</a>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<?
	}
?>

	<tr>
		<td style="text-align: right; padding-bottom: 30px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
			<a href="<?php echo FEATURED_STORIES_MORE_URL; ?>">
				More UCF Stories
			</a>
		</td>
	</tr>
</table>
