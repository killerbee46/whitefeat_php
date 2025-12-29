<?php
include('session_control.php');
include('db_connect.php');
include('make_url.php');
include('../header-functions.php');
$queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='" . $_SESSION['u_id'] . "'";
$displayud = mysqli_query($con, $queryud);
$rowud = mysqli_fetch_array($displayud); { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Order Panel</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
				left: 5px;
			}

			.Hunter-pop-up:after {
				border-color: transparent transparent #c9cbce;
				top: -20px;
				left: 5px;
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
				z-index: 1000;
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
				padding-bottom: 0;
				padding-left: 0.6em;
				padding-right: 0.6em;

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
						<a class="nav-link" data-widget="pushmenu" href="#" role="button" id="pushmenu_link"><i
								class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="main.php" class="nav-link open_main"><strong><i class="fas fa-home"></i>
								DASHBOARD</strong></a>
					</li>
				</ul>

				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">

					<li class="nav-item">
						<a class="nav-link btn btn-light" href="../" target="_blank" role="button" id="">
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
								<input id="toggle-light" class="light-button" type="checkbox" data-toggle="toggle"
									data-size="xs" data-onstyle="secondary">
							</a>


							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item" data-toggle="modal" data-target="#inquiry_modal">
								<i class="fas fa-lock mr-2"></i> Change password
							</a>
							<div class="dropdown-divider"></div>
							<a href="logout.php" class="dropdown-item">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout <small><small
										style="color:red;">(<?php echo ucfirst($rowud['u_name']); ?>)</small></small>
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
					<span class="brand-text font-weight-light"> <small><small><small>( White Feather
									)</small></small></small></span>
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
									<h5><i class="fas fa-cubes"></i> Order Mgmt. Area
										<button type="button" class="close" data-dismiss="alert"
											aria-hidden="true">×</button>
									</h5>
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
											<button type="button" class="btn btn-tool" data-card-widget="maximize"><i
													class="fas fa-expand"></i>
											</button>
										</div>
										<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="custom-tabs-four-home-tab-stock"
													data-toggle="pill" href="#custom-tabs-four-home-stock" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-file"></i> New Orders</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
													href="#custom-tabs-four-home" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-edit"></i> On Delivery</a>
											</li>
											<li class="nav-item">
												<a class="nav-link stock_direct_open" id="custom-tabs-four-profile-tab"
													data-toggle="pill" href="#custom-tabs-four-profile" role="tab"
													aria-controls="custom-tabs-four-profile" aria-selected="false"><i
														class="fas fa-cogs"></i> Delivered</a>
											</li>
											<li class="nav-item">
												<a class="nav-link stock_direct_open" id="custom-tabs-four-messages-tab"
													data-toggle="pill" href="#custom-tabs-four-messages" role="tab"
													aria-controls="custom-tabs-four-messages" aria-selected="false"><i
														class="fas fa-exclamation-triangle text-danger"></i> Cancel
													Requested</a>
											</li>


										</ul>

									</div>

									<div class="card-body">
										<div class="tab-content" id="custom-tabs-four-tabContent">

											<div class="tab-pane fade active show p-1" id="custom-tabs-four-home-stock"
												role="tabpanel" aria-labelledby="custom-tabs-four-home-tab-stock">








												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2">
														ID.
													</div>
													<div class="col-2">
														Date
													</div>
													<div class="col-1">
														<small>QTY</small>
														<small><small><small>(cart)</small></small></small>
													</div>
													<div class="col-2 text-center">
														Total Price
													</div>
													<div class="col-5 text-left pl-2">
														Actions
													</div>

												</div>


												<?php

												$noNosepin = " and email <> 'offer-nosepin' ";

												$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='0' and c_request='0' " . $noNosepin . " order by cb_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												$apporder = false;
												while ($rowol = mysqli_fetch_array($displayol)) {
													$apporder = $rowol['c_id'] == 0;
													$tempProd = json_decode($rowol['cookie_id'], true);
													$products = $apporder ? $tempProd['products'] : [];
													echo '<div class="row orders-list order-secondary mb-2';
													//if(($sn%2)==0){echo'order-secondary';}
													echo '" style=" border:1px solid #eee;">
						  <div class="col-2">
						    <span class="badge badge-secondary">NEW</span>';
													// for user order checking
													$queryol1 = "Select * from `whitefeat_wf_new`.`customer` where c_id =" . $rowol['c_id'] . "";
													$displayol1 = mysqli_query($con, $queryol1);
													$rowol1 = mysqli_fetch_array($displayol1);
													if (isset($rowol1['b2b']) && $rowol1['b2b'] == '1') {
														echo '&nbsp;<span class="badge badge-danger"><i class="fas fa-star"></i>&nbsp; B2B</span>';
													} else {
														echo '&nbsp;<span class="badge badge-warning"><i class="fas fa-star"></i>&nbsp; B2C</span>';
													}
													echo '<div style="margin:5px auto;text-transform:capitalize;">' . $rowol['name'] . '<br />' . $rowol['cno'] . '</div>';
													echo '<br>#WFO-' . $rowol['cb_id'];
													if ($rowol['mode'] == '1') {
														echo '&nbsp;<span class="badge badge-secondary">COD</span>';
													}
													if ($rowol['mode'] == '2') {
														echo '&nbsp;<span class="badge badge-info">KHALTI</span>';
													}
													if ($rowol['mode'] == '3') {
														echo '&nbsp;<span class="badge badge-success">ESEWA</span>';
													}
													echo '
						  </div>
						  <div class="col-2">
						   ';
						   echo $apporder == 1 ? date_format(date_create($rowol['book_date']),"Y-m-d") : $rowol['p_date'];
						   echo '
						  </div>
						  <div class="col-1" style="text-align:center">
						  <code>';


													$sql1acw = "Select qty from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "' ";
													$displayacw = mysqli_query($con, $sql1acw);
													$tqty = 0;
													if ($apporder) {
														foreach ($products as $prod) {
															$tqty += $prod['quantity'];
														}
													} else {
														while ($rowcw = mysqli_fetch_array($displayacw)) {
															$tqty += $rowcw['qty'];
														}
													}
													echo $tqty;

													echo '</code> 
						  </div>
						  <div class="col-2 text-center">';
													$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $rowol['cur_id'] . "'";
													$displaycrc2 = mysqli_query($con, $sqlcrc2);
													$rowcrc2 = mysqli_fetch_array($displaycrc2);
													$cnot = $rowcrc2['cur_name'];
													$crate = (1 / $rowcrc2['cur_rate']);

													$sqlckp = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
													$displayckp = mysqli_query($con, $sqlckp);
													if ($apporder) {
														if($rowol['p_amount'] == 0){
															foreach ($products as $prod) {
															$total_net += ($prod['quantity'] * $prod['dynamic_price']);
														}
														} else{
															$total_net = $rowol['p_amount'];
														}
													} else {
														while ($rowckp = mysqli_fetch_array($displayckp)) {
														$total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
													}
													}
													

													echo $cnot . ' ' . floor(($crate * $total_net));


													echo '</div>
						  <div class="col-5 text-left">
						    <div class="row">
							 <div class="col-3">
                               <a href="../bill/' . $rowol['cb_id'] . '" target="_blank"><button type="button" class="btn btn-small btn-outline-secondary no-border ">
							   <i class="fas fa-file-alt" data-toggle="tooltip" title="View invoice"></i>
							   Invoice
							   </button></a>
							 </div>
							 
							 <div class="col-4">
                               <button type="button" class="btn btn-small btn-outline-secondary no-border dispatch_delivery"
							   data-ref="' . $rowol['cb_id'] . '">
							   <i class="fas fa-motorcycle" data-toggle="tooltip" title="Dispatch for delivery"></i>
							   Dispatch
							   </button>
							 </div>
							 <div class="col-5">
                               <button type="button" class="btn btn-small btn-outline-danger no-border cancel_order"
							   data-ref="' . $rowol['cb_id'] . '>
							   <i class="fas fa-exclamation-triangle" data-toggle="tooltip" title="Cancel order request"></i> Cancel Request
							   </button>
							 </div>
							
							</div>
						   
						   
						  </div>
						  
						  <div class="col-12 pt-2 pb-2" style="margin-top:10px;border-top:1px solid #fafafa;">';
													if ($apporder) {
														foreach ($products as $prod) {
															echo '<h6 style="" class="p-2"><small><small>';

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $prod['s_path'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($prod['title']) . ' - <b>Qty: ' . $prod['quantity'] . '  &nbsp; </b><span><a href="../' . make_url($prod['id']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													} else {
														$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
														$displayckp1 = mysqli_query($con, $sqlckp1);
														while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
															echo '<h6 style="" class="p-2"><small><small>';
															$sqlckp2 = fetchProduct($rowckp1['id_pack']);
															$displayckp2 = mysqli_query($con, $sqlckp2);
															$rowckp2 = mysqli_fetch_array($displayckp2);

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowckp2['image'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($rowckp1['p_name']) . ' - <b>Qty: ' . $rowckp1['qty'] . '  &nbsp; </b><span><a href="../' . make_url($rowckp1['id_pack']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													}

													echo '
						</div>
						  
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No new orders to display !</p>';
												}
												?>















											</div>


























											<div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
												aria-labelledby="custom-tabs-four-home-tab">


												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2">
														ID.
													</div>
													<div class="col-2">
														Date
													</div>
													<div class="col-1">
														<small>QTY</small>
														<small><small><small>(cart)</small></small></small>
													</div>
													<div class="col-2 text-center">
														Total Price
													</div>
													<div class="col-5 text-left pl-2">
														Actions
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='0' and c_request='0' " . $noNosepin . " order by cb_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												$apporder = false;
												while ($rowol = mysqli_fetch_array($displayol)) {
													$apporder = $rowol['c_id'] == 0;
													$tempProd = json_decode($rowol['cookie_id'], true);
													$products = $apporder ? $tempProd['products'] : [];
													echo '<div class="row orders-list order-secondary mb-2';
													//if(($sn%2)==0){echo'order-secondary';}
													echo '" style=" border:1px solid #eee;">
						  <div class="col-2">
						    <span class="badge badge-secondary">NEW</span>';
													// for user order checking
													$queryol1 = "Select * from `whitefeat_wf_new`.`customer` where c_id =" . $rowol['c_id'] . "";
													$displayol1 = mysqli_query($con, $queryol1);
													$rowol1 = mysqli_fetch_array($displayol1);
													if (isset($rowol1['b2b']) && $rowol1['b2b'] == '1') {
														echo '&nbsp;<span class="badge badge-danger"><i class="fas fa-star"></i>&nbsp; B2B</span>';
													} else {
														echo '&nbsp;<span class="badge badge-warning"><i class="fas fa-star"></i>&nbsp; B2C</span>';
													}
													echo '<div style="margin:5px auto;text-transform:capitalize;">' . $rowol['name'] . '<br />' . $rowol['cno'] . '</div>';
													echo '<br>#WFO-' . $rowol['cb_id'];
													if ($rowol['mode'] == '1') {
														echo '&nbsp;<span class="badge badge-secondary">COD</span>';
													}
													if ($rowol['mode'] == '2') {
														echo '&nbsp;<span class="badge badge-info">KHALTI</span>';
													}
													if ($rowol['mode'] == '3') {
														echo '&nbsp;<span class="badge badge-success">ESEWA</span>';
													}
													echo '
						  </div>
						  <div class="col-2">
						   ';
						   echo $apporder == 1 ? date_format(date_create($rowol['book_date']),"Y-m-d") : $rowol['p_date'];
						   echo '
						  </div>
						  <div class="col-1" style="text-align:center">
						  <code>';


													$sql1acw = "Select qty from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "' ";
													$displayacw = mysqli_query($con, $sql1acw);
													$tqty = 0;
													if ($apporder) {
														foreach ($products as $prod) {
															$tqty += $prod['quantity'];
														}
													} else {
														while ($rowcw = mysqli_fetch_array($displayacw)) {
															$tqty += $rowcw['qty'];
														}
													}
													echo $tqty;

													echo '</code> 
						  </div>
						  <div class="col-2 text-center">';
													$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $rowol['cur_id'] . "'";
													$displaycrc2 = mysqli_query($con, $sqlcrc2);
													$rowcrc2 = mysqli_fetch_array($displaycrc2);
													$cnot = $rowcrc2['cur_name'];
													$crate = (1 / $rowcrc2['cur_rate']);

													$sqlckp = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
													$displayckp = mysqli_query($con, $sqlckp);
													if ($apporder) {
														if($rowol['p_amount'] == 0){
															foreach ($products as $prod) {
															$total_net += ($prod['quantity'] * $prod['dynamic_price']);
														}
														} else{
															$total_net = $rowol['p_amount'];
														}
													} else {
														while ($rowckp = mysqli_fetch_array($displayckp)) {
														$total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
													}
													}
													

													echo $cnot . ' ' . floor(($crate * $total_net));

													echo '</div>
						  <div class="col-5 text-left">
						    <div class="row">
							 
							 
							 <div class="col-5">
							 
							 <button type="button" class="btn btn-small btn-outline-success no-border delivered_order"
							   data-ref="' . $rowol['cb_id'] . ' data-toggle="tooltip" title="Mark as delivered">
							   <i class="fas fa-check-circle" ></i>
							  Mark as delivered</button>
							 </div>
							 
							 <div class="col-3">
                               <a href="../bill/' . $rowol['cb_id'] . '" target="_blank"><button type="button" class="btn btn-small btn-outline-secondary no-border ">
							   <i class="fas fa-file-alt" data-toggle="tooltip" title="View invoice"></i>
							   Invoice
							   </button></a>
							 </div>
							 
							 <div class="col-4">
                               <button type="button" class="btn btn-small btn-outline-danger no-border cancel_order"
							   data-ref="' . $rowol['cb_id'] . '>
							   <i class="fas fa-exclamation-triangle" data-toggle="tooltip" title="Cancel order request"></i> Cancel Request
							   </button>
							 </div>
							
							</div>
						   
						   
						  </div>
						  
						  <div class="col-12 pt-2 pb-2" style="margin-top:10px;border-top:1px solid #fafafa;">';
													if ($apporder) {
														foreach ($products as $prod) {
															echo '<h6 style="" class="p-2"><small><small>';

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $prod['s_path'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($prod['title']) . ' - <b>Qty: ' . $prod['quantity'] . '  &nbsp; </b><span><a href="../' . make_url($prod['id']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													} else {
														$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
														$displayckp1 = mysqli_query($con, $sqlckp1);
														while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
															echo '<h6 style="" class="p-2"><small><small>';
															$sqlckp2 = fetchProduct($rowckp1['id_pack']) ;
															$displayckp2 = mysqli_query($con, $sqlckp2);
															$rowckp2 = mysqli_fetch_array($displayckp2);

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowckp2['image'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($rowckp1['p_name']) . ' - <b>Qty: ' . $rowckp1['qty'] . '  &nbsp; </b><span><a href="../' . make_url($rowckp1['id_pack']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													}

													echo '
						</div>
						  
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No delivery orders to display !</p>';
												}
												?>











											</div>

















											<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
												aria-labelledby="custom-tabs-four-profile-tab">


												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2">
														ID.
													</div>
													<div class="col-2">
														Date
													</div>
													<div class="col-1">
														<small>QTY</small>
														<small><small><small>(cart)</small></small></small>
													</div>
													<div class="col-2 text-center">
														Total Price
													</div>
													<div class="col-5 text-left pl-2">
														Actions
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and deliver='1' and c_request='0' " . $noNosepin . " order by cb_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												$apporder = false;
												while ($rowol = mysqli_fetch_array($displayol)) {
													$apporder = $rowol['c_id'] == 0;
													$tempProd = json_decode($rowol['cookie_id'], true);
													$products = $apporder ? $tempProd['products'] : [];
													echo '<div class="row orders-list order-secondary mb-2';
													//if(($sn%2)==0){echo'order-secondary';}
													echo '" style=" border:1px solid #eee;background-color:#bee5b2;">
						  <div class="col-2">
						    <span class="badge badge-secondary">NEW</span>';
													// for user order checking
													$queryol1 = "Select * from `whitefeat_wf_new`.`customer` where c_id =" . $rowol['c_id'] . "";
													$displayol1 = mysqli_query($con, $queryol1);
													$rowol1 = mysqli_fetch_array($displayol1);
													if (isset($rowol1['b2b']) && $rowol1['b2b'] == '1') {
														echo '&nbsp;<span class="badge badge-danger"><i class="fas fa-star"></i>&nbsp; B2B</span>';
													} else {
														echo '&nbsp;<span class="badge badge-warning"><i class="fas fa-star"></i>&nbsp; B2C</span>';
													}
													echo '<div style="margin:5px auto;text-transform:capitalize;">' . $rowol['name'] . '<br />' . $rowol['cno'] . '</div>';
													echo '<br>#WFO-' . $rowol['cb_id'];
													if ($rowol['mode'] == '1') {
														echo '&nbsp;<span class="badge badge-secondary">COD</span>';
													}
													if ($rowol['mode'] == '2') {
														echo '&nbsp;<span class="badge badge-info">KHALTI</span>';
													}
													if ($rowol['mode'] == '3') {
														echo '&nbsp;<span class="badge badge-success">ESEWA</span>';
													}
													echo '
						  </div>
						  <div class="col-2">
						   ';
						   echo $apporder == 1 ? date_format(date_create($rowol['book_date']),"Y-m-d") : $rowol['p_date'];
						   echo '
						  </div>
						  <div class="col-1" style="text-align:center">
						  <code>';


													$sql1acw = "Select qty from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "' ";
													$displayacw = mysqli_query($con, $sql1acw);
													$tqty = 0;
													if ($apporder) {
														foreach ($products as $prod) {
															$tqty += $prod['quantity'];
														}
													} else {
														while ($rowcw = mysqli_fetch_array($displayacw)) {
															$tqty += $rowcw['qty'];
														}
													}
													echo $tqty;

													echo '</code> 
						  </div>
						  <div class="col-2 text-center">';
													$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $rowol['cur_id'] . "'";
													$displaycrc2 = mysqli_query($con, $sqlcrc2);
													$rowcrc2 = mysqli_fetch_array($displaycrc2);
													$cnot = $rowcrc2['cur_name'];
													$crate = (1 / $rowcrc2['cur_rate']);

													$sqlckp = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
													$displayckp = mysqli_query($con, $sqlckp);
													if ($apporder) {
														if($rowol['p_amount'] == 0){
															foreach ($products as $prod) {
															$total_net += ($prod['quantity'] * $prod['dynamic_price']);
														}
														} else{
															$total_net = $rowol['p_amount'];
														}
													} else {
														while ($rowckp = mysqli_fetch_array($displayckp)) {
														$total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
													}
													}
													

													echo $cnot . ' ' . floor(($crate * $total_net));

													echo '</div>
						  <div class="col-5 text-left">
						    <div class="row">
							 
							 
							 <div class="col-5">
							 
							   <i class="fas fa-check-circle" ></i>
							  Order Delivered
							 </div>
							 
							 <div class="col-3">
                               <a href="../bill/' . $rowol['cb_id'] . '" target="_blank"><button type="button" class="btn btn-small btn-light  ">
							   <i class="fas fa-file-alt" data-toggle="tooltip" title="View invoice"></i>
							   Invoice
							   </button></a>
							 </div>
							 
							
							</div>
						   
						   
						  </div>
						  
						  <div class="col-12 pt-2 pb-2" style="margin-top:10px;border-top:1px solid #fafafa;">';
													if ($apporder) {
														foreach ($products as $prod) {
															echo '<h6 style="" class="p-2"><small><small>';

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $prod['s_path'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($prod['title']) . ' - <b>Qty: ' . $prod['quantity'] . '  &nbsp; </b><span><a href="../' . make_url($prod['id']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													} else {
														$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
														$displayckp1 = mysqli_query($con, $sqlckp1);
														while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
															echo '<h6 style="" class="p-2"><small><small>';
															$sqlckp2 = "Select s_path from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowckp1['id_pack'] . "' limit 1";
															$displayckp2 = mysqli_query($con, $sqlckp2);
															$rowckp2 = mysqli_fetch_array($displayckp2);

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowckp2['s_path'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($rowckp1['p_name']) . ' - <b>Qty: ' . $rowckp1['qty'] . '  &nbsp; </b><span><a href="../' . make_url($rowckp1['id_pack']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													}

													echo '
						</div>
						  
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No orders to display !</p>';
												}
												?>











											</div>











											<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
												aria-labelledby="custom-tabs-four-messages-tab">

												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2">
														ID.
													</div>
													<div class="col-2">
														Date
													</div>
													<div class="col-1">
														<small>QTY</small>
														<small><small><small>(cart)</small></small></small>
													</div>
													<div class="col-2 text-center">
														Total Price
													</div>
													<div class="col-5 text-left pl-2">
														Actions
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_request='1' " . $noNosepin . " order by cb_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												$apporder = false;
												while ($rowol = mysqli_fetch_array($displayol)) {
													$apporder = $rowol['c_id'] == 0;
													$tempProd = json_decode($rowol['cookie_id'], true);
													$products = $apporder ? $tempProd['products'] : [];
													echo '<div class="row orders-list order-secondary mb-2';
													//if(($sn%2)==0){echo'order-secondary';}
													echo '" style=" border:1px solid #eee;background-color:#f38d8d;">
						  <div class="col-2">
						    <span class="badge badge-secondary">NEW</span>';
													// for user order checking
													$queryol1 = "Select * from `whitefeat_wf_new`.`customer` where c_id =" . $rowol['c_id'] . "";
													$displayol1 = mysqli_query($con, $queryol1);
													$rowol1 = mysqli_fetch_array($displayol1);
													if (isset($rowol1['b2b']) && $rowol1['b2b'] == '1') {
														echo '&nbsp;<span class="badge badge-danger"><i class="fas fa-star"></i>&nbsp; B2B</span>';
													} else {
														echo '&nbsp;<span class="badge badge-warning"><i class="fas fa-star"></i>&nbsp; B2C</span>';
													}
													echo '<div style="margin:5px auto;text-transform:capitalize;">' . $rowol['name'] . '<br />' . $rowol['cno'] . '</div>';
													echo '<br>#WFO-' . $rowol['cb_id'];
													if ($rowol['mode'] == '1') {
														echo '&nbsp;<span class="badge badge-secondary">COD</span>';
													}
													if ($rowol['mode'] == '2') {
														echo '&nbsp;<span class="badge badge-info">KHALTI</span>';
													}
													if ($rowol['mode'] == '3') {
														echo '&nbsp;<span class="badge badge-success">ESEWA</span>';
													}
													echo '
						  </div>
						  <div class="col-2">
						   ';
						   echo $apporder == 1 ? date_format(date_create($rowol['book_date']),"Y-m-d") : $rowol['p_date'];
						   echo '
						  </div>
						  <div class="col-1" style="text-align:center">
						  <code>';


													$sql1acw = "Select qty from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "' ";
													$displayacw = mysqli_query($con, $sql1acw);
													$tqty = 0;
													if ($apporder) {
														foreach ($products as $prod) {
															$tqty += $prod['quantity'];
														}
													} else {
														while ($rowcw = mysqli_fetch_array($displayacw)) {
															$tqty += $rowcw['qty'];
														}
													}
													echo $tqty;

													echo '</code> 
						  </div>
						  <div class="col-2 text-center">';
													$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $rowol['cur_id'] . "'";
													$displaycrc2 = mysqli_query($con, $sqlcrc2);
													$rowcrc2 = mysqli_fetch_array($displaycrc2);
													$cnot = $rowcrc2['cur_name'];
													$crate = (1 / $rowcrc2['cur_rate']);

													$sqlckp = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
													$displayckp = mysqli_query($con, $sqlckp);
													if ($apporder) {
														if($rowol['p_amount'] == 0){
															foreach ($products as $prod) {
															$total_net += ($prod['quantity'] * $prod['dynamic_price']);
														}
														} else{
															$total_net = $rowol['p_amount'];
														}
													} else {
														while ($rowckp = mysqli_fetch_array($displayckp)) {
														$total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
													}
													}
													

													echo $cnot . ' ' . floor(($crate * $total_net));

													echo '</div>
						  <div class="col-5 text-left">
						    <div class="row">
							 
							 
							 
							 
							 <div class="col-3">
                               <a href="../bill/' . $rowol['cb_id'] . '" target="_blank"><button type="button" class="btn btn-small btn-light">
							   <i class="fas fa-file-alt" data-toggle="tooltip" title="View invoice"></i>
							   Invoice
							   </button></a>
							 </div>
							 <div class="col-8">
							  ( Automatic Deletion after 24 hrs )
							  
							 </div>
							
							</div>
						   
						   
						  </div>
						  
						  <div class="col-12 pt-2 pb-2" style="margin-top:10px;border-top:1px solid #fafafa;">';
													if ($apporder) {
														foreach ($products as $prod) {
															echo '<h6 style="" class="p-2"><small><small>';

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $prod['s_path'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($prod['title']) . ' - <b>Qty: ' . $prod['quantity'] . '  &nbsp; </b><span><a href="../' . make_url($prod['id']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													} else {
														$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
														$displayckp1 = mysqli_query($con, $sqlckp1);
														while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
															echo '<h6 style="" class="p-2"><small><small>';
															$sqlckp2 = "Select s_path from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowckp1['id_pack'] . "' limit 1";
															$displayckp2 = mysqli_query($con, $sqlckp2);
															$rowckp2 = mysqli_fetch_array($displayckp2);

															echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowckp2['s_path'] . '" style="height:3em;"/>';

															echo ' &diams; ' . ucfirst($rowckp1['p_name']) . ' - <b>Qty: ' . $rowckp1['qty'] . '  &nbsp; </b><span><a href="../' . make_url($rowckp1['id_pack']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></small></small></h6>';
														}
													}

													echo '
						</div>
						  
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No orders to display !</p>';
												}
												?>


											</div>

											<div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
												aria-labelledby="custom-tabs-four-settings-tab">

											</div>

										</div>
									</div>
									<!-- /.card -->
								</div>




							</div>



						</div>


						<div class="modal fade modal-fullscreen" id="modal-stock-status" style="letter-spacing:1px;">
							<div class="modal-dialog">
								<div class="modal-content">

									<div class="modal-header">
										<h4><i class="fas fa-weight-hanging"></i> CURRENT STOCK STATUS &nbsp;
											<button class="btn btn-flat btn-outline-info" id="print_stock_status"><i
													class="fas fa-print"></i> &nbsp;Print</button>

										</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>


									<div class="modal-body" style="padding-left:1em;">




									</div>

								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
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
						<label>Old password: <i style="color:red">*</i></label><br><input type="password"
							id="input_old_pass" style="width:80%;" class="form-control"></input><br>
						<label>New password: <i style="color:red">*</i></label><br><input type="password"
							id="input_new_pass" style="width:80%;" class="form-control"></input><br>
						<label>Re-enter New password: <i style="color:red">*</i></label><br><input type="password"
							id="input_new_pass2" style="width:80%;" class="form-control"></input><br>
					</div>
					<div class="modal-footer justify-content-between" style="text-align:left;">
						<button type="button" class="btn btn-danger" data-dismiss="modal" id="change_pass">Change
							Password</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade bd-example-modal-lg" id="reprint_modal" tabindex="-1" role="dialog"
			aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" style="padding-bottom:0; margin-bottom:0">
				<div class="modal-content" style="padding-bottom:0; margin-bottom:0">

					<div class="card card-secondary" style="padding-bottom:1em; margin-bottom:0">
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
	</body>

	</html>
<?php } ?>