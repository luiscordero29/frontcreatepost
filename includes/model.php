<?php 

function front_create_post_model(){

	// if the submit button is clicked, send the email
	if ( isset( $_POST['syi_contacto'] ) )
	{

		// sanitize form values
		$nombre    		= trim(sanitize_text_field($_POST["nombre"]));
		$apellido    	= trim(sanitize_text_field($_POST["apellido"]));
		$email   		= trim(sanitize_email($_POST["email"]));
		$empresa   		= sanitize_text_field($_POST["empresa"]);
		$telefono   	= trim(sanitize_text_field($_POST["telefono"]));
		$fax   			= sanitize_text_field($_POST["fax"]);
		$ciudad   		= sanitize_text_field($_POST["ciudad"]);
		$direccion   	= sanitize_text_field($_POST["direccion"]);
		$pais   		= sanitize_text_field($_POST["pais"]);
		$division   	= sanitize_text_field($_POST["division"]);
		$suscribirse   	= sanitize_text_field($_POST["suscribirse"]);
		$texto   		= sanitize_text_field($_POST["texto"]);

		# VALIDACION
		if ( (strlen($nombre) > 0) AND (strlen($apellido) > 0) AND (strlen($email) > 0) AND (strlen($telefono) > 0) )
		{
			# PROCESO DE ENVIO DE CORREO
			$subject = 'Formulario para Contacto Empresa Seijiro Yazawa Iwai en Español';

			$message = 'Nombre: '.$nombre.' Apellido: '.$apellido."\r\n";
			$message.= 'Email: '.$email."\r\n";
			$message.= 'Teléfono: '.$telefono."\r\n";
			$message.= 'Fax: '.$fax."\r\n";
			$message.= 'Empresa: '.$empresa."\r\n";
			$message.= 'Dirección: '.$direccion."\r\n";
			$message.= 'País: '.$pais.' Ciudad: '.$ciudad."\r\n";
			$message.= 'División: '.$division."\r\n";
			$message.= 'Suscríbame a la revista electrónica: '.$suscribirse."\r\n";
			$message.= 'Comentarios o Sugerencias: '.$texto."\r\n";

			// If email has been process for sending, display a success message info@seijiroyazawaiwai.com,
			if ( wp_mail( 'info@seijiroyazawaiwai.com', $subject, $message ) ) {
				echo '<br /><br /><div class="alert alert-success" role="alert">'._e( 'Gracias por contactarnos.', 'syi_plugin' ).'</div>';
			} else {
				echo '<br /><br /><div class="alert alert-danger" role="alert">'._e( 'Error al enviar correo', 'syi_plugin' ).'</div>';
			}

		} else {
			echo '<br /><br /><div class="alert alert-danger" role="alert">'._e( 'Los campos Apellidos, Nombres, E-mail y Teléfono son requeridos', 'syi_plugin' ).'</div>';
		}

	}
}
?>