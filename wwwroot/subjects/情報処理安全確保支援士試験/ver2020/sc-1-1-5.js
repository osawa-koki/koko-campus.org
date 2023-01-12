"use strict";










window.addEventListener("load", function() {
	const word0 = document.getElementById("dic_text0");
	const word1 = document.getElementById("dic_text1");
	const word2 = document.getElementById("dic_text2");
	move0(word0);
	setTimeout(function() {
		move1(word1)
	}, 300)
	setTimeout(function() {
		move2(word2)
	}, 600)


})
let now = 0;
let go_on0 = 1;
let interval_id0;
let dictionary = ["iloveyou", "temp", "sys", "admin", "pw", "pass", "password", "tmp"];
function move0(doc) {
	if (go_on0 === 1) {
		let count = 0;
		interval_id0 = setInterval(() => {
			count += 10;
			doc.setAttribute("x", count);
			if (count > 250) {
				clearInterval(interval_id0);
				move0(doc);
				if (now >= dictionary.length) {
					now = 0;
				}
				doc.textContent = dictionary[now];
				now += 1;
			}
		}, 150)
	}
}
let interval_id1;
function move1(doc) {
	if (go_on0 === 1) {
		let count = 0;
		interval_id1 = setInterval(() => {
			count += 10;
			doc.setAttribute("x", count);
			if (count > 250) {
				clearInterval(interval_id1);
				move1(doc);
				if (now >= dictionary.length) {
					now = 0;
				}
				doc.textContent = dictionary[now];
				now += 1;
			}
		}, 100)
	}
}
let now2 = 0;
let interval_id2;
function move2(doc) {
	if (go_on0 === 1) {
		let count = 0;
		interval_id2 = setInterval(() => {
			count += 10;
			doc.setAttribute("x", count);
			if (count > 250) {
				clearInterval(interval_id2);
				move2(doc);
				if (now >= dictionary.length) {
					now = 0;
				}
				doc.textContent = dictionary[now];
				now += 1;
			}
		}, 200)
	}
}





window.addEventListener("load", function() {
	const word = document.getElementById("brute_pw");
	brute(word);
})
let brute_now = 1;
let go_on1 = 1;
let interval_brute;
function brute(doc) {
	if (go_on1 === 1) {
		let count = 0;
		interval_brute = setInterval(() => {
			count += 10;
			doc.setAttribute("x", count);
			if (count > 300) {
				clearInterval(interval_brute);
				brute(doc);
				doc.textContent = zero_padding(brute_now);
				brute_now += 1;
			}
		}, 100)
	}
}
function zero_padding(num) {
	return ("000" + num).slice(-4);
}


window.addEventListener("load", function() {
	const word = document.getElementById("reverse_id");
	reverse(word);
})
let reverse_now = 1;
let go_on2 = 1;
let interval_reverse;
function reverse(doc) {
	if (go_on2 === 1) {
		let count = 0;
		interval_reverse = setInterval(() => {
			count += 10;
			doc.setAttribute("x", count);
			if (count > 250) {
				clearInterval(interval_reverse);
				reverse(doc);
				doc.textContent = "user" + zero_padding(reverse_now);
				reverse_now += 1;
			}
		}, 100)
	}
}


























""