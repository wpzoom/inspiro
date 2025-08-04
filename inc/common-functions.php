<?php
/**
 * Inspiro Lite: Common functions
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

/**
 * Get assets url depending on constant SCRIPT_DEBUG.
 * If value of this constant is `true` then theme will load unminified assets
 *
 * @since 1.0.0
 *
 * @param  string $filename The file name.
 * @param  string $filetype The file type [css|js].
 * @param  string $folder   The folder name.
 * @return string           The full assets url.
 */
function inspiro_get_assets_uri( $filename, $filetype, $folder = 'assets/' ) {
	$assets_uri = '';

	// Directory and Extension.
	$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
	$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
	$file_rtl    = ( is_rtl() ) ? '-rtl' : '';

	$css_uri = INSPIRO_THEME_URI . $folder . 'css/' . $dir_name . '/';
	$js_uri  = INSPIRO_THEME_URI . $folder . 'js/' . $dir_name . '/';

	if ( 'css' === $filetype ) {
		$assets_uri = $css_uri . $filename . $file_rtl . $file_prefix . '.' . $filetype;
	} elseif ( 'js' === $filetype ) {
		$assets_uri = $js_uri . $filename . $file_prefix . '.' . $filetype;
	}

	return $assets_uri;
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Inspiro 1.0.0
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function inspiro_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'inspiro-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'inspiro_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inspiro_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'inspiro' ),
			'id'            => 'sidebar',
			'description'   => __( 'Main sidebar that is displayed on the right and can be toggled by clicking on the menu icon.', 'inspiro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clear"></div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'inspiro' ),
			'id'            => 'blog-sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'inspiro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'inspiro' ),
			'id'            => 'footer_1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'inspiro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'inspiro' ),
			'id'            => 'footer_2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'inspiro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'inspiro' ),
			'id'            => 'footer_3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'inspiro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'inspiro' ),
			'id'            => 'footer_4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'inspiro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Header Social Icons', 'inspiro' ),
			'id'            => 'header_social',
			'description'   => __( 'Widget area in the header. Install the "Social Icons Widget by WPZOOM" plugin and add the widget here.', 'inspiro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title"><span>',
			'after_title'   => '</span></h3>',
		)
	);


	register_sidebar(
		array(
			'name'          => __( 'Footer Instagram Bar', 'inspiro' ),
			'id'            => 'footer_instagram_section',
			'description'   => __( 'Widget area for "Instagram widget by WPZOOM".', 'inspiro' ),
			'before_widget' => '<section class="widget %2$s" id="%1$s">',
			'after_widget'  => '<div class="clear"></div></section>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'inspiro_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Read more' link.
 *
 * @since Inspiro 1.0.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Read more' link prepended with an ellipsis.
 */
function inspiro_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Post title. */
		sprintf( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'inspiro' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'inspiro_excerpt_more' );

/**
 * Filters the `sizes` value in the header image markup.
 *
 * @since Inspiro 1.0.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function inspiro_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'inspiro_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Inspiro 1.0.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function inspiro_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'inspiro_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Inspiro 1.0.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function inspiro_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'inspiro_widget_tag_cloud_args' );

/**
 * Gets unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since Inspiro 1.0.0
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function inspiro_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Show custom logo or blog title and description (backward compatibility)
 */
function inspiro_custom_logo() {
	has_custom_logo() ? the_custom_logo() : printf( '<a href="%1$s" title="%2$s" class="custom-logo-text">%3$s</a>', esc_url( home_url() ), esc_html( get_bloginfo( 'description' ) ), esc_html( inspiro_get_theme_mod( 'custom_logo_text' ) ) );
}

/**
 * Displays the sidebar after the openning <body> tag.
 */
function display_sidebar_body_open() {
	get_sidebar();
}
add_action( 'wp_body_open', 'display_sidebar_body_open' );

if ( ! function_exists( 'inspiro_comment' ) ) {
	/**
	 * Custom Comments Template
	 *
	 * @param string  $comment Comment text.
	 * @param array   $args Comment args.
	 * @param boolean $depth Comment depth.
	 * @return void
	 */
	function inspiro_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		switch ( $comment->comment_type ) :
			case '':
			case 'comment':
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>">
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 50 ); ?>
						<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

						<div class="comment-meta commentmetadata"><a
								href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php
								/* translators: %1$s: Comment date %2$s: Comment time */
								printf( __( '%1$s @ %2$s', 'inspiro' ), get_comment_date(), get_comment_time() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
								</a>
							<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'depth'      => $depth,
										'max_depth'  => $args['max_depth'],
										'reply_text' => __( 'Reply', 'inspiro' ),
										'before'     => '&nbsp;·&nbsp;&nbsp;',
									)
								)
							);
							?>
							<?php edit_comment_link( __( 'Edit', 'inspiro' ), '&nbsp;·&nbsp;&nbsp;' ); ?>

						</div>
						<!-- .comment-meta .commentmetadata -->

					</div>
					<!-- .comment-author .vcard -->
					<?php if ( '0' === $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'inspiro' ); ?></em>
						<br/>
					<?php endif; ?>

					<div class="comment-body"><?php comment_text(); ?></div>

				</div><!-- #comment-<?php comment_ID(); ?>  -->

				<?php
				break;
			case 'pingback':
			case 'trackback':
				?>
				<li class="post pingback">
				<p><?php esc_html_e( 'Pingback:', 'inspiro' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'inspiro' ), ' ' ); ?></p>
				<?php
				break;
		endswitch;
	}
}

/**
 * WooCommerce compatibility.
 */
$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
if ( ! is_array( $active_plugins ) ) {
	$active_plugins = array();
}
if ( in_array( 'woocommerce/woocommerce.php', $active_plugins ) ) {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

if ( ! function_exists( 'inspiro_get_prop' ) ) :

	/**
	 * Get a specific property of an array without needing to check if that property exists.
	 *
	 * Provide a default value if you want to return a specific value if the property is not set.
	 *
	 * @since  1.3.0
	 * @access public
	 * @author Gravity Forms - Easiest Tool to Create Advanced Forms for Your WordPress-Powered Website.
	 * @link  https://www.gravityforms.com/
	 *
	 * @param array  $array   Array from which the property's value should be retrieved.
	 * @param string $prop    Name of the property to be retrieved.
	 * @param string $default Optional. Value that should be returned if the property is not set or empty. Defaults to null.
	 *
	 * @return null|string|mixed The value
	 */
	function inspiro_get_prop( $array, $prop, $default = null ) {
		if ( ! is_array( $array ) && ! ( is_object( $array ) && $array instanceof ArrayAccess ) ) {
			return $default;
		}

		if ( ( isset( $array[ $prop ] ) && false === $array[ $prop ] ) ) {
			return false;
		}

		if ( isset( $array[ $prop ] ) ) {
			$value = $array[ $prop ];
		} else {
			$value = '';
		}

		return empty( $value ) && null !== $default ? $default : $value;
	}

endif;

if( ! function_exists( 'inspiro_get_page_by_title' ) ) {
	function inspiro_get_page_by_title( $page_title ) {

		$posts = get_posts(
			array(
				'post_type'              => 'page',
				'title'                  => $page_title,
				'post_status'            => 'all',
				'numberposts'            => 1,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,           
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);
		 
		if ( ! empty( $posts ) ) {
			$page_got_by_title = $posts[0];
		} else {
			$page_got_by_title = null;
		}
	
		return $page_got_by_title;
	}

}

// Check the status of a plugin
function inspiro_check_plugin_status( $plugin_slug ) {
	
	// Include necessary files for plugin activation
    if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    // Check if the plugin is active.
    if ( is_plugin_active( $plugin_slug ) ) {
        return 'active';
    }

    // Get all installed plugins.
    $all_plugins = get_plugins();

    // Check if the plugin is installed.
    if ( array_key_exists( $plugin_slug, $all_plugins ) ) {
        return 'installed';
    }

    // If not active or installed, it's not installed.
    return 'not_installed';
}


// Elementor tweaks
add_action( 'after_switch_theme', function() {
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_experiment-e_local_google_fonts', 'inactive' );

} );

function inspiro_store_elementor_defaults_on_theme_activation() {
    $default_settings = [
        'system_colors' => [
            [
                '_id' => 'primary',
                'title' => 'Primary',
                'color' => '#101010',
            ],
            [
                '_id' => 'secondary',
                'title' => 'Secondary',
                'color' => '#18b4aa',
            ],
            [
                '_id' => 'text',
                'title' => 'Text',
                'color' => '#444',
            ],
            [
                '_id' => 'accent',
                'title' => 'Accent',
                'color' => '#18b4aa',
            ],
        ],
        'system_typography' => [
            [
                '_id' => 'primary',
                'title' => 'Primary',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Onest',
                'typography_font_weight' => '600',
            ],
            [
                '_id' => 'secondary',
                'title' => 'Secondary',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '400',
            ],
            [
                '_id' => 'text',
                'title' => 'Text',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '400',
            ],
            [
                '_id' => 'accent',
                'title' => 'Accent',
                'typography_typography' => 'custom',
                'typography_font_family' => 'Inter',
                'typography_font_weight' => '500',
            ],
        ],
    ];

    update_option('inspiro_pending_elementor_defaults', $default_settings);
}
add_action('after_switch_theme', 'inspiro_store_elementor_defaults_on_theme_activation');


function inspiro_apply_pending_elementor_defaults() {
    // Exit if Elementor isn't ready
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    $defaults = get_option('inspiro_pending_elementor_defaults');
    if (empty($defaults)) {
        return;
    }

    $elementor = \Elementor\Plugin::instance();
    if ( ! isset( $elementor->kits_manager ) ) {
        return;
    }

    $kit = $elementor->kits_manager->get_active_kit();
    if ( ! $kit ) {
        return;
    }

    $kit_id = get_option('elementor_active_kit');
    $existing_settings = get_post_meta($kit_id, '_elementor_page_settings', true);

    if (empty($existing_settings) || (!isset($existing_settings['system_colors']) && !isset($existing_settings['system_typography']))) {
        $settings = is_array($existing_settings) ? array_merge($existing_settings, $defaults) : $defaults;
        $kit->save(['settings' => $settings]);
        update_post_meta($kit_id, '_elementor_page_settings', $settings);
    }

    // Remove option to prevent re-applying
    delete_option('inspiro_pending_elementor_defaults');
}
add_action('elementor/init', 'inspiro_apply_pending_elementor_defaults');



/**
 * Set default theme mods for fresh installations.
 * Uses WordPress's fresh_site option which is true only on fresh installations.
 */
function inspiro_set_fresh_site_mods() {
    // Only run on fresh sites
    if (get_option('fresh_site')) {
        set_theme_mod('hero_enable', false);
    }
}
add_action('after_setup_theme', 'inspiro_set_fresh_site_mods');

/**
 * Set default theme mods when switching from another theme.
 * This runs when a user switches from a different theme to this one.
 *
 * @param string $old_name Old theme name
 * @param WP_Theme $old_theme Instance of the old theme
 */
function inspiro_after_switch_theme($old_name, $old_theme) {
    // Store theme activation timestamp for usage tracking
    update_option('inspiro_theme_activated_at', current_time('timestamp'));
    
    // Don't run on fresh sites as that's handled by inspiro_set_fresh_site_mods
    if (!get_option('fresh_site')) {
        // Only set if the setting hasn't been explicitly set before
        if (!get_theme_mod('hero_enable', null)) {
            set_theme_mod('hero_enable', false);
        }
    }
}
add_action('after_switch_theme', 'inspiro_after_switch_theme', 10, 2);

/**
 * Get theme usage duration in human-readable format.
 *
 * @return array Array with usage time data or null if not available
 */
function inspiro_get_theme_usage_duration() {
    $activated_at = get_option('inspiro_theme_activated_at');
    
    if (!$activated_at) {
        return null;
    }
    
    $current_time = current_time('timestamp');
    $usage_seconds = $current_time - $activated_at;
    
    // Convert to days, hours, minutes
    $days = floor($usage_seconds / DAY_IN_SECONDS);
    $hours = floor(($usage_seconds % DAY_IN_SECONDS) / HOUR_IN_SECONDS);
    $minutes = floor(($usage_seconds % HOUR_IN_SECONDS) / MINUTE_IN_SECONDS);
    
    return array(
        'activated_at' => $activated_at,
        'current_time' => $current_time,
        'usage_seconds' => $usage_seconds,
        'usage_days' => $days,
        'usage_hours' => $hours,
        'usage_minutes' => $minutes,
        'formatted' => inspiro_format_usage_duration($days, $hours, $minutes)
    );
}

/**
 * Format usage duration into human-readable string.
 *
 * @param int $days Days
 * @param int $hours Hours  
 * @param int $minutes Minutes
 * @return string Formatted duration string
 */
function inspiro_format_usage_duration($days, $hours, $minutes) {
    if ($days > 0) {
        return sprintf(
            _n('%d day', '%d days', $days, 'inspiro'), $days
        ) . ($hours > 0 ? sprintf(', %d %s', $hours, _n('hour', 'hours', $hours, 'inspiro')) : '');
    } elseif ($hours > 0) {
        return sprintf(
            _n('%d hour', '%d hours', $hours, 'inspiro'), $hours
        ) . ($minutes > 0 ? sprintf(', %d %s', $minutes, _n('minute', 'minutes', $minutes, 'inspiro')) : '');
    } elseif ($minutes > 0) {
        return sprintf(_n('%d minute', '%d minutes', $minutes, 'inspiro'), $minutes);
    } else {
        return __('Less than a minute', 'inspiro');
    }
}
