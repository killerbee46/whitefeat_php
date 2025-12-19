<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php');include 'header-functions.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Processing khalti payment</title>

</head>

<body>
		<div id="loader" class="center">
	</div>
<?php
     $total_bd=0; $total_dis=0; $total_net=0; 
    
      $sql1act = "Select * from `whitefeat_wf_new`.`cart_book` where cb_id='".$_GET['cb_id']."'"; 
      $displayact=mysqli_query($con,$sql1act);
	  $rowact=mysqli_fetch_array($displayact);
	  
	  
	  
	  $sql1acw = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowact['cb_id']."' "; 
      $displayacw=mysqli_query($con,$sql1acw);
	  while($rowactx=mysqli_fetch_array($displayacw)){
		  $sqlckp = fetchProduct($rowactx['id_pack']); 
          $displayckp=mysqli_query($con,$sqlckp);
	      $rowckp=mysqli_fetch_array($displayckp);
		  $newprice=$rowckp['final_price'];
		  if($rowckp['discount']>0){
		  $total_dis=$total_dis+($rowckp['discount']*$rowactx['qty']);
	       }
	      $total_net=$total_net+($newprice*$rowactx['qty']);
	  }
	     $total_net=floor($total_net);
		 //echo $total_net;

 ?>

<center>Initializing Khalti payment gateway.......'</center>


<?php


$url = "https://khalti.com/api/v2/epayment/initiate/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);

$uid=$rowact['cb_id'];

  $data = '{"return_url" : "https://whitefeathersjewellery.com/khalti_payment.php",
  "website_url" : "https://whitefeathersjewellery.com/",
  "amount" : '.(($total_net)*100).',
  "purchase_order_id" : "wfo-'.$uid.'",
  "purchase_order_name" : "wfn-'.$uid.'",
  "amount_breakdown": [{"label": "Net Price","amount":'.(($total_net)*100).'},{"label": "VAT","amount": 0}]
	       }';
	   
	 //  echo $data;
   //$payload = json_encode($data);


$headers = ['Content-Type: application/json', 'Authorization: key live_secret_key_da719cdf0f53462aa6bfd38e8ed32e0d'];
//live_secret_key_da719cdf0f53462aa6bfd38e8ed32e0d
//live_public_key_aa6bcfd816c3420285fe301c998b821d
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//echo "['Content-Type: application/json', 'Authorization: Key live_secret_key_da719cdf0f53462aa6bfd38e8ed32e0d']"."<br>";
//echo '<br><br> ---- RESPONSE CODE ----'.'<br>';
$resp = curl_exec($curl);
//echo var_dump($resp);
$aresult=(json_decode($resp, true));
//echo $aresult['payment_url'];



//echo '<br>'.curl_getinfo($curl, CURLINFO_HTTP_CODE) . '<br/>';
//echo curl_errno($curl) . '<br/>';
//echo curl_error($curl) . '<br/>';
curl_close($curl);


?>
<?php if($aresult['payment_url']!=''){?>
<script>
window.location.href = '<?php echo $aresult['payment_url'];?>';
</script>  
<?php  }?>

</body>
</html>


<?php 

}
?>