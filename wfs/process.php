<?php
  
    include('db_connect.php');
    $UserName=$_POST['user1'];
    $Password=$_POST['pass1'];
	$stmt="select * from `whitefeat_wf_new`.`login` where u_name='$UserName' and pass='$Password'";
    $result=mysqli_query($con,$stmt);
	$count=mysqli_num_rows($result);
	$row = $result->fetch_assoc();
		if ($count > 0)
		   {
        
	         session_start();
			 $_SESSION['u_id'] =$row['id_user'] ;
			 $_SESSION['u_name'] =$row['u_name'] ;
		     header('location:main.php');
			 
			 //clearing  delete requested orders
			 
			  $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_request='1'"; 
               $displayup=mysqli_query($con,$sqlup); 
	         while($rowup=mysqli_fetch_array($displayup))
	         {
	   $sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowup['cb_id']."'"; 
      $displayckp1=mysqli_query($con,$sqlckp1);
	  while($rowckp1=mysqli_fetch_array($displayckp1))
	  { 
		  
		  $sqlckp2 = "Select stock from `whitefeat_wf_new`.`package` where id_pack='".$rowckp1['id_pack']."'"; 
           $displayckp2=mysqli_query($con,$sqlckp2);
	       $rowckp2=mysqli_fetch_array($displayckp2);
		   
		   $newstock=$rowckp2['stock']+$rowckp1['qty'];
		   
		   $sql = "update `whitefeat_wf_new`.`package` set stock='".$newstock."' where id_pack='".$rowckp1['id_pack']."'";
           mysqli_query($con,$sql);
		   
		   
		  
	  }
	    
		   $sql2 = "Delete from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowup['cb_id']."'";
           mysqli_query($con,$sql2);
		  
	         }
			 
		   $sql3 = "Delete  from `whitefeat_wf_new`.`cart_book` where c_request='1'";
           mysqli_query($con,$sql3);
	  
	  
	   // price updates job
	    $sql1 = "Select * from `whitefeat_wf_new`.`package_metal`";
    $display1=mysqli_query($con,$sql1);
    while($row1 = mysqli_fetch_array($display1)) 
    {

    $sql2 = "Select * from `whitefeat_wf_new`.`package` where pmt_id ='".$row1['pmt_id']."' ";
    $display2=mysqli_query($con,$sql2);
    while($rowx = mysqli_fetch_array($display2)) 
    {
		
		
		
		      

// price calculation update 
$gwt=$rowx['weight']/11.664;
// for b2c
$dcr=$rowx['dc_rate'];
$dcq=$rowx['dc_qty'];
$dcr2=$rowx['dc_rate_bce2'];
$dcq2=$rowx['dc_qty_bce2'];
$mkp=$rowx['mk_pp'];
$mkg=$rowx['mk_gm'];
$jarti=$rowx['jarti'];

if($row1['pmt_id']==11){$gwt=$rowx['weight'];}
			
$price_total=0;
$price1=$row1['rate']*$gwt;
$price2=$dcr*$dcq;
$price22=$dcr2*$dcq2;
$price3=0;
if($mkp>0){$price3=$mkp;}else{$price3=$mkg*floor($gwt*11.664);}
$price4=$row1['rate']*(($jarti/100)*$gwt);
$price_total=$price1+$price2+$price3+$price4+$price22;
$csql = "Update `whitefeat_wf_new`.`package` SET price='$price_total' where id_pack='".$rowx['id_pack']."';"; 
mysqli_query($con,$csql);


// for b2b price update
			
$dcr=$rowx['dc_rate_b2b'];
$dcq=$rowx['dc_qty_b2b'];
$dcr2=$rowx['dc_rate_b2b_b2e2'];
$dcq2=$rowx['dc_qty_b2b_b2e2'];
$mkp=$rowx['mk_pp_b2b'];
$mkg=$rowx['mk_gm_b2b'];
$jarti=$rowx['jarti_b2b'];

$sqlsx = "";
if($row1['pmt_id']==11){
           $sqlsx = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='12'";	
}
else{$sqlsx = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='".$row1['pmt_id']."'";}
		    $displaysx=mysqli_query($con,$sqlsx);
		    $rowsx = mysqli_fetch_array($displaysx);
  
$price_total=0;
$price1=$rowsx['rate']*$gwt;
$price2=$dcr*$dcq;
$price22=$dcr2*$dcq2;
$price3=0;
if($mkp>0){$price3=$mkp;}else{$price3=$mkg*floor($gwt*11.664);}
$price4=$rowsx['rate']*(($jarti/100)*$gwt);
$price_total=$price1+$price2+$price3+$price4+$price22;
$price_total=$price_total-(($rowx['offer_b2b']/100)*$price_total);


$csql = "Update `whitefeat_wf_new`.`package` SET  price_b2b='$price_total' where id_pack='".$rowx['id_pack']."';"; 
mysqli_query($con,$csql);

 
		
		
		
		
		
	}
     
     

    }
	  // end updates job
	  
	  
	  
	  
	  
	  
		   }
		        
		  else
		  {
		      header('location:index.php?uerror=true');
	      }
  
  ?>