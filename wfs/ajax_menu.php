
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-bullhorn"></i>  Menu Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-4">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle"></i> Add Menu Title  </h3>

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
                
<form class="slider_save_2" method="post" enctype="multipart/form-data" >

<div class="row">

<div class="col-md-7"><b>Menu title</b><br>
<input type="text" name="s_tit" class="form-control" style="" id="slider_input"></input>
</div>



</div> 
<br>
<b>Menu Featured Image</b>
<input type="file" name="myfilecss" id="myfilecss" class="form-control"></input>
<br>


<!--
<div class="row"> 
<div class="col-md-6">
<b>Link Product: &nbsp;&nbsp;</b> 
<select style="" name="pack_sel" class="form-control">
<option value="0" selected="selected">-</option>
<?php
 
  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package` order by p_name"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					 echo'<option value="'.$mrow1['id_pack'].'">'.$mrow1['p_name'].'</option>';
				   }

?>
</select>
</div>

<div class="col-md-6">
<b>Link Category : &nbsp;&nbsp;</b> 
<select style="" name="pack_sel_title" class="form-control">
<option value="0" selected="selected">-</option>
<?php

  include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`package_category` "; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow2 = mysqli_fetch_array($mdisplay1))
				   {
					 echo'<option value="'.$mrow2['cat_id'].'">'.$mrow2['cat_name'].'</option>';
				   }

?>
</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <small><code><i>(external)</i></code></small> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="hyper_link"/>
</div>
</div>

-->

	<br>

<input type="submit" value="Add Menu" class="btn btn-info" style="margin-top:0px;"></input>
</form>

				
				
              </div>
              <!-- /.card-body -->
            </div>  
			
			


 </div>
 
 
 
 

 
 
 
<div class="col-8">
  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle"></i> Menu Title List  </h3>

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

<h4 style="margin-top:0px; margin-bottom:1em;" class="btn btn-light"> &nbsp;<a href="#" id="or_slider_2"> <code class="text-success"><i class="fas fa-sort"></i>&nbsp;ARRANGE MENU ORDER</code> </a>&nbsp;  </h4>
 
 <div class="col-12 p-0" style="height:70VH; overflow-y:scroll;">
<?php 

				$msql1="Select * from `whitefeat_wf_new`.`menu2` order by m_order"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					     echo'
						 <div class="panel box box-primary bg-light mb-3 p-3">
                            <div class="box-header with-border">
                              ';
							  echo'
							  <div class="row">
							  <div class="col-4">
							  '.$mrow1['m_name'].'
							  </div>
							  <div class="col-2">'; 
							   if($mrow1['main_vis']=='1')
			                  {   
							   echo'<a href="#" title="HIDE IN MENU" class="text-success menu_status" data-custom="1" data-id="'.$mrow1['m_id'].'"><small>menu</small> <i class="fas fa-check"></i></a>';
							  }
							  else{
								  echo'<a href="#" title="MAKE VISIBLE IN MENU" class="text-danger menu_status" data-custom="0" data-id="'.$mrow1['m_id'].'" ><small>menu</small> <i class="fas fa-times"></i></a>';
							  }
							  echo'</div>
							  <div class="col-2">
							  <small>
							  <a href="#" class="sl_trigger" data-custom="'.$mrow1['m_id'].'"><i class="fas fa-edit"></i> Edit</a>
							  </small></div>
							  <div class="col-2"><Small>';
							  if($mrow1['visible']=='1')
			   {   
			   echo '<a href="#" title="Hide Menu " class="text-warning change_slider_vis_2" data-custom="'.$mrow1['m_id'].'" data-status="1"><i class="fas fa-eye-slash"></i> Hide</a> &nbsp;&nbsp;';
			   }
			   if($mrow1['visible']=='0')
			   {   
			   echo'<a href="#" title="Show Menu " class="text-warning change_slider_vis_2" data-custom="'.$mrow1['m_id'].'" data-status="0"><i class="fas fa-eye"></i> Show</a>&nbsp;&nbsp;';
			   }
echo'</small></div><div class="col-md-2"><small>			<a href="#" title="Delete this menu" class="text-danger slider_del_2" data-custom="'.$mrow1['m_id'].'"><i class="fas fa-trash-alt"></i> Delete</a>
							  <input type="hidden" value="'.$mrow1['m_id'].'" class="fpid"></input>
							  
							  </a>
							  </small></div>
							  </div>
                         
						 
						 <div class="col-md-12">
						 <br><br><label>Multiple Categories </label><br><br>Add new :				<br>
			                      <form class="add_title_menu">
								  <input type="hidden" name="menu_id" value="'.$mrow1['m_id'].'"/>
								  <div class="row" style="margin-bottom:10px;">
								  <div class="col-md-8">
								  
								  <select class="form-control" name="title">
								  <option> -- Select category from the list -- </option>
								  ';
								  
								  // for selecting category
			
			 $sql1x = "Select * from `whitefeat_wf_new`.`package_category` where cat_id NOT IN(select cat_id from `whitefeat_wf_new`.`title_menu` where m_id='".$mrow1['m_id']."')";
		     $display1x=mysqli_query($con,$sql1x);
		     while($rowx1 = mysqli_fetch_array($display1x))
			 {
				 echo'<option value="'.$rowx1['cat_id'].'"><b>'.$rowx1['cat_name'].'</b></option>';
			  }
			
			
		
		 echo'</select>
		 </div>
		 
		  <div class="col-md-2">
		   <input type="submit" class="btn btn-success" value="+Add"/>
		  </div>
		 
		 
		 </div>
		 </form>
						 </div>
						 
		 <div class="col-md-12"><u>Current List</u> &nbsp;&nbsp;<small> <a href="#" class="or_title" data-id="'.$mrow1['m_id'].'"><br>
		 <small><small><code class="btn btn-xs btn-outline-light p-2 text-success"> <i class="fas fa-sort"></i> Arrange Sub-categories</code></small></small></a> </small><br></div><div class="col-md-12"><Br>';
	    
		
		
		 $sql2 = "Select * from `whitefeat_wf_new`.`title_menu` where m_id='".$mrow1['m_id']."' order by menu_order";
		 $display2=mysqli_query($con,$sql2);
		 while($row2 = mysqli_fetch_array($display2)) 
		 {
				   
				   echo '<span  style="cursor:pointer; font-weight:300;" class="menu_title_del" data-custom="'.$row2['tm_id'].'">';
				   
				   $sql2x = "Select * from `whitefeat_wf_new`.`package_category` where cat_id='".$row2['cat_id']."'";
		            $display2x=mysqli_query($con,$sql2x);
		            $row2x = mysqli_fetch_array($display2x);
				   echo $row2x['cat_name'];
				   
				   echo'
                  <span class="badge badge-danger"><i class="fas fa-times"></i></span></span>
				  &nbsp;&nbsp;';
				  
		 
		 }
						 
					echo'</div>	 
						 
						 
						 
						 </div>
						 
						 
						 
						<div class="p-2 card" style="display:none; background:#ECF0F5; border:1px solid #;border-bottom:1px solid #;" id="sl'.$mrow1['m_id'].'">
						 <div class="col-md-12">
					<form class="slider_edit_save_2" >
						 
						 <h5 class="bg-secondary p-2"> Editing menu details.....</h5>
						<div class="row">
                          
<div class="col-8">  Title: <input type="text" style="" value="'.$mrow1['m_name'].'" name="n_tit" class="form-control" ></input> </div>


						 <div class="col-12 mt-3">
						 <img src="../assets/images/menu/image_icon/'.$mrow1['image_icon'].'" style="height:363px;">
						 
</div>

<div class="col-6"><label>Change Image</label>
<input type="file" name="myfilecss" class="form-control"></input>
</div>



</div><br>
						
		
		<!--
						 <div class="row">
<div class="col-md-6">
<b>Link Product: &nbsp;&nbsp;</b> 
<select style="" name="n_pack_sel" class="form-control">';
 if($mrow1['m_pack']==0)
						 {
							 echo'<option value="0" selected="selected">-</option>';
							 $msql1w="Select id_pack, p_name from `whitefeat_wf_new`.`package` order by p_name"; 
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
					          echo'<option value="'.$mrow1w['id_pack'].'">'.$mrow1w['p_name'].'</option>';
				             }
							 
						 }
						 if($mrow1['m_pack']!=0)
						 {
							 echo'<option value="0">-</option>';
							 $msql1w="Select id_pack, p_name from `whitefeat_wf_new`.`package` order by p_name"; 
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
							  if($mrow1['m_pack']==$mrow1w['id_pack'])
					          {echo'<option value="'.$mrow1w['id_pack'].'" selected="selected">'.$mrow1w['p_name'].'</option>';}
						     else
							 {echo'<option value="'.$mrow1w['id_pack'].'">'.$mrow1w['p_name'].'</option>';}
				             }
							 
						 }
echo'</select>
</div>

<div class="col-md-6">
<b>Link Category : &nbsp;&nbsp;</b> 
<select style="" name="n_pack_sel_title" class="form-control">';

 if($mrow1['m_title']==0)
						 {
							 echo'<option value="0" selected="selected">-</option>';
							 $msql1w="Select * from `whitefeat_wf_new`.`package_category` order by cat_name";
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
					          echo'<option value="'.$mrow1w['cat_id'].'">'.$mrow1w['cat_name'].'</option>';
				             }
							 
						 }
						 if($mrow1['m_title']!=0)
						 {
							 echo'<option value="0">-</option>';
							 $msql1w="Select * from `whitefeat_wf_new`.`package_category`  order by cat_name"; 
				             $mdisplay1w = mysqli_query($con,$msql1w);		 
                             while($mrow1w = mysqli_fetch_array($mdisplay1w))
				             {
							  if($mrow1['m_title']==$mrow1w['cat_id'])
					          {echo'<option value="'.$mrow1w['cat_id'].'" selected="selected">'.$mrow1w['cat_name'].'</option>';}
						     else
							 {echo'<option value="'.$mrow1w['cat_id'].'">'.$mrow1w['cat_name'].'</option>';}
				             }
							 
						 }



echo'</select>
</div>

<div class="col-md-12" style="margin-top:10px;">
<b>Hyper link <i>(optional)</i> : &nbsp;&nbsp;</b> 
<input type="text" class="form-control" name="n_hyper_link" value="'.$mrow1['m_external'].'"/>
</div>


</div>

-->
						 
						 
						 
						 
						 
						 ';
						
						 
						 echo'
						 <br> 
						 
						 <input type="submit" value="Save Changes" class="btn btn-info" style="margin-top:0px;"></input>
						 &nbsp;&nbsp;<a href="#" class="sl_trigger_close" data-custom="'.$mrow1['m_id'].'" style=""><code class="btn btn-light " >Close View [X]</code></a>
						 
						 <input type="hidden" name="hvid" value="'.$mrow1['m_id'].'">
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


	<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>
 
<script>
$(document).on('click','#closem', function () {
$(".app_area").load('ajax_menu.php');
});
</script>