<?php
/**
 * A blank WordPress Theme Canvas for Developers
 *
 * @package WordPress
 * @subpackage wp-canvas
 * @since v2.0
 *
 */
global $wpPageObj;
$wpPageObj = get_page_by_id( get_the_ID() );

$title = $wpPageObj['site']['name'];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" /> 
<?php } ?>
    
<title><?php print $title; ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>