<?php {
	$customer = '0';
	$cookid = '0';
	include 'db_connect.php';
	include 'ajax_cookie.php';
	include_once('make_url.php'); ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Cache-control" content="public">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Wishlist</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
			integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/css/css.css">
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico">
	</head>

	<body style="letter-spacing:0.02em;">
		<?php include 'header.php'; ?>

		<div class="container is-fluid mb-5">
			<h3 class="has-text-centered letter-spacing has-background-light p-3"
				style="margin-top:4em; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);"><i class="fas fa-hand-holding-heart"></i> &nbsp;
				Your Wishlist (
				<?php
				$sql1acw = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' ";
				$displayacw = mysqli_query($con, $sql1acw);
				$countcw = mysqli_num_rows($displayacw);
				echo $countcw;


				?>)
			</h3>
		</div>
		<div class="container is-fluid mb-5">

			<div class="columns is-multiline">



				<?php

				if ($countcw < 1) {
					echo '<p class="letter-spacing p-4 has-text-centered"> Your wishlist seems empty, please try adding products you like to save for later.....</p>';
				}
				while ($rowwl = mysqli_fetch_array($displayacw)) {

					$sqlwp = "Select * from `whitefeat_wf_new`.`package` where id_pack='" . $rowwl['id_pack'] . "' ";
					$displaywp = mysqli_query($con, $sqlwp);
					$rowwp = mysqli_fetch_array($displaywp);

					$sqlwp2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowwl['id_pack'] . "' limit 1";
					$displaywp2 = mysqli_query($con, $sqlwp2);
					$rowwp2 = mysqli_fetch_array($displaywp2);



					echo '<div class="column is-3">
			   <div class="card card-cat has-background-light" style="height:100%; position:relative;">
			     <div style="position:absolute;top:8px;right:10px;z-index:10;">
	       <i class="fas fa-times is-size-4 remove_wish" data-id="' . $rowwl['id_pack'] . '" style="color:#888; cursor:pointer;"></i>
	    </div>
  <div class="card-image">
    <figure class="image">
      <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowwp2['s_path'] . '" alt="' . $rowwp['p_name'] . '" class="card-img-top" />
    </figure>
  </div>
  <div class="card-content">
    <div class="media mb-0">
      <div class="media-left">
      </div>
     </div>
	
	<div class="columns p-2 tag-div">
	
    </div>
	  		<div class="media-content" style="margin-top:-50px;width:100%;display:flex; justify-content:center;">
			<a href="' . make_url($rowwp['p_name']) . '"><button class="button is-info is-outlined  is-light"><i class="fas fa-eye"></i>&nbsp; View & Confirm</button></a></h5>
			</div>
			
			
	  <div class="media-content" style="margin-top:.5em;">';

					// currency 
					$sel_cur = 1;
					$cnot = '';
					$crate = 1;
					if ($GLOBALS['customer'] != 0) {
						$sqlcrc = "Select cur_id from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
						$displaycrc = mysqli_query($con, $sqlcrc);
						$rowcrc = mysqli_fetch_array($displaycrc);
						$sel_cur = $rowcrc['cur_id'];
					} else {
						$sqlcrc = "Select cookie_currency from `whitefeat_wf_new`.`cookie_status` where cookie_id='" . $GLOBALS['cookid'] . "'";
						$displaycrc = mysqli_query($con, $sqlcrc);
						$rowcrc = mysqli_fetch_array($displaycrc);
						$sel_cur = $rowcrc['cookie_currency'];
					}
					$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $sel_cur . "'";
					$displaycrc2 = mysqli_query($con, $sqlcrc2);
					$rowcrc2 = mysqli_fetch_array($displaycrc2);
					$cnot = $rowcrc2['cur_name'];
					$crate = (1 / $rowcrc2['cur_rate']);

					$newprice = $rowwp['price'];
					if ($rowwp['offer'] > 0) {
						$newprice = ($rowwp['price'] - (($rowwp['offer'] / 100) * $rowwp['price']));
					}

					$b2b_check = 0;
					if ($GLOBALS['customer'] != 0) {
						$sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
						$displayb2b = mysqli_query($con, $sqlb2b);
						$rowb2b = mysqli_fetch_array($displayb2b);
						if ($rowb2b['b2b'] == 1) {
							$b2b_check = 1;
							$newprice = $rowwp['price_b2b'];
						}

					}


					echo '
   <div class=" has-text-weight-semibold" style="color:#333; font-size:18px;">';
					echo $cnot . " " . round(($crate * $newprice), 2);

					echo '&nbsp;';
					if ($b2b_check == 1) {
						echo '<span class="has-text-weight-normal is-size-6" style="opacity:0.6;"><small><small>B2B rate</small></small></span>';
					}
					if ($rowwp['offer'] > 0 && $b2b_check == 0) {
						echo '<del class="has-text-weight-normal is-size-5" style="opacity:0.5;"><small><small>';
						echo $cnot . round(($crate * $rowwp['price']), 2);
						echo '</small></small></del>';
					}

					echo '</div>
   <p class="subtitle is-6">' . $rowwp['p_name'] . '</p>
      </div>
	
</div>
			</div>	
		</div>';
				}

				?>

			</div>
		</div>
		<br>
		<?php include 'footer.php'; ?>
		<script src="assets/js/jquery-3.6.0.min.js"></script>
		<script src="assets/owl/owl.carousel.min.js"></script>
		<?php include 'js.php'; ?>

	</body>

	</html>

<?php } ?>