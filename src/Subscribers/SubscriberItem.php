<?php

namespace NFES_Newsletter\Core\Subscribers;

class SubscriberItem
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
                array('NFES_Newsletter\Core\Subscribers\SubscriberEdit', 'edit_subscriber_data'),
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
    public static function get_meta_of_subscriber_by_id(int $id)
    {
        return get_post_meta($id, 'nfe_subscriber_data', true) ? get_post_meta($id, 'nfe_subscriber_data', true) : [];
    }

    public static function isset_subscriber_in_db(string $email): bool
    {
        $isset = false;
        $subscribers_list = new \WP_Query(['post_type' => 'subscribers']);
        if ($subscribers_list->have_posts()) {

            while ($subscribers_list->have_posts()) {
                $subscribers_list->the_post();
                $subscriber_data = self::get_meta_of_subscriber_by_id(get_the_ID());
                if ($email == $subscriber_data['email']) {
                    $isset = true;
                }
            }
        } else {
            nfes_set_form_respond_msg(__("Wystąpił błąd formularza", 'newsletterplugin'), 'warning');
            $isset = true;
        }
        wp_reset_postdata();
        return $isset;
    }
}
