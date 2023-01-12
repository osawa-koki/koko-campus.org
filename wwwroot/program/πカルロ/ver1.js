"use strict";

let interval,
	g = [],
	inc = 0,
	outc = 0,
	both = 0;
const svg = document.getElementById("v1-svg"),
	ind = document.getElementById("v1-in"),
	outd = document.getElementById("v1-out"),
	in_ppn = document.getElementById("v1-ppn1"),
	out_ppn = document.getElementById("v1-ppn0"),
	pai = document.getElementById("v1-pai");

const main = () => {
	let gr;
	["ls", "cr", "pt"].forEach(e => {
		gr = document.createElementNS("http://www.w3.org/2000/svg", "g");
		gr.id = `v1-svg_${e}`;
		g.push(gr);
		svg.appendChild(gr);
	});
	//g[0]は一旦保留
	(function() { //g[1]の処理
		let c = document.createElementNS("http://www.w3.org/2000/svg", "circle"),
			sp = {
				"r" : "50",
				"cx" : "50",
				"cy" : "50",
			},
			k;
		for (k in sp) {
			c.setAttribute(k, sp[k]);
		}
		g[1].appendChild(c); //v1-svg_cr[1]に格納されているsvgグループに追加
	})();
	document.getElementById("v1-button").addEventListener("click", run);
}
const run = function() {
	this.removeEventListener("click", run);
	this.addEventListener("click", pause);
	this.textContent = "一時停止";
	interval = setInterval(() => {
		let e = document.createElementNS("http://www.w3.org/2000/svg", "circle"),
			x,
			y,
			c,
			a;
		x = get_random();
		y = get_random();
		e.setAttribute("r", "0.3");
		e.setAttribute("cx", x);
		e.setAttribute("cy", y);
		c = Math.sqrt((x - 50) ** 2 + (y - 50) ** 2);
		if (c < 50) {
			e.style["fill"] = "red";
			inc++;
			ind.textContent = inc;
		} else {
			e.style["fill"] = "blue";
			outc++;
			outd.textContent = outc;
		}
		both++;
		in_ppn.textContent = (inc / both * 100).toFixed(5);
		out_ppn.textContent = (outc / both * 100).toFixed(5);
		a = (4 * (inc / both));
		pai.textContent = a;
		g[2].appendChild(e);
	}, 5);
}
const pause = function() {
	this.addEventListener("click", run);
	this.removeEventListener("click", pause);
	this.textContent = "再開";
	clearInterval(interval);
}
const get_random = () => {
	return Math.random() * 100;
}
window.addEventListener("load", () => {
	main();
});