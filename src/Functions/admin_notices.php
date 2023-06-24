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

function nfes_admin_notice_display_general()
{
    $message = get_transient('nfes_admin_notice');
    delete_transient('nfes_admin_notice');
    if ($message) {
        $type = $message['type'];
        $text = $message['text'];
        echo "<p class='notice notice-$type'>$text</p>";
    }
}

/**
 * @param array $message : elements - text[string], type[error|warning|success|info]
 * @param string $slug
 * @param int $expiration
 * @return void
 */
function nfes_create_admin_notice(array $message, string $slug = 'nfes_admin_notice', int $expiration = 600) : void
{
    set_transient(
        $slug,
        $message,
        $expiration
    );
}
