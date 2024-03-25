jQuery(document).ready(function($) { 

 DAHZ.init.initSite();

// =========================================================================================
// 16. mega menu
// =========================================================================================
var windowWidth = jQuery(window).width(),
    mega_menu  = $('.df-mega-menu').length,
    fixed  = $('.df-navibar-fixed-left-active, .df-navibar-fixed-right-active').length;
// if header position left or right
if (mega_menu != '0') {
    $('body').addClass('has-mega-menu');     
}
if (windowWidth > 959) {
    // fixed width find
    if (fixed != '0') {
        jQuery('.mega-width-header-fixed').each(function() {
            var class_str = $(this).attr('class'),
                index1 = class_str.indexOf('menu-data-width-'),
                index2 = class_str.indexOf('-size'),
                width_header_fixed = class_str.substring(index1+16,index2);
                $(this).find('> .sub-nav').css('width', width_header_fixed);
        });
    }
    // take image into background
    jQuery('.df-mega-menu').each(function() {
        if ($(this).find('> a > .mega-icon > img').length != '0') {
            $(this).addClass('df-mega-menu-img');
            var background_megamenu = $(this).find('> a > .mega-icon > img').attr('src');
            background_megamenu = 'url("' +background_megamenu+'")' 
            $(this).find('> .sub-nav ').css('background-image', background_megamenu);
            $(this).find('ul ul').css('background', 'transparent');
        };
    });
    // subnav mega right
    if ($('.mega-position-right').length && fixed == '0') {
        jQuery('.df-navi').each(function() {
            
            var nav_width = $(this).parent().parent('.df-navibar-inner').width();
            
            $(this).find('.mega-position-right.mega-column-2').hover( function(){
                var left_position = $(this).position().left,
                    menu_right = $(this);
                    menu_width = nav_width * 0.4 - menu_right.width();
                    left_position = left_position - menu_width;
                    menu_right.find('> .sub-nav').css('left', left_position + 'px');
            });

            $(this).find('.mega-position-right.mega-column-3').hover( function(){
                var left_position = $(this).position().left,
                    menu_right = $(this);
                    menu_width = nav_width * 0.6 - menu_right.width();
                    left_position = left_position - menu_width;
                    menu_right.find('> .sub-nav').css('left', left_position + 'px');
            });

            $(this).find('.mega-position-right.mega-column-4').hover( function(){
                var left_position = $(this).position().left,
                    menu_right = $(this);
                    menu_width = nav_width * 0.8 - menu_right.width();
                    left_position = left_position - menu_width;
                    menu_right.find('> .sub-nav').css('left', left_position + 'px');
            });
        });
    }/*mega menu position right*/
    // subnav mega center
    if ($('.mega-position-center').length && fixed == '0') {
        jQuery('.df-navi').each(function() {
            
            var nav_width = $(this).parent().parent('.df-navibar-inner').width();

            $(this).find('.mega-position-center.mega-column-2').hover( function(){
                var left_position = $(this).position().left,
                    menu_center = $(this);
                    menu_width = nav_width * 0.4 - menu_center.width();
                    left_position = left_position - menu_width * 0.5;
                    menu_center.find('> .sub-nav').css('left', left_position + 'px');
            });

            $(this).find('.mega-position-center.mega-column-3').hover( function(){
                var left_position = $(this).position().left,
                    menu_center = $(this);
                    menu_width = nav_width * 0.6 - menu_center.width();
                    left_position = left_position - menu_width * 0.5;
                    menu_center.find('> .sub-nav').css('left', left_position + 'px');
            });

            $(this).find('.mega-position-center.mega-column-4').hover( function(){
                var left_position = $(this).position().left,
                    menu_center = $(this);
                    menu_width = nav_width * 0.8 - menu_center.width();
                    left_position = left_position - menu_width * 0.5;
                    menu_center.find('> .sub-nav').css('left', left_position + 'px');
            });
        });
    }/*mega menu position center*/

}/*window width*/
// =========================================================================================
// 17. mobile menu
// =========================================================================================
function init_mobile_menu_right(){
        $('body').addClass('mobile-menu-active').trigger('df_body_change');
        $('.df-mobile-menu-container').addClass('menu-container-active');
        $('.df-mobile-menu-container').fadeIn('slow');
        $('#df-float-menu-id').removeClass('df-float-menu-show');
        $('#wrapper').addClass('animate-right-to-left');

        containerJsp_mobile_menu = jQuery('.jp-container-mobile-menu');
        window_height= $(window).height() - 50;
        containerJsp_mobile_menu.css('height', window_height);
}
if (windowWidth < 959) {
    // if swipe left mobile menu
    // ==================================================
        $("#wrapper").swipe( {
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
            init_mobile_menu_right();
        },
        threshold:300
        });
     
    // if buttuon click mobile menu
    // ==================================================
 
        $('.df-mobile-menu-wrapper').on('touchend click', function(event) {
            init_mobile_menu_right();
        }); 


    $('.df-mobile-menu-button-close').on('click', function(event) {
        $('#wrapper').removeClass('animate-right-to-left');
        $('body').removeClass('mobile-menu-active');
        $('.df-mobile-menu-container').removeClass('menu-container-active');
        $('.df-mobile-menu-container').fadeOut('slow');
        $('#df-float-menu-id').addClass('df-float-menu-show');
    });

    $('body').on('df_body_change', function() {
        $('.mobile-menu-active #content,.mobile-menu-active .col-full').bind('touchend click', function(event) {
            $('#wrapper').removeClass('animate-right-to-left');
            $('body').removeClass('mobile-menu-active');
            $('.df-mobile-menu-container').removeClass('menu-container-active');
            $('.df-mobile-menu-container').fadeOut('slow');
            $('#df-float-menu-id').addClass('df-float-menu-show');
        });
    });

    // mobile menu misc
    // ==================================================
    $('.jp-container-mobile-menu').jScrollPane({
        autoReinitialise: true,
    });

    (function($) {
        $('<span  class="btnshow"></span>').insertBefore('.df-navi ul.sub-menu, .df-navi ul.children, .df-topbar-right .top-navigation ul.sub-menu, .df-topbar-right top-navigation ul.children');
    })(jQuery);

    (function($) {
        $('<span  class="btnshow"></span>').insertBefore('.category-acc ul.children');
        //ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
        $('span.btnshow').click(function() {


            //REMOVE THE ON CLASS FROM ALL BUTTONS
            $(this).removeClass('onacc');
            //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
            $(this).next().slideUp('normal');
            //IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
            if($(this).next().is(':hidden') == true) {
                //ADD THE ON CLASS TO THE BUTTON
                $(this).addClass('onacc');
                //OPEN THE SLIDE
                $(this).next().slideDown('normal');
            } 
        });
    /*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
    })(jQuery);
    jQuery('.df-mobile-menu li.menu-item-has-children > a').each(function() {
        var href_menu_child = $(this).attr('href');
        if (href_menu_child == '#') {
        
            $(this).click(function(e) {  
                e.preventDefault();
                
                $(this).next().removeClass('onacc');

                $(this).next().next().slideUp('normal');
               
                if($(this).next().next().is(':hidden') == true) {


                    $(this).next().addClass('onacc');

                    $(this).next().next().slideDown('normal');

                } 

            });
        };/*end if href_menu_child*/
    }); /*end each menu item has children*/


}


// =========================================================================================
// 21. filter category
// =========================================================================================
    if (windowWidth < 780) {

        if (jQuery('.filter-cat-blog').length == 0) {
                jQuery('#options-blog-sort').prepend('<div class="filter-cat-blog">Filter By : </div>');
        }
 
            jQuery('.filter-cat-blog').on('click',function(event) {
                if (jQuery(this).parent().hasClass('active-hover')) {
                    jQuery(this).parent().removeClass('active-hover');

                }else{
                    jQuery(this).parent().addClass('active-hover');
                }
            });

    } else {
        jQuery('.filter-cat-blog').remove();
    }


}); // End jQuery Doc ready


// =========================================================================================
// resize function
// =========================================================================================
jQuery( window ).resize(function($) {
    var $ = jQuery,
        windowWidth = jQuery(window).width(),
        fixed  = jQuery('.df-navibar-fixed-left-active, .df-navibar-fixed-right-active').length;

    if (windowWidth > 959) {
// =========================================================================================
// Mega Menu
// =========================================================================================
        // fixed width find
        jQuery('.mega-width-header-fixed').each(function() {
            var class_str = $(this).attr('class'),
                index1 = class_str.indexOf('menu-data-width-'),
                index2 = class_str.indexOf('-size'),
                width_header_fixed = class_str.substring(index1+16,index2);
                $(this).find('> .sub-nav').css('width', width_header_fixed);
        });
     
        // take image into background
        jQuery('.df-mega-menu').each(function() {
            if ($(this).find('> a > .mega-icon > img').length != '0') {
                $(this).addClass('df-mega-menu-img');
                var background_megamenu = $(this).find('> a > .mega-icon > img').attr('src');
                background_megamenu = 'url("' +background_megamenu+'")' 
                $(this).find('> .sub-nav ').css('background', background_megamenu);
                $(this).find('> .sub-nav ').css('background-repeat', 'no-repeat');
                $(this).find('> .sub-nav ').css('background-position', 'right bottom');
                $(this).find('ul ul').css('background', 'transparent');
            };
        });
        if ($('.mega-position-right').length && fixed == '0') {
            // subnav mega right
            jQuery('.df-navi').each(function() {
                var nav_width = $(this).parent().parent('.df-navibar-inner').width();
                 
                $(this).find('.mega-position-right.mega-column-2').hover( function(){
                    var left_position = $(this).position().left,
                        menu_right = $(this);
                        menu_width = nav_width * 0.4 - menu_right.width();
                        left_position = left_position - menu_width;
                        menu_right.find('> .sub-nav').css('left', left_position + 'px');
                });

                $(this).find('.mega-position-right.mega-column-3').hover( function(){
                    var left_position = $(this).position().left,
                        menu_right = $(this);
                        menu_width = nav_width * 0.6 - menu_right.width();
                        left_position = left_position - menu_width;
                        menu_right.find('> .sub-nav').css('left', left_position + 'px');
                });

                $(this).find('.mega-position-right.mega-column-4').hover( function(){
                    var left_position = $(this).position().left,
                        menu_right = $(this);
                        menu_width = nav_width * 0.8 - menu_right.width();
                        left_position = left_position - menu_width;
                        menu_right.find('> .sub-nav').css('left', left_position + 'px');
                });
            });
        }/*mega menu position right*/
        // subnav mega center
        if ($('.mega-position-center').length && fixed == '0') {
            jQuery('.df-navi').each(function() {
                
                var nav_width = $(this).parent().parent('.df-navibar-inner').width();

                $(this).find('.mega-position-center.mega-column-2').hover( function(){
                    var left_position = $(this).position().left,
                        menu_center = $(this);
                        menu_width = nav_width * 0.4 - menu_center.width();
                        left_position = left_position - menu_width * 0.5;
                        menu_center.find('> .sub-nav').css('left', left_position + 'px');
                });

                $(this).find('.mega-position-center.mega-column-3').hover( function(){
                    var left_position = $(this).position().left,
                        menu_center = $(this);
                        menu_width = nav_width * 0.6 - menu_center.width();
                        left_position = left_position - menu_width * 0.5;
                        menu_center.find('> .sub-nav').css('left', left_position + 'px');
                });

                $(this).find('.mega-position-center.mega-column-4').hover( function(){
                    var left_position = $(this).position().left,
                        menu_center = $(this);
                        menu_width = nav_width * 0.8 - menu_center.width();
                        left_position = left_position - menu_width * 0.5;
                        menu_center.find('> .sub-nav').css('left', left_position + 'px');
                });
            });
        }/*mega menu position center*/


    } else {/*else mobile menu*/
// =========================================================================================
//   mobile menu
// =========================================================================================
function init_mobile_menu_right(){
        $('body').addClass('mobile-menu-active').trigger('df_body_change');
        $('.df-mobile-menu-container').addClass('menu-container-active');
        $('#df-float-menu-id').removeClass('df-float-menu-show');
        $('#wrapper').addClass('animate-right-to-left');
        $('.df-mobile-menu-container').fadeIn('slow');

        containerJsp_mobile_menu = jQuery('.jp-container-mobile-menu');
        window_height= $(window).height() - 50;
        containerJsp_mobile_menu.css('height', window_height);
}
if (windowWidth < 959) {
    // if swipe left mobile menu
    // ==================================================
        $("#wrapper").swipe( {
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
            init_mobile_menu_right();
        },
        threshold:200
        });
     
    // if buttuon click mobile menu
    // ==================================================
 
        $('.df-mobile-menu-wrapper').on('touchend click', function(event) {
            init_mobile_menu_right();
        }); 


    $('.df-mobile-menu-button-close').on('click', function(event) {
            $('#wrapper').removeClass('animate-right-to-left');
            $('body').removeClass('mobile-menu-active');
            $('.df-mobile-menu-container').removeClass('menu-container-active');
            $('#df-float-menu-id').addClass('df-float-menu-show');
            $('.df-mobile-menu-container').fadeOut('slow');

          
    });

    $('body').on('df_body_change', function() {
        $('.mobile-menu-active #content,.mobile-menu-active .col-full').bind('touchend click', function(event) {
            $('#wrapper').removeClass('animate-right-to-left');
            $('body').removeClass('mobile-menu-active');
            $('.df-mobile-menu-container').removeClass('menu-container-active');
            $('#df-float-menu-id').addClass('df-float-menu-show');
            $('.df-mobile-menu-container').fadeOut('slow');
        });
    });

    // mobile menu misc
    // ==================================================
    $('.jp-container-mobile-menu').jScrollPane({
        autoReinitialise: true,
    });

    (function($) {
        if ($('.df-mobile-menu .btnshow').length < 1) {
            $('<span  class="btnshow"></span>').insertBefore('.df-navi ul.sub-menu, .df-navi ul.children, .df-topbar-right .top-navigation ul.sub-menu, .df-topbar-right top-navigation ul.children');
            $('span.btnshow').click(function() {


                //REMOVE THE ON CLASS FROM ALL BUTTONS
                $(this).removeClass('onacc');
                //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
                $(this).next().slideUp('normal');
                //IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
                if($(this).next().is(':hidden') == true) {
                    //ADD THE ON CLASS TO THE BUTTON
                    $(this).addClass('onacc');
                    //OPEN THE SLIDE
                    $(this).next().slideDown('normal');
                } 
            });
            jQuery('.df-mobile-menu li.menu-item-has-children > a').each(function() {
                var href_menu_child = $(this).attr('href');

                if (href_menu_child == '#') {
                
                    $(this).click(function(e) {  
                        e.preventDefault();
                        
                        $(this).next().removeClass('onacc');

                        $(this).next().next().slideUp('normal');
                       
                        if($(this).next().next().is(':hidden') == true) {

                            $(this).next().addClass('onacc');

                            $(this).next().next().slideDown('normal');

                        } 

                    });
                };/*end if href_menu_child*/
            }); /*end each menu item has children*/
        };
    })(jQuery);

 
}
}/*end else if 959*/

// =========================================================================================
// filter category
// =========================================================================================
    if (windowWidth < 780) {

        if (jQuery('.filter-cat-blog').length == 0) {
                jQuery('#options-blog-sort').prepend('<div class="filter-cat-blog">Filter By : </div>');
        }
 
            jQuery('.filter-cat-blog').on('click',function(event) {
                if (jQuery(this).parent().hasClass('active-hover')) {
                    jQuery(this).parent().removeClass('active-hover');

                }else{
                    jQuery(this).parent().addClass('active-hover');
                }
            });

    } else {
        jQuery('.filter-cat-blog').remove();
    }

}); /*end window resize*/
