<?php

	/* Google Analytics Code */
	function add_google_analytics() {
		echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">';
		echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
		echo 'pageTracker._trackPageview();';
		echo '</script>';
	} 
    add_action('wp_footer', 'add_google_analytics');
	
	/* add a favicon to your */
	function site_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('template_url') .'/images/site/favicon.ico" />';
	}
	add_action('wp_head', 'site_favicon');

    ##

    function get_post_contents_by_page_id( $id )
    {  
        $args = 'page_id='.$id;
        $data = array();
        
        $data['site']['name'] = get_bloginfo('name');
        $data['site']['description'] = get_bloginfo('description');
        $data['site']['url'] = get_bloginfo('url');
        
        // The Query
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() )
        {
            $data['data'] = TRUE;
            
            while ( $the_query->have_posts() )
            {
                $the_query->the_post();
                
                $data['post']['title'] = get_the_title();
                $data['post']['content'] = get_the_content();
                $data['post']['meta'] = $meta = get_post_meta( $id );
                
                unset($data['post']['meta']['_wp_page_template']);
                unset($data['post']['meta']['_edit_lock']);
                unset($data['post']['meta']['_edit_last']);
                unset($data['post']['meta']['_thumbnail_id']);
                
                $data['post']['thumbnail'] =wp_get_attachment_url (get_post_thumbnail_id( $id ));
            }
        }
        else
        {
            $data['data'] = FALSE;
            
            // no posts found
        }
        
        /* Restore original Post Data */
        wp_reset_postdata();
       
        return $data;
    }

    function get_posts_by_post_type( $post_type )
    {
        $args = array(
            "post_type" => "$post_type",
        );
        
        $data = array();
        
        // The Query
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() )
        {
            $data['data'] = TRUE;
            
            $i =0;
            
            while ( $the_query->have_posts() )
            {
                $the_query->the_post();
                
                $data['posts'][$i]['title'] = get_the_title();
                $data['posts'][$i]['content'] = get_the_content();
                $data['posts'][$i]['excerpt'] = get_the_excerpt();
                $data['posts'][$i]['permalink'] = get_the_permalink();
                $data['posts'][$i]['meta'] = get_post_meta( get_the_ID() );
                
                unset($data['posts'][$i]['meta']['_wp_page_template']);
                unset($data['posts'][$i]['meta']['_edit_lock']);
                unset($data['posts'][$i]['meta']['_edit_last']);
                unset($data['posts'][$i]['meta']['_thumbnail_id']);
                
                $data['posts'][$i]['thumbnail'] = wp_get_attachment_url (get_post_thumbnail_id( get_the_ID() ));
                
                $i ++;
            }
        }
        else
        {
            $data['data'] = FALSE;
            
            // no posts found
        }
        
        /* Restore original Post Data */
        wp_reset_postdata();
       
        return $data;
    }
	
?>