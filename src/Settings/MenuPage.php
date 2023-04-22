<?php

namespace NFES_Newsletter\Core\Settings;

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
        include 'templates/settings_settings_page_export.php';
    }
}
