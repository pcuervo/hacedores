<?php get_header(); ?>
	<section class="[ clearfix ]">
		<?php
		$args = array(
			'role' 		=> 'Editor',
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

					echo '<pre>';
						// echo 'test';
						// print_r($userAvatarID);
						// print_r($userAvatarMedium);
						// print_r($userAvatar);
					echo '</pre>';
				}
				$userURL 	= get_author_posts_url($userID);
				?>
				<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-3 ]">
					<a href="<?php echo $userURL; ?>">
						<img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userNombre; ?>">
					</a>
					<div class="[ post-texto ]">
						<a href="<?php echo $userURL; ?>">
							<h2><?php echo $userNombre; ?></h2></a>
						<p><?php echo trim_text($userBio, 200); ?></p>
						<div class="[ screen ]"></div>
					</div>
					<a href="<?php echo $userURL; ?>" class="[ block ][ boton ][ text-center ][ leer-mas hacedores ]">Leer más</a>
				</div><!-- post -->
		<?php }
		} ?>
	</section>
<?php get_footer(); ?>