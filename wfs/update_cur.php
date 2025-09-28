<?php 
include('db_connect.php');
		  $sqltsc  = "update `whitefeat_wf_new`.`currency` set cur_rate='".$_GET['aud']."' where cur_id='2'"; 
		  $sqltsc1 = "update `whitefeat_wf_new`.`currency` set cur_rate='".$_GET['usd']."' where cur_id='3'"; 
		  $sqltsc2 = "update `whitefeat_wf_new`.`currency` set cur_rate='".$_GET['eur']."' where cur_id='4'"; 
          mysqli_query($con,$sqltsc);mysqli_query($con,$sqltsc1);mysqli_query($con,$sqltsc2);
?>