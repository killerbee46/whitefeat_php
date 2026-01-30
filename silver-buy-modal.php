<head>
    <style>
        .row {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .col {
            width: 45%;
            display: flex;
            flex-direction: column;
        }

        select {
            width: 100%;
        }

        .search-select {
            position: relative;
            width: 300px;
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
    </style>
</head>
<?php
include 'db_connect.php';
?>
<div class="modal" id="silver-modal">
    <div class="modal-background" onclick="closeModal('silver-modal')"></div>
    <div class="modal-content">
        <div class="box">
            <h2>Buy Silver Buniya</h2>
            <?php
            $sqlpd = fetchProduct(2292);
            $displaypd = mysqli_query($con, $sqlpd);
            $rowpd = mysqli_fetch_array($displaypd);

            $sqluser = 'Select c_id,name, phone, address, cur_id from customer where c_id = ' . $GLOBALS["customer"];
            $displayuser = mysqli_query($con, $sqluser);
            $rowuser = mysqli_fetch_array($displayuser);

            $sel_cur = 1;
            $cnot = 'Rs';
            $crate = 1;
            $sel_cur = $rowuser['cur_id'];

            $sqlcrc = "Select * from currency where cur_id='" . $sel_cur . "'";
            $displaycrc = mysqli_query($con, $sqlcrc);
            $rowcrc = mysqli_fetch_array($displaycrc);

            $cnot = $rowcrc['cur_name'];
            $crate = ($rowcrc['cur_rate']);
            $actual_price = $rowpd['actual_price'] / $crate;
            $final_price = $rowpd['final_price'] / $crate;
            ?>
            <hr />
            <div class="flex" style="gap:20px;align-items:center;margin-bottom:20px;">
                <img width="80px" height="80px"
                    src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/silver-buniya.jpg" />
                <div>
                    <div style="font-size:18px;font-weight:600;">Silver Buniya</div>
                    <div style="font-size:18px;font-weight:700;"><?= $cnot . " " . $final_price ?> per tola
                        <small><small></small></small>
                    </div>
                    <div style="font-size:14px;font-weight:400;color:gray;">Silver Buniya for Investing in Silver</div>
                </div>
            </div>
            <form id="silver-buy-form" method="post" action="./ajax_create_silver_request.php">
                <div class="row">
                    <div class="col">
                        <label>Name</label>
                        <input value="<?= $rowuser["name"] ?? '' ?>" name="name" required />
                    </div>
                    <div class="col">
                        <label>Phone</label>
                        <input value="<?= $rowuser["phone"] ?>" name="phone" required readonly="readonly" />
                    </div>
                    <div class="col">
                        <label>Delivery Address</label>
                        <input name="address" value="<?= $rowuser["address"] ?? '' ?>" required />
                    </div>
                    <div class="col">
                        <label>Weight</label>
                        <select name="weight" onchange="updatePrice(this)" required>
                            <option selected disabled value="">Select Weight</option>
                            <?php
                            for ($i = 5; $i <= 20; $i++) { ?>
                                <option value=<?= $i ?>><?= $i ?> Tola</option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <div style="flex-direction:row;align-items:center;width:100%">
                        <label>Total Price:</label>
                        Rs. <input
                            style="font-weight:600;border:none;outline:none;background:transparent;width:fit-content;font-size:18px;padding:0;"
                            name="price" id="totalPrice" readonly="readonly" />
                    </div>
                    <div class="col"></div>
                    <div class="col">
                        <button type="submit" class="button primary">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button class="modal-close is-large" onclick="closeModal('silver-modal')" aria-label="close"></button>
</div>

<script>
    function updatePrice(e) {
        const priceInput = document.getElementById('totalPrice')
        const value = parseInt(e?.value)
        const silverRate = parseInt(<?= $rowpd['final_price'] ?>)
        let silverPrice = 0
        if (value > 0) {
            silverPrice = value * silverRate
            priceInput.value = silverPrice
        }
    }
</script>