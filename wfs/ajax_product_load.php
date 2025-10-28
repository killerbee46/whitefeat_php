<?php
include('session_control.php');
include('db_connect.php');
include('cut_review.php');
$query_s = "Select * from `whitefeat_wf_new`.`package` where cat_id='" . $_GET['catid'] . "' order by p_name";
$display_s = mysqli_query($con, $query_s);
$sn = 1;
while ($row_s = mysqli_fetch_array($display_s)) {
	echo '<div class="col-3 " style="border:0px solid #ccc;">
						
						<div class="card pt-1 pb-0 card-hover ">
						
							<div class="row p-1 pt-0 pb-0 pl-2" style="overflow:hidden;" >
							  
                              <div class="col-8 " style="height:90px; overflow:scroll;">';

	$query_s2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $row_s['id_pack'] . "'";
	$display_s2 = mysqli_query($con, $query_s2);
	while ($row_s2 = mysqli_fetch_array($display_s2)) {

		echo '<img src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/' . $row_s2['thumb'] . '" class="col-6 mb-1" style="height:50px;"/>';
	}


	echo '</div>
							  <div class="col-4">';

	if ($row_s['p_vpath'] != '') {
		//echo'<iframe width="100%" height="80" src="https://www.youtube.com/embed/'.$row_s['p_vpath'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		echo '<i class="fab fa-youtube" style="font-size:3.5em; color:red; cursor:pointer;"'; ?>
		onclick="window.open('https://www.youtube.com/watch?v=<?php echo $row_s['p_vpath']; ?>', '_blank',
		'location=yes,height=570,width=520,scrollbars=yes,status=yes');" >
		<?php echo '</i>';
	} else {
		echo '<small><small class="lspace"> NOT AVAILABLE<i class="fas fa-video" style="opacity:0.4; font-size:1.5em;"></i> </small></small>';
	}
	echo '</div>
							  
							
							</div>
							
							
							
							
						
						
						<hr class="m-0 p-0 pb-0 mt-0">
						
						
						<div class="row pt-1 pb-1 m-0 " style="
						background: rgba(250,250,250,0.4);
						">
						
						    <div class="col-12">' . send_string_review($row_s['p_name']) . '</div>
							
							<div class="col-12">
 <div class="row ">
  <div class="col text-bold">Rs ';

	if ($row_s['offer'] > 0) {
		$rowpr = $row_s['price'] - (($row_s['offer'] / 100) * $row_s['price']);
		echo floor($rowpr);
	} else {
		echo floor($row_s['price']);
	}

	echo '</div>
  <div class="col"><small>Rs ' . floor($row_s['price_b2b']) . ' <small><small><I>(B2B)</i></small></small></small></div>
 </div>
</div>
							
							
	





							
						</div>
						
		
					





						
						






	
<div class="col-12 pt-2 pb-2 rounded-bottom " style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,0.1) 0%, rgba(226,225,219,0.1) 34%, rgba(18,127,147,0.1) 80%, rgba(18,127,147,0.1) 99%);">
							
							<div class="row">
							<div class="col"><span class="badge badge-light p-2 font-weight-light" style="border:1px solid rgba(214,152,2,0.5);">
							
							# ';

	$query_stg = "Select tag_id from `whitefeat_wf_new`.`tag_package` where id_pack='" . $row_s['id_pack'] . "' order by tgp_id";
	$display_stg = mysqli_query($con, $query_stg);
	$row_stg = mysqli_fetch_array($display_stg);

	$query_stg2 = "Select tag_name from `whitefeat_wf_new`.`tags` where tag_id='" . $row_stg['tag_id'] . "'";
	$display_stg2 = mysqli_query($con, $query_stg2);
	$row_stg2 = mysqli_fetch_array($display_stg2);
	echo $row_stg2['tag_name'] ?? "";

	echo '</span></div>
							
							<div class="col text-right">
							<small><strong>#' . $row_s['id_pack'] . '</strong></small>&nbsp; 
							<a target="_blank" href="product_edit.php?id=' . $row_s['id_pack'] . '" class="btn btn-outline-info btn-xs" style="border-color:#ccc;">Edit&nbsp; <i class="fas fa-edit"></i></a>
							</div>
							</div>
							
							</div>











					
						
						
						
						  </div>
						  
						</div>';

	if (($sn % 4) == 0) {
		echo '<div class="w-100"></div>';
	}

	$sn++;

}





?>