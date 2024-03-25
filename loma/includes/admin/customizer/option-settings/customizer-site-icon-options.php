<?php

if (!defined('ABSPATH')) exit;

//==============================================================
// Site Icon
//==============================================================
$controls[] = array(
           'type'     => 'description',
           'setting'  => 'site_icon_description',
           'label'    => _x( ' If an image is not set, nothing will be displayed. You can use .png or .ico image files here. A 152x152 image should be used for your touch icon, and a 144x144 image should be used for your tile icon. The color you set for your tile icon will be used behind your image.
', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'priority' => 0,
         );
$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'fav_icon',
           'label'    => _x('Favicon', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'priority' => 5,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'icon_touch',
           'label'    => _x('Touch Icon (ios & android)', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'icon_tile',
           'label'    => _x('Tile Icon (microsoft)', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'icon_tile_bg_color',
           'label'    => _x('Tile Icon Background Color', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '#fff',
           'priority' => 30,
         );
