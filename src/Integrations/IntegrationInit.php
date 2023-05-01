<?php
namespace NFES_Newsletter\Core\Integrations;
class IntegrationInit
{

    public static function register_integration_settings($integration_name)
    {
        register_setting('general', 'nfes_settings_integrations_' . $integration_name);
    }

    public static function update_settings($new_settings, $integration_name)
    {
        $sanitize = sanitize_option('nfes_settings_integrations_' . $integration_name, $new_settings);
        update_option('nfes_settings_integrations_' . $integration_name, $sanitize);
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