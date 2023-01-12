"use strict";

let interval,
	g = [],
	inc = 0,
	outc = 0,
	both = 0,
	d_in,
	d_out,
	count = 3,
	ary = [];
const svg = document.getElementById("v1-svg"),
	gon = document.getElementById("v1-gon"),
	ind = document.getElementById("v1-in"),
	outd = document.getElementById("v1-out"),
	pai = document.getElementById("v1-pai"),
	gon_show = Array.from(document.getElementsByClassName("v1-gon")),
	min = document.getElementById("v1-min"),
	max = document.getElementById("v1-max");

const main = () => {
	let gr;
	["ls", "cr", "pt"].forEach(e => {
		gr = document.createElementNS("http://www.w3.org/2000/svg", "g");
		gr.id = `v1-svg_${e}`;
		g.push(gr);
		svg.appendChild(gr);
	});
	(function() { //g[0]の処理
		let txt = document.createElementNS("http://www.w3.org/2000/svg", "text");
		txt.textContent = "r = 25";
		txt.setAttribute("x", "85");
		txt.setAttribute("y", "95");
		g[0].appendChild(txt);
	})();
	(function() { //g[1]の処理
		let c;
		c = document.createElementNS("http://www.w3.org/2000/svg", "circle");
		c.setAttribute("r", "25");
		c.setAttribute("cx", "50");
		c.setAttribute("cy", "50");
		g[1].appendChild(c);
		c = document.createElementNS("http://www.w3.org/2000/svg", "circle");
		c.setAttribute("r", "0.1");
		c.setAttribute("cx", "50");
		c.setAttribute("cy", "50");
		g[1].appendChild(c);
	})();
	(function() { //g[2]の処理
		let rt = calc_d(count);
		d_out = document.createElementNS("http://www.w3.org/2000/svg", "path");
		d_out.setAttribute("d", `M ${rt["points"]["out"]} Z`);
		g[2].appendChild(d_out);
		d_in = document.createElementNS("http://www.w3.org/2000/svg", "path");
		d_in.setAttribute("d", `M ${rt["points"]["in"]} Z`);
		g[2].appendChild(d_in);
		gon_show.forEach(e => {
			e.textContent = count;
		});
		ind.textContent = (Math.round(rt["length"]["in"] * 10000) / 10000).toFixed(4);
		outd.textContent =  (Math.round(rt["length"]["out"] * 10000) / 10000).toFixed(4);
		min.textContent = rt["length"]["in"] / 2 / 25;
		max.textContent = rt["length"]["out"] / 2 / 25;
	})();
	document.getElementById("v1-button").addEventListener("click", run);
}
const run = function() {
	count++;
	let i,
		rt = calc_d(count);
	d_out.setAttribute("d", `M ${rt["points"]["out"]} Z`);
	d_in.setAttribute("d", `M ${rt["points"]["in"]} Z`);
	gon_show.forEach(e => {
		e.textContent = count;
	});
	ind.textContent = (Math.round(rt["length"]["in"] * 10000) / 10000).toFixed(4);
	outd.textContent =  (Math.round(rt["length"]["out"] * 10000) / 10000).toFixed(4);
	min.textContent = rt["length"]["in"] / 2 / 25;
	max.textContent = rt["length"]["out"] / 2 / 25;
}
const get_random = (x) => {
	return Math.random() * x;
}
const inRange = (x, min, max) => {
	return ((x - min) * (x - max) <= 0);
}
const calc_d = gon => {
	let r = 25,
		theta = 180 / gon,
		answer = {
			"points" : {},
			"length" : {},
		};
	(function() { //外接
		let x = r, //「Math.cos(Math.PI * theta / 180) * r」←これでもうまく行っちゃったけどミス
			y = Math.tan(Math.PI * theta / 180) * x,
			xy,
			len,
			i;
			ary = [];
		for (i = 0; i < gon; i++) {
			xy = rotate(x, y, 360 * i / gon);
			ary.push(`${xy[0] + 50} ${xy[1] + 50}`);
		}
		len = Math.tan(Math.PI * theta / 180) * x * gon * 2;
		answer["points"]["out"] = ary.join(", ");
		answer["length"]["out"] = len;
	})();
	(function() { //内接
		let x = Math.cos(Math.PI * theta / 180) * r,
			y = Math.tan(Math.PI * theta / 180) * x,
			xy,
			len,
			i;
			ary = [];
		for (i = 0; i < gon; i++) {
			xy = rotate(x, y, 360 * i / gon);
			ary.push(`${xy[0] + 50} ${xy[1] + 50}`);
		}
		len = Math.tan(Math.PI * theta / 180) * x * gon * 2;
		answer["points"]["in"] = ary.join(", ");
		answer["length"]["in"] = len;
	})();
	return answer;
}
const rotate = (x, y, deg) => {
	let xx = (Math.cos(Math.PI * deg / 180) * x) - (Math.sin(Math.PI * deg / 180) * y),
		yy = (Math.sin(Math.PI * deg / 180) * x) + (Math.cos(Math.PI * deg / 180) * y);
	return [xx, yy].map(e => Math.round(e * 10000) / 10000);
}
window.addEventListener("load", () => {
	main();
});