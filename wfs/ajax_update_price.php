<?php
include_once('db_connect.php');
$val=$_POST['val'];
$id=$_POST['id'];

$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$val' where pmt_id='$id'";
mysqli_query($con,$sql);
if($id=='8'){

	//22k
	$newrate=0.92*$val;
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='7'";
   mysqli_query($con,$sql);
	
	// 18k
	$newrate=0.75*$val;
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='2'";
   mysqli_query($con,$sql);
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='3'";
   mysqli_query($con,$sql);
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='4'";
   mysqli_query($con,$sql);
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='9'";
   mysqli_query($con,$sql);

	//14k
	$newrate=0.6*$val;
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='1'";
   mysqli_query($con,$sql);
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='5'";
   mysqli_query($con,$sql);
	$sql="UPDATE `whitefeat_wf_new`.`package_metal` SET rate='$newrate' where pmt_id='6'";
   mysqli_query($con,$sql);

}

?>