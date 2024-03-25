<?php

if (!defined('ABSPATH')) exit;

//==============================================================
// Header
//==============================================================
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'header_navbar_position',
           'label'    => _x( 'Navbar Position', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => 'center',
           'choices'   => array(
                    'center' => 'Center Logo Area',
                    'right' => 'Right Logo Area',
                    'left' => 'Left Logo Area',
                    'fixed-right' => 'Right Navbar',
                    'fixed-left' => 'Left Navbar'),
           'priority' => 5,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'header_navbar_height',
           'label'    => _x( 'Navbar Height', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '100',
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'header_navbar_width',
           'label'    => _x( 'Navbar Width', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '300',
           'priority' => 11,
         );

// navbar background setting
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_navbar_subtitle',
           'label'    => _x( 'NAVBAR BACKGROUND SETTINGS ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 12
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'navbar_bgcolor_setting',
           'label'    => _x( 'Navbar Background Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '#FFF',
           'priority' => 13,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'navbar_background_image',
           'label'    => _x( 'Navbar Background Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 14,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_background_repeat',
           'label'    => _x( 'Navbar Background Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => 'no-repeat',
           'choices'   => array(
                'no-repeat' => _x('No Repeat', 'backend customizer','dahztheme'),
                'repeat'    => _x('Repeat', 'backend customizer','dahztheme'),
                'repeat-x'  => _x('Repeat X','backend customizer', 'dahztheme'),
                'repeat-y'  => _x('Repeat Y','backend customizer', 'dahztheme'),
            ),
           'priority' => 15,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_background_pos-x',
           'label'    => _x( 'Navbar Background Position', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => 'center',
           'choices'   => array(
                'left'      => 'Left',
                'center'    => 'Center',
                'right'     => 'Right'
            ),
           'priority' => 16,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_background_pos-y',
           'label'    => '',
           'section'  => 'df_customizer_header_section',
           'default'  => 'center',
           'choices'   => array(
                'top'       => 'Top',
                'center'    => 'Center',
                'bottom'    => 'Bottom'
            ),
           'priority' => 17,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_background_size',
           'label'    => '',
           'section'  => 'df_customizer_header_section',
           'default'  => 'auto',
           'choices'   => array(
                    'auto'    => 'Auto',
                    'contain'  => 'Contain',
                    'cover'  => 'Cover'),
           'priority' => 18,
         );

// logo settings
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_logo_subtitle',
           'label'    => _x( 'LOGO SETTINGS ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 19
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'logo',
           'label'    => _x( 'Custom Logo', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 20,
         );
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'logo_description',
           'label'    => _x( 'use a 2x image for retina display.', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 21,
         );
$controls[] = array(
           'type'     => 'text',
           'setting'  => 'logo_width',
           'label'    => _x( 'Logo Width (px)', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 25,
         );
// align settings
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_align_subtitle',
           'label'    => _x( 'ALIGNMENT SETTINGS ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 29
         );
$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_logo_alignment',
           'label'    => _x( 'Navbar Logo Alignment (px)', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '22',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_link_alignment',
           'label'    => _x( 'Navbar Link Alignment (px)', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '32',
           'priority' => 35,
         );

/* Header Widget Bar */
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_widget_subtitle',
           'label'    => _x( 'WIDGETBAR SETTINGS','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 44
         );
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'header_widget_bar',
           'label'    => _x( 'Header Widgetbar', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '3',
           'choices'   => array(
                        0 => _x('None (Disable Widgetbar)','backend customizer', 'backend_dahztheme'),
                        1 => _x('One','backend customizer', 'backend_dahztheme'),
                        2 => _x('Two','backend customizer', 'backend_dahztheme'),
                        3 => _x('Three', 'backend customizer', 'backend_dahztheme'),
                        4 => _x('Four', 'backend customizer','backend_dahztheme')
            ),
           'priority' => 45,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'widgetbar_bgbutton',
           'label'    => _x( 'Widgetbar Button Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '#888',
           'priority' => 50,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'widgetbar_bgbutton_hover',
           'label'    => _x( 'Widgetbar Button Hover Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '#222',
           'priority' => 55,
         );

/* Top Bar */
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_topbar_subtitle',
           'label'    => _x( 'TOPBAR SETTINGS ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 59
         );
$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'header_topbar',
           'label'    => _x( 'Enable Topbar', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '1',
           'priority' => 60,
         );

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'header_topbar_content',
           'label'    => _x( 'Custom Welcome Text', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => 'Welcome',
           'priority' => 65,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'topbar_bgcolor_setting',
           'label'    => _x( 'Topbar Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '#f2f2f2',
           'priority' => 65,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'page_header_search_ajax',
           'label'    => _x( 'Search Options', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => 'adv',
           'choices'   => array(
                    'std'      =>  _x('Standard','backend customizer', 'dahztheme'),
                    'adv'    =>  _x('Advanced','backend customizer', 'dahztheme'),
                    ),
           'priority' => 75,
         );

/* Top Bar */
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_float_menu_subtitle',
           'label'    => _x( 'FLOAT MENU SETTINGS ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 79
         );
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'menu_float_setting',
           'label'    => _x( 'Enable Floating Menu', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '1',
           'choices'   => array(
                    "1" => _x('None','backend customizer', 'dahztheme'),
                    "2" => _x('Standard','backend customizer', 'dahztheme'),
                    "3" => _x('Transparent','backend customizer', 'dahztheme')),
           'priority' => 80,
         );
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_title_bread_subtitle',
           'label'    => _x( 'TITILE & BREADCRUMBS SETTINGS ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 84
         );
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'show_page_header_title',
           'label'    => _x( 'Show Titles and Breadcrumbs', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '1',
           'choices'   => array(
                    0 => 'No',
                    1 => 'Yes'),
           'priority' => 85,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'show_page_header_breadcrumb',
           'label'    => _x( 'Breadcrumbs', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '1',
           'choices'   => array(
                    0 => 'Off',
                    1 => 'On'),
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'page_header_title_align',
           'label'    => _x( 'Page Title Alignment', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => 'left',
           'choices'   => array(
                'left'      => 'Left',
                'center'    => 'Center',
                'right'     => 'Right'),
           'priority' => 95,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_ads_subtitle',
           'label'    => _x( 'ADVERTISEMENT ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 124
         );
$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'ads_banner',
           'label'    => _x( 'Insert Banner Ads Code', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 125,
         );
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'ads_banner_description',
           'label'    => _x( 'Banner ad  -> will appear on above top bar', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_header_section',
           'default'  => '',
           'priority' => 130,
         );

 