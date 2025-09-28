<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-chalkboard"></i> Category Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-7">



  <div class="card card-info shadow">
              <div class="card-header">
                <h3 class="card-title">Current Category List</h3>

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
					$query_s = "Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
                    $display_s = mysqli_query($con,$query_s); $counter=1;		 
                     while($row_s = mysqli_fetch_array($display_s))
			          {
				
				
				
				echo'
				<form class="edit_save_category" method="post" enctype="multipart/form-data">
				<input type="hidden" value="'.$row_s['cat_id'].'" name="catval"></input>
				<div class="col">
					<div id="accordion'.$counter.'" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6 class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne'.$counter.'"><i class="fas fa-bookmark"></i> &nbsp;'.ucfirst($row_s['cat_name']).' </h6></a>
					
                     </div>
					<div id="collapseOne'.$counter.'" class="collapse p-2 bg-light" data-parent="#accordion'.$counter.'" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename'.$row_s['cat_id'].'">Category name</label>
                    <input type="text" class="form-control" id="newtablename'.$row_s['cat_id'].'" placeholder="Category Name" value="'.ucfirst($row_s['cat_name']).'" name="cat_name">
                  </div>

   <div class="row">
				  <div class="form-group col-6">
                    <label for="newtablename'.$row_s['cat_id'].'">Category discount % <small>(B2C)</small></label>
                    <input type="number" class="form-control" id="newtablenamed'.$row_s['cat_id'].'" placeholder="Discount %" value="'.ucfirst($row_s['cat_dis']).'" name="cat_dis">
                  </div>
				  
				  <div class="form-group col-6">
                    <label for="newtablename'.$row_s['cat_id'].'">Category discount % <small>(B2B)</small></label>
                    <input type="number" class="form-control" id="newtablenamed_b2b'.$row_s['cat_id'].'" placeholder="Discount %" value="'.ucfirst($row_s['cat_dis_b2b']).'" name="cat_dis_b2b">
                  </div>
				  
				  </div>
				  
				    <div class="form-group">
                  
				  <label for="newtablename'.$row_s['cat_id'].'">Category Photo</label>
                   <div class="row p-2">
				     <img src="../assets/images/category/'.$row_s['cat_pic'].'" style="height:80px;"/>
				   </div>
				   
				   <div class="row p-2">
				     <input type="file" class="form-control p-0 pt-1 pl-1" id="add_table" placeholder="Select photo" name="itemimg">
				   </div>
				   
				   
				   
				     <div class="form-group pt-2">
                    <label for="add_table">Category  Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>';
					
					if($row_s['cat_vid']!=''){
							   echo'<div class="row p-2"><iframe width="200" height="80" src="https://www.youtube.com/embed/'.$row_s['cat_vid'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
							   }
					
					
                    echo'<input type="text" class="form-control" id="add_table" placeholder="Embed Video Link" value="'.$row_s['cat_vid'].'" name="cat_video">
                  </div>
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="'.$row_s['cat_id'].'">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';
                  
				  
				  $query_s1 = "Select * from `whitefeat_wf_new`.`package` where cat_id='".$row_s['cat_id']."'"; 
                    $display_s1 = mysqli_query($con,$query_s1); 
                      $countx=mysqli_num_rows($display_s1);					
                   
			          
				  
				  if($countx>0){}
				  else{
				  echo'<button type="button" class="btn btn-block btn-danger del_table" data-id="'.$row_s['cat_id'].'"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';
                  }
				  
				  echo'</div>
				  </div>
				  </div>
                    </div>
					</div>
					</div>
					
					</form>
					';
					
					$counter++;
					}?>
					
					
					
					
					
					
				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 

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
 

			
			
		


</div>


	<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>
