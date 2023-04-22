<?php

use NFES_Newsletter\Core\Export\Export;
use NFES_Newsletter\Core\Export\ExportCsv;

// $csv_data_file = ExportCsv::export_data();



?>
<div class="nfes__admin-title">
    <div class="nfes__breadcrumbs">
        <h1><?php _e('Ustawienia newslettera', 'newsletterplugin') ?> <span class="separator"> > </span> <span class="main"> <?php _e('Eksport subskrybentów', 'newsletterplugin') ?></span> </h1>
    </div>
</div>
<?php nfes_admin_notice_display_export() ?>
<?php
$site_url = get_bloginfo('wpurl');
foreach (scandir(Export::EXPORT_DIR, 1) as $file) {
    $fileinfo = pathinfo(Export::EXPORT_DIR . "/" . $file);
    if ($fileinfo['extension'] == 'csv') {
        // echo $fileinfo['extension'];
        // echo "<a href='" . $site_url . "/subscribers/" . $file . "'>" . filemtime(Export::EXPORT_DIR . "/" . $file) . "</a><br>";
?>
        <div class="nfes__admin-row nfes__admin-row--listing">
            <h4><?php echo date("d.m.Y H:i:s", filemtime(Export::EXPORT_DIR . "/" . $file)) ?></h4>
            <div class="nfes__admin-row__actions">
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
?>