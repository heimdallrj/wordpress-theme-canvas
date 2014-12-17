<!-- Blog Layout -->

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

			<div class="entry">
				<?php the_content(); ?>
			</div> <!--/.entry-->

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