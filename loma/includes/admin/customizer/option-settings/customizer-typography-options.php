<?php

if (!defined('ABSPATH')) exit;

// =============================================================================
// Typography 
// =============================================================================  

$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_typo_description',
           'label'     => _x('Check “Enable Custom Fonts" to set your own individual fonts for headings, body copy, etc.','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'priority' => 5,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'custom_fonts',
           'label'     => _x('Enable Custom Fonts','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 0,
           'priority' => 10,
         );


$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'custom_font_subsets',
           'label'     => _x('Enable Subsets','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 0,
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'custom_font_subset_cyrillic',
           'label'     => _x('Cyrillic','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 0,
           'priority' => 30,
         );


$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'custom_font_subset_greek',
           'label'     => _x('Greek','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 0,
           'priority' => 40,
         );


$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'custom_font_subset_vietnamese',
           'label'     => _x('Vietnamese','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 0,
           'priority' => 50,
         );


// Logo Font Style
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_logo_subtitle',
           'label'     => _x('LOGO TYPOGRAPHY','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 60,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'logo_font_family',
           'label'     => _x('Logo Font Style','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Libre Baskerville',
           'choices'   => $list_fonts,
           'priority' => 70
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'logo_font_color',
           'label'     => _x('Logo Font Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#262626',
           'priority' => 80,
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'logo_font_size',
           'label'     => _x('Logo Font Size (px)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '34px',
           'priority' => 90,
         );


$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'logo_font_weight',
           'label'     => _x('Logo Font Weight','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'regular',
           'choices'   => $list_all_font_weights,
           'priority' => 100
         );

// topbar Font Style
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_topbar_subtitle',
           'label'     => _x('TOPBAR TYPO','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 110,
         );
$controls[] = array(
           'type'     => 'select',
           'setting'  => 'topbar_font_family',
           'label'     => _x('Topbar Font Style','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Crimson Text',
           'choices'   => $list_fonts,
           'priority' => 119
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'topbar_text_color',
           'label'    => _x( 'Topbar Texts & Links Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#999',
           'priority' => 120,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'topbar_font_size',
           'label'     => _x('Topbar Font Size (px)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '14px',
           'priority' => 122,
         );


$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'topbar_font_weight',
           'label'     => _x('Topbar Font Weight','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'regular',
           'choices'   => $list_all_font_weights,
           'priority' => 123
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'topbar_link_transform',
           'label'     => _x('Topbar Link Text Transform','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Uppercase',
           'choices'   => array(
                'none'          => 'None',
                'capitalize'    => 'Capitalize',
                'uppercase'     => 'Uppercase',
                'lowercase'     => 'Lowercase'
               ),
           'priority' => 124,
         );

// Navbar Font Style

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_navbar_subtitle',
           'label'     => _x('NAVBAR TYPOGRAPHY','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 130,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_font_family',
           'label'     => _x('Navbar Font Style','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Crimson Text',
           'choices'   => $list_fonts,
           'priority' => 140
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_font_size',
           'label'     => _x('Navbar Font Size (px)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '14px',
           'priority' => 150,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'navbar_link_color',
           'label'     => _x('Navbar Link Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#999',
           'priority' => 160,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'navbar_link_color_hover',
           'label'     => _x('Navbar Hover Link Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#030303',
           'priority' => 170,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'submenu_bgcolor_setting',
           'label'     => _x('Submenu Background Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#ffffff',
           'priority' => 180,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_link_transform',
           'label'     => _x('Navbar Link Text Transform','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Uppercase',
           'choices'   => array(
                'none'          => 'None',
                'capitalize'    => 'Capitalize',
                'uppercase'     => 'Uppercase',
                'lowercase'     => 'Lowercase'
               ),
           'priority' => 190,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'navbar_link_align',
           'label'     => _x('Navbar Link Text Align','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'left',
           'choices'   => array(
                    'left'      => 'Left',
                    'right'     => 'Right',
                    'center'    => 'Center'
                   ),
           'priority' => 200,
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_letter_space',
           'label'     => _x('Navbar Letter Spacing (px)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '1px',
           'priority' => 210,
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_main_padding',
           'label'     => _x('Navbar Padding','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '11px 15px',
           'priority' => 220
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_submenu_padding',
           'label'     => _x('Navbar Submenu Padding','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '11px 15px',
           'priority' => 230
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'navbar_submenu_min_widht',
           'label'     => _x('Navbar Submenu Minimum Width','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '220px',
           'priority' => 240
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'navbar_font_weight',
           'label'     => _x('Navbar Font Weight','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'regular',
           'choices'   => $list_all_font_weights,
           'priority' => 250
         );

// Headings
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_heading_subtitle',
           'label'     => _x('HEADINGS TYPO','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 260,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'headings_font_family',
           'label'     => _x('Headings Text Font Style','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Libre Baskerville',
           'choices'   => $list_fonts,
           'priority' => 270,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'headings_font_color',
           'label'     => _x('Headings Text Font Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#262626',
           'priority' => 280,
         );


$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'headings_font_weight',
           'label'     => _x('Headings Font Weight','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'regular',
           'choices'   => $list_all_font_weights,
           'priority' => 290,
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'headings_letter_spacing',
           'label'     => _x('Headings Letter Spacing','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '1px',
           'priority' => 300,
         );

// Body Font Style
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_body_subtitle',
           'label'     => _x('BODY TYPO','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 310,
         );


$controls[] = array(
           'type'     => 'select',
           'setting'  => 'body_font_family',
           'label'     => _x('General Text Font Style','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'Crimson Text',
           'choices'   => $list_fonts,
           'priority' => 320,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'body_font_color',
           'label'     => _x('General Text Font Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#4c4c4c',
           'priority' => 330,
         );


$controls[] = array(
           'type'     => 'text',
           'setting'  => 'body_font_size',
           'label'     => _x('General Font Size (px)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '14px',
           'priority' => 340
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'body_font_weight',
           'label'     => _x('General Font Weight','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => 'regular',
           'choices'   => $list_all_font_weights,
           'priority' => 350,
         );

// Content Font Style
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_content_subtitle',
           'label'     => _x('CONTENT TYPO','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 360,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'content_font_size',
           'label'     => _x('Content Font Size (px)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '14px',
           'priority' => 370,
         );

// Site Links
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_link_subtitle',
           'label'     => _x('Site Link Color','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '',
           'priority' => 380,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'site_links_color',
           'label'     => _x('Site Links','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#afafaf',
           'priority' => 390,
         );


$controls[] = array(
           'type'     => 'color',
           'setting'  => 'site_links_hover_color',
           'label'     => _x('Site Links Hover','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_typography_section',
           'default'  => '#b1a193',
           'priority' => 400,
         );