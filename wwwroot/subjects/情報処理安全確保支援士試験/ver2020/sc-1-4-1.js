"use strict";






window.addEventListener("load", function() {
	let x = 0;
	let y = 5;
	const d = document.querySelectorAll("#v-model_div > div:not(.arrow)");
	for (let i = 0; i < d.length; i++) {
		d[i].style.left = x + "%";
		d[i].style.top = y + "%";
		if (i < 5) {
			x += 5;
			y += 15;
			d[i].style.backgroundColor = "#FFFF99";
		} else if (i === 5) {
			x += 28; // 30だとぎりぎりはみ出る、、、
			y -= 15;
			d[i].style.backgroundColor = "#CCFF99";
			d[i].style.width = "50%"
		} else if (5 < i) {
			x += 5;
			y -= 15;
			d[i].style.backgroundColor = "#FFCCFF";
		}
	}
})





/*
// システムを分割する用のjs
// レンダリングの調整が懇談であるため注視
window.addEventListener("load", function() {
	const adjust = 5; // レンダリング調整用
	const s = document.getElementById("sword");
	const b4 = s.getAttribute("d");
	s.addEventListener("touchstart", function(e) {
	}, {passive: true})
	s.addEventListener("touchmove", function(e) {
		console.log(e.touches);
		this.setAttribute("d", this.getAttribute("d").replace(/(?<=m\s)\d*\.*\d*\,\d*\.*\d*(?=\d*)/, `${e.touches[0].clientX/adjust},${e.touches[0].clientY/adjust}`))
	}, {passive: true})
	s.addEventListener("touchend", function(e) {
		//this.setAttribute("d", b4);
	}, {passive: true})
})
*/






