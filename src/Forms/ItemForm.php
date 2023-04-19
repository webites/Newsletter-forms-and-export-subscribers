<?php

namespace Newsletter\Core\Forms;

class ItemForm
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
                'form-data',
                __('Konfiguracja formularza', 'newsletterplugin'),
                array('Newsletter\Core\Forms\EditForm', 'edit_form_data'),
                'nfe_forms'
            );
        });
        add_action('add_meta_boxes', function () {
            add_meta_box(
                'shortcode-to-display-form',
                __('Wyświetl formularz za pomocą shortcode', 'newsletterplugin'),
                array('Newsletter\Core\Forms\EditForm', 'display_newsletter_from_shortcode'),
                'nfe_forms'
            );
        });
        register_post_meta('nfe_forms', 'nfe_newsletters_data', []);

        new RenderForm;
    }

    public static function get_meta_of_newsletter()
    {
        global $post;
        return get_post_meta($post->ID, 'nfe_newsletters_data');
    }

    // public static function show_ 
}
