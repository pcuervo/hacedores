<?php get_header(); ?>
	<section class="[ clearfix ] [ columna xmall-12 medium-8 large-9 ]">
		<?php
		//HACEDORES
		$args = array(
			'role' 		=> 'Editor',
			'number' 	=> 1,
			'orderby' 	=> 'registered',
			'order'		=> 'DESC'
		);
		$queryHacedores = new WP_User_Query( $args );
		if ( ! empty( $queryHacedores->results ) ) {
			foreach ( $queryHacedores->results as $user ) {
				$userNombre = $user->display_name;
				$userID 	= $user->ID;
				$userMeta 	= get_user_meta( $userID );
				$userBio 	= $userMeta['description'][0];
				$userAvatar = get_user_meta($userID, 'user_profile_img', true);
				if ( $userAvatar == '' ){
					$userAvatar = THEMEPATH.'images/default-hacedores.png';
				} else {
					$userAvatarID 		= get_attachment_id_from_url($userAvatar);
					$userAvatarMedium 	= wp_get_attachment_image_src($userAvatarID, 'medium');
					$userAvatar 		= $userAvatarMedium[0];
				}

				$userURL 	= get_author_posts_url($userID);
				?>
				<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-4 ]">
					<a class="[ block ]" href="<?php echo $userURL; ?>">
						<img class="[ block ][ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userNombre; ?>">
					</a>
					<div class="[ post-texto ]">
						<a href="<?php echo $userURL; ?>"><h2><?php echo $userNombre; ?></h2></a>
						<p><?php echo trim_text($userBio, 200); ?></p>
						<div class="[ screen ]"></div>
					</div>
					<a href="<?php echo $userURL; ?>" class="[ block ][ boton ][ text-center ][ leer-mas hacedores ]">Leer más</a>

				</div><!-- post -->
		<?php }
		}

		//PROYECTOS
		$args = array(
			'post_type' 		=> 'proyecto',
			'posts_per_page' 	=> 1
		);
		$queryProyecto = new WP_Query( $args );
		if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
			<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-4 ]">
				<a class="[ block ]" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('medium', array('class' => '[ block ][ margin-bottom-small ]')); ?>
					<?php } else { $userAvatar = THEMEPATH.'images/default-proyectos.png';?>
						<img class="[ block ][ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php the_title(); ?>">
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
		<?php endwhile; endif; wp_reset_query();

		//RECURSOS
		$args = array(
			'post_type' 		=> 'recurso',
			'posts_per_page' 	=> 1
		);
		$queryProyecto = new WP_Query( $args );
		if ( $queryProyecto->have_posts() ) : while ( $queryProyecto->have_posts() ) : $queryProyecto->the_post(); ?>
			<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-4 ]">
				<a class="[ block ]" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('medium', array('class' => '[ block ][ margin-bottom-small ]')); ?>
					<?php } else { $userAvatar = THEMEPATH.'images/default-recursos.png';?>
						<img class="[ block ][ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php the_title(); ?>">
					<?php } ?>
				</a>
				<div class="[ post-texto ]">
					<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
					<?php
						$content = get_the_content();
						$content = strip_tags($content);
						echo '<p>';
							echo trim_text($content, 200);
						echo '</p>';
					?>
					<div class="[ screen ]"></div>
				</div>
				<a href="<?php the_permalink(); ?>" class="[ block ][ boton ][ text-center ][ leer-mas recursos ]">Leer más</a>
			</div><!-- post -->
		<?php endwhile; endif; wp_reset_query(); ?>
	</section>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>