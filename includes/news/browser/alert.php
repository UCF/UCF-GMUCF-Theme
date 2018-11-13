<?php
$alerts = get_posts( array( 'post_type'=>'alert', 'numberposts' => 1 ) );
if ( count( $alerts ) > 0 ) :
	$alert = $alerts[0];
?>
	<tr>
		<td style="padding-top: 50px; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: center;">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #ffffff; width:100%; margin:0;">
				<tr>
					<td style="padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 0; border: 0;">
						<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse; background-color:#dcf3f8;">
							<tbody>
								<tr>
									<td class="montserratsemibold" style="padding-left: 20px; padding-right: 20px; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 500; padding-top: 20px; padding-bottom: 10px; line-height: 1.4; color: #000; text-align: left;" align="left">
									<?php echo esc_html( $alert->post_title ); ?>
									</td>
								</tr>
								<tr>
									<td class="montserratlight" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #000; text-align: left;" align="left">
									<?php echo nl2br( esc_html( $alert->post_content ) ); ?>
									</td>
								</tr>
								<?php if ( ( $alert_uri = get_post_meta( $alert->ID, 'alert_external_uri', True ) ) !== '' ) : ?>
									<tr>
										<td class="montserratlight" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #000; text-align: right;" align="left">
											<a href="<?php echo esc_html( $alert_uri ); ?>" style="color: #000;">Get more information</a>
										</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php endif; ?>
