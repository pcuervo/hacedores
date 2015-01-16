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
				$userAvatar = get_avatar_url(get_avatar( $userID, 150 ));
				$userURL 	= get_author_posts_url($userID);
				//echo $userURL;
				?>
				<div class="[ post ] [ margin-bottom-medium ] [ columna xmall-12 small-6 medium-3 ]">
					<a href="<?php echo $userURL; ?>"><img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userNombre; ?>"></a>
					<a href="<?php echo $userURL; ?>"><h2><?php echo $userNombre; ?></h2></a>
					<p><?php echo $userBio; ?></p>
				</div><!-- post -->
		<?php }
		} ?>
	</section>
<?php get_footer(); ?>