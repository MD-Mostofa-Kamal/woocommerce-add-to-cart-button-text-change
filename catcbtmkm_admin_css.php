<?php    
// Add CSS conditionally based on the checkbox state
function catcbtmkm_plugin_apply_styles() {
    $button_color = get_option('catcbtmkm_woo_button_color', 'white');
    $button_background = get_option('catcbtmkm_woo_button_background', 'orange');
    $border_radius = get_option('catcbtmkm_woo_button_border_radius', '10px');

    if (get_option('catcbtmkm_checkbox_endis') == 1) {
        echo '<style>
            button.single_add_to_cart_button.button.alt.woocommerce img,
            .woocommerce-page img {
                vertical-align: middle;
            }
            .add_to_cart_button {
                color: ' . esc_attr($button_color) . ' !important;
                background: ' . esc_attr($button_background) . ' !important;
                border-radius: ' . esc_attr($border_radius) . ' !important;
            } 
            .single_add_to_cart_button {
                color: ' . esc_attr($button_color) . ' !important;
                background: ' . esc_attr($button_background) . ' !important;
                border-radius: ' . esc_attr($border_radius) . ' !important;
            }
        </style>';  
    }
}

add_action('wp_head', 'catcbtmkm_plugin_apply_styles');
?>
