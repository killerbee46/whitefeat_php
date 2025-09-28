<?php
include('db_connect.php');
$id=$_POST['hvid'];
if(isset($_FILES['myfilecss']))
{
	if($_FILES['myfilecss']['tmp_name']!='')
	{
$sourcePath = $_FILES['myfilecss']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["myfilecss"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/slider/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file
$sql="UPDATE `whitefeat_wf_new`.`slider` SET s_path='$newfilename' where s_id='".$id."'";
mysqli_query($con,$sql);
   } 
}

$st=$_POST['n_tit'];
$sd=$_POST['n_des'];
$sl=$_POST['n_pack_sel'];
$sl2=$_POST['n_pack_sel_title'];
$sl3=$_POST['n_hyper_link']; 


$sql2="UPDATE `whitefeat_wf_new`.`slider` SET s_title='$st', package_link='$sl', category_link='$sl2', hyper_link='$sl3' where s_id='".$id."'";
echo $sql2;
mysqli_query($con,$sql2);

?>
