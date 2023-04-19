<?php

namespace Newsletter\Core\Subscribers;

class Item
{
    /*
* Fields:
*  - name
*  - surname
*  - phone
*  - mail
*/

    public function __construct()
    {
        add_action('add_meta_boxes', function () {
            add_meta_box(
                'subscriber-data',
                __('Dane subskrybenta', 'newsletterplugin'),
                array('Newsletter\Core\Subscribers\Edit', 'edit_subscriber_data'),
                'subscribers'
            );
        });
        register_post_meta('subscribers', 'nfe_subscriber_data', []);
    }

    public static function get_meta_of_subscribers()
    {
        global $post;
        return get_post_meta($post->ID, 'nfe_subscriber_data');
    }

    // public static function show_ 
}
