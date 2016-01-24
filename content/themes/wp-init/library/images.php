<?

// To call a different size, simply change the text
// inside the thumbnail function.

// For example, to call the 300 x 300 sized image,
// we would use the function:
// the_post_thumbnail( 'zurg-thumb-300' )
// for the 600 x 150 image:
// the_post_thumbnail( 'zurg-thumb-600' )

// add_image_size( 'thumb-600', 600, 159, true );
// add_image_size( 'thumb-300', 300, 300, true );


// The function above adds the ability to use the dropdown menu to select
// the new images sizes you have just created from within the media manager
// when you add media to your content blocks. If you add more image sizes,
// duplicate one of the lines in the array and name it according to your
// new image size.

// function setCustomImageSizes( $sizes ) {
//     return array_merge( $sizes, array(
//         'zurg-thumb-600' => __('600px by 150px'),
//         'zurg-thumb-300' => __('300px by 100px'),
//     ) );
// }

// add_filter( 'image_size_names_choose', 'setCustomImageSize' );


// Remove the p from around imgs
// http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/

function cleanImageTags($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}