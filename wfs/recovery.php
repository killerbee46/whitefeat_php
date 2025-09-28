<?php
  
    include('db_connect.php');
    $UserName=$_POST['email'];
    //$Password=$_POST['pass1'];
	$stmt="select * from `whitefeat_wf_new`.`admin` where email='$UserName'";
    $result=mysqli_query($con,$stmt);
	$count=mysqli_num_rows($result);
	$row = $result->fetch_assoc();
		if ($count > 0)
		   {
			   
			   $name=$row['u_name'];
			   $email=$row['a_email'];
			   $pass=$row['pass'];
            // email acknowledgement

	 $e_headers = "From: support@web.com \r\n";
     //$e_headers .= "CC: info@web.com\r\n";
     $e_headers .= "MIME-Version: 1.0\r\n";
     $e_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $message = '<html><body style="border:1px solid #bbb; padding:20px; ">';			
			$message .= '<h3>WF CMS , Login Details !</h3> 
	  <hr>
	  <p>
	  <b>Dear '.$name.',<br> </b>
	  Customer Support Department,
	    <br><Br>
	  <b>Your password is: <code>'.$pass.'</code><b><br>
	   <hr>

<i>You are recommended to change the password.</i>
<hr> 
</body></html>';

mail($email, "Forget Details", $message, $e_headers); 
	         
		   echo '1';
		   }
		        
		  else
		  {
		   echo '0';
	      }
  
  ?>