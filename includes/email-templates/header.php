<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="initial-scale=1.0">

  <!-- So that mobile webkit will display zoomed in -->
  <link rel="stylesheet" type="text/css" href="https://s3.amazonaws.com/web.ucf.edu/email/common-assets/stylesheet.css">
  <title>
    <?php the_title(); ?>
  </title>

  <?php get_template_part( 'includes/email-templates/css' ); ?>

  <?php if ( is_admin_bar_showing() ) : ?>
  <style>
    body {
      margin-top: 46px;
    }

    @media (min-width: 783px) {
      body {
        margin-top: 30px;
      }
    }
  </style>
  <?php endif; ?>
</head>

<body>

  <table class="t640" width="640" align="center">
    <tbody>
      <tr>
        <td style="padding: 0;">
          <img src="https://s3.amazonaws.com/web.ucf.edu/email/postmaster-templates/pro-banner.png" alt="UCF banner"
            class="responsiveimg">
        </td>
      </tr>
      <tr>
        <td>
          <table class="t564" width="564" align="center" style="padding-top: 15px;">
          <tbody>
            <tr>
              <td style="padding-bottom: 0;">
