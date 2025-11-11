<?php
include('session_control.php');
include('db_connect.php');
include('cut_review.php');
include '../header-assets.php';

require 's3_upload.php';
$queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='" . $_SESSION['u_id'] . "'";
$displayud = mysqli_query($con, $queryud);
$rowud = mysqli_fetch_array($displayud); { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Product Panel</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
			integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
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

			.card-hover:hover {
				background-color: #;
				box-shadow: 1px 1px #aaa;
			}

			body {
				font-family: Arial, sans-serif;
				background: #f9f9f9;
				margin: 0;
				padding: 20px;
			}

			form {
				max-width: 1200px;
				margin: auto;
				background: white;
				padding: 20px;
				border-radius: 8px;
			}

			.form-section {
				margin-bottom: 20px;
				padding: 15px;
				background: #f2f2fb;
				border: 1px solid #ccc;
				border-radius: 6px;
			}

			.form-section h2 {
				margin-top: 0;
				padding: 10px;
				background: #cce0f6;
				color: #333;
				font-size: 16px;
				border-radius: 4px;
			}

			.grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
				gap: 15px;
				margin-top: 15px;
			}

			.grid>label {
				display: flex;
				flex-direction: column;
				font-size: 14px;
				color: #333;
				gap: 10px;
			}

			input,
			select,
			textarea {
				padding: 6px;
				border: 1px solid #ccc;
				border-radius: 4px;
			}

			textarea {
				resize: vertical;
			}

			.btn-add {
				margin-top: 10px;
				padding: 8px 12px;
				background: #4cafef;
				color: white;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}

			.btn-add:hover {
				background: #3a9ed9;
			}

			.form-actions {
				text-align: center;
				margin-top: 20px;
			}

			.form-actions button {
				padding: 10px 20px;
				background: #28a745;
				border: none;
				border-radius: 6px;
				color: white;
				cursor: pointer;
			}

			.form-actions button:hover {
				background: #218838;
			}

			.richtext-container {
				border: 1px solid #ccc;
				border-radius: 6px;
				overflow: hidden;
				margin-top: 10px;
				background: white;
			}

			.toolbar {
				background: #f4f4f9;
				padding: 6px;
				border-bottom: 1px solid #ddd;
				display: flex;
				flex-wrap: wrap;
				gap: 6px;
			}

			.toolbar button {
				background: white;
				border: 1px solid #ccc;
				border-radius: 4px;
				padding: 5px 8px;
				font-size: 14px;
				cursor: pointer;
				transition: background 0.2s;
			}

			.toolbar button:hover {
				background: #e9ecef;
			}

			.editor {
				min-height: 150px;
				padding: 10px;
				font-size: 14px;
				line-height: 1.5;
				outline: none;
			}

			.image-upload {
				margin-top: 10px;
			}

			input[type="file"] {
				display: none;
			}

			.upload-label {
				display: inline-block;
				padding: 10px 15px;
				background: #4cafef;
				color: white;
				border-radius: 6px;
				cursor: pointer;
				font-size: 14px;
				transition: background 0.3s;
			}

			.upload-label:hover {
				background: #3a9ed9;
			}

			.preview-container {
				display: flex;
				flex-wrap: wrap;
				gap: 10px;
				margin-top: 15px;
			}

			.preview-container img {
				width: 120px;
				height: 120px;
				object-fit: cover;
				border: 1px solid #ddd;
				border-radius: 6px;
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
									<h5><i class="fas fa-cubes"></i> Product Mgmt. Area
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
										<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="custom-tabs-four-home-tab-stock"
													data-toggle="pill" href="#custom-tabs-four-home-stock" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-file"></i> Product List</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
													href="#custom-tabs-four-home" role="tab"
													aria-controls="custom-tabs-four-home" aria-selected="true"><i
														class="fas fa-edit"></i> Add New Product</a>
											</li>
											<li class="nav-item">
												<a class="nav-link stock_direct_open" id="custom-tabs-four-profile-tab"
													data-toggle="pill" href="#custom-tabs-four-profile" role="tab"
													aria-controls="custom-tabs-four-profile" aria-selected="false"><i
														class="fas fa-tags"></i> Regular Tags</a>
											</li>
											<li class="nav-item">
												<a class="nav-link stock_direct_open" id="custom-tabs-four-profile-messages"
													data-toggle="pill" href="#custom-tabs-four-messages" role="tab"
													aria-controls="custom-tabs-four-messages" aria-selected="false"><i
														class="fas fa-gift"></i> Gift Tags</a>
											</li>
											<li class="nav-item">
												<a class="nav-link stock_direct_open" id="custom-tabs-four-profile-settings"
													data-toggle="pill" href="#custom-tabs-four-settings" role="tab"
													aria-controls="custom-tabs-four-settings" aria-selected="false"><i
														class="fas fa-cubes"></i> Collection Tags</a>
											</li>


										</ul>

									</div>

									<div class="card-body">
										<div class="tab-content" id="custom-tabs-four-tabContent">

											<div class="tab-pane fade active show p-1" id="custom-tabs-four-home-stock"
												role="tabpanel" aria-labelledby="custom-tabs-four-home-tab-stock">
												<?php include 'admin_product_list.php' ?>

											</div>
											<div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
												aria-labelledby="custom-tabs-four-home-tab">
												<form method="POST" action="./ajax_create_product.php"
													enctype="multipart/form-data">

													<!-- PRODUCT SECTION -->
													<!-- <section class="form-section">
														<h2>Product Image</h2>
														<div class="image-upload">
															<input type="file" id="imageInput" accept="image/*"
																name="image">
															<label for="imageInput" class="upload-label">+ Upload
																Image</label>
															<div id="imagePreview" class="preview-container"></div>
														</div>
													</section> -->
													<section class="form-section">
														<h2>PRODUCT :</h2>
														<div class="image-upload" style="margin-top:20px;margin-left:5px;">
															<div>Product Image</div>
															<div id="imagePreview" class="preview-container"
																style="margin-bottom: 10px;"></div>
															<input type="file" id="imageInput" accept="image/*"
																name="image">
															<label for="imageInput" class="upload-label">+ Add Image</label>
														</div>
														<div class="grid">
															<label>
																Select Category
																<select name="cat_id" required>
																	<option value="" disabled selected>Categories</option>
																	<?php
																	$sql1 = "Select * from `whitefeat_wf_new`.`package_category` order by cat_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) {
																		echo '<option value="' . $row['cat_id'] . '"><b>' . ucfirst($row['cat_name']) . '</b></option>
			    ';
																	}
																	?>
																</select>
															</label>
															<label>
																Product Name
																<input required type="text" name="p_name">
															</label>
															<label for="nothing">
																Fixed Price
																<label
																	style="display: flex;gap:5px;align-items:center;cursor: pointer;"><input
																		onchange="fixPrice(this)" style="cursor:pointer;"
																		name="isFixedPrice" type="checkbox" /><span>Has
																		Fixed Price?</span></label>
															</label>
															<label id="priceSection" style="display: none;">
																Price
																<input id="price" type="number" name="price">
															</label>
															<label id="priceSectionB2B" style="display: none;">
																Price (B2B)
																<input id="price_b2b" type="number" name="price_b2b">
															</label>
															<label>
																Wt (gm)
																<input required type="number" step="0.01" name="weight">
															</label>
															<label>
																Size Type
																<select name="ps_id">
																	<option selected disabled>Select</option>
																	<?php
																	$sql1 = "Select * from `whitefeat_wf_new`.`package_sizes` order by size_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) {
																		echo '<option value="' . $row['ps_id'] . '"><b>' . ucfirst($row['size_name']) . '</b></option>
			    ';
																	}
																	?>
																</select>
															</label>
															<label>
																Material
																<select name="pm_id" required>
																	<option value="" selected disabled>Materials</option>
																	<?php
																	$sql1 = "Select pm_id,pm_name from `whitefeat_wf_new`.`package_material` where pm_id > 1 and pm_id < 4  order by pm_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) {
																		echo '<option value="' . $row['pm_id'] . '"><b>' . ucfirst($row['pm_name']) . '</b></option>
			    ';
																	}
																	?>
																</select>
															</label>
															<label>
																Metal Type
																<select name="pmt_id" required>
																	<option value="" selected disabled>Metals</option>
																	<?php
																	$sql1 = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id!='12' order by pmt_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) {
																		echo '<option value="' . $row['pmt_id'] . '"><b>' . ucfirst($row['pmt_name']) . '</b></option>
			    ';


																	}
																	?>
																</select>
															</label>
														</div>
													</section>

													<!-- KYC PRICE CALCULATION -->
													<section class="form-section">
														<h2>B2C Price Calculation</h2>
														<div class="grid">
															<label>
																Making per unit
																<input type="number" step="0.01" name="mk_pp">
															</label>
															<label>
																Making per gm
																<input type="number" step="0.01" name="mk_gm">
															</label>
															<label>
																Amt (%)
																<input type="number" step="0.01" name="jarti">
															</label>
															<label>
																% Discount Amt
																<input type="number" step="0.01" name="offer">
															</label>
														</div>
														<hr style="margin:20px auto;" />
														<div class="grid">
															<label>
																Diamond per Carat Rate
																<input type="number" name="dc_rate">
															</label>
															<label>
																Carat Quantity
																<input type="number" step="0.01" name="dc_qty">
															</label>
														</div>
														<h5 style="margin-top:20px;">Additional Diamond</h5>
														<div class="grid">
															<label>
																Diamond Colour/Clarity
																<input type="number" name="dc_rate_bce2">
															</label>
															<label>
																Carat Qty
																<input type="number" step="0.01" name="dc_qty_bce2">
															</label>
														</div>
													</section>

													<!-- ARP PRICE CALCULATION -->
													<section class="form-section">
														<h2>B2B Price Calculation</h2>
														<div class="grid">
															<label>
																Making per unit
																<input type="number" step="0.01" name="mk_pp_b2b">
															</label>
															<label>
																Making per gm
																<input type="number" step="0.01" name="mk_gm_b2b">
															</label>
															<label>
																Amt (%)
																<input type="number" step="0.01" name="jarti_b2b">
															</label>
															<label>
																% Discount Amt
																<input type="number" step="0.01" name="offer_b2b">
															</label>
														</div>
														<hr style="margin:20px auto;" />
														<div class="grid">
															<label>
																Diamond per Carat Rate
																<input type="number" name="dc_rate_b2b">
															</label>
															<label>
																Carat Quantity
																<input type="number" step="0.01" name="dc_qty_b2b">
															</label>
														</div>
														<h5 style="margin-top:20px;">Additional Diamond</h5>
														<div class="grid">
															<label>
																Diamond Colour/Clarity
																<input type="number" name="dc_rate_b2b_b2e2">
															</label>
															<label>
																Carat Qty
																<input type="number" step="0.01" name="dc_qty_b2b_b2e2">
															</label>
														</div>
													</section>

													<!-- PRODUCT CONTENT -->
													<section class="form-section">
														<h2>Product Components</h2>
														<div class="grid">
															<label>Product Description
																<input type="text" name="p_des" style="margin-bottom:20px;"
																	required>
															</label>
														</div>
														<br />
														<label>Product Content (HTML)
														</label>
														<textarea class="tinyme" name="p_text" value="" id="editor"
															style="width:100%;"></textarea>
													</section>

													<!-- TAGS / COLLECTION / GIFTS -->
													<section class="form-section">
														<h2>TAGS, COLLECTION & GIFTS :</h2>
														<div class="grid">
															<label for="nothing">Product for
																<div style="display:flex;justify-content: space-evenly;">
																	<label
																		style="cursor:pointer;display: flex;flex-direction: row;gap:5px;align-items: center;"><input
																			style="cursor:pointer;" name="tag_women"
																			type="checkbox" /><span>Women</span></label>
																	<label
																		style="cursor:pointer;display: flex;flex-direction: row;gap:5px;align-items: center;"><input
																			style="cursor:pointer;" name="tag_men"
																			type="checkbox" /><span>Men</span></label>
																	<label
																		style="cursor:pointer;display: flex;flex-direction: row;gap:5px;align-items: center;"><input
																			style="cursor:pointer;" name="tag_kid"
																			type="checkbox" /><span>Kids</span></label>
																</div>
															</label>
															<label>Regular Tag
																<select name="collection">
																	<option selected disabled>Tags</option>
																	<?php
																	$sql1g = "Select * from `whitefeat_wf_new`.`tags`";
																	$displayg = mysqli_query($con, $sql1g);
																	while ($rowg = mysqli_fetch_array($displayg)) {
																		$sql1g2 = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='" . $rowpd['id_pack'] . "' and tag_id='" . $rowg['tag_id'] . "'";
																		$displayg2 = mysqli_query($con, $sql1g2);


																		$cct = mysqli_num_rows($displayg2);
																		if ($cct > 0) {
																			$rowg2 = mysqli_fetch_array($displayg2);
																			if ($rowg['tag_id'] == $rowg2['tag_id']) {
																				echo '<option value="' . $rowg['tag_id'] . '" selected >' . ucfirst($rowg['tag_name']) . '</option>';
																			}
																		} else {
																			echo '<option value="' . $rowg['tag_id'] . '">' . ucfirst($rowg['tag_name']) . '</option>';
																		}

																	}
																	?>
																</select>
															</label>
															<label>Gift
																<select name="tag_gift">
																	<option selected disabled>Gift Tags</option>
																	<?php
																	$sql1g = "Select * from `whitefeat_wf_new`.`package_gift`";
																	$displayg = mysqli_query($con, $sql1g);
																	while ($rowg = mysqli_fetch_array($displayg)) {
																		if ($rowg['pgf_id'] == $rowpd['tag_gift']) {

																			echo '<option value="' . $rowg['pgf_id'] . '" selected>' . ucfirst($rowg['pgf_name']) . '</option>';
																		} else {
																			echo '<option value="' . $rowg['pgf_id'] . '">' . ucfirst($rowg['pgf_name']) . '</option>';
																		}

																	}
																	?>
																</select>
															</label>
														</div>
													</section>

													<!-- SEO -->
													<section class="form-section">
														<h2>SEO :</h2>
														<label>Product Page Title
															<br />
															<input required type="text" name="title_head">
														</label>
														<div style="display:flex;gap:20px;">
															<label style="width: 50%;">Keywords (separated by comma)
																<textarea name="keyword"
																	style="width:100%;min-height:200px"></textarea>
															</label>
															<label style="width: 50%;">Description (separated by comma)
																<textarea name="description"
																	style="width:100%;min-height:200px"></textarea>
															</label>
														</div>
														<label style="width: 100%;">Description (separated by comma)
															<textarea style="width:100%; height:250px;" class="form-control"
																name="meta_head"><meta name="description" content="">
						<meta name="keywords" content="">
						<meta name="robots" content="index, follow">
						<meta name="author" content="White Feathers Jewellery">
									</textarea>
														</label>
													</section>

													<!-- SUBMIT -->
													<div class="form-actions">
														<button type="submit">Save Product</button>
													</div>

												</form>
											</div>



											<!-- start more section -->


											<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
												aria-labelledby="custom-tabs-four-profile-tab">


												<div class="row" style="letter-spacing:1px;">


													<div class="col-7">



														<div class="card card-light shadow">
															<div class="card-header">
																<h3 class="card-title">Regular Tags List</h3>

																<div class="card-tools">
																	<button type="button" class="btn btn-tool"
																		data-card-widget="collapse">
																		<i class="fas fa-minus"></i>
																	</button>
																	<button type="button" class="btn btn-tool"
																		data-card-widget="maximize"><i
																			class="fas fa-expand"></i>
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
																$display_s = mysqli_query($con, $query_s);
																$counter = 1;
																while ($row_s = mysqli_fetch_array($display_s)) {



																	echo '
				<form class="edit_save_rtag" method="post" enctype="multipart/form-data">
				<input type="hidden" value="' . $row_s['tag_id'] . '" name="catval"></input>
				<div class="col">
					<div id="accordion' . $counter . '" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6  class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne' . $counter . '"><i class="fas fa-tag"></i> &nbsp;' . ucfirst($row_s['tag_name']) . ' </h6></a>
					
                     </div>
					<div id="collapseOne' . $counter . '" class="collapse p-2 bg-light" data-parent="#accordion' . $counter . '" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename' . $row_s['tag_id'] . '">Tag name</label>
                    <input type="text" class="form-control" id="newtablename' . $row_s['tag_id'] . '" placeholder="Table Name" value="' . ucfirst($row_s['tag_name']) . '" name="cat_name">
                  </div>
				  
				    <div class="form-group">
                  
                   
				   
				   
				   
				   
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="' . $row_s['tag_id'] . '">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';





																	echo '<button type="button" class="btn btn-block btn-danger del_rtag" data-id="' . $row_s['tag_id'] . '"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';


																	echo '</div>
				  </div>
				  </div>
                    </div>
					</div>
					</div>
					
					</form>
					';

																	$counter++;
																} ?>








															</div>
															<!-- /.card-body -->
														</div>




													</div>


													<div class="col-5">
														<div class="card card-light shadow">
															<div class="card-header">
																<h3 class="card-title">Add Tag</h3>

																<div class="card-tools">
																	<button type="button" class="btn btn-tool"
																		data-card-widget="collapse">
																		<i class="fas fa-minus"></i>
																	</button>
																	<button type="button" class="btn btn-tool"
																		data-card-widget="maximize"><i
																			class="fas fa-expand"></i>
																	</button>
																</div>
																<!-- /.card-tools -->
															</div>
															<!-- /.card-header -->
															<div class="card-body">

																<form id="save_rtag_form" method="post"
																	enctype="multipart/form-data">
																	<div class="form-group">
																		<label for="add_table">Tag Name</label>
																		<input type="text" class="form-control"
																			id="add_name_tag" name="cat_name"
																			placeholder="Write Name">
																	</div>



																	<div class="form-group">
																		<input type="submit"
																			class="btn btn-info btn-block add_table"
																			value="Add"></button>
																	</div>
																</form>




															</div>
															<!-- /.card-body -->
														</div>
													</div>







												</div>


												<div id="menu_order" style="display:none;">
													<a href="#" id="closem"><code
															style="float:right; margin-right:10px; margin-top:10px; color:red;"> Close [X] </code></a>
													<div id="mo_fetch">
													</div>
												</div>




											</div>


											<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
												aria-labelledby="custom-tabs-four-messages-tab">


												<div class="row" style="letter-spacing:1px;">


													<div class="col-7">



														<div class="card card-light shadow">
															<div class="card-header">
																<h3 class="card-title">Gift List</h3>

																<div class="card-tools">
																	<button type="button" class="btn btn-tool"
																		data-card-widget="collapse">
																		<i class="fas fa-minus"></i>
																	</button>
																	<button type="button" class="btn btn-tool"
																		data-card-widget="maximize"><i
																			class="fas fa-expand"></i>
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
																$display_s = mysqli_query($con, $query_s);
																$counter = 1;
																while ($row_s = mysqli_fetch_array($display_s)) {



																	echo '
				<form class="edit_save_gift" method="post" enctype="multipart/form-data">
				<input type="hidden" value="' . $row_s['pgf_id'] . '" name="catval"></input>
				<div class="col">
					<div id="accordion' . $counter . '" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6  class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne' . $counter . '"><i class="fas fa-gift"></i> &nbsp;' . ucfirst($row_s['pgf_name']) . ' </h6></a>
					
                     </div>
					<div id="collapseOne' . $counter . '" class="collapse p-2 bg-light" data-parent="#accordion' . $counter . '" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename' . $row_s['pgf_id'] . '">Gift name</label>
                    <input type="text" class="form-control" id="newtablename' . $row_s['pgf_id'] . '" placeholder="Table Name" value="' . ucfirst($row_s['pgf_name']) . '" name="cat_name">
                  </div>
				  
				    <div class="form-group">
                  
				  <label for="newtablename' . $row_s['pgf_id'] . '">Gift Photo</label>
                   <div class="row p-2">
				     <img src="../assets/images/gift/' . $row_s['pgf_image'] . '" style="height:80px;"/>
				   </div>
				   
				   <div class="row p-2">
				     <input type="file" class="form-control p-0 pt-1 pl-1" id="add_table" placeholder="Select photo" name="itemimg">
				   </div>
				   
				   
				   
				     <div class="form-group pt-2">
                    <label for="add_table">Gift  Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>';

																	if ($row_s['pgf_video'] != '') {
																		echo '<div class="row p-2"><iframe width="200" height="80" src="https://www.youtube.com/embed/' . $row_s['pgf_video'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
																	}


																	echo '<input type="text" class="form-control" id="add_table" placeholder="Embed Video Link" value="' . $row_s['pgf_video'] . '" name="cat_video">
                  </div>
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="' . $row_s['pgf_id'] . '">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';





																	echo '<button type="button" class="btn btn-block btn-danger del_gift" data-id="' . $row_s['pgf_id'] . '"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';


																	echo '</div>
				  </div>
				  </div>
                    </div>
					</div>
					</div>
					
					</form>
					';

																	$counter++;
																} ?>








															</div>
															<!-- /.card-body -->
														</div>




													</div>


													<div class="col-5">
														<div class="card card-light shadow">
															<div class="card-header">
																<h3 class="card-title">Add Gift Tag</h3>

																<div class="card-tools">
																	<button type="button" class="btn btn-tool"
																		data-card-widget="collapse">
																		<i class="fas fa-minus"></i>
																	</button>
																	<button type="button" class="btn btn-tool"
																		data-card-widget="maximize"><i
																			class="fas fa-expand"></i>
																	</button>
																</div>
																<!-- /.card-tools -->
															</div>
															<!-- /.card-header -->
															<div class="card-body">

																<form id="save_gift_form" method="post"
																	enctype="multipart/form-data">
																	<div class="form-group">
																		<label for="add_table">Gift Name</label>
																		<input type="text" class="form-control"
																			id="add_name_gift" name="cat_name"
																			placeholder="Write Name">
																	</div>

																	<div class="form-group">
																		<label for="add_table">Gift Photo <small>(
																				landscape
																				)</small></label>
																		<input type="file"
																			class="form-control p-0 pt-1 pl-1"
																			id="add_photo" name="itemimg"
																			placeholder="Select photo">
																	</div>

																	<div class="form-group">
																		<label for="add_table">Gift Video <small>(
																				<i class="fab fa-youtube"></i>&nbsp;
																				youtube link )</small></label>
																		<input type="text" class="form-control"
																			id="add_video" name="cat_video"
																			placeholder="Embed Video Link">
																	</div>

																	<div class="form-group">
																		<input type="submit"
																			class="btn btn-info btn-block add_table"
																			value="Add Gift"></button>
																	</div>
																</form>




															</div>
															<!-- /.card-body -->
														</div>
													</div>







												</div>


											</div>

											<div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
												aria-labelledby="custom-tabs-four-settings-tab">

												<div class="row" style="letter-spacing:1px;">


													<div class="col-7">



														<div class="card card-light shadow">
															<div class="card-header">
																<h3 class="card-title">Collection List</h3>

																<div class="card-tools">
																	<button type="button" class="btn btn-tool"
																		data-card-widget="collapse">
																		<i class="fas fa-minus"></i>
																	</button>
																	<button type="button" class="btn btn-tool"
																		data-card-widget="maximize"><i
																			class="fas fa-expand"></i>
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
																$display_s = mysqli_query($con, $query_s);
																$counter = 1;
																while ($row_s = mysqli_fetch_array($display_s)) {



																	echo '
				<form class="edit_save_collection" method="post" enctype="multipart/form-data">
				<input type="hidden" value="' . $row_s['pc_id'] . '" name="catval"></input>
				<div class="col">
					<div id="accordion' . $counter . '" >
					
					<div class="form-group">
                      <a href="#" style="color:#6c757d;"><h6  class="alert-light" style="padding:0.8em;"  data-toggle="collapse" href="#collapseOne' . $counter . '"><i class="fas fa-cubes"></i> &nbsp;' . ucfirst($row_s['pc_name']) . ' </h6></a>
					
                     </div>
					<div id="collapseOne' . $counter . '" class="collapse p-2 bg-light" data-parent="#accordion' . $counter . '" style="margin-top:-1em; border-top:1px solid #eee;">
                      <div class="form-group">
                    <label for="newtablename' . $row_s['pc_id'] . '">Collection name</label>
                    <input type="text" class="form-control" id="newtablename' . $row_s['pc_id'] . '" placeholder="Table Name" value="' . ucfirst($row_s['pc_name']) . '" name="cat_name">
                  </div>
				  
				    <div class="form-group">
                  
				  <label for="newtablename' . $row_s['pc_id'] . '">Collection Photo</label>
                   <div class="row p-2">
				     <img src="../assets/images/collection/' . $row_s['pc_image'] . '" style="height:80px;"/>
				   </div>
				   
				   <div class="row p-2">
				     <input type="file" class="form-control p-0 pt-1 pl-1" id="add_table" placeholder="Select photo" name="itemimg">
				   </div>
				   
				   
				   
				     <div class="form-group pt-2">
                    <label for="add_table">Collection Video <small>( <i class="fab fa-youtube"></i>&nbsp; youtube link )</small></label>';

																	if ($row_s['pc_vid'] != '') {
																		echo '<div class="row p-2"><iframe width="200" height="80" src="https://www.youtube.com/embed/' . $row_s['pc_vid'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
																	}


																	echo '<input type="text" class="form-control" id="add_table" placeholder="Embed Video Link" value="' . $row_s['pc_vid'] . '" name="cat_video">
                  </div>
				   
				   
				   
                    
                  </div>
				  
				  <div class="row">
				  <div class="col">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block up_table" value="Update" data-id="' . $row_s['pc_id'] . '">
					</input>
                  </div>
				  </div>
				  
				  <div class="col">
                  <div class="form-group">';





																	echo '<button type="button" class="btn btn-block btn-danger del_collection" data-id="' . $row_s['pc_id'] . '"><small>Delete &nbsp;<i class="fas fa-trash-alt"></i></small></button>';


																	echo '</div>
				  </div>
				  </div>
                    </div>
					</div>
					</div>
					
					</form>
					';

																	$counter++;
																} ?>








															</div>
															<!-- /.card-body -->
														</div>




													</div>


													<div class="col-5">
														<div class="card card-light shadow">
															<div class="card-header">
																<h3 class="card-title">Add Collection</h3>

																<div class="card-tools">
																	<button type="button" class="btn btn-tool"
																		data-card-widget="collapse">
																		<i class="fas fa-minus"></i>
																	</button>
																	<button type="button" class="btn btn-tool"
																		data-card-widget="maximize"><i
																			class="fas fa-expand"></i>
																	</button>
																</div>
																<!-- /.card-tools -->
															</div>
															<!-- /.card-header -->
															<div class="card-body">

																<form id="save_collection_form" method="post"
																	enctype="multipart/form-data">
																	<div class="form-group">
																		<label for="add_table">Collection
																			Name</label>
																		<input type="text" class="form-control"
																			id="add_name" name="cat_name_coll"
																			placeholder="Write Name">
																	</div>

																	<div class="form-group">
																		<label for="add_table">Collection Photo
																			<small>(
																				landscape )</small></label>
																		<input type="file"
																			class="form-control p-0 pt-1 pl-1"
																			id="add_photo_coll" name="itemimg"
																			placeholder="Select photo">
																	</div>

																	<div class="form-group">
																		<label for="add_table">Collection Video
																			<small>( <i class="fab fa-youtube"></i>&nbsp;
																				youtube link )</small></label>
																		<input type="text" class="form-control"
																			id="add_video" name="cat_video"
																			placeholder="Embed Video Link">
																	</div>

																	<div class="form-group">
																		<input type="submit"
																			class="btn btn-info btn-block add_table"
																			value="Add Collection"></button>
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
					height: 500

				});
			$('#saveNewPack').click(function () { suneditor.save();/*alert('saved');*/ });

			function fixPrice(e) {
				const priceSection = document.getElementById('priceSection')
				const price = document.getElementById('price')
				const price_b2b = document.getElementById('price_b2b')
				if (e?.checked) {
					priceSection.style.display = 'flex'
					priceSectionB2B.style.display = 'flex'
				} else {
					priceSection.style.display = 'none'
					priceSectionB2B.style.display = 'none'
					price.value = null
					price_b2b.value = null
				}
			}

		</script>
		<script>
			const imageInput = document.getElementById("imageInput");
			const imagePreview = document.getElementById("imagePreview");

			if (imageInput) {
				imageInput.addEventListener("change", () => {
					imagePreview.innerHTML = ""; // Clear old previews
					Array.from(imageInput.files).forEach(file => {
						const reader = new FileReader();
						reader.onload = e => {
							const img = document.createElement("img");
							img.src = e.target.result;
							imagePreview.appendChild(img);
						};
						reader.readAsDataURL(file);
					});
				});
			}
		</script>
	</body>

	</html>
<?php } ?>