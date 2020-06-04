<?php
/**
 * Creates the markup for a row containing the given top story.
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @param object $content Contains the Top Story's content.
 * @param bool $social_share Used to display the social share links if true.
 * @return string The HTML for the provided top story.
 */
function gmucf_top_story_markup( $content, $social_share ) {
	$story_permalink   = $content->gmucf_story_permalink;
	$story_image       = $content->gmucf_story_image;
	$story_title       = $content->gmucf_story_title;
	$story_description = $content->gmucf_story_description;

	ob_start();
?>
	<tr>
		<td style="padding-bottom: 45px; padding-left: 0; padding-right: 0; text-align: center;">
			<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
				<tr>
					<td style="padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 0; border: 0;">
						<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
							<tbody>
								<tr>
									<td style="padding-left: 0; padding-right: 0;">
										<a href="<?php echo $story_permalink . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
											<img class="responsiveimg" border="0" width="600" style="border:none; max-width: 600px;" src="<?php echo $story_image; ?>" />
										</a>
									</td>
								</tr>
								<tr>
									<td class="montserratsemibold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 500; padding-top: 20px; padding-bottom: 15px; line-height: 1.4; color: #000; text-align: left;" align="left">
										<a href="<?php echo $story_permalink . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
											<?php echo $story_title; ?>
										</a>
									</td>
								</tr>
								<tr>
									<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #000; text-align: left;" align="left">
										<a href="<?php echo $story_permalink . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
											<?php echo strip_tags( $story_description ); ?>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<?php if ( $social_share ) : ?>
					<tr>
						<td style="padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 0; border: 0;">
							<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
								<tbody>
									<?php echo display_social_share( $story_permalink, $story_title ); ?>
								</tbody>
							</table>
						</td>
					</tr>
				<?php endif; ?>
			</table>
		</td>
	</tr>
<?php
	return ob_get_clean();
}


/**
 * Creates the markup for a row containing the given two featured stories.
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @param array $content Contains the content for the two given featured stories.
 * @param bool $social_share Used to display the social share links if true.
 * @param bool $more_stories_link Used to display the 'More UCF Stories' link if true.
 * @return string The HTML for the two featured stories in a row.
 */
function gmucf_featured_stories_row_markup( $stories, $social_share, $more_stories_link ) {
	ob_start();
?>
	<tr>
		<td style="padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: center;">
			<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
				<tr>
					<td style="padding-top: 0; padding-left: 0; padding-right: 0;">
						<table align="center" style="width: 100%; border-spacing: 0; border-collapse: collapse;">
							<tbody>
								<tr>
									<?php foreach ( $stories as $story ) {
										echo gmucf_featured_story_markup( $story, $social_share );
									} ?>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<?php if ( $more_stories_link ) : ?>
					<tr>
						<td class="montserratbold" style="text-align: right; padding-top: 0; padding-bottom: 50px; padding-right: 10px; padding-left: 10px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-transform: uppercase;" align="right">
							<a href="<?php echo MAIN_SITE_STORIES_MORE_URL; ?>">
								More UCF Stories
							</a>
						</td>
					</tr>
				<?php endif; ?>
			</table>
		</td>
	</tr>
<?php
	return ob_get_clean();
}


/**
 * Creates the markup for a single featured story.
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @param object $content Contains the content for the given featured story.
 * @param bool $social_share Used to display the social share links if true.
 * @return string The HTML for the featured story.
 */
function gmucf_featured_story_markup( $content, $social_share ) {
	$story_permalink   = $content->gmucf_story_permalink;
	$story_image       = $content->gmucf_story_image;
	$story_title       = $content->gmucf_story_title;
	$story_description = $content->gmucf_story_description;

	ob_start();
?>
	<th class="columnCollapse" align="left" width="290" style="font-family: Helvetica, Arial, sans-serif; padding-left: 10px; padding-right: 10px; padding-top: 0; padding-bottom: 45px; vertical-align: top; text-align: center;">
		<table class="tableCollapse" width="100%" style="width: 100%; border-spacing: 0; border-collapse: collapse;"><tbody>
			<tr>
				<td>
					<table width="100%" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
						<tbody>
							<tr>
								<td style="padding-left: 0; padding-right: 0;">
									<a href="<?php echo $story_permalink . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
										<img class="responsiveimg" border="0" width="290" style="border:none;" src="<?php echo $story_image; ?>" />
									</a>
								</td>
							</tr>
							<tr>
								<td class="montserratsemibold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 19px; font-weight: 500; padding-top: 20px; padding-bottom: 15px; line-height: 1.3; color: #000; text-align: left;" align="left">
									<a href="<?php echo $story_permalink . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
										<?php echo $story_title; ?>
									</a>
								</td>
							</tr>
							<tr>
								<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 1.6; color: #000; text-align: left;" align="left">
									<a href="<?php echo $story_permalink . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
										<?php echo strip_tags( $story_description ); ?>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<?php if ( $social_share ) : ?>
				<?php echo display_social_share( $story_permalink, $story_title ); ?>
			<?php endif; ?>
		</table>
	</th>
<?php
	return ob_get_clean();
}


/**
 * Creates the markup for a spotlight.
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @param object $content Contains the content for the given spotlight.
 * @return string The HTML for the spotlight.
 */
function gmucf_spotlight_markup( $content ) {
	$spotlight_image = $content->gmucf_spotlight_image;
	$spotlight_link  = $content->gmucf_spotlight_link;
	$spotlight_alt   = $content->gmucf_spotlight_alt_text;

	ob_start();
?>
	<tr>
		<td style="padding-bottom: 50px; padding-left: 0; padding-right: 0; text-align: center;">
			<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
				<tr>
					<td style="padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 0; border: 0;">
						<table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
							<tbody>
								<tr>
									<td style="padding-left: 0; padding-right: 0;">
										<a href="<?php echo $spotlight_link . ANALYTICS_PARAMS; ?>" style="color: #000; text-decoration: none;">
											<img class="responsiveimg" border="0" width="600" style="border:none; max-width: 600px;" src="<?php echo $spotlight_image; ?>" alt="<?php echo $spotlight_alt; ?>" />
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php
	return ob_get_clean();
}


/**
 * Counts the number of specified content types that are in
 * the GMUCF email content.
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @param array $contents Contains the GMUCF email contents.
 * @param string $layout_to_count The layout type to count. Example: 'gmucf_top_story'.
 * @return int $count The count of the number of specified content types in the email content.
 */
function gmucf_get_content_type_count( $contents, $layout_to_count ) {
	$count = 0;

	foreach ( $contents as $content ) {
		$layout = $content->gmucf_layout;

		if ( $layout === $layout_to_count ) {
			$count++;
		}
	}

	return $count;
}


/**
 * Loops through the given email content and echos out
 * different layouts for each type of content.
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @param array $content Contains the GMUCF Email content.
 */
function gmucf_email_markup( $content ) {
	$social_share = $content->gmucf_show_social_share_buttons;
	$contents     = $content->gmucf_email_content;

	$top_story_row_count = 0;

	$featured_stories_row_final_count = gmucf_get_content_type_count( $contents, 'gmucf_featured_stories_row' );
	$featured_stories_row_count       = 0;

	foreach ( $contents as $content ) {
		$layout = $content->gmucf_layout;

		if ( $layout === 'gmucf_top_story' ) {
			$top_story_row_count++;

			echo gmucf_top_story_markup( $content, $social_share );

			// The alert is always displayed after the first top story
			if ( $top_story_row_count === 1) {
				echo get_template_part( 'includes/news/mail/alert' );
			}
		}

		if ( $layout === 'gmucf_featured_stories_row' ) {
			$featured_stories_row_count++;

			// Only sets the $more_stories_link var to true if this is the last row of featured stories displayed
			if ( $featured_stories_row_count != $featured_stories_row_final_count ) {
				$more_stories_link = false;
			} else {
				$more_stories_link = true;
			}

			echo gmucf_featured_stories_row_markup( $content->gmucf_featured_story_row, $social_share, $more_stories_link );
		}

		if ( $layout === 'gmucf_spotlight' ) {
			echo gmucf_spotlight_markup( $content );
		}
	}
}


function display_social_share( $permalink, $title ) {
	ob_start();
	$title = urlencode( $title );
	?>
	<tr>
		<td class="montserratlight" style="padding-top: 25px; padding-left: 0; padding-right: 0; text-align: right;" align="right">
			<span class="montserratlight" style="color: #757575; font-family: Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; vertical-align: top; padding-right: 6px;">Share: </span>
			<a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" style="display: inline-block; height: 20px; width: 20px; padding-right: 6px;"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/facebook-share.png" alt="Share on Facebook" width="20" height="20"></a>
			<a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $permalink; ?>" style="display: inline-block; height: 20px; width: 20px; padding-right: 6px;"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/twitter-share.png" alt="Share on Twitter" width="20" height="20"></a>
			<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $permalink; ?>&title=<?php echo $title; ?>&source=ucf.edu" style="display: inline-block; height: 20px; width: 20px;"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/linkedin-share.png" alt="Share on LinkedIn" width="20" height="20"></a>
		</td>
	</tr>
	<?php
	return ob_get_clean();
}
