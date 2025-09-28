<?php
include('db_connect.php');
include('image_cache.php');


$idi=$_POST['pval'];

$g2=$_POST['fpname'];
$g4=$_POST['pinfo'];
//$g4='';
$g5=$_POST['sspost'];

// prices
$gpr='0';
$gprb2b='0';

$gps=$_POST['nstock'];
$g4_final = mysqli_real_escape_string($con, $g4);
$g5_final = mysqli_real_escape_string($con, $g5);

$gpmatype=$_POST['pro_material_type'];
$gpmetype=$_POST['pro_metal_type'];
$gwt=$_POST['pro_wt'];
$gsz=$_POST['pro_size_type'];

//echo $gsz;
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

//echo $women.$men.$kid;

/* Main checking condition */
if($g2!='' && $g5_final!='' && $forex1!='')
{	

$csql = "Update `whitefeat_wf_new`.`package`
SET 
 p_name='$g2',
 p_des='$g4_final',
 p_text='$g5_final',
 cat_id='$forex1',
 price='$gpr',
 price_b2b='$gprb2b',
 stock='$gps',
 keyword='$gkey_final',
 description='$gsdes_final',
 weight='$gwt',
 pm_id='$gpmatype',
 pmt_id='$gpmetype',
 title_head='$gheadt',
 meta_head='$gmeta_final',
 ps_id='$gsz',
 tag_women='$women',
 tag_men='$men',
 tag_kid='$kid',
 tag_gift='$gift',
 offer='$goffer'
 where id_pack='$idi'
 ;";    
mysqli_query($con,$csql);


//echo $_POST['regular_tag'];
// for regulat tag 
            
			$sql1g2 = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='".$idi."'";
		          $displayg2=mysqli_query($con,$sql1g2);
		          
				  
				  $cct=mysqli_num_rows($displayg2);
				  if($cct>0)
			{
			$sql1g = "UPDATE `whitefeat_wf_new`.`tag_package` set tag_id='".$_POST['regular_tag']."' where id_pack='".$idi."'";
		    $displayg=mysqli_query($con,$sql1g);
			}
			else{
				$sql="INSERT INTO `whitefeat_wf_new`.`tag_package` (`tgp_id`, `tag_id`, `id_pack`) VALUES (NULL, '".$_POST['regular_tag']."', '".$idi."');";
				mysqli_query($con,$sql);
				
				
			}
		
		      

		      
// for collection_tag tag 
            
			$sql1g2 = "Select * from `whitefeat_wf_new`.`package_collection_link` where id_pack='".$idi."'";
		          $displayg2=mysqli_query($con,$sql1g2);
		          
				  
				  $cct=mysqli_num_rows($displayg2);
				  if($cct>0)
			{
			$sql1g = "UPDATE `whitefeat_wf_new`.`package_collection_link` set pc_id='".$_POST['collection_tag']."' where id_pack='".$idi."'";
		    $displayg=mysqli_query($con,$sql1g);
			}
			else{
				$sql="INSERT INTO `whitefeat_wf_new`.`package_collection_link` (`pcl_id`, `id_pack`, `pc_id`) VALUES (NULL, '".$idi."', '".$_POST['collection_tag']."');";
				mysqli_query($con,$sql);
				
				
			}
		
		      


		      

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
			
			$pm=$rows['pmt_id'];
if($pm==11){$gwt=$gwt*11.664;}
			
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