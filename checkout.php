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
    <title>Checkout page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/css.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
  /crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
  /hmac-sha256.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
  /enc-base64.min.js"></script>
    </script>
  </head>

  <body style="letter-spacing:0.02em; background-color:#F9F9FA;">
    <?php include('header.php'); ?>
    <div class="title flex align-center" style="margin-left:20px; gap:10px; margin-top:40px;">
      <i class="fas fa-shopping-cart"></i> Your Shopping Cart<span>
        (<?php

        $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='" . $GLOBALS['cookid'] . "' and checkout='0' ";
        $displayact = mysqli_query($con, $sql1act);
        $countcwm = mysqli_num_rows($displayact);
        $rowact = mysqli_fetch_array($displayact);

        $countcw = 0;

        if ($countcwm > 0) {
          $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowact['cb_id'] . "' ";
          $displayacw = mysqli_query($con, $sql1acw);
          $countcw = mysqli_num_rows($displayacw);

        }

        echo $countcw;


        ?>
        )
      </span>
    </div>
    <?php

    $total_bd = 0;
    $total_dis = 0;
    $total_net = 200;

    $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='" . $GLOBALS['cookid'] . "' and checkout='0' ";
    $displayact = mysqli_query($con, $sql1act);
    $countcwm = mysqli_num_rows($displayact);
    $rowact = mysqli_fetch_array($displayact);

    if ($countcwm > 0) {
      $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowact['cb_id'] . "' ";
      $displayacw = mysqli_query($con, $sql1acw);
      $countcw = mysqli_num_rows($displayacw);
    }

    if ($countcw > 0) {


      ?>


      <div class="container pt-5 checkout_div  ">


        <span class="checkout-progress" style="display:none;margin-bottom:3em; ">
          <ul class="steps is-narrow is-medium is-centered has-content-centered p-4 has-background-light each_item"
            style=" border:1px solid #eee; ">
            <li class="steps-segment 1step is-active has-gaps">
              <a href="cart" class="has-text-dark">
                <span class="steps-marker">
                  <span class="icon">
                    <i class="fas fa-shopping-cart"></i>
                  </span>
                </span>
                <div class="steps-content is-active">
                  <p class="heading">Shopping Cart</p>
                </div>
              </a>
            </li>
            <li class="steps-segment 2step has-gaps">
              <a href="#" class="has-text-dark">
                <span class="steps-marker">
                  <span class="icon">
                    <i class="fas fa-user"></i>
                  </span>
                </span>
                <div class="steps-content">
                  <p class="heading">Customer</p>
                </div>
              </a>
            </li>
            <li class="steps-segment 3step has-gaps">
              <span class="steps-marker">
                <span class="icon">
                  <i class="fas fa-money-bill"></i>
                </span>
              </span>
              <div class="steps-content">
                <p class="heading">Payment</p>
              </div>
            </li>
            <li class="steps-segment 4step has-gaps">
              <span class="steps-marker is-hollow">
                <span class="icon">
                  <i class="fa fa-check"></i>
                </span>
              </span>
              <div class="steps-content">
                <p class="heading">Invoice</p>
              </div>
            </li>
          </ul>

        </span>

        <h4 class="checkout_h4">Total (<?php echo $countcw; ?> Item<?php if ($countcw > 1) {
              echo '';
            } ?>) : <?php

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
             $crate = ($rowcrc2['cur_rate']);

             echo $cnot . " ";



             ?><span class="total_cost"></span></h4>


        <div class="columns is-multiline each_item m-0 p-4 has-background-light confirm-success has-text-centered"
          style="display:none; height:65VH;">
          <div class="column is-12 " style="padding-bottom:2em;">
            <h4 class="subtitle letter-spacing"><i class="fas fa-check-circle has-text-success is-size-3"></i>&nbsp;
              Congratulations! Your purchase order has been processed successfully. <br>
            </h4>

            <br>


            <a href="customer"><button class="button is-dark"
                style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);color:#444;"><i
                  class="fas fa-user-circle"></i>&nbsp; Go to your Dashboard</button></a>
            <hr>
            <label>Tracking code for your order: </label>
            <code id="tracking_code" class="column is-half
is-offset-one-quarter mt-2 mb-2 card has-background-white has-text-dark " style="">

                               here is code...
                               </code>


            <div class="column mt-5 thankyou-div">
              <img src="assets/images/extra/namaste.png" style="height:5em;"><br>
              Thank you for choosing us! <br>- Whitefeathers Team. <br>
              <small class="letter-spacing"><u>Contact us</u>
                +977 - 9806091605 , if you have any issue.
              </small>
            </div>
          </div>
        </div>
        <div class="columns is-multiline process-div" style="background-color:#F9F9FA;">
          <div class="column is-8 scroll-filter-product cart_items_div p-5" style="height:73.5vh;
  overflow-y:scroll;">
            <span class="cart_area">
              <?php

              while ($rowactx = mysqli_fetch_array($displayacw)) {
                $sqlckp = fetchProduct($rowactx['id_pack']);
                $displayckp = mysqli_query($con, $sqlckp);
                $rowckp = mysqli_fetch_array($displayckp);

                if ($rowckp['final_price'] !== $rowactx['rate']) {
                  $sqlUCD = "update cart_detail set rate=" . $rowckp['final_price'] . ", discount=" . $rowckp['discount'] . "  where cart_id='" . $rowactx['cart_id'] . "' ";
                  mysqli_query($con, $sqlUCD);
                }

                $originalPrice = $rowckp['actual_price'];
                $discount = $rowckp['discount'];
                echo '
		<div class="columns has-background-white mt-3 each_item mr-3">
	    <div class="column each_item is-2">
		 <figure class="image">
      <a href="#"><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/';
                if (isset($rowckp['image'])) {
                  echo $rowckp['image'];
                } else {
                  echo "no-image.png";
                }

                echo '" alt="product image" class="card-img-top" style="height:7.3em; width:auto;"/></a>
    </figure>
		</div>
		
		<div class="column is-7">
		  <h5 class="subtitle is-size-6 is-uppercase mb-0">' . ucfirst($rowckp['p_name']) . '</h5>
		  <h5 class="subtitle is-size-7 is-uppercase mt-1 mb-0">#WF-' . $rowckp['id_pack'] . '</h5>
		  <h5 class="subtitle is-size-7 is-uppercase mt-3 mb-0"><b>';
                if ($rowactx['size'] != '0') {
                  echo 'Size: ' . $rowactx['size'] . ', &nbsp;';
                }
                echo 'Qty &nbsp;';
		  if($rowckp['id_pack'] == "1849") echo "<button>1</button>"; 
                else {
                  echo '
		  <select'. '' .' class="qty_sel_checkout" data-ref="' . $rowactx['cart_id'] . '">';

                for ($i = 1; $i < 11; $i++) {
                  echo '<option ';
                  if ($i == $rowactx['qty']) {
                    echo 'selected';
                  }
                  echo ' value="' . $i . '">' . $i . '</option>';
                }
                echo '</select>';
                } 
                
                echo '</b>
		  </h5>';


                // currency 
          
                $newprice = $originalPrice;
                $total_bd = $total_bd + ($newprice * $rowactx['qty']);

                if ($rowckp['discount'] > 0) {
                  $newprice = $originalPrice - $discount;
                  $total_dis += $discount * $rowactx['qty'];
                }

                //b2b check
                $b2b_check = 0;
                if ($GLOBALS['customer'] != 0) {
                  $sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
                  $displayb2b = mysqli_query($con, $sqlb2b);
                  $rowb2b = mysqli_fetch_array($displayb2b);
                  if ($rowb2b['b2b'] == 1) {
                    $b2b_check = 1;
                    $newprice = $rowckp['price_b2b'];
                  }

                }


                $total_net = $total_net + ($newprice * $rowactx['qty']);

                echo '
   <h3 class="is-size-6 has-text-weight-semibold mt-4" style="color:#333;">';
                echo $cnot . " " . floor(($newprice * $rowactx['qty']) / $crate);

                echo '&nbsp;';
                if ($b2b_check == 1) {
                  echo '<span class="has-text-weight-normal is-size-6" style="opacity:0.6;"><small><small><small>B2B rate</small></small></small></span>';
                }
                if ($rowckp['discount'] > 0 && $b2b_check == 0) {
                  echo '<del class="has-text-weight-normal is-size-5" style="opacity:0.5;"><small><small>';
                  echo $cnot . " " . floor(($originalPrice * $rowactx['qty']) / $crate);
                  echo '</small></small></del>';
                }

                echo '</h3>
		
		</div>
		
		
		<div class="column is-3" style="padding-top:6%;">
		  <button class="button is-danger is-light is-small del_checkout_item" data-ref="' . $rowactx['cart_id'] . '"><i class="fas fa-trash-alt"></i> &nbsp; Remove</button>
		  <button class="button is-info is-outlined  is-light mt-3 is-small move_checkout_item" data-ref2="' . $rowckp['id_pack'] . '" data-ref="' . $rowactx['cart_id'] . '"><i class="fas fa-sync-alt"></i> &nbsp;Move to wishlist </button>
		</div>
		
		
	 </div>
	 ';
              }
              ?>



            </span>

            <span class="cart_confirm" style="display:none;">

              <div class="columns has-background-white mt-0 each_item mr-3 is-multiline logsign">








                <div class="column p-5 has-background-white login-main-div">

                  <span class="pl-0 is-size-6 is-fullwidth login-div "> Login </span>

                  <span class="flogin" style="">

                    <div class="field mt-2">
                      <label class="label">Username</label>
                      <p class="control has-icons-left has-icons-right">
                        <input class="input exampleFormControlInputPhone" type="email" id="exampleFormControlInputPhone"
                          placeholder="Phone number">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </p>
                    </div>
                    <div class="field">
                      <label class="label">Password</label>
                      <p class="control has-icons-left">
                        <input class="input exampleFormControlInputPass" type="password" id="exampleFormControlInputPass"
                          placeholder="Password">
                        <span class="icon is-small is-left">
                          <i class="fas fa-asterisk"></i>
                        </span>
                      </p>
                    </div>
                    <div class="field">
                      <p class="control">
                        <button class="button is-success is-light checkU" data-checkout="1">
                          <i class="fas fa-lock"></i> &nbsp; Login
                        </button>
                      </p>
                    </div>

                  </span>



                  <span class="fpass">
                    <div class="column" style="padding-left:0;">
                      <div class="form-group">
                        <a href="#"> <small><span class="noPass"><i class="fas fa-hand-o-right"></i> Forgot your
                              password?</span></small></a>

                      </div>
                    </div>
                  </span>



                  <span class="fpass1" style="display:none;">
                    <div class="col-md-12 forgot_phone">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Your Phone number</label>
                        <input type="number" class="input exampleFormControlInputPhone2" id="exampleFormControlInputPhone2"
                          placeholder="98XXXXXXX">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button class="button is-link is-light checkEmail">Send OTP &nbsp;<i
                            class="fa fa-angle-right"></i></button>

                      </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <small><u>Contact us</u>
                        +977 - 9806091605 , if you have any issue.
                        <br>-Thankyou, WhiteFeathers Team
                      </small>
                    </div>

                  </span>


                  <span class="fpassOtp" style="display:none;">
                    <div class="columns forgot_phone">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Enter OTP received</label>
                        <input type="number" class="input otpnum" id="otpnum" placeholder="">
                      </div>
                    </div>
                    <div class="columns">
                      <div class="form-group"><br>
                        <button class="button is-success confirmOtp" data-checkout="1">Confirm OTP &nbsp;<i
                            class="fa fa-check-circle"></i></button>

                      </div>
                    </div>
                    <br>


                    <div class="columns mb-2 mt-2 has-text-semibold resend_otp">
                      <strong>Didn't get code? please wait...</strong>
                    </div>



                    <hr>

                    <div class="columns mt-2">
                      <small><u>Contact us</u>
                        +977 - 9806091605 , if you have any issue.
                        <br>-Thankyou, WhiteFeathers Team
                      </small>
                    </div>

                  </span>















                </div>

                <div class="column has-background-white-ter signup-div" style="border:1px solid #ddd; padding:1em;">

                  <br>
                  <span class="pl-0 is-size-6 is-fullwidth " style="">Signup</span>

                  <span id="" style="margin-top:1.5em;" class="signup-div-inner">


                    <div class="field mt-2">
                      <label class="label">Enter Your Phone number</label>
                      <p class="control has-icons-left">
                        <input class="input signUpnew" type="number" id="signUpnew" placeholder="98XXXXXXX">
                        <span class="icon is-small is-left">
                          <i class="fas fa-lock"></i>
                        </span>
                      </p>
                    </div>


                    <div class="field">
                      <p class="control">
                        <button class="button is-success is-outlined signupOtp">
                          <i class="fas fa-sms"></i> &nbsp; Send OTP
                        </button>
                      </p>
                    </div>





                    <br>
                    <div class="column">
                      <small><u>Contact us</u>
                        +977 - 9806091605 , if you have any issue.
                      </small>
                    </div>

                  </span>



                  <span class="fpassOtpSignup" style="display:none;">
                    <div class="columns forgot_phone mt-2 p-4">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Enter OTP received</label>
                        <input type="number" class="input otpnumSignup" id="otpnumSignup" placeholder="">
                      </div>
                    </div>
                    <div class="columns pl-4">
                      <div class="form-group"><br>
                        <button class="button is-success confirmOtpSignup" data-checkout="1">Confirm OTP &nbsp;<i
                            class="fa fa-check-circle"></i></button>

                      </div>
                    </div>
                    <br>


                    <div class="columns mb-2 mt-2 pl-4 has-text-semibold resend_otpSignup">
                      <strong>Didn't get code? please wait...</strong>
                    </div>

                </div>
















              </div>



              <div class="columns has-background-white mt-3 is-multiline each_item mr-3 delivery-info"
                style="display:none;">


                <div class="column is-12 p-3 pl-5 " style="border-top:1px solid #eee; background:#eee;">
                  <span class="pl-0 is-size-6 has-text-weight-semibold is-fullwidth"><i
                      class="fas fa-check has-text-success is-size-5"></i> &nbsp; 1.&nbsp; Logged In: &nbsp;<small
                      class="has-text-info"> <i class="fas fa-user-circle is-size-6"></i> <span class="user-name"></span>
                      (<span class="user-phone"></span>) </small>
                  </span>
                </div>

                <div class="column is-6 p-5 has-background-white">

                  <span class="pl-0 is-size-6 has-text-weight-semibold is-fullwidth">2. Delivery Information</span>


                  <form id="del_info_form">

                    <div class="field mt-5">
                      <label class="label">Name:</label>
                      <p class="control has-icons-left">
                        <input required class="input del-name" type="text" id="" value="" placeholder="Contact Person Name">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </p>
                    </div>


                    <div class="field">
                      <label class="label">Contact Number:</label>
                      <p class="control has-icons-left">
                        <input required class="input del-phone" type="text" id="exampleFormControlInputPass"
                          placeholder="Phone number">
                        <span class="icon is-small is-left">
                          <i class="fas fa-phone"></i>
                        </span>
                      </p>
                    </div>


                    <div class="field ">
                      <label class="label">Delivery Location:</label>
                      <p class="control has-icons-left has-icons-right">
                        <input required class="input del-location" type="text" id="" placeholder="Nearest Landmark">
                        <span class="icon is-small is-left">
                          <i class="fas fa-map"></i>
                        </span>
                      </p>
                    </div>




                    <div class="field">
                      <label class="label">Message: <small
                          class="is-size-7 has-text-weight-light">(optional)</small></label>
                      <p class="control has-icons-left">
                        <textarea class="input del-msg" type="text" id="exampleFormControlInputPass"
                          placeholder="Any message" style="height:10VH;"></textarea>
                        <span class="icon is-small is-left">
                          <i class="fas fa-edit"></i>
                        </span>
                      </p>
                    </div>
                    <div class="field mt-4">
                      <p class="control">
                        <button type="submit" class="button is-normal is-fullwidth"
                          style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
                          Proceed To Payment Page &nbsp; <i class="fas fa-arrow-right"></i>
                        </button>
                      </p>
                    </div>
                  </form>


                </div>

              </div>


              <div class="columns has-background-white mt-3 each_item mr-3 payment-info" style="display:none;">

                <div class="column is-6 p-5 has-background-white">

                  <span class="pl-0 is-size-6 has-text-weight-semibold is-fullwidth">3. Choose Payment Method </span>


                  <div class="container" style="margin-top:2em; width:100%;">



                    <div class="field letter-spacing">
                      <label class="b-radio radio is-large">
                        <input type="radio" name="group_2" value="1" checked>
                        <span class="check is-dark "></span>
                        <span class="control-label is-size-6"> Cash / QR Scan On Delivery</span>
                      </label>
                    </div>

                    <div class="field letter-spacing mt-2">
                      <label class="b-radio radio is-large">
                        <input type="radio" name="group_2" value="2">
                        <span class="check is-info"></span>
                        <span class="control-label is-size-6"><img
                            src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/khl.png"
                            style="height:3em;" /></span>
                      </label>
                    </div>

                    <div class="field letter-spacing">
                      <label class="b-radio radio is-large">
                        <input type="radio" name="group_2" value="3">
                        <span class="check is-success"></span>
                        <span class="control-label is-size-6"><img
                            src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/esewa.jpg"
                            style="height:3.5em;" /></span>
                      </label>
                    </div>

                    <div class="field mt-4">
                      <p class="control">
                        <button class="button is-normal confirm-order"
                          style="background: rgb(241,243,244); width:100%;
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
                          <span id="pay_show" style="display:none;">Pay & &nbsp; </span>Confirm Order &nbsp; <i
                            class="fas fa-check-circle"></i>
                        </button>
                      </p>
                    </div>

                  </div>




                </div>

              </div>

            </span>


          </div>

          <div class="column is-4 p-5 checkout-mright-div process-div">

            <h4 class="is-size-6 has-text-weight-semibold">Order Summary</h4>

            <div class="container mt-5 each_item has-background-white mb-1 ">



              <div class="columns pl-4 pr-4">
                <div class="column is-6 pb-0">
                  Subtotal:
                </div>
                <div class="column is-6 pb-0 has-text-right checkout_right_div">
                  <?php echo $cnot . " " . floor(($total_bd / $crate)); ?>
                </div>

              </div>

              <?php

              if ($total_dis > 0) {
                echo '<div class="columns pl-4 pr-4">
	<div class="column is-6 pb-0">
	Offer Discount:
	</div>
	<div class="column is-6 pb-0 has-text-right checkout_right_div">';
                echo $cnot . " " . floor(($total_dis / $crate));
                echo '</div>
	
	</div>';
              }
              ?>


              <div class="columns pl-4 pr-4">
                <div class="column is-6 pb-0">
                  Delivery Charge:
                </div>
                <div class="column is-6 pb-0 letter-spacing has-text-right checkout_right_div">
                  Rs. 200
                </div>

              </div>



              <div class="columns pl-4 pr-4">
                <div class="column is-6 pb-0 letter-spacing is-size-6 has-text-weight-semibold">
                  TOTAL COST:
                </div>
                <div
                  class="column is-6 pb-2 letter-spacing is-size-6 has-text-weight-semibold has-text-right checkout_right_div">
                  <?php echo $cnot . " " . floor(($total_net) / $crate);
                  echo '<input type="hidden" id="tcost" value="' . floor(($total_net) / $crate) . '" />'; ?>
                </div>
              </div>






            </div>

            <div class="columns mt-4 p-3">
              <?php
              if ($GLOBALS['customer'] == '0') { ?>
                <button class="button is-normal is-fullwidth user-modal" data-target="modal-user"
                  style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%); border:0;"><i class="fas fa-shopping-cart"></i> &nbsp; Checkout
                  Now</button>
              <?php } else { ?>
                <button class="button is-normal is-fullwidth first-checkout" data-ref="<?php echo $GLOBALS['customer']; ?>"
                  data-ref2="<?php
                  if ($GLOBALS['customer'] != '0') {
                    $sqlud = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "' ";
                    $displayud = mysqli_query($con, $sqlud);
                    $rowud = mysqli_fetch_array($displayud);
                    echo $rowud['name'] . '-' . $rowud['phone'] . '-' . $rowud['address'];
                  }

                  ?>"
                  style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%); border:0;"><i
                    class="fas fa-shopping-cart"></i> &nbsp; Checkout Now</button>
              <?php } ?>
            </div>

          </div>


        </div>

      </div>



    <?php } else {
      echo '<div class="columns mt-4 p-5 has-text-centered" style="height:80.5VH; text-align:center;">
		 
		 <div class="column card" style="padding-top:5em;">
		 <i class="fas fa-cart-plus" style="font-size:50px;"></i>
		 <p class="letter-spacing p-5 has-text-centered " >Oops! Your cart is empty, please add products to purchase.....</p></div>
		 
		 </div>';
    }

    ?>

    <?php

    // payment process esewa 
  
    if ($countcwm > 0) {
      /*
   echo'<form id="esewa_pay" action="https://epay.esewa.com.np/api/epay/transaction/status/?product_code=EPAYTEST&total_amount=100&transaction_uuid=123" method="POST">
    <input value="'.floor($total_net).'" name="tAmt" type="hidden">
    <input value="'.floor($total_net).'" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="wfo-'.$rowact['cb_id'].'" name="pid" type="hidden">
    <input value="https://whitefeathersjewellery.com/esewa_payment.php?success=wfo-'.$rowact['cb_id'].'" type="hidden" name="su">
    <input value="https://whitefeathersjewellery.com/esewa_payment.php?fail=wfo-'.$rowact['cb_id'].'" type="hidden" name="fu">
    <input value="Submit" type="submit" style="display:none;">
    </form>';
  */

      /*
      $s = hash_hmac('sha256','total_amount=110,transaction_uuid=241028,product_code=EPAYTEST','MhsMAwRTLQAYERsABRJTIgsaCgEVGBMSHwwWC1M1ARVdSykNAV1fOTFeLjZUMjssIyQ1LiQtLTY3JA==', true);
    echo base64_encode($s); 

      echo'
       <form action="https://epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa_pay" >
     <input type="text" id="amount" name="amount" value="100"  required>
     <input type="text" id="tax_amount" name="tax_amount" value ="10" required>
     <input type="text" id="total_amount" name="total_amount" value="110" required>
     <input type="text" id="transaction_uuid" name="transaction_uuid" value="241028" required>
     <input type="text" id="product_code" name="product_code" value ="EPAYTEST" required>
     <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
     <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
     <input type="text" id="success_url" name="success_url" value="https://esewa.com.np" required>
     <input type="text" id="failure_url" name="failure_url" value="https://google.com" required>
     <input type="text" id="signed_field_names" name="signed_field_names" value="'.base64_encode($s).'" required>
     <input type="text" id="signature" name="signature" value="MhsMAwRTLQAYERsABRJTIgsaCgEVGBMSHwwWC1M1ARVdSykNAV1fOTFeLjZUMjssIyQ1LiQtLTY3JA==" required>
     <input value="Submit" type="submit">
     </form>';
        */
$s = hash_hmac('sha256', "total_amount=". floor($total_net) .",transaction_uuid=". date("his") . '-' . $rowact['cb_id'] .",product_code=NP-ES-WHITEFEATHERS", 'MhsMAwRTLQAYERsABRJTIgsaCgEVGBMSHwwWC1M1ARVdSykNAV1fOTFeLjZUMjssIyQ1LiQtLTY3JA==', true);
      echo '
<form action="https://epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa_pay">

        <br><br><table style="display:none">
            <tbody><tr>
                <td> <strong>Parameter </strong> </td>
                <td><strong>Value</strong></td>
            </tr>

            <tr>
                <td>Amount:</td>
                <td> <input type="text" id="amount" name="amount" value="' . floor($total_net) . '" class="form" required=""> <br>
                </td>
            </tr>

            <tr>
                <td>Tax Amount:</td>
                <td><input type="text" id="tax_amount" name="tax_amount" value="0" class="form" required="">
                </td>
            </tr>

            <tr>
                <td>Total Amount:</td>
                <td><input type="text" id="total_amount" name="total_amount" value="' . floor($total_net) . '" class="form" required="">
                </td>
            </tr>

            <tr>
                <td>Transaction UUID:</td>
                <td><input type="text" id="transaction_uuid" name="transaction_uuid" value="' . date("his") . '-' . $rowact['cb_id'] . '" class="form" required=""> </td>
            </tr>

            <tr>
                <td>Product Code:</td>
                <td><input type="text" id="product_code" name="product_code" value="NP-ES-WHITEFEATHERS" class="form" required=""> </td>
            </tr>

            <tr>
                <td>Product Service Charge:</td>
                <td><input type="text" id="product_service_charge" name="product_service_charge" value="0" class="form" required=""> </td>
            </tr>

            <tr>
                <td>Product Delivery Charge:</td>
                <td><input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" class="form" required=""> </td>
            </tr>

            <tr>
                <td>Success URL:</td>
                <td><input type="text" id="success_url" name="success_url" value="https://whitefeathersjewellery.com/esewa_payment.php?success=wfo-' . $rowact['cb_id'] . '" class="form" required=""> </td>
            </tr>

            <tr>
                <td>Failure URL:</td>
                <td><input type="text" id="failure_url" name="failure_url" value="https://whitefeathersjewellery.com/esewa_payment.php?fail=wfo-' . $rowact['cb_id'] . '" class="form" required=""> </td>
            </tr>

            <tr>
                <td>signed Field Names:</td>
                <td><input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" class="form" required=""> </td>
            </tr>

            <tr>
                <td>Signature:</td>
                <td><input type="text" id="signature" name="signature" value="'. base64_encode($s) .'" class="form" required=""> </td>
            </tr>
            <tr>
                <td>Secret Key:</td>
                <td><input type="text" id="secret" name="secret" value="MhsMAwRTLQAYERsABRJTIgsaCgEVGBMSHwwWC1M1ARVdSykNAV1fOTFeLjZUMjssIyQ1LiQtLTY3JA==" class="form" required="">
                </td>
            </tr>
            
        </tbody></table>
        <input value=" Pay with eSewa " type="submit" class="button" style="display:none;">
    </form>';

    }


    ?>
    <script>
      // Function to auto-generate signature
      // function generateSignature() {
      //   var currentTime = new Date();
      //   var formattedTime = currentTime.toISOString().slice(2, 10).replace(/-/g, '') + '-' + currentTime.getHours() +
      //     currentTime.getMinutes() + currentTime.getSeconds();
      //   //document.getElementById("transaction_uuid").value = formattedTime+;
      //   var total_amount = document.getElementById("total_amount").value;
      //   var transaction_uuid = document.getElementById("transaction_uuid").value;
      //   var product_code = document.getElementById("product_code").value;
      //   var secret = document.getElementById("secret").value;

      //   //alert(total_amount+'***'+transaction_uuid+'***'+product_code+'***'+secret);
      //   var hash = CryptoJS.HmacSHA256(
      //     `total_amount=${total_amount},transaction_uuid=${transaction_uuid},product_code=${product_code}`,
      //     `${secret}`);

      //   var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);
      //   document.getElementById("signature").value = hashInBase64;
      // }

      // // Event listeners to call generateSignature() when inputs are changed
      // document.getElementById("total_amount").addEventListener("input", generateSignature);
      // document.getElementById("transaction_uuid").addEventListener("input", generateSignature);
      // document.getElementById("product_code").addEventListener("input", generateSignature);
      // document.getElementById("secret").addEventListener("input", generateSignature);
    </script>




    <?php include('footer_checkout.php'); ?>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/owl/owl.carousel.min.js"></script>
    <?php include('js.php'); ?>
    <script>
      $(document).on('click', '.first-checkout', function () {
        var user = $(this).attr("data-ref"); var ud = $(this).attr("data-ref2");
        $(this).hide();
        $('.header_title').html('');
        $('.cart_area').html(''); $('.checkout_h4').hide();
        $('.header_title').html('<span class="subtitle letter-spacing head_title_2"><i class="fas fa-cogs"></i>&nbsp; Confirm Your Order</span>');
        $('.cart_confirm').show();
        $('.cart_items_div').css({ 'height': '90VH' });
        $('.checkout-progress').fadeIn(500);
        $('.1step').removeClass('is-active');
        $('.1step').removeClass('has-gaps');
        $('.2step').addClass('is-active');
        if (user != '0') {
          const uarr = ud.split("-");
          $('.user-name').html(uarr[0]); $('.user-phone').html(uarr[1]); $('.del-name').val(uarr[0]); $('.del-location').val(uarr[2]); $('.del-phone').val(uarr[1]);
          $('.logsign').hide(); $('.delivery-info').fadeIn(500);
        }
      });

      $(document).on('submit', '#del_info_form', function (e) {
        e.preventDefault()
        var dataString = 'address=' + $('.del-location').val() + '&number=' + $('.del-phone').val() + '&msg=' + $('.del-msg').val() + '&name=' + $('.del-name').val();

        $.ajax({
          url: "deliverycart", data: dataString, type: 'POST', cache: false,
          success: function (result) {

            $('.delivery-info').hide();
            $('.2step').removeClass('is-active');
            $('.2step').removeClass('has-gaps');
            $('.3step').addClass('is-active');
            $('.delivery-info').hide();
            $('.payment-info').fadeIn(500);
          }
        });

      });

      $(document).on('click', '.confirm-order', function () {
        var pmode = $('input[name=group_2]:checked').val();
        var dataString = 'paym=' + pmode;
        if (pmode === '1') {
          //COD
          $.ajax({
            url: "confirmcart", data: dataString, type: 'POST', cache: false,
            success: function (result) {
              $('.confirm-success').fadeIn(500);
              $('.3step').removeClass('is-active');
              $('.4step').addClass('is-active');
              $('.process-div').html('');
              $('.header_title').html('<span class="subtitle letter-spacing head_title_2"><i class="fas fa-thumbs-up"></i>&nbsp; Order Confirmed Successfully</span>');
              const uarr = result.split("-");
              $('#tracking_code').html(uarr[0]);
            }
          });

        }
        if (pmode === '2') {
          window.location.href = 'khalti.php?cb_id=' + '<?php echo $rowact['cb_id']; ?>';
        }
        if (pmode === '3') {
          $('#esewa_pay').submit();
        }



      });


      $('input:radio[name="group_2"]').change(
        function () {
          if ($(this).val() != 1) {
            $('#pay_show').show();
          }
          else { $('#pay_show').hide(); }
        });
      $('.total_cost').html($('#tcost').val());
    </script>



  </body>




  </html>
<?php } ?>