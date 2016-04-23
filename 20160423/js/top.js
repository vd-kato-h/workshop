$(document).ready(function() {
	
	var long1 = ($("#wrapper").width() - $(".mover").width());
	var long2 = ($("#wrapper").height() - $(".mover").height());

	var long3 = ($(".mover").width() - $(".mover2").width());
	var long4 = ($(".mover").height() - $(".mover2").height());
	
	function func1(){
		$(".mover").animate({left:long1},1000,"linear",function(){
			$(".mover").animate({top:long2},1000,"linear",function(){
				$(".mover").animate({left:0},1000,"linear",function(){
					$(".mover").animate({top:0},1000,"linear",function(){
						
						func1();
						
					});
				});
			});
		});
	}

	func1();
	
	function func2(){
		$(".mover2").animate({left:long3},1000,"linear",function(){
			$(".mover2").animate({top:long4},1000,"linear",function(){
				$(".mover2").animate({left:0},1000,"linear",function(){
					$(".mover2").animate({top:0},1000,"linear",function(){
						
						func2();
						
					});
				});
			});
		});
	}

	func2();
	
	var valInterval;
	
	function getVal(){
		valInterval = setInterval(function(){
					$(".value").html("blue_leftPos = "+$(".mover").css("left")+"<br>"+
														"blue_topPos = "+$(".mover").css("top")+"<br>"+
														"green_leftPos = "+$(".mover2").css("left")+"<br>"+
														"green_topPos = "+$(".mover2").css("top")+"<br>"
														);
				},70);
	
	}
	
	getVal();
	
	$("#clearInterval").click(function() {
		$(".value").html("値取得終了");
		clearInterval(valInterval);
		$(this).fadeOut(1000);
	});
});