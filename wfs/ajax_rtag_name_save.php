<?php
include('db_connect.php');
$g1=$_POST['cat_name'];
//$g2=$_POST['cat_video'];

//include('image_cache.php');

/*
$sourcePath = $_FILES['itemimg']['tmp_name']; // Storing source path of the file in a variable
$tmpp = explode(".", $_FILES["itemimg"]["name"]);
$newfilename = time().round(microtime(true)) . '.' . end($tmpp);
$targetPath = "../assets/images/category/".$newfilename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;  // Moving Uploaded file

*/



//$destination = "../assets/images/category/icon/".$newfilename; // Target path where file is to be stored


/*copy($targetPath, $destination);


              

              $path='images/uploads/post/slider/';
			  $path.=$rowxex[0];
			  
			  
			  $dest='images/cdn/cache/thumb/';
			  $dest.=$rowxex[0];
			  */
			  
			//  icut($targetPath, $destination, 60, false);




$sql="INSERT INTO `whitefeat_wf_new`.`tags` (`tag_id`, `tag_name`, `tag_type`, `tag_img`, `tag_video`) VALUES (NULL, '$g1', '', '', '');";
mysqli_query($con,$sql);
$idi=mysqli_insert_id($con);
	echo $idi;

		?>