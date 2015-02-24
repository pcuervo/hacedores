<?php get_header(); ?>
	<section class="[ clearfix ]">
		<div class="first-container">
			<div>
				<div class="[ pagination-container ]">
					<?php
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args = array(
						'post_type' 		=> 'proyecto',
						'posts_per_page' 	=> 8,
						'paged' 			=> $paged
					);
					$queryProyecto = new WP_Query( $args );
					if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
						<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-3 medium-3 ]">
							<a class="[ block ][ margin-bottom-small ]" href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail('medium', array('class' => '[ block ]')); ?>
								<?php } else { $userAvatar = THEMEPATH.'images/default-proyectos.png';?>
									<img class="[ margin-bottom-small ][ block ]" src="<?php echo $userAvatar; ?>" alt="<?php the_title(); ?>">
								<?php } ?>
							</a>
							<div class="[ post-texto ]">
								<a href="<?php the_permalink(); ?>" class="[ block ]">
									<h2 class="[ no-margin ]"><?php the_title(); ?></h2>
								</a>
								<p>Hacedor: <?php the_author() ?></p>
								<?php
								$categorias = wp_get_post_terms($post->ID, 'category-proyectos');
								foreach($categorias as $categoria) {
									$categoriaName = $categoria->name; ?>
									<p class="[ subtitle-category ][ no-margin ]"><?php echo $categoriaName; ?></p>
								<?php }
								$content = get_the_content();
								$content = strip_tags($content);
								echo '<p>';
										echo trim_text($content, 200);
								echo '</p>';
								?>

								<div class="[ screen ]"></div>
							</div>
							<a href="<?php the_permalink(); ?>" class="[ block ][ boton ][ text-center ][ leer-mas proyectos ]">Leer más</a>
						</div><!-- post -->
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
				<div class="[ clear ]"></div>
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