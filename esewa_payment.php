<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Esewa Payment</title>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="assets/css/css.css">
</head>

<body>
	<div id="loader" class="center">
	</div>
 <div class="container p-4 mt-4"> 
 
<?php

  //include ('test.php?id=39');
  
 if(isset($_GET['fail'])){
 echo'<div class="columns card is-multiline has-text-centered">
      <div class="column is-12">
	    <h3 class="subtitle"><i class="fas fa-times-circle is-size-2 has-text-danger"></i> &nbsp; Payment Fail !</h3> <hr>
		
		<img src="assets/images/esewa.jpg" style="height:3em;"/>
		<h4>Sorry! We couldn'."'".'t process your esewa payment! <Br>
		
		Try again  / Try other payment methods </h4>
	  </div>
	  
	  <div class="column is-12">
	  <hr>
	     <a href="cart" style="position:absolute; margin-top:0.4em; font-size:1.2em; font-weight:100;"><I class="fas fa-arrow-left"></I>&nbsp; &nbsp; </a><a href="cart"><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/wflogo.png" style="height:38.3px; margin-left:3em;"/> &nbsp; </a>
	  </div>
	  
	  
   </div>';
 }
 ?>
 
 
 
 
 <?php 
  if(isset($_GET['success'])){
	  
	  
	  
	  
	    $paym=3;
        $tracking=time().round(microtime(true)).$GLOBALS['customer'];
		
	  $getid=explode("-",$_GET['success']);
	    $tracking=time().round(microtime(true)).$GLOBALS['customer'];
		
		  $tdate=date('y-m-d');
  
      $sqlft2 = "Select * from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$GLOBALS['cookid']."' "; 
      $displayft2=mysqli_query($con,$sqlft2); 
	  $rowft2=mysqli_fetch_array($displayft2);
	  
	  
	  $sqlft2x = "Select * from `whitefeat_wf_new`.`cart_book`  where  cb_id='".$getid[1]."'";
      $displayft2x=mysqli_query($con,$sqlft2x); 
	  $rowft2x=mysqli_fetch_array($displayft2x);
	  
	  
	  if($rowft2x['esewa_verify']==0){
	  
	  $sql = "update `whitefeat_wf_new`.`cart_book` set tracking_code='".$tracking."', checkout='1', mode='$paym', p_date='$tdate', cur_id='".$rowft2['cookie_currency']."', esewa_code='".$_GET['refId']."' where  cb_id='".$getid[1]."'";
      mysqli_query($con,$sql);
	  
	  // for QR
  include 'phpqrcode/qrlib.php';
  $location="qrimages/".$tracking.".png";
  $text="https://whitefeathersjewellery.com/bill/".$getid[1];
  QRcode::png($text,$location);
	  }
  
  
	  echo'<div class="columns card is-multiline has-text-centered">
      <div class="column is-12">
	    <h3 class="subtitle"><i class="fas fa-check-circle is-size-2 has-text-success"></i> &nbsp; Payment Sucess !</h3> <hr>
		
		<img src="assets/images/esewa.jpg" style="height:3em;"/>
		<h4>Congratulation! Your esewa payment was processed successfully! <Br> </h4>
	  </div>
	  
	  
	  <div class="column is-12">
	  		 <a href="customer"><button class="button is-dark" style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);color:#444;" ><i class="fas fa-user-circle"></i>&nbsp; Go to your Dashboard</button></a>


		 <a href="bill/'.$getid[1].'" id="print_bill" target="_blank"><button class="button is-warning is-light" style="" ><i class="fas fa-file-alt"></i>&nbsp; View / Print Invoice</button></a> 
		 <hr>
		  <label>Tracking code for your order: </label>
		 <code id="tracking_code" class="column is-half
is-offset-one-quarter mt-2 mb-2 card has-background-white has-text-dark " style="">
		   '.$rowft2x['tracking_code'].'
		   </code>
		 </div>
		 
		    <div class="column mt-5 thankyou-div">
		 	 <img src="assets/images/extra/namaste.png" style="height:5em;"><br>
		 Thankyou for choosing us! <br>- Whitefeathers Team. <br>
		 <small class="letter-spacing"><u>Contact us</u>
  +977 - 9806091605  , if you have any issue. 
  </small>
		 </div>
	  
	  
	  
	  
	  <div class="column is-12">
	  <hr>
	     <a href="cart" style="position:absolute; margin-top:0.4em; font-size:1.2em; font-weight:100;"><I class="fas fa-arrow-left"></I>&nbsp; &nbsp; </a><a href="cart"><img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/wflogo.png" style="height:38.3px; margin-left:3em;"/> &nbsp; </a>
	  </div>
	  
	  
   </div>';
   
   
   
   /*
   $total_net=0;
      $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$getid[1]."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  while($rowactx=mysqli_fetch_array($displayacw)){
		     
			  $sqlckp = "Select * from `whitefeat_wf_new`.`package` where id_pack='".$rowactx['id_pack']."'"; 
              $displayckp=mysqli_query($con,$sqlckp);
	          $rowckp=mysqli_fetch_array($displayckp);
			  
	 $newprice=$rowckp['price'];
	 
	 if($rowckp['offer']>0){
		 $newprice=($rowckp['price']-(($rowckp['offer']/100)*$rowckp['price']));
	 }
	  $total_net=$total_net+($newprice*$rowactx['qty']);
	  
	  }
	 */ 
	  
	  
	  /*
	  $url = "https://uat.esewa.com.np/epay/transrec";
$data =[
    'amt'=> floor($total_net),
    'rid'=> $_GET['refId'],
    'pid'=> $getid[1],
    'scd'=> 'EPAYTEST'
];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

if ($response === false) 
{   $response = curl_error($curl);

  echo stripslashes($response);}

    curl_close($curl);
	
	*/
	  
	  
	  
	  if($rowft2x['esewa_verify']==0){
	  
	  // extra verfication for esewa
	  
	  echo'
	     <form action="https://uat.esewa.com.np/epay/transrec" id="cross_verify" method="GET">
    <input value="'; 
	  $total_net=0;
      $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$getid[1]."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  while($rowactx=mysqli_fetch_array($displayacw)){
		     
			  $sqlckp = "Select * from `whitefeat_wf_new`.`package` where id_pack='".$rowactx['id_pack']."'"; 
              $displayckp=mysqli_query($con,$sqlckp);
	          $rowckp=mysqli_fetch_array($displayckp);
			  
	 $newprice=$rowckp['price'];
	 
	 if($rowckp['offer']>0){
		 $newprice=($rowckp['price']-(($rowckp['offer']/100)*$rowckp['price']));
	 }
	  $total_net=$total_net+($newprice*$rowactx['qty']);
	       
	   }
	 echo floor($total_net);
	 
	  
	
	echo'" name="amt" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="'.$_GET['oid'].'" name="pid" type="hidden">
    <input value="'.$_GET['refId'].'" name="rid" type="hidden">
    <input value="Submit" type="submit" style="display:none;">
    </form>'; 
	
		echo'<a href="#" target="" id="verify_tran"></a>';
	
	
	
	?>
	  
	 
	 
<script src="assets/js/jquery-3.6.0.min.js"></script>
	 <script>
	var uri='https://uat.esewa.com.np/epay/transrec?';
     uri+='amt='+'<?php echo floor($total_net); ?>'+'&scd=EPAYTEST'+'&pid='+'<?php echo $_GET['oid']; ?>'+'&rid='+'<?php echo $_GET['refId']; ?>';
	$('#verify_tran').attr("href",uri);
	
	$(".thankyou-div").load("esewa_verify.php?id="+'<?php echo $_GET['refId']; ?>');
	setTimeout(function () {
   $("#verify_tran")[0].click();
}, 1000);
	
	 
	 
	 let esewaWindow;
	 
	 function openWin() {
  esewaWindow=window.open(uri, "_blank", "top=50,left=50,width=100,height=100");
  
  

}

function closeWin() {
	
  esewaWindow.close();
}


openWin();


setTimeout(function () {
    closeWin();
}, 3000);


	 
	 
	 
	
	
	
	
	 </script>
	
	
	  
<?php  

	  }





 }
 
 
 
 ?>
 
 
 
 </div>

</body>

</html>


<?php }?>