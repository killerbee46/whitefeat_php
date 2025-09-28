<?php 

 include ('db_connect.php');
               
			   $queryp = "Delete from `sunsaebn_ct`.`log_order` where lo_id='".$_POST['id']."'"; 
               $displayp = mysqli_query($con,$queryp);
               


?>