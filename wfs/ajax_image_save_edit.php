<?php 
include('db_connect.php');
include('image_cache.php');


$id=$_POST['pval'];

$vid=$_POST['addvid'];

$sql2="UPDATE `whitefeat_wf_new`.`package` SET p_vpath='$vid' WHERE id_pack='$id'";
mysqli_query($con,$sql2); 

// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "../assets/images/product/";
$upload_location_thumb = "../assets/images/product/thumb/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

	if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){

    	// File name
    	$filename = $_FILES['files']['name'][$index];
		$tmpp = explode(".",  $_FILES['files']['name'][$index]);
        $filename = time().round(microtime(true)).'.'.end($tmpp);

    	// Get extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Valid image extension
        $valid_ext = array("png","jpeg","jpg","gif");

        // Check extension
        if(in_array($ext, $valid_ext)){
			
			
        	// File path
        	$path = $upload_location.$filename;


			  
			  

             
            // Upload file
    		if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
    			//$files_arr[] = $path;
				$dest=$upload_location_thumb;
			  $dest.=$filename;
			  icut($path, $dest, 550, false);
			  
			  $sql="INSERT INTO `whitefeat_wf_new`.`package_slider` 
			  (`s_id`, `id_pack`, `s_path`, `visible`, `thumb`) 
			  VALUES 
			  (NULL, '$id', '$filename', '1', '$filename');";
			  mysqli_query($con,$sql);
			  	
    		} // close upload 
			
        } // close extension
		
		
    } // isset
	
		$tmpp='';	   	
} // for main loop

echo json_encode($files_arr);
die;
