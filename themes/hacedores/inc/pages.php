<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// Registro
		if( ! get_page_by_path('registro') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Registro',
				'post_name'   => 'registro',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Login
		if( ! get_page_by_path('login') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Login',
				'post_name'   => 'login',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Users archice
		if( ! get_page_by_path('hacedores') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Hacedores',
				'post_name'   => 'hacedores',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


	});
