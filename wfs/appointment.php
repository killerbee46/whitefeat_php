<?php
include('session_control.php');
include('db_connect.php');
$queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='" . $_SESSION['u_id'] . "'";
$displayud = mysqli_query($con, $queryud);
$rowud = mysqli_fetch_array($displayud); { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Appointment Panel</title>

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
						<a class="nav-link btn btn-light" href="#" role="button" id="re_print_bill" data-toggle="modal"
							data-target="reprint_modal">
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
									<h5><i class="fas fa-home"></i> Home Appointment Mgmt. Area
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
												<a class="nav-link active" id="custom-tabs-four-home-tab-sell"
													data-toggle="pill" href="#custom-tabs-four-home-sell" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-dollar-sign"></i> Selling Inquiries</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-four-home-tab-sell-ack"
													data-toggle="pill" href="#custom-tabs-four-home-sell-ack" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-check-square"></i> Acknowledged Selling Inquiries</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-four-home-tab-stock" data-toggle="pill"
													href="#custom-tabs-four-home-stock" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-house-user"></i> New Appointment</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
													href="#custom-tabs-four-home" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-check-square"></i> Appointment Visited </a>
											</li>

											<!--
				  <li class="nav-item">
					<a class="nav-link stock_direct_open" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-cogs"></i> Delivered</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link stock_direct_open" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fas fa-exclamation-triangle text-danger"></i> Cancel Requested</a>
				  </li>
				  -->


										</ul>

									</div>

									<div class="card-body">
										<div class="tab-content" id="custom-tabs-four-tabContent">
											<div class="tab-pane fade active show p-1" id="custom-tabs-four-home-sell"
												role="tabpanel" aria-labelledby="custom-tabs-four-home-tab-sell">








												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2 p-0 row">
														<div class="col-6">
															<small>SN. </small>
														</div>
														<div class="col-6">
															<small>Date </small>
														</div>
													</div>

													<div class="col-10 row">
														<div class="col-2">
															<small> Customer Name </small>
														</div>
														<div class="col-2">
															<small> Product <small>(opt.)</small> </small>
														</div>
														<div class="col-2 text-center">
															<small>Contact no.</small>
														</div>
														<div class="col-2 text-center">
															<small>Address</small>
														</div>
														<div class="col-2 text-center">
															<small>Message</small>
														</div>
														<div class="col-1 text-left pl-2">
															<small>Actions</small>
														</div>
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`inquiry` where visit='0' and type = 'sell' order by inquiry_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												while ($rowol = mysqli_fetch_array($displayol)) {
													echo '<div class="row orders-list ';
													if (($sn % 2) == 0) {
														echo 'bg-light';
													}
													echo '" style=" border:1px solid #eee;">
						
						<div class="col-2 p-0 row">
						
						  <div class="col-6">
						   ' . $sn . '.&nbsp; <span class="badge badge-secondary"><strong>new</strong></span>
						  </div>
						  <div class="col-6">
						   ' . date("Y-m-d", strtotime($rowol['dt_inquiry'])) . '
						  </div>
						  </div>
						  
						  <div class="col-10 row">
						  
						  ';


													if ($rowol['c_id'] == 0) {
														echo '
					  <div class="col-2">
						' . $rowol['p_name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx = mysqli_query($con, $queryolx);
															$rowolx = mysqli_fetch_array($displayolx);
															echo $rowolx['p_name'];
														}
														echo '</small>
				      </div>';


														echo '<div class="col-2 text-center">
						' . $rowol['cno'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowol['p_address'] . '
				      </div>';

													} else {
														$queryolx = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $rowol['c_id'] . "'";
														$displayolx = mysqli_query($con, $queryolx);
														$rowolx = mysqli_fetch_array($displayolx);

														echo '
					  <div class="col-2">
						' . $rowolx['name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx2 = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx2 = mysqli_query($con, $queryolx2);
															$rowolx2 = mysqli_fetch_array($displayolx2);
															echo $rowolx2['p_name'];
														}
														echo '</small>
				      </div>';


														echo '
					  <div class="col-2 text-center">
						' . $rowolx['phone'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowolx['address'] . '
				      </div>';
													}
													echo '
					  <div class="col-2 text-center">
						' . $rowol['p_qn'] . '
				      </div>
						  <div class="col-1 p-0">
						  <button type="button" class="btn btn-small btn-outline-info no-border home_visit"
							   data-ref="' . $rowol['inquiry_id'] . '">
							   <i class="fas fa-check-circle" data-toggle="tooltip" title="Acknowledged"></i>
							   &nbsp;Acknowledge
							   </button>

							   <a href="/wfs/appointment_detail.php?id=' . $rowol['inquiry_id'] . '"><span>
							   <i class="fas fa-eye"></i> View
							   </span></a>
							 </div>
						  </div>
						</div>';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No new selling request to display !</p>';
												}

												?>
											</div>

											<div class="tab-pane fade" id="custom-tabs-four-home-sell-ack" role="tabpanel"
												aria-labelledby="custom-tabs-four-home-tab">



												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2 p-0 row">
														<div class="col-6">
															<small>SN. </small>
														</div>
														<div class="col-6">
															<small>Date </small>
														</div>
													</div>

													<div class="col-10 row">
														<div class="col-2">
															<small> Customer Name </small>
														</div>
														<div class="col-2">
															<small> Product <small>(opt.)</small> </small>
														</div>
														<div class="col-2 text-center">
															<small>Contact no.</small>
														</div>
														<div class="col-2 text-center">
															<small>Address</small>
														</div>
														<div class="col-2 text-center">
															<small>Message</small>
														</div>
														<div class="col-1 text-left pl-2">
															<small></small>
														</div>
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`inquiry` where visit='1' and type = 'sell' order by inquiry_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												while ($rowol = mysqli_fetch_array($displayol)) {
													echo '<div class="row badge-success p-2';
													// if(($sn%2)==0){echo'bg-light';}
													echo '" style="  border:1px solid #eee; background-color:#bee5b2; color:#222;">
						
						<div class="col-2 p-0 row">
						
						  <div class="col-6">
						   ' . $sn . '.&nbsp; 
						  </div>
						  <div class="col-6">
						   ' . date("Y-m-d", strtotime($rowol['dt_inquiry'])) . '
						  </div>
						  </div>
						  
						  <div class="col-10 row">
						  
						  ';


													if ($rowol['c_id'] == 0) {
														echo '
					  <div class="col-2">
						' . $rowol['p_name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx = mysqli_query($con, $queryolx);
															$rowolx = mysqli_fetch_array($displayolx);
															echo $rowolx['p_name'] ?? "";
														}
														echo '</small>
				      </div>';


														echo '<div class="col-2 text-center">
						' . $rowol['cno'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowol['p_address'] . '
				      </div>';

													} else {
														$queryolx = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $rowol['c_id'] . "'";
														$displayolx = mysqli_query($con, $queryolx);
														$rowolx = mysqli_fetch_array($displayolx);

														echo '
					  <div class="col-2">
						' . $rowolx['name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx2 = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx2 = mysqli_query($con, $queryolx2);
															$rowolx2 = mysqli_fetch_array($displayolx2);
															echo $rowolx2['p_name'];
														}
														echo '</small>
				      </div>';


														echo '
					  <div class="col-2 text-center">
						' . $rowolx['phone'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowolx['address'] . '
				      </div>';

													}
													echo '
						  
						  
					  <div class="col-2 text-center">
						' . $rowol['p_qn'] . '
				      </div>
					   	 
						 
						  
						  <div class="col-1 p-0">
						  <span class="badge badge-light">Acknowledged</span>
<a href="/wfs/appointment_detail.php?id=' . $rowol['inquiry_id'] . '"><span>
							   <i class="fas fa-eye"></i> View
							   </span></a>
						  <a> View</a>
							 </div>
							   
							   
						  
						  
						 
						  </div>
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No selling request to display !</p>';
												}

												?>








											</div>


											<div class="tab-pane fade" id="custom-tabs-four-home-stock" role="tabpanel"
												aria-labelledby="custom-tabs-four-home-tab-stock">








												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2 p-0 row">
														<div class="col-6">
															<small>SN. </small>
														</div>
														<div class="col-6">
															<small>Date </small>
														</div>
													</div>

													<div class="col-10 row">
														<div class="col-2">
															<small> Customer Name </small>
														</div>
														<div class="col-2">
															<small> Product <small>(opt.)</small> </small>
														</div>
														<div class="col-2 text-center">
															<small>Contact no.</small>
														</div>
														<div class="col-2 text-center">
															<small>Address</small>
														</div>
														<div class="col-2 text-center">
															<small>Message</small>
														</div>
														<div class="col-1 text-left pl-2">
															<small>Actions</small>
														</div>
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`inquiry` where visit='0' and type='app' order by inquiry_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												while ($rowol = mysqli_fetch_array($displayol)) {
													echo '<div class="row orders-list ';
													if (($sn % 2) == 0) {
														echo 'bg-light';
													}
													echo '" style=" border:1px solid #eee;">
						
						<div class="col-2 p-0 row">
						
						  <div class="col-6">
						   ' . $sn . '.&nbsp; <span class="badge badge-secondary"><strong>new</strong></span>
						  </div>
						  <div class="col-6">
						   ' . date("Y-m-d", strtotime($rowol['dt_inquiry'])) . '
						  </div>
						  </div>
						  
						  <div class="col-10 row">
						  
						  ';


													if ($rowol['c_id'] == 0) {
														echo '
					  <div class="col-2">
						' . $rowol['p_name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx = mysqli_query($con, $queryolx);
															$rowolx = mysqli_fetch_array($displayolx);
															echo $rowolx['p_name'];
														}
														echo '</small>
				      </div>';


														echo '<div class="col-2 text-center">
						' . $rowol['cno'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowol['p_address'] . '
				      </div>';

													} else {
														$queryolx = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $rowol['c_id'] . "'";
														$displayolx = mysqli_query($con, $queryolx);
														$rowolx = mysqli_fetch_array($displayolx);

														echo '
					  <div class="col-2">
						' . $rowolx['name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx2 = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx2 = mysqli_query($con, $queryolx2);
															$rowolx2 = mysqli_fetch_array($displayolx2);
															echo $rowolx2['p_name'];
														}
														echo '</small>
				      </div>';


														echo '
					  <div class="col-2 text-center">
						' . $rowolx['phone'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowolx['address'] . '
				      </div>';

													}
													echo '
						  
						  
					  <div class="col-2 text-center">
						' . $rowol['p_qn'] . '
				      </div>
					   	 
						 
						  
						  <div class="col-1 p-0">
						  <button type="button" class="btn btn-small btn-outline-info no-border home_visit"
							   data-ref="' . $rowol['inquiry_id'] . '">
							   <i class="fas fa-check-circle" data-toggle="tooltip" title="Completed home visit"></i>
							   &nbsp;Visited
							   </button>
							 </div>
							   
							   
						  
						  
						 
						  </div>
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No new appointments to display !</p>';
												}

												?>















											</div>


























											<div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
												aria-labelledby="custom-tabs-four-home-tab">



												<div class="row"
													style="background:rgba(0,0,0,0.02); padding:0.5em; font-size:1.3em; border:1px solid #eee;">
													<div class="col-2 p-0 row">
														<div class="col-6">
															<small>SN. </small>
														</div>
														<div class="col-6">
															<small>Date </small>
														</div>
													</div>

													<div class="col-10 row">
														<div class="col-2">
															<small> Customer Name </small>
														</div>
														<div class="col-2">
															<small> Product <small>(opt.)</small> </small>
														</div>
														<div class="col-2 text-center">
															<small>Contact no.</small>
														</div>
														<div class="col-2 text-center">
															<small>Address</small>
														</div>
														<div class="col-2 text-center">
															<small>Message</small>
														</div>
														<div class="col-1 text-left pl-2">
															<small></small>
														</div>
													</div>

												</div>


												<?php

												$queryol = "Select * from `whitefeat_wf_new`.`inquiry` where visit='1' and type = 'app' order by inquiry_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												while ($rowol = mysqli_fetch_array($displayol)) {
													echo '<div class="row badge-success p-2';
													// if(($sn%2)==0){echo'bg-light';}
													echo '" style="  border:1px solid #eee; background-color:#bee5b2; color:#222;">
						
						<div class="col-2 p-0 row">
						
						  <div class="col-6">
						   ' . $sn . '.&nbsp; 
						  </div>
						  <div class="col-6">
						   ' . date("Y-m-d", strtotime($rowol['dt_inquiry'])) . '
						  </div>
						  </div>
						  
						  <div class="col-10 row">
						  
						  ';


													if ($rowol['c_id'] == 0) {
														echo '
					  <div class="col-2">
						' . $rowol['p_name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx = mysqli_query($con, $queryolx);
															$rowolx = mysqli_fetch_array($displayolx);
															echo $rowolx['p_name'] ?? "";
														}
														echo '</small>
				      </div>';


														echo '<div class="col-2 text-center">
						' . $rowol['cno'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowol['p_address'] . '
				      </div>';

													} else {
														$queryolx = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $rowol['c_id'] . "'";
														$displayolx = mysqli_query($con, $queryolx);
														$rowolx = mysqli_fetch_array($displayolx);

														echo '
					  <div class="col-2">
						' . $rowolx['name'] . '
				      </div>';

														echo '<div class="col-2">
						<small>';
														if ($rowol['id_pack'] != 0) {
															$queryolx2 = "Select p_name from `whitefeat_wf_new`.`package` where id_pack='" . $rowol['id_pack'] . "'";
															$displayolx2 = mysqli_query($con, $queryolx2);
															$rowolx2 = mysqli_fetch_array($displayolx2);
															echo $rowolx2['p_name'];
														}
														echo '</small>
				      </div>';


														echo '
					  <div class="col-2 text-center">
						' . $rowolx['phone'] . '
				      </div>
					  <div class="col-2 text-center">
						' . $rowolx['address'] . '
				      </div>';

													}
													echo '
						  
						  
					  <div class="col-2 text-center">
						' . $rowol['p_qn'] . '
				      </div>
					   	 
						 
						  
						  <div class="col-1 p-0">
						  <span class="badge badge-light">Visited</span>
							 </div>
							   
							   
						  
						  
						 
						  </div>
						</div>
						
						
						
						';
													$sn++;
													$total_net = 0;
												}
												if ($sn == 1) {
													echo '<p class="p-3">No new appointments to display !</p>';
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

												$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and deliver='1' and c_request='0' order by cb_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												while ($rowol = mysqli_fetch_array($displayol)) {
													echo '<div class="row orders-list';
													if (($sn % 2) == 0) {
														echo 'bg-light';
													}
													echo '" style=" border:1px solid #eee; background-color:#bee5b2;">
						  <div class="col-2">
						   ' . $sn . '. #WFO-' . $rowol['cb_id'] . '
						  </div>
						  <div class="col-2">
						   ' . $rowol['p_date'] . '
						  </div>
						  <div class="col-1">
						  <small><small>(cart)</small></small>: <code>';


													$sql1acw = "Select qty from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "' ";
													$displayacw = mysqli_query($con, $sql1acw);
													$tqty = 0;
													while ($rowcw = mysqli_fetch_array($displayacw)) {
														$tqty = $rowcw['qty'];
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
													while ($rowckp = mysqli_fetch_array($displayckp)) {
														$total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
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
						  
						  <div class="col-12 pt-2 pb-2" style="border-top:1px solid #bee5b2;">';

													$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
													$displayckp1 = mysqli_query($con, $sqlckp1);
													while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
														echo '<small><small>&diams; ' . ucfirst($rowckp1['p_name']) . ' - ' . $rowckp1['qty'] . '</small></small>';
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

												$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_request='1' order by cb_id DESC";
												$displayol = mysqli_query($con, $queryol);
												$total_net = 0;
												$sn = 1;
												while ($rowol = mysqli_fetch_array($displayol)) {
													echo '<div class="row orders-list';
													if (($sn % 2) == 0) {
														echo 'bg-light';
													}
													echo '" style=" border:1px solid #eee; background-color:#f38d8d;">
						  <div class="col-2">
						   ' . $sn . '. #WFO-' . $rowol['cb_id'] . '
						  </div>
						  <div class="col-2">
						   ' . $rowol['p_date'] . '
						  </div>
						  <div class="col-1">
						  <small><small>(cart)</small></small>: <code>';


													$sql1acw = "Select qty from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "' ";
													$displayacw = mysqli_query($con, $sql1acw);
													$tqty = 0;
													while ($rowcw = mysqli_fetch_array($displayacw)) {
														$tqty = $rowcw['qty'];
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
													while ($rowckp = mysqli_fetch_array($displayckp)) {
														$total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
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
						  
						  <div class="col-12 pt-2 pb-2" style="border-top:1px solid #f38d8d;">';

													$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowol['cb_id'] . "'";
													$displayckp1 = mysqli_query($con, $sqlckp1);
													while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
														echo '<small><small>&diams; ' . ucfirst($rowckp1['p_name']) . ' - ' . $rowckp1['qty'] . '</small></small>';
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