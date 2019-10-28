<?
	include_once '../include/dbcon.php';
	include_once '../include/top.php';
	ini_set("session.cache_expire", 7200);
	ini_set("session.gc_maxlifetime", 3600);
	session_start();
	if(!isset($_SESSION['id'])){
		echo "<script>
			alert('비정상적인 접근입니다. 로그인 후 사용해 주세요');
			document.location.replace('../welcome.php');
		</script>";
	}
	$id = $_SESSION['id'];
?>
	<title> MYPAD - Member </title>
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
		<?=$id?>님 환영합니다.
		<a href='../logout.php'>로그아웃</a>
	</div>
</header>

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
