<?php

/*
 * register settings
 */
function theme_settings_init()
{
    register_setting( 'theme_settings', 'theme_settings' );
}
 
/*
 * add a sample page to menu
----------------------------------------------------*/
function add_page_sample1()
{
    $page_title = 'Sample Admin Page 1';
    $menu_title = 'Sample Admin Page 1';
    $capability = 'manage_options';
    $menu_slug = 'sample-admin-page1';
    $function = 'fn_page_sample1';
    $icon_url = '';
    $position = '45';
        
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

function add_page_sample2()
{
	$page_title = 'Sample Admin Page 2';
    $menu_title = 'Sample Admin Page 2';
    $capability = 'manage_options';
    $menu_slug = 'sample-admin-page2';
    $function = 'fn_page_sample2';
    $icon_url = '';
    $position = '46';
        
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
 
/*
 * add actions
 */
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_page_sample1' );
add_action( 'admin_menu', 'add_page_sample2' );
 
/*
 * Page Outputs
*/
function fn_page_sample1() {
    ?>
     <div class="wrap">
         
         <div id="icon-options-general"></div>
         
         <h2>Sample Page 1 Title</h2>
         
     </div> <!--/wrap-->
     <?php
}

function fn_page_sample2() {
    ?>
     <div class="wrap">
         
         <div id="icon-options-general"></div>
         
         <h2>Sample Page 2 Title</h2>
         
     </div> <!--/wrap-->
     <?php
}

// EOF.