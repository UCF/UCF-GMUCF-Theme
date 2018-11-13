<?php
extract( get_top_story_details() );
?>
<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-bottom: 0; padding-top: 15px; padding-left: 0; padding-right: 0; border: 0;">
				<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
					<tbody>
						<tr>
							<td style="padding-left: 0; padding-right: 0;">
								<a href="<?php echo $read_more_uri; ?>" style="color: #000; text-decoration: none;">
									<img class="responsiveimg" border="0" style="border:none;" src="<?php echo $thumbnail_src; ?>" />
								</a>
							</td>
						</tr>
						<tr>
							<td class="montserratsemibold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 500; padding-top: 20px; padding-bottom: 15px; line-height: 1.4; color: #000; text-align: left;" align="left">
								<a href="<?php echo $read_more_uri; ?>" style="color: #000; text-decoration: none;">
									<?php echo $story_title; ?>
								</a>
							</td>
						</tr>
						<tr>
							<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #000; text-align: left;" align="left">
								<a href="<?php echo $read_more_uri; ?>" style="color: #000; text-decoration: none;">
									<?php echo strip_tags( $story_description ); ?>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</a>
		</td>
	</tr>
	<tr>
		<td style="padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 0; border: 0;">
			<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
				<tbody>
					<?php echo display_social_share( $read_more_uri, $story_title ); ?>
				</tbody>
			</table>
		</td>
	</tr>
</table>
