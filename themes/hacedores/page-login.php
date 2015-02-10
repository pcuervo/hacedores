<?php  
	if(isset($_POST['submit'])) 
	{ 
		$username = $_POST['email'];
		$password = $_POST['password'];
		$error = null;
		if ( site_login_post($username, $password) ){
			header("Location: ".site_url()."/dashboard");
			die();
		}
		else{
			$error = "Usuario y/o contraseña invalida";
		}
	}
?>
<?php  get_header(); ?>



<div class="container">
			<div class="[ main ]">
				<div class="[ width clearfix ]">
					<?php do_action('oa_social_login'); ?>
					<div class="[ columna xmall-12 medium-8 large-8 ] [ margin-bottom-medium ] [ clearfix ] [ form-user ]">
						<?php if($error) ?>
							<div><?php echo $error; ?></div>
						<form name="registro" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
							<div class="[ registro-usuarios ] [ content ]">
								<h3>Login para el usuario</h3>
								<div class="campo">
									<label for="email-hacedor" class="[ columna xmall-12 ]">Correo electrónico</label>
									<input name="email" type="email" id="email-hacedor">
								</div>
								<div class="campo">
									<label for="password" class="[ columna xmall-12 ]">Contraseña</label>
									<input name="password" type="password" id="password">
								</div>
								<input type="submit" name="submit" value="Entrar" class="[ boton-entrar ]">
<!-- =======
								<input type="submit" name="submit" value="Ingresar">
>>>>>>> c243a7f650130fbb2e49b1d4a87258554a0628d0 -->
							</div>
						</form>
					</div>
				</div><!-- width -->
			</div><!-- main -->
		</div><!-- container -->
<?php get_footer(); ?>