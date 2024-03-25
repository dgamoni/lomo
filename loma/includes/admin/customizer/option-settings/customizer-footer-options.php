<?php

if (!defined('ABSPATH')) exit;

//============================================================
// Footer 
//============================================================

//Primary Widgets
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'primary_footer_widget_columns',
           'label'    => _x( 'Primary Footer Column', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '4',
           'choices'   => array(
                0 => 'None (Disable)',
                1 => '1 Column',
                2 => '2 Columns',
                3 => '3 Columns',
                4 => '4 Columns',
                5 => '5 Columns',
                6 => '6 Columns'),
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'footer_background_opacity',
           'label'    => _x( 'Footer Background Opacity (%)', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '100',
           'choices'   => $background_opacity,
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'footer_background_color',
           'label'    => _x( 'Footer Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '#f4f4f4',
           'priority' => 20,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'footer_background_image',
           'label'    => _x( 'Footer Background Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'footer_background_repeat',
           'label'    => _x( 'Footer Background Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => 'no-repeat',
           'choices'   => array(
                'no-repeat' => _x('No Repeat', 'backend customizer','dahztheme'),
                'repeat'    => _x('Repeat', 'backend customizer','dahztheme'),
                'repeat-x'  => _x('Repeat X','backend customizer', 'dahztheme'),
                'repeat-y'  => _x('Repeat Y','backend customizer', 'dahztheme'),
            ),
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'footer_background_pos-x',
           'label'    => _x( 'Footer Background Position', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => 'center',
           'choices'   => array(
                'left'      => 'Left',
                'center'    => 'Center',
                'right'     => 'Right'
            ),
           'priority' => 50,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'footer_background_pos-y',
           'label'    => '',
           'section'  => 'df_customizer_footer_section',
           'default'  => 'center',
           'choices'   => array(
                'top'       => 'Top',
                'center'    => 'Center',
                'bottom'    => 'Bottom'
            ),
           'priority' => 60,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'footer_background_size',
           'label'    => '',
           'section'  => 'df_customizer_footer_section',
           'default'  => 'auto',
           'choices'   => array(
                    'auto'    => 'Auto',
                    'contain'  => 'Contain',
                    'cover'  => 'Cover'),
           'priority' => 70,
         );

$controls[] = array(
           'type'     => 'textbox',
           'setting'  => 'footer_textbox_left_setting',
           'label'    => _x( 'Custom Footer Left Text', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '',
           'priority' => 80,
         );

$controls[] = array(
           'type'     => 'textbox',
           'setting'  => 'footer_textbox_right_setting',
           'label'    => _x( 'Custom Footer Right Text', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '',
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_footer_setting_subtitle',
           'label'    => _x( 'Extra Footer', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '',
           'priority' => 100,
         );

//extra Widgets with Content
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'extra_footer_widget_columns',
           'label'    => _x( 'Extra Footer Column', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '3',
           'choices'   => array(
                0 => 'None (Disable)',
                1 => '1 Column',
                2 => '2 Columns',
                3 => '3 Columns',
                4 => '4 Columns'),
           'priority' => 110,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_footer_sct_setting_subtitle',
           'label'    => _x( 'Scroll To Top', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '',
           'priority' => 120,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'scroll_top_enable',
           'label'    => _x( 'Enable back to top button', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_footer_section',
           'default'  => '1',
           'priority' => 130,
         );
