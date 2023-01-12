"use strict";





window.addEventListener("load" ,function() {
	const curve = document.getElementById("curve");
	let x = new Array;
	let y = new Array;
	for (let i = 1; i < 101; i++) {
		x.push(i + 20);
		y.push(100 - (i * (i - 1) / 2));
	}
	let xy = "";
	for (let i = 0; i < 100; i++) {
		xy += (x[i] + " " + y[i] + " ");
	}
	curve.setAttribute("points", xy);
})
















