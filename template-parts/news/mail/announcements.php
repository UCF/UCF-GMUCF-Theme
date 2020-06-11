<?php
namespace GMUCF\Theme\TemplateParts\News\Mail\Announcements;
use GMUCF\Theme\Includes\UCFToday;
use GMUCF\Theme\Includes\Announcements;
use GMUCF\Theme\Includes\Analytics;


$gmucf_content = UCFToday\get_gmucf_email_options_feed_values();
$announcements = array();
$announcements_more_url = get_option( 'announcements_more_url' );

if ( isset( $gmucf_content->gmucf_announcements ) && ! empty( $gmucf_content->gmucf_announcements ) ) {
	$announcements = Announcements\get_announcement_details( $gmucf_content->gmucf_announcements );
} else {
	$announcements = Announcements\get_announcement_details();
}

if ( count( $announcements ) !== 0 ) :
?>
<tr>
	<td style="padding-top: 40px; padding-bottom: 0; padding-left: 0; padding-right: 0;">
		<table class="tableCollapse" width="600" border="0" align="center" style="border-bottom: 3px solid #fc0; border-spacing: 0; border-collapse: collapse;">
			<tbody>
				<?php if ( $announcements_more_url ): ?>
				<tr>
					<td class="montserratbold" style="padding-top: 0; padding-bottom: 30px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 22px; font-weight: bold; color: #006699; text-transform: uppercase; letter-spacing: 1.3px;" align="left">
						<a href="<?php echo $announcements_more_url; ?>" style="text-decoration: none;">Announcements</a>
					</td>
				</tr>
				<?php endif; ?>

				<tr>
					<td>
						<ul style="list-style: none; padding-left: 0; margin: 0;">
						<?php
						foreach( $announcements as $announcement ) :
							extract( $announcement );
						?>
							<li style="padding-bottom: 30px;" align="left">
								<table>
									<tbody>
									<tr>
										<td style="padding-bottom: 4px;">
											<a class="montserratsemibold" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; color: #000000; font-weight: 500;" href="<?php echo $permalink; ?>">
												<?php echo $title; ?>
											</a>
										</td>
									</tr>
									</tbody>
								</table>
							</li>
						<?php
						endforeach;
						?>
						</ul>
					</td>
				</tr>

				<?php if ( $announcements_more_url ) :?>
				<tr>
					<td class="montserratbold" style="text-align: right; padding-top: 20px; padding-bottom: 40px; padding-right: 0; padding-left: 0; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
						<a href="<?php echo Analytics\format_url_news_announcements_utm_params( $announcements_more_url ); ?>">
							More Announcements
						</a>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</td>
</tr>
<?php endif; ?>
