<?php
function catcbtmkm_submenu_page_callback() {
    ?>
    <div class="wrap" style="width: 63%; float: left;">
        <h1><?php esc_html_e('Add to Cart Button Customize Option catcbtmkm', 'catcbtmkm-plugin'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields('catcbtmkm_setting_field_group'); ?>
            <?php do_settings_sections('catcbtmkm_setting_field_group'); ?>
            <table class="form-table" id="catcbt-form">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Add to Cart Button Customize Option: Enable / Disable', 'catcbtmkm-plugin'); ?></th>
                    <td><input type="checkbox" name="catcbtmkm_checkbox_endis" id="catcbtmkm_checkbox_endis" value="1" <?php checked(1, get_option('catcbtmkm_checkbox_endis'), true); ?>></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Change Add to Cart Button Text Single Product page', 'catcbtmkm-plugin'); ?></th>
                    <td><input type="text" placeholder="Type Like= Buy Now" name="catcbtmkm_single_product" id="catcbtmkm_single_product" value="<?php echo esc_attr(get_option('catcbtmkm_single_product', 'Buy Now')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Change Add to Cart Button Text Archive / Shop page', 'catcbtmkm-plugin'); ?></th>
                    <td><input type="text" placeholder="Type Like= Buy Now" name="catcbtmkm_archive_product" id="catcbtmkm_archive_product" value="<?php echo esc_attr(get_option('catcbtmkm_archive_product', 'Buy Now')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Icon Position (Only Visible Single Product Page)', 'catcbtmkm-plugin'); ?></th>
                    <td>
                        <select name="catcbtmkm_woo_icon_position" id="catcbtmkm_woo_icon_position">
                            <option value="none" <?php selected(get_option('catcbtmkm_woo_icon_position'), 'none'); ?>><?php esc_html_e('None', 'catcbtmkm-plugin'); ?></option>
                            <option value="before" <?php selected(get_option('catcbtmkm_woo_icon_position'), 'before'); ?>><?php esc_html_e('Before Text', 'catcbtmkm-plugin'); ?></option>
                            <option value="after" <?php selected(get_option('catcbtmkm_woo_icon_position'), 'after'); ?>><?php esc_html_e('After Text', 'catcbtmkm-plugin'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Select Icon (Only Visible Single Product Page)', 'catcbtmkm-plugin'); ?></th>
                    <td>
                        <select name="catcbtmkm_woo_button_icon" id="catcbtmkm_woo_button_icon">
                            <option value=""><?php esc_html_e('None', 'catcbtmkm-plugin'); ?></option>
                            <option value="1" <?php selected(get_option('catcbtmkm_woo_button_icon'), '1'); ?> data-img-src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'images/1.png'); ?>"><?php esc_html_e('Icon 1', 'catcbtmkm-plugin'); ?></option>
                            <option value="2" <?php selected(get_option('catcbtmkm_woo_button_icon'), '2'); ?> data-img-src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'images/2.png'); ?>"><?php esc_html_e('Icon 2', 'catcbtmkm-plugin'); ?></option>
                            <option value="3" <?php selected(get_option('catcbtmkm_woo_button_icon'), '3'); ?> data-img-src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'images/3.png'); ?>"><?php esc_html_e('Icon 3', 'catcbtmkm-plugin'); ?></option>
                            <option value="4" <?php selected(get_option('catcbtmkm_woo_button_icon'), '4'); ?> data-img-src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'images/4.png'); ?>"><?php esc_html_e('Icon 4', 'catcbtmkm-plugin'); ?></option>
                            <option value="5" <?php selected(get_option('catcbtmkm_woo_button_icon'), '5'); ?> data-img-src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'images/5.png'); ?>"><?php esc_html_e('Icon 5', 'catcbtmkm-plugin'); ?></option>
                        </select>
                        <br>
                        <img id="catcbtmkm_woo_icon_preview" src="" alt="<?php esc_attr_e('Icon Preview', 'catcbtmkm-plugin'); ?>" style="margin-top: 10px; display: none;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Change Add to Cart Button Text Color', 'catcbtmkm-plugin'); ?></th>
                    <td id="catcbtmkm_woo_button_color_admin_opacity">
                        <input type="text" placeholder="Type Like= white or #FFFFFF" name="catcbtmkm_woo_button_color" id="catcbtmkm_woo_button_color" value="<?php echo esc_attr(get_option('catcbtmkm_woo_button_color', 'white')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Change Add to Cart Button Background Color', 'catcbtmkm-plugin'); ?></th>
                    <td id="catcbtmkm_woo_button_color_admin_opacity">
                        <input type="text" placeholder="Type Like= orange or #FFA500" name="catcbtmkm_woo_button_background" id="catcbtmkm_woo_button_background" value="<?php echo esc_attr(get_option('catcbtmkm_woo_button_background', 'orange')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Change Add to Cart Button Border Radius', 'catcbtmkm-plugin'); ?></th>
                    <td>
                        <input type="text" placeholder="Type Like= 10px" name="catcbtmkm_woo_button_border_radius" id="catcbtmkm_woo_button_border_radius" value="<?php echo esc_attr(get_option('catcbtmkm_woo_button_border_radius', '10px')); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <div class="wrap" style="width: 30%; float: right; text-align: center;">
        <br><br>
        <h1><?php esc_html_e('How to Manage this Plugin', 'catcbtmkm-plugin'); ?></h1>
        <hr>
        <br><br>
        <h3><?php esc_html_e('Video creation is in progress. After approval of this plugin, I will upload the video in this section.', 'catcbtmkm-plugin'); ?></h3>
        <div style="width:100%; max-width:800px; margin:0 auto;">
            <iframe src="https://www.youtube.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <hr><hr><hr>
        <h1><?php esc_html_e('About Developer: MD Mostofa Kamal Mostak', 'catcbtmkm-plugin'); ?></h1>
        <hr>
        <p style="font-size: 17px;">
            <?php esc_html_e("Hello! I'm Mostak, a professional website developer, WordPress theme and plugin developer, and SEO expert. With extensive experience in crafting digital solutions, I specialize in creating high-quality websites, optimizing for search engines, and delivering exceptional user experiences. Let's bring your digital vision to life!", 'catcbtmkm-plugin'); ?>
            <br><hr>
            <b style="font-size: 20px;"><?php esc_html_e('Contact Me:', 'catcbtmkm-plugin'); ?> <a href="https://softvelly.com/contact-me" target="_blank"><?php esc_html_e('My Website Click', 'catcbtmkm-plugin'); ?></a></b>
            <hr>
        </p>
    </div>
    <?php
}
?>
