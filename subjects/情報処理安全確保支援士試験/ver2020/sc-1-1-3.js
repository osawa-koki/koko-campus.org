"use strict";



window.addEventListener("load", function() {

	fraud();

})



// jqueryのファイルを読み込む
// jqueryのファイルを読み込んでdomでhtml要素として追加してjqを利用できるようになるまでに時間がかかるため、以降のjqを用いる処理に移るためにはsettimeout関数で少し待つ必要がある。
// 次回からはfetch関数を用いるべきかな???
function jq() {

	// 因みに、配列の最後の要素は[-1]で取得できないから「配列.length - 1」で取得する♪(今回は結局使わなかったけど、、、)
	let script = document.getElementsByTagName("script")[0];

	const element = document.createElement("script");
	element.setAttribute("src", "../../jquery-3.6.0.min.js");
	element.setAttribute("charset", "UTF-8");
	element.setAttribute("type", "text/javascript");

	const body = document.getElementsByTagName("body")[0];
	
	body.insertBefore(element, script);
}




function fraud() {

	const box_width = document.getElementById("fraud_triangle").clientWidth;
	document.getElementById("fraud_triangle").style.height = (box_width * 0.9) + "px";

	const inter = document.getElementsByClassName("inter");

	for (let i = 0; i < inter.length; i++) {
		let width = inter[i].clientWidth;
		inter[i].style.height = width + "px";
		inter[i].style.lineHeight = width + "px";
	}
}


let check = 0;
// jq使用
window.addEventListener("load", function() {
	const height_window = window.innerHeight;
	const height_element = $("#fraud_triangle").height();
	const where = $("#fraud_triangle").offset().top;
	window.addEventListener("scroll", function() {
		let top = window.scrollY;
		let bottom = top + height_window;
		let under = height_element + where;

		if (top < under && where < bottom) {
			if (check === 1) {
				check = 2;
				fraud_set();
			}
		} else

		{
			if (check === 0) {
				check = 1;
				fraud_reset();
			}
		}
	})

})
function fraud_set() {
	$("#arrow0").animate({"height": "35%"}, 1000, function() {
		$("#circle0").css("background-color", "#66CCFF");
		$("#arrow1").animate({"height": "45%"}, 1000, function() {
			$("#circle1").css("background-color", "#66CCFF");
			$("#arrow2").animate({"height": "45%"}, 1000, fraud_show);
		})
	});
}
function fraud_show() {
	$("#circle2").css("background-color", "#66CCFF");

	$("#arrow0").animate2({ transform: 'rotate(1470deg)' }, 500).css("height", "70%");
	$("#arrow1").animate2({ transform: 'rotate(1530deg)' }, 500).css("height", "70%");
	$("#arrow2").animate2({ transform: 'rotate(1410deg)' }, 500).css("height", "70%");
	setTimeout(fade_in, 500);
}

function fade_in() {
	$("#word").animate({"opacity": 1, "font-size": "3rem"}, 3000, function() {
		check = 0;
	});
}

function fraud_reset() {
	$(".arrow").css("height", "10%");
	$(".circle").css("background-color", "white");
	$("#word").css("opacity", 0).css("font-size", "1rem");
	$("#arrow0").css("transform", "rotate(0deg)");
	$("#arrow1").css("transform", "rotate(50deg)");
	$("#arrow2").css("transform", "rotate(-50deg)");
}




window.addEventListener("load", function() {
	const width = document.getElementById("main").clientWidth;
	document.getElementById("svg_traffic_light").style.width = width * 0.9;
	document.getElementById("svg_traffic_light").style.height = width * 0.7;

	const light = document.getElementsByClassName("light_body");

	let state = 2;

	for (let i = 0; i < light.length; i++) {
		light[i].addEventListener("click", function() {
			
			if (state === 0) {
				state = 1;
				document.getElementById("light" + 0).style.fill = "#000000";
				document.getElementById("light" + 1).style.fill = "#ffff00";
			} else

			if (state === 1) {
				state = 2;
				document.getElementById("light" + 1).style.fill = "#000000";
				document.getElementById("light" + 2).style.fill = "#ff0000";
			} else

			if (state === 2) {
				state = 0;
				document.getElementById("light" + 2).style.fill = "#000000";
				document.getElementById("light" + 0).style.fill = "#0000ff";
			}
		})
	}




})








$.fn.animate2 = function (properties, duration, ease) {
    ease = ease || 'ease';
    var $this = this;
    var cssOrig = { transition: $this.css('transition') };
    return $this.queue(next => {
        properties['transition'] = 'all ' + duration + 'ms ' + ease;
        $this.css(properties);
        setTimeout(function () {
            $this.css(cssOrig);
            next();
        }, duration);
    });
};












