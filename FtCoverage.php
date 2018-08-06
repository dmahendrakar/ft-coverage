<?php
/*
Plugin Name: FtCoverage
Plugin URI:  http://link to your plugin homepage
Description: This plugin replaces words with your own choice of words.
Version:     1.0
Author:      Deepak Mahendrakar
Author URI:  http://link to your website
License:     GPL2 etc
License URI: https://link to your plugin license
*/

include 'c3.php';

class Mirror {
	function reflect(\WP_REST_Request $request){
		return new \WP_REST_Response( strrev($request->get_param('value')), 200, [] );
	}
}

add_action('rest_api_init', function() {
	register_rest_route('/test', '/reflect', [
		'methods'  => 'GET',
		'callback' => [new Mirror(), 'reflect'],
	]);
});

?>