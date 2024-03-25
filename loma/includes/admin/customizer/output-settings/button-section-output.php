<?php 

if (!defined('ABSPATH')) exit;

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/BUTTON-SECTION-OUTPUT.PHP
 *
 * - Customizer Button Options CSS Output
 * 		1. Button Color
 * 			- Flat Button
 * 			- 3D Button
 * 			- Outline Button
 * 		2. Button Color Hover
 * 		 	- Flat Button
 * 			- 3D Button
 * 			- Outline Button
  ================================================================================= */

// Customizer Button Options CSS Output
// =============================================================================
$df_button_style              = df_options( 'button_style' );
$df_button_txt_color          = df_options( 'button_text_color' );
$df_button_bg_color           = df_options( 'button_background_color' );
$df_button_border_color       = df_options( 'button_border_color' );
$df_button_bottom_color       = df_options( 'button_bottom_color' );
$df_button_txt_color_hover    = df_options( 'button_text_color_hover' );
$df_button_bg_color_hover     = df_options( 'button_background_color_hover' );
$df_button_border_color_hover = df_options( 'button_border_color_hover' );
$df_button_bottom_color_hover = df_options( 'button_bottom_color_hover' ); ?>


<?php if($df_button_style == 'flat') : ?>
	/*==========================================================================================
		Button Color
	==========================================================================================*/
	.df-button-flat input[type="submit"],.df-button-flat .button,.df-button-flat .widget a.button, 
	.df-button-flat a.button,.df-button-flat button,.df-button-flat input[type="reset"],.df-button-flat input[type="button"],
	.df-button-flat .df-infi-scr-btn .nav-next a{ 
		border-color:<?php echo $df_button_border_color ?>; 
		color:<?php echo $df_button_txt_color ?>;
		background:<?php echo $df_button_bg_color ?>;}
	/*==========================================================================================
		Button Color Hover
	==========================================================================================*/
	.df-button-flat input[type="submit"]:hover,.df-button-flat .button:hover,.df-button-flat .widget a.button:hover, 
	.df-button-flat a.button:hover,.df-button-flat button:hover,.df-button-flat input[type="reset"]:hover,.df-button-flat input[type="button"]:hover,
	.df-button-flat .df-infi-scr-btn .nav-next a:hover{ 
		border-color:<?php echo $df_button_border_color_hover ?>; 
		color:<?php echo $df_button_txt_color_hover ?>;
		background:<?php echo $df_button_bg_color_hover ?>;}
<?php elseif($df_button_style == '3d') : ?>
	/*==========================================================================================
		Button Color
	==========================================================================================*/
	.df-button-3d input[type="submit"],.df-button-3d .button,.df-button-3d .widget a.button, 
	.df-button-3d a.button,.df-button-3d button,.df-button-3d input[type="reset"],.df-button-3d input[type="button"],
	.df-button-3d .df-infi-scr-btn .nav-next a{ 
		border-color:<?php echo $df_button_border_color ?>; 
		color:<?php echo $df_button_txt_color ?>;
		background:<?php echo $df_button_bg_color ?>;
		box-shadow:0px 6px <?php echo $df_button_bottom_color ?>;
		-webkit-box-shadow:0px 6px <?php echo $df_button_bottom_color ?>;
		-moz-box-shadow:0px 6px <?php echo $df_button_bottom_color ?>;
		-ms-box-shadow:0px 6px <?php echo $df_button_bottom_color ?>;
		-o-box-shadow:0px 6px <?php echo $df_button_bottom_color ?>;}
	/*==========================================================================================
		Button Color Hover
	==========================================================================================*/
	.df-button-3d input[type="submit"]:hover,.df-button-3d .button:hover,.df-button-3d .widget a.button:hover, 
	.df-button-3d a.button:hover,.df-button-3d button:hover,.df-button-3d input[type="reset"]:hover,.df-button-3d input[type="button"]:hover,
	.df-button-3d .df-infi-scr-btn .nav-next a:hover{ 
		border-color:<?php echo $df_button_border_color_hover ?>; 
		color:<?php echo $df_button_txt_color_hover ?>;
		background:<?php echo $df_button_bg_color_hover ?>;
		box-shadow:0px 6px <?php echo $df_button_bottom_color_hover ?>;
		-webkit-box-shadow:0px 6px <?php echo $df_button_bottom_color_hover ?>;
		-moz-box-shadow:0px 6px <?php echo $df_button_bottom_color_hover ?>;
		-ms-box-shadow:0px 6px <?php echo $df_button_bottom_color_hover ?>;
		-o-box-shadow:0px 6px <?php echo $df_button_bottom_color_hover ?>;}
<?php elseif($df_button_style == 'outline') : ?>
	/*==========================================================================================
		Button Color
	==========================================================================================*/
	.df-button-outline input[type="submit"],.df-button-outline .button,.df-button-outline .widget a.button, 
	.df-button-outline a.button,.df-button-outline button,.df-button-outline input[type="reset"],.df-button-outline input[type="button"],
	.df-button-outline .df-infi-scr-btn .nav-next a{ 
		border:1px solid <?php echo $df_button_border_color ?>; 
		color:<?php echo $df_button_txt_color ?>;
		background:transparent;}
	/*==========================================================================================
		Button Color Hover
	==========================================================================================*/
	.df-button-outline input[type="submit"]:hover,.df-button-outline .button:hover,.df-button-outline .widget a.button:hover, 
	.df-button-outline a.button:hover,.df-button-outline button:hover,.df-button-outline input[type="reset"]:hover,.df-button-outline input[type="button"]:hover,
	.df-button-outline .df-infi-scr-btn .nav-next a:hover{ 
		border:1px solid <?php echo $df_button_border_color_hover ?>; 
		color:<?php echo $df_button_txt_color_hover ?>; 
		background:transparent;}
<?php endif; ?>