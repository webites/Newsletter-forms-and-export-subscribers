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
            <td><input type="checkbox" name="nfe_newsletter_form[name][enabled]" id="nfe_newsletter_form_name_enabled"><label for="nfe_newsletter_form_name_enabled"></label></td>
            <td><strong>Imię</strong></td>
            <td><i>text</i></td>
            <td><input type="text" name="nfe_newsletter_form[name][label]" id="nfe_newsletter_form_name_label"></td>
            <td><textarea name="nfe_newsletter_form[name][text]" id="nfe_newsletter_form_name_text"></textarea></td>
        </tr>

        <tr>
            <td><input type="checkbox" name="nfe_newsletter_form[surname][enabled]" id="nfe_newsletter_form_surname_enabled"><label for="nfe_newsletter_form_surname_enabled"></label></td>
            <td><strong>Nazwisko</strong></td>
            <td><i>text</i></td>
            <td><input type="text" name="nfe_newsletter_form[surname][label]" id="nfe_newsletter_form_surname_label"></td>
            <td><textarea name="nfe_newsletter_form[surname][text]" id="nfe_newsletter_form_surname_text"></textarea></td>
        </tr>

        <tr>
            <td><input type="checkbox" name="nfe_newsletter_form[phone][enabled]" id="nfe_newsletter_form_phone_enabled"><label for="nfe_newsletter_form_phone_enabled"></label></td>
            <td><strong>Telefon</strong></td>
            <td><i>tel</i></td>
            <td><input type="text" name="nfe_newsletter_form[phone][label]" id="nfe_newsletter_form_phone_label"></td>
            <td><textarea name="nfe_newsletter_form[phone][text]" id="nfe_newsletter_form_phone_text"></textarea></td>
        </tr>

        <tr>
            <td><input type="checkbox" name="nfe_newsletter_form[email][enabled]" id="nfe_newsletter_form_email_enabled"><label for="nfe_newsletter_form_email_enabled"></label></td>
            <td><strong>Email</strong></td>
            <td><i>email</i></td>
            <td><input type="text" name="nfe_newsletter_form[email][label]" id="nfe_newsletter_form_email_label"></td>
            <td><textarea name="nfe_newsletter_form[email][text]" id="nfe_newsletter_form_email_text"></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><strong>Wyślij</strong></td>
            <td><i>submit</i></td>
            <td><input type="text" name="nfe_newsletter_form[submit][label]" id="nfe_newsletter_form_email_label"></td>
            <td></td>
        </tr>
    </table>

    <input type="submit" value="wyslij">
</form>