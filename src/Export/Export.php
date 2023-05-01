<?php

namespace NFES_Newsletter\Core\Export;

use NFES_Newsletter\Core\Subscribers\SubscriberItem;

require_once ABSPATH . '/wp-includes/pluggable.php';

class Export
{
    public const DATA = [
        'name', 'surname', 'phone', 'email'
    ];
    const EXPORT_DIR = ABSPATH . '/subscribers';

    public static function get_subscribers_data()
    {
        $subscriber_data = [];
        $subscribers_list = new \WP_Query([
            'post_type' => 'subscribers',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ]);
        if ($subscribers_list->have_posts()) {

            while ($subscribers_list->have_posts()) {
                $subscribers_list->the_post();
                $subscriber_data[] = SubscriberItem::get_meta_of_subscriber_by_id(get_the_ID());
            }
            return $subscriber_data;
        } else {
            return null;
            // brak danych
        }
        // wp_reset_postdata();
    }

    public static function make_directory()
    {
        if (!is_dir(self::EXPORT_DIR)) {
            wp_mkdir_p(self::EXPORT_DIR);
            chmod(self::EXPORT_DIR, 0755);
        }
    }

    public static function make_file(string $extension = 'csv')
    {
        $timestamp = strtotime(date('c'));
        return fopen(self::EXPORT_DIR . "/subscribers-" . $timestamp . "." . $extension, "w");
    }

    public static function delete_export_file(string $file_name, string $extension = 'csv')
    {
        wp_delete_file(self::EXPORT_DIR  . '/subscribers-' . $file_name . '.' . $extension);
        set_transient(
            'export_data_result',
            [
                'text' => __('Usunięto plik eksportu', 'newsletterplugin'),
                'type' => 'success'
            ],
            600
        );
        $wp_url = get_bloginfo('wpurl');
        echo "<script>location.href = '".$wp_url."wp-admin/admin.php?page=nfes_settings_export';</script>";
    }
}
