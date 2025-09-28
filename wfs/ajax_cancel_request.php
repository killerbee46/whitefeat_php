<?php include('db_connect.php');

$id=$_POST['d1'];


$sqlu5="Update `whitefeat_wf_new`.`cart_book` SET c_request='1' WHERE cb_id='$id'";
mysqli_query($con,$sqlu5);


?>