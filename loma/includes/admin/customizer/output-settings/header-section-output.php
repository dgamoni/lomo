<?php
if (!defined('ABSPATH')) exit;

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/HEADER-SECTION-OUTPUT.PHP
 *
 * - Customizer Header Options CSS Output
 * 		1. Navbar Height
 * 		2. Navbar Width
 *    3. Navbar Background Color
 * 		3. Logo Width
 * 		4. Navbar Logo Alignment
 * 		5. Navbar Link Alignment
 * 		6. Widget Background Button
 * 		7. Widget Background Button Hover
 * 		8. Topbar Background Color
 * 		9. Topbar Text Color
  ================================================================================= */

// Customizer Header Options CSS Output
// =============================================================================

$df_navbar_height            		= df_options( 'header_navbar_height' );
$df_navbar_width             		= df_options( 'header_navbar_width' );
$df_navbar_bgcolor              = df_options( 'navbar_bgcolor_setting' ); 
$df_navbar_bg_image             = df_options( 'navbar_background_image' ); 
$df_navbar_bg_repeat            = df_options( 'navbar_background_pos-x' ) .' '.  df_options('navbar_background_pos-y') .' '. df_options('navbar_background_repeat'); 
$df_navbar_bg_size              = df_options( 'navbar_background_size' ); 

$df_logo_width               		= df_options( 'logo_width' );
$df_navbar_logo_alignment    		= df_options( 'navbar_logo_alignment' );
$df_navbar_links_alignment   		= df_options( 'navbar_link_alignment' );

$df_widgetbar_bgbutton       		= df_options( 'widgetbar_bgbutton' );
$df_widgetbar_bgbutton_hover 		= df_options( 'widgetbar_bgbutton_hover' );

$df_topbar_bgcolor     			  	= df_options( 'topbar_bgcolor_setting' );
$df_topbar_text_color  			  	= df_options( 'topbar_text_color' ); 

$df_navbar_submenu_color        = df_options( 'submenu_bgcolor_setting' );
?>


/*============================================================
  Navbar Height
=============================================================*/
.df-navibar-inner{
    min-height:<?php echo $df_navbar_height . 'px'; ?>;
}

/*============================================================
  Navbar Width
=============================================================*/
@media only screen and (min-width:960px) {
  .df-navibar-fixed-left, .df-navibar-fixed-right{
      width:<?php echo $df_navbar_width . 'px'; ?>;
  }
  body.df-navibar-fixed-left-active{
    padding-left:<?php echo $df_navbar_width . 'px'; ?>;
  }
  body.df-navibar-fixed-right-active {
    padding-right:<?php echo $df_navbar_width . 'px'; ?>;
  }
  .df-navibar-fixed-right-active .scroll-top {
      right:<?php echo $df_navbar_width . 'px'; ?>;
  }
}
@media only screen and (max-width:959px) {
    .df-navibar-fixed-left-active .header-widgets{
        left:0;
    }
    .df-navibar-fixed-right-active .header-widgets{
        right:0;
    }
}

/*============================================================
  Navbar Background
=============================================================*/
div.df-navibar,.df-float-menu{
    background:<?php echo $df_navbar_bgcolor; ?> url(<?php echo $df_navbar_bg_image; ?>) <?php echo $df_navbar_bg_repeat; ?>;
    background-size:<?php echo $df_navbar_bg_size; ?>;
}
@media only screen and (max-width:959px) {
  .df-navibar.df-menu-transparent{
    background:<?php echo $df_navbar_bgcolor; ?> url(<?php echo $df_navbar_bg_image; ?>) <?php echo $df_navbar_bg_repeat; ?>;
    background-size:<?php echo $df_navbar_bg_size; ?>;
  }
}
/*============================================================
  Logo Width
=============================================================*/
.df-sitename img{width:<?php echo $df_logo_width / 2 . 'px'; ?>;}
/*============================================================
  Navbar Logo Alignment
=============================================================*/
.df-sitename{padding-top:<?php echo $df_navbar_logo_alignment . 'px'; ?>;}
/*============================================================
  Navbar Link Alignment
=============================================================*/
  .df-navibar-fixed-left-active .df-navibar .df-navi,
  .df-navibar-fixed-right-active .df-navibar .df-navi,
  .df-navibar-active .df-navibar .df-navi > li,
  .df-navibar-left .df-navi > li,
  .df-navibar-right .df-navi > li {
	margin-top:<?php echo $df_navbar_links_alignment . 'px'; ?>;}
/*=====================================================================
  Widget Background Button
=====================================================================*/
.df-widgetbar-button{
border-top-color:<?php echo $df_widgetbar_bgbutton; ?>;
border-right-color:<?php echo $df_widgetbar_bgbutton; ?>;
}
/*=====================================================================
  Widget Background Button Hover
=====================================================================*/
.df-widgetbar-button:hover{
border-top-color:<?php echo $df_widgetbar_bgbutton_hover; ?>;
border-right-color:<?php echo $df_widgetbar_bgbutton_hover; ?>;
}

@media only screen and (max-width: 959px) {
  /*=====================================================================
  Widget Background Button
  =====================================================================*/
  .df-widgetbar-button{
      background-color:<?php echo $df_widgetbar_bgbutton; ?>;
  }
  /*=====================================================================
  Widget Background Button Hover
  =====================================================================*/
  .df-widgetbar-button:hover{
      background-color:<?php echo $df_widgetbar_bgbutton_hover; ?>;
  }
}
/*============================================================
  Topbar Background Color
=============================================================*/
div.df-topbar, ul.top-navigation ul{
    background:<?php echo $df_topbar_bgcolor; ?>;}
/*============================================================
  Topbar Text Color
=============================================================*/
.df-topbar .info-description,.df-topbar .info-description a,.df-topbar .df-social a,.top-search,.df-topbar li a,
.df-topbar .df-social-skin2 a
{color:<?php echo $df_topbar_text_color; ?>;}
/*============================================================
  subnav bg Color
=============================================================*/
.main-navigation .sub-nav,.top-navigation .sub-nav{
    background-color: <?php echo $df_navbar_submenu_color; ?>;
}
@media only screen and (min-width: 960px) {
  .main-navigation .mega-full-width>.sub-nav {
    background-color: <?php echo $df_navbar_submenu_color; ?>!important;
  }
}
