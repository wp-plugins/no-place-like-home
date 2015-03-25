<?php
/*
Plugin Name: No Place Like Home
Plugin URI: http://sillybean.net/code/no-place-like-home/
Description: Displays small icons next to the home page and posts page in the Edit Pages list.
Author: Stephanie Leary
Version: 1.5
Author URI: http://sillybean.net/
*/ 


function no_place_like_home_css() {
	if ( get_option( 'show_on_front' ) !== 'page' ) 
		return;
		
	$pageid = get_option( 'page_on_front' );
	$postsid = get_option( 'page_for_posts' );
	
	printf( '<style type="text/css">
		#post-%d a.row-title:before { 
			content: "\f102";
			display: inline-block;
			-webkit-font-smoothing: antialiased;
			font: normal 18px/1 "dashicons";
			vertical-align: top; }
		#post-%d a.row-title:before { 
			content: "\f109";
			display: inline-block;
			-webkit-font-smoothing: antialiased;
			font: normal 18px/1 "dashicons";
			vertical-align: top; }
		</style>', $pageid, $postsid );
}

add_action( 'admin_head', 'no_place_like_home_css' );