<?php
/*
Plugin Name: Front Create Post
Plugin URI: https://github.com/luiscordero29/frontcreatepost
Description: Front Create Post WordPress
Version: 0.01
Author: Luis Cordero
Author URI: http://luiscordero29.com/
*/

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
	
	# script  ajax
	add_action( 'wp_enqueue_scripts', 'assets_scripts' );
	function assets_scripts() {
		wp_enqueue_script( 'script', plugins_url( '/includes/script.js', __FILE__ ), array('jquery'), '1.0', true );
	}
	# custom style
	add_action( 'wp_enqueue_scripts', 'assets_styles' );
	function assets_styles() {
		wp_enqueue_style( 'style', plugins_url( '/includes/style.css', __FILE__ ) );
	}

	add_action( 'wp_ajax_action_front_create_post', 'ajax_action_front_create_post' );
	add_action( 'wp_ajax_nopriv_action_front_create_post', 'ajax_action_front_create_post' );

	function ajax_action_front_create_post() {
	  	if( isset( $_POST[ 'send' ] ) ) {		    
		    # vars post
			$escort    		= trim(sanitize_text_field($_POST["escort"]));
			$ville    		= trim(sanitize_text_field($_POST["ville"]));
			$title    		= trim(sanitize_text_field($_POST["title"]));
			$iam    		= trim(sanitize_text_field($_POST["iam"]));
			$isearch    	= trim(sanitize_text_field($_POST["isearch"]));
			$age    		= trim(sanitize_text_field($_POST["age"]));
			$description   	= trim(sanitize_text_field($_POST["description"]));
			$name   		= trim(sanitize_text_field($_POST["name"]));
			$email   		= trim(sanitize_email($_POST["email"]));
			$phone_1   		= trim(sanitize_text_field($_POST["phone_1"]));
			$schedule_1   	= trim(sanitize_text_field($_POST["schedule_1"]));
			$phone_2   		= trim(sanitize_text_field($_POST["phone_2"]));
			$schedule_2   	= trim(sanitize_text_field($_POST["schedule_2"]));
			$expiration   	= trim(sanitize_text_field($_POST["expiration"]));
			$thisok   		= trim(sanitize_text_field($_POST["thisok"]));

			# vars database
			$user_id 		= get_current_user_id();
			$term_ville 	= get_term_by( 'slug', $ville , 'category');
			$term_escort 	= get_term_by( 'slug', $escort.'-'.$ville , 'category');

			$post = array(
			    'post_title'    => $title,
			    'post_content'  => $description,
			    'post_excerpt'  => $description,
			    'post_status'   => 'publish',
			    'post_author'   => $user_id,
			    'post_category' => array( $term_ville->term_id, $term_escort->term_id),
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
			if ($post_id != 0) {
				echo "OK";
			}else{
				echo "KO";
			}
			wp_die();
	  	}
	}

	add_action( 'wp_ajax_action_front_delete_post', 'ajax_action_front_delete_post' );
	add_action( 'wp_ajax_nopriv_action_front_delete_post', 'ajax_action_front_delete_post' );

	function ajax_action_front_delete_post() {
	  	if( isset( $_POST[ 'id' ] ) ) {		    
		    # vars post
			$id    		= trim(sanitize_text_field($_POST["id"]));
			wp_delete_post($id); 
			echo "OK";
	  	}else{
			echo "KO";
	  	}
		wp_die();
	}

	add_action( 'wp_ajax_action_front_delete_start', 'ajax_action_front_delete_start' );
	add_action( 'wp_ajax_nopriv_action_front_delete_start', 'ajax_action_front_delete_start' );

	function ajax_action_front_delete_start() {
	  	if( isset( $_POST[ 'id' ] ) ) {		    
		    # vars post
			$id    		= trim(sanitize_text_field($_POST["id"]));
			$user_id 		= get_current_user_id();
			delete_post_meta($id, 'start', $user_id);
			echo "OK";
	  	}else{
			echo "KO";
	  	}
		wp_die();
	}

	add_action( 'wp_ajax_action_front_start_post', 'ajax_action_front_start_post' );
	add_action( 'wp_ajax_nopriv_action_front_start_post', 'ajax_action_front_start_post' );

	function ajax_action_front_start_post() {
	  	if( isset( $_POST[ 'post_id' ] ) ) {		    
		    # vars post
			$post_id    		= trim(sanitize_text_field($_POST["post_id"]));
			$user_id    		= trim(sanitize_text_field($_POST["user_id"]));
			if ( ! add_post_meta( $post_id, 'start', $user_id, true ) ) { 
			   update_post_meta( $post_id, 'start', $user_id );
			}
			echo "OK";
	  	}else{
			echo "KO";
	  	}
		wp_die();
	}

	include( 'includes/view.php' ); 
	function front_create_post_controller() {
		ob_start();
		front_create_post_view();
		return ob_get_clean();
	}
	add_shortcode( 'front_create_post', 'front_create_post_controller' );


	function front_posts_controller() {
		ob_start();
		front_posts_view();
		return ob_get_clean();
	}
	add_shortcode( 'front_posts', 'front_posts_controller' );

	function front_start_controller() {
		ob_start();
		front_start_view();
		return ob_get_clean();
	}
	add_shortcode( 'front_start', 'front_start_controller' );