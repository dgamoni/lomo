<?php

if (!defined('ABSPATH')) exit;

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/FOOTER-SECTION-OUTPUT.PHP
 *
 * - Customizer Footer Options CSS Output
  ================================================================================= */

// Customizer Footer Options CSS Output
// =============================================================================
$df_footer_background_opacity  = df_options( 'footer_background_opacity' );
$df_footer_background_color    = df_options( 'footer_background_color' );
$df_footer_background_rgba     = df_convert_rgba( $df_footer_background_color, $df_footer_background_opacity );
$df_footer_background_image    = df_options( 'footer_background_image' );
$df_footer_background_repeat   = df_options('footer_background_pos-x') .' '. df_options('footer_background_pos-y') .' '. df_options('footer_background_repeat');
$df_footer_background_size     = df_options( 'footer_background_size' ); ?>

/*==========================================================================================
 Footer Background Color, Background Opacity, Background Image in Outer Area
==========================================================================================*/
.footer-primary-widgets{
    background:<?php echo $df_footer_background_rgba; ?> url(<?php echo $df_footer_background_image; ?>) <?php echo $df_footer_background_repeat; ?>;
	background-size:<?php echo $df_footer_background_size; ?>;
	}
#footer-colophon{
    background:<?php echo $df_footer_background_rgba; ?>;
}