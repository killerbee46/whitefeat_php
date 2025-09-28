<?php
include_once('db_connect.php');
$id=$_POST['hvid'];
if(isset($_FILES['myfilecss']))
{
	if($_FILES['myfilecss']['tmp_name']!='')
	{
$sourcePath = $_FILES['myfilecss']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["myfilecss"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/menu/image_icon/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file
$sql="UPDATE `whitefeat_wf_new`.`menu2` SET image_icon='$newfilename' where m_id='".$id."'";
mysqli_query($con,$sql);
   }
}
$st=$_POST['n_tit'];
$sl=$_POST['n_pack_sel'];
$sl2=$_POST['n_pack_sel_title'];
$sl3=$_POST['n_hyper_link'];
$sql2="UPDATE `whitefeat_wf_new`.`menu2` SET m_name='$st', m_title='$sl2', m_pack='$sl', m_external='$sl3' where m_id='".$id."'";
mysqli_query($con,$sql2);
?>
