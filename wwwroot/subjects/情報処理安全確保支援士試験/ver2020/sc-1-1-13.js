"use strict";







let go_on = 0;
let ds_count = -1;
window.addEventListener("load", function() {
	const num0 = document.getElementsByClassName("num0");
	const num1 = document.getElementsByClassName("num1");
	const num2 = document.getElementsByClassName("num2");
	const num3 = document.getElementsByClassName("num3");
	const num4 = document.getElementsByClassName("num4");
	const d = document.getElementsByClassName("d");
	for (let i = 0; i < d.length; i++) {
		d[i].style.fill = "none";
		d[i].style.stroke = "none";
	}
	document.getElementById("ds_button").addEventListener("click", function() {
		if (go_on === 0) {
			ds_count += 1;
			go_on = 1;
			switch (ds_count) {
				case 0:
					document.getElementById("arw0").style.fill = "#00FF00";
					document.getElementById("box1").style.fill = "#FFFF00";
					document.getElementById("box1").style.stroke = "#000000";
					$$("ico_hash").move(53, 55, function() {go_on = 0;});
					break;
				case 1:
					document.getElementById("arw0").style.fill = "none";
					$$("box1").move(49, 65);
					$$("ico_hash").move(53, 72, function() {
						document.getElementById("arw1").style.fill = "#00FF00";
						$$("s_key").move(56, 64, function() {
							document.getElementById("box1").style.fill = "#9966FF";
							go_on = 0;
						})
					});
					break;
				case 2:
					document.getElementById("arw1").style.fill = "none";
					document.getElementById("arw2").style.fill = "#00FF00";
					document.getElementById("arw3").style.fill = "#00FF00";
					$$("ico_hash").move(25, 50);
					$$("s_key").move(30, 43);
					$$("box1").move(21.5, 42, function() {
						document.getElementById("box2").style.stroke = "#000000";
						document.getElementById("box2").style.fill = "#FF00FF";
						$$("p_key").move(33, 48, function() {
							document.getElementById("arw2").style.fill = "none";
							document.getElementById("arw3").style.fill = "none";
							go_on = 0;
						});
					});
					break;
				case 3:
					document.getElementById("arw4").style.fill = "#00FF00";
					$$("doc").move(128, 25);
					$$("box1").move(128, 38);
					$$("box2").move(128, 46);
					$$("ico_hash").move(130.5, 44);
					$$("s_key").move(135, 37.5);
					$$("p_key").move(136, 44, function() {
						document.getElementById("arw4").style.fill = "none";
						go_on = 0;
					})
					break;
				case 4:
					$$("doc").move(115, 25);
					$$("box1").move(135, 28);
					$$("box2").move(135, 34);
					$$("ico_hash").move(137.5, 34);
					$$("s_key").move(142, 27.5);
					$$("p_key").move(143, 33, function() {
						go_on = 0;
					});
					break;
				case 5:
					document.getElementById("arw5").style.fill = "#00FF00";
					document.getElementById("box3").style.fill = "#ffff00";
					document.getElementById("box3").style.stroke = "#000000";
					$$("ico_hash0").move(118, 67.5, function() {
						go_on = 0;
					});
					break;
				case 6:
					document.getElementById("arw6").style.fill = "#00ff00";
					$$("box1").move(135, 60);
					$$("ico_hash").move(137.5, 67);
					$$("s_key").move(142, 60, function() {
						go_on = 0;
					});
					break;
				case 7:
					$$("box2").move(70, 10, false, 200);
					$$("p_key").move(80, 10, function() {
						$$("box2").move(170, 80);
						$$("p_key").move(170, 80);
						setTimeout(function() {
							$$("s_key").move(-10, 40, false, 50);
							document.getElementById("box1").style.fill = "#ffff00";
							document.getElementById("arw5").style.fill = "none";
							document.getElementById("arw6").style.fill = "none";
							go_on = 0;
						}, 600)
					}, 200);
					break;
			}
		}
	})
})

/*
function move_path(doc, x, y) {
	let now = doc.getAttribute("d");
	let x_now = now.match(/\d+(?=,)/);
	let y_now = now.match(/(?<=,)\d+/);
	now = now.replace(/m\s\d+,\d+\s/, "");

	let count = 0;
	var interval_id = setInterval(() => {
		count += 1;
		doc0.setAttribute("x", num * count / 100 + now);
		if (count > 100) {
			clearInterval(interval_id);
		}
	}, 10)
}
*/















