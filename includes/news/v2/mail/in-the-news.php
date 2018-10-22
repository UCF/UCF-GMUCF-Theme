<tr>
  <td class="montserratbold" style="padding-top: 20px; padding-bottom: 2px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: bold; color: #000; text-transform: uppercase;" align="left">
	UCF In the News
	<div style="width: 35px; border-top: 3px solid #fc0; margin-top: 5px;"></div>
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
				<li style="padding-top: 8px; padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif; color: #000;" align="left">
                    <table>
                        <tbody>
                        <tr><td style="padding-bottom: 4px;">
                            <a style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; color: #000; font-weight: 100; letter-spacing: 1px; text-decoration: none;" href="<?php echo $story->url; ?>">
                                <?php echo $story->link_text;?>
                            </a>
                        </td></tr>
                        <tr><td style="padding-bottom: 4px;">
                            <a class="montserratbold" style="font-family: Helvetica, Arial, sans-serif; color: #888; text-decoration: none; text-transform: uppercase;" href="<?php echo $story->url; ?>">
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