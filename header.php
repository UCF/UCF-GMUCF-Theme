<!DOCTYPE html>
<html lang="en-US">
	<head>
		<?="\n".header_()."\n"?>
		<!--[if IE]>
		<link href="http://cdn.ucf.edu/webcom/-/css/blueprint-ie.css" rel="stylesheet" media="screen, projection">
		<![endif]-->
		<?php if(GA_ACCOUNT or CB_UID):?>
		
		<script type="text/javascript">
			var _sf_startpt = (new Date()).getTime();
			<?php if(GA_ACCOUNT):?>
			
			var GA_ACCOUNT  = '<?=GA_ACCOUNT?>';
			var _gaq        = _gaq || [];
			_gaq.push(['_setAccount', GA_ACCOUNT]);
			_gaq.push(['_setDomainName', 'none']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			<?php endif;?>
			<?php if(CB_UID):?>
			
			var CB_UID      = '<?=CB_UID?>';
			var CB_DOMAIN   = '<?=CB_DOMAIN?>';
			<?php endif?>
			
		</script>
		<?php endif;?>
		
	</head>
	<body class="<?=body_classes()?>">
		<div id="blueprint-container" class="container">
			<div id="header">
				<div id="date">
					<span id="day"><?=date('l')?>,</span> <span id="month"><?=date('F j')?></span>
				</div>
				<?php 
				$weather = get_weather('weather-today');
				if (!empty($weather)) { 
				?>
				<div class="weather" id="today">
					<img height="36" width="36" src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['today']['imgCode']?>.png" />
					<span class="type">High</span>
					<span class="temp"><?=$weather['today']['tempN']?>&deg;</span>
					

					<img height="36" width="36" src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['tonight']['imgCode']?>.png" />
					<span class="type">Low</span>
					<span class="temp"><?=$weather['tonight']['tempN']?>&deg;</span>
					
				</div>
				<?php } ?>
				<a href="http://www.history.com/this-day-in-history" class="ignore-external" id="this-day-in-history">This day in history</a>
			</div>
			<div style="clear:both">&nbsp;</div>