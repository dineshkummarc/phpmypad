<meta charset="UTF-8">
<?php
	include_once('./include/dbcon.php');
	session_start();
		$name = $_POST["find_name_1"];
		$mail = $_POST["find_email_1"];
		
		$query = "select * from member_info where member_Name='$name' and member_Email='$mail'";
		$result = mysqli_query($mysqli, $query) or die('ERORR : SESSION ERORR!');
		$row = mysql_fetch_array();
		$id = $row['member_Id'];
		
		$mailTo = "pizza1018@naver.com";
		$mailFrom = "From : MYPAD<pizza1018@naver.com>";
		$title = "$name.'님이 요청하신 아이디입니다.'";
		$cont = "$name.'님의 아이디는'.$id.'입니다'";

		$send = mail($mailTo,$title,$cont,$mailFrom);
		if($send){
			session_destroy();
			mysqli_close($mysqli);
			echo "<script>alert('찾기 성공 : 이메일로 아이디가 전송되었습니다');</script>
			<meta http-equiv='refresh' content='0;url=./welcome.php'>";
		}else{
			session_destroy();
			mysqli_close($mysqli);
			echo "<script>alert('찾기 실패 : 성명과 이메일을 확인해주세요');</script>
			<meta http-equiv='refresh' content='0;url=./welcome.php'>";
		}
?>