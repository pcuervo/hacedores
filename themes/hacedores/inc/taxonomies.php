<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// PROYECTOS
		if( ! taxonomy_exists('category-proyectos')){
			$labels = array(
				'name'              => 'Categorias (debes agregar al menos una para aparecer en el mapa)',
				'singular_name'     => 'Categoría',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Categoría',
				'update_item'       => 'Actualizar Categoría',
				'add_new_item'      => 'Nueva Categoría',
				'new_item_name'     => 'Nombre Nueva Categoría',
				'menu_name'         => 'Categorias'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'category-proyectos' ),
			);
			register_taxonomy( 'category-proyectos', 'proyectos', $args );
		}

		// PROYECTOS
		if( ! taxonomy_exists('category-recursos')){
			$labels = array(
				'name'              => 'Categorias (debes agregar al menos una para aparecer en el mapa)',
				'singular_name'     => 'Categoría',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Categoría',
				'update_item'       => 'Actualizar Categoría',
				'add_new_item'      => 'Nueva Categoría',
				'new_item_name'     => 'Nombre Nueva Categoría',
				'menu_name'         => 'Categorias'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'category-recursos' ),
			);
			register_taxonomy( 'category-recursos', 'recursos', $args );
		}

		// PROYECTOS
		if( ! taxonomy_exists('category-eventos')){
			$labels = array(
				'name'              => 'Categorias (debes agregar al menos una para aparecer en el mapa)',
				'singular_name'     => 'Categoría',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Categoría',
				'update_item'       => 'Actualizar Categoría',
				'add_new_item'      => 'Nueva Categoría',
				'new_item_name'     => 'Nombre Nueva Categoría',
				'menu_name'         => 'Categorias'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'category-eventos' ),
			);
			register_taxonomy( 'category-eventos', 'eventos', $args );
		}


		// TERMS PROYECTO
		if ( ! term_exists( 'Urbanismo', 'category-proyectos' ) ){
			wp_insert_term( 'Urbanismo', 'category-proyectos' );
		}
		if ( ! term_exists( 'Arte e interactivos', 'category-proyectos' ) ){
			wp_insert_term( 'Arte e interactivos', 'category-proyectos' );
		}
		if ( ! term_exists( 'Ciencia y biología', 'category-proyectos' ) ){
			wp_insert_term( 'Ciencia y biología', 'category-proyectos' );
		}
		if ( ! term_exists( 'Comunidad maker', 'category-proyectos' ) ){
			wp_insert_term( 'Comunidad maker', 'category-proyectos' );
		}
		if ( ! term_exists( 'Diseño, artesanía y oficios', 'category-proyectos' ) ){
			wp_insert_term( 'Diseño, artesanía y oficios', 'category-proyectos' );
		}
		if ( ! term_exists( 'Electrónica y hardware', 'category-proyectos' ) ){
			wp_insert_term( 'Electrónica y hardware', 'category-proyectos' );
		}
		if ( ! term_exists( 'Fabricación digital / impresión 3D', 'category-proyectos' ) ){
			wp_insert_term( 'Fabricación digital / impresión 3D', 'category-proyectos' );
		}
		if ( ! term_exists( 'Lúdicos', 'category-proyectos' ) ){
			wp_insert_term( 'Lúdicos', 'category-proyectos' );
		}
		if ( ! term_exists( 'Robótica e ingeniería', 'category-proyectos' ) ){
			wp_insert_term( 'Robótica e ingeniería', 'category-proyectos' );
		}
		if ( ! term_exists( 'Sustentabilidad y reciclaje', 'category-proyectos' ) ){
			wp_insert_term( 'Sustentabilidad y reciclaje', 'category-proyectos' );
		}

		// TERMS RECURSO
		if ( ! term_exists( 'Urbanismo', 'category-recursos' ) ){
			wp_insert_term( 'Urbanismo', 'category-recursos' );
		}
		if ( ! term_exists( 'Arte e interactivos', 'category-recursos' ) ){
			wp_insert_term( 'Arte e interactivos', 'category-recursos' );
		}
		if ( ! term_exists( 'Ciencia y biología', 'category-recursos' ) ){
			wp_insert_term( 'Ciencia y biología', 'category-recursos' );
		}
		if ( ! term_exists( 'Comunidad maker', 'category-recursos' ) ){
			wp_insert_term( 'Comunidad maker', 'category-recursos' );
		}
		if ( ! term_exists( 'Diseño, artesanía y oficios', 'category-recursos' ) ){
			wp_insert_term( 'Diseño, artesanía y oficios', 'category-recursos' );
		}
		if ( ! term_exists( 'Electrónica y hardware', 'category-recursos' ) ){
			wp_insert_term( 'Electrónica y hardware', 'category-recursos' );
		}
		if ( ! term_exists( 'Fabricación digital / impresión 3D', 'category-recursos' ) ){
			wp_insert_term( 'Fabricación digital / impresión 3D', 'category-recursos' );
		}
		if ( ! term_exists( 'Lúdicos', 'category-recursos' ) ){
			wp_insert_term( 'Lúdicos', 'category-recursos' );
		}
		if ( ! term_exists( 'Robótica e ingeniería', 'category-recursos' ) ){
			wp_insert_term( 'Robótica e ingeniería', 'category-recursos' );
		}
		if ( ! term_exists( 'Sustentabilidad y reciclaje', 'category-recursos' ) ){
			wp_insert_term( 'Sustentabilidad y reciclaje', 'category-recursos' );
		}

		// TERMS EVENTO
		if ( ! term_exists( 'Urbanismo', 'category-eventos' ) ){
			wp_insert_term( 'Urbanismo', 'category-eventos' );
		}
		if ( ! term_exists( 'Arte e interactivos', 'category-eventos' ) ){
			wp_insert_term( 'Arte e interactivos', 'category-eventos' );
		}
		if ( ! term_exists( 'Ciencia y biología', 'category-eventos' ) ){
			wp_insert_term( 'Ciencia y biología', 'category-eventos' );
		}
		if ( ! term_exists( 'Comunidad maker', 'category-eventos' ) ){
			wp_insert_term( 'Comunidad maker', 'category-eventos' );
		}
		if ( ! term_exists( 'Diseño, artesanía y oficios', 'category-eventos' ) ){
			wp_insert_term( 'Diseño, artesanía y oficios', 'category-eventos' );
		}
		if ( ! term_exists( 'Electrónica y hardware', 'category-eventos' ) ){
			wp_insert_term( 'Electrónica y hardware', 'category-eventos' );
		}
		if ( ! term_exists( 'Fabricación digital / impresión 3D', 'category-eventos' ) ){
			wp_insert_term( 'Fabricación digital / impresión 3D', 'category-eventos' );
		}
		if ( ! term_exists( 'Lúdicos', 'category-eventos' ) ){
			wp_insert_term( 'Lúdicos', 'category-eventos' );
		}
		if ( ! term_exists( 'Robótica e ingeniería', 'category-eventos' ) ){
			wp_insert_term( 'Robótica e ingeniería', 'category-eventos' );
		}
		if ( ! term_exists( 'Sustentabilidad y reciclaje', 'category-eventos' ) ){
			wp_insert_term( 'Sustentabilidad y reciclaje', 'category-eventos' );
		}
	}
