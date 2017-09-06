jQuery(document).ready( function($) {

	$('#front_create_post_form').submit(function(e){ 
        e.preventDefault();
		
		var ajax_url = $('#ajax_url').val();
		var title = $('#title').val();
		var description = $('#description').val();
		var send = $('#send').val();

		var data = {
			'action': 'action_front_create_post',
			'title': title,
			'description': description,
			'send': send,
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajax_url, data, function(response) {
			alert('Got this from the server: ' + response);
		});
    });


})