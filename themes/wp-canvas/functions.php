<?php

define('SITE_URL','http://www.github.com/thinkholic');
define('DEV_SITE_URI','http://www.github.com/thinkholic');
define('DEV_NAME','@_thinkholic');
define('ADMIN_EMAIL','me@thinkholic.com');
define('ADMIN_NAME','thinkholic');

/*
 * Load jQuery
 */
if ( !is_admin() )
{
   wp_deregister_script('jquery');
   wp_register_script('jquery', ("http://code.jquery.com/jquery-latest.js"), false);
   wp_enqueue_script('jquery');
}

/*
 * Clean up the <head>
 */
function removeHeadLinks()
{
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

/*
 * Remove WP version no 
 */
function th_remove_version()
{
    return '';
}
add_filter('the_generator', 'th_remove_version');

/**
 * Include custom functions set
 * @ sidebars, admin, theme-support, other
 */
include_once('functions-sidebar.php');
include_once('functions-admin.php');
include_once('functions-custom.php');
include_once('functions-theme-supports.php');

?>