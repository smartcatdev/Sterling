<?php
/**
 * Sterling functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sterling
 */

if ( ! function_exists( 'sterling_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );       
    
function sterling_setup() {
    
    if ( !defined( 'STERLING_VERSION' ) ):
        define( 'STERLING_VERSION', "0.0.1" );
    endif;
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sterling, use a find and replace
	 * to change 'sterling' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sterling', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'sterling' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

        // Set up the Wordpress custom header feature   
        add_theme_support( 'custom-header', array( 
            'default-image'          => get_template_directory_uri() . '/inc/images/header.jpg',
            'width'                  => 980,
            'height'                 => 60,
            'flex-height'            => true,
            'flex-width'             => true,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => true,
            'default-text-color'     => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
            'video'                  => false
        ) );
        
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sterling_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'sterling_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sterling_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sterling_content_width', 640 );
}
add_action( 'after_setup_theme', 'sterling_content_width', 0 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 *Load the theme functions file.
 */
require get_template_directory() . '/inc/sterling/sterling.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
