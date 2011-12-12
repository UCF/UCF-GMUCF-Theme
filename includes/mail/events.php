<table border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
	<tr>
		<td style="border-bottom:1px solid #ddd;padding-bottom:20px;padding-left:10px;">
			<p style="font-size:22px;font-weight:100;margin-bottom:10px;">
				Today @ UCF
			</p>
			<table border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
			<? 
			$todays_events = get_todays_events(array('limit'=>7));
			if(count($todays_events) == 0) { ?>
				<p>There are no events today.</p>
			<? } else {
				foreach($todays_events as $event) {
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
							<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="color:#333;font-weight:100;font-size:15px;">
								<?=esc_html($event->title)?>
							</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:10px;">&nbsp;</td>
					</tr>
				<? } 
			} ?>
			</table>
		</td>
	</tr>
	<tr>
		<td style="padding-top:20px;padding-left:10px;">
			<p style="font-size:22px;font-weight:100;margin-bottom:10px;">
				Tomorrow @ UCF
			</p>
			<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0 0 20px 0; background-color:#FFF;">
				<? 
				$tomorrows_events = get_tomorrows_events(array('limit'=>7));
				if(count($tomorrows_events) == 0) { ?>
					<p>There are no events tomrorow.</p>	
				<?} else {
					foreach($tomorrows_events as $event) { 
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
							<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="color:#333;font-weight:100;font-size:15px;">
								<?=esc_html($event->title)?>
							</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:10px;">&nbsp;</td>
					</tr>
				<? } 
			} ?>
			</table>
			<a style="font-weight:100;color:#9d1a1a;font-size:16px;" href="<?=EVENTS_URL?>">
				More Events
			</a>
		</td>
	</tr>
</table>