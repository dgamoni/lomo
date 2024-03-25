<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dahztheme
 */
/* ----------------------------------------------------------------------------------- */
/* Load responsive <meta> tags in the <head>                                           */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_load_responsive_meta_tags')) {

    function df_load_responsive_meta_tags() {
        $html = '';

        $html .= "\n" . '<!--  Mobile viewport scale -->' . "\n";
        $html .= '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' . "\n";

        echo $html;
    }

// End df_load_responsive_meta_tags()
}
add_action('dahz_meta', 'df_load_responsive_meta_tags', 10);

/* ----------------------------------------------------------------------------------- */
/* Filter Tag Cloud                                                                    */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_tag_cloud_args')) {

    function df_tag_cloud_args($in) {
        return 'smallest=11&amp;largest=14&amp;unit=px';
    }

}
    add_filter('widget_tag_cloud_args', 'df_tag_cloud_args');

/* ----------------------------------------------------------------------------------- */
/* Breadcrumb display                                                                  */
/* ----------------------------------------------------------------------------------- */
// Customise the breadcrumb
if (!function_exists('df_custom_breadcrumbs_args')) {

    function df_custom_breadcrumbs_args($args) {

                $args = array('separator' => '&rsaquo;', 'before' => '', 'show_home' => sprintf(__('Home', 'dahztheme')));

        return $args;
    }

// End df_custom_breadcrumbs_args()
}
add_filter('dahz_breadcrumbs_args', 'df_custom_breadcrumbs_args', 10);

/* ----------------------------------------------------------------------------------- */
/* Global Post Meta                                                                    */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function df_posted_on() {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date()));
        $author = __('by', 'dahztheme') .' '. sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author()));

        printf('<span class="posted-on">%1$s</span><span class="byline">%2$s</span>', sprintf('<a href="%1$s" rel="bookmark">%2$s</a>', esc_url(get_permalink()), $time_string ), $author) ;
    }

endif;

if (!function_exists('df_post_format')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function df_post_format() {
            $format = get_post_format();
            $url    = empty($format)?get_permalink():get_post_format_link($format);
            echo "<span class='post-format'><span class='byline'>";
            echo sprintf('<a href="%s" class="post-format-link">%s</a>', esc_url($url), get_post_format_string($format));
            echo "</span></span>";
        }

endif;

if (!function_exists('df_post_meta')) :

    function df_post_meta() {
        global $post;
        $blog_post_meta = get_post_meta($post->ID, 'df_metabox_enable_post_meta', true);
        $df_enable_pm = df_options('enable_post_meta');
        if ($df_enable_pm && $blog_post_meta != '0' ) {
            echo "<div class='df-postmeta'>";
            df_post_format();
            df_posted_on();
        if (comments_open() || '0' != get_comments_number()) {

            echo "<span class='comment'><a href='" . esc_url(get_comments_link()) . "'>";
            comments_number(__('0 Comments', 'dahztheme'), __('1 Comment', 'dahztheme'), __('% Comments', 'dahztheme'));
            echo "</a></span>";
        }
            echo "</div>";
        }
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Isotope Category Grid                                                               */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_isotope_category_blog')) :

    function df_isotope_category_blog() {
    $df_enable_filter_cat = df_options('enable_filter_cat');
    
        if ($df_enable_filter_cat == '1' ) {

            $df_homepage_layout = df_options('homepage_layout');
           
            if ($df_homepage_layout == 'grid_post' && !is_tax() && !is_page() && !is_single()) {

                $terms = get_terms( 'category');

                $html = '<ul id="options-blog-sort">';
                $html .= '<li><a href="#" data-option-value="*" data-filter="*" class="selected">' . __('View All', 'dahztheme') . '</a></li>';

                foreach ($terms as $term) {
                    $html .= "<li><a href='#' data-filter='.category-{$term->slug}'>{$term->name}</a></li>";
                }

                $html .= '</ul><div class="clear"></div>';

                echo $html;
            }
        }
        }


endif;

/*------------------------------------------------------------------------------------ */
/* float menu                                                                        */
/* ----------------------------------------------------------------------------------- */
 if (!function_exists('df_float_menu')) :

    function df_float_menu() {
        $site_title = get_bloginfo('name');
        $site_description = get_bloginfo( 'description' );
        $df_logo = df_options('logo');
        $header_navbar_position = df_options('header_navbar_position');
        $df_logo_target_link = home_url( '/' );
        $df_float_menu = df_options('menu_float_setting');
        if ($df_float_menu != '1') {
        ?>
         <div class="df-float-menu">
            <div class="df-navibar-inner df_container-fluid">

                  <div class="mobile-menu-container">
                    
                    <span class="top-search mobile-top-search"><i class="df-magnifying"></i></span>
                    
                    <div class="df-mobile-menu-wrapper">
                        <div class="df-mobile-menu-button-container">
                            <span class="mobile-menu-button"></span>
                        </div>
                    </div>

                </div><!-- mobile menu container -->

                <nav class="main-navigation" role="navigation">
                    <?php
                    if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' )){
                        df_navbar_menu( array(
                            'menu_wraper'       => '<ul id="df-float-main-nav" class="df-navi">%MENU_ITEMS%' . "\n" . '</ul>',
                            'menu_items'        =>  "\n" . '<li class="%ITEM_CLASS%"><a href="%ITEM_HREF%"%ESC_ITEM_TITLE%>%ICON%<span>%ITEM_TITLE%%SPAN_DESCRIPTION%</span></a>%SUBMENU%</li> ',
                            'submenu'           => '<ul class="sub-nav df_row-fluid">%ITEM%</ul>',
                            'params'            => array( 'act_class' => 'act', 'please_be_mega_menu' => true ),
                        ) ); 
                    } else {
                    echo sprintf('<ul class="df-navi"><li><a href="%swp-admin/nav-menus.php">Assign a Menu</a></li></ul>', esc_url( home_url( '/' ) ));
                    }
                      ?>
                </nav><!-- #site-navigation float -->
                
                <div class="site-branding">
                    <h1 class="site-title hide">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php df_sitename_class(); ?>" rel="home"><?php $site_title ; ?></a>
                    </h1>
                    <a href="<?php echo esc_url( $df_logo_target_link ); ?>" class="<?php df_sitename_class(); ?>" rel="home"> <?php echo ( $df_logo == '' ) ? $site_title : '<img src="' . esc_url($df_logo) . '" alt="' . $site_description . '">'; ?></a>
                </div>

              

                <div class="df-top-navigation">
                    <ul>
                        <li>
                            <span class="top-search default-top-search"><i class="fa fa-search"></i></span>
                        </li>

      
                    </ul>
                </div><!-- top nav float -->
            </div><!-- .container fluid-->
        </div><!-- .df-navibar float-->
        <?php }  /*end if df_float_menu*/
    }/*end function*/

endif;
/* ----------------------------------------------------------------------------------- */
/* Mobile Menu                                                      */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_mobile_menu_footer')) :
    function df_mobile_menu_footer() {
        $mobile_navbar_color = df_options('mobile_menu_color');

    ?>
        <div class="df-mobile-menu-container df-mobile-right <?php echo $mobile_navbar_color?>">
            <div class="jp-container-mobile-menu">
                <nav class="df-mobile-menu" role="navigation">
                  
                    <?php
                    if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' )){
                     wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'df-navi' ) );
                    } else {
                    echo sprintf('<ul class="df-navi"><li><a href="%swp-admin/nav-menus.php">Assign a Menu</a></li></ul>', esc_url( home_url( '/' ) ));
                    }
                      ?>
                 </nav><!-- #site-navigation -->
                <?php 
                if( df_options('header_topbar') == 1): 
                ?>
                <nav class="mobile-top-menu df-mobile-menu" role="navigation">
                    <?php 
                    if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) {
                    wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_class' => 'df-navi', 'theme_location'  => 'top-menu' ) );
                    }
                    ?>
                </nav><!-- #site-navigation -->
                <!-- // social connect -->
                <div class="social-mobile-menu">
                    <?php 
                        df_social_connect(); 
                    ?>
                </div><!-- end social-mobile-menu-->
            <?php 
            endif; /*end if Topbar*/
            ?>
            </div><!-- end jp-container-mobile-menu-->
        </div><!-- end df-mobile-menu-container-->
    <?php 
    }
endif;
/* ----------------------------------------------------------------------------------- */
/* Mobile Menu Top (header)                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_mobile_menu_header')) :

    function df_mobile_menu_header() {
        if (!class_exists('UberMenu')) {

            $toogle_class = 'sb-toggle-left';
            $mobile_menu_position = df_options('mobile_menu_position');
            if ($mobile_menu_position == 'sb-left') {
                $toogle_class = 'sb-toggle-left';
            }
            else{
                $toogle_class = 'sb-toggle-right';
            }
            ?>
                <ul class="df-mobile-toogle-nav">
                    <li class="<?php echo $toogle_class; ?>"><i class="df-menu"></i> </li>
                </ul>
            <?php
        }/*uber menu class exist*/
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Standard Pagination display                                                         */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_pagenav')) :

    function df_pagenav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>

        <div class="clear"></div>

        <nav class="navigation paging-navigation col-full" role="navigation">

            <div class="nav-links">

                <?php if (get_previous_posts_link()) : ?>
                    <div class="nav-previous alignleft">
                        <?php previous_posts_link(__('<i class="df-arrow-grand-left"></i> Prev', 'dahztheme')); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-next alignright">
                        <?php next_posts_link(__('Next <i class="df-arrow-grand-right"></i>', 'dahztheme')); ?>
                    </div>
                <?php endif; ?>

            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <div class="clear"></div>
        <?php
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination number display                                                           */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_pagenav_number')) :

    function df_pagenav_number() {

        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if (is_rtl()) {
            $next_text_pagination = '<i class="df-arrow-grand-left"></i>';
            $prev_text_pagination = '<i class="df-arrow-grand-right"></i>';
        } else {
            $next_text_pagination = '<i class="df-arrow-grand-right"></i>';
            $prev_text_pagination = '<i class="df-arrow-grand-left"></i>';
        }

        $pagination_num = array(
                'base'      => @add_query_arg('paged', '%#%', esc_url(get_pagenum_link('page'))),
                'format'    => '?paged=%#%',
                'total'     => $wp_query->max_num_pages,
                'current'   => $current,
                'show_all'  => true,
                'type'      => 'list',
                'next_text' => $next_text_pagination,
                'prev_text' => $prev_text_pagination
        );

        if ($wp_rewrite->using_permalinks())
            $pagination_num['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

        if (!empty($wp_query->query_vars['s']))
            $pagination_num['add_args'] = array('s' => get_query_var('s'));

        echo "<div class='df-pagination-number'>";
        echo paginate_links($pagination_num);
        echo "</div>";
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination infinite scroll display js                                              */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_infinite_scr_js')) :
    function df_infinite_scr_js(){
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_style('prettyphoto');
        wp_enqueue_script('wp-playlist');
        ?>
            <script>
            jQuery(document).ready(function($) {
                var image_loader = '<?php echo get_template_directory_uri(); ?>/includes/images/loader.png'
                var url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
                var url_match = url.match(/-2/);

                if (url_match) {
                var infi_url = [url, "/"]
                } else {
                var infi_url = '';
                }

            var inficontainer = $('.isotope_ifncsr');
            inficontainer.infinitescroll({
                    navSelector: ".navigation",
                    nextSelector: ".nav-next a",
                    itemSelector: ".df-main .post",
                    path : infi_url,
                    loading: {
                        img:image_loader,
                        msgText: "",
                        finishedMsg: "<?php _e('All Post Loaded', 'dahztheme'); ?>"
                    }
            },
                function(arrayOfNewElems){

                    // Isotope
                    if ($('.df_grid_masonry, .df_grid_fit').length) {

                        jQuery('.isotope_ifncsr').isotope('appended', arrayOfNewElems);
                            jQuery('.df_grid_fit, .df_grid_masonry').imagesLoaded( function() {
                                jQuery('.df_grid_fit, .df_grid_masonry').isotope('layout');
                        });
                    };

                    // youtube fitvid
                    $(".df-post-video").fitVids();
                    // share
                    $('.df-hover-share-container').mouseenter(function() {
                        $(this).addClass('df-share-content-active');
                    });
                    $('.df-hover-share-container').mouseleave(function() {
                        $(this).removeClass('df-share-content-active');
                    });

                    // Callback bg img overlay
                    if ($('.blog .format-standard.df-standard-image-big-skny').length) {
                        $( '.format-standard.df-standard-image-big-skny .df-post-content' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-status').length) {
                        $( '.format-status .entry-summary' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-quote.df-standard-image-big-skny .df-post-quote').length) {
                        $( '.format-quote .entry-summary' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-link').length) {
                        $( '.format-link .format-link-bg' ).prepend('<div class="overlay_bg_image"></div>');
                    }

                    $('.df-standard-image-right, .df-standard-image-left').each(function() {
                        $(this).append('<div class="clear"></div>')
                    });

                    // like button
                    $('.df-like').click(function() {
                        var $likeLink = $(this);
                        var $id = $(this).attr('id');

                        if ($likeLink.hasClass('liked'))
                        return false;
                        var $dataToPass = {
                            action: 'df_like',
                            likes_id: $id
                        }
                        var like = $.post(dfLike.ajaxurl, $dataToPass, function(data) {
                            $likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
                            $likeLink.find('span').css('opacity', 1);
                        });
                        return false;
                    });
                    $('audio').mediaelementplayer();
                    $('video').mediaelementplayer();

                    $(" a[rel^='prettyPhoto']").prettyPhoto({
                        autoplay_slideshow: false,
                    });                    

                });
            });
            </script>
        <?php
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination inifinite scroll display                                                 */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_pagenav_infinite_scroll')) :

    function df_pagenav_infinite_scroll() {
        df_infinite_scr_js();
        // wp_enqueue_style('wp-mediaelement');
        // wp_enqueue_script('wp-playlist');
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation col-full df-infi-scr" role="navigation">
            <div class="nav-links ">
                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-next df-infi-scr">
                        <?php
                            next_posts_link(__('Next Page <i class="df-arrow-grand-right"></i>', 'dahztheme'));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
        <?php
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination infinite scroll button display js                                        */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_infinite_scr_button_js')) :
    function df_infinite_scr_button_js(){
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_style('prettyphoto');
        wp_enqueue_script('wp-playlist');
        ?>
            <script>
            jQuery(document).ready(function($) {
                var image_loader = '<?php echo get_template_directory_uri(); ?>/includes/images/loader.png'
                var url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
                var url_match = url.match(/-2/);

                if (url_match) {
                var infi_url = [url, "/"]
                } else {
                var infi_url = '';
                }

var count_post = $(".entry-content .post, .entry-content .portfolio").length;
                $(".df-infi-scrl-count .count-value").append('<span>' + count_post + '</span>');

            var inficontainer = $('.isotope_ifncsr');
            inficontainer.infinitescroll({
                    navSelector: ".navigation",
                    nextSelector: ".nav-next a",
                    itemSelector: ".df-main .post",
                    path : infi_url,
                    loading: {
                        img:image_loader,
                        msgText: "",
                        finishedMsg: "<?php _e('All Post Loaded', 'dahztheme'); ?>"
                    }
            },
                function(arrayOfNewElems){

                    // Isotope
                    if ($('.df_grid_masonry, .df_grid_fit').length) {
                        jQuery('.isotope_ifncsr').isotope('appended', arrayOfNewElems);
                            jQuery('.df_grid_fit, .df_grid_masonry').imagesLoaded( function() {
                                jQuery('.df_grid_fit, .df_grid_masonry').isotope('layout');
                        });
                    }
                    // youtube fitvid
                    $(".df-post-video").fitVids();
                    // share
                    $('.df-hover-share-container').mouseenter(function() {
                        $(this).addClass('df-share-content-active');
                    });
                    $('.df-hover-share-container').mouseleave(function() {
                        $(this).removeClass('df-share-content-active');
                    });
                    
                    // Callback bg img overlay
                    if ($('.blog .format-standard.df-standard-image-big-skny').length) {
                        $( '.format-standard.df-standard-image-big-skny .df-post-content' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-status').length) {
                        $( '.format-status .entry-summary' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-quote.df-standard-image-big-skny .df-post-quote').length) {
                        $( '.format-quote .entry-summary' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-link').length) {
                        $( '.format-link .format-link-bg' ).prepend('<div class="overlay_bg_image"></div>');
                    }

                    $('.df-standard-image-right, .df-standard-image-left').each(function() {
                        $(this).append('<div class="clear"></div>')
                    });

                    // like button
                    $('.df-like').click(function() {
                        var $likeLink = $(this);
                        var $id = $(this).attr('id');

                        if ($likeLink.hasClass('liked'))
                        return false;
                        var $dataToPass = {
                            action: 'df_like',
                            likes_id: $id
                        }
                        var like = $.post(dfLike.ajaxurl, $dataToPass, function(data) {
                            $likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
                            $likeLink.find('span').css('opacity', 1);
                        });
                        return false;
                    });


                    // arrow share button
                    if ($('body').hasClass('rtl')) {
                        $('.df-hover-share-content').append('<li class="arrow-up"></li>');
                    } else {
                        $('.df-hover-share-content').prepend('<li class="arrow-up"></li>');
                    }

                    $('audio').mediaelementplayer();
                    $('video').mediaelementplayer();

                    $(" a[rel^='prettyPhoto']").prettyPhoto({
                        autoplay_slideshow: false,
                    });

                });
                $(window).unbind('.infscr');
                    jQuery('.nav-next a').click(function() {
                    jQuery('.isotope_ifncsr').infinitescroll('retrieve');
                    return false;
                });
            });
            </script>
        <?php
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination infinite scroll button display                                           */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_pagenav_infinite_scroll_button')) :

    function df_pagenav_infinite_scroll_button() {
        df_infinite_scr_button_js();
        // wp_enqueue_style('wp-mediaelement');
        // wp_enqueue_script('wp-playlist');
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation col-full df-infi-scr-btn" role="navigation">

            <div class="nav-links">


                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-next a">
                        <?php next_posts_link(__('load more', 'dahztheme')); ?></div>
                <?php endif; ?>

            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <div class="clear"></div>
        <?php
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination infinite scroll button with count display  js                            */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_infinite_scr_button_cnt_js')) :
    function df_infinite_scr_button_cnt_js(){
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_style('prettyphoto');
        wp_enqueue_script('wp-playlist');
        ?>
            <script>
            jQuery(document).ready(function($) {
                var image_loader = '<?php echo get_template_directory_uri(); ?>/includes/images/loader.png'
                var url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
                var url_match = url.match(/-2/);

                if (url_match) {
                var infi_url = [url, "/"]
                } else {
                var infi_url = '';
                }

            var count_post = $(".isotope_ifncsr .post").length;
                $(".df-infi-scrl-count .count-value").append('<span>' + count_post + '</span>');

            var inficontainer = $('.isotope_ifncsr');
            inficontainer.infinitescroll({
                    navSelector: ".navigation",
                    nextSelector: ".nav-next a",
                    itemSelector: ".df-main .post",
                    path : infi_url,
                    loading: {
                        img:image_loader,
                        msgText: "",
                        finishedMsg: "<?php _e('All Post Loaded', 'dahztheme'); ?>"
                    }
            },
                function(arrayOfNewElems){

                    // Isotope
                    if ($('.df_grid_masonry, .df_grid_fit').length) {

                        jQuery('.isotope_ifncsr').isotope('appended', arrayOfNewElems);
                            jQuery('.df_grid_fit, .df_grid_masonry').imagesLoaded( function() {
                                jQuery('.df_grid_fit, .df_grid_masonry').isotope('layout');
                        });
                    }
                    // youtube fitvid
                    $(".df-post-video").fitVids();
                    // share
                    $('.df-hover-share-container').mouseenter(function() {
                        $(this).addClass('df-share-content-active');
                    });
                    $('.df-hover-share-container').mouseleave(function() {
                        $(this).removeClass('df-share-content-active');
                    });

                    //Callback overlay bg img
                    if ($('.blog .format-standard.df-standard-image-big-skny').length) {
                        $( '.format-standard.df-standard-image-big-skny .df-post-content' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-status').length) {
                        $( '.format-status .entry-summary' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-quote.df-standard-image-big-skny .df-post-quote').length) {
                        $( '.format-quote .entry-summary' ).wrapInner('<div class="overlay_bg_image"></div>');
                    }
                    if ($('.format-link').length) {
                        $( '.format-link .format-link-bg' ).prepend('<div class="overlay_bg_image"></div>');
                    }

                    $('.df-standard-image-right, .df-standard-image-left').each(function() {
                        $(this).append('<div class="clear"></div>')
                    });

                    // like button
                    $('.df-like').click(function() {
                        var $likeLink = $(this);
                        var $id = $(this).attr('id');

                        if ($likeLink.hasClass('liked'))
                        return false;
                        var $dataToPass = {
                            action: 'df_like',
                            likes_id: $id
                        }
                        var like = $.post(dfLike.ajaxurl, $dataToPass, function(data) {
                            $likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
                            $likeLink.find('span').css('opacity', 1);
                        });
                        return false;
                    });

                    // arrow share button
                    if ($('body').hasClass('rtl')) {
                        $('.df-hover-share-content').append('<li class="arrow-up"></li>');
                    } else {
                        $('.df-hover-share-content').prepend('<li class="arrow-up"></li>');
                    }

                    $(".df-infi-scrl-count .count-value span:first-child").remove();

                    var count_post = $(".isotope_ifncsr .post").not('.sticky').length;
                    $(".df-infi-scrl-count .count-value").append('<span>' + count_post + '</span>');


                    $('audio').mediaelementplayer();
                    $('video').mediaelementplayer();

                    $(" a[rel^='prettyPhoto']").prettyPhoto({
                        autoplay_slideshow: false,
                    });

                });
                $(window).unbind('.infscr');
                    jQuery('.nav-next a').click(function() {
                    jQuery('.isotope_ifncsr').infinitescroll('retrieve');
                    return false;
                });
            });
            </script>
        <?php
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination infinite scroll button with count display                                */
/* ----------------------------------------------------------------------------------- */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (!function_exists('df_pagenav_infinite_scroll_button_count')) :

    function df_pagenav_infinite_scroll_button_count() {

        df_infinite_scr_button_cnt_js();
        // wp_enqueue_style('wp-mediaelement');
        // wp_enqueue_script('wp-playlist');
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation col-full df-infi-scr-btn" role="navigation">

            <div class="nav-links">

                <?php
                if(is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' )){
                    $count_posts = df_count_post('en', 'post', 'publish');
                } else {
                    $count_posts = wp_count_posts(get_post_type())->publish;
                }

                ?>
                
                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-next a">
                        <?php if (is_rtl()) : ?>
                        <?php next_posts_link(sprintf(__('load more <span class="df-infi-scrl-count"><span class="count-value"></span> / %s</span>', 'dahztheme'), $count_posts)); ?></div>
                        <?php else : ?>
                        <?php next_posts_link(sprintf(__('load more <span class="df-infi-scrl-count">(<span class="count-value"></span> / %s )</span>', 'dahztheme'), $count_posts)); ?></div>
                        <?php endif; ?>
                    </div><!-- .nav-links -->
                <?php endif; ?>

        </nav><!-- .navigation -->
        <div class="clear"></div>
        <?php
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination switcher                                                                 */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_get_pagination')) {
    function df_get_pagination() {
        $pagination_switcher = df_options('page_pagination');
        switch ($pagination_switcher) {
            case 'prev_next': df_pagenav(); break;
            case 'number': df_pagenav_number(); break;
            case 'infinite': df_pagenav_infinite_scroll(); break;
            case 'infinite_button': df_pagenav_infinite_scroll_button(); break;
            case 'infinite_button_count': df_pagenav_infinite_scroll_button_count(); break;
            default: df_pagenav(); break;
        }
    }
}    



/* ----------------------------------------------------------------------------------- */
/* Password protected change form                                                      */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_password_form')) :

function df_password_form() {
        global $post;
        $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
        $output = '<div class="password-form">
        <p class="protected-text">' . __('This post is password protected. To view it, please enter your password below:', 'dahztheme') . '</p>
        <form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
        <p><input name="post_password" id="' . $label . '" type="password" size="20" /> <input placeholder="password" type="submit" name="submit" value="' . esc_attr__('Submit') . '" /></p></form></div>';
        return $output;
    }
    add_filter('the_password_form','df_password_form');
endif;



/* ----------------------------------------------------------------------------------- */
/* Category Blog                                                                       */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_category_blog')) :

    function df_category_blog() {
        $blog_category_post = get_post_meta(get_the_id(), 'df_metabox_enable_post_cat', true);
        $df_enable_link_cat = df_options('enable_link_category');
        if ($df_enable_link_cat == '1' && $blog_category_post != '0') {
            $category = get_the_term_list(get_the_ID(), 'category', '', ', ');
            echo ' <span class="df-category-content-post df-link">' . $category . '</span>';
        }
    }

endif;


/* ----------------------------------------------------------------------------------- */
/* Tag single Blog                                                                     */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_tags')) :

    function df_blog_tags() {
        $tag_post = df_options('enable_tags_');
        if ($tag_post != '0') {
            $tag = get_the_term_list(get_the_ID(), 'post_tag', '', '');
            if ($tag != '') {
                echo "<div class='clear'></div>";
                echo "<div class='single-tag-blog'>";
                echo '<span class="df-link">' . $tag . '</span>';
                echo "</div>";
            }
        }
    }

endif;


/* ----------------------------------------------------------------------------------- */
/* Author single Blog                                                                  */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_author')) :

    function df_single_blog_author() {
        global $post;
        $post_author = df_options('enable_author_layout');
       if ($post_author != '') { ?>
            <div class="about-author">
                <div class="avatar-pic"><?php echo get_avatar(get_the_author_meta('ID'), 60); ?></div>
                <div class="about-author-desc">
                    <h4 class="title-about"><?php _e('About ', 'dahztheme'); ?> <?php echo '<a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author() . '</a>'; ?></h4>
                    <p><?php echo the_author_meta('description'); ?></p>
                    <div class="single-share-blog author-social">
                        <ul>
                            <?php if(get_the_author_meta('facebook')) : ?><li><a target="_blank" class="author-social" href="http://facebook.com/<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                            <?php if(get_the_author_meta('twitter')) : ?><li><a target="_blank" class="author-social" href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                            <?php if(get_the_author_meta('instagram')) : ?><li><a target="_blank" class="author-social" href="http://instagram.com/<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
                            <?php if(get_the_author_meta('google')) : ?><li><a target="_blank" class="author-social" href="http://plus.google.com/<?php echo the_author_meta('google'); ?>?rel=author"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                            <?php if(get_the_author_meta('pinterest')) : ?><li><a target="_blank" class="author-social" href="http://pinterest.com/<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
                            <?php if(get_the_author_meta('tumblr')) : ?><li><a target="_blank" class="author-social" href="http://<?php echo the_author_meta('tumblr'); ?>.tumblr.com/"><i class="fa fa-tumblr"></i></a></li><?php endif; ?>
                            <?php if(get_the_author_meta('bloglovin')) : ?><li><a target="_blank" class="author-social" href="http://bloglovin.com/<?php echo the_author_meta('bloglovin'); ?>"><i class="fa fa-gittip"></i></a></li><?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            
            <?php
        }
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Share single Blog                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_share')) :

function df_single_blog_share() {
    global $post;

    $src                        = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
    $df_enable_fb_blog          = df_options('facebook_enable_share_blog');
    $df_enable_twit_blog        = df_options('twitter_enable_share_blog');
    $df_enable_gp_blog          = df_options('google_enable_share_blog');
    $df_enable_pin_blog         = df_options('pinterest_enable_share_blog');
    $df_enable_email_blog       = df_options('mail_enable_share_blog');
    $df_enable_su_blog          = df_options('stumb_enable_share_blog');
    $df_enable_rdt_blog         = df_options('reddit_enable_share_blog');
    $df_enable_ldn_blog         = df_options('linkedin_enable_share_blog');
    $df_enable_tmb_blog         = df_options('tumblr_enable_share_blog');
    $enable_share_single_blog   = df_options('enable_share_blog');

    if ($enable_share_single_blog != '0') {
        echo "<div class='single-share-blog'>";
        echo __('<span>Share</span>', 'dahztheme'); ?>
            <ul>
                <li><?php if (function_exists('df_global_prints')) { df_global_prints(); } ?></li>
                <li><?php if (function_exists('df_like')) { df_like(); } ?></li>
                <?php if ($df_enable_fb_blog == 1) { // facebook share ?>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(get_the_ID()); ?>" target="_blank"><i class="fa-facebook fa"></i></a></li>
                <?php } ?>
                <?php if ($df_enable_twit_blog == 1) { // twitter share ?>
                <li><a href="http://twitter.com/share?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));?>&amp;url=<?php the_permalink($post->ID); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>   
                <?php } ?>
                <?php if ($df_enable_gp_blog == 1) { // google+ share ?>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink($post->ID); ?>" target="_blank"><i class="fa-google-plus fa"></i></a></li>
                <?php } ?>
                <?php if ($df_enable_pin_blog == 1) { // pinterest share ?>
                <li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink($post->ID); ?>&amp;media=<?php echo $src[0]; ?>&amp;description=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" target="_blank"><i class="fa fa-pinterest "></i></a></li>
                <?php } ?>
                <?php if ($df_enable_email_blog == 1) { // email share ?>
                <li><a href="mailto:?subject=<?php the_permalink($post->ID); ?>" target="_top"><i class="fa-envelope-o  fa"></i></a></li>
                <?php } ?>
                <?php if ($df_enable_su_blog == 1) { // stumbleupon share ?>
                <li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink($post->ID); ?>" target='_blank'><i class="fa fa-stumbleupon"></i></a></li>
                <?php } ?>
                <?php if ($df_enable_rdt_blog == 1) { // reddit share ?>
                <li><a href="http://reddit.com/submit?url=<?php the_permalink($post->ID); ?>&amp;title=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" target="_blank"><i class="fa fa-reddit"></i></a></li>
                <?php } ?>
                <?php if ($df_enable_ldn_blog == 1) { // linkedin share ?>
                <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink($post->ID); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></a></li>
                <?php } ?>
                <?php if ($df_enable_tmb_blog == 1) { // tumblr share ?>
                <li><a href="http://tumblr.com/share?s=&amp;v=3&amp;t=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;u=<?php the_permalink($post->ID); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></a></li>
                <?php } ?>
            </ul>
        <?php
        echo "</div>";
    }
}

endif;

/* ----------------------------------------------------------------------------------- */
/* Postnav single Blog next prev no thumbnail                                          */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_postnav')) :

    function df_single_blog_postnav() {
        $df_enable_postnav = df_options('enable_post_pagination');
        $df_enable_postnav_style = df_options('blog_pagination_style');
        if (($df_enable_postnav) && ($df_enable_postnav_style == 'style1')) {
            ?>
            <div class="post-pagination">
                <div class="navi-prev small-left"><?php
                   
                        previous_post_link('%link', '<h5 >' . __(' Previous Article', 'dahztheme') . '</h5> <i class="icon df-arrow-grand-left"></i>');
                        previous_post_link('<span class="df-link title-link-nav-single-post">%link</span>');
                    
                    ?>

                </div>
                <div class="navi-next small-right"><?php
                        next_post_link('%link', '<i class="icon df-arrow-grand-right"></i><h5>' . __('Next Article ', 'dahztheme') . '</h5>');
                        next_post_link('<span class="df-link title-link-nav-single-post">%link</span>');
                    ?></div>
            </div>
            <div class="clear"></div>
            <?php
        }
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Postnav single Blog next (left) with thumbnail                                      */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_postnav_wl_thumb')) :

    function df_single_blog_postnav_wl_thumb() {
        $df_enable_postnav = df_options('enable_post_pagination');
        $df_enable_postnav_style = df_options('blog_pagination_style');
        if (($df_enable_postnav) && ($df_enable_postnav_style == 'style2')) {
            ?>
            <div id="post-single-nav-left" class="post-side-left-pagination no-active">
                <div id="post-nav">
                    <?php
                    global $post;
                    $prevPost = get_next_post(false);
                    if ($prevPost) {
                        $args = array(
                            'posts_per_page' => 1,
                            'include' => $prevPost->ID
                        );
                        $prevPost = get_posts($args);
                        foreach ($prevPost as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="post-previous">

                                <a class="img" href="<?php the_permalink(); ?>"><?php
                                    if (has_post_thumbnail()) {

                                        echo '<div class="view third-effect">';
                                        the_post_thumbnail('thumbnail-navi-single-post');
                                        echo '        <div class="mask">
                        <a href="' . get_permalink() . '" class="info">' . __('Read More', 'dahztheme') . '</a>
                    </div></div>';
                                    } else {
                                        echo '<div class="view third-effect">';
                                        $image_nav = get_post_format();
                                        $url_src = esc_url(get_template_directory_uri() . '/includes/images/post-formats/');

                                        switch ($image_nav) {
                                            case 'audio':
                                                echo '<img src="' . $url_src . 'audio.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'gallery':
                                                echo '<img src="' . $url_src . 'gallery.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'image':
                                                echo '<img src="' . $url_src . 'image.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'video':
                                                echo '<img src="' . $url_src . 'video.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'quote':
                                                echo '<img src="' . $url_src . 'quote.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'link':
                                                echo '<img src="' . $url_src . 'link.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'status':
                                                echo '<img src="' . $url_src . 'status.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'chat':
                                                echo '<img src="' . $url_src . 'chat.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'aside':
                                                echo '<img src="' . $url_src . 'aside.jpg" class="wp-post-image" alt="">';
                                                break;
                                            default:
                                                echo '<img src="' . $url_src . 'standard.jpg" class="wp-post-image" alt="">';
                                        }
                                        echo '<div class="mask"><a href="' . get_permalink() . '" class="info">' . __('Read More', 'dahztheme') . '</a></div></div>';
                                    }
                                    ?> </a>
                                    <a class="previous" href="<?php the_permalink(); ?>">
                                        <i class="df-arrow-grand-left"></i>
                                    </a>
                            </div>

                            <?php
                            wp_reset_postdata();
                        } //end foreach
                    } // end if
                    ?>
                </div>
            </div>
            <?php
        }
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Postnav single Blog next (right) with thumbnail                                     */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_postnav_wr_thumb')) :

    function df_single_blog_postnav_wr_thumb() {
        $df_enable_postnav = df_options('enable_post_pagination');
        $df_enable_postnav_style = df_options('blog_pagination_style');
        if (($df_enable_postnav) && ($df_enable_postnav_style == 'style2')) {
            ?>
            <div id="post-single-nav-right" class="post-side-right-pagination no-active">
                <div id="post-nav">
                    <?php
                    global $post;

                    $nextPost = get_previous_post(false);
                    if ($nextPost) {
                        $args = array(
                            'posts_per_page' => 1,
                            'include' => $nextPost->ID
                        );
                        $nextPost = get_posts($args);
                        foreach ($nextPost as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="post-next">
                                <a class="img" href="<?php the_permalink(); ?>"><?php
                                    if (has_post_thumbnail()) {
                                        echo '<div class="view third-effect">';
                                        the_post_thumbnail('thumbnail-navi-single-post');
                                        echo '        <div class="mask">
                        <a href="' . get_permalink() . '" class="info">' . __('Read More', 'dahztheme') . '</a>
                    </div></div>';
                                    } else {

                                        echo '<div class="view third-effect">';
                                        $image_nav = get_post_format();
                                        $url_src = esc_url(get_template_directory_uri() . '/includes/images/post-formats/');

                                        switch ($image_nav) {
                                            case 'audio':
                                                echo '<img src="' . $url_src . 'audio.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'gallery':
                                                echo '<img src="' . $url_src . 'gallery.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'image':
                                                echo '<img src="' . $url_src . 'image.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'video':
                                                echo '<img src="' . $url_src . 'video.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'quote':
                                                echo '<img src="' . $url_src . 'quote.jpg" class="wp-post-image" alt="">';
                                                break;
                                            case 'link':
                                                echo '<img src="' . $url_src . 'link.jpg" class="wp-post-image" alt="">';
                                                break;
                                            default:
                                                echo '<img src="' . $url_src . 'standard.jpg" class="wp-post-image" alt="">';
                                        }
                                        echo '        <div class="mask">
                        <a href="' . get_permalink() . '" class="info">' . __('Read More', 'dahztheme') . '</a>
                    </div></div>';
                                    }
                                    ?></a>
                                    <a class="next" href="<?php the_permalink(); ?>">
                                        <i class="df-arrow-grand-right"></i>
                                    </a>
                            </div>
                            <?php
                            wp_reset_postdata();
                        } //end foreach
                    } // end if
                    ?>
                </div>
            </div>
            <?php
        }
    }

endif;

 
/*-----------------------------------------------------------------------------------*/
/* Ajax search header */
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','df_ajax_custom_head');
function df_ajax_custom_head()
{
    echo '<script type="text/javascript">var ajaxurl = \''.admin_url('admin-ajax.php').'\';</script>';
}

add_action('wp_ajax_ajax_search', 'ajax_search');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search');
 
function ajax_search(){

global $post;

$df_search_ajax = df_options('page_header_search_ajax');

$cat_select = $tag_select = $cal_select = $cal_select_month = $cal_select_year = '';

$s = $_POST['s'];

if ($df_search_ajax == 'adv') {
    $cat_select = $_POST['cat_select'];
    $tag_select = $_POST['tag_select'];
    $cal_select  = str_replace("=", "",str_replace(" ", "", str_replace("/", "",ltrim($_POST['calendar_select'], home_url(). "?marchivesdate"))));
    $cal_select_month = substr($cal_select, -2);
    $cal_select_year = substr($cal_select, 0, 4);
    $args = array(
        's' => $s,
        'cat' => $cat_select,
        'tag_id' => $tag_select ,
        'showposts' => -1,
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => 0,
        

    );
    if ($cal_select != '0' ) {
        $args['date_query'][] = array(
                'year'  => $cal_select_year,
                'month' => $cal_select_month,
        );
    }
 
} /*end if $df_search_ajax*/
 else {
    $args = array(
        's' => $s,
        'showposts' => -1,
        'post_status' => 'publish',
        'suppress_filters' => 0,
    );
}/*end else $df_search_ajax*/

    $query = new WP_Query($args);
    if($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>

        <?php 
            $post_type = get_post_type( $post->ID );
        ?>
             <div id="result-<?php echo $post->ID; ?>"  class="ajax-search-result">
                <?php  
                 if ( has_post_thumbnail()){ ?>
                    <div class='df-search-image'>
                        <a class="image_thum_post" href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
                           <?php  the_post_thumbnail('ajax-search-thumb'); ?>    
                        </a>
                    </div>
                <?php } else {  

                $url_src = esc_url(get_template_directory_uri() . '/includes/images/presets/');
                echo "<div class='df-search-image'>";
                echo '<a href="' . esc_url(get_permalink(get_the_ID())) . '" rel="bookmark" title="">';
                echo '<img src="' . $url_src . 'search.jpg" class="" alt="">';
                echo "</a>";
                echo "</div>";


                 } ?>
                <div class="df-search-content">
                   <h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>  
                   <p> <?php echo df_post_meta(); ?> </p>
                </div>            
            </div>
            <div class="clear"></div>

    <?php endwhile;
    else : 
    ?>

    <div id="result-not-found">
        <h1> <?php _e('Nothing Found','dahztheme'); ?> </h1>
        <p><?php _e('Sorry, but nothing matched your search terms. Please try again some different keyword','dahztheme'); ?></p>
    </div>

    <?php
    endif;
    die();
}
/* ----------------------------------------------------------------------------------- */
/* Ajax search frontend                                                                */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_ajax_search_front')):
    function df_ajax_search_front() {
        ?>
        <div class="universe-search">
          <div class="universe-search-close ent-text"></div>
          <div class="df_container-fluid col-full">
            <div class="universe-search-form">
                

                <?php if (is_rtl()) : ?>
                <input type="text" id="searchfrm" name="search" class="universe-search-input" placeholder="<?php _e('Search', 'dahztheme'); ?>" value="" autocomplete="off" spellcheck="false" dir="rtl">
                <?php else : ?>
                <input type="text" id="searchfrm" name="search" class="universe-search-input" placeholder="<?php _e('Search', 'dahztheme'); ?>" value="" autocomplete="off" spellcheck="false" dir="ltr">
                <?php endif; ?>
                <?php 
                $df_search_ajax = df_options('page_header_search_ajax');

                if ($df_search_ajax == 'adv') {

                 ?>
                <div class="mobile-ajax-category"><?php _e('Filter', 'dahztheme'); ?></div>
                <div class="ajax-search-select-text">
                <div class="ajax-search-show">
                  <?php _e('You are viewing', 'dahztheme'); ?>
                  <span class="df-category-text"> <?php _e('Category', 'dahztheme'); ?></span>
                  <span class="df-tag-text"> <?php _e('Tag', 'dahztheme'); ?></span>
                  <span class="df-calendar-text"> <?php _e('Date', 'dahztheme'); ?></span>
                </div>
                    <div class="ajax-search-select">
                      <?php 
                        $args_category = array(
                          'show_option_all'    => __('Categories','dahztheme'),
                          'hide_empty'         => 1, 
                          'taxonomy'           => 'category',
                          'name'               => 'cat_select',
                          'hide_if_empty'      => true,
                        ); 
                        wp_dropdown_categories( $args_category );

                        $args_tag = array(
                          'show_option_all'    => __('Tags','dahztheme'),
                          'hide_empty'         => 1, 
                          'taxonomy'           => 'post_tag',
                          'name'               => 'tag_select',
                          'hide_if_empty'      => true,
                        ); 
                        wp_dropdown_categories( $args_tag );

                        $args_calendar = array(
                          'type'            => 'monthly',
                          'format'          => 'option', 
                          'order'           => 'DESC'
                        );
                        echo "<div class='container-select-box'>";
                        echo "<select name='cal_select' id='cal_select'>";
                        echo "<option value='0'>".__('Date','dahztheme')."</option>";
                        wp_get_archives( $args_calendar );
                        echo "</select>";
                        echo "</div>";
                  ?>
                  </div><!-- end ajax search select -->

                </div><!-- end ajax search select text -->
                <?php } ?>
            </div><!-- end universe search form -->
            <div id="jp-container-search" class="jp-container-search">
                <div class="universe-search-results"></div>
            </div>
          </div><!-- end df-container-fluid -->
        </div><!-- end universe search -->
        <?php 
    }
    function df_cat_output($output) {
        $output = str_replace('<select', '<div class="container-select-box"><select', $output);
        $output = str_replace('</select>', '</select></div>', $output);
        return $output;
    }
    add_filter('wp_dropdown_cats', 'df_cat_output');
endif;

/*------------------------------------------------------------------------------------ */
/* Page Loader                                                                         */
/* ----------------------------------------------------------------------------------- */
if(!function_exists('df_loading_spinners')) {
    function df_loading_spinners($return = false) {
        $loading_animation = df_options('loading_animation');
        $loading_animation_style = df_options('loading_animation_style');
         
        $spinner_html = '';

        if($loading_animation != '0'){
            switch ($loading_animation_style) {
                case "pulse":
                    $spinner_html = df_loading_spinner_pulse();
                break;
                case "double_pulse":
                    $spinner_html =  df_loading_spinner_double_pulse();
                break;
                case "cube":
                    $spinner_html =  df_loading_spinner_cube();
                break;
                case "rotating_cubes":
                    $spinner_html =  df_loading_spinner_rotating_cubes();
                break;
                case "stripes":
                    $spinner_html =  df_loading_spinner_stripes();
                break;
                case "wave":
                    $spinner_html =  df_loading_spinner_wave();
                break;
                case "two_rotating_circles":
                    $spinner_html =  df_loading_spinner_two_rotating_circles();
                break;
                case "five_rotating_circles":
                    $spinner_html =  df_loading_spinner_five_rotating_circles();
                break;
            }
        }else{
            $spinner_html = df_loading_spinner_pulse();
        }

        if($return === true) {
            return $spinner_html;
        }

        echo $spinner_html;
    }
}
/* ----------------------------------------------------------------------------------- */
/* Extra Button Post                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_extra_button_post')) {

    function df_extra_button_post() {
        global $post;
        $df_enable_like         = df_options('enable_like_blog');
        $df_enable_share        = df_options('enable_share_blog');
        $df_homepage_layout     = df_options('homepage_layout');
        $show_excerpt           = get_post_meta( $post->ID, 'df_metabox_enable_post_ex', true );
        $df_list_mode           = get_post_meta( $post->ID, 'df_metabox_list_post_lay', true);
        $show_excerpt           = get_post_meta( $post->ID, 'df_metabox_enable_post_ex', true); ?>

        <div class="df-blog-extra">

            <div class="df-blog-extra-right">
                <?php 
                if (function_exists('df_like') && ($df_enable_like == '1')) {
                    df_like();
                }
                if ($df_enable_share == 1) {
                    df_extra_button_post_share();
                } ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php 
    }

}
/* ----------------------------------------------------------------------------------- */
/* Extra Button Post (share)                                                           */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_extra_button_post_share')) {

    function df_extra_button_post_share() {
        global $post;
        $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));

        $df_enable_fb_blog      = df_options('facebook_enable_share_blog');
        $df_enable_twit_blog    = df_options('twitter_enable_share_blog');
        $df_enable_gp_blog      = df_options('google_enable_share_blog');
        $df_enable_pin_blog     = df_options('pinterest_enable_share_blog');

        $df_enable_instagram_blog     = df_options('instagram_enable_share_blog');

        $df_enable_email_blog   = df_options('mail_enable_share_blog');
        $df_enable_su_blog      = df_options('stumb_enable_share_blog');
        $df_enable_rdt_blog     = df_options('reddit_enable_share_blog');
        $df_enable_ldn_blog     = df_options('linkedin_enable_share_blog');
        $df_enable_tmb_blog     = df_options('tumblr_enable_share_blog'); ?>

        <div class="df-blog-extra-post">
        
            <div class='df-hover-share-container'>
        
        <?php echo "<span class='df-hover-share-button df-link'><i class='df-share-alt'></i>" . __('Share', 'dahztheme') . "</span>";
            $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false, ''); ?>
            
                <ul class="df-hover-share-content">
                    <?php if ($df_enable_fb_blog == 1) { // facebook share ?>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(get_the_ID()); ?>" target="_blank"><i class="fa-facebook fa"></i></a></li>
                    <?php } ?>
                    <?php if ($df_enable_twit_blog == 1) { // twitter share ?>
                    <li><a href="http://twitter.com/share?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));?>&amp;url=<?php esc_url(the_permalink($post->ID)); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>   
                    <?php } ?>
                    <?php if ($df_enable_gp_blog == 1) { // google+ share ?>
                    <li><a href="https://plus.google.com/share?url=<?php esc_url(the_permalink($post->ID)); ?>" target="_blank"><i class="fa-google-plus fa"></i></a></li>
                    <?php } ?>
                    <?php if ($df_enable_pin_blog == 1) { // pinterest share ?>
                    <li><a href="https://pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink($post->ID)); ?>&amp;media=<?php echo $src[0]; ?>&amp;description=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" target="_blank"><i class="fa fa-pinterest "></i></a></li>
                    <?php } ?>

                    <?php if ($df_enable_instagram_blog == 1) { 

                    // _instagram_blog share ?>
                    <li><a href="<?php echo get_post_meta($post->ID, 'my_insta_url', true); ?>" target="_blank"><i class="fa fa-instagram "></i></a></li>
                    <?php } ?>

                    <?php if ($df_enable_email_blog == 1) { // email share ?>
                    <li><a href="mailto:?subject=<?php esc_url(the_permalink($post->ID)); ?>" target="_top"><i class="fa-envelope-o  fa"></i></a></li>
                    <?php } ?>
                    <?php if ($df_enable_su_blog == 1) { // stumbleupon share ?>
                    <li><a href="http://www.stumbleupon.com/submit?url=<?php esc_url(the_permalink($post->ID)); ?>" target='_blank'><i class="fa fa-stumbleupon"></i></a></li>
                    <?php } ?>
                    <?php if ($df_enable_rdt_blog == 1) { // reddit share ?>
                    <li><a href="http://reddit.com/submit?url=<?php esc_url(the_permalink($post->ID)); ?>&amp;title=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" target="_blank"><i class="fa fa-reddit"></i></a></li>
                    <?php } ?>
                    <?php if ($df_enable_ldn_blog == 1) { // linkedin share ?>
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink($post->ID)); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if ($df_enable_tmb_blog == 1) { // tumblr share ?>
                    <li><a href="http://tumblr.com/share?s=&amp;v=3&amp;t=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;u=<?php esc_url(the_permalink($post->ID)); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
<?php }
}
/* ----------------------------------------------------------------------------------- */
/* Related post single Blog                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_related_post')) :

    function df_single_blog_related_post() {
        global $post;
        $enable_ymal            = get_post_meta($post->ID, 'df_metabox_enable_ymal', true);
        $category_include_ymai  = get_post_meta($post->ID, 'df_metabox_select_category_include_ymai');
        $cat_count_inc_ymai     = count($category_include_ymai);
       
        $cat_inc = '';
        if ($cat_count_inc_ymai > 0) {
            foreach ($category_include_ymai as $catinc) {
                $temp_catinc[] = $catinc;
            }
            $cat_inc = implode(',', $temp_catinc);
        }

        if (isset($enable_ymal) && $enable_ymal != '0') {

            $tags = wp_get_post_tags($post->ID);
            
            if ($cat_count_inc_ymai > 0) {
                $args = array(
                            'post_type'         => 'post',
                            'post_status'       => 'publish',
                            'post__not_in'      => array($post->ID),
                            'category_name'     => $cat_inc,
                            'posts_per_page'    => -1 // Number of related posts to display.  
                        );
            } else {
                $args = array(
                            'post_type'         => 'post',
                            'post_status'       => 'publish',
                            'post__not_in'      => array($post->ID),
                            'posts_per_page'    => -1 // Number of related posts to display.  
                        );
            }
            $my_query = new wp_query($args); ?>
                <div  class="related-post">  
                    <h4 class="related-post-title"><?php _e('You May Also Like', 'dahztheme'); ?></h4>  
                    <div id="related-slider">
                    <?php while ($my_query->have_posts()) {
                            $my_query->the_post();
                            $image_before   = '<div class="df-port-image"><div class="view third-effect">';
                            $image_after    = '<div class="mask"><div class="mask-table"><div class="mask-table-cell">';
                            $image_closing  ='</div></div></div></div></div>'; ?>  
                            <div class="related-post-content">
                            <?php $image_pf = get_post_format();
                                if (has_post_thumbnail()) {
                                    echo $image_before;
                                    the_post_thumbnail('thumbnail-single-related');
                                    echo $image_after;
                                    switch ($image_pf) {
                                        case 'audio':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'gallery':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'image':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'video':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'quote':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'link':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'aside':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'status':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        case 'chat':
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            break;
                                        default:
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                    }
                                    echo $image_closing;
                                } else {
                                    $url_src = get_template_directory_uri() . '/includes/images/post-formats/big/';
                                    switch ($image_pf) {
                                        case 'audio':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'audio.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'gallery':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'gallery.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'image':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'image.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'video':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'video.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'quote':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'quote.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'link':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'link.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'aside':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'aside.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'chat':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'chat.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        case 'status':
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'status.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                            break;
                                        default:
                                            echo $image_before;
                                            echo '<img src="' . esc_url($url_src) . 'standard.jpg" class="attachment-thumbnail-single-related wp-post-image" alt="">';
                                            echo $image_after;
                                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="info"  rel=""></a>';
                                            echo $image_closing;
                                    }
                                }
                                ?>
                                <p><?php df_category_blog(); ?></p>
                                <h4 class="related-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php df_post_meta(); ?></p>
                            </div>  
                            <?php
                        }
                        echo "</div></div><div class='clear'></div>";
                    }
                    wp_reset_postdata();
            }
endif;

/* ----------------------------------------------------------------------------------- */
/* Content / Excerpt Conditional                                                       */
/* ----------------------------------------------------------------------------------- */
 
if (!function_exists('df_blog_content')) :
    function df_blog_content(){
        global $post;
        $more_link_text      = __( 'Continue reading', 'dahztheme' );
        
        if ( is_archive() ) {
            $df_homepage_layout = df_options( 'archive_author_layout' );
            $df_full_summary    = df_options( 'list_post_opt_arch' );
        } else {
            $df_homepage_layout = df_options( 'homepage_layout' );
            $df_full_summary    = df_options( 'list_post_opt' );
        }

        if ( is_search() ) {

            the_excerpt();

        } /* end if search template */
        else {

            if ($df_homepage_layout === 'list_post') {

                if ( $df_full_summary === 'opt_full' ) {

                    the_content( $more_link_text );

                } else if ( $df_full_summary === 'opt_summ' ) {

                    the_excerpt();

                }

            } /*end if $df_homepage_layout */
            else {

                the_excerpt();

            }/*end else if $df_homepage_layout */

        }

    }
endif;
/* ----------------------------------------------------------------------------------- */
/* Excerpt Read More                                                       */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_custom_excerpt_more')) :
    function df_custom_excerpt_more( $more ) {
        $df_enable_read_more = df_options('enable_read_more');

        $more_ex = '';
        if ($df_enable_read_more == '1') {
            $more_ex .= '<a href="'. esc_url(get_permalink()).'" class="df-link-excerpt">'; 
            $more_ex .= __('Continue reading', 'dahztheme'); 
            $more_ex .= '</a>'; 
        }

        return $more_ex;

    }
    add_filter( 'excerpt_more', 'df_custom_excerpt_more' );
endif;
/* ----------------------------------------------------------------------------------- */
/* Custom nextpage links                                                       */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_custom_nextpage_links')) :
    function df_custom_nextpage_links($defaults) {
        $args = array(
            'before'        => '<div class="my-paginated-posts"><ul><li>' . __('Pages : ', 'dahztheme').'</li>',
            'after'         => '</ul><div class="clear"></div></div>',
            'link_before'   => '<li>', 
            'link_after'    => '</li>',
        );
        $r = wp_parse_args($args, $defaults);
        return $r;
    }
    add_filter('wp_link_pages_args','df_custom_nextpage_links');
endif;
/* ----------------------------------------------------------------------------------- */
/* WPML Post Count                                                                     */
/* ----------------------------------------------------------------------------------- */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' )) {
    if (!function_exists('df_count_post')) :
    function df_count_post($language_code = '', $post_type = 'post', $post_status = 'publish'){
        global $sitepress, $wpdb;

        //get default language code
        $default_language_code = $sitepress->get_default_language();

        //adjust post type to format WPML uses
        switch($post_type){
                case 'page':
                        $post_type = 'post_page';
                break;
                case 'post':
                        $post_type = 'post_post';
                break;
        }

        //are we dealing with originals or translations?
        $slc_param = $sitepress->get_default_language() == $language_code ? "IS NULL" : "= '{$default_language_code}'";

        $query = "SELECT COUNT( {$wpdb->prefix}posts.ID )
                                FROM {$wpdb->prefix}posts
                                LEFT JOIN {$wpdb->prefix}icl_translations ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}icl_translations.element_id
                                WHERE {$wpdb->prefix}icl_translations.language_code = '{$language_code}'
                                AND {$wpdb->prefix}icl_translations.source_language_code $slc_param
                                AND {$wpdb->prefix}icl_translations.element_type = '{$post_type}'
                                AND {$wpdb->prefix}posts.post_status = '$post_status'";

        return $wpdb->get_var( $query );
    }
    endif;
}
    
/* ----------------------------------------------------------------------------------- */
/* Rating Hook                                                                     */
/* ----------------------------------------------------------------------------------- */
    add_action('wp_ajax_rate_this', 'df_rate_this');
    add_action('wp_ajax_nopriv_rate_this', 'df_rate_this');
    

    function df_rate_this(){
        
        
        if(isset($_POST['selected_rating'])){
                
                $ip = $_SERVER['REMOTE_ADDR'];
                $post_id = intval($_POST['post_id']);
                $selected_rating = floatval($_POST['selected_rating']);
                
                $meta_IP = get_post_meta($post_id, "voted_IP");
                $voted_IP = $meta_IP;
                
                if(!is_array($voted_IP))
                        $voted_IP = array();
                
                if(!in_array($ip, $voted_IP)){
                  
                    $rating_count = get_post_meta($post_id, "rating_counter", true);
                    if(empty($rating_count)) { $rating_count = 0; }
                    
                    $rating_array_holder = get_post_meta($post_id, "rating_array");             
                    
                    if(!empty($rating_array_holder) && is_array($rating_array_holder[0]))
                    {                   
                            $rating_array = $rating_array_holder[0];
                            $rating_array[] = $selected_rating;
                    }
                    else
                    {
                            $rating_array = array($selected_rating);
                    }                               
                    
                    if(update_post_meta($post_id,"rating_array", $rating_array ) )
                    {
                            $voted_IP[] = $ip;
                            $rating_count++;
                            update_post_meta($post_id,'voted_IP', $voted_IP);
                            update_post_meta($post_id,'rating_counter', $rating_count);
                            
                            _e('Thank you for rating!', 'dahztheme');
                    }
                    else
                    {
                            _e('Failed', 'dahztheme');
                    }
                 }
                 else
                 {
                        _e('Already Voted!', 'dahztheme');
                 }
        }
        else
        {
                _e('No Rating Found!', 'dahztheme');
        }               
        die;
    }

// Already Voted Or Not
/*-----------------------------------------------------------------------------------*/ 
function df_already_voted($post_id)
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $meta_IP = get_post_meta(intval($post_id), "voted_IP");             
                    
    if(!empty($meta_IP) && is_array($meta_IP[0]))
    {                   
            $voted_IP = $meta_IP[0];
            return in_array($ip, $voted_IP);
    }
        
    return false;   
}
    

// Get Vote Count
/*-----------------------------------------------------------------------------------*/ 
function df_get_vote_count($post_id)
{
    $meta_IP = get_post_meta(intval($post_id), "voted_IP");             
                    
    if(!empty($meta_IP) && is_array($meta_IP[0]))
    {                   
            $voted_IP = $meta_IP[0];
            return count($voted_IP);
    }
        
    return 0;   
}

// Get Average Rating
/*-----------------------------------------------------------------------------------*/ 
function df_get_avg_rating($post_id)
{
    $rating_array_holder = get_post_meta(intval($post_id), "rating_array");             
                    
    if(!empty($rating_array_holder) && is_array($rating_array_holder[0]))
    {                   
            $rating_array = $rating_array_holder[0];
            $rating_length = count($rating_array);
            $rate_total = array_sum($rating_array);
            return round($rate_total/$rating_length,1);
    }
    
    return 0;
    
}

/*-----------------------------------------------------------------------------------*/
// Rating Call Function

    function df_the_blog_rating($post_id){
            $rate_avg = df_get_avg_rating($post_id);
            $rt = 10.0;
            $rv = 5.0;
            echo '<fieldset class="df-rating-avg">';
            while($rt >= 1){
                $rv = $rv - 0.5;
                if ($rv < df_get_avg_rating($post_id) ) {
                    $checked = 'checked';
                }
                else {
                    $checked = ' ';
                }
                if ($rt % 2 == 0) {
                    echo '<input type="radio" '.$checked.' readonly/><label class="full '.$rt.'"></label>';
                }else{
                    echo '<input type="radio" '.$checked.' readonly/><label class="half '.$rt.'"></label>';
                }
                    $rt--;
            }
            echo '</fieldset>';
        
    }

/* ----------------------------------------------------------------------------------- */
/* Rating                                                                              */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_global_rating')) :
    function df_global_rating(){
        global $post;
        $enable_rating_reviews = get_post_meta($post->ID, 'df_metabox_review_checkbox', true);

        if (isset($enable_rating_reviews) && $enable_rating_reviews != '0'){
                        ?>
                <div class="rate-box" itemscope itemtype="http://schema.org/Review">                                                                                                                          
                         <ul class="rate-right" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Rating">
                            <li>
                                <p class="avg_rating"><?php echo df_get_avg_rating($post->ID); ?></p>
                                <p class="avg_title"><?php _e('Overall Score', 'dahztheme'); ?></p>
                                    <?php df_the_blog_rating($post->ID); ?>
                                     
                                    <meta itemprop="ratingValue" content="<?php echo df_get_avg_rating($post->ID); ?>" />
                                    <meta itemprop="bestRating" content="5" />
                                    <meta itemprop="worstRating" content="0" />
                                    <meta content="<?php echo df_get_vote_count($post->ID); ?>" />                                                                              
                            </li>
                        </ul>

                        <ul class="rate-left">
                            <li><p class="status"><?php _e('Reader Rating: ', 'dahztheme'); ?><span><?php echo df_get_vote_count($post->ID); ?> <?php _e('Votes', 'dahztheme'); ?></span></p></li>
                            <?php
                                if(!df_already_voted($post->ID))
                                {
                                    ?>
                                    <li><form action="<?php echo site_url(); ?>/wp-admin/admin-ajax.php" method="post" id="rate-product">
                                     <fieldset class="df-rating-star">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="0.5 stars"></label>
                                        <input type="hidden" name="selected_rating" id="selected_rating" value="" />
                                        <input type="hidden" name="post_id" value="<?php echo $post->ID ?>" />
                                        <input type="hidden" name="action" value="rate_this" />
                                    </fieldset>
                                    </form></li>
                                    <?php
                                } 
                                else 
                                {
                                    echo '<li class="already-voted"> <p>'. __('You have already rated', 'dahztheme') .'</p></li>';
                                }
                            ?>
                            <li class="output-rating"><p id="output" ></p></li>
                        </ul>
                </div><!-- end of rate-box div -->
                <div class="clear"></div>
                    <?php
        } 
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Author Social Links                                                                 */
/* ----------------------------------------------------------------------------------- */
function df_contactmethods( $contactmethods ) {

    $contactmethods['twitter']   = 'Twitter Username';
    $contactmethods['facebook']  = 'Facebook Username';
    $contactmethods['google']    = 'Google Plus Username';
    $contactmethods['tumblr']    = 'Tumblr Username';
    $contactmethods['instagram'] = 'Instagram Username';
    $contactmethods['pinterest'] = 'Pinterest Username';
    $contactmethods['bloglovin'] = 'Bloglovin Username';

    return $contactmethods;
}
add_filter('user_contactmethods','df_contactmethods',10,1);

/* ----------------------------------------------------------------------------------- */
/* Print                                                                               */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_global_prints')) :
    function df_global_prints(){
         global $post;
         $df_enable_print_blog      = df_options('enable_print_blog');

         if ($df_enable_print_blog != '0') { 
            echo "<a href='javascript:window.print()' class='custom_print' title='Print'><i class='fa-print fa'></i> ".__('Print','dahztheme')." </a>";
        } 

    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Editor's Pick                                                                       */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('editor_pick_tag')) :
    function editor_pick_tag(){
        global $post;
        $ep_enable = df_options('enable_editor_pick');
        $ep_cat = df_options ('editor_pick_cat');
        $ep_enable_cat = df_options('enable_pick_cat_slider');
        // $ep_num = df_options ('editor_pick_num');

            query_posts( array( 'category_name' =>  $ep_cat,  'post_type' => 'post','posts_per_page' => -1)  );
            
            ?>
            <div class="editor-pick_container">
                <div class="overlay_bg_ep">
                    <div id="editor-pick_slider" class="owl-carousel">
                        <?php
                            if ( have_posts() ) { $count = 0;
                                while ( have_posts () )  { the_post(); $count++; $title = get_the_title ();?>

                                    <div class="editor-pick_content item">
                                    <?php
                                        if ( !has_post_thumbnail() ) {
                                            $image_nav = get_post_format();
                                            $url_src = esc_url(get_template_directory_uri() . '/includes/images/post-formats/big/');

                                            switch ($image_nav) {
                                                case 'audio':
                                                    echo '<img src="' . $url_src . 'audio.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                case 'gallery':
                                                    echo '<img src="' . $url_src . 'gallery.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                case 'image':
                                                    echo '<img src="' . $url_src . 'image.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                case 'video':
                                                    echo '<img src="' . $url_src . 'video.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                case 'quote':
                                                    echo '<img src="' . $url_src . 'quote.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                case 'link':
                                                    echo '<img src="' . $url_src . 'link.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                case 'status':
                                                    echo '<img src="' . $url_src . 'standard.jpg" class="wp-post-image" alt="">';
                                                    break;
                                                default:
                                                    echo '<img src="' . $url_src . 'standard.jpg" class="wp-post-image" alt="">';
                                            }
                                        }
                                        else {
                                             the_post_thumbnail('thumbnail-editor-pick');
                                        }
                                    ?>
                                                <div class="blog-item-description">
                                                    <?php if ($ep_enable_cat != '0') : ?>
                                                        <p class="editor-pick-cat"><?php df_category_blog(); ?></p>
                                                    <?php endif; ?>
                                                        <h4 class="related-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                                         <!-- <p><?php df_post_meta(); ?></p> -->
                                                     <div class="blog-list-item-excerpt"><p> </p> </div>
                                                </div>
                                    </div>
                            <?php    

                                } // End WHILE Loop

                            } 
                            else {

                                df_get_template('content', 'none');
                            
                            } // End IF Statement
                                
                             wp_reset_query();    

                            ?>  

                    </div> <!--/#editor_pick-->
                </div>   <!--overlay_bg_ep-->
             </div> <!--/.swiper-container-editor-pic -->
        
        <?php 
        
        
    } // End IF Statement editor_pick_tag
endif;