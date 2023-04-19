<?php

add_action('admin_enqueue_scripts', 'load_admin_styles');
function load_admin_styles()
{
    wp_enqueue_style('nfe-admin-styles', plugin_dir_url(__FILE__) . 'css/admin-style.css', false, '1.0.0');
    wp_enqueue_script('nfe-admin-script', plugin_dir_url(__FILE__) . 'js/admin-script.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'load_frontend_newsletter_styles');
function load_frontend_newsletter_styles()
{
    wp_enqueue_style('nfe-newsletter-styles', plugin_dir_url(__FILE__) . 'css/frontend-style.css', false, '1.0.0');
    wp_enqueue_script('nfe-newsletter-script', plugin_dir_url(__FILE__) . 'js/frontend-script.js', [], '1.0.0', true);
}
