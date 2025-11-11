<?php
include('db_connect.php');
$g1=$_POST['customer_name'];
$g2=$_POST['exp'];
$g3=$_POST['message'];
//$grt=$_POST['rv_msg_title'];
//$grt = mysqli_real_escape_string($con, $grt);
//$g7=$_POST['rv_sel_room'];
//$g8=$_POST['rv_ttype'];
//$g9=$_POST['cid'];
//$g10=$_POST['iid'];
//$gid=$_POST['packid'];
//$cip=$_SERVER['REMOTE_ADDR'];
$g3 = mysqli_real_escape_string($con, $g3); 
$idi='';
if($g2!='0' && $g3!='')
{
 
$csql1 = "INSERT INTO `whitefeat_wf_new`.`testimonials` (`id_t`, `i_path`, `content_t`, `name_t`, `t_vis`, `id_pack`, `star`) VALUES 
(NULL, '', '$g3', '$g1', '', '', '$g2');";   
mysqli_query($con,$csql1);
}
$idi = mysqli_insert_id($con);

//routemap update from file if isset
if($_FILES['rv_travel_file']['name']!="")
{
$sourcePath = $_FILES['rv_travel_file']['tmp_name'];
$tmpp = explode(".", $_FILES["rv_travel_file"]["name"]);
$newfilename = time().round(microtime(true)).'.'.'jpg';
$targetPath = "../assets/images/testinomial/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file
$sql="UPDATE `whitefeat_wf_new`.`testimonials` SET i_path='".$newfilename."' WHERE id_t='$idi'";
mysqli_query($con,$sql);
}
?>