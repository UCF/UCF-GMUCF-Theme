<?php
extract(get_top_story_details());
?>

<tr>
    <td style="padding-bottom: 20px; padding-top: 20px; padding-left: 0; padding-right: 0; border-bottom: 1px solid #aaa;">
        <table class="tableCollapse" width="600" border="0" align="center" style="border-spacing: 0; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="padding-left: 0; padding-right: 0;">
                        <a href="<?php echo $read_more_uri; ?>">
                            <img class="responsiveimg" border="0" style="border:none;" src="<?php echo $thumbnail_src; ?>" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="montserratbold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: bold; padding-top: 15px; padding-bottom: 4px; line-height: 1.1; color: #000; text-align: left;" align="left">
                    <a href="<?php echo $read_more_uri; ?>" style="color: #000; text-decoration: none;"><?php echo $story_title; ?></a>
                    </td>
                </tr>
                <tr>
                    <td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.4; color: #000; text-align: left;" align="left">
                    <?php echo $story_description; ?> 
                    <a href="<?php echo $read_more_uri; ?>" style="color: #006699; text-decoration: underline;"></br>Read More.</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>