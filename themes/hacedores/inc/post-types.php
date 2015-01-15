<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// Proyectos
		$labels = array(
			'name'          => 'Proyectos',
			'singular_name' => 'Proyecto',
			'add_new'       => 'Nuevo Proyecto',
			'add_new_item'  => 'Nuevo Proyecto',
			'edit_item'     => 'Editar Proyecto',
			'new_item'      => 'Nueva Proyecto',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Proyecto',
			'search_items'  => 'Buscar Proyecto',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Proyectos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'proyectos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'proyecto', $args );

		// Recursos
		$labels = array(
			'name'          => 'Recursos',
			'singular_name' => 'Recurso',
			'add_new'       => 'Nuevo Recurso',
			'add_new_item'  => 'Nuevo Recurso',
			'edit_item'     => 'Editar Recurso',
			'new_item'      => 'Nueva Recurso',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Recurso',
			'search_items'  => 'Buscar Recurso',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Recursos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'recursos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'recurso', $args );

		// Eventos
		$labels = array(
			'name'          => 'Eventos',
			'singular_name' => 'Evento',
			'add_new'       => 'Nuevo Evento',
			'add_new_item'  => 'Nuevo Evento',
			'edit_item'     => 'Editar Evento',
			'new_item'      => 'Nueva Evento',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Evento',
			'search_items'  => 'Buscar Evento',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Eventos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'eventos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'evento', $args );

		// Información
		$labels = array(
			'name'          => 'Información',
			'singular_name' => 'Información',
			'add_new'       => 'Nueva Información',
			'add_new_item'  => 'Nueva Información',
			'edit_item'     => 'Editar Información',
			'new_item'      => 'Nueva Información',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Información',
			'search_items'  => 'Buscar Información',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Información'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'informacion' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'informacion', $args );

	});