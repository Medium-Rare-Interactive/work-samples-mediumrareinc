<?php
/**
 * dream_md functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dream_md
 */

if ( ! function_exists( 'dream_md_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dream_md_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dream_md, use a find and replace
		 * to change 'dream_md' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dream_md', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Mega Menu', 'dream_md' ),
			'menu-2' => esc_html__( 'Primary Menu', 'dream_md' ),
			'menu-3' => esc_html__( 'Mobile Menu', 'dream_md' ),
			'menu-4' => esc_html__( 'Mobile Buttons Menu', 'dream_md' ),
			'menu-5' => esc_html__( 'Landing Page Menu', 'dream_md' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'dream_md_custom_background_args', array(
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
add_action( 'after_setup_theme', 'dream_md_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dream_md_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dream_md_content_width', 640 );
}
add_action( 'after_setup_theme', 'dream_md_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dream_md_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dream_md' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'dream_md' ),
		'id'            => 'btm_widget_1',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Address 1', 'dream_md' ),
		'id'            => 'btm_widget_2',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Address 2', 'dream_md' ),
		'id'            => 'btm_widget_3',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Address 4', 'dream_md' ),
		'id'            => 'btm_widget_4',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'dream_md' ),
		'id'            => 'footer_1',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'dream_md' ),
		'id'            => 'footer_2',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'dream_md' ),
		'id'            => 'footer_3',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Mini Footer 1', 'dream_md' ),
		'id'            => 'mini_footer_1',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Mini Footer 2', 'dream_md' ),
		'id'            => 'mini_footer_2',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Mini Footer 3', 'dream_md' ),
		'id'            => 'mini_footer_3',
		'description'   => esc_html__( 'Add widgets here.', 'dream_md' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'dream_md_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dream_md_scripts() {
	wp_enqueue_style( 'dream_md-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dream_md-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dream_md-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dream_md_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Add svg MIME type support
 *
 * @param $mimes
 *
 * @author codeawesome
 * @return mixed
 */
function codeawesome_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'codeawesome_mime_types' );

/**
 * Enqueue SVG javascript and stylesheet in admin
 * @author codeawesome
 */

function codeawesome_svg_enqueue_scripts( $hook ) {
	wp_enqueue_style( 'fadupla-svg-style', get_theme_file_uri( '/css/svg.css' ) );
	wp_enqueue_script( 'fadupla-svg-script', get_theme_file_uri( '/js/svg.js' ), 'jquery' );
	wp_localize_script( 'fadupla-svg-script', 'script_vars',
		array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'admin_enqueue_scripts', 'codeawesome_svg_enqueue_scripts' );


/**
 * Ajax get_attachment_url_media_library
 * @author codeawesome
 */
function codeawesome_get_attachment_url_media_library() {
	$url          = '';
	$attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
	if ( $attachmentID ) {
		$url = wp_get_attachment_url( $attachmentID );
	}
	echo $url;
	die();
}

add_action( 'wp_ajax_svg_get_attachment_url', 'codeawesome_get_attachment_url_media_library' );

add_filter('walker_nav_menu_start_el', 'append_da_damn_hover_popup', 15, 2);
function append_da_damn_hover_popup($item_output, $item) {
    if (! get_field('sub_menu_fields', $item)) {
        return $item_output;
    }
    $popup = '<div class="mega_menu__inn">';
    $popup .= get_field('sub_menu_fields', $item);
    $popupt .= '</div>';
    return $item_output.$popup;
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-primary"';
}