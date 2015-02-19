<?php
	get_header();
	the_post();
?>
	<div class="[ columna xmall-12 medium-3 large-3 ] [ side-proyecto ]">
		<h2><?php the_title(); ?></h2>
		<?php
			$categorias = wp_get_post_terms($post->ID, 'category-recursos');
			foreach($categorias as $categoria) {
				$categoriaName = $categoria->name; ?>
				<h2 class="[ no-margin ]"><small><small><?php echo $categoriaName; ?></small></small></h2>
			<?php }

			$direccion 		= get_post_meta($post->ID, '_direccion_evento_meta', true);

			$diaHora 		= get_post_meta($post->ID, '_dia_hora_evento_meta', true);

			$web 			= get_post_meta($post->ID, '_web_evento_meta', true);
			if ( $web ){
				$web = addhttp($web);
			}

			$email 			= get_post_meta($post->ID, '_email_evento_meta', true);

			$facebook 		= get_post_meta($post->ID, '_facebook_evento_meta', true);
			if ( $facebook ){
				$facebook = addhttp($facebook);
			}


		?>
		<br />
		<?php if ( $direccion ){ ?>
			<p>Dirección: <?php echo $direccion; ?></p>
		<?php } ?>

		<?php if ( $diaHora ){ ?>
			<p>Fecha: <?php echo $diaHora; ?></p>
		<?php } ?>

		<?php if ( $web ){ ?>
			<p><a target="_blank" href="<?php echo $web; ?>"><?php echo $web; ?></a></p>
		<?php } ?>

		<?php if ( $email ){ ?>
			<p><a target="_blank" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
		<?php } ?>

		<?php if ( $facebook ){ ?>
			<p><a target="_blank" href="<?php echo $facebook; ?>">Evento en Facebook</a></p>
		<?php } ?>

	</div>
	<div class="[ columna xmall-12 medium-6 ] [ clearfix ]">
		<?php
			the_post_thumbnail('full', array('class' => '[ margin-bottom-medium ]'));
			the_content();
		?>
		<div class="[ clearfix ] [ margin-bottom-medium ]">
			<ul class="[ clearfix ] [ margin-bottom-medium ] [ galeria ]">
				<?php
					$attachments = get_posts( array(
						'post_type' 		=> 'attachment',
						'posts_per_page' 	=> -1,
						'post_parent' 		=> $post->ID,
						'exclude' 			=> get_post_thumbnail_id()
					) );
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							$imageURLThumb = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
							$imageURLFull = wp_get_attachment_image_src( $attachment->ID, 'full' );
							echo '<li class="[ columna xmall-6 medium-4 ]"><a href="' . $imageURLFull[0] . '" data-imagelightbox="f"><img src="' . $imageURLThumb[0] . '" alt="" /></a></li>';
						}
					}
				?>
			</ul>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>