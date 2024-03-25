<?php

if (!defined('ABSPATH')) exit;

//===============================================================
// General Settings
//===============================================================
$controls[] = array(
           'type'     => 'select',
           'setting'  => 'theme_skin',
           'label'    => _x('Select Your Skin', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'default'  => 'skin2',
           'choices'   => array(
                    'skin1' => 'Border',
                    'skin2' => 'Float',
                    'skin3' => 'Shading',
                    'skin4' => 'Bezel'),
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'images_radio',
           'setting'  => 'layout_site',
           'label'    => _x('Site Layout', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'default'  => 'full-width',
           'choices'   => $layout_site,
           'priority' => 5,
         );

// Background Layout
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_outer_subtitle',
           'label'    => _x('OUTER AREA', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'default'  => '',
           'priority' => 15,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'bg_color',
           'label'    => _x('Outer Area Background Color', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'default'  => '#F8F8F8',
           'priority' => 20,
         );


$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'bg_layout_opacity',
           'label'    => _x('Outer Area Background Opacity', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'choices'   => $background_opacity,
           'default'  => '100',
           'priority' => 25,
         );


$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'bg_image_layout',
           'label'    => _x('Outer Area Background Image', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'priority' => 30,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_repeat',
           'label'    => '',
           'section'  => 'df_customizer_general_section',
           'default'  => 'no-repeat',
           'choices'   => array(
                    'repeat'    => 'Repeat',
                    'repeat-x'  => 'Repeat X',
                    'repeat-y'  => 'Repeat Y',
                    'no-repeat' => 'No Repeat'),
           'priority' => 35
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_pos-x',
           'label'    => '',
           'section'  => 'df_customizer_general_section',
           'default'  => 'center',
           'choices'   => array(
                    'left'      => 'Left',
                    'center'    => 'Center',
                    'right'     => 'Right'),
           'priority' => 40
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_pos-y',
           'label'    => '',
           'section'  => 'df_customizer_general_section',
           'default'  => 'center',
           'choices'   => array(
                    'top'       => 'Top',
                    'center'    => 'Center',
                    'bottom'    => 'Bottom'
                    ),
           'priority' => 45
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_att',
           'label'    => _x( 'Outer Background Style','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => 'fixed',
           'choices'   => array(
                'fixed'   => 'Fixed',
                'scroll'  => 'Scroll'),
           'priority' => 46
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_size',
           'label'    => _x('Outer Background Size', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'default'  => 'auto',
           'choices'   => array(
                'auto'     => 'Auto',
                'cover'    => 'Cover',
                'contain'  => 'Contain'
                    ),
           'priority' => 47
         );

// Background Content

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_content_subtitle',
           'label'    => _x( 'Content Area','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '',
           'priority' => 50
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'bg_content_color',
           'label'    => _x( 'Content Background Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '#ffffff',
           'priority' => 55
         );


$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'bg_content_opacity',
           'label'    => _x( 'Content Background Opacity (%)','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '100',
           'choices'   => $background_opacity,
           'priority' => 60
         );


$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'bg_image_content',
           'label'    => _x( 'Content Background Image','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '',
           'priority' => 65
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_att_content',
           'label'    => _x( 'Background Style','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => 'fixed',
           'choices'   => array(
                'fixed'   => 'Fixed',
                'scroll'  => 'Scroll'),
           'priority' => 66
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_content_size',
           'label'    => _x( 'Content Background Setting','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => 'auto',
           'choices'   => array(
                    'auto'      => 'Auto',
                    'contain'   => 'Contain',
                    'cover'     => 'Cover'),
           'priority' => 67
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_content_repeat',
           'label'    => '',
           'section'  => 'df_customizer_general_section',
           'default'  => 'no-repeat',
           'choices'   => array(
                    'repeat'    => 'Repeat',
                    'repeat-x'  => 'Repeat X',
                    'repeat-y'  => 'Repeat Y',
                    'no-repeat' => 'No Repeat'),
           'priority' => 70
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_content_pos-x',
           'label'    => '',
           'section'  => 'df_customizer_general_section',
           'default'  => 'center',
           'choices'   => array(
                    'left'      => 'Left',
                    'center'    => 'Center',
                    'right'     => 'Right'),
           'priority' => 75
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'bg_image_content_pos-y',
           'label'    => '',
           'section'  => 'df_customizer_general_section',
           'default'  => 'center',
           'choices'   => array(
                    'top'       => 'Top',
                    'center'    => 'Center',
                    'bottom'    => 'Bottom'),
           'priority' => 80
         );

// global layout
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_global_subtitle',
           'label'    => _x( 'GLOBAL SETTINGS','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '',
           'priority' => 85
         );


$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'site_max_width',
           'label'    => _x( 'Site Max Width','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '1200',
           'choices'  => $site_max_width,
           'priority' => 90,
           'transport'=> 'postMessage'
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'site_width',
           'label'    => _x( 'Site Width','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '90',
           'priority' => 95,
           'transport'=> 'postMessage'
         );
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'site_width_description',
           'label'    => _x('Note: Set the percentage of site width that will be used for your content. e.g: 70 (means 70%)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'priority' => 96,
         );

$controls[] = array(
           'type'     => 'images_radio',
           'setting'  => 'layout_content',
           'label'    => _x( 'Sidebar Position','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => 'two-col-left',
           'choices'   => array(
                    'two-col-left'  => $url . '2cl.png',
                    'one-col'       => $url . '1c.png',
                    'two-col-right' => $url . '2cr.png'),
           'priority' => 100
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'content_width',
           'label'    => _x( 'Content Area Width','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '70',
           'priority' => 105
         );
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'content_width_description',
           'label'    => _x('Note: Set the percentage of site width that will be used for your content. e.g: 70 (means 70%)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'priority' => 106,
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'mask_overlay_color',
           'label'    => _x( 'Overlay Mask Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '#000000',
           'priority' => 110,
           'transport'=> 'postMessage'
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'mask_overlay_font_color',
           'label'    => _x( 'Overlay Font Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '#ffffff',
           'priority' => 115,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'opacity_mask_color',
           'label'    => _x( 'Overlay Mask Color Opacity','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => 70,
           'choices'   => $background_opacity,
           'priority' => 120
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'border_color',
           'label'    => _x( 'Border Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '#eeeeee',
           'priority' => 125,
           'transport'=> 'postMessage'
         );

// global layout
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_layout_responsive_subtitle',
           'label'    => _x( 'RESPONSIVE SECTION','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '',
           'priority' => 130
         );
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'mobile_menu_color',
           'label'    => _x( 'Mobile Menu Skin Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => 'df-mobile-dark',
           'choices'  => array(
                        'df-mobile-dark'      =>  _x('Dark','backend customizer', 'backend_dahztheme'),
                        'df-mobile-white'    =>  _x('Light','backend customizer', 'backend_dahztheme'),
                        ),
           'priority' => 135,
         );