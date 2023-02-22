<?php
/**
 * Configuration media.
 *
 * @package moare/moare-basic
 */

namespace Moare_Basic\Media;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hard Crop size images.
 */
function hard_crop_images() {

	add_image_size( 'medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );

}
add_action( 'init', __NAMESPACE__ . '\hard_crop_images' );
