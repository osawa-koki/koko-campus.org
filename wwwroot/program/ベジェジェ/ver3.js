"use strict";

window.addEventListener("load", () => {
	put_lines();
	put_path();
	add();
	cv();
	document.getElementById("v3-button").addEventListener("click", go);
	document.getElementById("v3-range").addEventListener("input", put_lines);
	document.getElementById("v3-dense").addEventListener("input", dense);
	document.getElementById("v3-size").addEventListener("input", function() {
		let dx = (document.getElementById("main").clientWidth - 330) / 10;
		let x = document.getElementById("v3-svg");
		let o = 300 + dx * this.value;
		x.setAttribute("width", o);
		x.setAttribute("height", o);
		x.setAttribute("viewBox", `0 0 ${o} ${o}`);
		size = o;
		put_lines();
	});
});
let size = 300;
function add() {
	let qp = [
		[0, size],
		[50, size - 200],
		[size - 50, size - 100],
		[size, 0],
	]
	for (let i = 0; i < 4; i++) {
		let g = document.createElementNS("http://www.w3.org/2000/svg", "g");
		let t = document.createElementNS("http://www.w3.org/2000/svg", "text");
		let p;
		let c = document.createElementNS("http://www.w3.org/2000/svg", "circle");
		p = {
			"r" : 10,
			"cx" : 0,
			"cy" : 0,
		};
		for (let k in p) {
			c.setAttribute(k, p[k]);
		}
		c.style.fill = "yellow";
		c.style.stroke = "black";
		c.style.strokeWidth = "1";
		p = {
			"x" : -5,
			"y" : 5,
		};
		for (let k in p) {
			t.setAttribute(k, p[k]);
		}
		t.textContent = i + 1;
		g.appendChild(c);
		g.appendChild(t);
		g.setAttribute("transform", `translate(${qp[i][0]}, ${qp[i][1]})`);
		g.addEventListener("mousedown", md, false);
		g.addEventListener("mouseup", mu, false);
		g.addEventListener("mouseleave", mu, false);
		document.getElementById("v3-svg_tx").appendChild(g);
	}
}
function dense() {
	Array.from(document.getElementById("v3-svg_ls").getElementsByTagName("line")).forEach(e => {
		e.style.stroke = `rgba(0, 0, 0, ${0.1 * document.getElementById("v3-dense").value * 0.5})`;
	});
}
function md(e) {
	e.preventDefault();
	this.firstElementChild.setAttribute("r", 15);
	this.addEventListener("mousemove", mm, false);
	ers("v3-svg_sh");
}
function mm(e) {
	e.preventDefault();
	this.setAttribute("transform", `translate(${e.offsetX}, ${e.offsetY})`);
	cv();
}
function mu(e) {
	e.preventDefault();
	this.removeEventListener("mousemove", mm, false);
	this.firstElementChild.setAttribute("r", 10);
}
function put_lines() {
	ers("v3-svg_ls");
	let x = document.getElementById("v3-svg_ls");
	let r = parseInt(document.getElementById("v3-range").value);
	for (let i = 0; i < size; i = i + size / r) {
		let h, v;
		h = document.createElementNS("http://www.w3.org/2000/svg", "line");
		v = document.createElementNS("http://www.w3.org/2000/svg", "line");
		h.setAttribute("x1", 0);
		h.setAttribute("x2", size);
		["y1", "y2"].forEach(j => {
			h.setAttribute(j, i);
		});
		v.setAttribute("y1", 0);
		v.setAttribute("y2", size);
		["x1", "x2"].forEach(j => {
			v.setAttribute(j, i);
		});
		[h, v].forEach(k => {
			k.style.stroke = "rgba(0, 0, 0, 0.3)";
			k.style.strokeWidth = "1";
		});
		x.appendChild(h);
		x.appendChild(v);
		dense();
	}
}
function put_path() {
	let z = document.getElementById("v3-svg_nr");
	let x = document.createElementNS("http://www.w3.org/2000/svg", "path");
	x.setAttribute("id", "v3-path");
	x.style.stroke = "#00FFFF";
	x.style.strokeWidth = "3";
	x.style.fill = "none";
	z.appendChild(x);
}
function cv() {
	let p = [];
	let z = Array.from(document.getElementById("v3-svg_tx").getElementsByTagName("g"));
	for (let i = 0; i < z.length; i++) {
		let tr = z[i].getAttribute("transform");
		let q = [];
		q.push(tr.match(/\d+\.?\d*/g)[0]);
		q.push(tr.match(/\d+\.?\d*/g)[1]);
		p.push(q.join(" "));
	}
	document.getElementById("v3-path").setAttribute("d", `m${p[0]} C ${p.slice(1, 2 + 1).join(", ")}, ${p[3]}`);
	return p;
}
function go() {
	this.removeEventListener("click", go);
	this.addEventListener("click", pause);
	this.textContent = "一時停止";
	Array.from(document.getElementById("v3-svg_tx").getElementsByTagName("g")).forEach(e => {
		e.removeEventListener("mousedown", md);
	});
	cv();
	rd(get_ary());
}
function get_ary() {
	let z = [];
	let qp = Array.from(document.getElementById("v3-svg_tx").getElementsByTagName("g"));
	qp.forEach(e => {
		let tr = e.getAttribute("transform").match(/\d+\.?\d*/g);
		z.push([parseInt(tr[0]), parseInt(tr[1])]);
	});
	return z;
}
function pause() {
	clearInterval(intervalId);
	this.removeEventListener("click", pause);
	this.addEventListener("click", restart);
	this.textContent = "再実行"
}
function restart() {
	this.removeEventListener("click", restart);
	this.addEventListener("click", pause);
	this.textContent = "一時停止"
	rd(get_ary(), false);
}
let intervalId;
let count;
function rd(ary, bl = true) {
	let e, iv, real_speed, interval, speed, zz;
	iv = document.getElementById("v3-interval").value;
	real_speed = (11 - document.getElementById("v3-speed").value) * 1000;
	interval = 50 + (5 - iv) * 5;
	speed = real_speed / interval;
	if (bl) {
		zz = document.getElementById("v3-svg_sh");
		e = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		e.setAttribute("points", ary.map(j => j.join(",")).join(" "));
		zz.appendChild(e);
		for (let i = 0; i < ary.length; i++) {
			e = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			zz.appendChild(e);
		}
		document.getElementById("v3-now").classList.add("ok");
		let tr = document.getElementById("v3-svg_tx").getElementsByTagName("g")[0].getAttribute("transform").match(/\d+\.?\d*/g);
		document.getElementById("v3-now").setAttribute("cx", tr[0]);
		document.getElementById("v3-now").setAttribute("cy", tr[1]);
		count = 0;
	}
	intervalId = setInterval(() => {
		rd2(ary, count / speed);
		count++;
		if(count > speed) {　
			clearInterval(intervalId);
			document.getElementById("v3-now").classList.remove("ok");
			document.getElementById("v3-now").setAttribute("cx", "-10");
			document.getElementById("v3-now").setAttribute("cy", "-10");
			document.getElementById("v3-button").removeEventListener("click", pause);
			document.getElementById("v3-button").addEventListener("click", go);
			document.getElementById("v3-button").textContent = "実行";
			Array.from(document.getElementById("v3-svg_tx").getElementsByTagName("g")).forEach(e => {
				e.addEventListener("mousedown", md, false);
			});
		}
	}, interval);
}
function rd2 (ary, ppn) {
	let z;
	if (ary.length !== 1) {
		try {
			z = document.getElementById("v3-svg_sh").getElementsByTagName("polyline")[5 - ary.length];
			let list = [];
			for (let i = 0; i < ary.length - 1; i++) {
				let x = (ary[i + 1][0] - ary[i][0]) * ppn + ary[i][0];
				let y = (ary[i + 1][1] - ary[i][1]) * ppn + ary[i][1];
				list.push([x, y]);
			}
			z.setAttribute("points", list.map(j => j.join(",")).join(" "));
			if (ary.length === 2) {
				document.getElementById("v3-now").setAttribute("cx", list[0][0]);
				document.getElementById("v3-now").setAttribute("cy", list[0][1]);
			}
			rd2(list, ppn);
		} catch (e) {}
	}
}
function rnd(x) {
	return Math.round(x * 100) / 100;
}
function ers(arg) {
	const x = document.getElementById(arg);
	while(x.firstChild){
		x.removeChild(x.firstChild);
	}
}