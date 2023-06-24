<?php

namespace NFES_Newsletter\Core\Integrations\NFES_Analytics\Logic;
class MetaBoxes
{
    public function __construct(){
        add_action('add_meta_boxes', function () {
            add_meta_box(
                'nfes-analytics-form-stat-box',
                __('Statystyki formularza', 'newsletterplugin'),
                array($this, 'box_form_display_analytics'),
                'nfe_forms'
            );
        });
    }

    public function box_form_display_analytics(){
        include ABSPATH . 'wp-content/plugins/newsletter-forms-and-export/src/Integrations/NFES_Analytics/templates/form_analytics.php';
    }
}