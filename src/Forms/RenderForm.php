<?php

namespace NFES_Newsletter\Core\Forms;


class RenderForm
{
    public function __construct()
    {
        add_shortcode('nfe_newslerrer_form', function ($atts) {
            $query = new \WP_Query(['post_type' => 'nfe_forms', 'p' => $atts['id']]);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    $data = ItemForm::get_meta_of_newsletter()[0];

                    switch ($data['theme']) {
                        case 'inline':
                            return include ABSPATH . "wp-content/plugins/newsletter-forms-and-export/src/templates/forms-themes/inline.php";
                            break;

                        case 'default':
                            return include ABSPATH . "wp-content/plugins/newsletter-forms-and-export/src/templates/forms-themes/default.php";
                            break;
                    }



                endwhile;
                wp_reset_postdata();
            endif;
        }, 10, 1);
    }
}
