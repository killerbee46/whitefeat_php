	<?php 
				     include('db_connect.php');
                     $user=$_POST['i_id1'];	

  $sql="UPDATE `whitefeat_wf_new`.`customer` SET b2b='0' WHERE c_id='$user'";
mysqli_query($con,$sql);
	 
					 
					 
	?>