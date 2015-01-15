<?php get_header(); ?>
	<section class="[ clearfix ]">
		<?php
		$args = array(
			'post_type' 		=> 'proyecto',
			'posts_per_page' 	=> -1
		);
		$queryProyecto = new WP_Query( $args );
		if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
			<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-3 ]">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium', array('class' => '[ margin-bottom-medium ]')); ?>
				</a>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_content(); ?>
			</div><!-- post -->
		<?php endwhile; endif; wp_reset_query(); ?>
	</section>
<?php get_footer(); ?>