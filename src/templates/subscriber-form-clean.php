<form method="post" class="nfe_subscriber_edit_form">
    <div class="nfe_subscriber_edit_form__row">
        <label for="nfe_subscriber_data_name"><?php _e('Imię', 'newsletterplugin') ?></label>
        <input type="text" name="nfe_subscriber_data[name]" id="nfe_subscriber_data_name">
    </div>

    <div class="nfe_subscriber_edit_form__row">
        <label for="nfe_subscriber_data_name"><?php _e('Nazwisko', 'newsletterplugin') ?></label>
        <input type="text" name="nfe_subscriber_data[surname]" id="nfe_subscriber_data_surname">
    </div>

    <div class="nfe_subscriber_edit_form__row">
        <label for="nfe_subscriber_data_name"><?php _e('Telefon', 'newsletterplugin') ?></label>
        <input type="tel" name="nfe_subscriber_data[phone]" id="nfe_subscriber_data_phone">
    </div>

    <div class="nfe_subscriber_edit_form__row">
        <label for="nfe_subscriber_data_name"><?php _e('Email', 'newsletterplugin') ?></label>
        <input type="email" name="nfe_subscriber_data[email]" id="nfe_subscriber_data_email">
    </div>

    <div class="nfe_subscriber_edit_form__buttons">
        <input type="submit" value="Aktualizuj" class="button-send-data">
        <button class="button-clean-data">Anonimizuj dane</button>
    </div>
</form>