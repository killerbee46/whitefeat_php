<?php {
	$customer = '0';
	$cookid = '0';
	include 'db_connect.php';
	include 'ajax_cookie.php';
	include_once('make_url.php');
	if ($GLOBALS['customer'] == 0) {
		header('location:index.php');
	}

	$sqlus = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
	$displayus = mysqli_query($con, $sqlus);
	$rowus = mysqli_fetch_array($displayus);
	$merchant = $rowus['b2b'];

	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Cache-control" content="public">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if ($merchant == 1) {
			echo 'Vendor';
		} else {
			echo 'Customer';
		} ?> Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
			integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/css/css.css">
	</head>

	<body style="letter-spacing:0.02em;">
		<?php include('header.php'); ?>


		<br>

		<div class="columns"
			style="margin:1.5em; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">

			<div class="column has-text-left is-3 has-background-light each_item" style="border-radius:0;">
				<div class="user-detail">
					<div class="user-detail-avatar-wrapper">
						<div class="user-detail-avatar">
							<i class="fas fa-user-circle is-size-2"
								style="font-size: 100px !important; margin-top:20px;"></i>
							<button title="Update Profile" data-target="modal-uset"
								class="user_setting_container user_setting">
							</button>
						</div>
						<span>Since</span>
						<span> <?php echo ucfirst($rowus['join_date']); ?> </span>
					</div>
					<div class="column" style="display:flex;flex-direction:column; justify-content:flex-start;gap:10px;">
						<span class="tag is-info is-light is-size-6 letter-spacing">
							<?php if ($merchant == 1) {
								if (!empty($rowus['name'])) {
									echo ucfirst($rowus['name']) . "(Vendor)";
								} else {
									echo "Vendor Name N/A";
								}
							} else {
								if (!empty($rowus['name'])) {
									echo ucfirst($rowus['name']);
								} else {
									echo "Name N/A";
								}
							}
							?>
						</span>
						<span class="tag is-info is-light is-size-6 letter-spacing">
							<?php echo 'XXXXXXX' . substr($rowus['phone'], -3); ?> </span>
						</span>
						<span class="tag is-info is-light is-size-6 letter-spacing">
							<?php if (!empty($rowus['email'])) {
								echo $rowus['email'];
							} else {
								echo "Email N/A";
							} ?> </span>
						</span>
						<span class="tag is-info is-light is-size-6 letter-spacing">
							<?php if (!empty($rowus['address'])) {
								echo $rowus['address'];
							} else {
								echo "Address N/A";
							} ?> </span>
						</span>
					</div>
				</div>

				<div class="user-action-container">
					<button class="button is-danger is-outlined sign-out">Logout &nbsp; <i
							class="fas fa-sign-out-alt"></i></button>
					<button class="button is-success is-outlined user_setting" data-target="modal-uset2">Write a review
						&nbsp; <i class="fas fa-edit"></i></button>
				</div>

				<div class="column is-12 mb-1 " style="margin-top:0em; border-bottom:1px solid #ddd;">


					<div class="modal" id="modal-uset">
						<div class="modal-background"></div>
						<div class="column modal-content has-background-white p-5 has-text-left"
							style="width:80VW; max-height:90VH!important;">


							<h3 class="subtitle is-size-5 ">Manage your profile:</h3>
							<hr>

							<div class="columns">
								<div class="column is-6 pt-3">
									<label>Basic Details</label>

									<div class="column is-8 " style="margin-top:0em;">
										Name: <br> <input class="input is-halfwidth mt-1 user-name" type="text"
											value="<?php echo ucfirst($rowus['name']); ?>"></input>
									</div>

									<div class="column is-8 " style="margin-top:0em;">
										Phone no.: <br> <input type="text" class="input is-halfwidth mt-1 user-phone"
											value="<?php echo ucfirst($rowus['phone']); ?>"></input>
									</div>

									<div class="column is-8 " style="margin-top:0em;">
										Email: <br> <input type="text" class="input is-halfwidth mt-1 user-email"
											value="<?php echo ucfirst($rowus['email']); ?>"></input>
									</div>
									<div class="column is-8 " style="margin-top:0em;">
										Address: <br> <input type="text" class="input is-halfwidth mt-1 user-address"
											value="<?php echo ucfirst($rowus['address']); ?>"></input>
									</div>

									<div class="column is-8 " style="margin-top:0em;">
										<button class="button is-info is-light save_details"><i class="fas fa-save"></i>
											&nbsp;Save details</button>
									</div>




								</div>


								<div class="column is-6 pl-4" style="border-left:1px solid #eee;">
									<label>Change Password</label>

									<div class="column is-6 " style="margin-top:0em;">
										New Password: <br> <input type="password" class="input is-halfwidth mt-1 np1"
											value=""></input>
									</div>

									<div class="column is-6 " style="margin-top:0em;">
										Confirm New Password: <br> <input type="password"
											class="input is-halfwidth mt-1 np2" value=""></input>
									</div>

									<div class="column is-6 " style="margin-top:0em;">
										<button class="button is-warning is-light save_pass"><i class="fas fa-save"></i>
											&nbsp;Save password</button>
									</div>

								</div>
							</div>
						</div>
						<button class="modal-close is-large" aria-label="close"></button>
					</div>


					<?php

					if ($rowus['pass'] == '') {
						echo '<a href="#" class="user_setting_new" id="new_trigger" data-target="modal-newuset" style="display:none;"  ></a>';
						echo '<div class="modal" id="modal-newuset">
  <div class="modal-background"></div>
  <div class="column modal-content has-background-white p-5 has-text-left" style="width:70VW; max-height:90VH!important;">
      
	  
	  <h3 class="subtitle is-size-5 p-3 " style="margin:-1.2em; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">Complete your profile:</h3><hr>
	  
      <div class="columns">
	     <div class="column is-12 pt-3">
		  <label>Set Password</label>
		  <div class="column is-6 " style="margin-top:0em;">
	    Create New Password: <br> <input type="password" class="input is-halfwidth mt-1 np2x" value=""></input>
	  </div>
	  <div class="column is-6 " style="margin-top:0em;">
	    Confirm New Password: <br> <input type="password" class="input is-halfwidth mt-1 np2xx" value=""></input>
	  </div>
		  
		  <label>Set Your Basic Details</label>
		   	  
	  <div class="column is-8 " style="margin-top:0em;">
	    Name: <br> <input class="input is-halfwidth mt-1 user-name-new" type="text" value="' . $rowus['name'] . '"></input>
	  </div>
	  <div class="column is-8 " style="margin-top:0em;">
	    Email: <br> <input type="text" class="input is-halfwidth mt-1 user-email-new" value="' . $rowus['email'] . '"></input>
	  </div>
	  <div class="column is-8 " style="margin-top:0em;">
	    Address: <br> <input type="text" class="input is-halfwidth mt-1 user-address-new" value="' . $rowus['address'] . '"></input>
	  </div>
	  
	  <div class="column is-8 " style="margin-top:0em;">
	    <button class="button is-info save_details_new"><i class="fas fa-save"></i> &nbsp; Save details</button>
	  </div>
		  
		  
		  
		  
		 </div>
		 
		
		
	  
	  
	  </div>
	  
	  
	  
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
   ';
					}
					?>
				</div>

				<div class="modal" id="modal-uset2">
					<div class="modal-background"></div>
					<div class="column modal-content has-background-white has-text-left"
						style="width:50VW; max-height:95VH!important; overflow-x:hidden; ">


						<h3 class="subtitle is-size-5 p-4" style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);
margin-top:-0.6em; margin-left:-1.5%; width:105.5%;">
							Share your amazing experience&nbsp; <img src="assets/images/extra/happy.png"
								style="position:absolute; height:1em; margin-top:0.28em; margin-left:0.2em;">
						</h3>

						<div class="columns">
							<div class="column is-12 pt-3">
								<div class="column is-8 " style="margin-top:0em;">
									<label> <u>Review Details:</u></label>
								</div>


								<form class="customize-form" id="rev_form_main">
									<div class="column is-8 " style="margin-top:0em;">
										Name: <small>*</small><br>
										<input class="input is-halfwidth mt-1 user-name" name="customer_name" type="text"
											value="<?php echo ucfirst($rowus['name']); ?>"></input>
									</div>

									<div class="column is-8 " style="margin-top:0em;">
										Share image: <small>*</small> <br>
										<input type="file" class="input" name="rv_travel_file"></input>
									</div>

									<div class="column is-8 " style="margin-top:0em;">
										How was your experience: <small>*</small> <br>
										<select name="exp" class="input">
											<option value="0" selected disabled>-- Choose on from list --</option>
											<option value="1">Poor</option>
											<option value="2">Fair</option>
											<option value="3">Good</option>
											<option value="4">Amazing</option>
											<option value="5">Excellent</option>

										</select>
									</div>

									<div class="column is-12 " style="margin-top:0em;">
										Write your words: <small>*</small> <br>
										<textarea class="input is-fullwidth" name="message" style="height:15VH;"
											id="rv_msg_main"></textarea>

									</div>

									<div class="column is-8 " style="margin-top:0em;">
										<input type="submit" value="Submit for review"
											class="button is-success is-light"></input>
									</div>

								</form>

								<div class="column is-12 has-text-centered">
									<b class="is-size-4">Thank you for choosing us..</b> <br>
									<small><small>We will be at your service 365 Days
											<code>  +977-01-5365343 ( HOTLINE ) </code></small></small>
								</div>

							</div>



						</div>



					</div>
					<button class="modal-close is-large" aria-label="close"></button>
				</div>

			</div>


			<div class="column is-9 scroll-filter-product cart_items_div p-5 each_item"
				style="height:100vh;overflow-y:scroll; border:1px solid #ddd; border-left:0;  border-radius:0; background:whitesmoke;">
				<h3 class="subtitle" style="display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;">
					<span>
						Purchase History:<small>( <span>
								<?php
								$sqlus2 = "Select cb_id from `whitefeat_wf_new`.`cart_book` where c_id='" . $GLOBALS['customer'] . "' and checkout='1'";
								$displayus2 = mysqli_query($con, $sqlus2);
								$countus2 = mysqli_num_rows($displayus2);
								echo $countus2;
								?>
							</span> )</small>
					</span>
					<a href="/silver-requests"><button class="button primary small ml-2">My Silver Investments</button></a>
				</h3>

				<?php

				$sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='" . $GLOBALS['customer'] . "' and checkout='1' order by cb_id DESC";
				$displayup = mysqli_query($con, $sqlup);
				$sn = 1;
				$total_net = 0;
				$countxx = mysqli_num_rows($displayup);
				if ($countxx <= 0) {
					echo "<hr> You haven't made any purchases yet.... ";
				}
				while ($rowup = mysqli_fetch_array($displayup)) {

					echo '<div style="display:flex; justify-content:space-between; align-items:center; gap:30px; flex-wrap:wrap; margin-bottom:30px;" class="';
					if ($rowup['c_request'] == '1') {
						echo ' disabled-del';
					}
					echo '"  style="margin-top:0em;"> ';
					if ($rowup['c_request'] == '1') {
						echo '<span class="tag is-danger"> Processed for deletion</span> &nbsp; ';
					}
					echo "<div>" . $sn . ". " . $rowup['p_date'] . '</div>';
					// currency 
			

					$sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $rowup['cur_id'] . "'";
					$displaycrc2 = mysqli_query($con, $sqlcrc2);
					$rowcrc2 = mysqli_fetch_array($displaycrc2);
					$cnot = $rowcrc2['cur_name'] ?? "Npr";
					$crate = (1 / ($rowcrc2['cur_rate'] ?? 1));

					$sqlckp = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowup['cb_id'] . "'";
					$displayckp = mysqli_query($con, $sqlckp);
					while ($rowckp = mysqli_fetch_array($displayckp)) {
						$total_net = $total_net + (($rowckp['rate'] ?? 112) * ($rowckp['qty'] ?? 1));
					}

					echo `<div><strong>` . $cnot . ' ' . floor(($crate * $total_net)) . `</strong></div>`;

					echo '<button class="button is-success is-light is-small tracking-order" data-target="modal-track' . $sn . '">Track Order &nbsp; <i class="fas fa-external-link-alt"></i></button>
        
  <div class="modal" id="modal-track' . $sn . '">
  <div class="modal-background"></div>
  <div class="column modal-content has-background-white has-text-centered has-text-left p-0" style="width:80VW; max-height:80VH!important;">
      
	  
	  <h3 class="subtitle is-size-6 p-5 pb-0 mb-0 " style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">Tracker ID: <small><code>' . $rowup['tracking_code'] . '</small></code>&nbsp; <small> #WFO-' . $rowup['cb_id'] . ' </small><small><small><small><small></small></small></small></small></h3>
	  
	  <ul class="steps is-narrow is-medium is-centered has-content-centered p-4 has-background-white each_item" style=" border:1px solid #eee; ">
      <li class="steps-segment 1step ';
					if ($rowup['dispatch'] == 0) {
						echo 'is-active has-gaps';
					}
					echo '">
        <a href="cart" class="has-text-dark">
          <span class="steps-marker">
            <span class="icon">
              <i class="fas fa-cog"></i>
            </span>
          </span>
          <div class="steps-content is-active">
            <p class="heading">Order processing</p>
          </div>
        </a>
      </li>
	  
      <li class="steps-segment 2step ';
					if ($rowup['dispatch'] == 1 && $rowup['deliver'] == 0) {
						echo 'is-active has-gaps';
					}
					if ($rowup['dispatch'] == 1 && $rowup['deliver'] == 1) {
						echo 'has-gaps';
					}
					if ($rowup['dispatch'] == 0) {
						echo 'has-gaps';
					}

					echo '">
        <a href="#" class="has-text-dark">
          <span class="steps-marker">
            <span class="icon">
              <i class="fas fa-truck"></i>
            </span>
          </span>
          <div class="steps-content">
            <p class="heading">On Delivery</p>
          </div>
        </a>
      </li>
	  
	  
      <li class="steps-segment 4step';
					if ($rowup['deliver'] == 1) {
						echo 'is-active';
					} else {
						echo 'has-gaps';
					}
					echo '">
        <span class="steps-marker is-hollow">
          <span class="icon">
            <i class="fa fa-check"></i>
          </span>
        </span>
        <div class="steps-content">
          <p class="heading">Delivered</p>
        </div>
      </li>
    </ul>
      <div class="column has-text-centered is-size-5" style="margin-top:-1em;">
	  <p>Your order progress</p>
	  </div>
	  
	  
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
	

	   <a href="bill/' . $rowup['cb_id'] . '" target="_blank"><button class="button is-info is-light is-small ">Invoice &nbsp; <i class="fas fa-file-alt"></i></button></a>
	   
	   </div>
	   ';

					$sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowup['cb_id'] . "'";
					$displayckp1 = mysqli_query($con, $sqlckp1);
					while ($printr = mysqli_fetch_array($displayckp1)) {

						echo '<div style="margin-bottom:5px;">&diams; ' . ucfirst($printr['p_name']) . ' x ' . $printr['qty'] . '</div>';
					}
					echo "<hr>";
					$sn++;
					$total_net = 0;

				}

				?>











			</div>


		</div>


		<?php
		if ($merchant == 1) {
			echo '
<div class="columns has-background-primary pb-2 is-multiline card_each" style="margin:3.5em; margin-top:-1.5em; color:#fff;">
 <div class="column is-12">&nbsp;<u>Vendor Tools</u> &nbsp; <small><small><small><i class="fas fa-wrench"></i></small></small></small>
 </div>
 
 
 <div class="column is-12">
 <form action="b2b_report_order.php" method="POST">
 <div class="columns">
     
    <div class="column is-2"><small>Order Report Generation:</small> </div>
	<div class="column is-2 pl-0 pr-0"><small>From Date:&nbsp;</small><input type="date" class="from_date" name="fdate"></input></div>
	<div class="column is-2"><small>To Date:&nbsp; </small><input type="date" class="to_date" name="tdate"></input></div>
	<div class="column is-2"><small>Status:</small>
	  <select class="" name="status_select">
	  <option value="1">All Orders</option>
	  <option value="2">New Orders</option>
	  <option value="3">On-Delivery Orders</option>
	  <option value="4">Delivered Orders</option>
	  </select>
	</div>
	<div class="column is-2 pl-0 pr-0"><small>Pay Mode:</small>
	  <select class="" name="pay_select">
	  <option value="1">All </option>
	  <option value="2">Cash-On-Delivery</option>
	  <option value="3">Khalti</option>
	  <option value="4">Esewa</option>
	  </select>
	</div>
	 <div class="column is-2">
	 <input type="hidden" value="' . $rowus['c_id'] . '" name="cid"></input>
	 <input type="submit" value="Generate Report" class="button is-info is-light is-small view_report"></input>
	 </div> 
	
	  
 </div>
 </form>
 </div>
 
 
</div>
';
		}

		?>

		<script src="assets/js/jquery-3.6.0.min.js"></script>
		<script src="assets/owl/owl.carousel.min.js"></script>
		<?php include('js.php'); ?>
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
						success: function () {
							alert("Review received sucessfully!");
							location.reload(true);
						},
					});
					return false;
				} else {
					alert("Missing Details!!!");
				}
			});


			<?php if ($merchant == 1) {
				echo "$('#vendor_on').html('Vendor');";
			} ?>
		</script>
	</body>

	<?php
	if ($rowus['pass'] == '') { ?>
		<script>
			window.onload = function () {
				$('#new_trigger')[0].click();
			}
		</script>
	<?php }
	?>
	<script>

		$('.save_details_new').click(function () {
			if ($('.np2x').val() == $('.np2xx').val()) {
				var dataString = 'name=' + $('.user-name-new').val() + '&address=' + $('.user-address-new').val() + '&pass=' + $('.np2x').val() + '&email=' + $('.user-email-new').val();
				$.ajax({
					url: "saveudetail_new.php", data: dataString, type: 'POST', cache: false,
					success: function (result) {
						alert('Profile Updated Successfuly..you will be redirected to homepage...');
						window.location.href = "/";
					}
				});
			}
			else {
				alert("New Passwords didn't match");
			}
		});
	</script>

	</html>
<?php } ?>