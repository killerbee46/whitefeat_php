<?php
		include('db_connect.php');
		$all_val=$_POST['data1'];
		//$mid=$_POST['fid'];
		$array_1= preg_split("/,/", $all_val);
        $i=0;
        foreach($array_1 as $key=>$value)
		{
		$i2=$array_1[$i];
		$r_v=$i+1;		 
		$sql2="UPDATE `whitefeat_wf_new`.`title_menu` SET menu_order='".$r_v."' WHERE tm_id='".$i2."'";
        mysqli_query($con,$sql2); 
		$i++;
		}
?>		