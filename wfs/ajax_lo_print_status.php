<?php

include('db_connect.php'); 

 $query_cxx = "UPDATE `sunsaebn_ct`.`log_order` set pos_print='1' where lo_id='".$_POST['d1']."'"; 
               $display_cxx = mysqli_query($con,$query_cxx);
			   
			   ?>