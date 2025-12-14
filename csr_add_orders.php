<?php
$customer = '0';
$cookid = '0';
include 'db_connect.php';
include 'ajax_cookie.php';
include_once('make_url.php');
if ($GLOBALS['customer'] == 0) {
    header('location:index.php');
}

if (isset($_GET['id'])) {
    $sqlPD = fetchProduct(($_GET['id']));
    $displayPD = mysqli_query($con, $sqlPD);
    $rowPD = mysqli_fetch_array($displayPD);
}

$sqlus = "Select * from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
$displayus = mysqli_query($con, $sqlus);
$rowus = mysqli_fetch_array($displayus);
$merchant = $rowus['b2b'];

$searchFilter = !isset($_GET['search']) ? " " : " and ( name like '%" . $_GET['search'] . "%' or cno like '%" . $_GET['search'] . "%' or cb_id like '%" . $_GET['search'] . "%' ) ";
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
    <title>Add Order | White Feather's Jewellery</title>
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

        .row {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .col {
            width: 40%;
            display: flex;
            flex-direction: column;
        }

        .tag-box {
            border: 1px solid #ccc;
            padding: 8px;
            min-height: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .tag {
            background: #e5e7eb;
            padding: 4px 10px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .tag button {
            border: none;
            background: transparent;
            cursor: pointer;
        }

        select {
            width: 250px;
            margin-top: 10px;
        }
    </style>
</head>

<body style="letter-spacing:0.02em; background-color:#F9F9FA;">
    <?php include('header.php'); ?>
    <div class="container mt-5">
        <div class="order-form-container card p-5">
            <div style="font-size:18px;font-weight:500;margin-bottom:30px;">Order Details</div>
            <form>
                <div class="row">
                    <div class="col">
                        <label>Name</label>
                        <input name="user" />
                    </div>
                    <div class="col">
                        <label>Phone</label>
                        <input name="phone" />
                    </div>
                    <div class="col">
                        <label>Delivery Address</label>
                        <input name="address" />
                    </div>
                    <div class="col">

                        <label>Select Products:</label>
                        <div id="tagBox" class="tag-box"></div>

                        <select id="productSelect">
                            <option value="">-- Choose a product --</option>
                            <option value="p1">Diamond Ring</option>
                            <option value="p2">Gold Necklace</option>
                            <option value="p3">Silver Bracelet</option>
                            <option value="p4">Platinum Earrings</option>
                        </select>

                        <input type="hidden" id="selectedProducts" name="products">

                        <script>
                            const select = document.getElementById('productSelect');
                            const tagBox = document.getElementById('tagBox');
                            const hiddenInput = document.getElementById('selectedProducts');

                            let selectedValues = [];

                            select.addEventListener('change', () => {
                                const value = select.value;
                                const label = select.options[select.selectedIndex].text;

                                if (!value || selectedValues.includes(value)) return;

                                selectedValues.push(value);
                                hiddenInput.value = JSON.stringify(selectedValues);

                                const tag = document.createElement('div');
                                tag.classList.add('tag');
                                tag.innerHTML = `${label} <button data-value="${value}">✕</button>`;
                                tagBox.appendChild(tag);

                                tag.querySelector("button").onclick = (e) => {
                                    const v = e.target.dataset.value;
                                    selectedValues = selectedValues.filter(item => item !== v);
                                    hiddenInput.value = JSON.stringify(selectedValues);
                                    tag.remove();
                                };

                                select.value = "";
                            });
                        </script>

                    </div>
                    <div class="col">
                        <label>Price</label>
                        <input name="price" />
                    </div>
                </div>
            </form>
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
        orderSearch.addEventListener('keydown', function (e) {
            if (e.key === "Enter") {
                queryHandler({ value: e.target.value }, 'search')
            }
        })
    </script>

</body>




</html>
<?php ?>