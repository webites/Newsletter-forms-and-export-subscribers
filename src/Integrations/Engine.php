<?php
namespace NFES_Newsletter\Core\Integrations;
class Engine
{
    public function __construct(){
        register_setting('general', 'nfes_settings_integrations_enabled');
        self::use_enabled_integrations();
    }


    public static function switch_integration_state(bool $enable, string $integration_name)
    {
        $options = get_option('nfes_settings_integrations_enabled', false) ? get_option('nfes_settings_integrations_enabled', false) : [];
        $options[$integration_name] = $enable;
        if( update_option('nfes_settings_integrations_enabled', $options)){
            nfes_create_admin_notice(
                [
                    'text' => $enable ? __('Integracja została włączona ', 'newsletterplugin') : __('Integracja została wyłączona', 'newsletterplugin'),
                    'type' => 'success'
                ]
            );
        }
    }

    public static function use_enabled_integrations()
    {
        $enabled = get_option('nfes_settings_integrations_enabled', false) ? get_option('nfes_settings_integrations_enabled', false) : [];
        foreach ($enabled as $name => $integration) {
            if ($integration) {
                add_action('admin_menu', function() use ($name) {
                    add_submenu_page(
                        'nfes_settings_' . $name,
                        __($name . '- Ustawienia', 'newsletterplugin'),
                        __($name . '- Ustawienia', 'newsletterplugin'),
                        'manage_options',
                        'nfes_settings_' . $name,
                        function () use ($name) {
                            include_once ABSPATH . 'wp-content/plugins/newsletter-forms-and-export/src/Integrations/' . $name . '/templates/settings.php';
                        }
                    );
                }, 10, 2);
                require_once ABSPATH . 'wp-content/plugins/newsletter-forms-and-export/src/Integrations/' . $name . '/Init.php';
            }
        }
    }

    public static function get_all_integrations()
    {
        return glob(ABSPATH .'wp-content/plugins/newsletter-forms-and-export/src/Integrations/*/*.php');
    }
    public static function get_integrations_options()
    {
        return get_option('nfes_settings_integrations_enabled', false) ? get_option('nfes_settings_integrations_enabled', false) : [];
    }
}