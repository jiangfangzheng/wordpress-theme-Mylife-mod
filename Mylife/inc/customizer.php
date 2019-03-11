<?php  
/**
 * Mylife Theme Customizer
 *
 * @package Mylife
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function twenty_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section(
		'tw_theme_options',
		array(
			'title' => __('Theme Options', 'twenty-theme'),
			'priority' => 201
		)
	);
	$wp_customize->add_setting(
		'tw_blogger_avatar',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_setting(
		'tw_blogger_name',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_setting(
		'tw_banner_image',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_setting(
		'tw_favicon',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_setting(
		'tw_footer_info',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'tw_blogger_name',
			array(
				'label' => __('Blogger Name', 'twenty-theme'),
				'settings' => 'tw_blogger_name',
				'section' => 'tw_theme_options'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'tw_blogger_avatar',
			array(
				'label' => __('Avatar', 'twenty-theme'),
				'settings' => 'tw_blogger_avatar',
				'section' => 'tw_theme_options'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'tw_banner_image',
			array(
				'label' => __('Banner Image', 'twenty-theme'),
				'settings' => 'tw_banner_image',
				'section' => 'tw_theme_options'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'tw_favicon',
			array(
				'label' => __('Site favicon', 'twenty-theme'),
				'settings' => 'tw_favicon',
				'section' => 'tw_theme_options'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'tw_footer_info',
			array(
				'label' => __('Footer Info', 'twenty-theme'),
				'settings' => 'tw_footer_info',
				'section' => 'tw_theme_options'
			)
		)
	);
}
add_action( 'customize_register', 'twenty_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function twenty_customize_preview_js() {
	wp_enqueue_script( 'twenty_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'twenty_customize_preview_js' );
?>