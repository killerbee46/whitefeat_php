<script type="text/javascript" src="dist/js/jquery-ui.min.js" ></script>
<script type="text/javascript" >
$(function(){
	$('.columns').sortable({
		connectWith: '.columns',
		handle: 'a',
		cursor: 'move',
		placeholder: 'placeholder',
		forcePlaceholderSize: true,
		opacity: 0.4,
		stop: function(event, ui){
			$(ui.item).find('a').click();
			var sortorder='';
			$('.columns').each(function(){
				var itemorder=$(this).sortable('toArray');
				sortorder+=itemorder.toString();
				$('#process-status').slideDown();
                //alert(sortorder);				
			});
			var dataString = 'data1='+sortorder;
			//alert(dataString);
             $.ajax({
	           type: "POST",
               url: 'ajax_m_order_save_menu_title.php',
               data: dataString,
	           cache: false,
               success: function (result) {//alert(result);
				   var ts='ajax_m_order_menu_title.php?fid='+<?php echo $_GET['fid']; ?>;
			 //$(".app_area").load("ajax_menu.php");
			 $("#mo_fetch").load(ts);
			
                          }
  });
  return false;
			/*Pass sortorder variable to server using ajax to save state*/
		}
	})
	.disableSelection();
});
</script>
<div class="mdis">
<h4 style="color:#fff;"> &nbsp;&nbsp;Drag & Drop Sub-categories Order</h4>
	<div class="columns" style="padding:15px;">
	    <?php 
		include_once('session_control.php');include_once('db_connect.php');
		$sql = "Select * from `whitefeat_wf_new`.`title_menu` where m_id='".$_GET['fid']."' order by menu_order ASC";
        $display = mysqli_query($con,$sql);		
        while($row = mysqli_fetch_array($display))
		{
	    echo'<div class="dragbox" id="'.$row['tm_id'].'">
		<a href="#" style="cursor:move; color:#fff;"><h5 class="move_h5" >';
		
		           $sql2x = "Select * from `whitefeat_wf_new`.`package_category` where cat_id='".$row['cat_id']."'";
		            $display2x=mysqli_query($con,$sql2x);
		            $row2x = mysqli_fetch_array($display2x);
				   echo ucfirst($row2x['cat_name']);
		
		echo'</h5></a>
		</div>';
		}
	   ?>
	</div>
	</div>