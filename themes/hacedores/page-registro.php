<?php
	$error = get_query_var( 'my_error', -1 );
	get_header();
?>
		<div class="container">
			<div class="[ main ]">
				<div class="[ width clearfix ]">
					<div class="[ columna xmall-12 medium-8 large-8 ] [ margin-bottom-medium ] [ clearfix ] [ form-user ]">
						<form name="registro" method="post" action="<?php echo site_url().'/attempt-register'; ?>">
							<div class="[ registro-usuarios ] [ content ]">
								<h3>REGISTRATE CON TUS REDES</h3>
								<?php do_action('oa_social_login'); ?>
								<h3>REGISTRATE CON TU CORREO</h3>
								<div class="campo">
									<label for="email-hacedor" class="[ columna xmall-12 ]">Correo electrónico</label>
									<input name="email" type="email" id="email-hacedor">
								</div>
								<?php if( $error >= 1 ){ ?>
									<div><?php echo "El mail ya ha sido registrado"; ?></div>
								<?php } ?>
								<div class="campo">
									<label for="password" class="[ columna xmall-12 ]">Contraseña</label>
									<input name="password" type="password" id="password">
								</div>
								<div class="campo">
									<label for="confirmar-password" class="[ columna xmall-12 ]">Confirmar contraseña</label>
									<input name="password_confirmation" type="password" id="confirmar-password">
								</div>
								<button type="submit">Registrarme</button>
							</div>
						</form>
					</div>
				</div><!-- width -->
			</div><!-- main -->
		</div><!-- container -->
<?php get_footer(); ?>