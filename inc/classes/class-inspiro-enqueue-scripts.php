<?php
/**
 * Load scripts & styles
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inspiro
 * @since   Inspiro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_Enqueue_Scripts' ) ) {

	/**
	 * Inspiro_Enqueue_Scripts initial setup
	 *
	 * @since 1.0.0
	 */
	class Inspiro_Enqueue_Scripts {

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_pages_settings_meta' ) );
			add_filter( 'body_class', array( $this, 'add_hide_title_class' ) );

			add_action( 'wp_head', array( $this, 'javascript_detection' ), 0 );
			add_action( 'wp_head', array( $this, 'pingback_header' ) );
			add_action( 'wp_head', array( $this, 'colors_css_wrap' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		}


		/**
		 *  Registers custom meta field for the 'page' post type.
		 */
		public function register_pages_settings_meta() {
			register_post_meta( 'page', '_inspiro_hide_title', array(
					'type'         => 'boolean',
					'single'       => true,
					'show_in_rest' => true,
					'auth_callback' => function() {
						return current_user_can( 'edit_posts' );
					}
			) );
		}

		/**
		 *  Add class to body if hidden title meta is checked
		 */
		public function add_hide_title_class( $classes ) {

			if ( is_page() && get_post_meta( get_the_ID(), '_inspiro_hide_title', true ) ) {
				$classes[] = 'inspiro-hide-page-title';
			}

			return $classes;
		}



		/**
		 * Enqueue scripts and styles for all admin pages.
		 */
		public function admin_scripts( $hook ) {
			wp_enqueue_style( 'inspiro-admin', inspiro_get_assets_uri( 'admin', 'css' ), array(), INSPIRO_THEME_VERSION );
		
			if ( 'appearance_page_page-inspiro' != $hook ) {
				wp_enqueue_script('jquery');
		
				wp_enqueue_script(
					'inspiro-admin-pages',
					inspiro_get_assets_uri( 'admin-pages', 'js' ),
					array( 'jquery' ),
					INSPIRO_THEME_VERSION,
					true
				);
		
				wp_localize_script( 'inspiro-admin-pages', 'inspiro_admin_pages_vars', array(
					'ajax_url'        => admin_url( 'admin-ajax.php' ),
					'nonce'           => wp_create_nonce( 'inspiro-admin-pages' ),
					'installingText'  => esc_html__( 'Installing...', 'inspiro' ),
					'redirectingText' => esc_html__( 'Redirecting...', 'inspiro' ),
					'import_url'      => esc_url( admin_url( 'admin.php?page=inspiro-demo' ) ),
				) );
		
				wp_enqueue_script( 'jquery-ui' );
				wp_enqueue_script( 'jquery-ui-tabs' );
			}
		}
		
		/**
		 * Enqueues scripts and styles.
		 */
		public function enqueue_scripts() {
			// Add custom fonts, used in the main stylesheet.
			Inspiro_Fonts_Manager::render_fonts();

			// Theme stylesheet.
			wp_enqueue_style( 'inspiro-style', inspiro_get_assets_uri( 'style', 'css' ), array(), INSPIRO_THEME_VERSION );

			// Load the dark colorscheme.
			if ( 'dark' === inspiro_get_theme_mod( 'colorscheme' ) || is_customize_preview() ) {
				wp_enqueue_style( 'inspiro-colors-dark', inspiro_get_assets_uri( 'colors-dark', 'css' ), array( 'inspiro-style' ), INSPIRO_THEME_VERSION );
			}

			wp_enqueue_script( 'inspiro-lite-js-plugins', inspiro_get_assets_uri( 'plugins', 'js' ), array( 'jquery' ), INSPIRO_THEME_VERSION, true );

			wp_enqueue_script( 'inspiro-lite-script', inspiro_get_assets_uri( 'scripts', 'js' ), array(
				'inspiro-lite-js-plugins',
				'jquery'
			), INSPIRO_THEME_VERSION, true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			$theme_css_data = apply_filters( 'inspiro/dynamic_theme_css', '' );
			wp_add_inline_style( 'inspiro-style', $theme_css_data );
		}

		/**
		 * Enqueues styles for the block-based editor.
		 *
		 * @since 1.0.0
		 */
		public function block_editor_styles() {
    		global $post;

			// Block styles.
			wp_enqueue_style( 'inspiro-block-editor-style', inspiro_get_assets_uri( 'editor-style', 'css' ), array(), INSPIRO_THEME_VERSION );

			// Add custom fonts.
			Inspiro_Fonts_Manager::render_fonts();

			if ( is_admin() && isset( $post ) && get_post_type( $post->ID ) === 'page' ) {

				wp_enqueue_script(
						'inspiro-sidebar-controls',
						inspiro_get_assets_uri( 'sidebar-controls', 'js' ),
						array('wp-plugins', 'wp-editor', 'wp-edit-post', 'wp-blocks', 'wp-dom-ready', 'wp-element', 'wp-components', 'wp-data', 'wp-i18n'),
						INSPIRO_THEME_VERSION,
						true
				);

			}
		}

		/**
		 * Handles JavaScript detection.
		 *
		 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
		 *
		 * @since 1.0.0
		 */
		public function javascript_detection() {
			echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
		}

		/**
		 * Add a pingback url auto-discovery header for singularly identifiable articles.
		 */
		public function pingback_header() {
			if ( is_singular() && pings_open() ) {
				printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
			}
		}

		/**
		 * Display custom color CSS.
		 */
		public function colors_css_wrap() {
			$colorscheme = inspiro_get_theme_mod( 'colorscheme' );
			$hex         = inspiro_get_theme_mod( 'colorscheme_hex' );
			$palette_id  = get_theme_mod( 'color_palette', 'default' );

			?>
			<style type="text/css" id="custom-theme-colors" data-hex="<?php echo esc_attr( $hex ); ?>" data-palette="<?php echo esc_attr( $palette_id ); ?>" data-scheme="<?php echo esc_attr( $colorscheme ); ?>">
				<?php echo inspiro_palette_colors_css(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</style>
			<?php
		}
	}

	new Inspiro_Enqueue_Scripts();
}
