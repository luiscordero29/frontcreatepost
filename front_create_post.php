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
			$title    		= trim(sanitize_text_field($_POST["title"]));
			$description   	= sanitize_text_field($_POST["description"]);
			
			# vars database
			$user_id 		= get_current_user_id();

			$post = 
				array(
					'post_title'    => $title,
					'post_content'  => $description,
					'post_excerpt'  => $description,
					'post_status'   => 'draft',
					'post_author'   => $user_id,
				);
			$post_id = wp_insert_post( $post );
			echo $post_id;
			wp_die();
	  	}
	}

	include( 'includes/view.php' ); 
	function front_create_post_controller() {
		ob_start();
		front_create_post_view();
		return ob_get_clean();
	}
	add_shortcode( 'front_create_post', 'front_create_post_controller' );