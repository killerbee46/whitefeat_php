<?php {
	include('db_connect.php');
	include('make_url.php');
	
	  $sqlus = "Select * from `whitefeat_wf_new`.`customer` where c_id='".$_POST['cid']."'"; 
      $displayus=mysqli_query($con,$sqlus);
	  $rowus=mysqli_fetch_array($displayus);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Order Report Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/css.css">
 <style>
   @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
 </style>
</head>
<body>

<h5 class="is-size-7 has-background-light p-2 pb-3"><strong>White Feathear's Vendor (Order-report) : &nbsp; <?php echo strtoupper($rowus['name']); ?> &nbsp; , Report: &nbsp; from: <?php echo $_POST['fdate']; ?> &nbsp; to: <?php echo $_POST['tdate']; ?>
<button class="button is-primary is-small no-print" onclick="window.print();"style="float:right;">print &nbsp; <i class="fas fa-print"></i></button>
</strong></h5>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="Position">SN</abbr></th>
      <th>Date</th>
      <th><abbr title="Played">Items</abbr></th>
      <th><abbr title="Won">Price</abbr></th>
      <th><abbr title="Drawn">Status</abbr></th>
      <th><abbr title="Drawn">Payment Mode</abbr></th>
      <th class="no-print"><abbr title="Lost">Invoice</abbr></th>
     
    </tr>
  </thead>
  <!--<tfoot>
    <tr>
      <th><abbr title="Position">Pos</abbr></th>
      <th>Team</th>
      <th><abbr title="Played">Pld</abbr></th>
      <th><abbr title="Won">W</abbr></th>
      <th><abbr title="Drawn">D</abbr></th>
      <th><abbr title="Lost">L</abbr></th>
      <th><abbr title="Goals for">GF</abbr></th>
      <th><abbr title="Goals against">GA</abbr></th>
      <th><abbr title="Goal difference">GD</abbr></th>
      <th><abbr title="Points">Pts</abbr></th>
      <th>Qualification or relegation</th>
    </tr>
  </tfoot>-->
  <tbody>
  
  <?php 
	  $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' order by cb_id DESC"; 
	  // pay filter
		if($_POST['pay_select']==2){
         $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' and mode='1' order by cb_id DESC"; 
		}
		if($_POST['pay_select']==3){
          $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' and mode='2' order by cb_id DESC"; 
		}
		if($_POST['pay_select']==4){
          $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' and mode='3' order by cb_id DESC"; 
		}
	  
      
	  if($_POST['status_select']==2){
		  
		$sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='0' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' order by cb_id DESC";   
	    
		// pay filter
		if($_POST['pay_select']==2){
         $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='0' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' and mode='1' order by cb_id DESC";   			
		}
		if($_POST['pay_select']==3){
         $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='0' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' and mode='2' order by cb_id DESC";   			
		}
		if($_POST['pay_select']==4){
         $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='0' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' and mode='3' order by cb_id DESC";   			
		}
		
		
	  }
	  
	  if($_POST['status_select']==3){
		$sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='1' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' order by cb_id DESC";   		  
		
		// pay filter
		if($_POST['pay_select']==2){
         $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='1' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0'  and mode='1' order by cb_id DESC";   		  
		}
		if($_POST['pay_select']==3){
                $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='1' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0'  and mode='2' order by cb_id DESC";   		  
		}
		if($_POST['pay_select']==4){
                  $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and dispatch='1' and deliver='0' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0'  and mode='3' order by cb_id DESC";   		  
		}
		
		
	  }
	  
	  if($_POST['status_select']==4){
	  		$sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and deliver='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0' order by cb_id DESC";   	  
	  
	  
		// pay filter
		if($_POST['pay_select']==2){
        $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and deliver='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0'  and mode='1' order by cb_id DESC";   	  
		}
		if($_POST['pay_select']==3){
                 $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and deliver='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0'  and mode='2' order by cb_id DESC";   	  
		}
		if($_POST['pay_select']==4){
                     $sqlup = "Select * from `whitefeat_wf_new`.`cart_book` where c_id='".$_POST['cid']."' and checkout='1' and deliver='1' and p_date >='".$_POST['fdate']."' and p_date <='".$_POST['tdate']."' and c_request='0'  and mode='3' order by cb_id DESC";   	  
		}
		
	  
	  }
	  
	  
	  
	  $displayup=mysqli_query($con,$sqlup); $sn=1; $total_net=0;
	  while($rowup=mysqli_fetch_array($displayup))
	  {
		echo'
	  <tr>
      <th class="p-5">'.$sn.'</th>
      <td class="p-5">'.$rowup['p_date'].'</td>
      <td class="p-5">'; 
	  
	  $sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='".$rowup['cur_id']."'"; 
      $displaycrc2=mysqli_query($con,$sqlcrc2);
	  $rowcrc2=mysqli_fetch_array($displaycrc2);
      $cnot=$rowcrc2['cur_name']; $crate=(1/$rowcrc2['cur_rate']);
	  
	  
	  
	  $sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowup['cb_id']."'"; 
      $displayckp1=mysqli_query($con,$sqlckp1);
	  while($rowckp1=mysqli_fetch_array($displayckp1))
	  {
		  $total_net=$total_net+($rowckp1['rate']*$rowckp1['qty']);  
		  echo'<div class="columns mb-5">';
	  echo'<small><small>'; 
	  $sqlckp2 = "Select s_path from `whitefeat_wf_new`.`package_slider` where id_pack='".$rowckp1['id_pack']."' limit 1"; 
      $displayckp2=mysqli_query($con,$sqlckp2);
	  $rowckp2=mysqli_fetch_array($displayckp2);
	  
	  echo'<img src="assets/images/product/thumb/'.$rowckp2['s_path'].'" style="height:5em;"> <span><a href="'.make_url($rowckp1['p_name']).'" target="_blank" class="button is-small no-print">&nbsp; &nbsp; <i class="fas fa-eye"></i> &nbsp; View Product</a></span>';
	  
	  echo'<br> &diams; '.ucfirst($rowckp1['p_name']).' - '.$rowckp1['qty'].'&nbsp;Unit';if($rowckp1['qty']>1){echo's';}; echo'&nbsp; <b>x</b>&nbsp; &nbsp;'.$cnot.' '.floor($rowckp1['rate']).'  &nbsp; = &nbsp; <b>'.$cnot.' '.floor($rowckp1['rate'])*$rowckp1['qty'].'</b>  &nbsp; </small></small>';
	  echo'</div>';
	  }
	  echo'</td>
      <td class="p-5"><strong>'.$cnot.' '.floor(($crate*$total_net)).'</strong></td>
      <td class="p-5">';
      if($rowup['deliver']==1){echo'Delivered';}
	  else{
		  if($rowup['dispatch']==1){
		    echo'On-Delivery';
		  }
		  else{
			  echo'New Order';
		  }
	  }

	  echo'</td>
	  <td class="p-5">';
      if($rowup['mode']==1){echo'Cash-On-Delivery';}
      if($rowup['mode']==2){echo'Khalti';}
      if($rowup['mode']==3){echo'Esewa';}
	  echo'</td>
      <td class="p-5 no-print">
	  <a href="bill/'.$rowup['cb_id'].'" target="_blank"><button class="button is-primary is-light"><i class="fas fa-file-alt"></i> &nbsp; View / Print </button>
	  </a></td>
      </tr>
	  ';  
		$sn++;  
	  }
  
  
  
  
  
  ?>
  
  
    
	
  </tbody>
</table>



</body>
	
	
</html>
<?php }?>