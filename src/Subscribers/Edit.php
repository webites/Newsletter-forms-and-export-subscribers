<?php

namespace Newsletter\Core\Subscribers;

use Newsletter\Core\Subscribers\Item;

class Edit
{
    public function __construct()
    {
        add_action('save_post', function () {
            if (isset($_POST)) {
                global $post;
                $sanitized_data['name'] = sanitize_text_field($_POST['nfe_subscriber_data']['name']);
                $sanitized_data['surname'] = sanitize_text_field($_POST['nfe_subscriber_data']['surname']);
                $sanitized_data['phone'] = sanitize_text_field($_POST['nfe_subscriber_data']['phone']);
                $sanitized_data['email'] = sanitize_email($_POST['nfe_subscriber_data']['email']);
                update_post_meta($post->ID, 'nfe_subscriber_data', $sanitized_data);
            }
        });
    }

    public static function edit_subscriber_data()
    {
        $data = Item::get_meta_of_subscribers()[0];
        if (!empty($data)) {
            include ABSPATH . "wp-content/plugins/newsletter-forms-and-export/src/templates/subscriber-form.php";
        } else {
            include ABSPATH . "wp-content/plugins/newsletter-forms-and-export/src/templates/subscriber-form-clean.php";
        }
    }
}
