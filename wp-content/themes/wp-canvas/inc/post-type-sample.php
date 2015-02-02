<?php

add_action( 'init', 'post_type_sample' );
/**
 * Register a post type.
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function post_type_sample()
{
	$name = 'Samples';
	$singular_name = 'Sample';
	$slug = 'sample';
	
	$labels = array(
		'name'               => _x( $name, 'post type general name', TEXTDOMAIN ),
		'singular_name'      => _x( $singular_name, 'post type singular name', TEXTDOMAIN ),
		'menu_name'          => _x( $name, 'admin menu', TEXTDOMAIN ),
		'name_admin_bar'     => _x( $singular_name, 'add new on admin bar', TEXTDOMAIN ),
		'add_new'            => _x( 'Add New', 'book', TEXTDOMAIN ),
		'add_new_item'       => __( 'Add New '.$singular_name, TEXTDOMAIN ),
		'new_item'           => __( 'New '.$singular_name, TEXTDOMAIN ),
		'edit_item'          => __( 'Edit '.$singular_name, TEXTDOMAIN ),
		'view_item'          => __( 'View '.$singular_name, TEXTDOMAIN ),
		'all_items'          => __( 'All '.$name, TEXTDOMAIN ),
		'search_items'       => __( 'Search '.$name, TEXTDOMAIN ),
		'parent_item_colon'  => __( 'Parent '.$name.':', TEXTDOMAIN ),
		'not_found'          => __( 'No '.$name.' found.', TEXTDOMAIN ),
		'not_found_in_trash' => __( 'No '.$name.' found in Trash.', TEXTDOMAIN )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( $slug, $args );
}

// EOF.
