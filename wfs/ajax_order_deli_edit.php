    <?php { include 'db_connect.php';

               $queryp = "Select * from `sunsaebn_ct`.`tran_dp` where lo_id='".$_POST['iid']."'"; 
               $displayp = mysqli_query($con,$queryp);
               $rowp = mysqli_fetch_array($displayp);
			   
			   if($rowp['dp_id']!=$_POST['did']){

	           $query_cxx = "UPDATE `sunsaebn_ct`.`tran_dp` set drstatus='0' , drview='0', notd='0' where lo_id='".$_POST['iid']."'"; 
               $display_cxx = mysqli_query($con,$query_cxx);   
			   }
			   
			   if($rowp['admin_note']!=$_POST['dtxt']){

	           $query_cxx = "UPDATE `sunsaebn_ct`.`tran_dp` set nota='1' where lo_id='".$_POST['iid']."'"; 
               $display_cxx = mysqli_query($con,$query_cxx);
				   
			   }
			   
	           $query_cxx = "UPDATE `sunsaebn_ct`.`tran_dp` set dp_id='".$_POST['did']."', admin_note='".$_POST['dtxt']."'  where lo_id='".$_POST['iid']."'"; 
               $display_cxx = mysqli_query($con,$query_cxx);
			   
			   
			  
			   
	}?>