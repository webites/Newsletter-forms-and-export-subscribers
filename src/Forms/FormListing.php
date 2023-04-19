<?php

namespace Newsletter\Core\Forms;

use Newsletter\Core\Forms\EditForm;

class FormListing
{
    public function __construct()
    {
        self::create_cpt_newsletter_forms();
        new ItemForm;
        // if ('nfe_forms' == get_post_type()) {
        new EditForm;
        // }
    }

    protected function create_cpt_newsletter_forms()
    {

        add_action('init', function () {
            $labels = array(
                'name'                => _x('Formularze', 'Post Type General Name', 'newsletterplugin'),
                'singular_name'       => _x('Formularz', 'Post Type Singular Name', 'newsletterplugin'),
                'menu_name'           => __('Formularze', 'newsletterplugin'),
                'parent_item_colon'   => __('Formularz - rodzic', 'newsletterplugin'),
                'all_items'           => __('Wszyskie formularze', 'newsletterplugin'),
                'view_item'           => __('Zobacz formularz', 'newsletterplugin'),
                'add_new_item'        => __('Dodaj nowy formularz', 'newsletterplugin'),
                'add_new'             => __('Dodaj nowy', 'newsletterplugin'),
                'edit_item'           => __('Edytuj formularz', 'newsletterplugin'),
                'update_item'         => __('Zaktualizuj formularz', 'newsletterplugin'),
                'search_items'        => __('Wyszukaj', 'newsletterplugin'),
                'not_found'           => __('Nie znaleziono', 'newsletterplugin'),
                'not_found_in_trash'  => __('Nie znaleziono w koszu', 'newsletterplugin'),
            );

            $args = array(
                'label'               => __('formularze', 'newsletterplugin'),
                'description'         => __('Formularze - listing', 'newsletterplugin'),
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
                'show_in_rest'        => false,
                'menu_icon'           => 'dashicons-email'

            );

            register_post_type('nfe_forms', $args);
        });
    }
}
