<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 


  $paym=$_POST['paym'];
  $tracking=time().round(microtime(true)).$GLOBALS['customer'];
  
  
      $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='".$GLOBALS['cookid']."' and c_id='".$GLOBALS['customer']."' and checkout='0' "; 
      $displayact=mysqli_query($con,$sql1act);
	  $rowact=mysqli_fetch_array($displayact);
	  
  $tdate=date('y-m-d');
  
      $sqlft2 = "Select * from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$GLOBALS['cookid']."' "; 
      $displayft2=mysqli_query($con,$sqlft2); 
	  $rowft2=mysqli_fetch_array($displayft2);
  
  
  $sql = "update `whitefeat_wf_new`.`cart_book` set tracking_code='".$tracking."', checkout='1', mode='$paym', p_date='$tdate', cur_id='".$rowft2['cookie_currency']."' where  cb_id='".$rowact['cb_id']."'";
  mysqli_query($con,$sql);

  echo $tracking.'-'.$rowact['cb_id'];
  
  //for QR
  include 'phpqrcode/qrlib.php';
  $location="qrimages/".$tracking.".png";
  $text="https://whitefeathersjewellery.com/bill/".$rowact['cb_id'];
  QRcode::png($text,$location);
  
 
  
  
  // for stock update
      $sql1uc = "Select * from `whitefeat_wf_new`.`customer` where c_id='".$GLOBALS['customer']."' "; 
      $displayuc=mysqli_query($con,$sql1uc);
	  $rowuc=mysqli_fetch_array($displayuc);
	  
	 
      $sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowact['cb_id']."'"; 
      $displayckp1=mysqli_query($con,$sqlckp1);
	  while($rowckp1=mysqli_fetch_array($displayckp1))
	  {
		   $sqlckp2 = "Select stock, stock_b2b from `whitefeat_wf_new`.`package` where id_pack='".$rowckp1['id_pack']."'"; 
           $displayckp2=mysqli_query($con,$sqlckp2);
	       $rowckp2=mysqli_fetch_array($displayckp2);
		   
		    if($rowuc['b2b']==0){
				$newstock=$rowckp2['stock']-$rowckp1['qty'];
		   $sql = "update `whitefeat_wf_new`.`package` set stock='".$newstock."' where id_pack='".$rowckp1['id_pack']."'";
           mysqli_query($con,$sql);
			}
		   else{
			   $newstock=$rowckp2['stock_b2b']-$rowckp1['qty'];
		   $sql = "update `whitefeat_wf_new`.`package` set stock_b2b='".$newstock."' where id_pack='".$rowckp1['id_pack']."'";
           mysqli_query($con,$sql);
			   
		   }
		   

	  }	
	  
  
}
?>