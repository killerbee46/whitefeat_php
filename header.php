<?php 
include 'header-assets.php';
$offSql = "Select count(*) as total,cno from cart_book where checkout = '1' and email = 'offer-nosepin' ";
		$displayOff = mysqli_query($con, $offSql);
		$offerGrabbed = mysqli_num_rows($displayOff);
        $origin = new DateTime("now", new DateTimeZone('Asia/Kathmandu')); 
        $target = new DateTime('2025-12-12T11:11:00',new DateTimeZone('Asia/Kathmandu'));
        $interval = $origin->diff($target);
		$offerExpired = $offerGrabbed >= 12 || $interval < 0 ? true : false;


while ($rowsOffer = mysqli_fetch_array($displayOff)) {
    if($GLOBALS['customer']!=0){
        $sqlud = "Select phone from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "' ";
                  $displayud = mysqli_query($con, $sqlud);
                  $rowud = mysqli_fetch_array($displayud);
                  if ($rowud['phone']==$rowsOffer['cno']) {
                    $offerExpired = true;
                  }
    }
}


?>
    <?PHP /*-- anchor link use for autosearch trigger start --*/?>
	<a href="#" id="autocomplete_trigger"></a>
	<?PHP /*-- anchor link use for autosearch trigger end --*/?>

    <div class="modal" id="home-try-modal">
        <div class="modal-background" onclick="closeModal('home-try-modal')"></div>
        <div class="modal-content">
            <div class="box">
                <h2>Free Try at Home</h2>
                <hr />
                <section class="modal-card-body">
<?php 

	    if($GLOBALS['customer']==0){
	  echo'<div class="field">
  <label class="label">Name <span class="has-text-danger">*</span>
</label>
  <div class="control">
  <div class="control has-icons-left has-icons-right">
    <input class="input home_name" type="text" placeholder="Your Full Name">
	<span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
	</div>
  </div>
</div>

<div class="field">
  <label class="label">Full Address <span class="has-text-danger">*</span></label>
  <div class="control has-icons-left has-icons-right">
    <input class="input home_add" type="text" placeholder="Your Full Address" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-map-marker"></i>
    </span>
    
  </div>
</div>

<div class="field">
  <label class="label">Contact number <span class="has-text-danger">*</span></label>
  <div class="control has-icons-left has-icons-right">
    <input class="input home_phone" type="number" placeholder="+97798XXXXXXXX" value="" required>
    <span class="icon is-small is-left">
      <i class="fas fa-mobile"></i>
    </span>
    
  </div>
</div>';

        }

?>



<div class="field">
  <label class="label">Message <small class="is-size-7"></small></label>
  <div class="control">
    <textarea class="textarea home_msg" placeholder="Please Write Jewelleries you want to try..."></textarea>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
      
      <i class="fas fa-check-circle"></i> &nbsp;I agree to the <a href="#">terms and conditions</a>
    </label>
  </div>
</div>


<div class="field is-grouped mt-2">
  <div class="control">
    <button class="button is-info send_home_appoint">Submit</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>
</div>
	  
    </section>
    </div>
        </div>
        <button class="modal-close is-large" onclick="closeModal('home-try-modal')" aria-label="close"></button>
    </div>

    <div class="modal" id="custom-design-modal">
        <div class="modal-background" onclick="closeModal('custom-design-modal')"></div>
        <div class="modal-content">
            <div class="box">
                <h2>Customize your own design</h2>
                <hr />
                <img class="modal-cover" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/custom-des.png" />
                <div class="modal-info">
                    <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/whatsapp-qr-wf.png" class="whatsapp-qr" alt="Whatsapp qr" />
                    <div class="modal-info-list">
                        <div class="modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Get on a live
                                video call with our design consultants.</span>
                        </div>
                        <div class="modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Live Available On
                                <b>Whatsapp, Viber & Messenger!</b></span>
                        </div>
                        <div class="modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>SUN - SAT ( 9am
                                to 6pm )</span>
                        </div>
                        <div class="modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>OPENS 365 DAYS!
                                <a
                                    href="https://www.google.com/maps/place/White+Feathers+Jewellery/@27.7027815,85.3085035,17z/data=!3m1!4b1!4m6!3m5!1s0x39eb190051eb7d6d:0x345d8d98fffd34e7!8m2!3d27.7027768!4d85.3110784!16s%2Fg%2F11fklpz4dp?entry=ttu&g_ep=EgoyMDI1MDYxNy4wIKXMDSoASAFQAw%3D%3D">
                                    Location Map
                                </a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" onclick="closeModal('custom-design-modal')" aria-label="close"></button>
    </div>

    <div class="modal" id="jwell-sell-modal">
        <div class="modal-background" onclick="closeModal('jwell-sell-modal')"></div>
        <div class="modal-content jwell-sell-modal-content">
            <div class="box">
                <h2>Sell your jwellery / gold </h2>
                <hr />
                <div class="jwell-sell-modal-content">
<div class="modal-cover" style="background-image:url(https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/jwell-sell.jpg);"></div>
                    <!-- <img class="modal-cover" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/jwell-sell.jpg" /> -->
                    <div class="modal-info">
                        <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/whatsapp-qr-wf.png" class="whatsapp-qr" alt="Whatsapp qr" />
                        <div class="modal-info-info">
                            <a href="tel:+977-9806091605" class="phone-link">+977-9806091605</a>
                        <div class="phone-info">(CALL / WHATSAPP / VIBER)</div>
                        <div class="modal-info-list-container">
                            <div class="modal-info-list">
                                <div class="modal-info-list-item">
                                    <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Get on a
                                        live
                                        video call with our design consultants.</span>
                                </div>
                                <div class="modal-info-list-item">
                                    <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Live
                                        Available On
                                        <b>Whatsapp, Viber & Messenger!</b></span>
                                </div>
                                <div class="modal-info-list-item">
                                    <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>SUN - SAT
                                        ( 9am
                                        to 6pm )</span>
                                </div>
                                <div class="modal-info-list-item">
                                    <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>OPENS 365
                                        DAYS!
                                        <a target="_blank"
                                            href="https://www.google.com/maps/place/White+Feathers+Jewellery/@27.7027815,85.3085035,17z/data=!3m1!4b1!4m6!3m5!1s0x39eb190051eb7d6d:0x345d8d98fffd34e7!8m2!3d27.7027768!4d85.3110784!16s%2Fg%2F11fklpz4dp?entry=ttu&g_ep=EgoyMDI1MDYxNy4wIKXMDSoASAFQAw%3D%3D">
                                            Location Map
                                        </a></span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" onclick="closeModal('jwell-sell-modal')" aria-label="close"></button>
        </div>
    </div>

    <div class="modal" id="login-modal">
        <div class="login-modal-background" onclick="closeModal('login-modal')"></div>
        <div class="login-modal-content">
            <div class="box">
                <h2>Free Try at Home</h2>
                <hr />
                <img class="login-modal-cover" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/free-try.webp" />
                <div class="login-modal-info">
                    <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/whatsapp-qr-wf.png" class="whatsapp-qr" alt="Whatsapp qr" />
                    <div class="login-modal-info-list">
                        <div class="login-modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Get to try our
                                products.</span>
                        </div>
                        <div class="login-modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Free
                                Drop-In.</span>
                        </div>
                        <div class="login-modal-info-list-item">
                            <span><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/green-tick.png" width="15px" height="15px" /></span> <span>Excellent
                                Services.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" onclick="closeModal('login-modal')" aria-label="close"></button>
    </div>
    <?php
    echo '
    <div class="modal" id="modal-user">
  <div class="modal-background"></div>
  <div class="column modal-content has-background-white p-0" style="width:60VW;">
      <h3 class="subtitle is-size-5 p-5" style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">Customer area:</h3>
	  
  
	  
	  
	 <div class="columns has-background-white mt-3 each_item mr-3 p-5">
	   
	 
	   <div class="column p-5 has-background-white login-main-div">
	   
	   
	   <span class="pl-0 is-size-6 is-fullwidth login-div "> Login </span>';
           

         /* regular user login section start */
 				echo'<span class="flogin"  style="">
				
				<div class="field mt-2">
				<label class="label">Username</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input exampleFormControlInputPhone" type="email" id="exampleFormControlInputPhone" placeholder="Phone number">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
  </p>
</div>
<div class="field">
<label class="label">Password</label>
  <p class="control has-icons-left">
    <input class="input exampleFormControlInputPass" type="password" id="exampleFormControlInputPass" placeholder="Password">
    <span class="icon is-small is-left">
      <i class="fas fa-asterisk"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control">
    <button class="button is-success is-light checkU">
      <i class="fas fa-lock"></i> &nbsp; Login
    </button>
  </p>
</div>
				
  </span>
  
  

				<span class="fpass"><div class="column" style="padding-left:0;"><div class="form-group">
<a href="#"> <small><span class="noPass"><i class="fas fa-hand-o-right"></i> Forgot your password?</span></small></a>
 
  </div></div></span>';
  /* regular user login section end */
  
  
  
  
  /* forgot password feature modal start */
  
  echo'
  
  <span class="fpass1" style="display:none;">
   <div class="col-md-12 forgot_phone">
	    <div class="form-group">
    <label for="exampleFormControlInput1">Enter Your Phone number</label>
    <input type="number" class="input exampleFormControlInputPhone2" id="" placeholder="9XXXXXXXXXX">
        </div>
	  </div>
	  <div class="col-md-12"><div class="form-group"><br>
 <button class="button is-link is-light checkEmail">Send OTP &nbsp;<i class="fa fa-angle-right"></i></button>
 
  </div>
  </div>
  <br>
  <div class="col-md-12">
  <small><u>Contact us</u>
  +977 - 9824906744  , if you have any issue.
  <br>-Thankyou, WhiteFeathers Team
  </small>
  </div>
  
  </span>'; 
   /* forgot password feature modal end */
  
  
  /* sign up customer OTP confim feature modal start */
  
  echo'<span class="fpassOtp" style="display:none;">
   <div class="columns forgot_phone">
	    <div class="form-group">
    <label for="exampleFormControlInput1">Enter OTP received</label>
    <input type="number" class="input otpnum" id="otpnum" placeholder="">
        </div>
	  </div>
	  <div class="columns"><div class="form-group"><br>
 <button class="button is-success confirmOtp">Confirm OTP &nbsp;<i class="fa fa-check-circle"></i></button>
 
  </div>
  </div>
  <br>
  
  
  <div class="columns mb-2 mt-2 has-text-semibold resend_otp">';
    echo"<strong>Didn't get code? please wait...</strong>";
  echo'</div>
  
  
  
  <hr>
  
  <div class="columns mt-2">
  <small><u>Contact us</u>
  +977 - 9824906744  , if you have any issue.
  <br>-Thankyou, WhiteFeathers Team
  </small>
  </div>
  
  </span>';
  
  /* sign up customer OTP confim feature modal end */
  
  
			
		
	   echo '</div>
	   
	   <div class="column has-background-white-ter signup-div" style="border:1px solid #ddd; padding:1em;">
	    
		<br>';
		
		  /* regular user signup first screen section start */
		echo'<span class="pl-0 is-size-6 is-fullwidth " style="">Signup</span>
		  
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
  +977 - 9824906744  , if you have any issue. 
  </small>
  </div>
  
  </span>';
      /* regular user signup first screen section end */
  
    
  
  
  /* new user OTP confirm feature modal start*/
  echo'<span class="fpassOtpSignup" style="display:none;">
   <div class="columns forgot_phone mt-2 p-4" >
	    <div class="form-group">
    <label for="exampleFormControlInput1">Enter OTP received</label>
    <input type="number" class="input otpnumSignup" id="otpnumSignup" placeholder="">
        </div>
	  </div>
	  <div class="columns pl-4"><div class="form-group"><br>
 <button class="button is-success confirmOtpSignup">Confirm OTP &nbsp;<i class="fa fa-check-circle"></i></button>
 
  </div>
  </div>
  <br>
  
  
  <div class="columns mb-2 mt-2 pl-4 has-text-semibold resend_otpSignup">';
    echo"<strong>Didn't get code? please wait...</strong>";
  echo'</div>
  
  
  
  <hr>
  
  <div class="columns mt-2 pl-4">
  <small><u>Contact us</u>
  +977 - 9824906744  , if you have any issue.
  <br>-Thankyou, WhiteFeathers Team
  </small>
  </div>
  
  </span>';
    /* new user OTP confirm feature modal end*/
  
  
  
  
  
	   
	   echo'</div>
	   
	   
	   
	   
	   </div>
	   
	   
	  
	  
	  
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
	

	  
	  ';
    ?>
	<?php {
            /* loading required files start */
    		include('db_connect.php'); 
	        include_once('make_url.php'); 
	        /* loading required files end */ 
	?>
  <div class="navigation-bar">

  <div class="topbar">
                <div class="topbar-item" onclick="openModal('home-try-modal')">
                    <i class="fas fa-home"></i> Free Try at Home
                </div>
                <div class="topbar-item" onclick="openModal('custom-design-modal')">
                    <i class="fas fa-tools"></i> Custom Design
                </div>
                <div class="topbar-item" onclick="openModal('jwell-sell-modal')">
                    <button>Sell Jwellery / Gold</button>
                </div>
            </div>
	  
	  
    
	       <?php /* Header desktop view start */ ?>
	
<nav class="navbar">
                <div class="flex justify-between" style="align-items: center;">
                    <div class="logo-menu-container flex align-center">
                        <a href="/">
                            <img src="assets/images/wflogo.png" class="logo" />
                            <img src="assets/images/wflogo-small.png" class="logo-small" />
                        </a>
                        <div class="menus">
                            <?php foreach ($menus as $index => $menu) { ?>
                                <div class="custom-dropdown">
    <div class="menu-items">
        <?= htmlspecialchars($menu['title']) ?>
    </div>
    <div class="custom-dropdown-content">
        <div class="columns">
            <div class="column is-three-quarters">
                <div class="columns">
                    <?php 
                    $sub_cat = array_slice($menu['children'],0,1)[0]; ?>

                    <div class="column">
                        <h5 class="section-header">
<?= htmlspecialchars($sub_cat['title']) ?>
                        </h5>
                        <?php if (htmlspecialchars($menu['title']) == "Gifting") { ?>
                            <div class="gifting-sub-menu">
                                <?php foreach ($sub_cat['data'] as $id => $data) { ?>
                                <a href=<?= htmlspecialchars($data['path']) ?> class="item">
                                    <img src=<?= htmlspecialchars($data['image']) ?> class="cat-image" />
                                <?= htmlspecialchars($data['title']) ?>
                                </a>
                                <!-- <a href=<?= htmlspecialchars($data['path']) ?>>
                                <?php if(htmlspecialchars($data['image']) !== "") {  ?>
                                <img src=<?= htmlspecialchars($data['image']) ?>
                                    class="cat-image" />
                                    <?php } ?>
                                <?= htmlspecialchars($data['title']) ?>
                                </a> -->
                            <?php }  ?>
                            </div>
                        <?php } else { ?>
                        <div class="overlay-menu-list sub-cat">
                            <?php foreach ($sub_cat['data'] as $id => $data) { ?>
                                <a href=<?= htmlspecialchars($data['path']) ?>>
                                    <img src=<?php echo $data['image'] ?> class="cat-image" />
                                <?= htmlspecialchars($data['title']) ?>
                                </a>
                                <!-- <a href=<?= htmlspecialchars($data['path']) ?>>
                                <?php if(htmlspecialchars($data['image']) !== "") {  ?>
                                <img src=<?= htmlspecialchars($data['image']) ?>
                                    class="cat-image" />
                                    <?php } ?>
                                <?= htmlspecialchars($data['title']) ?>
                                </a> -->
                            <?php }  ?>
                        </div>
                        <?php }  ?>
                    </div>
                    <div class="column is-one-third menu-sub-cat-flex">
                    <?php $other_sub_cat = array_slice($menu['children'],1,count($menu['children'])-1);
                    foreach ($other_sub_cat as $i => $child) { ?>
                        <h5 class="section-header">
<?= htmlspecialchars($child['title']) ?>
                        </h5>
                        <div class="overlay-menu-list">
                            <?php foreach ($child['data'] as $id => $data) { ?>
                                <a href=<?= htmlspecialchars($data['path']) ?>>
                                <?php if(htmlspecialchars($data['image']) !== "") {  ?>
                                <img src=<?= htmlspecialchars($data['image']) ?>
                                    class="cat-image" />
                                    <?php } ?>
                                <?= htmlspecialchars($data['title']) ?>
                                </a>
                            <?php }  ?>
                        </div>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="column menu-cover-container">
                <img src=<?= htmlspecialchars($menu['image']) ?> class="menu-cover" />
                <!-- <div class="menu-cover" style="background-image:url(<?= htmlspecialchars($menu['image']) ?>);"></div> -->
            </div>
        </div>
    </div>
</div>
<?php } ?>
                        </div>
                    </div>
                    <div class="search-info-container flex align-center justify-between" style="gap: 10px;">
                        <div class="col-6 flex align-center" style="gap:10px;position:relative;">
                            <?php /* START ==> Header autocomplete search */?>
                                <span id="the-basics">
            <div class="search-icon-container" style="position:absolute;z-index:10;top:0;bottom:0;height:100%;display:flex; align-items: center;padding-left:10px;"><i class="fas fa-search search-icon"></i></div><input class="nav-search typeahead" id="auto-com-val" type="search" placeholder="Search..." style="height: 100%;" />
	    </span>
      <?php /* END ==> Header autocomplete search */?>
                            <div class="currency-select">
                                <input type="checkbox" id="curr-temp">
                                <label for="curr-temp" class="curr-select">
                                    <span id="current-currency">
                                        <!-- <script>getCurrValue()</script> -->
                                         <?php 
  
      $sql1acc = "Select * from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$GLOBALS['cookid']."'"; 
      $displayacc=mysqli_query($con,$sql1acc);
      $rowacc = mysqli_fetch_array($displayacc);
	  
	  
      $sql1acc2 = "Select * from `whitefeat_wf_new`.`customer` where c_id='".$GLOBALS['customer']."'"; 
      $displayacc2=mysqli_query($con,$sql1acc2);
      $countc=mysqli_num_rows($displayacc2);
	  $rowacc2 = mysqli_fetch_array($displayacc2);
	  if($countc<1){$rowacc2['cur_id']=1;}
	  
	
	
	
    $trigger=1;
    if(($GLOBALS['customer']!=0)){
	  $trigger=$rowacc2['cur_id'];
	}
	else{    
	$trigger=$rowacc['cookie_currency'];
	}
	
	
	if($trigger==1){
			echo'
    <div class="default-curr" style="padding-top:0;">
                                        <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/np.png" alt="user detail" /> NPR
                                    </div>';
	}
	
	    if($trigger==2)
		{
			echo'
    <div class="default-curr" style="padding-top:0;">
                                        <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/aud.png" alt="user detail" /> AUD
                                    </div>';
		  
		}
	    
		if($trigger==3)
		{
		  	echo'
    <div class="default-curr" style="padding-top:0;">
                                        <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/usd.png" alt="user detail" /> USD
                                    </div>';
		}
		
	    if($trigger==4)
		{
		  	echo'
    <div class="default-curr" style="padding-top:0;">
                                        <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/eur.png" alt="user detail" /> EUR
                                    </div>';
		}
	
	
	
	
	?>
	</span>
	       <?php /* customer currecny wise flag check end */ ?>
                                    </span>
                                    <div class="curr-opt">
                                        <div class="curr-opt-item change_currency" onclick="selectHandler('npr')">
                                            <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/np.png" alt="user detail" /> NPR
                                        </div>
                                        <div class="curr-opt-item change_currency" onclick="selectHandler('aud')">
                                            <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/aud.png" alt="user detail" /> AUD
                                        </div>
                                        <div class="curr-opt-item change_currency" onclick="selectHandler('usd')">
                                            <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/usd.png" alt="user detail" /> USD
                                        </div>
                                        <div class="curr-opt-item change_currency" onclick="selectHandler('eur')">
                                            <image class="icons" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/flags/eur.png" alt="user detail" /> EUR
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-6 flex align-center justify-end" style="gap:20px;">
                            <div class="user-dropdown info">
<?php 
  	  		/* if user is not logged-in START */ 
  if($GLOBALS['customer']=='0'){
	  echo'<span data-target="modal-user" class="user-modal contains-number big-screen">
	  <i class="fas fa-user icons" style="font-size:18px"></i>
	  </span>';
	  }
	  		/* if user is not logged-in END */ 
			
			
	  /* if user is logged-in START */ 
  else{
	  echo'<a href="customer"><i class="fas fa-user-lock"></i></a>';
  }
  /* if user is logged in END */ 
  
  ?>
                                <!-- <image class="avatar menu-items icons" onclick="openModal('login-modal')" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/user.png" alt="user detail" /> -->
                            </div>
                            <a href="/wishlist" class="contains-number big-screen">
                                <i class="fas fa-heart info icons" style="font-size: 18px;"></i>
                                <div class="number-data">
                                    <?php 
      $sql1acw = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='".$GLOBALS['cookid']."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  $countcw=mysqli_num_rows($displayacw);
	  echo $countcw;


?>
                                </div>
                            </a>
                            <a href="/checkout.php" class='contains-number big-screen'>
                                <i class="fas fa-shopping-cart info icons" style="font-size: 18px;"></i>
                                <div class="number-data">
                                    <?php

      /* checking for cart items from database start */  
      $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='".$GLOBALS['cookid']."' and checkout='0' "; 
      $displayact=mysqli_query($con,$sql1act); $countchk=mysqli_num_rows($displayact);
	  $rowact=mysqli_fetch_array($displayact);
	  //echo $GLOBALS['cookid'];
	  
	  if($countchk>0){
      $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowact['cb_id']."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  $countcw=mysqli_num_rows($displayacw);
	  
		  
		  echo $countcw;
	}
	else{echo'0';}
	        /* checking for cart items from database end */
      	  
  ?>
                                </div>
                            </a>
                            <div class="menu-drawer-toggle hidden-big-screen">
                                <div id="menu-toggle">
                                    <i class="fas fa-bars" onclick="openDrawer('custom-menu-drawer')" style="font-size: 20px; margin-top:10px;"></i>
                                </div>
                                <div id="drawer-close-toggle"></div>
                            </div>
                        </div>
                    </div>
            </nav>
  </div>

<div class="nav-spacer"></div>

  <?php /* Header mobile view start */ ?>
  
<div id="custom-menu-drawer" class="hidden-big-screen">
        <div class="custom-menu-drawer-title">
            <div class="user-dropdown info">
<?php 
		  /* MV (Mobile View) if user is not logged-in START */ 
  if($GLOBALS['customer']=='0'){
	  echo'<span data-target="modal-user" class="user-modal contains-number small-screen">
	  <i class="fas fa-user icons" style="font-size:18px"></i> <span style="cursor:pointer;"> Login</span>
	  </span>  
	  ';
	  }
  
  /* MV (Mobile View) if user is not logged-in END */ 
  
  /* MV (Mobile View) if user is logged-in START */ 
  else{
	  echo'<a href="customer"><i class="fas fa-user-lock"></i> <small class="is-size-6"> Profile</small></a>';
  }
  /* MV (Mobile View) if user is logged-in END */ 
  ?>
                            </div>
            <a href="/wishlist" class="contains-number small-screen">
                <i class="fas fa-heart info icons" style="font-size: 18px;"></i><span> Wishlist</span>
                                <div class="number-data">
                                    <?php 
      $sql1acw = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='".$GLOBALS['cookid']."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  $countcw=mysqli_num_rows($displayacw);
	  echo $countcw;


?>
                                </div>
                            </a>
                            <a href="/checkout.php" class='contains-number small-screen'>
                                <i class="fas fa-shopping-cart info icons" style="font-size: 18px;"></i> <span> Cart</span>
                                <div class="number-data">
                                    <?php

      /* checking for cart items from database start */  
      $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='".$GLOBALS['cookid']."' and checkout='0' "; 
      $displayact=mysqli_query($con,$sql1act); $countchk=mysqli_num_rows($displayact);
	  $rowact=mysqli_fetch_array($displayact);
	  //echo $GLOBALS['cookid'];
	  
	  if($countchk>0){
      $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowact['cb_id']."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  $countcw=mysqli_num_rows($displayacw);
	  
		  
		  echo $countcw;
	}
	else{echo'0';}
	        /* checking for cart items from database end */
      	  
  ?>
                                </div>
                            </a>
        </div>
        <div class="accordion-container">
           <?php
           foreach ($menus as $index => $menu): ?>
        <div class="accordion">
                <?= htmlspecialchars($menu['title']) ?>
        </div>
        <div class="panel">
            <?php
             $children = $menu['children'][0]; 
             foreach($children['data'] as $data => $child):  ?>
             <a href=<?= $child['path'] ?>>
                    <div><?= $child['title'] ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
  <?php /* Header mobile view end */ ?>
  
 <?php /* anchor used for sms API porvider to send OTP start */ ?>
<a href="" id="sms_load" target="_blank"></a>
 <?php /* anchor used for sms API porvider to send OTP end */ ?>


	<?php }?>
	
	
	<script>
        var acc = document.getElementsByClassName("accordion");
var panel = document.getElementsByClassName('panel');
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>