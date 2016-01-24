<?
require_once( 'library/zurg.php' );

// Autoversion files
// Ex: style.1362807796.css

function getRelativeUrl() {
    return wp_make_link_relative(get_bloginfo('template_url'));
}

function autoVer($url){
    $path = pathinfo($url);
    $ver = '.'.filemtime($_SERVER['DOCUMENT_ROOT'].$url).'.';
    echo $path['dirname'].'/'.str_replace('.', $ver, $path['basename']);
}

function getGoogleAnalyticsId() {
    return !empty(get_option('zurg_settings_analytics')['google_analytics']) ? get_option('zurg_settings_analytics')['google_analytics'] : false;
}