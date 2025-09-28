<?php
include_once('auth.php');
include_once('db_connect.php');
$gv=$_POST['linkid'];
$g1=$_POST['newlink'];
$sql="UPDATE `whitefeat_wf_new`.`links` SET l_add='$g1' WHERE l_id='$gv'";
mysqli_query($con,$sql);
?>