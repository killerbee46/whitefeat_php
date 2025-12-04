<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include 'header-functions.php';


$id_pack=$_POST['pid'];
$ssize=$_POST['size'];
$idi=0;

//checking cart for cookie & customer id



      $sqlft = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='".$GLOBALS['cookid']."' and c_id='".$GLOBALS['customer']."' and checkout='0' "; 
      $displayft=mysqli_query($con,$sqlft); 
	  $countft=mysqli_num_rows($displayft);
	  if($countft>0){
		  $rowft=mysqli_fetch_array($displayft);
		  
		  $sqlft2 = fetchProduct($id_pack); 
      $displayft2=mysqli_query($con,$sqlft2); 
	  $rowft2=mysqli_fetch_array($displayft2);
		$newprice=$rowft2['final_price'];
		
		if($GLOBALS['customer']!=0){
	  $sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='".$GLOBALS['customer']."'"; 
      $displayb2b=mysqli_query($con,$sqlb2b);
	  $rowb2b=mysqli_fetch_array($displayb2b);
	   if($rowb2b['b2b']==1){
		   $b2b_check=1;
		  $newprice=$rowft2['final_price_b2b']; 
	   }
	   
	   }
			
			
			
			
			$sql2="INSERT INTO `cart_detail` (`cart_id`, `cb_id`, `id_pack`, `qty`, `rate`, `cost`, `color`, `size`, `p_name`) VALUES 
			(NULL, '".$rowft['cb_id']."', '$id_pack', '1', '$newprice', '', '', '$ssize', '".$rowft2['p_name']."');";
			mysqli_query($con,$sql2);
			
	  }
	  else{
		  
		  $sql="INSERT INTO `cart_book` (`cb_id`, `cookie_id`, `name`, `cno`, `email`, `msg`, `address`, `book_date`, `ip`, `mode`, `p_id`, `tracking_code`, `dispatch`, `deliver`, `checkout`, `c_id`) VALUES 
		  (NULL, '".$GLOBALS['cookid']."', '', '', '', '', '', CURRENT_TIMESTAMP, '', '', '', '', '0', '0', '0', '".$GLOBALS['customer']."');";
		   mysqli_query($con,$sql);
	       $idi = mysqli_insert_id($con);
		  
	  $sqlft2 = fetchProduct($id_pack); 
      $displayft2=mysqli_query($con,$sqlft2); 
	  $rowft2=mysqli_fetch_array($displayft2); 
		$newprice=$rowft2['final_price'];
			
			if($GLOBALS['customer']!=0){
	  $sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='".$GLOBALS['customer']."'"; 
      $displayb2b=mysqli_query($con,$sqlb2b);
	  $rowb2b=mysqli_fetch_array($displayb2b);
	   if($rowb2b['b2b']==1){
		   $b2b_check=1;
		  $newprice=$rowft2['final_sprice_b2b']; 
	   }
	   
	   }
			
			$sql2="INSERT INTO `cart_detail` (`cart_id`, `cb_id`, `id_pack`, `qty`, `rate`, `cost`, `color`, `size`, `p_name`) VALUES 
			(NULL, '$idi', '$id_pack', '1', '$newprice', '', '', '$ssize', '".$rowft2['p_name']."');";
			mysqli_query($con,$sql2);
			
		  
		  
		  
	  }
	  
	 
// sms to cusomer if needed


}
?>