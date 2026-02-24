<?php {
  $customer = '0';
  $cookid = '0';
  include 'db_connect.php';
  include 'ajax_cookie.php';
  include_once('make_url.php');
  include_once('get_url.php');
  $productname = get_url($_GET['pack']);
  $headsql = "Select * from `whitefeat_wf_new`.`package` WHERE id_pack='" . $productname . "'";
  $displayhead = mysqli_query($con, $headsql);
  $counthead = mysqli_num_rows($displayhead);
  if ($counthead <= 0) {
    header('location:index.php');
  }
  $rowhead = mysqli_fetch_array($displayhead);

  $myNosepinOrder = 0;
  $orderSql = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_id ='" . $GLOBALS['customer'] . "'  order by cb_id DESC";
  $displayOrder = mysqli_query($con, $orderSql);

  while ($rowOrder = mysqli_fetch_array($displayOrder)) {
    $orderSql2 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id ='" . $rowOrder['cb_id'] . "' and id_pack = 1849  order by cb_id DESC";
    $displayOrder2 = mysqli_query($con, $orderSql2);
    $countOrder = mysqli_num_rows($displayOrder2);
    $myNosepinOrder += $countOrder;
  }

  if ($productname == 2292) {
    echo '<script>
    window.location.href = "/silver";
    </script>';
  }
  $sqluser = 'Select c_id,name, phone, address, cur_id from customer where c_id = ' . $GLOBALS["customer"];
  $displayuser = mysqli_query($con, $sqluser);
  $rowuser = mysqli_fetch_array($displayuser);
  if ($GLOBALS['customer'] != 0) {
    if ($rowuser['role'] < 3 && $productname == 1849) {
      echo '<script>
    alert("Cannot View Or Order Product");
    window.location.href = "/";
    </script>';
    }
  }
  if ($rowhead['stock'] <= 0 && $productname == 1849) {
    echo '<script>
    alert("Cannot View Or Order Product");
    window.location.href = "/";
    </script>';
  }
  if ($myNosepinOrder > 0 && $productname == 1849) {
    echo '<script>
    alert("Cannot Place Any More Orders");
    window.location.href = "/";
    </script>';
  }
  ?><!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Cache-control" content="public">
    <meta charset="utf-8">
    <title><?= $rowhead['p_name'] ?> | White Feathers Jewellery</title>
    <meta name="description" content="<?= $rowhead['description'] ?>">
    <meta name="keywords" content="<?= $rowhead['keyword'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/css.css">
    <script src="assets/hover/test.js" type="text/javascript"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <style type="text/css">
      html {
        position: relative;
        min-height: 100%;
      }

      body {
        position: absolute;
        left: 0;
        right: 0;
        min-height: 100%;
        background: #fff;
        margin: 0;
        padding: 0;
      }

      body,
      td {}

      h1 {
        font-size: 1.5em;
        font-weight: normal;
        color: #555;
      }

      h2 {
        font-size: 1.3em;
        font-weight: normal;
        color: #555;
      }

      h2.caption {
        margin: 2.5em 0 0;
      }

      h3 {
        font-size: 1.1em;
        font-weight: normal;
        color: #555;
      }

      h3.pad {
        margin: 2em 0 1em;
      }

      h4 {
        font-size: 1em;
        font-weight: normal;
        color: #555;
      }

      p.pad {
        margin-top: 1.5em;
      }

      a {
        outline: none;
      }

      .preview-wrap {
        width: 100%;
        padding-top: 10px !important;
        padding: 60px;
        position: relative;
      }

      .thumb {
        border-radius: 6px;
        overflow: hidden;
        cursor: crosshair;
        position: relative;
        border: 0.5px solid gainsboro;
      }

      .thumb img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        display: block;
      }

      .zoom-preview {
        position: absolute;
        top: 0;
        left: 100%;
        z-index: 50;
        width: 70%;
        height: 70%;
        border-radius: 8px;
        background-repeat: no-repeat;
        background-size: 250%;
        border: 1px solid rgba(0, 0, 0, .1);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        display: none;
      }

      .product-image-info {
        left: 0;
        right: 0;
        position: absolute;
        z-index: 10;
        bottom: 20px;
        text-align: center;
        font-weight: 550;
        color: gainsboro;
      }

      @media(max-width:768px) {
        .preview-wrap {
          flex-direction: column;
          align-items: center;
          width: 100%;
        }

        .thumb {
          cursor: default;
        }

        .zoom-preview {
          visibility: hidden;
        }

        .product-image-info {
          display: none;
        }
      }
    </style>
  </head>

  <body style="letter-spacing:0.02em;">
    <?php include 'header.php'; ?>


    <div class="container is-fluid mt-3">

      <div class="columns mt-5">

        <div class="column is-5" style="border-right:1px solid #eee; ">
          <div class="preview-wrap">
            <?php
            $sqlpd = fetchProduct($productname);
            $displaypd = mysqli_query($con, $sqlpd);
            $rowpd = mysqli_fetch_array($displaypd);
            $image = "no-image.png";
            if (isset($rowpd['image'])) {
              $image = $rowpd['image'];
            }
            ?>
            <div class="thumb" id="thumb" style="
              background:
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= $image ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= explode('.', $image)[0] . ".jpeg" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= explode('.', $image)[0] . ".JPG" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= $image ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= explode('.', $image)[0] . ".jpeg" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= explode('.', $image)[0] . ".JPG" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/no-image.png');
              aspect-ratio:1/1;
              background-size: cover;
              background-position: center;
              background-repeat: no-repeat;
              object-fit: cover ;
              object-position: center center;">
              <div class="product-image-info">
                Hover for Zoom Preview
              </div>
              <!-- <img id="thumbImg"
              src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= $image ?>"
              onerror="this.error = null; this.src = 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= $image ?>';"
                alt="no image"> -->
            </div>

            <div class="zoom-preview" id="zoomPreview" style="background:
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= $image ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= explode('.', $image)[0] . ".jpeg" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/hq/<?= explode('.', $image)[0] . ".JPG" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= $image ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= explode('.', $image)[0] . ".jpeg" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= explode('.', $image)[0] . ".JPG" ?>'),
              url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/no-image.png');
              background-size: 150%;
              background-position: center;
              background-repeat: no-repeat;
              object-fit: contain ;
              object-position: center center;">
            </div>
          </div>
        </div>



        <div class="column is-7 ml-2 scroll-filter-product" style="margin-top:2.2em; height:80VH; overflow-y:scroll;">

          <div class="columns pl-5" id="stop">
            <div class="is-6">

              <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
              <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
              <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
              <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
              <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>

              <span href="#" class="has-text-dark"><small><small>&nbsp; <?php echo rand(1, 50); ?> Ratings /
                    Reviews</small></small></span>

            </div>
          </div>

          <div class="columns pl-3">
            <div class="column is-9 letter-spacing">

              <h2 class="letter-spacing is-size-4 has-text-weight-semibold" style="color:#333;">
                <?php echo $rowpd['p_name']; ?>
              </h2>
              <small><small><a href="#" class="scrollto" data-target="product_details"><u>Product
                      Details</u></a></small></small>

            </div>

            <div class="column is-3 letter-spacing">


              <?php
              $sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpd['id_pack'] . "' ";
              $displaywl = mysqli_query($con, $sqlwl);
              $countw = mysqli_num_rows($displaywl);
              if ($countw > 0) {
                echo '
  <a href="wishlist"><i class="fas fa-heart is-size-4" style="color:#3892C6; font-size:1.2rem; z-index:11;"></i></a>&nbsp; &nbsp; ';
              } else {
                echo '	 <span class="has-tooltip-arrow has-tooltip-multiline has-tooltip-bottom pb-1" data-tooltip="Add to wishlist"><i class="far fa-heart  add_wish_product is-size-4" data-id="' . $rowpd['id_pack'] . '" style="color:#3892C6; cursor:pointer;"></i></span>&nbsp; &nbsp;';
              }

              ?>

              <span class="has-tooltip-arrow has-tooltip-multiline has-tooltip-bottom pb-1 modal-smv"
                data-tooltip="View similar products" data-target="modal-smp"><i class="far fa-clone is-size-4"
                  style="color:#3892C6;"></i></span>


              <div class="modal" id="modal-smp">
                <div class="modal-background"></div>
                <div class="column modal-content has-background-white p-0 h-fit">
                  <h2 class="m-0 px-2 pt-2">Similar Products</h2>
                  <hr class="m-0 my-2 mb-4" />
                  <section class="modal-card-body">
                    <div class="owl-carousel owl-theme owl-smv w-[99%] mt-5">


                      <?php

                      $sqlpw = fetchProducts(isset($rowpd['cat_id']) ? " cat_id =  " . $rowpd['cat_id'] : " true " . " limit 10");
                      $displaypw = mysqli_query($con, $sqlpw);
                      while ($rowpw = mysqli_fetch_array($displaypw)) {

                        echo '
		      <div style="position:relative;">
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
                        $actual_price = $rowpd['actual_price'] / $crate;
                        $final_price = $rowpd['final_price'] / $crate;
                        $discount = $rowpd['discount'] / $crate;
                        /* customer & its attribute checking end (new/logged-in,currency) */

                        /* Checking for discount on product start */
                        echo '
                        <span class="p-2"><Strong class="letter-spacing price-off ">';

                        echo $cnot . " " . round(($final_price), 2);

                        echo '</strong>';
                        if ($rowpw['discount'] > 0) {
                          echo '<small><small><strike class="price-off">' . $cnot . round(($actual_price), 2) . '</strike></small></small>';
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



                      ?>
                    </div>
                  </section>


                </div>
                <button class="modal-close is-large" aria-label="close"></button>
              </div>




            </div>


          </div>


          <div class="columns pl-3">

            <?php

            if ($rowpd['ps_id'] != '0') {
              echo '
			 <div class="column is-4 ">
	<h6 class="mb-1"><small>Select Size: &nbsp;  &nbsp; &nbsp; &nbsp;</small></h6>
	<div class="control has-icons-left" >
  <div class="select is-info is-fullwidth mb-1">
    <select class="size-select">
	<option selected disabled value="0">-Size list-</option>
	
	';

              $sqlpsm = "Select * from `whitefeat_wf_new`.`package_sizes_measure` where ps_id='" . $rowpd['ps_id'] . "'";
              $displaypsm = mysqli_query($con, $sqlpsm);
              while ($rowpsm = mysqli_fetch_array($displaypsm)) {
                echo '<option value="' . $rowpsm['psm_id'] . '">' . $rowpsm['psm_info'] . '</option>';
              }
              echo '</select>
  </div>
  <span class="icon is-left">
    <i class="fas fa-hand-scissors"></i>
  </span>';

              if ($rowpd['ps_id'] == '4') {
                echo '<a href="post/ringsize"><small style="float:left;"><small class="has-text-info style="font-size:0.5em;">';
                echo "Don't know the ";

                echo 'ring size?</small></small></a> ';
              }
              if ($rowpd['ps_id'] == '5') {
                echo '<a href="post/banglesize"><small style="float:left;"><small class="has-text-info style="font-size:0.5em;">';
                echo "Don't know the ";

                echo 'bangle size?</small></small></a> ';
              }
              echo '</div></div>
			';
            }
            ?>
            <?php
            if ($rowpd['pmt_id'] != '0') {
              $sqlpsm = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='" . $rowpd['pmt_id'] . "'";
              $displaypsm = mysqli_query($con, $sqlpsm);
              $rowpsm = mysqli_fetch_array($displaypsm);

              echo '<div class="column is-4">
	<h6 class="mb-1"><small>Metal: </small></h6>
	<div class="control has-icons-left" >
  <div class="select is-info is-fullwidth">
    <select>';

              echo '<option value="' . $rowpd['pmt_id'] . '" selected>' . $rowpsm['pmt_name'] . '</option>';

              echo '</select>
  </div>
  <span class="icon is-left">
    <i class="fas fa-check-circle"></i>
  </span>
</div></div>';

            }
            ?>
          </div>
          <div class="columns pl-3">


            <div class="column is-4">


              <?php
              if ($rowpd['dc_qty'] > 0 || $rowpd['dc_qty_bce2'] > 0) {
                $dOffSql = "Select discount from package_material where pm_id = 1";
                $doFFFetch = mysqli_query($con, $dOffSql);
                $dOff = mysqli_fetch_array($doFFFetch)
                  ?>
                <div
                  style="width:fit-content;text-align:center;background:crimson;color:white;padding:10px 30px;margin-bottom:10px;font-size:12px;display:flex;flex-direction:column;display:<?= $rowslt2['dc_qty'] > 0 ? "block" : "none" ?>">
                  <div style="margin:0;"><?= round($dOff['discount'], 0) ?>% OFF</div>
                  <span style="font-size: 10px;margin:0">On Diamond</span>
                </div>
                <?php
                echo '
				 <h6 class="mb-1">
	<small>&nbsp;Diamond  <small style="font-size:0.7em;">(certified)</small> 
	</small>
	
	<br><a href="post/diamondguide"><small style=""><i><small class="has-text-info" style="font-size:0.7em;">&nbsp; (Diamond Guide)</small></i></small></a></h6>
				 ';
              }
              if ($rowpd['pm_id'] == 2) {
                echo '
				 <h6 class="mb-1">
	<small> &nbsp; GOLD <small style="font-size:0.7em;">(certified)</small> 
	</small></h6>
				 ';
              }
              if ($rowpd['pm_id'] == 3) {
                echo '
				 <h6 class="mb-1">
	<small> &nbsp;Rhodium 
	</small></h6>
				 ';
              }
              if ($rowpd['pm_id'] == 4) {
                echo '
				 <h6 class="mb-1">
	<small>&nbsp; Silver <small style="font-size:0.7em;">(certified)</small> 
	</small></h6>
				 ';
              }
              ?>
            </div>

          </div>

          <br>


          <?php


          $sqltg = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='" . $rowpd['id_pack'] . "'";
          $displaytg = mysqli_query($con, $sqltg);
          $countgW = mysqli_num_rows($displaytg);
          $rowtg = mysqli_fetch_array($displaytg);

          if ($countgW > 0) {
            $sqltg2 = "Select * from `whitefeat_wf_new`.`tags` where tag_id='" . $rowtg['tag_id'] . "' and tag_type='0'";
            $displaytg2 = mysqli_query($con, $sqltg2);
            $countg = mysqli_num_rows($displaytg2);
            $rowtg2 = mysqli_fetch_array($displaytg2);

            if ($countg > 0) {
              echo '<div class="columns pl-3 mt-0 mb-0">
  <div class="column">
  <div class="tags has-addons">
  <span class="tag"><i class="fas fa-star has-text-dark" style="color:#;"></i></span>
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
</div>
  </div>
 
 </div>';

            }
          }
          ?>




          <div class="columns pl-3 mb-0">
            <div class="column">

              <?php

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
              $actual_price = $rowpd['actual_price'] / $crate;
              $final_price = $rowpd['final_price'] / $crate;
              $discount = $rowpd['discount'] / $crate;

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


              echo '
   <h3 class="is-size-4 has-text-weight-semibold" style="color:#333;">';
              echo $cnot . " " . round(($final_price), 2);

              echo '&nbsp;';
              if ($b2b_check == 1) {
                echo '<span class="has-text-weight-normal is-size-6" style="opacity:0.6;"><small><small>B2B rate</small></small></span>';
              }
              if ($rowpd['discount'] > 0 && $b2b_check == 0) {
                echo '<del class="has-text-weight-normal is-size-5" style="opacity:0.5;"><small><small>';
                echo $cnot . " " . round(($actual_price), 2);
                echo '</small></small></del>';
              }
              echo '</h3>';

              ?>


            </div>



          </div>

          <div class="columns pl-3" style="margin-top:-1.5em; margin-bottom:2em;">
            <div class="column is-4">
              <?php
              if ($rowpd['offer'] > 0 && $b2b_check == 0) {
                echo '<small>' . $rowpd['offer'] . '% off on the product</small>';
              }
              ?>
            </div>




          </div>
          <div class="" style="margin-top:-1.2em; letter-spacing:1.5px;">
            <button style="width:50%;" class="button is-success is-normal add_cart"
              data-ref="<?php echo $rowpd['id_pack']; ?>">
              <span>ADD TO CART</span>
              <span class="icon is-small">
                <i class="fas fa-shopping-cart"></i>
              </span>
            </button>

          </div>
        </div>
      </div>
    </div>



    <div class="container is-fluid mt-5 scroll-area " id="product_details"
      style="background-color:#F9F9FA; min-height:20em;">
      <h3 class="letter-spacing is-size-4 has-text-weight-semibold p-3 pl-4" style="color:#333;"> Product Details</h3>

      <div>
        <div style="display:flex;gap:30px;flex-wrap:wrap;justify-contents:space-between;margin-bottom:20px;">
          <div class="columns">
            <div style="display:flex;gap:30px;flex-wrap:wrap;justify-contents:space-between;">
              <div class="column">
                <h4 class="letter-spacing is-size-7 p-3 pl-4 has-text-weight-normal"> <u>Full information</u></h4>
              </div>
              <div class="column">
                <h4 class="is-size-6 has-text-weight-light letter-spacing"> <?php echo $rowpd['p_des']; ?> </h4>
              </div>
              <div class="column">
                SKU: <span class="has-text-info"><?php echo 'WFST#' . $rowpd['id_pack'] . ''; ?></span>
              </div>
            </div>
            <div class="pack-png">
              <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/pack.png" />
            </div>
          </div>
        </div>

      </div>



      <div class="columns  pl-4">
        <div class="column is-9">

          <?php echo $rowpd['p_text']; ?>


        </div>
      </div>





    </div>




    <?php include('footer.php'); ?>

    <!-- end body part -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/owl/owl.carousel.min.js"></script>
    <?php include('js.php'); ?>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prettify/188.0.0/prettify.min.js"></script>
    <script>try { prettyPrint(); } catch (e) { }</script>

    <script type="text/javascript">

      document.addEventListener('DOMContentLoaded', () => {
        // Functions to open and close a modal
        function openModal($el) {
          $el.classList.add('is-active');
        }

        function closeModal($el) {
          $el.classList.remove('is-active');
        }

        function closeAllModals() {
          (document.querySelectorAll('.modal') || []).forEach(($modal) => {
            closeModal($modal);
          });
        }

        // Add a click event on buttons to open a specific modal here add class name
        (document.querySelectorAll('.schedule-button, .appointment-button') || []).forEach(($trigger) => {
          const modal = $trigger.dataset.target;
          const $target = document.getElementById(modal);

          $trigger.addEventListener('click', () => {
            openModal($target);
          });
        });


        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-close-button') || []).forEach(($close) => {
          const $target = $close.closest('.modal');

          $close.addEventListener('click', () => {
            closeModal($target);
          });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
          const e = event || window.event;

          if (e.keyCode === 27) { // Escape key
            closeAllModals();
          }
        });
      });
    </script>
    <script>
      $('.scrollto').click(function () {
        $('html, body').animate({
          scrollTop: eval($('#' + $(this).attr('data-target')).offset().top - 120)
        }, 1000);
      });
    </script>
    <script>
      const thumb = document.getElementById("thumb");
      const zoom = document.getElementById("zoomPreview");

      thumb.addEventListener("mousemove", function (e) {
        const rect = thumb.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;

        zoom.style.backgroundPosition = `${x}% ${y}%`;
        zoom.style.display = 'block';
      });

      thumb.addEventListener("mouseleave", () => {
        zoom.style.display = 'none';
      });
    </script>
    <a href="#" id="autocomplete_trigger"></a>
  </body>

  </html>


<?php } ?>