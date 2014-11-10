<?php

	/* add post-thumbnail support */
	add_theme_support( 'post-thumbnails' );
	
	/* add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );
	
	/* Put post thumbnails into rss feed */
	function devart_feed_post_thumbnail($content) {
		global $post;
		if(has_post_thumbnail($post->ID)) {
			$content = '' . $content;
		}
		return $content;
	}
	add_filter('the_excerpt_rss', 'devart_feed_post_thumbnail');
	add_filter('the_content_feed', 'devart_feed_post_thumbnail');
	
	/* custom excerpt ellipses for 2.9 */
	function custom_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	
	// custom excerpt length
	function custom_excerpt_length($length) {
		return 20;
	}
	add_filter('excerpt_length', 'custom_excerpt_length');
	
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	add_filter('the_content_more_link', 'remove_more_jump_link');
	
?>