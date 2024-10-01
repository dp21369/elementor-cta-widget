<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_CTA_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cta_widget';
    }

    public function get_title()
    {
        return __('Custom CTA Widget', 'elementor-cta-widget');
    }

    public function get_icon()
    {
        return 'eicon-call-to-action';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {
        // Heading Control
        $this->start_controls_section(
            'section_heading',
            [
                'label' => __('Heading', 'elementor-cta-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_text',
            [
                'label' => __('Heading Text', 'elementor-cta-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Heading', 'elementor-cta-widget'),
                'placeholder' => __('Enter your heading', 'elementor-cta-widget'),
            ]
        );

        $this->end_controls_section();

        // Paragraph Control
        $this->start_controls_section(
            'section_paragraph',
            [
                'label' => __('Paragraph', 'elementor-cta-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'paragraph_text',
            [
                'label' => __('Paragraph Text', 'elementor-cta-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('This is the default paragraph text.', 'elementor-cta-widget'),
                'placeholder' => __('Enter your paragraph', 'elementor-cta-widget'),
            ]
        );

        $this->end_controls_section();

        // Image Control
        $this->start_controls_section(
            'section_image',
            [
                'label' => __('Image', 'elementor-cta-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'elementor-cta-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Button Control
        $this->start_controls_section(
            'section_button',
            [
                'label' => __('Button', 'elementor-cta-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'elementor-cta-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Click Here', 'elementor-cta-widget'),
                'placeholder' => __('Enter button text', 'elementor-cta-widget'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'elementor-cta-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'elementor-cta-widget'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="power-cta text-center p-6 bg-gray-100 rounded-lg">';
        echo '<h2 class="text-3xl font-bold mb-4">' . esc_html($settings['heading_text']) . '</h2>';
        echo '<p class="text-lg mb-4">' . esc_html($settings['paragraph_text']) . '</p>';

        if ($settings['image']['url']) {
            echo '<div class="mb-4"><img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['heading_text']) . '" class="mx-auto"></div>';
        }

        if ($settings['button_text']) {
            echo '<a href="' . esc_url($settings['button_link']['url']) . '" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600" target="_blank">' . esc_html($settings['button_text']) . '</a>';
        }

        echo '</div>';
    }
}
