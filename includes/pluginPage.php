<?php

/**
 * @package    plugin-base-megafono
 */
/*
		@wordpress-plugin
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

class PluginPage {

  public function __construct() {
		myPage();
  }

}


//If class exist call class from variable
if(class_exists( 'PluginPage'))
{	
	$PluginPage = new PluginPage(); 
}


function myPage(){
  
  // variables for the field and option names 
	$confirmation_field_hiden = 'submit_hidden';

	$opt_name1 								= 'favorite_color';
	$data_field_name1	 				= 'favorite_color';

	$opt_name2 								= 'favorite_color2';
	$data_field_name2	 				= 'favorite_color2';

	$cantidadVariables 				=2;

	// Read in existing option value from database
	$opt_val1 = get_option( $opt_name1 );
	$opt_val2 = get_option( $opt_name2 );

	if( isset($_POST[ $confirmation_field_hiden ]) && $_POST[ 
		
		$confirmation_field_hiden ] == 'Y' ) {
		
			$opt_val1 	= $_POST[ $data_field_name1 ];
			$opt_val2  	= $_POST[ $data_field_name2 ];
			
			update_option( $opt_name1, $opt_val1 );
			update_option( $opt_name2, $opt_val2 );


			echo("
			<div class='updated'>
			<p><strong>Data Saved</strong></p>
			</div>");
}

  ?>
  

	
<div class="wrap">

<div class="card">
  
<h2 class="dashicons-before dashicons-megaphone">Megafono</h2>
  <p>If you want to convert your categories to tags,
  use the <a href="#">Categories and Tags Converter</a> available from the Import screen.</p>

  <form name="form1" method="post" action="">
    <input type="hidden" name="<?php echo $confirmation_field_hiden; ?>" value="Y">

		<hr />
		<input type="checkbox" name="<?php echo $data_field_name1; ?>" value="1" <?php checked( '1', $opt_val1 ); ?>> I have a bike<br>
		
		<hr />
		<input type="checkbox" name="<?php echo $data_field_name2; ?>" value="1" <?php checked( '1', $opt_val2); ?>> I have a bike<br>


    </p><hr />

    <p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
  </form>

  </div>



</div>


<?php
}