<?php
/**
 * Smart Electronics Theme Functions
 *
 * @package SmartElectronics
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Constants
 */
define( 'SMART_THEME_VERSION', '1.0.0' );
define( 'SMART_THEME_DIR', get_template_directory() );
define( 'SMART_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function smart_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Add custom image sizes
    add_image_size( 'smart-product-thumb', 300, 300, true );
    add_image_size( 'smart-product-medium', 600, 600, true );
    add_image_size( 'smart-product-large', 1200, 1200, true );
    add_image_size( 'smart-hero', 1920, 800, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'smart-electronics' ),
        'footer'    => __( 'Footer Menu', 'smart-electronics' ),
        'mobile'    => __( 'Mobile Menu', 'smart-electronics' ),
        'top-bar'   => __( 'Top Bar Menu', 'smart-electronics' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Add support for WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Load text domain
    load_theme_textdomain( 'smart-electronics', SMART_THEME_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'smart_theme_setup' );

/**
 * Set content width
 */
function smart_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'smart_content_width', 1280 );
}
add_action( 'after_setup_theme', 'smart_content_width', 0 );

/**
 * Enqueue Scripts and Styles
 */
function smart_enqueue_scripts() {
    // Styles
    wp_enqueue_style( 'smart-main-style', SMART_THEME_URI . '/dist/css/main.css', array(), SMART_THEME_VERSION );
    wp_enqueue_style( 'smart-theme-style', get_stylesheet_uri(), array( 'smart-main-style' ), SMART_THEME_VERSION );

    // Scripts
    wp_enqueue_script( 'smart-main-script', SMART_THEME_URI . '/dist/js/main.bundle.js', array(), SMART_THEME_VERSION, true );

    // Localize script
    wp_localize_script( 'smart-main-script', 'smartTheme', array(
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'smart-nonce' ),
        'siteUrl'   => home_url( '/' ),
        'themeUrl'  => SMART_THEME_URI,
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'smart_enqueue_scripts' );

/**
 * Register Widget Areas
 */
function smart_widgets_init() {
    // Main Sidebar
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'smart-electronics' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'smart-electronics' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Shop Sidebar
    register_sidebar( array(
        'name'          => __( 'Shop Sidebar', 'smart-electronics' ),
        'id'            => 'sidebar-shop',
        'description'   => __( 'Add widgets here to appear in shop sidebar.', 'smart-electronics' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer Widgets (4 columns)
    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf( __( 'Footer Column %d', 'smart-electronics' ), $i ),
            'id'            => 'footer-' . $i,
            'description'   => sprintf( __( 'Add widgets here to appear in footer column %d.', 'smart-electronics' ), $i ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }
}
add_action( 'widgets_init', 'smart_widgets_init' );

/**
 * Include Theme Files
 */
require_once SMART_THEME_DIR . '/inc/template-functions.php';
require_once SMART_THEME_DIR . '/inc/template-tags.php';
require_once SMART_THEME_DIR . '/inc/customizer.php';
require_once SMART_THEME_DIR . '/inc/woocommerce.php';
require_once SMART_THEME_DIR . '/inc/ajax-functions.php';
require_once SMART_THEME_DIR . '/inc/custom-post-types.php';
require_once SMART_THEME_DIR . '/inc/admin-functions.php';

/**
 * Security Enhancements
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
