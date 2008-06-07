<?php
/*
Plugin Name: No Place Like Home
Plugin URI: http://sillybean.net/code/no-place-like-home/
Description: Displays a small home icon next to the designated home page under <a href="edit-pages.php">Manage &rarr; Pages</a>.
Author: Stephanie Leary
Version: 1.0
Author URI: http://sillybean.net/
*/ 

function no_place_like_home_css() {
	if (get_option('show_on_front') == "page") {
		$pageID = get_option('page_on_front');
		$path = get_settings('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)) ;
		echo '<style type="text/css">';
		
		if (function_exists('add_meta_box')) {
		 	// 2.5 
		 	echo 'tr#page-'.$pageID.' a.row-title { background: url('.$path.'/home.png) center left no-repeat; }';
			echo 'a.row-title { padding-left: 19px; margin-left: -19px; display: block; }';
			echo '*:first-child+html a.row-title { margin-left: -10px; /* for IE7 only */ }';
		} else {
		 	// 2.3 
		 	echo 'tr#page-'.$pageID.' th { background: url('.$path.'/home.png) center left no-repeat; }';
		} 		
		echo '</style>';
	}
}

add_action('admin_head', 'no_place_like_home_css', 100);

?>