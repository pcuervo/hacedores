<?php
	get_header();
	$user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	$userID 			= $user->ID;
	$userName 			= $user->display_name;
	$userEmail 			= $user->user_email;
	$userURL 			= $user->user_url;
	if ( $userURL ){
		$userURL 		= addhttp($userURL);
	}

	$userAvatar 		= get_user_meta($userID, 'user_profile_img', true);
	if ( $userAvatar == '' ){
		$userAvatar = THEMEPATH.'images/default-hacedores.png';
	} else {
		$userAvatarID 		= get_attachment_id_from_url($userAvatar);
		$userAvatarMedium 	= wp_get_attachment_image_src($userAvatarID, 'medium');
		$userAvatar 		= $userAvatarMedium[0];
	}

	$userFB 			= get_user_meta($userID, 'facebook', true);

	$userTW 			= get_user_meta($userID, 'twitter', true);

	$userInfo 			= get_user_meta($userID, 'description', true);

	$userCategories 	= get_user_meta($userID, 'user_categories', true);

	$userInstructables 	= get_user_meta($userID, 'liga_instructable', true);
	if ( $userInstructables ){
		$userInstructables 		= addhttp($userInstructables);
	}

	$userVideo = get_user_meta($userID, 'liga_video', true);
	$videoHost = NULL;
	$video_src = '';
	if (strpos($userVideo,'youtube') !== false) {
		$videoHost = 'youtube';
	}
	if (strpos($userVideo,'vimeo') !== false) {
		$videoHost = 'vimeo';
	}
	if( $videoHost ){
		$video_src = get_video_src($userVideo, $videoHost);
	}

	$userImg1 			= get_user_meta($userID, 'user_uno_img', true);
	$userImg1ID 		= get_attachment_id_from_src($userImg1);
	$userImg1URL 		= wp_get_attachment_image_src( $userImg1ID, 'thumbnail' );

	$userImg2 			= get_user_meta($userID, 'user_dos_img', true);
	$userImg2ID 		= get_attachment_id_from_src($userImg2);
	$userImg2URL 		= wp_get_attachment_image_src( $userImg2ID, 'thumbnail' );

	$userImg3 			= get_user_meta($userID, 'user_tres_img', true);
	$userImg3ID 		= get_attachment_id_from_src($userImg3);
	$userImg3URL 		= wp_get_attachment_image_src( $userImg3ID, 'thumbnail' );

	$userImg4 			= get_user_meta($userID, 'user_cuatro_img', true);
	$userImg4ID 		= get_attachment_id_from_src($userImg4);
	$userImg4URL 		= wp_get_attachment_image_src( $userImg4ID, 'thumbnail' );

?>
	<div class="[ columna xmall-12 medium-3 large-3 ] [ side-proyecto ]">
		<h2><?php echo $userName; ?></h2>
		<?php
			if ( $userCategories ){
				foreach($userCategories as $userCategoryID) {
					$userCategory = get_the_category_by_ID($userCategoryID); ?>
					<h2 class="[ no-margin ]"><small><small><?php echo $userCategory; ?></small></small></h2>
				<?php }
			}
		?>

		<?php if ( $userURL ){ ?>
			<p><a target="_blank" href="<?php echo $userURL; ?>"><?php echo $userURL; ?></a></p>
		<?php } ?>

		<?php if ( $userFB ){ ?>
			<p><a target="_blank" href="<?php echo $userFB; ?>">Facebook</a></p>
		<?php } ?>

		<?php if ( $userTW ){ ?>
			<p><a target="_blank" href="<?php echo $userTW; ?>">Twitter</a></p>
		<?php } ?>

		<?php if ( $userInstructables ){ ?>
			<p><a target="_blank" href="<?php echo $userInstructables; ?>">Instructables</a></p>
		<?php } ?>
	</div>
	<div class="[ columna xmall-12 medium-6 ] [ clearfix ]">
		<img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userName; ?>">
		<p><?php echo $userInfo; ?></p>
		<div class="[ clearfix ] [ margin-bottom-medium ]">
			<ul class="[ clearfix ] [ margin-bottom-medium ] [ galeria ]">
				<?php if ( $userImg1 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userImg1; ?>" data-imagelightbox="f">
							<img src="<?php echo $userImg1URL[0]; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
				<?php if ( $userImg2 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userImg2; ?>" data-imagelightbox="f">
							<img src="<?php echo $userImg2URL[0]; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
				<?php if ( $userImg3 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userImg3; ?>" data-imagelightbox="f">
							<img src="<?php echo $userImg3URL[0]; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
				<?php if ( $userImg4 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userImg4; ?>" data-imagelightbox="f">
							<img src="<?php echo $userImg4URL[0]; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php if( $video_src != '' ){ ?>
				<div class="[ clearfix ] [ margin-bottom-medium ]">
					<div class="[ margin-bottom-medium ]" id="thing-with-videos">
						<iframe src="<?php echo $video_src ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
		<?php } ?>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>