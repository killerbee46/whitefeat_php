<?php 
include('session_control.php');
include('db_connect.php');
                    $queryud = "Select * from `sunsaebn_ct`.`login` where u_id='".$_SESSION['u_id']."'"; 
                    $displayud = mysqli_query($con,$queryud);
		            $rowud=mysqli_fetch_array($displayud);
{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ORDER PANEL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/sweet-alert.css">
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
        <a href="main.php" class="nav-link open_main"><strong><i class="fas fa-shipping-fast"></i> COURIER DASHBOARD</strong></a>
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
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" id="fscreen">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link"  href="#" role="button" id="re_print_bill" data-toggle="modal" data-target="reprint_modal">
          <i class="fas fa-print"></i>
        </a>
      </li>
	  
	  <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
	  
	  
	  
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
           <?php 
		   /*
                    $query = "Select * from `sunsaebn_logs`.`stock` where stock_qty<=notify order by stock_name"; 
                    $display = mysqli_query($con,$query);
		            $ccx=mysqli_num_rows($display);
			             if($ccx>0){echo'<span class="badge badge-warning navbar-badge">'.$ccx.'</span>';}
							 {                    
			*/
			?>
			</a>
        
		<?php 
		/*
		if($ccx>0){
					echo'<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">';
			while($row = mysqli_fetch_array($display)){
		echo'
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <span class="badge badge-warning">Low</span><small>&nbsp; '.$row['stock_name'].'   |&nbsp;<b><code>'.$row['stock_qty'].'</code></b>&nbsp;'; 
			if($row['stock_type']==0){echo'ltr';}if($row['stock_type']==1){echo'kg';}if($row['stock_type']==2){echo'Pis';}
			echo'</small>
            <!--<span class="float-right text-muted text-sm"><i class="fas fa-window-close mr-2"></i></span>-->
          </a>';
		  
			}
			
        echo'</div>';
          }}
		  
		  */
		  ?>
		
      </li>
	  
	  
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
            <i class="fas fa-sign-out-alt mr-2"></i> Logout <small><small style="color:red;">(<?php echo ucfirst($_SESSION['mu_name']); ?>)</small></small>
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
	<strong>CTL</strong>
      <span class="brand-text font-weight-light"> <small><small><small>( city logistics )</small></small></small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
			   
			 
		<?php 
      	
	     
		 if($rowud['qrr_order']=='1'){
		 echo'<li class="nav-item">
            <a href="order.php" class="nav-link open_food">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Orders  <span class="badge badge-success">150</span>
              </p>
            </a>
          </li>';
		 }
		 
		 
		 echo'<li class="nav-item">
            <a href="payment.php" class="nav-link open_food">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Payment Requests  <span class="badge badge-primary">5</span>
              </p>
            </a>
          </li>';
		  
		  
		 echo'<li class="nav-item">
            <a href="ticket.php" class="nav-link open_food">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Tickets <span class="badge badge-warning">2</span>
              </p>
            </a>
          </li>';
		 
		 
		 echo'<li class="nav-item">
            <a href="notice.php" class=" nav-link open_food">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                News & Notices
              </p>
            </a>
          </li>';
			  
		  
		   
			  ?> 
			    
			    <!--<li class="nav-item">
            <a href="#" class="nav-link open_custom">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Custom Entry
              </p>
            </a>
          </li>-->
			   
		  
		  
			  <?php 

			
      		
         echo' <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt" ></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';
			
			
			if($rowud['u_delivery']=='1'){	
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link stock_report">
                  <i class="fas fa-circle nav-icon" style="font-size:0.8em;"></i>
                  <small><p>Delivery Report</p></small>
                </a>
              </li>';
			}
			if($rowud['u_report']=='1'){	
              echo'<li class="nav-item">
                <a href="#" class="nav-link sales_report">
                  <small><i class="fas fa-circle nav-icon" style="font-size:0.8em;"></i>
                  <p>Payment Report</p></small>
                </a>
              </li>';
			}
           
			  echo'
            </ul>
          </li>';
		   
		  
		  
		    if($rowud['qrr_admin']=='1'){
			   echo'<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                 Users mgmt.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link user_mgmt">
                  <small><i class="fas fa-user-shield nav-icon"></i></small>
                  <small><p>System users</p></small>
                </a>
              </li>
			  
			  <!--
			  <li class="nav-item">
                <a href="#" class="nav-link vendor_mgmt">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <small><p>Vendors</p></small>
                </a>
              </li>
			  -->
			  
			  
			  <li class="nav-item">
                <a href="#" class="nav-link customer_mgmt">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <small><p>Customers</p></small>
                </a>
              </li>
              
            </ul>
          </li>';
			}
		  
		  /*
		  if($rowud['a_type']=='1'){
		   echo'<li class="nav-item">
            <a href="#" class="nav-link open_custom">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                System Settings
              </p>
            </a>
          </li>';
		  }
		   */
		   
		  ?>
		  
		
		  
		  
		  <li class="nav-item disabled" style="position:fixed;bottom:0;left:0;" disabled>
                <a href="#" class="nav-link disabled" disabled>
                  <small><small><p>CT Logistics &copy; 2022  <!--Brainchild Technologies--></p></small></small>
                </a>
          </li>

        </ul>
      </nav>
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
	  
	  
	    <div class="card p-2 pl-3" style="overflow:scroll; ">
               
	    <div class="row flex-nowrap">
				  <?php 
				  
				  echo'<div class="col">
				  <a href="order.php" class="btn btn-outline-info  btnplace2 rounded-0" data-id="1" data-city="1" >Kathmandu</a>
				  </div>';
				  
				  $query2 = "Select * from `sunsaebn_ct`.`log_city` order by cityname "; 
                    $display2 = mysqli_query($con,$query2); $sn='2';
		            while($row2=mysqli_fetch_array($display2))
					{
						if($row2['ct_id']=='1'){}
						else{
				  echo'<div class="col">
				  <a href="order_out.php?ct_id='.$row2['ct_id'].'" class="btn '; 
				  if($row2['ct_id']==$_GET['ct_id']){echo'btn-info'; }else{echo'btn-outline-info';}
				  echo' rounded-0 btnplace2" data-id="'.$sn.'" data-city="'.$row2['ct_id'].'">'.$row2['cityname'].'</a>
				  </div>';				  
				    $sn++;
						}
					}
				   ?>
				  
				  
				  
               </div>
			   
			   </div>
			  
	  
	  
	   <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-hover" style="height: 600px; overflow-x:hidden;">
			  <select class="form-control" name="state" id="maxRows" style="display:none;">

  <option value="5000">Show ALL Rows</option>

  <option value="5">5</option>

  <option value="10">10</option>

  <option value="15">15</option>

  <option value="20">20</option>

  <option value="50">50</option>

  <option value="70">70</option>

  <option value="100">100</option>

</select>


                    <div class="row p-2 mb-1 mt-1" style="background-color:#F6EFF6;" > 
					  <div class="col-5 pl-2">
					  <i class="fas fa-info-circle"></i>&nbsp;
					  <span class="letter-spacing">
					  <?php 
					  if(isset($_GET['fdate'])){
						  echo'<small>From date</small> <i>'.$_GET['fdate'].'</i> &nbsp; <small>To date</small> <i>'.$_GET['fdate'].'</i>
						  &nbsp; <small>Filter:</small>&nbsp; <i>';
						  if($_GET['status']=='-1'){echo'NONE';}
						  if($_GET['status']=='0'){echo'New';}
						  if($_GET['status']=='1'){echo'On Delivery';}
						  if($_GET['status']=='4'){echo'Follow-Up';}
						  if($_GET['status']=='3'){echo'Canceled';}
						  if($_GET['status']=='6'){echo'Delete Processing';}
						  if($_GET['status']=='7'){echo'Completed';}
						  
						  
						  echo'</i>';
					  }
					  else{
					  
					    echo 'Showing orders from last <Strong>7 days</strong>';
					  }
					  ?>
					  </span>
					  </div>
					  <div class="col-7">
					   <div class="row">
				      
					  <?php 
					  if(isset($_GET['fdate']))
					  {
						echo'
					  <div class="col-1">From&nbsp;</div>
					  <div class="col"><input type="date" class="form-control from-select-filter" value="'.$_GET['fdate'].'"></div>
					  <div class="col-1">To&nbsp;</div>
					  <div class="col"><input type="date" class="form-control to-select-filter" value="'.$_GET['tdate'].'"></div>
					  <div class="col-2">
					  <select class="form-control status-select-filter">';
					  
					  echo'
					  <option value="-1" '; if($_GET['status']=='-1'){echo'selected';} echo' >All status</option>';
					  echo'
					  <option value="0"  '; if($_GET['status']=='0'){echo'selected';} echo' >New</option>';
					  
					  echo' <option value="1"  '; if($_GET['status']=='1'){echo'selected';} echo'  >On delivery</option>';
					  echo' <option value="4"  '; if($_GET['status']=='4'){echo'selected';} echo'  >Follow-Up</option>';
					  echo' <option value="3"  '; if($_GET['status']=='3'){echo'selected';} echo'  >Canceled</option>';
					  echo' <option value="6"  '; if($_GET['status']=='6'){echo'selected';} echo'  >Delete Request</option>';
					  echo' <option value="7"  '; if($_GET['status']=='7'){echo'selected';} echo'  >Completed</option>';
					  
					  echo'
					  </select>
					  </div>
					  <div class="col-2"><button type="button" class="btn btn-block btn-outline-info btn-filter-go-out ">Filter &nbsp; <i class="fas fa-cubes"></i> </button></div>
					  ';  
						  
					  }
					  else{
						  echo'
					  <div class="col-1">From&nbsp;</div>
					  <div class="col"><input type="date" class="form-control from-select-filter"></div>
					  <div class="col-1">To&nbsp;</div>
					  <div class="col"><input type="date" class="form-control to-select-filter"></div>
					  <div class="col-2">
					  <select class="form-control status-select-filter">
					  <option value="-1">All status</option>
					  <option value="0">New</option>
					  <option value="1">On delivery</option>
					  <option value="4">Follow-Up</option>
					  <option value="3">Canceled</option>
					  <option value="6">Delete Request</option>
					  <option value="7">Completed</option>
					  </select>
					  </div>
					  <div class="col-2"><button type="button" class="btn btn-block btn-outline-info btn-filter-go-out ">Filter &nbsp; <i class="fas fa-cubes"></i> </button></div>
					  ';
					  }
					  
					  
					  ?>
					  
				   </div>
					  
					  </div>
					  
					
					</div>
					
                    <div class="row p-0"  >
					
					
					
					
					<!--
					<div class="col-2 p-0" >
					    
						<?php 
						
					/*	
				    $query1 = "Select * from `sunsaebn_ct`.`log_city_place` where ct_id='".$_GET['ct_id']."'"; 
                    $display1 = mysqli_query($con,$query1); $fc=0;
		            while($row1=mysqli_fetch_array($display1))
					{
						
						if(isset($_GET['area'])){
							if($row1['cp_id']==$_GET['area']){
						echo'<div class="row">
						   <a href="order.php?area='.$row1['cp_id'].'" class="btn btn-info form-control rounded-0 p-0 pt-1 m-0 btnplace">'.ucfirst($row1['cp_name']).'</a>
                             </div>
							 ';
                          							 
						}
						else{
							
							echo'<div class="row">
						   <a href="order.php?area='.$row1['cp_id'].'" class="btn btn-outline-info form-control rounded-0 p-0 pt-1 m-0 btnplace">'.ucfirst($row1['cp_name']).'</a>
                             </div>';
						}
							
						}
						
						else{
						
						if($fc=='0'){
						echo'<div class="row">
						   <a href="order.php" class="btn btn-info form-control rounded-0 p-0 pt-1 m-0 btnplace">'.ucfirst($row1['cp_name']).'</a>
                             </div>';
                          $fc=1;							 
						}
						else{
							
							echo'<div class="row">
						   <a href="order.php?area='.$row1['cp_id'].'" class="btn btn-outline-info form-control rounded-0 p-0 pt-1 m-0 btnplace">'.ucfirst($row1['cp_name']).'</a>
                             </div>';
						}
						}
						
					}
					
					*/
						 ?>
						
					  </div>
                 -->
				 
				 
				 <div class="col-12" style="overflow-x:scroll;">
				 <small style="font-size:0.9rem; font-weight:100;">
                <table class="table table-head-fixed text-nowrap p-0 " id="order_data" >
                  <thead class="p-2" >
                    <tr class="p-2" >
                      <th class="p-2">#ID</th>
                      <th class="p-2">Date</th>
                      <th class="p-2">User</th>
                      <th class="p-2">Item</th>
                      <th class="p-2">Price</th>
                      <th class="p-2">Contact</th>
                      <th class="p-2">Destination</th>
                      <th class="p-2">Landmark</th>
					  <th class="p-2">Status</th>
					  <th class="p-2">Print</th>
					  <th class="p-2">Dispatch</th>
					  <th class="p-2"><i class="fas fa-comments" style="font-size:1.5rem;"></i></th>
                    </tr>
                  </thead>
                  <tbody class="letter-spacing p-0" style="font-size:1.1rem;">
				  
				  <?php
				    
					/*
					$display3='';
					
					if(isset($_GET['area'])){
				    $query3 = "Select * from `sunsaebn_ct`.`log_city_place` where ct_id='1' and cp_id='".$_GET['area']."'"; 
                    $display3 = mysqli_query($con,$query3);
      				}
					else
					{
					$query3 = "Select * from `sunsaebn_ct`.`log_city_place` where ct_id='1' limit 1"; 
                    $display3 = mysqli_query($con,$query3);
					}

					
		            $row3=mysqli_fetch_array($display3);
					
					*/
					
					echo'<input type="hidden" value="'.$_GET['ct_id'].'" class="cpid"/>';
					echo'<a href="#" id="search_hit"></a>';
					
					$query4='';
					
				     if(isset($_GET['fdate'])){
						 
						 if($_GET['status']=='-1'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' order by lo_id DESC "; 
						 }
						 if($_GET['status']=='0'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' and status='0' order by lo_id DESC "; 
						 }
						 if($_GET['status']=='1'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' and status='1' order by lo_id DESC "; 
						 }
						 if($_GET['status']=='4'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' and status='4' order by lo_id DESC "; 
						 }
						 if($_GET['status']=='3'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' and status='3' order by lo_id DESC "; 
						 }
						 if($_GET['status']=='-6'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' and status='6' order by lo_id DESC "; 
						 }
						 if($_GET['status']=='-7'){
							 $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '".$_GET['fdate']."' and entry_date <= '".$_GET['tdate']."' and status='7' order by lo_id DESC "; 
						 }
						 
						 
					 }	
					 else{
						 
						 $today=date("Y-m-d",strtotime("-7 days"));
						 
				         $query4 = "Select * from `sunsaebn_ct`.`log_order` where ct_id='".$_GET['ct_id']."' and entry_date >= '$today' order by lo_id DESC "; 
					 }
					 
                    $display4 = mysqli_query($con,$query4); 
		            while($row4=mysqli_fetch_array($display4)){
						
						if($row4['status']!=6){
				  echo'
                    <tr '; 
					if($row4['status']==0){
						//echo'style="background-color:#ECECEC;"';
					}
					if($row4['status']==1){echo'style="background-color:rgba(64,137,50,0.2)"';}
					if($row4['status']==4){echo'style="background-color:rgba(20,134,155,0.3)"';}
					if($row4['status']==3){echo'style="background-color:rgba(247,0,0,0.5)"';}
					if($row4['status']==7){echo'style="background-color:rgba(5,139,49,0.5)"';}
					
					echo'>
                       <td class="p-2"><small>'; echo $row4['lo_id'].'&nbsp; ';
                       if($row4['status']==0){echo'<small><span class="badge badge-info">new</span></small>';}
					   echo'</small></td>
                       <td class="p-2"><small><small>'.$row4['entry_date'].'</small></small></td>
                       <td class="p-2"><small>'; 
					   
					$query5 = "Select * from `sunsaebn_ct`.`log_vadmin` where va_id='".$row4['va_id']."' "; 
                    $display5 = mysqli_query($con,$query5); 
		            $row5=mysqli_fetch_array($display5);
					
					echo $row5['a_username'];
					   
					   echo'</small></td>
                       <td class="p-2"><small><small style="font-size:0.7rem;">'.$row4['item_name'].'</small></small></td>
                       <td class="p-2"><small>Rs '.$row4['item_price'].'</small> </td>
                       <td class="p-2"><small>'.$row4['customer_no'].'</small></td>
                       <td class="p-2"><small>Kathmandu</small></td>
                       <td class="p-2"><small><small style="font-size:0.7rem;">'.$row4['landmark'].'</small></small></td>
                       <td class="p-2">
					   
					   <div class="row">
					   <div class="col">
					   <small><select class="set_order_status_sel" data-id="'.$row4['lo_id'].'">';
					  
 					   echo'<option value="0" '; if($row4['status']==0){echo'selected';} echo' disabled >Select</option>';
					   echo'<option value="1" '; if($row4['status']==1){echo'selected';} echo' disabled >Delivery</option>';
					   echo'<option value="4" '; if($row4['status']==4){echo'selected';} echo' >Follow up</option>';
					   echo'<option value="3" '; if($row4['status']==3){echo'selected';} echo' >Canceled</option>';
					   echo'<option value="7" '; if($row4['status']==7){echo'selected';} echo' >Completed</option>';
					   
					   
					   echo'</select></small>';
					   if($row4['status']==7 || $row4['status']==3 ){}else{
					   echo' <button class="btn btn-outline-info btn-xs p-2 set_order_status" data-id="'.$row4['lo_id'].'">Set</button>';
					   }
					   echo'
					   </div>
					   </div>
					   
					   </td>
					   
					   <td class="p-2">';
					   if($row4['status']==7  || $row4['status']==3){}else{
					   echo'<button class="btn btn-light btn-xs p-2 pos-print" data-id="'.$row4['lo_id'].'"';?>
                  onclick="window.open('<?php echo'pos.php?id='.$row4['lo_id'];?>', 
                         'newwindow', 
                         'width=640,height=480'); 
              return false;"  title="POS PRINT"

                     <?php echo' ><i class="fas fa-check success-pos" data-id="'.$row4['lo_id'].'" style="';
                        if($row4['pos_print']==1){}else{echo'display:none;';}

					 echo'"></i>&nbsp; POS &nbsp;<i class="fas fa-print"></i> </button> ';
					   }
					   echo'</td>
					   
                       <td class="p-2">';
					   if($row4['status']==7  || $row4['status']==3){}else{

                    $query3x = "Select count(*) from `sunsaebn_ct`.`tran_dp` where lo_id='".$row4['lo_id']."' "; 
                    $display3x = mysqli_query($con,$query3x); 
		            $row3x=mysqli_num_rows($display3x);

						   
						   if($row4['status']==1 || $row3x>0){
							  echo'<button class="btn btn-light btn-sm dp-cog"  data-toggle="modal" data-target="#snd_delivery_edit" data-id="'.$row4['lo_id'].'" ><i class="fas fa-cog"></i></button><Br>';
							  
				    $query3x = "Select dp_id from `sunsaebn_ct`.`tran_dp` where lo_id='".$row4['lo_id']."' "; 
                    $display3x = mysqli_query($con,$query3x); 
		            $row3x=mysqli_fetch_array($display3x);
					             
					$query3x1 = "Select username from `sunsaebn_ct`.`dperson` where dp_id='".$row3x['dp_id']."' "; 
                    $display3x1 = mysqli_query($con,$query3x1); 
		            $row3x1=mysqli_fetch_array($display3x1);
								echo '<small><small>('.$row3x1['username'].')</small></small>'; 
							  }
					       else{
					   echo'
					   <button class="btn btn-outline-success btn-sm dispatch" data-toggle="modal" data-target="#snd_delivery" data-id="'.$row4['lo_id'].'" ><i class="fas fa-check-circle"></i></button>
					   <button class="btn btn-light btn-sm dp-cog" style="display:none;" data-toggle="modal" data-target="#snd_delivery_edit" data-id="'.$row4['lo_id'].'" ><i class="fas fa-cog"></i></button>';
						
					   }
					   }
					   echo'</td>
					   <td class="p-2">';
					   if($row4['status']==7 ){}else{
					   
					   echo '<button class="btn btn-xs btn-outline-info p-2 dp-view-msg" data-toggle="modal" data-target="#snd_delivery_edit_msg" data-id="'.$row4['lo_id'].'" >View';
                    $query6 = "Select * from `sunsaebn_ct`.`log_dp_msg` where lo_id='".$row4['lo_id']."' "; 
                    $display6 = mysqli_query($con,$query6); 
		            $count6=mysqli_num_rows($display6);				  
                           if($count6>0){echo'
					  <span class="badge">'.$count6.'</span>';}
					   echo'</button>';
					   }
					   echo'</td>
					 
                    </tr>
					';
					}
					else{
						 
					echo'<tr class="bg-warning p-2 del-row" data-id="'.$row4['lo_id'].'">
                       <td class="p-2"><i class="fas fa-trash-alt bg-warning p-1"></i>&nbsp; <small>'.$row4['lo_id'].'</small></td>
                       <td class="p-2"><small><small>'.$row4['entry_date'].'</small></small></td>
                       <td class="p-2"><small>'; 
					   
					   $query5 = "Select * from `sunsaebn_ct`.`log_vadmin` where va_id='".$row4['va_id']."' "; 
                    $display5 = mysqli_query($con,$query5); 
		            $row5=mysqli_fetch_array($display5);
					
					echo $row5['a_username'];
					   
					   echo'</small></td>
                       <td class="p-2"><small><small style="font-size:0.7rem;">'.$row4['item_name'].'</small></small></td>
                       <td class="p-2"><small>Rs '.$row4['item_price'].'</small> </td>
                       <td class="p-2"><small><small style="font-size:0.7rem;">'.$row4['customer_no'].'</small></small></td>
                       <td class="p-2"><small>Kathmandu</small></td>
                       <td class="p-2"><small><small style="font-size:0.7rem;">'.$row4['landmark'].' </small></small></td>
                       <td class="p-2" colspan=4>
					   <div class="row">
					   <button class="btn btn-success btn-xs p-2 letter-spacing approve-del" data-id="'.$row4['lo_id'].'">APPROVE DELETE?</button> &nbsp;  &nbsp; 
					 <a class="btn btn-warning btn-xs p-2 call-vendor" data-id="'.$row4['lo_id'].'" style="background:rgba(0,0,0,0.1);" title="call +977" href="tel:+977-'; 
					 echo $row5['va_no'];
					 
					 echo'"><i class="fas fa-phone-square-alt"></i> &nbsp; Call vendor</a>
					   </div>
					   <!--<div class="row mt-2">
					   <span class="badge letter-spacing" style="background:rgba(255,255,255,0.2); font-weight:100;">984111111</span>
					   </div>-->
					   </td>
					   
					 
                    </tr>';
                    
					  }
					}
				  
				  ?>
				  
				  
					
					
					
                  </tbody>
                </table>
				</small>
				
				</div>
				
				</div>
					
				
				
              </div>
			  
			  
			  
			  <div class="row p-2">
				
				<div class="col-2">&nbsp;</div>
				
				<div class="col-10 pl-0">
			  <div class="pagination-container">

  <nav>
  

    <ul class="pagination pagination-sm m-0 ">

      <li data-page="prev" class="page-item">

      <span class="page-link" > « <span class="sr-only">(current)</span></span>

      </li>

 

      <li data-page="next" id="prev" class="page-item">

      <span class="page-link" > » <span class="sr-only">(current)</span></span>

      </li>

    </ul>

  </nav>

</div>
</div>


</div>	
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
<script src="dist/js/app.js"></script>
<script src="dist/js/alert.js"></script>



<a href="" id="r_print" target="_blank"></a>

<script>
$('#pushmenu_link').trigger("click");
</script>

<script>
	getPagination('#order_data');
	var turn=0;
	$('.btnplace2').click(function(){
		
		if(turn=='0'){$(this).addClass('btn-secondary');$(this).css({'color':'#fff'}); turn=$(this).attr("data-id");}
		else{ 
		  if(turn==($(this).attr("data-id"))){}
		  else{
		  $(this).addClass('btn-secondary'); $(this).css({'color':'#fff'}); $('.btnplace2[data-id="'+turn+'"]').removeClass('btn-secondary'); $('.btnplace2[data-id="'+turn+'"]').css({'color':'#007BFF'}); turn=$(this).attr("data-id");
		  }
		}		
		
	});
</script>


	  <!-- DELEVIERY PERSON -->
		<div class="modal fade" id="snd_delivery" role="dialog" style="padding-top:12%;">
    <div class="modal-dialog modal-default">
      <div class="modal-content">
        <div class="modal-header" style="text-align:left; background-color:rgba(20,137,158,0.8);">
		<h4 class="modal-title" style="color:#fff;">Delivery Selection</h4>
          <button type="button" class="close" data-dismiss="modal" style="opacity:1; color:#fff;">&times;</button>
          
        </div>
        <div class="modal-body">
		
          <label>Select Delivery Person <i style="color:red">*</i></label><br>
		  <select class="form-control" id="dp_select">
		  
		  <option value="0" disabled selected>Select Person</option>
		  
		  <?php 
		  
		       $queryp = "Select * from `sunsaebn_ct`.`dperson` where status='1' order by name "; 
               $displayp = mysqli_query($con,$queryp);
              while( $rowp = mysqli_fetch_array($displayp)){
			  echo '<option value="'.$rowp['dp_id'].'">'.$rowp['username'].'</option>';}
		  
		  ?>
		  
		  
		  </select>
		  
		  <br>
		  <label>
		  Message for delivery person
		  </label>
		  <textarea class="form-control" id="dp_text" ></textarea>
		  
        </div>
        <div class="modal-footer bg-light" style="text-align:center; ">
		  <button type="button" class="btn btn-default" style="color:#008D4C" id="ndispatch">Dispatch Delivery <i class="fa fa-check-circle"></i></button>
        </div>
      </div>
	  </div>
	  </div>
	  <!-- SUPPLIER -->
	  
 
	  <!-- DELEVIERY PERSON EDIT -->
		<div class="modal fade" id="snd_delivery_edit" role="dialog" style="padding-top:12%;">
    <div class="modal-dialog modal-default">
      <div class="modal-content">
        <div class="modal-header " style="background-color:rgba(20,137,158,0.8);">
          <h4 class="modal-title" style="color:#fff;">Delivery Selection</h4>
		  <button type="button" class="close" data-dismiss="modal" style="opacity:1; color:#fff;">&times;</button>
          
        </div>
		<div id="fetch_dp_edit">
        
		</div>
      </div>
	  </div>
	  </div>
	  <!-- SUPPLIER --> 
	  
	  
	  <!-- DELEVIERY PERSON EDIT -->
		<div class="modal fade" id="snd_delivery_edit_msg" role="dialog">
    <div class="modal-dialog modal-default">
      <div class="modal-content">
        <div class="modal-header" style="background-color:rgba(20,137,158,0.8);">
          <h4 class="modal-title" style="color:#fff;">Delivery Conversation </h4>
		  <button type="button" class="close" data-dismiss="modal" style="opacity:1; color:#fff;">&times;</button>
          
        </div>
		<div id="fetch_dp_edit_msg_view">
        
		</div>
      </div>
	  </div>
	  </div>
	  <!-- SUPPLIER --> 
	  
	  

</body>
</html>
<?php }?>