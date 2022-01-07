<?php
namespace GMUCF\Theme\TemplateParts\Impact\Components\ArticleList;
use GMUCF\Theme\Includes\Impact;


$current_date = current_datetime();
$row          = Impact\get_current_row();
?>
<tr>
	<td style="text-align: left; padding-bottom: 10px;" align="left">
		<table style="text-align: center; width: 100%;" width="100%" align="center">
			<tbody>
				<?php
				foreach ( $row->articles as $key => $article ):
					$thumbnail = isset( $article->thumbnail ) ?? $article->thumbnail->url;
					$title     = Impact\escape_chars( $article->article_title );
					$deck      = Impact\format_deck_content( $article->article_deck );
					$href      = Impact\format_url_utm_params( $article->links_to, $current_date->format( 'Y-m-d' ) );
				?>
				<tr>
					<td style="text-align: left; padding-bottom: 30px;" align="left">
						<table style="text-align: center; width: 100%;" width="100%" align="center">
							<tbody>
								<tr>
									<?php if ( $thumbnail ): ?>
									<td style="text-align: left; padding-right: 20px; vertical-align: top; width: 50px;" width="50" valign="top" align="left">
										<?php if ( $href ): ?>
										<a href="<?php echo $href; ?>">
										<?php endif; ?>
											<img width="50" src="<?php echo $thumbnail; ?>" alt="">
										<?php if ( $href ): ?>
										</a>
										<?php endif; ?>
									</td>
									<?php endif; ?>
									<td style="text-align: left; vertical-align: middle;" valign="middle" align="left">
										<table style="text-align: center; width: 100%;" width="100%" align="center">
											<tbody>
												<?php if ( $title ): ?>
												<tr>
													<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 1.2; text-align: left; padding-bottom: 10px;" align="left">
														<?php if ( $href ): ?>
														<a href="<?php echo $href; ?>" style="color: #000; text-decoration: none;">
														<?php endif; ?>
															<?php echo $title; ?>
														<?php if ( $href ): ?>
														</a>
														<?php endif; ?>
													</td>
												</tr>
												<?php endif; ?>
												<?php if ( $deck ): ?>
												<tr>
													<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; line-height: 1.5; text-align: left; font-size: 13px;" align="left">
														<?php if ( $href ): ?>
														<a href="<?php echo $href; ?>" style="color: #000; text-decoration: none;">
														<?php endif; ?>
															<?php echo $deck; ?>
														<?php if ( $href ): ?>
														</a>
														<?php endif; ?>
													</td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</td>
</tr>
