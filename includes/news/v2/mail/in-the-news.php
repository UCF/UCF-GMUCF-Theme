<table class="tableCollapse" width="600" border="0" align="center" style="border-bottom: 3px solid #fc0; border-top: 3px solid #fc0; border-spacing: 0; border-collapse: collapse;">
	<tbody>
		<tr>
			<td class="montserratbold" style="padding-top: 40px; padding-bottom: 40px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: bold; color: #006699; text-transform: uppercase; letter-spacing: 1.3px;" align="left">
				<a href="<?php echo IN_THE_NEWS_MORE_URL; ?>" style="text-decoration: none;">UCF In the News</a>
			</td>
		</tr>
		<tr>
			<td>
				<?php
				$external = get_in_the_news_stories();

				if( count( $external ) == 0 ) { ?>
					<p class="montserratlight" style="margin: 0; font-family: Helvetica, Arial, sans-serif; font-weight: 400; padding-top: 10px; padding-bottom: 10px;">No stories found for today.</p>
				<?php
				} else {
					?>
					<ul style="list-style: none; padding-left: 0; margin: 0;">
					<?php
					foreach( $external as $story ) :
					?>
						<li style="padding-bottom: 30px;" align="left">
							<table>
								<tbody>
								<tr>
									<td style="padding-bottom: 4px;">
										<a class="montserratsemibold" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; color: #000000; font-weight: 500;" href="<?php echo $story->url; ?>">
											<?php echo $story->link_text; ?>
										</a>
									</td>
								</tr>
								<tr><td style="padding-top: 5px;">
									<a class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #757575; text-decoration: none; text-transform: uppercase;" href="<?php echo $story->url; ?>">
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
		<tr>
			<td class="montserratbold" style="text-align: right; padding-top: 20px; padding-bottom: 40px; padding-right: 0; padding-left: 0; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
				<a href="<?php echo IN_THE_NEWS_MORE_URL; ?>">
					More UCF In The News
				</a>
			</td>
		</tr>
	</tbody>
</table>
