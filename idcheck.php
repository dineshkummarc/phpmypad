<?php
	include_once('./include/dbcon.php');
	session_start();
		$id = $_POST['idc_text'];
		$query = "select * from member_info where member_Id='$id'";
		$result = mysqli_query($mysqli, $query) or die('ERORR : SESSION ERORR!');
		$matching = mysqli_num_rows($result);

		if($matching==1){
			echo 1;
		}else{
			echo 2;
		}
		mysqli_close($mysqli);
	session_destroy();
?>
	