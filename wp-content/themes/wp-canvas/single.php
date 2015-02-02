<?php
/**
 * WordPress-Theme-Canvas
 * A Starter WordPress Theme for Developers who wish to develop a WordPress theme from scratch.
 *
 * @package WordPress
 * @subpackage WPCanvas
 * @since v3.0
 *
 * @file single.php
 * The single post template. Used when a single post is queried. For this and all other query templates, index.php is used if the query template is not present. 
 * + attachment.php, image.php
 */
?>
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h2><?php the_title(); ?></h2>

			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

			<?php the_content(); ?>
			
		</div> <!--/.post-->

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>