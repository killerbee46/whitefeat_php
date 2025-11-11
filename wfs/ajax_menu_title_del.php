<?php
include_once('db_connect.php');
$gv=$_POST['i_id1'];
$sql="DELETE from `whitefeat_wf_new`.`title_menu` WHERE tm_id='$gv'";
mysqli_query($con,$sql);
?>