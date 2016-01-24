<?

add_theme_support( 'menus' );

register_nav_menus(
    array(
        'primary-nav' => __( 'Primary Navigation' ),   // main nav in header
        'footer-links' => __( 'Footer Links' ) // secondary nav in footer
    )
);


// Navigation Menu
// --
// Displays a navigation menu created in the Appearance → Menus panel
// wp_nav_menu($array)
// http://codex.wordpress.org/Function_Reference/wp_nav_menu

function setPrimaryNav($depth = 0) {

    $settings = array(
        'theme_location'  => 'primary-nav',
        'menu'            => false,
        'container'       => false,
        'container_class' => false,
        'container_id'    => false,
        'menu_class'      => false,
        'menu_id'         => false,
        'echo'            => true,
        'fallback_cb'     => 'setPrimaryNavBackup',
        'before'          => false,
        'after'           => false,
        'link_before'     => false,
        'link_after'      => false,
        'items_wrap'      => '<ul class="cf">%3$s</ul>',
        'depth'           => !empty($depth) && $depth > 0 ? $depth : 0,
        'walker'          => false
    );

    wp_nav_menu($settings);
}


// Backup Primary Navigation Pages Menu
// --
// Displays a list of WordPress Pages as links
// Fallback for primary navigation
// $args: array containing prevous settings
// wp_page_menu($array)
// http://codex.wordpress.org/Function_Reference/wp_page_menu

function setPrimaryNavBackup($args) {

    $settings = array(
        'depth'       => $args['depth'],
        'sort_column' => 'menu_order, post_title',
        'menu_class'  => false,
        'include'     => false,
        'exclude'     => false,
        'echo'        => true,
        'show_home'   => false,
        'link_before' => false,
        'link_after'  => false,
    );

    wp_page_menu( $settings );
}

function cleanPrimaryNavBackup($menu) {
    return preg_replace( array( '#^<div[^>]*>#', '#</div>$#' ), '', $menu );
}
add_filter('wp_page_menu','cleanPrimaryNavBackup');


// Footer links
// --
// Displays a navigation menu created in the Appearance > Menus panel
// wp_nav_menu($array)
// http://codex.wordpress.org/Function_Reference/wp_nav_menu

function setFooterLinks() {

    $settings = array(
        'theme_location'  => 'footer-links',
        'menu'            => false,
        'container'       => false,
        'container_class' => false,
        'container_id'    => false,
        'menu_class'      => false,
        'menu_id'         => false,
        'echo'            => true,
        'fallback_cb'     => false,
        'before'          => false,
        'after'           => false,
        'link_before'     => false,
        'link_after'      => false,
        'items_wrap'      => '<ul class="cf">%3$s</ul>',
        'depth'           => !empty($depth) ? $depth : 0,
        'walker'          => false
    );

    wp_nav_menu($settings);
}