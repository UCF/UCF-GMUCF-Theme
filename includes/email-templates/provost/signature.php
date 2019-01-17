        </td>
      </tr>
      <tr>
        <td class="ccollapse100">
        <table class="tcollapse100" style="width: 100%;">
          <tbody>
          <tr>
            <td class="ccollapse100" valign="top" style="width: 88px; text-align: left; padding-bottom: 15px;"
            width="88px;">
            <img alt="UCF Provost" src="https://s3.amazonaws.com/web.ucf.edu/email/postmaster-templates/Dr-Elizabeth-Dooley-UCF-Provost-signature.jpg"
              style="display: inline-block; padding-right: 20px;">
            </td>
            <td class="ccollapse100">
            <table class="tcollapse100" style="width: 100%;">
              <tbody>
              <tr>
                <td class="montserratbold" style="width: 100%; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; padding-bottom: 2px;">Elizabeth
                A. Dooley <br>Provost and Vice President for Academic Affairs</td>
              </tr>
              </tbody>
            </table>
            </td>
          </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <?php get_template_part( 'includes/email-templates/footer' ); ?>
      </tbody>
    </table>
    </td>
  </tr>
  </tbody>
</table>
<?php
if (current_user_can('administrator') || current_user_can('editor')) {
  wp_footer();
}
?>
</body>
</html>
