<?php

use Newsletter\Core\Subscribers\Add;

if (isset($_POST['nfe_subscriber'])) {
    $user_add = new Add($_POST);
    $user_add->save();
}
global $post;
?>
<link rel="stylesheet" href="<?php ABSPATH ?>/wp-content/plugins/newsletter-forms-and-export/assets/css/templates/frontend-inline.css">

<form method="post">
    <div class="nfe_newsletter_form nfe_newsletter_form--inline">

        <?php nfes_get_form_respond_msg(); ?>
        <?php wp_nonce_field('newsletter-form-' . $post->ID); ?>
        <input type="hidden" name="post_id" value="<?php echo $post->ID ?>">

        <?php if ($data['header']) {
            echo "<h2>" . esc_html($data['header']) . "</h2>";
        } ?>
        <?php if ($data['description']) {
            echo "<p class='description'>" . esc_html($data['description']) . "</p>";
        } ?>

        <div class="nfe_newsletter_form__row">
            <?php if ($data['name']['enabled']) : ?>
                <div class="nfe_newsletter_form__item">
                    <input type="text" name="nfe_subscriber[name]" id="nfe_subscriber_name">
                    <label for="nfe_subscriber_name"><?php _e($data['name']['label'], 'newsletterplugin') ?></label>
                    <p class="description">
                        <?php _e($data['name']['text'], 'newsletterplugin') ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ($data['surname']['enabled']) : ?>
                <div class="nfe_newsletter_form__item">
                    <input type="text" name="nfe_subscriber[surname]" id="nfe_subscriber_surname">
                    <label for="nfe_subscriber_surname"><?php _e($data['surname']['label'], 'newsletterplugin') ?></label>
                    <p class="description">
                        <?php _e($data['surname']['text'], 'newsletterplugin') ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ($data['phone']['enabled']) : ?>
                <div class="nfe_newsletter_form__item">
                    <input type="tel" name="nfe_subscriber[phone]" id="nfe_subscriber_phone" min="9" max="12">
                    <label for="nfe_subscriber_phone"><?php _e($data['phone']['label'], 'newsletterplugin') ?></label>
                    <p class="description">
                        <?php _e($data['phone']['text'], 'newsletterplugin') ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ($data['email']['enabled']) : ?>
                <div class="nfe_newsletter_form__item">
                    <input type="email" name="nfe_subscriber[email]" id="nfe_subscriber_email">
                    <label for="nfe_subscriber_email"><?php _e($data['email']['label'], 'newsletterplugin') ?></label>
                    <p class="description">
                        <?php _e($data['email']['text'], 'newsletterplugin') ?>
                    </p>
                </div>
                <!-- <div class='display-iteration'>iteration</div> -->

            <?php endif; ?>
        </div>
        <div class="nfe_newsletter_form__row">
            <div class="acceptance">
                <input type="checkbox" name="nfe_subscriber[accept]" id="nfe_subscriber_accept">
                <label for="nfe_subscriber_accept"><?php _e($data['accept']['text'], 'newsletterplugin') ?></label>
            </div>
        </div>

        <input type="submit" value="<?php _e($data['submit']['label'], 'newsletterplugin') ?>">

    </div>
</form>