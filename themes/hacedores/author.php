<?php
	get_header();
	$user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

	$userID 			= $user->ID;
	$userName 			= $user->display_name;
	$userEmail 			= $user->user_email;
	$userURL 			= $user->user_url;
	$userAvatar 		= get_user_meta($userID, 'user_profile_img', true);
	$userFB 			= get_user_meta($userID, 'facebook', true);
	$userTW 			= get_user_meta($userID, 'twitter', true);
	$userInfo 			= get_user_meta($userID, 'description', true);
	$userCategories 	= get_user_meta($userID, 'user_categories', true);
	$userTel 			= get_user_meta($userID, 'celular', true);
	$userDireccion 		= get_user_meta($userID, 'direccion', true);
	$userInstructables 	= get_user_meta($userID, 'liga_instructable', true);
	$userVideo 			= get_user_meta($userID, 'liga_video', true);
	$userIMG1 			= get_user_meta($userID, 'user_uno_img', true);
	$userIMG2 			= get_user_meta($userID, 'user_dos_img', true);
	$userIMG3 			= get_user_meta($userID, 'user_tres_img', true);
	$userIMG4 			= get_user_meta($userID, 'user_cuatro_img', true);
?>
	<div class="[ columna xmall-12 medium-3 large-3 ] [ side-proyecto ]">
		<h2><?php echo $userName; ?></h2>
		<?php
			foreach($userCategories as $userCategoryID) {
				$userCategory = get_the_category_by_ID($userCategoryID); ?>
				<h2 class="[ no-margin ]"><small><small><?php echo $userCategory; ?></small></small></h2>
			<?php }
		?>
		<p><a target="_blank" href="<?php echo $userURL; ?>"><?php echo $userURL; ?></a></p>
	</div>
	<div class="[ columna xmall-12 medium-6 ] [ clearfix ]">
		<img class="[ margin-bottom-small ]" src="<?php echo $userAvatar; ?>" alt="<?php echo $userName; ?>">
		<p><?php echo $userInfo; ?></p>
		<div class="[ clearfix ] [ margin-bottom-medium ]">
			<ul class="[ clearfix ] [ margin-bottom-medium ] [ galeria ]">
				<?php if ( $userIMG1 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userIMG1; ?>" data-imagelightbox="f">
							<img src="<?php echo $userIMG1; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
				<?php if ( $userIMG2 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userIMG2; ?>" data-imagelightbox="f">
							<img src="<?php echo $userIMG2; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
				<?php if ( $userIMG3 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userIMG3; ?>" data-imagelightbox="f">
							<img src="<?php echo $userIMG3; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
				<?php if ( $userIMG4 ){ ?>
					<li class="[ columna xmall-6 medium-4 ]">
						<a href="<?php echo $userIMG4; ?>" data-imagelightbox="f">
							<img src="<?php echo $userIMG4; ?>" alt="" />
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php
		if (strpos($userVideo,'youtube') !== false) {
			$videoHost = 'youtube';
		}
		if (strpos($userVideo,'vimeo') !== false) {
			$videoHost = 'vimeo';
		}
		if( $videoHost ){
			$video_src = get_video_src($userVideo, $videoHost);
			if( $video_src ){ ?>
				<div class="[ clearfix ] [ margin-bottom-medium ]">
					<div class="[ margin-bottom-medium ]" id="thing-with-videos">
						<iframe src="<?php echo $video_src ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
		<?php } } ?>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>