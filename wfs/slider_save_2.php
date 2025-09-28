<?php
include_once('db_connect.php');

$sourcePath = $_FILES['myfilecss']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["myfilecss"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/menu/image_icon/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file

$st=$_POST['s_tit'];
$sl=$_POST['pack_sel'];
$sl2=$_POST['pack_sel_title']; 
$sl3=$_POST['hyper_link'];

$sql="INSERT INTO `whitefeat_wf_new`.`menu2` (`m_id`, `m_order`, `m_name`, `m_title`, `m_pack`, `m_external`, `visible`, `image_icon`, `main_vis`, `m_pic`, `m_vid`) 
VALUES (NULL, '', '$st', '$sl2', '$sl', '$sl3', '1', '$newfilename', '0', '', '');";
mysqli_query($con,$sql);
?>
