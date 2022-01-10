<?php
namespace GMUCF\Theme\TemplateParts\Impact\Components\Divider;
use GMUCF\Theme\Includes\Impact;


$row       = Impact\get_current_row();
$color     = $row->color ?? '#ffcc00';
$thickness = $row->thickness ?? '3px';
?>
<tr>
	<td style="padding-bottom: 40px;">
		<table style="text-align: center; width: 100%;" align="center">
			<tbody>
				<tr>
					<td style="text-align: left; border-bottom-style: solid; height: 0; line-height: 0; max-height: 0; min-height: 0; overflow: hidden; padding: 0; width: 100%; border-bottom-width: <?php echo $thickness; ?>; border-color: <?php echo $color; ?>;" width="100%" align="left"></td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
