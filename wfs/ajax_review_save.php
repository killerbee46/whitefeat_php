<?php
include_once('session_control.php');
include('db_connect.php');
$g1=$_POST['mess'];
$gx=$_POST['review_id'];
$g1 = mysqli_real_escape_string($con, $g1);
$gn=$_POST['rv_name'];
$gstar=$_POST['exp'];
$csql="UPDATE `whitefeat_wf_new`.`testimonials` SET content_t='$g1', name_t='$gn', star='$gstar' WHERE id_t='$gx'";
mysqli_query($con,$csql);


//routemap update from file if isset
if($_FILES['travel_photo']['name']!="")
{
$sourcePath = $_FILES['travel_photo']['tmp_name'];
$tmpp = explode(".", $_FILES["travel_photo"]["name"]);
$newfilename = time().round(microtime(true)).'.'.'jpg';
$targetPath = "../assets/images/testinomial/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file
$sql="UPDATE `whitefeat_wf_new`.`testimonials` SET i_path='".$newfilename."' WHERE id_t='$gx'";
mysqli_query($con,$sql);
}
?>