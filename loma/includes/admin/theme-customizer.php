<?php

if (!defined('ABSPATH')) {
    exit;
}

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/THEME-CUSTOMIZER.PHP
 *
 * - __construct
 * - Initialize Output Theme Mods 
 * - Transport from setting and callback to preview js
 * - Remove Unused Native Sections
 * - Customizer manager init
 * - Global Mods Customizer 
  ================================================================================= */

class Df_Theme_Customizer {
	public function Df_Theme_Customizer() {
        add_action( 'customize_register', array(&$this, 'df_add_remove_customizer_sections') );
        add_filter( 'df_customizer_controls', array(&$this, 'df_customizer_manager_init' ) );
        //add_action( 'customize_register', array(&$this, 'df_transport_customizer_settings') );
        $this->preset_kit_output();
        add_action( 'custom_admin_customizer', array(&$this, 'df_add_submenu_preset_kit') );
    }

    public function preset_kit_output(){
        require_once CUSTOMIZER_DIR . 'presets/preset-kit.php';
    }

    public function df_add_submenu_preset_kit(){
    add_submenu_page( 'customize.php', 'Customizer Kit', 'Preset Kit', 'edit_theme_options', 'preset-kit', 'dahz_customizer_preset_kit_option_page' );
    }
    /**
     *
     * Initialize Output Theme Mods 
     * 
     * @return void
     */
    public function df_customizer_external_output() {
        require_once CUSTOMIZER_DIR . 'theme-customizer-output.php';
    }

    /**
     * Transport from setting and callback to preview js
     * @param  $wp_manager 
     * @return void             
     */
    public function df_transport_customizer_settings($wp_manager) {

    	$transports = array(
            // general
            'df_options[site_max_width]',
            'df_options[site_width]',
            'df_options[border_color]',
            'df_options[mask_overlay_color]',
            'df_options[mask_overlay_font_color]',

            // header
            'df_options[navbar_bgcolor_setting]',
            'df_options[widgetbar_bgbutton]',
            'df_options[topbar_bgcolor_setting]',

            // button
            'df_options[button_text_color]',
            'df_options[button_background_color]',
            'df_options[button_border_color]',

            // footer
            'df_options[footer_background_color]',

            // 404
            'df_options[404_background_color]',
            
            
        );

        $transports = apply_filters('customizer_transport_list', $transports);

        foreach ($transports as $key) {
            $wp_manager->get_setting($key)->transport = 'postMessage';
        }

    }
    
    /**
     * dahz_remove_customizer_sections 
     *
     * Remove Unused Native Sections
     * 
     * @param  $wp_manager 
     * @return void       
     */
    public function df_add_remove_customizer_sections($wp_manager) {
    	$wp_manager->remove_section('nav');
        $wp_manager->remove_section('colors');
        $wp_manager->remove_section('title_tagline');
        $wp_manager->remove_section('background_image');
        $wp_manager->remove_section('static_front_page');
        $wp_manager->remove_section('header_image');

        $wp_manager->add_section('df_customizer_general_section', array(
            'title'     => _x('General Settings','backend customizer', 'dahztheme'),
            'priority'  => 5
        ));
        $wp_manager->add_section('df_customizer_header_section', array(
            'title'     => _x('Header','backend customizer', 'dahztheme'),
            'priority'  => 10
        ));
        $wp_manager->add_section('df_customizer_typography_section', array(
            'title'     => _x('Typography', 'backend customizer' , 'dahztheme'),
            'priority'  => 15
        ));
        $wp_manager->add_section('df_customizer_button_section', array(
            'title'     => _x('Button', 'backend customizer', 'dahztheme'),
            'priority'  => 20
        ));
        $wp_manager->add_section('df_customizer_footer_section', array(
            'title'     => _x('Footer', 'backend customizer', 'dahztheme'),
            'priority'  => 25
        ));
        $wp_manager->add_section('df_customizer_featured_section', array(
            'title'     => _x('Featured Slider', 'backend customizer', 'dahztheme'),
            'priority'  => 30
        ));
        $wp_manager->add_section('df_customizer_blog_section', array(
            'title'     => _x('Blog','backend customizer', 'dahztheme'),
            'priority'  => 35
        ));
        $wp_manager->add_panel( 'df_customizer_misc_panel', array( // Add panel grouping connect, site icon, page loader, page 404
            'priority'       => 40,
            'capability'     => 'edit_theme_options',
            'title'          => 'Misc',
            'description'    => ''
        ) );
        $wp_manager->add_section('df_customizer_social_section', array(
            'title'     => _x('Connect','backend customizer', 'dahztheme'),
            'priority'  => 40,
            'panel' => 'df_customizer_misc_panel'
        ));
        $wp_manager->add_section('df_customizer_site_icon_section', array(
            'title'     => _x('Site Icon','backend customizer', 'dahztheme'),
            'priority'  => 45,
            'panel' => 'df_customizer_misc_panel'
        ));
        $wp_manager->add_section( 'df_customizer_page_loader_section', array(
            'title'     => _x('Page Loader','backend customizer', 'dahztheme'),
            'priority'  => 50,
            'panel' => 'df_customizer_misc_panel'
        ));
        $wp_manager->add_section('df_customizer_404_section', array(
            'title'     => _x('Page 404','backend customizer', 'dahztheme'),
            'priority'  => 55,
            'panel' => 'df_customizer_misc_panel'
        ));
        $wp_manager->add_section('df_analytics_section', array(
            'title'     => _x('Analytics','backend customizer', 'dahztheme'),
            'priority'  => 60,
            'panel' => 'df_customizer_misc_panel'
        ));
        $wp_manager->add_section('df_customizer_custom_style_section', array(
            'title' => _x('Custom CSS', 'backend customizer', 'dahztheme'),
            'priority' => 140
        ));

        $list_font_weights = googlefont_family_weights();

        $wp_manager->add_setting('list_font_weights', array(
            'default'   => $list_font_weights,
            'type'      => 'option'
        ));
    }
    /**
     * Customizer manager init
     * @param  $wp_manager
     * @return void
     */
    public function df_customizer_manager_init($controls) {
    	$url = DF_CORE_URI . 'images/';
        
        // Additional Settings
        $layout_site = array(
            'full-width' => $url . 'fullwidth.png',
            'boxed' => $url . 'boxed.png',
            'frame' => $url . 'framed.png'
        );

        $background_opacity = array(
            'min' => '0',
            'max' => '100',
            'step' => '5'
        );

        $site_max_width = array(
            'min' => '800',
            'max' => '2200',
            'step' => '10'
        );

        $list_button_style = array(
            'flat'    => _x('Flat', 'customizer options', 'dahztheme'),
            '3d'      => _x('3D', 'customizer options', 'dahztheme'),
            'outline' => _x('Outline', 'customizer options', 'dahztheme')
        );

        $list_button_shape = array(
            'square'  => _x('Square', 'customizer options', 'dahztheme'),
            'round'   => _x('Rounded Rectangle', 'customizer options', 'dahztheme'),
            'rounded' => _x('Rounded', 'customizer options', 'dahztheme')
        );

        $list_fonts = googlefont_families();
        $list_font_weights = googlefont_family_weights();
        $list_all_font_weights = googlefont_family_all_weights();

        foreach ( glob( CUSTOMIZER_OPTION_SETT_DIR . '*.php' ) as $option_file ) {
            require_once $option_file;
        }

        return $controls;

    }
}
$df_theme_customizer = new Df_Theme_Customizer();
$df_theme_customizer->df_customizer_external_output();