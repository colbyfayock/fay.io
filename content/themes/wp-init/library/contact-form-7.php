<?

// Removes script and CSS file enqueueing for WP Plugin Contact Form 7
// Styles included in primary stylesheet

remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_scripts' );
remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' );