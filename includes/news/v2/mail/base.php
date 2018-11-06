<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>Good
		<?php echo (int)date( 'G' ) >= 12 ? 'Afternoon' : 'Morning'; ?> UCF -
		<?php echo date( 'F j' ); ?>
	</title>
	<?php echo get_template_part( 'includes/news/v2/mail/style' ); ?>
</head>

<body style="background-color: #f1f1f1;">
  <table width="100%" align="center" style="width: 100% !important; table-layout: fixed;">
    <tbody>
      <tr>
        <td align="center" style="padding: 0;">
          <table class="wrapperOuter" width="640" align="center" style="background-color: #ffffff; width: 640px; margin-top: 0 !important; margin-bottom: 0; border-spacing: 0; border-collapse: collapse;">
            <tbody>
              <tr>
                <td align="center" style="padding: 0;">
					<table class="wrapperInner" width="600" align="center" style="border-spacing: 0; border-collapse: collapse;">
						<tbody>
							<tr>
								<td style="padding: 0;">
									<table class="tableCollapse" width="600" border="0" align="center" style="padding: 0; border-spacing: 0; border-collapse: collapse;">
										<tbody>
											<tr>
												<td style="padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: center;">
													<?php echo get_template_part( 'includes/news/v2/mail/header' ); ?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding: 0;">
									<table class="tableCollapse" width="600" border="0" align="center" style="padding: 0; border-spacing: 0; border-collapse: collapse;">
										<tbody>
											<tr>
												<td style="padding-bottom: 10px; padding-left: 0; padding-right: 0; text-align: center;">
													<?php echo get_template_part( 'includes/news/v2/mail/top-story' ); ?>
												</td>
											</tr>
											<?php echo get_template_part( 'includes/news/v2/mail/alert' ); ?>
											<tr>
												<td style="padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: center;">
													<?php echo get_template_part( 'includes/news/v2/mail/featured-stories' ); ?>
												</td>
											</tr>
											<tr>
												<td style="padding-top: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;">
													<?php echo get_template_part( 'includes/news/v2/mail/in-the-news' ); ?>
												</td>
											</tr>
											<tr>
												<td style="padding-top: 40px; padding-bottom: 0; padding-left: 0; padding-right: 0;">
													<?php echo get_template_part( 'includes/news/v2/mail/announcements' ); ?>
												</td>
											</tr>
											<?php echo get_template_part( 'includes/news/v2/mail/footer' ); ?>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>
