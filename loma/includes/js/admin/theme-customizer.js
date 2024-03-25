/* Theme Customizer JavaScript */
/*-----------------------------------------------------------------------------------*/

jQuery(window).load(function($) {

    function is_part_of_object(needle, object) {
        for (var i in object) {
            if (object[i] === needle) {
                return (true);
            }
        }
        return (false);
    }

    function loadVariants(selectField) {

        var _dataID = selectField.data('customize-setting-link').replace(/family/, "weight");
        var _font = jQuery('option:selected', selectField).val();
        var _customFont = jQuery('select[data-customize-setting-link="df_options[body_font_family]"] option:selected').val();
        var _variants = _wpCustomizeSettings.settings['list_font_weights']['value'][_font];
        var _customVariants = _wpCustomizeSettings.settings['list_font_weights']['value'][_customFont];
        var _DefaultVariant = _wpCustomizeSettings.settings['list_font_weights']['value']['Libre Baskerville'];

        if (jQuery('input[data-customize-setting-link="df_options[custom_fonts]"]').is(':checked')) {
            jQuery('input[name="_customize-radio-' + _dataID + '"]').each(function() {
                if (!is_part_of_object(jQuery(this).val(), _variants)) {
                    jQuery(this).parent().hide();
                } else {
                    jQuery(this).parent().show();
                }
            });
        } else {
            jQuery('input[name="_customize-radio-' + _dataID + '"]').each(function() {
                if (!is_part_of_object(jQuery(this).val(), _DefaultVariant)) {
                    jQuery(this).parent().hide();
                } else {
                    jQuery(this).parent().show();
                }
            });
        }
    }

    var checkedTrigger = jQuery('#customize-control-df_options-custom_fonts input');

    jQuery('select[data-customize-setting-link]').each(function() {
        loadVariants(jQuery(this));
    }).on('change', function() {
        loadVariants(jQuery(this));
    });

    if (!checkedTrigger.is(':checked')) {
        loadVariants(jQuery('select[data-customize-setting-link]'));
    }

    checkedTrigger.change(function() {
        if (checkedTrigger.is(':checked')) {
            loadVariants(jQuery('select[data-customize-setting-link]'));
        } else if (!checkedTrigger.is(':checked')) {
            loadVariants(jQuery('select[data-customize-setting-link]'));
        }
    });

});

// =============================================================================
// General
// =============================================================================

jQuery(document).ready(function($) {
    var fullTrigger = $('#customize-control-df_options-layout_site input[value="full-width"]');
    var boxedTrigger = $('#customize-control-df_options-layout_site input[value="boxed"]');
    var frameTrigger = $('#customize-control-df_options-layout_site input[value="frame"]');
    var skin = $('#customize-control-df_options-theme_skin select');

    var generalOptions14 = $('#customize-control-df_options-df_layout_outer_subtitle');
    var generalOptions15 = $('#customize-control-df_options-bg_color');
    var generalOptions16 = $('#customize-control-df_options-bg_layout_opacity');
    var generalOptions17 = $('#customize-control-df_options-bg_image_layout');
    var generalOptions18 = $('#customize-control-df_options-bg_image_repeat');
    var generalOptions19 = $('#customize-control-df_options-bg_image_pos-x');
    var generalOptions20 = $('#customize-control-df_options-bg_image_pos-y');
    var generalOptions21 = $('#customize-control-df_options-bg_image_att');
    var generalOptions22 = $('#customize-control-df_options-bg_image_size');

    if (fullTrigger.is(':checked')) {
        
        if (skin.val() == 'skin3' || skin.val() == 'skin4') {

            generalOptions14.css('display', 'block');
            generalOptions15.css('display', 'block');
            generalOptions16.css('display', 'block');
            generalOptions17.css('display', 'block');
            generalOptions18.css('display', 'block');
            generalOptions19.css('display', 'block');
            generalOptions20.css('display', 'block');
            generalOptions21.css('display', 'block');
            generalOptions22.css('display', 'block'); 
        }
        else {
            generalOptions14.css('display', 'none');
            generalOptions15.css('display', 'none');
            generalOptions16.css('display', 'none');
            generalOptions17.css('display', 'none');
            generalOptions18.css('display', 'none');
            generalOptions19.css('display', 'none');
            generalOptions20.css('display', 'none');
            generalOptions21.css('display', 'none');
            generalOptions22.css('display', 'none'); 
        }
        skin.change(function() {
            if (skin.val() == 'skin3' || skin.val() == 'skin4') {
                generalOptions14.css('display', 'block');
                generalOptions15.css('display', 'block');
                generalOptions16.css('display', 'block');
                generalOptions17.css('display', 'block');
                generalOptions18.css('display', 'block');
                generalOptions19.css('display', 'block');
                generalOptions20.css('display', 'block');
                generalOptions21.css('display', 'block');
                generalOptions22.css('display', 'block'); 
            }/*end if skin on change*/
            else {
                generalOptions14.css('display', 'none');
                generalOptions15.css('display', 'none');
                generalOptions16.css('display', 'none');
                generalOptions17.css('display', 'none');
                generalOptions18.css('display', 'none');
                generalOptions19.css('display', 'none');
                generalOptions20.css('display', 'none');
                generalOptions21.css('display', 'none');
                generalOptions22.css('display', 'none'); 
            }
        });/*end skin on change*/
    }

    if (boxedTrigger.is(':checked')) {
        generalOptions14.css('display', 'block');
        generalOptions15.css('display', 'block');
        generalOptions16.css('display', 'block');
        generalOptions17.css('display', 'block');
        generalOptions18.css('display', 'block');
        generalOptions19.css('display', 'block');
        generalOptions20.css('display', 'block');
        generalOptions21.css('display', 'block');
        generalOptions22.css('display', 'block');
    }

    if (frameTrigger.is(':checked')) {
        generalOptions14.css('display', 'block');
        generalOptions15.css('display', 'block');
        generalOptions16.css('display', 'block');
        generalOptions17.css('display', 'block');
        generalOptions18.css('display', 'block');
        generalOptions19.css('display', 'block');
        generalOptions20.css('display', 'block');
        generalOptions21.css('display', 'block');
        generalOptions22.css('display', 'block');
    }

    fullTrigger.change(function() {
        if(fullTrigger.is(':checked')) {
            skin.change(function() {
                if (skin.val() == 'skin3' || skin.val() == 'skin4') {
                    generalOptions14.css('display', 'block');
                    generalOptions15.css('display', 'block');
                    generalOptions16.css('display', 'block');
                    generalOptions17.css('display', 'block');
                    generalOptions18.css('display', 'block');
                    generalOptions19.css('display', 'block');
                    generalOptions20.css('display', 'block');
                    generalOptions21.css('display', 'block');
                    generalOptions22.css('display', 'block'); 
                }/*end if skin on change*/
                else {
                    generalOptions14.css('display', 'none');
                    generalOptions15.css('display', 'none');
                    generalOptions16.css('display', 'none');
                    generalOptions17.css('display', 'none');
                    generalOptions18.css('display', 'none');
                    generalOptions19.css('display', 'none');
                    generalOptions20.css('display', 'none');
                    generalOptions21.css('display', 'none');
                    generalOptions22.css('display', 'none'); 
                }
            });/*end skin on change*/
        } else if (!fullTrigger.is(':checked')) {
            generalOptions14.css('display', 'block');
            generalOptions15.css('display', 'block');
            generalOptions16.css('display', 'block');
            generalOptions17.css('display', 'block');
            generalOptions18.css('display', 'block');
            generalOptions19.css('display', 'block');
            generalOptions20.css('display', 'block');
            generalOptions21.css('display', 'block');
            generalOptions22.css('display', 'block');
        }
    });

    boxedTrigger.change(function() {
        if(boxedTrigger.is(':checked')) {
            generalOptions14.css('display', 'block');
            generalOptions15.css('display', 'block');
            generalOptions16.css('display', 'block');
            generalOptions17.css('display', 'block');
            generalOptions18.css('display', 'block');
            generalOptions19.css('display', 'block');
            generalOptions20.css('display', 'block');
            generalOptions21.css('display', 'block');
            generalOptions22.css('display', 'block');
        } else if (!boxedTrigger.is(':checked')) {
            generalOptions14.css('display', 'none');
            generalOptions15.css('display', 'none');
            generalOptions16.css('display', 'none');
            generalOptions17.css('display', 'none');
            generalOptions18.css('display', 'none');
            generalOptions19.css('display', 'none');
            generalOptions20.css('display', 'none');
            generalOptions21.css('display', 'none');
            generalOptions22.css('display', 'none');
        }
    });

    frameTrigger.change(function() {
        if(frameTrigger.is(':checked')) {
            generalOptions14.css('display', 'block');
            generalOptions15.css('display', 'block');
            generalOptions16.css('display', 'block');
            generalOptions17.css('display', 'block');
            generalOptions18.css('display', 'block');
            generalOptions19.css('display', 'block');
            generalOptions20.css('display', 'block');
            generalOptions21.css('display', 'block');
            generalOptions22.css('display', 'block');
        } else if (!frameTrigger.is(':checked')) {
            generalOptions14.css('display', 'block');
            generalOptions15.css('display', 'block');
            generalOptions16.css('display', 'block');
            generalOptions17.css('display', 'block');
            generalOptions18.css('display', 'block');
            generalOptions19.css('display', 'block');
            generalOptions20.css('display', 'block');
            generalOptions21.css('display', 'block');
            generalOptions22.css('display', 'block');
        }
    });

// =============================================================================
// Typography
// =============================================================================

    var typoTrigger1 = $('#customize-control-df_options-custom_fonts input');
    var typoTrigger2 = $('#customize-control-df_options-custom_font_subsets input');

    var typoOption1 = $('#customize-control-df_options-logo_font_family');
    var typoOption2 = $('#customize-control-df_options-navbar_font_family');
    var typoOption3 = $('#customize-control-df_options-headings_font_family');
    var typoOption4 = $('#customize-control-df_options-body_font_family');
    var typoOption5 = $('#customize-control-df_options-custom_font_subset_cyrillic');
    var typoOption6 = $('#customize-control-df_options-custom_font_subset_greek');
    var typoOption7 = $('#customize-control-df_options-custom_font_subset_vietnamese');

    if (!typoTrigger1.is(':checked')) {
        typoOption1.css('display', 'none');
        typoOption2.css('display', 'none');
        typoOption3.css('display', 'none');
        typoOption4.css('display', 'none');
    }

    if (!typoTrigger2.is(':checked')) {
        typoOption5.css('display', 'none');
        typoOption6.css('display', 'none');
        typoOption7.css('display', 'none');
    }

    typoTrigger1.change(function() {
        if (typoTrigger1.is(':checked')) {
            typoOption1.css('display', 'block');
            typoOption2.css('display', 'block');
            typoOption3.css('display', 'block');
            typoOption4.css('display', 'block');
        } else if (!typoTrigger1.is(':checked')) {
            typoOption1.css('display', 'none');
            typoOption2.css('display', 'none');
            typoOption3.css('display', 'none');
            typoOption4.css('display', 'none');
        }
    });

    typoTrigger2.change(function() {
        if (typoTrigger2.is(':checked')) {
            typoOption5.css('display', 'block');
            typoOption6.css('display', 'block');
            typoOption7.css('display', 'block');
        } else if (!typoTrigger2.is(':checked')) {
            typoOption5.css('display', 'none');
            typoOption6.css('display', 'none');
            typoOption7.css('display', 'none');
        }
    });

// =============================================================================
// Button
// =============================================================================
    var buttonStyleTrigger1 = $('#customize-control-df_options-button_style input[value="flat"]');
    var buttonStyleTrigger2 = $('#customize-control-df_options-button_style input[value="3d"]');
    var buttonStyleTrigger3 = $('#customize-control-df_options-button_style input[value="outline"]');
    var buttonStyle = $('#customize-control-df_options-button_style input');

    var buttonBgColorTrigger = $('#customize-control-df_options-button_background_color');
    var buttonBgColorHoverTrigger = $('#customize-control-df_options-button_background_color_hover');
    var buttonBtmColorTrigger = $('#customize-control-df_options-button_bottom_color');
    var buttonBtmColorHoverTrigger = $('#customize-control-df_options-button_bottom_color_hover');

    if (buttonStyleTrigger1.is(':checked')) {
        buttonBgColorTrigger.css('display', 'block');
        buttonBgColorHoverTrigger.css('display', 'block');
        buttonBtmColorTrigger.css('display', 'none');
        buttonBtmColorHoverTrigger.css('display', 'none');
    }

    if (buttonStyleTrigger2.is(':checked')) {
        buttonBgColorTrigger.css('display', 'block');
        buttonBgColorHoverTrigger.css('display', 'block');
        buttonBtmColorTrigger.css('display', 'block');
        buttonBtmColorHoverTrigger.css('display', 'block');
    }

    if (buttonStyleTrigger3.is(':checked')) {
        buttonBgColorTrigger.css('display', 'none');
        buttonBgColorHoverTrigger.css('display', 'none');
        buttonBtmColorTrigger.css('display', 'none');
        buttonBtmColorHoverTrigger.css('display', 'none');
    }

    buttonStyle.change(function() {
        if ($(this).val() === 'flat') {
            buttonBgColorTrigger.css('display', 'block');
            buttonBgColorHoverTrigger.css('display', 'block');
            buttonBtmColorTrigger.css('display', 'none');
            buttonBtmColorHoverTrigger.css('display', 'none');
        } else if ($(this).val() === '3d') {
            buttonBgColorTrigger.css('display', 'block');
            buttonBgColorHoverTrigger.css('display', 'block');
            buttonBtmColorTrigger.css('display', 'block');
            buttonBtmColorHoverTrigger.css('display', 'block');
        } else if ($(this).val() === 'outline') {
            buttonBgColorTrigger.css('display', 'none');
            buttonBgColorHoverTrigger.css('display', 'none');
            buttonBtmColorTrigger.css('display', 'none');
            buttonBtmColorHoverTrigger.css('display', 'none');
        }
    });


// =============================================================================
// Header
// =============================================================================
    var navbarTopTrigger1 = $('#customize-control-df_options-header_navbar_position input[value="center"]');
    var navbarTopTrigger2 = $('#customize-control-df_options-header_navbar_position input[value="left"]');
    var navbarTopTrigger3 = $('#customize-control-df_options-header_navbar_position input[value="right"]');
    var navbarTopOption1 = $('#customize-control-df_options-header_navbar_height');
    // var navbarTopOption2  = $('#customize-control-x_logo_adjust_navbar_top');
    // var navbarTopOption3  = $('#customize-control-x_navbar_adjust_links_top');

    var navbarSideTrigger1 = $('#customize-control-df_options-header_navbar_position input[value="fixed-left"]');
    var navbarSideTrigger2 = $('#customize-control-df_options-header_navbar_position input[value="fixed-right"]');
    var navbarSideOption1 = $('#customize-control-df_options-header_navbar_width');
    // var navbarSideOption2  = $('#customize-control-x_logo_adjust_navbar_side');
    // var navbarSideOption3  = $('#customize-control-x_navbar_adjust_links_side');
    // var navbarSideDesc1    = $('#customize-control-x_header_description_navbar_width_height');
    // var navbarSideDesc2    = $('#customize-control-x_header_description_navbar_adjust');
    // var navbarClassic1 = $('#customize-control-df_options-header_navbar_position input[value="classic-left"]');
    // var navbarClassic2 = $('#customize-control-df_options-header_navbar_position input[value="classic-right"]');
    // var navbarClassicOption = $('#customize-control-df_options-header_navbar_classic_width');

    var widgetbarTrigger = $('#customize-control-df_options-header_widget_bar input[value="0"]');
    var widgetbarOption1 = $('#customize-control-df_options-widgetbar_bgbutton');
    var widgetbarOption2 = $('#customize-control-df_options-widgetbar_bgbutton_hover');

    var topbarTrigger = $('#customize-control-df_options-header_topbar input');
    var topbarOption1 = $('#customize-control-df_options-header_topbar_content');

    var groupNavbarPosition = $('#customize-control-df_options-header_navbar_position input');
    var groupHeaderWidgetAreas = $('#customize-control-df_options-header_widget_bar input');


    if (!navbarTopTrigger1.is(':checked') || !navbarTopTrigger2.is(':checked') || !navbarTopTrigger3.is(':checked')) {
        navbarTopOption1.css('display', 'block');
        //  navbarTopOption2.css('display', 'block');
        //   navbarTopOption3.css('display', 'block');
        navbarSideOption1.css('display', 'none');
        //   navbarSideOption2.css('display', 'none');
        //   navbarSideOption3.css('display', 'none');
        //   navbarSideDesc1.css('display', 'none');
        //   navbarSideDesc2.css('display', 'none');
        // navbarClassicOption.css('display', 'none');
    }

    if (navbarSideTrigger1.is(':checked') || navbarSideTrigger2.is(':checked')) {
        navbarTopOption1.css('display', 'block');
        //   navbarTopOption2.css('display', 'block');
        //   navbarTopOption3.css('display', 'block');
        navbarSideOption1.css('display', 'block');
        //   navbarSideOption2.css('display', 'block');
        //   navbarSideOption3.css('display', 'block');
        //   navbarSideDesc1.css('display', 'block');
        //   navbarSideDesc2.css('display', 'block');
        // navbarClassicOption.css('display', 'none');
    }

    // if (navbarClassic1.is(':checked') || navbarClassic2.is(':checked')) {
    //     navbarClassicOption.css('display', 'block');
    //     navbarSideOption1.css('display', 'none');
    // }

    // if (widgetbarTrigger.is(':checked')) {
    //     widgetbarOption1.css('display', 'none');
    //     widgetbarOption2.css('display', 'none');
    // }

    // if (!topbarTrigger.is(':checked')) {
    //   topbarOption1.css('display', 'none');
    // }

    groupNavbarPosition.change(function() {
        if ($(this).val() === 'center' || $(this).val() === 'left' || $(this).val() === 'right') {
            navbarTopOption1.css('display', 'block');
            //     navbarTopOption2.css('display', 'block');
            //     navbarTopOption3.css('display', 'block');
            navbarSideOption1.css('display', 'none');
            //     navbarSideOption2.css('display', 'none');
            //     navbarSideOption3.css('display', 'none');
            //     navbarSideDesc1.css('display', 'none');
            //     navbarSideDesc2.css('display', 'none');
            // navbarClassicOption.css('display', 'none');
        } else if ($(this).val() === 'fixed-left' || $(this).val() === 'fixed-right') {
            navbarTopOption1.css('display', 'block');
            //     navbarTopOption2.css('display', 'block');
            //     navbarTopOption3.css('display', 'block');
            navbarSideOption1.css('display', 'block');
            //     navbarSideOption2.css('display', 'block');
            //     navbarSideOption3.css('display', 'block');
            //     navbarSideDesc1.css('display', 'block');
            //     navbarSideDesc2.css('display', 'block');
            //     navbarClassicOption.css('display', 'none');
        }
    });

    groupHeaderWidgetAreas.change(function() {
        if ($(this).val() === "0") {
            widgetbarOption1.css('display', 'none');
            widgetbarOption2.css('display', 'none');
        } else {
            widgetbarOption1.css('display', 'block');
            widgetbarOption2.css('display', 'block');
        }
    });

    topbarTrigger.change(function() {
        if (topbarTrigger.is(':checked')) {
            topbarOption1.css('display', 'block');
        } else {
            topbarOption1.css('display', 'none');
        }
    });


// =============================================================================
// Navbar
// =============================================================================
    // var navTriggerFix1 = $('#customize-control-df_options-header_navbar_position input[value="fixed-right"]');
    // var navTriggerFix2 = $('#customize-control-df_options-header_navbar_position input[value="fixed-left"]');

    // var navGroupTrigger = $('#customize-control-df_options-header_navbar_position input');

    // if (navTriggerFix1.is(':checked') ||  navTriggerFix2.is(':checked')) {
    //     navOptionsFix.css('display', 'block');
    // }

    // navGroupTrigger.change(function() {
    //     if ($(this).val() === 'fixed-left' || $(this).val() === 'fixed-right') {
    //         navOptionsFix.css('display', 'block');
    //     } else {
    //         navOptionsFix.css('display', 'none');
    //     }
    // });

// =============================================================================
// Page - Blog
// =============================================================================

    /*Homepage Layout*/
    var homeGridTrigger = $('#customize-control-df_options-homepage_layout input[value="grid_post"]');
    var homeListTrigger = $('#customize-control-df_options-homepage_layout input[value="list_post"]');

    var homeGridOptions1 = $('#customize-control-df_options-grid_post_lay');
    var homeGridOptions2 = $('#customize-control-df_options-grid_col_lay');
    var homeGridOptions3 = $('#customize-control-df_options-enable_filter_cat');
    var homeListOptions = $('#customize-control-df_options-list_post_opt');

    if (homeGridTrigger.is(':checked')) {
        homeGridOptions1.css('display', 'block');
        homeGridOptions2.css('display', 'block');
        homeGridOptions3.css('display', 'block');
        homeListOptions.css('display', 'none');
    }

    if (homeListTrigger.is(':checked')) {
        homeGridOptions1.css('display', 'none');
        homeGridOptions2.css('display', 'none');
        homeGridOptions3.css('display', 'none');
        homeListOptions.css('display', 'block');
    }

    homeGridTrigger.change(function() {
        if (homeGridTrigger.is(':checked')) {
                homeGridOptions1.css('display', 'block');
                homeGridOptions2.css('display', 'block');
                homeGridOptions3.css('display', 'block');
                homeListOptions.css('display', 'none');
        } else if (!homeGridTrigger.is(':checked')) {
                homeGridOptions1.css('display', 'none');
                homeGridOptions2.css('display', 'none');
                homeGridOptions3.css('display', 'none');
                homeListOptions.css('display', 'block');
        }   
    });

    homeListTrigger.change(function() {
        if (homeListTrigger.is(':checked')) {
                homeGridOptions1.css('display', 'none');
                homeGridOptions2.css('display', 'none');
                homeGridOptions3.css('display', 'none');
                homeListOptions.css('display', 'block');
        } else if (!homeListTrigger.is(':checked')) {
                homeGridOptions1.css('display', 'block');
                homeGridOptions2.css('display', 'block');
                homeGridOptions3.css('display', 'block');
                homeListOptions.css('display', 'none');
        }
    });

    /*Share*/
    var shareTrigger = $('#customize-control-df_options-enable_share_blog input');

    var pageOptions1 = $('#customize-control-df_options-facebook_enable_share_blog');
    var pageOptions2 = $('#customize-control-df_options-twitter_enable_share_blog');
    var pageOptions3 = $('#customize-control-df_options-google_enable_share_blog');
    var pageOptions4 = $('#customize-control-df_options-pinterest_enable_share_blog');
    var pageOptions5 = $('#customize-control-df_options-mail_enable_share_blog');
    var pageOptions6 = $('#customize-control-df_options-stumb_enable_share_blog');
    var pageOptions7 = $('#customize-control-df_options-linkedin_enable_share_blog');
    var pageOptions8 = $('#customize-control-df_options-reddit_enable_share_blog');
    var pageOptions9 = $('#customize-control-df_options-tumblr_enable_share_blog');

    if (!shareTrigger.is(':checked')) {
        pageOptions1.css('display', 'none');
        pageOptions2.css('display', 'none');
        pageOptions3.css('display', 'none');
        pageOptions4.css('display', 'none');
        pageOptions5.css('display', 'none');
        pageOptions6.css('display', 'none');
        pageOptions7.css('display', 'none');
        pageOptions8.css('display', 'none');
        pageOptions9.css('display', 'none');

    }

    shareTrigger.change(function() {
        if (shareTrigger.is(':checked')) {
            pageOptions1.css('display', 'block');
            pageOptions2.css('display', 'block');
            pageOptions3.css('display', 'block');
            pageOptions4.css('display', 'block');
            pageOptions5.css('display', 'block');
            pageOptions6.css('display', 'block');
            pageOptions7.css('display', 'block');
            pageOptions8.css('display', 'block');
            pageOptions9.css('display', 'block');
        } else if (!shareTrigger.is(':checked')) {
            pageOptions1.css('display', 'none');
            pageOptions2.css('display', 'none');
            pageOptions3.css('display', 'none');
            pageOptions4.css('display', 'none');
            pageOptions5.css('display', 'none');
            pageOptions6.css('display', 'none');
            pageOptions7.css('display', 'none');
            pageOptions8.css('display', 'none');
            pageOptions9.css('display', 'none');
        }
    });

    /*Editor's Pick*/
    var editorpickTrigger = $('#customize-control-df_options-enable_editor_pick input');
    // var editorpickOptions1 = $('#customize-control-df_options-editor_pick_num');
    var editorpickOptions2 = $('#customize-control-df_options-editor_pick_cat')

    if (!editorpickTrigger.is(':checked')) {
        // editorpickOptions1.css('display', 'none');
        editorpickOptions2.css('display', 'none');
    }

    editorpickTrigger.change(function() {
        if (editorpickTrigger.is(':checked')) {
            // editorpickOptions1.css('display', 'block');
            editorpickOptions2.css('display', 'block');
        } else if (!editorpickTrigger.is(':checked')) {
            // editorpickOptions1.css('display', 'none');
            editorpickOptions2.css('display', 'none');
        }
    });

    /*Pagination*/
    var pagiTrigger = $('#customize-control-df_options-enable_post_pagination input');

    var pagiOptions = $('#customize-control-df_options-blog_pagination_style');

    if (!pagiTrigger.is(':checked')) {
        pagiOptions.css('display', 'none');
    } 

    pagiTrigger.change(function() {
        if (pagiTrigger.is(':checked')) {
            pagiOptions.css('display', 'block');
        } else if (!pagiTrigger.is(':checked')) {
            pagiOptions.css('display', 'none');
        }
    });


    /*Author's*/
    var authorTrigger2 = $('#customize-control-df_options-archive_author_layout input[value="grid_post"]');
    var authorTrigger3 = $('#customize-control-df_options-archive_author_layout input[value="list_post"]');

    var authorOptionsT1 = $('#customize-control-df_arc_aut_layout_description');
    var authorOptionsT2 = $('#customize-control-df_options-archive_author_layout');

    var authorOptionsG1 = $('#customize-control-df_grid_layout_description');
    var authorOptionsG2 = $('#customize-control-df_options-archive_author_grid_layout_js');
    var authorOptionsG3 = $('#customize-control-df_options-archive_author_grid_layout');
    var authorOptionsG4 = $('.rwmb-field rwmb-checkbox-wrapper'); //Metabox single post

    var authorOptionsL1 = $('#customize-control-df_options-list_post_opt_arch');

    if (!authorTrigger2.is(':checked')) {
        authorOptionsG1.css('display', 'none');
        authorOptionsG2.css('display', 'none');
        authorOptionsG3.css('display', 'none');
        authorOptionsG4.css('display', 'none');
        authorOptionsL1.css('display', 'block');
    }

    if (!authorTrigger3.is(':checked')) {
        authorOptionsG1.css('display', 'block');
        authorOptionsG2.css('display', 'block');
        authorOptionsG3.css('display', 'block');
        authorOptionsG4.css('display', 'block');
        authorOptionsL1.css('display', 'none');
    }

    authorTrigger2.change(function() {
        if (authorTrigger2.is(':checked')) {
            authorOptionsG1.css('display', 'block');
            authorOptionsG2.css('display', 'block');
            authorOptionsG3.css('display', 'block');
            authorOptionsG4.css('display', 'block');
            authorOptionsL1.css('display', 'none');
        } else if (!authorTrigger2.is(':checked')) {
            authorOptionsG1.css('display', 'none');
            authorOptionsG2.css('display', 'none');
            authorOptionsG3.css('display', 'none');
            authorOptionsG4.css('display', 'none');     
            authorOptionsL1.css('display', 'block');
        }  
    });

    authorTrigger3.change(function() {
        if (authorTrigger3.is(':checked')) {
            authorOptionsG1.css('display', 'none');
            authorOptionsG2.css('display', 'none');
            authorOptionsG3.css('display', 'none');
            authorOptionsG4.css('display', 'none');
            authorOptionsL1.css('display', 'block');
        } else if (!authorTrigger3.is(':checked')) {
            authorOptionsG1.css('display', 'none');
            authorOptionsG2.css('display', 'none');
            authorOptionsG3.css('display', 'none');
            authorOptionsG4.css('display', 'none');               
            authorOptionsL1.css('display', 'block');
        }  
    });

    /*================================================================
     * Page - 404
     *================================================================*/
    var PNFbgType1 = $('#customize-control-df_options-404_background_type input[value="color"]');
    var PNFbgType2 = $('#customize-control-df_options-404_background_type input[value="image"]');
    var PNFheaderType1 = $('#customize-control-df_options-404_header_type input[value="text"]');
    var PNFheaderType2 = $('#customize-control-df_options-404_header_type input[value="logo"]');
    var PNFcontent = $('#customize-control-df_options-enable_content_text input');

    var PNFbgoptions1 = $('#customize-control-df_options-404_background_color');
    var PNFbgoptions2 = $('#customize-control-df_options-404_background_image');
    var PNFbgoptions3 = $('#customize-control-df_options-404_background_repeat');
    var PNFbgoptions4 = $('#customize-control-df_options-404_background_pos-x');
    var PNFbgoptions5 = $('#customize-control-df_options-404_background_pos-y');
    var PNFbgoptions6 = $('#customize-control-df_options-404_background_size');
    var PNFbgoptions7 = $('#customize-control-df_options-404_background_attachment');
    var PNFbgoptions8 = $('#customize-control-df_options-404_opacity_color');
    var PNFheaderoptions1 = $('#customize-control-df_options-404_header_logo');
    var PNFheaderoptions2 = $('#customize-control-df_options-404_header_text');
    var PNFcontentText = $('#customize-control-df_options-404_page_text');

    if (!PNFbgType1.is(':checked')) {
        PNFbgoptions1.css('display', 'none');
        PNFbgoptions2.css('display', 'block');
        PNFbgoptions3.css('display', 'block');
        PNFbgoptions4.css('display', 'block');
        PNFbgoptions5.css('display', 'block');
        PNFbgoptions6.css('display', 'block');
        PNFbgoptions7.css('display', 'block');
        PNFbgoptions8.css('display', 'none');
    }
    if (!PNFbgType2.is(':checked')) {
        PNFbgoptions1.css('display', 'block');
        PNFbgoptions2.css('display', 'none');
        PNFbgoptions3.css('display', 'none');
        PNFbgoptions4.css('display', 'none');
        PNFbgoptions5.css('display', 'none');
        PNFbgoptions6.css('display', 'none');
        PNFbgoptions7.css('display', 'none');
        PNFbgoptions8.css('display', 'block');
    }
    PNFbgType1.change(function() {
        if (PNFbgType1.is(':checked')) {
            PNFbgoptions1.css('display', 'block');
            PNFbgoptions2.css('display', 'none');
            PNFbgoptions3.css('display', 'none');
            PNFbgoptions4.css('display', 'none');
            PNFbgoptions5.css('display', 'none');
            PNFbgoptions6.css('display', 'none');
            PNFbgoptions7.css('display', 'none');
            PNFbgoptions8.css('display', 'block');
        } else if (!PNFbgType1.is(':checked')) {
            PNFbgoptions1.css('display', 'none');
            PNFbgoptions2.css('display', 'block');
            PNFbgoptions3.css('display', 'block');
            PNFbgoptions4.css('display', 'block');
            PNFbgoptions5.css('display', 'block');
            PNFbgoptions6.css('display', 'block');
            PNFbgoptions7.css('display', 'block');               
            PNFbgoptions8.css('display', 'none');
        }  
    });
    PNFbgType2.change(function() {
        if (PNFbgType2.is(':checked')) {
            PNFbgoptions1.css('display', 'none');
            PNFbgoptions2.css('display', 'block');
            PNFbgoptions3.css('display', 'block');
            PNFbgoptions4.css('display', 'block');
            PNFbgoptions5.css('display', 'block');
            PNFbgoptions6.css('display', 'block');
            PNFbgoptions7.css('display', 'block'); 
            PNFbgoptions8.css('display', 'none');
        } else if (!PNFbgType2.is(':checked')) {
            PNFbgoptions1.css('display', 'block');
            PNFbgoptions2.css('display', 'none');
            PNFbgoptions3.css('display', 'none');
            PNFbgoptions4.css('display', 'none');
            PNFbgoptions5.css('display', 'none');
            PNFbgoptions6.css('display', 'none');
            PNFbgoptions7.css('display', 'none');              
            PNFbgoptions8.css('display', 'block');
        }  
    });
    if (!PNFheaderType1.is(':checked')) {
        PNFheaderoptions1.css('display', 'block');
        PNFheaderoptions2.css('display', 'none');
    }
    if (!PNFheaderType2.is(':checked')) {
        PNFheaderoptions1.css('display', 'none');
        PNFheaderoptions2.css('display', 'block');
    }
    PNFheaderType1.change(function() {
        if (PNFheaderType1.is(':checked')) {
            PNFheaderoptions1.css('display', 'none');
            PNFheaderoptions2.css('display', 'block');
        } else if (!PNFheaderType1.is(':checked')) {
            PNFheaderoptions1.css('display', 'block');
            PNFheaderoptions2.css('display', 'none');
        }  
    });
    PNFheaderType2.change(function() {
        if (PNFheaderType2.is(':checked')) {
            PNFheaderoptions1.css('display', 'block');
            PNFheaderoptions2.css('display', 'none');             
        } else if (!PNFheaderType2.is(':checked')) {
            PNFheaderoptions1.css('display', 'none');
            PNFheaderoptions2.css('display', 'block');
        }  
    });
    if (!PNFcontent.is(':checked')) {
        PNFcontentText.css('display', 'none');
    }
    PNFcontent.change(function() {
        if (PNFcontent.is(':checked')) {
            PNFcontentText.css('display', 'block');
        } else if (!PNFcontent.is(':checked')) {
            PNFcontentText.css('display', 'none');
        }  
    });
    /*================================================================
     * Add additional customizer admin support for the Theme Customizer.
     *================================================================*/

    var previewDiv = $('#customize-preview');

    $('.wp-full-overlay-header').append('<div id="df-customizer-tools"></div>');

    var dfTools = $('#df-customizer-tools');

    dfTools.append('<button id="trigger-overlay" class="button">Custom CSS</button>');
    previewDiv.prepend('<div id="overlay-customcss"><form><textarea id="csstextarea"></textarea></form></div>');

    var cssWindow = $('#customize-preview #overlay-customcss');
    var cssText = $('#customize-preview #overlay-customcss form textarea');
    var ogText = $("li#customize-control-df_options-custom_styles").children().children('textarea');

    // click
    $('#trigger-overlay').click(function(e) {

        e.preventDefault();

        // turn off
        if ($(this).hasClass('btn-active')) {

            $(this).removeClass('btn-active');

            cssWindow.fadeToggle('fast');

            ogText.val(cssText.val()).keyup();

            // turn on
        } else {

            $(this).addClass('btn-active');

            // fade in
            cssWindow.fadeToggle('fast');

            // empty
            cssText.val('');

            // focus
            cssText.focus();

            // fill
            cssText.val(ogText.val());

        }

    });

    HTMLTextAreaElement.prototype.getCaretPosition = function() { //return the caret position of the textarea
        return this.selectionStart;
    };
    HTMLTextAreaElement.prototype.setCaretPosition = function(position) { //change the caret position of the textarea
        this.selectionStart = position;
        this.selectionEnd = position;
        this.focus();
    };
    HTMLTextAreaElement.prototype.hasSelection = function() { //if the textarea has selection then return true
        if (this.selectionStart == this.selectionEnd) {
            return false;
        } else {
            return true;
        }
    };
    HTMLTextAreaElement.prototype.getSelectedText = function() { //return the selection text
        return this.value.substring(this.selectionStart, this.selectionEnd);
    };
    HTMLTextAreaElement.prototype.setSelection = function(start, end) { //change the selection area of the textarea
        this.selectionStart = start;
        this.selectionEnd = end;
        this.focus();
    };

    var textarea = document.getElementById('csstextarea');

    textarea.onkeydown = function(event) {

        //support tab on textarea
        if (event.keyCode == 9) { //tab was pressed
            var newCaretPosition;
            newCaretPosition = textarea.getCaretPosition() + "    ".length;
            textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
            textarea.setCaretPosition(newCaretPosition);
            return false;
        }
        if (event.keyCode == 8) { //backspace
            if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                var newCaretPosition;
                newCaretPosition = textarea.getCaretPosition() - 3;
                textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                textarea.setCaretPosition(newCaretPosition);
            }
        }
        if (event.keyCode == 37) { //left arrow
            var newCaretPosition;
            if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                newCaretPosition = textarea.getCaretPosition() - 3;
                textarea.setCaretPosition(newCaretPosition);
            }
        }
        if (event.keyCode == 39) { //right arrow
            var newCaretPosition;
            if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                newCaretPosition = textarea.getCaretPosition() + 3;
                textarea.setCaretPosition(newCaretPosition);
            }
        }
    }

});