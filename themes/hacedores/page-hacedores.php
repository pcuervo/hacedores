<?php get_header(); ?>
	<section class="[ clearfix ]">
		<?php
		$count_args  = array(
		    'role'      => 'Editor',
		    'fields'    => 'all_with_meta',
		    'number'    => 999999
		);
		$user_count_query = new WP_User_Query($count_args);
		$user_count = $user_count_query->get_results();

		// count the number of users found in the query
		$total_users = $user_count ? count($user_count) : 1;

		// grab the current page number and set to 1 if no page number is set
		$page = isset($_GET['p']) ? $_GET['p'] : 1;
		//echo $_GET['p'];

		// how many users to show per page
		$users_per_page = 8;

		// calculate the total number of pages.
		$total_pages = 1;
		$offset = $users_per_page * ($page - 1);
		$total_pages = ceil($total_users / $users_per_page);
		$args = array(
			'role' 		=> 'Editor',
			'orderby' 	=> 'registered',
			'order'		=> 'DESC',
			'fields'    => 'all_with_meta',
		    'number'    => $users_per_page,
		    'offset'    => $offset // skip the number of users that we have per page
		);
		$wp_user_query = new WP_User_Query($args);

		// Get the results
		$authors = $wp_user_query->get_results();
		if ( ! empty( $authors ) ) {
			foreach ( $authors as $user ) {
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

					//echo '<pre>';
						// echo 'test';
						// print_r($userAvatarID);
						// print_r($userAvatarMedium);
						// print_r($userAvatar);
					//echo '</pre>';
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
		<div class="[ clear ]"></div>
		<div class="[ pagination-controls ] [ right ]">
			<?php
				$query_string = $_SERVER['QUERY_STRING'];
				$base = get_permalink( get_the_ID() ) . '?' . add_query_arg('p', $query_string) . '%_%';

				echo paginate_links( array(
				    'base' => $base, // the base URL, including query arg
				    'format' => '=%#%', // this defines the query parameter that will be used, in this case "p"
				    'prev_text' => __('&laquo; Previous'), // text for previous page
				    'next_text' => __('Next &raquo;'), // text for next page
				    'total' => $total_pages, // the total number of pages we have
				    'current' => $page, // the current page
				    'end_size' => 1,
				    'mid_size' => 5,
				));

				// echo paginate_links( array(
				// 	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				// 	'format' => '?page=%#%',
				// 	'current' => max( 1, get_query_var('paged') ),
				// 	'total' => $wp_query->max_num_pages
				// ) );
			?>
		</div>
	</section>
<?php get_footer(); ?>