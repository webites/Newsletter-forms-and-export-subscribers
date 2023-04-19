<?php

use Newsletter\Core\Forms\ItemForm;

var_dump(ItemForm::get_meta_of_newsletter()); ?>
<form method="post" class="nfe_newsletter_edit_form">
    <table>
        <tr>
            <th><?php _e('Włączone/wyłączone', 'newsletterplugin') ?></th>
            <th><?php _e('Nazwa pola', 'newsletterplugin') ?></th>
            <th><?php _e('Typ pola', 'newsletterplugin') ?></th>
            <th><?php _e('Wyświetlana etykieta', 'newsletterplugin') ?></th>
            <th><?php _e('Podpowiedź (opcjonalne)', 'newsletterplugin') ?></th>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="nfe_newsletter_form[name][enabled]" id="nfe_newsletter_form_name_enabled" <?php if (isset($data['name']['enabled'])) {
                                                                                                                            echo $data['name']['enabled'] ? 'checked' : '';
                                                                                                                        } ?>>
            </td>
            <td><strong><?php _e('Imię', 'newsletterplugin') ?></strong></td>
            <td><i>text</i></td>
            <td><input type="text" name="nfe_newsletter_form[name][label]" id="nfe_newsletter_form_name_label" value="<?php if (isset($data['name']['label'])) {
                                                                                                                            $data['name']['label'] ? esc_attr_e($data['name']['label']) : '';
                                                                                                                        } ?>"></td>
            <td><textarea name="nfe_newsletter_form[name][text]" id="nfe_newsletter_form_name_text">
            <?php if (isset($data['name']['text'])) {
                $data['name']['text'] ? esc_attr_e($data['name']['text']) : '';
            }
            ?>
            </textarea></td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="nfe_newsletter_form[surname][enabled]" id="nfe_newsletter_form_surname_enabled" <?php if (isset($data['surname']['enabled'])) {
                                                                                                                                    echo $data['surname']['enabled'] ? 'checked' : '';
                                                                                                                                } ?>>
            </td>
            <td><strong><?php _e('Nazwisko', 'newsletterplugin') ?></strong></td>
            <td><i>text</i></td>
            <td><input type="text" name="nfe_newsletter_form[surname][label]" id="nfe_newsletter_form_surname_label" value="<?php if (isset($data['surname']['label'])) {
                                                                                                                                $data['surname']['label'] ? esc_attr_e($data['surname']['label'])  : '';
                                                                                                                            } ?>">
            </td>
            <td><textarea name="nfe_newsletter_form[surname][text]" id="nfe_newsletter_form_surname_text">
            <?php if (isset($data['surname']['text'])) {
                $data['surname']['text'] ? esc_attr_e($data['surname']['text']) : '';
            }
            ?>
            </textarea></td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="nfe_newsletter_form[phone][enabled]" id="nfe_newsletter_form_phone_enabled" <?php if (isset($data['phone']['enabled'])) {
                                                                                                                                echo $data['phone']['enabled'] ? 'checked' : '';
                                                                                                                            } ?>>
            </td>
            <td><strong><?php _e('Telefon', 'newsletterplugin') ?></strong></td>
            <td><i>tel</i></td>
            <td><input type="text" name="nfe_newsletter_form[phone][label]" id="nfe_newsletter_form_phone_label" value="<?php if (isset($data['phone']['label'])) {
                                                                                                                            $data['phone']['label'] ? esc_attr_e($data['phone']['label'])  : '';
                                                                                                                        } ?>">
            </td>
            <td><textarea name="nfe_newsletter_form[phone][text]" id="nfe_newsletter_form_phone_text">
            <?php if (isset($data['phone']['text'])) {
                $data['phone']['text'] ? esc_attr_e($data['phone']['text']) : '';
            }
            ?>
            </textarea></td>
        </tr>

        <tr>
            <td><input type="checkbox" name="nfe_newsletter_form[email][enabled]" id="nfe_newsletter_form_email_enabled" <?php if (isset($data['email']['enabled'])) {
                                                                                                                                echo $data['email']['enabled'] ? 'checked' : '';
                                                                                                                            } ?>>
            </td>
            <td><strong><?php _e('Email', 'newsletterplugin') ?></strong></td>
            <td><i>email</i></td>
            <td><input type="text" name="nfe_newsletter_form[email][label]" id="nfe_newsletter_form_email_label" value="<?php if (isset($data['email']['label'])) {
                                                                                                                            $data['email']['label'] ? esc_attr_e($data['email']['label'])  : '';
                                                                                                                        } ?>">
            </td>
            <td><textarea name="nfe_newsletter_form[email][text]" id="nfe_newsletter_form_email_text">
            <?php if (isset($data['email']['text'])) {
                $data['email']['text'] ? esc_attr_e($data['email']['text']) : '';
            }
            ?>
            </textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><strong><?php _e('Wyślij', 'newsletterplugin') ?></strong></td>
            <td><i>submit</i></td>
            <td><input type="text" name="nfe_newsletter_form[submit][label]" id="nfe_newsletter_form_email_label" value="<?php if (isset($data['submit']['label'])) {
                                                                                                                                $data['submit']['label'] ? esc_attr_e($data['submit']['label'])  : '';
                                                                                                                            } ?>">
            </td>
            <td></td>
        </tr>
    </table>
</form>