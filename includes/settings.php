<h1>Teamleader Invoices</h1>
<p>Vul hieronder de instellingen in voor de automatische facturatie na het afwerken van een WooCommerce Bestelling.</p>
<p>Je kan deze gegevens opvragen via <a href="mailto:support@intago.be">support@intago.be</a>.</p>
<form method="post" action="options.php">
  <?php settings_fields('teamleader_settings'); ?>
  <?php do_settings_sections('teamleader_settings'); ?>
  <table class="form-table">
      <tr valign="top">
        <th scope="row">Endpoint:</th>
        <td><input type="text" name="teamleader_connect_endpoint" value="<?php echo get_option('teamleader_connect_endpoint'); ?>" /></td>
      </tr>
  </table>
  <?php submit_button(); ?>
</form>