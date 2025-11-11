<?php 
$customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 
  
	$data = explode('-', $_GET['title']);
$stmt = $con->prepare("select * from `whitefeat_wf_new`.`customer` where phone=?");
$stmt->bind_param("s",$data[1]);
$stmt->execute();
$result = $stmt->get_result();

   $row = $result->fetch_assoc();
if($row['otp']==$data[0]) 
{echo $row['name'].'-'.$row['phone'].'-'.$row['address'];
	
	$sql = "update `whitefeat_wf_new`.`cookie_status` set cookie_user='".$row['c_id']."' where cookie_id='".$_COOKIE['wfjewel']."' ";
	mysqli_query($con,$sql);
	
	
	  //update on cart table
	  $sqlft2 = "Select * from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$GLOBALS['cookid']."' "; 
      $displayft2=mysqli_query($con,$sqlft2); 
	  $rowft2=mysqli_fetch_array($displayft2);
	  
	  $sql2 = "update `whitefeat_wf_new`.`cart_book` set c_id='".$row['c_id']."', cur_id='".$rowft2['cookie_currency']."' where cookie_id='".$GLOBALS['cookid']."' and checkout='0' ";
	  mysqli_query($con,$sql2);
	  
	
}
else{echo'0';}      
	  

?>