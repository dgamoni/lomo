<?php

if (!defined('ABSPATH')) exit;

//============================================================
// Blog
//============================================================
$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'homepage_layout',
           'label'    => _x( 'Homepage Layout', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'list_post',
           'choices'   => array(
                'list_post'      => _x('List','backend customizer', 'dahztheme'),
                'grid_post'      => _x('Grid','backend customizer', 'dahztheme'),
            ),
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'list_post_opt',
           'label'    => _x( 'List Post Option Layout', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'opt_summ',
           'choices'   => array(
                'opt_full'      => _x('Full Text','backend customizer', 'dahztheme'),
                'opt_summ'      => _x('Summary','backend customizer', 'dahztheme'),
                'opt_ncnt'      => _x('No Content','backend customizer', 'dahztheme'),
            ),
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'grid_post_lay',
           'label'    => _x( 'Grid Layout Post', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'fitrows_lay',
           'choices'   => array(
                        'fitrows_lay' => _x('Fitrows Layout', 'backend customizer', 'dahztheme'),
                        'masonry_lay' => _x('Masonry Layout', 'backend customizer', 'dahztheme')
            ),
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'grid_col_lay',
           'label'    => _x( 'Grid Columns Layout Settings', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'two_col',
           'choices'   => array(
                        'two_col'   => _x('2 Column', 'backend customizer', 'dahztheme'),
                        'three_col' => _x('3 Column', 'backend customizer', 'dahztheme'),
                        'four_col'  => _x('4 Column', 'backend customizer', 'dahztheme'),
                        'five_col'  => _x('5 Column', 'backend customizer', 'dahztheme')
            ),
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_filter_cat',
           'label'    => _x( 'Enable Category Filter', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 50,
         );
// Blogg Page Settings
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_pageblog_setting_subtitle',
           'label'    => _x( 'BLOG PAGE SETTINGS', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 60,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_like_blog',
           'label'    => _x( 'Show Love Button', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 70,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_link_category',
           'label'    => _x( 'Show Category', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 80,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_post_meta',
           'label'    => _x( 'Show Postmeta', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_uppercase_post_title',
           'label'    => _x( 'Disable Uppercase on Blog Title', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 100,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_read_more',
           'label'    => _x( 'Show ‘Continue Reading’ Link', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 110,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'page_pagination',
           'label'    => _x( 'Pagination Style', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'number',
           'choices'   => array(
                'prev_next'             => _x('Prev/Next','backend customizer', 'dahztheme'),
                'number'                => _x('Number','backend customizer', 'dahztheme'),
                'infinite'              => _x('Infinite Scroll','backend customizer', 'dahztheme'),
                'infinite_button'       => _x('Load More','backend customizer', 'dahztheme'),
                'infinite_button_count' => _x('Load More With Number','backend customizer', 'dahztheme'),
            ),
           'priority' => 120,
         );

/* ========================================================================
*
*   Share Subtitle
*    
======================================================================== */

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_share_icon_subtitle',
           'label'    => _x( 'SHARE', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 130,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_share_blog',
           'label'    => _x( 'Enable Share Blog', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 140,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'facebook_enable_share_blog',
           'label'    => _x( 'Enable Facebook', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 150,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'twitter_enable_share_blog',
           'label'    => _x( 'Enable Twitter', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 160,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'google_enable_share_blog',
           'label'    => _x( 'Enable Google+', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 170,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'instagram_enable_share_blog',
           'label'    => _x( 'Enable instagram', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 175,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'pinterest_enable_share_blog',
           'label'    => _x( 'Enable Pinterest', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 180,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'mail_enable_share_blog',
           'label'    => _x( 'Enable Mail', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 190,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'stumb_enable_share_blog',
           'label'    => _x( 'Enable Stumbleupon', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 200,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'linkedin_enable_share_blog',
           'label'    => _x( 'Enable LinkedIn', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 210,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'reddit_enable_share_blog',
           'label'    => _x( 'Enable Reddit', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 220,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'tumblr_enable_share_blog',
           'label'    => _x( 'Enable Tumblr', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 230,
         );


/* ========================================================================
*
*   Single Post Subtitle
*    
======================================================================== */

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_pageblog_singlepost_subtitle',
           'label'    => _x( 'SINGLE POST SETTINGS', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 240,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'show_featured_image_',
           'label'    => _x( 'Show Featured Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 250,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_tags_',
           'label'    => _x( 'Enable Tags', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 260,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_print_blog',
           'label'    => _x( 'Enable Print Button', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 270,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_author_layout',
           'label'    => _x( 'Enable About Author Info', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '0',
           'priority' => 280,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_post_pagination',
           'label'    => _x( 'Enable Pagination', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '1',
           'priority' => 290,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'blog_pagination_style',
           'label'    => _x( 'Pagination Style', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'style1',
           'choices'   => array(
                'style1'    => _x('Classic','backend customizer','dahztheme'),
                'style2'    => _x('Slide Animation','backend customizer','dahztheme')
            ),
           'priority' => 300,
         );


$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_arc_aut_subtitle',
           'label'    => _x( 'ARCHIVE SETTINGS', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => '',
           'priority' => 310,
         );

$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_arc_aut_layout_description',
           'label'    => _x( 'There are 2 different archive layouts', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'priority' => 320,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'archive_author_layout',
           'label'    => _x( 'Archive Layout', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'grid_post',
           'choices'   => array(
                'grid_post'      => _x('Grid','backend customizer', 'dahztheme'),
                'list_post'      => _x('List','backend customizer', 'dahztheme'),
            ),
           'priority' => 330,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'archive_author_grid_layout_js',
           'label'    => _x( 'Archive Grid Style', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'masonry_lay',
           'choices'   => array(
                'masonry_lay'   => _x('Masonry','backend customizer', 'dahztheme'),
                'fitrows_lay'   => _x('Fitrows','backend customizer', 'dahztheme'),
            ),
           'priority' => 340,
         );

$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_grid_layout_description',
           'label'    => _x( 'If you choose grid layout', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'priority' => 350,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'archive_author_grid_layout',
           'label'    => _x( 'Number Of Column', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'two_col',
           'choices'   => array(
                'two_col'   => _x('2 Columns','backend customizer', 'dahztheme'),
                'three_col' => _x('3 Columns','backend customizer', 'dahztheme'),
                'four_col'  => _x('4 Columns','backend customizer', 'dahztheme'),
                'five_col'  => _x('5 Columns','backend customizer', 'dahztheme'),
            ),
           'priority' => 360,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'list_post_opt_arch',
           'label'    => _x( 'Archive List Excerpt Setting', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_blog_section',
           'default'  => 'opt_full_arch',
           'choices'   => array(
                'opt_full'      => _x('Full Text','backend customizer', 'dahztheme'),
                'opt_summ'      => _x('Summary','backend customizer', 'dahztheme'),
                'opt_ncnt'      => _x('No Content','backend customizer', 'dahztheme'),
            ),
           'priority' => 370,
         );

//============================================================
// Page Loader
//============================================================

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'df_page_loader',
           'label'    => _x( 'Enable Page Loader', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '0',
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'loading_animation',
           'label'    => _x( 'Enable Loading Animation', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '1',
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'loading_animation_style',
           'label'    => _x( 'Select Loading Animation Style', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => 'pulse',
           'choices'   => array(
                'pulse'                 => _x('Pulse', 'backend customizer','dahztheme'),
                'double_pulse'          => _x('Double Pulse', 'backend customizer','dahztheme'),
                'cube'                  => _x('Cube', 'backend customizer','dahztheme'),
                'rotating_cubes'        => _x('Rotating Cubes', 'backend customizer','dahztheme'),
                'stripes'               => _x('Stripes', 'backend customizer','dahztheme'),
                'wave'                  => _x('Wave', 'backend customizer','dahztheme'),
                'two_rotating_circles'  => _x('Two Rotating Circles', 'backend customizer','dahztheme'),
                'five_rotating_circles' => _x('Five Rotating Circles', 'backend customizer','dahztheme'),
            ),
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'loading_animation_color',
           'label'    => _x( 'Loading Animation Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '#000',
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'page_loader_background',
           'label'    => _x( 'Loading Page Background', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '#fff',
           'priority' => 50,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'loading_animation_image',
           'label'    => _x( 'Loading Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '',
           'priority' => 60,
         );


//============================================================
// Page 404
//============================================================

$controls[] = array(
           'type'     => 'radio',
           'setting'  => '404_background_type',
           'label'    => _x( '404 Background Type', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => 'color',
           'choices'   => array(
                        'color' => _x('Background Color', 'backend customizer', 'dahztheme'),
                        'image' => _x('Background Image', 'backend customizer', 'dahztheme')
            ),
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => '404_background_color',
           'label'    => _x( '404 Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '#fff',
           'priority' => 10,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => '404_opacity_color',
           'label'    => _x( 'Background Opacity (%)', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '100',
           'choices'   => $background_opacity,
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => '404_background_image',
           'label'    => _x( '404 Background Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => '404_background_repeat',
           'label'    => _x( '404 Background Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
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
           'setting'  => '404_background_pos-x',
           'label'    => _x( '404 Background Position', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
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
           'setting'  => '404_background_pos-y',
           'section'  => 'df_customizer_404_section',
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
           'setting'  => '404_background_size',
           'label'     => _x('404 Background Size','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => 'auto',
           'choices'   => array(
                'auto'     => 'Auto',
                'cover'    => 'Cover',
                'contain'  => 'Contain'
            ),
           'priority' => 70,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => '404_background_attachment',
           'label'     => _x('404 Background Attachment','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => 'fixed',
           'choices'   => array(
                'fixed'   => 'Fixed',
                'scroll'  => 'Scroll'
            ),
           'priority' => 80,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => '404_header_type',
           'label'     => _x('404 Background Type','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => 'text',
           'choices'   => array(
                'text' => _x('Header Text', 'backend customizer', 'dahztheme'),
                'logo' => _x('Header Logo', 'backend customizer', 'dahztheme')
            ),
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => '404_header_logo',
           'label'     => _x('404 Logo','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => '',
           'priority' => 100,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => '404_header_text',
           'label'     => _x('404 Header Text','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => '',
           'priority' => 110,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_content_text',
           'label'     => _x('Enable Content Text','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => '1',
           'priority' => 120,
         );

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => '404_page_text',
           'label'     => _x('404 Page Text','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => '',
           'priority' => 130,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'setting'  => 'enable_search_form',
           'label'     => _x('Enable Search Form','backend customizer', 'dahztheme'),
           'section'  => 'df_customizer_404_section',
           'default'  => '1',
           'priority' => 140,
         );