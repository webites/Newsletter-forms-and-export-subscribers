<?php

namespace Newsletter\Core\Subscribers;


class Add
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
        $this->name = sanitize_text_field($posted_data['nfe_subscriber']['name']);
        $this->surname = sanitize_text_field($posted_data['nfe_subscriber']['surname']);
        $this->phone = sanitize_text_field($posted_data['nfe_subscriber']['phone']);
        $this->email = sanitize_email($posted_data['nfe_subscriber']['email']);
        $this->nonce = $posted_data['_wpnonce'];
        $this->post_id = $posted_data['post_id'];
    }

    public function save()
    {
        if (wp_verify_nonce($this->nonce, 'newslettder-form-' . $this->post_id)) {
            $id = wp_insert_post([
                'post_title' => $this->email . ' : ' . $this->name . ' ' . $this->surname,
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

            nfes_set_form_respond_msg("Prawidłowo zapisano do newslettera. Gratulujemy", "success");
        } else {
            nfes_set_form_respond_msg("Wystąpił błąd bezpieczenstwa", "warning");
        }
    }
}
