<?php
//function wp_mail()
//{
 //    Do nothing!
//}

error_reporting(0);
//include_once('../wp-includes/option.php');
require_once('../../../../wp-config.php');
include 'gen-file.php';

//Posted files
$files = $_FILES["uploaded_file"];
$membership_slug = $_POST["mem_slg"];
$post = $_POST;


$file = checkFile($files);


if($file){

$tmpname = $file['tmp_name'];
//Convert CSV to array
$csv = array_map('str_getcsv', file($tmpname));

//Remove first row in CSV Array
$csv = array_splice($csv, 1);

convert_to_csv($csv, $membership_slug);
	}else{

$url = get_site_url().'/wp-admin/options-general.php?page=aweber-csv-format';
header( 'Location:'.$url ) ;
		}
