<?

// Clean Wordpress Head
// --
// Cleans up default additions
// to wp_head

function cleanupHead() {
    remove_action( 'wp_head', 'rsd_link' ); // EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // windows live writer
    remove_action( 'wp_head', 'index_rel_link' ); // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // previous link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // links for adjacent posts
    add_filter( 'the_generator', 'removeRssVer' ); // Remove WP version from RSS
    add_filter( 'gallery_style', 'cleanGalleries' );
    remove_action( 'wp_head', 'wp_generator' ); // WP version
    add_filter( 'style_loader_src', 'removeVersionQuery', 9999 );
    add_filter( 'script_loader_src', 'removeVersionQuery', 9999 );
}


// Remove WP version from RSS

function removeRssVer() {
    return '';
}

// Remove WP version from scripts
// --
// Removes WP version added to
// CSS and JS by default

function removeVersionQuery( $src ) {
    return strpos( $src, 'ver=' ) ? remove_query_arg( 'ver', $src ) : $src;
}


// Clean up gallery output
// --
// Removes injected CSS from gallery

function cleanGalleries($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}