<?php
/*
Plugin Name: No Place Like Home
Plugin URI: http://sillybean.net/code/no-place-like-home/
Description: Displays a small home icon next to the designated home page under <a href="edit-pages.php">Manage &rarr; Pages</a>.
Author: Stephanie Leary
Version: 1.4
Author URI: http://sillybean.net/
*/ 


function no_place_like_home_css() {
	if ( get_option( 'show_on_front' ) !== 'page' ) 
		return;
		
	$pageid = get_option('page_on_front');
	
	printf( '<style type="text/css">
		tr#page-%d td.page-title strong:before { 
			content: "\f102";
			display: inline-block;
			-webkit-font-smoothing: antialiased;
			font: normal 20px/1 "dashicons";
			vertical-align: top; }
		</style>', $pageid );
}

add_action( 'admin_head', 'no_place_like_home_css' );