<?php
$customer = '0';
$cookid = '0';
include 'db_connect.php';
include 'ajax_cookie.php';
include_once('make_url.php');
$sqlus = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
$displayus = mysqli_query($con, $sqlus);
$rowus = mysqli_fetch_array($displayus);
if ($GLOBALS['customer'] == 0) {
    header('location:index.php');
}

$merchant = $rowus['b2b'];

$userRequestFilter = !isset($_GET['tab']) ? " and verified = '0' and c_id = " . $GLOBALS['customer'] : (
    $_GET['tab'] == "all" ? " and c_id = " . $GLOBALS['customer'] : (
        $_GET['tab'] == "owned" ? "  and verified = '1' and c_id = " . $GLOBALS['customer'] : " "
    )
);
$adminRequestFilter = !isset($_GET['tab']) ? " and verified = '0' " : (
    $_GET['tab'] == "all" ? " " : (
        $_GET['tab'] == "owned" ? "  and verified = '1' " : " "
    )
);
$requestFilter = $rowus['role'] > 2 ? $adminRequestFilter : $userRequestFilter;
//  and dispatch='0' and c_request='0' 
$orderSql = "Select * from silver_stock where 1 " . $requestFilter;
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
    <title>Silver Investments | White Feather's Jewellery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/css.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <style>
        .tabs-control {
            box-sizing: border-box;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            flex-wrap: nowrap;
            overflow: auto;
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

        .ppanel {
            padding: 10px;
            display: none;
            background-color: white;
            overflow: hidden;
        }

        .order-list-phone {
            display: none;
        }

        .orders-table {
            display: table;
        }

        @media screen and (max-width: 768px) {
            .order-list-phone {
                display: block;
            }

            .orders-table {
                display: none !important;
            }

            .tabs-head {
                padding: 5px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body style="letter-spacing:0.02em; background-color:#F9F9FA;paddin-bottom:20px;">
    <?php include('header.php');

    function updateOrderStatus($id)
    {
        include 'db_connect.php';
        $updateQuery = "update silver_stock set verified = 1 where id = " . $id . " ;";
        if (mysqli_query($con, $updateQuery)) {
            echo "<script>
                alert('Request Approved!');
                window.location.href = 'silver-requests'
                </script>";
        } else {
            echo "<script>
                alert('Error Updating Request!');
                window.location.reload()
                </script>";
        }

    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        updateOrderStatus($id);
    }

    ?>


    <div class="container is-fluid mt-5 pb-5">
        <div class="orders-header" style="display:flex;justify-content: space-between;align-items:center;">
            <div style="font-size:20px;font-weight:600;">Silver Investments</div>
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
                            onclick="queryHandler({value:'0'},'tab')">Pending</div>
                        <div class="tab-divider"></div>
                        <div class="tabs-head <?= isset($_GET['tab']) && $_GET['tab'] == "owned" ? "active" : "" ?>"
                            onclick="queryHandler({value:'owned'},'tab')">Owned</div>
                        <div class="tab-divider"></div>
                    </div>
                    <hr style="margin-top:-12px;" />
                </div>

                <div class="">
                    <table class="orders-table" style="display:<?= $countOrder > 0 ? "table" : "none" ?>">
                        <div class="order-list">
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Delivery Address</th>
                                <th>Weight</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <hr class="mt-2 mb-5" style="background:#14141488" />
                                </td>
                            </tr>
                        </div>
                        <?php
                        if ($countOrder > 0) {
                            while ($rowOrder = mysqli_fetch_array($displayOrder)) {
                                $orderStatus = $rowOrder['verified'] != 0 ? ["verified", "green", '<i class="fas fa-check"></i>'] : ["pending", "goldenrod", '<i class="fas fa-file"></i>', "verify", '<i class="fas fa-check"></i>']
                                    ?>

                                <div class="order-card box order-list-phone"
                                    style="padding:10px;margin:15px -10px;border-top:1px solid #3892C6">
                                    <div class="flex justify-between align-center">
                                        <div><?= $rowOrder['id'] ?></div>
                                        <div>
                                            <div>
                                                <?= $rowOrder['name'] ?>
                                            </div>
                                            <div>
                                                <?= $rowOrder['phone'] ?>
                                            </div>
                                        </div>
                                        <div style="font-weight:600;">
                                            Rs. <?= $rowOrder['price'] ?>
                                        </div>
                                    </div>
                                    <div class="flex justify-center align-center" style="margin:10px auto;">
                                        To: <?= $rowOrder['address'] ?>
                                    </div>
                                    <hr class="mt-0 mb-3" />
                                    <hr class="mt-0" />
                                    <div class="flex justify-center align-center" style="gap:20px;margin:10px 0">
                                        <div style="width:50%">
                                            <button class="button"
                                                style="width:100%;display:flex;gap:10px;background:<?= $orderStatus[1] ?>;color:white;border-color:<?= $orderStatus[1] ?>">
                                                <?= $orderStatus[2] ?>
                                                <span style="text-transform:uppercase"><?= $orderStatus[0] ?></span>
                                            </button>
                                        </div>
                                        <?php if (count($orderStatus) > 3 && $rowus['role'] >= 3) { ?>
                                            <div style="width:50%">
                                                <button class="button primary"
                                                    style="width:100%;cursor:pointer;text-transform:capitalize; display:flex;gap:10px;"
                                                    title="<?= $orderStatus[3] ?>"
                                                    onclick="window.location.href = '/silver-requests?id=<?= $rowOrder['id'] ?>'">
                                                    <?= $orderStatus[4] ?>             <?= $orderStatus[3] ?>
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="order-list">
                                    <tr style="padding-bottom:10px;">
                                        <td><?= $rowOrder['id'] ?></td>
                                        <td>
                                            <div><?= $rowOrder['name'] ?></div>
                                            <div><?= $rowOrder['phone'] ?></div>
                                        </td>
                                        <td><?= date_format(date_create($rowOrder['booking_date']), "Y-m-d") ?>
                                        </td>
                                       <td><?= $rowOrder['address'] ?></td>
                                       <td>Rs. <?= $rowOrder['price'] ?></td>
                                        <td><?= $rowOrder['address'] ?></td>
                                        <td>
                                            <div class="flex align-center" style="gap: 10px;">
                                                <div class="flex align-center"
                                                    style="gap:8px;border-radius:8px;width:fit-content;padding:3px 5px; border: 1px solid gray;background:<?= $orderStatus[1] ?>;color:white;cursor:pointer;font-size:12px;border-color:<?= $orderStatus[1] ?>;">
                                                    <?= $orderStatus[2] ?>
                                                    <span style="text-transform:uppercase"><?= $orderStatus[0] ?></span>
                                                </div>
                                                <?php if (count($orderStatus) > 3 && $rowus['role'] >= 3) { ?>
                                                    <div title="<?= $orderStatus[3] ?>"
                                                        onclick="window.location.href = '/silver-requests?id=<?= $rowOrder['id'] ?>'"
                                                        style="cursor:pointer;">
                                                        <?= $orderStatus[4] ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div style="font-size:12px;">
                                                <hr class="m-0 mt-2" />
                                                <?php
                                                
                                                        $sqlckp2 = fetchProduct(2292);
                                                        $displayckp2 = mysqli_query($con, $sqlckp2);
                                                        $rowckp2 = mysqli_fetch_array($displayckp2);

                                                        echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $rowckp2['image'] . '" style="height:3em;"/>';

                                                        echo ' &diams; ' . ucfirst($rowckp2['p_name']) . ' - <span><a href="' . make_url($rowckp2['id_pack']) . '" target="_blank"><i>View Product </i><i class="fas fa-eye"></i></a></span></h6>';
                                                ?>
                                                <hr class="m-0 mb-5" style="background:#3892C666" />
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            <?php }
                        } else { ?>
                            <div>
                                <?php include 'no-data.php'; ?>
                            </div>
                        <?php } ?>
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

        const confirmDelete = (id) => {
            const result = confirm("Are you sure you want to delete this order?")

            if (result) {
                window.location.href = '/orders?status=c_request&id=' + id;
            }
        }

        const orderSearch = document.getElementById('orderSearch')
        orderSearch.addEventListener('keydown', function (e) {
            if (e.key === "Enter") {
                queryHandler({ value: e.target.value }, 'search')
            }
        })
    </script>

    <script>
        var acc = document.getElementsByClassName("paccordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

</body>




</html>
<?php ?>