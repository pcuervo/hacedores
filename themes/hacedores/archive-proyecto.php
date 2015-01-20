<?php get_header(); ?>
	<section class="[ clearfix ]">
		<div class="first-container">
			<div>
				<div class="[ pagination-container ]">
					<?php
					//$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args = array(
						'post_type' 		=> 'proyecto',
						'posts_per_page' 	=> 1,
						'paged' 			=> $paged
					);
					$queryProyecto = new WP_Query( $args );
					if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
						<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-3 medium-3 ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('medium', array('class' => '[ margin-bottom-medium ]')); ?>
							</a>
							<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							<?php the_content(); ?>
						</div><!-- post -->
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
				<div class="[ pagination-controls ] [ right ]">
					<?php
						global $wp_query;
						$big = 999999999; // need an unlikely integer
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?page=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages
						) );
					?>
					<!-- <div class="simple-pagination-previous"></div>
					<div class="simple-pagination-page-numbers"></div>
					<div class="simple-pagination-next"></div> -->
				</div>
			</div>
	</section>
<?php get_footer(); ?>