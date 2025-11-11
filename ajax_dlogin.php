<?php $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); 


  
   // $val=$_GET['dat'];
	
	$dat=array();
/*$val = explode("-",$_GET['title']);
foreach($val as $cat) {
	array_push($dat,$cat);
}
*/


$separated = explode('-', $_GET['title']);

foreach ($separated as $value) {
	array_push($dat,$value);
    // In order to display them in uppercase,
    // just do echo strtoupper($value);
}

//print_r($dat);
//echo $_GET['title'];
	
	
$stmt = $con->prepare("select * from `whitefeat_wf_new`.`customer` where phone=? and pass=?");
//INSERT INTO `whitefeat_wf_new`.`tran` (p_id, location, cust_name, cust_number, cust_add, cust_msg, p_qty, cust_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ss", $dat[0], $dat[1]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) {echo 0;}
else{
/*while($row = $result->fetch_assoc()) {
  $ids[] = $row['id'];
  $names[] = $row['name'];
  $ages[] = $row['age'];
}
*/
      $row = $result->fetch_assoc();
	  
	  echo $row['name'].'-'.$row['phone'].'-'.$row['address'];
	  
	  $sql = "update `whitefeat_wf_new`.`cookie_status` set cookie_user='".$row['c_id']."' where cookie_id='".$GLOBALS['cookid']."' ";
	  mysqli_query($con,$sql);
	  
	  //update on cart table
	  $sqlft2 = "Select * from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$GLOBALS['cookid']."' "; 
      $displayft2=mysqli_query($con,$sqlft2); 
	  $rowft2=mysqli_fetch_array($displayft2);
	  
	  $sql2 = "update `whitefeat_wf_new`.`cart_book` set c_id='".$row['c_id']."', cur_id='".$rowft2['cookie_currency']."' where cookie_id='".$GLOBALS['cookid']."' and checkout='0' ";
	  mysqli_query($con,$sql2);
	  
	  
	  
}
//var_export($ages);
//fetching result would go here, but will be covered later
$stmt->close();
  
?>


