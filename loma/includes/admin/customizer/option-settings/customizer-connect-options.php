<?php
if (!defined('ABSPATH')) exit;

//======================================================================
// Social Connect
//======================================================================

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'facebook',
           'label'    => _x('Facebook URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 5,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'twitter',
           'label'    => _x('Twitter URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'googleplus',
           'label'    => _x('Google+ URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 15,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'youtube',
           'label'    => _x('YouTube URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'vimeo',
           'label'    => _x('Vimeo URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 25,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'instagram',
           'label'    => _x('Instagram URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'pinterest',
           'label'    => _x('Pinterest URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 35,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'dribbble',
           'label'    => _x('Dribbble URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'linkedin',
           'label'    => _x('LinkedIn URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 45,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'bloglovin',
           'label'    => _x('Bloglovin URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 47,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'rss',
           'label'    => _x('RSS Feed URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 50,
         );

$controls[] = array(
           'type'     => 'description',
           'setting'  => 'df_newsletter_description',
           'label'    => _x('Enter your Feedburner ID for the e-mail subscription form.','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'priority' => 55,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'connect_newsletter_id',
           'label'    => _x('Subscribe By E-mail ID (Feedburner)','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_section',
           'default'  => '',
           'priority' => 60,
         );