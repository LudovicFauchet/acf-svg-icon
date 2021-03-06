<?php
/*
 Plugin Name: Advanced Custom Fields: SVG Icon
 Version: 1.0.1
 Plugin URI: http://www.beapi.fr
 Description: Add svg icon selector
 Author: BE API Technical team
 Author URI: http://www.beapi.fr
 Domain Path: languages
 Text Domain: acf-svg-icon

 ----

 Copyright 2016 BE API Technical team (human@beapi.fr)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

define( 'ACF_SVG_ICON_VER', '1.0.1' );
define( 'ACF_SVG_ICON_URL', plugin_dir_url( __FILE__ ) );
define( 'ACF_SVG_ICON_DIR', plugin_dir_path( __FILE__ ) );

class acf_field_svg_icon_plugin {

	/**
	 * Constructor.
	 *
	 * Load plugin's translation and register acf svg fields.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		add_action( 'init', array( __CLASS__, 'load_translation' ), 1 );

		// Register ACF fields
		add_action( 'acf/include_field_types', array( __CLASS__, 'register_field_v5' ) );
	}

	/**
	 * Load plugin translation.
	 *
	 * @since 1.0.0
	 */
	public static function load_translation() {
		load_plugin_textdomain(
			'acf-svg-icon',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);
	}

	/**
	 * Register SVG icon field for ACF v5.
	 *
	 * @since 1.0.0
	 */
	public static function register_field_v5() {
		include_once( ACF_SVG_ICON_DIR . 'fields/field-v5.php' );
		new acf_field_svg_icon();
	}
}

/**
 * Init plugin.
 *
 * @since 1.0.0
 */
function acf_field_svg_icon() {
	new acf_field_svg_icon_plugin();
}
add_action( 'plugins_loaded', 'acf_field_svg_icon' );
