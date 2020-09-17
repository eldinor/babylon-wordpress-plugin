<?php
/**
 * Plugin Name: Babylon 3D Viewer for Wordpress
 * Plugin URI: http://igiuk.com/babylon-3d-wordpress/
 * Description: Display 3D content using a shortcode to insert in a page or post. Supports GLTF, GLB and BABYLON files upload. Shortcode: [babylon]URL-OF-3D-FILE[/babylon]
 * Version: 0.2
 * Text Domain: babylon_shortcode
 * Author: Andrei Stepanov
 * Author URI: http://igiuk.com/babylon-3d-wordpress/
 */

// SECURITY: to ensure PHP execution is only allowed when it is included as part of the core system.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Fixing Wordpress MIME checking system
function fix_wp_csv_mime_bug( $data, $file, $filename, $mimes ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext = $wp_filetype['ext'];
    $type = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );
}
add_filter( 'wp_check_filetype_and_ext', 'fix_wp_csv_mime_bug', 10, 4 );

// Adding custom MIME types
function custom_upload_mimes ( $existing_mimes=array() ) {
 	$existing_mimes['gltf'] = 'image/gltf';
 	$existing_mimes['glb'] = 'image/glb';
 	$existing_mimes['babylon'] = 'image/babylon';

	return $existing_mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');

// Adding Babylon Viewer into header
function babyloncall() {
wp_enqueue_script( 'babylon-viewer', esc_url_raw( 'https://cdn.babylonjs.com/viewer/babylon.viewer.js' ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'babyloncall' );

// Adding shortcode
function babylon_shortcode($atts = [], $content = null) {
    $url = $content;
    $content = "<babylon ";
    $content .=	"model=";
    $content .="\"";
 	$content .= $url;
 	$content .="\"";
 	$content .= "></babylon>";

    return $content;
}
add_shortcode('babylon', 'babylon_shortcode');
