<? $weather = get_weekday_weather(); ?>
<div id="weekday-weather" class="weather">
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
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[1]['image']?>.png" />
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
			<h2>Wednesday</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[2]['image']?>.png" />
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
			<h2>Thursday</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[3]['image']?>.png" />
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
	<div class="day">
		<div class="day-image">
			<h2>Friday</h2>
			<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[4]['image']?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?=$weather[4]['high']?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?=$weather[4]['low']?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="clear">&nbsp;</div>
</div>