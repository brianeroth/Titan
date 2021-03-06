<?php
/**
 * titan functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package titan
 */

if ( ! function_exists( 'titan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function titan_setup() {

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
	// use: wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'titan' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	// add_theme_support( 'html5', array(
	// 	'search-form',
	// 	'comment-form',
	// 	'comment-list',
	// 	'gallery',
	// 	'caption',
	// ) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'titan_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif;
add_action( 'after_setup_theme', 'titan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function titan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'titan_content_width', 640 );
}
add_action( 'after_setup_theme', 'titan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function titan_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'titan' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'titan' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'titan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function titan_scripts() {
	wp_enqueue_style( 'titan-style', get_stylesheet_uri(), null,  null);
    wp_enqueue_style( 'titan-style-main', get_template_directory_uri() . '/css/build/style.css', null, null );
	wp_enqueue_style( 'titan-style-gfont', 'URL TO GOOGLE FONT', false ); 
    wp_enqueue_script( 'titan_script-main', get_template_directory_uri() . '/js/build/production.min.js', array('jquery'), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'titan_scripts' );

/**
 * adds scripts to the <head></head>
 */
function titan_header_scripts_custom() {
	?>

<?php }
add_action( 'wp_head', 'titan_header_scripts_custom' );

/**
 * adds scripts to the footer of the site
 */
function titan_footer_scripts_custom() {
?>

<?php }
add_action( 'wp_footer', 'titan_footer_scripts_custom' );

/**
 * get the svg code for a specific svg from the build folder
 */
function include_svg( $svg, $return = false ){
    $svg_path = get_template_directory() . '/svg/build/' . $svg . '.svg';

    if(!file_exists($svg_path)){
        return false;
    }

    if($return){
        return file_get_contents($svg_path);
    }

    include( $svg_path );
}

/**
 * Removes the WordPress version number from anywhere it might be for security reasons
 * 
 * @return string an empty string that replaces the version number
 */
function wpbeginner_remove_version() {
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom post types and taxonomies
 */
require get_template_directory() . '/inc/custom-types.php';
