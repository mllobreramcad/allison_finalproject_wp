<?php
/**
 * Dumbbells-Kitchen functions and definitions
 *
 * @package Dumbbells-Kitchen
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'dumbbells_kitchen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function dumbbells_kitchen_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Dumbbells-Kitchen, use a find and replace
	 * to change 'dumbbells_kitchen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dumbbells_kitchen', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dumbbells_kitchen' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // dumbbells_kitchen_setup
add_action( 'after_setup_theme', 'dumbbells_kitchen_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function dumbbells_kitchen_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'dumbbells_kitchen_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'dumbbells_kitchen_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function dumbbells_kitchen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dumbbells_kitchen' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'dumbbells_kitchen_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function dumbbells_kitchen_scripts() {
	wp_enqueue_style( 'Dumbbells-Kitchen-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'passion-one', 'http://use.edgefonts.net/passion-one.js', false, false, false );

	wp_enqueue_script( 'Dumbbells-Kitchen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'Dumbbells-Kitchen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'Dumbbells-Kitchen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'dumbbells_kitchen_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
 register_post_type( 'post-workout_food', 
 array(
      'labels' => array(
      	'name' => __( 'Post-Workout Foods' ),
      	'singular_name' => __( 'Post-Workout Food' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add New Post-Workout Food' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Post-Workout Food' ),
      	'new_item' => __( 'New Post-Workout Food' ),
      	'view' => __( 'View Post-Workout Food' ),
      	'view_item' => __( 'View Post-Workout Food' ),
      	'search_items' => __( 'Search Post-Workout Foods' ),
      	'not_found' => __( 'No Post-Workout Foods found' ),
      	'not_found_in_trash' => __( 'No Post-Workout Foods found in Trash' ),
      	'parent' => __( 'Parent Post-Workout Food' ),
      ),
 'public' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'post-workout_foods'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );
}

wp_enqueue_script( 'jquery', false, false, false, false );
wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
