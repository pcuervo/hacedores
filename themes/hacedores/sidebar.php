<aside class="[ columna xmall-12 medium-4 large-3 ] [ border ] [ eventos-home ]">
	<div class="[ eventos-titulo ]">
		<h2>Eventos</h2>
	</div>
	<div class="[ eventos-contenido ]">
		<?php
			$args = array(
				'post_type' 		=> 'evento',
				'posts_per_page' 	=> -1
			);
			$queryEvento = new WP_Query( $args );
			if ( $queryEvento->have_posts() ) : while ( $queryEvento->have_posts() ) : $queryEvento->the_post();

				$eventoDireccion = get_post_meta($post->ID, '_direccion_evento_meta', true);

				$diaHora 		= get_post_meta($post->ID, '_dia_hora_evento_meta', true);

				$web 			= get_post_meta($post->ID, '_web_evento_meta', true);
				if ( $web ){
					$web = addhttp($web);
				}

				$facebook 		= get_post_meta($post->ID, '_facebook_evento_meta', true);
				if ( $facebook ){
					$facebook = addhttp($facebook);
				}
			?>
				<article class="[ margin-bottom-medium ]">
					<h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
					<p><?php echo $diaHora; ?></p>
					<p><?php echo $eventoDireccion; ?></p>
					<p><a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a></p>
					<p class="[ text-center ] [ redes-eventos ]">
						<?php if ( $facebook !== '') { ?>
							<a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
						<?php } ?>
					</p>
				</article>
				<hr class="[ margin-bottom-medium eventos ]">
		<?php
			endwhile; endif; wp_reset_query();
		?>
	</div>
</aside>