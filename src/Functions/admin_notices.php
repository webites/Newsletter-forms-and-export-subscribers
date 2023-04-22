<?php

/**
 * @param type - type of notice
 * types: error, warning, success, info
 * 
 * @param text - message of notice
 */
function nfes_admin_notice_display_export()
{
    $message = get_transient('export_data_result');
    delete_transient('export_data_result');
    if ($message) {
        $type = $message['type'];
        $text = $message['text'];
        echo "<p class='notice notice-$type'>$text</p>";
    }
}
