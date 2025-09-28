  	<link href="plugins/addon/SunEditor-master/dist/css/suneditor.min.css" rel="stylesheet" type="text/css" />
<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-info alert alert-dismissible">
                  <h5><i class="fas fa-edit"></i>  Content Mgmt. Area
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>
 
  <div class="col-12">
    <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">  
				Select Content: <select id="sel_content" style="width:15VW;">
				  <?php 
                      include('db_connect.php');
				      $sqlbc = "Select * from `whitefeat_wf_new`.`info` where id_info IN(28,29,30,31,32,33,34,35,36,37,38,39,40,47,48)"; 
		              $displaybc=mysqli_query($con,$sqlbc);
				      
                      while($mrow2 = mysqli_fetch_array($displaybc))
						{ 
					      echo'<option value="'.$mrow2['id_info'].'">'.ucfirst($mrow2['info_type']).'</option>';
						}
				  ?>
				</select>
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
              <div class="card-body content-fetch" style="height:70VH;overflow-y:scroll;">
			  Loading content....
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
	$('.content-fetch').load('ajax_load_content.php?id=28');
	$('#sel_content').change(function(){
		var content='ajax_load_content.php?id='+$(this).val();
		$('.content-fetch').load(content);
	});
	
	/* Updating contents */
$(document).on('submit','form.save_form_content', function(evt){
evt.preventDefault();

var formData = new FormData($(this)[0]);
 $.ajax({
    url: 'ajax_content_update.php',
    type: 'POST',
    data: formData,
    async: true,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {
		   
		                     swal({  
		                            type: "success",
		                            title: "Content Updates Successfully!", 
		                            text: "Updated Successfully !",  
		                            timer: 3000,  
		                          });
		 
		  
    }
  });
  return false;


  });

	
	</script>