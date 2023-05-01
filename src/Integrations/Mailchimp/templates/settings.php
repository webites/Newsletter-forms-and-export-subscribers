<?php var_dump($_POST); ?>
<?php
if(!empty($_POST['mailchimp'])){
    \NFES_Newsletter\Core\Integrations\Mailchimp\Init::update_settings($_POST['mailchimp'], 'mailchimp');
}
?>
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
        <input type="text" name="mailchimp[key]" id="mailchimp_key">

        <label for="mailchimp_server"><?php _e("Serwer"); ?></label>
        <input type="text" name="mailchimp[server]" id="mailchimp_server">
        <input type="submit" value="Zapisz">
    </form>
</div>