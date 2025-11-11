<?php
include('db_connect.php');
include('image_cache.php');

$g1=$_POST['img_num'];
 
if(isset($_FILES['itemimg']) && $_FILES['itemimg']['name']!= ''){
$sourcePath = $_FILES['itemimg']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["itemimg"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/banner5/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file

 

//$destination = "../assets/images/category/icon/".$newfilename; // Target path where file is to be stored			  
	//		  icut($targetPath, $destination, 60, false);

 
$sl=$_POST['pack_sel'];
$sl2=$_POST['pack_sel_title'];
$sl3=$_POST['hyper_link']; 

 
$sql2="UPDATE `whitefeat_wf_new`.`banner5` SET s_path='$newfilename', package_link='$sl', title_link='$sl2', hyper_link='$sl3' WHERE b_id='$g1'";
mysqli_query($con,$sql2); 

}

else{
	 
$sl=$_POST['pack_sel'];
$sl2=$_POST['pack_sel_title'];
$sl3=$_POST['hyper_link']; 
 
  
$sql2="UPDATE `whitefeat_wf_new`.`banner5` SET package_link='$sl', title_link='$sl2', hyper_link='$sl3' WHERE b_id='$g1'";
mysqli_query($con,$sql2); 
}

		?>