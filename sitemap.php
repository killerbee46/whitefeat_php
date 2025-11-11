<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Sitemap || White Feather's Jewellery</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/css.css">
</head>

<body style="letter-spacing:0.02em;">
  	<div id="loader" class="center">
	</div>  
<?php include('header.php'); ?>

<div class="container">

 
    <div class="container" style="padding:5%;">


<div class="columns is-multiline">




<?php 

      $sqlsm = "Select * from `whitefeat_wf_new`.`menu2` where visible='1' order by m_id ASC"; 
      $displaysm=mysqli_query($con,$sqlsm);
	  while($rowsm=mysqli_fetch_array($displaysm))
	  {

     echo'<div class="column is-3" style="padding:1%;" >
	   
<div class="card">
  <header class="card-header has-background-grey-light">
    <p class="card-header-title">
      '.$rowsm['m_name'].'
    </p>
   
  </header>
  <div class="card-content">
    <div class="content">';
	
	  $sqlsm2 = "Select * from `whitefeat_wf_new`.`title_menu` where m_id='".$rowsm['m_id']."' order by tm_id ASC"; 
      $displaysm2=mysqli_query($con,$sqlsm2);
	  while($rowsm2=mysqli_fetch_array($displaysm2))
	  {
	
	     $sqlsm3 = "Select * from `whitefeat_wf_new`.`package_category` where cat_id='".$rowsm2['cat_id']."'"; 
         $displaysm3=mysqli_query($con,$sqlsm3);
	     $rowsm3=mysqli_fetch_array($displaysm3);
	  
	    
	     echo'<li><a href="products/'.make_url($rowsm3['cat_name']).'">'.$rowsm3['cat_name'].'</a></li>';
	    
	  }
	
	echo'
    </div>
  </div>
</div>

	   
	   
	   
	 </div>';
	 
	  }
	 
	 
	 ?>
	 
	 
	 
	 
	 
	 
</div>

	 </div>


</div>







<br>
<?php include('footer.php'); ?>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/owl/owl.carousel.min.js"></script>
<?php include('js.php'); ?>

</body>




</html>
<?php }?>