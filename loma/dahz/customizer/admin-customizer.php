<?php
if ( ! defined( 'ABSPATH' ) ) { 
  exit;
} 
/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS - CUSTOMIZER/ADMIN-CUSTOMIZER.PHP

- Remove admin submenu page
- Add the Customize link to the admin menu
- Register customizer custom control
- Theme Activated
- Enqueue Stylesheet
- Global Options

/*-----------------------------------------------------------------------------------

     /**
     * dahz_remove_customize_submenu_page() 
     *
     * Remove submenu page
     * 
     * @return void
     */
  if( !function_exists('dahz_remove_customize_submenu_page') ) {  
   function dahz_remove_customize_submenu_page() {
        global $wp_version;

         if ( $wp_version >= '3.6' ) :
            remove_submenu_page( 'themes.php', 'customize.php' );
        endif;
    }
    add_action( 'admin_menu', 'dahz_remove_customize_submenu_page');
  }

     /**
     * Add the Customize link to the admin menu
     * @return void
     */
  if( !function_exists('dahz_customizer_register_admin_page') ) {  
    function dahz_customizer_register_admin_page() {
        add_menu_page( 'Dahz Config', 'Dahz Config', 'edit_theme_options', 'customize.php', NULL, NULL );
        add_submenu_page( 'customize.php', 'Customizer', 'Customizer', 'edit_theme_options', 'customize.php', NULL );

        do_action('custom_admin_customizer'); // Hook new submenu page

        add_submenu_page( 'customize.php', 'Customizer Import', 'Import', 'edit_theme_options', 'import', 'dahz_customizer_import_option_page' );
        add_submenu_page( 'customize.php', 'Customizer Export', 'Export', 'edit_theme_options', 'export', 'dahz_customizer_export_option_page' );
    }
    add_action( 'admin_menu',  'dahz_customizer_register_admin_page');
  }

    /**
     * dahz_customizer_control_init() 
     *
     * Initialize customizer custom control
     * 
     * @return void 
     */
  if( !function_exists('dahz_customizer_control_register') ) {
     function dahz_customizer_control_register() {

      	$customizer_control = array(
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/media/media-uploader-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/googlefont-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/text-description-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/text-subtitle-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/text-slider-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/layout/layout-picker-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/select/select-dropdown-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/textarea-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/checkbox-custom-control.php',
                             DF_CUSTOMIZER_CONTROL_DIR . 'controls/text/radiobox-custom-control.php'
          );

          foreach ( $customizer_control as $control ) {
      		require_once $control;            
  		}
  	}
      add_action( 'customize_register',  'dahz_customizer_control_register' );
  }

  if( !function_exists('dahz_customizer_reset') ) {
    function dahz_customizer_reset($wp_manager) {

    }
  }

  if ( ! function_exists( 'df_flush_rewriterules' ) ) {
    /**
     * Flush the WordPress rewrite rules to refresh permalinks with updated rewrite rules.
     * @since  1.0.0
     * @return void
     */
    function df_flush_rewriterules () {
      flush_rewrite_rules();
    } // End df_flush_rewriterules()
    }

    /**
     * Add default options and show Options Panel after activate
     * @since  1.0.0
     */
    global $pagenow;
    if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
      // Call action that sets.
     add_action( 'admin_head','df_customizer_option_setup' );
      // Flush rewrite rules.
     add_action( 'admin_head', 'df_flush_rewriterules', 9 );
    }

    if ( ! function_exists( 'df_customizer_option_setup' ) ) {
    /**
     * Update theme Customizer in database with options as stored in theme.
     * @since  1.0
     * @return void
     */
    function df_customizer_option_setup () {
      //Update EMPTY options
      WP_Filesystem();
      global $wp_filesystem;
      $encode_options = $wp_filesystem->get_contents( DF_CUSTOMIZER_CONTROL_DIR . 'default.json' );
      $option_name = 'df_options';
      $options = json_decode( $encode_options, true );
      foreach ( $options as $key => $value ) {
         $value              = maybe_unserialize( $value );
         $need_options[$key] = $value;
      }
      update_option( $option_name, $need_options );
      
    } // End df_customizer_option_setup()
    }

  /**
   * Get the admin color theme
   * @since  1.3
  */
  function dahz_admin_customizer_colors() {

    // Get the active admin theme
    global $_wp_admin_css_colors;

    // Get the user's admin colors
    $color = get_user_option( 'admin_color' );
    // If no theme is active set it to 'fresh'
    if ( empty( $color ) || ! isset( $_wp_admin_css_colors[$color] ) ) {
      $color = 'fresh';
    }

    $color = (array) $_wp_admin_css_colors[$color];

    return $color;

  }

  /**
  * Add custom CSS rules to the head, applying our custom styles
  * @since  1.3
  */
  function dahz_admin_customizer_custom_css() {

    $color   = dahz_admin_customizer_colors();

    $color_active  = $color['colors'][2];
    
    ?>
    <style>
    .ui.toggle.checkbox input:checked ~ .box,
    .ui.toggle.checkbox input:checked ~ label{
      color:<?php echo $color_active; ?>;
    }
    .ui.toggle.checkbox input:checked ~ .box:before,
    .ui.toggle.checkbox input:checked ~ label:before { 
      background-color: <?php echo $color_active; ?>; 
    }
    .ui-buttonset .ui-state-active{
      background-color: <?php echo $color_active; ?>; 
    }
    </style>
  <?php }
   add_action( 'customize_controls_print_styles', 'dahz_admin_customizer_custom_css', 9999 );
          
   /*-----------------------------------------------------------------------------------*/
   /* DAHZ Customizer Stylesheet */
   /*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'dahz_enqueue_customizer_admin' ) ) {
	  function dahz_enqueue_customizer_admin() {
      
	    wp_register_style( 'dahz-customizer', DF_CORE_CSS_DIR . 'dahz-customizer.css');
	    wp_enqueue_style( 'dahz-customizer' );
        
        //HOOK
        do_action('dahz_enqueue_customizer_admin');
	  }
	  add_action( 'customize_controls_print_styles', 'dahz_enqueue_customizer_admin' );
	}

  /* ----------------------------------------------------------------------------------- */
  /* DAHZ Customizer Admin Import/Export JS*/
  /* ----------------------------------------------------------------------------------- */
  if (!function_exists('df_impexp_customizer_admin_scripts')) {

      function df_impexp_customizer_admin_scripts() {

          wp_register_script('df-customizer-admin-impexp', DF_CORE_JS_DIR . 'customizer-admin.js', array('jquery'), '28042014', true);
          wp_enqueue_script('df-customizer-admin-impexp');
      }

      add_action('admin_enqueue_scripts', 'df_impexp_customizer_admin_scripts');
  }

  /**
   * Global Option Customizer 
   * Store settings value with df_options[theme_settings].
   * Get theme’s settings from database with df_options('theme_settings').
   * 
   * @param  string  $name    
   * @param  boolean $default 
   * @return value
   */

  function df_options($name, $default = false) {

      $saved = ( get_option('df_options') ) ? get_option('df_options') : null;

      $options = wp_parse_args( $saved, $default );

      $mod = apply_filters( 'df_options_get_mod', $options, $name );
      
        if (isset($mod[$name])) {
            return $mod[$name];
        }

      return $default;
    }


  /**
  * Returns a boolean on the customizer's state
  *
  * @param boolean $is_customizing
  * @since 1.3
  * @return boolean
  */
  function df_is_customizing() {
    //checks if is customizing : two contexts, admin and front (preview frame)
    global $pagenow;
    $is_customizing = false;
    if ( is_admin() && isset( $pagenow ) && 'customize.php' == $pagenow ) {
            $is_customizing = true;
    } else if ( ! is_admin() && isset($_REQUEST['wp_customize']) ) {
            $is_customizing = true;
    }
    return $is_customizing;
  }