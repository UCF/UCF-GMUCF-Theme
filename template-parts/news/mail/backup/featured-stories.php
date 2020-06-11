<?php
namespace GMUCF\Theme\TemplateParts\News\Mail\Backup\FeaturedStories;
use GMUCF\Theme\Includes\Analytics;
use GMUCF\Theme\Includes\EmailMarkup;
use GMUCF\Theme\Includes\UCFToday;

$limit = 4;
$featured_stories = UCFToday\get_featured_stories_details( $limit );
$total = count( $featured_stories );
$more_stories_url = get_option( 'main_site_stories_more_url' );
?>
<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 0; padding-left: 0; padding-right: 0;">
			<table align="center" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
				<tbody>
					<tr>
					<?php
					foreach( $featured_stories as $index => $details ) :
						extract( $details );
						if ( $index === $limit || $index === $total ) break;
						if ( $index > 0 && $index % 2 === 0 ) echo "</tr><tr>";
					?>
						<th class="columnCollapse" align="left" width="290" style="font-family: Helvetica, Arial, sans-serif; padding-left: 10px; padding-right: 10px; padding-top: 0; padding-bottom: 45px; vertical-align: top; text-align: center;">
							<table class="tableCollapse" width="100%" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
								<tbody>
									<tr>
										<td>
											<table width="100%" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
												<tbody>
													<tr>
														<td style="padding-left: 0; padding-right: 0;">
															<a href="<?php echo Analytics\format_url_news_announcements_utm_params( $permalink ); ?>" style="color: #000; text-decoration: none;">
																<img class="responsiveimg" border="0" width="290" style="border:none;" src="<?php echo $image; ?>" />
															</a>
														</td>
													</tr>
													<tr>
														<td class="montserratsemibold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 19px; font-weight: 500; padding-top: 20px; padding-bottom: 15px; line-height: 1.3; color: #000; text-align: left;" align="left">
															<a href="<?php echo Analytics\format_url_news_announcements_utm_params( $permalink ); ?>" style="color: #000; text-decoration: none;">
																<?php echo $title; ?>
															</a>
														</td>
													</tr>
													<tr>
														<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 1.6; color: #000; text-align: left;" align="left">
															<a href="<?php echo Analytics\format_url_news_announcements_utm_params( $permalink ); ?>" style="color: #000; text-decoration: none;">
																<?php echo strip_tags( $description ); ?>
															</a>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<?php echo EmailMarkup\display_social_share( $permalink, $title ); ?>
								</tbody>
							</table>
						</th>
					<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<?php if ( $more_stories_url ): ?>
	<tr>
		<td class="montserratbold" style="text-align: right; padding-top: 0; padding-bottom: 50px; padding-right: 10px; padding-left: 10px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
			<a href="<?php echo $more_stories_url; ?>">
				More UCF Stories
			</a>
		</td>
	</tr>
	<?php endif; ?>
</table>
