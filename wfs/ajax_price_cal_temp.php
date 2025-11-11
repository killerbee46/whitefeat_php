<?php
include('db_connect.php');


$dcr=$_POST['dcr'];
$dcq=$_POST['dcq'];
$mkp=$_POST['mkp'];
$mkg=$_POST['mkg'];
$jarti=$_POST['jarti'];


$pm=$_POST['pm'];
$wt=0;
//echo $pm.'**';
if($pm!=11){$wt=$_POST['wt']/11.664;}
else{$wt=$_POST['wt'];}

$sqls='';
if(isset($_POST['str_b2b'])){
	      if($pm!=11){
            $sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='$pm'";	
		  }else{
			  $sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='12'";	
		  }
}
else{$sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='".$pm."'";}
		    $displays=mysqli_query($con,$sqls);
		    $rows = mysqli_fetch_array($displays);
			
			
$price_total=0;
$price1=$rows['rate']*$wt;
//echo $rows['rate'].'**';
//echo $wt.'**';
//echo $price1.'**';
$price2=$dcr*$dcq;
$price3=0;
if($mkp>0){$price3=$mkp;}else{$price3=$mkg*($wt*11.664);}
$price4=$rows['rate']*(($jarti/100)*$wt);
//echo $price3.'**';
$price_total=$price1+$price2+$price3+$price4;
if(isset($_POST['discount'])){
 $price_total=$price_total-(($_POST['discount']/100)*$price_total);
}

echo floor($price_total);




?>