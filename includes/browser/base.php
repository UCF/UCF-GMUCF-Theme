<!DOCTYPE html>
	<head>
		<title>Good Morning UCF -  <?=date('F j')?></title>
		<link rel="stylesheet" href="<?=bloginfo('stylesheet_directory')?>/style.css" media="*" />
	</head>
	<body>
		<div id="header">
			<? $weather = get_weather(); ?>
			<div class="weather" id="today">
				TODAY
				<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['today']['image']?>.png" />
				<?=$weather['today']['temp']?>&deg;
				High
			</div>
			<div class="weather" id="tonight">
				TONIGHT
				<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['tonight']['image']?>.png" />
				<?=$weather['tonight']['temp']?>&deg;
				Low
			</div>
			<div id="date">
				<span id="day"><?=strtoupper(date('l'))?></span>
				<span id="month"><?=date('F j')?></span>
			</div>
			<a href="http://www.history.com/this-day-in-history">This day in history</a>
		</div>
		<h1>Good Morning, Patrick.</h1>
		<?=get_template_part('includes/browser/top-story')?>
	</body>
</html>