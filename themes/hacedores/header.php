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
						<h1><a href="index.html">Hacedores CDMX</a></h1>
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
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu recursos ] [ right ]" href="espacios.html">
							<h3 class="[ recursos ]">Espacios/Recursos</h3>
							<i class="[ icon-icon_gubia ] [ icon recursos ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu programacion ] [ right ]" href="proyectos.html">
							<h3 class="[ programacion ]">Proyectos</h3>
							<i class="[ icon-icon_gubia ] [ icon programacion ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu perfiles ] [ right ]" href="hacedores.html">
							<h3 class="[ perfiles ]">Hacedores</h3>
							<i class="[ icon-icon_zanahoria ] [ icon perfiles ] [ center block ]"></i>
						</a>
						<a class="[ no-xmall no-medium large ] [ inline-block middle ] [ menu informacion ] [ right ]" href="informacion.html">
							<h3 class="[ informacion ]">Información</h3>
							<i class="[ icon-icon_clavo2 ] [ icon informacion ] [ center block ]"></i>
						</a>
					</nav>
				</div><!-- width -->
			</header>
			<div class="[ main ]">
				<div class="[ width clearfix ]">