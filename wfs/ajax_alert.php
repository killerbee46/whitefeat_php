
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-bullhorn"></i>  Alert Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

 <div class="col-12">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle"></i> Alerts  </h3>

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
<a href="#" id="add_slider"><code>+Add Alert</code></a><br><br>
<div class="row">

<div class="col-5 p-3" style="border:1px solid #ddd;">
<form class="slider_save_alert">
<b>Alert Description</b><br>
<input type="text" style="" name="s_tit" class="form-control"></input><br>
<input type="submit" value="Add Alert" class="btn btn-info" style="margin-top:0px;"></input>
</form>
</div>

<div class="col-7 p-3" style="padding-top:0em; margin-top:-1em; height:50VH; overflow-y:scroll;">
<!--<h4 style="margin-top:0px; margin-bottom:1em;" class="btn btn-light"> &nbsp;<a href="#" id="or_slider"> <code class="text-success"><i class="fas fa-sort"></i>&nbsp;ARRANGE SLIDER ORDER</code> </a>&nbsp;  </h4>-->
<?php 
				include_once('db_connect.php');
				$msql1="Select * from `whitefeat_wf_new`.`header_flash` order by hf_id DESC"; 
				$mdisplay1 = mysqli_query($con,$msql1);		 
                while($mrow1 = mysqli_fetch_array($mdisplay1))
				   {
					     echo'
						 <div class="panel box box-primary m-3">
                            <div class="box-header with-border row">
                              <div class="col-5">
							  <h6 class="box-title">
								<input type="hidden" value="'.$mrow1['hf_id'].'" class="fpid"></input>
								
								<small>'.strtoupper($mrow1['hf_text']).'</small>
                              </h6>
							  </div>';
							  echo'<div class="col-2"><a href="#" class="sl_trigger" data-custom="'.$mrow1['hf_id'].'"><i class="fas fa-edit"></i> Edit</a></div>
							  <div class="col-2">';
							  if($mrow1['visible']=='1')
			   {   
			   echo '<a href="#" title="Hide slider image" class="text-warning change_alert_vis" data-custom="'.$mrow1['hf_id'].'" data-status="1"><i class="fas fa-eye-slash"></i> Hide</a> &nbsp;&nbsp;';
			   }
			   if($mrow1['visible']=='0')
			   {   
			   echo'<a href="#" title="Show slider image" class="change_alert_vis" data-custom="'.$mrow1['hf_id'].'" data-status="0"><i class="fas fa-eye"></i> Show</a>&nbsp;&nbsp;';
			   }
echo'</div><div class="col-2">			<a href="#" title="Delete this image" class="text-danger alert_del" data-custom="'.$mrow1['hf_id'].'"><i class="fas fa-trash-alt"></i> Del</a>
							  <input type="hidden" value="'.$mrow1['hf_id'].'" class="fpid"></input>
							  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  </a> 
							  </div>


                         </div>
						<div class="row p-3 pb-3 mb-3 mt-1" style="display:none; background:#ECF0F5; border:1px solid #fff; border-bottom:1px solid #FF851B; padding:0px;" id="sl'.$mrow1['hf_id'].'">
						 <div class="col-md-12">
					<form class="slider_edit_save_alert">
						 <h4>
						 
						 </h4>
						 
						  
						 Alert Description: <input type="text" style="" value="'.$mrow1['hf_text'].'" name="n_tit" class="form-control" ></input>
						
						 
						 
								 
						 
						 
						 
						 
						 ';
						
						 
						 echo'
						 <br>
						 
						 <input type="submit" value="Save Changes" class="btn btn-info" style="margin-top:0px;"></input>
						 &nbsp;&nbsp;<a href="#" class="sl_trigger_close" data-custom="'.$mrow1['hf_id'].'" style=""><code class="btn btn-default " >Close View [X]</code></a>
						 
						 <input type="hidden" name="hvid" value="'.$mrow1['hf_id'].'">
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
 
 
</div>


	<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem"><code style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
	<div id="mo_fetch">
	</div>
    </div>
