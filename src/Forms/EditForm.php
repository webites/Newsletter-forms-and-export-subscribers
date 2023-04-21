<?php

namespace Newsletter\Core\Forms;

use Newsletter\Core\Forms\ItemForm;

/*
* Edit Form class for service editing cpt - Form
*
* 
*/

class EditForm
{
    public function __construct()
    {
        add_action('save_post', function () {
            if (isset($_POST) && !!$_POST['nfe_newsletter_form']) {
                global $post;

                $sanitized_data = self::sanitizing_data_before_save($_POST['nfe_newsletter_form']);

                update_post_meta($post->ID, 'nfe_newsletters_data', $sanitized_data);
            }
        });
    }

    public static function edit_form_data()
    {
        $data = ItemForm::get_meta_of_newsletter()[0];
        // var_dump($data);
        if (!empty($data)) {
            include ABSPATH . "wp-content/plugins/newsletter-forms-and-export/src/templates/newsletter-form.php";
        } else {
            include ABSPATH . "wp-content/plugins/newsletter-forms-and-export/src/templates/newsletter-form-clean.php";
        }
    }

    public static function display_newsletter_from_shortcode()
    {
        global $post;
        echo '[nfe_newslerrer_form id="' . $post->ID . '"]';
    }

    protected static function sanitizing_data_before_save($posted_data): array
    {
        // settings

        $sanitized_data['header'] = sanitize_text_field($posted_data['header']);
        $sanitized_data['description'] = sanitize_text_field($posted_data['description']);
        $sanitized_data['theme'] = sanitize_text_field($posted_data['theme']);


        // name
        $sanitized_data['name']['enabled'] = sanitize_text_field($posted_data['name']['enabled']);
        $sanitized_data['name']['label'] = sanitize_text_field($posted_data['name']['label']);
        $sanitized_data['name']['text'] = sanitize_textarea_field($posted_data['name']['text']);

        // surname
        $sanitized_data['surname']['enabled'] = sanitize_text_field($posted_data['surname']['enabled']);
        $sanitized_data['surname']['label'] = sanitize_text_field($posted_data['surname']['label']);
        $sanitized_data['surname']['text'] = sanitize_textarea_field($posted_data['surname']['text']);

        // phone
        $sanitized_data['phone']['enabled'] = sanitize_text_field($posted_data['phone']['enabled']);
        $sanitized_data['phone']['label'] = sanitize_text_field($posted_data['phone']['label']);
        $sanitized_data['phone']['text'] = sanitize_textarea_field($posted_data['phone']['text']);

        // email
        $sanitized_data['email']['enabled'] = sanitize_text_field($posted_data['email']['enabled']);
        $sanitized_data['email']['label'] = sanitize_text_field($posted_data['email']['label']);
        $sanitized_data['email']['text'] = sanitize_textarea_field($posted_data['email']['text']);

        // accept

        $sanitized_data['accept']['text'] = sanitize_textarea_field($posted_data['accept']['text']);

        // submit
        $sanitized_data['submit']['label'] = sanitize_text_field($posted_data['submit']['label']);

        return $sanitized_data;
    }
}
