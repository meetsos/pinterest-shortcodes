<?php

/*
Plugin Name: Pinterest Shortcode Buttons
Plugin URI: http://arkolakis.gr/pinterest-shortcode-buttons
Description: Adds two pinterest shortcode buttons (one for pins and another one for boards) to the visual editor.
Author: Dimitrios Arkolakis
*/

function enqueue_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["pinterest_button_plugin"] =  plugin_dir_url(__FILE__) . "pinterest.js";
    return $plugin_array;
}

add_filter("mce_external_plugins", "enqueue_plugin_scripts");

function register_buttons_editor($buttons)
{
    //register buttons with their id.
    array_push($buttons, "pinterest");
    return $buttons;
}

add_filter("mce_buttons", "register_buttons_editor");

// CREATE PINTEREST SHORTCODE
function pinterest_shortcode( $atts, $content = null ) {
	return '<a data-pin-do="embedPin" href="' . $content . '"></a><script async defer src="//assets.pinterest.com/js/pinit.js"></script>';
}
add_shortcode( 'pinterest', 'pinterest_shortcode' );

function enqueue_plugin_scripts2($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["pinboard_button_plugin"] =  plugin_dir_url(__FILE__) . "pinboard.js";
    return $plugin_array;
}

add_filter("mce_external_plugins", "enqueue_plugin_scripts2");

function register_buttons_editor2($buttons)
{
    //register buttons with their id.
    array_push($buttons, "pinboard");
    return $buttons;
}

add_filter("mce_buttons", "register_buttons_editor2");

// CREATE PINBOARD SHORTCODE
	function pinboard_shortcode( $atts, $src = null, $boardwidth = null, $scalewidth = null, $scaleheight = null ) {

	extract( shortcode_atts(
		array(
			'src' => '',
			'scalewidth' => '',
			'scaleheight' => '',
		), $atts )
	);

return '<div class="pinterestBoardWrapper">
	<div class="pinterestBoard">
	<a data-pin-do="embedBoard" href="' . $src . '" data-pin-scale-width="' . $scalewidth . '" data-pin-scale-height="' . $scaleheight . '"></a>
	</div>
	</div>';
}
add_shortcode( 'pinboard', 'pinboard_shortcode' );

// INCLUDE PINTEREST SCRIPT
function pinterest_js()
{ 
    wp_register_script( 'pinit', 'http://assets.pinterest.com/js/pinit.js', array(), null, false );
    wp_enqueue_script( 'pinit' );
}
add_action( 'wp_enqueue_scripts', 'pinterest_js' );

// INCLUDE RESPONSIVE CSS FROM CODENORRIS
function responsive_pinboard_style()
{
    wp_register_style( 'custom-style', plugins_url( '/responsive-pin.css', __FILE__ ), array(), null, 'all' );
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'responsive_pinboard_style' );
