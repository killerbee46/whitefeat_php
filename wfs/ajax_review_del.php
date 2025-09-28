<?php
include_once('session_control.php');
include_once('db_connect.php');
$gv=$_POST['i_id1'];
$sql="Delete from `whitefeat_wf_new`.`testimonials` WHERE id_t='$gv'";
mysqli_query($con,$sql);
?>