<?php
namespace GMUCF\Theme\TemplateParts\Events\Browser\WeekdayWeather;
use GMUCF\Theme\Includes\Weather;


$weather = Weather\get_weather('weather-extended');
if (!empty($weather)) {
?>
<div id="weekday-weather" class="weather">
	<div class="day">
		<div class="day-image">
			<h2>Today</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day1']['imgCode']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather['day1']['tempMaxN']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day1']['tempMinN']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2>Tomorrow</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day2']['imgCode']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather['day2']['tempMaxN']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day2']['tempMinN']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2><?=date('l', strtotime($weather['day3']['date']))?></h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day3']['imgCode']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather['day3']['tempMaxN']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day3']['tempMinN']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2><?=date('l', strtotime($weather['day4']['date']))?></h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day4']['imgCode']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather['day4']['tempMaxN']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day4']['tempMinN']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2><?=date('l', strtotime($weather['day5']['date']))?></h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day5']['imgCode']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather['day5']['tempMaxN']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day5']['tempMinN']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<?php } ?>
