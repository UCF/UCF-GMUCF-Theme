<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 0; padding-bottom: 20px; padding-left: 0; padding-right: 0; text-align: center; border-bottom: 3px solid #fc0;">
			<a href="https://today.ucf.edu"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/logo-today.jpg" alt="UCF Today" border="0" width="" height=""></a>
		</td>
	</tr>

	<tr>
		<td class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; padding-bottom: 30px; padding-top: 20px; padding-left: 0; padding-right: 0; text-align: center;" align="center">
			<h2 style="margin-top: 0; margin-bottom: 0; font-weight: normal;">Good <?php echo (int)date('G') >= 12 ? 'Afternoon' : 'Morning'; ?>, !@!Preferred Name!@!.</h2>
		</td>
	</tr>

	<tr>
		<td class="montserratsemibold" style="font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; padding-left: 0; padding-right: 0; padding-top: 0; color: #848484; text-align: center; padding-bottom: 15px; line-height: 1; text-transform: uppercase; letter-spacing: 1.25px;">
			<?php echo date('l, F j, Y'); ?>
		</td>
	</tr>

	<?php
	$weather = get_weather( 'weather-today' );
	if (!empty($weather)) :
	?>
		<tr>
			<td style="font-family: Helvetica, Arial, sans-serif; font-size: 14px; padding-left: 0; padding-right: 0; padding-top: 0; color: #848484; text-align: center; padding-bottom: 0; line-height: 1;" align="center">
				<img height="32" width="32" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['today']['imgCode']; ?>.png" />
				High <strong><?php echo $weather['today']['tempN']; ?>&deg;</strong>
				<img height="32" width="32" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['tonight']['imgCode']; ?>.png" />
				Low <strong><?php echo $weather['tonight']['tempN']; ?>&deg;</strong>
			</td>
		</tr>
	<?php endif; ?>
</table>
