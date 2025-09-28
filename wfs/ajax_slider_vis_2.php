<?php
include_once('db_connect.php');
$gv=$_POST['i_id1'];
$g1=$_POST['v_id1'];
if($g1==0)
{$g1=1;}
else
{$g1=0;} 
$sql="UPDATE `whitefeat_wf_new`.`menu2` SET visible='$g1' WHERE m_id='$gv'";
mysqli_query($con,$sql);
?>