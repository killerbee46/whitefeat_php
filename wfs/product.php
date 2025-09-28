<?php 
include('session_control.php');
include('db_connect.php');
include('cut_review.php');
                    $queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='".$_SESSION['u_id']."'"; 
                    $displayud = mysqli_query($con,$queryud);
		            $rowud=mysqli_fetch_array($displayud);
{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/sweet-alert.css">
  	<link href="plugins/addon/SunEditor-master/dist/css/suneditor.min.css" rel="stylesheet" type="text/css" />
  <style>
  .Hunter-pop-up {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
    padding: 1px;
    background-color: #ffffff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 2px solid #cccccc;
    border: 2px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.Hunter-pop-up:before,
.Hunter-pop-up:after {
    content: '';
    display: block;
    width: 0;
    height: 0;
    border-width: 10px;
    border-style: solid;
    position: absolute;
    left: 20px;
    z-index: 999999;
}

.Hunter-pop-up-right:before,
.Hunter-pop-up-right:after {
    left: auto;
    right: 20px;
}

.Hunter-pop-up:before {
    border-color: transparent transparent #f5f5f5;
    top: -17px;
    z-index: 9999999;
	left:5px;
}

.Hunter-pop-up:after {
    border-color: transparent transparent #c9cbce;
    top: -20px;
	left:5px;
}

.Hunter-pop-up ul {
    list-style: none;
}

.Hunter-pop-up ul li {
    display: inline-block;
    position: relative;
    margin: 4px;
    cursor: pointer;
}

.Hunter-pop-up p {
    font-weight: 1;
    padding: 0 4px;
    margin-top: 4px;
    margin-bottom: 0px;
}

.Hunter-pop-up .line {
    width: 340px;
    margin: 0 auto;
    margin-top: 4px;
    border-bottom: 1px solid #d8d8d8;
}

.Hunter-pop-up .close {
    position: absolute;
    top: 8px;
    right: 8px;
    font-size: 16px;
	z-index:1000;
}

.Hunter-pop-up .title {
    padding: 8px 14px;
    margin: 0;
    font-size: 14px;
    font-weight: bold;
    line-height: 18px;
    background-color: #f5f5f5;
    border-bottom: 1px solid #ddd;
    border-radius: 5px 5px 0 0;
}



.Hunter-pop-up .Hunter-wrap {
    position: relative;
    background: #ffffff;
    padding: 0.5em;
    overflow: auto;
	padding-bottom:0;
	padding-left:0.6em;
	padding-right:0.6em;
	
}

.card-hover:hover{background-color:#; box-shadow: 1px 1px #aaa;}


  </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed letter-spacing">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="navmenu">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="pushmenu_link"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="main.php" class="nav-link open_main"><strong><i class="fas fa-home"></i> DASHBOARD</strong></a>
      </li>
	  <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link open_walk">Account</a>
      </li>-->
	  
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	
     
      <!-- Notifications Dropdown Menu -->
	  <!--
	    <li class="nav-item">
        <a class="nav-link" href="#" role="button">
         <button class="btn btn-xs btn-outline-info">KOT <i class="fas fa-print"></i></button> 
        </a>
      </li>-->
	  
	  
	  
	  
	  
	   
	  
	  
	  
	  
      
	  
      
	  
	  <li class="nav-item">
       <a class="nav-link btn btn-light"  href="../" target="_blank" role="button" id="">
          View site &nbsp; <i class="fas fa-eye"></i>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" id="fscreen">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
	  <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
	  
	  
	  
      
        
	  
	  <!-- USERS Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
        <a class="nav-link lights" href="#" role="button">
		<i class="fas fa-moon mr-2"></i> Dark mode
          <input id="toggle-light" class="light-button" type="checkbox" data-toggle="toggle" data-size="xs" data-onstyle="secondary" >
        </a>
      
		  
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#inquiry_modal">
            <i class="fas fa-lock mr-2"></i> Change password
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout <small><small style="color:red;">(<?php echo ucfirst($rowud['u_name']); ?>)</small></small>
          </a>
        </div>
      </li>
	  
	  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4" style="background: rgb(28,68,74);
background: linear-gradient(0deg, rgba(28,68,74,1) 0%, rgba(17,111,130,1) 26%, rgba(23,162,184,1) 100%);">
    <!-- Brand Logo -->
    <a href="main.php" class="brand-link open_main" style="border-color:#138296; padding-left:1.5em;">
	<strong style="font-weight:400;">WF</strong>
      <span class="brand-text font-weight-light"> <small><small><small>( White Feather )</small></small></small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <?php include('aside.php'); ?>
	  <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <!-- /.sidebar-custom -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      
    <!-- Main content -->
    <section class="content" style="padding-top:1em;">

       
	   
	   
	   
	   
	   
	   

      <div class="container-fluid app_area">
	  
	  
	  
	  

<div class="row" style="letter-spacing:1px;">
 <div class="col-12">
  <div class="callout callout-success alert alert-dismissible">
                  <h5><i class="fas fa-cubes"></i> Product Mgmt. Area 
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>
  </div>
 </div>
</div>

	
<div class="row">	
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
                    <a class="nav-link active" id="custom-tabs-four-home-tab-stock" data-toggle="pill" href="#custom-tabs-four-home-stock" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-file"></i> Product List</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-edit"></i> Add New Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link stock_direct_open" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-tags"></i> Regular Tags</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link stock_direct_open" id="custom-tabs-four-profile-messages" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fas fa-gift"></i> Gift Tags</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link stock_direct_open" id="custom-tabs-four-profile-settings" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fas fa-cubes"></i> Collection Tags</a>
                  </li>
                  
				  
                </ul>
				
              </div>
			  
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
				
				<div class="tab-pane fade active show p-1" id="custom-tabs-four-home-stock" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab-stock">
				
					
					
					
				   
					
					
					
					
					<?php 
					
					$query_sn = "Select * from `whitefeat_wf_new`.`package_category` order by cat_name"; 
                    $display_sn = mysqli_query($con,$query_sn); 
                     while($row_sn = mysqli_fetch_array($display_sn))
			          {
					echo'
					
					<h5 class="p-2 bg-light get-product" data-id="'.$row_sn['cat_id'].'" style="cursor:pointer;">'.$row_sn['cat_name']; 
                   
				    $query_sc = "Select count(*) from `whitefeat_wf_new`.`package` where cat_id='".$row_sn['cat_id']."'"; 
                    $display_sc = mysqli_query($con,$query_sc); 
                    $row_sc = mysqli_fetch_array($display_sc);
					 echo '&nbsp; <small style="font-weight:100;"><span class="badge badge-secondary" style="font-weight:400;">'.$row_sc[0].'</span></small>';
					echo'</h5>
					<div class="row p-2 letter-spacing load-product" data-id="'.$row_sn['cat_id'].'">
					
					';
					
					echo'</div>';
					  
					  
					  }
					 ?>
					
					
					
					
					
					
				  
				
				  
				  
				  
				  
				  
				
				
				</div>
				
                  <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     
					 
					 <form class="save_form1" method="post" enctype="multipart/form-data" style="padding:1em; padding-top:; background-color:#F6EFF6;">
		 
		 
		 <div>
			 <h4 style=" padding:10px; background:rgba(54,167,219,0.7); color:#fff; margin-bottom:10px;">PRODUCT :</h4>
			
		 <div class="row col mt-3">
		 <div class="col-2">
		   <h6>Select Category</h6>
		<select class="form-control custom3" name="newpackt">
		  <option selected disabled>-</option>
			
			<?php 
			 $sql1 = "Select * from `whitefeat_wf_new`.`package_category` order by cat_name";
		    $display=mysqli_query($con,$sql1);
		    while($row = mysqli_fetch_array($display)) 
		      {
		        echo'<option value="'.$row['cat_id'].'"><b>'.ucfirst($row['cat_name']).'</b></option>
			    ';
			
			     
		      }
			 ?>
			
			
				
	    </select>
		</div>
		
		<div class="col-3">
            <h6>Product Name</h6>
			<input type="text" class="form-control fpnamem" name="fpname"></input>
			</div>
			
				
		 
		<div class="col-1 p-0">
		   <h6><small>Weight</small>&nbsp;<small>(gm)</small> </h6>
		   <input type="text" placeholder="x.xx" class="form-control" name="pro_wt" id="pro_wt"></input>
		</div>
		
		<div class="col-2">
		   <h6>Size Type </h6>
		<select class="form-control custom3" name="pro_size_type">
		  <option selected>-</option>
			
			<?php 
			 $sql1 = "Select * from `whitefeat_wf_new`.`package_sizes` order by size_name";
		    $display=mysqli_query($con,$sql1);
		    while($row = mysqli_fetch_array($display)) 
		      {
		        echo'<option value="'.$row['ps_id'].'"><b>'.ucfirst($row['size_name']).'</b></option>
			    ';
			
			     
		      }
			 ?>
			
			
				
	    </select>
		</div>
		
		
		
		<div class="col-2">
		   <h6>Material </h6>
		<select class="form-control custom3" name="pro_material_type">
		  <option selected disabled>-</option>
			
			<?php 
			 $sql1 = "Select * from `whitefeat_wf_new`.`package_material` order by pm_name";
		    $display=mysqli_query($con,$sql1);
		    while($row = mysqli_fetch_array($display)) 
		      {
		        echo'<option value="'.$row['pm_id'].'"><b>'.ucfirst($row['pm_name']).'</b></option>
			    ';
			
			     
		      }
			 ?>
			
			
				
	    </select>
		</div>
		
		 <div class="col-2">
		   <h6>Metal Type </h6>
		<select class="form-control custom3" name="pro_metal_type" id="pro_metal_type">
		  <option selected disabled>-</option>
			
			<?php 
			 $sql1 = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id!='12' order by pmt_name";
		    $display=mysqli_query($con,$sql1);
		    while($row = mysqli_fetch_array($display)) 
		      {
		        echo'<option value="'.$row['pmt_id'].'"><b>'.ucfirst($row['pmt_name']).'</b></option>
			    ';
			
			     
		      }
			 ?>
			
			
				
	    </select>
		</div>
		
		 
		
		</div>
		
		<div class="w-100"></div>
								 
								 
				
			
		    <div class="row col mt-4 pl-3 pr-3 pt-0 pb-0">
			<div class="col pt-2" style="background:rgba(54,167,219,0.1);"><h5>B2C Price Calculation</h5></div>
			</div>
			
			<div class="row col mt-4">
			<div class="col-2">
			<h6>Diamond Crate rate</h6>
			<input type="text" value="0" placeholder="Rs" class="form-control" id="dcrater" name="dcrater"></input><hr>
     		</div>
			 
			 
			 <div class="col-1">
			<h6>Crate Qty. </h6>
			<input type="text" value="0" placeholder="x.xx" class="form-control " id="dcrateqty" name="dcrateqty"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Making <small>(per piece)</small> </h6>
			<input type="text"  value="0" placeholder="Rs" class="form-control " id="makingpp" name="makingpp"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Making <small>(per gm)</small> </h6>
			<input type="text" value="0" placeholder="Rs"  class="form-control " id="makinggm" name="makinggm"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Jarti ( % )</h6>
			<input type="text" value="0" placeholder="Rs"  class="form-control" id="jarti" name="jarti"></input><hr>
     		 </div>
			 
			<div class="col-2">
			<h6>% <small>Discount offer</small></h6>
			<input type="text" value="0" class="form-control" id="discount" name="fprdis"></input><hr>
     		</div>
			 
			 
			<div class="col-1">
			<h6>Stock <small>(Qty)</small></h6>
			<input type="text" value="0" class="form-control " name="nstock"></input><hr>
     		</div>
			
			
			
			
			
             </div>
			 
			 
			  
			 <div class="row col mt-0">
			 <div class="col-12 mb-2"><span class="badge badge-light">Extra Diamond</span></div>
			<div class="col-2">
			<h6>Diamond Crate rate</h6>
			<input type="text" value="0" placeholder="Rs" class="form-control" id="dcrater_bce2" name="dcrater_bce2"></input><hr>
     		</div>
			 
			 
			 <div class="col-1">
			<h6>Crate Qty. </h6>
			<input type="text" value="0" placeholder="x.xx" class="form-control " id="dcrateqty_bce2" name="dcrateqty_bce2"></input><hr>
     		 </div>
			 
			 
			 
			 
			 <!--
			 
			 <div class="col-2">
			<h6>Making <small>(per piece)</small> </h6>
			<input type="text"  value="0" placeholder="Rs" class="form-control " id="makingpp_bce2" name="makingpp_bce2"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Making <small>(per gm)</small> </h6>
			<input type="text" value="0" placeholder="Rs"  class="form-control " id="makinggm_bce2" name="makinggm_bce2"></input><hr>
     		 </div>
			 
			 -->
			
			 </div>
			 
			 
			 
			
			 <div class="row col">
			 <div class="col-3">
			 <button class="btn btn-outline-light btn-xs p-2 text-info" id="pric_b2c">Refresh&nbsp; <i class="fas fa-sync"></i>  </button>
			 
			 &nbsp; &nbsp; <strong>Rs <span id="pric_b2c_temp"></span></strong>
			</div>
			 </div>
			 
			 
		    <div class="row col mt-4 pl-3 pr-3 pt-0 pb-0">
			<div class="col pt-2" style="background:rgba(54,167,219,0.1);"><h5>B2B Price Calculation</h5></div>
			</div>
			
			<div class="row col mt-4">
			<div class="col-2">
			<h6>Diamond Crate rate</h6>
			<input type="text" value="0" placeholder="Rs" class="form-control " id="dcrater_b2b" name="dcrater_b2b"></input><hr>
     		</div>
			 
			 
			 <div class="col-1">
			<h6>Crate Qty. </h6>
			<input type="text" value="0" placeholder="x.xx"  class="form-control " id="dcrateqty_b2b" name="dcrateqty_b2b"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Making <small>(per piece)</small> </h6>
			<input type="text" value="0" placeholder="Rs" class="form-control " id="makingpp_b2b" name="makingpp_b2b"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Making <small>(per gm)</small> </h6>
			<input type="text" value="0" placeholder="Rs"  class="form-control " id="makinggm_b2b" name="makinggm_b2b"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Jarti ( % )</h6>
			<input type="text" value="0" placeholder="Rs"  class="form-control " id="jarti_b2b" name="jarti_b2b"></input><hr>
     		 </div>
			 
			<div class="col-2">
			<h6>% <small>Discount offer</small></h6>
			<input type="text" value="0" class="form-control " id="discount_b2b" name="fprdis_b2b"></input><hr>
     		</div>
			 
			 
			 
			 
			 
			 
			<div class="col-1">
			<h6>Stock <small>(Qty)</small></h6>
			<input type="text" value="0"  class="form-control " name="nstock_b2b"></input><hr>
     		</div>
			</div>
			
			
			
			  
			 <div class="row col mt-0">
			 <div class="col-12 mb-2"><span class="badge badge-light">Extra Diamond</span></div>
			<div class="col-2">
			<h6>Diamond Crate rate</h6>
			<input type="text" value="0" placeholder="Rs" class="form-control" id="dcrater_b2e2" name="dcrater_b2e2"></input><hr>
     		</div>
			 
			 
			 <div class="col-1">
			<h6>Crate Qty. </h6>
			<input type="text" value="0" placeholder="x.xx" class="form-control " id="dcrateqty_b2e2" name="dcrateqty_b2e2"></input><hr>
     		 </div>
			 
			 
			 
			 
			 <!--
			 
			 <div class="col-2">
			<h6>Making <small>(per piece)</small> </h6>
			<input type="text"  value="0" placeholder="Rs" class="form-control " id="makingpp_bce2" name="makingpp_bce2"></input><hr>
     		 </div>
			 
			 <div class="col-2">
			<h6>Making <small>(per gm)</small> </h6>
			<input type="text" value="0" placeholder="Rs"  class="form-control " id="makinggm_bce2" name="makinggm_bce2"></input><hr>
     		 </div>
			 
			 -->
			
			 </div>
			 
			 
			 
			
			
			<div class="row col">
			<div class="col-3">
			 <button class="btn btn-outline-light btn-xs p-2 text-info" id="pric_b2b">Refresh&nbsp; <i class="fas fa-sync"></i>  </button>
			 
			 &nbsp; &nbsp; <strong>Rs <span id="pric_b2b_temp"></span></strong>
			</div>
			
             </div>
			 
			 
			 
			 <hr>
			 
			 
			 
			 <div class="row col mt-4">
			  <div class="col-md-6">
                <h6>Product Component Brief Info.</h6>
                 <input type="text" placeholder="Component info" class="form-control" name="pinfo"></input>			
			  </div>
            </div>
			
			 
			 
			 <div class="row col mt-5">
			  <div class="col-md-6">
                <h6>Product Content <small>(FULL)</small></h6>
</div>
</div>				
<textarea class="tinyme" name="sspost" value="" id="editor" style="width:100%;" ></textarea>






<div class="row mt-5 " style="">

              <div class="col-12 p-1 ">
			 <h4 style=" padding:10px; background:rgba(54,167,219,0.7); color:#fff; margin-bottom:10px;">TAGS, COLLECTION & GIFTS :</h4>
			 </div>
			 
			 
			 
			 

<div class="col-12 pt-4 pb-1" style="">

<div class="row">
							
<div class="col-3 p-2">	

<div class="row pl-2">						
<div class="col custom-control custom-checkbox">
<small><input class="custom-control-input custom-control-input-secondary " type="checkbox" id="customCheckbox1" value="tag_women" name="women_check"  >
<label for="customCheckbox1" class="custom-control-label font-weight-light"  style="cursor:pointer;">Women</label>
</small>
</div>


<div class="col custom-control custom-checkbox">
<small><input class="custom-control-input custom-control-input-secondary " type="checkbox" id="customCheckbox2" value="tag_men" name="men_check"  >
<label for="customCheckbox2" class="custom-control-label font-weight-light "  style="cursor:pointer;">Men</label>
</small>
</div>


<div class="col custom-control custom-checkbox">
<small><input class="custom-control-input custom-control-input-secondary " type="checkbox" id="customCheckbox3" value="tag_kid" name="kid_check"  >
<label for="customCheckbox3" class="custom-control-label font-weight-light"  style="cursor:pointer;">Kids</label>
</small>
</div>
</div>


</div>

<div class="col-2">
<div class="row">
<div class="col-5 p-0 text-center">
<small>Regular Tag:</small>
</div>

<div class="col">
 <select class="form-control" name="regular_tag">
  <option value="0">-- None --</option>
            
			<?php 
			$sql1g = "Select * from `whitefeat_wf_new`.`tags`";
		    $displayg=mysqli_query($con,$sql1g);
		    while($rowg = mysqli_fetch_array($displayg)) 
		      {
				  $sql1g2 = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='".$rowpd['id_pack']."' and tag_id='".$rowg['tag_id']."'";
		          $displayg2=mysqli_query($con,$sql1g2);
		          
				  
				  $cct=mysqli_num_rows($displayg2);
				  if($cct>0){
					  $rowg2 = mysqli_fetch_array($displayg2);
					  if($rowg['tag_id']==$rowg2['tag_id']){
				      echo'<option value="'.$rowg['tag_id'].'" selected >'.ucfirst($rowg['tag_name']).'</option>';
					  }
				  }
				  else{
					  echo'<option value="'.$rowg['tag_id'].'">'.ucfirst($rowg['tag_name']).'</option>';
				  }
				  
			  }
            ?>
 </select>
</div>
</div>
</div>



<div class="col-3">

<div class="row">
<div class="col-5 p-0 text-center">
<small>Add to gift:</small>
</div>

<div class="col">
<select class="form-control" name="gift_tag">
  <option value="0">-- None --</option>
            
			<?php 
			$sql1g = "Select * from `whitefeat_wf_new`.`package_gift`";
		    $displayg=mysqli_query($con,$sql1g);
		    while($rowg = mysqli_fetch_array($displayg)) 
		      {
				  if($rowg['pgf_id']==$rowpd['tag_gift']){
					  
					  echo'<option value="'.$rowg['pgf_id'].'" selected>'.ucfirst($rowg['pgf_name']).'</option>';
				  }
				  else{
					  echo'<option value="'.$rowg['pgf_id'].'">'.ucfirst($rowg['pgf_name']).'</option>';
				  }
				  
			  }
            ?>
 </select>
</div>
</div>

</div>



<div class="col-4">

<div class="row">
<div class="col text-center p-0">
<small>Add to collection:</small>
</div>

<div class="col">
 <select class="form-control" name="collection_tag">
  <option value="0">-- None --</option>
            
			<?php 
			$sql1g = "Select * from `whitefeat_wf_new`.`package_collection`";
		    $displayg=mysqli_query($con,$sql1g);
		    while($rowg = mysqli_fetch_array($displayg)) 
		      {
				  $sql1g2 = "Select * from `whitefeat_wf_new`.`package_collection_link` where id_pack='".$rowpd['id_pack']."' and pc_id='".$rowg['pc_id']."'";
		          $displayg2=mysqli_query($con,$sql1g2);
		          
				  
				  $cct=mysqli_num_rows($displayg2);
				  if($cct>0){
					  $rowg2 = mysqli_fetch_array($displayg2);
					  if($rowg['pc_id']==$rowg2['pc_id']){
				      echo'<option value="'.$rowg['pc_id'].'" selected>'.ucfirst($rowg['pc_name']).'</option>';
					  }
				  }
				  else{
					  echo'<option value="'.$rowg['pc_id'].'">'.ucfirst($rowg['pc_name']).'</option>';
				  }
				  
			  }
            ?>
 </select>
</div>
</div>

</div>





</div>

					
							
							
</div>

				
			 
			 
			 
			 
			 
			 
</div>





<div class="row mt-5" style="">

              <div class="col-12 p-1">
			 <h4 style=" padding:10px; background:rgba(54,167,219,0.7); color:#fff; margin-bottom:10px;">SEO :</h4>
			 </div>


<div class="row col-12">
								 <div class="col-md-6">
								 <label>Package Page Title</label><br>
								 <input type="text" name="title_head" class="form-control" value="">
								 </div>
								 </div>	


<br>
<div class="w-100"></div>
<div class="row col-12" >
								 <div class="col-md-6">
								 <label>Keywords separated by comma (,)</label><br>
								 <textarea style="height:200px;" name="com_head1" class="form-control"></textarea>
								 </div>
								 
								 <div class="col-md-6">
								 <label>Description separated by comma (,)</label><br>
								 <textarea style="height:200px;" name="com_head2" class="form-control"></textarea>
								 </div>
								 </div>								 
			 
			 
			 <div class="w-100"></div>
			 
			 <div class="row col p-3">
			 <h4><u>Meta tags / Header code:</u>  &nbsp; &nbsp;<small><code>( Include search engine code / meta tags etc.) [ HTML Format ]</code></small> </u></h4>
			 <textarea style="width:88%; height:250px;" class="form-control" name="hname"><meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="index, follow">
<meta name="author" content="White Feathers Jewellery"></textarea>
             </div>
</div>










             <div class="row">
			 <div class="col">
			 <input type="submit" value="Create Product" style="" class="p-2 form-control mt-4 btn btn-md btn-block btn-info" id="saveNewPack" >
			  
			 </input>
			 </div>
			 
			 <div class="col-7">&nbsp;</div>
			 </div>
			 
			 
			 
			 
			 
			 </div>
		 </form>
					 
					 
					 
					 
					 
					 <!-- MIUP START -->
					 <div class="row lspace img-upload  " style="display:none;">
					 
					 <div class="container-fluid">
					 <form method='post' action='' enctype="multipart/form-data">
		               <div class="row col">
					   <div class="col-4 p-2">
					 <h1><i class="fas fa-image mb-2" style="font-size:2em;"></i><br>
					 <small style="font-size:1.2rem;" ><p>Upload photos </p></small></h1>
					   
					   <div class="col-12 p-0 mt-2"><input type="file" id='files' name="files[]" multiple class="form-control pl-1 pt-1"></div>
					   
					   <input type="hidden" id="pval" name="pval"></input>
					   
					   
					   </div>
					   
					   
					   <div class="col p-2">
					   <div class="form-group">
					   
					   
					 <h1><i class="fas fa-video mb-2" style="font-size:2em;"></i><br>
					 <small style="font-size:1.2rem;" ><p>Embed video ( <i class="fab fa-youtube"></i>&nbsp; youtube link ) </p></small></h1>
					 
					   
                    <input type="text" name="addvid" class="form-control" id="addvid" placeholder="Embed Video Link"></input>
                  </div>
				  </div>
					   
					   <div class="row col-12 mt-2 pl-3">
		               <input type="button" id="submit" value='Upload' class="btn btn-info btn-sm">
					   </div>
					   
					   
					   
					   </div>
	                 </form>
					 <hr>
					 <button class="col-3 pt-2 btn btn-light img-alert text-danger">( Skip for now )</button>
					 
					 
					 </div>
					 
					 <div class="col-12">
					 <div id="preview"></div>
					 </div>
					 </div>
				
				
				<div class="col-12 progress-status" style="display:none;">
				  <i class="fas fa-3x fa-sync-alt fa-spin"></i>
				  <div class="text-bold pt-2">Uploading...</div>
				</div>
				
				<div class="col-5 callout callout-info alert alert-dismissible bg-info img-alert" style="display:none;">
                  <h6><i class="fas fa-check-circle"></i> Images uploaded successfully! 
				  <button type="btn" class="close" data-dismiss="alert" style="opacity:1;"><i class="fas fa-times-circle" style="color:#fff; opacity:1;"></i></button></h6>
  </div> 
					 
					 
					 <!-- MIUP END -->
                 
				 </div>
				  
				  
				  
				  
				  <!-- start more section -->
				  
				  
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  
				  
				   <div class="row" style="letter-spacing:1px;">


 <div class="col-7">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Regular Tags List</h3>

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
					$query_s = "Select * from `whitefeat_wf_new`.`tags` order by tag_name"; 
                    $display_s = mysqli_query($con,$query_s); $counter=1;		 
                     while($row_s = mysqli_fetch_array($display_s))
			          {
				
				
				
				echo'
				<form class="edit_save_rtag" method="post" enctype="multipart/form-data">
				<input type="hidden" value="'.$row_s['tag_id'].'" name="catval"></input>
				<div class="col">
					<div id="accordion'.$counter.'" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6  class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne'.$counter.'"><i class="fas fa-tag"></i> &nbsp;'.ucfirst($row_s['tag_name']).' </h6></a>
					
                     </div>
					<div id="collapseOne'.$counter.'" class="collapse p-2 bg-light" data-parent="#accordion'.$counter.'" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename'.$row_s['tag_id'].'">Tag name</label>
                    <input type="text" class="form-control" id="newtablename'.$row_s['tag_id'].'" placeholder="Table Name" value="'.ucfirst($row_s['tag_name']).'" name="cat_name">
                  </div>
				  
				    <div class="form-group">
                  
                   
				   
				   
				   
				   
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="'.$row_s['tag_id'].'">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';
                  
				  
			          
				  
				  
				  echo'<button type="button" class="btn btn-block btn-danger del_rtag" data-id="'.$row_s['tag_id'].'"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';
                  
				  
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
  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Add Tag</h3>

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
                    
					<form id="save_rtag_form" method="post" enctype="multipart/form-data" >
				  <div class="form-group">
                    <label for="add_table">Tag  Name</label>
                    <input type="text" class="form-control" id="add_name_tag" name="cat_name" placeholder="Write Name">
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

				  
				  
				  
                  </div>
                  
				  
				  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    
					
					<div class="row" style="letter-spacing:1px;">


 <div class="col-7">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Gift List</h3>

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
					$query_s = "Select * from `whitefeat_wf_new`.`package_gift` order by pgf_name"; 
                    $display_s = mysqli_query($con,$query_s); $counter=1;		 
                     while($row_s = mysqli_fetch_array($display_s))
			          {
				
				
				
				echo'
				<form class="edit_save_gift" method="post" enctype="multipart/form-data">
				<input type="hidden" value="'.$row_s['pgf_id'].'" name="catval"></input>
				<div class="col">
					<div id="accordion'.$counter.'" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6  class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne'.$counter.'"><i class="fas fa-gift"></i> &nbsp;'.ucfirst($row_s['pgf_name']).' </h6></a>
					
                     </div>
					<div id="collapseOne'.$counter.'" class="collapse p-2 bg-light" data-parent="#accordion'.$counter.'" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename'.$row_s['pgf_id'].'">Gift name</label>
                    <input type="text" class="form-control" id="newtablename'.$row_s['pgf_id'].'" placeholder="Table Name" value="'.ucfirst($row_s['pgf_name']).'" name="cat_name">
                  </div>
				  
				    <div class="form-group">
                  
				  <label for="newtablename'.$row_s['pgf_id'].'">Gift Photo</label>
                   <div class="row p-2">
				     <img src="../assets/images/gift/'.$row_s['pgf_image'].'" style="height:80px;"/>
				   </div>
				   
				   <div class="row p-2">
				     <input type="file" class="form-control p-0 pt-1 pl-1" id="add_table" placeholder="Select photo" name="itemimg">
				   </div>
				   
				   
				   
				     <div class="form-group pt-2">
                    <label for="add_table">Gift  Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>';
					
					if($row_s['pgf_video']!=''){
							   echo'<div class="row p-2"><iframe width="200" height="80" src="https://www.youtube.com/embed/'.$row_s['pgf_video'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
							   }
					
					
                    echo'<input type="text" class="form-control" id="add_table" placeholder="Embed Video Link" value="'.$row_s['pgf_video'].'" name="cat_video">
                  </div>
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="'.$row_s['pgf_id'].'">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';
                  
				  
			          
				  
				  
				  echo'<button type="button" class="btn btn-block btn-danger del_gift" data-id="'.$row_s['pgf_id'].'"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';
                
				  
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
  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Add Gift Tag</h3>

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
                    
					<form id="save_gift_form" method="post" enctype="multipart/form-data" >
				  <div class="form-group">
                    <label for="add_table">Gift  Name</label>
                    <input type="text" class="form-control" id="add_name_gift" name="cat_name" placeholder="Write Name">
                  </div>
				    
				  <div class="form-group">
                    <label for="add_table">Gift  Photo <small>( landscape )</small></label>
                    <input type="file" class="form-control p-0 pt-1 pl-1" id="add_photo" name="itemimg" placeholder="Select photo">
                  </div>
				    
				  <div class="form-group">
                    <label for="add_table">Gift  Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>
                    <input type="text" class="form-control" id="add_video" name="cat_video" placeholder="Embed Video Link">
                  </div>
				  
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block add_table" value="Add Gift"></button>
                  </div>
				  </form>
				  
				  
				  
                  
                </div>
              <!-- /.card-body -->
            </div>
 </div>
 

			
			
		


</div>
					
					
                  </div>
                  
				  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    
                    <div class="row" style="letter-spacing:1px;">


 <div class="col-7">



  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Collection List</h3>

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
					$query_s = "Select * from `whitefeat_wf_new`.`package_collection` order by pc_name"; 
                    $display_s = mysqli_query($con,$query_s); $counter=1;		 
                     while($row_s = mysqli_fetch_array($display_s))
			          {
				
				
				
				echo'
				<form class="edit_save_collection" method="post" enctype="multipart/form-data">
				<input type="hidden" value="'.$row_s['pc_id'].'" name="catval"></input>
				<div class="col">
					<div id="accordion'.$counter.'" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6  class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne'.$counter.'"><i class="fas fa-cubes"></i> &nbsp;'.ucfirst($row_s['pc_name']).' </h6></a>
					
                     </div>
					<div id="collapseOne'.$counter.'" class="collapse p-2 bg-light" data-parent="#accordion'.$counter.'" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename'.$row_s['pc_id'].'">Collection name</label>
                    <input type="text" class="form-control" id="newtablename'.$row_s['pc_id'].'" placeholder="Table Name" value="'.ucfirst($row_s['pc_name']).'" name="cat_name">
                  </div>
				  
				    <div class="form-group">
                  
				  <label for="newtablename'.$row_s['pc_id'].'">Collection Photo</label>
                   <div class="row p-2">
				     <img src="../assets/images/collection/'.$row_s['pc_image'].'" style="height:80px;"/>
				   </div>
				   
				   <div class="row p-2">
				     <input type="file" class="form-control p-0 pt-1 pl-1" id="add_table" placeholder="Select photo" name="itemimg">
				   </div>
				   
				   
				   
				     <div class="form-group pt-2">
                    <label for="add_table">Collection Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>';
					
					if($row_s['pc_vid']!=''){
							   echo'<div class="row p-2"><iframe width="200" height="80" src="https://www.youtube.com/embed/'.$row_s['pc_vid'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
							   }
					
					
                    echo'<input type="text" class="form-control" id="add_table" placeholder="Embed Video Link" value="'.$row_s['pc_vid'].'" name="cat_video">
                  </div>
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="'.$row_s['pc_id'].'">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';
                  
				  
			          
				  
				  
				  echo'<button type="button" class="btn btn-block btn-danger del_collection" data-id="'.$row_s['pc_id'].'"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';
                
				  
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
  <div class="card card-light shadow">
              <div class="card-header">
                <h3 class="card-title">Add Collection</h3>

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
                    
					<form id="save_collection_form" method="post" enctype="multipart/form-data" >
				  <div class="form-group">
                    <label for="add_table">Collection  Name</label>
                    <input type="text" class="form-control" id="add_name" name="cat_name_coll" placeholder="Write Name">
                  </div>
				    
				  <div class="form-group">
                    <label for="add_table">Collection  Photo <small>( landscape )</small></label>
                    <input type="file" class="form-control p-0 pt-1 pl-1" id="add_photo_coll" name="itemimg" placeholder="Select photo">
                  </div>
				    
				  <div class="form-group">
                    <label for="add_table">Collection  Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>
                    <input type="text" class="form-control" id="add_video" name="cat_video" placeholder="Embed Video Link">
                  </div>
				  
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block add_table" value="Add Collection"></button>
                  </div>
				  </form>
				  
				  
				  
                  
                </div>
              <!-- /.card-body -->
            </div>
 </div>
 

			
			
		


</div>
		
					
                  </div>
                
				</div>
              </div>
              <!-- /.card -->
            </div>
				
				


 </div>
 

 
</div>

  



	  
	  
	  
	  
	  
	  
	  </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/app.js"></script>
<script src="dist/js/alert.js"></script>



		<div class="modal fade" id="inquiry_modal" role="dialog">
		
    <div class="modal-dialog">
      <div class="modal-content">
		<div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        <div class="modal-body">
          <label>Old password: <i style="color:red">*</i></label><br><input type="password" id="input_old_pass" style="width:80%;" class="form-control"></input><br>
		  <label>New password: <i style="color:red">*</i></label><br><input type="password" id="input_new_pass" style="width:80%;" class="form-control"></input><br>
		  <label>Re-enter New password: <i style="color:red">*</i></label><br><input type="password" id="input_new_pass2" style="width:80%;" class="form-control"></input><br>
        </div>
        <div class="modal-footer justify-content-between" style="text-align:left;">
		  <button type="button" class="btn btn-danger" data-dismiss="modal" id="change_pass">Change Password</button>
        </div>
      </div>
	  </div>
	  </div>
	 

<div class="modal fade bd-example-modal-lg" id="reprint_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="padding-bottom:0; margin-bottom:0">
    <div class="modal-content" style="padding-bottom:0; margin-bottom:0">
      
            <div class="card card-secondary"style="padding-bottom:1em; margin-bottom:0">
              <div class="card-header">
                <h3 class="card-title">Re Print Bill</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-dismiss="modal"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="fetch_bill_reprint" style="margin-bottom:0; padding-bottom:0;">
			  
			  
			  
			  
			  
			  
			  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
	  
	  
	  
    </div>
  </div>
</div>

<a href="" id="r_print" target="_blank"></a>


	<script type="text/javascript">
	$(document).ready(function(){

		$('#submit').click(function(){

			var form_data = new FormData();
			const cookies = document.cookie;
			const productId = <?php echo $_COOKIE['productId']; ?>

			// Read selected files
            var totalfiles = document.getElementById('files').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }
			form_data.append('pval',productId);
			form_data.append('addvid',($('#addvid').val()));
			 //alert($('#pval').val());

                //activate spinner
				$('.img-upload').hide();
				$('.progress-status').show();
                

            // AJAX request
			
			
            $.ajax({
                url: 'ajax_image_save.php',
               	type: 'post',
               	data: form_data,
               	dataType: 'json',
                contentType: false,
                processData: false,
                success: function (res) {
                   //	alert(res);
					$('.progress-status').remove();
									$('.img-upload').remove();
									$('.img-alert').fadeIn('slow');
									
						
                   	
                }
				
            });
			
			/*
			setTimeout(function(){
 	$('.progress-status').remove();
									$('.img-upload').remove();
									$('.img-alert').fadeIn('slow');
}, 60000);//wait 2 seconds
			*/
			
		});
		
		$('.img-alert').click(function(){
		  location.reload(true);	
		});
		
		
		// first form submit 
		
		/* creating new packages */
$(document).on('submit','.save_form1', function(evt){
evt.preventDefault();
var check1=$(".fpnamem").val();
//alert(check1);
if(check1=='')
{
swal({  
		type: "error",
		title: "Incomplete Details!", 
		text: "Please provide all details!",  
		timer: 2000,  
		  });

}
else
{
	//alert('here1');
var formData = new FormData($(this)[0]);
 $.ajax({
    url: 'ajax_package_create1.php',
    type: 'POST',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) { 
	//alert('here');
		  // alert(res);
		   $('#pval').val(res);
		   $('.save_form1').hide();
		   $('.img-upload').fadeIn();
		   
		                     swal({  
		                            type: "success",
		                            title: "Product Created Successfully!", 
		                            text: "You can now upload photos / videos !",  
		                            timer: 3000,  
		                          });
		 
		  
    }
  });
  return false;
}

  });
// for temp cal_days_in_month


$('#pric_b2c').click(function(evt){
	evt.preventDefault(); var finalp=0;
var wt=$('#pro_wt').val();
if(wt>0)
{
	
var pm=$('#pro_metal_type option:selected').val();	
var dcr=$('#dcrater').val();
var dcq=$('#dcrateqty').val();
var mkp=$('#makingpp').val();
var mkg=$('#makinggm').val();
var jarti=$('#jarti').val();
var discount=$('#discount').val();


var dataString = 'pm='+pm+'&wt='+wt+'&dcr='+dcr+'&dcq='+dcq+'&mkp='+mkp+'&mkg='+mkg+'&jarti='+jarti+'&discount='+discount;
//alert(dataString);
$.ajax({
	 type: "POST",
     url: 'ajax_price_cal_temp.php',
     data: dataString,
	 cache: false,
     success: function (result) {
		 //alert(result);
		             var finalp=result;
			//alert(finalp);
			  		// $('#pric_b2c_temp').html(result); 
					 
/*extra calculation */
   if($('#dcrater_bce2').val()!='0' && $('#dcrater_bce2').val()!='' ){
	 var ext=($('#dcrater_bce2').val()*$('#dcrateqty_bce2').val());

   finalp=parseFloat(finalp);
   ext=parseFloat(ext);
   var rr=finalp+ext;
  // alert(rr);
 $('#pric_b2c_temp').html(rr); 

	   
   }
   else{
	   $('#pric_b2c_temp').html(result); 
   }


/*end  extra calculation*/
					 
					 
					 
                          }
});

		// alert(finalp);
//$('#pric_b2c_temp').html(finalp);

//alert(finalp);
 
}
else{alert('Weight is 0');}


		
		
	});

$('#pric_b2b').click(function(evt){
	evt.preventDefault();
var wt=$('#pro_wt').val();
if(wt>0)
{ 
var pm=$('#pro_metal_type option:selected').val();	
var dcr=$('#dcrater_b2b').val();
var dcq=$('#dcrateqty_b2b').val();
var mkp=$('#makingpp_b2b').val();
var mkg=$('#makinggm_b2b').val();
var jarti=$('#jarti_b2b').val();
var discount=$('#discount_b2b').val();

var dataString = 'pm='+pm+'&wt='+wt+'&dcr='+dcr+'&dcq='+dcq+'&mkp='+mkp+'&mkg='+mkg+'&jarti='+jarti+'&discount='+discount+'&str_b2b='+1;
console.log(dataString);
$.ajax({
	 type: "POST",
     url: 'ajax_price_cal_temp.php',
     data: dataString,
	 cache: false,
     success: function (result) {
		 //console.log(result);
		  //alert(result);
		             var finalp=result;
			//alert(finalp);
			  		// $('#pric_b2c_temp').html(result); 
					 
/*extra calculation */
   if($('#dcrater_b2e2').val()!='0' && $('#dcrater_b2e2').val()!='' ){
	 var ext=($('#dcrater_b2e2').val()*$('#dcrateqty_b2e2').val());

   finalp=parseFloat(finalp);
   ext=parseFloat(ext);
   var rr=finalp+ext;
   //alert(rr);
$('#pric_b2b_temp').html(rr); 
	   
   }
   else{
	  $('#pric_b2b_temp').html(result); 
   }


/*end  extra calculation*/
					 
					 
		 
			  		 
					 
					 
                          }
});

}
else{alert('Weight is 0');}


		
		
	});
		
		
		//jquery end
		
	});
	</script>

	<script src="plugins/addon/SunEditor-master/dist/suneditor.min.js" type="text/javascript"></script>	
	 <script>
var suneditor = SUNEDITOR.create('editor',
{
	buttonList: [
    ['undo', 'redo'],
    ['font', 'fontSize', 'formatBlock'],
    ['paragraphStyle', 'blockquote'],
    ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
    ['fontColor', 'hiliteColor', 'textStyle'],
    ['removeFormat'],
    '/', // Line break
    ['outdent', 'indent'],
    ['align', 'horizontalRule', 'list', 'lineHeight'],
    ['table', 'link', 'image', 'video', 'audio' /** ,'math' */], // You must add the 'katex' library at options to use the 'math' plugin.
    /** ['imageGallery'] */ // You must add the "imageGalleryUrl".
    ['fullScreen', 'showBlocks', 'codeView'],
    ['preview', 'print'],
    ['save', 'template']
  ],
	 Width: 600,
	 height:500
	
});
$('#saveNewPack').click(function(){suneditor.save();/*alert('saved');*/});
</script>
</body>
</html>
<?php }?>
