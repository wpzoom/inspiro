<?php

/**
 * Prevents from creating different image sizes than default thumbnail, medium, large
 * Images are created on demand
 *
 * @global array $_wp_additional_image_sizes
 * @param bool|array   $out  Whether to short-circuit the image downsize.
 * @param int          $id   Attachment ID.
 * @param string|int[] $size Requested image size.
 * @return bool|array
 */

add_filter( 'image_downsize', 'inspiro_media_downsize', 10, 3 );

function inspiro_media_downsize( $out, $id, $size ) {

	if ( ! is_string( $size ) ) {
		return false;
	}

	// Only handle sizes registered with add_image_size(); core serves the rest.
	global $_wp_additional_image_sizes;
	if ( ! isset( $_wp_additional_image_sizes[ $size ] ) ) {
		return false;
	}

	// Only real images can be resized on the fly. Documents such as PDFs also
	// carry a 'sizes' array (preview thumbnails), so the media library asks for
	// every registered size on them too. Resizing a PDF makes Imagick render it
	// through Ghostscript on every request, which is very slow and never succeeds.
	if ( ! wp_attachment_is_image( $id ) ) {
		return false;
	}

	$imagedata = wp_get_attachment_metadata( $id );
	if ( ! is_array( $imagedata ) ) {
		return false;
	}

	// If image size exists let WP serve it like normally.
	if ( isset( $imagedata['sizes'][ $size ] ) ) {
		return false;
	}

	$width  = $_wp_additional_image_sizes[ $size ]['width'];
	$height = $_wp_additional_image_sizes[ $size ]['height'];
	$crop   = $_wp_additional_image_sizes[ $size ]['crop'];

	// When the original is too small for this size nothing can be generated.
	// Decide that from the stored dimensions instead of loading the image
	// editor, otherwise the failed attempt would repeat on every request.
	if ( ! empty( $imagedata['width'] ) && ! empty( $imagedata['height'] ) ) {
		if ( ! image_resize_dimensions( $imagedata['width'], $imagedata['height'], $width, $height, $crop ) ) {
			return false;
		}
	}

	// Don't retry a failed generation within the same request.
	static $failed = array();
	$key = $id . '|' . $size;
	if ( isset( $failed[ $key ] ) ) {
		return false;
	}

	$file = get_attached_file( $id );
	if ( ! $file || ! file_exists( $file ) ) {
		$failed[ $key ] = true;
		return false;
	}

	// Make the new thumb.
	$resized = image_make_intermediate_size( $file, $width, $height, $crop );
	if ( ! $resized ) {
		$failed[ $key ] = true;
		return false;
	}

	// Save image meta, or WP can't see that the thumb exists now.
	$imagedata['sizes'][ $size ] = $resized;
	wp_update_attachment_metadata( $id, $imagedata );

	// Return the array for displaying the resized image.
	$att_url = wp_get_attachment_url( $id );

	return array( dirname( $att_url ) . '/' . $resized['file'], $resized['width'], $resized['height'], true );
}

/**
 * Prevent resize on upload
 * @param array $sizes
 * @return array
 */
function inspiro_media_prevent_resize_on_upload( $sizes ) {
	// Removing these defaults might cause problems, so we don't

	$default_sizes = array(
		'inspiro-featured-image'        => $sizes[ 'inspiro-featured-image' ],
		'inspiro-loop'                  => $sizes[ 'inspiro-loop' ],
		'inspiro-loop@2x'               => $sizes[ 'inspiro-loop@2x' ],
		'thumbnail'                     => $sizes[ 'thumbnail' ],
		'medium'                        => $sizes[ 'medium' ],
		'large'                         => $sizes[ 'large' ]
	);
	
	if( has_image_size( 'portfolio_item-thumbnail' ) && has_image_size( 'portfolio_item-thumbnail@2x' ) ) {
		$default_sizes['portfolio_item-thumbnail'] = $sizes[ 'portfolio_item-thumbnail' ];
		$default_sizes['portfolio_item-thumbnail@2x'] = $sizes[ 'portfolio_item-thumbnail@2x' ];
	};

	return $default_sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'inspiro_media_prevent_resize_on_upload' );
