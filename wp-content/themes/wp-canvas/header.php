<?php
/**
 * WordPress-Theme-Canvas
 * A Starter WordPress Theme for Developers who wish to develop a WordPress theme from scratch.
 *
 * @package WordPress
 * @subpackage WPCanvas
 * @since v3.0
 *
 * @file header.php
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" /> 
<?php } ?>
    
<title><?php wp_title(); ?></title>

<link rel="stylesheet" href=" <?php print get_stylesheet_uri(); ?> " type="text/css" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>