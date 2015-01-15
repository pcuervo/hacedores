<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'detalles', 'Detalles', 'metabox_detalles', 'informacion', 'side', 'high' );
		add_meta_box( 'informacion_recurso', 'Información recurso', 'metabox_informacion_recurso', 'recurso', 'side', 'high' );
		add_meta_box( 'informacion_proyecto', 'Información proyecto', 'metabox_informacion_proyecto', 'proyecto', 'side', 'high' );
		add_meta_box( 'informacion_evento', 'Información evento', 'metabox_informacion_evento', 'evento', 'side', 'high' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////


	function metabox_detalles($post){
		$lugar 		= get_post_meta($post->ID, '_lugar_meta', true);
		$direccion 	= get_post_meta($post->ID, '_direccion1_meta', true);
		$fechas 	= get_post_meta($post->ID, '_fechas_meta', true);

		wp_nonce_field(__FILE__, '_lugar_meta_nonce');
		wp_nonce_field(__FILE__, '_direccion1_meta_nonce');
		wp_nonce_field(__FILE__, '_fechas_meta_nonce');

echo <<<END

	<label>Lugar:</label>
	<input type="text" class="widefat" id="lugar" name="_lugar_meta" value="$lugar" />
	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion1_meta" value="$direccion" />
	<label>Fecha:</label>
	<input type="text" class="widefat" id="fechas" name="_fechas_meta" value="$fechas" />

END;

	}

	function metabox_informacion_recurso($post){
		$direccion 		= get_post_meta($post->ID, '_direccion2_meta', true);
		$telefono 		= get_post_meta($post->ID, '_telefono_meta', true);
		$email 			= get_post_meta($post->ID, '_email_meta', true);
		$web 			= get_post_meta($post->ID, '_web_meta', true);
		$instructables 	= get_post_meta($post->ID, '_instructables_meta', true);
		$video 			= get_post_meta($post->ID, '_video_meta', true);

		wp_nonce_field(__FILE__, '_direccion2_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono_meta_nonce');
		wp_nonce_field(__FILE__, '_email_meta_nonce');
		wp_nonce_field(__FILE__, '_web_meta_nonce');
		wp_nonce_field(__FILE__, '_instructables_meta_nonce');
		wp_nonce_field(__FILE__, '_video_meta_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion2_meta" value="$direccion" />
	<label>Teléfono:</label>
	<input type="text" class="widefat" id="telefono" name="_telefono_meta" value="$telefono" />
	<label>E-mail:</label>
	<input type="text" class="widefat" id="email" name="_email_meta" value="$email" />
	<label>Sitio Web:</label>
	<input type="text" class="widefat" id="web" name="_web_meta" value="$web" />
	<label>URL instructables:</label>
	<input type="text" class="widefat" id="instructables" name="_instructables_meta" value="$instructables" />
	<label>URL video:</label>
	<input type="text" class="widefat" id="video" name="_video_meta" value="$video" />

END;

	}

	function metabox_informacion_proyecto($post){
		$direccion 		= get_post_meta($post->ID, '_direccion3_meta', true);
		$telefono 		= get_post_meta($post->ID, '_telefono2_meta', true);
		$email 			= get_post_meta($post->ID, '_email2_meta', true);
		$web 			= get_post_meta($post->ID, '_web2_meta', true);
		$instructables 	= get_post_meta($post->ID, '_instructables2_meta', true);
		$video 			= get_post_meta($post->ID, '_video2_meta', true);

		wp_nonce_field(__FILE__, '_direccion3_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono2_meta_nonce');
		wp_nonce_field(__FILE__, '_email2_meta_nonce');
		wp_nonce_field(__FILE__, '_web2_meta_nonce');
		wp_nonce_field(__FILE__, '_instructables2_meta_nonce');
		wp_nonce_field(__FILE__, '_video2_meta_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion3_meta" value="$direccion" />
	<label>Teléfono:</label>
	<input type="text" class="widefat" id="telefono" name="_telefono2_meta" value="$telefono" />
	<label>E-mail:</label>
	<input type="text" class="widefat" id="email" name="_email2_meta" value="$email" />
	<label>Sitio Web:</label>
	<input type="text" class="widefat" id="web" name="_web2_meta" value="$web" />
	<label>URL instructables:</label>
	<input type="text" class="widefat" id="instructables" name="_instructables2_meta" value="$instructables" />
	<label>URL video:</label>
	<input type="text" class="widefat" id="video" name="_video2_meta" value="$video" />

END;

	}

function metabox_informacion_evento($post){
	$direccion 		= get_post_meta($post->ID, '_direccion4_meta', true);
	$dia 			= get_post_meta($post->ID, '_dia_meta', true);
	$hora 			= get_post_meta($post->ID, '_hora_meta', true);
	$telefono 		= get_post_meta($post->ID, '_telefono3_meta', true);
	$contacto 		= get_post_meta($post->ID, '_contacto_meta', true);
	$web 			= get_post_meta($post->ID, '_web3_meta', true);
	$facebook 		= get_post_meta($post->ID, '_facebook_meta', true);
	$twitter 		= get_post_meta($post->ID, '_twitter_meta', true);

	wp_nonce_field(__FILE__, '_direccion4_meta_nonce');
	wp_nonce_field(__FILE__, '_dia_meta_nonce');
	wp_nonce_field(__FILE__, '_hora_meta_nonce');
	wp_nonce_field(__FILE__, '_telefono3_meta_nonce');
	wp_nonce_field(__FILE__, '_contacto_meta_nonce');
	wp_nonce_field(__FILE__, '_web3_meta_nonce');
	wp_nonce_field(__FILE__, '_facebook_meta_nonce');
	wp_nonce_field(__FILE__, '_twitter_meta_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion4_meta" value="$direccion" />
	<label>Día:</label>
	<input type="text" class="widefat" id="dia" name="_dia_meta" value="$dia" />
	<label>Hora:</label>
	<input type="text" class="widefat" id="hora" name="_hora_meta" value="$hora" />
	<label>Teléfono:</label>
	<input type="text" class="widefat" id="telefono" name="_telefono3_meta" value="$telefono" />
	<label>Contacto:</label>
	<input type="text" class="widefat" id="contacto" name="_contacto_meta" value="$contacto" />
	<label>Sitio web:</label>
	<input type="text" class="widefat" id="web" name="_web3_meta" value="$web" />
	<label>Facebook:</label>
	<input type="text" class="widefat" id="facebook" name="_facebook_meta" value="$facebook" />
	<label>Twitter:</label>
	<input type="text" class="widefat" id="twitter" name="_twitter_meta" value="$twitter" />

END;

	}



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id))
			return $post_id;


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE )
			return $post_id;


		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) )
			return $post_id;

		/*------------------------------------*\
		    #INFORMACIÓN
		\*------------------------------------*/
		if ( isset($_POST['_lugar_meta']) and check_admin_referer(__FILE__, '_lugar_meta_nonce') ){
			update_post_meta($post_id, '_lugar_meta', $_POST['_lugar_meta']);
		}
		if ( isset($_POST['_direccion1_meta']) and check_admin_referer(__FILE__, '_direccion1_meta_nonce') ){
			update_post_meta($post_id, '_direccion1_meta', $_POST['_direccion1_meta']);
		}
		if ( isset($_POST['_fechas_meta']) and check_admin_referer(__FILE__, '_fechas_meta_nonce') ){
			update_post_meta($post_id, '_fechas_meta', $_POST['_fechas_meta']);
		}

		/*------------------------------------*\
		    #RECURSO
		\*------------------------------------*/
		if ( isset($_POST['_direccion2_meta']) and check_admin_referer(__FILE__, '_direccion2_meta_nonce') ){
			update_post_meta($post_id, '_direccion2_meta', $_POST['_direccion2_meta']);
		}
		if ( isset($_POST['_telefono_meta']) and check_admin_referer(__FILE__, '_telefono_meta_nonce') ){
			update_post_meta($post_id, '_telefono_meta', $_POST['_telefono_meta']);
		}
		if ( isset($_POST['_email_meta']) and check_admin_referer(__FILE__, '_email_meta_nonce') ){
			update_post_meta($post_id, '_email_meta', $_POST['_email_meta']);
		}
		if ( isset($_POST['_web_meta']) and check_admin_referer(__FILE__, '_web_meta_nonce') ){
			update_post_meta($post_id, '_web_meta', $_POST['_web_meta']);
		}
		if ( isset($_POST['_instructables_meta']) and check_admin_referer(__FILE__, '_instructables_meta_nonce') ){
			update_post_meta($post_id, '_instructables_meta', $_POST['_instructables_meta']);
		}
		if ( isset($_POST['_video_meta']) and check_admin_referer(__FILE__, '_video_meta_nonce') ){
			update_post_meta($post_id, '_video_meta', $_POST['_video_meta']);
		}

		/*------------------------------------*\
		    #PROYECTO
		\*------------------------------------*/
		if ( isset($_POST['_direccion3_meta']) and check_admin_referer(__FILE__, '_direccion3_meta_nonce') ){
			update_post_meta($post_id, '_direccion3_meta', $_POST['_direccion3_meta']);
		}
		if ( isset($_POST['_telefono2_meta']) and check_admin_referer(__FILE__, '_telefono2_meta_nonce') ){
			update_post_meta($post_id, '_telefono2_meta', $_POST['_telefono2_meta']);
		}
		if ( isset($_POST['_email2_meta']) and check_admin_referer(__FILE__, '_email2_meta_nonce') ){
			update_post_meta($post_id, '_email2_meta', $_POST['_email2_meta']);
		}
		if ( isset($_POST['_web2_meta']) and check_admin_referer(__FILE__, '_web2_meta_nonce') ){
			update_post_meta($post_id, '_web2_meta', $_POST['_web2_meta']);
		}
		if ( isset($_POST['_instructables2_meta']) and check_admin_referer(__FILE__, '_instructables2_meta_nonce') ){
			update_post_meta($post_id, '_instructables2_meta', $_POST['_instructables2_meta']);
		}
		if ( isset($_POST['_video2_meta']) and check_admin_referer(__FILE__, '_video2_meta_nonce') ){
			update_post_meta($post_id, '_video2_meta', $_POST['_video2_meta']);
		}

		/*------------------------------------*\
		    #EVENTOS
		\*------------------------------------*/
		if ( isset($_POST['_direccion4_meta']) and check_admin_referer(__FILE__, '_direccion4_meta_nonce') ){
			update_post_meta($post_id, '_direccion4_meta', $_POST['_direccion4_meta']);
		}
		if ( isset($_POST['_dia_meta']) and check_admin_referer(__FILE__, '_dia_meta_nonce') ){
			update_post_meta($post_id, '_dia_meta', $_POST['_dia_meta']);
		}
		if ( isset($_POST['_hora_meta']) and check_admin_referer(__FILE__, '_hora_meta_nonce') ){
			update_post_meta($post_id, '_hora_meta', $_POST['_hora_meta']);
		}
		if ( isset($_POST['_telefono3_meta']) and check_admin_referer(__FILE__, '_telefono3_meta_nonce') ){
			update_post_meta($post_id, '_telefono3_meta', $_POST['_telefono3_meta']);
		}
		if ( isset($_POST['_contacto_meta']) and check_admin_referer(__FILE__, '_contacto_meta_nonce') ){
			update_post_meta($post_id, '_contacto_meta', $_POST['_contacto_meta']);
		}
		if ( isset($_POST['_web3_meta']) and check_admin_referer(__FILE__, '_web3_meta_nonce') ){
			update_post_meta($post_id, '_web3_meta', $_POST['_web3_meta']);
		}
		if ( isset($_POST['_facebook_meta']) and check_admin_referer(__FILE__, '_facebook_meta_nonce') ){
			update_post_meta($post_id, '_facebook_meta', $_POST['_facebook_meta']);
		}
		if ( isset($_POST['_twitter_meta']) and check_admin_referer(__FILE__, '_twitter_meta_nonce') ){
			update_post_meta($post_id, '_twitter_meta', $_POST['_twitter_meta']);
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		}*/


	});