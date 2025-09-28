<?php

include_once('auth.php');
include_once('db_connect.php');
$gv=$_POST['i_id1']; 
$sql="Update `whitefeat_wf_new`.`video` set v_path='$gv' WHERE v_id='1'";
mysqli_query($con,$sql);

?>