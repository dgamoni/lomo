<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; 
}
/**
 * Dahz Framework - A WordPress theme development framework.
 * @package   DahzFramework
 * @version   1.2.1
 * @author    Dahz
 * @copyright Copyright (c) 2015, Dahz
 */

    /**
     * Defines the constant paths for use within the core framework, parent theme, and child theme.  
     * Constants prefixed with 'DF_' are for use only within the core framework and don't 
     * reference other areas of the parent or child theme.
     *
     * @since 1.0.0
     */
        /* Sets the framework version number. */
        define( 'DF_VERSION', '1.2.1' );

        /* Sets the path to the parent theme directory. */
        define( 'THEME_DIR', get_template_directory() );

        /* Sets the path to the parent theme directory URI. */
        define( 'THEME_URI', get_template_directory_uri() );

        /* Sets the path to the child theme directory. */
        define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

        /* Sets the path to the child theme directory URI. */
        define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

        /* Sets the path to the core framework directory. */
        if(!defined('DF_CORE_DIR'))
        define( 'DF_CORE_DIR', trailingslashit( trailingslashit( THEME_DIR ) . basename( dirname( __FILE__ ) ) ) );

        /* Sets the path to the core framework directory URI. */
        if(!defined('DF_CORE_URI'))
        define( 'DF_CORE_URI', trailingslashit( trailingslashit( THEME_URI ) . basename( dirname( __FILE__ ) ) ) );

        define( 'DF_CUSTOMIZER_CONTROL_DIR', trailingslashit( trailingslashit( DF_CORE_DIR ) . 'customizer' ) );

        /* Sets the path to the core framework extensions directory. */
        define( 'DF_EXTENSION_DIR', trailingslashit( trailingslashit( DF_CORE_DIR ) . 'extensions' ) );
        
        /* Sets the path to the core framework functions directory. */
        define( 'DF_FUNCTION_DIR', trailingslashit( trailingslashit( DF_CORE_DIR ) . 'functions' ) );

        /* Sets the path to the core framework CSS directory URI. */
        define( 'DF_CORE_CSS_DIR', trailingslashit( trailingslashit( DF_CORE_URI ) . 'css' ) );

        /* Sets the path to the core framework JavaScript directory URI. */
        define( 'DF_CORE_JS_DIR', trailingslashit( trailingslashit( DF_CORE_URI ) . 'js' ) );

        /* Sets the path to the core framework images directory URI. */
        define( 'DF_CORE_IMG_DIR', trailingslashit( trailingslashit( DF_CORE_URI ) . 'images' ) );

        /* metabox PATH and URL */
        define( 'RWMB_URL', trailingslashit( DF_CORE_URI . 'meta-box' ) );
        define( 'RWMB_DIR', trailingslashit( DF_CORE_DIR . 'meta-box' ) );


        require_once DF_CORE_DIR . 'admin-setup.php';    

        /** Customizer Setup */
        require_once DF_CUSTOMIZER_CONTROL_DIR . 'admin-customizer.php';
        require_once DF_CUSTOMIZER_CONTROL_DIR . 'controls-customizer.php';
        /** Backup Import / Export */
        require_once DF_CUSTOMIZER_CONTROL_DIR . 'admin-customizer-backup.php';

        require_once DF_FUNCTION_DIR . 'attr.php';
        require_once DF_FUNCTION_DIR . 'post-formats.php';
        require_once DF_FUNCTION_DIR . 'template.php';
        require_once DF_FUNCTION_DIR . 'pagination.php';
        require_once DF_FUNCTION_DIR . 'breadcrumbs.php';
        require_once DF_FUNCTION_DIR . 'basic.php';
        require_once DF_FUNCTION_DIR . 'deprecated.php';

        require_once DF_EXTENSION_DIR . 'aqua-resizer.php';
        require_once DF_EXTENSION_DIR . 'get-the-image.php';
        require_once RWMB_DIR . 'meta-box.php';



    function get_theme_framework_version_data() {

        $response = array(
            'theme_version' => '', 
            'theme_name' => '', 
            'framework_version' => get_option( 'df_framework_version' ), 
            'is_child' => is_child_theme(), 
            'child_theme_version' => '', 
            'child_theme_name' => ''
            );

        if ( function_exists( 'wp_get_theme' ) ) {
          $theme_data = wp_get_theme();
          if ( true == $response['is_child'] ) {
            $response['theme_version'] = $theme_data->parent()->Version;
            $response['theme_name'] = $theme_data->parent()->Name; 

            $response['child_theme_version'] = $theme_data->Version;
            $response['child_theme_name'] = $theme_data->Name;
          } else {
            $response['theme_version'] = $theme_data->Version;
            $response['theme_name'] = $theme_data->Name;
          }
        } else {
          $theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
          $response['theme_version'] = $theme_data['Version'];
          $response['theme_name'] = $theme_data['Name'];

          if ( true == $response['is_child'] ) {
            $theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
            $response['child_theme_version'] = $theme_data['Version'];
            $response['child_theme_name'] = $theme_data['Name'];
          }
        }

        return $response;

    }

    function get_theme_framework_version_init() {

          $df_framework_version = DF_VERSION;
          if ( get_option( 'df_framework_version' ) != $df_framework_version ) {
            update_option( 'df_framework_version', $df_framework_version );
          }

    }
      add_action( 'init', 'get_theme_framework_version_init', 10 );

    function dahz_framework_version() {

        $data = get_theme_framework_version_data();
        echo "\n<!-- Theme version -->\n";
        if ( isset( $data['is_child'] ) && true == $data['is_child'] ) echo '<meta name="generator" content="'. esc_attr( $data['child_theme_name'] . ' ' . $data['child_theme_version'] ) . '" />' ."\n";
        echo '<meta name="generator" content="'. esc_attr( $data['theme_name'] . ' ' . $data['theme_version'] ) . '" />' ."\n";
        echo '<meta name="generator" content="DahzFramework '. esc_attr( DF_VERSION ) .'" />' ."\n";

    }
      add_action( 'wp_head', 'dahz_framework_version', 10 );