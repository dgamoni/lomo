<?php

/**
 * dahztheme functions and definitions
 *
 * @package dahztheme
 */
/* ------------------------------------------------------------------------------------

  TABLE OF CONTENTS

  - Theme Setup
  - Plugin Activation

  ------------------------------------------------------------------------------------ */

/* ----------------------------------------------------------------------------------- */
/* Set the content width based on the theme's design and stylesheet.                   */
/* ----------------------------------------------------------------------------------- */
if ( ! function_exists( 'dahztheme_composer_post_thumbnail_width' ) ) :

  function dahztheme_composer_post_thumbnail_width() {

    //
    // 1. Subtract half of the span margin setup by the grid.
    //

    $meta_layout_content       = df_options( 'layout_content' );
    $meta_layout_site          = df_options( 'layout_site' );
    $meta_site_width           = df_options( 'site_width' );
    $meta_site_max_width       = df_options( 'site_max_width' );
    $meta_content_width        = df_options( 'content_width' );

    $content = ( $meta_layout_content       == '' ) ? 'two-col-left' : $meta_layout_content;
    $site    = ( $meta_layout_site          == '' ) ? 'full-width'      : $meta_layout_site;
    $s_w     = ( $meta_site_width         == '' ) ? 88 / 100          : $meta_site_width / 100;
    $max     = ( $meta_site_max_width     == '' ) ? 1200              : $meta_site_max_width;
    $c_w     = ( $meta_content_width == '' ) ? 100 - 3.389830508474576      : $meta_content_width - 3.389830508474576 ; // 1

    if ( $content == 'one-col' ) {
      if ( $site == 'full-width' ) {
        $output = $max;
      } elseif ( $site == 'boxed' || $site == 'frame' ) {
        $output = $max * $s_w;
      }
    } else {
      if ( $site == 'full-width' ) {
        $output = round( $max * ( $c_w / 100 ) );
      } elseif ( $site == 'boxed' || $site == 'frame' ) {
        $output = round( $max * ( $c_w / 100 ) * $s_w );
      }
    }

    if ( $site == 'full-width' ) {
      if ( $max < 959 * $s_w ) {
        $output = $max;
      } else {
        if ( $output < ( 959 * $s_w ) ) {
          $output = round( 959 * $s_w );
        }
      }
    } elseif ( $site == 'boxed' || $site == 'frame' ) {
      if ( $max * $s_w < 959 * $s_w * $s_w ) {
        $output = $max * $s_w;
      } else {
        if ( $output < ( 959 * $s_w * $s_w ) ) {
          $output = round( 959 * $s_w * $s_w );
        }
      }
    }
    
    return $output;

  }

endif;

add_action( 'customize_save', 'dahztheme_composer_post_thumbnail_width' );

if (!isset($content_width)) {
    $content_width =  dahztheme_composer_post_thumbnail_width(); /* pixels */
}

if (!function_exists('dahztheme_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dahztheme_setup() {

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        // This theme uses post thumbnails
        add_theme_support('post-thumbnails');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Plugin Support
        add_theme_support( 'woocommerce' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        // This theme uses wp_nav_menu() in one location.
        add_theme_support('nav-menus');
        register_nav_menus(array(
            'primary-menu' => __('Primary Menu', 'dahztheme'),
            'top-menu' => __('Top Menu', 'dahztheme'),
            'footer-menu' => __('Footer Menu', 'dahztheme')
        ));

        /* Adds core WordPress HTML5 support. */
        add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );
        // Enable support for Post Formats.
        add_theme_support('post-formats', array('audio', 'gallery', 'image', 'video', 'quote', 'link', 'chat', 'aside', 'status'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background');
        add_theme_support('custom-header');
    }

endif; // dahztheme_setup
add_action('after_setup_theme', 'dahztheme_setup', 5);


if (!function_exists('df_remove_menus')) :

    function df_remove_menus() {

        remove_submenu_page('themes.php', 'custom-header');     // 1
        remove_submenu_page('themes.php', 'custom-background'); // 2
    }

    add_action('admin_menu', 'df_remove_menus', 9999);
endif;


/* ----------------------------------------------------------------------------------- */
/* Plugins activation                                                                  */
/* ----------------------------------------------------------------------------------- */

require_once EXTENSIONS_DIR . 'class-tgm-plugin-activation.php';

if (!function_exists('df_register_required_plugins')) {

    function df_register_required_plugins() {
        $plugins = array(
            array(
                'name' => 'Dahz DF Shortcodes', // The plugin name
                'slug' => 'df-shortcodes', // The plugin slug (typically the folder name)
                'source' => INC_URI . 'plugins/df-shortcodes.zip', // The plugin source
                'required' => true, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => 'Master Slider', // The plugin name
                'slug' => 'masterslider', // The plugin slug (typically the folder name)
                'source' => INC_URI . 'plugins/masterslider.zip', // The plugin source
                'required' => true, // If false, the plugin is only 'recommended' instead of required
                'version' => '2.7.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Sidebar Generator', // The plugin name
                'slug'                  => 'sidebar-generator', // The plugin slug (typically the folder name)
                'source'                => INC_URI . 'plugins/sidebar-generator.zip', // The plugin source
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => 'Contact Form 7', // The plugin name 
                'slug' => 'contact-form-7', // The plugin slug (typically the folder name)
                'required' => false, // If false, the plugin is only 'recommended' instead of required
            ),
            array(
                'name' => 'Alpine PhotoTile for Instagram', // The plugin name 
                'slug' => 'alpine-photo-tile-for-instagram', // The plugin slug (typically the folder name)
                'required' => false, // If false, the plugin is only 'recommended' instead of required
            ),
            array(
                'name' => 'MailChimp for WordPress', // The plugin name 
                'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
                'required' => false, // If false, the plugin is only 'recommended' instead of required
            ),
        );


        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            //'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
            'default_path' => '', // Default absolute path to pre-packaged plugins
            'parent_menu_slug' => 'themes.php', // Default parent menu slug
            'parent_url_slug' => 'themes.php', // Default parent URL slug
            'menu' => 'install-required-plugins', // Menu slug
            'has_notices' => true, // Show admin notices or not
            'is_automatic' => false, // Automatically activate plugins after installation or not
            'message' => '', // Message to output right before the plugins table
            'strings' => array(
                'page_title' => __('Install Required Plugins', 'dahztheme'),
                'menu_title' => __('Install Plugins', 'dahztheme'),
                'installing' => __('Installing Plugin: %s', 'dahztheme'), // %1$s = plugin name
                'oops' => __('Something went wrong with the plugin API.', 'dahztheme'),
                'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
                'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
                'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
                'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
                'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
                'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
                'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
                'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
                'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins'),
                'return' => __('Return to Required Plugins Installer', 'dahztheme'),
                'plugin_activated' => __('Plugin activated successfully.', 'dahztheme'),
                'complete' => __('All plugins installed and activated successfully. %s', 'dahztheme'), // %1$s = dashboard link
                'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'df_register_required_plugins');
}


/* ------------------------------------------------------------------ */
/* ADD PRETTYPHOTO REL ATTRIBUTE FOR LIGHTBOX                         */
/* ------------------------------------------------------------------ */

 