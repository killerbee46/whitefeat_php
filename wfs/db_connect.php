<?php 
include "../envVars/db.php";
$con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($con, "SET SESSION sql_mode = ''");
?>