<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; 
$user = [];
if($customer !== '0'){
	$userSql = 'Select * from customer where c_id = '.$GLOBALS["customer"];
	$userDis = mysqli_query($con, $userSql);
	$user = mysqli_fetch_array($userDis);
}

$name = $_POST['name']??$user['name'];
$phone = $_POST['phone']??$user['phone'];
$address = $_POST['add']??$user['address'];

$id_pack=0;

if(isset($_POST['pid'])){
	$id_pack=$_POST['pid'];
}

$query = $con->prepare("INSERT INTO `whitefeat_wf_new`.`inquiry` (`p_name`, `p_qn`, `dt_inquiry`, `p_address`, `ip`, `cno`, `c_id`, `id_pack`) 
VALUES (?, ?, CURRENT_TIMESTAMP, ?, '', ?, ?,?)");

$executed = $query->execute([ $name, $_POST['msg'], $address, $phone,$GLOBALS['customer'],$id_pack]);

if ($executed) {
	echo "<script>
		alert('Appointment Request Created Successfully!')
		window.history.go(-1);
		window.location.reload()
	</script>";
} else {
	echo "<script>alert('Error While Creating Request!')</script>";
}

}
?>