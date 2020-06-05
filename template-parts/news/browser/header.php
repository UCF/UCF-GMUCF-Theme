<?php
namespace GMUCF\Theme\TemplateParts\News\Browser\Header;
use GMUCF\Theme\Includes\Weather;
?>
<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 20px; padding-bottom: 20px; padding-left: 0; padding-right: 0; text-align: center; border-bottom: 3px solid #fc0;">
			<a href="https://www.ucf.edu/news/"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/logo-today.png" alt="UCF Today" border="0" width="250" height="34"></a>
		</td>
	</tr>

	<tr>
		<td style="padding-top: 0; padding-left: 0; padding-right: 0;">
			<table align="center" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
				<tr>
					<th class="columnCollapse" align="left" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #757575; text-transform: uppercase; padding-left: 0; padding-right: 0; padding-top: 5px; padding-bottom: 0; vertical-align: middle;">
						<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
							<tbody>
								<tr>
									<th class="text-left-desktop" style="text-align: center;">
										<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
											<tbody>
												<tr>
													<td class="montserratlight" style="font-weight: 400; font-size: 14px; line-height: 20px;">
														<?php echo date( 'l, F j, Y' ); ?>
													</td>
												</tr>
											</tbody>
										</table>
									</th>
								</tr>
							</tbody>
						</table>
					</th>
					<th class="columnCollapse" align="right" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #757575; padding-left: 0; padding-right: 0; padding-top: 5px; padding-bottom: 0; vertical-align: middle; text-align: center;">
						<?php
						$weather = Weather\get_weather( 'weather-today' );
						if ( ! empty( $weather ) ) :
							$today_icon = Weather\get_weather_icon( $weather['today']['condition'] );
							$tonight_icon = Weather\get_weather_icon( $weather['tonight']['condition'], true );
						?>
							<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
								<tr>
									<th class="text-right-desktop" width="135" align="right" style="font-family: Helvetica, Arial, sans-serif; color: #757575; text-transform: uppercase; padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: 0; vertical-align: middle; text-align: center;">
										<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
											<tbody>
												<tr>
													<td valign="middle" style="font-size: 14px;">
														<span style="margin-top: 0; margin-bottom: 0; line-height: 20px; vertical-align: middle;">
															<img align="top" height="20" width="20" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $today_icon; ?>.png" />
															<span class="montserratlight" style="font-weight: 400;">High</span> <span class="montserratsemibold" style="font-weight: 500;"><?php echo $weather['today']['tempN']; ?>&deg;</span>
														</span>
														<span style="margin-top: 0; margin-bottom: 0; line-height: 20px; vertical-align: middle; padding-left: 10px;">
															<img align="top" height="20" width="20" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $tonight_icon; ?>.png" />
															<span class="montserratlight" style="font-weight: 400;">Low</span> <span class="montserratsemibold" style="font-weight: 500;"><?php echo $weather['tonight']['tempN']; ?>&deg;</span>
														</span>
													</td>
												</tr>
											</tbody>
										</table>
									</th>
								</tr>
							</table>
						<?php endif; ?>
					</th>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; padding-bottom: 20px; padding-top: 30px; padding-left: 0; padding-right: 0; text-align: left;" align="left">
			<h2 style="margin-top: 0; margin-bottom: 0; font-weight: normal;">Good <?php echo (int)date( 'G' ) >= 12 ? 'Afternoon' : 'Morning'; ?>, UCF.</h2>
		</td>
	</tr>
</table>
