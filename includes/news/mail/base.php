<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="initial-scale=1.0"><!-- So that mobile webkit will display zoomed in -->
		<title>Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?> UCF - <?=date('F j')?></title>
		<style type="text/css">
			<!--
			html, body { margin:0; padding:0; background-color:#FFF; color:#333; font-family:Helvetica, sans-serif; }
			-->
			/* CSS Resets */
			.ReadMsgBody { width: 100%; background-color: #ffffff;}
			.ExternalClass {width: 100%; background-color: #ffffff;}
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
			body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
			body {margin:0; padding:0;}
			table {border-spacing:0;}
			table td {border-collapse:collapse;}
			ul {padding-left:25px;}
			li {padding-bottom:10px;}
			.yshortcuts a {border-bottom: none !important;}

			* {zoom:1;}
			a {color:#333;text-decoration:none;}
			div, p, a, li, td { -webkit-text-size-adjust:none; } /* ios likes to enforce a minimum font size of 13px; kill it with this */

			@media all and (max-width: 640px) {
				/* The outermost wrapper table */
				table[class="t640"] {
					width: 100% !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
					margin: 0 !important;
				}
				/* The firstmost inner tables, which should be padded at mobile sizes */
				table[class="t600"] {
					width: 100% !important;
					padding-left: 15px;
					padding-right: 15px;
					padding-top: 15px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
					margin: 0 !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with bottom padding) */
				td[class="ccollapse100pb"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-bottom: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with top padding) */
				td[class="ccollapse100pt"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes */
				td[class="ccollapse100"] {
					display: block !important;
					overflow: hidden;
					clear: both;
					width: 100% !important;
					float: left !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table within a column that should be forced to 100% width at mobile sizes */
				table[class="tcollapse100"] {
					width: 100% !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Forces an image to fit 100% width of its parent */
				img[class="responsiveimg"] {
					width: 100% !important;
				}

				/* Align date/weather into two columns */
				td[id="date"] {
					font-size: 12px !important;
					width: 32% !important;
					overflow: hidden;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 5px !important;
				}
				td[id="weatherwrap"] {
					overflow: hidden;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 5px !important;
					padding-right: 5px !important;
				}
				td[class="temp"] {
					font-size: 13px !important;
				}
				td[id="history"] {
					width: 18% !important;
					overflow: hidden;
					font-size: 11px !important;
					line-height: 12px !important;
				}
				a[id="historylink"] {
					font-size: 11px !important;
					line-height: 12px !important;
				}

				/* Font size adjustments for top story area */
				td[id="goodmorning"] {
					font-size: 27px !important;
				}
				span[id="topstorytitle"] {
					font-size: 25px !important;
				}

				/* Resize featured story thumbnails */
				td[class="featuredimgwrap"] {
					display: block !important;
					float: left;
					width: 85px !important;
				}
				img[class="featuredimg"] {
					width: 70px !important;
				}
				td[class="featuredtext"] {
					display: inline !important;
					width: auto !important;
				}

				/* Fix spacing between announcements */
				td[id="announcementswrap"] {
					padding-top: 5px !important;
					padding-bottom: 20px !important;
				}
			}
		</style>
	</head>
	<body bgcolor="#FFF">
		<table class="t640" width="640" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 640px; margin:0 auto; padding:0; background-color:#FFF;">
			<tr>
				<td>
					<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;border-bottom:1px solid #ddd;padding-bottom:10px;">
						<tr>
							<!-- 210 -->
							<td id="date" style="font-size:20px;border-right:1px solid #ddd;font-weight:100;padding-right:10px;">
								<?=date('l, F j')?>
							</td>
							<!-- 190 -->
							<?php
							$weather = get_weather('weather-today');
							if (!empty($weather)) {
							?>
							<td id="weatherwrap" style="border-right:1px solid #ddd;padding-left:20px;padding-right:10px;">
								<table id="weather" style="margin:auto;" align="center">
									<tr>
										<td>
											<img height="36" width="36" src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['today']['imgCode']?>.png" width="30" />
										</td>
										<td class="temp">
											High <strong><?= $weather['today']['tempN']?>&deg;</strong>
										</td>
										<td>
											<img height="36" width="36" src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['tonight']['imgCode']?>.png" width="30" />
										</td>
										<td class="temp">
											Low <strong><?= $weather['tonight']['tempN']?>&deg;</strong>
										</td>
									</tr>
								</table>
							</td>
							<?php } ?>
							<!-- 130 -->
							<td id="history" style="padding-left:10px;width:110px;">
								<a id="historylink" style="font-size:13px;" href="http://www.history.com/this-day-in-history">
									This Day in History
								</a>
							</td>
						</tr>
					</table>
					<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto;padding-top:25px; background-color:#FFF;">
						<tr>
							<td id="goodmorning" style="font-size:35px;font-weight:100;">Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?>, !@!Preferred Name!@!.</td>
						</tr>
						<tr>
							<td style="padding-top:20px">
								<? get_template_part('includes/news/mail/top-story'); ?>
								<table class="tcollapse100" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto;background-color:#FFF;">
									<?=get_template_part('includes/news/mail/alert')?>
									<tr>
										<td style="width:100%;padding-top:30px;vertical-align:top;">
											<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
												<tr>
													<td style="border-bottom:1px solid #ddd;padding-bottom:30px;">
														<? get_template_part('includes/news/mail/featured-stories'); ?>
													</td>
												</tr>
												<tr>
													<td id="announcementswrap" style="padding-top:30px;padding-bottom:30px;">
														<? get_template_part('includes/news/mail/announcements'); ?>
													<td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<table class="tcollapse100" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;padding-top:15px;border-top:1px solid #ddd;padding-bottom:15px;">
									<tr>
										<td class="ccollapse100pb" style="width:330px;vertical-align:top;">
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
										<td class="ccollapse100" style="width:230px;padding-left:40px;vertical-align:top;">
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
						<tr>
							<td style="padding-top:15px;padding-bottom:15px;text-align:center;font-size:13px;">
								Having trouble viewing this email? See it in your <a style="color:blue;text-decoration:underline;" href="http://gmucf.cms.smca.ucf.edu/news/">browser</a>.
							</td>
						</tr>
						<tr>
							<td style="padding-top:15px;padding-bottom:15px;text-align:center;font-size:13px;">
								!@!UNSUBSCRIBE!@! from this email.
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
