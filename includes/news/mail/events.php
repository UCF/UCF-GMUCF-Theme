<table border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
	<tr>
		<td style="border-bottom:1px solid #ddd;padding-bottom:20px;padding-left:10px;">
			<p style="font-size:22px;font-weight:100;margin-bottom:10px;">
				Today @ UCF
			</p>
			<table border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
			<?
			$todays_events = get_todays_events();
			if(count($todays_events) == 0) { ?>
				<p>There are no events today.</p>
			<? } else {
				$count = 0;
				foreach($todays_events as $event) {
					if($count == 7) break;
					$start_timestamp = strtotime($event->starts);
					?>
					<tr>
						<td style="vertical-align:top;">
							<table width="55" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:55px; margin:0; background-color:#fef7c8;border:1px solid #e1e1e1;font-size:15px;text-align:center;">
								<tr>
									<td style="padding:5px;text-align:center;color:#666;">
										<span style="font-weight:bold;">
											<?=date('g:i', $start_timestamp)?>
										</span>
										<br />
										<?=date('A', $start_timestamp)?>
									</td>
								</tr>
							</table>
						</td>
						<td style="padding-left:10px;vertical-align:top;">
							<a href="<?=$event->url?>" style="color:#333;font-weight:100;font-size:15px;">
								<?=esc_html($event->title)?>
							</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:10px;">&nbsp;</td>
					</tr>
				<?
				$count++;
				}
			} ?>
			</table>
			<? if((count($todays_events) - 7) > 0) { ?>
			<a style="font-weight:100;color:#9d1a1a;font-size:16px;text-decoration:underline;" href="<?=EVENTS_URL?>">
				<?= count($todays_events) - 7 ?> More Event<?= count($todays_events) == 1 ? '' : 's' ?> Today
			</a>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td style="padding-top:20px;padding-left:10px;">
			<p style="font-size:22px;font-weight:100;margin-bottom:10px;">
				Tomorrow @ UCF
			</p>
			<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0 0 20px 0; background-color:#FFF;">
				<?
				$tomorrows_events = get_tomorrows_events();
				if(count($tomorrows_events) == 0) { ?>
					<p>There are no events tomrorow.</p>
				<?} else {
					$count = 0;
					foreach($tomorrows_events as $event) {
						if($count == 7) break;
						$start_timestamp = strtotime($event->starts);
					?>
					<tr>
						<td style="vertical-align:top;">
							<table width="55" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:55px; margin:0; background-color:#fef7c8;border:1px solid #e1e1e1;font-size:15px;text-align:center;">
								<tr>
									<td style="padding:5px;text-align:center;color:#666;">
										<span style="font-weight:bold;">
											<?=date('g:i', $start_timestamp)?>
										</span>
										<br />
										<?=date('A', $start_timestamp)?>
									</td>
								</tr>
							</table>
						</td>
						<td style="padding-left:10px;vertical-align:top;">
							<a href="<?=$event->url?>" style="color:#333;font-weight:100;font-size:15px;">
								<?=esc_html($event->title)?>
							</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:10px;">&nbsp;</td>
					</tr>
				<? 		$count++;
					}
			} ?>
			</table>
			<? if((count($tomorrows_events) - 7) > 0) {
				$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
				$tomorrow_event_url = EVENTS_URL.'/'.date('Y', $tomorrow).'/'.date('n',$tomorrow).'/'.date('j', $tomorrow);
				?>
			<a style="font-weight:100;color:#9d1a1a;font-size:16px;text-decoration:underline;" href="<?=$tomorrow_event_url?>">
				<?= count($tomorrows_events) - 7 ?> More Event<?= count($todays_events) == 1 ? '' : 's' ?> Tomorrow
			</a>
			<? } ?>
		</td>
	</tr>
</table>
