<?php
/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/THEME-JS.PHP
 *
 * - Theme Frontend JavaScript
 * - Theme Admin JavaScript
 * - Metabox Options Custom JavaScript
 * - Theme Customizer JavaScript
 * - Theme Customizer Preview JavaScript
 * - Floating Menu JavaScript
 * - Display background image / video on Singular page 
  ================================================================================= */

/* ----------------------------------------------------------------------------------- */
/* Theme Frontend JavaScript                                                           */
/* ----------------------------------------------------------------------------------- */
if (!is_admin()) { add_action('wp_enqueue_scripts', 'df_add_javascript'); }
if (!function_exists('df_add_javascript')) {
    function df_add_javascript() {
        wp_enqueue_script('df-modernizr', THEME_URI . '/includes/js/modernizr.js', array('jquery'), NULL, true);
        wp_enqueue_script('df-plugins', THEME_URI . '/includes/js/plugins.js', array('jquery'), NULL, true);
        wp_register_script( 'page-loader', THEME_URI . '/includes/js/page-loader.min.js', array( 'jquery' ), NULL, true );
        do_action('df_add_javascript');

        wp_enqueue_script('df-main', THEME_URI . '/includes/js/main.min.js', array('jquery', 'df-plugins'), NULL, true);

        do_action('df_add_localize_script');
    }
}// End dahztheme_add_javascript()


/* ----------------------------------------------------------------------------------- */
/* Metabox Options Custom JavaScript                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_enqueue_metabox_options_script')) {
    function df_enqueue_metabox_options_script() {
        global $pagenow;
        if ( ( in_array( $pagenow, array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' ) ))) {
            wp_enqueue_script('meta-options-toggle', THEME_URI . '/includes/js/admin/metabox-options-toggle.js', array('jquery'), NULL, true);
        }
    }
    add_action('admin_enqueue_scripts', 'df_enqueue_metabox_options_script');
}// End df_enqueue_metabox_options_script()


/* ----------------------------------------------------------------------------------- */
/* Theme Customizer JavaScript                                                         */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_enqueue_customizer_admin_scripts')) {
    function df_enqueue_customizer_admin_scripts() {
        wp_register_script('df-customizer-admin', THEME_URI . '/includes/js/admin/theme-customizer.js', array('jquery'), NULL, true);
        wp_enqueue_script('df-customizer-admin');
    }
    add_action('customize_controls_print_footer_scripts', 'df_enqueue_customizer_admin_scripts');
}

/* ----------------------------------------------------------------------------------- */
/* Theme Customizer Preview JavaScript                                                 */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_enqueue_customizer_admin_preview_scripts')) {
    function df_enqueue_customizer_admin_preview_scripts() {
         wp_register_script('df-customizer-preview', THEME_URI . '/includes/js/admin/theme-customizer-preview.js', array('jquery', 'customize-preview'), NULL, true);
         wp_enqueue_script('df-customizer-preview');
    }
    add_action('customize_preview_init', 'df_enqueue_customizer_admin_preview_scripts');
}// End df_enqueue_customizer_admin_preview_scripts()

/* ----------------------------------------------------------------------------------- */
/* Floating Menu JavaScript                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_customizer_options_output_js')) {
    function df_customizer_options_output_js($output) {
        $df_float_menu = df_options('menu_float_setting');
        wp_register_script('float_menu', THEME_URI . '/includes/js/float_menu.min.js', array('jquery'), NULL, true);
        wp_register_script('float_menu_trans', THEME_URI . '/includes/js/float_menu_trans.min.js', array('jquery'), NULL, true);
        switch ($df_float_menu) {
            case '2' : /* Enable float menu */
                $output[] .= wp_enqueue_script('float_menu');            
                break;
            case '3' : /* Enable transparent float menu */
                $output[] .= wp_enqueue_script('float_menu_trans');
                break;
            default : /* None */
                $output[] .= '';
                break;
        }
        return $output;
    }
    add_action('df_add_javascript', 'df_customizer_options_output_js');
}// End df_customizer_options_output_js()

/* ----------------------------------------------------------------------------------- */
/* Display background image / video on Singular page                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_body_layout_background')) {
    function df_body_layout_background() {
         global $post, $wp_query;
         $post = $wp_query->get_queried_object();   
         if( !is_object($post) ) 
         return;

         $body_layout = get_post_meta(get_the_id(), 'df_metabox_layout_background', true);
         $body_layout_bg = get_post_meta(get_the_id(), 'df_metabox_layout_bg_image', true);
         $body_layout_vid = get_post_meta(get_the_id(), 'df_metabox_layout_bg_video', true);
         $body_layout_vid = rwmb_meta( 'df_metabox_layout_bg_video', 'type=file_advanced' );
         $body_layout_bg_fade = ( get_post_meta(get_the_id(), 'df_metabox_layout_bg_image_fade', true) == '' ) ? '750' : get_post_meta(get_the_id(), 'df_metabox_layout_bg_image_fade', true);
         $body_layout_bg_duration = ( get_post_meta(get_the_id(), 'df_metabox_layout_bg_image_duration', true) == '' ) ? '3000' : get_post_meta(get_the_id(), 'df_metabox_layout_bg_image_duration', true);

             switch($body_layout) {
             case 'image':
                 if ($body_layout_bg) :
                     $page_bg_images_output = '';
                     $page_bg_images = explode(',', $body_layout_bg);
                     foreach ($page_bg_images as $page_bg_image) {
                         $page_bg_images_output .= '"' . $page_bg_image . '", ';
                     }
                     $page_bg_images_output = trim($page_bg_images_output, ', '); ?>

                     <script>
                     //<![CDATA[
                       jQuery.backstretch([<?php echo $page_bg_images_output; ?>], {duration: <?php echo $body_layout_bg_duration; ?>, fade: <?php  echo $body_layout_bg_fade; ?>}); 
                       //]]>
                     </script>

            <?php  endif;
                 break;
             case 'video':
                 if ( $body_layout_vid ) :
                     $page_bg_vids_output = '';
                     foreach ($body_layout_vid as $vid) {
                         $page_bg_vids_output .= '"' . $vid['url'] . '"';
                     } ?>
                     <script>
                    // <![CDATA[
                    jQuery(function() {
                        var BV = new jQuery.BigVideo();
                        BV.init();
                        BV.show(<?php echo $page_bg_vids_output ?>, {
                                doLoop: true,
                                ambient: true,
                                mediaAspect: '16/9',
                            });
                    });
                    //]]>
                    </script> 
                    <?php  endif;
                 break;
             }
    }
    add_action('wp_footer', 'df_body_layout_background', 9999, 0);
}// End df_body_layout_background()


/* ----------------------------------------------------------------------------------- */
/* Page Loder                                  */
/* ----------------------------------------------------------------------------------- */
$page_transition = df_options('df_page_loader');
if($page_transition){ 
    if (!function_exists('df_register_page_loader')) {
        function df_register_page_loader() {
            wp_enqueue_script( 'page-loader' );
        }
   add_action( 'wp_enqueue_scripts', 'df_register_page_loader', 10 );
    }// End df_register_page_loader()
} 