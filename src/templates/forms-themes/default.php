<?php

use Newsletter\Core\Subscribers\Add;

if (isset($_POST['nfe_subscriber'])) {
    $user_add = new Add($_POST);
    $user_add->save();
}
?>
<form method="post">
    <div class="nfe_newsletter_form nfe_newsletter_form--default">
        <?php if ($data['name']['enabled']) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_name"><?php _e($data['name']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['name']['text'], 'newsletterplugin') ?>
                </p>
                <input type="text" name="nfe_subscriber[name]" id="nfe_subscriber_name">
            </div>
        <?php endif; ?>
        <?php if ($data['surname']['enabled']) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_surname"><?php _e($data['surname']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['surname']['text'], 'newsletterplugin') ?>
                </p>
                <input type="text" name="nfe_subscriber[surname]" id="nfe_subscriber_surname">
            </div>
        <?php endif; ?>
        <?php if ($data['phone']['enabled']) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_phone"><?php _e($data['phone']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['phone']['text'], 'newsletterplugin') ?>
                </p>
                <input type="tel" name="nfe_subscriber[phone]" id="nfe_subscriber_phone" min="9" max="12">
            </div>
        <?php endif; ?>
        <?php if ($data['email']['enabled']) : ?>
            <div class="nfe_newsletter_form__row">
                <label for="nfe_subscriber_email"><?php _e($data['email']['label'], 'newsletterplugin') ?></label>
                <p class="description">
                    <?php _e($data['email']['text'], 'newsletterplugin') ?>
                </p>
                <input type="email" name="nfe_subscriber[email]" id="nfe_subscriber_email">
            </div>
            <!-- <div class='display-iteration'>iteration</div> -->

        <?php endif; ?>

        <input type="submit" value="<?php _e($data['submit']['label'], 'newsletterplugin') ?>">

    </div>
</form>


<?php
/*$data = [
    'man' => 'Lukasz',
    'woman' => 'Dominika',
    'kid' => 'Pola'
];
$i = 1;
foreach ($data as  $key => $item) {
    $array_count = count($data);
    echo '<script>
    jQuery(document).ready(function ($) {
        function iteration_array_display_items() {
            var my_param = "my_param_value";
          $.ajax({
            url: "http://" + window.location.hostname + "/wp-admin/admin-ajax.php",
            type: "POST",
            data: {
              action: "iteration_array_display_items",
              item: "' . $item . '",
              key: "' . $key . '",
              i: "' . $i . '",
              count: "' . $array_count . '"

            },
            success: function (data) {
              $(".display-iteration").append(  "<div>" + data + "</div>"  );
            },
          });
        }
    
        iteration_array_display_items();
      });

    </script>';
    $i++;
}
*/