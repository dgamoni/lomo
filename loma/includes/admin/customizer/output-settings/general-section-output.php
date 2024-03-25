<?php
if (!defined('ABSPATH')) exit;

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/GENERAL-SECTION-OUTPUT.PHP
 *
 * - Customizer General Options CSS Output
 *    1. Site Layout
 *    2. Content Width
 *    3. Background Color, Background Opacity, Background Image in Outer Area
 *    4. Content Background Color, Content Background Opacity, Content Background Image in Content Area
 *    5. Border Color
 *    6. Mask Layout Opacity
  ================================================================================= */

// Customizer General Options CSS Output
// =============================================================================
$df_skin                      = df_options( 'theme_skin' );
$df_layout_site               = df_options( 'layout_site' );
$df_site_max_width            = ( df_options( 'site_max_width' ) == '' ) ? '1200' : df_options( 'site_max_width' );
$df_site_width                = ( df_options( 'site_width' ) == '' ) ? '98' : df_options( 'site_width' );
$df_content_width             = ( df_options( 'content_width' ) == '' ) ? '73' : df_options( 'content_width' );

// Background Layout
$df_bg_color                  = df_options( 'bg_color' );
$df_bg_layout_opacity         = df_options( 'bg_layout_opacity' );
$df_bg_layout_rgba            = df_convert_rgba( $df_bg_color, $df_bg_layout_opacity );
$df_bg_image_layout           = df_options( 'bg_image_layout');
$df_bg_layout_att             = df_options('bg_image_att');
$df_bg_layout_size            = df_options('bg_image_size');
$df_bg_layout_repeat_options  = df_options('bg_image_pos-x') .' '. df_options('bg_image_pos-y') .' '. df_options('bg_image_repeat');

// Background Content
$df_bg_content_color          = df_options( 'bg_content_color' );
$df_bg_content_opacity        = df_options( 'bg_content_opacity' );
$df_bg_content_rgba           = df_convert_rgba( $df_bg_content_color, $df_bg_content_opacity );
$df_bg_image_content          = df_options( 'bg_image_content');
$df_bg_image_att              = df_options( 'bg_image_att_content');
$df_bg_image_size             = df_options( 'bg_image_content_size');
$df_bg_repeat_options         = df_options('bg_image_content_pos-x') .' '. df_options('bg_image_content_pos-y') .' '. df_options('bg_image_content_repeat');
// Border & Mask color
$df_border_color              = df_options( 'border_color');
$df_mask_overlay_color        = df_options( 'mask_overlay_color' );
$df_mask_overlay_font_color   = df_options( 'mask_overlay_font_color' );
$df_opacity_mask_color        = df_options( 'opacity_mask_color' );
$df_mask_layout_rgba          = df_convert_rgba( $df_mask_overlay_color, $df_opacity_mask_color );
$df_focus_area                = df_convert_rgba( $df_border_color, 20 );
$df_site_links_hover_color    = df_options( 'site_links_hover_color' );
$df_editor_pick               = df_options('enable_editor_pick'); ?>

/*============================================================
  Site Layout
=============================================================*/
.df_container-fluid {
    max-width:<?php echo $df_site_max_width . 'px'; ?>;
    width:<?php echo $df_site_width . '%'; ?>;}
<?php if ($df_layout_site == 'boxed') : ?>
    .df-boxed-layout-active #wrapper,.df-navibar.df_container-fluid{
        max-width: <?php echo $df_site_max_width . 'px'; ?>;
        width: <?php echo $df_site_width . '%'; ?>;}
<?php endif; ?>

<?php if ($df_layout_site == 'frame') : ?>
    .df-frame-boxed-layout-active #wrapper,.df-navibar.df_container-fluid{
        max-width: <?php echo $df_site_max_width . 'px'; ?>;
        width: <?php echo $df_site_width . '%'; ?>;
        margin: 40px auto;}
<?php endif; ?>

/*============================================================
  Content Width
=============================================================*/
.two-col-left #main-sidebar-container .df-main,.two-col-right #main-sidebar-container .df-main{
    width:<?php echo $df_content_width + 0.8119  . '%'; ?>;}
.two-col-left #main-sidebar-container .df-sidebar,.two-col-right #main-sidebar-container .df-sidebar{
    width:<?php echo 100 - 3.389830508474576 - $df_content_width . '%'; ?>;}


/*==========================================================================================
  Custome skin
==========================================================================================*/
<?php if ( $df_skin == 'skin1' || $df_skin == 'skin2' ) : ?>

  /*==========================================================================================
    Background Color, Background Opacity, Background Image in Outer Area
  ==========================================================================================*/
  body{ 
  background:<?php echo $df_bg_layout_rgba; ?> url(<?php echo $df_bg_image_layout; ?>) <?php echo $df_bg_layout_repeat_options; ?>; 
  background-attachment: <?php echo $df_bg_layout_att; ?>;
  background-size: <?php echo $df_bg_layout_size; ?>;
  }

  /*==========================================================================================
    Content Background Color, Content Background Opacity, Content Background Image in Content Area
  ==========================================================================================*/
  #wrapper, .df-blog-extra .df-share-content-active ul.df-hover-share-content{ 
  background:<?php echo $df_bg_content_rgba; ?> url(<?php echo $df_bg_image_content; ?>) <?php echo $df_bg_repeat_options; ?>; 
  background-attachment: <?php echo $df_bg_image_att; ?>;
  background-size: <?php echo $df_bg_image_size; ?>;
  }

<?php elseif ( $df_skin == 'skin3' ) : ?>
  
  /*==========================================================================================
    Background Color, Background Opacity, Background Image in Outer Area
  ==========================================================================================*/
  body, #wrapper { 
  background:<?php echo $df_bg_layout_rgba; ?> url(<?php echo $df_bg_image_layout; ?>) <?php echo $df_bg_layout_repeat_options; ?>; 
  background-attachment: <?php echo $df_bg_layout_att; ?>;
  background-size: <?php echo $df_bg_layout_size; ?>;
  }

  /*==========================================================================================
    Content Background Color, Content Background Opacity, Content Background Image in Content Area
  ==========================================================================================*/
  .blog .df-post-content, .archive .df-post-content, article.page .entry-content, .about-author, .format-gallery .df-gallery-grid,
  .format-audio .df-post-audio, .format-video .df-post-video, .single .format-aside .df-category-content-post,
  .single .entry-header, .single .entry-content, .single .single-tag-blog, .single .single-share-blog,
  .single .about-author, .single .post-pagination, .single .related-post, .widget, #comments,
  .df-blog-extra .df-share-content-active ul.df-hover-share-content, .df-template-archive {
    background:<?php echo $df_bg_content_rgba; ?> url(<?php echo $df_bg_image_content; ?>) <?php echo $df_bg_repeat_options; ?>; 
    background-size: <?php echo $df_bg_image_size; ?>;
    background-attachment: <?php echo $df_bg_image_att; ?>;
  }

  <?php if ( is_search() ) : ?>
    .search .df-post-content {
        background:<?php echo $df_bg_content_rgba; ?> url(<?php echo $df_bg_image_content; ?>) <?php echo $df_bg_repeat_options; ?>; 
        background-size: <?php echo $df_bg_image_size; ?>;
        background-attachment: <?php echo $df_bg_image_att; ?>;
    }
  <?php endif; ?>
  
<?php elseif ( $df_skin == 'skin4' ) : ?>

  /*==========================================================================================
    Background Color, Background Opacity, Background Image in Outer Area
  ==========================================================================================*/
  body, #wrapper { 
  background:<?php echo $df_bg_layout_rgba; ?> url(<?php echo $df_bg_image_layout; ?>) <?php echo $df_bg_layout_repeat_options; ?>; 
  background-attachment: <?php echo $df_bg_layout_att; ?>;
  background-size: <?php echo $df_bg_layout_size; ?>;
  }

  /*==========================================================================================
    Content Background Color, Content Background Opacity, Content Background Image in Content Area
  ==========================================================================================*/
  .blog .df-post-content, .archive .df-post-content, article.page .entry-content, .about-author, .format-gallery .df-gallery-grid,
  .format-audio .df-post-audio, .format-video .df-post-video, .single .format-aside .df-category-content-post,
  .single .entry-header, .single .entry-content, .single .single-tag-blog, .single .single-share-blog,
  .single .about-author, .single .post-pagination, .single .related-post, .widget h3, #comments,
  .df-blog-extra .df-share-content-active ul.df-hover-share-content, .df-template-archive {
    background:<?php echo $df_bg_content_rgba; ?> url(<?php echo $df_bg_image_content; ?>) <?php echo $df_bg_repeat_options; ?>;  
    background-attachment: <?php echo $df_bg_image_att; ?>;
    background-size: <?php echo $df_bg_image_size; ?>;
  }

  <?php if ( is_search() ) : ?>
    .search .df-post-content {
        background:<?php echo $df_bg_content_rgba; ?> url(<?php echo $df_bg_image_content; ?>) <?php echo $df_bg_repeat_options; ?>; 
        background-size: <?php echo $df_bg_image_size; ?>;
        background-attachment: <?php echo $df_bg_image_att; ?>;
    }
  <?php endif; ?>

  /*============================================================
    Border Color
  =============================================================*/
  .widget h3
  {border-color: <?php echo $df_border_color; ?>; }

<?php endif; ?>

/*============================================================
  Border Color
=============================================================*/
.post, .widget li,.template-archive-list li, #options-blog-sort li, #options-blog-sort li:first-child, .df-sidebar, 
input[type], select, textarea, .widget_tag_cloud .tagcloud a, .archive-post-tags.tagcloud a,
.df-postmeta .post-format, .df-postmeta .posted-on, .df-postmeta .comment,
.df-blog-extra ul.df-hover-share-content, .df-blog-extra ul.df-hover-share-content i,
.df-pagination-number ul.page-numbers li a, .df-pagination-number ul.page-numbers li span,
.conteiner-select-box:before, .universe-search-input,
.format-aside .entry-content, .format-aside .aside-post-formats, .widget .post, .widget .recententries,
.widget .recententries .post-date, .widget .popularentries, .widget .recentcomments, .widget span.entry-date, 
.widget .author, .widget .comments-link, .df-page-header, .container-select-box:before, .single .widget_dahz_post_formats .post,
.widget.widget_dahz_search .df-search_main input, .universe-search .universe-search-form .universe-search-input
{border-color: <?php echo $df_border_color; ?>; }

<?php if (class_exists('df_Shortcodes')) : ?>
  /*============================================================
  Shortcode Border Color
  =============================================================*/
  .df_accordion .resp-accordion, ul.resp-tabs-list
  {border-color: <?php echo $df_border_color; ?> !important;}
<?php endif; ?>

<?php if(is_rtl()) : ?>
    /*============================================================
      Border Color
    =============================================================*/
    .arrow-up{
        border-color: transparent transparent transparent <?php echo $df_border_color; ?>; 
    }
<?php else : ?>
    /*============================================================
      Border Color
    =============================================================*/
    .arrow-up{
        border-color: transparent <?php echo $df_border_color; ?> transparent transparent; 
    }
<?php endif; ?>

/*============================================================
  Box Shadow Focus Area
=============================================================*/
input[type]:focus, textarea:focus {
    border-color: <?php echo $df_border_color; ?>;
    box-shadow: 0 0 3px <?php echo $df_focus_area; ?>; 
    -webkit-box-shadow: 0 0 3px <?php echo $df_focus_area; ?>; 
    -moz-box-shadow: 0 0 3px <?php echo $df_focus_area; ?>; 
}

<?php if (is_single()) : ?>
    .single .single-tag-blog .df-link a, .single .about-author, .related-post,
    .rate-box, .comments-area, .single .format-aside .entry-content p {
        border-color: <?php echo $df_border_color; ?>;
    }
<?php endif; ?>

/*============================================================
                 Mask Overlay Color
=============================================================*/
.single .third-effect .mask, .single .third-effect:hover .mask,
body .related-post .third-effect .mask, body .related-post .third-effect:hover .mask,
.format-status .overlay_bg_image, .post.format-link .overlay_bg_image
{ background-color: <?php echo $df_mask_layout_rgba; ?>; }

/*============================================================
                 Mask Overlay Font Color
=============================================================*/
.format-status .df-status-format p, .format-status .df-status-format blockquote, 
.format-status .df-postmeta span, .format-status .df-postmeta a,
.format-link h2.df-postformat-link-img a, .single .third-effect a.info
{ color: <?php echo $df_mask_overlay_font_color; ?>; }


<?php if ($df_editor_pick == '1') : // editor pick ?>
  
  /*============================================================
                   Mask Overlay Color
  =============================================================*/
  .editor-pick_container .blog-item-description
  { background-color: <?php echo $df_mask_layout_rgba; ?>; }

  /*============================================================
                   Mask Overlay Font Color
  =============================================================*/
  .editor-pick_container .owl-item .editor-pick_content h4 a,
  .editor-pick-cat .df-category-content-post a
  { color: <?php echo $df_mask_overlay_font_color; ?>; }

  /*============================================================
                   Site Link Hover Color
  =============================================================*/
  .editor-pick-cat .df-category-content-post a:hover {
      color: <?php echo $df_site_links_hover_color; ?>;
  }

<?php endif; ?>

/*============================================================
                 Mask Overlay Color
=============================================================*/
.format-standard.df-standard-image-big-skny .overlay_bg_image,
.format-quote .overlay_bg_image
{ background-color: <?php echo $df_mask_layout_rgba; ?>; }

/*============================================================
                 Mask Overlay Font Color
=============================================================*/
.df-standard-image-big-skny.format-standard .entry-header a, .df-standard-image-big-skny.format-standard .entry-header .byline,
.df-standard-image-big-skny.format-standard .entry-summary p, .df-standard-image-big-skny.format-standard .entry-summary a,
.df-standard-image-big-skny.format-standard .df-hover-share-container, .df-standard-image-big-skny.format-standard .df-hover-share-container i,
.df-standard-image-big-skny.format-standard .df-link i, .df-standard-image-big-skny.format-standard .df-link span,
.df-standard-image-big-skny.format-standard .df-postmeta span
{ color: <?php echo $df_mask_overlay_font_color; ?>; }