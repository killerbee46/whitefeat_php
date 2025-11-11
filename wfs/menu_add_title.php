<?php
include('db_connect.php');
$g1=$_POST['title'];
$g2=$_POST['menu_id'];
$csql = "INSERT INTO `whitefeat_wf_new`.`title_menu` (`m_id`,`cat_id`) VALUES ('$g2','$g1');";    
mysqli_query($con,$csql);	


?>
 