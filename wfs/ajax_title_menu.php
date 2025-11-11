<?php
include('db_connect.php');
$g1=$_POST['sta'];
$g2=$_POST['tid'];
if($g1==0)
 {
  $csql="UPDATE `whitefeat_wf_new`.`menu2` SET main_vis='1' WHERE m_id='$g2'";
  mysqli_query($con,$csql);
 }
else 
 {
  $csql="UPDATE `whitefeat_wf_new`.`menu2` SET main_vis='0' WHERE m_id='$g2'";
   mysqli_query($con,$csql);
 }
?>