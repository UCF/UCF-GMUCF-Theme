<h1>UCF Today</h1>
<h2>Good <?php echo (int)date('G') >= 12 ? 'Afternoon' : 'Morning'; ?>, !@!Preferred Name!@!.</h2>
<?php
echo date('l, F j, Y');

$weather = get_weather( 'weather-today' );

if (!empty($weather)) :
?>
	<img height="36" width="36" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['today']['imgCode']; ?>.png" width="30" />
	High <strong><?php echo $weather['today']['tempN']; ?>&deg;</strong>

	<img height="36" width="36" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['tonight']['imgCode']; ?>.png" width="30" />
	Low <strong><?php echo $weather['tonight']['tempN']; ?>&deg;</strong>
<?php endif; ?>
