<?php
include_once('db_connect.php');
$st=$_POST['s_tit'];
$sql="INSERT INTO `whitefeat_wf_new`.`header_flash` (`hf_id`, `hf_text`, `hf_order`, `visible`) VALUES 
(NULL, '$st', '', '0');";
mysqli_query($con,$sql);
?>
