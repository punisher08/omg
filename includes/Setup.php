<?php

namespace OMG\Theme;
// Require the composer autoload for getting conflict-free access to enqueue
require_once get_template_directory() . '/vendor/autoload.php';
require_once get_template_directory() . '/includes/core/PostType.php';
require_once get_template_directory() . '/includes/core/Taxonomy.php';
require_once get_template_directory() . '/includes/Blocks.php';
require_once get_template_directory() . '/includes/Utility.php';

// GF Shortcode
require_once get_template_directory() . '/includes/gravity-form/GFRequestAQuote.php';

class Setup {

	public $enqueue;

	public function __construct() {

		// Instantiate
		$this->enqueue = new \WPackio\Enqueue(
			'omg',
			'dist',
			'1.0.0',
			'theme',
			false
		);
		// Enqueue a few of our entry points

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ], 99 );

		add_action( 'enqueue_block_assets', [ $this, 'enqueue_admin_assets' ] );

		add_filter( 'script_loader_tag', '\OMG\Theme\Setup::script_loader', 10, 3 );

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		add_filter( 'xmlrpc_enabled', '__return_false' );

		// ACF Config
		add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
		add_filter( 'acf/settings/save_json', '\OMG\Theme\Setup::acf_json_save_point' );
		add_filter( 'acf/settings/load_json', '\OMG\Theme\Setup::acf_json_load_point' );

		// Woocommerce
		add_action( 'after_setup_theme', '\OMG\Theme\Setup::declare_woo_support' );

		// Blocks
		add_action( 'init', '\OMG\Theme\Blocks::register_blocks' );
		add_filter( 'block_categories_all', '\OMG\Theme\Blocks::register_block_categories', 10, 2 );
		add_filter( 'init', '\OMG\Theme\Blocks::register_block_pattern_category' );
		add_action( 'after_setup_theme', '\OMG\Theme\Setup::register_gutenberg_options' );

		// Initialize Theme
		self::register_menus();
		self::register_widgets();
		self::register_image_sizes();
		self::register_post_types();
		self::register_taxonomy();
		self::register_option_pages();

		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
	}


	public function enqueue_assets() {
		// Enqueue files[0] (name = app) - entryPoint main
//		$this->enqueue->enqueue( 'blocks', 'main', [] );
		$assets      = $this->enqueue->enqueue( 'app', 'main', [
			'js_dep' => [ 'jquery' ],
		] );
		$entry_point = array_pop( $assets['js'] );
		wp_localize_script(
			$entry_point['handle'],
			'omgwpAjax',
			[
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'security_nonce' ),
			]
		);
	}

	public function enqueue_admin_assets() {
		// Enqueue files[0] (name = app) - entryPoint main
//		$this->enqueue->enqueue( 'app', 'main', [] );
		if ( ! is_admin() ) {
			return;
		}
		$this->enqueue->enqueue( 'blocks', 'main', [] );
	}

	public static function register_gutenberg_options() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-logo' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

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
		remove_theme_support( 'core-block-patterns' );
	}

	public static function register_menus() {
		// wp menus
		add_theme_support( 'menus' );
		register_nav_menus(
			[
				'main-nav'       => __( 'The Main Menu' ), // main nav in header
				'mobile-nav'     => __( 'The Mobile Menu' ), // mobile nav in header
				'footer-links'   => __( 'Footer Links' ), 
				'footer-links-2' => __( 'Footer Links 2' ), 
				'footer-links-3' => __( 'Footer Links 3' ), 
				'footer-links-4' => __( 'Footer Links 4' ), 
			]
		);
	}

	public static function register_widgets() {

		register_sidebar(
			[
				'name'          => __( 'Footer Widget One', 'omgwp' ),
				'id'            => 'footer-widget-one',
				'description'   => __( 'Add widgets here to appear in your footer.', 'omgwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-widget--one %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
		register_sidebar(
			[
				'name'          => __( 'Footer Widget Two', 'omgwp' ),
				'id'            => 'footer-widget-two',
				'description'   => __( 'Add widgets here to appear in your footer.', 'omgwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-widget--two %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
		register_sidebar(
			[
				'name'          => __( 'Footer Widget Three', 'omgwp' ),
				'id'            => 'footer-widget-three',
				'description'   => __( 'Add widgets here to appear in your footer.', 'omgwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-widget--three %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
		register_sidebar(
			[
				'name'          => __( 'Footer Widget Four', 'omgwp' ),
				'id'            => 'footer-widget-four',
				'description'   => __( 'Add widgets here to appear in your footer.', 'omgwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-widget--four %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
	}

	public static function register_image_sizes() {
		add_image_size( 'blog_thumbnail', 670, 446, false );
	}

	public static function register_post_types() {
//		add_action( 'after_switch_theme', '\OMG\Theme\Setup::flushRewriteRules' );
		foreach ( glob( get_template_directory() . '/includes/post-types/*.php' ) as $filename ) {
			require_once $filename;
		}
	}

	public static function register_taxonomy() {
//		add_action( 'after_switch_theme', '\OMG\Theme\Setup::flushRewriteRules' );
		foreach ( glob( get_template_directory() . '/includes/taxonomy/*.php' ) as $filename ) {
			require_once $filename;
		}
	}

	public static function acf_json_save_point( $path ) {
		$path = get_stylesheet_directory() . '/includes/acf-json';

		return $path;
	}

	public static function acf_json_load_point( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/includes/acf-json';

		return $paths;
	}

	public static function register_option_pages() {

		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( [
				'page_title' => 'OMG Settings',
				'menu_title' => 'OMG Settings',
				'menu_slug'  => 'theme-omg-settings',
				'capability' => 'edit_posts',
				'redirect'   => true,
				'position'   => '99'
			] );
		}
	}

	public static function declare_woo_support() {
		add_theme_support( 'woocommerce' );
	}

	public static function script_loader( $tag, $handle, $src ) {

		if ( $handle === 'main-js' ) {
			if ( false === stripos( $tag, 'async' ) ) {
				$tag = str_replace( ' src', ' async="async" src', $tag );
			}

			if ( false === stripos( $tag, 'defer' ) ) {
				$tag = str_replace( '<script ', '<script defer ', $tag );
			}
		}

		return $tag;
	}
}