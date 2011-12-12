<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Good Morning UCF - <?=date('F j')?></title>
		<style type="text/css">
			<!--
			html, body { margin:0px; padding:0; background-color:#FFF; color:#333; font-family:Helvetica, sans-serif; }
			-->
			* {zoom:1;}
		</style>
	</head>
	<body bgcolor="#FFF">
		<div id="main" style="padding: 0;">
			<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:20px auto 0 auto; background-color:#FFF;border-bottom:1px solid #ddd;">
				<tr style="text-align:center;border-bottom:1px solid #ddd;">
					<? $weather = get_weather(); ?>
					<td style="font-weight:bold;border-right:1px solid #ddd;width:160px;">
						<table style="padding-left:20px">
							<tr>
								<td style="font-size:14px;">TODAY</td>
								<td></td>
							</tr>
							<tr>
								<td style="width:60px;"><img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['today']['image']?>.png" /></td>
								<td>
									<span style="font-size:24px;position:relative;left:5px;">
										<?=$weather['today']['temp']?>&deg;
									</span>
									<span style="font-size:18px;font-weight:100;display:block;">High</span>
								</td>
							</tr>
						</table>
					</td>
					<td style="font-weight:bold;border-right:1px solid #ddd;width:225px;">
						<table style="margin-left:20px;">
							<tr>
								<td style="font-size:14px;">TONIGHT</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td><img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['tonight']['image']?>.png" /></td>
								<td style="text-align:center;">
									<span style="font-size:24px;position:relative;left:5px;">
										<?=$weather['tonight']['temp']?>&deg;
									</span>
									<span style="font-size:18px;font-weight:100;display:block;">Low</span>
								</td>
								<td style="text-align:left;font-size:80%;font-weight:100;padding-left:17px;">
									<a style="color:#333;" href="<?=WEATHER_URL?>">More<br />Weather</a>
								</td>
							</tr>
						</table>
					</td>
					<td style="border-right:1px solid #ddd;">
						<span style="font-size:19px;letter-spacing:1px;display:block;margin-bottom:7px;">
							<?=strtoupper(date('l'))?>
						</span>
						<span style="font-size:20px;letter-spacing:1.2px;font-weight:100;">
							<?=date('F j')?>
						</span>
					</td>
					<td style="text-align:left; padding-left:10px;width:10px;padding-right:20px;">
						<a style="color:#333;font-size:85%;line-height:1.5em;" href="http://www.history.com/this-day-in-history">
							This
							Day
							in
							History
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						&nbsp;
					</td>
				</tr>
			</table>
			<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto;padding-top:35px; background-color:#FFF;">
				<tr>
					<td style="font-size:40px;font-weight:100;">Good Morning, Patrick.</td>
				</tr>
				<tr>
					<td style="padding-top:20px">
						<? get_template_part('includes/mail/top-story'); ?>
						<table width="560" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 560px; margin:0 auto;background-color:#FFF;">
							<?=get_template_part('includes/mail/alert')?>
							<tr>
								<td style="width:330px;padding-top:20px;vertical-align:top;">
									<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
										<tr>
											<td style="border-bottom:1px solid #ddd;padding-bottom:20px;">
												<? get_template_part('includes/mail/featured-stories'); ?>
											</td>
										</tr>
										<tr>
											<td style="padding-top:20px;">
												<? get_template_part('includes/mail/announcements'); ?>
											<td>
										</tr>
									</table>
								</td>
								<td style="width:230px;padding-top:20px;padding-left:20px;vertical-align:top;">
									<? get_template_part('includes/mail/events'); ?>
								</td>
							</tr>
						</table>
						<table width="560" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 560px; margin:0 auto; background-color:#FFF;padding-top:45px;">

						</table>
						<table width="560" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 560px; margin:0 auto; background-color:#FFF;padding-top:15px;border-top:1px solid #ddd;padding-bottom:15px;">
							<tr>
								<td style="width:330px;vertical-align:top;">
									<table border="0" align="left" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="margin:0; background-color:#FFF;">
										<tr>
											<td colspan="3" style="font-size:22px;font-weight:100;padding-bottom:3px;">
												Get Social:
											</td>
										</tr>
										<tr>
											<td>
												<a href="http://www.facebook.com/ucf/" style="text-decoration:none;">
													<img style="border:0;" src="<?=bloginfo('stylesheet_directory')?>/static/img/facebook.png" />
												</a>
											</td>
											<td style="padding-left:10px;">
												<a href="http://www.youtube.com/user/UCF/" style="text-decoration:none;">
													<img style="border:0;" src="<?=bloginfo('stylesheet_directory')?>/static/img/youtube.png" />
												</a>
											</td>
											<td style="padding-left:10px;">
												<a href="http://www.twitter.com/UCF/" style="text-decoration:none;">
													<img style="border:0;" src="<?=bloginfo('stylesheet_directory')?>/static/img/twitter.png" />
												</a>
											</td>
										</tr>
									</table>
								</td>
								<td style="width:230px;padding-left:40px;vertical-align:top;">
									<a href="http://www.ucf.edu">
										<img src="<?=bloginfo('stylesheet_directory')?>/static/img/logo-no-opportunity.png" style="border:0"/>
									</a>
									<p style="line-height:1.4em;font-size:15px;margin:0;padding:0;">
										4000 Central Florida Blvd.
										<br />
										Orlando, FL 32816
										<br />
										407 823 2000
									</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
