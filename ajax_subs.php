<?php 

include('db_connect.php');
  

$stmt = $con->prepare("select * from `whitefeat_wf_new`.`subscribers` where sb_email=?");
$stmt->bind_param("s", $_POST['subs']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
//echo $row['sb_email'];

$sbm = mysqli_real_escape_string($con, $_POST['subs']);

if($row['sb_email'] == '') {
	  echo '0';
	  $sql = "INSERT INTO `whitefeat_wf_new`.`subscribers` (`sb_id`, `sb_email`) VALUES (NULL, '".$sbm."');";
	  mysqli_query($con,$sql);
}
else{
echo '1';
}


?>