<?php
include('db_connect.php');


$idi=$_POST['pval'];

$g5=$_POST['sspost'];
$g5_final = mysqli_real_escape_string($con, $g5);

$sql1g = "UPDATE `whitefeat_wf_new`.`info` set info_text='".$g5_final."' where id_info='".$idi."'";
		    $displayg=mysqli_query($con,$sql1g);


?>