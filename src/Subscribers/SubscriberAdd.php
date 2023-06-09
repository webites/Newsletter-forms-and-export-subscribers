<?php

namespace NFES_Newsletter\Core\Subscribers;

use NFES_Newsletter\Core\Subscribers\SubscriberItem;


class SubscriberAdd
{
    public $name;
    public $surname;
    public $phone;
    public $email;
    protected $nonce;
    protected $post_id;

    /*
    * @param array $posted data
    * @return void
    */
    public function __construct($posted_data)
    {
        $this->name = !empty($posted_data['nfe_subscriber']['name']) ? sanitize_text_field($posted_data['nfe_subscriber']['name']) : '';
        $this->surname = !empty($posted_data['nfe_subscriber']['surname']) ? sanitize_text_field($posted_data['nfe_subscriber']['surname']) : '';
        $this->phone = !empty($posted_data['nfe_subscriber']['phone']) ? sanitize_text_field($posted_data['nfe_subscriber']['phone']) : '';
        $this->email = sanitize_email($posted_data['nfe_subscriber']['email']);
        $this->nonce = $posted_data['_wpnonce'];
        $this->post_id = $posted_data['post_id'];
    }

    public function save()
    {
        if (wp_verify_nonce($this->nonce, 'newsletter-form-' . $this->post_id)) {
            if (!SubscriberItem::isset_subscriber_in_db($this->email)) {
                $id = wp_insert_post([
                    'post_title' => $this->email ,
                    'post_type' => 'subscribers',
                    'post_status' => 'publish'
                ]);
                update_post_meta(
                    $id,
                    'nfe_subscriber_data',
                    [
                        'name' => $this->name,
                        'surname' => $this->surname,
                        'phone' => $this->phone,
                        'email' => $this->email
                    ]
                );

                nfes_set_form_respond_msg(__("Prawidłowo zapisano do newslettera. Gratulujemy", 'newsletterplugin'), "success");
                do_action('nfes_subscriber_saved__success', [$id, $this->post_id]);
            } else {
                nfes_set_form_respond_msg(__("Taki adres istnieje juz na liście", 'newsletterplugin'), "info");
                do_action('nfes_subscriber_saved__duplicated', [null, $this->post_id]);
            }
        } else {
            nfes_set_form_respond_msg(__("Wystąpił błąd bezpieczenstwa", 'newsletterplugin'), "warning");
            do_action('nfes_subscriber_saved__security_error', [null, $this->post_id]);
        }
    }
}
