(function($) {
	var blog = (function() {
		return {
			init: function() {
				$('#timeline').infinitescroll({
					loading: {
						finishedMsg: "",
						msgText: "",
						selector: ".infinite-loader",
				        img: "data:image/gif;base64,R0lGODlhEAALAPQAAP///wAAANra2tDQ0Orq6gcHBwAAAC8vL4KCgmFhYbq6uiMjI0tLS4qKimVlZb6+vicnJwUFBU9PT+bm5tjY2PT09Dk5Odzc3PLy8ra2tqCgoMrKyu7u7gAAAAAAAAAAACH5BAkLAAAAIf4aQ3JlYXRlZCB3aXRoIGFqYXhsb2FkLmluZm8AIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAEAALAAAFLSAgjmRpnqSgCuLKAq5AEIM4zDVw03ve27ifDgfkEYe04kDIDC5zrtYKRa2WQgAh+QQJCwAAACwAAAAAEAALAAAFJGBhGAVgnqhpHIeRvsDawqns0qeN5+y967tYLyicBYE7EYkYAgAh+QQJCwAAACwAAAAAEAALAAAFNiAgjothLOOIJAkiGgxjpGKiKMkbz7SN6zIawJcDwIK9W/HISxGBzdHTuBNOmcJVCyoUlk7CEAAh+QQJCwAAACwAAAAAEAALAAAFNSAgjqQIRRFUAo3jNGIkSdHqPI8Tz3V55zuaDacDyIQ+YrBH+hWPzJFzOQQaeavWi7oqnVIhACH5BAkLAAAALAAAAAAQAAsAAAUyICCOZGme1rJY5kRRk7hI0mJSVUXJtF3iOl7tltsBZsNfUegjAY3I5sgFY55KqdX1GgIAIfkECQsAAAAsAAAAABAACwAABTcgII5kaZ4kcV2EqLJipmnZhWGXaOOitm2aXQ4g7P2Ct2ER4AMul00kj5g0Al8tADY2y6C+4FIIACH5BAkLAAAALAAAAAAQAAsAAAUvICCOZGme5ERRk6iy7qpyHCVStA3gNa/7txxwlwv2isSacYUc+l4tADQGQ1mvpBAAIfkECQsAAAAsAAAAABAACwAABS8gII5kaZ7kRFGTqLLuqnIcJVK0DeA1r/u3HHCXC/aKxJpxhRz6Xi0ANAZDWa+kEAA7",
				    },
				    debug: true,
					behavior: "local",
				    nextSelector: ".pagination .nav-previous a",
					navSelector: ".pagination",
					itemSelector: "#timeline > li",
				});
/*
				$(window).unbind('.infscr');
				$('.pagination .nav-previous a').click(function(){
					$('#timeline').infinitescroll('retrieve');
				 	return false;
				});
*/
			}
		}
	})();
	var blog_single = (function() {
		return {
			init: function() {
				$('.comments-area').delegate('#comment','focus', function(){
		            $('#commentform').addClass('active');
		            $('.comment-form-comment textarea').autosize();
		        });
			}
		}
	})();
	var contact = (function() {
		return {
			init: function() {
				var ajaxurl = twenty_ajax.ajaxurl;
				$('#contact-form').submit(function(e) {
					$('#contact-form .info .loading-img').css('display', 'inline-block');
				    var data = $(this).serialize();
					$.post(ajaxurl, data, function(response) {

						if(response.code == 1){
							/* jika susccess*/
							$('#contact-form .info .loading-img').css('display', 'none');
							$('#contact-form .info .end-info').text(twenty_ajax.contact_success);
						}
						else {
							/*jika error*/
							$('#contact-form .info .loading-img').css('display', 'none');
							$('#contact-form .info .end-info').text(twenty_ajax.contact_failed);
						}
					});
					e.preventDefault();
				});
			}
		}
	})();
	var gallery = (function() {
		
		return {
			init: function() {
				var $container = jQuery('.photo-grid');
				$container.imagesLoaded(function() {
					$container.masonry({
						itemSelector: '.photo'
					});
				});

				$('.photo-grid').infinitescroll({
					loading: {
						finishedMsg: "",
						msgText: "",
						selector: ".infinite-loader",
				        img: "data:image/gif;base64,R0lGODlhEAALAPQAAP///wAAANra2tDQ0Orq6gcHBwAAAC8vL4KCgmFhYbq6uiMjI0tLS4qKimVlZb6+vicnJwUFBU9PT+bm5tjY2PT09Dk5Odzc3PLy8ra2tqCgoMrKyu7u7gAAAAAAAAAAACH5BAkLAAAAIf4aQ3JlYXRlZCB3aXRoIGFqYXhsb2FkLmluZm8AIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAEAALAAAFLSAgjmRpnqSgCuLKAq5AEIM4zDVw03ve27ifDgfkEYe04kDIDC5zrtYKRa2WQgAh+QQJCwAAACwAAAAAEAALAAAFJGBhGAVgnqhpHIeRvsDawqns0qeN5+y967tYLyicBYE7EYkYAgAh+QQJCwAAACwAAAAAEAALAAAFNiAgjothLOOIJAkiGgxjpGKiKMkbz7SN6zIawJcDwIK9W/HISxGBzdHTuBNOmcJVCyoUlk7CEAAh+QQJCwAAACwAAAAAEAALAAAFNSAgjqQIRRFUAo3jNGIkSdHqPI8Tz3V55zuaDacDyIQ+YrBH+hWPzJFzOQQaeavWi7oqnVIhACH5BAkLAAAALAAAAAAQAAsAAAUyICCOZGme1rJY5kRRk7hI0mJSVUXJtF3iOl7tltsBZsNfUegjAY3I5sgFY55KqdX1GgIAIfkECQsAAAAsAAAAABAACwAABTcgII5kaZ4kcV2EqLJipmnZhWGXaOOitm2aXQ4g7P2Ct2ER4AMul00kj5g0Al8tADY2y6C+4FIIACH5BAkLAAAALAAAAAAQAAsAAAUvICCOZGme5ERRk6iy7qpyHCVStA3gNa/7txxwlwv2isSacYUc+l4tADQGQ1mvpBAAIfkECQsAAAAsAAAAABAACwAABS8gII5kaZ7kRFGTqLLuqnIcJVK0DeA1r/u3HHCXC/aKxJpxhRz6Xi0ANAZDWa+kEAA7",
				    },
				    debug: true,
					behavior: "manual-trigger",
				    nextSelector: ".pagination .nav-previous a:first",
					navSelector: ".pagination",
					itemSelector: ".photo-grid > .photo",
				},
			    // trigger Masonry as a callback
				function( newElements ) {
					var $newElems = $( newElements );
					$container.masonry( 'appended', $newElems );
					
				});
				$(window).unbind('.infscr');
				$('.pagination .nav-previous a').click(function(){
					$('.photo-grid').infinitescroll('retrieve');
				 	return false;
				});
			}
		}
	})();
	var common = (function() {

		return {
			init: function() {
				//mobile menu
				common.menu();
				//smooth scroll
				
			},
			menu: function() {
				var $triggerBttn = $( '#trigger-overlay' ),
					$overlay = $( '.overlay' ),
					$closeBttn = $( '.overlay-close' );

				$triggerBttn.on( 'click', function() {
					$overlay.removeClass('close');
					$overlay.addClass('open');
				} );
				$closeBttn.on( 'click', function() {
					$overlay.removeClass('open');
					$overlay.addClass('close');
				} );
				// Back to top link
				$scrollTop = $( 'a.site-scroll-top' );
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$scrollTop.fadeIn("slow");
					} else {
						$scrollTop.fadeOut("slow");
					}
				});		
				$scrollTop.on('click', function() {
					$( 'html, body' ).animate({scrollTop:0}, 400);
					return false;
				} );
			}
		}
	})();
	
	var init = {
		 /** Blog **/
		 blog: function() {
		 	blog.init();
		 },
		 /** Single **/
		 blog_single: function() {
		 	blog_single.init();
		 },
		 /** Gallery **/
		 gallery: function() {
		 	gallery.init();
		 },
		 /** Contact **/
		 contact: function() {
		 	contact.init();
		 },
		 /** Some common functions **/
		 common: function() {
		 	common.init();
		 }
		
	};
	
	// Initialization
	var $page = jQuery('.site-content').attr('id');
	if (init[$page]) {
        init[$page]();
        init['common']();
    } else {
    	init['common']();
    }
})(jQuery);