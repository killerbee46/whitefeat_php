<?php 
 $customer='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 
 if($GLOBALS['customer']==0){
	 $sql="UPDATE `whitefeat_wf_new`.`cookie_status` set cookie_currency='".$_GET['val']."' WHERE cookie_id='".$_COOKIE['wfjewel']."'";
     mysqli_query($con,$sql);
 }
 else{
	 
	  $sql="UPDATE `whitefeat_wf_new`.`customer` set cur_id='".$_GET['val']."' WHERE c_id='".$GLOBALS['customer']."'";
     mysqli_query($con,$sql);
	 
 }
 


?>