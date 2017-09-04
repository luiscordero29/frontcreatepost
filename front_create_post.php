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

	include( 'includes/view.php' ); 
	include( 'includes/model.php' ); 

	function front_create_post_controller() {
		ob_start();
		front_create_post_model();
		front_create_post_view();
		return ob_get_clean();
	}

	add_shortcode( 'front_create_post', 'front_create_post_controller' );

	add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );
	function ajax_test_enqueue_scripts() {
		wp_enqueue_script( 'post', plugins_url( '/includes/post.js', __FILE__ ), array('jquery'), '1.0', true );
	}