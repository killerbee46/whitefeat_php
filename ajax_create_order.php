<?php
include 'db_connect.php';
include 'ajax_cookie.php';
include 'header.php';

if ($offerExpired) {
  echo '<script>
  alert("Action Not Allowed");
  window.location.href = "/"
  </script>';
}
$tracking = time() . round(microtime(true)) . $GLOBALS['customer'];
$tdate = date('y-m-d');
$query = "INSERT INTO cart_book (
    name,
    cno,
    address,
    cookie_id,
    c_id,
    msg,
    email,
    checkout,
    mode,
    tracking_code,
      p_date,
      p_amount
    )
    values (
    '" . $_POST['name'] . "',
    '" . $_POST['phone'] . "',
    '" . $_POST['address'] . "',
    '" . $GLOBALS['cookid'] . "',
    '" . $GLOBALS['customer'] . "',
    '" . $_POST['name'] . "',
    'offer-nosepin',
    '1',
    '1',
    '" . $tracking . "',
    '" . $tdate . "',
    '112'
    )
    ";
if (mysqli_query($con, $query)) {
  echo "<script>
                        alert('Product Ordered Successfully!')
                        window.location.href = '/customer'
        </script>";
} else {
  echo "<script>alert('Error While Ordering Product!')</script>";
}
?>