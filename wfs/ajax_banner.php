
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-image"></i>  Banner Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

  <div class="col-12">
  
  
            <div class="card card-success card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
			  <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
				  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab-stock" data-toggle="pill" href="#custom-tabs-four-home-stock" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-images"></i> Banner Set1</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-images"></i> Banner Set2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link stock_direct_open" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-images"></i> Banner Set3</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link stock_direct_open" id="custom-tabs-four-profile-messages" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fas fa-images"></i> Banner Set4</a>
                  </li>
				  <!--
                  <li class="nav-item">
                    <a class="nav-link stock_direct_open" id="custom-tabs-four-profile-settings" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fas fa-cubes"></i> Collection Tags</a>
                  </li> -->
                  
				  
                </ul>
				
              </div>
			  
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
				
				<div class="tab-pane fade active show p-1" id="custom-tabs-four-home-stock" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab-stock">
				
				
				
				<div class="row pr-4">
				   <div class="col-6">
				   <code><i class="fas fa-info-circle"></i> Use portrait image</code>
				   <form class="edit_save_img" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="2" name="img_num"/>
				   <img src="../assets/images/banner1/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner1` where b_id='2'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:48VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				   </div>
				   <div class="col-6">
				   
				   <div class="col-12 pr-3" style="overflow-x:hidden;">
				   
				   				   <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="3" name="img_num"/>
				   <img src="../assets/images/banner1/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner1` where b_id='3'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:22VH;"/>
					
					<div class="row mt-2">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				   </div>
				   
				   <hr>
				   <div class="col-12 pr-3 mt-4" style="overflow-x:hidden;">
				   
				   				   <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="4" name="img_num"/>
				   <img src="../assets/images/banner1/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner1` where b_id='4'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:22VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				   </div>
				   
				   
				   
				   </div>
				</div>
				
				</div>
				
				<!-- tab section -->
                <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     
				<div class="row pr-4">
                  <div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner2" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="1" name="img_num"/>
				   <img src="../assets/images/banner2/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner2` where b_id='1'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:10VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>

<div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner2" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="2" name="img_num"/>
				   <img src="../assets/images/banner2/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner2` where b_id='2'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:10VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


<div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner2" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="3" name="img_num"/>
				   <img src="../assets/images/banner2/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner2` where b_id='3'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:10VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


                </div>	

<hr>



<div class="row pr-4">
                  <div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner2" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="4" name="img_num"/>
				   <img src="../assets/images/banner2/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner2` where b_id='4'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:10VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>

<div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner2" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="5" name="img_num"/>
				   <img src="../assets/images/banner2/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner2` where b_id='5'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:10VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


<div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner2" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="6" name="img_num"/>
				   <img src="../assets/images/banner2/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner2` where b_id='6'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:10VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


                </div>	
				
				
				
				
				
				</div>
				  
				  
				  
				  
				  <!-- tab section -->
				  
				  
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  
				  

	                     
				<div class="row pr-4">
                  <div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner4" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="1" name="img_num"/>
				   <img src="../assets/images/banner4/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner4` where b_id='1'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:20VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>

<div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner4" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="2" name="img_num"/>
				   <img src="../assets/images/banner4/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner4` where b_id='2'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:20VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


                </div>	

<hr>

				<div class="row pr-4">
                  <div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner4" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="3" name="img_num"/>
				   <img src="../assets/images/banner4/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner4` where b_id='3'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:20VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>

<div class="col">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner4" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="4" name="img_num"/>
				   <img src="../assets/images/banner4/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner4` where b_id='4'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:20VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


                </div>	


				   
				  
				  
                  </div>
                  
				  
				  <!-- tab section -->
				  
				  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    
						<div class="row pr-4">
                  <div class="col-5">
				    <code><i class="fas fa-info-circle"></i> Use portrait image</code>
				   <form class="edit_save_img_banner5" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="1" name="img_num"/>
				   <img src="../assets/images/banner5/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner5` where b_id='1'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:48VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>

<div class="col-7 pl-3">
				    <code><i class="fas fa-info-circle"></i> Use landscape image</code>
				   <form class="edit_save_img_banner5" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="2" name="img_num"/>
				   <img src="../assets/images/banner5/<?php 
				    include('db_connect.php');
				    $queryimg = "Select * from `whitefeat_wf_new`.`banner5` where b_id='2'"; 
                    $displayimg = mysqli_query($con,$queryimg);
		            $rowimg=mysqli_fetch_array($displayimg);
					echo $rowimg['s_path'];
					?>" style="height:48VH;"/>
					
					<div class="row">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` where status='1' order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					   if($rowimg['package_link']==$mrow1['id_pack']){
						    echo'<option value="'.$mrow1['id_pack'].'" selected>'.$mrow1['p_name'].'</option>';
					   }
					   else{
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					  if($rowimg['title_link']==$mrow1['cat_id']){
						   echo'<option value="'.$mrow1['cat_id'].'" selected>'.$mrow1['cat_name'].'</option>';
					  } 
					   else{
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
					   }
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link" value="<?php echo $rowimg['hyper_link']; ?>"/>
</div>
</div>

					
					<div class="col-12 mb-3 pl-2 mt-2">
					<div class="row"><b>Change Image</b></div>
					
					<div class="row"><input type="file" class="mt-2" name="itemimg"></input></div>
					
					
					</div>
					
					<input type="submit" value="Update Changes" class="btn btn-info btn-sm"></input>
					</form>
				  </div>


                </div>		
					
                  </div>
                  
				  
				  <!-- tab section -->
				  <!--
				  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    
                   
		
					
                  </div>
                   -->
				</div>
              </div>
              <!-- /.card -->
            </div>
				
				
  
  
  
  
  
  
  </div>










</div>


<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>