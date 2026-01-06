<?php
include 'db_connect.php';
include './s3_upload.php';

// $gkey_final = mysqli_real_escape_string($con, $gkey);
// $gsdes_final = mysqli_real_escape_string($con, $gsdes);
// $gmeta_final = mysqli_real_escape_string($con, $gmeta);
$fileUrl = null;

if (!empty($_FILES['image']['name'])) {
    $fileUrl = uploadImageToS3($_FILES['image'],"/jwell-bills");
}

$query = "INSERT INTO inquiry (
p_name,
cno,
p_address,
p_qn,
type,
    image

    )
    values (
    '" . $_POST['name'] . "',
    '" . $_POST['phone'] . "',
    '" . $_POST['address'] . "',
    '" . $_POST['message'] . "',
    'sell',
    '" . $fileUrl . "'
    )
    ";
$requiredFields = [];
if (!empty($_FILES['image']['name'])) {
    if ($fileUrl) {
        if (mysqli_query($con, $query)) {
            echo "<script>
                        alert('Request Created Successfully!')
                        window.history.go(-1);
                        window.location.reload()
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
    alert('Image is Required!');
    </script>";
}

?>