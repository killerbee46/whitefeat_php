<?php
$customer = '0';
$cookid = '0';
include 'db_connect.php';
include 'ajax_cookie.php';
include_once('make_url.php');
if ($GLOBALS['customer'] == 0) {
    header('location:index.php');
}

$sqlus = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
$displayus = mysqli_query($con, $sqlus);
$rowus = mysqli_fetch_array($displayus);
$merchant = $rowus['b2b'];

$searchFilter = !isset($_GET['search']) ? " " : " and ( name like '%" .$_GET['search']. "%' or cno like '%" .$_GET['search']. "%' or cb_id like '%" .$_GET['search']. "%' ) ";
$orderFilter = !isset($_GET['tab']) ? " " : (
    $_GET['tab'] == "new" ? " and dispatch='0' and c_request='0' " : (
        $_GET['tab'] == "delivered" ? " and deliver='1' and c_request='0' " : (
            $_GET['tab'] == "ondelivery" ? " and dispatch='1' and deliver='0' and c_request='0' " :
            (
                $_GET['tab'] == "cancelled" ? " and c_request='1' " : " "
            )
        )
    )
);
//  and dispatch='0' and c_request='0' 
$orderSql = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1'" . $orderFilter . $searchFilter . " order by cb_id DESC";
$displayOrder = mysqli_query($con, $orderSql);
$countOrder = mysqli_num_rows($displayOrder);
$apporder = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Cache-control" content="public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders | White Feather's Jewellery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/css.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
              /crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
              /hmac-sha256.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
              /enc-base64.min.js"></script>
    <style>
        .tabs-control {
            box-sizing: border-box;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            flex-wrap: wrap;
        }

        .tabs-head {
            font-weight: 600;
            cursor: pointer;
            padding: 20px;
        }

        .tabs-head:hover {
            color: gray;
        }

        .tabs-head.active {
            color: #138296;
            border-bottom: 3px solid;
        }

        .tabs-contents {
            padding: 20px;
        }

        .tabs-item {
            display: none;
        }

        .tabs-item.active {
            display: block;
        }

        .tab-divider {
            width: 1px;
            background: gray;
            height: 20px;
        }

        .orders-table {
            width: 100%;
        }
    </style>
</head>

<body style="letter-spacing:0.02em; background-color:#F9F9FA;">
    <?php include('header.php'); ?>

    <div class="container is-fluid mt-5 pb-5">
        <div class="orders-header" style="display:flex;justify-content: space-between;align-items:center;">
            <div style="font-size:20px;font-weight:600;">Orders List</div>
            <div style="display:flex;gap:10px;">
                <input value="<?= $_GET['search'] ?? "" ?>" id="orderSearch" style="padding: 5px 10px;" type="search" placeholder="Search Order...">
                <div>
                    <a href="/orders/add">
                        <button style="font-weight:600; background:#3892C6;border:2px solid #3892C6;padding:5px 10px;color:white;cursor:pointer;"><i
                            class="fas fa-plus"></i> Add Order</button>
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-2" />
        <div class="orders-body">
            <div class="card p-5 mb-3">
                <div class="p-0 border-bottom-0">
                    <div class="tabs-control">
                        <div class="tabs-head <?= isset($_GET['tab']) && $_GET['tab'] == "all" ? "active" : "" ?>"
                            onclick="queryHandler({value:'all'},'tab')"> All </div>
                        <div class="tab-divider"></div>
                        <div class="tabs-head <?= !isset($_GET['tab']) || isset($_GET['tab']) && $_GET['tab'] == "" ? "active" : "" ?>"
                            onclick="queryHandler({value:'0'},'tab')">New Orders</div>
                        <div class="tab-divider"></div>
                        <div class="tabs-head <?= isset($_GET['tab']) && $_GET['tab'] == "ondelivery" ? "active" : "" ?>"
                            onclick="queryHandler({value:'ondelivery'},'tab')">On Delivery</div>
                        <div class="tab-divider"></div>
                        <div class="tabs-head <?= isset($_GET['tab']) && $_GET['tab'] == "delivered" ? "active" : "" ?>"
                            onclick="queryHandler({value:'delivered'},'tab')"> Delivered </div>
                        <div class="tab-divider"></div>
                        <div class="tabs-head <?= isset($_GET['tab']) && $_GET['tab'] == "cancelled" ? "active" : "" ?>"
                            onclick="queryHandler({value:'cancelled'},'tab')">Cancelled</div>
                    </div>
                    <hr style="margin-top:-12px;" />
                </div>
                <div class="order-list">
                    <table class="orders-table">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Delivery Address</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <hr class="mt-2 mb-5" style="background:#14141488" />
                            </td>
                        </tr>
                        <?php
                        if($countOrder > 0){
                            while ($rowOrder = mysqli_fetch_array($displayOrder)) {
                            $apporder = $rowOrder['c_id'] == 0;
                            $tempProd = json_decode($rowOrder['cookie_id'], true);
                            $products = $apporder ? $tempProd['products'] : [];
                            ?>
                            <tr style="padding-bottom:10px;">
                                <td><?= $rowOrder['cb_id'] ?></td>
                                <td>
                                    <div><?= $rowOrder['name'] ?></div>
                                    <div><?= $rowOrder['cno'] ?></div>
                                </td>
                                <td><?= $apporder == 1 ? date_format(date_create($rowOrder['book_date']), "Y-m-d") : $rowOrder['p_date'] ?>
                                </td>
                                <td style="font-weight:600">
                                    <?php $sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $rowOrder['cur_id'] . "'";
                                    $displaycrc2 = mysqli_query($con, $sqlcrc2);
                                    $rowcrc2 = mysqli_fetch_array($displaycrc2);
                                    $cnot = $rowcrc2['cur_name'];
                                    $crate = (1 / $rowcrc2['cur_rate']);
                                    $total_net = 0;
                                    $sqlckp = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowOrder['cb_id'] . "'";
                                    $displayckp = mysqli_query($con, $sqlckp);
                                    if ($apporder) {
                                        if ($rowOrder['p_amount'] == 0) {
                                            foreach ($products as $prod) {
                                                $total_net += ($prod['quantity'] * $prod['dynamic_price']);
                                            }
                                        } else {
                                            $total_net = $rowOrder['p_amount'];
                                        }
                                    } else {
                                        while ($rowckp = mysqli_fetch_array($displayckp)) {
                                            $total_net = $total_net + ($rowckp['rate'] * $rowckp['qty']);
                                        }
                                    }
                                    echo "<small><small>" . $cnot . "</small></small>" . ' ' . floor(($crate * $total_net)); ?>
                                </td>
                                <td><?= $rowOrder['address'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div style="font-size:12px;">
                                        <hr class="m-0 mt-2" />
                                        <?php
                                        if ($apporder) {
                                            foreach ($products as $prod) {
                                                echo '<h6 style="display:flex;align-items:center;gap:5px;" class="p-2">';

                                                echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $prod['s_path'] . '" style="height:3em;"/>';

                                                echo ' &diams; ' . ucfirst($prod['title']) . ' - <b>Qty: ' . $prod['quantity'] . '  &nbsp; </b><span><a href="../' . make_url($prod['id']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></h6>';
                                            }
                                        } else {
                                            $sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='" . $rowOrder['cb_id'] . "'";
                                            $displayckp1 = mysqli_query($con, $sqlckp1);
                                            while ($rowckp1 = mysqli_fetch_array($displayckp1)) {
                                                echo '<h6 style="display:flex;align-items:center;gap:5px;" class="p-2">';
                                                $sqlckp2 = "Select s_path from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowckp1['id_pack'] . "' limit 1";
                                                $displayckp2 = mysqli_query($con, $sqlckp2);
                                                $rowckp2 = mysqli_fetch_array($displayckp2);

                                                echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowckp2['s_path'] . '" style="height:3em;"/>';

                                                echo ' &diams; ' . ucfirst($rowckp1['p_name']) . ' - <b>Qty: ' . $rowckp1['qty'] . '  &nbsp; </b><span><a href="../' . make_url($rowckp1['id_pack']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></h6>';
                                            }
                                        }
                                        ?>
                                        <hr class="m-0 mb-5" style="background:#3892C666" />
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        }
                        else{ ?>
                           <tr><td colspan='6'>
                            <?php include 'no-data.php'; ?>
                            </td>
                            </tr>
                        <?php }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        let tempUrl = ''
        var defaultFilters = {}

        const url = new URL(document.location.href)
        function queryHandler(e, filter_name) {
            const value = e.value
            const searchParams = url.searchParams
            if (value === "0" || value === "") {
                searchParams.delete(filter_name)
            }
            else {
                searchParams.set(filter_name, value)
                window.location.href = url
            }
            window.location.href = url
        }

        const orderSearch = document.getElementById('orderSearch')
        orderSearch.addEventListener('keydown',function(e) {
            if (e.key === "Enter") {
                queryHandler({value:e.target.value},'search')
            }
        })
    </script>

</body>




</html>
<?php ?>