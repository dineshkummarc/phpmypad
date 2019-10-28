<?
	include_once '../include/top.php';
?>
	<title> MYPAD - Guest </title>
	<link rel='stylesheet' href='../css/main.css'/>
	<!--<link rel='stylesheet' href='../css/css.css'/>-->
	<script src='../js/main.js'></script>
	<!--<script src='../js/slide.js'></script>-->
</head>
<body>

<div id='loading'>
	<div>
		<img alt='loading' src='../img/loading.gif'/>
		<h1>Now Loading...</h1>
	</div>
</div>

<header>
	<div id='log_info'>
		Guest 님 환영합니다. <span onClick='guestTomember()'>회원으로 로그인</span>
	</div>
	<form id='login_bar' name='login' method='post' onSubmit='loginCheck(); return false;' action='../login.php'>
		<input type='text' id='login_id' name='id' maxlength='10' placeholder='아이디'/>
		<input type='password' id='login_password' name='password' maxlength='20' placeholder='비밀번호'/>
		<input type='submit' value='로그인'/>
	</form>
</header>
<script src='../js/check.js'></script>

<div id='pad'>
	<div id='screen'>
		<div id='top_bar'>
			<p id='clock'></p>
		</div>
		<script>
			//시계작동
			function timer(){
				var date = new Date();
				var hour = date.getHours();
				var ampm = (hour < 12||hour == 24 )?'AM':'PM';
					hour = hour % 12||12;
				var minute = date.getMinutes();
					minute = (minute > 9) ? minute : '0' + minute;
				var timeVal = hour + ':' + minute + "<sapn id='ampm'>" + ampm + '</span>';
				return timeVal;
			}
			function get_timer(){
				document.getElementById('clock').innerHTML = timer();
				setTimeout('get_timer()', 1000);
			}
			$(document).ready(function(){
				get_timer();
			});
		</script>
		
		<div id='slidescreen'>
			<div id='slidepage'>
				<?
				
				
				?>
			</div>
		</div>
		<div id='bottom_bar'>
		</div>
	</div>
</div>
<?
	include_once '../include/footer.php';
?>

</body>
</html>
