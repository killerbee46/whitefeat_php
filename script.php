<?php 
include 'db_connect.php';


for($i=0;$i<12;$i++){
$sql="INSERT INTO `package_sizes_measure` (`psm_id`, `ps_id`, `psm_info`) VALUES (NULL, '5', '2.".$i." (mm)');";
mysqli_query($con,$sql);
}



?>