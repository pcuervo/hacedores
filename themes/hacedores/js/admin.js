var file_frame;	
(function( $ ) {
	$('.additional-user-image').on('click', function( event ){

		event.preventDefault();
		var txt_area = $(this).prev();

		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: $( this ).data( 'uploader_title' ),
			button: {
				text: $( this ).data( 'uploader_button_text' ),
			},
			multiple: false  // Set to true to allow multiple files to be selected
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();
			txt_area.val(attachment.url);
		});

		// Finally, open the modal
		file_frame.open();
	});
}(jQuery));


