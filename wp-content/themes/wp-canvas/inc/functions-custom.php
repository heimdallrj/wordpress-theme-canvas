<?php

/*
 * Google Analytics Code
 */
function add_google_analytics()
{
?>
<script type="text/javascript">
/* <![CDATA[ */
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXX-X']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
/* ]]> */
</script>
<?php
} 
add_action('wp_footer', 'add_google_analytics');

/*
 * add a favicon to your
 */
function site_favicon()
{
    print '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('template_url') .'/images/site/favicon.ico" />';
}
add_action('wp_head', 'site_favicon');

# -----------------------------------------------------------------------------------------

/*
 * get site info
 */
function get_site_info( $return=true )
{
	$data = array();
	
	// Site Info
	$data['site']['name'] = get_bloginfo('name');
    $data['site']['description'] = get_bloginfo('description');
    $data['site']['url'] = get_bloginfo('url');
	
	// return data
	if ( $return )
	{
    	return $data;
	}
	else
	{
		print '<pre>'; print_r( $data ); print '</pre>';
	}
}

/*
 * get page data by page ID
 */
function get_page_by_id( $id, $return=true )
{
	$args = array(
		"page_id" => "$id",
	);
	
	$data = array();
	
	$data['page'] = wp_loop( $args, $id );
	
	// return data
	if ( $return )
	{
    	return $data;
	}
	else
	{
		print '<pre>'; print_r( $data ); print '</pre>';
	}
}

/*
 * get page data by page slug
 */
function get_page_by_slug( $slug, $return=true )
{
	$args = array(
		"pagename" => "$slug",
	);
	
	$data = array();
	
	$data['page'] = wp_loop( $args, $id );
	
	// return data
	if ( $return )
	{
    	return $data;
	}
	else
	{
		print '<pre>'; print_r( $data ); print '</pre>';
	}
}

/*
 * get posts by post type
 */
function get_posts_by_post_type( $post_type, $order="DESC", $limit=10, $return=true, $orderby="ID" )
{
	$args = array(
		"post_type" => "$post_type",
		"order" => "$order",
		"orderby" => "$orderby",
		"posts_per_page" => "$limit"
	);
	
	$data = array();
	
	$data['posts'] = wp_loop( $args, $id );
	
	// return data
	if ( $return )
	{
    	return $data;
	}
	else
	{
		print '<pre>'; print_r( $data ); print '</pre>';
	}
}

/*
 * get posts by post type with meta key filter
 */
function get_posts_by_post_type_meta_filter( $post_type, $order="DESC", $limit=10, $return=true, $meta_key, $meta_val, $meta_comp )
{
	$args = array(
		"post_type" => "$post_type",
		"order" => "$order",
		"posts_per_page" => "$limit",
		"meta_query"     => array(
			array(
				"key"       => "$meta_key",
				"value"     => "$meta_val",
				"compare"   => "$meta_comp"
			)
    	)
	);
	
    $data = array();

    $data['posts'] = wp_loop( $args, $id );
	
	// return data
	if ( $return )
	{
    	return $data;
	}
	else
	{
		print '<pre>'; print_r( $data ); print '</pre>';
	}
}

/*
 * WordPress Psot Loop
 */
function wp_loop( $args )
{
	$data = array();
	
    // The Query
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() )
    {
        $data['data'] = TRUE;
		$i=0;

        while ( $the_query->have_posts() )
        {
            $the_query->the_post();

            $data[$i]['id'] = get_the_ID();
            $data[$i]['title'] = get_the_title();
            $data[$i]['content'] = get_the_content();
			$data[$i]['excerpt'] = get_the_excerpt();
            $data[$i]['permalink'] = get_the_permalink();
			$data[$i]['author'] = get_the_author();
			$data[$i]['date'] = get_the_date();
			$data[$i]['thumbnail'] = wp_get_attachment_url (get_post_thumbnail_id( get_the_ID() ));
            $data[$i]['meta'] = get_post_meta( get_the_ID() );

            unset($data['post']['meta']['_wp_page_template']);
            unset($data['post']['meta']['_edit_lock']);
            unset($data['post']['meta']['_edit_last']);
            unset($data['post']['meta']['_thumbnail_id']);
			
			$i++;
        }
    }
    else
    {
		// No posts found.
        $data['data'] = FALSE;
    }

   	// Restore original Post Data
    wp_reset_postdata();

    return $data;	
}
	
// EOF.