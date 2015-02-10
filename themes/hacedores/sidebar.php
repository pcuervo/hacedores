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
				$eventoDia = get_post_meta($post->ID, '_dia_evento_meta', true);
				$eventoURL = get_post_meta($post->ID, '_web_evento_meta', true);
				if ( $eventoURL !== '' AND strpos($eventoURL,'http://') === false) {
					$eventoURL = 'http://'.$eventoURL;
				}
				$eventoFB = get_post_meta($post->ID, '_facebook_evento_meta', true);
				$eventoTW = get_post_meta($post->ID, '_twitter_evento_meta', true);
				if ( $eventoFB !== '' AND strpos($eventoFB,'http://') === false) {
					$eventoFB = 'http://'.$eventoFB;
				}
				if ( $eventoTW !== '' AND strpos($eventoTW,'http://') === false) {
					$eventoTW = 'http://'.$eventoTW;
				}
			?>
				<article class="[ margin-bottom-medium ]">
					<h3><?php the_title(); ?></h3>
					<p><?php echo $eventoDia; ?></p>
					<p><?php echo $eventoDireccion; ?></p>
					<p><a href="<?php echo $eventoURL; ?>" target="_blank"><?php echo $eventoURL; ?></a></p>
					<p class="[ text-center ] [ redes-eventos ]">
						<?php if ( $eventoFB !== '') { ?>
							<a href="<?php echo $eventoFB; ?>"><i class="fa fa-facebook fa-2x"></i></a>
						<?php } ?>
						<?php if ( $eventoTW !== '') { ?>
							<a href="<?php echo $eventoTW; ?>"><i class="fa fa-twitter fa-2x"></i></a>
						<?php } ?>
					</p>
				</article>
				<hr class="[ margin-bottom-medium eventos ]">
		<?php
			endwhile; endif; wp_reset_query();
		?>
	</div>
</aside>