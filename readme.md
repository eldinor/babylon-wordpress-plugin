# Babylon Viewer 3D Wordpress Plugin

### Version 0.31

**Display 3D models, 3D animations and 3D scenes** with the help of shortcode [babylon]URL-OF-3D-FILE[/babylon] to use the **3D Viewer in Wordpress posts and pages, Woocommerce products, Elementor blocks** etc. 

**Supports GLTF, GLB, STL, OBJ+MTL** and **BABYLON** files upload and demonstration. 

**Babylon Viewer 3D Wordpress Plugin** automatically **provides** a **default viewing experience for 3D models**. **All aspects** of this experience **are configurable**. See [Configuring Babylon.js Viewer](https://doc.babylonjs.com/extensions/configuring_the_viewer "Configuring Babylon.js Viewer") for more information on customizing the viewing experience.

If you need **more control**, you may use `<babylon></babylon>` tag in any Wordpress HTML block and **configure all needed parameters** (light, camera position, camera behaviour, rotating etc).

**Shortcode:** [babylon]URL-OF-3D-FILE[/babylon]. Supports external URLs.

**Demo**: https://igiuk.com/babylon-3d-wordpress/

## Installation and Usage
1. Standard WordPress plugin installation: go to Plugins -> Add New – upload .zip file. 
**If you use older version of this plugin, first deactivate it and delete**. Plugin doesn't contain any user data.
2. Activate the plugin.
3. **Upload** 3D file in **GLTF, GLB, STL, OBJ+MTL** or **BABYLON** format. If you upload OBJ file, make sure to upload corresponding MTL file too.
**Or use external URL** - link to the 3D file.
4. **Publish** in **WordPress posts and pages, Woocommerce products, Elementor blocks** etc with the help of **shortcode**: 
[babylon]Url-Of-3D-File[/babylon]
Make sure there are **no spaces** between URL and shortcode brackets[babylon]**URL**[/babylon].
Video: https://youtu.be/GNFNt2lGBYw
5. Another option is to publish 3D files with the standard WordPress HTML block and have more ways to configure Babylon Viewer. You may adjust all needed parameters (light, camera position, camera behaviour, rotating etc), create our own Viewer template, change logo and link at navigation bar etc.

### Example
Just put it into standard **Wordpress HTML Gutenberg block** and publish (result is here - https://igiuk.com/babylon-3d-wordpress/3d-examples/cornell-box/):

                <babylon extends="minimal">
                  <!-- Ground that receives shadows -->
                  <ground receive-shadows="true"></ground>
                  <!-- Default skybox
                 <skybox></skybox>
                 -->
                         <model url="https://models.babylonjs.com/CornellBox/cornellBox.glb">
                        </model>
                  <!-- enable antialiasing -->
                  <engine antialiasing="true"></engine>
                  <!-- camera configuration -->
                  <camera>
                    <!-- add camera behaviors -->
                    <behaviors>
                      <!-- enable default auto-rotate behavior -->
                      <auto-rotate type="0"></auto-rotate>
                      <!-- enable and configure the framing behavior -->
                      <framing type="2" zoom-on-bounding-info="true" zoom-stops-animation="false"></framing>
                      <!-- enable default bouncing behavior -->
                      <bouncing type="1"></bouncing>
                    </behaviors>
                  <position x="3" y="3" z="3"></position>
                  </camera>
                  <scene>
                    <clear-color r="1" g="1" b="1"></clear-color>
                  </scene>
                </babylon>


Read more about Babylon Viewer settings at https://doc.babylonjs.com/extensions/configuring_the_viewer

**Video Demonstration**: https://youtu.be/GNFNt2lGBYw

**Wordpress Demo**: https://igiuk.com/babylon-3d-wordpress/

## Changelog

#### Version 0.31 

Automatic script loading only when babylon shortcode or tag exist. 

### Version 0.3 - Major update!

**Plugin name** changed to **Babylon Viewer 3D Wordpress Plugin** - to 	distinguish it from **Babylon JS 3D Wordpress Plugin** which is going to be published soon.

**Plugin code** is completely rewritten for better standards and compatibility in future.

**Readme** file is rewritten in order to give more necessary information in a more clear way.

Corrected: MIME file formats:

                    $mimes['gltf'] = 'model/gltf+json';
                    $mimes['glb'] = 'model/gltf-binary';
                    $mimes['obj'] = 'model/obj';
                    $mimes['mtl'] = 'model/mtl';
                    $mimes['stl'] = 'model/stl';
                    $mimes['babylon'] = 'model/babylon+json';

**Version 0.2.** Corrected - Notice: wp_enqueue_script was called incorrectly.
