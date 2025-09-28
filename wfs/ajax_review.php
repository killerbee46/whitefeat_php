
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-comments"></i>  Reviews Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>

  
   
  <div class="col-12">
  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-inbox"></i> Reviews Received   &nbsp; &nbsp;<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-uset2" ><i class="fas fa-plus-circle"></i> &nbsp;Add review</button>
				
				
				
				
				<div class="modal fade bd-example-modal-lg" id="modal-uset2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
	  <h3 class="subtitle is-size-5 p-4" style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
Add review&nbsp; <img src="../assets/images/extra/happy.png" style="height:1em;">
</h3>
	  
      <div class="row p-4">
	     <div class="col-12 pt-0">
		  <div class="col-8 " style="margin-top:0em;">
		  <label> <u>Review Details:</u></label>
		  </div>
		   	

	  <form class="customize-form" id="rev_form_main">
	  <div class="col-8 " style="margin-top:0em;">
	    Name: <small>*</small><br> 
		<input class="form-control is-halfwidth mt-1 user-name" name="customer_name" type="text" value=""></input>
	  </div>
   	  
	  <div class="col-8 mt-3 " style="margin-top:0em;">
	    Share image:  <small>*</small> <br> 
		<input type="file" class="form-control" name="rv_travel_file"></input>
	  </div>
	  
	  <div class="col-8 mt-3 " style="margin-top:0em;">
	    How was your experience:  <small>*</small> <br>
		<select name="exp" class="form-control">
		 <option value="0" selected disabled>-- Choose on from list --</option>
		 <option value="1">Poor</option>
		 <option value="2">Fair</option>
		 <option value="3">Good</option>
		 <option value="4">Amazing</option>
		 <option value="5">Excellent</option>
		 
		</select>
	  </div>
	  
	  <div class="col-12 mt-3 " style="margin-top:0em;">
	    Write your words:  <small>*</small> <br> 
		<textarea class="form-control is-fullwidth" name="message" style="height:15VH;" id="rv_msg_main"></textarea>

	  </div>
	  
	  <div class="col-8 mt-3 " style="margin-top:0em;">
	    <input type="submit" value="Submit for review" class="btn btn-info " ></input>
	  </div>
		  
		  </form>
		  
		  <!--<div class="col-12 mt-3 has-text-centered"> 
		    <b class="is-size-4">Thank you for choosing us..</b> <br>
			<small><small>We will be at your service 365 Days <code>  +977-01-5365343 ( HOTLINE ) </code></small></small>
		  </div>-->
		  
		 </div>
		 
		  
	  
	  </div>
	  
	  
	  
	  
	  
    </div>
  </div>
</div>
				
				
				
				
		
		
	  
				</h3>

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
              <div class="card-body" style="height:70VH;overflow-y:scroll;">
 <?php 
 
   include('db_connect.php');
				$sqlbc = "Select * from `whitefeat_wf_new`.`testimonials`"; 
		        $displaybc=mysqli_query($con,$sqlbc);
				      
                      while($mrow2 = mysqli_fetch_array($displaybc))
						{ 
					echo'<div class="container">
					<div class="row">
					<div class="col-3">
					<img src="../assets/images/testinomial/'.$mrow2['i_path'].'" style="height:6em;"/>
					</div>
					<div class="col-4">
					'.ucfirst($mrow2['name_t']).'<br>';
					for($i=1;$i<=$mrow2['star'];$i++)
					{
						echo'<i class="fas fa-star text-warning"></i>';
					}
					
					echo'</div>
					
					
					<div class="col-3">
					<a href="#" class="edit_f_title" data-id="'.$mrow2['id_t'].'" style="color:#666;">Edit <i class="fas fa-edit"></i></a>
					 &nbsp; &nbsp; 
					';
					
					  if($mrow2['t_vis']=='1')
			   {   
			   echo '&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" title="Hide review" class="change_review_vis" data-custom="'.$mrow2['id_t'].'" data-status="1"><i class="fas fa-eye-slash"></i> Hide</a> &nbsp;&nbsp;';
			   }
			  else
			   {   
			   echo'&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" title="Show review" class="change_review_vis" data-custom="'.$mrow2['id_t'].'" data-status="0"><i class="fas fa-eye"></i> Show</a>&nbsp;&nbsp;';
			   }
					echo'
				    	 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" title="Delete this review" class="review_del" data-custom="'.$mrow2['id_t'].'"><i class="fas fa-trash-alt text-danger" style=""></i></a>
					</div>
					</div>
					';
						echo'
						     <form class="review_save_main mt-4 bg-white p-4 pl-0">
							 <input type="hidden" name="review_id" value="'.$mrow2['id_t'].'" ></input>
							 
							 
							 <div class="row " id="ft_load'.$mrow2['id_t'].'" style="display:none;">
							 
							 <div class="col-8 bg-light">
							 <hr class="hrc" style="margin:5px;">
							 
							 <div class="col-12"><h4>Customer Name:</h4>
							 <input type="text" value="'.$mrow2['name_t'].'" class="form-control" style="width:25%;" name="rv_name"></input>';
							
	  
							 
							 
							 echo'</select><br></div>
         
							 <div class="col-12"><h4>Customer photo:</h4></div>
							<div class="col-12"> <img src="../assets/images/testinomial/'.$mrow2['i_path'].'"/ class="col-md-2 img-responsive" style="padding-left:0px;"></div>
							 <div class="col-12"><code>Change:</code></div>
							 <input type="file" class="form-control" style="width:250px;" value="" name="travel_photo"></input><br>
							 
							 <div class="col-12 mt-2"><h4>Customer Rating:</h4></div>
							 
							 <div class="col-6">
							 <select name="exp" class="form-control">
		 <option value="1"'; if($mrow2['star']==1){echo'selected';}echo'>Poor</option>
		 <option value="2"'; if($mrow2['star']==2){echo'selected';}echo'>Fair</option>
		 <option value="3"'; if($mrow2['star']==3){echo'selected';}echo'>Good</option>
		 <option value="4"'; if($mrow2['star']==4){echo'selected';}echo'>Amazing</option>
		 <option value="5"'; if($mrow2['star']==5){echo'selected';}echo'>Excellent</option>
		 
		</select>
							 </div>
							 
							 <div class="col-12 mt-4"><h4>Customer Review:</h4></div>
							 <textarea class="form-control" id="text_input'.$mrow2['id_t'].'" name="mess" style="height:10em;" >'.$mrow2['content_t'].'</textarea>
							 
							 <div class="col-12 mt-4 mb-1">
                             <input type="submit" value="Save Changes" class="btn btn-success review" style="margin-top:-5px;" data-id="'.$mrow2['id_t'].'"></input> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                 <input type="button" value="Close Review" class="btn btn-danger ctits" style="margin-top:-5px;" data-id="'.$mrow2['id_t'].'"></input>
							 </div>
							 </div>
							 </div>
							 </div>
							 </form>
							 ';
					echo'<hr>';
						}
						$ccount=mysqli_num_rows($displaybc);
						if($ccount>0){}else{echo'-- No reviews received yet --';}
						
?>
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
$("#rev_form_main").submit(function (evt) {
    evt.preventDefault();
    var c1 = $("#rv_msg_main").val();
    if (c1 !== "") {
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "review_form_save.php",
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
				//alert(res);
				$('.modal-backdrop').remove();
                swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Review Added successfully!",  
		                           timer: 2000,  
		                            });
              $(".app_area").load("ajax_review.php"); 
            },
        });
        return false;
    } else {
        alert("Missing Details!!!");
    }
});
</script>
 