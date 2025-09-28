<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 




$sql="INSERT INTO `wishlist` (`cookie_id`, `c_id`, `id_pack`) VALUES ('".$GLOBALS['cookid']."', '', '".$_POST['idp']."');";

mysqli_query($con,$sql);

}
?>