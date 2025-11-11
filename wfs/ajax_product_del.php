<?php include('db_connect.php');

$id=$_POST['d1'];


$sqlu5="DELETE from `whitefeat_wf_new`.`package` WHERE id_pack='$id'";
mysqli_query($con,$sqlu5);


?>