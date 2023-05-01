<?php


namespace NFES_Newsletter\Core\Integrations\Mailchimp;

use NFES_Newsletter\Core\Integrations\IntegrationInit;

class Init extends IntegrationInit
{
    const SLUG = 'mailchimp';
    public string $name;
    public string $url;
    public string $version;
    public string $description;
    public int $rating;

    public function __construct(){


    }
    public static function initialize() : array
    {
        return [
        'name' => "Mailchimp",
        'url' => "https://mailchimp.com/pricing/marketing/",
        'version' => "0.9",
        'description' => __("Integruj swoje kontakty z jednym z najpopularniejszych serwisów do wysyłki maili, który oferuje automatyzacje tych procesów za pomocą prostych scenariuszy."),
        'rating' => 5,
        ];
    }

    public static function logic()
    {
        parent::register_integration_settings(self::SLUG);

    }


}
