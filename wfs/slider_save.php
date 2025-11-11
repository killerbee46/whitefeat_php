<?php
include('db_connect.php');
$sourcePath = $_FILES['myfilecss']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["myfilecss"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/slider/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file
$st=$_POST['s_tit'];
//$sd=$_POST['s_desc'];
$sd="";
$sl=$_POST['pack_sel'];
$sl2=$_POST['pack_sel_title'];
$sl3=$_POST['hyper_link'];

$sql="INSERT INTO `whitefeat_wf_new`.`slider` (`s_id`, `s_path`, `status`, `visible`, `s_des`, `s_title`, `package_link`, `category_link`, `hyper_link`, `v_title`, `s_order`) 
VALUES (NULL, '$newfilename', '1', '0', '', '$st', '$sl', '$sl2', '$sl3', '', '');";

mysqli_query($con,$sql);

?>
