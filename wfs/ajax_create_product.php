<?php
include 'db_connect.php';
include 's3_upload.php';

// $gkey_final = mysqli_real_escape_string($con, $gkey);
// $gsdes_final = mysqli_real_escape_string($con, $gsdes);
// $gmeta_final = mysqli_real_escape_string($con, $gmeta);
$women = 0;
$men = 0;
$kid = 0;
$gift = 0;
$isFixedPrice = 0;
$fixedPrice = 0;
$fixedPriceB2B = 0;
$collection = 0;

$fileUrl = null;

if (!empty($_FILES['image']['name'])) {
    $fileUrl = uploadImageToS3($_FILES['image']);
}

if (isset($_POST['tag_women'])) {
    $women = 1;
}
if (isset($_POST['collection'])) {
    $collection = $_POST['collection'];
}

if (isset($_POST['isFixedPrice'])) {
    $isFixedPrice = 1;
    $fixedPrice = $_POST['fixed_price'];
    $fixedPriceB2B = $_POST['price_b2b'];
}

if (isset($_POST['tag_men'])) {
    $men = 1;
}

if (isset($_POST['tag_kid'])) {
    $kid = 1;
}
$gift = $_POST['tag_gift'];

$query = "INSERT INTO package (
    cat_id,
    image,
    p_name,
    weight,
    p_des,
    p_text,
    offer,
    offer_b2b,
    isFixedPrice,
    fixed_price,
    price_b2b,
    tag_women,
    tag_men,
    tag_kid,
    tag_gift,
    pm_id,
    pmt_id,
    ps_id,
    dc_rate,
    dc_qty,
    dc_rate_bce2,
    dc_qty_bce2,
    mk_pp,
    mk_gm,
    jarti,
    dc_rate_b2b,
    dc_qty_b2b,
    dc_rate_b2b_b2e2,
    dc_qty_b2b_b2e2,
    mk_pp_b2b,
    mk_gm_b2b,
    jarti_b2b,
    keyword,
    description,
    title_head,
    meta_head
    )
    values (
    '" . $_POST['cat_id'] . "',
    '" . $fileUrl . "',
    '" . $_POST['p_name'] . "',
    '" . $_POST['weight'] . "',
    '" . $_POST['p_des'] . "',
    '" . $_POST['p_text'] . "',
    '" . $_POST['offer'] . "',
    '" . $_POST['offer_b2b'] . "',
    '" . $isFixedPrice . "',
    '" . $fixedPrice . "',
    '" . $fixedPriceB2B . "',
    '" . $women . "',
    '" . $men . "',
    '" . $kid . "',
    '" . $gift . "',
    '" . $_POST['pm_id'] . "',
    '" . $_POST['pmt_id'] . "',
    '" . $_POST['ps_id'] . "',
    '" . $_POST['dc_rate'] . "',
    '" . $_POST['dc_qty'] . "',
    '" . $_POST['dc_rate_bce2'] . "',
    '" . $_POST['dc_qty_bce2'] . "',
    '" . $_POST['mk_pp'] . "',
    '" . $_POST['mk_gm'] . "',
    '" . $_POST['jarti'] . "',
    '" . $_POST['dc_rate_b2b'] . "',
    '" . $_POST['dc_qty_b2b'] . "',
    '" . $_POST['dc_rate_b2b_b2e2'] . "',
    '" . $_POST['dc_qty_b2b_b2e2'] . "',
    '" . $_POST['mk_pp_b2b'] . "',
    '" . $_POST['mk_gm_b2b'] . "',
    '" . $_POST['jarti_b2b'] . "',
    '" . $_POST['keyword'] . "',
    '" . $_POST['description'] . "',
    '" . $_POST['title_head'] . "',
    '" . $_POST['meta_head'] . "'
    )
    ";
$requiredFields = [];
if (!empty($_FILES['image']['name'])) {
    if ($fileUrl) {
        if (mysqli_query($con, $query)) {
            echo "<script>
                        alert('Product Created Successfully!')
                        window.location.href = '/wfs/product.php'
        </script>";
        } else {
            echo "<script>alert('Error While Creating Product!')</script>";
        }
    } else {
        echo "<script>
        window.history.go(-1);
        alert('❌ Product could not be created due to failed upload!')
        </script>";
    }
} else {
    echo "<script>
    window.history.go(-1);
    alert('Image is Required!');
    </script>";
}

?>