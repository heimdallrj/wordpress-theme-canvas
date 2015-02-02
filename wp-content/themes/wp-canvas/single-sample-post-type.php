<?php
/**
 * WordPress-Theme-Canvas
 * A Starter WordPress Theme for Developers who wish to develop a WordPress theme from scratch.
 *
 * @package WordPress
 * @subpackage WPCanvas
 * @since v3.0
 *
 * @file single-{post-type}.php
 * The single post template used when a single post from a custom post type is queried. 
 * For example, single-book.php would be used for displaying single posts from the custom post type named "book". 
 * index.php is used if the query template for the custom post type is not present.  
 */
?>
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				
				<?php the_content(); ?>

			</div> <!--/.entry-->
			
		</div> <!--/.post-->

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>