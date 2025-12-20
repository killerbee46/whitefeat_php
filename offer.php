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
),url('https://imgs.search.brave.com/qv0edIlcxocorLPlwkYDYv33JGIz77C1GOWcv-sn_OU/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cHJlbWl1bS12ZWN0/b3IvYnJpZ2h0LWNo/cmlzdG1hcy1saWdo/dHMtYmFja2dyb3Vu/ZC1mZXN0aXZlLWhv/bGlkYXktZGVjb3Jh/dGlvbnNfMTMyMjU1/My0xMDUzODYuanBn/P3NlbXQ9YWlzX2h5/YnJpZCZ3PTc0MCZx/PTgw'),#231535;color:white;background-size:cover;background-repeat:no-repeat; margin-top:3em">
			<div style="display:flex;justify-content:space-between;align-items:baseline;">
                <?php
                $offerDisabled = 1;
                $myNosepinOrder = 0;
$orderSql = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_id ='".$GLOBALS['customer']."'  order by cb_id DESC";
$displayOrder = mysqli_query($con, $orderSql);

while ($rowOrder = mysqli_fetch_array($displayOrder)) {
    $orderSql2 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id ='".$rowOrder['cb_id']."' and id_pack = 1849  order by cb_id DESC";
$displayOrder2 = mysqli_query($con, $orderSql2);
$countOrder = mysqli_num_rows($displayOrder2);
$myNosepinOrder += $countOrder;
}


$timezone = new DateTimeZone('Asia/Kathmandu');

// Current time in Kathmandu
$now = new DateTime('now', $timezone);

// Target time in Kathmandu
$target = new DateTime('2025-12-21 08:30:00', $timezone);

// Condition check
if ($now >= $target && $myNosepinOrder > 1) {
    // Time has reached or passed
    $offerDisabled = 0;
}
?>
				<div
					style="color:gold;font-size: 20px;font-weight:700;;padding-bottom:10px;border-bottom:3px solid crimson;margin-bottom:40px;display:flex;align-items:baseline;gap:5px;">
					<?php 
                    if ($offerDisabled) { ?>
                        <div> Christmas Sale ( Starts in: </div><div><?php include 'timer.php'; ?></div><div>)</div>
                    <?php } else { ?>
                        <div> Christmas Sale</div>
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
                    <?php 
                    if ($offerDisabled && $myNosepinOrder > 0) { ?>
                        <a href="#"></a>
                    <?php } else { ?>
                        <a href="<?= make_url(1849) ?>"></a>
                    <?php } ?>
                <div style="width:300px;margin:20px auto;cursor:<?= $offerDisabled && $myNosepinOrder>0 ? "not-allowed" : "pointer" ?>;">
					<?php
					while ($rowfixed = mysqli_fetch_array($displayOffer)) { ?>

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