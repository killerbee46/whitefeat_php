<?php {
	$customer = '0';
	$cookid = '0';
	include 'db_connect.php';
	include 'ajax_cookie.php';
	include_once('make_url.php'); ?>
	<!DOCTYPE html>
	<html class="no-js" lang="zxx">

	<head>
		<base href="../" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>White Feather's Invoice</title>
		<meta name="author" content="">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="robots" content="INDEX,FOLLOW">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<link href="bill/css2" rel="stylesheet">
		<link rel="stylesheet" href="bill/app.min.css">
		<link rel="stylesheet" href="bill/style.css">
		<style>
			@media print {
				.inv_title {
					margin-top: 1.5em;
				}

				.img_logo {
					margin-top: 0.5em !important;
					margin-right: -0.2em !important;
				}
			}
		</style>
	</head>
	<body style="background-color:#eee;color:#000;">
		<?php

		$total_bd = 0;
		$total_dis = 0;
		$total_net = 0;

		$sqlm = "Select * from `whitefeat_wf_new`.`cart_book` where cb_id='" . $_GET['title'] . "'";
		$displaym = mysqli_query($con, $sqlm);
		$rowm = mysqli_fetch_array($displaym);

		$customer = $rowm['c_id'];

		?>


		<div class="invoice-container-wrap">
			<div class="invoice-container">
				<main>
					<div class="as-invoice invoice_style3">
						<div class="download-inner" id="download_section" style="">
							<header class="as-header header-layout1">
								<div class="row align-items-center justify-content-between">
									<div class="col-auto">
										<div class="header-logo" style="position:absolute; margin-top:1em;">
											<a href="#">
												<h4 class="inv_title">INVOICE</h4>
											</a>
										</div>
									</div>
									<div class="col-auto">
										<h1 class="big-title"><img src="assets/images/logo.png" alt="WF"
												style="height:1.6em; position:relative; margin-top:-1em; margin-right:-0.5em;"
												class="img_logo" /></h1>
									</div>
								</div>

								<div class="header-bottom" style="margin-top:2.8em;">
									<div class="row align-items-center justify-content-end">
										<div class="col-auto">
											<p class="invoice-number me-4"><b>Invoice No:
												</b>#WFO-<?php echo $rowm['cb_id']; ?></p>
										</div>
										<div class="col-auto">
											<p class="invoice-date"><b>Date: </b><?php echo $rowm['p_date']; ?></p>
										</div>
									</div>
								</div>
							</header>


							<div class="row justify-content-between mb-4">
								<div class="col-6" style="padding-right:0;">
									<div class="row">

										<div class="col-3">
											<img src="qrimages/<?php echo $rowm['tracking_code'] . '.png'; ?>"
												style="height:5em;" />
										</div>
										<div class="col-6 invoice-left">
											<b>Invoiced To:</b>
											<address><?php
											echo $rowm['name'];
											?><br><?php echo $rowm['address']; ?><br><?php echo $rowm['cno']; ?></address>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<div class="invoice-right"><b>Pay To:</b>
										<address>White Feather's Inc. Pvt. Ltd.<br>Newroad, Kathmandu, Nepal
											<br>+977-01-5365343, +977-9806091605
										</address>
									</div>
								</div>
							</div>

							<table class="invoice-table table-stripe">
								<thead>
									<tr>
										<th>SL.</th>
										<th>Item Description</th>
										<th>Price</th>
										<th>Qty</th>
										<th>Total</th>
									</tr>
								</thead>

								<tbody>

									<?php

									$sqlld = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowm['cb_id'] . "' ";
									$displayld = mysqli_query($con, $sqlld);
									$sn = 1;
									while ($rowld = mysqli_fetch_array($displayld)) {


										$sqlld1 = "Select * from `whitefeat_wf_new`.`package` where id_pack='" . $rowld['id_pack'] . "' ";
										$displayld1 = mysqli_query($con, $sqlld1);
										$rowld1 = mysqli_fetch_array($displayld1);

										//b2b check
										$b2b_check = 0;
										if ($customer != 0) {
											$sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
											$displayb2b = mysqli_query($con, $sqlb2b);
											$rowb2b = mysqli_fetch_array($displayb2b);
											if (isset($rowb2b['b2b']) && $rowb2b['b2b'] == 1) {
												$b2b_check = 1;
											}
										}

										$total_bd = $total_bd + ($rowld1['price'] * $rowld['qty']);
										$newprice = $rowld1['price'];

										if ($rowld1['offer'] > 0 && $b2b_check == 0) {
											$newprice = ($rowld1['price'] - (($rowld1['offer'] / 100) * $rowld1['price']));
											$total_dis = $total_dis + ((($rowld1['offer'] / 100) * $rowld1['price']) * $rowld['qty']);
										}


										//b2b check
										if ($b2b_check == 1) {

											$newprice = $rowld1['price_b2b'];
										}


										$total_net = $total_net + ($newprice * $rowld['qty']);


										echo '<tr><td>' . $sn . '</td><td>';
										echo ucfirst($rowld1['p_name']);
										echo '</td><td>';

										// currency 
										$sel_cur = $rowm['cur_id'];
										$cnot = '';
										$crate = 1;

										$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $sel_cur . "'";
										$displaycrc2 = mysqli_query($con, $sqlcrc2);
										$rowcrc2 = mysqli_fetch_array($displaycrc2);
										$cnot = $rowcrc2['cur_name'];
										$crate = (1 / $rowcrc2['cur_rate']);

										if ($b2b_check == 0) {
											echo $cnot . ' ' . floor(($crate * $rowld1['price']));
										} else {
											echo $cnot . ' ' . floor(($crate * $newprice));
										}

										echo '</td><td>' . $rowld['qty'] . ' <small><small>Unit</small></small>';
										if ($rowld['size'] > 0) {
											echo '&nbsp; <small><small><small>(Size): </small></small> <small><b>' . $rowld['size'] . '</b></small></small>';
										}
										echo '</td><td>';


										if ($b2b_check == 0) {
											echo $cnot . ' ' . floor(($crate * $rowld1['price'] * $rowld['qty']));
										} else {
											echo $cnot . ' ' . floor(($crate * $newprice * $rowld['qty']));
										}

										echo '</td></tr>';
										$sn++;
									}

									?>

								</tbody>

							</table>



							<div class="row justify-content-between">
								<div class="col-auto">
									<div class="invoice-left">
										<b>Payment Mode:</b>
										<p class="mb-0"><?php
										if ($rowm['mode'] == '1') {
											echo 'Cash on delivery';
										}
										if ($rowm['mode'] == '2') {
											echo 'Khalti';
										}
										if ($rowm['mode'] == '3') {
											echo 'Esewa';
										}

										?></p>
									</div>
								</div>

								<div class="col-auto">
									<table class="total-table">
										<tbody>
											<tr>
												<th>Sub Total:</th>
												<td><?php

												if ($b2b_check == 0) {
													echo $cnot . ' ' . floor($crate * $total_bd);
												} else {
													echo $cnot . ' ' . floor($crate * $total_net);
												}

												?></td>
											</tr>
											<!--<tr><th>Tax:</th>
<td>$00.00</td></tr>-->
											<tr>
												<th>Discount:</th>
												<td><?php echo $cnot . ' ' . floor($crate * $total_dis); ?></td>
											</tr>
											<tr>
												<th>Total:</th>
												<td><?php echo $cnot . ' ' . floor($crate * $total_net); ?></td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
							<p class="invoice-note mt-3 text-center">
								<svg width="13" height="16" viewBox="0 0 13 16" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M3.22969 12.6H9.77031V11.4H3.22969V12.6ZM3.22969 9.2H9.77031V8H3.22969V9.2ZM1.21875 16C0.89375 16 0.609375 15.88 0.365625 15.64C0.121875 15.4 0 15.12 0 14.8V1.2C0 0.88 0.121875 0.6 0.365625 0.36C0.609375 0.12 0.89375 0 1.21875 0H8.55156L13 4.38V14.8C13 15.12 12.8781 15.4 12.6344 15.64C12.3906 15.88 12.1063 16 11.7812 16H1.21875ZM7.94219 4.92V1.2H1.21875V14.8H11.7812V4.92H7.94219ZM1.21875 1.2V4.92V1.2V14.8V1.2Z"
										fill="#1CB9C8"></path>
								</svg>
								<b>NOTE: </b>This is computer generated receipt and does not require physical signature.
							</p>
							<div class="footer-info">
								<div class="row gx-0 justify-content-center">
									<div class="col-auto">
										<span class="info left">Call: +977-01-5365343, +977-9806091605</span>
									</div>
									<div class="col-auto">
										<span class="info right">www.whitefeathersjewellery.com</span>
									</div>
								</div>
							</div>
							<div class="body-shape3">
								<svg width="850" height="127" viewBox="0 0 850 127" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<mask id="mask0_2_2031" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
										width="850" height="127">
										<path
											d="M850 0H0V42.3333H150.317C192.985 42.3333 234.534 55.9786 268.894 81.2752L278.106 88.0581C312.466 113.355 354.015 127 396.683 127H850V0Z"
											fill="#f2f2f2"></path>
									</mask>
									<g mask="url(#mask0_2_2031)">
										<rect width="862" height="457" transform="matrix(-1 0 0 1 856 -126)" fill="#f2f2f2">
										</rect>
										<g style="mix-blend-mode:soft-light" opacity="0.2">
											<path
												d="M850 0H0V42.3333H194.1C231.031 42.3333 266.305 57.6646 291.5 84.6667C316.695 111.669 351.969 127 388.9 127H850V0Z"
												fill="#f2f2f2"></path>
										</g>
									</g>
								</svg>
							</div>
						</div>
						<div class="invoice-buttons">
							<button class="print_btn" style="border-radius:0%;">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M11.9688 8.46875C12.1146 8.32292 12.2917 8.25 12.5 8.25C12.7083 8.25 12.8854 8.32292 13.0312 8.46875C13.1771 8.61458 13.25 8.79167 13.25 9C13.25 9.20833 13.1771 9.38542 13.0312 9.53125C12.8854 9.67708 12.7083 9.75 12.5 9.75C12.2917 9.75 12.1146 9.67708 11.9688 9.53125C11.8229 9.38542 11.75 9.20833 11.75 9C11.75 8.79167 11.8229 8.61458 11.9688 8.46875ZM13.5 5.5C14.1875 5.5 14.7708 5.75 15.25 6.25C15.75 6.72917 16 7.3125 16 8V12C16 12.1458 15.9479 12.2708 15.8438 12.375C15.7604 12.4583 15.6458 12.5 15.5 12.5H13.5V15.5C13.5 15.6458 13.4479 15.7604 13.3438 15.8438C13.2604 15.9479 13.1458 16 13 16H3C2.85417 16 2.72917 15.9479 2.625 15.8438C2.54167 15.7604 2.5 15.6458 2.5 15.5V12.5H0.5C0.354167 12.5 0.229167 12.4583 0.125 12.375C0.0416667 12.2708 0 12.1458 0 12V8C0 7.3125 0.239583 6.72917 0.71875 6.25C1.21875 5.75 1.8125 5.5 2.5 5.5V1C2.5 0.729167 2.59375 0.5 2.78125 0.3125C2.96875 0.104167 3.1875 0 3.4375 0H10.375C10.7917 0 11.1458 0.145833 11.4375 0.4375L13.0625 2.0625C13.3542 2.35417 13.5 2.70833 13.5 3.125V5.5ZM4 1.5V5.5H12V3.5H10.5C10.3542 3.5 10.2292 3.45833 10.125 3.375C10.0417 3.27083 10 3.14583 10 3V1.5H4ZM12 14.5V12.5H4V14.5H12ZM14.5 11V8C14.5 7.72917 14.3958 7.5 14.1875 7.3125C14 7.10417 13.7708 7 13.5 7H2.5C2.22917 7 1.98958 7.10417 1.78125 7.3125C1.59375 7.5 1.5 7.72917 1.5 8V11H14.5Z"
										fill="white"></path>
								</svg>
								<span>Print</span></button>
						</div>
					</div>
				</main>
			</div>
		</div>

		<script src="bill/app.min.js"></script>
		<script src="bill/jquery-3.6.0.min.js"></script>
		<script src="bill/main.js"></script>
	</body>


	</html>
<?php } ?>