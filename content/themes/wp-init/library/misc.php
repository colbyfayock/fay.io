<?

// Clean excerpt links
// --
// Removes […] to a Read More link

function cleanExcerptLinks($more) {
    global $post;
    return '...  '
        . '<a class="excerpt-read-more" href="' . get_permalink($post->ID) . '" title="Read' . get_the_title($post->ID) . '">'
            . 'Read More'
        . '</a>';
}


// Numeric pagination
// --
// Creates page number pagination

function getPagination() {

    global $wp_query;
    $bignum = 999999999;

    if ( $wp_query->max_num_pages <= 1 ) return;

    $settings = array(
        'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
        'format'       => false,
        'total'        => $wp_query->max_num_pages,
        'current'      => max( 1, get_query_var('paged') ),
        'show_all'     => false,
        'end_size'     => 3,
        'mid_size'     => 3,
        'prev_next'    => true,
        'prev_text'    => 'Prev',
        'next_text'    => 'Next',
        'type'         => 'list',
        'add_args'     => false,
        'add_fragment' => false
    );

    return paginate_links( $settings );
}


function setExcerptLength( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'setExcerptLength', 999 );