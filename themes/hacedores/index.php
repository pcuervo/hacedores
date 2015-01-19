<?php get_header(); ?>
	<section class="[ clearfix ] [ columna xmall-12 medium-8 large-9 ]">
		<?php
		//HACEDORES
		$args = array(
			'role' 		=> 'Editor',
			'number' 	=> 1
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
				}
				$userURL 	= get_author_posts_url($userID);
				?>
				<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-4 ]">
					<a href="<?php echo $userURL; ?>"><img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userNombre; ?>"></a>
					<a href="<?php echo $userURL; ?>"><h2><?php echo $userNombre; ?></h2></a>
					<p><?php echo $userBio; ?></p>
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
				<a href="<?php the_permalink(); ?>">
					<?php if ( the_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('medium', array('class' => '[ margin-bottom-small ]')); ?>
					<?php } else { $userAvatar = THEMEPATH.'images/default-proyectos.png';?>
						<img class="[ margin-bottom-medium ]" src="<?php echo $userAvatar; ?>" alt="<?php the_title(); ?>">
					<?php } ?>
				</a>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_content(); ?>
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
				<a href="<?php the_permalink(); ?>">
					<?php if ( the_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('medium', array('class' => '[ margin-bottom-small ]')); ?>
					<?php } else { $userAvatar = THEMEPATH.'images/default-recursos.png';?>
						<img class="[ margin-bottom-medium ]" src="<?php echo $userAvatar; ?>" alt="<?php the_title(); ?>">
					<?php } ?>
				</a>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_content(); ?>
			</div><!-- post -->
		<?php endwhile; endif; wp_reset_query(); ?>
	</section>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>