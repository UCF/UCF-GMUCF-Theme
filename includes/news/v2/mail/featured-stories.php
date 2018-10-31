<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 0; padding-left: 0; padding-right: 0;">
			<table align="center" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
				<tbody>
					<tr>
<?
	$limit = 4;
	$featured_stories = get_featured_stories_details( $limit );
	$total = count( $featured_stories );

	foreach( $featured_stories as $index => $details ) {
		extract( $details );
		if( $index == $limit || $index == $total ) break;
		if( $index > 0 && $index % 2 == 0 ) echo "</tr><tr>";
		?>
		<th class="columnCollapse" align="left" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #848484; padding-left: 10px; padding-right: 10px; padding-top: 30px; padding-bottom: 0; vertical-align: top; text-align: center;">
			<table class="tableCollapse" width="100%" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
				<tr>
					<td>
						<table width="100%" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
							<tbody>
								<tr>
									<td style="padding-left: 0; padding-right: 0;">
										<a href="<?php echo $permalink; ?>">
											<img class="responsiveimg" border="0" width="290" style="border:none;" src="<?php echo $image; ?>" />
										</a>
									</td>
								</tr>
								<tr>
									<td class="montserratbold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: bold; padding-top: 15px; padding-bottom: 4px; line-height: 1.1; color: #000; text-align: left;" align="left">
										<a href="<?php echo $permalink; ?>" style="color: #000; text-decoration: none;"><?php echo $title; ?></a>
									</td>
								</tr>
								<tr>
									<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 1.4; color: #000; text-align: left;" align="left">
										<?php echo $description; ?>
										<a href="<?php echo $permalink; ?>" style="color: #006699; text-decoration: underline;">Read More</a>
									</td>
								</tr>
								<tr>
									<td class="montserratlight" style="padding-top: 10px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 1.4; color: #000; text-align: center;" align="center">
										<a href="<?php echo $permalink; ?>" style="color: #006699; text-decoration: underline;">
											<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/instagram.png" alt="Instagram" align="center" class="float-center" style="display:inline-block; padding-right: 8px;" width="42" height="42"></a>
										<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( $title ); ?>&url=<?php echo $permalink; ?>" style="color: #006699; text-decoration: underline;">
											<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/twitter.png" alt="Twitter" align="center" class="float-center" style="display:inline-block; padding-right: 8px;" width="42" height="42"></a>
										<a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" style="color: #006699; text-decoration: underline;">
											<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/facebook.png" alt="Facebook" align="center" class="float-center" style="display:inline-block; padding-right: 8px;" width="42" height="42"></a>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</table>
		</th>
	<?php
	}
?>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align: right; padding-top: 30px; padding-bottom: 30px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
			<a href="<?php echo FEATURED_STORIES_MORE_URL; ?>">
				More UCF Stories<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/external-icon.png" alt="" border="0" width="17" height="14" style="padding-left: 5px;">
			</a>

		</td>
	</tr>
</table>
