<?php

if (!defined('ABSPATH')) exit;

//============================================================
// Analytics 
//============================================================

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'analytics_textarea',
           'label'    => _x( 'Insert Analytics Code', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_analytics_section',
           'default'  => '',
           'priority' => 10,
         );
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'analytics_textarea_description',
           'label'    => _x( 'the code will be attach on wp_head()', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_analytics_section',
           'priority' => 20,
         );