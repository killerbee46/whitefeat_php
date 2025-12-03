/*\
|*| ========================================================================
|*| Bootstrap Toggle: bootstrap4-toggle.js v3.6.1
|*| https://gitbrent.github.io/bootstrap4-toggle/
|*| ========================================================================
|*| Copyright 2018-2019 Brent Ely
|*| Licensed under MIT
|*| ========================================================================
\*/
!function(a){"use strict";function l(t,e){this.$element=a(t),this.options=a.extend({},this.defaults(),e),this.render()}l.VERSION="3.6.0",l.DEFAULTS={on:"On",off:"Off",onstyle:"primary",offstyle:"light",size:"normal",style:"",width:null,height:null},l.prototype.defaults=function(){return{on:this.$element.attr("data-on")||l.DEFAULTS.on,off:this.$element.attr("data-off")||l.DEFAULTS.off,onstyle:this.$element.attr("data-onstyle")||l.DEFAULTS.onstyle,offstyle:this.$element.attr("data-offstyle")||l.DEFAULTS.offstyle,size:this.$element.attr("data-size")||l.DEFAULTS.size,style:this.$element.attr("data-style")||l.DEFAULTS.style,width:this.$element.attr("data-width")||l.DEFAULTS.width,height:this.$element.attr("data-height")||l.DEFAULTS.height}},l.prototype.render=function(){this._onstyle="btn-"+this.options.onstyle,this._offstyle="btn-"+this.options.offstyle;var t="large"===this.options.size||"lg"===this.options.size?"btn-lg":"small"===this.options.size||"sm"===this.options.size?"btn-sm":"mini"===this.options.size||"xs"===this.options.size?"btn-xs":"",e=a('<label for="'+this.$element.prop("id")+'" class="btn">').html(this.options.on).addClass(this._onstyle+" "+t),s=a('<label for="'+this.$element.prop("id")+'" class="btn">').html(this.options.off).addClass(this._offstyle+" "+t),o=a('<span class="toggle-handle btn btn-light">').addClass(t),i=a('<div class="toggle-group">').append(e,s,o),l=a('<div class="toggle btn" data-toggle="toggle" role="button">').addClass(this.$element.prop("checked")?this._onstyle:this._offstyle+" off").addClass(t).addClass(this.options.style);this.$element.wrap(l),a.extend(this,{$toggle:this.$element.parent(),$toggleOn:e,$toggleOff:s,$toggleGroup:i}),this.$toggle.append(i);var n=this.options.width||Math.max(e.outerWidth(),s.outerWidth())+o.outerWidth()/2,h=this.options.height||Math.max(e.outerHeight(),s.outerHeight());e.addClass("toggle-on"),s.addClass("toggle-off"),this.$toggle.css({width:n,height:h}),this.options.height&&(e.css("line-height",e.height()+"px"),s.css("line-height",s.height()+"px")),this.update(!0),this.trigger(!0)},l.prototype.toggle=function(){this.$element.prop("checked")?this.off():this.on()},l.prototype.on=function(t){if(this.$element.prop("disabled"))return!1;this.$toggle.removeClass(this._offstyle+" off").addClass(this._onstyle),this.$element.prop("checked",!0),t||this.trigger()},l.prototype.off=function(t){if(this.$element.prop("disabled"))return!1;this.$toggle.removeClass(this._onstyle).addClass(this._offstyle+" off"),this.$element.prop("checked",!1),t||this.trigger()},l.prototype.enable=function(){this.$toggle.removeClass("disabled"),this.$toggle.removeAttr("disabled"),this.$element.prop("disabled",!1)},l.prototype.disable=function(){this.$toggle.addClass("disabled"),this.$toggle.attr("disabled","disabled"),this.$element.prop("disabled",!0)},l.prototype.update=function(t){this.$element.prop("disabled")?this.disable():this.enable(),this.$element.prop("checked")?this.on(t):this.off(t)},l.prototype.trigger=function(t){this.$element.off("change.bs.toggle"),t||this.$element.change(),this.$element.on("change.bs.toggle",a.proxy(function(){this.update()},this))},l.prototype.destroy=function(){this.$element.off("change.bs.toggle"),this.$toggleGroup.remove(),this.$element.removeData("bs.toggle"),this.$element.unwrap()};var t=a.fn.bootstrapToggle;a.fn.bootstrapToggle=function(o){var i=Array.prototype.slice.call(arguments,1)[0];return this.each(function(){var t=a(this),e=t.data("bs.toggle"),s="object"==typeof o&&o;e||t.data("bs.toggle",e=new l(this,s)),"string"==typeof o&&e[o]&&"boolean"==typeof i?e[o](i):"string"==typeof o&&e[o]&&e[o]()})},a.fn.bootstrapToggle.Constructor=l,a.fn.toggle.noConflict=function(){return a.fn.bootstrapToggle=t,this},a(function(){a("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle()}),a(document).on("click.bs.toggle","div[data-toggle^=toggle]",function(t){a(this).find("input[type=checkbox]").bootstrapToggle("toggle"),t.preventDefault()})}(jQuery);
//# sourceMappingURL=bootstrap4-toggle.min.js.map

  $('.lights').click(function(){

       if($('#toggle-light').prop('checked')==true){ 
	   $('body').removeClass('dark-mode');
	   	  $('#navmenu').removeClass('main-header navbar navbar-expand navbar-dark navbar-light');
		  $('#navmenu').addClass('main-header navbar navbar-expand navbar-white navbar-light');
	   }
       else{
		  $('body').addClass('dark-mode');
		  $('#navmenu').removeClass('main-header navbar navbar-expand navbar-white navbar-light');
		  $('#navmenu').addClass('main-header navbar navbar-expand navbar-dark navbar-light');
	   }


  });
  
    $(document).on('click', '.order_report', function () { 
          		$('.app_area').load('ajax_report_order.php');
	});	
  
  
    $(document).on('click', '.order_report_b2b', function () { 
          		$('.app_area').load('ajax_report_order_b2b.php');
	});	
  
  
      
  $(document).on('click', '.view_report_sales_table', function () {
		  var pm=$('#ps_status_order option:selected').val();
		  var pm2=$('#ps_pay option:selected').val();
          		var snd='report_order_b2c.php?start='+$('#start_date_sales_table').val()+'&end='+$('#end_date_sales_table').val()+'&status='+pm+'&paym='+pm2;
				$('#r_print').attr("href",snd); $('#r_print')[0].click();
	});	
  
       
  $(document).on('click', '.view_report_sales_table_2', function () {
	  var pm=$('#ps_status_order_2 option:selected').val();
		  var pm2=$('#ps_pay_2 option:selected').val();
          		var snd='report_sales_b2c.php?start='+$('#start_date_sales_table_2').val()+'&end='+$('#end_date_sales_table_2').val()+'&status='+pm+'&paym='+pm2;
				$('#r_print').attr("href",snd); $('#r_print')[0].click();
	});	
   
       
  $(document).on('click', '.view_report_sales_table_3', function () {
	      var vm=$('#ps_vendor option:selected').val();
		  var pm=$('#ps_status_order option:selected').val();
		  var pm2=$('#ps_pay option:selected').val();
          		var snd='report_order_b2b.php?start='+$('#start_date_sales_table').val()+'&end='+$('#end_date_sales_table').val()+'&status='+pm+'&paym='+pm2+'&vm='+vm;
				$('#r_print').attr("href",snd); $('#r_print')[0].click();
	});	
  
  
         
  $(document).on('click', '.view_report_sales_table_4', function () {
	   var vm=$('#ps_vendor_2 option:selected').val();
	   var pm=$('#ps_status_order_2 option:selected').val();
		  var pm2=$('#ps_pay_2 option:selected').val(); 
          		var snd='report_sales_b2b.php?start='+$('#start_date_sales_table_2').val()+'&end='+$('#end_date_sales_table_2').val()+'&status='+pm+'&paym='+pm2+'&vm='+vm;
				$('#r_print').attr("href",snd); $('#r_print')[0].click();
	});	
   
  
  
       $('.open_table').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_table.php');
	});
	
       $('.open_social').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_social.php');
	});
	
      //open user page
       $('.open_users').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_users.php');
	});
	
	//open subscriber page
       $('.open_subs').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_subs.php');
	});
    
	// open price & currency converter
       $('.open_converter').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_converter.php');
	});
    
	$('.open_slider').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_slider.php');
	});
	
	  $('.open_alert').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_alert.php');
	});
	
	  $('.open_menu').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_menu.php');
	});
	
       $('.open_banner').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_banner.php');
	});
	
       $('.open_review').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_review.php');
	});
	
	// open content page
       $('.open_content').click(function(){
	$('.app_area').html('');$('.app_area').load('ajax_content.php');
	});
	
	
	/*menu item image save action*/
$(document).on('submit','.slider_save_2', function(evt){
evt.preventDefault();
var tmm3=$('#slider_input').val();
if(tmm3!='')
{
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'slider_save_2.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res){
		         swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Menu Added successfully!",  
		                           timer: 2000,  
		                            });
              $(".app_area").load("ajax_menu.php");  
    }
  });
  return false;  
}

else
{alert('Error data');}
});

/*changing menu item visibility */
$(document).on('click','.change_slider_vis_2', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var tmpp3=$(this).attr('data-status');
var dataString = 'i_id1='+tmpp2+'&v_id1='+tmpp3;
 $.ajax({
	 type: "POST",
     url: 'ajax_slider_vis_2.php',
     data: dataString,
	 cache: false,
     success: function (){
		       swal({  
		                            type: "success",
		                            title: "Menu Updated Successfully!", 
		                            timer: 2000,  
		                          });
		$(".app_area").load("ajax_menu.php");   
	

		 }
  });
  return false;
});


/*deleting menu items actions*/
$(document).on('click','.slider_del_2', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;
 $.ajax({
	 type: "POST",
     url: 'ajax_slider_del_2.php',
     data: dataString,
	 cache: false,
     success: function () {
		 		       swal({  
		                            type: "success",
		                            title: "Menu Deleted Successfully!", 
		                            timer: 2000,  
		                          });
			  		 $(".app_area").load("ajax_menu.php");  
                          }
  });
  return false;
});

/* menu edit save*/
$(document).on('submit','.slider_edit_save_2', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'slider_edit_save_2.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (result){
               swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Menu Updated successfully!",  
		                           timer: 2000,  
		                            }); 
             $(".app_area").load("ajax_menu.php"); 
    }
  });
  return false;  

});


/* Menu title add  action*/
$(document).on('submit','.add_title_menu', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'menu_add_title.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (result){
		        //alert(result);
				 swal({  
		                            type: "success",
		                            title: "Subcategory added Successfully!", 
		                            timer: 2000,  
		                          });
              	$(".app_area").load("ajax_menu.php"); 
    }
  });
  return false;  

});

	
	/*deleting menu title item actions*/
$(document).on('click','.menu_title_del', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
//var tmpp3=$(this).attr('data-id');
var dataString = 'i_id1='+tmpp2;
 $.ajax({
	 type: "POST",
     url: 'ajax_menu_title_del.php',
     data: dataString,
	 cache: false,
     success: function () {
			  		$(".app_area").load("ajax_menu.php"); 
                          }
  });
  return false;
});

// menu order for title 
$(document).on('click', '.or_title', function (evt) {
evt.preventDefault();
var tt=$(this).attr('data-id');
var ts='ajax_m_order_menu_title.php?fid='+tt;
$("#mo_fetch").load(ts);
$("#menu_order").fadeIn();
});
	
	/*dest and sub dest. Show hide*/
$(document).on('click','.edit_f_title', function(evt){
evt.preventDefault();
var add=$(this).attr("data-id");
var place='#ft_load';
place+=add;
$(place).slideDown();
});


$(document).on('click','.update_rate', function(){ 
var id=$(this).attr("data-id");
var nval=$('.value_rate[data-id="'+id+'"]').val();
var dataString = 'id='+id+'&val='+nval;
 $.ajax({
	 type: "POST",
     url: 'ajax_update_price.php',
     data: dataString,
	 cache: false,
     success: function (){
		 swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Rate updated successfully!",  
		                           timer: 2000,  
		                            });
		 $(".app_area").load("ajax_converter.php");  
		 }
  });
  return false;
	
});


$(document).on('click','.update_rate_currency', function(){ 
var id=$(this).attr("data-id");
var nval=$('.value_rate_cur[data-id="'+id+'"]').val();
var dataString = 'id='+id+'&val='+nval;
 $.ajax({
	 type: "POST",
     url: 'ajax_update_price_cur.php',
     data: dataString,
	 cache: false,
     success: function (){
		 swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Rate updated successfully!",  
		                           timer: 2000,  
		                            });
		 $(".app_area").load("ajax_converter.php");  
		 }
  });
  return false;
	
});
 

$(document).on('click','.sync_product_price', function(){ 
var dataString = 'id='+1;
 $.ajax({
	 type: "POST",
     url: 'ajax_update_pp.php',
     data: dataString,
	 cache: false,
     success: function (){
		 swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Prices updated successfully!",  
		                           timer: 2000,  
		                            });
		 $(".app_area").load("ajax_converter.php");  
		 }
  });
  return false;
	
});
 
 	/*changing Review visibility */
$(document).on('click','.change_review_vis', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var tmpp3=$(this).attr('data-status');
var dataString = 'i_id1='+tmpp2+'&v_id1='+tmpp3;
 $.ajax({
	 type: "POST",
     url: 'ajax_review_vis.php',
     data: dataString,
	 cache: false,
     success: function (){
		 $(".app_area").load("ajax_review.php");  
	

		 }
  });
  return false;
});
 
 
 /*changing Review visibility */
$(document).on('click','.make_b2b', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;

  swal({ 
   title: "Change to B2B?", 
   text: "Make sure you select right customer!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                   $.ajax({
	 type: "POST",
     url: 'ajax_make_b2b.php',
     data: dataString,
	 cache: false,
     success: function (){
		 
		 swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "B2B updated successfully!",  
		                           timer: 2000,  
		                            });
		 $(".app_area").load("ajax_users.php");  
	

		 }
  });
  return false;		   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 





});
  
 /* Removing b2b authority */
$(document).on('click','.remove_b2b', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;

  swal({ 
   title: "Remove from B2B?", 
   text: "Make sure you select right B2B Vendor!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                   $.ajax({
	 type: "POST",
     url: 'ajax_remove_b2b.php',
     data: dataString,
	 cache: false,
     success: function (){
		 
		 swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "B2B removed successfully!",  
		                           timer: 2000,  
		                            });
		 $(".app_area").load("ajax_users.php");  
	

		 }
  });
  return false;		   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 





});
   
 /* Removing subscriber */
$(document).on('click','.del_subs', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;

  swal({ 
   title: "Remove subscriber", 
   text: "Make sure you select right subscriber!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, delete!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                   $.ajax({
	 type: "POST",
     url: 'ajax_remove_subs.php',
     data: dataString,
	 cache: false,
     success: function (){
		 
		 swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Subcribers removed successfully!",  
		                           timer: 2000,  
		                            });
		 $(".app_area").load("ajax_subs.php");  
	

		 }
  });
  return false;		   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 





});
 
 /*deleting REVIEW action*/
$(document).on('click','.review_del', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;
 $.ajax({
	 type: "POST",
     url: 'ajax_review_del.php',
     data: dataString,
	 cache: false,
     success: function () {
			  		  $(".app_area").load("ajax_review.php");  
                          }
  });
  return false;
});
 
 
 	/* Review edit save*/
$(document).on('submit','.review_save_main', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
 $.ajax({
    url: 'ajax_review_save.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function () {
		                    swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "REVIEW Updated successfully!",  
		                           timer: 2000,  
		                            });
              $(".app_area").load("ajax_review.php"); 
		  
    }
  });
  return false; 
});

 
 
 
/*reviews title Show hide*/
$(document).on('click','.btn.btn-danger.ctits', function(evt){
evt.preventDefault();
var add=$(this).attr("data-id");
var place='#ft_load';
place+=add;
$(place).slideUp();
});

	/*slider image save action*/
$(document).on('submit','.slider_save', function(evt){
evt.preventDefault();
var tmm3=$('#slider_input').val();
if(tmm3!='')
{
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'slider_save.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res){
		//alert(res);
              $(".app_area").load("ajax_slider.php");
    }
  });
  return false;  
}

else
{alert('No Image selected!');}
});

	/*slider image save action*/
$(document).on('submit','.slider_save_alert', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'alert_save.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res){
              $(".app_area").load("ajax_alert.php");
    }
  });
  return false;  

});

	/*Slider Show hide*/
$(document).on('click','.sl_trigger', function(evt){
evt.preventDefault();
var add=$(this).attr("data-custom");
var place='#sl';
place+=add;
$(place).slideDown();
});
/*Slider Show hide*/
$(document).on('click','.sl_trigger_close', function(evt){
evt.preventDefault();
var add=$(this).attr("data-custom");
var place='#sl';
place+=add;
$(place).slideUp();
});
	
	
	/* SLider edit save*/
$(document).on('submit','.slider_edit_save_alert', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'slider_edit_save_alert.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (result){
               swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Alert Updated successfully!",  
		                           timer: 2000,  
		                            });
              $(".app_area").load("ajax_alert.php");
    }
  });
  return false;  

});
	
	/* SLider edit save*/
$(document).on('submit','.slider_edit_save', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
$.ajax({
    url: 'slider_edit_save.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (result){
               swal({  
		                           type: "success",
		                           title: "Congratulations!", 
		                           text: "Slider Updated successfully!",  
		                           timer: 2000,  
		                            });
              $(".app_area").load("ajax_slider.php");
    }
  });
  return false;  

});

/*changing slider image visibility */
$(document).on('click','.change_slider_vis', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var tmpp3=$(this).attr('data-status');
var dataString = 'i_id1='+tmpp2+'&v_id1='+tmpp3;
 $.ajax({
	 type: "POST",
     url: 'ajax_slider_vis.php',
     data: dataString,
	 cache: false,
     success: function (){
		 $(".app_area").load("ajax_slider.php"); 
	

		 }
  });
  return false;
});
	/*changing slider image visibility */
$(document).on('click','.change_alert_vis', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var tmpp3=$(this).attr('data-status');
var dataString = 'i_id1='+tmpp2+'&v_id1='+tmpp3;
 $.ajax({
	 type: "POST",
     url: 'ajax_alert_vis.php',
     data: dataString,
	 cache: false,
     success: function (){
		 $(".app_area").load("ajax_alert.php"); 
	

		 }
  });
  return false;
});
	
/* deleting slider*/	
	$(document).on('click','.alert_del', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;
 $.ajax({
	 type: "POST",
     url: 'ajax_alert_del.php',
     data: dataString,
	 cache: false,
     success: function () {
		 		       swal({  
		                            type: "success",
		                            title: "Alert Deleted Successfully!", 
		                            timer: 2000,  
		                          });
			  		$(".app_area").load("ajax_alert.php"); 
                          }
  });
  return false;
});
/* deleting slider*/	
	$(document).on('click','.slider_del', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var dataString = 'i_id1='+tmpp2;
 $.ajax({
	 type: "POST",
     url: 'ajax_slider_del.php',
     data: dataString,
	 cache: false,
     success: function () {
		 		       swal({  
		                            type: "success",
		                            title: "Silder Deleted Successfully!", 
		                            timer: 2000,  
		                          });
			  		$(".app_area").load("ajax_slider.php"); 
                          }
  });
  return false;
});
	
/* save slider video */	
	$(document).on('click','.save_slider_vid', function(evt){
evt.preventDefault();
var tmpp2=$('.vid_save_youtube').val();
var dataString = 'i_id1='+tmpp2;
 $.ajax({
	 type: "POST",
     url: 'ajax_slider_video_save.php',
     data: dataString,
	 cache: false,
     success: function () { 
		 		       swal({  
		                            type: "success",
		                            title: "Video Update Successfully!", 
		                            timer: 2000,  
		                          });
			  		$(".app_area").load("ajax_slider.php"); 
                          }
  });
  return false;
});

	
$(document).on('click','#or_slider', function (evt) {
evt.preventDefault();
$("#mo_fetch").load('ajax_m_order_slider.php');
$("#menu_order").fadeIn();
});  
	
	
$(document).on('click','#closem', function () {
$("#menu_order").fadeOut();
});

// menu order 
$(document).on('click','#or_slider_2', function (evt) {
evt.preventDefault();
$("#mo_fetch").load('ajax_m_order_slider_2.php');
$("#menu_order").fadeIn();
}); 

/* title in menu toggle */
$(document).on('click', '.menu_status', function (evt) {
evt.preventDefault();
var state = $(this).attr("data-custom");
var id_val = $(this).attr("data-id");
       var dataString = 'tid='+ id_val + '&sta=' + state;
         $.ajax({
			type: "POST",
			url: "ajax_title_menu.php",
			data: dataString,
			cache: false,
			success: function(){
			                     $(".app_area").load("ajax_menu.php"); 
                                  swal({  
		                           type: "success",
		                           title: "Success", 
		                           text: "Menu toggled successfully!",  
		                           timer: 2000,  
		                            });        	  
							   }								
	      });
         return false;	
});

	
	/*links save action*/
$(document).on('click','.link_save', function(evt){
evt.preventDefault();
var tmpp2=$(this).attr('data-custom');
var tmpp3='#new_link'+tmpp2;
var tmpp4=$(tmpp3).val();
var dataString = 'linkid='+ tmpp2+'&newlink='+ tmpp4;
   $.ajax({
			type: "POST",
			url: "ajax_link_update.php",
			data: dataString,
			cache: false,
			success: function(){
 				                swal({  
		                               type: "success",
		                               title: "Link Updated!", 
		                               text: "Data Recorded successfully!",  
		                               timer: 2000,  
		                            });	
								 $('.app_area').load('ajax_social.php');
								 }
	});
return false;
});

	
$(document).on('submit','#save_category_form', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);


  swal({ 
   title: "Save Category?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_table_name_save.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
			                        $('.app_area').load('ajax_table.php');
								       swal({  
		                               type: "success",
		                               title: "Category Saved!", 
		                               text: "Data Recorded successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
		
$(document).on('submit','#save_gift_form', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);


  swal({ 
   title: "Save Gift Tag?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_gift_name_save.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
			                        location.reload(true);
								       swal({  
		                               type: "success",
		                               title: "Category Saved!", 
		                               text: "Data Recorded successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	
$(document).on('submit','.edit_save_gift', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Gift Tag?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_gift_name_save_edit.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
									location.reload(true);
								       swal({  
		                               type: "success",
		                               title: "Category Saved!", 
		                               text: "Data Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	
$(document).on('click','.del_gift', function(){
var d1=$(this).attr("data-id");

var dataString = 'd1='+d1;


  swal({ 
   title: "Delete Gift Tag?", 
   text: "You are about to delete entire gift tag?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_gift_edit_status.php",
			data: dataString,
			cache: false,
			success: function(res){	
			location.reload(true);
								   
								   swal({  
		                           type: "success",
		                           title: "Update Saved!", 
		                           text: "Deleted successfully!",  
		                           timer: 2000,  
		                            });									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

			
$(document).on('submit','#save_collection_form', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);


  swal({ 
   title: "Save Collection?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_collection_name_save.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
										//alert(res);
			                        location.reload(true);
								       swal({  
		                               type: "success",
		                               title: "Collection Saved!", 
		                               text: "Data Recorded successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	
$(document).on('submit','.edit_save_collection', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Collection?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_collection_name_save_edit.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
									location.reload(true);
								       swal({  
		                               type: "success",
		                               title: "Category Saved!", 
		                               text: "Data Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	
$(document).on('click','.del_collection', function(){
var d1=$(this).attr("data-id");

var dataString = 'd1='+d1;


  swal({ 
   title: "Delete Collection?", 
   text: "You are about to delete entire Collection?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_collection_edit_status.php",
			data: dataString,
			cache: false,
			success: function(res){	
			location.reload(true);
								   
								   swal({  
		                           type: "success",
		                           title: "Update Saved!", 
		                           text: "Deleted successfully!",  
		                           timer: 2000,  
		                            });									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

	
	
$(document).on('submit','#save_rtag_form', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);


  swal({ 
   title: "Save Tag?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_rtag_name_save.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
										location.reload(true);
								       swal({  
		                               type: "success",
		                               title: "Tag Saved!", 
		                               text: "Data Recorded successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	
$(document).on('submit','.edit_save_rtag', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Tag?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_rtag_name_save_edit.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
										//alert(res);
                                   location.reload(true);
								       swal({  
		                               type: "success",
		                               title: "Category Saved!", 
		                               text: "Data Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	

$(document).on('click','.del_rtag', function(){
var d1=$(this).attr("data-id");

var dataString = 'd1='+d1;


  swal({ 
   title: "Delete Tag?", 
   text: "You are about to delete entire Tag & RECORD?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_rtag_edit_status.php",
			data: dataString,
			cache: false,
			success: function(res){	
			   location.reload(true);
								   
								   swal({  
		                           type: "success",
		                           title: "Update Saved!", 
		                           text: "Deleted successfully!",  
		                           timer: 2000,  
		                            });									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

	
	
	
$(document).on('click','.del_product', function(evt){
evt.preventDefault();
var d1=$(this).attr("data-id");

var dataString = 'd1='+d1;

  swal({ 
   title: "Delete Product?", 
   text: "You are about to delete the product!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_product_del.php",
                                    data: dataString,
			                        success: function(res){
										
			                        window.location.href = "product.php"; 								
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	
$(document).on('click','.dispatch_delivery', function(){
var d1=$(this).attr("data-ref");

var dataString = 'd1='+d1;


  swal({ 
   title: "Dispatch Delivery?", 
   text: "You are about to dispatch order for delivery?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_dispatch_send.php",
			data: dataString,
			cache: false,
			success: function(res){
			
								   
								   swal({  
		                           type: "success",
		                           title: "Order dispatched!", 
		                           text: "Operation successfull!",  
		                           timer: 2000,  
		                            });
                           location.reload(true);									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

	
$(document).on('click','.home_visit', function(){
var d1=$(this).attr("data-ref");

var dataString = 'd1='+d1;


  swal({ 
   title: "Home Visited?", 
   text: "You are about to mark as visited?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_visit_send.php",
			data: dataString,
			cache: false,
			success: function(res){
			
								   
								   swal({  
		                           type: "success",
		                           title: "Home Visited!", 
		                           text: "Operation successfull!",  
		                           timer: 2000,  
		                            });
                           location.reload(true);									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

		
$(document).on('click','.cancel_order', function(){
var d1=$(this).attr("data-ref");

var dataString = 'd1='+d1;


  swal({ 
   title: "Request Cancel Order?", 
   text: "You are about to cancel the whole order!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_cancel_request.php",
			data: dataString,
			cache: false,
			success: function(res){
			
								   
								   swal({  
		                           type: "success!",
		                           title: "Order Cancel Requested!", 
		                           text: "Operation successfull!",  
		                           timer: 2000,  
		                            });
                           location.reload(true);									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

		
$(document).on('click','.delivered_order', function(){
var d1=$(this).attr("data-ref");

var dataString = 'd1='+d1;


  swal({ 
   title: "Confirm Order Delivered?", 
   text: "You are about to mark order as delivered?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_mark_delivered.php",
			data: dataString,
			cache: false,
			success: function(res){
			
								   
								   swal({  
		                           type: "success!",
		                           title: "Order Delivered Successfully!", 
		                           text: "Operation successfull!",  
		                           timer: 2000,  
		                            });
                           location.reload(true);									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

	

	
var pp=0;
$(document).on('click','.get-product', function(evt){
var lt=$(this).attr("data-id");
if(pp!=lt){$('.load-product[data-id="'+lt+'"]').html('Loading items......');}
if(pp!=0 && pp!=lt){$('.load-product[data-id="'+pp+'"]').html('');}
if(pp!=lt){$('.load-product[data-id="'+lt+'"]').load('ajax_product_load.php?catid='+lt);}
pp=lt;
});	
	
$(document).on('submit','.edit_save_category', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Category?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_table_name_save_edit.php",
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
			                        $('.app_area').load('ajax_table.php');
								       swal({  
		                               type: "success",
		                               title: "Category Saved!", 
		                               text: "Data Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
		
$(document).on('submit','.edit_save_img', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Image?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_image_save_edit_banner1.php",
                                    data: formData,
                                    async: false,
                                    cache: false, 
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
			                        $('.app_area').load('ajax_banner.php');
								       swal({  
		                               type: "success",
		                               title: "Images Saved!", 
		                               text: "Image Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
			
$(document).on('submit','.edit_save_img_banner2', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Image?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_image_save_edit_banner2.php",
                                    data: formData,
                                    async: false,
                                    cache: false, 
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
			                        $('.app_area').load('ajax_banner.php');
								       swal({  
		                               type: "success",
		                               title: "Images Saved!", 
		                               text: "Image Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
				
$(document).on('submit','.edit_save_img_banner4', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Image?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_image_save_edit_banner4.php",
                                    data: formData,
                                    async: false,
                                    cache: false, 
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
			                        $('.app_area').load('ajax_banner.php');
								       swal({  
		                               type: "success",
		                               title: "Images Saved!", 
		                               text: "Image Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
					
$(document).on('submit','.edit_save_img_banner5', function(evt){
evt.preventDefault();
var formData = new FormData($(this)[0]);
  swal({ 
   title: "Update Image?", 
   text: "Make sure you put all informations!",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes, save!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;

                                   
								   
								    $.ajax({
			                        type: "POST",
			                        url: "ajax_image_save_edit_banner5.php",
                                    data: formData,
                                    async: false,
                                    cache: false, 
                                    contentType: false,
                                    processData: false,
			                        success: function(res){
                                    //alert(res);
			                        $('.app_area').load('ajax_banner.php');
								       swal({  
		                               type: "success",
		                               title: "Images Saved!", 
		                               text: "Image Updated successfully!",  
		                               timer: 2000,  
		                            });									
								}
								
	});
								   
								   
								   
								   

		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
});
	
	
	


$(document).on('click','.del_table', function(){
var d1=$(this).attr("data-id");

var dataString = 'd1='+d1;


  swal({ 
   title: "Delete Category?", 
   text: "You are about to delete entire Category & RECORD?",  
   type: "warning",  
   showCancelButton: true, 
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Yes!", 
   cancelButtonText: "No, cancel!",  
   closeOnConfirm: false, 
   closeOnCancel: false 
   }, 
   function(isConfirm){  
     if (isConfirm) {
		                              window.onkeydown = null;
                                      window.onfocus = null;
 $.ajax({
			type: "POST",
			url: "ajax_table_edit_status.php",
			data: dataString,
			cache: false,
			success: function(res){	
			  $('.app_area').load('ajax_table.php');
								   
								   swal({  
		                           type: "success",
		                           title: "Update Saved!", 
		                           text: "Deleted successfully!",  
		                           timer: 2000,  
		                            });									
								}
								
	});
	
	
		 } 
	else {  
      	swal({  
		type: "error",
		title: "Cancelled", 
		text: "Action Revoked!",  
		timer: 2000,  
		  });
		}
		}); 
	
});

	
	
	
	
	
  
  

/*					PAGINATION 
- on change max rows select options fade out all rows gt option value mx = 5
- append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
- each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
- fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
- fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
*/

function getPagination(table) {
	
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
      //$('.paginationprev').html('');						// reset pagination

      lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //	numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
								  <span class="page-link" >' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
								</li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');					// add active class to the clicked
        limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
      limitPagging();
    })
    .val(20)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging() {
  // alert($('.pagination li').length)

  if ($('.pagination li').length > 7) {
    if ($('.pagination li.active').attr('data-page') <= 3) {
      $('.pagination li:gt(5)').hide();
      $('.pagination li:lt(5)').show();
      $('.pagination [data-page="next"]').show();
    }
    if ($('.pagination li.active').attr('data-page') > 3) {
      $('.pagination li:gt(0)').hide();
      $('.pagination [data-page="next"]').show();
      for (
        let i = parseInt($('.pagination li.active').attr('data-page')) - 2;
        i <= parseInt($('.pagination li.active').attr('data-page')) + 2;
        i++
      ) {
        $('.pagination [data-page="' + i + '"]').show();
      }
    }
  }
}

$(function() {
  // Just to append id number for each row
  //$('table tr:eq(0)').prepend('<th> S </th>');

  var id = 0;

  $('table tr:gt(0)').each(function() {
    id++;
   // $(this).prepend('<td>' + id + '</td>');
  });
});
 
