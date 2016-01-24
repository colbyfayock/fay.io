<?

// Adding WP 3+ Functions & Theme Support
function addThemeSupport() {

    // wp thumbnails (sizes handled in functions.php)
    add_theme_support( 'post-thumbnails' );

    // default thumb size
    set_post_thumbnail_size(125, 125, true);

    // wp custom background (thx to @bransonwerner for update)
    add_theme_support( 'custom-background',
        array(
        'default-image' => '',  // background image default
        'default-color' => '', // background color default (dont add the #)
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => ''
        )
    );

    // Add RSS feed links

    add_theme_support('automatic-feed-links');

    // adding post format support
    add_theme_support(
        'post-formats',
        array(
            'aside',    // title less blurb
            'gallery',  // gallery of images
            'link',     // quick link to other site
            'image',    // an image
            'quote',    // a quick quote
            'status',   // a Facebook like status update
            'video',    // video
            'audio',    // audio
            'chat'      // chat transcript
        )
    );

    // wp menus


    // registering wp3+ menus

}