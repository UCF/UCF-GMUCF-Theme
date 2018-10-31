<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 0; padding-bottom: 20px; padding-left: 0; padding-right: 0; text-align: center; border-bottom: 3px solid #fc0;">
			<a href="https://today.ucf.edu"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/logo-today.png" alt="UCF Today" border="0" width="250" height="34"></a>
		</td>
	</tr>

	<tr>
		<td style="padding-top: 0; padding-left: 0; padding-right: 0;">
			<table align="center" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
				<tr>
					<th class="columnCollapse" align="left" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #848484; text-transform: uppercase; padding-left: 0; padding-right: 0; padding-top: 10px; padding-bottom: 0; vertical-align: middle; text-align: center;">
						<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
							<tr>
								<td class="montserratlight" style="font-weight: 400;">
									<?php echo date('l, F j, Y'); ?>
								</td>
							</tr>
						</table>
					</th>
					<th class="columnCollapse" align="right" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #848484; padding-left: 0; padding-right: 0; padding-top: 10px; padding-bottom: 0; vertical-align: middle; text-align: center;">
						<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
							<tr>
							<?php
							$weather = get_weather( 'weather-today' );
							if ( ! empty( $weather ) ) :
								$today_icon = get_weather_icon( $weather['today']['condition'] );
								$tonight_icon = get_weather_icon( $weather['tonight']['condition'], true );
							?>
								<td valign="middle" style="text-align: right;">
									<img height="25" width="25" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $today_icon; ?>.png" />
								</td>
								<td valign="middle" style="text-align: left; padding-left: 6px;">
									<p style="margin-top: 0; margin-bottom: 0;"><span class="montserratlight" style="font-weight: 400;">High</span> <span class="montserratsemibold" style="font-weight: 500;"><?php echo $weather['today']['tempN']; ?>&deg;</span></p>
								</td>
								<td valign="middle" style="text-align: right;">
									<img height="25" width="25" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $tonight_icon; ?>.png" />
								</td>
								<td valign="middle" style="text-align: left; padding-left: 6px;">
									<p style="margin-top: 0; margin-bottom: 0;"><span class="montserratlight" style="font-weight: 400;">Low</span> <span class="montserratsemibold" style="font-weight: 500;"><?php echo $weather['tonight']['tempN']; ?>&deg;</span></p>
								</td>
							<?php endif; ?>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; padding-bottom: 0; padding-top: 25px; padding-left: 0; padding-right: 0; text-align: center;" align="center">
			<h2 style="margin-top: 0; margin-bottom: 0; font-weight: normal;">Good <?php echo (int)date('G') >= 12 ? 'Afternoon' : 'Morning'; ?>, !@!Preferred Name!@!.</h2>
		</td>
	</tr>
</table>
