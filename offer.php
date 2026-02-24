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
<div class="container is-fluid" style="padding-top:1.5em; background:linear-gradient(
  to left,
  rgba(0,0,0,.4),
  rgba(0,0,0,.4)
),url('https://imgs.search.brave.com/_Wp5GK-qvheavOLwxDGIlV7iB-onNJBK5NSmOyVzNFI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMudmVjdGVlenku/Y29tL3N5c3RlbS9y/ZXNvdXJjZXMvdGh1/bWJuYWlscy8wMzcv/MjQ2LzMxNy9zbWFs/bC9haS1nZW5lcmF0/ZWQtaG9saS1wYXJ0/eS1hZHZlcnRpc21l/bnQtYmFja2dyb3Vu/ZC13aXRoLWNvcHkt/c3BhY2UtZnJlZS1w/aG90by5qcGc'),#231535;color:white;background-size:cover;background-repeat:no-repeat; margin-top:3em">
			<div style="display:flex;justify-content:space-between;align-items:baseline;">
                <?php
                $offerDisabled = 1;
                $myNosepinOrder = 0;
$orderSql = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_id ='".$GLOBALS['customer']."' and book_date = '20260224'  order by cb_id DESC";
$displayOrder = mysqli_query($con, $orderSql);

while ($rowOrder = mysqli_fetch_array($displayOrder)) {
    $orderSql2 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id ='".$rowOrder['cb_id']."' and id_pack = 1849  order by cb_id DESC";
$displayOrder2 = mysqli_query($con, $orderSql2);
$countOrder = mysqli_num_rows($displayOrder2);
$myNosepinOrder += $countOrder;
}


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
					style="color:white;font-size: 20px;font-weight:700;;padding-bottom:10px;border-bottom:3px solid white;margin-bottom:40px;display:flex;align-items:baseline;gap:5px;">
					<?php 
                    if (1) { ?>
                        <div> Holi Splash Sale ( Starts in: </div><div><?php include 'timer.php'; ?></div><div>)</div>
                    <?php } else { ?>
                        <div> Holi Splash Sale</div>
                    <?php } ?>
				</div>
				<?php
				$sqlOffer = fetchProduct(1849);
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
					while ($rowfixed = mysqli_fetch_array($displayOffer)) { ?>
						<a href="<?= make_url('1849') ?>">

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

						echo $cnot . " " . round(($final_price), 2);

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
					}
					?>
				</div>
			</a>
			</div>
		</div>