<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		//add_meta_box( 'detalles', 'Detalles', 'metabox_detalles', 'informacion', 'side', 'high' );
		add_meta_box( 'informacion_recurso', 'Información Recurso', 'metabox_informacion_recurso', 'recurso', 'side', 'high' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////


	function metabox_detalles($post){
		$lugar 		= get_post_meta($post->ID, '_lugar_meta', true);
		$direccion 	= get_post_meta($post->ID, '_direccion1_meta', true);
		$fechas 	= get_post_meta($post->ID, '_fechas_meta', true);

		wp_nonce_field(__FILE__, '_lugar_nonce');
		wp_nonce_field(__FILE__, '_direccion_nonce');
		wp_nonce_field(__FILE__, '_fechas_nonce');

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
		$direccion 		= get_post_meta($post->ID, '_direccion_meta', true);
		$telefono 		= get_post_meta($post->ID, '_telefono_meta', true);
		$email 			= get_post_meta($post->ID, '_email_meta', true);
		$web 			= get_post_meta($post->ID, '_web_meta', true);
		$instructables 	= get_post_meta($post->ID, '_instructables_meta', true);
		$video 			= get_post_meta($post->ID, '_video_meta', true);

		wp_nonce_field(__FILE__, '_direccion_nonce');
		wp_nonce_field(__FILE__, '_telefono_nonce');
		wp_nonce_field(__FILE__, '_email_nonce');
		wp_nonce_field(__FILE__, '_web_nonce');
		wp_nonce_field(__FILE__, '_instructables_nonce');
		wp_nonce_field(__FILE__, '_video_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion_meta" value="$direccion" />
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
		if ( isset($_POST['_direccion_meta']) and check_admin_referer(__FILE__, '_direccion_meta_nonce') ){
			update_post_meta($post_id, '_direccion_meta', $_POST['_direccion_meta']);
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


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		}*/


	});