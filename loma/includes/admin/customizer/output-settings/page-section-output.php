<?php 

if (!defined('ABSPATH')) exit;

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/PAGE-SECTION-OUTPUT.PHP
 *
 * - Customizer General Options CSS Output
 * 		1. Page Loader
 * 		2. Error 404 Page
  ================================================================================= */

// Customizer General Options CSS Output
// =============================================================================
$uppercase_title      = df_options( 'enable_uppercase_post_title' );
$page_loader          = df_options( 'df_page_loader' );
$page_loader_bgcolor 	= df_options( 'page_loader_background' );
$df_404_bg_type	     	= df_options( '404_background_type' ); 
$df_404_bg_color     	= df_options( '404_background_color' ); 
$df_404_opacity_color	= df_options( '404_opacity_color' ); 
$df_404_layout_rgba		= df_convert_rgba($df_404_bg_color, $df_404_opacity_color);
$df_404_bg_image     	= df_options( '404_background_image' );
$df_404_bg_repeat		  = df_options( '404_background_repeat' );
$df_404_bg_size			  = df_options( '404_background_size' );
$df_404_bg_pos_x		  = df_options( '404_background_pos-x' );
$df_404_bg_pos_y		  = df_options( '404_background_pos-y' );
$df_404_bg_attach		  = df_options( '404_background_attachment' );
?>

/*============================================================
  Uppercase Title
=============================================================*/
<?php if ( $uppercase_title == '0' ) : ?>
    .df-post-title, .related-title { text-transform: uppercase; }
<?php endif; ?>
/*============================================================
  Page Loader
=============================================================*/
<?php if ( $page_loader == '1' ): ?>
  .ajax_loader{ background: <?php echo $page_loader_bgcolor; ?>; }
 
<?php endif ?>

/*=====================================================================
  Error 404 Page
=====================================================================*/
<?php if ($df_404_bg_type == 'color') : ?>
.error404 .error-404{
	background-color: <?php echo $df_404_layout_rgba; ?>; }
<?php elseif ($df_404_bg_type == 'image'): ?>
.error404 .error-404{
	background-image: url('<?php echo $df_404_bg_image; ?>');
	background-repeat: <?php echo $df_404_bg_repeat; ?>;
	background-position: <?php echo $df_404_bg_pos_x; ?> <?php echo $df_404_bg_pos_y; ?>;
	background-attachment: <?php echo $df_404_bg_attach; ?>;
	background-size: <?php echo $df_404_bg_size; ?>;}
<?php endif; ?>