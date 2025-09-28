<?php include('db_connect.php');

$id=$_POST['d1'];


$sqlu5="Delete from `whitefeat_wf_new`.`tags` WHERE tag_id='$id'";
mysqli_query($con,$sqlu5);


?>