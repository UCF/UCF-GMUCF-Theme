<?php
namespace GMUCF\Theme\TemplateParts\Impact\Components\CustomHTML;
use GMUCF\Theme\Includes\Impact;


$current_date = current_datetime();
$row          = Impact\get_current_row();
$content      = Impact\escape_chars( Impact\apply_link_utm_params( $row->custom_html, $current_date->format( 'Y-m-d' ) ) );
?>
<tr>
	<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left; padding-bottom: 40px;" align="left">
		<?php echo $content; ?>
	</td>
</tr>
