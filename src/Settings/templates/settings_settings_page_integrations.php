<?php use \NFES_Newsletter\Core\Integrations\Engine; ?>
<?php
if(!empty($_POST['integrations'])){
    foreach ($_POST['integrations'] as $integration_name => $integration_state ){
        Engine::switch_integration_state($integration_state, $integration_name);
    }
}
?>

<div class="nfes__admin-title nfes__admin-title--row">
    <div class=" nfes__breadcrumbs">
        <h1><?php _e('Dodatki', 'newsletterplugin') ?> <span class="separator"> > </span> <span class="main"> <?php _e('Integracje', 'newsletterplugin') ?></span> </h1>
    </div>
</div>
<?php nfes_admin_notice_display_general();

$integrations_options = Engine::get_integrations_options();
?>
<div class="nfes_integrations">
<?php
foreach (Engine::get_all_integrations() as $integration){
    $integration_name = array_slice(explode("/", $integration), -2, 1)[0];
    $integration_info = call_user_func(["\NFES_Newsletter\Core\Integrations\\$integration_name\Init", "initialize"]);
    ?>
    <div class="card nfes_integration__single <?php echo $integrations_options[$integration_name] ? 'enabled' : 'disabled' ?>">
        <h2 class="title">
            <?php _e($integration_name, 'newsletterplugin') ?>
            <span class="version"><?php echo $integration_info['version'] ?></span>
            <img class="ratings-img" src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/newsletter-forms-and-export/assets/img/star-solid.svg' ?>" alt>
            <?php echo esc_html($integration_info['rating']) ?>
        </h2>
        <img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/newsletter-forms-and-export/src/Integrations/'.$integration_name.'/img/logo.png'; ?>" class="logotype" alt="<?php echo $integration_name ?>">
        <p>
            <?php esc_html_e( $integration_info['description'], 'newsletterplugin') ?>
        </p>
        <div class="buttons-row">
        <form method="post" class="button-when-disable">
            <input type="hidden" name="integrations[<?php echo $integration_name ?>]" value="<?php echo !$integrations_options[$integration_name] ?>">
            <?php
            if($integration_name == 'Mailchimp'){
                echo "<span class='integration-soon'>" . __('Integracja wkrótce', 'newsletterplugin') . "</span>";
            } else {
            ?>
            <input type="submit" value="<?php _e('Integruj', 'newsletterplugin'); ?>" class="button button-primary">
            <?php } ?>
        </form>
        <form method="post" class="button-when-enable">
            <input type="hidden" name="integrations[<?php echo $integration_name ?>]" value="<?php echo !$integrations_options[$integration_name] ?>">
            <input type="submit" value="<?php _e('Wyłącz integrację', 'newsletterplugin'); ?>" class="button button-primary">
        </form>
            <?php if($integration_info['url']){ ?>
                <a href="<?php echo $integration_info['url']  ?>" target="_blank" class="button button-when-disable"><?php _e('Załóż konto', 'newsletterplugin'); ?></a>
           <?php } ?>

        <a href="<?php echo get_bloginfo('wpurl') . '/wp-admin/admin.php?page=nfes_settings_' . $integration_name  ?>" class="button button-when-enable"><?php _e('Ustawienia integracji', 'newsletterplugin'); ?></a>
        </div>
    </div>
<?php } ?>
</div>
