<?php
$analytics = get_post_meta($_GET['post'], 'nfe_form_analytics')[0];
if($analytics){
?>
<div class="nfe nfe_newsletter_edit-row nfe_newsletter_edit-row--centered">
    <img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/newsletter-forms-and-export/src/Integrations/NFES_Analytics/' ?>img/icon-analytics.svg" alt class="nfes__admin__icon">
    <h4><?php _e('Łacznie zapisów do subskrybcji przez ten formularz:', 'newsletterplugin') ?></h4>
    <?php echo count($analytics) ?>
</div>

<div class="nfe nfe_newsletter_edit-row nfe_newsletter_edit-row--centered">
    <img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/newsletter-forms-and-export/src/Integrations/NFES_Analytics/' ?>img/icon-success.svg" alt class="nfes__admin__icon">
    <h4><?php _e('Zapisów zakończonych sukcesem', 'newsletterplugin') ?></h4>
    <?php
    $successed = 0;
    foreach ($analytics as $item){
        if(isset($item['result'])) {
            if ($item['result'] == 'success') {
                $successed++;
            }
        }
    }
    echo $successed;
    ?>
</div>

<div class="nfe nfe_newsletter_edit-row nfe_newsletter_edit-row--centered">
    <img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/newsletter-forms-and-export/src/Integrations/NFES_Analytics/' ?>img/icon-analytics.svg" alt class="nfes__admin__icon">
    <h4><?php _e('Zapisów zakończonych próbą ponownego zapisu', 'newsletterplugin') ?></h4>
    <?php
    $duplicated = 0;
    foreach ($analytics as $item){
        if(isset($item['result'])) {
            if ($item['result'] == 'duplicated') {
                $duplicated++;
            }
        }
    }
    echo $duplicated;
    ?>
</div>


<div class="nfe nfe_newsletter_edit-row nfe_newsletter_edit-row--centered">
    <img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/newsletter-forms-and-export/src/Integrations/NFES_Analytics/' ?>img/icon-analytics.svg" alt class="nfes__admin__icon">
    <h4><?php _e('Zapisów zakończonych błędem bezpieczeństwa', 'newsletterplugin') ?></h4>
    <?php
    $security_error = 0;
    foreach ($analytics as $item){
        if(isset($item['result'])) {
            if ($item['result'] == 'security_error') {
                $security_error++;
            }
        }
    }
    echo $security_error;
    ?>
</div>

<hr>

<h4>
    <?php _e('Ostatnio zapisani subskrybenci:', 'newsletterplugin'); ?>
</h4>
<ul>
    <?php
    $i = 0;
    rsort($analytics);
    foreach ( $analytics as $date => $subscriber){
        if($subscriber['result'] == 'success' && $i < 5) {
            $meta = \NFES_Newsletter\Core\Subscribers\SubscriberItem::get_meta_of_subscriber_by_id($subscriber['subscriber_id']);
            echo "<li style='display: flex; align-items: center; gap: 8px'>";
            echo "<b>" . date("d.m.Y H:i:s", $subscriber['date']) . "</b> : ";
            echo $meta['email'];
            $sub_link = get_bloginfo("wpurl") . '/wp-admin/post.php?post=' . $subscriber['subscriber_id'] . '&action=edit';
            echo "<a href='$sub_link' class='button'>" . __("Karta subskrybenta", "newsletterplugin") . "</a>";
            echo "</li>";
            $i++;
        }
    }

    ?>
</ul>
<?php } ?>