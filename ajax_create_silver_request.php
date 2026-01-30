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
    include 'ajax_cookie.php';
    include 'header-functions.php';

    $silverSold = 0;

    $sqlus = "Select weight, verified from silver_stock where verified = 1";
    $displayus = mysqli_query($con, $sqlus);

    while ($rowus = mysqli_fetch_array($displayus)) {
        $silverSold += $rowus['weight'];
    }

    $sqlpd = fetchProduct(2292);
    $displaypd = mysqli_query($con, $sqlpd);
    $rowpd = mysqli_fetch_array($displaypd);

    if ($silverSold > $rowpd['stock']) {
        echo "<script>
                            alert('Silver Buniya Out Of Stock!');
    window.location.href = '/silver'
                        </script>";
    } else {
        $query = "INSERT INTO silver_stock (
    name,
    phone,
    address,
    weight,
    price,
    c_id
    )
    values (
    '" . $_POST['name'] . "',
    '" . $_POST['phone'] . "',
    '" . $_POST['address'] . "',
    '" . $_POST['weight'] . "',
    '" . $_POST['price'] . "',
    '" . $GLOBALS['customer'] . "')
    ";
        echo $query;
        if (mysqli_query($con, $query)) {
            echo "<script>
                            alert('Request added for silver investment. Please wait for confirmation...');
    window.location.href = '/silver-requests'
                        </script>";
        } else {
            echo "<script>
                    alert('Error While Adding Order!')
                    window.location.reload()
                    </script>";
        }
    }

    ?>
</body>

</html>