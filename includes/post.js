jQuery(document).ready( function($) {

	$.ajax({
		url: "http://discret69.luiscordero29.com/",
		success: function( data ) {
			alert( 'Your home page has ' + $(data).find('div').length + ' div elements.');
		}
	})

})