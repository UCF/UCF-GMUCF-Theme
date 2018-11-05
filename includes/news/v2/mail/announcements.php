<table class="tableCollapse" width="600" border="0" align="center" style="border-bottom: 3px solid #fc0; border-spacing: 0; border-collapse: collapse;">
	<tbody>
		<tr>
			<td class="montserratbold" style="padding-top: 0; padding-bottom: 2px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: bold; color: #000; text-transform: uppercase;" align="left">
				<a style="text-decoration: none; color: #000;" href="https://www.ucf.edu/announcements/">Announcements</a>
			</td>
		</tr>

		<tr>
			<td>
				<?php
				$announcements = get_announcement_details();

				if( count( $announcements ) == 0 ) { ?>
					<p class="montserratlight" style="margin: 0; font-family: Helvetica, Arial, sans-serif; font-weight: 400; padding-top: 10px; padding-bottom: 10px;">No announcements found for today.</p>
				<?php
				} else {
					?>
					<ul style="list-style: none; padding-left: 0;">
					<?php
					foreach( $announcements as $announcement ) :
						extract( $announcement );
					?>
						<li class="montserratlight" style="padding-top: 8px; padding-bottom: 8px; font-family: Helvetica, Arial, sans-serif; font-size: 18px; color: #000;" align="left">
							<a href="<?php echo $permalink; ?>">
								<?php echo $title; ?>
							</a>
						</li>
					<?php
					endforeach;
					?>
					</ul>
					<?php
				}
				?>
			</td>
		</tr>

		<tr>
			<td class="montserratbold" style="text-align: right; padding-top: 26px; padding-bottom: 20px; padding-right: 0; padding-left: 0; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
				<a href="<?php echo ANNOUNCEMENTS_MORE_URL; ?>">
					More Announcements
				</a>
			</td>
		</tr>
	</tbody>
</table>
