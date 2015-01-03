<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2>Search Results for <em>&quot;<?php echo $_GET['s']; ?>&quot;</em></h2>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h3><?php the_title(); ?></h3>

				<div class="entry">

					<?php the_excerpt(); ?>

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

		<h4>No posts found.</h4>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>