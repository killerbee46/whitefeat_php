<?php 
    include('db_connect.php');
    include ('ajax_cookie.php');

$stmt = $con->prepare("select * from `whitefeat_wf_new`.`customer` where phone=?");
$stmt->bind_param("s",$_GET['title']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if(isset($row['phone']))
    {
	 echo'0'; 
	}
else{
	$randomNumber = rand(5000,9999);
	$jdate=date("Y-m-d");
     echo'v2_Nd8UndHle6pYCSWXvLjkjOChhNd.GIYi-'.$randomNumber;
     $sql= "INSERT INTO `customer` (`name`, `phone`, `pass`, `address`, `email`, `join_date`, `cur_id`, `otp`) VALUES 
     ('', '".$_GET['title']."', '', '', '', '$jdate', '1', '');
     ";
     mysqli_query($con,$sql);
	  
	  $sql2="UPDATE `whitefeat_wf_new`.`customer` SET otp='$randomNumber' WHERE phone='".$_GET['title']."'";
      mysqli_query($con,$sql2);
    }     
?>