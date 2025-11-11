<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php');  include_once('cut_review.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Testinomial || White Feather's Jewellery</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/css.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
 <style>
 .beauty{font-family: 'Pacifico', serif;}
  </style>
</head>

<body style="letter-spacing:0.02em;">
    	<div id="loader" class="center">
	</div>
<?php include('header.php'); ?>

<div class="container">

 
    <div class="container">
     <div class="column card has-text-centered mt-4 main-div-testi" style="padding:5%; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
     <i class="fas fa-quote-left is-size-4 quotes" style="margin-left:-60%;"></i>
	 <h3 class="subtitle is-size-3 beauty">
	 <!--<i class="fas fa-smile-beam is-size-2"></i>-->
	 <img src="assets/images/extra/happy.png" style="height:4em; margin-left:-9em;">
	 <span style="margin-left:2em; position:absolute; margin-top:1.5em;">Happy Customers...</span></h3>
	 
	 <i class="fas fa-quote-right is-size-4 quotes" style=" position:absolute; right:20%; margin-top:-15%!important;"></i>
     </div>
	 
	 
	 <?php 
	 
	 
	  $sqlts = "Select * from `whitefeat_wf_new`.`testimonials` where t_vis='1' order by id_t DESC"; 
      $displayts=mysqli_query($con,$sqlts);
	  while($rowts=mysqli_fetch_array($displayts))
	  {
		   
		  
		  echo' <div class="column card has-text-centered mt-4" style="padding:5%; padding-top:3%; padding-bottom:3%;">
	     
		 <p></p>
		 
		 <p>'.strtoupper($rowts['name_t']).'</p>';
		 
		 for($i=1;$i<6;$i++){
             		 echo'<small><small><i class="fas fa-star has-text-danger"></i></small></small>&nbsp;';			 
		 }
		 
		 
		 echo'<br>
		 <img src="assets/images/testinomial/'.$rowts['i_path'].'"  style="height:20em; margin-top:1em; border-radius:20%;"/>
		 <br><br>
	      <p style="color:#916CFC; font-size:1.5rem; letter-spacing:1px;"><i>
		  '.$rowts['content_t'].'
		  </i></p>
	  
	 </div>';
		  
		  
	  }
		  ?>
	 
	 
	 
	 
	
	 
	 
	 
	 
	 
	 
	 
	 
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