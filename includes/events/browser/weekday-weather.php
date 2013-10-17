<?php
$weather = get_weather('extended-weather');
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
				<strong><?=$weather['day1']['tempMax']?></strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day1']['tempMin']?></strong>
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
				<strong><?=$weather['day2']['tempMax']?></strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day2']['tempMin']?></strong>
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
				<strong><?=$weather['day3']['tempMax']?></strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day3']['tempMin']?></strong>
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
				<strong><?=$weather['day4']['tempMax']?></strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day4']['tempMin']?></strong>
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
				<strong><?=$weather['day5']['tempMax']?></strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather['day5']['tempMin']?></strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<?php } ?>