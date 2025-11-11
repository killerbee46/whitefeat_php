<?php
include('db_connect.php');
//include('image_cache.php');

$g1=$_POST['cat_name'];
$id=$_POST['catval'];
/*
$g2=$_POST['cat_video'];


if(isset($_FILES['itemimg']) && $_FILES['itemimg']['name']!= ''){
$sourcePath = $_FILES['itemimg']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["itemimg"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/category/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file



$destination = "../assets/images/category/icon/".$newfilename; // Target path where file is to be stored			  
			  icut($targetPath, $destination, 60, false);



$sql2="UPDATE `whitefeat_wf_new`.`package_category` SET cat_pic='$newfilename', cat_menu_icon='$newfilename'  WHERE cat_id='$id'";
mysqli_query($con,$sql2); 

}
*/

	
	$sql2="UPDATE `whitefeat_wf_new`.`tags` SET tag_name='$g1' WHERE tag_id='$id'";
mysqli_query($con,$sql2); 

		?>