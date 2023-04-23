<?php

use NFES_Newsletter\Core\Export\Export;
use NFES_Newsletter\Core\Export\ExportCsv;
?>
<div class="nfes__admin-title nfes__admin-title--row">
    <div class=" nfes__breadcrumbs">
        <h1><?php _e('Ustawienia newslettera', 'newsletterplugin') ?> <span class="separator"> > </span> <span class="main"> <?php _e('Eksport subskrybentów', 'newsletterplugin') ?></span> </h1>
    </div>
    <form action="/wp-admin/admin.php" method="get">
        <input type="hidden" name="page" value="nfes_settings_export">
        <input type="hidden" name="nfes_create_export" value="1">
        <input type="submit" value="Nowy eksport" class="nfes__button nfes__button--success">
    </form>
</div>
<?php nfes_admin_notice_display_export() ?>
<?php
$site_url = get_bloginfo('wpurl');
foreach (scandir(Export::EXPORT_DIR, 1) as $file) {
    $fileinfo = pathinfo(Export::EXPORT_DIR . "/" . $file);
    if ($fileinfo['extension'] == 'csv') {
?>
        <div class="nfes__admin-row nfes__admin-row--listing">
            <h4><?php echo date("d.m.Y H:i:s", filemtime(Export::EXPORT_DIR . "/" . $file)) ?></h4>
            <div class="nfes__export-link"><?php echo $site_url . "/subscribers/" . $file ?></div>
            <div class="nfes__admin-row__actions">
                <a href="<?php echo $site_url . "/subscribers/" . $file ?>" class="nfes__button nfes__button--info">Pobierz plik</a>
                <button class="nfes__button nfes__button--success nfes-export-button-show-link">Pokaz link</button>
                <form action="/wp-admin/admin.php" method="get">
                    <input type="hidden" name="page" value="nfes_settings_export">
                    <input type="hidden" name="nfes_delete_file" value="<?php echo filemtime(Export::EXPORT_DIR . "/" . $file) ?>">
                    <input type="submit" value="Usuń" class="nfes__button nfes__button--delete">
                </form>
            </div>
        </div>
<?php
    }
}
