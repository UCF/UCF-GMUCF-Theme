<?php
namespace GMUCF\Theme\TemplateParts\Coronavirus\Browser\Body;
use GMUCF\Theme\Includes\Coronavirus;


$content = Coronavirus\get_email_content();
if ( $content ) {
	foreach ( $content as $row ) {
		echo Coronavirus\display_row( $row );
	}
}
?>
