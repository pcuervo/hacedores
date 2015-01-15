<?php


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
		update_option( 'medium_size_h', 235 );
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
<<<<<<< HEAD
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
	 * Registra un usuario nuevo
	 * @param  string  $password 
	 * @param string  $email
	 * @return array
	 */
	function register_user_new($data){
		$is_valid = validate_user_data();
		switch ($is_valid) {
			case EMAIL_INVALIDO:
				return array("error" => "Email inválido"); 
				break;
			case PASSWORD_INVALIDO:
				return array("error" => "Password inválido"); 
				break;
			case PASSWORD_DIFERENTE:
				return array("error" => "Passwords diferentes"); 
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
					return array("wp-error" => $user_id->get_error_codes());
					die();
				}
			
				//TODO
				//$mail_status = welcome_email($email);

				$msg = array(
					"success" => "Usuario registrado",
					"error"	  => 0
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

function posts_for_current_author($query) {

	if($query->is_admin) {
		global $user_ID;
		$query->set('author',  $user_ID);
	}
	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

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
  $css_theme_uri = 'http://public.oneallcdn.com/css/api/socialize/themes/buildin/connect/large-v1.css';
   
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


	// FRONT END SCRIPTS FOOTER //////////////////////////////////////////////////////
	function footerScripts() {
		if( wp_script_is( 'functions', 'done' ) ) {
			if ( is_home() ) { ?>
				<script type="text/javascript">
					(function( $ ) {
						"use strict";
						$(function(){
							//On load
							var set_coordenadas = {};
							set_coordenadas['hacedores'] = [];
							set_coordenadas['hacedores'].push({
								lat: 12345,
								lon: 12344
							})
							set_coordenadas['hacedores'].push({
								lat: 12349,
								lon: 12341
							})
							creaMapa(set_coordenadas);
		                });
		            }(jQuery));
		        </script>
    		<?php }  
    	}
    }
    add_action( 'wp_footer', 'footerScripts', 21 );
