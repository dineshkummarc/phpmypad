	//로그인 유효성 검사
	function loginCheck(){
		var Lid = document.getElementById('login_id');
		var Lpass = document.getElementById('login_password');
		
		if(Lid.value.length<2||Lid.value.length>10){
			alert('아이디를 입력해 주세요(2~10자)');
			Lid.focus();
			return false;
		}
		if(Lpass.value.length<4||Lpass.value.length>20){
			alert('비밀번호를 입력해 주세요(4~20자)');
			Lpass.focus();
			return false;
		}
		document.login.submit();
	}
	//회원가입 유효성 검사
	function registCheck(){
		var Rname = document.getElementById('regist_name');
		var Rid = document.getElementById('regist_id');
		var Ridb = document.getElementById('idchecker');
		var Ridc = document.getElementById('idc_ok');
		var Rpass = document.getElementById('regist_password');
		var Rpass2 = document.getElementById('regist_password_re');
		var Rtel = document.getElementById('regist_tel');
		var Rmail = document.getElementById('regist_email');
		var Rterm = document.getElementById('term_check');

		var mailcheck = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
		
		if(Rname.value==''){
			alert('성명을 입력해 주세요')
			Rname.focus();
			return false;
		}
		if(Rid.value.length<2||Rid.value.length>10){
			alert('아이디를 2~10자 사이로 입력해 주세요');
			Rid.focus();
			return false;
		}
		if(Rid.value.indexOf(' ')>=0){
			alert('아이디에 공백은 사용할 수 없습니다');
			Rid.focus();
			return false;
		}
		if(Ridc.value == 0){
			alert('아이디 중복확인을 해 주세요');
			Ridb.focus();
			return false;
		}
		if(Rpass.value.length<4||Rpass.value.length>20){
			alert('비밀번호를 4~20자 사이로 입력해 주세요');
			Rpass.focus();
			return false;
		}
		if(Rpass.value!=Rpass2.value){
			alert('비밀번호가 일치하지 않습니다');
			Rpass2.focus();
			return false;
		}
		if(Rmail.value==''){
			var qusetion = confirm('이메일을 입력하시지 않을경우 이후 아이디나 비밀번호 분실시 찾기가 제한됩니다');
			if(qusetion == true){
				alert('이후 아이디, 비밀번호 찾기가 제한됩니다');
				Rmail.value='test@test.com';
				return;
			}else{
				alert('이메일을 입력해주세요');
				Rmail.focus();
				return false;
			}
		}
		if(mailcheck.test(Rmail.value) == false){
			alert(Rmail.value + '는 잘못된 이메일 형식입니다');
			Rmail.focus();
			return false;
		}
		if(Rterm.checked==false){
			alert('가입 주의사항을 확인하고 동의하셔야 가입 가능합니다')
			Rterm.focus();
			return false;
		}
		document.registration.submit();
	}
	//아이디 찾기 유효성 검사
	function findCheck1(){
		var Fname1 = document.getElementById('find_name_1');
		var Femail1 = document.getElementById('find_email_1');
		var mailcheck = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
		
		if(Fname1.value==''){
			alert('성명을 입력해 주세요');
			Fname1.focus();
			return false;
		}
		if(Femail1.value==''){
			alert('이메일을 입력해 주세요');
			Femail1.focus();
			return false;
		}
		if(mailcheck.test(Femail1.value) == false){
			alert(Femail1.value + '는 잘못된 이메일 형식입니다');
			Femail1.focus();
			return false;
		}
		alert('죄송합니다. 아이디 찾기 기능은 현재 점검중입니다.');
	}
	//비밀번호 찾기 유효성 검사
	function findCheck2(){
		var Fid2 = document.getElementById('find_id_2');
		var Fname2 = document.getElementById('find_name_2');
		var Femail2 = document.getElementById('find_email_2');
		var mailcheck = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
		
		if(Fid2.value.length<2||Fid2.value.length>10){
			alert('아이디를 입력해 주세요(2~10자)');
			Fid2.focus();
			return false;
		}
		if(Fname2.value==''){
			alert('성명을 입력해 주세요');
			Fname2.focus();
			return false;
		}
		if(Femail2.value==''){
			alert('이메일을 입력해 주세요');
			Femail2.focus();
			return false;
		}
		if(mailcheck.test(Femail2.value) == false){
			alert(Femail2.value + '는 잘못된 이메일 형식입니다');
			Femail2.focus();
			return false;
		}
		alert('죄송합니다. 비밀번호 찾기 기능은 현재 점검중입니다.');
	}