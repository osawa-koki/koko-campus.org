"use strict";

let interval,
	g = [],
	ary = [];
const svg = document.getElementById("v1-svg");

const main = () => {
	let gr;
	["me", "you", "who"].forEach(e => {
		gr = document.createElementNS("http://www.w3.org/2000/svg", "g");
		gr.id = `v1-svg_${e}`;
		g.push(gr);
		svg.appendChild(gr);
	});
	(function() { //g[0]の処理
		let l,
			sp,
			i;
		for (i = 0; i <= 100; i = i + 10) {
			l = document.createElementNS("http://www.w3.org/2000/svg", "path");
			l.setAttribute("d", `m 92.97857206,166.3159945 -53.15699797,2.7494999 c 2.0620922,-21.0890502 -0.2797932,-43.4446132 19.4756243,-62.3219977 0,0 -17.5342671,-14.62904422 -17.4134994,-24.97462409 0.1475306,-12.6382203 13.7107089,-27.3684305 26.34937407,-27.265874 12.9680386,0.1052291 26.276951,15.4465398 26.578499,28.411499 0.2519528,10.83263417 -21.0794992,24.74549909 -21.0794992,24.74549909 22.0235496,13.8042361 19.2464992,58.6559978 19.2464992,58.6559978 z`);
			g[0].appendChild(l);
			ary.push(i);
		}
	})();
	//g[1]の処理はなし
	document.getElementById("v1-button").addEventListener("click", run);
}
const run = function() {
	this.removeEventListener("click", run);
	this.addEventListener("click", pause);
	this.textContent = "一時停止";
	interval = setInterval(() => {
		let e = document.createElementNS("http://www.w3.org/2000/svg", "polyline"),
			x,
			y,
			r,
			dx,
			dy,
			xx,
			yy,
			c,
			a,
			deg,
			bool_check = false;
		x = get_random(100);
		y = get_random(100);
		r = 5;
		(function() { //yは三角関数を用いて算出
			deg = get_random(360);
			dx = Math.cos(Math.PI / 180 * deg) * r;
			dy = Math.sin(Math.PI / 180 * deg) * r;
			xx = x + dx;
			yy = y + dy;
			ary.forEach(e => {
				if (inRange(e, y, yy)) {
					bool_check = true;
				}
			});
			if (bool_check) {
				e.style["stroke"] = "red";
				inc++;
				ind.textContent = inc;
			} else {
				e.style["stroke"] = "blue";
				outc++;
				outd.textContent = outc;
			}
			in_ppn.textContent = (inc / both * 100).toFixed(5);
			out_ppn.textContent = (outc / both * 100).toFixed(5);
		})();
		e.setAttribute("points", `${x} ${y}, ${xx} ${yy}`);
		c = Math.sqrt((x - 50) ** 2 + (y - 50) ** 2);
		both++;
		a = both / inc;
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
const get_random = (x) => {
	return Math.random() * x;
}
const inRange = (x, min, max) => {
	return ((x - min) * (x - max) <= 0);
}
window.addEventListener("load", () => {
	main();
});