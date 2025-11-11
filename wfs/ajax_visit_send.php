<?php include('db_connect.php');

$id=$_POST['d1'];


$sqlu5="Update `whitefeat_wf_new`.`inquiry` SET visit='1' WHERE inquiry_id='$id'";
mysqli_query($con,$sqlu5);


?>