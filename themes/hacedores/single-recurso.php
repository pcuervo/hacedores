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

			$direccion 		= get_post_meta($post->ID, '_direccion_recurso_meta', true);

			$web 			= get_post_meta($post->ID, '_web_recurso_meta', true);
			if ( $web ){
				$web 		= addhttp($web);
			}

			$email 			= get_post_meta($post->ID, '_email_recurso_meta', true);

			$video 			= get_post_meta($post->ID, '_video_recurso_meta', true);
			$videoHost 		= NULL;
			if (strpos($video,'youtube') !== false) {
				$videoHost = 'youtube';
			}
			if (strpos($video,'vimeo') !== false) {
				$videoHost = 'vimeo';
			}
			if( $videoHost ){
				$video_src = get_video_src($video, $videoHost);
			}

			$instructables 	= get_post_meta($post->ID, '_instructables_recurso_meta', true);
			if ( $instructables ){
				$instructables 		= addhttp($instructables);
			}


		?>
		<br />
		<?php if ( $direccion ){ ?>
			<p>Dirección: <?php echo $direccion; ?></p>
		<?php } ?>

		<?php if ( $web ){ ?>
			<p><a target="_blank" href="<?php echo $web; ?>"><?php echo $web; ?></a></p>
		<?php } ?>

		<?php if ( $email ){ ?>
			<p><a target="_blank" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
		<?php } ?>

		<?php if ( $instructables ){ ?>
			<p><a target="_blank" href="<?php echo $instructables; ?>"><?php echo $instructables; ?></a></p>
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
		<?php if( $video_src ){ ?>
			<div class="[ clearfix ] [ margin-bottom-medium ]">
				<div class="[ margin-bottom-medium ]" id="thing-with-videos">
					<iframe src="<?php echo $video_src ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>