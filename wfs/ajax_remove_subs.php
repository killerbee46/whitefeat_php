	<?php 
				     include('db_connect.php');
                     $user=$_POST['i_id1'];	

  $sql="DELETE from `whitefeat_wf_new`.`subscribers` WHERE sb_id='$user'";
mysqli_query($con,$sql);				 
	?>