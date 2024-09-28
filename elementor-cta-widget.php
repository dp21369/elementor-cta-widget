<?php

/**
 * Plugin Name: Elementor CTA Widget
 * Description: A custom Elementor addon to create a Call to Action section with a heading, paragraph, image, and button.
 * Version: 1.0.0
 * Author: Devendra Pali
 * Text Domain: elementor-cta-widget
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Check if Elementor is active
function elementor_cta_widget_check_dependencies()
{
    if (!did_action('elementor/loaded')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die(
            __('Elementor Power CTA requires Elementor to be active. Please install and activate Elementor first.', 'elementor-cta-widget'),
            'Plugin dependency check',
            ['back_link' => true]
        );
    }
}
add_action('admin_init', 'elementor_cta_widget_check_dependencies');

// Enqueue Tailwind CSS
function elementor_cta_widget_enqueue_styles()
{
    wp_enqueue_style('tailwindcss', 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css');
}
add_action('wp_enqueue_scripts', 'elementor_cta_widget_enqueue_styles');

// Register the Elementor widget after Elementor is initialized
function elementor_cta_widget_register_widget()
{
    require_once(__DIR__ . '/includes/class-elementor-cta-widget.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_cta_widget());
}
add_action('elementor/widgets/widgets_registered', 'elementor_cta_widget_register_widget');
