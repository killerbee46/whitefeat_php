<?php include('db_connect.php');

$id=$_POST['d1'];


$sqlu5="Delete from `whitefeat_wf_new`.`package_category` WHERE cat_id='$id'";
mysqli_query($con,$sqlu5);


?>