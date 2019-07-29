<?php
/**
 * @package    plugin-base-megafono
 */
/*
		@wordpress-plugin
		Plugin Name:       elMegafono
		Plugin URI:        mariolafuente.com
		Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
		Version:           1.0.0
		Author:            mariolafuente.com
		Author URI:        mariolafuente.com
		License:           GPL-2.0+
		License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

		Copyright YEAR PLUGIN_AUTHOR_NAME (email : admin@mariolafuente.com)
		(Plugin Name) is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 2 of the License, or
		any later version.

		(Plugin Name) is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
		GNU General Public License for more details.

*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {die;}





class MegafonoPluging
{
	function __construct(){
		$this->load_dependencies();
	}
	function activate(){
	 flush_rewrite_rules( );
	}

	function deactivate(){
	//flush  delete CPT
	flush_rewrite_rules( );
	}

	function uninstall(){
		//delete CPT and data from db

	}

	function load_dependencies() {
			require plugin_dir_path( __FILE__ ) . '/includes/pluginBase.php';

	}

}


//If class exist call class from variable
if(class_exists( 'MegafonoPluging'))
{	
	$megafonoPlugin = new MegafonoPluging(); 
}




	// function wp_enqueue_style(){
	// 	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-base-client-public.css', array(), $this->version, 'all' );
	// }







//Activation
register_activation_hook(__File__, array($megafonoPlugin, 'activate'));


//deactivation
register_deactivation_hook(__File__, array($megafonoPlugin, 'deactivate'));


//Unistall

