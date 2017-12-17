<?php
/**
 * Plugin Name: HempPassion
 * Plugin URI: http://hemppassion.com.uy
 * Description: Herramientas para el sitio del Grow HempPassion.
 * Version: 1.0
 * Author: Lakhai
 * Author URI: https://lakhai.github.io
 * License:     GNU General Public License v2.0 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
 add_action( 'admin_menu', 'add_options_pages' );
 function add_options_pages() {
 	require_once("menu_pages.php");

 	add_menu_page(
     'Hemp Passion',
     'Hemp Passion',
     'manage_options',
     'comag_members',
     'render_users_index',
 		 'dashicons-clipboard'
 	);

 	add_submenu_page(
 		'comag_members',
 		'Productos',
 		'Productos',
 		'manage_options',
 		'comag_add_product',
 		'render_users_product'
 	);

 	// add_submenu_page(
 	// 	'comag_members',
 	// 	'Batch',
 	// 	'Batch',
 	// 	'manage_options',
 	// 	'comag_batch_product',
 	// 	'batch_data'
 	// );
 }
