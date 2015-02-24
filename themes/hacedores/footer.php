				</div><!-- width -->
			</div><!-- main -->
		</div><!-- container -->
		<div class="[ modal ]">
			<div class="[ login-container ] [ form-user ]">
				<h4 class="[ right ] [ js-cerrar-modal ] [ cerrar-modal ]">Cerrar X</h4>
				<div class="clear"></div>
				<div class="[ modal-contenido ]">
					<div>
						<h3>Inicia sesión con:</h3>
						<?php do_action('oa_social_login'); ?>
						<!-- <button class="[ sesion-facebook ]"><i class="[ fa fa-facebook ]"></i> Facebook</button>
						<button class="[ sesion-twitter ]"><i class="[ fa fa-twitter ]"></i>Twitter</button>
						<button class="[ sesion-gplus ]"><i class="[ fa fa-google-plus ]"></i>Google+</button> -->
					</div>
					<div>
						<h3>Inicia sesión con tu correo</h3>
						<form name="registro" method="post" action="<?php echo site_url('login'); ?>">
							<div class="campo">
								<label for="usuario-correo" class="[ columna xmall-12 ]">Correo electrónico</label>
								<input name="email" type="email" id="email-hacedor">
							</div>
							<div class="campo">
								<label for="usuario-password" class="[ columna xmall-12 ]">Contraseña</label>
								<input name="password" type="password" id="password">
								<p>¿Olvidaste tu contraseña? <a href="<?php echo site_url().'/wp-login.php?action=lostpassword'; ?>">click aquí</a></p>
							</div>
							<input type="submit" name="submit" value="Entrar" class="[ boton-entrar ]">
							<p>¿No estás registrado aún? <a href="<?php echo site_url('registro'); ?>">Click aquí</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer class="[ clearfix ]">
			<div class="width clearfix">
				<div class="columna xmall-12 medium-3">
					<a href="http://labplc.mx/" target="_blank">
						<img src="<?php echo THEMEPATH; ?>images/logo-laboratorio-ciudad.png" alt="">
					</a>
				</div>
				<div class="columna xmall-12 medium-6">
					<p class="[ text-center ]">El laboratorio para la Ciudad es la nueva área experimental del Gobierno del Distrito Federal</p>
				</div>
				<div class="columna xmall-12 medium-3">
					<a href="http://labplc.mx/" target="_blank">
						<img src="<?php echo THEMEPATH; ?>images/cdmx.png" alt="">
					</a>
				</div>
				<div class="[ clear ][ margin-bottom ]">&nbsp;</div>
				<div class="[ text-center ]">
					<p><a href="#">Aviso de Privacidad</a></p>
					<p><a href="#" target="_blank">Términos y Condiciones</a></p>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
	<script>
		(function($){
			$('.first-container').simplePagination();
		})(jQuery);
	</script>
</html>
