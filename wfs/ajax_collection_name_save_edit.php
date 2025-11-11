<?php
include('db_connect.php');
include('image_cache.php');

$g1=$_POST['cat_name'];
$g2=$_POST['cat_video'];
$id=$_POST['catval'];

//echo $g1.'-'.$g2.'-'.$id;

if(isset($_FILES['itemimg']) && $_FILES['itemimg']['name']!= ''){
$sourcePath = $_FILES['itemimg']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["itemimg"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/collection/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file


//$destination = "../assets/images/category/icon/".$newfilename; // Target path where file is to be stored			  
	//		  icut($targetPath, $destination, 60, false);


$sql2="UPDATE `whitefeat_wf_new`.`package_collection` SET pc_image='$newfilename' WHERE pc_id='$id'";
mysqli_query($con,$sql2); 

}

$sql3="UPDATE `whitefeat_wf_new`.`package_collection` SET pc_name='$g1', pc_vid='$g2' WHERE pc_id='$id'";
mysqli_query($con,$sql3); 

		?>