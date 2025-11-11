<?php 
				     include('db_connect.php');
					$sql1 = "Select * from `whitefeat_wf_new`.`subscribers`";
   $display1=mysqli_query($con,$sql1); $sn=1;
   {
	   ?>
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-users"></i> Subscribers Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-8">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Subscriber's List</h3>

                <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <div class="col-12" style="height:70VH; overflow-y:scroll;">
				<!--<a href="#" title="adjust table sequence / order "><button class="btn btn-light rea_table"><code>Relocate Table / Seat Postion</code></button></a>
				<hr>
				-->
				
				<?php 
				
    while($row1 = mysqli_fetch_array($display1)) 
    {
		echo'<div class="row mb-2 bg-light pt-3 pb-3">
		 <div class="col-1">'.$sn.'</div>
		 <div class="col-8">'.$row1['sb_email'].'</div>
		 <div class="col-2">
		 <button class="btn btn-xs btn-danger p-2 del_subs" data-custom="'.$row1['sb_id'].'">Delete</button></div>
		</div>';
	 	
	 $sn++;
	}
			    
					
				?>	
					
					
					
					</div>
				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 
  <div class="col-4">



  <div class="card card-light shadow">
             
              <!-- /.card-header -->
              <div class="card-body">
                
				
				<a href="mailto:<?php $sql1 = "Select * from `whitefeat_wf_new`.`subscribers`"; $display1=mysqli_query($con,$sql1);
 while($row1 = mysqli_fetch_array($display1)) 
    {
		echo $row1['sb_email'].',';
	}
				?>"><button class="btn btn-lg btn-outline-info"> Send email to all <i class="fas fa-paper-plane" ></i></button></a>
				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 
 
		
		


</div>


	<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>


   <?php 
   
   } 
   
   ?>