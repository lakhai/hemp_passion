<?php
/**
 * Plugin Name: HempPassion
 * Plugin URI: http://hemppassion.com.uy
 * Description: Herramientas para el sitio del Grow Shop HempPassion.
 * Version: 1.0
 * Author: Lakhai
 * Author URI: https://lakhai.github.io
 * License:     GNU General Public License v2.0 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

 add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style( 'icofont', plugin_dir_url( __FILE__ ) . '/css/icofont.css' );
    wp_enqueue_style( 'weedalicious', plugin_dir_url( __FILE__ ) . '/css/weedalicious.css', [] );
    // wp_enqueue_script( 'namespaceformyscript', 'http://locationofscript.com/myscript.js', array( 'jquery' ) );
 });
