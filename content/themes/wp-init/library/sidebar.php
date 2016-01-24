<?

function registerSidebars() {
    $settings = array(
        'id'            => 'sidebar-primary',
        'name'          => 'Sidebar Primary',
        'description'   => 'Primary Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    );
    register_sidebar($settings);
}