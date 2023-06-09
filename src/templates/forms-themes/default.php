<?php

use NFES_Newsletter\Core\Subscribers\SubscriberAdd;
use NFES_Newsletter\Core\Subscribers\SubscriberItem;

if (isset($_POST['nfe_subscriber'])) {
    $user_add = new SubscriberAdd($_POST);
    $user_add->save();
}
global $post;
?>
<link rel="stylesheet" href="<?php ABSPATH ?>/wp-content/plugins/newsletter-forms-and-export/assets/css/templates/frontend-default.css">
<form method="post">
    <div class="nfe_newsletter_form nfe_newsletter_form--default">
        <?php nfes_get_form_respond_msg(); ?>
        <?php wp_nonce_field('newsletter-form-' . $post->ID); ?>
        <input type="hidden" name="post_id" value="<?php echo $post->ID ?>">
        <?php if ($data['header']) {
            echo "<h2>" . esc_html($data['header']) . "</h2>";
        } ?>
        <?php if ($data['description']) {
            echo "<p class='big-description'>" . esc_html($data['description']) . "</p>";
        } ?>
        <?php if ( $data['name']['enabled'] ?? false ) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_name"><?php _e($data['name']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['name']['text'], 'newsletterplugin') ?>
                </p>
                <input type="text" name="nfe_subscriber[name]" id="nfe_subscriber_name">
            </div>
        <?php endif; ?>
        <?php if ( $data['surname']['enabled'] ?? false ) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_surname"><?php _e($data['surname']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['surname']['text'], 'newsletterplugin') ?>
                </p>
                <input type="text" name="nfe_subscriber[surname]" id="nfe_subscriber_surname">
            </div>
        <?php endif; ?>
        <?php if ( $data['phone']['enabled'] ?? false ) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_phone"><?php _e($data['phone']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['phone']['text'], 'newsletterplugin') ?>
                </p>
                <input type="tel" name="nfe_subscriber[phone]" id="nfe_subscriber_phone" min="9" max="12">
            </div>
        <?php endif; ?>
        <?php if ( $data['email']['enabled'] ?? false ) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_email"><?php _e($data['email']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['email']['text'], 'newsletterplugin') ?>
                </p>
                <input type="email" name="nfe_subscriber[email]" id="nfe_subscriber_email" required>
            </div>
            <!-- <div class='display-iteration'>iteration</div> -->

        <?php endif; ?>
        <div class="nfe_newsletter_form__row">
            <div class="acceptance">
                <input type="checkbox" name="nfe_subscriber[accept]" id="nfe_subscriber_accept" required>
                <label for="nfe_subscriber_accept"><?php _e($data['accept']['text'], 'newsletterplugin') ?></label>
            </div>
        </div>

        <input type="submit" value="<?php _e($data['submit']['label'], 'newsletterplugin') ?>">

    </div>
</form>
