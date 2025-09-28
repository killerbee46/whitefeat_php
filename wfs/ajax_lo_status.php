<?php

 include('db_connect.php');
 $g2=$_POST['d1'];
 $gv=$_POST['d2'];
 
                    $query6 = "Select status from `sunsaebn_ct`.`log_order` where lo_id='$gv' "; 
                    $display6 = mysqli_query($con,$query6); 
		            $row6=mysqli_fetch_array($display6);	
 if($row6['status']!=3 && $row6['status']!=7 ){
 $sql1="UPDATE `sunsaebn_ct`.`log_order` SET status = '$g2' where lo_id = '$gv'";
 mysqli_query($con,$sql1);
 }
 else{
 echo 1;
 }
?>