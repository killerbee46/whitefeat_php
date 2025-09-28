<?php
include_once('db_connect.php');
$val=$_POST['val']; 
$id=$_POST['id']; 
$sql="UPDATE `whitefeat_wf_new`.`currency` SET cur_rate='$val' where cur_id='$id'";
mysqli_query($con,$sql);
?>