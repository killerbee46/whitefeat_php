<div class="container is-fluid has-text-centered has-text-weight-light notify-panel" style="background-color:#3892C6; color:#fff; font-size:0.65rem;height:24px; position:fixed; z-index:11;">
      <?php 
	  include('db_connect.php');
	  
	  $sql1a3 = "Select * from `whitefeat_wf_new`.`header_flash` where visible='1' order by hf_order "; 
      $displaya3=mysqli_query($con,$sql1a3); $sn=1;
      while($rowa3 = mysqli_fetch_array($displaya3))
	  {
		  
	    echo'<p class="p-1 head-notify" data-id="'.$sn.'"';if($sn!=1){echo'style="display:none;"';}echo' >
             <a href="#" style="color:#fff;"><span>'.$rowa3['hf_text'].'</span></a>
             </p>';
			 $sn++;
	  }
	  
	  ?>
    </div>
	
	
	<div class="container is-fluid has-text-weight-light p-1 " style="font-size: 1rem;
    position: relative;
    height: 72px;
    background: #F9F9FA;
	
	">
	
	   <div class="columns navbar is-fixed-top checkout_header " style=" box-shadow: 0px 1px 5px 1px rgba(125,121,121,0.32);
-webkit-box-shadow: 0px 1px 5px 1px rgba(125,121,121,0.32);
-moz-box-shadow: 0px 1px 5px 1px rgba(125,121,121,0.32);">
  
  <div class="column m-0 is-5 " style="padding:0; padding-left:2.5em; padding-top:0.2em;">
  <a href="/" style="position:absolute; margin-top:0.4em; font-size:1.2em; font-weight:100;"><I class="fas fa-arrow-left"></I>&nbsp; &nbsp; </a><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/wflogo.png" style="height:38.3px; margin-left:3em;"/>
  </div>
  
  <div class="column m-0 d-nav is-5 mg-menu" style="padding-top:0.6em;">
  <div class="header_title">
 <span class="subtitle letter-spacing"><i class="fas fa-shopping-basket"></i>&nbsp; Your Shopping Cart (<?php 
   
   $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cookie_id='".$GLOBALS['cookid']."' and checkout='0' "; 
      $displayact=mysqli_query($con,$sql1act);
	  $countcwm=mysqli_num_rows($displayact);
	  $rowact=mysqli_fetch_array($displayact);
	  
	  $countcw=0;
	  
	  if($countcwm>0){
      $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowact['cb_id']."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  $countcw=mysqli_num_rows($displayacw);
	  
	  }
		  
		  echo $countcw;
	     
  
  ?>)</span> 
</div></div>




   <div class="column p-0 m-0 is-3" style="">
   
</div> 

 
    </div>


</div>