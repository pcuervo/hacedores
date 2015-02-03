<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'detalles', 'Detalles', 'metabox_detalles', 'informacion', 'advanced', 'high' );
		add_meta_box( 'informacion_recurso', 'Información recurso', 'metabox_informacion_recurso', 'recurso', 'advanced', 'high' );
		add_meta_box( 'informacion_proyecto', 'Información proyecto', 'metabox_informacion_proyecto', 'proyecto', 'advanced', 'high' );
		add_meta_box( 'informacion_evento', 'Información evento', 'metabox_informacion_evento', 'evento', 'advanced', 'high' );

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
		$direccion 		= get_post_meta($post->ID, '_direccion_recurso_meta', true);
		$telefono 		= get_post_meta($post->ID, '_telefono_recurso_meta', true);
		$email 			= get_post_meta($post->ID, '_email_recurso_meta', true);
		$web 			= get_post_meta($post->ID, '_web_recurso_meta', true);
		$instructables 	= get_post_meta($post->ID, '_instructables_recurso_meta', true);
		$video 			= get_post_meta($post->ID, '_video_recurso_meta', true);
		$lat 	 		= get_post_meta($post->ID, '_lat_recurso_meta', true);
		$lon 			= get_post_meta($post->ID, '_lon_recurso_meta', true);

		wp_nonce_field(__FILE__, '_direccion_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_email_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_web_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_instructables_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_video_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_lat_recurso_meta_nonce');
		wp_nonce_field(__FILE__, '_lon_recurso_meta_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion_recurso_meta" value="$direccion" />
	<label>Teléfono:</label>
	<input type="text" class="widefat" id="telefono" name="_telefono_recurso_meta" value="$telefono" />
	<label>E-mail:</label>
	<input type="text" class="widefat" id="email" name="_email_recurso_meta" value="$email" />
	<label>Sitio Web:</label>
	<input type="text" class="widefat" id="web" name="_web_recurso_meta" value="$web" />
	<label>URL instructables:</label>
	<input type="text" class="widefat" id="instructables" name="_instructables_recurso_meta" value="$instructables" />
	<label>URL video:</label>
	<input type="text" class="widefat" id="video" name="_video_recurso_meta" value="$video" />
	<label>Ingresa la dirección:</label>
	<input type="text" class="widefat" id="geo-autocomplete" placeholder="Ingresa la ubicación del recurso">
	<label>Latitud:</label>
	<input type="text" class="widefat" id="lat_recurso" name="_lat_recurso_meta" value="$lat" data-geo="lat" /><br/>
	<label>Longitud:</label>
	<input type="text" class="widefat" id="lon_recurso" name="_lon_recurso_meta" value="$lon" data-geo="lng" />
	<br/>

END;

	}

	function metabox_informacion_proyecto($post){
		$direccion 		= get_post_meta($post->ID, '_direccion_proyecto_meta', true);
		$telefono 		= get_post_meta($post->ID, '_telefono_proyecto_meta', true);
		$email 			= get_post_meta($post->ID, '_email_proyecto_meta', true);
		$web 			= get_post_meta($post->ID, '_web_proyecto_meta', true);
		$instructables 	= get_post_meta($post->ID, '_instructables_proyecto_meta', true);
		$video 			= get_post_meta($post->ID, '_video_proyecto_meta', true);
		$lat 	 		= get_post_meta($post->ID, '_lat_proyecto_meta', true);
		$lon 			= get_post_meta($post->ID, '_lon_proyecto_meta', true);

		wp_nonce_field(__FILE__, '_direccion_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_email_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_web_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_instructables_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_video_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_lat_proyecto_meta_nonce');
		wp_nonce_field(__FILE__, '_lon_proyecto_meta_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion_proyecto_meta" value="$direccion" />
	<label>Teléfono:</label>
	<input type="text" class="widefat" id="telefono" name="_telefono_proyecto_meta" value="$telefono" />
	<label>E-mail:</label>
	<input type="text" class="widefat" id="email" name="_email_proyecto_meta" value="$email" />
	<label>Sitio Web:</label>
	<input type="text" class="widefat" id="web" name="_web_proyecto_meta" value="$web" />
	<label>URL instructables:</label>
	<input type="text" class="widefat" id="instructables" name="_instructables_proyecto_meta" value="$instructables" />
	<label>URL video:</label>
	<input type="text" class="widefat" id="video" name="_video_proyecto_meta" value="$video" />
	<label>Ingresa la dirección:</label>
	<input type="text" class="widefat" id="geo-autocomplete" placeholder="Ingresa la ubicación del proyecto">
	<label>Latitud:</label>
	<input type="text" class="widefat" id="lat_proyecto" name="_lat_proyecto_meta" value="$lat" data-geo="lat" /><br/>
	<label>Longitud:</label>
	<input type="text" class="widefat" id="lon_proyecto" name="_lon_proyecto_meta" value="$lon" data-geo="lng" /><br/>

END;

	}

function metabox_informacion_evento($post){
	$direccion 		= get_post_meta($post->ID, '_direccion_evento_meta', true);
	$dia 			= get_post_meta($post->ID, '_dia_evento_meta', true);
	$hora 			= get_post_meta($post->ID, '_hora_evento_meta', true);
	$telefono 		= get_post_meta($post->ID, '_telefono_evento_meta', true);
	$contacto 		= get_post_meta($post->ID, '_contacto_evento_meta', true);
	$web 			= get_post_meta($post->ID, '_web_evento_meta', true);
	$facebook 		= get_post_meta($post->ID, '_facebook_evento_meta', true);
	$twitter 		= get_post_meta($post->ID, '_twitter_evento_meta', true);
	$lat 	 		= get_post_meta($post->ID, '_lat_evento_meta', true);
	$lon 			= get_post_meta($post->ID, '_lon_evento_meta', true);

	wp_nonce_field(__FILE__, '_direccion_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_dia_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_hora_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_telefono_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_contacto_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_web_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_facebook_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_twitter_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_lat_evento_meta_nonce');
	wp_nonce_field(__FILE__, '_lon_evento_meta_nonce');

echo <<<END

	<label>Dirección:</label>
	<input type="text" class="widefat" id="direccion" name="_direccion_evento_meta" value="$direccion" />
	<label>Día:</label>
	<input type="text" class="widefat" id="dia" name="_dia_evento_meta" value="$dia" />
	<label>Hora:</label>
	<input type="text" class="widefat" id="hora" name="_hora_evento_meta" value="$hora" />
	<label>Teléfono:</label>
	<input type="text" class="widefat" id="telefono" name="_telefono_evento_meta" value="$telefono" />
	<label>Contacto:</label>
	<input type="text" class="widefat" id="contacto" name="_contacto_evento_meta" value="$contacto" />
	<label>Sitio web:</label>
	<input type="text" class="widefat" id="web" name="_web_evento_meta" value="$web" />
	<label>Facebook:</label>
	<input type="text" class="widefat" id="facebook" name="_facebook_evento_meta" value="$facebook" />
	<label>Twitter:</label>
	<input type="text" class="widefat" id="twitter" name="_twitter_evento_meta" value="$twitter" />
	<label>Ingresa la dirección:</label>
	<input type="text" class="widefat" id="geo-autocomplete" placeholder="Ingresa la ubicación del evento">
	<label>Latitud:</label>
	<input type="text" class="widefat" id="lat_recurso" name="_lat_evento_meta" value="$lat" data-geo="lat" /><br/>
	<label>Longitud:</label>
	<input type="text" class="widefat" id="lon_recurso" name="_lon_evento_meta" value="$lon" data-geo="lng" /><br/>
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
		if ( isset($_POST['_direccion_recurso_meta']) and check_admin_referer(__FILE__, '_direccion_recurso_meta_nonce') ){
			update_post_meta($post_id, '_direccion_recurso_meta', $_POST['_direccion_recurso_meta']);
		}
		if ( isset($_POST['_telefono_recurso_meta']) and check_admin_referer(__FILE__, '_telefono_recurso_meta_nonce') ){
			update_post_meta($post_id, '_telefono_recurso_meta', $_POST['_telefono_recurso_meta']);
		}
		if ( isset($_POST['_email_recurso_meta']) and check_admin_referer(__FILE__, '_email_recurso_meta_nonce') ){
			update_post_meta($post_id, '_email_recurso_meta', $_POST['_email_recurso_meta']);
		}
		if ( isset($_POST['_web_recurso_meta']) and check_admin_referer(__FILE__, '_web_recurso_meta_nonce') ){
			update_post_meta($post_id, '_web_recurso_meta', $_POST['_web_recurso_meta']);
		}
		if ( isset($_POST['_instructables_recurso_meta']) and check_admin_referer(__FILE__, '_instructables_recurso_meta_nonce') ){
			update_post_meta($post_id, '_instructables_recurso_meta', $_POST['_instructables_recurso_meta']);
		}
		if ( isset($_POST['_video_recurso_meta']) and check_admin_referer(__FILE__, '_video_recurso_meta_nonce') ){
			update_post_meta($post_id, '_video_recurso_meta', $_POST['_video_recurso_meta']);
		}
		if ( isset($_POST['_lat_recurso_meta']) and check_admin_referer(__FILE__, '_lat_recurso_meta_nonce') ){
			update_post_meta($post_id, '_lat_recurso_meta', $_POST['_lat_recurso_meta']);
		}
		if ( isset($_POST['_lon_recurso_meta']) and check_admin_referer(__FILE__, '_lon_recurso_meta_nonce') ){
			update_post_meta($post_id, '_lon_recurso_meta', $_POST['_lon_recurso_meta']);
		}

		/*------------------------------------*\
		    #PROYECTO
		\*------------------------------------*/
		if ( isset($_POST['_direccion_proyecto_meta']) and check_admin_referer(__FILE__, '_direccion_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_direccion_proyecto_meta', $_POST['_direccion_proyecto_meta']);
		}
		if ( isset($_POST['_telefono_proyecto_meta']) and check_admin_referer(__FILE__, '_telefono_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_telefono_proyecto_meta', $_POST['_telefono_proyecto_meta']);
		}
		if ( isset($_POST['_email_proyecto_meta']) and check_admin_referer(__FILE__, '_email_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_email_proyecto_meta', $_POST['_email_proyecto_meta']);
		}
		if ( isset($_POST['_web_proyecto_meta']) and check_admin_referer(__FILE__, '_web_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_web_proyecto_meta', $_POST['_web_proyecto_meta']);
		}
		if ( isset($_POST['_instructables_proyecto_meta']) and check_admin_referer(__FILE__, '_instructables_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_instructables_proyecto_meta', $_POST['_instructables_proyecto_meta']);
		}
		if ( isset($_POST['_video_proyecto_meta']) and check_admin_referer(__FILE__, '_video_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_video_proyecto_meta', $_POST['_video_proyecto_meta']);
		}
		if ( isset($_POST['_lat_proyecto_meta']) and check_admin_referer(__FILE__, '_lat_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_lat_proyecto_meta', $_POST['_lat_proyecto_meta']);
		}
		if ( isset($_POST['_lon_proyecto_meta']) and check_admin_referer(__FILE__, '_lon_proyecto_meta_nonce') ){
			update_post_meta($post_id, '_lon_proyecto_meta', $_POST['_lon_proyecto_meta']);
		}

		/*------------------------------------*\
		    #EVENTOS
		\*------------------------------------*/
		if ( isset($_POST['_direccion_evento_meta']) and check_admin_referer(__FILE__, '_direccion_evento_meta_nonce') ){
			update_post_meta($post_id, '_direccion_evento_meta', $_POST['_direccion_evento_meta']);
		}
		if ( isset($_POST['_dia_evento_meta']) and check_admin_referer(__FILE__, '_dia_evento_meta_nonce') ){
			update_post_meta($post_id, '_dia_evento_meta', $_POST['_dia_evento_meta']);
		}
		if ( isset($_POST['_hora_evento_meta']) and check_admin_referer(__FILE__, '_hora_evento_meta_nonce') ){
			update_post_meta($post_id, '_hora_evento_meta', $_POST['_hora_evento_meta']);
		}
		if ( isset($_POST['_telefono_evento_meta']) and check_admin_referer(__FILE__, '_telefono_evento_meta_nonce') ){
			update_post_meta($post_id, '_telefono_evento_meta', $_POST['_telefono_evento_meta']);
		}
		if ( isset($_POST['_contacto_evento_meta']) and check_admin_referer(__FILE__, '_contacto_evento_meta_nonce') ){
			update_post_meta($post_id, '_contacto_evento_meta', $_POST['_contacto_evento_meta']);
		}
		if ( isset($_POST['_web_evento_meta']) and check_admin_referer(__FILE__, '_web_evento_meta_nonce') ){
			update_post_meta($post_id, '_web_evento_meta', $_POST['_web_evento_meta']);
		}
		if ( isset($_POST['_facebook_evento_meta']) and check_admin_referer(__FILE__, '_facebook_evento_meta_nonce') ){
			update_post_meta($post_id, '_facebook_evento_meta', $_POST['_facebook_evento_meta']);
		}
		if ( isset($_POST['_twitter_evento_meta']) and check_admin_referer(__FILE__, '_twitter_evento_meta_nonce') ){
			update_post_meta($post_id, '_twitter_evento_meta', $_POST['_twitter_evento_meta']);
		}
		if ( isset($_POST['_lat_evento_meta']) and check_admin_referer(__FILE__, '_lat_evento_meta_nonce') ){
			update_post_meta($post_id, '_lat_evento_meta', $_POST['_lat_evento_meta']);
		}
		if ( isset($_POST['_lon_evento_meta']) and check_admin_referer(__FILE__, '_lon_evento_meta_nonce') ){
			update_post_meta($post_id, '_lon_evento_meta', $_POST['_lon_evento_meta']);
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		}*/


	});