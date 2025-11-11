<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); 




$sql="DELETE from `wishlist` where cookie_id='".$GLOBALS['cookid']."' and id_pack='".$_POST['idp']."'";
mysqli_query($con,$sql);
//$idi = mysqli_insert_id($con);

// sms to cusomer if needed


}
?>