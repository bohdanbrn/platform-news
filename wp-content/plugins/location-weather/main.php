<?php
/*
Plugin Name: Location Weather
Description: This plugin will enable Weather in your WordPress site.
Plugin URI: http://shapedplugin.com/plugin/location-weather-pro
Author: ShapedPlugin
Author URI: http://shapedplugin.com
Version: 1.0
*/


/* Define */
define( 'SP_LOCATION_WEATHER_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'SP_LOCATION_WEATHER_PATH', plugin_dir_path( __FILE__ ) );


/* Including files */
require_once("inc/scripts.php");
require_once("inc/widget.php");


