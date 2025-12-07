<?php {
	$customer = '0';
	$cookid = '0';
	include 'db_connect.php';
	include 'ajax_cookie.php';
	include_once('make_url.php');
	include_once('get_url.php'); ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<?php
		$title = 'Jewellries';
		$himage = 0;
		$hvideo = 0;
		$cterm = 0;
		$cmenu = 0;
		$ctag = 0;

		if (isset($_GET['term'])) {
			$title = $_GET['term'];
		} else {
			if (isset($_GET['tags'])) {
				foreach ($_GET['tags'] as $key => $tag) {
					if ($tag == 'kid') {
						$title = $title . ' for Kids';
					}
					if ($tag == 'men') {
						$title = $title . ' for Men';
					}
					if ($tag == 'women') {
						$title = $title . ' for Women';
					}
					if ($tag == 'gift') {
						$title = $title . 'Gift';
					}
					if ($tag == 'gift1') {
						$title = $title . 'Birthday Gift';
					}
					if ($tag == 'gift2') {
						$title = $title . 'Anniversary Gift';
					}
					if ($tag == 'gift3') {
						$title = $title . 'Wedding Gift';
					}
					if ($tag == 'gift4') {
						$title = $title . 'Pasni Gift';
					}
				}
			}
		}


		?>
		<meta http-equiv="Cache-control" content="public">
		<meta charset="utf-8">
		<title><?= $title ?> | Premium <?= $title ?> Collection | White Feathers Jewellery</title>
		<meta name="description"
			content="Shop elegant and premium <?=$title  ?> crafted in diamond, gold and silver. Discover unique designs perfect for daily wear, gifts, weddings and special occasions.">
		<meta name="keywords"
			content="<?=$title  ?>, <?=$title  ?> Nepal, diamond <?=$title  ?>, gold <?=$title  ?>, silver <?=$title  ?>, White Feathers Jewellery">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
			integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/css/css.css">
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico">
		<style>
			.video-foreground,
			.video-background iframe {
				pointer-events: auto;
			}
		</style>
	</head>

	<body style="letter-spacing:0.02em;">
		<?php
		include('header.php');
		include('filter-assets.php');
		?>
		<?php
		// $queryStrings = $_SERVER['QUERY_STRING'];
	
		function queryFilter()
		{
			$queries = '';
			if (array_key_exists('price', $_GET)) {
				if ($_GET['price'] == 0) {
					$queries = $queries . '';
				}
				if ($_GET['price'] == 1) {
					$queries = $queries . " and p.price < '10000' ";
				}
				if ($_GET['price'] == 2) {
					$queries = $queries . " and p.price > '10000' and p.price < '20000' ";
				}
				if ($_GET['price'] == 3) {
					$queries = $queries . " and p.price > '20000' and p.price < '50000' ";
				}
				if ($_GET['price'] == 4) {
					$queries = $queries . " and p.price > '50000' and p.price < '100000' ";
				}
				if ($_GET['price'] == 5) {
					$queries = $queries . " and p.price > '100000' and p.price < '200000' ";
				}
				if ($_GET['price'] == 6) {
					$queries = $queries . " and p.price > '200000' ";
				} else {
					$queries = $queries . "";
				}

			}
			if (array_key_exists('weight', $_GET)) {
				if ($_GET['weight'] == 0) {
					$queries = $queries . '';
				}
				if ($_GET['weight'] == 1) {
					$queries = $queries . " and weight < '2' ";
				}
				if ($_GET['weight'] == 2) {
					$queries = $queries . " and weight > '2' and weight < '5' ";
				}
				if ($_GET['weight'] == 3) {
					$queries = $queries . " and weight > '5' and weight < '10' ";
				}
				if ($_GET['weight'] == 4) {
					$queries = $queries . " and weight > '10' and weight < '20' ";
				}
				if ($_GET['weight'] == 5) {
					$queries = $queries . " and weight > '20' ";
				} else {
					$queries = $queries . "";
				}

			}
			if (array_key_exists('metal', $_GET)) {
				if ($_GET['metal'] == 0) {
					$queries = $queries . '';
				}
				if ($_GET['metal'] == 1) {
					$queries = $queries . " and p.pm_id = '1' ";
				}
				if ($_GET['metal'] == 2) {
					$queries = $queries . " and p.pm_id = '2' ";
				}
				if ($_GET['metal'] == 3) {
					$queries = $queries . " and p.pm_id = '4' ";
				}
				if ($_GET['metal'] == 4) {
					$queries = $queries . " and p.pm_id = '3' ";
				} else {
					$queries = $queries . "";
				}

			}
			if (array_key_exists('tags', $_GET)) {
				$tagv = '';
				foreach ($_GET['tags'] as $key => $tag) {
					if ($tag == 'kid') {
						$tagv = 'tag_kid > "0" ';
					}
					if ($tag == 'men') {
						$tagv = 'tag_men > "0" ';
					}
					if ($tag == 'women') {
						$tagv = 'tag_women > "0" ';
					}
					if ($tag == 'gift') {
						$tagv = 'tag_gift > "0" ';
					}
					if ($tag == 'gift1') {
						$tagv = 'tag_gift = "1" ';
					}
					if ($tag == 'gift2') {
						$tagv = 'tag_gift = "2" ';
					}
					if ($tag == 'gift3') {
						$tagv = 'tag_gift = "3" ';
					}
					if ($tag == 'gift4') {
						$tagv = 'tag_gift = "4" ';
					}
					$queries = $queries . " and " . $tagv;
				}
			}
			if (array_key_exists('sort', $_GET)) {
				if ($_GET['sort'] == 0) {
					$queries = $queries . '';
				}
				if ($_GET['sort'] == "date") {
					$queries = $queries . " order by p.id_pack DESC ";
				}
				if ($_GET['sort'] == "price-lth") {
					$queries = $queries . " order by (
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) - (
        IF(
            p.offer > 0,
            (
                (
                    pr.rate / 11.664 * p.weight +(p.dc_rate * p.dc_qty) +(
                        p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * pr.rate * p.weight
                    )
                ) *(p.offer / 100)
            ),
            0
        )
    ) ASC ";
				}
				if ($_GET['sort'] == "price-htl") {
					$queries = $queries . "  order by (
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) - (
        IF(
            p.offer > 0,
            (
                (
                    pr.rate / 11.664 * p.weight +(p.dc_rate * p.dc_qty) +(
                        p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * pr.rate * p.weight
                    )
                ) *(p.offer / 100)
            ),
            0
        )
    ) DESC ";
				}
				if ($_GET['sort'] == "discounted") {
					$queries = $queries . " and offer > 0 order by offer DESC ";
				} else {
					$queries = $queries . "";
				}

			}
			return $queries;

		}

		function selected($val, $key)
		{
			$key_exists = array_key_exists($key, $_GET);
			if ($key_exists && $_GET[$key] == $val) {
				echo 'selected';
			} else {
				echo "";
			}
		}
		?>


		<div class="container is-fluid" style="width:100vw !important; background: rgb(241,243,244); margin-top:20px;
background: rgba(116,228,250,1);">

			<div class=""
				style="display:flex; padding-top:30px; padding-bottom:10px;align-items:center;flex-wrap:wrap; gap:10px;">
				<div class="">
					<p>Showing result for <small><i class="fas fa-angle-right"></i></small> "
						<span style="text-transform:capitalize;"><?= $title ?></span>
						"
					</p>
				</div>


			</div>

		</div>


		</div>

		<?php
		$sqlslt2 = "";
		$actual_link = "$_SERVER[REQUEST_URI]";
		$filter_check = 0;
		$nameFilter = isset($_GET['term']) ? " lower(p_name) LIKE '%" . $_GET['term'] . "%' " : ' 1 ';
		$catFilter = isset($_GET['cat_id']) ? " and cat_id = " . $_GET['cat_id'] . " " : '';
		$sortFilter = !isset($_GET['sort']) ? " order by p.id_pack DESC" : '';
		$sqlslt2 = fetchProducts($nameFilter . $catFilter . queryFilter() . $sortFilter);
		$filter_check = 1;
		?>
		</div>
		<div class="container is-fluid">
			<div class="columns p-2 ">
				<div class="column is-10 letter-spacing has-text-weight-normal is-size-7">
					<p style="display:flex;gap:5px;flex-wrap:wrap;">
						<?= getTags() ?>
						<?php

						$displayslt2 = mysqli_query($con, $sqlslt2);
						$countslt2 = (!empty($displayslt2) && $displayslt2 !== true) ? mysqli_num_rows($displayslt2) : 0;

						echo ' <i class="fas fa-tags"></i> <span id="count_design">(' . $countslt2 . '</span> Design';
						if ($countslt2 > 1) {
							echo 's';
						}
						echo ')  </small>';



						?>

					</p>

				</div>
			</div>
		</div>

		<div class="container is-fluid">
			<div class="columns p-2 product-list-wrapper">
				<?php include 'filter.php'; ?>


				<div class="letter-spacing has-text-weight-normal product-container">
					<?php
					if ($countslt2 === 0) {
						include 'no-data.php';
					}
					$sn = 1;
					while ($rowslt2 = (!empty($displayslt2) && $displayslt2 !== true) ? mysqli_fetch_array($displayslt2) : 0) {
						$url = make_url($rowslt2['id_pack']);
						echo '
			<div class="product-card-container">
			   <div class="card card-cat" style="overflow:hidden; height:100%;">
  <div style="aspect-ratio:1/1;max-height:max-content;background:url(assets/images/loading-25.gif);background-repeat:no-repeat;background-size:30px;background-position:center center;object-fit:cover;object-position:center;">
      <a href="' . $url . '"><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/';

						if (isset($rowslt2['image'])) {
							echo $rowslt2['image'];
						} else {
							echo "no-image.png";
						}
						echo '" style="border:1px solid #eee; border-radius:2.5%; width:100%; aspect-ratio:1/1; object-fit:cover;object-position:center; " class="image"/>
  </div>
  <div class="card-content has-background-light" style="height:100%;">
    <div class="media mb-0">
      <div class="media-left">
        <!--<figure class="image is-48x48">
          <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
        </figure>-->
      </div>
     </div>
	  
	  
	  	<div class="columns p-2 wish-div">';

						$sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowslt2['id_pack'] . "' ";
						$displaywl = mysqli_query($con, $sqlwl);
						$countw = mysqli_num_rows($displaywl);
						if ($countw > 0) {
							echo '
  <a href="wishlist"><i class="fas fa-heart is-size-4" style="color:#3892C6; cursor:pointer;"></i></a>';
						} else {
							echo '<a href="#" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowslt2['id_pack'] . '"><i class="far fa-heart is-size-4" style="color:#3892C6; cursor:pointer;"></i></a>';
						}
						echo '</div>
	  
	  
	
	<div class="columns p-2 tag-div">
	
	
	
	
	<div class="column p-0">';

						$sqltg = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='" . $rowslt2['id_pack'] . "'";
						$displaytg = mysqli_query($con, $sqltg);
						$countgw1 = mysqli_num_rows($displaytg);
						$rowtg = mysqli_fetch_array($displaytg);

						if ($countgw1 > 0) {
							$sqltg2 = "Select * from `whitefeat_wf_new`.`tags` where tag_id='" . $rowtg['tag_id'] . "' and tag_type='0'";
							$displaytg2 = mysqli_query($con, $sqltg2);
							$countg = mysqli_num_rows($displaytg2);
							$rowtg2 = mysqli_fetch_array($displaytg2);

							if ($countg > 0) {
								echo '
  <div class="tags has-addons m-1">
  <span class="tag is-light"><i class="fas fa-star has-text-dark" style="color:#;"></i></span>
  <span class="tag is-';
								if ($rowtg2['tag_id'] == '1') {
									echo 'primary';
								}
								if ($rowtg2['tag_id'] == '2') {
									echo 'warning';
								}
								if ($rowtg2['tag_id'] == '3') {
									echo 'danger';
								}
								if ($rowtg2['tag_id'] > '3') {
									echo 'info';
								}
								echo '">' . strtoupper($rowtg2['tag_name']) . '</span>
</div>';

							}
						}


						echo '</div>   
    </div>
	
	
	
	  
	  <div class="media-content" style="margin-top:-1.5em;">
       <h3 class="is-size-5 has-text-weight-semibold" style="color:#333;padding-top:10px;">';




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

						$newprice = $cnot == "Rs" ? floor($rowslt2['final_price'] / $crate) : round($rowslt2['final_price'] / $crate, 2);

						//b2b check
						$b2b_check = 0;
						if ($GLOBALS['customer'] != 0) {
							$sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
							$displayb2b = mysqli_query($con, $sqlb2b);
							$rowb2b = mysqli_fetch_array($displayb2b);
							if ($rowb2b['b2b'] == 1) {
								$b2b_check = 1;
								$newprice = $cnot == "Rs" ? floor($rowslt2['final_price_b2b'] / $crate) : round($rowslt2['final_price_b2b'] / $crate, 2);
							}
						}

						echo "<small><small>" . $cnot . "</small></small>" . ' ' . ($newprice);

						echo '&nbsp;';
						if ($b2b_check == 1) {
							echo '<span class="has-text-weight-normal is-size-6" style="opacity:0.6;"><small><small>B2B rate</small></small></span>';
						}
						if ($rowslt2['offer'] > 0 && $b2b_check == 0) {
							$discount = $cnot == "Rs" ? floor($rowslt2['actual_price'] / $crate) : round($rowslt2['actual_price'] / $crate, 2);
							echo '<del class="has-text-weight-normal is-size-5" style="opacity:0.5;"><small><small>';
							echo $cnot ." ". $discount;
							echo '</small></small></del>';
						}
						echo '</h3>
   <p class="subtitle is-6">' . ucfirst($rowslt2['p_name']) . '</p>
      </div>
	  
	  
	  <div class="" style="display:flex;flex-wrap:wrap;margin:10px auto; gap:10px;">
	
	    <div class="">
<button class="button is-info is-outlined is-light appointment-button" data-target="modal-ter2' . $sn . '"><i class="fas fa-home"></i>Try at home</button>

<div class="modal" id="modal-ter2' . $sn . '">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head" style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
      <p class="modal-card-title"><i class="fas fa-house-user"></i> Home Appointment Form</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      
	  <h4 class="mb-2 has-background-light p-2"><i class="fas fa-tag has-text-info"></i> &nbsp;' . ucfirst($rowslt2['p_name']) . '</h4>';



						if ($GLOBALS['customer'] == 0) {
							echo '<div class="field">
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
    <input class="input home_phone" type="text" placeholder="+97798XXXXXXXX" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-mobile"></i>
    </span>
    
  </div>';

						}




						echo '
<div class="field">
  <label class="label">Message <small class="is-size-7"></small></label>
  <div class="control">
    <textarea class="textarea home_msg" placeholder="Please Write Jewelleries you want to try..."></textarea>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
      
      <i class="fas fa-check-circle"></i> &nbsp;I agree to the <a href="post/terms" target="_blank">terms and conditions</a>
    </label>
  </div>
</div>


<div class="field is-grouped mt-2">
  <div class="control">
    <button class="button is-info send_home_appoint_product" data-ref="' . $rowslt2['id_pack'] . '">Submit Form</button>
  </div>
  <!--
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>-->
</div>
	  
	  
	  
	  
    </section>
  </div>
</div>
    







</div>
		<div class="">
		<button class="button is-success is-light schedule-button" data-target="modal-ter"><i class="fas fa-video"></i>&nbsp;Live video call</button>
		
		<div class="modal" id="modal-ter">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head pl-2 pr-2" style="max-height:100px!important; margin-bottom:-20px; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
      <p class="modal-card-title">

<span class="is-size-4 has-text-weight-bold "> &nbsp; <i class="fas fa-video"></i>&nbsp; START A CALL&nbsp; </span>




	   </p>
	  
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      
	  <div class="columns">
	  
	    <div class="column is-6">
		  
		  
		  <figure class="image is-400x400">
  <img src="assets/images/qr-code.png" class="">
</figure>


<div class="p-0 has-background-light" style="border:0px dotted #eee; overflow:hidden;">



		<div class="columns p-0">
		  
		  
		  
		  <div class="column is-6 p-5 has-text-centered" style="background:rgba(72,199,142,0.2);">
		  <figure class="image pl-2 has-text-centered">
		  <img src="assets/images/whatsapp.png" style="height:auto; width:40%; min-height:40px;"/>
		  </figure>
		  Whatsapp 
		  </div>
		  


<div class="column is-6 p-5 " style="background:rgba(62,142,208,0.2);">
<figure class="image pl-2 has-text-centered">
<img src="assets/images/viber.png" style=" height:auto; margin-top:5px; width:40%;"/>
</figure>
&nbsp;&nbsp;Viber
</div>
		  
		  
       </div>
		


<div class="columns p-0 pb-2">
<div class="column is-3">&nbsp;</div>
<div class="column is-9">		  
<span class=" is-large is-secondary is-light is-fullwidth no-letter-spacing is-size-4" ><strong><small>SCAN ME</small></strong> &nbsp; 

		  </span>
		  </div>
</div>



	   
	   </div>
		  
		</div>
	    <div class="column is-6 pt-5">
		
		
		 <p class="is-size-7 letter-spacing" style="font-size:0.8em;">
		 <i class="fas fa-check-circle has-text-success"></i>&nbsp; Get on a live video call with our design consultants.<br>
		 <BR>
		 
          <i class="fas fa-check-circle has-text-success"></i>&nbsp; Live Available On <strong>Whatsapp, Viber & Messenger!</strong><br><br>
		 
		 <span class="has-text-weight-light ">
		 <i class="fas fa-check-circle has-text-success"></i>&nbsp; SUN - SAT &nbsp; 
		 ( 9am to 6pm )
		 <br>
		 <br>
		 <small><i class="fas fa-check-circle has-text-success"></i>&nbsp; OPENS 365 DAYS! &nbsp; 
		 <Strong><a href="#">Location map</a>
		 </strong>
		 </small>
		 </span>
		 
		 </p>
		
		</div>
	  
	  </div>
	  
    </section>
	<!--
    <footer class="modal-card-foot">
      <button class="button is-danger is-light modal-close-button">Cancel</button>
    </footer>-->
  </div>
</div>
	  
		
		
		</div>
	
	  </div>
	  

	
	

    
  
  
  
</div>
			</div>
			
			
		</div>';
						$sn++;
					}


					?>
				</div>
			</div>
		</div>



		</div>


		<a href="#" id="sortfilter_trigger">

			<?php include('footer.php'); ?>
			<script src="assets/js/jquery-3.6.0.min.js"></script>
			<script src="assets/owl/owl.carousel.min.js"></script>
			<?php include('js.php'); ?>


	</body>




	</html>

<?php } ?>