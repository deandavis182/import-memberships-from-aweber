<?php



function checkFile($files){
	//check if file is empty or has an error.
	if((!empty($files)) && ($files['error'] == 0)) {
	$filename = basename($files['name']);
  	$ext = substr($filename, strrpos($filename, '.') + 1);
	if (($ext == "csv") && ($files["type"] == "text/csv") && ($files["size"] < 350000)) {
		return $files;

		}//else Report error with filetype
	}else{
		return false;
		}//else Report error uploading file
}




function convert_to_csv($input_array, $membership_slug, $output_file_name ="Memberships_to_Import.csv", $delimiter =","){
			$temp_memory = fopen('php://memory', 'w');

			$line = array('member_email','member_first_name','member_last_name','membership_plan_slug');
			fputcsv($temp_memory, $line, $delimiter);

			foreach ($input_array as $line) {

				$FL_name = explode(" ", $line[1]);

				$line = array($line[0],$FL_name[0],$FL_name[1],$membership_slug);
			// use the default csv handler


			fputcsv($temp_memory, $line, $delimiter);
			}

			fseek($temp_memory, 0);
			// modify the header to be CSV format
			header('Content-Type: application/csv');
			header('Content-Disposition: attachement; filename="'.$output_file_name.'";');
			// output the file to be downloaded
			fpassthru($temp_memory);

}



 ?>
