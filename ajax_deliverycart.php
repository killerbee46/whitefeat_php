<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 


$msg = mysqli_real_escape_string($con, $_POST['msg']);

	$sql = "update `whitefeat_wf_new`.`cart_book` set name='".$_POST['name']."', cno='".$_POST['number']."', msg='$msg', address='".$_POST['address']."'  where cookie_id='".$GLOBALS['cookid']."' and c_id='".$GLOBALS['customer']."' and checkout='0' ";
	mysqli_query($con,$sql);


}
?>