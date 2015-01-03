<?php

add_filter('admin_init', 'register_custom_general_settings');

function register_custom_general_settings()
{
	// Facebook Fan Page URL
	register_setting('general', 'fb_fan_page_url', 'esc_attr');
    add_settings_field('fb_fan_page_url', '<label for="fb_fan_page_url">'.__('Facebook Fan Page URL' , 'fb_fan_page_url' ).'</label>' , 'fn_custom_field_fb_fan_page_url', 'general');
	
	// Twitter handler
	register_setting('general', 'twitter_handler', 'esc_attr');
    add_settings_field('twitter_handler', '<label for="twitter_handler">'.__('Twitter handler' , 'twitter_handler' ).'</label>' , 'fn_custom_field_twitter_handler', 'general');
}

function fn_custom_field_fb_fan_page_url()
{
	$val = get_option( 'fb_fan_page_url', '' );
    print '<input type="text" id="fb_fan_page_url" name="fb_fan_page_url" value="' . $val . '" />';
}

function fn_custom_field_twitter_handler()
{
	$val = get_option( 'twitter_handler', '@' );
    print '<input type="text" id="twitter_handler" name="twitter_handler" value="' . $val . '" />';
}

// EOF.