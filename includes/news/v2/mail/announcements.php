<table width="100%" border="0" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
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
				<p>No announcements found for today.</p>
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
		<td style="text-align: right; padding-bottom: 0; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
			<a href="<?php echo ANNOUNCEMENTS_MORE_URL; ?>">
				More Announcements</a>
			<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/external-icon.png" alt="" border="0" width="17" height="14">
		</td>
	</tr>
</table>
