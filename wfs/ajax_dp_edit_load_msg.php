<?php 

 include 'db_connect.php';
               
			   $queryp = "Select * from `sunsaebn_ct`.`tran_dp` where lo_id='".$_GET['id']."'"; 
               $displayp = mysqli_query($con,$queryp);
               $rowp = mysqli_fetch_array($displayp);

			   $queryp1 = "Select * from `sunsaebn_ct`.`dperson` where dp_id='".$rowp['dp_id']."'"; 
               $displayp1 = mysqli_query($con,$queryp1);
               $rowp1 = mysqli_fetch_array($displayp1);

                $queryp2 = "Select * from `sunsaebn_ct`.`log_order` where lo_id='".$_GET['id']."'"; 
               $displayp2 = mysqli_query($con,$queryp2);
               $rowp2 = mysqli_fetch_array($displayp2);
			   
			   


echo'
<div class="modal-body">';


echo'<div class="col-12">
				 <div class="card direct-chat direct-chat-primary">
              <div class="card-header ui-sortable-handle bg-light" style="cursor: move;">
                <h3 class="card-title"><small>Chat with</small> <strong>'.$rowp1['username'].'</strong> </h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">';




               $queryp2x = "Select * from `sunsaebn_ct`.`log_dp_msg` where lo_id='".$_GET['id']."'"; 
               $displayp2x = mysqli_query($con,$queryp2x);
               while($rowp2x = mysqli_fetch_array($displayp2x))
			   {
				   if($rowp2x['flow']==0){
					     echo'
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right mt-4">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">';
               $queryp2x1 = "Select * from `sunsaebn_ct`.`log_vadmin` where va_id='".$rowp2x['va_id']."'"; 
               $displayp2x1 = mysqli_query($con,$queryp2x1);
               $rowp2x1 = mysqli_fetch_array($displayp2x1);
			   
			   echo $rowp2x1['a_name']; 
			   echo'&nbsp; ( <small>'.$rowp2x1['va_no'].'</small> )';
			   
					  echo'</span>
                      <span class="direct-chat-timestamp float-left">'.$rowp2x['msg_date'].'</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <i class="direct-chat-img fas fa-user-circle" style="font-size:2.5rem;"></i>
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text bg-info">
                      '.$rowp2x['msg'].'
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->';
				   }
				   else{
					   echo'
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">'.$rowp1['username'].'</span>
                      <span class="direct-chat-timestamp float-right">'.$rowp2x['msg_date'].'</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <i class="fas fa-shipping-fast" style="font-size:2rem;"></i>
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      '.$rowp2x['msg'].'
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->';
                            
					   
				   }
				   
				   
			   }

				
				




                 
				  
				  
				  
				  
				  



              echo'  </div>
				
              </div>
			  
			  
              <!-- /.card-body 
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-outline-info">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
				 </div>';

		

?>