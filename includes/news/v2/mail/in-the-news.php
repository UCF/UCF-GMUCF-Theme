<table width="100%" border="0" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td class="montserratbold" style="padding-top: 0; padding-bottom: 2px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: bold; color: #000; text-transform: uppercase;" align="left">
			UCF In the News
		</td>
	</tr>
	<tr>
		<td>
			<?php
			$external = get_in_the_news_stories();

			if( count( $external ) == 0 ) { ?>
				<p>No stories found for today.</p>
			<?php
			} else {
				?>
				<ul style="list-style: none; padding-left: 0;">
				<?php
				foreach( $external as $story ) :
				?>
					<li style="padding-top: 8px; padding-bottom: 8px;" align="left">
						<table>
							<tbody>
							<tr><td style="padding-bottom: 4px;">
								<a class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 1px;" href="<?php echo $story->url; ?>">
									<?php echo $story->link_text; ?>
								</a>
							</td></tr>
							<tr><td style="padding-bottom: 4px;">
								<a class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #888; text-decoration: none; text-transform: uppercase;" href="<?php echo $story->url; ?>">
									<?php echo $story->source; ?>
								</a>
							</td></tr>
							</tbody>
						</table>
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
</table>
