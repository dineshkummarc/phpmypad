<?php
	include_once './include/dbcon.php';
	session_start();
	//로그인 중이면 바로 member로 이동
	if(isset($_SESSION['id'])){
		header('Location:./member');
	}
	else if(!isset($_SESSION['id'])){
		session_destroy();
		mysqli_close($mysqli);
	}
	include_once './include/top.php';
?>
	<title>Welcome</title>
	<link rel='stylesheet' href='./css/main.css'/>
	<link rel='stylesheet' href='./css/welcome.css'/>
	<script src='./js/main.js'></script>
</head>

<body>
	<div id='loading'>
		<div>
			<img alt='loading' src='./img/loading.gif'/>
			<h1>Now Loading...</h1>
		</div>
	</div>

	<div id='member_check'>
		<div id='box_check'>
			<div class='box_title'>환영합니다</div>
			<a href='./guest'><div id='go_guest'>비회원 로그인</div></a>
			<div id='go_member' onClick='logshow();'>회원 로그인</div>
		</div>
		
		<div id='box_login' class='box_form'>
			<div class='box_title'>로그인</div>
			<form id='login' name='login' method='post' onSubmit='loginCheck(); return false;' action='./login.php'>
				<div class='input_form'><label for='login_id'>아이디</label>
					<input type='text' id='login_id' name='id' maxlength='10'/>
				</div>
				<div class='input_form'><label for='login_password'>비밀번호</label>
					<input type='password' id='login_password' name='password' maxlength='20'/>
				</div>
				<div class='input_form'>
					<input type='submit' value='로그인'/>
				</div>
				<div class='input_form'>
					<input type='reset' value='회원가입' onClick='registshow();'/>
				</div>
				<div class='input_form'>
					<input type='reset' value='아이디나 비밀번호를 잊으셨나요?' onClick='findshow();'/>
				</div>
				<div class='input_form'>
					<input type='reset' value='로그인 취소' onClick='checkshow();'/>
				</div>
			</form>
		</div>
		
		<div id='idc_back'>
			<form id='box_idcheck' onSubmit='return false;'>
				<div id='idc_title'>
					<h2>아이디 중복확인</h2>
					<p id='idc_now0'>사용할 수 없는 아이디 입니다</p>
					<p id='idc_now1'>2~10자 사이로 입력해 주세요</p>
					<p id='idc_now2'>아이디에 공백은 사용할 수 없습니다</p>
					<p id='idc_now3'>이미 사용중인 아이디 입니다</p>
					<p id='idc_now4'>사용 가능한 아이디 입니다</p>
					<p id='idc_now5'>중복 확인 완료</p>
				</div>
				<label for='idc_text'>아이디</label><input type='text' name='idc_text' id='idc_text' maxlength='10' onFocus='idselect();' onkeyUp='idcheck1();'/>
				<input type='button' onClick='iduse();' value='사용하기'/>
				<input type='reset' onClick='idcancle();' value='취소'/>
				<input type='hidden' id='idc_number' value='0'/>
			</form>
		</div>
		
		<div id='box_registration' class='box_form'>
			<div class='box_title'>회원가입</div>
			<form id='registration' name='registration' method='post' onSubmit='registCheck(); return false;' action='./registration.php'>
				
				<h2><span>* </span>표시는 필수항목입니다.</h2>
				<div class='input_form'><label for='regist_name'>성명<span> *</span></label>
					<input type='text' id='regist_name' name='name' maxlength='40'/></div>
				<div class='input_form'><label for='regist_id'>아이디<span> *</span></label>
					<input type='text' id='regist_id' name='id' maxlength='10' placeholder='2~10자 이내로 입력' onFocus='idselect();'/></div>
				<div class='input_form'>
					<input type='button' id='idchecker' value='아이디 중복확인' onClick='idcheckshow();'/>
					<input type='button' id='idc_complete' value='중복 확인 완료' disabled />
					<input type='hidden' id='idc_ok' value='0'/>
				</div>
				<div class='input_form'>
					<label for='regist_password'>비밀번호<span> *</span></label>
					<input type='password' id='regist_password' name='password' maxlength='20' placeholder='4~20자 이내로 입력'/>
				</div>
				<div class='input_form'>
					<label for='regist_password_re'>비밀번호 확인<span> *</span></label>
					<input type='password' id='regist_password_re' name='password_re' maxlength='20' placeholder='4~20자 이내로 입력'/>
				</div>
				<div class='input_form'><label for='regist_tel'>전화번호</label>
					<input type='tel' id='regist_tel' name='tel' maxlength='14' placeholder='&quot;-&quot;를 제외하고 입력' onkeyDown='return telcheck();'/></div>
				<div class='input_form'><label for='regist_email'>E-Mail</label>
					<input type='email' id='regist_email' name='email' maxlength='40' placeholder='ex) test@test.com'/>
				</div>
				<div id='terms'>
					<h3>※ 가입 주의사항 ※</h3><br/>
					&nbsp;이 홈페이지는 시험용으로 만들어진 개인 홈페이지 입니다.<br/>
					&nbsp;최소한의 보안만이 적용되어 있기 때문에 가입하실 때 실제 개인정보를 적지 마시고 임시로 적어주세요.<br/>
					&nbsp;실제 개인정보나 타인의 개인정보를 입력함으로 인해서 발생할 수 있는 모든 피해에 대해서 이 홈페이지는 어떠한 책임도 지지 않습니다.<br/>
					&nbsp;이메일은 필수사항은 아니지만 이후 아이디, 비밀번호 분실시 찾기 위해서는 필요합니다.
				</div>
				<div class='input_form'>
					<input type='checkbox' id='term_check'/><p>위 사항을 확인했고 이에 동의합니다.</p></div>
				<div class='input_form'>
					<input type='submit' value='회원가입'/>
				</div>
				<div class='input_form'>
					<input type='reset' value='가입취소' onClick='logshow();'/>
				</div>
			</form>
		</div>
		
		<div id='box_find' class='box_form'>
			<div class='box_title'>아이디ㆍ비밀번호</div>
			
			<h2 id='id_button' onClick='findid();'>아이디 찾기</h2>
			<form id='find_id' name='find_id' method='post' onSubmit='findCheck1(); return false;'>
				<h3>아이디 찾기</h3>
				<div class='input_form'><label for='find_name_1'>성명</label>
					<input type='text' id='find_name_1' name='name' maxlength='40' placeholder='가입시 등록한 성명'/>
				</div>
				<div class='input_form'><label for='find_email_1'>이메일</label>
					<input type='email' id='find_email_1' name='email'  maxlength='40' placeholder='가입시 등록한 이메일'/>
				</div>
				<div class='input_form'>
					<input type='submit' value='아이디 찾기'/>
				</div>
			</form>
			
			<h2 id='pass_button' onClick='findpass();'>비밀번호 찾기</h2>
			<form id='find_pass' name='find_pass' method='post' onSubmit='findCheck2(); return false;'>
				<h3>비밀번호 찾기</h3>
				<div class='input_form'><label for='find_id_2'>아이디</label>
					<input type='email' id='find_id_2' name='id' maxlength='10' placeholder='가입시 등록한 아이디'/>
				</div>
				<div class='input_form'><label for='find_name_2'>성명</label>
					<input type='text' id='find_name_2' name='name' maxlength='40' placeholder='가입시 등록한 성명'/>
				</div>
				<div class='input_form'><label for='find_email_2'>이메일</label>
					<input type='email' id='find_email_2' name='email' maxlength='40' placeholder='가입시 등록한 이메일'/>
				</div>
				<div class='input_form'>
					<input type='submit' value='비밀번호 찾기'/>
				</div>
			</form>
			
			<h2 id='idpass_button' onClick='findcancle();'>찾기 취소</h2>
		</div>
		<script src='./js/check.js'></script>
		<script src='./js/welcome.js'></script>
	</div>
	
<?	include_once './include/footer.php';	?>

</body>
</html>

