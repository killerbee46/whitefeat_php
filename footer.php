<?php /* Disabled UI featured, digital ADS START
echo'<div class="container is-fluid" style="margin-top:1.5em;"><div class="columns is-variable letter-spacing"><div class="column column-banner is-4-desktop is-full-mobile"><div class="columns m-1 p-2 banner-scale" style="border:1px solid rgba(136,99,251,0.2); background-color:#F9F3E6;"><div class="column is-12 ads-banner-mini" style="padding-left:25%;"><i class="fas fa-images" style="font-size:2.8rem;"></i><Br><strong style="font-size:1.5em; font-weight:100; color:#3E8ED0;"><i class="fas fa-ad"></i>&nbsp;Your ad here.</strong></div></div></div><div class="column column-banner is-4-desktop is-full-mobile"><div class="columns m-1 p-2 banner-scale" style="border:1px solid rgba(136,99,251,0.2); background-color:#F6F4FF;"><div class="column is-12 ads-banner-mini" style="padding-left:25%;"><i class="fas fa-images" style="font-size:2.8rem;"></i><Br><strong style="font-size:1.5em; font-weight:100; color:#3E8ED0;"><i class="fas fa-ad"></i>&nbsp;Your ad here.</strong></div></div></div><div class="column column-banner is-4-desktop is-full-mobile "><div class="columns m-1 p-2 banner-scale" style="border:1px solid rgba(136,99,251,0.2); background-color:#F8EEF8;"><div class="column is-3" style=""><i class="fas fa-ad" style="font-size:5em;color:#3E8ED0;"></i></div><div class="column letter-spacing mt-3" style="font-size:0.9rem"><h3 class="subtitle mb-2">For Advertisements </h3><i class="fas fa-phone"></i>CALL:+977-9845178434 </div></div></div></div></div>';*/ ?>



<?php /* gold exchange program section start */ ?>
<div class="container is-fluid" style="margin-top:2.5em; background-color:#F7F0EE;">

	<div class="columns p-3" style="padding-top:0;">
		<div class="column" style="padding-left:5%; padding-top:2%;">
			<img src="assets/images/extra/ba1.png">
		</div>
		<div class="column letter-spacing pb-6" style="padding-top:5%;">
			<h1 class="title" style="font-size:1.7rem;">
				Gold Exchange Program!</h1> <br>
			- Exchange your old gold for new gorgeous jewellery at any whitefeather's store.<br><br>
			- Repolishing & Repair (FREE), Appointment with Jewellery Designer

			<br>
			<br>

			<small>
				Please note: The old gold doesn’t have to be from only whitefeather's, it can be any gold jewellery you
				have.
			</small>
			<br><br><br><br>

			<a href="post/exchange"><button class="button is-info is-light p-5 is-rounded"
					style="width:50%; border:1px solid #ddd;">Know More</button></a>

		</div>
	</div>

</div>
<?php /* gold exchange program section start */ ?>




<?php /* Footer Products OWL carousel section end */ ?>
<div class="container is-fluid" style="margin-top:1.5em;">
	<div class="columns is-variable" style="flex-direction:column; width:100%;">
		<div class="column is-10-desktop is-12-mobile letter-spacing">
			<h2 class="subtitle hd-1" style="border-bottom:1px solid #A65FF3; width:20%; padding-bottom:0.5em;">Best of
				White Feather's</h2>
		</div>

		<div class="column is-2-desktop is-12-mobile has-text-right"
			style="float:right!important; text-align:right; padding-right:0;">
			<div class="tags has-addons p-0">

				<span href="#" class=" button tag is-info p-4 for-women " href="#colors">Women</span>

				<span href="#" class=" button tag is-light p-4 for-men">Men</span>

			</div>

		</div>
	</div>



</div>




<div class="container is-fluid" style="margin-top:1.5em;">

	<div class="columns is-mobile p-0 for-women-div">
		<div class="column is-full">
			<div class="owl-carousel owl-theme owl-one">


				<?php
				/* lopping through products in database matching the terms and displaying start */
				$sqlpw = "Select * from `whitefeat_wf_new`.`package` where visible='1' and active='1' and status='1' and tag_women='1'";
				$displaypw = mysqli_query($con, $sqlpw);
				while ($rowpw = mysqli_fetch_array($displaypw)) {
					$sqlpw2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowpw['id_pack'] . "' limit 1";
					$displaypw2 = mysqli_query($con, $sqlpw2);
					$rowpw2 = mysqli_fetch_array($displaypw2);

					echo '
		      <div style="position:relative;">
  <a href="' . make_url($rowpw['p_name']) . '">
  <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowpw2['thumb'] . '" style="border:1px solid #eee; border-radius:2.5%; width:100%; height:100%; object-fit:cover;object-position:center; " class="image"/>';


					/* checking if product is alreay in wishlish or not start and displaying heart icon accordingly */
					$sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpw['id_pack'] . "' ";
					$displaywl = mysqli_query($con, $sqlwl);
					$countw = mysqli_num_rows($displaywl);
					if ($countw > 0) {
						echo '
  <a href="wishlist" class="added_wishlist" style="color:crimson;position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;font-size:18px;"><i class="fas fa-heart"></i></a>';
					} else {
						echo '<a href="#" style="position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowpw['id_pack'] . '"><i class="far fa-heart " style=""></i></a>';
					}

					echo '<br>';

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
					$dynamic_price = dynamicPriceCalculator($rowpw['p_name'], $crate);
					$original_price = $dynamic_price['originalPrice'];
					$newprice = $original_price;
					/* customer & its attribute checking end (new/logged-in,currency) */

					/* Checking for discount on product start */
					if ($rowpw['offer'] > 0) {
						$newprice = $original_price - $dynamic_price['discount'];
						echo '
  <span class="p-2"><Strong class="letter-spacing price-off ">';

						echo $cnot . " " . round(($newprice), 2);

						echo '</strong>
  <small><small><strike class="price-off">' . $cnot . round(($original_price), 2) . '</strike></small></small>';
					} else {
						echo '<span class="p-2"><Strong class="letter-spacing price-off ">';
						echo $cnot . " " . round($original_price, 2);
						echo '</strong>';
					}

					/* Checking for discount on product end */

					echo '<br> <span style="font-size:0.9rem; color:#555;" class="p-2">' . strtoupper($rowpw['p_name']) . '</span> </span>
  </a>
  </div>
		  
		  ';

				}

				/* lopping through products in database matching the terms and displaying end */

				?>







				<div class="owl-nav" style="display:none;">
					<div class='nav-button owl-prev'>
						<i class='fas fa-chevron-circle-left'
							style='position:absolute; font-size:2em; margin-top:-250px; margin-left:0.5%;'></i>
					</div>
					<div class='nav-button owl-next'>
						<i class='fas fa-chevron-circle-right'
							style='position:absolute; font-size:2em; margin-left:97%; margin-top:-250px;'></i>
					</div>
				</div>
			</div>



		</div>
	</div>




	<div class="columns is-mobile p-0 for-men-div" style="display:none;">

		<div class="column is-full">
			<div class="owl-carousel owl-theme owl-one">
				<?php

				/* lopping through products in database matching the terms and displaying start (Tag men) */

				$sqlpw = "Select * from `whitefeat_wf_new`.`package` where visible='1' and active='1' and status='1' and tag_men='1'";
				$displaypw = mysqli_query($con, $sqlpw);
				while ($rowpw = mysqli_fetch_array($displaypw)) {
					$sqlpw2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowpw['id_pack'] . "' limit 1";
					$displaypw2 = mysqli_query($con, $sqlpw2);
					$rowpw2 = mysqli_fetch_array($displaypw2);

					echo '
		      <div>
  <a href="' . make_url($rowpw['p_name']) . '">
  <img src="assets/images/product/thumb/' . $rowpw2['thumb'] . '" style="border:1px solid #eee; border-radius:2.5%; height:40VH; object-fit:cover;" class="image"/>';


					/* checking if product is alreay in wishlish or not start and displaying heart icon accordingly */
					$sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpw['id_pack'] . "' ";
					$displaywl = mysqli_query($con, $sqlwl);
					$countw = mysqli_num_rows($displaywl);
					if ($countw > 0) {
						echo '
  <a href="wishlist" class="added_wishlist"><i class="fas fa-heart" style="color:#9471FB; font-size:1.2rem; position:absolute; margin-left:90%;margin-top:-97%; z-index:11;"></i></a>';
					} else {
						echo '<a href="#" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowpw['id_pack'] . '"><i class="far fa-heart " style=""></i></a>';
					}
					/* checking if product is alreay in wishlish or not end */


					echo '<br>';

					/* customer & its attribute checking start (new/logged-in,currency) */

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

					/* customer & its attribute checking end (new/logged-in,currency) */


					/* Checking for discount on product start */
					if ($rowpw['offer'] > 0) {
						$newprice = $original_price - $dynamic_price['discount'];
						echo '
  <span class="p-2"><Strong class="letter-spacing price-off ">';

						echo $cnot . round(($original_price), 2);

						echo '</strong>
  <small><small><strike class="price-off">' . $cnot . round(($crate * $rowpw['price']), 2) . '</strike></small></small>';
					} else {
						echo '<span class="p-2"><Strong class="letter-spacing price-off ">';
						echo $cnot . round(($crate * $rowpw['price']), 2);
						echo '</strong>';
					}

					/* Checking for discount on product end */

					echo '<br> <span style="font-size:0.9rem; color:#555;" class="p-2">' . strtoupper($rowpw['p_name']) . '</span> </span>
  </a>
  </div>
		  
		  ';

				}

				/* lopping through products in database matching the terms and displaying end (Tag men) */



				?>











				<div class="owl-nav">
					<div class='nav-button owl-prev'>
						<i class='fas fa-chevron-circle-left'
							style='position:absolute; font-size:2em; margin-top:-250px; margin-left:0.5%;'></i>
					</div>
					<div class='nav-button owl-next'>
						<i class='fas fa-chevron-circle-right'
							style='position:absolute; font-size:2em; margin-left:97%; margin-top:-250px;'></i>
					</div>
				</div>





			</div>
		</div>
	</div>

</div>

<?php /* Footer Products OWL carousel section end */ ?>







<?php /* Footer Featured Blue Ribbon Badge start */ ?>
<div class="container is-fluid feature-div" style="margin-top:1.5em; background-color:#231535;">
	<div class="columns is-mobile p-0">
		<div class="column is-half" style="padding:6.5%; padding-top:4%; padding-bottom:4%;">
			<div class="columns">
				<div class="column is-4">
					<i class="fas fa-truck" style="color:#3892C6;font-size:4.5rem;"></i>
				</div>
				<div class="column is-8">
					<div>
						<span style="color:#fff;">100% Certified & Free Shipping</span><br>
						<span style="color:#3892C6; font-size:0.9rem;">Our jewellery always comes with a certificate of
							authentication.</span>
					</div>

				</div>
			</div>
		</div>
		<div class="column is-half" style="padding:6.5%; padding-top:4%; padding-bottom:4%;">
			<div class="columns">
				<div class="column is-4">
					<i class="fas fa-retweet" style="color:#3892C6;font-size:4.5rem;"></i>
				</div>
				<div class="column is-8">
					<div>
						<span style="color:#fff;">15 Day Money-Back</span><br>
						<span style="color:#3892C6;font-size:0.9rem;">Get 100% refund if you don't like your
							jewellery.</span>
					</div>

				</div>
			</div>

		</div>

	</div>
	<div class="columns is-mobile p-0" style="padding-left:10%!important;">
		<div class="column is-half" style="padding:6.5%; padding-top:0; padding-bottom:4%;">
			<div class="columns">
				<div class="column is-4">
					<i class="fas fa-hand-holding-heart" style="color:#3892C6;font-size:4.5rem;"></i>
				</div>
				<div class="column is-8">
					<div>
						<span style="color:#fff;">Lifetime Exchange</span><br>
						<span style="color:#3892C6; font-size:0.9rem;">Exchange your old designs anytime you want an
							upgrade.</span>
					</div>

				</div>
			</div>
		</div>
		<div class="column is-half" style="padding:9%; padding-top:0; padding-bottom:4%; padding-right:0;">
			<div class="columns">
				<div class="column is-4">
					<i class="far fa-gem" style="color:#3892C6;font-size:4.5rem;"></i>
				</div>
				<div class="column is-8">
					<div>
						<span style="color:#fff;">One Year Warranty</span><br>
						<span style="color:#3892C6; font-size:0.9rem;">If your jewellery has a defect, we will fix
							it.</span>
					</div>

				</div>
			</div>

		</div>

	</div>
</div>
<?php /* Footer Featured Blue Ribbon Badge end */ ?>




<?php /* testinomials on OWL carousel start */ ?>
<div class="container is-fluid" style=" background-color:#F9F9FA; padding-bottom:3%;">
	<div class="columns is-mobile p-0">
		<div class="column is-full">
			<div class="owl-carousel owl-theme owl-two has-text-centered">


				<?php

				/* lopping through reviews / testinomials in database displaying start */

				$sqltm = "Select * from `whitefeat_wf_new`.`testimonials` where t_vis='1' limit 5";
				$displaytm = mysqli_query($con, $sqltm);
				while ($rowtm = mysqli_fetch_array($displaytm)) {

					echo '
		  <div style="padding-top:3%; padding-bottom:3%;">
      <h6 style="color:#916CFC; font-size:1.2rem;"> <i>Customer' . "'" . 's Word</i> <i class="fas fa-heart" style="color:#916CFC; font-size:1rem;"></i> <i class="fas fa-heart" style="color:#916CFC; font-size:1rem;"></i> <i class="fas fa-heart" style="color:#916CFC; font-size:1rem;"></i></h6>
   <br><br>
   <span class="letter-spacing" style="color:#aaa;font-size:2rem; font-weight:100;">' . $rowtm['content_t'] . '</span>
   <br><br>
   <span style="font-size:0.9rem;">-' . $rowtm['name_t'] . ',  Via Instagram</span>
   <br><br><br>
   <a href="testinomial"><button class="button" style="color:#916CFC; border:1px solid #916CFC;">Read More</button></a>
  </div>
		  
		  ';


				}

				/* lopping through reviews / testinomials in database displaying end */



				?>

			</div>
		</div>
	</div>

</div>
<?php /* testinomials on OWL carousel end */ ?>





<?PHP /* FOOTER 2 COLLAGE SECTION START (BANNER SET 4) */ ?>

<div class="container is-fluid" style="margin-top:1.5em;">
	<div class="columns is-variable">
		<div class="column is-9-desktop is-12-mobile letter-spacing">
			<h2 class="subtitle hd-1"
				style="border-bottom:1px solid #A65FF3; width:30%; padding-bottom:0.5em; font-size:1.8rem; font-weight:380;">
				Shop Our Instagram</h2>
		</div>

		<div class="column is-3-desktop is-12-mobile insta-hd" style=" text-align:right; padding-right:0.7em;">
			<span style="font-size:1.5rem; font-weight:100">#MyWhiteFeatherStory</span>

		</div>
	</div>



</div>


<div class="container is-fluid" style="margin-top:1.5em;">
	<div class="columns">


		<?php

		$sqlb1 = "Select * from `whitefeat_wf_new`.`banner5` where visible='1' ORDER BY s_order limit 2 ";
		$displayb1 = mysqli_query($con, $sqlb1);
		$sn = 1;
		while ($rowb1 = mysqli_fetch_array($displayb1)) {
			if ($sn == 1) {

				echo '<div class="column is-4 p-0" style="padding-left:0.5em!important;">
    <a href="';

				$target = '#';
				if ($rowb1['hyper_link'] != '') {
					$target = $rowb1['hyper_link'];
				}
				if ($rowb1['title_link'] != 0) {
					$target = 'products/';
					$sqlslt2 = "Select * from `whitefeat_wf_new`.`package_category` where cat_id='" . $rowb1['title_link'] . "'";
					$displayslt2 = mysqli_query($con, $sqlslt2);
					$rowslt2 = mysqli_fetch_array($displayslt2);
					$target = $target . make_url($rowslt2['cat_name']);
				}
				if ($rowb1['package_link'] != 0) {
					$sqlslt2 = "Select * from `whitefeat_wf_new`.`package` where id_pack='" . $rowb1['package_link'] . "'";
					$displayslt2 = mysqli_query($con, $sqlslt2);
					$rowslt2 = mysqli_fetch_array($displayslt2);
					$target = make_url($rowslt2['p_name']);
				}

				echo $target . '"><img src="assets/images/banner5/' . $rowb1['s_path'] . '" class="image is-fullwidth banner-scale2" style="max-height:560px;"/></a>
		 </div>';
			}
			if ($sn == 2) {
				echo '
   <div class="column is-8 p-0" style="padding-left:0.5em!important;">
    <a href="';

				$target = '#';
				if ($rowb1['hyper_link'] != '') {
					$target = $rowb1['hyper_link'];
				}
				if ($rowb1['title_link'] != 0) {
					$target = 'products/';
					$sqlslt2 = "Select * from `whitefeat_wf_new`.`package_category` where cat_id='" . $rowb1['title_link'] . "'";
					$displayslt2 = mysqli_query($con, $sqlslt2);
					$rowslt2 = mysqli_fetch_array($displayslt2);
					$target = $target . make_url($rowslt2['cat_name']);
				}
				if ($rowb1['package_link'] != 0) {
					$sqlslt2 = "Select * from `whitefeat_wf_new`.`package` where id_pack='" . $rowb1['package_link'] . "'";
					$displayslt2 = mysqli_query($con, $sqlslt2);
					$rowslt2 = mysqli_fetch_array($displayslt2);
					$target = make_url($rowslt2['p_name']);
				}

				echo $target . '"><img src="assets/images/banner5/' . $rowb1['s_path'] . '" class="image is-fullwidth banner-scale2" style="max-height:560px;"/></a>
   </div>';
			}
			$sn++;
		}

		?>



	</div>

</div>

<?PHP /* FOOTER 2 COLLAGE SECTION END (BANNER SET 4) */ ?>



<?PHP /* SUBSCRIBER SECTION START */ ?>
<div class="container is-fluid" style="margin-top:2.5em; padding:3%; padding-bottom:2%; background-color:#231535;">
	<div class="columns is-mobile p-0">
		<div class="column has-text-centered">



			<i class="fas fa-paper-plane" style="color:#3892C6;font-size:2.5rem;"></i><br><br>
			<span style="color:#fff; font-size:1.5rem; font-weight:200;">Sign up to be a White Feather's
				Insider</span><br><br>


			<div class="columns">
				<div class="column is-5">
					&nbsp;
				</div>

				<div class="column is-8 pl-0 subs_div">
					<div class="field has-addons is-fullwidth has-text-centered">

						<div class="control has-text-centered">

							<input class="input email subs_email" type="email" placeholder="Email Address"
								style="background:transparent!important; border-color:#916CFC; color:#fff;">

						</div>
						<div class="control has-text-centered">
							<span class="button is-info subscribe"><i class="fas fa-check"></i></span>
						</div>
					</div>
				</div>
			</div>




			<br>


			<?PHP /* ABOUT WHITEFEATHER TRIANGLE CSS START */ ?>
			<span style="color:#3892C6;">About White Feather's Jewellery</span>
			<div style="
  position:absolute;
  left:48%;
  bottom:0%;
  width: 0;
height: 0;
border-style: solid;
border-width: 0 10px 10px 10px;
border-color: transparent transparent #ffffff transparent;"></div>
			<?PHP /* ABOUT WHITEFEATHER TRIANGLE CSS END */ ?>


		</div>

	</div>
</div>
<?PHP /* SUBSCRIBER SECTION END */ ?>




<?php /* Footer About us / SEO footer text start */ ?>
<div class="container is-fluid" style="margin-top:1.5em; padding-bottom:1%;">
	<div class="columns">
		<div class="column is-4">
			<h3 style="font-size:1.2rem; border-bottom:1px solid #916CFC; width:50%; padding-bottom:0.4em;">Online
				Jewellery Store</h3>
			<span style="font-size:0.7rem; font-weight:400;"><br>

				<?php
				/* Info stored in table "info" and id_info 19, can be changed directly via phpmyadmin */
				$sqlft = "Select * from `whitefeat_wf_new`.`info` where id_info='19'";
				$displayft = mysqli_query($con, $sqlft);
				$rowft = mysqli_fetch_array($displayft);

				echo $rowft['info_text'];

				?>


			</span>
		</div>

		<div class="column is-4">
			<h3 style="font-size:1.2rem; border-bottom:1px solid #916CFC; width:50%; padding-bottom:0.4em;">White
				Feather’s Vision</h3>
			<span style="font-size:0.7rem; font-weight:400;"><br>

				<?php
				/* Info stored in table "info" and id_info 20, can be changed directly via phpmyadmin */
				$sqlft = "Select * from `whitefeat_wf_new`.`info` where id_info='20'";
				$displayft = mysqli_query($con, $sqlft);
				$rowft = mysqli_fetch_array($displayft);

				echo $rowft['info_text'];

				?>

			</span>
		</div>
		<div class="column is-4">
			<h3 style="font-size:1.2rem; border-bottom:1px solid #916CFC; width:70%; padding-bottom:0.4em;">Shopping at
				Whitefeather's</h3>
			<span style="font-size:0.7rem; font-weight:400;"><br>


				<?php
				/* Info stored in table "info" and id_info 21, can be changed directly via phpmyadmin */
				$sqlft = "Select * from `whitefeat_wf_new`.`info` where id_info='21'";
				$displayft = mysqli_query($con, $sqlft);
				$rowft = mysqli_fetch_array($displayft);

				echo $rowft['info_text'];

				?>



			</span>
		</div>
	</div>
</div>
<?php /* Footer About us / SEO footer text end */ ?>


<?PHP /* LINKS FOOTER START */ ?>
<div class="container is-fluid"
	style="margin-top:1.5em; padding:3%; padding-bottom:2%; background-color:#F6EFF6; font-size:0.9em;">
	<div class="columns " style="padding-left:5%;">
		<div class="column is-2 ">
			<label class="has-text-weight-semibold"> Know your Jewellery </label><br>
			<a href="post/diamondguide" style="color:#666;font-size:0.7rem; font-weight:400;">DIAMOND GUIDE</a><br>
			<a href="post/jewelleryguide" style="color:#666;font-size:0.7rem; font-weight:400;">JEWELLERY GUIDE</a><br>
			<a href="post/gemstonesguide" style="color:#666;font-size:0.7rem; font-weight:400;">GEMSTONES GUIDE</a><br>
			<a href="post/goldrate" style="color:#666;font-size:0.7rem; font-weight:400;">GOLD RATE</a><br>
			<br>


		</div>

		<div class="column is-2">
			<label class="has-text-weight-semibold"> Whitefeather's Advantage </label><br>
			<!-- <a href="post/dayreturn" style="color:#666;font-size:0.7rem; font-weight:400;">15-DAY RETURNS</a><br> -->
			<a href="post/freeshipping" style="color:#666;font-size:0.7rem; font-weight:400;">FREE SHIPPING</a><br>
			<a href="post/financing" style="color:#666;font-size:0.7rem; font-weight:400;">FINANCING OPTIONS</a><br>
			<a href="post/exchange" style="color:#666;font-size:0.7rem; font-weight:400;">OLD GOLD EXCHANGE</a><br>

		</div>

		<div class="column is-2">
			<label class="has-text-weight-semibold"> Customer Service </label><br>
			<?php

			/* check is customer logged-in or not and setting anchor start */
			if ($GLOBALS['customer'] == 0) {

				echo '<a href="#" class="track_order" data-target="modal-user" style="color:#666;font-size:0.7rem; font-weight:400;"><i class="fas fa-truck-moving"></i> &nbsp;TRACK ORDER</a>';

			} else {

				echo '<a href="customer" style="color:#666;font-size:0.7rem; font-weight:400;"><i class="fas fa-truck-moving"></i> &nbsp;TRACK ORDER</a>';
			}
			/* check is customer logged-in or not and setting anchor end */
			?>




			<br>
			<a href="post/returnpolicy" style="color:#666;font-size:0.7rem; font-weight:400;">RETURN POLICY</a><br>
		</div>

		<div class="column is-2">
			<label class="has-text-weight-semibold"> About Us </label><br>
			<a href="post/story" style="color:#666;font-size:0.7rem; font-weight:400;">OUR STORY</a><br>
			<!-- <a href="post/notices" style="color:#666;font-size:0.7rem; font-weight:400;">PRESS & NOTICES</a><br> -->

		</div>

		<div class="column is-4">
			<label class="has-text-weight-semibold"> Contact Us </label><br>
			<a href="tel:+977-01-5365343" style="color:#666;font-size:0.7rem; font-weight:400;">+977-01-5365343 (
				HOTLINE ) <br> WORKING HOURS - 7 DAYS WEEK <small><small><i>(10am -6pm)</i></small></small></a><br>
			<a href="mailto:info@whitefeathersjewellery.com"
				style="color:#666;font-size:0.7rem; font-weight:400;">CONTACTUS@WHITEFEATHERS.COM</a><br>
			<a href="mailto:corporate@whitefeathersjewellery.com"
				style="color:#666;font-size:0.7rem; font-weight:400;">CORPORATE ENQUIRIES -
				B2B@WHITEFEATHERS.COM</a><br>
			<a href="mailto:careers@whitefeathersjewellery.com"
				style="color:#666;font-size:0.7rem; font-weight:400;">CAREERS@WHITEFEATHERS.COM ( FOR HR
				QUERIES)</a><br>
			<BR>

			<button class="button locate" style="background:transparent; border-color:#916CFC;"
				data-target="modal-map">Locate Us</button>

			<?php /*Google map location modal start */ ?>
			<div class="modal" id="modal-map">
				<div class="modal-background"></div>
				<div class="column modal-content has-background-white has-text-left p-0"
					style="width:80VW; max-height:90VH!important;">


					<h3 class="subtitle is-size-5 p-5 pb-0 mb-0 "
						style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">Whitefeathers Location:
						<small><small><small><small></small></small></small></small></h3>





					<div id="mapCanvas" style="height:79.5VH; width:100%; background:#fff;">
					</div>




				</div>
				<button class="modal-close is-large" aria-label="close"></button>
			</div>
			<?php /*Google map location modal end */ ?>





		</div>

	</div>

	<?php /* Social media links show start */ ?>
	<div class="columns social-div" style="padding-left:5%; margin-top:-3em;">
		<div class="column">
			<a href="
	   <?php
	   $sqlft = "Select * from `whitefeat_wf_new`.`links` where l_id='1'";
	   $displayft = mysqli_query($con, $sqlft);
	   $rowft = mysqli_fetch_array($displayft);

	   echo $rowft['l_add'];

	   ?>"><i class="fab fa-facebook-f" style="color:#3892C6; font-size:1.5rem;"></i></a>&nbsp; &nbsp; &nbsp;
			<a href="
	   <?php
	   $sqlft = "Select * from `whitefeat_wf_new`.`links` where l_id='5'";
	   $displayft = mysqli_query($con, $sqlft);
	   $rowft = mysqli_fetch_array($displayft);

	   echo $rowft['l_add'];

	   ?>"><i class="fab fa-instagram" style="color:#3892C6; font-size:1.5rem;"></i></a>&nbsp; &nbsp; &nbsp;
			<a href="
	   <?php
	   $sqlft = "Select * from `whitefeat_wf_new`.`links` where l_id='6'";
	   $displayft = mysqli_query($con, $sqlft);
	   $rowft = mysqli_fetch_array($displayft);

	   echo $rowft['l_add'];

	   ?>"><i class="fab fa-tiktok" style="color:#3892C6; font-size:1.5rem;"></i></a>&nbsp; &nbsp; &nbsp;
			<a href="
	   <?php
	   $sqlft = "Select * from `whitefeat_wf_new`.`links` where l_id='4'";
	   $displayft = mysqli_query($con, $sqlft);
	   $rowft = mysqli_fetch_array($displayft);

	   echo $rowft['l_add'];

	   ?>"><i class="fab fa-twitter" style="color:#3892C6; font-size:1.5rem;"></i></a>&nbsp; &nbsp; &nbsp;
			<a href="
	   <?php
	   $sqlft = "Select * from `whitefeat_wf_new`.`links` where l_id='2'";
	   $displayft = mysqli_query($con, $sqlft);
	   $rowft = mysqli_fetch_array($displayft);

	   echo $rowft['l_add'];

	   ?>"><i class="fab fa-youtube" style="color:#3892C6; font-size:1.5rem;"></i></a>&nbsp; &nbsp; &nbsp;
			<a href="
	   <?php
	   $sqlft = "Select * from `whitefeat_wf_new`.`links` where l_id='3'";
	   $displayft = mysqli_query($con, $sqlft);
	   $rowft = mysqli_fetch_array($displayft);

	   echo $rowft['l_add'];

	   ?>"><i class="fab fa-linkedin" style="color:#3892C6; font-size:1.5rem;"></i></a>
		</div>
	</div>

	<?php /* Social media links show end */ ?>

	<?php /* copyright atribute start */ ?>
	<div class="columns" style="padding-bottom: 20px; padding-left: 5%;">
		<div class="column is-8">
			<span style="color:#3892C6; font-size:0.8rem; font-weight:400; ">COPYRIGHT WHITE FEATHER'S © 2025,
				<code>Powered by<i><a href="https://rupomsha.digital"><strong class="tag tag-info">#rupomsha</strong></a></i></code></span>
			<br>
			<span style="color:#333; font-size:0.7rem; font-weight:400; "><a href="sitemap" style="color:#111;">SITE
					MAP</a> | &nbsp;<a href="post/privacy" style="color:#111;">PRIVACY POLICY</a> | &nbsp;<a
					href="post/terms" style="color:#111;">TERMS & CONDITIONS</a>
				<!-- | &nbsp;<a href="post/corporate" style="color:#111;">CORPORATE</a> | &nbsp;<a href="post/faq" style="color:#111;">FREQUENTLY ASKED QUESTION</a> -->
			</span>
		</div>
		<div class="column is-4 p-0">
			<img src="assets/images/pay.png" class="image" style="max-height:70px; width:auto;" />

		</div>
	</div>
	<?php /* copyright atribute end */ ?>


</div>
<?PHP /* LINKS FOOTER END */ ?>



<!-- Start of Tawk.to Script for live chat
<script type="text/javascript">

	var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
	(function () {
		var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
		s1.async = true;
		s1.src = 'https://embed.tawk.to/63b7e22647425128790bfb0d/1gm34mqia';
		s1.charset = 'UTF-8';
		s1.setAttribute('crossorigin', '*');
		s0.parentNode.insertBefore(s1, s0);
	})();
</script> -->
<!--End of Tawk.to Script-->