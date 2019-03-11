/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Banner blogger avatar
	wp.customize( 'tw_blogger_avatar', function( value ) {
		value.bind( function( to ) {
			$('.banner-area .avatar-container img').attr( 'src', to );
		} );
	} );
	//Banner blogger name
	wp.customize( 'tw_blogger_name', function( value ) {
		value.bind( function( to ) {
			$('.banner-area .writer-name').text( to );
		} );
	} );
	//Banner background
	wp.customize( 'tw_banner_image', function( value ) {
		value.bind( function( to ) {
			$('.banner-area').css( 'background-image', "url(" + to + ")" );
		} );
	} );
	//Footer copyright info
	wp.customize( 'tw_favicon', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$('#site-favicon').attr('href', to );
			} else {
				
			}
		} );
	} );
	//Footer copyright info
	wp.customize( 'tw_footer_info', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$('.site-footer .site-info').text( to );
			} else {
				$('.site-footer .site-info').text( '&copy; 2014 20theme.' );
			}
		} );
	} );
} )( jQuery );
