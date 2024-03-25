<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */
add_filter('rwmb_meta_boxes', 'df_metabox_page_post_register_meta_boxes');

/**
 * Register meta boxes page
 *
 * @return void
 */
function df_metabox_page_post_register_meta_boxes($meta_boxes) {
    $prefix = 'df_metabox';

    $metaboxes_file = array(
        'metaboxes-header.php',
        'metaboxes-singleblog.php',
        'metaboxes-layout.php'
    );

    /**
    * Register metaboxes
    * 
    *
    * @return void
    */

    // Gallery
    $meta_boxes[] = array(
        'title'     => __('Single Post Gallery Photo', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Insert Your Gallery ID', 'backend_dahztheme'),
                'id'    => "{$prefix}_custom_gallery_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
        )
    );

    //Audio
    $meta_boxes[] = array(
        'title'     => __('Single post Audio', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Upload Your Audio File (.mp3, .ogg or .wav)', 'backend_dahztheme'),
                'id'    => "{$prefix}_upload_single_post_audio",
                'type'  => 'file_advanced',
                'max_file_uploads' => 1,
                'mime_type' => 'audio'
            ),
            array(
                'name'  => __('Embed Your Audio', 'backend_dahztheme'),
                'id'    => "{$prefix}_audio_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
        )
    );    

    //Video
    $meta_boxes[] = array(
        'title'     => __('Single post video', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Upload Your Video ( .mp4, .ogv or .mov )', 'backend_dahztheme'),
                'id'    => "{$prefix}_upload_single_post_video",
                'type'  => 'file_advanced',
                'max_file_uploads'  => 1,
                'mime_type' => 'video'
            ),
            array(
                'name'  => __('Embed Your Video', 'backend_dahztheme'),
                'id'    => "{$prefix}_video_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
        )
    );

    //Quote
    $meta_boxes[] = array(
        'title'     => __('Single Post Quote', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Quote', 'backend_dahztheme'),
                'id'    => "{$prefix}_quote_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
            array(
                'name'  => __('Quote Text Color', 'backend_dahztheme'),
                'id'    => "{$prefix}_quote_color",
                'type'  => 'color'
            ),
            array(
                'name'  => __('Author', 'backend_dahztheme'),
                'id'    => "{$prefix}_qoute_author",
                'type'  => 'text',
                'std'   => ''
            ),
            array(
                'name'  => __('Author Text Color', 'backend_dahztheme'),
                'id'    => "{$prefix}_author_quote_color",
                'type'  => 'color'
            ),
            array(
                'name'  => __('Background Quote Color', 'backend_dahztheme'),
                'id'    => "{$prefix}_bg_quote_color",
                'type'  => 'color'
            ),
            array(
                'name'  => __('Background Opacity Color (%)', 'backend_dahztheme'),
                'id'    => "{$prefix}_bg_opacity_color",
                'type'  => 'slider'
            ),
        )
    );

    //Link
    $meta_boxes[] = array(
        'title'     => __('Single Post Link', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Link', 'backend_dahztheme'),
                'id'    => "{$prefix}_link_text",
                'type'  => 'text',
                'std'   => ''
            ),
            array(
                'name'  => __('Caption', 'backend_dahztheme'),
                'id'    => "{$prefix}_link_text_caption",
                'type'  => 'text',
                'std'   => ''
            ),
            array(
                'name'  => __('Target', 'backend_dahztheme'),
                'id'    => "{$prefix}_link_text_target",
                'type'  => 'radio',
                'options'   => array(
                    '_blank'    => __('Blank', 'backend_dahztheme'),
                    '_self'     => __('Self', 'backend_dahztheme'),
                ),
                'std'   => '_blank'
            ),
        )
    );

    // Status
    $meta_boxes[] = array(
        'title'     => __('Single Post Status', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Embbed Your Status', 'backend_dahztheme'),
                'id'    => "{$prefix}_custom_status_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
        )
    );

    //Big Featured Image Standard, Status, Quote
    $meta_boxes[] = array(
        'title'     => __('Single Post Featured Background', 'backend_dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                    'name'  => __('Enable Featured Image As Background', 'backend_dahztheme'),
                    'id'    => "{$prefix}_ftr_img_background",
                    'type'  =>  'checkbox',
                    'std'   => 0 
            ),
        )
    );


    foreach ($metaboxes_file as $mb_file) {
        require_once $mb_file;
    }

    return $meta_boxes;

}