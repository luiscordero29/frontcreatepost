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

	include_once( 'includes/view.php' ); 
	include_once( 'includes/model.php' ); 

	function front_create_post_controller() {
		ob_start();
		front_create_post_model();
		front_create_post_view();
		return ob_get_clean();
	}

	add_shortcode( 'front_create_post', 'front_create_post_controller' );