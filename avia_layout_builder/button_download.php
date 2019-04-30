<?php
/**
 * Save under /wp-content/themes/enfold/config-templatebuilder/avia-shortcodes
 * Button
 *
 * Displays a colored button that links to any url of your choice
 */
if (!defined('ABSPATH')) {
    exit;
}    // Exit if accessed directly


if (!class_exists('avia_sc_button_download')) {
    class avia_sc_button_download extends aviaShortcodeTemplate
    {
        /**
         * Create the config array for the shortcode button
         */
        function shortcode_insert_button()
        {
            $this->config['self_closing'] = 'yes';

            $this->config['name'] = __('Download Button', 'avia_framework');
            $this->config['tab'] = __('Content Elements', 'avia_framework');
            $this->config['icon'] = AviaBuilder::$path['imagesURL'] . "sc-button.png";
            $this->config['order'] = 1;
            $this->config['target'] = 'avia-target-insert';
            $this->config['shortcode'] = 'avia_download_button';
            $this->config['tooltip'] = __('Creates a download button', 'avia_framework');
            $this->config['tinyMCE'] = ['tiny_always' => true];
            $this->config['preview'] = true;
        }

        function extra_assets()
        {
            //load css
            wp_enqueue_style(
                'avia-module-button',
                AviaBuilder::$path['pluginUrlRoot'] . 'avia-shortcodes/buttons/buttons.css',
                ['avia-layout'],
                false
            );
        }

        /**
         * Popup Elements
         *
         * If this function is defined in a child class the element automatically gets an edit button, that, when pressed
         * opens a modal window that allows to edit the element properties
         *
         * @return void
         */
        function popup_elements()
        {
            $this->elements = [
                [
                    "type" => "tab_container",
                    'nodescription' => true,
                ],

                [
                    "type" => "tab",
                    "name" => __("Content", 'avia_framework'),
                    'nodescription' => true,
                ],

                [
                    "name" => __("Button Label", 'avia_framework'),
                    "desc" => __("This is the text that appears on your button.", 'avia_framework'),
                    "id" => "label",
                    "type" => "input",
                    "std" => __("Download", 'avia_framework'),
                ],
                [
                    "name" => __("Button Link?", 'avia_framework'),
                    "desc" => __("Where should your button link to?", 'avia_framework'),
                    "id" => "link",
                    "type" => "linkpicker",
                    "fetchTMPL" => true,
                    "subtype" => [
                        __('Set Manually', 'avia_framework') => 'manually',
                        __('Single Entry', 'avia_framework') => 'single',
                        __('Taxonomy Overview Page', 'avia_framework') => 'taxonomy',
                    ],
                    "std" => "",
                ],
                [
                    "type" => "close_div",
                    'nodescription' => true,
                ],
                [
                    "type" => "tab",
                    "name" => __("Colors", 'avia_framework'),
                    'nodescription' => true,
                ],
                [
                    "name" => __("Button Color", 'avia_framework'),
                    "desc" => __("Choose a color for your button here", 'avia_framework'),
                    "id" => "color",
                    "type" => "select",
                    "std" => "theme-color",
                    "subtype" => [
                        __('Translucent Buttons', 'avia_framework') => [
                            __('Light Transparent', 'avia_framework') => 'light',
                            __('Dark Transparent', 'avia_framework') => 'dark',
                        ],
                        __('Colored Buttons', 'avia_framework') => [
                            __('Theme Color', 'avia_framework') => 'theme-color',
                            __('Theme Color Highlight', 'avia_framework') => 'theme-color-highlight',
                            __('Theme Color Subtle', 'avia_framework') => 'theme-color-subtle',
                            __('Blue', 'avia_framework') => 'blue',
                            __('Red', 'avia_framework') => 'red',
                            __('Green', 'avia_framework') => 'green',
                            __('Orange', 'avia_framework') => 'orange',
                            __('Aqua', 'avia_framework') => 'aqua',
                            __('Teal', 'avia_framework') => 'teal',
                            __('Purple', 'avia_framework') => 'purple',
                            __('Pink', 'avia_framework') => 'pink',
                            __('Silver', 'avia_framework') => 'silver',
                            __('Grey', 'avia_framework') => 'grey',
                            __('Black', 'avia_framework') => 'black',
                            __('Custom Color', 'avia_framework') => 'custom',

                        ],
                    ],
                ],
                [
                    "name" => __("Custom Background Color", 'avia_framework'),
                    "desc" => __("Select a custom background color for your Button here", 'avia_framework'),
                    "id" => "custom_color",
                    "type" => "colorpicker",
                    "std" => "#444444",
                    "required" => ['color', 'equals', 'custom'],
                ],
                [
                    "type" => "close_div",
                    'nodescription' => true,
                ],
                [
                    "type" => "tab",
                    "name" => __("Screen Options", 'avia_framework'),
                    'nodescription' => true,
                ],
                [
                    "name" => __("Element Visibility", 'avia_framework'),
                    "desc" => __("Set the visibility for this element, based on the device screensize.",
                        'avia_framework'),
                    "type" => "heading",
                    "description_class" => "av-builder-note av-neutral",
                ],
                [
                    "desc" => __("Hide on large screens (wider than 990px - eg: Desktop)", 'avia_framework'),
                    "id" => "av-desktop-hide",
                    "std" => "",
                    "container_class" => 'av-multi-checkbox',
                    "type" => "checkbox",
                ],
                [

                    "desc" => __("Hide on medium sized screens (between 768px and 989px - eg: Tablet Landscape)",
                        'avia_framework'),
                    "id" => "av-medium-hide",
                    "std" => "",
                    "container_class" => 'av-multi-checkbox',
                    "type" => "checkbox",
                ],
                [

                    "desc" => __("Hide on small screens (between 480px and 767px - eg: Tablet Portrait)",
                        'avia_framework'),
                    "id" => "av-small-hide",
                    "std" => "",
                    "container_class" => 'av-multi-checkbox',
                    "type" => "checkbox",
                ],
                [

                    "desc" => __("Hide on very small screens (smaller than 479px - eg: Smartphone Portrait)",
                        'avia_framework'),
                    "id" => "av-mini-hide",
                    "std" => "",
                    "container_class" => 'av-multi-checkbox',
                    "type" => "checkbox",
                ],
                [
                    "type" => "close_div",
                    'nodescription' => true,
                ],
                [
                    "type" => "close_div",
                    'nodescription' => true,
                ],

            ];

        }


        /**
         * Editor Element - this function defines the visual appearance of an element on the AviaBuilder Canvas
         * Most common usage is to define some markup in the $params['innerHtml'] which is then inserted into the drag and drop container
         * Less often used: $params['data'] to add data attributes, $params['class'] to modify the className
         *
         *
         * @param array $params this array holds the default values for $content and $args.
         *
         * @return $params the return array usually holds an innerHtml key that holds item specific markup.
         */
        function editor_element($params)
        {
            extract(av_backend_icon($params)); // creates $font and $display_char if the icon was passed as param "icon" and the font as "font"

            $inner = "<div class='avia_button_box avia_hidden_bg_box avia_textblock avia_textblock_style'>";
            $inner .= "		<div " . $this->class_by_arguments('icon_select, color, size, position',
                    $params['args']) . ">";
            $inner .= "			<span " . $this->class_by_arguments('font', $font) . ">";
            $inner .= "			<span data-update_with='label' class='avia_iconbox_title' >" . $params['args']['label'] . "</span>";
            $inner .= "			<span " . $this->class_by_arguments('font', $font) . ">";
            $inner .= "		</div>";
            $inner .= "</div>";

            $params['innerHtml'] = $inner;
            $params['content'] = null;
            $params['class'] = "";

            return $params;
        }


        /**
         * Frontend Shortcode Handler
         *
         * @param array $atts array of attributes
         * @param string $content text within enclosing form of shortcode element
         * @param string $shortcodename the shortcode found, when == callback name
         *
         * @return string $output returns the modified html string
         */
        function shortcode_handler($atts, $content = "", $shortcodename = "", $meta = "")
        {
            extract(AviaHelper::av_mobile_sizes($atts));
            $atts = shortcode_atts(
                [
                    'label' => 'Download',
                    'link' => '',
                    'color' => 'theme-color',
                ],
                $atts,
                $this->config['shortcode']
            );

            $color = $atts['color'];
            if ($atts['color'] === 'custom') {
                $color = $atts['custom_color'];
            }

            $link = AviaHelper::get_url($atts['link']);
            $link = (($link == "http://") || ($link == "manually")) ? "" : $link;

            $classes = $this->class_by_arguments('icon_select, color, size, position', $atts, true);
            $classList = "avia-button {$extraClass} {$av_display_classes} {$classes} sdm_download noLightbox";

            $output = "<a href='{$link}' style='background-color:{$color};border-color:{$color}' class='{$classList}' target='_blank' download>{$atts['label']}</a>";
            return "<div class='avia-button-wrap avia-button-" . $atts['position'] . " " . $meta['el_class'] . "'>" . $output . "</div>";
        }
    }
}
