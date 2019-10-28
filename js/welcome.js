	//박스변환//
	function checkshow(){
		$('#box_login').hide(0);
		$('#box_registration').hide(0);
		$('#box_find').hide(0);
		$('#box_check').fadeIn(300);
	}
	//로그인
	function logshow(){
		$('#box_check').hide(0);
		$('#box_registration').hide(0);
		$('#box_find').hide(0);
		$('#box_login').fadeIn(300);
	}
	//회원가입
	function registshow(){
		$('#box_check').hide(0);
		$('#box_login').hide(0);
		$('#box_find').hide(0);
		$('#box_registration').fadeIn(300);
	}
	//회원가입 - 전화번호 숫자만
	function telcheck(){
		event = event || window.event;
		var keyID = (event.which) ? event.which : event.keyCode;
		if((keyID>=48 && keyID<=57)||(keyID>=96 &&keyID<=105)||keyID==8||keyID==46||keyID==37||keyID==39){
			return;
		}else{
			return false;
		}
	}
	//중복확인 창
	function idcheckshow(){
		$('#idc_back').fadeIn(300);
		$('#idc_now0').hide();
		$('#idc_now4').hide();
		document.getElementById('idc_text').value = document.getElementById('regist_id').value;
		idcheck1();
	}
	function idselect(){
		document.getElementById('idc_ok').value = 0;
		$('#idchecker').show();
		$('#idc_complete').hide();
	};
	function idcheck1(){
		$.ajax({
			url:'./idcheck.php',
			type:'POST',
			data:{'idc_text':$('#idc_text').val()},
			dataType:'text',
			error:function(x,e){
					if(x.status == 0){ alert('ERORR : 인터넷 연결을 확인해주세요'); }
					else if(x.status == 404){ alert('ERORR : 잘못된 경로로 호출 되었습니다'); }
					else if(x.status == 500){ alert('ERORR: C333!'); }
					else if(e == 'parsererror'){ alert('ERORR : D444'); }
					else if(e == 'timeout'){ alert('ERORR : 연결이 원할하지 않습니다.\n잠시후 다시 시도하여 주세요.'); }
					else{ alert('Unknow Error.n'+x.responseText); }
			},
			success:function(text){
				if(document.getElementById('idc_text').value.length<2){
					$('#idc_now0').hide();
					$('#idc_now2').hide();
					$('#idc_now3').hide();
					$('#idc_now4').hide();
					$('#idc_now1').show();
					document.getElementById('idc_number').value = 0;
				}else if(document.getElementById('idc_text').value.indexOf(" ")>=0){
					$('#idc_now0').hide();
					$('#idc_now1').hide();
					$('#idc_now3').hide();
					$('#idc_now4').hide();
					$('#idc_now2').show();
					document.getElementById('idc_number').value = 0;
				}else if(text==1){
					$('#idc_now0').hide();
					$('#idc_now1').hide();
					$('#idc_now2').hide();
					$('#idc_now4').hide();
					$('#idc_now3').show();
					document.getElementById('idc_number').value = 0;
				}else if(text==2){
					$('#idc_now0').hide();
					$('#idc_now1').hide();
					$('#idc_now2').hide();
					$('#idc_now3').hide();
					$('#idc_now4').show();
					document.getElementById('idc_number').value = 1;
				}else{
					alert('ERORR');
					return false;
				}
			}
		});
	}
	function iduse(){
		if(document.getElementById('idc_number').value == 1){
			document.getElementById('idc_ok').value = 1;
			document.getElementById('regist_id').value = document.getElementById('idc_text').value;
			$('#idchecker').hide();
			$('#idc_complete').show();
			$('#idc_back').fadeOut(300);
			$('#idc_now1').hide();
			$('#idc_now2').hide();
			$('#idc_now3').hide();
			$('#idc_now4').hide();
			$('#idc_now5').show();
			document.getElementById('idc_number').value == 0;
		}else{
			document.getElementById('idc_ok').value = 0;
			$('#idc_now1').hide();
			$('#idc_now2').hide();
			$('#idc_now3').hide();
			$('#idc_now4').hide();
			$('#idc_now0').show();
			var q = $('#box_idcheck').queue('fx');
			if(q.length > 0) return;
			$('#box_idcheck').stop(0).animate({marginTop:97},50).animate({marginTop:103},50).animate({marginTop:97},50).animate({marginTop:103},50).animate({marginTop:97},50).animate({marginTop:103},50).animate({marginTop:100},50);
		}
	}
	function idcancle(){
		document.getElementById('idc_ok').value = 0;
		$('#idc_back').fadeOut(300);
		$('#idc_now1').hide();
		$('#idc_now2').hide();
		$('#idc_now3').hide();
		$('#idc_now4').hide();
		$('#idc_now0').show();
	}
	//아이디, 비밀번호 찾기
	function findshow(){
		$('#box_check').hide(0);
		$('#box_login').hide(0);
		$('#box_registration').hide(0);
		$('#find_id').hide(0);
		$('#id_button').show(0);
		$('#find_pass').hide(0);
		$('#pass_button').show(0);
		$('#box_find').fadeIn(300);
	}
	function findid(){
		document.getElementById('find_pass').reset();
		$('#find_pass').hide(0);
		$('#id_button').hide(0);
		$('#pass_button').show(0);
		$('#find_id').fadeIn(300);
	}
	function findpass(){
		document.getElementById('find_id').reset();
		$('#find_id').hide(0);
		$('#pass_button').hide(0);
		$('#id_button').show(0);
		$('#find_pass').fadeIn(300);
	}
	function findcancle(){
		document.getElementById('find_id').reset();
		document.getElementById('find_pass').reset();
		logshow();
	}