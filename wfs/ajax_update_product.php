<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
        $fixedPrice = $_POST['price'];
        $fixedPriceB2B = $_POST['price_b2b'];
    }

    if (isset($_POST['tag_men'])) {
        $men = 1;
    }

    if (isset($_POST['tag_kid'])) {
        $kid = 1;
    }
    $gift = $_POST['tag_gift'];

    $query = "update  package set
    cat_id='" . $_POST['cat_id'] . "',".
    (!empty($_FILES['image']['name']) ? "image='". $fileUrl . "'," : "")
    ."    p_name='" . $_POST['p_name'] . "',
    weight='" . $_POST['weight'] . "',
    p_des='" . $_POST['p_des'] . "',
    p_text='" . $_POST['p_text'] . "',
    offer='" . $_POST['offer'] . "',
    offer_b2b='" . $_POST['offer_b2b'] . "',
    isFixedPrice='" . $isFixedPrice . "',
    price='" . $fixedPrice . "',
    price_b2b='" . $fixedPriceB2B . "',
    tag_women='" . $women . "',
    tag_men='" . $men . "',
    tag_kid='" . $kid . "',
    tag_gift='" . $gift . "',
    pm_id='" . $_POST['pm_id'] . "',
    pmt_id='" . $_POST['pmt_id'] . "',
    dc_rate='" . $_POST['dc_rate'] . "',
    dc_qty='" . $_POST['dc_qty'] . "',
    dc_rate_bce2='" . $_POST['dc_rate_bce2'] . "',
    dc_qty_bce2='" . $_POST['dc_qty_bce2'] . "',
    mk_pp='" . $_POST['mk_pp'] . "',
    mk_gm='" . $_POST['mk_gm'] . "',
    jarti='" . $_POST['jarti'] . "',
    dc_rate_b2b='" . $_POST['dc_rate_b2b'] . "',
    dc_qty_b2b='" . $_POST['dc_qty_b2b'] . "',
    dc_rate_b2b_b2e2='" . $_POST['dc_rate_b2b_b2e2'] . "',
    dc_qty_b2b_b2e2='" . $_POST['dc_qty_b2b_b2e2'] . "',
    mk_pp_b2b='" . $_POST['mk_pp_b2b'] . "',
    mk_gm_b2b='" . $_POST['mk_gm_b2b'] . "',
    jarti_b2b='" . $_POST['jarti_b2b'] . "',
    keyword='" . $_POST['keyword'] . "',
    description='" . $_POST['description'] . "',
    title_head='" . $_POST['title_head'] . "',
    meta_head='" . $_POST['meta_head'] . "'
    where id_pack=" . $_POST['p_id'] . "
    ";

    echo $query;

    if (!empty($_FILES['image']['name'])) {
        if ($fileUrl) {
            if (mysqli_query($con, $query)) {
                echo "<script>
                        alert('Product Updated Successfully!')
                        window.location.href = '/wfs/product.php'
        </script>";
            } else {
                echo "<script>alert('Error While Updating Product!')</script>";
            }
        } else {
            echo "";
            echo "<script>alert('❌ Product could not be updated due to failed upload!')</script>";
        }
    } else {
        if (mysqli_query($con, $query)) {
            echo "<script>
        alert('Product Updated Successfully!')
        window.location.href = '/wfs/product.php'
        </script>";
        } else {
            echo "<script>alert('Error While Updating Product!')</script>";
        }
    }

    ?>
</body>

</html>