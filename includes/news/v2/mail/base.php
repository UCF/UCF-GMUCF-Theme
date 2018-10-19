<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" type="text/css" href="https://s3.amazonaws.com/web.ucf.edu/email/common-assets/stylesheet.css">
  <title>Good
    <?php echo (int)date('G') >= 12 ? 'Afternoon' : 'Morning'; ?> UCF -
    <?php echo date('F j'); ?>
  </title>
  <?php echo get_template_part('includes/news/v2/mail/style'); ?>
</head>

<body>
  <table width="100%" align="center" style="width: 100% !important; table-layout: fixed;">
    <tbody>
      <tr>
        <td align="center" style="padding: 0;">
          <table class="wrapperOuter" width="640" align="center" style="width: 640px; margin-top: 20px; margin-bottom: 20px; border-spacing: 0; border-collapse: collapse;">
            <tbody>
              <tr>
                <td align="center" style="padding: 0;">
                  <table class="wrapperInner" width="600" align="center" style="border-spacing: 0; border-collapse: collapse;">
                    <tbody>
                      <?php echo get_template_part('includes/news/v2/mail/header'); ?>

                      <tr>
                        <td style="padding: 0;">
                          <table class="tableCollapse" width="600" border="0" align="center" style="padding: 0; border-spacing: 0; border-collapse: collapse;">
                            <tbody>
                              <tr>
                                <td style="padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: center; border-bottom: 0 solid #aaa;">
                                  <?php echo get_template_part('includes/news/v2/mail/top-story'); ?>
                                </td>
                              </tr>

                              <tr>
                                <td style="padding-bottom: 20px; padding-top: 20px; padding-left: 0; padding-right: 0; border-bottom: 1px solid #aaa;">
                                  <?php echo get_template_part('includes/news/v2/mail/featured-stories'); ?>
                                </td>
                              </tr>

                              <tr>
                                <td style="padding-bottom: 20px; padding-top: 20px; padding-left: 0; padding-right: 0; border-bottom: 1px solid #aaa;">
                                  <?php echo get_template_part('includes/news/v2/mail/events'); ?>
                                </td>
                              </tr>

                              <tr>
                                <td style="padding-bottom: 20px; padding-top: 20px; padding-left: 0; padding-right: 0; border-bottom: 1px solid #aaa;">
                                  <?php echo get_template_part('includes/news/v2/mail/announcements'); ?>
                                </td>
                              </tr>

                              <?php echo get_template_part('includes/news/v2/mail/footer'); ?>
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
