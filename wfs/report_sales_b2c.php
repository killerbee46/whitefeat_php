<!DOCTYPE html>
<html dir="ltr" lang="en-US" >
  <head>
    <meta charset="UTF-8">
    <title>WF || Online</title>
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
<script src="dist/js/demo.js"></script>
<script src="dist/js/app.js"></script>
<script src="dist/js/alert.js"></script>	
	<style>@media print{
		 .no-print, .no-print *
    {
        display: none !important;
    }
		a[href]:after{content:none!important;} #del_book{display:none!important;} #sign{position:absolute; margin-top:10px!important;} #print_butt{display:none!important;} #main{overflow:hidden!important}
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
<body style="background-color:#fff;">

<div class="container-fluid" style="background-color:#FFF; padding-top:0; padding-bottom:0; letter-spacing:1px;" id="main">
 <div class="row">
 <h4 class="col p-2" style="background-color:#ddd;">B2C Sales Report , <small><small><i><b><code> <?php echo $_GET['start'].' to '.$_GET['end'] ?></code></b></i> - Pay Method | &nbsp;<?php
if($_GET['paym']=='0'){echo'All';}
if($_GET['paym']=='1'){echo'Cash-On-Delivery <small>( qr/ card ) </small>';}
if($_GET['paym']=='2'){echo'Khalti';}
if($_GET['paym']=='2'){echo'Esewa';}
 ?></small></small> &nbsp;  &nbsp;  &nbsp;  
 

 
 <small style="float:right; font-size:15px;letter-spacing:0.5px;">  <small> Print Date: <?php echo '20'.date("y-m-d");?></small>&nbsp;&nbsp; <button id="print_butt" style="background-color:#;" class="btn btn-info" onclick="myFunction()">PRINT <i class="fa fa-print"></i></button> </small>
 </h4>
 </div>
 <hr>
 <?php 
 include('db_connect.php');
 include('make_url.php');
                    $queryol=''; 
					
                    if($_GET['status']=='0'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_request='0' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  if($_GET['paym']=='1'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_request='0' and mode='1' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='2'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_request='0' and mode='2' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='3'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and c_request='0' and mode='3' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					}
					if($_GET['status']=='1'){
					  $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='0' and deliver='0' and c_request='0' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  if($_GET['paym']=='1'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='0' and deliver='0' and c_request='0' and mode='1' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='2'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='0' and deliver='0' and c_request='0' and mode='2' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='3'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='0' and deliver='0' and c_request='0' and mode='3' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }	
					}
					if($_GET['status']=='2'){
						$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='0' and c_request='0' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  if($_GET['paym']=='1'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='0' and c_request='0' and mode='1' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='2'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='0' and c_request='0' and mode='2' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='3'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='0' and c_request='0' and mode='3' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }	
					}
					if($_GET['status']=='3'){
						$queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='1' and c_request='0' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  if($_GET['paym']=='1'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='1' and c_request='0' and mode='1' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='2'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='1' and c_request='0' and mode='2' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					  if($_GET['paym']=='3'){
					   $queryol = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='1' and deliver='1' and c_request='0' and mode='3' and p_date >= '".$_GET['start']."' and p_date <= '".$_GET['end']."' "; 	
					  }
					}
			        
					
			        
                    $display_sn = mysqli_query($con,$queryol); 
					
					echo'<div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Date</th>
                      <th>Items</th>
                      <th>Amount</th>
					  <th class="no-print">Status</th>
                      <th>Paymet mode</th>
					  <th class="no-print">Invoice</th>
                    </tr>
                  </thead>
				  <tbody>
				  ';
				  $sn=1; $total=0; $total_net=0;
                    while($rowup = mysqli_fetch_array($display_sn)) 
			          {
				    $queryuc = "Select * from `whitefeat_wf_new`.`customer` where c_id='".$rowup['c_id']."'"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            $rowuc=mysqli_fetch_array($displayuc);
					     if($rowuc['b2b']==0)
						  { 
		echo'
	  <tr>
      <th class="pt-2 pb-0">'.$sn.'.<small># WFO-'.$rowup['cb_id'].'</small></th>
      <td class="pt-2 pb-0">'.$rowup['p_date'].'</td>
      <td class="pt-2 pb-0">'; 
	  
	  $sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='".$rowup['cur_id']."'"; 
      $displaycrc2=mysqli_query($con,$sqlcrc2);
	  $rowcrc2=mysqli_fetch_array($displaycrc2);
      $cnot=$rowcrc2['cur_name']; $crate=(1/$rowcrc2['cur_rate']);
	  
	  
	  
	  $sqlckp1 = "Select * from `whitefeat_wf_new`.`cart_detail` where cb_id='".$rowup['cb_id']."'"; 
      $displayckp1=mysqli_query($con,$sqlckp1); $total_ind=0;
	  while($rowckp1=mysqli_fetch_array($displayckp1))
	  {
		  $total_net=$total_net+($rowckp1['rate']*$rowckp1['qty']);  
		  echo'<div class="columns mb-5">';
	  echo'<small><small>'; 
	  $sqlckp2 = "Select s_path from `whitefeat_wf_new`.`package_slider` where id_pack='".$rowckp1['id_pack']."' limit 1"; 
      $displayckp2=mysqli_query($con,$sqlckp2);
	  $rowckp2=mysqli_fetch_array($displayckp2);
	  
	  //echo'<img src="../assets/images/product/thumb/'.$rowckp2['s_path'].'" style="height:5em;"> <span><a href="'.make_url($rowckp1['p_name']).'" target="_blank" class="button is-small no-print">&nbsp; &nbsp; <i class="fas fa-eye"></i> &nbsp; View Product</a></span>';
	  
	  echo'&diams; '.ucfirst($rowckp1['p_name']).' - '.$rowckp1['qty'].'&nbsp;Unit';if($rowckp1['qty']>1){echo's';}; echo'&nbsp; <b>x</b>&nbsp; &nbsp;Rs '.floor($rowckp1['rate']).'  &nbsp; = &nbsp; <b>Rs '.floor($rowckp1['rate'])*$rowckp1['qty'].'</b>  &nbsp; </small></small>';
	  if($rowckp1['size']>0){echo'&nbsp; <small><small><small>(Size): </small></small> <small><b>'.$rowckp1['size'].'</b></small></small>';}
	  echo'</div>';
	  $total_ind=$total_ind+floor($rowckp1['rate'])*$rowckp1['qty'];
	  }
	  echo'</td>
      <td class="pt-2 pb-0"><strong>Rs '.$total_ind.'</strong></td>
      <td class="pt-2 pb-0 no-print">';
	   
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
	  <td class="pt-2 pb-0">';
      if($rowup['mode']==1){echo'Cash-On-Delivery';}
      if($rowup['mode']==2){echo'Khalti';}
      if($rowup['mode']==3){echo'Esewa';}
	  echo'</td>
      <td class="pt-2 pb-0 no-print">
	  <a href="../bill/'.$rowup['cb_id'].'" target="_blank"><button class="button is-primary is-light"><i class="fas fa-file-alt"></i> &nbsp; View / Print </button>
	  </a></td>
      </tr>
	  ';  
		$sn++; 
		
					  }
					  }
					  echo'
                   <tr>
				   <th colspan=3>TOTAL COLLECTION</th>
				   <th colspan=3>Rs '.$total_net.'</th>
				   </tr>
  
  
					  </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>';
					  ?>



  </div>
</body>
</html>