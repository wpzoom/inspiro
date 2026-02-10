<?php
/**
 * Functions for the Customizer
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

/**
 * Sanitize the page layout options.
 *
 * @param string $input Page layout.
 */
function inspiro_sanitize_page_layout( $input ) {
	$valid = array(
		'full'       => esc_html__( 'Full width', 'inspiro' ),
		'side-right' => esc_html__( 'Sidebar on the right', 'inspiro' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function inspiro_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Sanitize the color palette selection.
 *
 * @param string $input Color palette ID.
 * @return string
 */
function inspiro_sanitize_color_palette( $input ) {
	$palettes = inspiro_get_color_palettes();

	if ( array_key_exists( $input, $palettes ) ) {
		return $input;
	}

	return 'default';
}

/**
 * Sanitize the display content.
 *
 * @param string $input Content to display.
 */
function inspiro_sanitize_display_content( $input ) {
	$valid = array( 'excerpt', 'full-content', 'none' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'excerpt';
}


/**
 * Sanitize the blog layout.
 *
 * @param string $input Content to blog layout.
 */
function inspiro_sanitize_blog_layout( $input ) {
	$valid = array( 'list', 'grid' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'list';
}

/**
 * Sanitize text alignment.
 *
 * @since 2.1.9
 *
 * @param string $input Text alignment value.
 * @return string Sanitized text alignment.
 */
function inspiro_sanitize_text_align( $input ) {
	$valid = array( 'left', 'center', 'right' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'center';
}

/**
 * Callback for sanitizing the header_button_url value.
 *
 * @since 1.2.5
 *
 * @param string $value URL.
 * @return string Sanitized URL.
 */
function inspiro_sanitize_header_button_url( $value ) {
	return esc_url_raw( trim( $value ) );
}

/**
 * Sanitize boolean for checkbox.
 *
 * @since 1.2.5
 *
 * @param bool $checked Whether or not a box is checked.
 * @return bool
 */
function inspiro_sanitize_checkbox( $checked = null ) {
	return (bool) isset( $checked ) && true === $checked;
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function inspiro_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're previewing the blog page.
 */
function inspiro_is_view_is_blog() {
	return is_home() || is_single();
}

/**
 * Return whether we're previewing the single page.
 */
function inspiro_is_view_is_single() {
	return is_single();
}

/**
 * Return whether we're on a view that supports a full width or sidebar right layout.
 */
function inspiro_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_front_page() || is_home() || is_single() );
}

/**
 * Return whether the blog layout is set to list.
 *
 * @since 2.1.9
 *
 * @return bool True if blog layout is list.
 */
function inspiro_is_blog_layout_list() {
	return 'list' === get_theme_mod( 'blog_layout', 'list' );
}

/**
 * Return whether the blog layout is set to grid.
 *
 * @since 2.1.9
 *
 * @return bool True if blog layout is grid.
 */
function inspiro_is_blog_layout_grid() {
	return 'grid' === get_theme_mod( 'blog_layout', 'list' );
}

/**
 * Get all registered image sizes with dimensions for select options.
 *
 * @since 2.1.9
 *
 * @return array Array of image sizes with labels.
 */
function inspiro_get_image_sizes_choices() {
	$sizes      = array();
	$size_names = get_intermediate_image_sizes();
	$size_data  = wp_get_registered_image_subsizes();

	foreach ( $size_names as $size ) {
		$label = ucwords( str_replace( array( '-', '_', '@' ), array( ' ', ' ', ' ' ), $size ) );

		if ( isset( $size_data[ $size ] ) ) {
			$w    = $size_data[ $size ]['width'];
			$h    = $size_data[ $size ]['height'];
			$crop = ! empty( $size_data[ $size ]['crop'] ) ? __( ' (cropped)', 'inspiro' ) : '';

			if ( 0 === $h ) {
				$label .= " ({$w}×auto{$crop})";
			} else {
				$label .= " ({$w}×{$h}{$crop})";
			}
		}

		$sizes[ $size ] = $label;
	}

	$sizes['full'] = __( 'Full Size (Original)', 'inspiro' );

	return $sizes;
}

/**
 * Sanitize image size selection.
 *
 * @since 2.1.9
 *
 * @param string $input Image size name.
 * @return string Sanitized image size.
 */
function inspiro_sanitize_image_size( $input ) {
	$valid = array_keys( inspiro_get_image_sizes_choices() );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'inspiro-loop';
}

/**
 * Checks whether the external header video is eligible to show on the current page.
 */
function inspiro_is_external_video_active() {
	$header_video_settings = get_header_video_settings();
	// Get header video mimeType.
	$mime_type = inspiro_get_prop( $header_video_settings, 'mimeType' );
	return is_header_video_active() && 'video/mp4' !== $mime_type;
}

/**
 * Sanitize select.
 *
 * @param string $choice  The value from the setting.
 * @param object $setting The selected setting.
 */
function inspiro_sanitize_choices( $choice, $setting ) {
	$choice  = sanitize_key( $choice );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $choice, $choices ) ? $choice : $setting->default );
}

/**
 * Sanitize multiple choices.
 *
 * @param array $value Array holding values from the setting.
 */
function inspiro_sanitize_multi_choices( $value ) {
	$value = ! is_array( $value ) ? explode( ',', $value ) : $value;
	return ( ! empty( $value ) ? array_map( 'sanitize_text_field', $value ) : array() );
}

/**
 * Sanitizes font-weight value.
 *
 * @param string $choice  The value from the setting.
 * @param object $setting The selected setting.
 */
function inspiro_sanitize_font_weight( $choice, $setting ) {
	$valid = array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );
	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}
	return $setting->default;
}

/**
 * Sanitize Font variant
 *
 * @param  mixed $input setting input.
 * @return mixed        setting input value.
 */
function inspiro_sanitize_font_variant( $input ) {
	if ( is_array( $input ) ) {
		$input = implode( ',', $input );
	}
	return sanitize_text_field( $input );
}

/**
 * Sanitizes integer.
 *
 * @param int $value The value from the setting.
 */
function inspiro_sanitize_integer( $value ) {
	if ( ! $value || is_null( $value ) ) {
		return $value;
	}
	return intval( $value );
}

/**
 * Sanitizes float.
 *
 * @param float $value The value from the setting.
 */
function inspiro_sanitize_float( $value ) {
	if ( ! $value || is_null( $value ) ) {
		return $value;
	}
	return floatval( $value );
}

/**
 * Retrieves theme modification value.
 *
 * @since 1.4.0
 *
 * @param string $name Theme modification name.
 * @return mixed
 */
function inspiro_get_theme_mod( $name ) {
	$default = Inspiro_Customizer::get_theme_mod_default_value( $name );
	return get_theme_mod( $name, $default );
}

/**
 * Add stacks fonts to the select system font.
 *
 * @since 1.7.6
 *
 * @param string $font font family.
 * @return mixed
 */
function inspiro_get_font_stacks( $font ) {

	$system_fonts = Inspiro_Font_Family_Manager::get_system_fonts();
	if( array_key_exists( $font, $system_fonts ) ) {
		if( isset( $system_fonts[ $font ]['stack'] ) ) {
			$font = $system_fonts[ $font ]['stack'];
		};
	}

	return $font;
}
