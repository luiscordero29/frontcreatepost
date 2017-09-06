<?php 

function front_create_post_model(){

	




	// if the submit button is clicked, send the email
	if ( isset( $_POST['send'] ) ){

		# vars post
		$escort    		= trim(sanitize_text_field($_POST["escort"]));
		$ville    		= trim(sanitize_text_field($_POST["ville"]));
		$title    		= trim(sanitize_text_field($_POST["title"]));
		$iam    		= trim(sanitize_text_field($_POST["iam"]));
		$isearch    	= trim(sanitize_text_field($_POST["isearch"]));
		$age    		= trim(sanitize_text_field($_POST["age"]));
		$description   	= sanitize_text_field($_POST["description"]);
		$name   		= trim(sanitize_text_field($_POST["name"]));
		$email   		= trim(sanitize_email($_POST["email"]));
		$phone_1   		= sanitize_text_field($_POST["phone_1"]);
		$schedule_1   	= sanitize_text_field($_POST["schedule_1"]);
		$phone_2   		= sanitize_text_field($_POST["phone_2"]);
		$schedule_2   	= sanitize_text_field($_POST["schedule_2"]);
		$expiration   	= sanitize_text_field($_POST["expiration"]);
		$thisok   		= sanitize_text_field($_POST["thisok"]);

		# vars database
		$escort 		= $escort.'-'.$ville;
		$user_id 		= get_current_user_id();
		$term_ville 	= get_term( $ville );
		$term_escort 	= get_term( $escort );

		# VALIDACION
		if ( $thisok == 'ok' ){
			# this ok
			$post = array(
			    'post_title'    => $title,
			    'post_content'  => $description,
			    'post_excerpt'  => $description,
			    'post_status'   => 'draft',
			    'post_author'   => $user_id,
			    'post_category' => array( $term_ville->term_id, $term_escort->term_id ),
			    'meta_input'   	=> array(
			        'iam'			=> $iam,
			        'isearch' 		=> $isearch,
			        'age' 			=> $age,
			        'name' 			=> $name,
			        'email' 		=> $email,
			        'phone_1' 		=> $phone_1,
			        'schedule_1' 	=> $schedule_1,
			        'phone_2' 		=> $phone_2,
			        'schedule_2' 	=> $schedule_2,
			        'expiration' 	=> $expiration,
			    ),
			);
			$post_id = wp_insert_post( $post );
			# editar el tiempo disponible 
			echo '<br /><br /><div class="alert alert-success" role="alert">Publier cette annonce</div>';
		} 
	}
}
?>