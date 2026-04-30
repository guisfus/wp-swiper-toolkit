<?php
/**
 * Plugin Name:       Swiper Toolkit
 * Plugin URI:        https://github.com/guisfus/wp-swiper-toolkit
 * Description:       A lightweight developer-focused WordPress plugin for loading Swiper and managing custom slider initializations.
 * Version:           1.1.1
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            guisfus
 * Author URI:        https://github.com/guisfus
 * Update URI:        false
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       swiper-toolkit
 *
 * @package SwiperToolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STK_VERSION', '1.1.1' );
define( 'STK_FILE', __FILE__ );
define( 'STK_PATH', plugin_dir_path( STK_FILE ) );
define( 'STK_URL', plugin_dir_url( STK_FILE ) );

/**
 * Enqueue Swiper and custom slider initialization assets on the frontend.
 *
 * @return void
 */
function stk_enqueue_assets() {
	$swiper_css_path = STK_PATH . 'assets/swiper/swiper-bundle.min.css';
	$swiper_css_ver  = file_exists( $swiper_css_path ) ? (string) filemtime( $swiper_css_path ) : '12.1.4';

	wp_enqueue_style(
		'swiper-toolkit-swiper',
		STK_URL . 'assets/swiper/swiper-bundle.min.css',
		array(),
		$swiper_css_ver
	);

	$swiper_js_path = STK_PATH . 'assets/swiper/swiper-bundle.min.js';
	$swiper_js_ver  = file_exists( $swiper_js_path ) ? (string) filemtime( $swiper_js_path ) : '12.1.4';

	wp_enqueue_script(
		'swiper-toolkit-swiper',
		STK_URL . 'assets/swiper/swiper-bundle.min.js',
		array(),
		$swiper_js_ver,
		true
	);

	$init_js_path = STK_PATH . 'assets/js/swiper-init.js';
	$init_js_ver  = file_exists( $init_js_path ) ? (string) filemtime( $init_js_path ) : STK_VERSION;

	wp_enqueue_script(
		'swiper-toolkit-init',
		STK_URL . 'assets/js/swiper-init.js',
		array( 'swiper-toolkit-swiper' ),
		$init_js_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'stk_enqueue_assets' );
