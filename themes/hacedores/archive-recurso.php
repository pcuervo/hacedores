<?php get_header(); ?>
	<section class="[ clearfix ]">
		<div class="first-container">
			<div>
				<div class="[ pagination-container ]">
					<?php
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args = array(
						'post_type' 		=> 'recurso',
						'posts_per_page' 	=> 8,
						'paged' 			=> $paged
					);
					$queryProyecto = new WP_Query( $args );
					if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
						<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-3 ]">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail('medium', array('class' => '[ margin-bottom-medium ]')); ?>
								<?php } else { $userAvatar = THEMEPATH.'images/default-recursos.png';?>
									<img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php the_title(); ?>">
								<?php } ?>
							</a>
							<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							<?php 
								$content = get_the_content();
								$content = strip_tags($content);
								echo trim_text($content, 200); 
							?>
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
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>