<?php
use NFES_Newsletter\Core\Integrations\Mailchimp\Init;
if(!empty($_POST['mailchimp'])){
    Init::update_settings($_POST['mailchimp'], 'mailchimp');
}
$settings = Init::get_settings('mailchimp');
?>
<div class="nfes__admin-title nfes__admin-title--row">
    <div class=" nfes__breadcrumbs">
        <h1><?php _e('Integracje', 'newsletterplugin') ?> <span class="separator"> > </span> <span class="main"> <?php _e('Mailchimp', 'newsletterplugin') ?></span> </h1>
    </div>
</div>

<div class="nfes__admin-row">
    <h2><?php _e('Dane podstawowe', 'newsletterplugin'); ?></h2>
    <form method="post" class="nfes_column_form">
        <label for="mailchimp_key"><?php _e("Klucz API"); ?></label>
        <input type="text" name="mailchimp[key]" id="mailchimp_key" value="<?php echo !empty($settings['key']) ? esc_html( $settings['key'] ) : '' ?>">

        <label for="mailchimp_server"><?php _e("Serwer"); ?></label>
        <input type="text" name="mailchimp[server]" id="mailchimp_server" value="<?php echo !empty($settings['server']) ? esc_html( $settings['server'] ) : '' ?>">
        <input type="submit" value="Zapisz">
    </form>
</div>