<?php
/**
 * WordPress-Theme-Canvas
 * A Starter WordPress Theme for Developers who wish to develop a WordPress theme from scratch.
 *
 * @package WordPress
 * @subpackage WPCanvas
 * @since v3.0
 *
 * @file archive.php
 * The archive template. Used when a category, author, or date is queried. Note that this template will be overridden by category.php, author.php, and date.php for their respective query types. 
 */
?>
<!-- Blog Layout -->

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>

			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

			<?php the_content(); ?>
                
		</div> <!--/.post-->

	<?php endwhile; ?>

		<div id="pagination">
            <?php
				global $wp_query;
				
				$big = 999999999; // need an unlikely integer
				
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
				) );
			?>
        </div> <!--/pagination-->

	<?php else : ?>

		<h4>Not Found</h4>

	<?php endif; ?>
    
    <?php wp_reset_query(); // reset the query ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>