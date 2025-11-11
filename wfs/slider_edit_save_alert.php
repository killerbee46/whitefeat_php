<?php
include_once('db_connect.php');
$id=$_POST['hvid'];

$st=$_POST['n_tit'];
$st = mysqli_real_escape_string($con, $st);
$sql2="UPDATE `whitefeat_wf_new`.`header_flash` SET hf_text='$st' where hf_id='".$id."'";
mysqli_query($con,$sql2);
?>
