<? $weather = get_weekend_weather(); ?>
<div id="weekend-weather" class="weather">
	<div class="day">
		<div class="day-image">
			<h2>Today</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[0]['image']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather[0]['high']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather[0]['low']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2>Tomorrow</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[0]['image']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather[1]['high']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather[1]['low']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2>Sunday</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[0]['image']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather[2]['high']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather[2]['low']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2>Monday</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[0]['image']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather[3]['high']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather[3]['low']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div style="clear:left;">&nbsp;</div>
</div>