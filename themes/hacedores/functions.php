<?php

wp_admin_css_color( 'classic', _x( 'Default', 'admin color scheme' ),
		false,
		array( '#222', '#333', '#0074a2', '#2ea2cc' ),
		array( 'base' => '#999', 'focus' => '#2ea2cc', 'current' => '#fff' )
	);

// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////
	define('EMAIL_INVALIDO', -2);
	define('PASSWORD_INVALIDO', -3);
	define('PASSWORD_DIFERENTE', -4);
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );


// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'theme_path', THEMEPATH);
		wp_localize_script( 'functions', 'site_url', site_url('/'));

		function queryProyecto(){
			$args = array(
				'post_type' 		=> 'proyecto',
				'posts_per_page' 	=> -1
			);
			$queryProyecto = new WP_Query( $args );
			$queryProyecto = get_object_vars($queryProyecto);
			return $queryProyecto;
		}
		$queryProyecto = queryProyecto();
		//wp_localize_script('functions', 'queryProyecto', $queryProyecto );

		function infoMapa($postTypes){
			$infoMapa = array();
			foreach( $postTypes as $postType ){
				$customPostTaxonomies = get_object_taxonomies($postType);
				if(count($customPostTaxonomies) > 0){
					foreach($customPostTaxonomies as $tax){
						$args = array(
							'orderby' 		=> 'name',
							'show_count' 	=> 0,
							'pad_counts' 	=> 0,
							'hierarchical' 	=> 1,
							'taxonomy' 		=> $tax,
							'exclude' 		=> 1,
							'hide_empty'	=> 1
						);
						$customPostCategories = get_categories( $args );
						foreach ($customPostCategories as $customPostCategory) {
							$customPostCategoryName = $customPostCategory->name;
							$customPostCategorySlug = $customPostCategory->slug;
							$args = array(
								'post_type' 		=> $postType,
								'posts_per_page' 	=> -1,
								$tax				=> $customPostCategorySlug
							);
							$queryPosts = new WP_Query( $args );
							$infoMapa[$postType][] = $customPostCategoryName;
							if ( $queryPosts->have_posts() ) : while ( $queryPosts->have_posts() ) : $queryPosts->the_post();
								$lat = get_post_meta( get_the_ID(), '_lat_'.$postType.'_meta', true  );
								$lon = get_post_meta( get_the_ID(), '_lon_'.$postType.'_meta', true  );
								$infoMapa[$postType][$customPostCategoryName][] = get_the_title();
								$infoMapa[$postType][$customPostCategoryName][] = $lat;
								$infoMapa[$postType][$customPostCategoryName][] = $lon;
								$infoMapa[$postType][$customPostCategoryName][] = $customPostCategorySlug;
								$infoMapa[$postType][$customPostCategoryName][] = $postType.'s';
								$infoMapa[$postType][$customPostCategoryName][] = basename( get_permalink() );

							endwhile; endif; wp_reset_query(); ?>
						<?php }
					}
				}
			}
			return $infoMapa;
		}
		$postTypes = array('proyecto', 'evento', 'recurso');
		$infoMapaTodos = infoMapa($postTypes);
		wp_localize_script('functions', 'infoMapaTodos', $infoMapaTodos );

		$postTypeProyecto = array('proyecto');
		$infoMapaProyectos = infoMapa($postTypeProyecto);
		wp_localize_script('functions', 'infoMapaProyectos', $infoMapaProyectos );

		$postTypeRecurso = array('recurso');
		$infoMapaRecursos = infoMapa($postTypeRecurso);
		wp_localize_script('functions', 'infoMapaRecursos', $infoMapaRecursos );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );
	});

// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	/*add_action( 'after_setup_theme', function () {

		$frontPage = get_page_by_path('home', OBJECT);
		$blogPage  = get_page_by_path('blog', OBJECT);

		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});*/



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://pcuervo.com">Pequeño Cuervo</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){

		// add_image_size( 'size_name', 200, 200, true );

		// cambiar el tamaño Thumbnail
		update_option( 'thumbnail_size_h', 150 );
		update_option( 'thumbnail_size_w', 150 );
		update_option( 'thumbnail_crop', true );

		// cambiar el tamaño Medium
		update_option( 'medium_size_h', 132 );
		update_option( 'medium_size_w', 235 );
		update_option( 'medium_crop', true );

	}



// POST TYPES, METABOXES, TAXONOMIES, CATEGORIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');
	require_once('inc/metaboxes.php');
	require_once('inc/taxonomies.php');
	require_once('inc/categories.php');
	require_once('inc/pages.php');
	require_once('inc/users.php');



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){
		if ( $query->is_main_query() and ! is_admin() ) {
		}
		return $query;
	});



// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	/*add_filter('excerpt_length', function($length){
		return 20;
	});*/


	/*add_filter('excerpt_more', function(){
		return ' &raquo;';
	});*/



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});



// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			echo implode(', ', $names);
		}
	}



	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}



	/**
	 * Imprime active si el string coincide con la pagina que se esta mostrando
	 * @param  string $string
	 * @return string
	 */
	function nav_is($string = ''){
		$query = get_queried_object();

		if( isset($query->slug) AND preg_match("/$string/i", $query->slug)
			OR isset($query->name) AND preg_match("/$string/i", $query->name)
			OR isset($query->rewrite) AND preg_match("/$string/i", $query->rewrite['slug'])
			OR isset($query->post_title) AND preg_match("/$string/i", remove_accents(str_replace(' ', '-', $query->post_title) ) ) )
			echo 'active';
	}

	/**
	 * Logera un usuario
	 * @param  string  $password
	 * @param string  $email
	 * @return integer
	 */
	function site_login_post($username, $password){

		$logged_in = login_user($username, $password);

		if($logged_in == '1'){
			return 1;
		}elseif ($logged_in == '-1') {
			return -1;
		} else
			return 0;
	}// site_login

	/**
	 * Loggear al usuario a la plataforma.
	 * @param string $username, string $password
	 * @return boolean
	 */
	function login_user($username, $password){
		$creds = array();
		$creds['user_login'] = $username;
		$creds['user_password'] = $password;
		$creds['remember'] = true;

		$user = wp_signon( $creds, false );

		if ( is_wp_error($user) ){
			return $user->get_error_message();
		}
		return 1;
	}// login_user

	/**
	 * Registra un usuario nuevo
	 * @param  string  $password
	 * @param string  $email
	 * @return array
	 */
	function register_user_new($data){
		$is_valid = validate_user_data();
		switch ($is_valid) {
			case EMAIL_INVALIDO:
				return array("msj" => "Email inválido", "error" => true);
				break;
			case PASSWORD_INVALIDO:
				return array("msj" => "Password inválido", "error" => true);
				break;
			case PASSWORD_DIFERENTE:
				return array("msj" => "Passwords diferentes", "error" => true);
				break;
			default:
				// Create wp_user
				$username =  $data['email'];
				$password =  $data['password'];
				$email =  $data['email'];

				$userdata = array(
					'user_login'  	=> $username,
					'user_pass'   	=> $password,
					'user_email'	=> $email,
					'role'			=> 'editor',
				);

				$user_id = wp_insert_user( $userdata ) ;


				if(is_wp_error($user_id)){
					return array("msj" => $user_id->get_error_codes(), "error" => true);
					die();
				}

				//TODO
				//$mail_status = welcome_email($email);
				site_login_post($username, $password);
				$msg = array(
					"msj" => "Usuario registrado",
					"error"	  => false
				);

				return $msg;

		}// switch
	} // register_user

	/**
	 * Valida que los datos del usuario ha registrar sean correctos.
	 * @return 1 si no hay errores, -1 username vacío, -2 email vacío, -3 password inválido, -4 passwords no son iguales
	 */
	function validate_user_data(){
		if($_POST['email'] == '')
			return EMAIL_INVALIDO;

		if($_POST['password'] == '' || $_POST['password_confirmation'] == '' )
			return PASSWORD_INVALIDO;

		if($_POST['password'] != $_POST['password_confirmation'])
			return PASSWORD_DIFERENTE;

		return 1;
	}// validate_user_data

/**
 * Obtener el rol del usuario.
 * @return $role
 */
function get_current_user_role(){
	if ( is_user_logged_in() ) {
		global $wpdb;

		$user = get_userdata( get_current_user_id() );
		$capabilities = $user->{$wpdb->prefix . 'capabilities'};

		if ( !isset( $wp_roles ) )
				$wp_roles = new WP_Roles();

		foreach ( $wp_roles->role_names as $role => $name ) :
				if ( array_key_exists( $role, $capabilities ) )
						return $role;
		endforeach;
	}
}// get_current_user_role

function posts_for_current_author($query) {
	$role = get_current_user_role();
	if($role != 'administrator'){
		if($query->is_admin) {
			global $user_ID;
			$query->set('author',  $user_ID);
		}
	}
	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

function remove_menus(){
	$role = get_current_user_role();
	remove_menu_page( 'edit.php' ); //Posts
	if($role != 'administrator'){
		remove_menu_page( 'edit.php?post_type=page' );    //Pages
		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'upload.php' );                 //Media
		remove_menu_page( 'edit.php?post_type=informacion' );//Informacion
		remove_menu_page( 'index.php' );                  //Dashboard
	}

}
add_action( 'admin_menu', 'remove_menus' );

//Set a custom role for a new user
function oa_social_login_set_new_user_role ($user_role)
{
  //This is an example for a custom setting with one role
  $user_role = 'editor';

  //The new user will be created with this role
  return $user_role;
}

//This filter is applied to the roles of new users
add_filter('oa_social_login_filter_new_user_role', 'oa_social_login_set_new_user_role');

//Use a custom CSS file with Social Login
function oa_social_login_set_custom_css($css_theme_uri)
{
  //Replace the URL by an URL to your own CSS file
  $css_theme_uri = THEMEPATH.'style-login.css';

  //Done
  return $css_theme_uri;
}



add_filter('oa_social_login_default_css', 'oa_social_login_set_custom_css');
add_filter('oa_social_login_widget_css', 'oa_social_login_set_custom_css');
add_filter('oa_social_login_link_css', 'oa_social_login_set_custom_css');

	 /* Devuelve la url del video de acuerdo al host.
	 * @param string $advisor_data
	 * @return int $advisor_id or FALSE
	 */
	function get_video_src($url, $host){
		if($url == '-')
			return 0;
		if($host == 'vimeo'){
			$id = (int) substr(parse_url($url, PHP_URL_PATH), 1);
			return '//player.vimeo.com/video/'.$id;
		}

		$id = explode('v=', $url)[1];
		$ampersand_position = strpos($id, '&');
		if( $ampersand_position > 0 )
			$id = substr($id, $ampersand_position);

		parse_str( parse_url( $url, PHP_URL_QUERY ), $url_array );
		$id = $url_array['v'];
		return '//www.youtube.com/embed/'.$id;
	}// get_video_src

	function get_avatar_url($get_avatar){
		preg_match("/src='(.*?)'/i", $get_avatar, $matches);
		return $matchCes[1];
	}

	// FRONT END SCRIPTS FOOTER //////////////////////////////////////////////////////
	function footerScripts() {
		if( wp_script_is( 'functions', 'done' ) ) {
			if ( is_home() || is_post_type_archive( 'informacion' ) ) { ?>
				<script type="text/javascript">
					var mapa = creaMapa();
					var markers = creaMarkers(mapa, infoMapaTodos);
					// Muestra todos los marcadores centrados en el mapa
					autoCenter(mapa, markers);
					// Agrega los filtros para cada categoría y subcategoría
					agregaFiltrosMarkers(mapa, markers, infoMapaTodos);
				</script>
			<?php } else if ( is_post_type_archive( 'proyecto' ) )  { ?>
				<script type="text/javascript">
					if(infoMapaProyectos.length > 0) {
						var mapa = creaMapa();
						var markers = creaMarkers(mapa, infoMapaProyectos);
						// Muestra todos los marcadores centrados en el mapa
						autoCenter(mapa, markers);
						// Agrega los filtros para cada categoría y subcategoría
						agregaFiltrosMarkers(mapa, markers, infoMapaProyectos);
					}
				</script>
			<?php } else if ( is_post_type_archive( 'recurso' ) )  { ?>
				<script type="text/javascript">
					if(infoMapaProyectos.length > 0) {
						var mapa = creaMapa();
						var markers = creaMarkers(mapa, infoMapaRecursos);
						// Muestra todos los marcadores centrados en el mapa
						autoCenter(mapa, markers);
						// Agrega los filtros para cada categoría y subcategoría
						agregaFiltrosMarkers(mapa, markers, infoMapaRecursos);
					}
				</script>
			<?php }
		} // home
	}// footerScripts
add_action( 'wp_footer', 'footerScripts', 21 );

//CAMPOS EXTRA PERFIL
 function fb_add_custom_user_profile_fields( $user ) {
?>
	<?php wp_enqueue_media(); ?>
	<h3><?php _e('Informacion extra de tu perfil', 'your_phone'); ?></h3>

	<table class="form-table">
		<tr>
			<th>
				<label for="user_categories"><?php _e('Categoria', 'your_category'); ?>
			</label></th>
			<td>
				<?php
				$data =   get_user_meta( $user->ID, 'user_categories', false );
				$args = array( 'hide_empty' =>0, 'taxonomy'=> 'category');
				$categories=  get_categories($args);
				if ($categories){
					foreach ( $categories as $category ){
						$selected = '';
							if(count($data) > 0){
								if(in_array($category->term_id,(array)$data[0])) {
										$selected = 'checked="checked""';
								}
							}
						echo '<input name="user_categories[]" value="'.$category->term_id.'" '.$selected.' type="checkbox"/>'.$category->name.'<br/>';
					}
				}
				?>
				<span class="description"><?php _e('Ingresa tu categoria.', 'your_category'); ?></span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th>
				<label for="celular"><?php _e('Telefono', 'your_phone'); ?>
			</label></th>
			<td>
				<input type="text" name="celular" id="celular" value="<?php echo esc_attr( get_the_author_meta( 'celular', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Ingresa tu celular.', 'your_phone'); ?></span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th>
				<label for="direccion"><?php _e('Direccion', 'your_adress'); ?></label>
			</th>
			<td>
				<input type="text" name="direccion" id="direccion" value="<?php echo esc_attr( get_the_author_meta( 'direccion', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Ingresa tu direccion.', 'your_adress'); ?></span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th>
				<label for="latitud"><?php _e('Latitud', 'latitud'); ?></label>
			</th>
			<td>
				<input type="text" name="latitud" id="latitud" value="<?php echo esc_attr( get_the_author_meta( 'latitud', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Ingresa a <a href="https://www.google.com.mx/" targer="_blank">Google Maps</a> y haz click derecho en tu ubicación, selecciona la opción "¿Qué hay aquí?" y debajo de la barra de búsqueda aparecerá un número como este "19.405951, -99.164163", el primero es la longitud y el segundo la latitud</span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th>
				<label for="longitud"><?php _e('Longitud', 'longitud'); ?></label>
			</th>
			<td>
				<input type="text" name="longitud" id="longitud" value="<?php echo esc_attr( get_the_author_meta( 'longitud', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Ingresa tu longitud.', 'your_longitud'); ?></span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th>
				<label for="liga_instructable"><?php _e('Liga Instructable', 'your_liga'); ?></label>
			</th>
			<td>
				<input type="text" name="liga_instructable" id="liga_instructable" value="<?php echo esc_attr( get_the_author_meta( 'liga_instructable', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Ingresa tu liga,', 'your_liga'); ?></span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th>
				<label for="liga_video"><?php _e('Liga Video', 'your_video'); ?></label>
			</th>
			<td>
				<input type="text" name="liga_video" id="liga_video" value="<?php echo esc_attr( get_the_author_meta( 'liga_video', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('**El video debe ser redireccionado por medio de una liga de Youtube o Vimeo', 'your_video'); ?></span>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr>
			<th><label for="user_meta_image"><?php _e( 'Imagen pricnipal', 'textdomain' ); ?></label></th>
			<td>
				<!-- Outputs the image after save -->
				<img src="<?php echo esc_url( get_the_author_meta( 'user_profile_img', $user->ID ) ); ?>" style="width:150px;"><br />
				<!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
				<input type="hidden" name="user_profile_img" id="user_profile_img" value="<?php echo esc_url_raw( get_the_author_meta( 'user_profile_img', $user->ID ) ); ?>" class="regular-text" />
				<!-- Outputs the save button -->
				<input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'textdomain' ); ?>" id="uploadimage"/><br />
				<span class="description"><?php _e( 'Agrega una imagen para tu perfil.', 'textdomain' ); ?></span>
			</td>
		</tr>
	</table><!-- end form-table -->
	<table class="form-table">
		<tr>
			<th><label for="user_meta_image"><?php _e( 'Imagen 1', 'textdomain' ); ?></label></th>
			<td>
				<!-- Outputs the image after save -->
				<img src="<?php echo esc_url( get_the_author_meta( 'user_uno_img', $user->ID ) ); ?>" style="width:150px;"><br />
				<!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
				<input type="hidden" name="user_uno_img" value="<?php echo esc_url_raw( get_the_author_meta( 'user_uno_img', $user->ID ) ); ?>" class="regular-text" />
				<!-- Outputs the save button -->
				<input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'textdomain' ); ?>" id="uploadimage"/><br />
				<span class="description"><?php _e( 'Agrega una imagen para tu perfil.', 'textdomain' ); ?></span>
			</td>
		</tr>
	</table><!-- end form-table -->
	<table class="form-table">
		<tr>
			<th><label for="user_meta_image"><?php _e( 'Imagen 2', 'textdomain' ); ?></label></th>
			<td>
				<!-- Outputs the image after save -->
				<img src="<?php echo esc_url( get_the_author_meta( 'user_dos_img', $user->ID ) ); ?>" style="width:150px;"><br />
				<!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
				<input type="hidden" name="user_dos_img" value="<?php echo esc_url_raw( get_the_author_meta( 'user_dos_img', $user->ID ) ); ?>" class="regular-text" />
				<!-- Outputs the save button -->
				<input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'textdomain' ); ?>" id="uploadimage"/><br />
				<span class="description"><?php _e( 'Agrega una imagen para tu perfil.', 'textdomain' ); ?></span>
			</td>
		</tr>
	</table><!-- end form-table -->
	<table class="form-table">
		<tr>
			<th><label for="user_meta_image"><?php _e( 'Imagen 3', 'textdomain' ); ?></label></th>
			<td>
				<!-- Outputs the image after save -->
				<img src="<?php echo esc_url( get_the_author_meta( 'user_tres_img', $user->ID ) ); ?>" style="width:150px;"><br />
				<!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
				<input type="hidden" name="user_tres_img" value="<?php echo esc_url_raw( get_the_author_meta( 'user_tres_img', $user->ID ) ); ?>" class="regular-text" />
				<!-- Outputs the save button -->
				<input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'textdomain' ); ?>" id="uploadimage"/><br />
				<span class="description"><?php _e( 'Agrega una imagen para tu perfil.', 'textdomain' ); ?></span>
			</td>
		</tr>
	</table><!-- end form-table -->
	<table class="form-table">
		<tr>
			<th><label for="user_meta_image"><?php _e( 'Imagen 4', 'textdomain' ); ?></label></th>
			<td>
				<!-- Outputs the image after save -->
				<img src="<?php echo esc_url( get_the_author_meta( 'user_cuatro_img', $user->ID ) ); ?>" style="width:150px;"><br />
				<!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
				<input type="hidden" name="user_cuatro_img" value="<?php echo esc_url_raw( get_the_author_meta( 'user_cuatro_img', $user->ID ) ); ?>" class="regular-text" />
				<!-- Outputs the save button -->
				<input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'textdomain' ); ?>" id="uploadimage"/><br />
				<span class="description"><?php _e( 'Agrega una imagen para tu perfil.', 'textdomain' ); ?></span>
			</td>
		</tr>
	</table><!-- end form-table -->
<?php
}

function fb_save_custom_user_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return FALSE;

	if( isset($_POST['user_categories']) ){
		update_user_meta( $user_id, 'user_categories', $_POST['user_categories']);
	}
	update_user_meta( $user_id, 'celular', $_POST['celular'] );
	update_user_meta( $user_id, 'direccion', $_POST['direccion']);
	update_user_meta( $user_id, 'latitud', $_POST['latitud']);
	update_user_meta( $user_id, 'longitud', $_POST['longitud']);
	update_user_meta( $user_id, 'liga_instructable', $_POST['liga_instructable']);
	update_user_meta( $user_id, 'liga_video', $_POST['liga_video']);
	update_user_meta( $user_id, 'user_profile_img', $_POST['user_profile_img'] );

	update_user_meta( $user_id, 'user_uno_img', $_POST['user_uno_img'] );
	update_user_meta( $user_id, 'user_dos_img', $_POST['user_dos_img'] );
	update_user_meta( $user_id, 'user_tres_img', $_POST['user_tres_img'] );
	update_user_meta( $user_id, 'user_cuatro_img', $_POST['user_cuatro_img'] );
}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );

/**
 * Return an ID of an attachment by searching the database with the file URL.
 *
 * First checks to see if the $url is pointing to a file that exists in
 * the wp-content directory. If so, then we search the database for a
 * partial match consisting of the remaining path AFTER the wp-content
 * directory. Finally, if a match is found the attachment ID will be
 * returned.
 *
 * http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress/
 *
 * @return {int} $attachment
 */
function get_attachment_image_by_url( $url ) {

	// Split the $url into two parts with the wp-content directory as the separator.
	$parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

	// Get the host of the current site and the host of the $url, ignoring www.
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

	// Return nothing if there aren't any $url parts or if the current host and $url host do not match.
	if ( !isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) ) {
		return;
	}

	// Now we're going to quickly search the DB for any attachment GUID with a partial path match.
	// Example: /uploads/2013/05/test-image.jpg
	global $wpdb;

	$prefix     = $wpdb->prefix;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts WHERE guid RLIKE %s;", $parse_url[1] ) );

	// Returns null if no attachment is found.
	return $attachment[0];
}

/*
 * Retrieve the appropriate image size
 */
function get_additional_user_meta_thumb() {

	$attachment_url = esc_url( get_the_author_meta( 'user_meta_image', $post->post_author ) );

	 // grabs the id from the URL using Frankie Jarretts function
	$attachment_id = get_attachment_image_by_url( $attachment_url );

	// retrieve the thumbnail size of our image
	$image_thumb = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );

	// return the image thumbnail
	return $image_thumb[0];

}

/*
 * Variables de URL
 */
add_action('init','add_my_error');
function add_my_error() {
    global $wp;
    $wp->add_query_var('my_error');
}


function get_attachment_id_from_url( $attachment_url = '' ) {

	global $wpdb;
	$attachment_id = false;

	// If there is no url, return.
	if ( '' == $attachment_url )
		return;

	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();

	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

	}

	return $attachment_id;
}
