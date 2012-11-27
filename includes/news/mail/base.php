<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=640" />
		<title>Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?> UCF - <?=date('F j')?></title>
		<style type="text/css">
			<!--
			html, body { margin:0; padding:0; background-color:#FFF; color:#333; font-family:Helvetica, sans-serif; }
			-->
			* {zoom:1;}
			a {color:#333;text-decoration:none;}
		</style>
	</head>
	<body bgcolor="#FFF">
		<table width="640" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 640px; margin:0 auto; padding:0; background-color:#FFF;">
			<tr>
				<td style="text-align:center;font-size:16px;padding: 10px 10px 10px 10px;margin:0;">
					Send us your <a style="color:blue;text-decoration:underline;" href="http://atucf.smca.ucf.edu/feedback">comments &amp; feedback</a>
				</td>
			</tr>
			<tr>
				<td>
					<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;border-bottom:1px solid #ddd;padding-bottom:10px;">
						<tr>
							<!-- 210 -->
							<td style="font-size:20px;border-right:1px solid #ddd;font-weight:100;padding-right:10px;">
								<?=date('l, F j')?>
							</td>
							<!-- 190 -->
							<td style="border-right:1px solid #ddd;padding-left:20px;padding-right:10px;">
								<? $weather = get_weather(); ?>
								<table style="margin:auto;" align="center">
									<tr>
										<td>
											<img height="36" width="36" src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['today']['image']?>.png" width="30" /> 
										</td>
										<td>
											High <strong><?= $weather['today']['temp']?></strong>&deg;
										</td>
										<td>
											<img height="36" width="36" src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['tonight']['image']?>.png" width="30" /> 
										</td>
										<td>
											Low <strong><?= $weather['tonight']['temp']?></strong>&deg;
										</td>
									</tr>
								</table>
							</td>
							<!-- 130 -->
							<td style="padding-left:10px;width:110px;">
								<a style="font-size:13px;" href="http://www.history.com/this-day-in-history">
									This Day in History
								</a>
							</td>
						</tr>
					</table>
					<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto;padding-top:25px; background-color:#FFF;">
						<tr>
							<td style="font-size:35px;font-weight:100;">Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?>, !@!Preferred Name!@!.</td>
						</tr>
						<tr>
							<td style="padding-top:20px">
								<? get_template_part('includes/news/mail/top-story'); ?>
								<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto;background-color:#FFF;">
									<?=get_template_part('includes/news/mail/alert')?>
									<tr>
										<td style="width:100%;padding-top:30px;vertical-align:top;">
											<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
												<tr>
													<td style="border-bottom:1px solid #ddd;padding-bottom:30px;">
														<? get_template_part('includes/news/mail/featured-stories'); ?>
													</td>
												</tr>
												<? $wotd = get_word_of_the_day(); ?>
												<? if($wotd !== False) { ?>
												<tr>
													<td style="border-bottom:1px solid #ddd;padding-bottom:30px;padding-top:30px;">
														
														<p style="font-size:22px;font-weight:100;display:block;">Word of the Day</p>
														<span style="font-size:20px;font-weight:100;"><b><?=$wotd['word']?></b> <strong>-</strong> \<?=$wotd['pronunciation']?>\ <strong>-</strong> <em><?=$wotd['partofspeech']?></em></span>
														<br />
														<? foreach($wotd['definitions'] as $part=>$definitions) { ?>
															<? if($part != $wotd['partofspeech']) { ?>
																<p><em><?=$part?></em></p>
															<? } ?>
															<? $count = 1; ?>
															<? foreach($definitions as $definition) { ?>
																<p><?=$count?>. <?=$definition?></p>
																<? $count++;?>
															<? } ?>
														<? } ?>
														<? if(count($wotd['examples']) > 0) { ?>
															<? foreach($wotd['examples'] as $example) { ?>
															<p style="font-size:13px;">&ldquo;<?=$example['quote']?>&rdquo;<br />&mdash;<?=$example['source']?>, <?=$example['author']?></p>
															<? } ?>
														<? } ?>
														<div style="text-align:right;">
															<a href="http://www.dictionary.com" style="border:0;">
																<img src="<?=bloginfo('stylesheet_directory')?>/static/img/dictionary.com-attribution.png" style="border:0;" />
															</a>
														</div>
													</td>
												</tr>
												<? } ?>
												<tr>
													<td style="padding-top:30px;padding-bottom:30px;">
														<? get_template_part('includes/news/mail/announcements'); ?>
													<td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;padding-top:15px;border-top:1px solid #ddd;padding-bottom:15px;">
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
