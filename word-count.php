<?php
/*

Plugin Name: Word Count
Plugin URI: https://nurictworld.com/plugin/word-count
Description: Count word from any wordpress post.
Version: 1.0
Author: Imran Hoshain
Author URI: https://facebook.com/iforuimran
License: GPLv2 or later
Text Domain: word-count
Domain Path: /languages/

*/

/*
function wordcount_activation_hook(){}
register_activation_hook(__FILE__,"wordcount_activation_hook");

function wordcount_deactivation_hook(){}
register_deactivation_hook(__FILE__,"wordcount_deactivation_hook");
*/

function wordcount_load_textdomain(){
	load_plugin_textdomain('word-count',false,dirname(__FILE__)."/languages/");
}
add_action('plugin_loaded','wordcount_load_textdomain');

function wordcount_count_words($content){
	$stripped_content = strip_tags($content);
	$word_length = str_word_count($stripped_content);
	$label = __("Total Word is: ",'word-count');
	$content .= sprintf('<h1>%s: %s</h1>',$label,$word_length);
	return $content;

}
add_filter('the_content','wordcount_count_words');