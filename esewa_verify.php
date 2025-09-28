<!DOCTYPE html>
<html lang="en">
<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 

$sql = "update `whitefeat_wf_new`.`cart_book` set esewa_verify='1' where esewa_code='".$_GET['id']."'";
  mysqli_query($con,$sql);


   }
  ?>

	 
</html>