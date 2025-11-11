<?php include('db_connect.php');

$id=$_POST['id'];


$sqlu5="Delete from `whitefeat_wf_new`.`package_slider` WHERE s_id='$id'";
mysqli_query($con,$sqlu5);


?>