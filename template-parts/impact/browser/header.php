<?php
namespace GMUCF\Theme\TemplateParts\Impact\Browser\Header;
use GMUCF\Theme\Includes\Impact;


$options                = Impact\fetch_options_data();
$title                  = isset( $options->title ) ? Impact\escape_chars( $options->title ) : '';
$header_img             = $options->header_image ?? null;
$header_img_utm_content = get_option( 'impact_header_utm_content' ) ?: '';
$header_img_url         = isset( $options->header_image_link ) ? Impact\format_url_utm_params( $options->header_image_link, $header_img_utm_content ) : null;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="initial-scale=1">

    <style type="text/css">
.ReadMsgBody {
  background-color: #fff;
  width: 100%;
}

.ExternalClass {
  background-color: #fff;
  width: 100%;
}

.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
  line-height: 100%;
}

* {
  zoom: 1;
}

body {
  margin: 0;
  padding: 0;
  -webkit-text-size-adjust: none;
  -ms-text-size-adjust: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

td,
th {
  padding: 0;
}

th {
  font-weight: normal;
}

a {
  color: #0262b6;
}

img {
  border: 0;
  border-style: none;
}
	</style>

	<style type="text/css">
@font-face {
  font-family: "UCF-Sans-Serif-Alt";
  font-style: normal;
  font-weight: 400;
  src: url("https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/ucfsansserifalt-medium-webfont.woff2") format("woff2"), url("https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/ucfsansserifalt-medium-webfont.woff") format("woff");
  mso-font-alt: 'Arial';}
@font-face {
  font-family: "UCF-Sans-Serif-Alt";
  font-style: normal;
  font-weight: 700;
  src: url("https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/ucfsansserifalt-bold-webfont.woff2") format("woff2"), url("https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/ucfsansserifalt-bold-webfont.woff") format("woff");
  mso-font-alt: 'Arial';}
@media (max-width: 640px) {
  .img-fluid {
    max-width: none !important;
    width: 100% !important;
  }

  .hide-mobile {
    display: none;
    font-size: 0;
    height: 0;
    line-height: 0;
    max-height: 0;
    max-width: 0;
    mso-hide: all;
    overflow: hidden;
    width: 0;
  }

  .show-mobile {
    display: block !important;
    font-size: initial !important;
    height: auto !important;
    line-height: initial;
    max-height: none !important;
    max-width: none !important;
    mso-hide: none !important;
    overflow: visible !important;
    width: auto !important;
  }

  .container-outer {
    margin: 0 !important;
    min-width: 0 !important;
    width: 100% !important;
  }

  .container-inner {
    border-left: 0 solid transparent !important;
    border-right: 0 solid transparent !important;
  }

  .container-inner {
    margin: 0 !important;
    min-width: 0 !important;
    padding-left: 15px;
    padding-right: 15px;
    width: 100% !important;
  }

  .mobile-column-collapse {
    border-left: 0 solid transparent !important;
    border-right: 0 solid transparent !important;
  }

  .mobile-column-collapse {
    margin-left: 0 !important;
    margin-right: 0 !important;
  }

  .mobile-column-collapse {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }

  .mobile-column-collapse {
    clear: both;
    display: block !important;
    float: left;
    overflow: hidden;
    width: 100% !important;
  }

  .w-50-desktop {
    width: 100% !important;
  }

  .w-75-desktop {
    width: 100% !important;
  }

  table {
    border-collapse: separate !important;
  }
}
	</style>

	<title><?php echo $title; ?></title>
</head>
<body>

	<table style="text-align: center; background-color: #eee; min-width: 100%; table-layout: fixed; width: 100%;" width="100%" bgcolor="#eee" align="center">
		<tbody>
			<tr>
				<td style="text-align: left;" align="left">
					<table class="container-outer" style="text-align: center; background-color: #fff; margin: auto; min-width: 640px; width: 640px;" width="640" bgcolor="#fff" align="center">
						<tbody>
							<?php if ( $header_img ): ?>
							<tr>
								<td style="text-align: left;" align="left">
									<?php if ( $header_img_url ): ?>
									<a href="<?php echo $header_img_url; ?>">
									<?php endif; ?>
										<img class="img-fluid" width="640" src="<?php echo $header_img; ?>" alt="TODO: Placeholder alt that describes what this email/image is" style="max-width: 100%;">
									<?php if ( $header_img_url ): ?>
									</a>
									<?php endif; ?>
								</td>
							</tr>
							<?php endif; ?>
							<tr>
								<td style="text-align: left;" align="left">
									<table class="container-inner" style="text-align: center; margin: auto; min-width: 580px; width: 580px;" width="580" align="center">
										<tbody>
											<tr>
												<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; text-align: left; padding-top: 25px; padding-bottom: 25px; font-size: 27px; letter-spacing: -0.025em; line-height: 1.3;" align="left">
													<?php echo $title; ?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
