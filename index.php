<?php
/*
Plugin Name: HTTPS to HTTP Redirect
Plugin URI: http://www.ratanmia.com/redirect-https-http-wordpress/
Description: This plugin able to redirect all https request into https.
Author: Ratan Mia
Version: 1.0
Author URI: http://www.ratanmia.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'template_redirect', 'nonhttps_template_redirect', 1 );
function nonhttps_template_redirect() {
    if ( is_ssl() && !is_admin() ) {
        if ( 0 === strpos( $_SERVER['REQUEST_URI'], 'http' ) ) {
            wp_redirect( preg_replace( '|^https://|', 'http://', $_SERVER['REQUEST_URI'] ), 301 );
            exit();
        } else {
            wp_redirect( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
            exit();
        }
    }
}

?>
