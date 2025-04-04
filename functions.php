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

    // Scripts
    wp_enqueue_script('podstream-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'podstream_enqueue_assets');


/**
 * Add Theme Support for Elementor
 */
function podstream_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'podstream_elementor_support');

/**
 * Include Custom Theme Functions
 */
require_once get_template_directory() . '/inc/customizer.php'; // Customizer settings
require_once get_template_directory() . '/inc/custom-functions.php'; // Additional functions
require_once get_template_directory() . '/inc/theme-hooks.php'; // Theme hooks
