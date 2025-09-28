<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 


$id_pack=0;

if(isset($_POST['pid'])){
	$id_pack=$_POST['pid'];
}

$msg=$_POST['msg'];
$msg = mysqli_real_escape_string($con, $msg);

$sql="INSERT INTO `whitefeat_wf_new`.`inquiry` (`p_name`, `p_qn`, `dt_inquiry`, `p_address`, `ip`, `cno`, `c_id`, `id_pack`) 
VALUES ('".$_POST['name']."', '".$msg."', CURRENT_TIMESTAMP, '".$_POST['add']."', '', '".$_POST['phone']."', '".$GLOBALS['customer']."','$id_pack');";

mysqli_query($con,$sql);

}
?>