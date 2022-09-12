<?php
namespace GMUCF\Theme\TemplateParts\News\Mail\InTheNews;
use GMUCF\Theme\Includes\InTheNews;
use GMUCF\Theme\Includes\Analytics;

$in_the_news_more_url = get_option( 'in_the_news_more_url' );
$external             = InTheNews\get_in_the_news_stories();
?>
<table class="tableCollapse" width="600" border="0" align="center" style="border-bottom: 3px solid #fc0; border-top: 3px solid #fc0; border-spacing: 0; border-collapse: collapse;">
	<tbody>
		<?php if ( $in_the_news_more_url ): ?>
		<tr>
			<td class="montserratbold" style="padding-top: 40px; padding-bottom: 30px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 22px; font-weight: bold; color: #006699; text-transform: uppercase; letter-spacing: 1.3px;" align="left">
				<a href="<?php echo Analytics\format_url_news_announcements_utm_params( $in_the_news_more_url ); ?>" style="text-decoration: none;">UCF In the News</a>
			</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td>
				<?php if ( count( $external ) === 0 ) : ?>
					<p class="montserratlight" style="margin: 0; font-family: Helvetica, Arial, sans-serif; font-weight: 400; padding-top: 10px; padding-bottom: 10px;">No stories found for today.</p>
				<?php else: ?>
					<ul style="list-style: none; padding-left: 0; margin: 0;">
					<?php
					foreach ( $external as $story ) :
						$story_source = ( !empty( $story->source_name ) ) ? $story->source_name : $story->source;
						$story_source_image = ( !empty( $story->source_image ) ) ? $story->source_image : GMUCF_THEME_IMG_URL . "/external-story-default.png";
					?>
						<li style="padding-bottom: 30px;" align="left">
							<table>
								<tbody>
									<tr>
										<td style="padding-right: 20px; vertical-align: top;" valign="top">
											<a href="<?php echo $story->url; ?>">
												<img border="0" width="50" height="50" style="border:none; height: auto; width: 50px; height: 50px;" src="<?php echo $story_source_image; ?>">
											</a>
										</td>
										<td>
											<table>
												<tbody>
												<tr>
													<td style="padding-bottom: 4px;">
														<a class="montserratsemibold" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; color: #000000; font-weight: 500;" href="<?php echo $story->url; ?>">
															<?php echo $story->link_text; ?>
														</a>
													</td>
												</tr>
												<tr><td style="padding-top: 3px;">
													<a class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #757575; text-decoration: none; text-transform: uppercase;" href="<?php echo $story->url; ?>">
														<?php echo $story_source; ?>
													</a>
												</td></tr>
												</tbody>
											</table>

										</td>
									</tr>
								</tbody>
							</table>
						</li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</td>
		</tr>
		<?php if ( $in_the_news_more_url ): ?>
		<tr>
			<td class="montserratbold" style="text-align: right; padding-top: 20px; padding-bottom: 40px; padding-right: 0; padding-left: 0; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
				<a href="<?php echo Analytics\format_url_news_announcements_utm_params( $in_the_news_more_url ); ?>">
					More UCF In The News
				</a>
			</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
