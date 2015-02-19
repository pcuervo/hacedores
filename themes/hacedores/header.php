<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-56741529-1', 'auto');
			ga('send', 'pageview');
		</script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyAjE9TVybKKQNNOa1g760xJ4y6b5YaZmq4"></script>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="container">
			<header>
				<div class="[ width clearfix ]">
					<div class="[ columna xmall-6 ][ margin-bottom-small ]">
						<h1><a href="<?php echo site_url(); ?>">Hacedores CDMX</a></h1>
						<span class="subtitle">Un proyecto del Laboratorio para la Ciudad</span>
					</div>
					<div class="[ columna xmall-6 ][ no-xmall no-small no-medium large ][ text-right ][ margin-bottom-small ]">
						<?php if ( !is_user_logged_in() ) { ?>
							<a class="[ boton ][ inline-block ][ login-entrar ][ js-abrir-modal ]">
								Entrar
							</a>
							<a href="registro" class="[ boton ][ inline-block ][ no-xmall medium ][ menu ]">
								Registrarse
							</a>
						<?php } else { ?>
							<a href="<?php echo  site_url().'/wp-admin/profile.php'; ?>" class="[ boton ][ inline-block ][ no-xmall medium ][ menu ]">
								Mi cuenta
							</a>
							<a href="<?php echo  esc_url( wp_logout_url(site_url()) ); ?>" class="[ boton ][ inline-block ][ no-xmall medium ][ menu ]">
								Salir
							</a>
						<?php } ?>
					</div>

					<nav id="menu-movil" class="[ no-large ]">
						<ul>
							<?php if ( ! is_user_logged_in() ) { ?>
								<li class="[ clearfix ]">
									<a class="[ no-xmall medium ] [ inline-block middle ] [ menu entrar ] [ js-abrir-modal ]">
										<h3><span class="">Entrar</span></h3>
									</a>
								</li>
							<?php } ?>
							<li class="[ clearfix ]">
								<a class="[ no-xmall medium ] [ inline-block middle ] [ menu informacion ]" href="<?php echo site_url('recursos'); ?>">
									<h3 class="[ informacion ]">Información</h3>
									<i class="[ icon-icon_clavo2 ] [ icon informacion ] [ center block ]"></i>
								</a>
							</li>
							<li class="[ clearfix ]">
								<a class="[ no-xmall medium ] [ inline-block middle ] [ menu perfiles ]" href="<?php echo site_url('proyectos'); ?>">
									<h3 class="[ perfiles ]">Hacedores</h3>
									<i class="[ icon-icon_zanahoria ] [ icon perfiles ] [ center block ]"></i>
								</a>
							</li>
							<li class="[ clearfix ]">
								<a class="[ no-xmall medium ] [ inline-block middle ] [ menu programacion ]" href="<?php echo site_url('hacedores'); ?>">
									<h3 class="[ programacion ]">Proyectos</h3>
									<i class="[ icon-icon_gubia ] [ icon programacion ] [ center block ]"></i>
								</a>
							</li>
							<li class="[ clearfix ]">
								<a class="[ no-xmall medium ] [ inline-block middle ] [ menu recursos ]" href="<?php echo site_url('informacion'); ?>">
									<h3 class="[ recursos ]">Recursos</h3>
									<i class="[ icon-icon_tornillo ] [ icon recursos ] [ center block ]"></i>
								</a>
							</li>
							<li class="[ clearfix ]">
								<a class="[ no-xmall medium ] [ inline-block middle ] [ menu entrar ]" href="<?php echo site_url('mapa-hacedores'); ?>">
									<h3 class="[ recursos ]">Ver Mapa de Hacedores</h3>
								</a>
							</li>
						</ul>
					</nav><!-- MENU MOVIL -->

					<div class="[ columna xmall-6 ][ no-large ][ right ]">
						<a class="[ no-large ] [ informacion ] [ right ]" href="#menu-movil"><i class="fa fa-bars fa-2x"></i></a>
					</div>

					<div class="clear"></div>

					<div class="[ columna xmall-6 ]">
						<div class="[ clearfix ] [ nombre-seccion ]">
							<?php if ( get_post_type() == 'informacion'){ ?>
								<img class="icon-gif" src="<?php echo THEMEPATH; ?>images/icon-gray.gif" alt="">
								<h3>Información</h3>
							<?php } elseif ( is_page('hacedores') OR is_author() ) { ?>
								<img class="icon-gif" src="<?php echo THEMEPATH; ?>images/icon-red.gif" alt="">
								<h3>Hacedores</h3>
							<?php } elseif ( get_post_type() == 'proyecto'){ ?>
								<img class="icon-gif" src="<?php echo THEMEPATH; ?>images/icon-blue.gif" alt="">
								<h3>Proyectos</h3>
							<?php } elseif ( get_post_type() == 'recurso'){ ?>
								<img class="icon-gif" src="<?php echo THEMEPATH; ?>images/icon-green.gif" alt="">
								<h3>Recursos</h3>
							<?php } ?>
						</div>
					</div>
					<nav class="[ columna medium medium-6 ][ medium ][ right ]">
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu recursos ] [ right ] <?php echo ( get_post_type() == 'recurso' ? 'active' : ''); ?>" href="<?php echo site_url('recursos'); ?>">
							<h3 class="[ recursos ]">Recursos</h3>
							<i class="[ icon-icon_tornillo ] [ icon recursos ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu programacion ] [ right ] <?php if( get_post_type() == 'proyecto' AND ! is_author() ){ echo 'active'; } ?>" href="<?php echo site_url('proyectos'); ?>">
							<h3 class="[ programacion ]">Proyectos</h3>
							<i class="[ icon-icon_gubia ] [ icon programacion ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu perfiles ] [ right ] <?php echo ( is_page('hacedores') ? 'active' : ''); echo ( is_author() ? 'active' : ''); ?>" href="<?php echo site_url('hacedores'); ?>">
							<h3 class="[ perfiles ]">Hacedores</h3>
							<i class="[ icon-icon_zanahoria ] [ icon perfiles ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu informacion ][ right ] <?php echo ( get_post_type() == 'informacion' ? 'active' : ''); ?>" href="<?php echo site_url('informacion'); ?>">
							<h3 class="[ informacion ]">Información</h3>
							<i class="[ icon-icon_clavo2 ] [ icon informacion ] [ center block ]"></i>
						</a>
					</nav>
				</div><!-- width -->
			</header>
			<div class="[ main ]">
				<div class="[ width clearfix ]">
					<section class="[ mapa ][ medium ][ margin-bottom-big ] [ relative ]">
						<div class="[ no-xmall medium ]">
							<?php if( ! is_single() AND ! is_page('registro') AND ! is_author() ) { ?>
							<div class="[ menu-container ]">
								<div class="[ menu-mapa ]">
									<ul class="[ menu-titulos ]">
										<?php if ( is_home() || is_page( 'hacedores' ) || ( is_post_type_archive( 'informacion' ) ) ) {
											if ( ! is_page( 'hacedores' ) ) { ?>
												<li class="[ todos ] [ trigger ]">Ver todo</li>
											<?php } ?>

											<li class="[ hacedores ] [ trigger ]" data-rel="sub-hacedores">Hacedores</li>
											<ul class="[ submenu-mapa ] [ sub-hacedores ] [ content ]">
											<?php
											$args = array(
												'role' => 'Editor'
											);
											$queryHacedores = new WP_User_Query( $args );
											if ( ! empty( $queryHacedores->results ) ) {
												$infoCategoriaHacedores = array();
												foreach ( $queryHacedores->results as $user ) {
													$userNombre 	= $user->display_name;
													$userID 		= $user->ID;
													$userMeta 		= get_user_meta( $userID );
													$userBio 		= $userMeta['description'][0];
													$userNiceName	= $user->user_nicename;
													$userAvatar 	= get_avatar_url(get_avatar( $userID, 150 ));
													$userURL 		= get_author_posts_url($userID);

													$user_categories =  get_user_meta( $user->ID, 'user_categories', false );
													$args = array( 'hide_empty' =>0, 'taxonomy'=> 'category');
													$categories = get_categories($args);
													if ($categories){
														foreach ( $categories as $category ){
															if(count($user_categories) <= 0) continue;

															if(in_array($category->term_id,(array)$user_categories[0])) {
																$sanitized_category = sanitize_title($category->name);
																$infoCategoriaHacedores[$sanitized_category][] = $category->name;
															}
														}
													}
												}

												foreach ($infoCategoriaHacedores as $key => $value) {
												?>
													<li class="[ <?php echo $key ; ?> ]"><?php echo $value[0]; ?></li>
												<?php
												}
												// echo '<pre>';
												// print_r($infoCategoriaHacedores);
												// echo '</pre>';
											} ?>
											</ul>
										<?php } ?>
										<?php if ( is_home() || is_post_type_archive( 'proyecto' ) || is_post_type_archive( 'informacion' ) ) { ?>
											<li class="[ proyecto ] [ trigger ]" data-rel="sub-proyecto">Proyectos</li>
											<ul class="[ submenu-mapa ] [ sub-proyecto ] [ content ]">
												<?php
													$customPostTaxonomies = get_object_taxonomies('proyecto');
													if(count($customPostTaxonomies) > 0){
														foreach($customPostTaxonomies as $tax){
															$args = array(
																'orderby' 		=> 'name',
																'show_count' 	=> 0,
																'pad_counts' 	=> 0,
																'hierarchical' 	=> 1,
																'taxonomy' 		=> $tax,
																'exclude' 		=> 1,
																'hide_empty' 	=> 1
															);
															$customPostCategories = get_categories( $args );
															foreach ($customPostCategories as $customPostCategory) {
																$customPostCategoryName = $customPostCategory->name;
																$customPostCategorySlug = $customPostCategory->slug; ?>
																<li class="[ <?php echo $customPostCategorySlug; ?> ]"><?php echo $customPostCategoryName; ?></li>
															<?php }
														}
													}
												?>
											</ul>
										<?php } ?>
										<?php if ( is_home() || is_post_type_archive( 'recurso' ) || is_post_type_archive( 'informacion' ) ) { ?>
											<li class="[ recurso ] [ trigger ]" data-rel="sub-recurso">Recursos</li>
											<ul class="[ submenu-mapa ] [ sub-recurso ] [ content ]">
												<?php
													$customPostTaxonomies = get_object_taxonomies('recurso');
													if(count($customPostTaxonomies) > 0){
														foreach($customPostTaxonomies as $tax){
															$args = array(
																'orderby' 		=> 'name',
																'show_count' 	=> 0,
																'pad_counts' 	=> 0,
																'hierarchical' 	=> 1,
																'taxonomy' 		=> $tax,
																'exclude' 		=> 1,
																'hide_empty' 	=> 1
															);
															$customPostCategories = get_categories( $args );
															foreach ($customPostCategories as $customPostCategory) {
																$customPostCategoryName = $customPostCategory->name;
																$customPostCategorySlug = $customPostCategory->slug; ?>
																<li class="[ <?php echo $customPostCategorySlug; ?> ]"><?php echo $customPostCategoryName; ?></li>
															<?php }
														}
													}
												?>
											</ul>
										<?php } ?>
										<?php if ( is_home() || is_post_type_archive( 'informacion' ) ) { ?>
											<li class="[ evento ] [ trigger ]" data-rel="sub-evento">Eventos</li>
											<ul class="[ submenu-mapa ] [ sub-evento ] [ content ]">
												<?php
													$customPostTaxonomies = get_object_taxonomies('evento');
													if(count($customPostTaxonomies) > 0){
														foreach($customPostTaxonomies as $tax){
															$args = array(
																'orderby' 		=> 'name',
																'show_count' 	=> 0,
																'pad_counts' 	=> 0,
																'hierarchical' 	=> 1,
																'taxonomy' 		=> $tax,
																'exclude' 		=> 1,
																'hide_empty' 	=> 1
															);
															$customPostCategories = get_categories( $args );
															foreach ($customPostCategories as $customPostCategory) {
																$customPostCategoryName = $customPostCategory->name;
																$customPostCategorySlug = $customPostCategory->slug; ?>
																<li class="[ <?php echo $customPostCategorySlug; ?> ]"><?php echo $customPostCategoryName; ?></li>
															<?php }
														}
													}
												?>
											</ul>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div id="mapa"></div>
							<?php } ?>
							
						</div>
					</section><!-- mapa -->