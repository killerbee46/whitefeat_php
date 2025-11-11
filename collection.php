<?php { $customer='0'; $cookid='0'; include 'db_connect.php'; include 'ajax_cookie.php'; include_once('make_url.php'); include_once('get_url.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="../"/>
<?php

      $catname=get_url($_GET['stitle']);
      $sqlslt = "Select * from `whitefeat_wf_new`.`package_collection` where pc_name='".$catname."'"; 
      $displayslt=mysqli_query($con,$sqlslt);
	  $countslt=mysqli_num_rows($displayslt);
	  if($countslt>0){}
	  $rowslt=mysqli_fetch_array($displayslt);


 ?>
 <meta http-equiv="Cache-control" content="public">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>WhiteFeathers Jewellery || <?php echo $_GET['stitle']; ?></title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/css.css">
 <style>.video-foreground,
.video-background iframe {  pointer-events:auto; }</style>
</head>

<body style="letter-spacing:0.02em;">
    	<div id="loader" class="center">
	</div>
<?php include('header.php'); ?>






<?php 



if($rowslt['pc_vid']!=''){

echo'<div class="container p-0 is-fluid" style="margin-top:2em;">
<div class="video-background" style="height:450px;">
    
	<div class="video-foreground">
	  
	  <div style="position:relative;padding-top:56.25%;">
    <iframe src="https://www.youtube.com/embed/'.$rowslt['pc_vid'].'?autoplay=0&mute=1&controls=0&showinfo=0&rel=0&loop=1&playlist='.$rowslt['pc_vid'].'&amp;start=8" frameborder="0" allowfullscreen
      style="position:absolute;top:-25%;left:0;width:100%;height:100%;"></iframe>
      </div>
	  

	  
	  </div>
	  
    </div>
  </div>
<iframe src="https://www.youtube.com/embed/'.$rowslt['pc_vid'].'?autoplay=1&mute=1&controls=1&showinfo=0&rel=0&loop=1&playlist='.$rowslt['pc_vid'].'&amp;start=8" class="youtube-vid-mob" style="height:245px;width:100%; display:none;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
}


else
{
	echo'<div class="container p-0 is-fluid" style="margin-top:2em;">
	 <img src="assets/images/collection/'.$rowslt['pc_image'].'" style="height:450px; width:100%; object-fit:cover;"/>
	</div>
	
	';
	
}


?>




<div class="container is-fluid" style="margin-top:<?php if($rowslt['pc_vid']!=''){echo'-6.15em';} ?>; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">

<div class="columns p-2 ">
   <div class="column is-10 letter-spacing has-text-weight-light">
     <p>JEWELLERY <small><i class="fas fa-angle-right has-text-grey-light"></i></small> <?php echo $rowslt['pc_name'];?></p>
   </div>
   
   <div class="column has-text-right">

<div class="field ">
  <div class="control">
    <div class="select ">
      <select class="sort_filter">
        <option disabled selected>Sort By:</option>
		
        <option value="1">Latest</option>
        <option value="2">Price Low to High</option>
        <option value="3">Price High to low</option>
		<option value="4">Discounted Items</option>
      </select>
    </div>
  </div>
</div>

   
   </div>

</div>


</div>



<div class="container is-fluid">
<div class="columns p-2 ">
   <div class="column is-10 letter-spacing has-text-weight-normal is-size-7">
     <p><i class="fas fa-tags"></i>&nbsp;<span><?php
	 
	 
	 
      $sqlslt2 = "Select * from `whitefeat_wf_new`.`package_collection_link` where pc_id='".$rowslt['pc_id']."'"; 
      $displayslt2=mysqli_query($con,$sqlslt2);
	 

	 $countslt2=mysqli_num_rows($displayslt2);
      echo $countslt2;

	 ?></span> Designs</p>
	 
	 <?php 
	 if(isset($_GET['price'])){
	 echo '<span class="tag is-link">Price filer</span>';
	 }
	 
	 ?>
   </div>
   </div>
</div>


<div class="container is-fluid">
<div class="columns p-2 ">
   
   <div class="column is-3 has-text-weight-bold is-size-6 pb-4">
     <div class="box p-0 pt-3" style=" background-color:#F6F3F9; border-radius:10%;">
	  <h4 class="has-text-centered has-text-weight-normal m-0 p-0">Filter By</h4>
	  
	  
	 
	 
	 <div class="column has-background-white mt-4 ml-0 pl-5 has-text-weight-light aside-filter scroll-filter" style="">
	   
	   
	   
	   
	   <h4 class="is-size-4 mb-2">Price</h4>
	   
	   <div class="control mb-3 aside-filter scroll-filter" style="font-size:1.2em; height:20VH; overflow-y:scroll; ">
  <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-p1'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black"><small class="is-size-7 has-text-black">Less than</small> Rs 10,000 <small><small class="has-text-grey-light">(150)</small></small></span></small>
	</input>
	</a>
  </label>
  <br>
  <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-p2'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">Rs 10,000 - Rs 20,000 <small><small class="has-text-grey-light">(37)</small></small></small>
	</input>
	</a>
  </label>
  <br>
  <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-p3'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">Rs 20,000 - Rs 50,000 <small><small class="has-text-grey-light">(29)</small></small></small>
	</input>
	</a>
  </label>
  <br>
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-p4'; ?>"><input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">Rs 50,000 - Rs 100,000 <small><small class="has-text-grey-light">(15)</small></small></small>
	</input>
     </a>
  </label>
  <br>
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-p5'; ?>"><input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">Rs 100,000 - Rs 200,000 <small><small class="has-text-grey-light">(30)</small></small></small>
	</input></a>
  </label>
  <br>
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-p6'; ?>"><input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black"><small class="is-size-7">Over</small> Rs 200,000 <small><small class="has-text-grey-light">(10)</small></small></small>
	</input>
	</a>
  </label>
</div>
	   
	   
	   
	   
	   <hr>
	   
	   
	   <h4 class="is-size-4 mb-2">Weight</h4>
	   
	   <div class="control mb-3" style="font-size:1.2em;">
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-w1'; ?>">
	<input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black"><small class="is-size-7 has-text-black">Less than</small> 2gm <small><small class="has-text-grey-light">(150)</small></small></span></small>
	</input>

  </input>
  </a>
    </label>
	
	
  <br>
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-w2'; ?>">
	<input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">2gm - 5gm <small><small class="has-text-grey-light">(37)</small></small></small>
	</input>
  </a>
  </label>
  <br>
  
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-w3'; ?>">
	<input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">5gm - 10gm <small><small class="has-text-grey-light">(29)</small></small></small>
	</input>
  </a>
  </label>
  <br>
  
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-w4'; ?>">
	<input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black">10gm - 20gm <small><small class="has-text-grey-light">(50)</small></small></small>
	</input>
  </a>
  </label>
  <br>
  
  
  <label class="radio mb-2">
    <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-w5'; ?>">
	<input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black"><small>Above</small> 20gm <small><small class="has-text-grey-light">(50)</small></small></small>
	</input>
  </a>
  </label>
  
  
  
</div>
	   
	   
	      
	   
	   
	   
	   <hr>
	   
	   
	   <h4 class="is-size-4 mb-2">Material</h4>
	   
	   <div class="control mb-3" style="font-size:1.2em;">
  
  <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-m2'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black" style="padding-left:35px;"><img src="assets/images/icons/diamond.png" style="position:absolute; height:20px; margin-top:4px;margin-left:-30px;"/>Diamond <small><small class="has-text-grey-light">(37)</small></small></small>
	</input>
	</a>
  </label>
  <br>  <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-m3'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black" style="padding-left:35px;"> <img src="assets/images/icons/gold.png" style="position:absolute; height:20px; margin-top:4px;margin-left:-30px;"/>Gold <small><small class="has-text-grey-light">(37)</small></small></small>
	</input>
	</a>
  </label>
  <br> <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-m4'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black" style="padding-left:35px;"><img src="assets/images/icons/rhodium.png" style="position:absolute; height:20px; margin-top:4px;margin-left:-30px;"/>Rhodium <small><small class="has-text-grey-light">(37)</small></small></small>
	</input>
	</a>
  </label>
  <br>
  <label class="radio mb-2">
  <a href="collectionfilter/<?php echo $rowslt['pc_id'].'-m5'; ?>">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black" style="padding-left:35px;"><img src="assets/images/icons/silver.png" style="position:absolute; height:20px; margin-top:4px;margin-left:-30px;"/>Silver <small><small class="has-text-grey-light">(29)</small></small></small>
	</input>
	</a>
  </label>
  <br>
  
</div>
	   <br>
	   
	   
	   
	   <!--
	   <h4 class="is-size-4 mb-2">Product Type</h4>
	   
	   <div class="control mb-3" style="font-size:1.2em;">
  <label class="radio mb-2">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black"> Ring <small><small class="has-text-grey-light">(150)</small></small></span></small>
  </label>
  <br>
  <label class="radio mb-2">
    <input type="radio" name="answer">
    <small class="has-text-weight-light has-text-black"> Pendent <small class="has-text-grey-light">(37)</small></small>
  </label>
  
</div>

-->
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	 </div>
	 
	 
	 </div>
	 
   
   </div>
   
  
  
   <div class="column is-9 letter-spacing has-text-weight-normal is-size-7">
        <div class="columns is-multiline" style="">
		
		
		
		
		
		
		<?php 
		$sn=1;
		while($rowslt2=mysqli_fetch_array($displayslt2))
		{
			
			$sqlslt2fc = "Select * from `whitefeat_wf_new`.`package` where id_pack='".$rowslt2['id_pack']."'"; 
            $displayslt2fc=mysqli_query($con,$sqlslt2fc);
			$rowslt2fc=mysqli_fetch_array($displayslt2fc);
			
			$url=make_url($rowslt2fc['p_name']);
		echo'
			<div class="column is-4">
			   <div class="card card-cat" style="overflow:hidden;">
  <div class="card-image">
    <figure class="image">
      <a href="'.$url.'"><img src="assets/images/product/thumb/';
          $sqlpw2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='".$rowslt2fc['id_pack']."' limit 1"; 
          $displaypw2=mysqli_query($con,$sqlpw2);
	      $rowpw2=mysqli_fetch_array($displaypw2);
          echo $rowpw2['s_path'];
	  echo'" alt="Placeholder image" class="card-img-top" style="height:21.3em;"/></a>
    </figure>
  </div>
  <div class="card-content has-background-light">
    <div class="media mb-0">
      <div class="media-left">
        <!--<figure class="image is-48x48">
          <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
        </figure>-->
      </div>
     </div>
	  
	  
	  	<div class="columns p-2 wish-div">';
	       
      $sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='".$GLOBALS['cookid']."' and id_pack='".$rowslt2fc['id_pack']."' "; 
      $displaywl=mysqli_query($con,$sqlwl);
	  $countw=mysqli_num_rows($displaywl);
	  if($countw>0){
        echo'
  <a href="wishlist"><i class="fas fa-heart is-size-4" style="color:#3892C6; cursor:pointer;"></i></a>';		  
	  }
	  else{
  echo'<a href="#" title="Add to wishlist" class="add_wish_owl" data-id="'.$rowslt2fc['id_pack'].'"><i class="far fa-heart is-size-4" style="color:#3892C6; cursor:pointer;"></i></a>';		  
	  }



		
		
		echo'</div>
	  
	  
	
	<div class="columns p-2 tag-div">
	
	
	
	
	<div class="column p-0">';
	
      $sqltg = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='".$rowslt2fc['id_pack']."'"; 
      $displaytg=mysqli_query($con,$sqltg);
      $rowtg = mysqli_fetch_array($displaytg);
      
      $sqltg2 = "Select * from `whitefeat_wf_new`.`tags` where tag_id='".$rowtg['tag_id']."' and tag_type='0'"; 
      $displaytg2=mysqli_query($con,$sqltg2);
      $countg=mysqli_num_rows($displaytg2);
	  $rowtg2 = mysqli_fetch_array($displaytg2);
        
 if($countg>0)
 {         
        echo '
  <div class="tags has-addons m-1">
  <span class="tag is-light"><i class="fas fa-star has-text-dark" style="color:#;"></i></span>
  <span class="tag is-';
   if($rowtg2['tag_id']=='1'){echo'primary';}
   if($rowtg2['tag_id']=='2'){echo'warning';}
   if($rowtg2['tag_id']=='3'){echo'danger';}
   if($rowtg2['tag_id']>'3'){echo'info';}
  echo'">'.strtoupper($rowtg2['tag_name']).'</span>
</div>';

}
	
	echo'</div>   
    </div>
	
	
	
	  
	  <div class="media-content" style="margin-top:-1.5em;">
       <h3 class="is-size-5 has-text-weight-semibold" style="color:#333;">'; 
	   // currency 
      $sel_cur=1;  $cnot=''; $crate=1;
     if($GLOBALS['customer']!=0){
      $sqlcrc = "Select cur_id from `whitefeat_wf_new`.`customer` where c_id='".$GLOBALS['customer']."'"; 
      $displaycrc=mysqli_query($con,$sqlcrc);
	  $rowcrc=mysqli_fetch_array($displaycrc);
	  $sel_cur=$rowcrc['cur_id'];
	 }
	 else{
      $sqlcrc = "Select cookie_currency from `whitefeat_wf_new`.`cookie_status` where cookie_id='".$GLOBALS['cookid']."'"; 
      $displaycrc=mysqli_query($con,$sqlcrc);
	  $rowcrc=mysqli_fetch_array($displaycrc);
	  $sel_cur=$rowcrc['cookie_currency'];
	 }
	  $sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='".$sel_cur."'"; 
      $displaycrc2=mysqli_query($con,$sqlcrc2);
	  $rowcrc2=mysqli_fetch_array($displaycrc2);
      $cnot=$rowcrc2['cur_name']; $crate=(1/$rowcrc2['cur_rate']);
	  
	 $newprice=$rowslt2fc['price'];
	 if($rowslt2fc['offer']>0){
		 $newprice=($rowslt2fc['price']-(($rowslt2fc['offer']/100)*$rowslt2fc['price']));
	 } 
     echo $cnot.' '.floor(($crate*$newprice)); 

   echo'&nbsp;'; 
   if($rowslt2fc['offer']>0){
  echo'<del class="has-text-weight-normal is-size-5" style="opacity:0.5;"><small><small>'; 
  echo $cnot.round(($crate*$rowslt2fc['price']),2); 
  echo'</small></small></del>';
   }
   echo'</h3>
   <p class="subtitle is-6">'.ucfirst($rowslt2fc['p_name']).'</p>
      </div>
	  
	  
	  <div class="columns p-2 mt-2 pl-3">
	
	    <div class="column p-0">
<button class="button is-info is-outlined is-light appointment-button" data-target="modal-ter2'.$sn.'"><i class="fas fa-home"></i>Try at home</button>

<div class="modal" id="modal-ter2'.$sn.'">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head" style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
      <p class="modal-card-title"><i class="fas fa-house-user"></i> Home Appointment Form</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      
	  <h4 class="mb-2 has-background-light p-2"><i class="fas fa-tag has-text-info"></i> &nbsp;'.ucfirst($rowslt2fc['p_name']).'</h4>';
	  


	    if($GLOBALS['customer']==0){
	  echo'<div class="field">
  <label class="label">Name <span class="has-text-danger">*</span>
</label>
  <div class="control">
  <div class="control has-icons-left has-icons-right">
    <input class="input home_name" type="text" placeholder="Your Full Name">
	<span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
	</div>
  </div>
</div>

<div class="field">
  <label class="label">Full Address <span class="has-text-danger">*</span></label>
  <div class="control has-icons-left has-icons-right">
    <input class="input home_add" type="text" placeholder="Your Full Address" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-map-marker"></i>
    </span>
    
  </div>
</div>

<div class="field">
  <label class="label">Contact number <span class="has-text-danger">*</span></label>
  <div class="control has-icons-left has-icons-right">
    <input class="input home_phone" type="text" placeholder="+97798XXXXXXXX" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-mobile"></i>
    </span>
    
  </div>
</div>';

        }




echo'
<div class="field">
  <label class="label">Message <small class="is-size-7"></small></label>
  <div class="control">
    <textarea class="textarea home_msg" placeholder="Please Write Jewelleries you want to try..."></textarea>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
      
      <i class="fas fa-check-circle"></i> &nbsp;I agree to the <a href="post/terms" target="_blank">terms and conditions</a>
    </label>
  </div>
</div>


<div class="field is-grouped mt-2">
  <div class="control">
    <button class="button is-info send_home_appoint_product" data-ref="'.$rowslt2fc['id_pack'].'">Submit Form</button>
  </div>
  <!--
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>-->
</div>
	  
	  
	  
	  
    </section>
  </div>
</div>
    







</div>
		<div class="column p-0">
		<button class="button is-success is-light schedule-button" data-target="modal-ter"><i class="fas fa-video"></i>&nbsp;Live video call</button>
		
		<div class="modal" id="modal-ter">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head pl-2 pr-2" style="max-height:100px!important; margin-bottom:-20px; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
      <p class="modal-card-title">

<span class="is-size-4 has-text-weight-bold "> &nbsp; <i class="fas fa-video"></i>&nbsp; START A CALL&nbsp; </span>




	   </p>
	  
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      
	  <div class="columns">
	  
	    <div class="column is-6">
		  
		  
		  <figure class="image is-400x400">
  <img src="assets/images/qr-code.png" class="">
</figure>


<div class="p-0 has-background-light" style="border:0px dotted #eee; overflow:hidden;">



		<div class="columns p-0">
		  
		  
		  
		  <div class="column is-6 p-5 has-text-centered" style="background:rgba(72,199,142,0.2);">
		  <figure class="image pl-2 has-text-centered">
		  <img src="assets/images/whatsapp.png" style="height:auto; width:40%; min-height:40px;"/>
		  </figure>
		  Whatsapp 
		  </div>
		  


<div class="column is-6 p-5 " style="background:rgba(62,142,208,0.2);">
<figure class="image pl-2 has-text-centered">
<img src="assets/images/viber.png" style=" height:auto; margin-top:5px; width:40%;"/>
</figure>
&nbsp;&nbsp;Viber
</div>
		  
		  
       </div>
		


<div class="columns p-0 pb-2">
<div class="column is-3">&nbsp;</div>
<div class="column is-9">		  
<span class=" is-large is-secondary is-light is-fullwidth no-letter-spacing is-size-4" ><strong><small>SCAN ME</small></strong> &nbsp; 

		  </span>
		  </div>
</div>



	   
	   </div>
		  
		</div>
	    <div class="column is-6 pt-5">
		
		
		 <p class="is-size-7 letter-spacing" style="font-size:0.8em;">
		 <i class="fas fa-check-circle has-text-success"></i>&nbsp; Get on a live video call with our design consultants.<br>
		 <BR>
		 
          <i class="fas fa-check-circle has-text-success"></i>&nbsp; Live Available On <strong>Whatsapp, Viber & Messenger!</strong><br><br>
		 
		 <span class="has-text-weight-light ">
		 <i class="fas fa-check-circle has-text-success"></i>&nbsp; SUN - SAT &nbsp; 
		 ( 9am to 6pm )
		 <br>
		 <br>
		 <small><i class="fas fa-check-circle has-text-success"></i>&nbsp; OPENS 365 DAYS! &nbsp; 
		 <Strong><a href="#">Location map</a>
		 </strong>
		 </small>
		 </span>
		 
		 </p>
		
		</div>
	  
	  </div>
	  
    </section>
	<!--
    <footer class="modal-card-foot">
      <button class="button is-danger is-light modal-close-button">Cancel</button>
    </footer>-->
  </div>
</div>
	  
		
		
		</div>
	
	  </div>
	  

	
	

    
  
  
  
</div>
			</div>
			
			
		</div>';
		$sn++;
		}
	   
	   
	   ?>







	   
			
	   
   </div>
   
   
   </div>
  
  
  
  
  
  
</div>


   
   </div>


	<a href="#" id="sortfilter_trigger">

<?php include('footer.php'); ?>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/owl/owl.carousel.min.js"></script>
<?php include('js.php'); ?>
<script>
$('.sort_filter').change(function(){
	var target='s'+$(this).val();
	var result='collectionfilter/<?php echo $rowslt['cat_id']; ?>-'+target;
	$("#sortfilter_trigger").attr("href", result);
    $("#sortfilter_trigger")[0].click();
});
</script>

</body>




</html>

<?php } ?>