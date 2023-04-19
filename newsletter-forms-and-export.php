<?php

/*
 * Plugin Name:       Newsletter forms and export subscribers
 * Plugin URI:        https://webites.pl/
 * Description:       Let create simple forms to subscribe your newsletter, save in database and export to your mail provider.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            weBites
 * Author URI:        https://webites.pl/
 * Text Domain:       newsletterplugin
 * Domain Path:       /languages
 */

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/assets/load.php');

use Newsletter\Core\Forms\FormListing;
use Newsletter\Core\Subscribers\Listing;

new Listing;
new FormListing;


// test


add_action('wp_ajax_nopriv_iteration_array_display_items', 'iteration_array_display_items', 10, 1);
add_action('wp_ajax_iteration_array_display_items', 'iteration_array_display_items', 10, 1);

function iteration_array_display_items()
{
    echo "<div style='margin:2rem 0; border:1px solid;'>";
    echo "rekord : " . $_POST['i'] . ' / ' . $_POST['count'] . '<br>';
    echo $_POST['key'] . '<br>';
    echo $_POST['item'] . '<br>';

    echo "</div>";

    wp_die();
}
