"use strict";

window.addEventListener("load", () => {
	put_lines();
	put_path();
	add();
	cv();
	document.getElementById("v2-button").addEventListener("click", go);
});
function add() {
	let qp = [
		[0, 300],
		[50, 100],
		[250, 200],
		[300, 0],
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
		g.addEventListener("touchstart", md, false);
		g.addEventListener("mouseup", mu, false);
		g.addEventListener("touchend", mu, false);
		g.addEventListener("mouseleave", mu, false);
		g.addEventListener("touchleave", mu, false);
		document.getElementById("v2-svg_tx").appendChild(g);
	}
}

function md(e) {
	e.preventDefault();
	this.setAttribute("r", 12);
	this.addEventListener("mousemove", mm, false);
	this.addEventListener("touchmove", mm, false);
	const zz = document.getElementById("v2-svg_sh");
	while(zz.firstChild){
		zz.removeChild(zz.firstChild);
	}
}
function mm(e) {
	e.preventDefault();
	const rect = document.getElementById("v2-svg").getBoundingClientRect();
	let x = (e.type === "mousemove") ? e.offsetX : (e.touches[0].clientX - window.pageXOffset - rect.left);
	let y = (e.type === "mousemove") ? e.offsetY : (e.touches[0].clientY - window.pageYOffset - rect.top);
	this.setAttribute("transform", `translate(${x}, ${y})`);
	cv();
}
function mu(e) {
	e.preventDefault();
	this.removeEventListener("mousemove", mm, false);
	this.removeEventListener("touchmove", mm, false);
	this.setAttribute("r", 10);
}
function put_lines() {
	let x = document.getElementById("v2-svg_ls");
	for (let i = 0; i < 300; i = i + 25) {
		let h, v;
		h = document.createElementNS("http://www.w3.org/2000/svg", "line");
		v = document.createElementNS("http://www.w3.org/2000/svg", "line");
		h.setAttribute("x1", 0);
		h.setAttribute("x2", 300);
		["y1", "y2"].forEach(j => {
			h.setAttribute(j, i);
		});
		v.setAttribute("y1", 0);
		v.setAttribute("y2", 300);
		["x1", "x2"].forEach(j => {
			v.setAttribute(j, i);
		});
		[h, v].forEach(k => {
			k.style.stroke = "#C0C0C0";
			k.style.strokeWidth = "1";
		});
		x.appendChild(h);
		x.appendChild(v);
	}
}
function put_path() {
	let z = document.getElementById("v2-svg_nr");
	let x = document.createElementNS("http://www.w3.org/2000/svg", "path");
	x.setAttribute("id", "v2-path");
	x.style.stroke = "#00FFFF";
	x.style.strokeWidth = "3";
	x.style.fill = "none";
	z.appendChild(x);
}
function cv() {
	let p = [];
	let z = Array.from(document.getElementById("v2-svg_tx").getElementsByTagName("g"));
	for (let i = 0; i < z.length; i++) {
		let tr = z[i].getAttribute("transform");
		let q = [];
		q.push(tr.match(/\d+\.?\d*/g)[0]);
		q.push(tr.match(/\d+\.?\d*/g)[1]);
		p.push(q.join(" "));
	}
	document.getElementById("v2-path").setAttribute("d", `m${p[0]} C ${p.slice(1, 2 + 1).join(", ")}, ${p[3]}`);
	return p;
}
function go() {
	cv(); //省略可(一応)
	let z = [];
	let qp = Array.from(document.getElementById("v2-svg_tx").getElementsByTagName("g"));
	qp.forEach(e => {
		let tr = e.getAttribute("transform").match(/\d+\.?\d*/g);
		z.push([parseInt(tr[0]), parseInt(tr[1])]);
	});
	rd(z);
}
function rd(ary) {
	let e;
	const speed = 100;
	const interval = 50;
	const zz = document.getElementById("v2-svg_sh");
	e = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
	e.setAttribute("points", ary.map(j => j.join(",")).join(" "));
	zz.appendChild(e);
	for (let i = 0; i < ary.length; i++) {
		e = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		zz.appendChild(e);
	}
	document.getElementById("v2-now").classList.add("ok");
	let tr = document.getElementById("v2-svg_tx").getElementsByTagName("g")[0].getAttribute("transform").match(/\d+\.?\d*/g);
	document.getElementById("v2-now").setAttribute("cx", tr[0]);
	document.getElementById("v2-now").setAttribute("cy", tr[1]);
	let count = 0;
	const intervalId = setInterval(() => {
		rd2(ary, count / speed);
		count++;
		if(count > speed) {　
			clearInterval(intervalId);
			document.getElementById("v2-now").classList.remove("ok");
			document.getElementById("v2-now").setAttribute("cx", "-10");
			document.getElementById("v2-now").setAttribute("cy", "-10");
		}
	}, interval);
}
function rd2 (ary, ppn) {
	let z;
	if (ary.length !== 1) {
		try {
			z = document.getElementById("v2-svg_sh").getElementsByTagName("polyline")[5 - ary.length];
			let list = [];
			for (let i = 0; i < ary.length - 1; i++) {
				let x = (ary[i + 1][0] - ary[i][0]) * ppn + ary[i][0];
				let y = (ary[i + 1][1] - ary[i][1]) * ppn + ary[i][1];
				list.push([x, y]);
			}
			z.setAttribute("points", list.map(j => j.join(",")).join(" "));
			if (ary.length === 2) {
				document.getElementById("v2-now").setAttribute("cx", list[0][0]);
				document.getElementById("v2-now").setAttribute("cy", list[0][1]);
			}
			rd2(list, ppn);
		} catch (e) {}
	}
}
function rnd(x) {
	return Math.round(x * 100) / 100;
}