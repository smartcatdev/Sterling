<?php
/**
 * Kenza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kenza
 */

if ( ! function_exists( 'kenza_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function kenza_setup() {

        if ( !defined( 'KENZA_VERSION' ) ):
            define( 'KENZA_VERSION', "1.0.4" );
        endif;
        
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Kenza, use a find and replace
         * to change 'kenza' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'kenza', get_template_directory() . '/languages' );

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
            'menu-primary'      => esc_html__( 'Primary', 'kenza' ),
            'menu-secondary'    => esc_html__( 'Secondary', 'kenza' ),
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
            'width'                  => 1350,
            'height'                 => 650,
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
        
        register_default_headers( array(
            'camera' => array(
                'url'           => get_template_directory_uri() . '/inc/images/header.jpg',
                'thumbnail_url' => get_template_directory_uri() . '/inc/images/header.jpg',
                'description'   => __( 'camera', 'kenza' )
        ) ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'kenza_custom_background_args', array(
            'default-color' => '404040',
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
            'height'      => 400,
            'width'       => 400,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        
    }
    
endif;
add_action( 'after_setup_theme', 'kenza_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kenza_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'kenza_content_width', 1350 );
}
add_action( 'after_setup_theme', 'kenza_content_width', 0 );


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

require get_template_directory() . '/inc/kenza/KenzaPostMeta.php';

/**
 * Load the theme functions file.
 */
require get_template_directory() . '/inc/kenza/kenza.php';

/**
 * Load the TGM file.
 */
require get_template_directory() . '/inc/tgm.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}
