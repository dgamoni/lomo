<?php

if (!defined('ABSPATH')) exit;

//============================================================
// Button 
//============================================================

// Button Style
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'button_style',
           'label'    => _x('Button Style', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => 'flat',
           'choices'  => $list_button_style,
           'priority' => 0,
         );

// Button Shape
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'button_shape',
           'label'    => _x('Button Shape', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => 'square',
           'choices'  => $list_button_shape,
           'priority' => 10,
         );

// Colors
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_button_color_subtitle',
           'label'    => _x( 'Button color ','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '',
           'priority' => 20
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_text_color',
           'label'    => _x('Button Text Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#ffffff',
           'priority' => 30,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_background_color',
           'label'    => _x('Button Background Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#343435',
           'priority' => 40,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_border_color',
           'label'    => _x('Button Border Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#343435',
           'priority' => 50,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_bottom_color',
           'label'    => _x('Button Bottom Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#666666',
           'priority' => 60,
         );

// Colors Hover
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_button_color_hover_subtitle',
           'label'    => _x( 'Button Hover Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '',
           'priority' => 69
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_text_color_hover',
           'label'    => _x('Button Text Hover Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#ffffff',
           'priority' => 70,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_background_color_hover',
           'label'    => _x('Button Background Hover Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#030303',
           'priority' => 80,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_border_color_hover',
           'label'    => _x('Button Border Hover Color','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#030303',
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'button_bottom_color_hover',
           'label'    => _x('Button Bottom Color Hover','backend customizer' , 'backend_dahztheme'),
           'section'  => 'df_customizer_button_section',
           'default'  => '#666666',
           'priority' => 100,
         );