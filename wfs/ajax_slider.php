
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-photo-video"></i>  Slider Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-12">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-camera"></i> Photos  </h3>

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
                

				<div class="row">
<div class="col-md-12">
<div class="box-body">
<a href="#" id="add_slider"><code>+Add slider image</code></a><br><br>
<div class="row">

<div class="col-5 p-3" style="border:1px solid #ddd;">
<form class="slider_save">
<input type="file" name="myfilecss" id="slider_input" class="form-control"></input><br>
<b>Slider title</b><br>
<input type="text" style="" name="s_tit" class="form-control"></input><br>
<!--
<b>Slider description</b><br>
<textarea style=" height:80px;" name="s_desc" class="form-control"></textarea><br>
-->
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
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
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
					 echo'<option value="'.$mrow1['cat_id'].'">'.$mrow1['cat_name'].'</option>';
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link"/>
</div>
</div>

<br>

<input type="submit" value="Upload & Save" class="btn btn-info" style="margin-top:0px;"></input>
</form>
</div>

<div class="col-7 p-3" style="padding-top:0em; margin-top:-1em; height:50VH; overflow-y:scroll;">
<h4 style="margin-top:0px; margin-bottom:1em;" class="btn btn-light"> &nbsp;<a href="#" id="or_slider"> <code class="text-success"><i class="fas fa-sort"></i>&nbsp;ARRANGE SLIDER ORDER</code> </a>&nbsp;  </h4>
<?php 
				include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`slider` where status='1' order by s_order"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					     echo'
						 <div class="panel box box-primary">
                            <div class="box-header with-border row">
                              <div class="col-5">
							  <h6 class="box-title">
                                <img src="../assets/images/slider/'.$mrow1['s_path'].'" style="height:100px; max-width:200px;"/>
								<input type="hidden" value="'.$mrow1['s_id'].'" class="fpid"></input>
								<br>
								<small>'.strtoupper($mrow1['s_title']).'</small>
                              </h6>
							  </div>';
							  echo'<div class="col-2"><a href="#" class="sl_trigger" data-custom="'.$mrow1['s_id'].'"><i class="fas fa-edit"></i> Edit</a></div>
							  <div class="col-2">';
							  if($mrow1['visible']=='1')
			   {   
			   echo '<a href="#" title="Hide slider image" class="text-warning change_slider_vis" data-custom="'.$mrow1['s_id'].'" data-status="1"><i class="fas fa-eye-slash"></i> Hide</a> &nbsp;&nbsp;';
			   }
			   if($mrow1['visible']=='0')
			   {   
			   echo'<a href="#" title="Show slider image" class="change_slider_vis" data-custom="'.$mrow1['s_id'].'" data-status="0"><i class="fas fa-eye"></i> Show</a>&nbsp;&nbsp;';
			   }
echo'</div><div class="col-2">			<a href="#" title="Delete this image" class="text-danger slider_del" data-custom="'.$mrow1['s_id'].'"><i class="fas fa-trash-alt"></i> Del</a>
							  <input type="hidden" value="'.$mrow1['s_id'].'" class="fpid"></input>
							  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  </a>
							  </div>
                         </div>
						<div class="row p-3 pb-3 mb-3 mt-1" style="display:none; background:#ECF0F5; border:1px solid #fff; border-bottom:1px solid #FF851B; padding:0px;" id="sl'.$mrow1['s_id'].'">
						 <div class="col-md-12">
					<form class="slider_edit_save">
						 <h4>
						 <div class="col-md-9"></div>
						 <div class="col-md-3">
						 <a href="#" class="sl_trigger_close" data-custom="'.$mrow1['s_id'].'" style=""><code ><small><small>Close View [X]</small></small></code></a>
						 </div>
						 </h4>
						 <img src="../assets/images/slider/'.$mrow1['s_path'].'" style="height:100px; max-width:200px;"/> 
						 <br><a href="#" class="text-danger">[ Change ] <br></a><input type="file" name="myfilecss"></input><br><br>
						 Title: <input type="text" style="" value="'.$mrow1['s_title'].'" name="n_tit" class="form-control" ></input>
						
						 
						 
						 
						 <div class="row mt-2">
<div class="col-md-6">
<b>Link product: &nbsp;&nbsp;</b> 
<select style="" name="n_pack_sel" class="form-control">';
 if($mrow1['package_link']==0)
						 {
							 echo'<option value="0" selected="selected">-</option>';
							 $msql1w="Select * from `whitefeat_wf_new`.`package` order by p_name"; 
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
					          echo'<option value="'.$mrow1w['id_pack'].'">'.$mrow1w['p_name'].'</option>';
				             }
							 
						 }
						 if($mrow1['package_link']!=0)
						 {
							 echo'<option value="0">-</option>';
							 $msql1w="Select * from `whitefeat_wf_new`.`package` order by p_name"; 
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
							  if($mrow1['package_link']==$mrow1w['id_pack'])
					          {echo'<option value="'.$mrow1w['id_pack'].'" selected="selected">'.$mrow1w['p_name'].'</option>';}
						     else
							 {echo'<option value="'.$mrow1w['id_pack'].'">'.$mrow1w['p_name'].'</option>';}
				             }
							 
						 }
echo'</select>
</div>

<div class="col-md-6">
<b>Link category : &nbsp;&nbsp;</b> 
<select style="" name="n_pack_sel_title" class="form-control">';

 if($mrow1['category_link']==0)
						 {
							 echo'<option value="0" selected="selected">-</option>';
							 $msql1w="Select * from `whitefeat_wf_new`.`package_category` order by cat_name";
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
					          echo'<option value="'.$mrow1w['cat_id'].'">'.$mrow1w['cat_name'].'</option>';
				             }
							 
						 }
						 if($mrow1['category_link']!=0)
						 {
							 echo'<option value="0">-</option>';
							 $msql1w="Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
							  if($mrow1['category_link']==$mrow1w['cat_id'])
					          {echo'<option value="'.$mrow1w['cat_id'].'" selected="selected">'.$mrow1w['cat_name'].'</option>';}
						     else
							 {echo'<option value="'.$mrow1w['cat_id'].'">'.$mrow1w['cat_name'].'</option>';}
				             }
							 
						 }



echo'</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="n_hyper_link" value="'.$mrow1['hyper_link'].'"/>
</div>

</div>
						 
						 
						 
						 
						 
						 ';
						
						 
						 echo'
						 <br>
						 
						 <input type="submit" value="Save Changes" class="btn btn-info" style="margin-top:0px;"></input>
						 &nbsp;&nbsp;<a href="#" class="sl_trigger_close" data-custom="'.$mrow1['s_id'].'" style=""><code class="btn btn-default " >Close View [X]</code></a>
						 
						 <input type="hidden" name="hvid" value="'.$mrow1['s_id'].'">
						 </div>
						 </div>
						 </div>
						 </form>
						 
						 ';						 
                  }
				  ?>
</div>
</div>
</div>

</div>

</div>

					
					
					
				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 
 
  <div class="col-12">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-video"></i> Video  </h3>

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
			     <div class="row">
				     <div class="col-5">
					 <code>Video Preview</code>
					 
					 <?php
                      $sqlslt = "Select * from `whitefeat_wf_new`.`video` where visible='1' ORDER BY RAND() LIMIT 1"; 
      $displayslt=mysqli_query($con,$sqlslt);
	   $rowslt=mysqli_fetch_array($displayslt);
	  if($rowslt['v_path']!=''){
		 
		  echo'<iframe src="https://www.youtube.com/embed/'.$rowslt['v_path'].'?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&loop=1&playlist='.$rowslt['v_path'].'&amp;start=8" frameborder="0" allowfullscreen
      style="width:100%;height:30VH;"></iframe>';
	  }
	  else{
		  
		  echo'<br> <br> 
		  <i class="fas fa-video-slash" style="font-size:10em; opacity:0.5;"></i>';
	  }

					 ?>
	  
	  
	  
					 </div>
					 <div class="col-3 pt-4">
					 <input class="form-control vid_save_youtube" placeholder="youtube embed link"type="text" value="<?php echo $rowslt['v_path']; ?>"></input>
					 </div>
					 <div class="col-2 pt-4">
					  <button class="btn btn-info save_slider_vid">Save Link</button>
					 </div>
				 </div>
			  
			  
              </div>
  </div>
  
  </div>

</div>


	<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>
