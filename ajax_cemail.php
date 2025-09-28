<?php 

  
    include('db_connect.php');
  
	
$stmt = $con->prepare("select * from `whitefeat_wf_new`.`customer` where phone=?");
$stmt->bind_param("s",$_GET['title']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) {echo '3-';}
else{
	$randomNumber = rand(5000,9000);
	  echo'v2_Nd8UndHle6pYCSWXvLjkjOChhNd.GIYi-'.$randomNumber;
      
	  $row = $result->fetch_assoc();
	  
	  
      //$randomNumber = $randomNumber.$row['c_id'];
	  
	  //send code in OTP code
	  
	  $sql2="UPDATE `whitefeat_wf_new`.`customer` SET otp='$randomNumber' WHERE c_id='".$row['c_id']."'";
      mysqli_query($con,$sql2);
	  
	  
	  
	  /*
	  if($row['pass']=='' && $row['email']==''){echo'2-';}
	  else{echo'1'.'-'.$row['email'];
	  //send email with new password
	  
	  $date = new DateTime();
      $npass=$date->getTimestamp();
	  $npass=$npass.$row['c_id'];
	  
	  $sql2="UPDATE `whitefeat_wf_new`.`customer` SET pass='$npass' WHERE c_id='".$row['c_id']."'";
      mysqli_query($con,$sql2);
	   
	 $e_headers = "From: support@easyjolly.com \r\n";
     //$e_headers .= "CC: shalikr.adhikari007@gmail.com \r\n";
     $e_headers .= "MIME-Version: 1.0\r\n";
     $e_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $message = '<html><body>';
     $message .= '<h3>PASSWORD RESET EASYJOLLY</h3><hr>';
	 $message .= 'You new password is: &nbsp;&nbsp;&nbsp;&nbsp; <h5 style="text-align:cneter; padding:1em; background:#bbb; color:#000; "><center>
      '.$npass.'	 
	 </cneter></h5> <hr><br>
	 <br> <i>You can later login to website and change the password. </i><br>
	 Thankyou <br>
	 EASYJOLLY ONLINE
	 ';
     $message .= '</body></html>';
     mail('adhikarikumar82@gmail.com', "New Order Received (Website)", $message, $e_headers); 
	  }
	  */

}
$stmt->close();
  
?>
