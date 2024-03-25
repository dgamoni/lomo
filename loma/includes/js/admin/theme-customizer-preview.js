function convertHex(e) {
    e = e.replace("#", "");
    r = parseInt(e.substring(0, 2), 16);
    g = parseInt(e.substring(2, 4), 16);
    b = parseInt(e.substring(4, 6), 16);
    result = "rgba(" + r + "," + g + "," + b + ", .7)";
    return result
}(function(e) {
    // ================================================================================
    // initial
    // ================================================================================
        var border_class = ".post, .widget li, #options-blog-sort li, #options-blog-sort li:first-child, .df-sidebar, input[type], select, textarea, .widget_tag_cloud .tagcloud a, .df-postmeta .post-format, .df-postmeta .posted-on, .df-postmeta .comment, .df-blog-extra ul.df-hover-share-content, .df-blog-extra ul.df-hover-share-content i, .df-pagination-number ul.page-numbers li a, .df-pagination-number ul.page-numbers li span, .conteiner-select-box:before, .universe-search-input, .format-aside .entry-content, .format-aside .aside-post-formats, .widget .post, .widget .recententries, .widget .recententries .post-date, .widget .popularentries, .widget .recentcomments, .widget span.entry-date, .widget .author, .widget .comments-link, .df-page-header";
        var mask_color = ".single .third-effect .mask, .single .third-effect:hover .mask, body .related-post .third-effect .mask, body .related-post .third-effect:hover .mask, .format-status .overlay_bg_image, .editor-pick_container .blog-item-description, .format-standard.df-standard-image-big-skny .overlay_bg_image, .format-quote .overlay_bg_image";
        var mask_font_color = ".editor-pick-cat .df-category-content-post a, .df-standard-image-big-skny.format-standard .entry-header a, .df-standard-image-big-skny.format-standard .entry-header .byline,.df-standard-image-big-skny.format-standard .entry-summary p, .df-standard-image-big-skny.format-standard .entry-summary a,.df-standard-image-big-skny.format-standard .df-hover-share-container, .df-standard-image-big-skny.format-standard .df-hover-share-container i,.df-standard-image-big-skny.format-standard .df-link i, .df-standard-image-big-skny.format-standard .df-link span,.editor-pick_container .owl-item .editor-pick_content h4 a,.format-status .df-status-format p, .format-status .df-status-format blockquote, .format-status .df-postmeta span, .format-status .df-postmeta a, .format-link h2.df-postformat-link-img a, .single .third-effect a.info";
    // ================================================================================
    // General
    // ================================================================================
    // site max width
    wp.customize("df_options[site_max_width]", function(t) {
        t.bind(function(t) {
            e(".df_container-fluid").css("max-width", t + "px");
            e(".df-boxed-layout-active #wrapper").css("max-width", t + "px");
            e(".df-frame-boxed-layout-active #wrapper").css("max-width", t + "px")
        })
    });
    // site width
    wp.customize("df_options[site_width]", function(t) {
        t.bind(function(t) {
            e(".df_container-fluid").css("width", t + "%");
            e(".df-boxed-layout-active #wrapper").css("width", t + "%");
            e(".df-frame-boxed-layout-active #wrapper").css("width", t + "%")
        })
    });
    // border color
    wp.customize("df_options[border_color]", function(value) {
        value.bind(function(new_val) {
            e(border_class).css("border-color", new_val);
            e('.df-layout-skin4 .widget h3').css("border-color", new_val);
            e('.shorcode-blog-banner .featured-image-sc-post .df-post-title:after').css("border-color", new_val);
            e('.arrow-up').css("border-color", "transparent "+ new_val + " transparent transparent");
        })
    });
    // overlay mask color
    wp.customize("df_options[mask_overlay_color]", function(value) {
        value.bind(function(new_val) {
            e(mask_color).css("background-color", convertHex(new_val));
     
        })
    });
    // overlay mask color font
    wp.customize("df_options[mask_overlay_font_color]", function(value) {
        value.bind(function(new_val) {
            e(mask_font_color).css("color", new_val);
     
        })
    });

    // wp.customize("df_options[bg_color]", function(t) {
    //     t.bind(function(t) {
    //         e("body").css("background", convertHex(t))
    //     })
    // });
    // wp.customize("df_options[bg_content_color]", function(t) {
    //     t.bind(function(t) {
    //         e("#wrapper").css("background", convertHex(t))
    //     })
    // });
    // ================================================================================
    // Header
    // ================================================================================
    // navbar bgcolor
    wp.customize("df_options[navbar_bgcolor_setting]", function(value) {
        value.bind(function(new_val) {
            e("div.df-navibar").css("background", new_val);
     
        })
    });
    // widget button color
    wp.customize("df_options[widgetbar_bgbutton]", function(value) {
        value.bind(function(new_val) {
            e(".df-widgetbar-button").css("border-top-color", new_val);
            e(".df-widgetbar-button").css("border-right-color", new_val);
     
        })
    });
    // topbar bg color setting
    wp.customize("df_options[topbar_bgcolor_setting]", function(value) {
        value.bind(function(new_val) {
            e("div.df-topbar, ul.top-navigation ul").css("background", new_val);
     
        })
    });
    // ================================================================================
    // Button
    // ================================================================================
    // button text color
    wp.customize("df_options[button_text_color]", function(t) {
        t.bind(function(t) {
            e("input[type='submit'], input[type='reset'], input[type='button']").css("color", t)
        })
    });
    // button bg color
    wp.customize("df_options[button_background_color]", function(t) {
        t.bind(function(t) {
            e("input[type='submit'], input[type='reset'], input[type='button']").css("background", t)
        })
    });
    // Button Border Color
    wp.customize("df_options[button_border_color]", function(value) {
        value.bind(function(new_val) {
            e("input[type='submit'], input[type='reset'], input[type='button']").css("border-color", new_val);
        })
    });
    // ================================================================================
    // footer
    // ================================================================================
    // footer bg color
    wp.customize("df_options[footer_background_color]", function(value) {
        value.bind(function(new_val) {
            e('.footer-primary-widgets, #footer-colophon').css("background", convertHex(new_val));
        })
    });
    // ================================================================================
    // 404
    // ================================================================================
    wp.customize("df_options[404_background_color]", function(value) {
        value.bind(function(new_val) {
            e('.error404 .error-404').css("background", convertHex(new_val));
        })
    });
    // ================================================================================
    // End post message
    // ================================================================================

    var t = e("#customize-control-df_options-page_loader input");
    var n = e("#customize-control-df_options-pageloader_color");
    var r = e("#customize-control-df_options-pageloader_type");
    var i = e("#customize-control-df_options-pageloader_effects");
    var s = e("#customize-control-df_options-pageloader_bgcolor");
    if (!t.is(":checked")) {
        n.css("display", "none");
        r.css("display", "none");
        i.css("display", "none");
        s.css("display", "none")
    }
    t.change(function() {
        if (t.is(":checked")) {
            n.css("display", "block");
            r.css("display", "block");
            i.css("display", "block");
            s.css("display", "block")
        } else if (!t.is(":checked")) {
            n.css("display", "none");
            r.css("display", "none");
            i.css("display", "none");
            s.css("display", "none")
        }
    })
})(jQuery)