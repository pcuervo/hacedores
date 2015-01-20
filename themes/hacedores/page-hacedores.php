<?php get_header(); ?>
	<section class="[ clearfix ]">
		<?php
		$args = array(
			'role' => 'Editor'
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
				<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-3 ]">
					<a href="<?php echo $userURL; ?>">
						<img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userNombre; ?>">
					</a>
					<a href="<?php echo $userURL; ?>">
						<h2><?php echo $userNombre; ?></h2></a>
					<p><?php echo trim_text($userBio, 200); ?></p>
				</div><!-- post -->
		<?php }
		} ?>
	</section>
<?php get_footer(); ?>