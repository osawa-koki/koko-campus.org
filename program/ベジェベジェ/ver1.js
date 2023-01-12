"use strict";

window.addEventListener("load", () => {
	setup();
	Array.from(document.getElementsByClassName("v1-cl")).forEach(e => {
		e.addEventListener("mousedown", md, false);
		e.addEventListener("touchstart", md, false);
		e.addEventListener("mouseup", mu, false);
		e.addEventListener("touchend", mu, false);
		e.addEventListener("mouseleave", mu, false);
		e.addEventListener("touchleave", mu, false);
	});
});
function md() {
	this.setAttribute("r", 20);
	this.style.fill = "red";
	this.addEventListener("mousemove", mm, false);
	this.addEventListener("touchmove", mm, false);
	this.parentNode.appendChild(this);
}
function mm(e) {
	e.preventDefault();
	const rect = document.getElementById("v1-svg").getBoundingClientRect();
	let x = (e.type === "mousemove") ? e.offsetX : (e.touches[0].clientX - window.pageXOffset - rect.left);
	let y = (e.type === "mousemove") ? e.offsetY : (e.touches[0].clientY - window.pageYOffset - rect.top);
	this.setAttribute("cx", x);
	this.setAttribute("cy", y);
	l_t();
	if (x < -10 || 310 < x) {
		this.removeEventListener("mousemove", mm, false);
		this.removeEventListener("touchmove", mm, false);
		this.setAttribute("cx", (x < 0) ? 0 : 300);
		l_t();
	}
	cv();
}
function mu() {
	this.removeEventListener("mousemove", mm, false);
	this.removeEventListener("touchmove", mm, false);
	this.setAttribute("r", 15);
	this.style.fill = "yellow";
}
function setup() {
	let x = document.getElementById("v1-svg_ls");
	[0, 300].forEach(e => {
		let z = document.createElementNS("http://www.w3.org/2000/svg", "line");
		let aa = {
			"x1" : 0,
			"x2" : 300
		};
		for (let k in aa) {
			z.setAttribute(k, aa[k].toString());
		}
		["y1", "y2"].forEach(j => {
			z.setAttribute(j, e);
		});
		z.style.strokeWidth = "2";
		z.style.stroke = "#000000";
		x.appendChild(z);
	});
	for (let i = 0; i < 300; i = i + 50) {
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
	let ll = document.createElementNS("http://www.w3.org/2000/svg", "line");
	let xy = {
		"x1" : 0,
		"x2" : 300,
		"y1" : 300,
		"y2" : 0,
	};
	for (let k in xy) {
		ll.setAttribute(k, xy[k]);
	}
	ll.style.stroke = "blue";
	ll.style.strokeWidth = "3";
	x.appendChild(ll);
	go_nx0(x.parentNode);
}
function go_nx0() {
	let pr = document.getElementById("v1-svg_cl");
	let z = new Object;
	["c", "p"].forEach(e => {
		z[e] = {
			"x" : document.createElementNS("http://www.w3.org/2000/svg", (e === "c") ? "circle" : "line"),
			"y" : document.createElementNS("http://www.w3.org/2000/svg", (e === "c") ? "circle" : "line"),
		};
	});
	let i;
	i = 0;
	let pp_x = [0, 300];
	let pp_y = [300, 0];
	for (let k in z["p"]) {
		z["p"][k].style.stroke = "#000000";
		z["p"][k].style.strokeWidth = "3";
		z["p"][k].setAttribute("x1", pp_x[i]);
		z["p"][k].setAttribute("y1", pp_y[i]);
		z["p"][k].id = `v1-p_${k}`;
		pr.appendChild(z["p"][k]);
		i++;
	}
	let cp_x = [50, 250];
	let cp_y = [100, 200];
	i = 0;
	for (let k in z["c"]) {
		z["c"][k].setAttribute("r", 15);
		z["c"][k].classList.add("v1-cl");
		z["c"][k].style.fill = "yellow";
		z["c"][k].style.stroke = "#000000";
		z["c"][k].style.strokeWidth = "3";
		z["c"][k].setAttribute("cx", cp_x[i]);
		z["c"][k].setAttribute("cy", cp_y[i]);
		z["c"][k].id = `v1-c_${k}`;
		pr.appendChild(z["c"][k]);
		i++;
	}
	go_nx1();
}
function go_nx1() {
	let z = document.getElementById("v1-svg_nr");
	let x = document.createElementNS("http://www.w3.org/2000/svg", "path");
	x.setAttribute("id", "v1-path");
	x.style.stroke = "#000000";
	x.style.strokeWidth = "5";
	x.style.fill = "none";
	x.setAttribute("d", "m0 300 c 100 -100, 200 200, 300 -300");
	z.appendChild(x);
	l_t();
	cv();
}
function l_t() {
	["x", "y"].forEach(e => {
		let x = document.getElementById(`v1-c_${e}`).getAttribute("cx");
		let y = document.getElementById(`v1-c_${e}`).getAttribute("cy");
		document.getElementById(`v1-p_${e}`).setAttribute("x2", x);
		document.getElementById(`v1-p_${e}`).setAttribute("y2", y);
	});
}
function cv() {
	let z = document.getElementById("v1-path");
	let p = document.getElementById("v1-c_x");
	let q = document.getElementById("v1-c_y");
	let px = p.getAttribute("cx");
	let py = p.getAttribute("cy");
	let qx = q.getAttribute("cx");
	let qy = q.getAttribute("cy");
	z.setAttribute("d", `m0 300 C ${px} ${py}, ${qx} ${qy}, 300 0`);
	document.getElementById("v1-show").textContent = `cubic-bezier(${rnd(px / 300)}, ${rnd((1 - (py / 300)))}, ${rnd(qx / 300)}, ${rnd(1 - (qy / 300))})`;
}
function rnd(x) {
	return Math.round(x * 100) / 100;
}