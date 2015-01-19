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
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="container">
			<header>
				<div class="[ width clearfix ]">
					<div class="[ columna xmall-12 ][ no-xmall no-small no-medium large ][ text-right ][ margin-bottom-small ]">
						<?php if ( !is_user_logged_in() ) { ?>
							<a class="[ boton ][ inline-block ][ login-entrar ][ js-abrir-modal ]">Entrar</a>
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
					<div class="[ columna xmall-6 medium-3 ]">
						<h1><a href="<?php echo site_url(); ?>">Hacedores CDMX</a></h1>
					</div>
					<div class="[ columna xmall-4 small-3 medium-2 large-2 ]">
						<a href="http://labplc.mx/" target="_blank"><img src="<?php echo THEMEPATH; ?>images/logo-laboratorio-ciudad.png" alt=""></a>
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
									<h3 class="[ recursos ]">Espacios/Recuros</h3>
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
					<nav class="[ columna xmall-2 medium-7 large-7 ] [ right ]">
						<a class="[ no-large ] [ informacion ] [ right ]" href="#menu-movil"><i class="fa fa-bars fa-2x"></i></a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu recursos ] [ right ]" href="<?php echo site_url('recursos'); ?>">
							<h3 class="[ recursos ]">Espacios/Recursos</h3>
							<i class="[ icon-icon_gubia ] [ icon recursos ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu programacion ] [ right ]" href="<?php echo site_url('proyectos'); ?>">
							<h3 class="[ programacion ]">Proyectos</h3>
							<i class="[ icon-icon_gubia ] [ icon programacion ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu perfiles ] [ right ]" href="<?php echo site_url('hacedores'); ?>">
							<h3 class="[ perfiles ]">Hacedores</h3>
							<i class="[ icon-icon_zanahoria ] [ icon perfiles ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu informacion ] [ right ]" href="<?php echo site_url('informacion'); ?>">
							<h3 class="[ informacion ]">Información</h3>
							<i class="[ icon-icon_clavo2 ] [ icon informacion ] [ center block ]"></i>
						</a>
					</nav>
				</div><!-- width -->
			</header>
			<div class="[ main ]">
				<div class="[ width clearfix ]">
					<section class="[ mapa ] [ margin-bottom-big ] [ relative ]">
						<div class="[ no-xmall medium ]">
							<div class="[ menu-container ]">
								<div class="[ menu-mapa ]">
									<ul class="[ menu-titulos ]">
										<?php if ( is_home() || is_page('hacedores') ) { ?>
											<li class="[ hacedores ] [ trigger ]" data-rel="sub-hacedores">Hacedores</li>
											<ul class="[ submenu-mapa ] [ sub-hacedores ] [ content ]">
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
													<li class="[ <?php echo $customPostCategorySlug; ?> ]"><?php echo $userNombre; ?></li>
											<?php }
											} ?>
											</ul>
										<?php } ?>
										<?php if ( is_home() || get_post_type() == 'proyecto' ) { ?>
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
										<?php if ( is_home() || get_post_type() == 'recurso' ) { ?>
											<li class="[ recurso ] [ trigger ]" data-rel="sub-recurso">Espacios / Recursos</li>
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
										<?php if ( is_home() || get_post_type() == 'evento' ) { ?>
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
						</div>
					</section><!-- mapa -->