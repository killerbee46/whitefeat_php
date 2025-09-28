<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 

	$sql = "update `whitefeat_wf_new`.`cart_detail` set qty='".$_POST['qty']."' where cart_id='".$_POST['cartid']."' ";
	mysqli_query($con,$sql);


}
?>