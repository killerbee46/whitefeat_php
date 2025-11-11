    <?php {  include('session_control.php'); include 'db_connect.php'; 

	           $query_cxx = "UPDATE `sunsaebn_ct`.`log_order` set status='1' where lo_id='".$_POST['iid']."'"; 
               $display_cxx = mysqli_query($con,$query_cxx);
			   
			   $sqlc1 = "INSERT INTO `sunsaebn_ct`.`tran_dp` (`tdp_id`, `dp_id`, `lo_id`, `status`, `admin_note`, `dp_note`, issuer) 
			   VALUES 
			   (NULL, '".$_POST['did']."', '".$_POST['iid']."', '0', '".$_POST['dtxt']."', '','".$_SESSION['u_id']."');"; 
mysqli_query($con,$sqlc1);

                 /*
                $query1x = "Select * from `sunsaebn_ct`.`tran` where tran_id='".$_POST['iid']."'"; 
		        $display1x = mysqli_query($con,$query1x);
                $row1x=mysqli_fetch_array($display1x);
			   
			   // email notification for msg. 
		        $msql1="Select * from `sunsaebn_ctw`.`product` where p_id='".$row1x['p_id']."'"; 
				$mdisplay1 = mysqli_query($con,$msql1);			
                $mrow1 = mysqli_fetch_array($mdisplay1);
				
	 $e_headers = "From: support@cityshopnepal.shopping \r\n";
     $e_headers .= "CC: adhikarikumar82@gmail.com \r\n";
     $e_headers .= "MIME-Version: 1.0\r\n";
     $e_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $message = '<html><body>';
     $message .= '<h3>Congratulations! Your product <b>'.$mrow1['name'].'</b> is in delivery process.</h3><hr>';
	 $message .= 'Your product is dispatched and our delivery person will contact and come soon at your place for delivery. <br>
	 <h4> Please save or print your invoice which is needed for <b>warranty</b> claims. </h4> <br><br> 
	 <a href="http://cityshopnepal.shopping/ctr.php?id='.$_POST['iid'].'"><button style="height:5em;padding:1em; font-size:1em;"> Save / Print Invoice </button></a><hr><br>
	 <br> <i>Thankyou for shopping with Cityshopnepal.shopping... <br>- Have a nice day ahead. </i><br>
	 ';
     $message .= '</body></html>';
     mail($row1x['cust_email'], "Invoice + Delivery Notification ", $message, $e_headers); 
			   
			  */ 
			   
			   
	}?>