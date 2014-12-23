<?php
define('EMAIL_FROM_NAME','@_thinkholic');
define('EMAIL_FROM','me@thinkholic.com');

/* 
 * Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
 */
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

function set_html_content_type()
{
	return 'text/html';
}
add_filter( 'wp_mail_content_type', 'set_html_content_type' );

function send_email( $to, $cc, $subject, $message )
{	
	$headers[] = 'From: '.EMAIL_FROM_NAME.' <'.EMAIL_FROM.'>';
	
	if ( is_array( $cc ) )
	{
		for ( $i=0; $i<count($cc); $i++ )
		{
			$headers[] = 'Cc: '.$cc[$i];
		}
	}
	
	wp_mail( $to, $subject, $message, $headers );
}

// EOF.