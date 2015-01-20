(function($){

	"use strict";

	$(function(){

		/**
		 * Validación de emails
		 */
		window.validateEmail = function (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		};

		/**
		 * Regresa todos los valores de un formulario como un associative array
		 */
		window.getFormData = function (selector) {
			var result = [],
				data   = $(selector).serializeArray();

			$.map(data, function (attr) {
				result[attr.name] = attr.value;
			});
			return result;
		}
	});

	/* VIDEO RESPONSIVE */
	$(document).ready(function(){
		// Target your .container, .wrapper, .post, etc.
		$("#thing-with-videos").fitVids();
	});

	/* MENU MOVIL */
	$(document).ready(function() {
		$("#menu-movil").mmenu();
	});

	/* LIGHTBOX */
	$( function()
	{
			// ACTIVITY INDICATOR

		var activityIndicatorOn = function()
			{
				$( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
			},
			activityIndicatorOff = function()
			{
				$( '#imagelightbox-loading' ).remove();
			},


			// OVERLAY

			overlayOn = function()
			{
				$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
			},
			overlayOff = function()
			{
				$( '#imagelightbox-overlay' ).remove();
			},


			// CLOSE BUTTON

			closeButtonOn = function( instance )
			{
				$( '<a id="imagelightbox-close" title="Close"></a>' ).appendTo( 'body' ).on( 'click touchend', function(){ $( this ).remove(); instance.quitImageLightbox(); return false; });
			},
			closeButtonOff = function()
			{
				$( '#imagelightbox-close' ).remove();
			},


			// CAPTION

			captionOn = function()
			{
				var description = $( 'a[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'alt' );
				if( description.length > 0 )
					$( '<div id="imagelightbox-caption">' + description + '</div>' ).appendTo( 'body' );
			},
			captionOff = function()
			{
				$( '#imagelightbox-caption' ).remove();
			},


			// NAVIGATION

			navigationOn = function( instance, selector )
			{
				var images = $( selector );
				if( images.length )
				{
					var nav = $( '<div id="imagelightbox-nav"></div>' );
					for( var i = 0; i < images.length; i++ )
						nav.append( '<button type="button"></button>' );

					nav.appendTo( 'body' );
					nav.on( 'click touchend', function(){ return false; });

					var navItems = nav.find( 'button' );
					navItems.on( 'click touchend', function()
					{
						var $this = $( this );
						if( images.eq( $this.index() ).attr( 'href' ) != $( '#imagelightbox' ).attr( 'src' ) )
							instance.switchImageLightbox( $this.index() );

						navItems.removeClass( 'active' );
						navItems.eq( $this.index() ).addClass( 'active' );

						return false;
					})
					.on( 'touchend', function(){ return false; });
				}
			},
			navigationUpdate = function( selector )
			{
				var items = $( '#imagelightbox-nav button' );
				items.removeClass( 'active' );
				items.eq( $( selector ).filter( '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ).index( selector ) ).addClass( 'active' );
			},
			navigationOff = function()
			{
				$( '#imagelightbox-nav' ).remove();
			},


			// ARROWS

			arrowsOn = function( instance, selector )
			{
				var $arrows = $( '<i class="fa fa-chevron-left imagelightbox-arrow imagelightbox-arrow-left"></i><i class="fa fa-chevron-right imagelightbox-arrow imagelightbox-arrow-right"></i>' );

				$arrows.appendTo( 'body' );

				$arrows.on( 'click touchend', function( e )
				{
					e.preventDefault();

					var $this	= $( this ),
						$target	= $( selector + '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ),
						index	= $target.index( selector );

					if( $this.hasClass( 'imagelightbox-arrow-left' ) )
					{
						index = index - 1;
						if( !$( selector ).eq( index ).length )
							index = $( selector ).length;
					}
					else
					{
						index = index + 1;
						if( !$( selector ).eq( index ).length )
							index = 0;
					}

					instance.switchImageLightbox( index );
					return false;
				});
			},
			arrowsOff = function()
			{
				$( '.imagelightbox-arrow' ).remove();
			};


		//	WITH ACTIVITY INDICATION

		$( 'a[data-imagelightbox="a"]' ).imageLightbox(
		{
			onLoadStart:	function() { activityIndicatorOn(); },
			onLoadEnd:		function() { activityIndicatorOff(); },
			onEnd:	 		function() { activityIndicatorOff(); }
		});


		//	WITH OVERLAY & ACTIVITY INDICATION

		$( 'a[data-imagelightbox="b"]' ).imageLightbox(
		{
			onStart: 	 function() { overlayOn(); },
			onEnd:	 	 function() { overlayOff(); activityIndicatorOff(); },
			onLoadStart: function() { activityIndicatorOn(); },
			onLoadEnd:	 function() { activityIndicatorOff(); }
		});


		//	WITH "CLOSE" BUTTON & ACTIVITY INDICATION

		var instanceC = $( 'a[data-imagelightbox="c"]' ).imageLightbox(
		{
			quitOnDocClick:	false,
			onStart:		function() { closeButtonOn( instanceC ); },
			onEnd:			function() { closeButtonOff(); activityIndicatorOff(); },
			onLoadStart: 	function() { activityIndicatorOn(); },
			onLoadEnd:	 	function() { activityIndicatorOff(); }
		});


		//	WITH CAPTION & ACTIVITY INDICATION

		$( 'a[data-imagelightbox="d"]' ).imageLightbox(
		{
			onLoadStart: function() { captionOff(); activityIndicatorOn(); },
			onLoadEnd:	 function() { captionOn(); activityIndicatorOff(); },
			onEnd:		 function() { captionOff(); activityIndicatorOff(); }
		});


		//	WITH ARROWS & ACTIVITY INDICATION

		var selectorG = 'a[data-imagelightbox="g"]';
		var instanceG = $( selectorG ).imageLightbox(
		{
			onStart:		function(){ arrowsOn( instanceG, selectorG ); },
			onEnd:			function(){ arrowsOff(); activityIndicatorOff(); },
			onLoadStart: 	function(){ activityIndicatorOn(); },
			onLoadEnd:	 	function(){ $( '.imagelightbox-arrow' ).css( 'display', 'block' ); activityIndicatorOff(); }
		});


		//	WITH NAVIGATION & ACTIVITY INDICATION

		var selectorE = 'a[data-imagelightbox="e"]';
		var instanceE = $( selectorE ).imageLightbox(
		{
			onStart:	 function() { navigationOn( instanceE, selectorE ); },
			onEnd:		 function() { navigationOff(); activityIndicatorOff(); },
			onLoadStart: function() { activityIndicatorOn(); },
			onLoadEnd:	 function() { navigationUpdate( selectorE ); activityIndicatorOff(); }
		});


		//	ALL COMBINED

		var selectorF = 'a[data-imagelightbox="f"]';
		var instanceF = $( selectorF ).imageLightbox(
		{
			onStart:		function() { overlayOn(); closeButtonOn( instanceF ); arrowsOn( instanceF, selectorF ); },
			onEnd:			function() { overlayOff(); captionOff(); closeButtonOff(); arrowsOff(); activityIndicatorOff(); },
			onLoadStart: 	function() { captionOff(); activityIndicatorOn(); },
			onLoadEnd:	 	function() { captionOn(); activityIndicatorOff(); $( '.imagelightbox-arrow' ).css( 'display', 'block' ); }
		});

	});

	$('.trigger').on('click', function() {
	    $('.content').hide('fade');
	    $('.' + $(this).data('rel')).show('fade');
	});

	/*MODAL ENTRAR*/
	$('.js-abrir-modal').on('click', function(){
		$('div').removeClass('mm-slideout');
		$('.modal').css('display','inline-block');
	});
	$('.js-cerrar-modal').on('click', function(){
		$('.modal').css('display','none');
		$('div').addClass('mm-slideout');
	});

	/*PAGINATION CALL*/

})(jQuery);

var $=jQuery.noConflict();
/* FUNCIONES PARA GOOGLE MAPS */
function creaMapa(){
	// Crea Mapa
	var map = new google.maps.Map(document.getElementById('mapa'), {
		zoom: 18,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		streetViewControl: false,
		panControl: false,
		scrollwheel: false,
		zoomControlOptions: {
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		}
	});

	return map;
}// crearMapa

function creaMarkers(mapa, infoMapa){
	var categorias_mapa = {};
	var markers = [];
	// Agrega todos los marcadores al mapa
	$.each(infoMapa, function(categoria, subcategorias){
		categorias_mapa[categoria] = {};		
		$.each(subcategorias, function(i, subcategoria){
			if(typeof subcategoria != 'object') return true;

			categorias_mapa[categoria][subcategoria] = []; 
			categorias_mapa[categoria][subcategoria].push({
				titulo: subcategoria[0],
				lat: subcategoria[1],
				lon: subcategoria[2],
				slug: subcategoria[3],
				url: site_url + subcategoria[4] + '/' + subcategoria[5]
			});
		});		
		var current_markers = dameMarkers(categoria,categorias_mapa[categoria], mapa);
		markers = markers.concat(current_markers);
	});
	return markers;
}// creaMarkers

function agregaFiltrosMarkers(mapa, markers, infoMapa){
	$.each(infoMapa, function(categoria, subcategorias){

		$('li.'+categoria).on('click', function(){
			filtraMarkerCategoria(categoria, markers, mapa);
		});	
		
		$.each(subcategorias, function(i, subcategoria){
			if(typeof subcategoria != 'object') return true;
			
			$('ul.sub-'+categoria+' li.'+subcategoria[3]).on('click', function(){
				filtraMarkerSubCategoria(categoria, subcategoria[3], markers, mapa);
			});	
		});

	});
}// agregaFiltrosMarkers

function dameMarkers(categoria, subcategorias, mapa){
	if(isEmpty(subcategorias)) return new Array();

	var marker;
	var markers = new Array();
	ubicaciones = [];

	$.each(subcategorias, function(i, subcategoria){
		$.each(subcategoria, function(j, coordenadas){
			var infoPost = [];
			var contenidoInfoWindow ='<h3>'+coordenadas.titulo+'</h3><a href="'+coordenadas.url+'">Más info</a>';
			infoPost.push(j);
			infoPost.push(coordenadas.lat);
			infoPost.push(coordenadas.lon);
			infoPost.push(contenidoInfoWindow);
			infoPost.push(coordenadas.slug);
			ubicaciones.push(infoPost);
		});
	});

	var icon = dameIconPath(categoria);
	for (var i = 0; i < ubicaciones.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(ubicaciones[i][1], ubicaciones[i][2]),
			map: mapa,
			icon: icon,
			category: categoria,
			subcategory: ubicaciones[i][4]
		});
		markers.push(marker);
		
		// Agrega infoWindow para mostrar la información del post
		var infowindow = new google.maps.InfoWindow({
			maxWidth: 500
		});
		infowindow.setContent(ubicaciones[i][3]);
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() { infowindow.open(mapa, marker); };
		})(marker, i));
	}
	return markers;
}// agregaMarkers

function filtraMarkerCategoria(categoria, markers, mapa){
	var filteredResult = markers.filter(function(obj) {
    	return (obj.category == categoria)
   	});
	$.each(markers, function (index, marker) {
		marker.setVisible(false);
	});
	var visible_markers = [];
	$.each(filteredResult, function (index, marker) {
		marker.setVisible(true);
		visible_markers.push(marker);
	});
	autoCenter(mapa, visible_markers);
}

function filtraMarkerSubCategoria(categoria, subcategoria, markers, mapa){
	var filteredResult = markers.filter(function(obj) {
    	return (obj.subcategory == subcategoria && obj.category == categoria)
   	});
	$.each(markers, function (index, marker) {
		marker.setVisible(false);
	});
	var visible_markers = [];
	$.each(filteredResult, function (index, marker) {
		marker.setVisible(true);
		visible_markers.push(marker);
	});
	autoCenter(mapa, visible_markers);
}// filtraMarkerSubCategoria

function autoCenter(map, markers) {
	//  Crea un nuevo limite
	var bounds = new google.maps.LatLngBounds();
	//  Itera todos los marcadores
	$.each(markers, function (index, marker) { bounds.extend(marker.position); });
	//  Mete los límites en el mapa
	map.fitBounds(bounds);
	var listener = google.maps.event.addListener(map, "idle", function() {
	if (map.getZoom() > 17) map.setZoom(17);
		google.maps.event.removeListener(listener);
	});
} // autoCenter

function dameIconPath(categoria){
	switch(categoria){
		case 'hacedores':
			icon_path = theme_path + 'images/marker-hacedores.png';
			break;
		case 'evento':
			icon_path = theme_path + 'images/marker-eventos.png';
			break;
		case 'recurso':
			icon_path = theme_path + 'images/marker-espacios.png';
			break;
		case 'proyecto':
			icon_path = theme_path + 'images/marker-proyectos.png';
			break;
	}
	return icon_path;
}// dameIconPath

function isEmpty(obj) {
	// Speed up calls to hasOwnProperty
	var hasOwnProperty = Object.prototype.hasOwnProperty;

    // null and undefined are "empty"
    if (obj == null) return true;

    // Assume if it has a length property with a non-zero value
    // that that property is correct.
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    // Otherwise, does it have any properties of its own?
    // Note that this doesn't handle
    // toString and valueOf enumeration bugs in IE < 9
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}


