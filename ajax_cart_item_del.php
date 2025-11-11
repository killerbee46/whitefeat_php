<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 




$sql="DELETE from `cart_detail` where cart_id='".$_POST['cartid']."'";
mysqli_query($con,$sql);
//$idi = mysqli_insert_id($con);

// sms to cusomer if needed


}
?>