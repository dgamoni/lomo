<?php
if (!defined('ABSPATH')) {
    exit;
}
/* ------------------------------------------------------------------------------------
  TABLE OF CONTENTS

  - Remove Tag Cloud Inline Style
  - Social Connect
  - Share Meta Image
  - Convert Hex to RGBA
  ------------------------------------------------------------------------------------ */


/* ----------------------------------------------------------------------------------- */
/* Remove Tag Cloud Inline Style                                                       */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_remove_tag_cloud_inline_style')) {

    function df_remove_tag_cloud_inline_style($tag_string) {
        return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
    }

    add_filter('wp_generate_tag_cloud', 'df_remove_tag_cloud_inline_style');
}

/* ----------------------------------------------------------------------------------- */
/* add css class post count on archives and category widget                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_archives_add_span_cat_count')) {

function df_archives_add_span_cat_count($link_html) {
    $link_html = str_replace('</a>', '</a><span class="post-count">', $link_html);
    $link_html = str_replace('</li>', '</span></li>', $link_html);
    return $link_html;
  }

  add_filter('get_archives_link', 'df_archives_add_span_cat_count');
}  

if (!function_exists('df_category_add_span_cat_count')) {

function df_category_add_span_cat_count($link_html) {
        $link_html = str_replace(' (', ' <span class="post-count">(', $link_html);
        $link_html = str_replace(')', ')</span>', $link_html);
        return $link_html;
}

add_filter('wp_list_categories', 'df_category_add_span_cat_count');

}

/* ============================================================================= */
/* Social Connect                                                                */
/* ============================================================================= */

if (!function_exists('df_social_connect')) {

    function df_social_connect() {

        $facebook = df_options('facebook');
        $twitter = df_options('twitter');
        $google_plus = df_options('googleplus');
        $youtube = df_options('youtube');
        $vimeo = df_options('vimeo');
        $instagram = df_options('instagram');
        $pinterest = df_options('pinterest');
        $dribbble = df_options('dribbble');
        $linkedin = df_options('linkedin');
        $bloglovin = df_options('bloglovin');
        $rss = df_options('rss');

        $output = '<div class="df-social-skin2">';

            if ($facebook) : $output .= '<a href="' . esc_url($facebook) . '" class="facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            endif;
            if ($twitter) : $output .= '<a href="' . esc_url($twitter) . '" class="twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            endif;
            if ($google_plus) : $output .= '<a href="' . esc_url($google_plus) . '" class="google-plus" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>';
            endif;
            if ($youtube) : $output .= '<a href="' . esc_url($youtube) . '" class="youtube" title="YouTube" target="_blank"><i class="fa fa-youtube-play"></i></a>';
            endif;
            if ($vimeo) : $output .= '<a href="' . esc_url($vimeo) . '" class="vimeo" title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
            endif;
            if ($instagram) : $output .= '<a href="' . esc_url($instagram) . '" class="instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            endif;
            if ($pinterest) : $output .= '<a href="' . esc_url($pinterest) . '" class="pinterest" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            endif;
            if ($dribbble) : $output .= '<a href="' . esc_url($dribbble) . '" class="dribbble" title="Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a>';
            endif;
            if ($linkedin) : $output .= '<a href="' . esc_url($linkedin) . '" class="linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            endif;
            if ($bloglovin) : $output .= '<a href="' . esc_url($bloglovin) . '" class="bloglovin" title="Bloglovin`" target="_blank"><i class="fa fa-gittip"></i></a>';
            endif;
            if ($rss) : $output .= '<a href="' . esc_url($rss) . '" class="rss" title="RSS" target="_blank"><i class="fa fa-rss"></i></a>';
            endif;

        $output .= '</div>';

        echo $output;
    }

}

if (!function_exists('df_social_sharing')) {

    function df_social_sharing() {
    global $post;
    $src = esc_url(wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' )); ?>

    <div class="df-social-sharing">
        <div class="container">
        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share_btn"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" class="share_btn"><i class="fa fa-twitter"></i></a>  
        <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
        <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $src[0]; ?>&description=<?php the_title(); ?>" target="_blank" class="share_pinterest"><i class="fa fa-pinterest"></i></a>
        <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(get_the_ID()); ?>" target='_blank'><i class="fa fa-stumbleupon"></i></a>
        <a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo strip_tags(apply_filters( 'woocommerce_short_description', $post->post_excerpt )); ?> <?php the_permalink(); ?>" class="share_email"><i class="fa fa-envelope-o"></i></a>
        </div>
    </div>

<?php     

    }

}



/* ----------------------------------------------------------------------------------- */
/* Site Favicon                                                                        */
/* ----------------------------------------------------------------------------------- */

if ( ! function_exists( 'df_site_favicon' ) ) {
  function df_site_favicon() {

    $icon_favicon       = df_options( 'fav_icon' );
    $icon_touch         = df_options( 'icon_touch' );
    $icon_tile          = df_options( 'icon_tile' );
    $icon_tile_bg_color = df_options( 'icon_tile_bg_color' );

    if ( $icon_favicon != '' ) {
      echo '<link rel="shortcut icon" href="' . esc_url($icon_favicon) . '">';
    }

    if ( $icon_touch != '' ) {
      echo '<link rel="apple-touch-icon-precomposed" href="' . esc_url($icon_touch) . '">';
    }

    if ( $icon_tile != '' ) {
      echo '<meta name="msapplication-TileColor" content="' . $icon_tile_bg_color . '">';
      echo '<meta name="msapplication-TileImage" content="' . $icon_tile . '">';
    }

  }
 add_action( 'wp_head', 'df_site_favicon' );
}

/* ----------------------------------------------------------------------------------- */
/* Analytics                                                                           */
/* ----------------------------------------------------------------------------------- */
if ( ! function_exists( 'df_site_analytics' ) ) :
  function df_site_analytics() {
    $analytics = df_options( 'analytics_textarea' );
    if ( $analytics != '' ){
        echo stripslashes( $analytics ) . "\n";
    }
}
add_action( 'wp_head','df_site_analytics' );
endif;