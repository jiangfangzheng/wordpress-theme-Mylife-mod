<?php  
/**
 * Smoothie functions and definitions
 *
 * @package Mylife
 */
#-----------------------------------------------------------------
# Define Variables
#-----------------------------------------------------------------
define( 'THEMEDIR', get_template_directory() );
define( 'THEMEURL', get_template_directory_uri() );
define( 'INC_DIR', THEMEDIR . '/inc' );
define( 'INC_URL', THEMEURL . '/inc' );
define( 'ADMIN_DIR', INC_DIR . '/admin' );
define( 'ADMIN_URL', INC_URL . '/admin' );
define( 'IMGURL', THEMEURL . '/images' );
#-----------------------------------------------------------------
# Theme Setup
#-----------------------------------------------------------------
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 720; /* pixels */
}

if ( ! function_exists( 'mylife_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mylife_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'twenty-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 960, 400, true );
	add_image_size( 'post-thumb', 585, 180, true);
	add_image_size( 'photo-thumb', 400, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twenty-theme' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mylife_custom_background_args', array(
		'default-color' => '40607F',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

}
endif; // mylife_setup
add_action( 'after_setup_theme', 'mylife_setup' );

function mylife_infinite_scroll_render() {
	get_template_part( 'content/content', get_post_format() );
}

function mylife_scripts() {
	wp_enqueue_style( 'lightbox-style', THEMEURL . '/css/lightbox.css' );
	wp_enqueue_style( 'fontawesome-style', THEMEURL . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'reset-style', THEMEURL . '/css/reset.css' );
	wp_enqueue_style( 'mylife-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'infinitescroll', THEMEURL . '/js/jquery.infinitescroll.js', array('jquery'));
	wp_enqueue_script( 'imagesloaded', THEMEURL . '/js/imagesloaded.pkgd.min.js', array('jquery'));
	wp_enqueue_script( 'masonry', THEMEURL . '/js/masonry.pkgd.min.js', array('jquery', 'imagesloaded'));
	wp_enqueue_script( 'autosize', THEMEURL . '/js/jquery.autosize.js', array('jquery'));
	wp_enqueue_script( 'modernizr', THEMEURL . '/js/modernizr.custom.js');
	wp_enqueue_script( 'lightbox', THEMEURL . '/js/lightbox-2.6.min.js', array('jquery'));
	wp_enqueue_script( 'site', THEMEURL . '/js/site.js', array('jquery'), false, true);

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
	wp_localize_script('site','twenty_ajax',array(
           'ajaxurl' => admin_url('admin-ajax.php'),
           'contact_success' => __('your email send success!', 'twenty-theme'),
           'contact_failed' => __('Failed!', 'twenty-theme')
        ));
}
add_action( 'wp_enqueue_scripts', 'mylife_scripts' );

# 修改 WordPress 后台显示字体
function admin_lettering(){
    echo'<style type="text/css">
     body{ font-family: Microsoft YaHei;}
    </style>';
    }
add_action('admin_head', 'admin_lettering');

#-----------------------------------------------------------------
# Require
#-----------------------------------------------------------------
require_once (INC_DIR . '/customizer.php');
require_once (INC_DIR . '/shortcode.php');
require_once (INC_DIR . '/template-functions.php');
require_once (ADMIN_DIR . '/post-formats/cf-post-formats.php');
?>