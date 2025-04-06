<?php

use function ElementorDeps\DI\add;
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Enqueue Styles and Scripts
 */
// resgiter shortcode

include_once( __DIR__ .'/includes/shortcodes/postes.php');

function podstream_enqueue_assets() {
    // Styles
    wp_enqueue_style('podstream-style', get_stylesheet_uri());

    wp_enqueue_style('podstream-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');

    wp_enqueue_style('podstream-all-post-style', get_stylesheet_directory_uri() . '/assets/css/postes.css', array(), fileatime(__DIR__ .'/assets/css/postes.css'));

}
add_action('wp_enqueue_scripts', 'podstream_enqueue_assets');

;

/**
 * Include Custom Theme Functions
 */
// require_once get_template_directory() . '/inc/customizer.php'; // Customizer settings

