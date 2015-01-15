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
					<div class="[ columna xmall-12 ] [ no-xmall no-small no-medium large ] [ user ]">
						<p class="[ right ] [ login-entrar ]"><span class="[ js-abrir-modal ]">Entrar</span></p>
					</div>
					<div class="[ columna xmall-6 medium-3 ]">
						<h1><a href="<?php echo site_url(); ?>">Hacedores CDMX</a></h1>
					</div>
					<div class="[ columna xmall-4 small-3 medium-2 large-2 ]">
						<a href="http://labplc.mx/" target="_blank"><img src="<?php echo THEMEPATH; ?>images/logo-laboratorio-ciudad.png" alt=""></a>
					</div>
					<nav id="menu-movil" class="[ no-large ]">
					   	<ul>
					   		<li class="[ clearfix ]">
					   			<a class="[ no-xmall medium ] [ inline-block middle ] [ menu entrar ] [ js-abrir-modal ]">
									<h3><span class="">Entrar</span></h3>
								</a>
							</li>
					   		<li class="[ clearfix ]">
					      		<a class="[ no-xmall medium ] [ inline-block middle ] [ menu informacion ]" href="informacion.html">
									<h3 class="[ informacion ]">Información</h3>
									<i class="[ icon-icon_clavo2 ] [ icon informacion ] [ center block ]"></i>
								</a>
					      	</li>
					      	<li class="[ clearfix ]">
					      		<a class="[ no-xmall medium ] [ inline-block middle ] [ menu perfiles ]" href="hacedores.html">
									<h3 class="[ perfiles ]">Hacedores</h3>
									<i class="[ icon-icon_zanahoria ] [ icon perfiles ] [ center block ]"></i>
								</a>
					      	</li>
					      	<li class="[ clearfix ]">
					      		<a class="[ no-xmall medium ] [ inline-block middle ] [ menu programacion ]" href="proyectos.html">
									<h3 class="[ programacion ]">Proyectos</h3>
									<i class="[ icon-icon_gubia ] [ icon programacion ] [ center block ]"></i>
								</a>
							</li>
							<li class="[ clearfix ]">
					      		<a class="[ no-xmall medium ] [ inline-block middle ] [ menu recursos ]" href="espacios.html">
									<h3 class="[ recursos ]">Espacios/Recuros</h3>
									<i class="[ icon-icon_tornillo ] [ icon recursos ] [ center block ]"></i>
								</a>
							</li>
							<li class="[ clearfix ]">
					      		<a class="[ no-xmall medium ] [ inline-block middle ] [ menu entrar ]" href="mapa-hacedores.html">
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
					<section class="[ mapa ] [ margin-bottom-big ] ">
						<div class="[ google-maps ] [ no-xmall medium ]">
							<div class="[ menu-container ]">
								<div class="[ menu-mapa ]">
									<ul class="[ menu-titulos ]">
										<li class="[ hacedores ] [ trigger ]" data-rel="sub-hacedores">Hacedores</li>
											<ul class="[ submenu-mapa ] [ sub-hacedores ] [ content ]">
												<li>No disponible</li>
											</ul>
										<li class="[ proyectos ] [ trigger ]" data-rel="sub-proyectos">Proyectos</li>
											<ul class="[ submenu-mapa ] [ sub-proyectos ] [  content ]">
												<li>No disponible</li>
											</ul>
										<li class="[ espacios ] [ trigger ]" data-rel="sub-espacios">Espacios / Recursos</li>
											<ul class="[ submenu-mapa ] [ sub-espacios ] [ content ]">
												<li>No disponible</li>
											</ul>
										<li class="[ eventos ] [ trigger ]" data-rel="sub-eventos">Eventos</li>
											<ul class="[ submenu-mapa ] [ sub-eventos ] [ content ]">
												<li>No disponible</li>
											</ul>
									</ul>
								</div>
							</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" width="600" height="300" frameborder="0" style="border:0"></iframe>
						</div>
					</section><!-- mapa -->