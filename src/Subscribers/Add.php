<?php

namespace Newsletter\Core\Subscribers;


class Add
{
    public $name;
    public $surname;
    public $phone;
    public $email;

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
    }

    public function save()
    {
        $id = wp_insert_post([
            'post_title' => $this->name . ' ' . $this->surname,
            'post_type' => 'subscribers'
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
    }
}
