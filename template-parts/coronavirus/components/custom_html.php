<?php
namespace GMUCF\Theme\TemplateParts\Coronavirus\Components\CustomHTML;
use GMUCF\Theme\Includes\Coronavirus;


$row     = Coronavirus\get_current_row();
$content = Coronavirus\escape_chars( $row->custom_html );
?>
<tr>
	<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left; padding-bottom: 40px;" align="left">
		<?php echo $content; ?>
	</td>
</tr>
