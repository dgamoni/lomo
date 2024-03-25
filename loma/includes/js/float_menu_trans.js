jQuery(document).ready(function($) {
    var fixed  = $('.df-navibar-fixed-left-active, .df-navibar-fixed-right-active').length,
        transparent_active = $('.df-fancy-header-parallax, .df-fancy-header-video, #df-slider-header, #df-fancy-header').length;
        windowWidth = jQuery(window).width();
        $('body').addClass('float_noactive');

      
        if (fixed == 0) {
                if (transparent_active == 1) {
                    $('#masthead .df-navibar').addClass('df-menu-transparent');
                }
                var $head = $('.df-float-menu');
                $( '#content' ).each( function(i) {
                    var $el = $( this );
                    $el.waypoint( function( direction ) {
                        if( direction === 'down') {
                            $('body').removeClass('float_noactive');

                            if ($('#wpadminbar').length) {
                                $head.attr('class', 'df-float-menu ' + 'df-float-menu-show-admin');
                            }
                            else {
                                $head.attr('class', 'df-float-menu ' + 'df-float-menu-show');
                            }
                            if (dfGlobals.isMobile) {

                                $('.df-mobile-menu-button').on('touchend click', function(event) {
                                    event.preventDefault();
                                    $head.attr('class', 'df-float-menu ' + 'df-float-menu-hide');
                                });

                                $('#content, .col-full').on('touchend click', function(event) {
                                    event.preventDefault();

                                      if ($('#wpadminbar').length) {
                                          $head.attr('class', 'df-float-menu ' + 'df-float-menu-show-admin');
                                      }
                                      else {
                                          $head.attr('class', 'df-float-menu ' + 'df-float-menu-show');
                                      }

                                });
                            } /*dfGlobals.isMobile*/
 
                        }
                        else if( direction === 'up'){
                            $('body').addClass('float_noactive');

                            $head.attr('class', 'df-float-menu ' + 'df-float-menu-hide');
                              $('#sb-site').on('touchend click', function(event) {
                                  event.preventDefault();
                                if ($('body').hasClass('float_noactive')) {
                                    $head.attr('class', 'df-float-menu ' + 'df-float-menu-hide');
                                };
                              });
                        }
                    }, { offset: '-500px' } );
                } );
            
        }/*fixed right and left*/
        else {
            var $head = $('.df-float-menu');
            $head.attr('class', 'df-float-menu ' + 'df-float-menu-hide');
            $('#masthead .df-navibar').removeClass('df-menu-transparent');
 
        }/*else fixed right and left*//*window width*/

}); /*end document ready*/ 
 