<?php
/**
 * Plugin Name:       Swiper Toolkit
 * Plugin URI:        https://github.com/guisfus/wp-swiper-toolkit
 * Description:       A lightweight developer-focused WordPress plugin for loading Swiper and managing custom slider initializations.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            guisfus
 * Author URI:        https://github.com/guisfus
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       swiper-toolkit
 *
 * @package SwiperToolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SWIPER_TOOLKIT_VERSION', '1.0.0' );
define( 'SWIPER_TOOLKIT_FILE', __FILE__ );
define( 'SWIPER_TOOLKIT_PATH', plugin_dir_path( SWIPER_TOOLKIT_FILE ) );
define( 'SWIPER_TOOLKIT_URL', plugin_dir_url( SWIPER_TOOLKIT_FILE ) );

/**
 * Enqueue Swiper and custom slider initialization assets on the frontend.
 *
 * @return void
 */
function swiper_toolkit_enqueue_assets() {
	$swiper_css_path = SWIPER_TOOLKIT_PATH . 'assets/swiper/swiper-bundle.min.css';
	$swiper_css_ver  = file_exists( $swiper_css_path ) ? (string) filemtime( $swiper_css_path ) : '12.1.4';

	wp_enqueue_style(
		'swiper-toolkit-swiper',
		SWIPER_TOOLKIT_URL . 'assets/swiper/swiper-bundle.min.css',
		array(),
		$swiper_css_ver
	);

	$swiper_js_path = SWIPER_TOOLKIT_PATH . 'assets/swiper/swiper-bundle.min.js';
	$swiper_js_ver  = file_exists( $swiper_js_path ) ? (string) filemtime( $swiper_js_path ) : '12.1.4';

	wp_enqueue_script(
		'swiper-toolkit-swiper',
		SWIPER_TOOLKIT_URL . 'assets/swiper/swiper-bundle.min.js',
		array(),
		$swiper_js_ver,
		true
	);

	$init_js_path = SWIPER_TOOLKIT_PATH . 'assets/js/swiper-init.js';
	$init_js_ver  = file_exists( $init_js_path ) ? (string) filemtime( $init_js_path ) : SWIPER_TOOLKIT_VERSION;

	wp_enqueue_script(
		'swiper-toolkit-init',
		SWIPER_TOOLKIT_URL . 'assets/js/swiper-init.js',
		array( 'swiper-toolkit-swiper' ),
		$init_js_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'swiper_toolkit_enqueue_assets' );
