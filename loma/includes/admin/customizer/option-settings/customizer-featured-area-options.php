<?php

if (!defined('ABSPATH')) exit;

//==============================================================
// Featured Area
//==============================================================

$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_featured_description',
           'label'    => _x( 'Slider will be displayed in the pages you assigned as your blog and/or front page in setting -> Reading.', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'priority' => 0,
         );

// editor pick
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_ep_subtitle',
           'label'    => _x( 'Editor\'s Pick Carousel','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'default'  => '',
           'priority' => 10
         );


$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_editor_pick',
           'label'    => _x( 'Enable Featured Slider', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'default'  => '1',
           'priority' => 20,
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'editor_pick_cat',
           'label'    => _x( 'Featured Slider by Category', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'default'  => '',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_editor_pick_cat_description',
           'label'    => _x( 'Write your Category slug here. Use comma (,) for multiple categories (e.g. uncategorized, markup).', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_pick_cat_slider',
           'label'    => _x( 'Enable Category On Slider', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'default'  => '1',
           'priority' => 50,
         );

// slider shortcode
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_featured_slider_setting_subtitle',
           'label'    => _x( 'Slider Shortcode', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'default'  => '',
           'priority' => 60,
         );

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'slider_sc',
           'label'    => _x( 'Slider Shortcode', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'default'  => '',
           'priority' => 70,
         );
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_editor_slider_sc_description',
           'label'    => _x( 'add custom slider shortcode here to overwrite featured slider', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featured_section',
           'priority' => 80,
         );