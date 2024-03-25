<?php

global $post;

/* ----------------------------------------------------------------------------------- */
/* post format audio                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_audio_post_format')) :

    function df_audio_post_format() {
        if (! post_password_required()) {
            $upload_audio = wp_get_attachment_url(get_post_meta(get_the_ID(), 'df_metabox_upload_single_post_audio', true)); // metabox page audio upload blog
            $embbed_audio = get_post_meta(get_the_ID(), 'df_metabox_audio_textarea', true); // metabox page audio blog
            if (has_post_thumbnail() && $embbed_audio == '') {
                echo "<div class='df-post-audio df-post-audio-thumbnail'>";
                the_post_thumbnail('full');
            } else {
                echo "<div class='df-post-audio'>";
            }

            if ($upload_audio != '') {
                echo do_shortcode('[audio src="' . esc_url($upload_audio) . '"]');
            } elseif ($embbed_audio != '') {
                    $allowed_html = array(
                        'iframe' => array(
                            'src' => array(),
                            'id' => array(),
                            'allowfullscreen' => array(),
                            'frameborder' => array(),
                            'width' => array(),
                            'height' => array(),
                            'url' => array(),
                            'scrolling' => array(),
                        ),
                        'a' => array(
                                'href' => array()
                            ),
                        'p' => array()
                    );
                    
                    echo wp_kses( $embbed_audio, $allowed_html, "http, https, ftp, mailto");
            }
            echo "</div>";
        }/*post password protected*/
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* post format gallery                                                                 */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_gallery_post_format')) :

    function df_gallery_post_format() {
        if (! post_password_required()) {
                $embbed_gall = get_post_meta(get_the_ID(), 'df_metabox_custom_gallery_textarea', true); // metabox page gallery blog
                echo "<div class='df-gallery-grid'>";
                echo do_shortcode( $embbed_gall );
                echo "</div>";
        }/*post password protected*/ 
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* post format status                                                                  */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_status_post_format')) :

    function df_status_post_format() {
        if (! post_password_required()) {
                $embbed_status = get_post_meta(get_the_ID(), 'df_metabox_custom_status_textarea', true); // metabox page audio blog
                echo "<div class='df-status-format'>";
                echo do_shortcode( $embbed_status );
                echo "</div>";
        }/*post password protected*/ 
    }

endif;

/* ------------------------------------------------------------------ */
/* ADD PRETTYPHOTO REL ATTRIBUTE FOR LIGHTBOX                         */
/* ------------------------------------------------------------------ */

add_filter('wp_get_attachment_link', 'df_add_rel_attribute', 10, 6);

function df_add_rel_attribute($content, $id, $size, $permalink, $icon, $text) {
    global $post;
    if ($permalink) {
        return $content;
    }
    else{
        return preg_replace("/<a/","<a rel=\"prettyPhoto[slides]\"",$content,1);
    }


}

/* ----------------------------------------------------------------------------------- */
/* Share Meta Image                                                                    */
/* ----------------------------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_image_size('thumbnail-gallery-grid', 500, 500, true);
    add_image_size('thumbnail-navi-single-post', 180, 129, true);
    add_image_size('thumbnail-single-related', 700, 499, true);
    add_image_size('ajax-search-thumb', 80, 80, true);
    add_image_size('thumbnail-editor-pick', 800, 571, true);
    add_image_size('thumbnail-widget', 180, 180, true);
}
/* ----------------------------------------------------------------------------------- */
/* post format image                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_image_post_format')) :

    function df_image_post_format() {
        
        $df_big_mode_lay  = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true);
        $df_show_featured_img = df_options('show_featured_image_');

        if ($df_show_featured_img != '0' || !is_single() ) {
            if ( $df_big_mode_lay != '1' || is_single() ) {
            
                $image_before = $image_after = '';

                if (!is_single()) {
                    $image_before = '<a class="img" href="'.esc_url(get_permalink()).'">';
                    $image_after = "</a>";
                }

                if (!post_password_required()) {
            
                    global $page_metabox_image_resize, $image_width, $image_height;
            
                    if ($page_metabox_image_resize == 'custom') {
                        $img_url = wp_get_attachment_url(get_post_thumbnail_id(), 'full'); //get full URL to image (use "large" or "medium" if the images too big)
                        $image   = aq_resize($img_url, $image_width, $image_height, true); //resize & crop the image
                            echo "<div class='df-post-image'>";
                            echo $image_before;
                            echo '<img src="' . $image . '" />';
                            echo $image_after;
                            echo "</div>";
                    } else if (has_post_thumbnail()) {
                            echo "<div class='df-post-image'>";
                            echo $image_before;
                            the_post_thumbnail('full');
                            echo $image_after;
                            echo "</div>";
                    }
            
                }/*post password protected*/
            
            }
        }
        
    }

endif;
 

/* ----------------------------------------------------------------------------------- */
/* post format link                                                                    */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_link_post_format')) :

    function df_link_post_format() {

        if (! post_password_required()) {
            $link_text          = esc_url(get_post_meta(get_the_ID(), 'df_metabox_link_text', true)); // metabox page link blog
            $link_text_caption  = get_post_meta(get_the_ID(), 'df_metabox_link_text_caption', true); // metabox page link blog
            $link_text_target   = esc_url(get_post_meta(get_the_ID(), 'df_metabox_link_text_target', true)); // metabox page link blog
            $image_url          = esc_url(wp_get_attachment_url(get_post_thumbnail_id(), 'full'));

            if ($link_text_caption != '' || $link_text !='') {
                if ($link_text_caption != '') { ?>
                    <div class="format-link-bg">
                        <div class="link-background-img" style="background-image:url(<?php echo $image_url; ?>)"></div>
                        <div class="df-postformat-link">
                            <h2 class='df-postformat-link-img'>
                                <a href="<?php echo $link_text; ?>" target="<?php echo $link_text_target; ?>">
                                    <?php echo $link_text_caption; ?>
                                </a>
                            </h2>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="format-link-bg">
                        <div class="link-background-img" style="background-image:url(<?php echo $image_url; ?>)"></div>
                        <div class="df-postformat-link">
                            <h2 class='df-postformat-link-img'>
                                <a href="<?php echo $link_text; ?>" target="<?php echo $link_text_target; ?>">
                                    <?php echo $link_text; ?>
                                </a>
                            </h2>
                        </div>
                    </div>
                <?php }
            }
        }/*post password protected*/
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* post format quote                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_quote_post_format')) :

    function df_quote_post_format() {
        if (! post_password_required()) {
            $quote_textarea         = get_post_meta(get_the_ID(), 'df_metabox_quote_textarea', true); // metabox page quote blog
            $quote_author           = get_post_meta(get_the_ID(), 'df_metabox_qoute_author', true); // metabox page quote blog
            $quote_color_opacity    = get_post_meta(get_the_ID(), 'df_metabox_bg_opacity_color', true );// metabox page quote blog
            $quote_color            = get_post_meta(get_the_ID(), 'df_metabox_quote_color', true); // metabox page quote blog
            $quote_author_color     = get_post_meta(get_the_ID(), 'df_metabox_author_quote_color', true); // metabox page quote blog
            $bg_quote_author        = get_post_meta(get_the_ID(), 'df_metabox_bg_quote_color', true); // metabox page quote blog
            $quote_color_bg         = df_convert_rgba($bg_quote_author, $quote_color_opacity);
            
            if ($quote_author != '' && $quote_textarea != '') {
            echo '<div class="df-quote df-post-quote" style="background:' . $quote_color_bg . ';padding: 40px;">
                    <h2 class="df-quote-text" style="color:' . $quote_color . '">' . esc_textarea($quote_textarea) . '</h2>
                    <h4 class="df-quote-author" style="color:' . $quote_author_color . '">' . $quote_author . '</h4>
                  </div>';
            }
        }/*post password protected*/
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* post format video                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_video_post_format')) :

    function df_video_post_format() {
        if (! post_password_required()) {
            $upload_video = wp_get_attachment_url(get_post_meta(get_the_ID(), 'df_metabox_upload_single_post_video', true)); // metabox page audio upload blog
            $embbed_video = get_post_meta(get_the_ID(), 'df_metabox_video_textarea', true); // metabox page audio blog
            echo "<div class='df-post-video'>";
            if ($upload_video != '') {
                echo do_shortcode('[video src="' . esc_url($upload_video) . '"]');
            } elseif ($embbed_video != '') {
                  $allowed_html = array(
                        'iframe' => array(
                            'src' => array(),
                            'id' => array(),
                            'allowfullscreen' => array(),
                            'frameborder' => array(),
                            'width' => array(),
                            'height' => array(),
                            'url' => array(),
                            'scrolling' => array(),
                        ),
                        'a' => array(
                                'href' => array()
                            ),
                        'p' => array()
                    );
                      echo wp_kses( $embbed_video, $allowed_html, "http, https, ftp, mailto");
                      // echo $embbed_video;
            }
            echo "</div>";
        }/*post password protected*/
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* post format chat                                                                    */
/* ----------------------------------------------------------------------------------- */

/* Filter the content of chat posts. */
 
/* ----------------------------------------------------------------------------------- */
/* post format aside                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_aside_post_format')) :

    function df_aside_post_format() {
        if (! post_password_required()) {
            echo "<div class='aside-post-formats'>";
            echo df_blog_content();
            echo df_post_meta();
            echo "</div>";
        }/*post password protected*/
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* post background image                                                               */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists('df_post_bg_image') ) :
    function df_post_bg_image() {
        $df_big_mode_lay  = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true);

        if ( !is_single() && $df_big_mode_lay == '1' ) {
            $image_url = wp_get_attachment_url(get_post_thumbnail_id(), 'full');

            echo 'style="background-image:url('.$image_url.');"';
        }
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* status post background image                                                        */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists('df_status_post_bg_image') ) :
    function df_status_post_bg_image() {
        $image_url = wp_get_attachment_url(get_post_thumbnail_id(), 'full');
        echo 'style="background-image:url('.$image_url.');"';
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* status post background image                                                        */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists('df_quote_post_bg_image') ) :
    function df_quote_post_bg_image() {
        $df_big_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true);

        if ($df_big_mode_lay == '1') {
            $image_url = wp_get_attachment_url(get_post_thumbnail_id(), 'full');
            echo 'style="background-image:url('.$image_url.');"';
        }
    }
endif;