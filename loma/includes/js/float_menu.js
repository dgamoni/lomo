jQuery(document).ready(function($) {
    var fixed  = $('.df-navibar-fixed-left-active, .df-navibar-fixed-right-active').length;
    var $head = $('.df-float-menu');
        $head.attr('class', 'df-float-menu ' + 'df-float-menu-hide');
        windowWidth = $(window).width();
        $('body').addClass('float_noactive');

        if (fixed == 0) {
            windowWidth = $(window).width();
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
}); /*end document ready*/ 

 