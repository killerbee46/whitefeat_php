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
              // alert(sortorder);				
			}); 
			var dataString = 'data1='+sortorder;
             $.ajax({
	           type: "POST",
               url: 'ajax_m_order_save_slider_2.php',
               data: dataString,
	           cache: false,
               success: function (result) {
			$("#mo_fetch").load('ajax_m_order_slider_2.php');
			 //$("#display1").load('ajax_slider_2.php');
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
<h4 style="color:#fff;"> &nbsp;&nbsp;Drag & Drop 
Menu title Order</h4>
	<div class="columns" style="padding:15px;">
	    <?php include_once('db_connect.php');
		$sql = "Select * from `whitefeat_wf_new`.`menu2` where visible='1' order by m_order";
        $display = mysqli_query($con,$sql);		
        while($row = mysqli_fetch_array($display))
		{
	    echo'<div class="dragbox" id="'.$row['m_id'].'">
		<a href="#" style="cursor:move; color:#fff;"><h5 class="move_h5" >'.ucfirst($row['m_name']).'</h5></a>
		</div>';
		}
	   ?>
	</div>
	</div>