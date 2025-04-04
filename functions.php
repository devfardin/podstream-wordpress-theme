<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Enqueue Styles and Scripts
 */
function podstream_enqueue_assets() {
    // Styles
    wp_enqueue_style('podstream-style', get_stylesheet_uri());
    wp_enqueue_style('podstream-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');

}
add_action('wp_enqueue_scripts', 'podstream_enqueue_assets');

;

/**
 * Include Custom Theme Functions
 */
// require_once get_template_directory() . '/inc/customizer.php'; // Customizer settings

