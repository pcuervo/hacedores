	(function( $ ) {
		// Uploading files
		var file_frame;

			$('.additional-user-image').on('click', function( event ){

				event.preventDefault();
				var btn_uploader = $(this);
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					file_frame.open();
					return;
				}

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
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					console.log("algo");
					console.log(btn_uploader.prev());
					console.log(attachment.url);
					// Do something with attachment.id and/or attachment.url here
					btn_uploader.prev().val(attachment.url);
				});

				// Finally, open the modal
				file_frame.open();
			});
	}(jQuery));


