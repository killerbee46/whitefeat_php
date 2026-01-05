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

        .search-select {
            position: relative;
            width: 300px;
        }

        #productResults {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            max-height: 220px;
            overflow-y: auto;
            display: none;
            z-index: 999;
        }

        #productResults li {
            padding: 10px;
            cursor: pointer;
        }

        #productResults li:hover {
            background: #f5f5f5;
        }

        .multi-select {
            position: relative;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .selected-items {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 6px;
        }

        .chip {
            width: 100%;
            background: white;
            padding: 6px 10px;
            border: .5px solid black;
            border-radius: 8px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .chip span {
            cursor: pointer;
            font-weight: bold;
        }

        #searchInput {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        ul#results {
            position: absolute;
            left: 1px;
            right: 0;
            top: 70%;
            background: #fff;
            border: 1px solid #ddd;
            max-height: 240px;
            overflow-y: auto;
            display: none;
            z-index: 999;
            padding-inline-start: 0;
        }

        #results li {
            padding: 10px;
            cursor: pointer;
            list-style-type: none;
        }

        #results li:hover {
            background: #f4f4f4;
        }
    </style>
</head>

<body style="letter-spacing:0.02em; background-color:#F9F9FA;">
    <?php include('header.php'); ?>
    <div class="container mt-5">

        <?php
        if (isset($_GET['id'])) {
            $sqlOD = "Select * from cart_book where cb_id =" . ($_GET['id']);
            $displayOD = mysqli_query($con, $sqlOD);
            $rowOD = mysqli_fetch_array($displayOD);
        }
        if (!empty($_POST)) {
            if (isset($_GET['id'])) {
                $query = "update cart_book set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "',cookie_id='" . $_POST['products'] . "',email='Order By:" . $_POST['email'] . "' where cb_id = " . $_GET['id'];
                if (mysqli_query($con, $query)) {
                    echo "<script>
                            alert('Order Updated Successfully!')
                            window.location.href = '/orders'
                        </script>";
                } else {
                    echo "<script>alert('Error While Updating Order!')</script>";
                }

            } else {
                $tracking = time() . round(microtime(true)) . $GLOBALS['customer'];
                $tdate = date('y-m-d');
                $query = "INSERT INTO cart_book (
    name,
    cno,
    address,
    cookie_id,
    email,
    checkout,
    mode,
    tracking_code,
    p_date
    )
    values (
    '" . $_POST['name'] . "',
    '" . $_POST['phone'] . "',
    '" . $_POST['address'] . "',
    '" . $_POST['products'] . "',
    'Order By:" . $_POST['email'] . "',
    '1',
    '1',
    '" . $tracking . "',
    '" . $tdate . "'
    )
    ";

                if (mysqli_query($con, $query)) {
                    echo "<script>
                            alert('Order Added Successfully!')
                            window.location.href = '/orders'
                        </script>";
                } else {
                    echo "<script>alert('Error While Adding Order!')</script>";
                }
            }
        }
        ?>
        <div class="order-form-container card p-5">
            <div style="font-size:18px;font-weight:500;margin-bottom:30px;">Order Details</div>
            <form id="order-form" method="post" action="">
                <div class="row">
                    <div class="col">
                        <label>Name</label>
                        <input value="<?= isset($rowOD) ? $rowOD['name'] : '' ?>" name="name" />
                    </div>
                    <div class="col">
                        <label>Phone</label>
                        <input value="<?= isset($rowOD) ? $rowOD['cno'] : '' ?>" name="phone" />
                    </div>
                    <div class="col">
                        <label>Delivery Address</label>
                        <input value="<?= isset($rowOD) ? $rowOD['address'] : '' ?>" name="address" />
                    </div>
                    <div class="col">
                        <label>Products</label>
                        <div class="multi-select">

                            <input type="text" id="searchInput" placeholder="Search products..." autocomplete="off" />

                            <ul id="results"></ul>

                            <div class="selected-items" id="selectedItems"></div>

                            <!-- hidden field for backend -->
                            <input type="hidden" name="products" id="productsPayload">
                        </div>

                    </div>

                    <div class="col">
                        <label>Order Taken By</label>
                        <select value="" name="email" required>
                            <option value="" <?= !(isset($_GET['id']) && str_starts_with($rowOD['email'], "Order By:")) ? "selected" : "" ?> disabled>Select Order Taker</option>
                            <option value="Reshma Thakuri" <?= (isset($_GET['id']) && explode(':', $rowOD['email'])[1] == "Reshma Thakuri") ? "selected" : "" ?>>Reshma Thakuri
                            </option>
                            <option value="Ruby Madai" <?= (isset($_GET['id']) && explode(':', $rowOD['email'])[1] == "Ruby Madai") ? "selected" : "" ?>>Ruby Madai</option>
                            <option value="Pooja Sapkota" <?= (isset($_GET['id']) && explode(':', $rowOD['email'])[1] == "Pooja Sapkota") ? "selected" : "" ?>>Pooja Sapkota
                            </option>
                        </select>
                    </div>
                    <div class="col"></div>
                    <div style="width:100%">
                        <button type="submit" class="button primary"><?= isset($_GET['id']) ? "Update" : "Add Order" ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>

        let products = [];

        fetch("localhost:60000/api/sql/products").then(response => response.json())
            .then(data => {
                products = data?.data
            })

    </script>
    <script>

        const input = document.getElementById("searchInput");
        const results = document.getElementById("results");
        const selectedItems = document.getElementById("selectedItems");
        const payloadInput = document.getElementById("productsPayload");

        let selectedProducts = [];
        let debounceTimer;

        <?php if (isset($_GET['id'])) { ?>
            const tempOrders = <?= $rowOD['cookie_id'] ?>;
            selectedProducts = tempOrders?.products;
            renderSelected();
            updatePayload();
        <?php } ?>

        // debounce
        function debounce(fn, delay) {
            return (...args) => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => fn(...args), delay);
            };
        }

        const handleSearch = debounce((value) => {
            results.innerHTML = "";

            if (value.length < 2) {
                results.style.display = "none";
                return;
            }

            const filtered = products.filter(p =>
                p.title.toLowerCase().includes(value.toLowerCase()) &&
                !selectedProducts.some(sp => sp.id === p.id)
            );

            if (!filtered.length) {
                results.innerHTML = "<li>No results</li>";
            } else {
                filtered.forEach(p => {
                    const li = document.createElement("li");
                    li.textContent = p.title;
                    li.onclick = () => selectProduct(p);
                    results.appendChild(li);
                });
            }

            results.style.display = "block";
        }, 300);

        input.addEventListener("input", e => {
            handleSearch(e.target.value.trim());
        });

        function selectProduct(product) {
            const tempProd = { id: product.id, s_path: product.image, dynamic_price: product.final_price, discount: product.discount, title: product.title }
            selectedProducts.push({ ...tempProd, quantity: 1 });
            renderSelected();
            updatePayload();
            input.value = "";
            results.style.display = "none";
        }

        function removeProduct(id) {
            selectedProducts = selectedProducts.filter(p => p.id !== id);
            renderSelected();
            updatePayload();
        }

        function updateQuantity(id, quantity) {
            selectedProducts = selectedProducts.map(p => {
                if (p.id == id) {
                    return { ...p, quantity: p.quantity + quantity }
                } else {
                    return p
                }
            });
            renderSelected();
            updatePayload();
        }

        function renderSelected() {
            selectedItems.innerHTML = "";

            selectedProducts.forEach(p => {
                const chip = document.createElement("div");
                chip.className = "chip";
                chip.innerHTML = `
    <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/${p.s_path}" width="20px" height="20px" alt="pI" />
      ${p.title}  - 
      <span>
        Qty: 
        <button ${p.quantity === 1 ? "disabled" : ""} onclick="updateQuantity(${p.id},-1)" style="height: unset;padding:2px 8px;cursor: pointer;">-</button> 
        ${p.quantity} 
        <button ${p.quantity === 5 ? "disabled" : ""} onclick="updateQuantity(${p.id},1)" style="height: unset;padding:2px 8px;cursor: pointer;">+</button>
        
        </span>
      <span title="Remove" onclick="removeProduct(${p.id})" style="font-size:18px;">&times;</span>
    `;
                selectedItems.appendChild(chip);
            });
        }

        function updatePayload() {
            payloadInput.value = JSON.stringify({
                products: selectedProducts
            });
        }

        // close dropdown
        document.addEventListener("click", e => {
            if (!e.target.closest(".multi-select")) {
                results.style.display = "none";
            }
        });
    </script>


</body>




</html>
<?php ?>