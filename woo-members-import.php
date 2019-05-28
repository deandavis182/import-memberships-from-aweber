<?php
/*
Plugin Name: Aweber to WooMemberships
Plugin URI: http://sapphirebd.com/
Version: 1.0
Author: Dean Davis
Description: This Plugin takes in lists from Aweber and returns a CSV file formatted to import into WooCommerce Memberships.
*/


$erMsg ="";



add_action( 'admin_menu', 'awebcsv_menu' );


function awebcsv_menu() {
	add_options_page( 'Aweber CSV Format Options', 'aweber-CSV-format', 'manage_options', 'aweber-csv-format', 'aweber_csv_menu_options' );
}


function aweber_csv_menu_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}





echo '<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';


echo'<div class="jumbotron">
  <h1> Hello!</h1>
  <p> This plugin formats CSV files from Aweber exports so that they can be used to import memberships into WooCommerce. This form will return a CSV file with the columns "member_email", "member_first_name", "member_last_name" and "membership_plan_slug", that you can then use to import into WooCommerce Memberships.</p>
</div>';



echo '<form class="form-horizontal" enctype="multipart/form-data" action="'.plugin_dir_url(__FILE__).'includes/uploads.php" method="post">
<fieldset>
<legend>Aweber list Format</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Membership Slug:</label>
  <div class="col-md-4">
		<input type="text" name="mem_slg" placeholder="Enter Membership Slug">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Upload Aweber List</label>
  <div class="col-md-4">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input id="filebutton" name="uploaded_file" class="input-file" type="file">
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" type="submit" class="btn btn-primary">Format CSV</button>
  </div>
</div>

</fieldset>
</form>

';

}
?>
