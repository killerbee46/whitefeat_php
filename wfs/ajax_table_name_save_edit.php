<?php
include('db_connect.php');
include('image_cache.php');

$g1=$_POST['cat_name'];
$g2=$_POST['cat_video'];
$id=$_POST['catval'];

if(isset($_FILES['itemimg']) && $_FILES['itemimg']['name']!= ''){
$sourcePath = $_FILES['itemimg']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["itemimg"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/category/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file

 

$destination = "../assets/images/category/icon/".$newfilename; // Target path where file is to be stored			  
			  icut($targetPath, $destination, 60, false);


$sql2="UPDATE `whitefeat_wf_new`.`package_category` SET cat_pic='$newfilename', cat_menu_icon='$newfilename'  WHERE cat_id='$id'";
mysqli_query($con,$sql2); 

}
	
$sql2="UPDATE `whitefeat_wf_new`.`package_category` SET cat_name='$g1', cat_vid='$g2', cat_dis='".$_POST['cat_dis']."' , cat_dis_b2b='".$_POST['cat_dis_b2b']."'   WHERE cat_id='$id'";
mysqli_query($con,$sql2); 

if($_POST['cat_dis']>0){ 
$sql2="UPDATE `whitefeat_wf_new`.`package` SET offer='".$_POST['cat_dis']."' WHERE cat_id='$id'";
mysqli_query($con,$sql2); 
}

if($_POST['cat_dis_b2b']>0){ 
$sql2="UPDATE `whitefeat_wf_new`.`package` SET offer_b2b='".$_POST['cat_dis_b2b']."' WHERE cat_id='$id'";
mysqli_query($con,$sql2);


$sql3="Select * from `whitefeat_wf_new`.`package` WHERE cat_id='$id'";
$display=mysqli_query($con,$sql3);
while($rowx=mysqli_fetch_array($display))
{
	
// for b2b price update
$sqls = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='".$rowx['pmt_id']."'";
		    $displays=mysqli_query($con,$sqls);
		    $rows = mysqli_fetch_array($displays);
			
$dcr=$rowx['dc_rate_b2b'];
$dcq=$rowx['dc_qty_b2b'];
$mkp=$rowx['mk_pp_b2b'];
$mkg=$rowx['mk_gm_b2b'];
$jarti=$rowx['jarti_b2b'];



$price_total=0;
$price1=$rows['rate']*$rowx['weight'];
$price2=$dcr*$dcq;
$price3=0;
if($mkp>0){$price3=$mkp;}else{$price3=$mkg*$rowx['weight'];}
$price4=$jarti;
$price_total=$price1+$price2+$price3+$price4;
$price_total=$price_total-(($_POST['cat_dis_b2b']/100)*$price_total);


$csql = "Update `whitefeat_wf_new`.`package` SET  price_b2b='$price_total' where id_pack='".$rowx['id_pack']."';"; 
mysqli_query($con,$csql);

}




 
}

		?>