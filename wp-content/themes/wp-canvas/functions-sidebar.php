<?php
/*
 * register Sidebars
 */
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id'   => 'sidebar-widgets',
        'description'   => '[Sidebar Widgets]',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}

// EOF.