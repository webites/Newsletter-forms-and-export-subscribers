<?php
namespace NFES_Newsletter\Core\Integrations;
class IntegrationInit
{

    public static function register_integration_settings($integration_slug, $integration_name)
    {
        register_setting('general', 'nfes_settings_integrations_' . $integration_slug);
        $options = get_option('nfes_settings_integrations_enabled', false);
        if(empty($options[$integration_name])){
            $options[$integration_name] = 0;
            update_option('nfes_settings_integrations_enabled', $options);
        }
    }

    public static function update_settings($new_settings, $integration_name)
    {
        $sanitize = sanitize_option('nfes_settings_integrations_' . $integration_name, $new_settings);
        if(update_option('nfes_settings_integrations_' . $integration_name, $sanitize)){
            nfes_create_admin_notice(
            [
                'text' => __('Ustawienia pomyślnie zapisane', 'newsletterplugin'),
                'type' => 'success'
            ]);
        }

    }

    /**
     * @param $integration - integration slug
     * @return false|mixed|null
     */
    public static function get_settings($integration)
    {
        return get_option('nfes_settings_integrations_' . $integration , true);
    }

}