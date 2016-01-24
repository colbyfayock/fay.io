<?

function getSearchForm($form) {

    $form = '<div class="widget_search">'
            .'<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >'
                . '<label>Search</label>'
                . '<input class="widget-search-text" type="text" value="' . get_search_query() . '" name="s" placeholder="Search..." />'
                . '<input class="widget-search-button button-primary" type="submit" value="Search" />'
            . '</form>'
        . '</div>';

    return $form;

}


// Set page template to search when results are empty

function SearchFilter($query) {

    // If 's' request variable is set but empty

    if ( isset($_GET['s']) && empty($_GET['s'] ) && $query->is_main_query() ) {
        $query->is_search = true;
        $query->is_home = false;
    }

    return $query;

}

add_filter('pre_get_posts','SearchFilter');