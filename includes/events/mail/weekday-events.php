<? for($i = 0; $i < count($days); $i++) { 
		$day       = $days[$i];
		$title     = 'Today';
		$event_day = 'Monday';
		switch($i) {
			case 1:
				$title     = 'Tomorrow';
				$event_day = 'Tuesday';
				break;
			case 2:
				$title = $event_day = 'Wednesday';
				break;
			case 3:
				$title = $event_day = 'Thursday';
				break;
			case 4:
				$title = $event_day = 'Friday';
				break;
		}
		# date_add modifies the passed object in place. want $start_date to stay the
		# same so make a copy of it.
		# http://www.php.net/manual/en/datetime.add.php#102193
		$_start_date          = new DateTime(date('c', $start_date->getTimestamp()));
		$title_date           = date_add($_start_date, new DateInterval('P'.$i.'D'));
		$title_date_timestamp = $title_date->getTimestamp();
		$all_events_link      = EVENTS_URL.'?y='.date('Y', $title_date_timestamp).'&m='.date('n',$title_date_timestamp).'&d='.date('j', $title_date_timestamp);
?>
<tr>
	<td style="border-top:1px solid #ddd;padding-top:35px;padding-bottom:35px;">
		<span style="font-size:25px;font-weight:500;padding-right:15px;"><?=$title?>, <?=date('n/j', $title_date_timestamp)?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$all_events_link?>" style="font-size:15px;color:#9d1a1a;">View all <?=$event_day?> events</a>
		<br /><br />
		<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td style="width:200px;border-right:1px solid #ddd;vertical-align:top;padding-right:15px;">
					<span style="color:#1c658e;font-size:15px;font-weight:500;">MORNING</span>
					<br /><br />
					<? if(count($day['morning']) == 0){ ?>
					No Morning Events
					<? } else { ?>
						<? foreach($day['morning'] as $section=>$events){ ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?=($section == '12:00 AM' ? 'All Day' : $section)?>
								</span>	
								<? foreach($events as $event){ ?>
								<div style="margin-bottom:15px;color:blue;">
									<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?=esc_html($event->title)?>
									</a>
								</div>
								<? } ?>
							</div>
						<? } ?>
					<? } ?>
				</td>
				<td style="width:200px;border-right:1px solid #ddd;padding-left:15px;vertical-align:top;padding-right:15px;">
					<span style="color:#1c658e;font-size:15px;font-weight:500;">AFTERNOON</span>
					<br /><br />
					<? if(count($day['afternoon']) == 0){ ?>
					No Afternoon Events
					<? } else { ?>
						<? foreach($day['afternoon'] as $section=>$events){ ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?=($section == '12:00 AM' ? 'All Day' : $section)?>
								</span>	
								<? foreach($events as $event){ ?>
								<div style="margin-bottom:15px;color:blue;">
									<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?=esc_html($event->title)?>
									</a>
								</div>
								<? } ?>
							</div>
						<? } ?>
					<? } ?>
				</td>
				<td style="width:200px;padding-left:15px;vertical-align:top;">
					<span style="color:#1c658e;font-size:15px;font-weight:500;">EVENING</span>
					<br  /><br />
					<? if(count($day['evening']) == 0){ ?>
					No Evening Events
					<? } else { ?>
						<? foreach($day['evening'] as $section=>$events){ ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?=($section == '12:00 AM' ? 'Ongoing' : $section)?>
								</span>	
								<? foreach($events as $event){ ?>
								<div style="margin-bottom:15px;color:blue;">
									<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?=esc_html($event->title)?>
									</a>
								</div>
								<? } ?>
							</div>
						<? } ?>
					<? } ?>
				</td>
			</tr>
		</table>
	</td>
</tr>
<? } ?>