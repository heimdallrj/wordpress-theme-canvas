<?php
global $wpObj;
$id = get_the_ID();
$wpObj = get_page_by_id( $id );

$title = $wpObj['site']['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" /> 
<?php } ?>
    
<title><?php print $title; ?></title>
	
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>