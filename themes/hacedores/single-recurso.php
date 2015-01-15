<?php
	get_header();
	the_post();
?>
	<div class="[ columna xmall-12 medium-3 large-3 ] [ side-proyecto ]">
		<h2><?php the_title(); ?></h2>
		<?php
			$categoriasArgs = array(
				'exclude' => '1'
			);
			$categorias = get_categories($categoriasArgs);
			foreach($categorias as $category) {
				echo '<p>'.$category->name.'</p> ';
			}
		?>
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
			$videoHost = false;
			$videoProyecto = get_post_meta($post->ID, '_video_meta', true);
			if (strpos($videoProyecto,'youtube') !== false) {
				$videoHost = 'youtube';
			} else if (strpos($videoProyecto,'vimeo') !== false) {
				$videoHost = 'vimeo';
			}
			if ( $videoHost ){
				$video_src = get_video_src($videoProyecto, $videoHost);
				if( $video_src ){ ?>
					<div class="[ clearfix ] [ margin-bottom-medium ]">
						<div class="[ margin-bottom-medium ]" id="thing-with-videos">
							<iframe src="<?php echo $video_src ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
				<?php }
			}
		?>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>