<?php

namespace NFES_Newsletter\Core\Integrations\NFES_Analytics;

use NFES_Newsletter\Core\Integrations\IntegrationInit;
use NFES_Newsletter\Core\Integrations\NFES_Analytics\Logic\DBFields;
use NFES_Newsletter\Core\Integrations\NFES_Analytics\Logic\MetaBoxes;

class Init extends IntegrationInit
{
    const SLUG = 'nfes_analytics';
    const NAME = "NFES_Analytics";
    public string $url;
    public string $version;
    public string $description;
    public int $rating;

    public function __construct(){


    }
    public static function initialize() : array
    {
        return [
            'name' => __("Statystyki","newsletterplugin"),
            'url' => "",
            'version' => "0.9",
            'description' => __("Proste statystyki dla formularzy zapisu subskrybentów dostępne od ręki. Włącz, jeżeli chcesz nalizować, które z formularzy są skuteczniejsze,, lub prowadzić testy A/B.", "newsletterplugin"),
            'rating' => 5,
        ];
    }

    public static function logic()
    {
        new MetaBoxes();
        new DBFields();



    }



}