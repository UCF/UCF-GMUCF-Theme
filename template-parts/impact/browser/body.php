<?php
namespace GMUCF\Theme\TemplateParts\Impact\Browser\Body;
use GMUCF\Theme\Includes\Impact;


$content = Impact\get_email_content();
if ( $content ) {
	foreach ( $content as $row ) {
		echo Impact\display_row( $row );
	}
}
?>
