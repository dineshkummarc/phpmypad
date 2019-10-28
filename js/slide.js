	//임시 슬라이드
	var pagenum = 1;
	var pm1;
	var pm2;
	var pm3;
	var pm4;
	var pm5;
	$(document).ready(function(){
		pagemove1();
	});
	function pageleft(){
		if(pagenum == 1){
			pagemove5();
		}
		else if(pagenum == 2){
			pagemove1();
		}
		else if(pagenum == 3){
			pagemove2();
		}
		else if(pagenum == 4){
			pagemove3();
		}
		else if(pagenum == 5){
			pagemove4();
		}
		else return;
	}
	function pageright(){
		if(pagenum == 1){
			pagemove2();
		}
		else if(pagenum == 2){
			pagemove3();
		}
		else if(pagenum == 3){
			pagemove4();
		}
		else if(pagenum == 4){
			pagemove5();
		}
		else if(pagenum == 5){
			pagemove1();
		}
		else return;
	}
	function pagemove1(){
		$('#slidepage').stop();
		$('#slidepage').animate({marginLeft:0}, 500);
		$('#pagebtnow').animate({marginLeft:5}, 0);
		pagenum = 1;
		pm1 = setTimeout("pagemove2()", 3000);
		clearTimeout(pm2);
		clearTimeout(pm3);
		clearTimeout(pm4);
		clearTimeout(pm5);
	}
	function pagemove2(){
		$('#slidepage').stop();
		$('#slidepage').animate({marginLeft:-1000}, 500);
		$('#pagebtnow').animate({marginLeft:25}, 0);
		pagenum = 2;
		pm2 = setTimeout("pagemove3()", 3000);
		clearTimeout(pm1);
		clearTimeout(pm3);
		clearTimeout(pm4);
		clearTimeout(pm5);
	}
	function pagemove3(){
		$('#slidepage').stop();
		$('#slidepage').animate({marginLeft:-2000}, 500);
		$('#pagebtnow').animate({marginLeft:45}, 0);
		pagenum = 3;
		pm3 = setTimeout("pagemove4()", 3000);
		clearTimeout(pm1);
		clearTimeout(pm2);
		clearTimeout(pm4);
		clearTimeout(pm5);
	}
	function pagemove4(){
		$('#slidepage').stop();
		$('#slidepage').animate({marginLeft:-3000}, 500);
		$('#pagebtnow').animate({marginLeft:65}, 0);
		pagenum = 4;
		pm4 = setTimeout("pagemove5()", 3000);
		clearTimeout(pm1);
		clearTimeout(pm2);
		clearTimeout(pm3);
		clearTimeout(pm5);
	}
	function pagemove5(){
		$('#slidepage').stop();
		$('#slidepage').animate({marginLeft:-4000}, 500);
		$('#pagebtnow').animate({marginLeft:85}, 0);
		pagenum = 5;
		pm5 = setTimeout("pagemove1()", 3000);
		clearTimeout(pm1);
		clearTimeout(pm2);
		clearTimeout(pm3);
		clearTimeout(pm4);
	}