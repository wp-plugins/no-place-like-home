<?php
/*
Plugin Name: No Place Like Home
Plugin URI: http://sillybean.net/code/no-place-like-home/
Description: Displays a small home icon next to the designated home page under <a href="edit-pages.php">Manage &rarr; Pages</a>.
Author: Stephanie Leary
Version: 1.3
Author URI: http://sillybean.net/
*/ 

/*
CHANGELOG:

1.3: WP 3.1 compatibility
1.2: WP 2.7 compatibility	
1.1: WP 2.6 compatibility
*/

function no_place_like_home_css() {
	if (get_option('show_on_front') == "page") {
		$pageID = get_option('page_on_front');
		
		// Pre-2.6 compatibility
		if ( !defined('WP_CONTENT_URL') )
			define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
		// Guess the location
		$plugin_path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
		
		echo '<style type="text/css">';
		
		if (function_exists('user_can')) {
			// 3.1
			echo 'tr#post-'.$pageID.' a.row-title { background: url('.$plugin_path.'/home.png) top left no-repeat; padding-left: 20px; }';
		}
		elseif (function_exists('get_search_form')) {
		 	// 2.7
		 	echo 'tr#page-'.$pageID.' a.row-title { background: url('.$plugin_path.'/home.png) top left no-repeat; padding-left: 20px; }';
		} 
		elseif (function_exists('add_meta_box')) {
		 	// 2.5 
		 	echo 'tr#page-'.$pageID.' a.row-title { background: url('.$plugin_path.'/home.png) center left no-repeat; }';
			echo 'a.row-title { padding-left: 19px; margin-left: -19px; display: block; }';
			echo '*:first-child+html a.row-title { margin-left: -10px; /* for IE7 only */ }';
		} else {
		 	// 2.3 
		 	echo 'tr#page-'.$pageID.' th { background: url('.$plugin_path.'/home.png) center left no-repeat; }';
		} 		
		echo '</style>';
	}
}

add_action('admin_head', 'no_place_like_home_css', 100);

?>