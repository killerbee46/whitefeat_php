 <?php
  /* This page checks & sets value for php global variables used inside website ($customer, $cookid & $newuser )*/
   /* checking in browser if cookie set or not */
if(!isset($_COOKIE['wfjewel']))
{

  $sql = "INSERT INTO `whitefeat_wf_new`.`cookie_status` (`cookie_id`, `cookie_web`, `cookie_user`, `cookie_currency`) VALUES (NULL, 'n', '0','1');";
  mysqli_query($con,$sql);
  $pass_v = mysqli_insert_id($con);
  $date_of_expiry = time() + 60 * 60 * 24 * 30 ;
  setcookie( 'wfjewel', $pass_v, $date_of_expiry );
  $GLOBALS['cookid']=$pass_v;

}
else
{
	   /* setting new cookie for new user / browser start */
	 $sql = "select * from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$_COOKIE['wfjewel']."' ";
	  $display = mysqli_query($con,$sql);
	  $rowx= mysqli_fetch_array($display);
        $countx=mysqli_num_rows($display);
         if($countx<=0)
				{ 
			      /* if browser / customer not found in database */
					  unset($_COOKIE['wfjewel']);
                      setcookie('wfjewel', '', time() - 3600);
                      $sql = "INSERT INTO `whitefeat_wf_new`.`cookie_status` (`cookie_id`, `cookie_web`, `cookie_user`, `cookie_currency`) VALUES (NULL, 'n', '0', '1');";
                       mysqli_query($con,$sql);
                      $pass_v = mysqli_insert_id($con);
                      $date_of_expiry = time() + 60 * 60 * 24 * 30 ;
					  /*setting cookie on browser start*/
					  setcookie( 'wfjewel', $pass_v, $date_of_expiry );
					  /*setting cookie on browser end*/
					  $GLOBALS['cookid']=$pass_v;
					  $GLOBALS['customer']=0;
				}
		else{
			 /* if browser / customer found in database */
		 $GLOBALS['customer']=$rowx['cookie_user'];	
		 $GLOBALS['cookid']=$rowx['cookie_id'];
		 $GLOBALS['newuser']='0';
		 
		}
     /* setting new cookie for new user / browser end */
} 
/* for checking /debug purpose only
echo "<h2>". $_COOKIE['wfjewel']."</h2>";*/
?>  