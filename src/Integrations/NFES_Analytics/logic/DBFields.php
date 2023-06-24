<?php

namespace NFES_Newsletter\Core\Integrations\NFES_Analytics\Logic;

class DBFields
{
    public function __construct(){
        register_post_meta('nfe_forms', 'nfe_form_analytics', []);

        add_action('nfes_subscriber_saved__success', function ($data){
            $current = get_post_meta($data[1], 'nfe_form_analytics', true) ? get_post_meta($data[1], 'nfe_form_analytics', true) : [];
            $current[time()] = [
                'subscriber_id' => $data[0],
                'result' => 'success',
                'date' => time()
            ];
            update_post_meta($data[1], 'nfe_form_analytics', $current);
        },10, 2);

        add_action('nfes_subscriber_saved__duplicated', function ($data){
            $current = get_post_meta($data[1], 'nfe_form_analytics', true) ? get_post_meta($data[1], 'nfe_form_analytics', true) : [];
            $current[time()] = [
                'subscriber_id' => $data[0],
                'result' => 'duplicated',
                'date' => time()
            ];
            update_post_meta($data[1], 'nfe_form_analytics', $current);
        },10, 2);

        add_action('nfes_subscriber_saved__security_error', function ($data){
            $current = get_post_meta($data[1], 'nfe_form_analytics', true) ? get_post_meta($data[1], 'nfe_form_analytics', true) : [];
            $current[time()] = [
                'subscriber_id' => $data[0],
                'result' => 'security_error',
                'date' => time()
            ];
            update_post_meta($data[1], 'nfe_form_analytics', $current);
        },10, 2);

    }

}