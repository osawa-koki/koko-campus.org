"use strict";

/*

こんにちは!!
ソースコードを見てくれてありがとうございます。
このソースコードに関しては以下のwebサイトで説明しているので、このjsプログラムの中身を知りたい人は是非訪れてくださいね♪

http://koko-campus.org/program/ベジェベジェ/プログラムの作り方

といっても僕が全て説明しても皆さんのプログラミングスキルの向上にならないこと、さらには他人の書いたコードを読む力の向上の観点から素のコードを読みたい人のために要点だけをここで説明しますね♪

ポイントは以下の3つです。
・setInterval関数
・再帰関数
・html上でのsvgの表現

ヒントはこれだけです。
オブジェクト指向はほとんど使用していないため、そこまで難しくはないかな???

あっ!!
このコードの著作権は僕に帰属しますが、改変したもののソースコードをオープンにすることを条件として、このコードを改変・複製することをok!とします。
いわゆるコピーレフトってものに該当します。

以上、さよなら。
他のプログラムコードで会いましょう♪

*/


window.addEventListener("load", () => {
	put_lines();
	put_path();
	add();
	cv();
	document.getElementById("v2-button").addEventListener("click", go);
	document.getElementById("v2-range").addEventListener("input", put_lines);
	document.getElementById("v2-dense").addEventListener("input", dense);
	trns_sync();
});

let setup = []; //[[第一制御点の円, 第一制御点への線], [[第二制御点の円, 第二制御点への線]]を格納
function add() {
	let qp = [
		[0, 300],
		[50, 100],
		[250, 200],
		[300, 0],
	]
	const cxcy = [50, 100, 250, 200];
	for (let i = 0; i < 4; i = i + 2) {
		let c = document.createElementNS("http://www.w3.org/2000/svg", "circle");
		let p = {
			"r" : 15,
			"cx" : cxcy[i],
			"cy" : cxcy[i + 1],
		};
		for (let k in p) {
			c.setAttribute(k, p[k]);
		}
		c.style.fill = "yellow";
		c.style.stroke = "black";
		c.style.strokeWidth = "1";
		c.id = "v2-cid" + (i / 2).toString();
		let g = document.getElementById("v2-svg_tx");
		c.addEventListener("mousedown", md, false);
		let ln = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		ln.style.stroke = "black";
		ln.style.strokeWidth = 3;
		g.appendChild(ln);
		g.appendChild(c);
		setup.push([c, ln]);
	}
	mt();
}
function dense() {
	Array.from(document.getElementById("v2-svg_ls").getElementsByTagName("line")).forEach(e => {
		e.style.stroke = `rgba(0, 0, 0, ${0.1 * document.getElementById("v2-dense").value * 0.5})`;
	});
}
function md(e) {
	e.preventDefault();
	this.setAttribute("r", 20);
	this.style.fill = "red";
	this.addEventListener("mousemove", mm, false);
	this.parentNode.appendChild(this);
	ers("v2-svg_sh");
	//document.getElementById("v2-button").style.zIndex = 5;
	this.addEventListener("mouseup", mu, false);
	this.addEventListener("mouseleave", mu, false);
}
function mm(e) {
	e.preventDefault();
	this.setAttribute("cx", e.offsetX);
	this.setAttribute("cy", e.offsetY);
	mt();
	if (e.offsetX < -10 || 310 < e.offsetX) {
		this.removeEventListener("mousemove", mm, false);
		this.removeEventListener("touchmove", mm, false);
		this.setAttribute("cx", (e.offsetX < 0) ? 0 : 300);
		mt();
	}
	cv();
	const ary = get_ary();
	document.getElementById("v2-show").textContent = `cubic-bezier(${rnd(ary[1][0] / 300)}, ${rnd((1 - (ary[1][1] / 300)))}, ${rnd(ary[2][0] / 300)}, ${rnd(1 - (ary[2][1] / 300))})`;
	trns_sync();
}
function mu(e) {
	e.preventDefault();
	this.removeEventListener("mousemove", mm, false);
	this.removeEventListener("touchmove", mm, false);
	this.setAttribute("r", 15);
	this.style.fill = "yellow";
	//document.getElementById("v2-button").style.zIndex = 10;
	this.removeEventListener("mouseup", mu);
	this.removeEventListener("mouseleave", mu);
	if (e.offsetX < 0 || 300 < e.offsetX) {
		this.setAttribute("cx", (e.offsetX < 0) ? 0 : 300);
	}
	mt();
	cv();
	const ary = get_ary();
	document.getElementById("v2-show").textContent = `cubic-bezier(${rnd(ary[1][0] / 300)}, ${rnd((1 - (ary[1][1] / 300)))}, ${rnd(ary[2][0] / 300)}, ${rnd(1 - (ary[2][1] / 300))})`;
	put_tlt();
	trns_sync();
}
function mt() {
	setup[0][1].setAttribute("points", `0 300, ${setup[0][0].getAttribute("cx")} ${setup[0][0].getAttribute("cy")}`)
	setup[1][1].setAttribute("points", `300 0, ${setup[1][0].getAttribute("cx")} ${setup[1][0].getAttribute("cy")}`)
}
function put_lines() {
	ers("v2-svg_ls");
	let x = document.getElementById("v2-svg_ls");
	let r = parseInt(document.getElementById("v2-range").value);
	for (let i = 0; i < 300; i = i + 300 / r) {
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
			k.style.stroke = "rgba(0, 0, 0, 0.3)";
			k.style.strokeWidth = "1";
		});
		x.appendChild(h);
		x.appendChild(v);
		dense();
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
	for (let i = 0; i < 2; i++) {
		let q = [];
		q.push(document.getElementById(`v2-cid${i}`).getAttribute("cx"));
		q.push(document.getElementById(`v2-cid${i}`).getAttribute("cy"));
		p.push(q.join(" "));
	}
	document.getElementById("v2-path").setAttribute("d", `m0 300 C ${p.join(", ")}, 300 0`);
	return p;
}
function go() {
	this.removeEventListener("click", go);
	this.addEventListener("click", pause);
	this.textContent = "一時停止";
	Array.from(document.getElementById("v2-svg_tx").getElementsByTagName("circle")).forEach(e => {
		e.removeEventListener("mousedown", md);
	});
	cv();
	rd(get_ary());
}
function get_ary() {
	let z = [];
	z.push([0, 300]);
	z.push([parseInt(document.getElementById("v2-cid0").getAttribute("cx")), parseInt(document.getElementById("v2-cid0").getAttribute("cy"))]); //setupグローバル変数を使用してはダメ!!
	z.push([parseInt(document.getElementById("v2-cid1").getAttribute("cx")), parseInt(document.getElementById("v2-cid1").getAttribute("cy"))]); //setupグローバル変数を使用してはダメ!!
	z.push([300, 0])
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
	iv = document.getElementById("v2-interval").value;
	real_speed = (11 - document.getElementById("v2-speed").value) * 1000;
	interval = 50 + (5 - iv) * 5;
	speed = real_speed / interval;
	if (bl) {
		zz = document.getElementById("v2-svg_sh");
		e = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		e.setAttribute("points", ary.map(j => j.join(",")).join(" "));
		zz.appendChild(e);
		for (let i = 0; i < ary.length; i++) {
			e = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			zz.appendChild(e);
		}
		document.getElementById("v2-now").classList.add("ok");
		let tr = document.getElementById("v2-svg_tx").getElementsByTagName("circle");
		document.getElementById("v2-now").setAttribute("cx", 0);
		document.getElementById("v2-now").setAttribute("cy", 300);
		count = 0;
	}
	intervalId = setInterval(() => {
		rd2(ary, count / speed);
		count++;
		if(count > speed) {
			m_st();　
		}
	}, interval);
}
function m_st() {
	clearInterval(intervalId);
	document.getElementById("v2-now").classList.remove("ok");
	document.getElementById("v2-now").setAttribute("cx", "-10");
	document.getElementById("v2-now").setAttribute("cy", "-10");
	document.getElementById("v2-button").removeEventListener("click", pause);
	document.getElementById("v2-button").addEventListener("click", go);
	document.getElementById("v2-button").textContent = "実行";
	Array.from(document.getElementById("v2-svg_tx").getElementsByTagName("circle")).forEach(e => {
		e.addEventListener("mousedown", md, false);
	});
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
function ers(arg) {
	let x;
	if (typeof arg === "string") {
		x = document.getElementById(arg);
	} else if (typeof arg === "object") {
		x = arg;
	}
	while(x.firstChild){
		x.removeChild(x.firstChild);
	}
}
window.addEventListener("load", () => {
	add_cmp();
	/*
	Array.from(document.getElementsByClassName("v2-arw")).forEach(e => {
		e.addEventListener("click", put_ico);
	});
	Array.from(document.getElementsByClassName("v2-ico")).forEach(e => {
		e.addEventListener("click", ani);
	});
	Array.from(document.getElementsByClassName("v2-ani")).forEach(e => {
		e.addEventListener("animationend", rani);
	});
	*/
	document.getElementById("v2-button2").addEventListener("click", doa);
});
function add_cmp() {
	if (1400 < window.innerWidth) {
		document.getElementById("wrapper").style.maxWidth = "1600px";
		const z = document.getElementById("v2-ddy");
		let fs = [
			[
				[50, 200],
				[250, 100]
			],
			[
				[0, 300],
				[300, 0]
			],
			[
				[0, 150],
				[300, 150]
			]
		];
		for (let i = 0; i < 3; i++) {
			let bx = document.createElement("div");
			bx.style.display = "flex";
			bx.style.alignItems = "center";
			let sp;
			let arw = document.createElementNS("http://www.w3.org/2000/svg", "svg");
			arw.classList.add("x");
			(function () {
				sp = {
					"width" : "50",
					"height" : "50",
					"viewBox" : "0 0 100 100",
					"xmlns" : "http://www.w3.org/2000/svg",
				};
				arw.classList.add("v2-arw");
				arw.addEventListener("click", put_ico);
				for (let k in sp) {
					arw.setAttribute(k, sp[k]);
				}
				arw.style.marginRight = "25px";
				let x = document.createElementNS("http://www.w3.org/2000/svg", "path");
				x.setAttribute("d", "m 85,50 -60,35 0,-70 z");
				x.style.strokeLinejoin = "round";
				arw.appendChild(x);
			})();
			let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
			svg.classList.add("x");
			(function () {
				svg.classList.add("v2-ico");
				svg.addEventListener("click", ani);
				sp = {
					"width" : "80",
					"height" : "80",
					"viewBox" : "-100 -100 500 500",
					"xmlns" : "http://www.w3.org/2000/svg",
				};
				for (let k in sp) {
					svg.setAttribute(k, sp[k]);
				}
				let gr = document.createElementNS("http://www.w3.org/2000/svg", "g");
				gr.classList.add("v2-gr");
				let e = document.createElementNS("http://www.w3.org/2000/svg", "path");
				sp = {
					"fill" : "none",
					"stroke" : "#ffffff",
					"stroke-width" : "40",
				}
				for (let k in sp) {
					e.setAttribute(k, sp[k]);
				}
				gr.appendChild(e);
				let g;
				e.setAttribute("d", `m0 300 C${fs[i][0].join(" ")}, ${fs[i][1].join(" ")}, 300 0`);
				(function () {
					let e, p, st;
					g = document.createElementNS("http://www.w3.org/2000/svg", "g")
					//e = new Array(2).fill(document.createElementNS("http://www.w3.org/2000/svg", "circle")); ←これだと参照を渡してしまうため上書きされてしまう、、、
					e = [];
					for (let i = 0; i < 2; i++) {
						e.push(document.createElementNS("http://www.w3.org/2000/svg", "circle"));
					}
					st = {
						"fill" : "#FFFF00",
						"stroke" : "#000000",
						"stroke-width" : "5",
					};
					p = [
						[0, 300],
						[300, 0],
					];
					for (let i = 0; i < e.length; i++) {
						e[i].setAttribute("r", 40);
						e[i].setAttribute("cx", p[i][0]);
						e[i].setAttribute("cy", p[i][1]);
						for (let k in st) {
							e[i].style[k] = st[k];
						}
					}
					g.appendChild(e[0]);
					g.appendChild(e[1]);
				})();
				svg.appendChild(gr);
				svg.appendChild(g);
			})();
			let mv = document.createElement("div");
			(function () {
				sp = {
					"width" : "300px",
					"height" : "50px",
					"border" : "1px #000000 solid",
					"margin" : "10px 25px",
					"position" : "relative",
				};
				for (let k in sp) {
					mv.style[k] = sp[k];
				}
				let e = document.createElement("div");
				e.classList.add("v2-ani");
				e.addEventListener("animationend", rani);
				sp = {
					"position" : "absolute",
					"top" : "0",
					"left" : "0",
					"bottom" : "0",
					"box-sizing" : "border-box",
					"border-right" : "1px #000000 solid",
				};
				for (let k in sp) {
					e.style[k] = sp[k];
				}
				let e2 = document.createElement("div");
				for (let k in sp) {
					e2.style[k] = sp[k];
				}
				e2.style.zIndex = 1;
				e2.style.borderRight = "5px black solid";
				e2.addEventListener("animationend", rani);
				e2.classList.add("v2-ani");
				e2.classList.add("v2-ani_li");
				mv.appendChild(e);
				mv.appendChild(e2);
			})();
			bx.appendChild(arw);
			bx.appendChild(svg);
			bx.appendChild(mv);
			z.appendChild(bx);
		}
	}
}
function put_ico() {
	let z = document.getElementById("v2-path").getAttribute("d").match(/-?\d+\.?\d*/g);
	let xy = this.nextElementSibling.getElementsByClassName("v2-gr")[0];
	ers(xy);
	let e = document.createElementNS("http://www.w3.org/2000/svg", "path");
	e.setAttribute("d", `m0 300 C${z[2]} ${z[3]}, ${z[4]} ${z[5]}, 300 0`);
	e.style.fill = "none";
	e.style.stroke = "#ffffff";
	e.style.strokeWidth = "40";
	xy.insertBefore(e, xy.firstChild)
}
function ani(arg, obj = false) {
	try {
		let tt = (obj) ? arg : this;
		let bz = gbz(tt.getElementsByTagName("path")[0].getAttribute("d"));
		let an = Array.from(tt.nextElementSibling.getElementsByClassName("v2-ani"));
		an.forEach(s => {
			s.style.animationTimingFunction = (!s.classList.contains("v2-ani_li")) ? bz : "linear";
			s.classList.add("v2-aniani");
		});
	} catch(e) {}
}
function gbz(x) {
	let ds = x.match(/-?\d+\.?\d*/g);
	return `cubic-bezier(${rnd(ds[2] / 300)}, ${rnd((1 - (ds[3] / 300)))}, ${rnd(ds[4] / 300)}, ${rnd(1 - (ds[5] / 300))})`;
}
function rani() {
	this.classList.remove("v2-aniani");
}
function doa() {
	Array.from(document.getElementsByClassName("v2-ico")).forEach(e => {
		ani(e, true);
	});
}
window.addEventListener("load", () => {
	const ar = Array.from(document.getElementsByClassName("v2-ani"));
	document.getElementById("v2-s_sp").addEventListener("input", function() {
		ar.forEach(e => {
			e.style.animationDuration = this.value * 1.5 + "s";
		});
		this.parentNode.nextElementSibling.textContent = `${parseFloat(this.value).toFixed(1)}秒`;
	});
	document.getElementById("v2-s_ct").addEventListener("input", function() {
		ar.forEach(e => {
			e.style.animationIterationCount = this.value;
		});
		this.parentNode.nextElementSibling.textContent = `${this.value}回`;
	});
	document.getElementById("v2-s_cl").addEventListener("change", function() {
		ar.forEach(e => {
			e.style.backgroundColor = `hsla(${this.value}, 100%, 50%, 1)`;
		});
		this.parentNode.style.backgroundColor = `hsla(${this.value}, 100%, 50%, 1)`;
		this.parentNode.nextElementSibling.style.backgroundColor = `hsla(${this.value}, 100%, 50%, 1)`;
		setTimeout(() => {
			this.parentNode.style.backgroundColor = "transparent";
		}, 300);
	});
	document.getElementById("v2-s_cl").addEventListener("input", function() {
		this.parentNode.nextElementSibling.style.backgroundColor = `hsla(${this.value}, 100%, 50%, 1)`;
	});
	document.getElementById("v2-s_lr").addEventListener("change", function() {
		this.parentNode.nextElementSibling.textContent = (parseInt(this.value) === 1) ? "あり" : "なし";
		if (parseInt(this.value) === 1) {
			let x = document.getElementsByClassName("v2-ani_li-paused");
			x = Array.from(x);
			for (let i = 0; i < x.length; i++) {
				x[i].classList.add("v2-ani");
				x[i].classList.remove("v2-ani_li-paused");
			}
		} else {
			let x = document.getElementsByClassName("v2-ani_li");
			x = Array.from(x);
			for (let i = 0; i < x.length; i++) {
				x[i].classList.add("v2-ani_li-paused");
				x[i].classList.remove("v2-ani");
			}
		}
	});
});
function put_tlt() {
	const z = cv();
	(function () {
		let svg, p;
		svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
		svg.classList.add("v2-logvg");
		svg.classList.add("x");
		p = {
			"width" : 50,
			"heigth" : 50,
			"viewBox" : "-50 -50 400 400",
			"xmlns" : "http://www.w3.org/2000/svg",
		};
		for (let k in p) {
			svg.setAttribute(k ,p[k]);
		}
		(function () {
			let gp, gc, xy;
			gp = document.createElementNS("http://www.w3.org/2000/svg", "g");
			(function () {
				let kj, kp;
				kj = document.createElementNS("http://www.w3.org/2000/svg", "path");
				kj.setAttribute("d", `m0 300 C ${z.join(", ")}, 300 0`);
				gp.appendChild(kj);
			})();
			gc = document.createElementNS("http://www.w3.org/2000/svg", "g");
			(function () {
				xy = [
					[0, 300],
					[300, 0],
				];
				for (let i = 0; i < 2; i++) {
					let x, px;
					x = document.createElementNS("http://www.w3.org/2000/svg", "circle");
					x.setAttribute("r", 30);
					x.setAttribute("cx", xy[i][0]);
					x.setAttribute("cy", xy[i][1]);
					gc.appendChild(x);
				}
			})();
			svg.appendChild(gp);
			svg.appendChild(gc);
		})();
		svg.addEventListener("click", trnsfr);
		let pr = document.getElementById("v2-log");
		pr.insertBefore(svg, pr.firstChild)
	})();
}
function trnsfr() {
	m_st();
	ers("v2-svg_sh");
	let d;
	d = this.getElementsByTagName("path")[0].getAttribute("d").match(/-?\d+\.?\d*/g).slice(2, 6); //マイナスも取得することを忘れずに!!
	d = [d.slice(0, 2), d.slice(2, 4)];
	for (let i = 0; i < d.length; i++) {
		document.getElementById(`v2-cid${i}`).setAttribute("cx", d[i][0]); //setup[i][0]->document.getElementById(`v2-cid${i}`)
		document.getElementById(`v2-cid${i}`).setAttribute("cy", d[i][1]); //setup[i][1]->document.getElementById(`v2-cid${i}`)
	}
	mt();
	cv();
	const ary = get_ary();
	document.getElementById("v2-show").textContent = `cubic-bezier(${rnd(ary[1][0] / 300)}, ${rnd((1 - (ary[1][1] / 300)))}, ${rnd(ary[2][0] / 300)}, ${rnd(1 - (ary[2][1] / 300))})`;
	trns_sync();
}
function trns_sync() {
	let z = [];
	for (let i = 0; i < setup.length; i++) {
		let ary = [];
		ary.push(setup[i][0].getAttribute("cx"));
		ary.push(setup[i][0].getAttribute("cy"));
		z.push(ary);
	}
	let x = document.getElementById("v2-mevg").firstElementChild;
	ers(x);
	(function () {
		let e = document.createElementNS("http://www.w3.org/2000/svg", "path");
		e.setAttribute("d", `m0 300 C ${z.map(e => e.join(" ")).join(", ")}, 300 0`);
		x.appendChild(e);
	})();
}
window.addEventListener("load", () => {
	document.getElementById("v2-mevg").addEventListener("click", ani);
	document.getElementById("v2-mevg-sh").addEventListener("animationend", rani);
	document.getElementById("v2-mevg-is").addEventListener("animationend", rani);
});
window.addEventListener("load", () => {
	put_tmpl();
});
function put_tmpl() {

}