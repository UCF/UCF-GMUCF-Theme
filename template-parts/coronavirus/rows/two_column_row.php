<?php
namespace GMUCF\Theme\TemplateParts\Coronavirus\Components\TwoColRow;
use GMUCF\Theme\Includes\Coronavirus;


$row = Coronavirus\get_current_row();
?>
<tr>
	<td>
		<table class="container-inner" style="text-align: center; margin: auto; min-width: 580px; width: 580px;" width="580" align="center">
			<tbody>
				<tr>
					<th class="mobile-column-collapse" style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left; padding-right: 15px; width: 50%; vertical-align: top;" width="50%" valign="top"  align="left">
						<table>
							<tbody>
								<?php
								foreach ( $row->column_1_contents as $subrow ) {
									echo Coronavirus\display_component( $subrow, 'two_column_row' );
								}
								?>
							</tbody>
						</table>
					</th>
					<th class="mobile-column-collapse" style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left; padding-left: 15px; width: 50%; vertical-align: top;" width="50%" valign="top"  align="left">
						<table>
							<tbody>
								<?php
								foreach ( $row->column_2_contents as $subrow ) {
									echo Coronavirus\display_component( $subrow, 'two_column_row' );
								}
								?>
							</tbody>
						</table>
					</th>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
