<?php
	get_header();
	the_post();
	$postID = $post->ID;
?>
	<div class="[ columna xmall-12 medium-3 large-3 ] [ side-proyecto ]">
		<h2><?php the_title(); ?></h2>
		<?php
			$categorias = wp_get_post_terms($post->ID, 'category-proyectos');
			$categoriasIDArray = array();

			foreach($categorias as $categoria) {
				$categoriaName = $categoria->name;
				$categoriasIDArray[] = $categoria->term_id;
				?>
				<h2 class="[ no-margin ]"><small><small><?php echo $categoriaName; ?></small></small></h2>
			<?php }
		?>
		<br />
		<p>Dirección: <?php echo get_post_meta($post->ID, '_direccion_proyecto_meta', true); ?></p>
		<p><a target="_blank" href="<?php echo get_post_meta($post->ID, '_web2_meta', true); ?>"><?php echo get_post_meta($post->ID, '_web2_meta', true); ?></a></p>
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
		<?php
		$videoProyecto = get_post_meta($post->ID, '_video2_meta', true);
		$videoHost = '';
		if (strpos($videoProyecto,'youtube') !== false) {
			$videoHost = 'youtube';
		}
		if (strpos($videoProyecto,'vimeo') !== false) {
			$videoHost = 'vimeo';
		}
		if ( $videoHost !== '' ){
			$video_src = get_video_src($videoProyecto, $videoHost);
			if( $video_src ){ ?>
				<div class="[ clearfix ] [ margin-bottom-medium ]">
					<div class="[ margin-bottom-medium ]" id="thing-with-videos">
						<iframe src="<?php echo $video_src ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
		<?php }
		} ?>
	</div>
	<?php get_sidebar(); ?>
	<section class="[ clearfix ] [ columna xmall-12 medium-8 large-9 ]">
		<?php
		$args = array(
			'post_type' 		=> 'proyecto',
			'posts_per_page' 	=> 3,
			'tax_query' => array(
				array(
					'taxonomy' => 'category-proyectos',
					'field'    => 'term_id',
					'terms'    => $categoriasIDArray
				),
			),
			'post__not_in' 		=> array($postID)
		);
		$queryProyecto = new WP_Query( $args );
		// echo '<pre>';
		// 	print_r($queryProyecto);
		// echo '</pre>';
		if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
			<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-4 ]">
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
	</section>
<?php get_footer(); ?>