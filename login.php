<meta charset="UTF-8">
<?php
	include_once('./include/dbcon.php');
	session_start();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		//if(!isset($_POST['id'])||!isset($_POST['password'])){exit;}
		$id = $_POST['id'];
		$password = $_POST['password'];
		$md5_pass = md5($password);
		
		$query = "select * from member_info where member_Id='$id' and member_Pass='$md5_pass'";
		$result = mysqli_query($mysqli, $query) or die('ERORR : SESSION ERORR!');
		$matching = mysqli_num_rows($result);

		if($matching==1){
			$_SESSION['id'] = $id;
			echo "<script>
					alert('로그인에 성공했습니다');
					document.location.href='./member';
				</script>";
			mysqli_close($mysqli);
		}else{
			echo "<script>
					alert('아이디 또는 패스워드가 틀렸습니다');
					history.go(-1);
				</script>";
			mysqli_close($mysqli);
		}
	}
?>