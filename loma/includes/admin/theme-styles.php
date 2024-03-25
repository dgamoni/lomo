<?php

if (!defined('ABSPATH')) {
    exit;
}
/* ----------------------------------------------------------------------------------- */
/* Load style.css in the <head>                                                        */
/* ----------------------------------------------------------------------------------- */

if (!is_admin()) {
    add_action('wp_enqueue_scripts', 'df_load_frontend_css', 20);
}

if (!function_exists('df_load_frontend_css')) {

    function df_load_frontend_css() {
        $theme_skin                     = df_options( 'theme_skin' );
        $custom_fonts                   = df_options( 'custom_fonts' );
        $custom_font_subsets            = df_options( 'custom_font_subsets' );
        $subset_cyrillic                = df_options( 'custom_font_subset_cyrillic' );
        $subset_greek                   = df_options( 'custom_font_subset_greek' );
        $subset_vietnamese              = df_options( 'custom_font_subset_vietnamese' );
        $logo_font_family               = df_options( 'logo_font_family' );
        $logo_font_family_query         = str_replace( ' ', '+', $logo_font_family );
        $logo_font_weight_and_style     = df_options( 'logo_font_weight' );
        $logo_font_weight               = ( strpos( $logo_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $logo_font_weight_and_style ) : $logo_font_weight_and_style;
        $navbar_font_family             = df_options( 'navbar_font_family' );
        $navbar_font_family_query       = str_replace( ' ', '+', $navbar_font_family );
        $navbar_font_weight_and_style   = df_options( 'navbar_font_weight' );
        $navbar_font_weight             = ( strpos( $navbar_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $navbar_font_weight_and_style ) : $navbar_font_weight_and_style;
        $headings_font_family           = df_options( 'headings_font_family' );
        $headings_font_family_query     = str_replace( ' ', '+', $headings_font_family );
        $headings_font_weight_and_style = df_options( 'headings_font_weight' );
        $headings_font_weight           = ( strpos( $headings_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $headings_font_weight_and_style ) : $headings_font_weight_and_style;
        $body_font_family               = df_options( 'body_font_family' );
        $body_font_family_query         = str_replace( ' ', '+', $body_font_family );
        $body_font_weight_and_style     = df_options( 'body_font_weight' );
        $body_font_weight               = ( strpos( $body_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $body_font_weight_and_style ) : $body_font_weight_and_style;
        $protocol                       = is_ssl() ? 'https' : 'http';
        $subsets                        = 'latin,latin-ext';


        if ($custom_font_subsets == 1) {
            if ($subset_cyrillic == 1) {
                $subsets .= ',cyrillic,cyrillic-ext';
            }
            if ($subset_greek == 1) {
                $subsets .= ',greek,greek-ext';
            }
            if ($subset_vietnamese == 1) {
                $subsets .= ',vietnamese';
            }
        }

   
        $default_font_set = array(
            'family' => urlencode('Crimson Text:400,400italic,600,600italic,700,700italic|Libre Baskerville:400,700,400italic'),
            'subset' => $subsets
        );


        $custom_font_set = array(
            'family' => $body_font_family_query . ':' . $body_font_weight_and_style . '%7c' . $navbar_font_family_query . ':' . $navbar_font_weight_and_style . '%7c' . $headings_font_family_query . ':' . $headings_font_weight_and_style . '%7c' . $logo_font_family_query . ':' . $logo_font_weight_and_style,
            'subset' => $subsets,
        );

        // Output google font css in header
        $get_custom_font_family = add_query_arg($custom_font_set, $protocol . '://fonts.googleapis.com/css');
        $get_default_font_family = add_query_arg($default_font_set, $protocol . '://fonts.googleapis.com/css');

        wp_register_style('df-font-custom', $get_custom_font_family, NULL, NULL, 'all');
        wp_register_style('df-font-default', $get_default_font_family, NULL, NULL, 'all');

        wp_register_style('df-stylesheet', get_stylesheet_uri(), array(), '1.0.0', 'all');
        wp_register_style('df-layout', THEME_URI . '/includes/css/layout.css', NULL, NULL);

        wp_register_style('df-fonts', THEME_URI . '/includes/css/dhicon.css', NULL, NULL);

        wp_register_style('monothemes', THEME_URI . '/includes/css/monothemes.css', NULL, NULL);
        wp_enqueue_style('monothemes');

        wp_enqueue_style('df-layout');
        
        if ($theme_skin == 'skin1') {
            wp_enqueue_style('df-skin1', THEME_URI . '/includes/css/skin1.css', NULL, NULL);
        } else if ($theme_skin == 'skin2') {
            wp_enqueue_style('df-skin2', THEME_URI . '/includes/css/skin2.css', NULL, NULL);
        } else if ($theme_skin == 'skin3') {
            wp_enqueue_style('df-skin3', THEME_URI . '/includes/css/skin3.css', NULL, NULL);
        } else if ($theme_skin == 'skin4') {
            wp_enqueue_style('df-skin4', THEME_URI . '/includes/css/skin4.css', NULL, NULL);
        }

        if (is_rtl()) {
            wp_enqueue_style('df-rtl', THEME_URI . '/includes/css/rtl.css', NULL, NULL);
        }
        do_action('df_load_frontend_css');

        wp_enqueue_style('df-fonts');


        if ($custom_fonts == 1) {
            wp_enqueue_style('df-font-custom');
        } else {
            wp_enqueue_style('df-font-default');
        }
    }

// End df_load_frontend_css()
}


/* ----------------------------------------------------------------------------------- */
/* Theme Customizer Stylesheet                                                         */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_enqueue_customizer_admin_style')) {

    function df_enqueue_customizer_admin_style() {

        wp_register_style('df-customizer-admin', THEME_URI . '/includes/css/admin/theme-customizer.css');
        wp_enqueue_style('df-customizer-admin');
    }

    add_action('dahz_enqueue_customizer_admin', 'df_enqueue_customizer_admin_style');
}

/* ----------------------------------------------------------------------------------- */
/* Theme Editor wyswyg Stylesheet                                                      */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_add_editor_styles')) {
    function df_add_editor_styles() {
        add_editor_style( THEME_URI . '/includes/css/admin/editor-styles.css' );
    }
    add_action( 'after_setup_theme', 'df_add_editor_styles' );
}
