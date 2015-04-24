<?php

/*
 * post-formats
 */
//add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) ); 

/*
 * add post-thumbnail support 
 */
//add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_theme_support( 'post-thumbnails' );

/*
 * custom-background
 */
$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

/*
 * custom-header
 */
$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

/* 
 * add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/*
 * html5
 */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/*
 * title-tag
 */
add_theme_support( 'title-tag' );

# --------------------------------------------------------------------------

/*
 * Put post thumbnails into rss feed 
 */
function th_feed_post_thumbnail($content)
{
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '' . $content;
    }
    return $content;
}
add_filter('the_excerpt_rss', 'th_feed_post_thumbnail');
add_filter('the_content_feed', 'th_feed_post_thumbnail');

/* 
 * custom excerpt 
 */
function custom_excerpt_more($more)
{
    return ' [..]';
}
add_filter('excerpt_more', 'custom_excerpt_more');

/* 
 * custom excerpt length
 */
function custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// EOF.