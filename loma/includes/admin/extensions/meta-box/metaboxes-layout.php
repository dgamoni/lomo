<?php
/* * ******************************************************** */
// Layout options
/* * ******************************************************** */
$url = RWMB_URL . 'img/metaboxui/';
$prefix = 'df_metabox_layout';

$meta_boxes[] = array(
    'title'     => _x('Page / Post Layout', 'backend metabox', 'backend_dahztheme'),
    'pages'     => array('page', 'post'),
    'context'   => 'normal',
    'priority'  => 'high',
    'autosave'  => true,
    'fields'    => array(
                        array(
                            'name'      => _x('Layout', 'backend metabox', 'backend_dahztheme'),
                            'id'        => "{$prefix}_content",
                            'type'      => 'image_select',
                            'options'   => array(
                                            'two-col-left'  => $url . '2cl.png',
                                            'one-col'       => $url . '1c.png',
                                            'two-col-right' => $url . '2cr.png'
                                           ),
                            'std'       => 'two-col-left'
                        ),
                        array(
                            'name'      => _x('Background', 'backend metabox', 'backend_dahztheme'),
                            'id'        => "{$prefix}_background",
                            'type'      => 'select',
                            'options'   => array(
                                            'none'  => _x('None', 'backend metabox', 'backend_dahztheme'),
                                            'image' => _x('Background Image', 'backend metabox', 'backend_dahztheme'),
                                            'video' => _x('Background Video', 'backend metabox', 'backend_dahztheme')
                                           ),
                            'std'       => 'none'
                        ),
                        array(
                            'name'      => _x('Background Image', 'backend metabox', 'backend_dahztheme'),
                            'id'        => "{$prefix}_bg_image",
                            'type'      => 'uploader',
                            'std'       => ''
                        ),
                        array(
                            'name'      => _x('Background Image fade', 'backend metabox', 'backend_dahztheme'),
                            'id'        => "{$prefix}_bg_image_fade",
                            'type'      => 'text',
                            'std'       => '750'
                        ),
                        array(
                            'name'      => _x('Background Image duration', 'backend metabox', 'backend_dahztheme'),
                            'id'        => "{$prefix}_bg_image_duration",
                            'type'      => 'text',
                            'std'       => '3000'
                        ),
                        array(
                            'name'              => _x('Background Video', 'backend metabox', 'backend_dahztheme'),
                            'id'                => "{$prefix}_bg_video",
                            'type'              => 'file_advanced',
                            'max_file_uploads'  => 10,
                            'mime_type'         => 'video'
                        )
));