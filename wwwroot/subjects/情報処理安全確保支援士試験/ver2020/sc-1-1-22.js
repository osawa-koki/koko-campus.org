"use strict";







window.addEventListener("load", function() {
	let c = document.getElementById("ssl_comment").getElementsByTagName("p");
	for (let i = 0; i < c.length; i++) {
		c[i].classList.add("hidden");
	}
	let last;
	let last_ok = 0;
	let count = -1;
	const t = document.getElementById("ttl");
	const arw = document.getElementsByClassName("arw");
	const w = [
		"Client Hello",
		"Server Hello",
		"Certificate",
		"Server Key Exchange",
		"Certificate Request",
		"Server Hello Done",
		"Certificate",
		"Client Key Exchange",
		"Certificate Verify",
		"Change Cipher Spec",
		"Finished",
		"Change Cipher Spec",
		"Finished"
	];
	document.getElementById("ssl_btn").addEventListener("click", function() {
		document.getElementById("ssl_comment").classList.remove("hidden");
		count++;
		console.log(count)
		if (count.toString().match(/0|6|7|8|9|10/)) {
			arw[1].style.fill = "#ffffff";
			arw[0].style.fill = "#00FFFF";
			console.log("a")
		} else {
			arw[0].style.fill = "#ffffff";
			arw[1].style.fill = "#00FF00";
		}
		t.textContent = `${count + 1}-${w[count]}`;
		c[count].classList.remove("hidden");
		if (last_ok === 1) {
			last.classList.add("hidden");
		} else {
			last_ok = 1;
		}
		last = c[count];
		if (count === 12) {
			count = -1;
		}
	});
});














