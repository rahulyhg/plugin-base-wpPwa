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

class PluginBase {

  public function __construct() {
		$this->define_admin_hooks();
  }
  

	private function define_admin_hooks() {
		add_action( 'admin_menu', array($this, 'pluginMenu')  );
	}

	
	function pluginMenu() {

		$plugins_url 	= 'plugin-base-megafono/includes/';
		$plgPg 				= ''.$plugins_url.'pluginPage.php';
		$plgSubPg1 		= ''.$plugins_url.'plgSubPg1.php';

		add_menu_page( 
		'Megafono Plugin',  //Page title'
		'Megafono Plugin', //'Top-level menu title', 
		'manage_options', //'manage_options'
		$plgPg,  //or 'options.php' //this have tu be in submenu too
		'', 
		'dashicons-megaphone' //icon
		);

		add_submenu_page(
		$plgPg,    //or 'options.php'
		'', //Page title'
		'Info', //tab Title
		'manage_options',
		'Megafono-submenu-page', //Page title'
		'books_ref_page_callback' ); //callback

	}



}

//If class exist call class from variable
if(class_exists( 'PluginBase'))
{	
	$megafonoPlugin = new PluginBase(); 
}

function books_ref_page_callback() { 
	?>
	<div class="wrap">
		<div class="card">
		<h2 class="dashicons-before dashicons-megaphone">Megafono</h2>
		<p>Helpful stuff here</p>
		</div>
	</div>
	<?php
}