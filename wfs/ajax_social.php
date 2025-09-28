
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-users"></i> Social Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-12">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Social List</h3>

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
                
				<!--<a href="#" title="adjust table sequence / order "><button class="btn btn-light rea_table"><code>Relocate Table / Seat Postion</code></button></a>
				<hr>
				-->
				
				<?php 
				     include('db_connect.php');
					$sql1 = "Select * from `whitefeat_wf_new`.`links`";
   $display1=mysqli_query($con,$sql1); $sn=0;
    while($row1 = mysqli_fetch_array($display1)) 
    {
echo'<div class="row">
<div class="col-1">';
if($sn==0){echo'<i class="fab fa-facebook title display-4"></i>';}
if($sn==1){echo'<i class="fab fa-youtube title display-4"></i>';}
if($sn==2){echo'<i class="fab fa-linkedin title display-4"></i>';}
if($sn==3){echo'<i class="fab fa-twitter title display-4"></i>';}
if($sn==4){echo'<i class="fab fa-instagram title display-4"></i>';}
if($sn==5){echo'<i class="fab fa-tiktok title display-4"></i>';}
echo'</div>
<div class="col-7 pt-3">
<input type="text" style="width:100%; " value="'.$row1['l_add'].'" id="new_link'.$row1['l_id'].'" class="form-control"></input>
</div>
<div class="col-2 pt-3"><input type="submit" value="save!" class="btn btn-info link_save" data-custom="'.$row1['l_id'].'" style="margin-top:0px;"></input></div>
</div><hr>';
	$sn++;
	}
			     ?>
					
					
					
					
					
					
				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 
 
 
<?php /*
 <div class="col-5">
  <div class="card card-secondary shadow">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>

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
                    
					<form id="save_category_form" method="post" enctype="multipart/form-data" >
				  <div class="form-group">
                    <label for="add_table">Category  Name</label>
                    <input type="text" class="form-control" id="add_name" name="cat_name" placeholder="Write Name">
                  </div>
				    
				  <div class="form-group">
                    <label for="add_table">Category  Photo <small>( landscape )</small></label>
                    <input type="file" class="form-control p-0 pt-1 pl-1" id="add_photo" name="itemimg" placeholder="Select photo">
                  </div>
				    
				  <div class="form-group">
                    <label for="add_table">Category  Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>
                    <input type="text" class="form-control" id="add_video" name="cat_video" placeholder="Embed Video Link">
                  </div>
				  
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block add_table" value="Add"></button>
                  </div>
				  </form>
				  
				  
				  
                  
                </div>
              <!-- /.card-body -->
            </div>
 </div>
 
*/?>
			
			
		


</div>


	<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>
