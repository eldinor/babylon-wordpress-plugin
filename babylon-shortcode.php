<?php
/**
 * Plugin Name: Babylon 3D Viewer for Wordpress
 * Plugin URI: http://igiuk.com/babylon-3d-wordpress/
 * Description: Display 3D models and 3D scene with the help of shortcode [babylon]URL[/babylon] to use the 3D Viewer in Wordpress posts and pages, Woocommerce products, Elementor blocks etc. Supports GLTF, GLB, STL, OBJ+MTL and BABYLON files upload and demonstration as default viewing experience for 3D models. All aspects of this experience are configurable. If you need more control, you may use <babylon></babylon> tag in any Wordpress HTML block and configure all needed parameters (light, camera position, camera behaviour, rotating etc). Shortcode: [babylon]URL-OF-3D-FILE[/babylon]. Supports external URLs. 
 * Version: 0.31
 * Author: Andrei Stepanov
 * Author URI: http://igiuk.com/babylon-3d-wordpress/
 * Licence: GNU General Public License v3.0
 * Licence URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: babylon-shortcode
 * GitHub Plugin URI: https://github.com/eldinor/babylon-wordpress-plugin
 */

// SECURITY: to ensure PHP execution is only allowed when it is included as part of the core system.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Adding new MIME types.
function babylonviewer_upload_mime_types( $mimes ) {
 
// Add new allowed MIME types here.
    $mimes['gltf'] = 'model/gltf+json';
    $mimes['glb'] = 'model/gltf-binary';
    $mimes['obj'] = 'model/obj';
    $mimes['mtl'] = 'model/mtl';
    $mimes['stl'] = 'model/stl';
    $mimes['babylon'] = 'model/babylon+json';
// Return the array back to the function with our added MIME type(s).
    return $mimes;
}
add_filter( 'upload_mimes', 'babylonviewer_upload_mime_types' );

// Add allowed filetypes.
function babylonviewer_correct_filetypes( $data, $file, $filename, $mimes, $real_mime ) {

    if ( ! empty( $data['ext'] ) && ! empty( $data['type'] ) ) {
      return $data;
    }

    $wp_file_type = wp_check_filetype( $filename, $mimes );

// Check for the file type you want to enable, e.g. 'gltf'.
    if ( 'gltf' === $wp_file_type['ext'] ) {
      $data['ext']  = 'gltf';
      $data['type'] = 'model/gltf+json';
    }
    if ( 'glb' === $wp_file_type['ext'] ) {
      $data['ext']  = 'glb';
      $data['type'] = 'model/glb-binary';
    }
    if ( 'babylon' === $wp_file_type['ext'] ) {
      $data['ext']  = 'babylon';
      $data['type'] = 'model/babylon+json';
    }
        if ( 'obj' === $wp_file_type['ext'] ) {
      $data['ext']  = 'obj';
      $data['type'] = 'model/obj';
    }
        if ( 'mtl' === $wp_file_type['ext'] ) {
      $data['ext']  = 'mtl';
      $data['type'] = 'model/mtl';
    }
        if ( 'stl' === $wp_file_type['ext'] ) {
      $data['ext']  = 'stl';
      $data['type'] = 'model/stl';
    }

    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'babylonviewer_correct_filetypes' , 10, 5 );


// Adding Babylon Viewer into header
function babylonviewer_call() {

/*
if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'babylon') ) {
wp_enqueue_script( 'babylon-viewer', esc_url_raw( 'https://cdn.babylonjs.com/viewer/babylon.viewer.js' ), array(), null, true );
}
*/
// write inside the loop


   if ( strpos( get_the_content(), '[babylon]' ) !== false || strpos( get_the_content(), '</babylon>' ) !== false ) {
    wp_enqueue_script( 'babylon-viewer', esc_url_raw( 'https://cdn.babylonjs.com/viewer/babylon.viewer.js' ), array(), null, true );
}
  //  } //END IF Babylon shortcode or tag exists
} // END babylonviewer_call()

add_action( 'wp_enqueue_scripts', 'babylonviewer_call' );

// Adding Babylon Viewer shortcode
function babylonviewer_shortcode($atts = [], $content = null) {
    $url = esc_url_raw($content);
    $content = '<babylon ';
    $content .=	'model="';
 	$content .= $url;
 	$content .= '"></babylon>';

    return $content;
}
add_shortcode('babylon', 'babylonviewer_shortcode');
