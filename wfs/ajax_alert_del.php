<?php
include_once('auth.php');
include_once('db_connect.php');
$gv=$_POST['i_id1']; 
$sql="Delete from `whitefeat_wf_new`.`header_flash` WHERE hf_id='$gv'"; 
mysqli_query($con,$sql);
?>