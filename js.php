<?php /* 
* Place for all scripts of the whole site
* Contain scripts for pages, called / included in multiple pages  
* Can be added custom script & modification as per requirement 
*/ ?>
<script>
      var style = document.createElement('style');
 style.type = "text/css";
 style.id = "antiClickjack";
 if ('cssText' in style)
   style.cssText = "body{display:none !important;}";
 else
   style.innerHTML = "body{display:none !important;}";

     if (self === top) {
         var antiClickjack = document.getElementById("antiClickjack");
         antiClickjack.parentNode.removeChild(antiClickjack);
     } else {
         top.location = self.location;
     }
/* Top header notificaiton scroll one after another start*/
var hnturn=1;
setInterval(function () {
	var nturn; if(hnturn=='1'){nturn=2;}else{nturn=1;}
	$('.head-notify[data-id="'+hnturn+'"]').slideUp();
	$('.head-notify[data-id="'+nturn+'"]').fadeIn(1200); hnturn=nturn;}, 2500);
/* Top header notificaiton scroll one after another start*/
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
	/* for mobile view nav bar button*/

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

document.querySelectorAll('.navbar-link').forEach(function(navbarLink){
	/* for mobile view menu & submenu navigation */
  navbarLink.addEventListener('click', function(){
    navbarLink.nextElementSibling.classList.toggle('is-hidden-mobile');
  })
});


if($(window).width()<767){
	/* for mobile view banners adjustments*/
	$("[data-banner2]").addClass('columns');
	$("[data-banner2]").addClass('p-3');
	$(".3div-banner").css({'overflowX': 'scroll'});
}
</script>
<script>

/* Carousel sliders start */
$(document).ready(function(){
	/* similar products carousel start (for product.php page) */
  $(".owl-smv").owlCarousel({
	dots:false,
	autoplay:false,
	loop:true,
	nav:true,
	navText: ["<i class='fas fa-chevron-circle-left' style='position:absolute; font-size:2em; margin-top:-250px; left:0.5%;'></i>", "<i class='fas fa-chevron-circle-right' style='position:absolute; font-size:2em; right:0.5%; margin-top:-250px;'></i>"],
    margin:10,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
	}
  }); 
 /* similar products carousel end (for product.php page) */
  
   /* products footer carousel start */
  $(".owl-one").owlCarousel({
	dots:false,
	autoplay:true,
	loop:true,
	nav:true,
	navText: ["<i class='fas fa-chevron-circle-left' style='position:absolute; font-size:2em; margin-top:-250px; left:0.5%;'></i>", "<i class='fas fa-chevron-circle-right' style='position:absolute; font-size:2em; right:0.5%; margin-top:-250px;'></i>"],
    margin:10,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
	}
  }); 
   /* products footer carousel end */
  
  /* testnomial carousel start */
  $(".owl-two").owlCarousel({
	loop:true,
    margin:1,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
	}
  });
    /* testnomial carousel end */


});

/* Carousel sliders end */

</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  /* Functions to open and close a modals present in website all pages handler start */
  function openModal($el) {
    $el.classList.add('is-active');
  }

  function closeModal($el) {
    $el.classList.remove('is-active');
  }

  function closeAllModals() {
    (document.querySelectorAll('.modal') || []).forEach(($modal) => {
      closeModal($modal);
    });
  }
 // Add a click event on buttons to open a specific modal here add class name
  (document.querySelectorAll('.custom-design,.flag-modal,.user-modal,.flag-modal2,.user-modal2,.full-search,.appointment-button,.track_order,.locate,.user_setting,.modal-smv,.tracking-order,.schedule-button,.user_setting_new,.sellgold') || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener('click', () => {
      openModal($target);
    });
  });
  
  
  
  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-close-button') || []).forEach(($close) => {
    const $target = $close.closest('.modal');
    $close.addEventListener('click', () => { 
      closeModal($target);
    });
  });
  
    // Add a keyboard event to close all modals
  document.addEventListener('keydown', (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) { // Escape key closes all modals
      closeAllModals();
    }
  });
    /* Functions to open and close a modals present in website all pages handler start */
});

</script>

<?php  /* tyyehead autocomplete search trigger and after actions start */?>

<script src="assets/js/typeahead.bundle.js"></script>

<script>
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var states = [
<?php 
include('db_connect.php');

$sql1ac = "Select * from `whitefeat_wf_new`.`package` where active='1' and status='1' ";
$displayac=mysqli_query($con,$sql1ac);
 $cca=mysqli_num_rows($displayac); $sn=0;
while($rowac = mysqli_fetch_array($displayac))
{echo"'".$rowac['p_name']."'"; if($sn<$cca-1){echo',';}
$sn++;
}

?>
];

/* for desktop view search bar & effect start */
$('#the-basics2 .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
}).on('typeahead:selected', function() {
    // on selected
	var result=$(this).val();
	result=result.replace(/\s/g, "-");
	$("#autocomplete_trigger").attr("href", result);
			 $("#autocomplete_trigger")[0].click();
});
/* for desktop view search bar & effect end */

/* for mobile view search bar & effect start */
$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
}).on('typeahead:selected', function() {
    // on selected
	var result=$(this).val();
	result=result.replace(/\s/g, "-");
	$("#autocomplete_trigger").attr("href", result);
			 $("#autocomplete_trigger")[0].click();
});
/* for mobile view search bar & effect start */

/* on click search effect both desktop + mobile view */
$('.is-search-button').click(function(){
	var aval=$('#auto-com-val').val();
	var result="search.php?term="+aval;
	$("#autocomplete_trigger").attr("href", result);
	$("#autocomplete_trigger")[0].click();
});

</script>
<?php  /* tyyehead autocomplete search trigger and after actions end */?>



<script>
/* change currency button desktop view action */
$('input[type=radio][name="flag"]').change(function () {   
    var vv=$(this).val();
	$.ajax({url: "changecurrency.php?val="+vv,type: 'GET',cache: false,
			success: function(){
			location.reload(true);}
			});
});
/* change currency button mobile view action */
$('input[type=radio][name="flag1"]').change(function () {   
    var vv=$(this).val();
	$.ajax({url: "changecurrency.php?val="+vv,type: 'GET',cache: false,
			success: function(){
			location.reload(true);}
			});
});
</script>

<script>
/* customer login button action, checking database via ajax call start */
$('.checkU').click(function(){
	if(($('.exampleFormControlInputPhone').val()!='') && ($('.exampleFormControlInputPass').val()!='')){
   $('.errorLogin').hide(); var ccheck=$(this).attr("data-checkout");
            $.ajax({url: "clogin/"+$('.exampleFormControlInputPhone').val()+"-"+$('.exampleFormControlInputPass').val(),cache: false,
			success: function(result){	
                 result=result.trim();
                     if(result!='0'){
		     if(typeof ccheck === "undefined"){
			 /* can be used to navigate user to dashboard $("#autocomplete_trigger").attr("href", 'customer');$("#autocomplete_trigger")[0].click();*/
			 location.reload(true);
			 }
			 else{
	const uarr = result.split("-");
	$('.user-name').html(uarr[0]);$('.user-phone').html(uarr[1]);$('.del-name').val(uarr[0]);$('.del-location').val(uarr[2]);$('.del-phone').val(uarr[1]);
	$('.logsign').hide();$('.delivery-info').fadeIn(500);
			 }
			 
			 }
                     else
					 {
						 $('.flogin').append('<div class="col-md-12 errorLogin"><small><h4 style="color:red"><strong style="color:red">INVALID LOGIN DETAILS</strong></h4></small><br></div>');
					 }					 
					}});
					
	}	
					
});
/* customer login button action, checking database via ajax call end */

/* Forgot your password? button action start */
$('.noPass').click(function(){
   $('.flogin').hide();
   $('.signup-div').hide();
   $('.login-div').hide();
   $('.errorLogin').hide();
   $('.fpass1').show();
   $(this).hide();
});
/* Forgot your password? button action end */


/*forgot password sendotp button action start*/
var cphone;
$('.checkEmail').click(function(){
   $.ajax({url: "cemail/"+$('.exampleFormControlInputPhone2').val(),cache: false,
			success: function(result){ 
			//alert(result);
             var res = result.split("-");				
			 if(res[0]!='3'){
				 $('.error_number').remove();
				 $('.fpass1').hide(); $('.fpassOtp').show();
				 
				 
						result=result.trim();
						var rdata=result.split('-');
					var sms="https://api.sparrowsms.com/v2/sms/?from=InfoAlert&to="+$('.exampleFormControlInputPhone2').val()+"&text=WhiteFeather LOGIN - OTP: "+rdata[1]+"&token="+rdata[0];
					new Image().src = sms;
				 
				 
				 setTimeout(function(){
					 $('.resend_otp').html('');
				     $('.resend_otp').html('<button id="rsend_otp" class="button is-light is-link is-small rsend_otp">Resend Code</button>');
				 }, 50000);
                 	 
			 }
			 if(res[0]==='3'){
				 $('.error_number').remove();
				 $('.forgot_phone').append('<span class="error_number"><br><strong style="color:red">Number not registered!</strong></span>');
				 
			 }
			}
			});
			cphone=$('.exampleFormControlInputPhone2').val();
});
/*forgot password sendotp button action end*/

/* re-send otp button action start (this is created dynamically from forgot password sendotp button action script above in this page )*/
$(document).on('click','.rsend_otp', function(){
	$.ajax({url: "cemail/"+cphone,cache: false,
			success: function(result){
				alert('Code Resent');
					 $('.resend_otp').html('');
					 $('.resend_otp').html("<strong>Didn't get code? please wait...</strong>");
				setTimeout(function(){
				     $('.resend_otp').html('<button id="rsend_otp" class="button is-light is-link is-small rsend_otp">Resend Code</button>');
				 }, 50000);
			}
			});
	
});

/* re-send otp button action end (this is created dynamically from forgot password sendotp button action script above in this page )*/


/* signup SEND OTP BUTTON action start */
var cphoneSignup=0;
$(document).on('click','.signupOtp', function(){
	cphoneSignup=$('#signUpnew').val();
	$.ajax({url: "signup/"+$('.signUpnew').val(),cache: false,
			success: function(result){
				
				
				if(result==0){
					 alert('Number Already Registered, Please try forgot password instead');
				}
				else{
					    $('.login-main-div').hide();
                        $('.signup-div-inner').hide();
                        $('.fpassOtpSignup').show(); 
						
						result=result.trim();
						var rdata=result.split('-');
					var sms="https://api.sparrowsms.com/v2/sms/?from=InfoAlert&to="+cphoneSignup+"&text=WhiteFeather LOGIN - OTP: "+rdata[1]+"&token="+rdata[0];
					fetch(sms);
				
				 setTimeout(function(){
					 $('.resend_otpSignup').html('');
				     $('.resend_otpSignup').html('<button id="rsend_otpSignup" class="button is-light is-link is-small rsend_otpSignup">Resend Code</button>');
				 }, 20000);
                        
				        
					 
				}
				
				
			}
			});
	
});
/* signup SEND OTP BUTTON action end */

/* Signup re-send otp button action start (this is created dynamically from forgot password sendotp button action script above in this page )*/
$(document).on('click','.rsend_otpSignup', function(){
	$.ajax({url: "cemail/"+cphoneSignup,cache: false,
			success: function(result){
				alert('Code Resent');
					 $('.resend_otpSignup').html('');
					 $('.resend_otpSignup').html("<strong>Didn't get code? please wait...</strong>");
				setTimeout(function(){
				     $('.resend_otpSignup').html('<button id="rsend_otpSignup" class="button is-light is-link is-small rsend_otpSignup">Resend Code</button>');
				 }, 20000);
			}
			});
	
});
/* Signup re-send otp button action end (this is created dynamically from forgot password sendotp button action script above in this page )*/


/* Signup Confirm OTP button action start*/
$('.confirmOtpSignup').click(function(){
	var ccheck=$(this).attr("data-checkout");
    $.ajax({url: "cotp/"+$('.otpnumSignup').val()+'-'+cphoneSignup,
	cache: false,
			success: function(result){
				
				
				
                 	if(result!=0){
						if(typeof ccheck === "undefined")
						{
            /*$("#autocomplete_trigger").attr("href", 'customer'); $("#autocomplete_trigger")[0].click(); */
			location.reload(true);
						}
						else{
							const uarr = result.split("-");
	$('.user-name').html(uarr[0]);$('.user-phone').html(uarr[1]);$('.del-name').val(uarr[0]);$('.del-location').val(uarr[2]);$('.del-phone').val(uarr[1]);
	$('.logsign').hide();$('.delivery-info').fadeIn(500);}
				
				
				}
				if(result==0){
					alert('Invalid OTP code! Try Again..');
				} 
					
					
				
			}
			});
});
/* Signup Confirm OTP button action end*/


/* Mobile View Signup Confirm OTP button action start */
$('.confirmOtp').click(function(){
	var ccheck=$(this).attr("data-checkout");
    $.ajax({url: "cotp/"+$('.otpnum').val()+'-'+cphone,
	cache: false,
			success: function(result){
				if(result!=0){
					if(typeof ccheck === "undefined"){	
             $("#autocomplete_trigger").attr("href", 'customer');
			 $("#autocomplete_trigger")[0].click();
				}
				else{
							const uarr = result.split("-");
	$('.user-name').html(uarr[0]);$('.user-phone').html(uarr[1]);$('.del-name').val(uarr[0]);$('.del-location').val(uarr[2]);$('.del-phone').val(uarr[1]);
	$('.logsign').hide();$('.delivery-info').fadeIn(500);
				}
				
				}
				if(result==0){
					alert('Invalid OTP code! Try Again..');
				}
			}
			});
});
/* Mobile View Signup Confirm OTP button action end */



if ($(window).width() < 767) {
	/* desktop view menu remove in mobile view */
   $('.d-nav').remove();
}

</script>


<script>
/* appoinment form action  from header start */
$('.send_home_appoint').click(function(){
var dataString = 'name='+$('.home_name').val()+'&add='+$('.home_add').val()+'&phone='+$('.home_phone').val()+'&msg='+$('.home_msg').val();
   $.ajax({url: "savehome",data: dataString, type: 'POST', cache: false,
			success: function(result){		
                     alert('Home Appointment Submitted successfuly..');
                     location.reload(true);					 
					}});
});
/* appoinment form action  from header end */


/* appoinment form action from product page start */
$('.send_home_appoint_product').click(function(){
var dataString = 'name='+$('.home_name').val()+'&add='+$('.home_add').val()+'&phone='+$('.home_phone').val()+'&msg='+$('.home_msg').val()+'&pid='+$(this).attr("data-ref");
   $.ajax({url: "savehome",data: dataString, type: 'POST', cache: false,
			success: function(result){		
                     alert('Home Apointmnet Submitted successfuly..');
                     location.reload(true);					 
					}});
});
/* appoinment form action from product page end */

</script>


<script>
/* shopping cart actions start*/
/*ADD TO CART button action from product page start*/
$('.add_cart').click(function(){
var dataString = 'size='+$('.size-select option:selected').val()+'&pid='+$(this).attr("data-ref");
   $.ajax({url: "savetocart",data: dataString, type: 'POST', cache: false,
			success: function(result){				
	         $("#autocomplete_trigger").attr("href", 'cart');
			 $("#autocomplete_trigger")[0].click();				 
					}});
});
/*ADD TO CART button action from product page start*/

/* Remove button action from checkout.php page start */
$('.del_checkout_item').click(function(){
var dataString = 'cartid='+$(this).attr("data-ref");
   $.ajax({url: "cartdel",data: dataString, type: 'POST', cache: false,
			success: function(result){	
                    location.reload(true);			
					}});
});
/* Remove button action from checkout.php page end */

/* Move to wishlist button action from checkout.php page start */
$('.move_checkout_item').click(function(){
var dataString = 'cartid='+$(this).attr("data-ref")+'&pid='+$(this).attr("data-ref2");
   $.ajax({url: "cartwish",data: dataString, type: 'POST', cache: false,
			success: function(result){	
			alert('Moved to Wishlist Successfully!');
                    location.reload(true);			
					}});
});
/* Move to wishlist button action from checkout.php page end */

/* Qty change select action from checkout.php page start */
$('.qty_sel_checkout').on('change', function() {
var optionSelected = $(this).find("option:selected");
var dataString ='qty='+optionSelected.val()+'&cartid='+$(this).attr("data-ref"); 
   $.ajax({url: "cartqty",data: dataString, type: 'POST', cache: false,
			success: function(result){	
                    location.reload(true);			
					}});
});
/* Qty change select action from checkout.php page end */

/* shopping cart actions end*/
</script>



<script>
/*Women & men button action from footer start*/
$('.for-men').click(function(){
$(this).removeClass('is-light');
$(this).removeClass('is-info');
$(this).addClass('is-info');
$('.for-women').addClass('is-light');
$('.for-women-div').hide();
$('.for-men-div').fadeIn();
});

$('.for-women').click(function(){
$(this).removeClass('is-light');
$(this).removeClass('is-info');
$(this).addClass('is-info');
$('.for-men').addClass('is-light');
$('.for-men-div').hide();
$('.for-women-div').fadeIn();
});
/*Women & men button action from footer end*/
</script>



<script>
/*subscribe button action from footer start*/
$(document).on('click','.subscribe', function(){
   if($('.subs_email').val()!=''){var dataString = 'subs='+$('.subs_email').val();
   $.ajax({url: "subscriber",
            data: dataString,
            type: 'POST',
            cache: false,
			success: function(result){
     					if(result==='1'){
						 alert('You are already in our subscriber list!');
					 }
                     else
					 {
						 alert('Congratulation! you have subscribred successfully!');
					 }	
                  					 
					}
		   });
}
});
/*subscribe button action from footer end*/
</script>


<script>
/*wishlist action start*/

/*add to wishlist from category / product page start*/
$('.add_wish_product').click(function(evt){
	evt.preventDefault();
 var idp=$(this).attr("data-id");
 var dataString = 'idp='+idp;
   $.ajax({url: "savewish",data: dataString, type: 'POST', cache: false,
			success: function(result){
                    			
                     alert('Added to Wishlist Successfully!');
					 location.reload(true);
					 
					}});
   
 });
/*add to wishlist from category / product page end*/


/*add to wishlist from footer OWL carousel start*/
$('.add_wish_owl').click(function(evt){
	evt.preventDefault();
 var idp=$(this).attr("data-id");
 $(this).append('<a href="wishlist" class="added_wishlist" style="color:crimson;position:absolute; top:2%; right: 4%; margin-top:0px; margin-left:0px;"><i class="fas fa-heart"></i></a>');
 
 var dataString = 'idp='+idp;
   $.ajax({url: "savewish",data: dataString, type: 'POST', cache: false,
			success: function(result){
                    			
                     alert('Added to Wishlist Successfully!');
					 location.reload(true);
					 
					}});
   
 });
/*add to wishlist from footer OWL carousel end*/

/*remove product from wishlist page start*/
$('.remove_wish').click(function(evt){
	evt.preventDefault();
 var idp=$(this).attr("data-id");
 var dataString = 'idp='+idp;
   $.ajax({url: "removewish",data: dataString, type: 'POST', cache: false,
			success: function(result){
                     location.reload(true);
					}});
   
 });
/*remove product from wishlist page end*/

/*wishlist action end*/
</script>


<script>
/*Customers actions start*/

/*Logout button action from customer dashboard start */
$('.sign-out').click(function(){
$.ajax({url: "signout",data: 'true_user', type: 'POST', cache: false,
			success: function(result){
                     location.reload(true);
					}});
});
/*Logout button action from customer dashboard end */


/*save details button action from customer dashboard (manage you profile section) start*/
$('.save_details').click(function(){
var dataString = 'name='+$('.user-name').val()+'&address='+$('.user-address').val()+'&phone='+$('.user-phone').val()+'&email='+$('.user-email').val();
   $.ajax({url: "saveudetail",data: dataString, type: 'POST', cache: false,
			success: function(result){		
                     alert('Updated Successfuly..');
                     location.reload(true);					 
					}});
});
/*save details button action from customer dashboard (manage you profile section) end*/

/*save password button action from customer dashboard (manage you profile section) start*/
$('.save_pass').click(function(){
	if($('.np1').val()===$('.np2').val()){
var dataString = 'pass='+$('.np1').val();
   $.ajax({url: "saveupdetail",data: dataString, type: 'POST', cache: false,
			success: function(result){		
                     alert('Password Updated Successfuly..');
                     location.reload(true);					 
					}});
					
	}else{alert("Passwords didn't match!");}
});
/*save password button action from customer dashboard (manage you profile section) start*/
/*Customers actions end*/
</script>




<script>
/* Google map initialize in map modal start*/
                function initialize() {
                var myLat=new google.maps.LatLng(27.702816091744776, 85.3110757151328);
                var mapOptions = {
                zoom: 18,
                center: myLat
                };

              var map = new google.maps.Map(document.getElementById('mapCanvas'),
              mapOptions);
	        var marker = new google.maps.Marker({
             position: myLat,
              map: map,
             title: 'White Feathers Jewellery, Newroad Kathmandu '
  });
	  
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCQzMIuejPJXKoYbXWHbF9Yx6M_p-7o9O4' +
      '&signed_in=true&callback=initialize';
  document.body.appendChild(script);
  
}
$(document).ready(function(){
loadScript();
});
/* Google map initialize in map modal end*/
</script>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
/*
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a6372914b401e45400c4058/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();*/
</script>
<!--End of Tawk.to Script-->


<script>
/*for removing search bar & results while pressing escape key (desktop view) start */
$('#auto-com-val').keypress(function(event){
	
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
			var aval=$('#auto-com-val').val();
	var result="search.php?term="+aval;
	$("#autocomplete_trigger").attr("href", result);
	$("#autocomplete_trigger")[0].click();
	}

});
/*for removing search bar & results while pressing escape key (desktop view) end */
</script>