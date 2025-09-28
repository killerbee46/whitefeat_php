<?php
include('db_connect.php');
include('image_cache.php');
$g2=$_POST['fpname'];
$g4=$_POST['pinfo'];
//$g4='';
$g5=$_POST['sspost'];
//main price b2c
$gpr='0';
//main price b2b
$gprb2b='0';

$gps=$_POST['nstock'];
$g4_final = mysqli_real_escape_string($con, $g4);
$g5_final = mysqli_real_escape_string($con, $g5);

$gpmatype=$_POST['pro_material_type'];
$gpmetype=$_POST['pro_metal_type'];
$gwt=$_POST['pro_wt'];
$gsz=$_POST['pro_size_type'];


$gheadt=$_POST['title_head'];
$gkey=$_POST['com_head1'];
$gsdes=$_POST['com_head2'];
$gmeta=$_POST['hname'];

$gkey_final = mysqli_real_escape_string($con, $gkey);
$gsdes_final = mysqli_real_escape_string($con, $gsdes);
$gmeta_final = mysqli_real_escape_string($con, $gmeta);

$goffer=$_POST['fprdis'];


/* for title & subtitle checking */
$forex1=$_POST['newpackt'];

/* added updates */
$women=0;
$men=0;
$kid=0;
$time=
$idi = time();

if(isset($_POST['women_check'])){
	$women=1;
}

if(isset($_POST['men_check'])){
	$men=1;
}

if(isset($_POST['kid_check'])){
	$kid=1;
}
$gift=$_POST['gift_tag'];


/* Main checking condition */
if($g2!='')
{	

$csql = "INSERT INTO `whitefeat_wf_new`.`package` (
`id_pack`,
`p_name`,
 `p_des`,
 `p_text`,
 `cat_id`,
 `price`,
 `price_b2b`,
 `stock`,
 `keyword`,
 `description`,
 `weight`,
 `pm_id`,
 `pmt_id`,
 `title_head`,
 `meta_head`,
 `ps_id`,
 `tag_women`,
 `tag_men`,
 `tag_kid`,
 `tag_gift`,
 `offer`
 
 ) VALUES (
 '$idi',
 '$g2',
 '$g4_final',
 '$g5_final',
 '$forex1',
 '$gpr',
 '$gprb2b',
 '$gps',
 '$gkey_final',
 '$gsdes_final',
 '$gwt',
 '$gpmatype',
 '$gpmetype',
 '$gheadt',
 '$gmeta_final',
 '$gsz',
 '$women',
 '$men',
 '$kid',
 '$gift',
 '$goffer'
 );";    
mysqli_query($con,$csql);
echo $idi;
setcookie("productId",$idi,time() + (60 * 2));

//echo $_POST['regular_tag'];
// for regulat tag 
            
			
				$sql="INSERT INTO `whitefeat_wf_new`.`tag_package` (`tgp_id`, `tag_id`, `id_pack`) VALUES (NULL, '".$_POST['regular_tag']."', '".$idi."');";
				mysqli_query($con,$sql);
				
		
		      

		      
// for collection_tag tag 
            
				$sql="INSERT INTO `whitefeat_wf_new`.`package_collection_link` (`pcl_id`, `id_pack`, `pc_id`) VALUES (NULL, '".$idi."', '".$_POST['collection_tag']."');";
				mysqli_query($con,$sql);
				
		
	
	

// price calculation update 



$gwt=$gwt/11.664;
// for b2c
$dcr=$_POST['dcrater'];
$dcq=$_POST['dcrateqty'];
$dcr2=$_POST['dcrater_bce2'];
$dcq2=$_POST['dcrateqty_bce2'];
$mkp=$_POST['makingpp'];
$mkg=$_POST['makinggm'];
$jarti=$_POST['jarti'];

            $sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='".$gpmetype."'";
		    $displays=mysqli_query($con,$sqls);
		    $rows = mysqli_fetch_array($displays);
			
if($gpmetype==11){$gwt=$gwt*11.664;}			
			
			
$price_total=0;
$price1=$rows['rate']*$gwt;
$price2=$dcr*$dcq;
$price22=$dcr2*$dcq2;
$price3=0;
if($mkp>0){$price3=$mkp;}else{$price3=$mkg*($gwt*11.664);}
$price4=$rows['rate']*(($jarti/100)*$gwt);
$price_total=$price1+$price2+$price3+$price4+$price22;
$csql = "Update `whitefeat_wf_new`.`package` SET  
dc_rate='$dcr',
dc_qty='$dcq',
dc_rate_bce2='$dcr2',
dc_qty_bce2='$dcq2',
mk_pp='$mkp',
mk_gm='$mkg',
jarti='$jarti',
price='$price_total'
where id_pack='$idi';"; 
mysqli_query($con,$csql);


// for b2b
$dcr=$_POST['dcrater_b2b'];
$dcq=$_POST['dcrateqty_b2b'];
$dcr2=$_POST['dcrater_b2e2'];
$dcq2=$_POST['dcrateqty_b2e2'];
$mkp=$_POST['makingpp_b2b'];
$mkg=$_POST['makinggm_b2b'];
$jarti=$_POST['jarti_b2b'];

$sqls = "";
if($gpmetype==11){
           $sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='12'";	
}
else{$sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='".$gpmetype."'";}
		    $displays=mysqli_query($con,$sqls);
		    $rows = mysqli_fetch_array($displays);

$price_total=0;
$price1=$rows['rate']*$gwt;
$price2=$dcr*$dcq;
$price22=$dcr2*$dcq2;
$price3=0;
if($mkp>0){$price3=$mkp;}else{$price3=$mkg*($gwt*11.664);}
$price4=$rows['rate']*(($jarti/100)*$gwt);
$price_total=$price1+$price2+$price3+$price4+$price22;

$offer_b2b=$_POST['fprdis_b2b'];
$stock_b2b=$_POST['nstock_b2b'];

if($offer_b2b>0){
	$price_total=$price_total-(($offer_b2b/100)*$price_total);
}

$csql = "Update `whitefeat_wf_new`.`package` SET  
dc_rate_b2b='$dcr',
dc_qty_b2b='$dcq',
dc_rate_b2b_b2e2='$dcr2',
dc_qty_b2b_b2e2='$dcq2',
mk_pp_b2b='$mkp',
mk_gm_b2b='$mkg',
jarti_b2b='$jarti',
price_b2b='$price_total',
offer_b2b='$offer_b2b',
stock_b2b='$stock_b2b'
where id_pack='$idi';"; 
mysqli_query($con,$csql);



}
?>