<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <base href="../"/>
      <?php 
	 // $catname=get_url($_GET['stitle']);
      
	  $sqlslt = "Select * from `whitefeat_wf_new`.`info` where info_type='".$_GET['stitle']."'"; 
      $displayslt=mysqli_query($con,$sqlslt);
	  $countslt=mysqli_num_rows($displayslt);
	  if($countslt>0){}
	  
	  $rowslt=mysqli_fetch_array($displayslt);
	  ?>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>White Feathers || <?php echo $rowslt['info_type']; ?></title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/css.css">
</head>

<body style="letter-spacing:0.02em;">
<?php include('header.php'); ?>
<br>
<div class="container mt-4" style="min-height:50VH; margin-top:5rem; padding:30px;">
 <?php /* gold exchange program section start */ ?>
 <?php if ($rowslt['info_type'] === "exchange") { ?>
	 <div class="columns p-3" style="padding-top:0;margin-top:2em;">
		 <div class="column" style="padding-left:5%; padding-top:2%;">
			 <img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/ba1.png">
		 </div>
		 <div class="column letter-spacing pb-6" style="padding-top:5%;">
			 <h1 class="title" style="font-size:1.7rem;">
				 Gold Exchange Program!</h1> <br>
			 - Exchange your old gold for new gorgeous jewellery at any whitefeather's store.<br><br>
			 - Repolishing & Repair (FREE), Appointment with Jewellery Designer
 
			 <br>
			 <br>
 
			 <small>
				 Please note: The old gold doesn’t have to be from only whitefeather's, it can be any gold jewellery you
				 have.
			 </small>
			 <br><br><br><br>
 
			 <!-- <a href="post/exchange"><button class="button is-info is-light p-5 is-rounded"
					 style="width:50%; border:1px solid #ddd;">Know More</button></a> -->
 
		 </div>
	 </div>
 <?php }else{?>
	<p class="has-text-dark"><?php  echo $rowslt['info_text']; ?></p>
	<?php } ?>
<?php /* gold exchange program section start */ ?>
 <?php if ($rowslt['info_type'] === "goldrate") { ?>
	<div class="gold-rate-container">
		<iframe scrolling='no' style="overflow:hidden;" height="100%" width="100%" src="https://rat32.com/nepali-calendar/addons/gold-silver-rate.php"></iframe>
	</div>
 <?php } ?>
</div>
<?php include('footer.php'); ?>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/owl/owl.carousel.min.js"></script>
<?php include('js.php'); ?>
</body>
</html>
<?php 
}?>