<?	session_start(); //세션의 시작

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$member_id = addslashes($_POST['id']);
	$member_pass = addslashes($_POST['password']);
	$sql="SELECT id FROM 'table' WHERE username='$myusername' and passcode='$mypassword'";
	$result=mysql_query($sql);
	//$row=mysql_fetch_array($result);
	//$active=$row['active'];

	$count=mysql_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	//count가 1이라는 것은 아이디와 패스워드가 일치하는 db가 하나 있음을 의미합니다.
	if($count==1){
		session_register("myusername");
		$_SESSION['login_user']=$myusername;
		header("location: welcome.php"); // welcome.php 페이지로 넘깁니다.
	}else{
		$error="Your Login Name or Password is invalid";
	}
}

?>