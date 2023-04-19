<?php

namespace Newsletter\Core\Subscribers;

class Listing
{
    public function __construct()
    {
        self::create_cpt_newsletter_subscribers();
        new Item;
        if ('subscribers' == get_post_type()) {
            new Edit;
        }
    }

    protected function create_cpt_newsletter_subscribers()
    {

        add_action('init', function () {
            $labels = array(
                'name'                => _x('Subskrybenci', 'Post Type General Name', 'newsletterplugin'),
                'singular_name'       => _x('Subskrybent', 'Post Type Singular Name', 'newsletterplugin'),
                'menu_name'           => __('Subskrybenci', 'newsletterplugin'),
                'parent_item_colon'   => __('PSubskrybent - rodzic', 'newsletterplugin'),
                'all_items'           => __('Wszyscy subskrybenci', 'newsletterplugin'),
                'view_item'           => __('Zobacz subskrybenta', 'newsletterplugin'),
                'add_new_item'        => __('Dodaj nowego subskrybenta', 'newsletterplugin'),
                'add_new'             => __('Dodaj nowego', 'newsletterplugin'),
                'edit_item'           => __('Edytuj subskrybenta', 'newsletterplugin'),
                'update_item'         => __('Zaktualizuj informacje', 'newsletterplugin'),
                'search_items'        => __('Wyszukaj', 'newsletterplugin'),
                'not_found'           => __('Nie znaleziono', 'newsletterplugin'),
                'not_found_in_trash'  => __('Nie znaleziono w koszu', 'newsletterplugin'),
            );

            $args = array(
                'label'               => __('subskrybenci', 'newsletterplugin'),
                'description'         => __('Subskrybenci - listing', 'newsletterplugin'),
                'labels'              => $labels,
                'supports'            => array('title'),
                // 'taxonomies'          => array( 'genres' ),

                'hierarchical'        => false,
                'public'              => false,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',
                'show_in_rest' => false,
                'menu_icon'          => 'dashicons-groups'

            );

            register_post_type('subscribers', $args);
        });
    }
}
