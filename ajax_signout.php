<?php 

    
    include('db_connect.php');
    include ('ajax_cookie.php');

     $sql="DELETE from `cookie_status` where cookie_id='".$GLOBALS['cookid']."'";
     mysqli_query($con,$sql);	 
	  

?>