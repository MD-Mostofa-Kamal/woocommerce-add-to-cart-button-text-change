<?php
/*
Plugin Name:  Change Add to Cart Button Text
Plugin URI:   https://wordpress.org/change-add-to-cart-button-text
Description:  Easily customize the "Add to Cart" button text on WooCommerce product pages. This plugin allows you to set custom text for the "Add to Cart" button on single product pages and archive product pages. Additionally, you can enhance your button with icons and style it with custom colors and border radius settings.
Version:      1.0.0
Author:       Md Mostofa Kamal Mostak
Author URI:   https://profiles.wordpress.org/mdmostak
Requires Plugins: woocommerce

Requires at least: 6.0
Tested up to:      6.5
Requires PHP:      7.4

License:     GNU General Public License v3.0
License URI: https://www.gnu.org/licenses/gpl.html 
Text Domain: catcbtmkm-change-add-to-cart-button-text
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}




function custom_woocommerce_product_add_to_cart_text( $text, $product ) {
    $custom_texts = array(
        13 => 'Buy Nowggggggggggggggggggggggggggggggg',     // Product ID 123
        
    );

    if ( array_key_exists( $product->get_id(), $custom_texts ) ) {
        $text = $custom_texts[$product->get_id()];
    }

    return $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_woocommerce_product_add_to_cart_text', 10, 2 );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_woocommerce_product_add_to_cart_text', 10, 2 );














// Check if WooCommerce is activated
if (!function_exists('is_woocommerce_activated')) {
    function is_woocommerce_activated() {
        return class_exists('woocommerce');
    }
}



add_action('admin_enqueue_scripts', 'catcbtmkm_plugin_admin_enqueue_scripts');
// Enqueue the script for dismissible notices
function catcbtmkm_plugin_admin_enqueue_scripts($hook) {
    // Enqueue the necessary WordPress script for dismissible notices
    wp_enqueue_script('jquery');
    wp_enqueue_script('common');
    wp_enqueue_script('wp-lists');
    wp_enqueue_script('postbox');
    wp_enqueue_style('wp-color-picker');
    $script_version = '1.0.0'; 
    wp_enqueue_script('catcbtmkm-plugin-color-picker', plugin_dir_url(__FILE__) . 'admin/js/catcbtmkm_color_picker.js', array('wp-color-picker'), $script_version, true);
}

// WooCommerce active notice
function catcbtmkm_plugin_woocommerce_active_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e('"Change Add to Cart Button Text" Plugin is ready to work. Thanks for using this plugin >> Dismiss', 'catcbtmkm-plugin'); ?></p>
    </div>
    <?php
}

// Add actions based on Change Add to Cart Button Text active status
function catcbtmkm_plugin_check_woocommerce() {
    if (is_woocommerce_activated()) {
        // Check if the notice has already been displayed
        if (!get_transient('catcbtmkm_woocommerce_notice_displayed')) {
            add_action('admin_notices', 'catcbtmkm_plugin_woocommerce_active_notice');
            // Set transient to indicate that the notice has been displayed
            set_transient('catcbtmkm_woocommerce_notice_displayed', true, DAY_IN_SECONDS);
        }
    } 
}
add_action('plugins_loaded', 'catcbtmkm_plugin_check_woocommerce');

// Hook to add action links
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'catcbtmkm_action_links');

function catcbtmkm_action_links($links) {
    $settings_link = '<a href="admin.php?page=catcbtmkm-change-add-to-cart-button-text">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

// Register settings
function catcbtmkm_register_settings() {
    add_submenu_page('woocommerce', 'catcbtmkm Submenu Page', 'Change Add to Cart Button Text', 'manage_options', 'catcbtmkm-change-add-to-cart-button-text', 'catcbtmkm_submenu_page_callback'); 
}
add_action('admin_menu', 'catcbtmkm_register_settings');

function catcbtmkm_add_to_cart_change_save() {
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_checkbox_endis');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_single_product', 'sanitize_text_field');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_archive_product', 'sanitize_text_field');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_woo_icon_position');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_woo_button_icon');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_woo_button_color');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_woo_button_background');
    register_setting('catcbtmkm_setting_field_group', 'catcbtmkm_woo_button_border_radius');
}
add_action('admin_init', 'catcbtmkm_add_to_cart_change_save');

// Change single product page "Add to Cart" button text
function catcbtmkm_woocommerce_single_product_cart_button_text() {
    $checkedtext = get_option('catcbtmkm_single_product');
    $checkedtext = sanitize_text_field($checkedtext);
    $button_text = esc_html($checkedtext);

    $icon_position = get_option('catcbtmkm_woo_icon_position');
    $icon = get_option('catcbtmkm_woo_button_icon');
    if ($icon) {
        $icon_html = '<img src="' . esc_url(plugin_dir_url(__FILE__) . 'admin/images/' . esc_attr($icon) . '.png') . '" alt="' . esc_attr('Cart Icon') . '" />';
        if ($icon_position == 'before') {
            $button_text = $icon_html . ' ' . $button_text;
        } elseif ($icon_position == 'after') {
            $button_text = $button_text . ' ' . $icon_html;
        }
    }
    return $button_text;
}

function catcbtmkm_plugin_woocommerce_add_to_cart_button_single() {
    echo wp_kses_post(catcbtmkm_woocommerce_single_product_cart_button_text());
}

// Add filters based on the option
function catcbtmkm_plugin_add_to_cart_text_filters() {
    $is_checkedtextenabled = get_option('catcbtmkm_checkbox_endis');

    if ($is_checkedtextenabled) {
        add_filter('woocommerce_product_single_add_to_cart_text', 'catcbtmkm_plugin_woocommerce_add_to_cart_button_single');
        add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives');
        add_action('wp_head', 'catcbtmkm_plugin_apply_styles');
    } else {
        remove_filter('woocommerce_product_single_add_to_cart_text', 'catcbtmkm_plugin_woocommerce_add_to_cart_button_single');
        remove_filter('woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives');
        remove_action('wp_head', 'catcbtmkm_plugin_apply_styles');
    }
}
add_action('plugins_loaded', 'catcbtmkm_plugin_add_to_cart_text_filters');

// Change add to cart text on product archives page
function woocommerce_add_to_cart_button_text_archives() {
    $checkedtext = get_option('catcbtmkm_archive_product');
    $checkedtext = sanitize_text_field($checkedtext);
    $button_text = esc_html($checkedtext);

    return $button_text;
}

// Include additional admin files
require_once __DIR__ . '/admin/catcbtmkm_admin_css.php';
require_once __DIR__ . '/admin/catcbtmkm_admin_setting.php';

function enqueue_catcbtmkm_add_to_cart_script() {
    wp_enqueue_script('catcbtmkm-add-to-cart', plugin_dir_url(__FILE__) . 'admin/js/catcbtmkm_admin_animation.js', array(), '1.0', true);
}
add_action('admin_footer', 'enqueue_catcbtmkm_add_to_cart_script');

?>
