<?php
include('session_control.php');
include('db_connect.php');
$queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='" . $_SESSION['u_id'] . "'";
$displayud = mysqli_query($con, $queryud);
$rowud = mysqli_fetch_array($displayud); 
$appId = $_GET['id'];
$appSql = "Select * from inquiry where inquiry_id = " . $appId;
$displayApp = mysqli_query($con,$appSql);
$rowApp = mysqli_fetch_array($displayApp);
{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details | Selling Inquiry</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
			integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="m-4 border-1 border-[rgba(0,0,0,0.3)] p-5 rounded-lg">
        <div class="text-lg font-medium">
        <a href="/white-feathers/wfs/appointment.php" class="me-2"><i class="fas fa-arrow-left"></i></a> Selling Request Details
        </div>
        <hr class="text-slate-200 mt-1" />
        <div class="flex gap-4 mt-2">
            <div class="w-1/3">
                <div class="w-full border border-slate-300 rounded aspect-[6/7] bg-[url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/jwell-bills/<?= $rowApp['image'] ?>')] bg-no-repeat bg-center bg-contain object-cover"></div>
            </div>
            <div class="w-2/3 flex flex-wrap px-3"> 
                <div class="w-2/5">
                    <div class="text-slate-600">Name :</div>
                    <div class="font-medium"><?= $rowApp['p_name'] ?></div>
                </div>
                <div class="w-2/5">
                    <div class="text-slate-600">Phone :</div>
                    <div class="font-medium"><?= $rowApp['cno'] ?></div>
                </div>
                <div class="w-2/5">
                    <div class="text-slate-600">Address :</div>
                    <div class="font-medium"><?= $rowApp['p_address'] ?></div>
                </div>
                <div class="w-2/5">
                    <div class="text-slate-600">Status :</div>
                    <div class="font-medium border-1 border-slate-400 rounded px-2 py-1 text-sm"><?= $rowApp['visit'] == 1 ? 'Acknowledged' : 'Pending' ?></div>
                </div>
                <div class="w-2/5">
                    <div class="text-slate-600">Message :</div>
                    <div class="font-medium"><?= $rowApp['p_qn'] ?></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php } ?>