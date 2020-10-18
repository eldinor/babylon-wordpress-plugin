# Babylon 3D Wordpress Plugin
Display 3D content with Wordpress using a shortcode to insert in a page or post. 
Supports GLTF, GLB and BABYLON files upload. 
Shortcode: [babylon]URL-OF-3D-FILE[/babylon]

**Demo**: https://igiuk.com/babylon-3d-wordpress/

## Installation and Usage
1. Standard WordPress plugin installation: go to Plugins -> Add New – upload .zip file.
  1.1 If you use older version of this plugin, first deactivate it and delete. Plugin doesn't contain any user data.
2. Activate the plugin.
3. Upload 3D file in .GLTF, .GLB or .BABYLON format.
Or
Use external URL.
4. Publish in WordPress posts, pages, Woocommerce products with the help of shortcode: 
[babylon]URL-OF-3D-FILE[/ babylon]
Make sure there are no spaces between ]URL-and-brackets[ .
5. Another option is to publish 3D files with the standard WordPress HTML block and have more ways to configure Babylon Viewer. Read more at https://doc.babylonjs.com/extensions/configuring_the_viewer

## Changelog
Version 0.3. Updating...
Version 0.2. Corrected - Notice: wp_enqueue_script was called incorrectly.
