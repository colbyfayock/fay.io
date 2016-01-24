<?
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard.
*/

// Change primary login screen logo to home

function setLoginLogoUrl() {
    return home_url();
}

// changing the alt text on the logo to show your site name

function setLoginLogoAlt() {
    return get_option( 'blogname' );
}

// calling it only on the login page

add_filter( 'login_headerurl', 'setLoginLogoUrl' );
add_filter( 'login_headertitle', 'setLoginLogoAlt' );