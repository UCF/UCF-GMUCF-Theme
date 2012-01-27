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
			<div id="header" class="clearfix">
				<? $weather = get_weather(); ?>
				<div class="weather" id="today">
					<span class="when">TODAY</span>
					<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['today']['image']?>.png" />
					<span class="temp"><?=$weather['today']['temp']?>&deg;</span>
					<span class="type">High</span>
				</div>
				<div class="weather" id="tonight">
					<span class="when">TONIGHT</span>
					<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['tonight']['image']?>.png" />
					<span class="temp"><?=$weather['tonight']['temp']?>&deg;</span>
					<span class="type">Low</span>
				</div>
				<div id="date">
					<span id="day"><?=strtoupper(date('l'))?></span>
					<span id="month"><?=date('F j')?></span>
				</div>
				<a href="http://www.history.com/this-day-in-history">This day in history</a>
			</div>