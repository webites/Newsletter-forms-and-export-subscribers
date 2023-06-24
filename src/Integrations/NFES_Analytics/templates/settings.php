<?php
//use NFES_Newsletter\Core\Integrations\Mailchimp\Init;
//if(!empty($_POST['mailchimp'])){
//    Init::update_settings($_POST['nfes_analytics'], 'nfes_analytics');
//}
//$settings = Init::get_settings('nfes_analytics');
?>
<div class="nfes__admin-title nfes__admin-title--row">
    <div class=" nfes__breadcrumbs">
        <h1><?php _e('Integracje', 'newsletterplugin') ?> <span class="separator"> > </span> <span class="main"> <?php _e('Statystyki', 'newsletterplugin') ?></span> </h1>
    </div>
</div>
<?php nfes_admin_notice_display_general() ?>
<div class="nfes__admin-row">
    <h1>
        <?php _e('Już wkrótce więcej możliwości rozszerzenia statstyk.', 'newsletterplugin'); ?>
    </h1>
    <p>
        <?php _e('Jeżeli masz jakieś pomysły co moglibyśmy wdrożyć w tym module, napisz do nas na adres <u>dev@webites.pl</u>', 'newsletterplugin'); ?>
    </p>
    <p>
        <?php _e('Zapraszamy do feedbacku również marketerów, zarówno zawodowych, jak i hobbystycznych', 'newsletterplugin'); ?>
    </p>
    <p>
        <?php _e('Jeżeli potrzebujesz własnego rozszerzenia, lub czegoś nietypowego w tym pluginie napisz na <u>biuro@webites.pl</u>', 'newsletterplugin'); ?>
    </p>
</div>
