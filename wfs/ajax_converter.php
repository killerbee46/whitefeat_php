
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-balance-scale"></i> Price & Currency Conversion Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-6">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Price List </h3>

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
			  
			    <button class="btn btn-outline-danger mb-3 sync_product_price">Synchronize Products Price &nbsp; <i class="fas fa-sync"></i></button>
			    
                <div class="col-12" style="height:70VH; overflow-y:scroll;">
				<!--<a href="#" title="adjust table sequence / order "><button class="btn btn-light rea_table"><code>Relocate Table / Seat Postion</code></button></a>
				<hr>
				-->
				
				<?php 
				     include('db_connect.php');
					$sql1 = "Select * from `whitefeat_wf_new`.`package_metal` order by pmt_name";
   $display1=mysqli_query($con,$sql1); $sn=1;
    while($row1 = mysqli_fetch_array($display1)) 
    {
		echo'
		<div class="row col-12 bg-light pt-3">
		 <div class="col-5 mb-1">'.$row1['pmt_name'].'</div>
		 <div class="col-4 mb-1"><input type="number" class="form-control value_rate" data-id="'.$row1['pmt_id'].'" value="';
          if($row1['pmt_id']==8){
			  echo $row1['rate'];
			  }
		  else{
			  if($row1['pmt_id']==10 || $row1['pmt_id']==11 ){
				  echo $row1['rate'];
			  }
			  else{
				  echo $row1['rate']; }
			  }
		 
		 echo'"></input></div>
		 <div class="col-3 mb-1"><button class="btn btn-outline-info btn-md update_rate" data-id="'.$row1['pmt_id'].'">Update &nbsp;<i class="fas fa-angle-right"></i></button></div>
		 
		 </div>
		 ';
		
		$sn++;
	}
			     ?>
					
					
					
					
					</div>
				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 
  <div class="col-6">



  <div class="card card-light shadow">
              <div class="card-header bg-info">
                <h3 class="card-title"> Currency Rate</h3>

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
              <div class="card-body">
<!--               
			   <div class="row col-12 mb-1 disabled bg-light p-2" style="cursor: not-allowed;" >Auto Conversion &nbsp; <i class="fas fa-toggle-on text-success" style="font-size:1.5em;"></i></div>
				-->
				
				<!--<a href="#" title="adjust table sequence / order "><button class="btn btn-light rea_table"><code>Relocate Table / Seat Postion</code></button></a>
				<hr>
				-->
				
				
				<?php 
					$sql1 = "Select * from `whitefeat_wf_new`.`currency` where cur_id!=1";
   $display1=mysqli_query($con,$sql1); $sn=1;
    while($row1 = mysqli_fetch_array($display1)) 
    {
		echo'
		<div class="row col-12 bg-light pt-3">
		 <div class="col-5 mb-1"><i class="fas fa-money-bill"></i> '.$row1['cur_name'].'</div>
		 <div class="col-4 mb-1"><input type="number" class="form-control value_rate_cur" data-id="'.$row1['cur_id'].'" value="'.$row1['cur_rate'].'"></input></div>
		 <div class="col-3 mb-1"><button class="btn btn-outline-info btn-md update_rate_currency" data-id="'.$row1['cur_id'].'">Update &nbsp;<i class="fas fa-angle-right"></i></button></div>
		 
		 </div>
		 ';
		
		$sn++;
		
	}
			     ?>
					
					
					
					
					
				
				
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

