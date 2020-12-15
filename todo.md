##### Check for bin files and texture folders. Separate plugin folder in extended version.

// Add new allowed MIME types here.

add_filter( 'upload_mimes', 'babylonviewer_upload_mime_types' );

##### // Add allowed filetypes.

add_filter( 'wp_check_filetype_and_ext', 'babylonviewer_correct_filetypes' , 10, 5 );

-- separate plugin to add MIME types

###############################################

###### // Adding Babylon Viewer into header or footer

-- Check where to insert in extended version

add_action( 'wp_enqueue_scripts', 'babylonviewer_call' );

-- first register, then call

##### // Adding Babylon Viewer shortcode
add_shortcode('babylon', 'babylonviewer_shortcode');

function babylonviewer_shortcode($atts = [], $content = null) {
check for atts; clear color and else
