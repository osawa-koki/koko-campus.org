"use strict";



window.addEventListener("load", function() {
	let ok;
	const h = window.innerHeight / 3;
	let s; // タッチされた時のx座標
	let x; // スワイプ後のx座標
	let sy;
	let yy;
	const b = 70; // スワイプ判定用
	let back = document.getElementById("button_back").getAttribute("href"); // 戻る用のリンク
	const next = document.getElementById("button_next").getAttribute("href"); // 進む用のリンク
	window.addEventListener("touchstart", function(e) {
		s = e.touches[0].clientX;
		sy = e.touches[0].clientY;
		if (e.touches[0].clientY < h) {
			ok = true;
		} else {
			ok = false;
		}
	})
	window.addEventListener("touchmove", function(e) {
		x = e.changedTouches[0].clientX;
		yy = e.changedTouches[0].clientY;
	})
	window.addEventListener("touchend", function(e) {
		if (ok === true && sy + 30 > yy && sy - 30 < yy) {
			if (s + b < x) { // 右にスワイプされたら、、、
				window.location.href = back;
			} else if (x + b < s) { // 左にスワイプされたら、、、
				window.location.href = next;
			}
		}
	})
})





