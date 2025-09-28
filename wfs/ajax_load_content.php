<?php  include('db_connect.php');
				      $sqlbc = "Select * from `whitefeat_wf_new`.`info` where id_info='".$_GET['id']."'"; 
		              $displaybc=mysqli_query($con,$sqlbc);
				      
                      $mrow2 = mysqli_fetch_array($displaybc);
						
					
					echo'
					<code>Editing.. <small><i class="fas fa-arrow-right"></i> '.$mrow2['info_type'].'</small></code>
					<form class="save_form_content" method="post" enctype="multipart/form-data">
					<input type="hidden" value="'.$mrow2['id_info'].'" name="pval"></input>
					<textarea class="tinyme" name="sspost" value="" id="editor" style="width:100%;" >'.$mrow2['info_text'].'</textarea>
					 <input type="submit" value="save changes " class="p-2 form-control mt-4 btn btn-md btn-block btn-info" style="width:15VW;" id="saveNewPack" >
			  
			 </input>
			 </form>
					
					';
					
						
						
						
						
?>

<script src="plugins/addon/SunEditor-master/dist/suneditor.min.js" type="text/javascript"></script>	
	 <script>
var suneditor = SUNEDITOR.create('editor',
{
	buttonList: [
    ['undo', 'redo'],
    ['font', 'fontSize', 'formatBlock'],
    ['paragraphStyle', 'blockquote'],
    ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
    ['fontColor', 'hiliteColor', 'textStyle'],
    ['removeFormat'],
    '/', // Line break
    ['outdent', 'indent'],
    ['align', 'horizontalRule', 'list', 'lineHeight'],
    ['table', 'link', 'image', 'video', 'audio' /** ,'math' */], // You must add the 'katex' library at options to use the 'math' plugin.
    /** ['imageGallery'] */ // You must add the "imageGalleryUrl".
    ['fullScreen', 'showBlocks', 'codeView'],
    ['preview', 'print'],
    ['save', 'template']
  ],
	 Width: 600,
	 height:500
	
});
$('#saveNewPack').click(function(){suneditor.save();/*alert('saved');*/});
</script>