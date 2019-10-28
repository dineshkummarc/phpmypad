<meta charset="UTF-8">
<?php
	include_once('./include/dbcon.php');
	$name=$_POST['name'];
	$id=$_POST['id'];
	$password=md5($_POST['password']);
	$tel=$_POST['tel'];
	$email=$_POST['email'];

	$sql = "insert into member_info (member_Name, member_Id, member_Pass, member_Tel, member_Email)";
	$sql = $sql. "values('$name','$id','$password','$tel','$email')";
	if($mysqli->query($sql)){
		echo "<script>alert('회원가입이 완료되었습니다'); location.replace('./welcome.php');</script>";
	}else{
		echo "<script>alert('회원가입에 실패하였습니다'); location.replace('./welcome.php');</script>";
	}
	mysqli_close($mysqli);
?>