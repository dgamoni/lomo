jQuery(document).ready(function($) {
	// jQuery('body').css('overflow', 'hidden');
});
 
jQuery(window).load(function() {
	// left: 37, up: 38, right: 39, down: 40,
	// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
	// var keys = [37, 38, 39, 40];

	// function preventDefault(e) {
	//   e = e || window.event;
	//   if (e.preventDefault)
	//       e.preventDefault();
	//   e.returnValue = false;  
	// }

	// function keydown(e) {
	//     for (var i = keys.length; i--;) {
	//         if (e.keyCode === keys[i]) {
	//             preventDefault(e);
	//             return;
	//         }
	//     }
	// }

	// function wheel(e) {
	//   preventDefault(e);
	// }

	// function disable_scroll() {
	//   if (window.addEventListener) {
	//       window.addEventListener('DOMMouseScroll', wheel, false);
	//   }
	//   window.onmousewheel = document.onmousewheel = wheel;
	//   document.onkeydown = keydown;
	// }

	// function enable_scroll() {
	//     if (window.removeEventListener) {
	//         window.removeEventListener('DOMMouseScroll', wheel, false);
	//     }
	//     window.onmousewheel = document.onmousewheel = document.onkeydown = null;  
	// }

   // enable_scroll();
	// jQuery('body').css('overflow', 'auto');
	// jQuery('.ajax_loader').fadeTo('slow', 0, function() {
	// 	jQuery(this).hide();
	// });

	var ajax_loader = jQuery('.ajax_loader');

    // if ( 'fadeOut' == page_loader.page_loader_animation ) {
    	ajax_loader.addClass('fadeOut animated');
	// } else if ( 'rotateOutUpRight' == page_loader.page_loader_animation ) {
 //    	ajax_loader.addClass('rotateOutUpRight animated');
	// } else if ( 'zoomOut' == page_loader.page_loader_animation ) {
 //    	ajax_loader.addClass('zoomOut animated');
	// } else if ( 'rollOut' == page_loader.page_loader_animation ) {
 //    	ajax_loader.addClass('rollOut animated');
	// }   


    	setTimeout( function() {
    	jQuery('.ajax_loader').hide();
		}, 1000 );
});