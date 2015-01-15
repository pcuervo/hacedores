<?php get_header(); ?>
	<?php
		$args = array(
			'post_type' 		=> 'informacion',
			'posts_per_page' 	=> '1'
		);
		$queryInformacion = new WP_Query( $args );
		if ( $queryInformacion->have_posts() ) : while ( $queryInformacion->have_posts() ) : $queryInformacion->the_post(); ?>
			<section class="[ columna xmall-12 medium-9 ] [ ]">
				<?php the_post_thumbnail('large', array('class' => '[ margin-bottom-medium ]')); ?>
				<div class="[ clearfix ]">
					<div class="[ columna xmall-12 medium-3 ] [ detalles ]">
						<h2>Detalles</h2>
						<i class="[ icon-icon_switch ] [ icon informacion ] [ span xmall-12 ]"></i>
						<h3><?php echo get_post_meta($post->ID, '_lugar_meta', true); ?></h3>
						<i class="[ icon-icon_clavo ] [ icon informacion ] [ span xmall-12 ]"></i>
						<p><?php echo get_post_meta($post->ID, '_direccion1_meta', true); ?></p>
						<i class="[ icon-icon_led ] [ icon informacion ] [ span xmall-12 ]"></i>
						<p><?php echo get_post_meta($post->ID, '_fechas_meta', true); ?></p>
					</div>
					<div class="[ columna xmall-12 medium-9 ]">
						<?php the_content(); ?>
					</div>
				</div>
			</section><!-- informacion -->
		<?php endwhile; endif; wp_reset_query(); ?>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>