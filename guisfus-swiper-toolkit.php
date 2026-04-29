<?php
/**
 * Plugin Name:       Guisfus Swiper Toolkit
 * Plugin URI:        https://github.com/guisfus/guisfus-swiper-toolkit
 * Description:       A lightweight developer-focused WordPress plugin for loading Swiper and managing custom slider initializations.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            guisfus
 * Author URI:        https://github.com/guisfus
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       guisfus-swiper-toolkit
 *
 * @package GuisfusSwiperToolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GUISFUS_SWIPER_TOOLKIT_VERSION', '1.0.0' );
define( 'GUISFUS_SWIPER_TOOLKIT_FILE', __FILE__ );
define( 'GUISFUS_SWIPER_TOOLKIT_PATH', plugin_dir_path( GUISFUS_SWIPER_TOOLKIT_FILE ) );
define( 'GUISFUS_SWIPER_TOOLKIT_URL', plugin_dir_url( GUISFUS_SWIPER_TOOLKIT_FILE ) );

/**
 * Enqueue Swiper and custom slider initialization assets on the frontend.
 *
 * @return void
 */
function guisfus_swiper_toolkit_enqueue_assets() {
	$swiper_css_path = GUISFUS_SWIPER_TOOLKIT_PATH . 'assets/swiper/swiper-bundle.min.css';
	$swiper_css_ver  = file_exists( $swiper_css_path ) ? (string) filemtime( $swiper_css_path ) : '12.1.4';

	wp_enqueue_style(
		'guisfus-swiper-toolkit-swiper',
		GUISFUS_SWIPER_TOOLKIT_URL . 'assets/swiper/swiper-bundle.min.css',
		array(),
		$swiper_css_ver
	);

	$swiper_js_path = GUISFUS_SWIPER_TOOLKIT_PATH . 'assets/swiper/swiper-bundle.min.js';
	$swiper_js_ver  = file_exists( $swiper_js_path ) ? (string) filemtime( $swiper_js_path ) : '12.1.4';

	wp_enqueue_script(
		'guisfus-swiper-toolkit-swiper',
		GUISFUS_SWIPER_TOOLKIT_URL . 'assets/swiper/swiper-bundle.min.js',
		array(),
		$swiper_js_ver,
		true
	);

	$init_js_path = GUISFUS_SWIPER_TOOLKIT_PATH . 'assets/js/swiper-init.js';
	$init_js_ver  = file_exists( $init_js_path ) ? (string) filemtime( $init_js_path ) : GUISFUS_SWIPER_TOOLKIT_VERSION;

	wp_enqueue_script(
		'guisfus-swiper-toolkit-init',
		GUISFUS_SWIPER_TOOLKIT_URL . 'assets/js/swiper-init.js',
		array( 'guisfus-swiper-toolkit-swiper' ),
		$init_js_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'guisfus_swiper_toolkit_enqueue_assets' );
