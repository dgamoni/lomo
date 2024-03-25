<?php
if (!defined('ABSPATH')) exit;

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/TYPOGRAPH-SECTION-OUTPUT.PHP
 *
 * - Customizer Typograph Options CSS Output
  ================================================================================= */

// Customizer Typograph Options CSS Output
// =============================================================================
$df_custom_fonts                      = df_options( 'custom_fonts' );
$df_logo_font_family                  = df_options( 'logo_font_family' );
$df_logo_font_weight_and_style        = ( df_options( 'logo_font_weight' ) == '' ) ? '400' :df_options( 'logo_font_weight' );
$df_logo_font_weight                  = ( strpos( $df_logo_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $df_logo_font_weight_and_style ) : $df_logo_font_weight_and_style;
$df_logo_font_color                   = df_options( 'logo_font_color' );
$df_logo_font_size                    = df_options( 'logo_font_size' );
$df_navbar_font_family                = df_options( 'navbar_font_family' );
$df_navbar_font_weight_and_style      = ( df_options( 'navbar_font_weight' ) == '' ) ? '400' :df_options( 'navbar_font_weight' );
$df_navbar_font_weight                = ( strpos( $df_navbar_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $df_navbar_font_weight_and_style ) : $df_navbar_font_weight_and_style;
$df_navbar_font_size                  = df_options( 'navbar_font_size' );
$df_navbar_link_color                 = df_options( 'navbar_link_color' );
$df_navbar_link_color_hover           = df_options( 'navbar_link_color_hover' );
$df_navbar_link_text_transform        = df_options( 'navbar_link_transform' );
$df_navbar_text_align                 = df_options( 'navbar_link_align' );
$df_navbar_letter_space               = df_options( 'navbar_letter_space' );
$df_navbar_padding                    = df_options( 'navbar_main_padding' );
$df_navbar_submenu_min_width          = df_options( 'navbar_submenu_min_widht' );
$df_navbar_submenu_padding            = df_options( 'navbar_submenu_padding' );
$df_topbar_font_family                = df_options( 'topbar_font_family' );
$df_topbar_text_color                 = df_options( 'topbar_text_color' );
$df_topbar_font_size                  = df_options( 'topbar_font_size' );
$df_topbar_font_weight                = df_options( 'topbar_font_weight' );
$df_topbar_link_transform             = df_options( 'topbar_link_transform' );
$df_body_font_family                  = df_options( 'body_font_family' );
$df_body_font_weight_and_style        = ( df_options( 'body_font_weight' ) == '' ) ? '400' :df_options( 'body_font_weight' );
$df_body_font_weight                  = ( strpos( $df_body_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $df_body_font_weight_and_style ) : $df_body_font_weight_and_style;
$df_body_font_color                   = df_options( 'body_font_color' );
$df_body_font_size                    = df_options( 'body_font_size' );
$df_site_links_color                  = df_options( 'site_links_color' );
$df_site_links_hover_color            = df_options( 'site_links_hover_color' );
$df_content_font_size                 = df_options( 'content_font_size' );
$df_headings_font_family              = df_options( 'headings_font_family' );
$df_headings_font_weight_and_style    = ( df_options( 'headings_font_weight' ) == '' ) ? '400' :df_options( 'headings_font_weight' );
$df_headings_font_weight              = ( strpos( $df_headings_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $df_headings_font_weight_and_style ) : $df_headings_font_weight_and_style;
$df_headings_font_color               = df_options( 'headings_font_color' );
$df_headings_letter_spacing           = df_options( 'headings_letter_spacing' );
$df_rating_rgba                       = df_convert_rgba( $df_site_links_color, 40 );
$df_editor_pick                       = df_options('enable_editor_pick'); ?>


<?php if ($df_custom_fonts == 1) : ?>

    /*============================================================
                           Logo Font Family
    =============================================================*/
    .df-sitename { 
        font-family: "<?php echo $df_logo_font_family; ?>", serif; 
    }

    /*============================================================
                          Navbar Font Family
    =============================================================*/
    .main-navigation a, .main-navigation ul ul a, .df-navi li a { 
        font-family: "<?php echo $df_navbar_font_family; ?>", serif; 
    }

    /*============================================================
                       General Text Font Family
    =============================================================*/
    body, input[type], a.button, .df-infi-scr-btn .nav-next a, select, textarea, .button, button { 
        font-family: "<?php echo $df_body_font_family; ?>", serif; 
    }

    /*============================================================
                       Headings Text Font Family
    =============================================================*/
    h1, h2, h3, h4, h5, h6, .universe-search .universe-search-form .universe-search-input,
    .comments-area .comment-content .comment-head a, .comments-area .comment-content .comment-head .name, .comments-area .comment-content .comment-head { 
        font-family: "<?php echo $df_headings_font_family; ?>", serif; 
    }

<?php endif; ?>

/*============================================================
                      Logo Font Style
=============================================================*/
.df-sitename {
    font-size: <?php echo $df_logo_font_size; ?>;
    font-weight: <?php echo $df_logo_font_weight; ?>;
    <?php if (strpos($df_logo_font_weight_and_style, 'italic')) : ?>
        font-style: italic;
    <?php endif; ?>
}

a.df-sitename,a.df-sitename:hover{
    color: <?php echo $df_logo_font_color; ?>;
}

/*============================================================
                      Navbar Font Style
=============================================================*/
.df-navi li a {
    text-align: <?php echo $df_navbar_text_align; ?>;
    font-weight: <?php echo $df_navbar_font_weight; ?>;
    <?php if (strpos($df_navbar_font_weight_and_style, 'italic')) : ?>
        font-style: italic;
    <?php endif; ?>
}

.main-navigation a, .main-navigation ul ul a {
    font-size: <?php echo $df_navbar_font_size; ?>;
}

.df-sitename, .df-navi li a, .top-search, df-mobile-menu-button-close {
    color: <?php echo $df_navbar_link_color; ?>; 
}

.mobile-menu-button:before, .mobile-menu-button:after, .mobile-menu-button {
    background-color: <?php echo $df_navbar_link_color; ?>; 
}

.df-sitename:hover, .df-navi li a:hover, .top-search:hover, df-mobile-menu-button-close:hover { 
    color: <?php echo $df_navbar_link_color_hover; ?>; 
}
.main-navigation .df-mega-menu > .sub-nav > li.has-children:not(.new-column) > a:after{
    border-color: <?php echo $df_navbar_link_color_hover; ?>; 
}
.df-mobile-menu-button-container:hover {
    background-color: <?php echo $df_navbar_link_color_hover; ?>; 
}

.df-navi li a{
    text-transform: <?php echo $df_navbar_link_text_transform; ?>;
    letter-spacing: <?php echo $df_navbar_letter_space; ?>;
}

.main-navigation a,.df-navibar-classic-left .site-module, .df-navibar-classic-right .site-module{
    padding:<?php echo $df_navbar_padding; ?>;
}

.main-navigation ul ul a {
    padding:<?php echo $df_navbar_submenu_padding; ?>;
    min-width:<?php echo $df_navbar_submenu_min_width; ?>;
}



/*============================================================
                    Topbar Font Style
=============================================================*/
.df-topbar .info-description a, .df-topbar .df-social a, .df-topbar li a, .df-topbar .df-social-skin2 a {
    text-transform: <?php echo $df_topbar_link_transform; ?>;
}
.df-topbar .info-description, .df-topbar .df-social a, .df-topbar li a, .df-topbar .df-social-skin2 a {
    color:<?php echo $df_topbar_text_color; ?>;
    font-family: "<?php echo $df_topbar_font_family; ?>", serif; 
    font-weight: <?php echo $df_topbar_font_weight; ?>; 
    font-size: <?php echo $df_topbar_font_size; ?>; 
}


/*=====================================================================
                    General Font Style
=====================================================================*/
#content-wrap, .df-link i, .df-link span, .df-postmeta span, .df-postmeta a, .navigation .nav-links a,
.df-pagination-number ul.page-numbers li a, .df-pagination-number ul.page-numbers li span,
.df-blog-extra ul.df-hover-share-content a, .widget li time, .widget li time, #options-blog-sort li a,
.widget_dahz_recent_entries .recententries .post-comments a,
.widget_dahz_popular_entries .popularentries .popular-section .author a, 
.widget_dahz_popular_entries .popularentries .popular-section .author,
.widget a, .widget li a, .widget i, .single .format-status .df-postmeta span, .single .format-status .df-postmeta a,
input[type], a.button, .button, .df-infi-scr-btn .nav-next a, select, textarea {
    color: <?php echo $df_body_font_color; ?>;
    font-weight: <?php echo $df_body_font_weight; ?>;
    <?php if (strpos($df_body_font_weight_and_style, 'italic')) : ?>
        font-style: italic;
    <?php endif; ?>
}

/*=====================================================================
                   Headings Text Font Color
=====================================================================*/
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .widget li a.post-title,
.universe-search .universe-search-form .universe-search-input, .comments-area .comment-content .comment-head,
.comments-area .comment-content .comment-head .name {
    color: <?php echo $df_headings_font_color; ?>;
    font-weight: <?php echo $df_headings_font_weight; ?>;
    <?php if (strpos($df_headings_font_weight_and_style, 'italic')) : ?>
        font-style: italic;
    <?php endif; ?>
    letter-spacing: <?php echo $df_headings_letter_spacing; ?>;
}

/*=====================================================================
                     Body Font Size
=====================================================================*/
body, input[type], .button, a.button, .df-infi-scr-btn .nav-next a, select, textarea { 
    font-size: <?php echo $df_body_font_size ?>; 
}

/*=====================================================================
                     Content Font Size
=====================================================================*/
article { 
    font-size: <?php echo $df_content_font_size ?>; 
}

/*============================================================
                 Site Links Color 
=============================================================*/
a, #wp-calendar tbody td a {
    color: <?php echo $df_site_links_color ?>;
}

/*============================================================
                Site Link Hover Color
=============================================================*/
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, 
a:hover, .widget a:hover, .widget li a:hover, .widget i.fa:hover, .df-hover-share-container:hover, 
.df-hover-share-container:hover .df-link i, .df-blog-extra ul.df-hover-share-content a:hover, .df-postmeta a:hover,
.df-blog-extra .df-like:hover i, .df-blog-extra .df-like:hover span, .df-topbar a:hover,
.df-pagination-number ul.page-numbers li a:hover, .df-pagination-number ul.page-numbers li span.current, .navigation .nav-links a:hover,
.widget_tag_cloud .tagcloud a:hover, .archive-post-tags.tagcloud a:hover, .widget li a.post-title:hover, .widget li a:hover time,
#options-blog-sort li a:hover, .widget_dahz_recent_entries .recententries .post-comments a:hover,
.widget_dahz_popular_entries .popularentries .popular-section .author a:hover, .single .format-status .df-postmeta a:hover,
.format-link h2.df-postformat-link-img a:hover, .comments-area .comment-content .comment-head a:hover {
    color:<?php echo $df_site_links_hover_color ?>;
}
.widget_tag_cloud .tagcloud a:hover {
    border-color:<?php echo $df_site_links_hover_color ?>;   
}
.df-blog-extra ul.df-hover-share-content li i:hover {
    box-shadow: inset 0 0 0 1px <?php echo $df_site_links_hover_color ?>;
}

<?php if (class_exists('df_Shortcodes')) : ?>
    /*============================================================
                   Site Link Hover Color
    =============================================================*/
    .tabs-shortcode h4:hover, .tabs-shortcode h4:hover {
        color:<?php echo $df_site_links_hover_color ?>;
    }
    .tabs-shortcode.resp-vtabs li.resp-tab-active:after, 
    .shorcode-blog-banner .featured-image-sc-post .df-post-title:after, 
    body .tabs-shortcode .resp-tabs-list li.resp-tab-active {
        border-color: <?php echo $df_site_links_hover_color ?>;
    }
<?php endif; ?>


<?php if ($df_editor_pick == '1') : // editor pick ?>
  
    /*============================================================
                   Site Link Hover Color
    =============================================================*/
    .editor-pick_container .owl-item .editor-pick_content h4 a:hover
    { color:<?php echo $df_site_links_hover_color ?>; }

<?php endif; ?>

/*============================================================
                Site Link Hover Color
=============================================================*/
.df-standard-image-big-skny.format-standard .entry-header a:hover,
.df-standard-image-big-skny.format-standard .entry-summary a:hover,
.df-standard-image-big-skny.format-standard .df-hover-share-container:hover,
.df-standard-image-big-skny.format-standard .df-hover-share-container i:hover,
.df-standard-image-big-skny.format-standard .df-link:hover i, 
.df-standard-image-big-skny.format-standard .df-link:hover span,
.df-standard-image-big-skny.format-standard .df-postmeta span:hover {
    color:<?php echo $df_site_links_hover_color ?>;
}

<?php if (is_single()) : ?>
    .single .single-share-blog, .single-share-blog i.fa,
    .single-share-blog ul .custom_print,
    .related-post .owl-theme .owl-controls .owl-nav div,
    .rate-left {
        color: <?php echo $df_body_font_color; ?>;
    }

 
    /*============================================================
                     Site Links Color 
    =============================================================*/
    .single .post-pagination .navi-next a i, .single .post-pagination .navi-prev a i,
    .df-rating-avg>input:checked~label, .df-rating-star>input:checked~label, .df-rating-star:not(:checked)>label:hover, .df-rating-star:not(:checked)>label:hover~label, 
    .df-rating-star > input:checked + label:hover, .df-rating-star > input:checked ~ label:hover, .df-rating-star > label:hover ~ input:checked ~ label, .df-rating-star > input:checked ~ label:hover ~ label,
    .rate-left .status span, .rate-right .avg_rating
    {
        color: <?php echo $df_site_links_color ?>;
    }

    /*============================================================
                    Site Link Hover Color
    =============================================================*/
    .single .single-tag-blog a:hover, .single-share-blog ul .custom_print:hover,
    .single .single-share-blog i.fa:hover, .df-link span:hover,
    .single .post-pagination .navi-next:hover .title-link-nav-single-post a, 
    .single .post-pagination .navi-next:hover i, 
    .single .post-pagination .navi-prev:hover .title-link-nav-single-post a, 
    .single .post-pagination .navi-prev:hover i,
    .related-post .owl-theme .owl-controls .owl-nav div:hover {
        color:<?php echo $df_site_links_hover_color ?>;
    }
    .single .single-tag-blog a:hover {
        border-color:<?php echo $df_site_links_hover_color ?>;
    }

    /*============================================================
                    Rating Color
    =============================================================*/
    .rate-box .ex-rates span.off.fa-star:before, .rate-box .rates span.off.fa-star:before {
        color: <?php echo $df_rating_rgba; ?>;
    }

<?php endif; ?>

<?php if (is_archive()) : ?>
    /*============================================================
                     Site Links Color 
    =============================================================*/
    .single-share-blog i.fa {
        color: <?php echo $df_body_font_color; ?>;
    }
    /*============================================================
                    Site Link Hover Color
    =============================================================*/
    .single-share-blog i.fa:hover {
        color:<?php echo $df_site_links_hover_color ?>;
    }
<?php endif; ?>