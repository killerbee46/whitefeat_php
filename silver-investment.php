<?php

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
<div class="container is-fluid"
    style="padding-top:1.5em; background:linear-gradient(
  to left,
  rgba(0,0,0,.4),
  rgba(0,0,0,.4)
),url('https://imgs.search.brave.com/WRYd7ZNbPfOJsmiiDYl2Io47bWzxOT-xQH-sQN_7Y-0/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzEyLzI5LzgxLzg0/LzM2MF9GXzEyMjk4/MTg0MDNfcXpTaElM/R2t0TGl1eVpIaWs4/Ulp4Q1d0bHdLTllw/UUQuanBn'),#231535;color:white;background-size:cover;background-repeat:no-repeat; margin-top:3em">
    <div style="display:flex;justify-content:space-between;align-items:baseline;">
        <?php
        $offerDisabled = 1;
        $myNosepinOrder = 0;
        // $orderSql = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_id ='" . $GLOBALS['customer'] . "'  order by cb_id DESC";
        // $displayOrder = mysqli_query($con, $orderSql);

        // Set Kathmandu timezone
        date_default_timezone_set('Asia/Kathmandu');

        // Current time
        $currentTime = time();

        // Target time: 2025-12-21 08:30 AM Kathmandu time
        $targetTime = strtotime('2025-12-21 8:30:00');

        // Condition check
        if ($currentTime >= $targetTime && $myNosepinOrder = 1) {
            // Time has reached or passed
            $offerDisabled = 0;
        }
        ?>
        <div
            style="font-size: 20px;font-weight:700;;padding-bottom:10px;border-bottom:3px solid goldenrod;margin-bottom:40px;display:flex;align-items:baseline;gap:5px;">
            <?php
            if ($offerDisabled) { ?>
                <div> Silver Investment ( 11:15 AM - 6:00 PM
                    <!-- Starts in: </div>
                <div><?php include 'timer.php'; ?></div>
                <div> -->
                    )</div>
            <?php } else { ?>
                <div> Silver Investment ( 11:15 AM - 6:00 PM
                    <!-- Starts in: </div>
                <div><?php include 'timer.php'; ?></div>
                <div> -->
                    )</div>
            <?php } ?>
        </div>
        <?php
				$sqlOffer = fetchProduct(2292);
				$displayOffer = mysqli_query($con, $sqlOffer);
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
			</div>
			<div style="display:flex;justify-content:center;">
                    
				<div style="width:300px;margin:20px auto;cursor:pointer">
					<?php
                    $rowfixed = mysqli_fetch_array($displayOffer);
                        ?>
                    
						<a href="<?= make_url('silver') ?>">

		      <div style="position:relative;overflow:hidden;">
                <?php
						if ($rowfixed['stock'] <= 0) {?>
							<div
								style="position: absolute;top: 10px;left:-60px;text-align:center;background:crimson;color:white;padding:10px 70px;font-size:12px;display:flex;flex-direction:column;transform:rotate(-45deg);display:<?= $rowslt2['dc_qty'] > 0 ? "block" : "none" ?>">
								<div style="margin-left:-10px;">Out Of Stock</div>
							</div>
							<?php
						}
                        ?>
  <div style="background:url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?= isset($rowfixed['image'] )? $rowfixed['image'] : 'no-image.php' ?>');
  background-size:200%;aspect-ratio:1/1;background-position:center;border-radius:8px;
  " ></div>
  <br />

<?php
						$actual_price = $rowfixed['actual_price'] / $crate;
						$final_price = $rowfixed['final_price'] / $crate;
						$discount = $rowfixed['discount'] / $crate;
						/* customer & its attribute checking end (new/logged-in,currency) */

						/* Checking for discount on product start */
						echo '
							<span class="p-2"><Strong class="letter-spacing price-off " style="color:white !important;">';

						echo $cnot . " " . round(($final_price), 2) . " per tola";

						echo '</strong>';
						if ($discount > 0) {
							echo '<small><small><strike class="price-off" style="margin-left:10px;color:white;">' . $cnot . round(($actual_price), 2) . '</strike></small></small>';
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
					?>
                </div>
            </a>
        </div>
    </div>