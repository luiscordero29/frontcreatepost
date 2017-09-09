jQuery(document).ready( function($) {

	/* CREATE POST */
	$('#select-escort').on('change', function(event) {
        event.preventDefault();
       	var escort = $(this).val();
        $('#escort').val(escort);
    });

    $('#select-ville').on('change', function(event) {
        event.preventDefault();
       	var ville = $(this).val();
        $('#ville').val(ville);
    });

    $('#select-iam').on('change', function(event) {
        event.preventDefault();
       	var iam = $(this).val();
        $('#iam').val(iam);
    });

    $('#select-isearch').on('change', function(event) {
        event.preventDefault();
       	var isearch = $(this).val();
        $('#isearch').val(isearch);
    });

    $('#select-schedule_1').on('change', function(event) {
        event.preventDefault();
       	var schedule_1 = $(this).val();
        $('#schedule_1').val(schedule_1);
    });

    $('#select-schedule_2').on('change', function(event) {
        event.preventDefault();
       	var schedule_2 = $(this).val();
        $('#schedule_2').val(schedule_2);
    });

    $('#select-expiration').on('change', function(event) {
        event.preventDefault();
       	var expiration = $(this).val();
        $('#expiration').val(expiration);
    });

	$('#front_create_post_form').submit(function(e){ 
        e.preventDefault();
		
		var ajax_url = $('#ajax_url').val();
		var title = $('#title').val();
		var description = $('#description').val();
		var escort = $('#escort').val();
		var ville = $('#ville').val();
		var iam = $('#iam').val();
		var isearch = $('#isearch').val();
		var schedule_1 = $('#schedule_1').val();
		var schedule_2 = $('#schedule_2').val();
		var expiration = $('#expiration').val();
		var age = $('#age').val();
		var name = $('#name').val();
		var email = $('#email').val();
		var phone_1 = $('#phone_1').val();
		var phone_2 = $('#phone_2').val();
		var send = $('#send').val();

		var data = {
			'action': 'action_front_create_post',
			'title': title,
			'description': description,
			'escort': escort,
			'ville': ville,
			'iam': iam,
			'isearch': isearch,
			'schedule_1': schedule_1,
			'schedule_2': schedule_2,
			'expiration': expiration,
			'age': age,
			'name': name,
			'email': email,
			'phone_1': phone_1,
			'phone_2': phone_2,
			'send': send,
		};

		jQuery.post(ajax_url, data, function(response) {
			if (response == 'OK') {
				swal(
				  	'Succès!',
				  	'Publicité!',
				  	'success'
				);

				$('#select-escort').selectedIndex = 0;
				$('#select-ville').selectedIndex = 0;
				$('#select-iam').selectedIndex = 0;
				$('#select-isearch').selectedIndex = 0;
				$('#select-schedule_1').selectedIndex = 0;
				$('#select-schedule_2').selectedIndex = 0;
				$('#select-expiration').selectedIndex = 0;
				$('#title').val('');
				$('#description').val('');
				$('#escort').val('');
				$('#ville').val('');
				$('#iam').val('');
				$('#isearch').val('');
				$('#schedule_1').val('');
				$('#schedule_2').val('');
				$('#expiration').val('');
				$('#age').val('');
				$('#name').val('');
				$('#email').val('');
				$('#phone_1').val('');
				$('#phone_2').val('');
			}
			if (response == 'KO') {
				swal(
				  	'Erreur',
				  	'Publication d\'erreur!',
				  	'error'
				);
			}
		});
    });

	/* DELETE POST */
	$( ".delete_post" ).on( "click", function( event, person ) {
  		var id  = $(this).data('id');
  		var ajax_url  = $(this).data('url');
  		var data = {
			'action': 'action_front_delete_post',
			'id': id,
		};
		jQuery.post(ajax_url, data, function(response) {
			if (response == 'OK') {
				swal(
				  	'Succès!',
				  	'Supprimé!',
				  	'success'
				);
			}
			if (response == 'KO') {
				swal(
				  	'Erreur',
				  	'supprimer!',
				  	'error'
				);
			}
			location.reload(true);
		});
	});

	/* START */
	$( ".start" ).on( "click", function( event, person ) {
  		var post_id  = $(this).data('post');
  		var user_id  = $(this).data('user');
  		var ajax_url  = $(this).data('url');
  		var data = {
			'action': 'action_front_start_post',
			'post_id': post_id,
			'user_id': user_id,
		};
		jQuery.post(ajax_url, data, function(response) {
			if (response == 'OK') {
				swal(
				  	'Succès!',
				  	'Ma sélection!',
				  	'success'
				);
			}
			if (response == 'KO') {
				swal(
				  	'Erreur',
				  	'Ma sélection!',
				  	'error'
				);
			}
		});
	});

	/* DELETE START */
	$( ".delete_start" ).on( "click", function( event, person ) {
  		var id  = $(this).data('id');
  		var ajax_url  = $(this).data('url');
  		var data = {
			'action': 'action_front_delete_start',
			'id': id,
		};
		jQuery.post(ajax_url, data, function(response) {
			if (response == 'OK') {
				swal(
				  	'Succès!',
				  	'Supprimé!',
				  	'success'
				);
			}
			if (response == 'KO') {
				swal(
				  	'Erreur',
				  	'supprimer!',
				  	'error'
				);
			}
			location.reload(true);
		});
	});
});