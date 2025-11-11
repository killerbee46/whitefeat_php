<?php {
$customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); 

$add=$_POST['address'];
$add = mysqli_real_escape_string($con, $add);

$sql = "update `whitefeat_wf_new`.`customer` set name='".$_POST['name']."' , address='".$_POST['address']."', email='".$_POST['email']."', pass='".$_POST['pass']."' where c_id='".$GLOBALS['customer']."' ";
mysqli_query($con,$sql);
//$idi = mysqli_insert_id($con);

// sms to cusomer if needed


}
?>