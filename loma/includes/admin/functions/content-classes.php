<?php

if (!defined('ABSPATH')) { exit;}
/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/FUNCTIONS/CONTENT-CLASSES.PHP
 *
 * - Body Classes
 * - Full Width, Boxed, Boxed Frame Classes
 * - Site Brand Class
 * - Navbar Class
  ================================================================================= */

// Body Classes
// =============================================================================

/*-----------------------------------------------------------------------------------*/
/* Browser and operating system body class */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('df_browser_body_class')) :

    function df_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) {$classes[] = 'lynx';}
        elseif($is_gecko) {$classes[] = 'gecko';}
        elseif($is_opera) {$classes[] = 'opera';}
        elseif($is_NS4) {$classes[] = 'ns4';}
        elseif($is_safari) {$classes[] = 'safari';}
        elseif($is_chrome) {$classes[] = 'chrome';}
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                {$classes[] = 'ie'.$browser_version[1];}
        } else $classes[] = 'unknown';

        if($is_iphone) {$classes[] = 'iphone';}
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           }
        return $classes;

    }
    add_filter('body_class','df_browser_body_class');
    
endif;

/*-----------------------------------------------------------------------------------*/
/* Layout body class */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('df_layout_body_class')) :

    function df_layout_body_class($classes) {
        global $post;

        $df_header_navbar   = df_options('header_navbar_position');
        $df_header_navbar   = df_options('header_navbar_position');
        $df_button_style    = df_options('button_style');
        $df_button_shape    = df_options('button_shape');
        $theme_skin         = df_options('theme_skin');

        // Navbar positioning.
        switch ($df_header_navbar) {
            case 'fixed-left' :
                $classes[] = 'df-navibar-fixed-left-active';
                break;
            case 'fixed-right' :
                $classes[] = 'df-navibar-fixed-right-active';
                break;
            case 'left' :
                $classes[] = 'df-navibar-left-active';
                break;
            case 'right' :
                $classes[] = 'df-navibar-right-active';
                break;
            default :
                $classes[] = 'df-navibar-active';
                break;
        }    

        // Button style
        switch ($df_button_style) {
            case 'flat' :
                $classes[] = 'df-button-flat';
                break;
            case '3d' :
                $classes[] = 'df-button-3d';
                break;
            case 'outline' :
                $classes[] = 'df-button-outline';
                break;
        }

        // button shape
        switch ($df_button_shape) {
            case 'square' :
                $classes[] = 'df-button-square';
                break;
            case 'round' :
                $classes[] = 'df-button-round';
                break;
            case 'rounded' :
                $classes[] = 'df-button-rounded';
                break;
        }

        // button shape
        switch ($theme_skin) {
            case 'skin1' :
                $classes[] = 'df-layout-skin1';
                break;
            case 'skin2' :
                $classes[] = 'df-layout-skin2';
                break;
            case 'skin3' :
                $classes[] = 'df-layout-skin3';
                break;
            case 'skin4' :
                $classes[] = 'df-layout-skin4';
                break;
            default:
                $classes[] = 'df-layout-skin1';
                break;
        }

        return $classes;
    }

endif;

add_filter('body_class', 'df_layout_body_class', 10);


/*-----------------------------------------------------------------------------------*/
/* Determine what layout to use */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'df_get_layout_content_class' ) ) {
    function df_get_layout_content_class() {
        global $post, $wp_query;

        // Reset the query
        wp_reset_query();

        // Set default global layout
        $layout = 'two-col-left';
        if ( '' != df_options( 'layout_content' ) ) {
            $layout = df_options( 'layout_content');
        }

        // Single post layout
        if ( is_singular() ) {
            // Get layout setting from single post Custom Settings panel
            if ( '' != get_post_meta( $post->ID, 'df_metabox_layout_content', true ) ) {
                $layout = get_post_meta( $post->ID, 'df_metabox_layout_content', true );

            } 
        }
        return $layout;
    }
}

if (!function_exists('df_layout_content_class')) :

function df_layout_content_class($classes) {
    global $wp_query, $post;
    $classes[] = df_get_layout_content_class();
    return $classes;
}
endif;
add_filter('body_class', 'df_layout_content_class', 10);

// Add custom CSS class to the <body> tag if layout site option is checked. 
// ==================================================================================
if (!function_exists('df_boxed_layout_body_class')) :
    function df_boxed_layout_body_class($classes) {
        $layout_site = df_options('layout_site');
        // layout full-width, boxed or frame.
        switch ($layout_site) {
            case 'boxed' :
                $classes[] = 'df-boxed-layout-active';
                break;
            case 'full-width' :
                $classes[] = 'df-full-width-layout-active';
                break;
            case 'frame' :
                $classes[] = 'df-frame-boxed-layout-active';
                break;
            default :
                $classes[] = 'df-full-width-layout-active';
        }
        return $classes;
    }
endif;
add_filter('body_class', 'df_boxed_layout_body_class', 10);

// Site Brand Class
// =============================================================================

if (!function_exists('df_sitename_class')) {
    function df_sitename_class() {
        switch (df_options('logo')) {
            case '' :
                $output = 'df-sitename text';
                break;
            default :
                $output = 'df-sitename img';
                break;
        }
        echo $output;
    }
}
add_action('customize_save', 'df_sitename_class');

// Navbar Class
// =============================================================================
if (!function_exists('df_navibar_class')) {
    function df_navibar_class() {
        $df_header_navbar = df_options('header_navbar_position');
        switch ($df_header_navbar) {
            case 'fixed-left' :
                $output = 'df-navibar df-navibar-fixed-left';
                break;
            case 'fixed-right' :
                $output = 'df-navibar df-navibar-fixed-right';
                break;
            case 'left' :
                $output = 'df-navibar df-navibar-left';
                break;
            case 'right' :
                $output = 'df-navibar df-navibar-right';
                break;
            default :
                $output = 'df-navibar';
                break;
        }
        echo $output;
    }
}
add_action('customize_save', 'df_navibar_class');

// Big Grid And Blog List Class filter.
// =============================================================================
if (!function_exists('extra_class_post')) :
    function extra_class_post( $classes ) {
        if (is_archive()) {
            $layout_type = df_options('archive_author_layout');
        } else {
            $layout_type = df_options('homepage_layout');
        }

        $df_big_post_grid   = get_post_meta( get_the_ID(), 'df_metabox_enable_big_post_grid', true );
        $df_bg_mode_lay     = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
        $df_list_mode_lay   = get_post_meta( get_the_ID(), 'df_metabox_list_post_lay', true );

        // conditional from metabox feature image bg or big post grid
        // ============================================================
        
        // if option big post checked
        if ($df_bg_mode_lay == '1' && $df_big_post_grid == '1') {
            if ( !is_single() && get_post_type() == 'post' && ( $layout_type == 'list_post' || $layout_type == 'grid_post' ) ) {
                $classes[] = 'df-standard-image-big-skny big-post-grid';
            }
        } else if ($df_big_post_grid == '1') {

            // if post type is 'post' && layout is 'grid'
            if ( !is_single() && get_post_type() == 'post' && $layout_type == 'grid_post' ) {
                $classes[] = 'big-post-grid';
            }

        // if option feature image as bg post checked
        } else if ($df_bg_mode_lay == '1') {
            
            // if post type is 'post' && layout is 'list'
            if ( !is_single() && get_post_type() == 'post' && $layout_type == 'list_post' ) {

                // ignore list mode layout
                if ( $df_list_mode_lay == 'normal_lay' || $df_list_mode_lay == 'left_lay' || $df_list_mode_lay == 'right_lay' ) {
                    $classes[] = 'df-standard-image-big-skny';
                }

            // if post type is 'post' && layout is 'grid'
            } else if ( !is_single() && get_post_type() == 'post' && $layout_type == 'grid_post' ) {
                $classes[] = 'df-standard-image-big-skny';
            }

        }

        return $classes;
    }
endif;

add_filter( 'post_class', 'extra_class_post' );

/* ----------------------------------------------------------------------------------- */
/* blog list content layout                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_list_layout_class')) :
    function df_blog_list_layout_class($list_classes) {
        global $post;
        if (is_archive()) {
            $df_homepage_layout = df_options('archive_author_layout');
        } else {
            $df_homepage_layout = df_options('homepage_layout');
        }
        $df_big_mode_lay  = get_post_meta( $post->ID, 'df_metabox_ftr_img_background', true);
        $df_list_mode     = get_post_meta( $post->ID, 'df_metabox_list_post_lay', true);
        
        if (!is_single() && get_post_type() === 'post' && $df_homepage_layout == 'list_post' && $df_big_mode_lay != '1') {
            if ($df_list_mode == 'normal_lay') {
                $list_classes[] = 'df-standard-image-top';
            } else if ($df_list_mode == 'left_lay') {
                $list_classes[] = 'df-standard-image-left';
            } else if ($df_list_mode == 'right_lay') {
                $list_classes[] = 'df-standard-image-right';
            }
        }
        return $list_classes;
    }
endif;

add_filter( 'post_class', 'df_blog_list_layout_class' );

/* ----------------------------------------------------------------------------------- */
/* blog list add class to index                                                        */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_list_index_add_class')) :
    function df_blog_list_index_add_class() {

        $pagination_switcher = df_options('page_pagination');
        $df_homepage_layout = df_options('homepage_layout');

        $index_list_class = ' ';

        if ($df_homepage_layout == 'list_post' && ($pagination_switcher === 'infinite' || $pagination_switcher === 'infinite_button' || $pagination_switcher === 'infinite_button_count')) {
            echo ' isotope_ifncsr';
        }
    }
endif;


/* ----------------------------------------------------------------------------------- */
/* blog grid content layout                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_grid_layout_class')) :
function df_blog_grid_layout_class() {

    if (is_archive()) {
        $df_homepage_layout = df_options('archive_author_layout');
        $df_grid_mode       = df_options('archive_author_grid_layout_js');
        $df_grid_col_mode   = df_options('archive_author_grid_layout');
    } else {
        $df_homepage_layout = df_options('homepage_layout');
        $df_grid_mode       = df_options('grid_post_lay');
        $df_grid_col_mode   = df_options('grid_col_lay');
    }
    if (!is_single() && get_post_type() === 'post' && $df_homepage_layout === 'grid_post') :
            if ($df_grid_mode == 'fitrows_lay') {
                if ($df_grid_col_mode == 'two_col') {
                    echo 'df_grid_fit grid_2_col isotope_ifncsr';
                } else if ($df_grid_col_mode == 'three_col') {
                    echo 'df_grid_fit grid_3_col isotope_ifncsr';
                } else if ($df_grid_col_mode == 'four_col') {
                    echo 'df_grid_fit grid_4_col isotope_ifncsr';
                } else {
                    echo 'df_grid_fit grid_5_col isotope_ifncsr';
                }
            } else if ($df_grid_mode == 'masonry_lay') {
                if ($df_grid_col_mode == 'two_col') {
                    echo 'df_grid_masonry grid_2_col isotope_ifncsr';
                } else if ($df_grid_col_mode == 'three_col') {
                    echo 'df_grid_masonry grid_3_col isotope_ifncsr';
                } else if ($df_grid_col_mode == 'four_col') {
                    echo 'df_grid_masonry grid_4_col isotope_ifncsr';
                } else {
                    echo 'df_grid_masonry grid_5_col isotope_ifncsr';
                }
            }
    endif;
}
endif;

// Add filter to dahz_attr_comment-author 
// ==================================================================================
function df_comment_classes($attr) {
    $attr['class']     = 'comment-author name alignleft';
    return $attr;
}
add_filter( 'dahz_attr_comment-author', 'df_comment_classes' );

// Add filter to dahz_attr_content
// ==================================================================================
function df_custom_content_attr($attr) {
    $attr['class']     = 'df-main col-full';
    return $attr;
}
add_filter( 'dahz_attr_content', 'df_custom_content_attr' );
// Landing Page Template Menu filter.
// =============================================================================
if ( ! function_exists( 'landing_page_template_menu_filter' ) ) :
    function landing_page_template_menu_filter( $args ) {
        global $post;
        if( $args['theme_location'] == 'primary-menu' ) {
            $page_primary_menu = get_post_meta( $post->ID, 'df_metabox_primary_menu', true );
            $menu = wp_get_nav_menu_object($page_primary_menu);
            $args['menu'] = $menu;
        }
        return $args;
    }
endif;

// Landing Page Template Customize filter.
// =============================================================================
if ( ! function_exists( 'landing_page_template_options_filter' ) ) :
    function landing_page_template_options_filter( $mod = array(), $name = '' ) {
        global $post;

        switch( $name ) {
            case df_get_composer().'_layout_site':
                $page_layout = get_post_meta( $post->ID, 'df_metabox_page_layout', true );
                $mod[$name] = $page_layout;
                break;
            case df_get_composer().'_site_max_width':
                $site_max_width_layout = get_post_meta( $post->ID, 'df_metabox_site_max_width', true );
                $mod[$name] = $site_max_width_layout;
                break;
            case 'header_navbar_position':
                $navbar_position = get_post_meta( $post->ID, 'df_metabox_navbar_position', true );
                $mod[$name] = $navbar_position;
                break;
            case 'header_topbar':
                $hidden_parts = get_post_meta( $post->ID, "df_metabox_hidden_parts", false );
                if ( is_array( $hidden_parts ) ) {
                    $mod[ $name ] = !in_array('topbar', $hidden_parts);
                }
                break;
            case 'logo':
                $logo_regular = rwmb_meta( 'df_metabox_header_logo_regular', 'type=image' );
                foreach ( $logo_regular as $logo_reg ) {
                    $mod[$name] = $logo_reg['full_url'];
                }
                break;
            case 'custom_styles':
                $custom_css = get_post_meta( $post->ID, 'df_metabox_custom_css', true );
                $mod[$name] = $custom_css;
                break;
        }
    return $mod;
    }
endif;