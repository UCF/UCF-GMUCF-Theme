<?php
namespace GMUCF\Theme\TemplateParts\Coronavirus\Components\Image;
use GMUCF\Theme\Includes\Coronavirus;


$row = Coronavirus\get_current_row();
$thumbnail = $row->thumbnail;
$alt       = esc_attr( $row->alt_text );
$href      = Coronavirus\format_url_utm_params( $row->links_to );

if ( $thumbnail ):
?>
<tr>
	<td style="padding-bottom: 40px;">
		<?php if ( $href ): ?>
		<a href="<?php echo $href; ?>">
		<?php endif; ?>
		<img class="img-fluid" src="<?php echo $thumbnail; ?>" alt="<?php echo $alt; ?>" style="max-width: 100%;">
		<?php if ( $href ): ?>
		</a>
		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
