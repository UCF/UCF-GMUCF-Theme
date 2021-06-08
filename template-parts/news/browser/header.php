<?php
namespace GMUCF\Theme\TemplateParts\News\Browser\Header;

$current_date = current_datetime();
?>
<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 20px; padding-bottom: 20px; padding-left: 0; padding-right: 0; text-align: center; border-bottom: 3px solid #fc0;">
			<a href="https://www.ucf.edu/news/"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/logo-today.png" alt="UCF Today" border="0" width="250" height="34"></a>
		</td>
	</tr>

	<tr>
		<td style="padding-top: 0; padding-left: 0; padding-right: 0;">
			<table align="center" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
				<tr>
					<th class="columnCollapse" align="left" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #757575; text-transform: uppercase; padding-left: 0; padding-right: 0; padding-top: 5px; padding-bottom: 0; vertical-align: middle;">
						<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
							<tbody>
								<tr>
									<th class="text-left-desktop" style="text-align: center;">
										<table class="tableCollapse" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
											<tbody>
												<tr>
													<td class="montserratlight" style="font-weight: 400; font-size: 14px; line-height: 20px;">
														<?php echo $current_date->format( 'l, F j, Y' ); ?>
													</td>
												</tr>
											</tbody>
										</table>
									</th>
								</tr>
							</tbody>
						</table>
					</th>
					<th class="columnCollapse" align="right" width="290" style="font-family: Helvetica, Arial, sans-serif; color: #757575; padding-left: 0; padding-right: 0; padding-top: 5px; padding-bottom: 0; vertical-align: middle; text-align: center;"></th>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; padding-bottom: 20px; padding-top: 30px; padding-left: 0; padding-right: 0; text-align: left;" align="left">
			<h2 style="margin-top: 0; margin-bottom: 0; font-weight: normal;">Good <?php echo ( int )$current_date->format( 'G' ) >= 12 ? 'Afternoon' : 'Morning'; ?>, UCF.</h2>
		</td>
	</tr>
</table>
