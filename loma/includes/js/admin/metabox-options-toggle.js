/*
 * jQuery(document).ready(function($) {
 *   - Show/Hide Audio, Gallery, Video, Quote, Link, Image
 *   - Show/Hide Blog, Landing
 *   - Page/Post Layout
 *   - Page Blog Layout Settings Options
 * }
 * jQuery(window).on('load', function($) {
 *   - Header Options
 * }
 */

jQuery(document).ready(function($) {
    
    /* ================================================================================================= */
    /* Show/Hide Audio, Gallery, Video, Quote, Link, Image                                               */
    /* ================================================================================================= */
//    $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link, #single-post-image').removeClass('hide-if-js');
if ($('[name="post_format"][value="0"]').is(':checked')) {
        $('[value="single-post-gallery-photo"], [value="single-post-audio"], [value="single-post-video"], [value="single-post-quote"], [value="single-post-link"]').attr('checked', 'checked');
        $('#single-post-featured-background').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="audio"]').is(':checked')) {
        $('#single-post-audio').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="gallery"]').is(':checked')) {
        $('#single-post-gallery-photo').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio, #single-post-video, #single-post-quote, #single-post-link, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="video"]').is(':checked')) {
        $('#single-post-video').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio, #single-post-gallery-photo, #single-post-quote, #single-post-link, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="quote"]').is(':checked')) {
        $('#single-post-quote, #single-post-featured-background').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-link, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="link"]').is(':checked')) {
        $('#single-post-link').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    } else if($('[name="post_format"][value="status"]').is(':checked')) {
        $('#single-post-status ,#single-post-featured-background').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="image"], [name="post_format"][value="aside"], [name="post_format"][value="chat"]').is(':checked')) {
        $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
    }
    $('[name="post_format"]').change(function() {
        if (this.value === '0') {
            $('[value="single-post-gallery-photo"], [value="single-post-audio"], [value="single-post-video"], [value="single-post-quote"], [value="single-post-link"]').attr('checked', 'checked');
            $('#single-post-featured-background').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link, #single-post-image, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'audio') {
            $('#single-post-audio').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link, #single-post-image, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'gallery') {
            $('#single-post-gallery-photo').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio, #single-post-video, #single-post-quote, #single-post-link, #single-post-image, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'video') {
            $('#single-post-video').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio, #single-post-gallery-photo, #single-post-quote, #single-post-link, #single-post-image, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'quote') {
            $('#single-post-quote, #single-post-featured-background').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-link, #single-post-image, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'link') {
            $('#single-post-link').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-image, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'status') {
            $('#single-post-status, #single-post-featured-background').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-link').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'image' || this.value === 'aside' || this.value === 'chat') {
            $('#single-post-audio, #single-post-gallery-photo, #single-post-video, #single-post-quote, #single-post-image, #single-post-link, #single-post-featured-background, #single-post-status').addClass('df-metabox-hidden hide-if-js');
        }
    });
    /* ================================================================================================= */
    /* Show/Hide Audio, Gallery, Video, Quote, Link, Image                                               */
    /* ================================================================================================= */


    /* ================================================================================================= */
    /* Page/Post Layout                                                                                  */
    /* ================================================================================================= */
    if ($('#df_metabox_layout_background').val() === 'none') {
        $('#df_metabox_layout_bg_image_upload, #df_metabox_layout_bg_image_fade, #df_metabox_layout_bg_image_duration, [data-field_id="df_metabox_layout_bg_video"]').parent().parent().addClass('df-metabox-hidden');
    }
    if ($('#df_metabox_layout_background').val() === 'image') {
        $('#df_metabox_layout_bg_image_upload, #df_metabox_layout_bg_image_fade, #df_metabox_layout_bg_image_duration').parent().parent().removeClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_layout_bg_video"]').parent().parent().addClass('df-metabox-hidden');
    }
    if ($('#df_metabox_layout_background').val() === 'video') {
        $('#df_metabox_layout_bg_image_upload, #df_metabox_layout_bg_image_fade, #df_metabox_layout_bg_image_duration').parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_layout_bg_video"]').parent().parent().removeClass('df-metabox-hidden');
    }

    $('#df_metabox_layout_background').change(function() {
        if ($(this).val() === 'none') {
            $('#df_metabox_layout_bg_image_upload, #df_metabox_layout_bg_image_fade, #df_metabox_layout_bg_image_duration, [data-field_id="df_metabox_layout_bg_video"]').parent().parent().addClass('df-metabox-hidden');
        } else if ($(this).val() === 'image') {
            $('#df_metabox_layout_bg_image_upload, #df_metabox_layout_bg_image_fade, #df_metabox_layout_bg_image_duration').parent().parent().removeClass('df-metabox-hidden');
            $('[data-field_id="df_metabox_layout_bg_video"]').parent().parent().addClass('df-metabox-hidden');
        } else if ($(this).val() === 'video') {
            $('#df_metabox_layout_bg_image_upload, #df_metabox_layout_bg_image_fade, #df_metabox_layout_bg_image_duration').parent().parent().addClass('df-metabox-hidden');
            $('[data-field_id="df_metabox_layout_bg_video"]').parent().parent().removeClass('df-metabox-hidden');
        }
    });
    /* ================================================================================================= */
    /* Page/Post Layout                                                                                  */
    /* ================================================================================================= */
});
    // /* ================================================================================================= */
    // /* Post Options                                                                                    */
    // /* ================================================================================================= */
    // jQuery(document).ready(function($) {
         
    //     if ($('#customize-control-df_options-homepage_layout input[value="list_post"]')) {
    //         $('#df_metabox_enable_big_post_grid').parent().parent().removeClass('df-metabox-hidden');
    //     }

    //     if ($('#customize-control-df_options-homepage_layout input[value="grid_post"]')) {
    //         $('#df_metabox_enable_big_post_grid').parent().parent().addClass('df-metabox-hidden');
    //     }

    //     $('#customize-control-df_options-homepage_layout input').change(function() {
    //         if ('input[value="list_post"]') {
    //             $('#df_metabox_enable_big_post_grid').parent().parent().addClass('df-metabox-hidden');
    //         } else if ('input[value="grid_post"]') {
    //             $('#df_metabox_enable_big_post_grid').parent().parent().addClass('df-metabox-hidden');

    //         }
    //     });

    // });

jQuery(window).on('load', function($) {
        var $ = jQuery,
            show = $('[name="df_metabox_header_style"][value="show"]'),
            hide = $('[name="df_metabox_header_style"][value="hide"]'),
            fancy = $('[name="df_metabox_header_style"][value="fancy"]'),
            slider = $('[name="df_metabox_header_style"][value="slider"]'),
            normal = $('[name="df_metabox_background_options"][value="normal"]'),
            parallax = $('[name="df_metabox_background_options"][value="parallax"]'),
            horParallax = $('[name="df_metabox_background_options"][value="horizontal-parallax"]');

    /* ================================================================================================= */
    /* Header Options                                                                                    */
    /* ================================================================================================= */
    // Fancy Header
    function showFancyHeaderStyleOptions() {
        $('[name="df_metabox_header_align"]').parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_title').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_title_color').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_subtitle').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_subtitle_color').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('[name="df_metabox_background_options"]').parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_background_color').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_options').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_fancy_parallax_speed').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_height_setting').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_border').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().removeClass('df-metabox-hidden');

        if (normal.is(':checked')) {
            showNormalOptions();
            hideParallaxOptions();
            hideVideoOptions();
        } else if (parallax.is(':checked') || horParallax.is(':checked')) {
            showParallaxOptions();
            hideNormalOptions();
            hideVideoOptions();
        } else {
            showVideoOptions();
            hideNormalOptions();
            hideParallaxOptions();
        }
        if ($('#df_metabox_header_border').is(':checked')) {
            showHeaderBorderOptions();
        } else {
            hideHeaderBorderOptions();
        }
    }

    function hideFancyHeaderStyleOptions() {
        $('[name="df_metabox_header_align"]').parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_title').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_title_color').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_subtitle').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_subtitle_color').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('[name="df_metabox_background_options"]').parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_background_color').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_options').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_fancy_parallax_speed').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_height_setting').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_border').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().addClass('df-metabox-hidden');

        hideNormalOptions();
        hideParallaxOptions();
        hideVideoOptions();
        hideHeaderBorderOptions();
    }

    // Background Options
    function showNormalOptions() {
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_options').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideNormalOptions() {
        $('#df_metabox_repeat_options').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().addClass('df-metabox-hidden');
    }
    function showParallaxOptions() {
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_fancy_parallax_speed').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideParallaxOptions() {
        $('#df_metabox_fancy_parallax_speed').parent().parent().addClass('df-metabox-hidden');
    }
    function showVideoOptions() {
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideVideoOptions() {
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
    }
    // Background Options

    // border
    function showHeaderBorderOptions() {
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().removeClass('df-metabox-hidden');
    }
    function hideHeaderBorderOptions() {
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().addClass('df-metabox-hidden');
    }
    // border
    // Fancy Header

    // Master Slider Header
    function showMasterSliderHeaderStyleOptions() {
        $('#df_metabox_master_slider_options').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideMasterSliderHeaderStyleOptions() {
        $('#df_metabox_master_slider_options').parent().parent().addClass('df-metabox-hidden');
    }
    // Master Slider Header

    // Conditional
    if (show.is(':checked') || hide.is(':checked')) {
        hideMasterSliderHeaderStyleOptions();
        hideFancyHeaderStyleOptions();
    } else if (fancy.is(':checked')) {
        showFancyHeaderStyleOptions();
        hideMasterSliderHeaderStyleOptions();
    } else {
        hideFancyHeaderStyleOptions();
        showMasterSliderHeaderStyleOptions();
    }

    $('[name="df_metabox_header_style"]').change(function() {
        if (this.value === 'show' || this.value === 'hide') {
            hideMasterSliderHeaderStyleOptions();
            hideFancyHeaderStyleOptions();
        } else if (this.value === 'fancy') {
            showFancyHeaderStyleOptions();
            hideMasterSliderHeaderStyleOptions();
        } else {
            hideFancyHeaderStyleOptions();
            showMasterSliderHeaderStyleOptions();
        }
    });

    $('[name="df_metabox_background_options"]').change(function() {
        if (this.value === 'normal') {
            showNormalOptions();
            hideParallaxOptions();
            hideVideoOptions();
        } else if (this.value === 'parallax' || this.value === 'horizontal-parallax') {
            hideNormalOptions();
            showParallaxOptions();
            hideVideoOptions();
        } else {
            hideNormalOptions();
            hideParallaxOptions();
            showVideoOptions();
        }
    });

    $('#df_metabox_header_border').change(function() {
        if (this.checked) {
            showHeaderBorderOptions();
        } else {
            hideHeaderBorderOptions();
        }
    });
    /* ================================================================================================= */
    /* Header Options                                                                                    */
    /* ================================================================================================= */


});