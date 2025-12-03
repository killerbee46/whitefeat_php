<?php
include('session_control.php');
include('db_connect.php');
$queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='" . $_SESSION['u_id'] . "'";
$displayud = mysqli_query($con, $queryud);
$rowud = mysqli_fetch_array($displayud);

$sliderQl = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $_GET['id'] . "' limit 1";
$displaySlider = mysqli_query($con, $sliderQl);
$slider = mysqli_fetch_array($displaySlider);

$queryud1 = "Select * from `whitefeat_wf_new`.`package` where id_pack='" . $_GET['id'] . "'";
$displayud1 = mysqli_query($con, $queryud1);
$rowpd = mysqli_fetch_array($displayud1); { ?>

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






						<div class="row">
							<div class="col-12">



								<div class="card card-success card-outline card-outline-tabs">
									<div
										style="width:100%;display:flex;justify-content:space-between;align-items:center;padding-right:20px;padding-top:10px;">
										<a class="nav-link disabled" id="custom-tabs-four-home-tab-stock" data-toggle="pill"
											href="#custom-tabs-four-home-stock" role="tab"
											aria-controls="custom-tabs-four-home" aria-selected="true"
											style="color:#333;"><i class="fas fa-edit"></i>
											<?php echo $rowpd['p_name']; ?>
											<code class="text-danger">(#<?php echo $_GET['id']; ?>)</code>
										</a>
										<h5>Edit Product</h5>
										<a href="#"><button isEdit="true" class="btn btn-outline-danger btn-xs del_product"
												data-id="<?php echo $_GET['id']; ?>"><i class="fas fa-trash-alt"></i>&nbsp;
												Delete Product </button>
										</a>

									</div>
									<hr />
									<div class="card-body">
										<div class="tab-content" id="custom-tabs-four-tabContent">

											<div class="tab-pane fade active show p-1" id="custom-tabs-four-home-stock"
												role="tabpanel" aria-labelledby="custom-tabs-four-home-tab-stock">
												<form method="POST" action="./ajax_update_product.php"
													enctype="multipart/form-data">
													<input name="p_id" hidden value="<?php echo $_GET['id'] ?>" />

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
															<?php
															if (0 < ($rowpd['image'])) {
																echo '<div id="currentImage" class="preview-container">
																<img width="100%" height="100%" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowpd['image'] . '" />
															</div>';
															} else if (!empty($slider) && array_key_exists('s_path', $slider)) {
																echo '<div id="currentImage" class="preview-container">
																<img width="100%" height="100%" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $slider['s_path'] . '" />
															</div>';
															}
															?>
															<div id="imagePreview" class="preview-container"
																style="margin-bottom: 10px;"></div>
															<input type="file" id="imageInput" accept="image/*"
																name="image">
															<label for="imageInput" class="upload-label">+ Change
																Image</label>
														</div>
														<div class="grid">
															<label>
																Select Category
																<select name="cat_id">
																	<option <?php echo 0 < ($rowpd['cat_id']) ? "selected" : "" ?> disabled>Categories</option>
																	<?php
																	$sql1 = "Select * from `whitefeat_wf_new`.`package_category` order by cat_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) { ?>
																		<option value="<?php echo $row['cat_id'] ?>" <?php echo ($row['cat_id'] == $rowpd['cat_id']) ? "selected" : "" ?>><b><?php echo ucfirst($row['cat_name']) ?></b>
																		</option>
																	<?php }
																	?>
																</select>
															</label>
															<label>
																Product Name
																<input type="text" name="p_name"
																	value="<?php echo $rowpd["p_name"] ?>">
															</label>
															<label for="nothing">
																Fixed Price
																<label
																	style="display: flex;gap:5px;align-items:center;cursor: pointer;"><input
																		onchange="fixPrice(this)" style="cursor:pointer;"
																		name="isFixedPrice" type="checkbox" <?php echo $rowpd["isFixedPrice"] == 1 ? "checked" : null ?> /><span>Has
																		Fixed Price?</span></label>
															</label>
															<label id="priceSection"
																style="display: <?php echo $rowpd["isFixedPrice"] == 1 ? "flex" : "none" ?>;">
																Price
																<input id="price" type="number" name="price"
																	value="<?php echo $rowpd["price"] ?? null ?>">
															</label>
															<label id="priceSectionB2B"
																style="display: <?php echo $rowpd["isFixedPrice"] == 1 ? "flex" : "none" ?>;">
																Price (B2B)
																<input id="price_b2b" type="number" name="price_b2b"
																	value="<?php echo $rowpd["price_b2b"] ?? null ?>">
															</label>
															<label>
																Wt (gm)
																<input type="number" step="0.01" name="weight"
																	value="<?php echo $rowpd["weight"] ?>">
															</label>
															<label>
																Size Type
																<select name="ps_id">
																	<option <?php echo 0 < ($rowpd['ps_id']) ? "selected" : "" ?> disabled>Select</option>
																	<?php
																	$sql1 = "Select * from `whitefeat_wf_new`.`package_sizes` order by size_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) { ?>
																		<option value="<?php echo $row['ps_id'] ?>" <?php echo ($row['ps_id'] == $rowpd['ps_id']) ? "selected" : "" ?>><b><?php echo ucfirst($row['size_name']) ?></b>
																		</option>
																	<?php }
																	?>
																</select>
															</label>
															<label>
																Material
																<select name="pm_id" value="<?php echo $rowpd["pm_id"] ?>">
																	<option <?php echo 0 < ($rowpd['pm_id']) ? "selected" : "" ?> disabled>Materials</option>
																	<?php
																	$sql1 = "Select pm_id,pm_name from `whitefeat_wf_new`.`package_material` where pm_id > 1 and pm_id < 4  order by pm_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) { ?>
																		<option value="<?php echo $row['pm_id'] ?>" <?php echo ($row['pm_id'] == $rowpd['pm_id']) ? "selected" : "" ?>><b><?php echo ucfirst($row['pm_name']) ?></b>
																		</option>
																	<?php }
																	?>
																</select>
															</label>
															<label>
																Metal Type
																<select name="pmt_id">
																	<option <?php echo 0 < ($rowpd['pmt_id']) ? "selected" : "" ?> disabled>Metals</option>
																	<?php
																	$sql1 = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id!='12' order by pmt_name";
																	$display = mysqli_query($con, $sql1);
																	while ($row = mysqli_fetch_array($display)) { ?>
																		<option value="<?php echo $row['pmt_id'] ?>" <?php echo ($row['pmt_id'] == $rowpd['pmt_id']) ? "selected" : "" ?>><b><?php echo ucfirst($row['pmt_name']) ?></b>
																		</option>
																	<?php }
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
																<input type="number" step="0.01" name="mk_pp"
																	value="<?php echo $rowpd["mk_pp"] ?>">
															</label>
															<label>
																Making per gm
																<input type="number" step="0.01" name="mk_gm"
																	value="<?php echo $rowpd["mk_gm"] ?>">
															</label>
															<label>
																Amt (%)
																<input type="number" step="0.01" name="jarti"
																	value="<?php echo $rowpd["jarti"] ?>">
															</label>
															<label>
																% Discount Amt
																<input type="number" step="0.01" name="offer"
																	value="<?php echo $rowpd["offer"] ?>">
															</label>
														</div>
														<hr style="margin:20px auto;" />
														<div class="grid">
															<label>
																Diamond per Carat Rate
																<input type="number" name="dc_rate"
																	value="<?php echo $rowpd["dc_rate"] ?>">
															</label>
															<label>
																Carat Quantity
																<input type="number" step="0.01" name="dc_qty"
																	value="<?php echo $rowpd["dc_qty"] ?>">
															</label>
														</div>
														<h5 style="margin-top:20px;">Additional Diamond</h5>
														<div class="grid">
															<label>
																Diamond Colour/Clarity
																<input type="number" name="dc_rate_bce2"
																	value="<?php echo $rowpd["dc_rate_bce2"] ?>">
															</label>
															<label>
																Carat Qty
																<input type="number" step="0.01" name="dc_qty_bce2"
																	value="<?php echo $rowpd["dc_qty_bce2"] ?>">
															</label>
														</div>
													</section>

													<!-- ARP PRICE CALCULATION -->
													<section class="form-section">
														<h2>B2B Price Calculation</h2>
														<div class="grid">
															<label>
																Making per unit
																<input type="number" step="0.01" name="mk_pp_b2b"
																	value="<?php echo $rowpd["mk_pp_b2b"] ?>">
															</label>
															<label>
																Making per gm
																<input type="number" step="0.01" name="mk_gm_b2b"
																	value="<?php echo $rowpd["mk_gm_b2b"] ?>">
															</label>
															<label>
																Amt (%)
																<input type="number" step="0.01" name="jarti_b2b"
																	value="<?php echo $rowpd["jarti_b2b"] ?>">
															</label>
															<label>
																% Discount Amt
																<input type="number" step="0.01" name="offer_b2b"
																	value="<?php echo $rowpd["offer_b2b"] ?>">
															</label>
														</div>
														<hr style="margin:20px auto;" />
														<div class="grid">
															<label>
																Diamond per Carat Rate
																<input type="number" name="dc_rate_b2b"
																	value="<?php echo $rowpd["dc_rate_b2b"] ?>">
															</label>
															<label>
																Carat Quantity
																<input type="number" step="0.01" name="dc_qty_b2b"
																	value="<?php echo $rowpd["dc_qty_b2b"] ?>">
															</label>
														</div>
														<h5 style="margin-top:20px;">Additional Diamond</h5>
														<div class="grid">
															<label>
																Diamond Colour/Clarity
																<input type="number" name="dc_rate_b2b_b2e2"
																	value="<?php echo $rowpd["dc_rate_b2b_b2e2"] ?>">
															</label>
															<label>
																Carat Qty
																<input type="number" step="0.01" name="dc_qty_b2b_b2e2"
																	value="<?php echo $rowpd["dc_qty_b2b_b2e2"] ?>">
															</label>
														</div>
													</section>

													<!-- PRODUCT CONTENT -->
													<section class="form-section">
														<h2>Product Components (Add Separated by ,)</h2>
														<input type="text" name="p_des" style="margin-bottom:20px;"
															value="<?php echo $rowpd["p_des"] ?>">
														<br />
														<label>Product Content (HTML)
														</label>
														<textarea class="tinyme" name="p_text" id="editor"
															style="width:100%;"><?php htmlspecialchars(($rowpd["p_text"])) ?></textarea>
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
																			type="checkbox" <?php echo 0 < ($rowpd['tag_women']) ? "checked" : "" ?> /><span>Women</span></label>
																	<label
																		style="cursor:pointer;display: flex;flex-direction: row;gap:5px;align-items: center;"><input
																			style="cursor:pointer;" name="tag_men"
																			type="checkbox" <?php echo 0 < ($rowpd['tag_men']) ? "checked" : "" ?> /><span>Men</span></label>
																	<label
																		style="cursor:pointer;display: flex;flex-direction: row;gap:5px;align-items: center;"><input
																			style="cursor:pointer;" name="tag_kid"
																			type="checkbox" <?php echo 0 < ($rowpd['tag_kid']) ? "checked" : "" ?> /><span>Kids</span></label>
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
																	<option <?php echo 0 < ($rowpd['tag_gift']) ? "selected" : "" ?> disabled>Gift Tags</option>
																	<?php
																	$sql1g = "Select * from `whitefeat_wf_new`.`package_gift`";
																	$displayg = mysqli_query($con, $sql1g);
																	while ($rowg = mysqli_fetch_array($displayg)) { ?>
																		<option value="<?php echo $rowg['pgf_id'] ?>" <?php echo ($rowg['pgf_id'] == $rowpd['tag_gift']) ? "selected" : "" ?>>
																			<b><?php echo ucfirst($rowg['pgf_name']) ?></b>
																		</option>
																	<?php }
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
															<input type="text" name="title_head"
																value="<?php echo $rowpd["title_head"] ?>">
														</label>
														<div style="display:flex;gap:20px;">
															<label style="width: 50%;">Keywords (separated by comma)
																<textarea name="keyword"
																	style="width:100%;min-height:200px"><?php echo $rowpd["keyword"] ?></textarea>
															</label>
															<label style="width: 50%;">Description (separated by comma)
																<textarea name="description"
																	style="width:100%;min-height:200px"><?php echo $rowpd["description"] ?></textarea>
															</label>
														</div>
														<label style="width: 100%;">Description (separated by comma)
															<textarea style="width:88%; height:250px;" class="form-control"
																name="meta_head">
		<?php echo $rowpd["meta_head"] ?>
							</textarea>
														</label>
													</section>

													<!-- SUBMIT -->
													<div class="form-actions">
														<button type="submit">Update Product</button>
													</div>

												</form>
											</div>

											<div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
												aria-labelledby="custom-tabs-four-home-tab">




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

		<a href="" id="reload_edit"></a>


		<a href="" id="r_print" target="_blank"></a>


		<script type="text/javascript">
			$(document).ready(function () {

				$('#submit').click(function () {

					var form_data = new FormData();
					//alert(form_data);

					// Read selected files
					var totalfiles = document.getElementById('files').files.length;
					for (var index = 0; index < totalfiles; index++) {
						form_data.append("files[]", document.getElementById('files').files[index]);
					}
					form_data.append('pval', ($('#pval').val()));
					form_data.append('addvid', ($('#addvid').val()));
					//alert($('#addvid').val());
					//alert($('#pval').val());

					//activate spinner
					$('.img-upload').hide();
					$('.progress-status').show();

					// Display the key/value pairs
					for (var pair of form_data.entries()) {
						//alert(pair[0]+ ', '+ pair[1]); 
					}
					// alert(form_data);
					// AJAX request
					$.ajax({
						url: 'ajax_image_save_edit.php',
						type: 'post',
						data: form_data,
						dataType: 'json',
						contentType: false,
						processData: false,
						async: false,
						success: function (response) {
							//alert(response);
							location.reload(true);



						}

					});

					setTimeout(function () {
						$('.progress-status').remove();
						//location.reload(true);	
					}, 6000);//wait 2 seconds


				});

				$('.img-alert').click(function () {
					location.reload(true);
				});



				$(document).on('click', '.del-image-pack', function (evt) {
					var ll = $(this).attr("data-load");
					var id = $(this).attr("data-id");
					var dataString = 'id=' + id;
					$.ajax({
						type: "POST",
						url: "ajax_image_edit_status.php",
						data: dataString,
						cache: false,
						success: function (res) {
							location.reload(true);
							swal({
								type: "success",
								title: "Update Saved!",
								text: "Deleted successfully!",
								timer: 2000,
							});
						}

					});


				});





				// first form submit 

				/* creating new packages */


				$(document).on('submit', 'form.save_form1', function (evt) {
					evt.preventDefault();
					var check1 = $(".fpnamem").val();
					//alert(check1);
					if (check1 == '') {
						swal({
							type: "error",
							title: "Incomplete Details!",
							text: "Please provide all details!",
							timer: 2000,
						});

					}
					else {
						var formData = new FormData($(this)[0]);
						$.ajax({
							url: 'ajax_package_create1_edit.php',
							type: 'POST',
							data: formData,
							async: true,
							cache: false,
							contentType: false,
							processData: false,
							success: function (res) {
								//alert(res);


								swal({
									type: "success",
									title: "Updated Successfully!",
									text: "Product update successful!",
									timer: 3000,
								});
								location.reload(true);


							}
						});
						return false;
					}

				});


				// for temp cal_days_in_month


				$('#pric_b2c').click(function (evt) {
					evt.preventDefault();
					var wt = $('#pro_wt').val();
					if (wt > 0) {
						var pm = $('#pro_metal_type option:selected').val();
						var dcr = $('#dcrater').val();
						var dcq = $('#dcrateqty').val();
						var mkp = $('#makingpp').val();
						var mkg = $('#makinggm').val();
						var jarti = $('#jarti').val();
						var discount = $('#discount').val();

						var dataString = 'pm=' + pm + '&wt=' + wt + '&dcr=' + dcr + '&dcq=' + dcq + '&mkp=' + mkp + '&mkg=' + mkg + '&jarti=' + jarti + '&discount=' + discount;
						$.ajax({
							type: "POST",
							url: 'ajax_price_cal_temp.php',
							data: dataString,
							cache: false,
							success: function (result) {
								//alert(result);
								var finalp = result;
								//alert(finalp);
								// $('#pric_b2c_temp').html(result); 

								/*extra calculation */
								if ($('#dcrater_bce2').val() != '0' && $('#dcrater_bce2').val() != '') {
									var ext = ($('#dcrater_bce2').val() * $('#dcrateqty_bce2').val());

									finalp = parseFloat(finalp);
									ext = parseFloat(ext);
									var rr = finalp + ext;
									// alert(rr);
									$('#pric_b2c_temp').html(rr);


								}
								else {
									$('#pric_b2c_temp').html(result);
								}


								/*end  extra calculation*/


							}
						});

					}
					else { alert('Weight is 0'); }




				});

				$('#pric_b2b').click(function (evt) {
					evt.preventDefault();
					var wt = $('#pro_wt').val();
					if (wt > 0) {
						var pm = $('#pro_metal_type option:selected').val();
						var dcr = $('#dcrater_b2b').val();
						var dcq = $('#dcrateqty_b2b').val();
						var mkp = $('#makingpp_b2b').val();
						var mkg = $('#makinggm_b2b').val();
						var jarti = $('#jarti_b2b').val();
						var discount = $('#discount_b2b').val();

						var dataString = 'pm=' + pm + '&wt=' + wt + '&dcr=' + dcr + '&dcq=' + dcq + '&mkp=' + mkp + '&mkg=' + mkg + '&jarti=' + jarti + '&discount=' + discount + '&str_b2b=' + 1;
						$.ajax({
							type: "POST",
							url: 'ajax_price_cal_temp.php',
							data: dataString,
							cache: false,
							success: function (result) {
								//console.log(result);
								//alert(result);
								var finalp = result;
								//alert(finalp);
								// $('#pric_b2c_temp').html(result); 

								/*extra calculation */
								if ($('#dcrater_b2e2').val() != '0' && $('#dcrater_b2e2').val() != '') {
									var ext = ($('#dcrater_b2e2').val() * $('#dcrateqty_b2e2').val());

									finalp = parseFloat(finalp);
									ext = parseFloat(ext);
									var rr = finalp + ext;
									//alert(rr);
									$('#pric_b2b_temp').html(rr);

								}
								else {
									$('#pric_b2b_temp').html(result);
								}


								/*end  extra calculation*/




							}
						});

					}
					else { alert('Weight is 0'); }




				});





				//jQuery end
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
			const currentImage = document.getElementById("currentImage");

			if (imageInput) {
				imageInput.addEventListener("change", () => {
				if (imageInput.files) {
					currentImage.style.display = "none"
				}
				else{
					currentImage.style.display = "block"
				}
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