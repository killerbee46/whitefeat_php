<!DOCTYPE html>
<html dir="ltr" lang="en-US" >
  <head>
    <meta charset="UTF-8">
    <title>Courier || System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/sweet-alert.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="../../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../../https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/app.js"></script>
<script src="dist/js/alert.js"></script>

	<style>@media print{a[href]:after{content:none!important;} #del_book{display:none!important;} #sign{position:absolute; margin-top:10px!important;} #print_butt{display:none!important;} #main{overflow:hidden!important}
	 a[href]:after {
        content: none !important;
    }
	}
	 .row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.row > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
	</style>
		<script>
function myFunction() {
  var curURL = window.location.href;
history.replaceState(history.state, '', '/');
window.print();
history.replaceState(history.state, '', curURL);
	
}
</script>
  </head>
<body style="background-color:#000; height:190px; width:400px;">
<div class="container pl-4 pb-2" style="background-color:#FFF;" id="main">
<?php
include('db_connect.php');
include('phpqrcode/qrlib.php');
include('cut_review3.php');
QRcode::png('https://invoice.php?id='.$_GET['id'], 'qr_cache/'.$_GET['id'].'.png', 'L', 4, 2);
$cb=0;
$g1=$_GET['id'];
//$g2=$_GET['start_c'];
//$g3=$_GET['end_c'];
$sql1 = "Select * from `sunsaebn_ct`.`log_order` where lo_id='$g1' "; 
$display=mysqli_query($con,$sql1);
$countx=mysqli_num_rows($display);

if($countx>0){

$row=mysqli_fetch_array($display);
/*
$sql1x = "Select * from `sunsaebn_ct`.`stock` where stock_id='".$row['stock_id']."' "; 
$displayx=mysqli_query($con,$sql1x);			   
$row=mysqli_fetch_array($displayx);
*/
/*end closing balance*/

echo'<div class="row" style="margin-top:0; padding-top:0.5em; margin-bottom:0; letter-spacing:1px;">
<div class="col-xs-12" style="text-align:center;">
<h3 style="margin-top:0; margin-bottom:0; font-size:1.4em;">City Logistics Nepal</h3>
<small>
New Road, Kathmandu, Nepal<br>
<small> support: 98400000, sales / order: 981800000 </small>
</small>
<small style="float:right; font-size:15px;letter-spacing:0.5px;"> <span id="print_butt"  onclick="myFunction()"> </i></span> </small>
</div>

</div>

<div class="row" style="margin-top:1em;">
<div class="col-xs-7" style="text-align:left;"><h4 style="margin-top:0; margin-bottom:0; letter-spacing:1px; font-size:1.1em;"><span style="font-size:0.8em;">Order <small>#ID</small> </span> CT-'.$g1.' </h4>
<small>'; 
echo send_string_review2($row['item_name']); echo'</small>
<i><small><small><small>RS</small> '.$row['item_price'].'</small></small></i>
<div style="margin-top:0.5em;">
<small><b>'; 
echo send_string_review2($row['customer_name']); echo'</b><br>
'; 
$sql1x = "Select * from `sunsaebn_ct`.`log_city_place` where cp_id='".$row['cp_id']."' "; 
$displayx=mysqli_query($con,$sql1x);			   
$rowx=mysqli_fetch_array($displayx);
echo $rowx['cp_name'];
 echo'<br>
'.$row['customer_no'].'<br>
</small>
</div>
</div>


<div class="col-xs-5" style="">
<center><img src="qr_cache/'.$g1.'.png" style="height:6.5em; width:6.5em;"/></center>
<center><i><small><small> Scan for <br> Invoice, Warranty & Refund </small></small></i></center>
</div>

</div>



';





/*
echo "
<h1 style='text-align:center; letter-spacing:0.05em;'>Invoice # <small><small>".$g1."</small></small> </h1>

<table border='1'".'class="table table-bordered table-hover" style="letter-spacing:0.5px; ">
             <tr style="background-color:#ccc;">'.'
			 <th colspan=5>Descriptions</th>
			 
			 <th>Qty</th>
			 <th>Unit price</th>
			 <th>Total</th>
             </tr>
			 
			 
			<tr style="background-color:#eee"'."><td colspan='5'".'><b>Note:</b></td><td colspan="3"><b>RS&nbsp;</b></td></tr>
			
			</table>';

	
echo'
<h1 style="text-align:center; letter-spacing:0.05em; padding:0em; margin:0; ">Invoice # <small><small>CT'.$g1.'</small></small> </h1>
<div class="row" style="background-color:#bbb;  border:1px solid #aaa; margin:0.1em; margin-top:1.2em; margin-bottom:0;">
<div class="col-xs-9" style="border-right:1px solid #aaa; padding:0.5em;">
Descriptions
</div>
<div class="col-xs-1" style="border-left:1px solid #aaa; padding:0.5em; text-align:center;">Qty</div>

<div class="col-xs-2" style="border-left:1px solid #aaa; padding:0.5em; text-align:center;">Price</div>
</div>';


echo'<div class="row" style="background-color:#fff;  border:1px solid #aaa; margin:0.1em; margin-top:0; margin-bottom:0; padding:0em;">
<div class="col-xs-9" style="border-right:1px solid #aaa; padding:0.5em; margin-right:0;">
<h4><u>Product Name</u>:</h4>';

/*
$sql1x = "Select * from `bill`.`d_member` where d_id='".$row['m_id']."' "; 
$displayx=mysqli_query($con,$sql1x);
$rown=mysqli_fetch_array($displayx);


echo '<b>'.ucfirst($row['p_name']) .'</b>';
echo'
<h4><u>Customer Details</u>:</h4>
<b>'.ucfirst($row['cust_name']).'</b>
'.$row['cust_add'].'<br>
'.$row['cust_number'].'<br>

</div>
<div class="col-xs-1" style="border-left:1px solid #aaa; padding:0.5em; text-align:center;">'.$row['p_qty'].'</div>

<div class="col-xs-2" style="border-left:1px solid #aaa; padding:0.5em; text-align:center;">Rs '.$row['p_price'].'</div>

</div>';

echo'
<div class="row" style="background-color:#eee;  border:1px solid #aaa; margin:0.1em; margin-top:0;">
<div class="col-xs-9" style="border-right:0px solid #aaa; padding:0.5em;">
TOTAL AMOUNT<i>'; echo'</i> 
</div>

<div class="col-xs-3" style="border-left:1px solid #aaa; padding:0.5em; text-align:center; "> ';

echo'

<div class="row">
<div class="col-xs-12" style="text-align:center; padding-left:2.5em;"><B style="font-size:1.3em;"><small style="font-weight:normal;">Rs&nbsp;</small>';
echo ($row['p_qty']*$row['p_price']);
echo'</b></div>
</div>



</div>

</div>';
*/	
			
?>

<!--
<div class="row">
<div class="col-xs-6"><br><br>
_________________________<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verified by <br>

</div>
</div>
-->
<div class="row">
<Br>
<div class="col-xs-12">
Shipping date:<small><small><i><?php  echo date("F jS, Y");  ?>, <i class="fa fa-globe"></i>  www.citylogistics.com</i> </small></small>
</div>
</div>
<!--<br><br>
<center><small>[<i> Computer generated bill, AD || System &copy; 2019, www.cityshopnepal.shopping</i> ]</small></center>--
<hr>-->


<?php } else{echo'<code>Sorry, Invalid bill ID#</code>';}?>




</div>
   
   <script>
   $(document).ready(function(){
   //$('#print_butt')[0].click();
   //setTimeout(function(){window.close();}, 500);
   });
   
   </script>
   
   
   
</body>
</html>