"use strict";

window.addEventListener("load", () => {
	setup();
	add();
	document.getElementById("v1-button").addEventListener("click", go);
});
function add() {
	for (let i = 2; i <= 3; i++) {
		document.getElementById("v1-end").textContent = i + 1;
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
		t.textContent = i;
		g.appendChild(c);
		g.appendChild(t);
		g.setAttribute("transform", `translate(${rdm()}, ${rdm()})`);
		g.addEventListener("mousedown", md, false);
		g.addEventListener("touchstart", md, false);
		g.addEventListener("mouseup", mu, false);
		g.addEventListener("touchend", mu, false);
		g.addEventListener("mouseleave", mu, false);
		g.addEventListener("touchleave", mu, false);
		document.getElementById("v1-svg_tx").appendChild(g);
	}
	cv();
}

function md(e) {
	e.preventDefault();
	this.setAttribute("r", 12);
	this.addEventListener("mousemove", mm, false);
	this.addEventListener("touchmove", mm, false);
}
function mm(e) {
	e.preventDefault();
	const rect = document.getElementById("v1-svg_tx").getBoundingClientRect();
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
function setup() {
	let x = document.getElementById("v1-svg_ls");
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
	go_nx0(x.parentNode);
}
function go_nx0() {
	let z = document.getElementById("v1-svg_nr");
	let x = document.createElementNS("http://www.w3.org/2000/svg", "path");
	x.setAttribute("id", "v1-path");
	x.style.stroke = "#000000";
	x.style.strokeWidth = "3";
	x.style.fill = "none";
	x.setAttribute("d", "m0 300 C 50 100, 250 200, 300 0");
	z.appendChild(x);
}
let p;
function cv() {
	p = [];
	let z = Array.from(document.getElementById("v1-svg_tx").getElementsByTagName("g"));
	z.forEach(e => {
		let tr = e.getAttribute("transform");
		let q = [];
		q.push(tr.match(/\d+\.?\d*/g)[0]);
		q.push(tr.match(/\d+\.?\d*/g)[1]);
		const r = q.map(x => rnd(parseInt(x)));
		p.push(r.join(" "));
	});
	document.getElementById("v1-path").setAttribute("d", `m0 300 C ${p.join(", ")}, 300 0`);
}
function rnd(x) {
	return Math.round(x * 100) / 100;
}
function rdm() {
	return Math.random() * 300;
}
function go() {
	cv();
	let z = [];
	z.push("0 300");
	p.forEach(e => {
		z.push(e);
	});
	z.push("300 0");
	const zz = z.map(mp => mp.split(" ").map(mmp => parseInt(mmp)));
	Array.from(document.getElementById("v1-svg_tx").getElementsByTagName("g")).forEach(e => {
		e.removeEventListener("mousedown", md);
		e.removeEventListener("touchstart", md);
	});
	let sh = document.getElementById("v1-svg_sh");
	for (let i = 0; i < zz.length - 1; i++) {
		let x = document.createElementNS("http://www.w3.org/2000/svg", "line");
		x.setAttribute("x1", zz[i][0]);
		x.setAttribute("y1", zz[i][1]);
		x.setAttribute("x2", zz[i + 1][0]);
		x.setAttribute("y2", zz[i + 1][1]);
		x.style.stroke = "#008000";
		x.style.strokeWidth = "1";
		sh.appendChild(x);
	}
	rd2(zz);
}
function rd2(ary) {
	for (let i = 0; i < 2; i++) {
		obj(ary[i], ary[i + 1], ary[i + 2], i).move();
	}
	for (let i = 0; i < 1; i++) {
		//object().move();
	}
}
function obj2 () {
}
//世界一汚いコード、、、変数の共有ができないため、やむを得ないこととする
let g_var2 = {};
function obj(x, y ,z, identifier) {
	let obj = {
		"x1" : x[0],
		"x2" : x[1],
		"y1" : y[0],
		"y2" : y[1],
		"z1" : z[0],
		"z2" : z[1],
		"zz" : document.getElementById("v1-svg_sh"),
		"move" : function() {
			let e = document.createElementNS("http://www.w3.org/2000/svg", "line");
			e.style.stroke = "blue";
			e.style.strokeWidth = "1";
			this.zz.appendChild(e);
			let speed = 100;
			let dx1 = (this.y1 - this.x1) / speed;
			let dy1 = (this.y2 - this.x2) / speed;
			let dx2 = (this.z1 - this.y1) / speed;
			let dy2 = (this.z2 - this.y2) / speed;
			let abc = document.getElementById("v1-line");
			let count = 0;
			const intervalId = setInterval(() => {
				e.setAttribute("x1", dx1 * count + this.x1);
				e.setAttribute("y1", dy1 * count + this.x2);
				e.setAttribute("x2", dx2 * count + this.y1);
				e.setAttribute("y2", dy2 * count + this.y2);
				/*
				let var1 = [];
				var1["x1"] = dx1 * count + this.x1;
				var1["y1"] = dy1 * count + this.x2;
				var1["x2"] = dx2 * count + this.y1;
				var1["y2"] = dy2 * count + this.y2;
				if (identifier === 0) {
					g_var2["xxx0xxx-x1"] = dx1 * count + this.x1;
					g_var2["xxx0xxx-x2"] = dy1 * count + this.x2;
					g_var2["xxx0xxx-y1"] = dx2 * count + this.y1;
					g_var2["xxx0xxx-y2"] = dy2 * count + this.y2;
				} else {
					g_var2["xxx0xxx-z1"] = dx2 * count + this.y1;
					g_var2["xxx0xxx-z2"] = dy2 * count + this.y2;
				}
				*/
				count++;
				if(count > speed) {　
					clearInterval(intervalId);
				}
			}, 50);
		}
	};
	return obj;
}
function object() {
	let obj = {
		"zz" : document.getElementById("v1-svg_sh"),
		"move" : function() {
			let e = document.createElementNS("http://www.w3.org/2000/svg", "line");
			e.style.stroke = "#FF00FF";
			e.style.strokeWidth = "1";
			document.getElementById("v1-svg_sh").appendChild(e);
			let speed = 100;
			let dx1 = (g_var2["xxx0xxx-y1"] - g_var2["xxx0xxx-x1"]) / speed;
			let dy1 = (g_var2["xxx0xxx-y2"] - g_var2["xxx0xxx-x2"]) / speed;
			let dx2 = (300 - g_var2["xxx0xxx-y1"]) / speed;
			let dy2 = (0 - g_var2["xxx0xxx-y2"]) / speed;
			let count = 0;
			let x1 = g_var2["xxx0xxx-x1"];
			let x2 = g_var2["xxx0xxx-y1"];
			let y1 = g_var2["xxx0xxx-x2"];
			let y2 = g_var2["xxx0xxx-y2"];
			const intervalId = setInterval(() => {
				try {
					e.setAttribute("x1", dx1 * count + x1);
					e.setAttribute("y1", dy1 * count + x2);
					e.setAttribute("x2", dx2 * count + y1);
					e.setAttribute("y2", dy2 * count + y2);
				} catch (e) {}
				count++;
				if(count > speed) {　
					clearInterval(intervalId);
				}
			}, 50);
		}
	};
	return obj;
}
function dq(ary) {
	let speed = 100;
	let count = 0;
	const intervalId = setInterval(() => {
		dq2(count / speed);
		count++;
		if(count > speed) {　
			clearInterval(intervalId);
		}
	}, 50);
}