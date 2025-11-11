<?php 

 include 'db_connect.php';
               
			   $queryp = "Select * from `sunsaebn_ct`.`tran_dp` where lo_id='".$_GET['id']."'"; 
               $displayp = mysqli_query($con,$queryp);
               $rowp = mysqli_fetch_array($displayp);

                $queryp2 = "Select * from `sunsaebn_ct`.`log_order` where lo_id='".$_GET['id']."'"; 
               $displayp2 = mysqli_query($con,$queryp2);
               $rowp2 = mysqli_fetch_array($displayp2);
			   
			   


echo'
<div class="modal-body">

		
<label>Select Delivery Person <i style="color:red">*</i></label><br>
		  <select class="form-control" id="dp_select_edit">';
		  
		       $queryp1 = "Select * from `sunsaebn_ct`.`dperson` where status='1' order by name"; 
               $displayp1 = mysqli_query($con,$queryp1);
              while($rowp1 = mysqli_fetch_array($displayp1))
			  {
		  
		  if($rowp['dp_id']==$rowp1['dp_id']){
		echo'<option value="'.$rowp1['dp_id'].'" selected>'.$rowp1['username'].'</option>';
		  }
		  else{
			  echo'<option value="'.$rowp1['dp_id'].'">'.$rowp1['username'].'</option>';
		  }
			  }
	
		  
		  
		  echo'</select>
		  
		  <br>
		  <label>
		  Message for delivery person
		  </label>
		  <textarea class="form-control" id="dp_text_edit" >'.$rowp['admin_note'].'</textarea>
		  
		  
        </div>
        <div class="modal-footer bg-light" style="text-align:center; ">
		  <button type="button" class="btn btn-default" style="color:#008D4C" id="udispatch" data-id="'.$rowp['lo_id'].'">Update Changes <i class="fa fa-check-circle"></i></button>
        </div>
		  
		  
		  
		  ';

?>