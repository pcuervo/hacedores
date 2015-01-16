<?php  
	if(isset($_POST['submit'])) 
	{ 
		$response = register_user_new($_POST);
		if (!$response['error']){
			$location = site_url().'/wp-admin/profile.php';
			wp_redirect( $location );
		}else{
			echo $response['msj'];
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
								<h3>REGISTRO PARA USUARIOS</h3>
								<div class="campo">
									<label for="email-hacedor" class="[ columna xmall-12 ]">Correo electrónico</label>
									<input name="email" type="email" id="email-hacedor">
								</div>
								<div class="campo">
									<label for="password" class="[ columna xmall-12 ]">Contraseña</label>
									<input name="password" type="password" id="password">
								</div>
								<div class="campo">
									<label for="confirmar-password" class="[ columna xmall-12 ]">Confirmar contraseña</label>
									<input name="password_confirmation" type="password" id="confirmar-password">
								</div>
								<input type="submit" name="submit" value="Registrarse">
							</div>
						</form>
					</div>
				</div><!-- width -->
			</div><!-- main -->
		</div><!-- container -->
<?php get_footer(); ?>