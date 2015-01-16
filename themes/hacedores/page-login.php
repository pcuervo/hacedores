<?php  
	if(isset($_POST['submit'])) 
	{ 
		$username = $_POST['email'];
		$password = $_POST['password'];

		if ( site_login_post($username, $password) ){
			header("Location: ".site_url()."/dashboard");
			die();
		}
		else{
			header("Location: ".site_url());
			die();
		}
	}
?>
<?php  get_header(); ?>
<div class="container">
			<?php do_action('oa_social_login'); ?>
			<div class="[ main ]">
				<div class="[ width clearfix ]">
					<div class="[ columna xmall-12 medium-8 large-8 ] [ margin-bottom-medium ] [ clearfix ] [ form-user ]">
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
								<input type="submit" name="submit" value="Registrarse">
							</div>
						</form>
					</div>
				</div><!-- width -->
			</div><!-- main -->
		</div><!-- container -->
<?php get_footer(); ?>