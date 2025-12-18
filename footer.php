<?php
$sqlfixed = fetchProducts(" cat_id = 81 order by p.id_pack DESC limit 20");
$displayfixed = mysqli_query($con, $sqlfixed);
$countFixed = mysqli_num_rows($displayfixed);

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
?>

<div class="container is-fluid" style="padding-top:1.5em; background-color:#231535;color:white; margin-top:3em">
	<div style="display:flex;justify-content:space-between;align-items:baseline;">
		<div
			style="font-size: 20px; width: max-content;padding-bottom:10px;border-bottom:1px solid #A65FF3;margin-bottom:40px;">
			Fixed Price 14K Eartops
		</div>
		<a href="/search.php?cat_id=81">
			<button
				style="border:1px solid white;outline:none; background: transparent;cursor:pointer;color:white;font-weight:600;padding:5px 10px;">
				View All
			</button>
		</a>
		<!-- <div
			style="font-size: 20px; width: max-content;padding-bottom:10px;border-bottom:1px solid #A65FF3;margin-bottom:40px;">
			Fixed Price 14K Eartops
		</div> -->
	</div>
	<?php
	if ($countFixed > 0) { ?>
		<div class="columns is-mobile p-0">
			<div class="column is-full">
				<div class="owl-carousel owl-theme owl-one">


					<?php

					while ($rowfixed = mysqli_fetch_array($displayfixed)) {

						echo '
		      <div style="position:relative;overflow:hidden;">
  <a href="' . make_url($rowfixed['id_pack']) . '">
  <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/';
						if (isset($rowfixed['image'])) {
							echo $rowfixed['image'];
						} else {
							echo "no-image.png";
						}
						echo '" style="border:1px solid #eee; border-radius:2.5%; width:100%; aspect-ratio:1/1; object-fit:cover;object-position:center; " class="image"/>';


						/* checking if product is alreay in wishlish or not start and displaying heart icon accordingly */
						$sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowfixed['id_pack'] . "' ";
						$displaywl = mysqli_query($con, $sqlwl);
						$countw = mysqli_num_rows($displaywl);
						if ($countw > 0) {
							echo '
  <a href="wishlist" class="added_wishlist" style="color:crimson;position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;font-size:18px;background:white;padding: 3px 5px;padding-bottom:0px;border-radius:50%;"><i class="fas fa-heart"></i></a>';
						} else {
							echo '<a href="#" style="position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;background:white;padding: 2px 5px;padding-bottom:0px;border-radius:50%;" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowfixed['id_pack'] . '"><i class="far fa-heart " style=""></i></a>';
						}

						echo '<br>';


						$actual_price = $rowfixed['actual_price'] / $crate;
						$final_price = $rowfixed['final_price'] / $crate;
						$discount = $rowfixed['discount'] / $crate;
						/* customer & its attribute checking end (new/logged-in,currency) */

						/* Checking for discount on product start */
						echo '
							<span class="p-2"><Strong class="letter-spacing price-off " style="color:white !important;">';

						echo $cnot . " " . round(($final_price), 2);

						echo '</strong>';
						if ($rowfixed['offer'] > 0) {
							echo '<small><small><strike class="price-off" style="margin-left:10px;">' . $cnot . round(($actual_price), 2) . '</strike></small></small>';
						}

						/* Checking for discount on product end */

						echo '<br> <span title="' . $rowfixed['p_name'] . '" style="font-size:0.9rem; color:#555;overflow: hidden;height:50px;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;
color:white;" class="p-2">' . strtoupper($rowfixed['p_name']) . '</span> </span>
  </a>
  </div>	  
		  ';
					}

					/* lopping through products in database matching the terms and displaying end */

					?>
				</div>
			</div>
		</div>
	<?php } else {
		include "no-data.php";
	}

	?>
</div>

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
		<?php
		/* lopping through products in database matching the terms and displaying start */
		$sqlpw = fetchProducts(" tag_women=1 order by p.id_pack DESC limit 10");
		$displaypw = mysqli_query($con, $sqlpw);
		$countgen = mysqli_num_rows($displaypw);
		if ($countgen > 0) { ?>
			<div class="column is-full">
				<div class="owl-carousel owl-theme owl-one">


					<?php


					while ($rowpw = mysqli_fetch_array($displaypw)) {

						echo '
		      <div style="position:relative;overflow:hidden;">'; ?>
						<?php
						if ($rowpw['dc_qty'] > 0 || $rowpw['dc_qty_bce2'] > 0) {
							$dOffSql = "Select discount from package_material where pm_id = 1";
							$doFFFetch = mysqli_query($con, $dOffSql);
							$dOff = mysqli_fetch_array($doFFFetch)
								?>
							<div
								style="position: absolute;top: 10px;left:-60px;text-align:center;background:crimson;color:white;padding:10px 70px;font-size:12px;display:flex;flex-direction:column;transform:rotate(-45deg);">
								<div style="margin:0;"><?= round($dOff['discount'], 0) ?>% OFF</div>
								<span style="font-size: 10px;margin:0">On Diamond</span>
							</div>
							<?php
						}
						echo '
  <a href="' . make_url($rowpw['id_pack']) . '">
  <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/';
						if (isset($rowpw['image'])) {
							echo $rowpw['image'];
						} else {
							echo "no-image.png";
						}
						echo '" style="border:1px solid #eee; border-radius:2.5%; width:100%; aspect-ratio:1/1; object-fit:cover;object-position:center; " class="image"/>';


						/* checking if product is alreay in wishlish or not start and displaying heart icon accordingly */
						$sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpw['id_pack'] . "' ";
						$displaywl = mysqli_query($con, $sqlwl);
						$countw = mysqli_num_rows($displaywl);
						if ($countw > 0) {
							echo '
  <a href="wishlist" class="added_wishlist" style="color:crimson;position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;font-size:18px;background:white;padding: 3px 5px;padding-bottom:0px;border-radius:50%;"><i class="fas fa-heart"></i></a>';
						} else {
							echo '<a href="#" style="position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;background:white;padding: 2px 5px;padding-bottom:0px;border-radius:50%;" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowpw['id_pack'] . '"><i class="far fa-heart " style=""></i></a>';
						}

						echo '<br>';
						$actual_price = $rowpw['actual_price'] / $crate;
						$final_price = $rowpw['final_price'] / $crate;
						$discount = $rowpw['discount'] / $crate;
						/* customer & its attribute checking end (new/logged-in,currency) */

						/* Checking for discount on product start */
						echo '
							<span class="p-2"><Strong class="letter-spacing price-off ">';

						echo $cnot . " " . round(($final_price), 2);

						echo '</strong>';
						if ($rowpw['discount'] > 0) {
							echo '<small><small><strike class="price-off" style="margin-left:10px;">' . $cnot . round(($actual_price), 2) . '</strike></small></small>';
						}

						/* Checking for discount on product end */

						echo '<br> <span title="' . $rowpw['p_name'] . '" style="font-size:0.9rem; color:#555;overflow: hidden;height:50px;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;" class="p-2">' . strtoupper($rowpw['p_name']) . '</span> </span>
  </a>
  </div>	  
		  ';
					}

					/* lopping through products in database matching the terms and displaying end */

					?>
				</div>
			</div>
		<?php } else {
			include "no-data.php";
		} ?>
	</div>

	<div class="columns is-mobile p-0 for-men-div" style="display:none;">
		<?php
		/* lopping through products in database matching the terms and displaying start */
		$sqlpw = fetchProducts(" tag_men=1 order by p.id_pack DESC limit 10");
		$displaypw = mysqli_query($con, $sqlpw);
		$countgen = mysqli_num_rows($displaypw);
		if ($countgen > 0) { ?>
			<div class="column is-full">
				<div class="owl-carousel owl-theme owl-one">


					<?php


					while ($rowpw = mysqli_fetch_array($displaypw)) {

						echo '
		      <div style="position:relative;overflow:hidden;">'; ?>
						<?php
						if ($rowpw['dc_qty'] > 0 || $rowpw['dc_qty_bce2'] > 0) {
							$dOffSql = "Select discount from package_material where pm_id = 1";
							$doFFFetch = mysqli_query($con, $dOffSql);
							$dOff = mysqli_fetch_array($doFFFetch)
								?>
							<div
								style="position: absolute;top: 10px;left:-60px;text-align:center;background:crimson;color:white;padding:10px 70px;font-size:12px;display:flex;flex-direction:column;transform:rotate(-45deg);">
								<div style="margin:0;"><?= round($dOff['discount'], 0) ?>% OFF</div>
								<span style="font-size: 10px;margin:0">On Diamond</span>
							</div>
							<?php
						}
						echo '
  <a href="' . make_url($rowpw['id_pack']) . '">
  <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/';
						if (isset($rowpw['image'])) {
							echo $rowpw['image'];
						} else {
							echo "no-image.png";
						}
						echo '" style="border:1px solid #eee; border-radius:2.5%; width:100%; aspect-ratio:1/1; object-fit:cover;object-position:center; " class="image"/>';


						/* checking if product is alreay in wishlish or not start and displaying heart icon accordingly */
						$sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpw['id_pack'] . "' ";
						$displaywl = mysqli_query($con, $sqlwl);
						$countw = mysqli_num_rows($displaywl);
						if ($countw > 0) {
							echo '
  <a href="wishlist" class="added_wishlist" style="color:crimson;position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;font-size:18px;background:white;padding: 3px 5px;padding-bottom:0px;border-radius:50%;"><i class="fas fa-heart"></i></a>';
						} else {
							echo '<a href="#" style="position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;background:white;padding: 2px 5px;padding-bottom:0px;border-radius:50%;" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowpw['id_pack'] . '"><i class="far fa-heart " style=""></i></a>';
						}

						echo '<br>';
						$actual_price = $rowpw['actual_price'] / $crate;
						$final_price = $rowpw['final_price'] / $crate;
						$discount = $rowpw['discount'] / $crate;
						/* customer & its attribute checking end (new/logged-in,currency) */

						/* Checking for discount on product start */
						echo '
							<span class="p-2"><Strong class="letter-spacing price-off ">';

						echo $cnot . " " . round(($final_price), 2);

						echo '</strong>';
						if ($rowpw['discount'] > 0) {
							echo '<small><small><strike class="price-off" style="margin-left:10px;">' . $cnot . round(($actual_price), 2) . '</strike></small></small>';
						}

						/* Checking for discount on product end */

						echo '<br> <span title="' . $rowpw['p_name'] . '" style="font-size:0.9rem; color:#555;overflow: hidden;height:50px;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;" class="p-2">' . strtoupper($rowpw['p_name']) . '</span> </span>
  </a>
  </div>	  
		  ';
					}

					/* lopping through products in database matching the terms and displaying end */

					?>
				</div>
			</div>
		<?php } else {
			include "no-data.php";
		} ?>
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
  </div>';
				}
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


<div class="container is-fluid" style="margin-top:1.5em;padding-bottom:5em;">
	<div class="columns">

		<div class="column is-4 p-0" style="padding-left:0.5em!important;">
			<a target="_blank"
				href="https://www.instagram.com/reel/DPtQTKvAfHz/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><img
					src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/16853350821685335082.png"
					class="image is-fullwidth banner-scale2" style="max-height:560px;" /></a>
		</div>
		<div class="column is-8 p-0" style="padding-left:0.5em!important;">
			<a target="_blank"
				href="https://www.instagram.com/reel/DPle6AxDFcU/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><img
					src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/17383398271738339827.jpg"
					class="image is-fullwidth banner-scale2" style="max-height:560px;" /></a>
		</div>
	</div>

</div>

<?PHP /* FOOTER 2 COLLAGE SECTION END (BANNER SET 4) */ ?>

<?PHP /* SUBSCRIBER SECTION START */ ?>
<div class="container is-fluid" style="padding:3%; padding-bottom:2%; background-color:#231535;">
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
			<a href="/gold-rate.php" style="color:#666;font-size:0.7rem; font-weight:400;">GOLD RATE</a><br>
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
						<small><small><small><small></small></small></small></small>
					</h3>





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
			<span style="color:#3892C6; font-size:0.8rem; font-weight:400; ">COPYRIGHT WHITE FEATHER'S © 2025
				<br>
				<span style="color:#333; font-size:0.7rem; font-weight:400; "><a href="sitemap" style="color:#111;">SITE
						MAP</a> | &nbsp;<a href="post/privacy" style="color:#111;">PRIVACY POLICY</a> | &nbsp;<a
						href="post/terms" style="color:#111;">TERMS & CONDITIONS</a>
					<!-- | &nbsp;<a href="post/corporate" style="color:#111;">CORPORATE</a> | &nbsp;<a href="post/faq" style="color:#111;">FREQUENTLY ASKED QUESTION</a> -->
				</span>
		</div>
		<div class="column is-4 p-0">
			<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/pay.png" class="image"
				style="max-height:70px; width:auto;" />

		</div>
	</div>
	<?php /* copyright atribute end */ ?>


</div>
<?PHP /* LINKS FOOTER END */ ?>