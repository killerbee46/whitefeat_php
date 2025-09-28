<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>White Feather's Jewellery Collection</title>
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


<div class="container is-fluid mb-0 mt-0">
<h3 class="has-text-centered letter-spacing has-background-light p-3 is-size-5 letter-spacing" style="margin-top:3em; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);"><i class="fas fa-heart"></i> &nbsp; Beautiful collection from Whitefeathers jewellery!</h3>
</div>

<div class="container is-fluid  mt-5">


<div class="columns is-multiple ">
<?php 

      $sqlb1 = "Select * from `whitefeat_wf_new`.`package_collection`  ORDER BY pc_id  "; 
      $displayb1=mysqli_query($con,$sqlb1); $sn=1;
	  while($rowb1=mysqli_fetch_array($displayb1))
	  {
		  $url=make_url($rowb1['pc_name']);
		  echo'
		   <div class="column is-4 '; 
           if($sn==2){
			   //echo'has-text-centered top-div" style="margin-top:-3em;"';
		   }
		   echo'">
<div class="banner">
    <div class="banner__image-container">
        <a href="collection/'.$url;
		
        

		echo '"><img class="banner__image" src="assets/images/collection/'.$rowb1['pc_image'].'"/></a>
    </div>
</div>';

if($sn==2){
//echo'<br><a href="jewellerycollection"><button class="button is-info is-light">View All Collections</button></a>';
}

echo'</div>
		  
		  ';
		  $sn++;
		  
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


<?php } ?>