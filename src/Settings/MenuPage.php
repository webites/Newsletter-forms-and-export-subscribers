<?php

namespace NFES_Newsletter\Core\Settings;

use NFES_Newsletter\Core\Export\Export;
use NFES_Newsletter\Core\Export\ExportCsv;

class MenuPage
{
    public function __construct()
    {

        add_action('admin_menu', function () {
            add_menu_page(
                __('Ustawienia newslettera', 'newsletterplugin'),
                __('Ustawienia newslettera', 'newsletterplugin'),
                'manage_options',
                'nfes_settings',
                [$this, 'main_settings_page'],
                'dashicons-admin-generic',
                65
            );

            add_submenu_page(
                'nfes_settings',
                __('Integracje', 'newsletterplugin'),
                __('Integracje', 'newsletterplugin'),
                'manage_options',
                'nfes_settings_integrations',
                [$this, 'settings_page_integrations']
            );

            add_submenu_page(
                'nfes_settings',
                __('Eksport subskrybentów', 'newsletterplugin'),
                __('Eksport subskrybentów', 'newsletterplugin'),
                'manage_options',
                'nfes_settings_export',
                [$this, 'settings_page_export']
            );

        });
    }

    public function main_settings_page()
    {
        include 'templates/settings_main_settings_page.php';
    }
    public function settings_page_export()
    {
        if (isset($_GET['nfes_delete_file'])) {
            ExportCsv::delete_export_file($_GET['nfes_delete_file']);
        } else if (isset($_GET['nfes_create_export']) && $_GET['nfes_create_export'] == 1) {
            ExportCsv::export_data();
        } else {
            include 'templates/settings_settings_page_export.php';
        }
    }
    public function settings_page_integrations()
    {
        include 'templates/settings_settings_page_integrations.php';
    }
}
