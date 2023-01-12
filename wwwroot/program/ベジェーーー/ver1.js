"use strict";

window.addEventListener("load", () => {
	const z = document.getElementById("v1-rg");
	z.addEventListener("input", st);
	z.addEventListener("change", ot);
});

let time = null;
let do_once = true;
let xy = {
	"x" : [],
	"y" : [],
};
let z;

function st() {
	if (time === null) {
		time = new Date().getTime();
	}
	if (parseInt(this.value) === 100) {
		this.disabled = true;
		this.value = 0;
		fn(this);
	}
	let dt = new Date();
	xy["x"].push(dt.getTime() - time);
	//xy["y"].push(parseInt(this.value));
}
function ot() {
	if (parseInt(this.value) !== 100) {
		this.value = 0;
		info("実行に失敗しました。", "下のスライドバーを一番右までスライドして下さい。");
	}
}
function fn() {
	if (do_once) {
		do_once = false;
		time = null; //delete time;
		put_svg(xy["x"]);
		setTimeout(() => {
			do_once = true;
			xy["x"] = new Array();
			xy["y"] = new Array();
		}, 500);
	}
}
function info(x, y) {
	const z = document.getElementById("v1-info");
	z.textContent = x;
	if (typeof y !== "undefined") {
		setTimeout(() => {
			z.textContent = y;
		}, 1500);
	}
}
function put_svg(x) { //xの取得は一旦保留
	let svg;
	svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
	(function() { //svgの作成
		let sp, k, pr;
		sp = {
			"width" : "300",
			"height" : "300",
			"viewBox" : "0 0 100 100",
			"xmlns" : "http://www.w3.org/2000/svg",
		};
		for (k in sp) {
			svg.setAttribute(k, sp[k]);
		}
		pr = document.getElementById("v1-svgx");
		(function() { //gの作成
			let gs, g, e;
			gs = ["dv", "cs", "lc", "cl"];
			gs = gs.map(e => "v1-svg-" + e);
			gs.forEach(e => {
				g = document.createElementNS("http://www.w3.org/2000/svg", "g");
				g.id = e;
				svg.appendChild(g);
			})
		})();
		pr.appendChild(svg);
	})();
	(function() { //svgプロットレンダリング用にx(,y)データを調整
		let max;
		/*
		max = x.reduce(function(a, b) {
			return Math.max(a, b);
		});
		*/
		max = x[x.length - 1];
		x = x.map(e => e * 100 / max);
		//x = x.map(e => e * 100 / lgh);
		//x[0] = 0; //桁落ち・丸め誤差調整
		//x[x.length - 1] = 100; //桁落ち・丸め誤差調整
		p_ls(10, x); //svg上に背景線を引く
	})();
}
function p_ls(div, pass) { //svg上に良い感じに線を引く
	let it, count, i;
	it = 100 / div;
	count = 0;
	function do1() {
		if (count < div) {
			do2(count).do();
			setTimeout(do1, 100);
			count++;
		}
	}
	function do2(num) {
		let answer, obj;
		obj = document.getElementById("v1-svg-dv");
		answer = {
			"num" : num,
			"do" : function() {
				let ct_inobj;
				ct_inobj = 0;
				const itv = setInterval(() => {
					ct_inobj++;
					this.h.setAttribute("points", `0 ${100 - num * 10}, ${ct_inobj} ${100 - num * 10}`);
					this.v.setAttribute("points", `${num * 10} 100, ${num * 10} ${100 - ct_inobj}`);
					if (100 < ct_inobj) {
						clearInterval(itv);
						if (this.num === 1) {
							put_ccl(pass);
						}
					}
				}, 10);
			}
		};
		answer["h"] = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		answer["v"] = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		obj.appendChild(answer["h"]);
		obj.appendChild(answer["v"]);
		return answer;
	}
	do1();
}
function put_ccl(x) {
	let count, obj, x_cp;
	x_cp = x.slice();
	count = 0;
	obj = document.getElementById("v1-svg-cs");
	function rf1() {
		if (1 <= x.length) {
			let pd;
			pd = x.shift();
			pc(pd, count); //実際にsvgに円を作成してプロット
			setTimeout(rf1, 10);
			count++;
			if (x.length === 1) {
				put_cls(x_cp);
			}
		}
	}
	function pc(xx, yy) {
		let c;
		c = document.createElementNS("http://www.w3.org/2000/svg", "circle");
		c.setAttribute("r", 2);
		c.setAttribute("cx", xx);
		c.setAttribute("cy", 100 - yy * 100 / (x_cp.length - 1));
		obj.appendChild(c);
	}
	rf1();
}
function put_cls(pass) {
	let pr, l, count;
	pr = document.getElementById("v1-svg-cl");
	l = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
	l.setAttribute("points", "0 100, 0 100")
	pr.appendChild(l);
	count = 0;
	function rf() {
		if (count < pass.length) {
			let p;
			p = l.getAttribute("points");
			p = p + `, ${pass[count]} ${100 - count * 100 / (pass.length - 1)}`;
			l.setAttribute("points", p);
			setTimeout(rf, 10);
			if (count + 1 === pass.length) {
				calc_ck(pass);
			}
			count++;
		}
	}
	rf();
}
function calc_ck(ps) { //実行するかどうかチェック
	let e, i, cm, pr;
	z = ps; //一旦グローバル変数に保存
	cm = ["実行", "もう一度"];
	pr = document.getElementById("v1-btn");
	for (i = 0 ; i < 2; i++) {
		e = document.createElement("div");
		e.textContent = cm[i];
		if (i === 0) {
			e.addEventListener("click", go);
		} else if (i === 1) {
			e.addEventListener("click", cancel);
		}
		pr.appendChild(e);
	}
}
function cancel() {
	ers(this.parentNode);
	document.getElementById("v1-rg").disabled = false;
	ers("v1-svgx");
	xy["x"] = new Array();
	xy["y"] = new Array();
}
function go() {
	let i, x, y, xy;
	xy = new Array();
	x = av_ary(sp2(z.slice(5, z.length - 4), 5));
	x.unshift(0);
	x.push(100);
	for (i = 0; i < x.length; i++) {
		xy.push(x[i]);
	}
	let af;
	af = calc(xy);
	put_ans(af);
}
function put_ans(ary) {
	let svg, svg2, pt, lst, i;
	svg = document.getElementById("v1-svg-cl");
	svg2 = document.getElementById("v1-svg-lc");
	pt = document.createElementNS("http://www.w3.org/2000/svg", "path");
	pt.setAttribute("d", `m0 100 C ${ary[0][0]} ${100 - ary[1][0]}, ${ary[0][1]} ${100 - ary[1][1]}, 100 0`);
	svg.appendChild(pt);
	lst = new Array();
	lst.push([ary[0][0], 100 - ary[1][0]]);
	lst.push([ary[0][1], 100 - ary[1][1]]);
	for (i = 0; i < lst.length; i++) {
		let elm;
		elm = document.createElementNS("http://www.w3.org/2000/svg", "circle");
		elm.setAttribute("r", 3);
		elm.setAttribute("cx", lst[i][0]);
		elm.setAttribute("cy", lst[i][1]);
		svg.appendChild(elm);
		elm = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		elm.setAttribute("points", `${(i === 0) ? "0 100, " : ""}${lst[i][0]} ${lst[i][1]}${(i === 1) ? ", 100 0" : ""}`);
		svg2.appendChild(elm);
	}
}
function calc(xy, std, intv, upto) {
	let count, answer;
	std = 50;
	intv = 50;
	upto = 500;
	count = 0;
	function rf(std, intv) {
		if (count < upto) {
			let arg_bz, arg_bz2, a, i, min, mn, mn_idx, r;
			min = new Array;
			arg_bz = new Array(); //4等分された座標4つを格納
			arg_bz2 = new Array(); //4等分された座標4つを格納
			arg_bz.push([[std[0][0] - intv, std[0][1] - intv], [std[1][0] + intv, std[1][1] - intv]]);
			arg_bz.push([[std[0][0] - intv, std[0][1] + intv], [std[1][0] + intv, std[1][1] - intv]]);
			arg_bz.push([[std[0][0] + intv, std[0][1] - intv], [std[1][0] + intv, std[1][1] - intv]]);
			arg_bz.push([[std[0][0] - intv, std[0][1] - intv], [std[1][0] - intv, std[1][1] + intv]]);
			arg_bz.push([[std[0][0] - intv, std[0][1] + intv], [std[1][0] - intv, std[1][1] + intv]]);
			arg_bz.push([[std[0][0] + intv, std[0][1] - intv], [std[1][0] - intv, std[1][1] + intv]]);
			arg_bz.push([[std[0][0] - intv, std[0][1] - intv], [std[1][0] + intv, std[1][1] + intv]]);
			arg_bz.push([[std[0][0] - intv, std[0][1] + intv], [std[1][0] + intv, std[1][1] + intv]]);
			arg_bz.push([[std[0][0] + intv, std[0][1] - intv], [std[1][0] + intv, std[1][1] + intv]]);
			arg_bz2 = arg_bz.map(e => g_bz(e, xy.length));
			for (i = 0; i < arg_bz2.length; i++) { //xy(元のデータの座標)と4等分された座標を比較 => y軸の差を合計を取得
				let j, df;
				df = 0;
				for (j = 0; j < xy.length; j++) {
					df += Math.abs(xy[j] - arg_bz2[i][j][0]);
				}
				min.push(df);
			}
			mn = min.reduce(function(a, b) {return Math.min(a, b);});
			mn_idx = min.indexOf(mn);
			count++;
			if (count !== upto) {
				rf(arg_bz[mn_idx].slice(1, 3), intv / 2);
			} else {
				answer = arg_bz[mn_idx].slice(1, 3);
			}
		}
	}
	rf([[std, std], [std, std]], intv / 2);
	return answer;
}
function pl_mi(x, y) {
	let answer;
	answer = new Array();
	function pmt() {
		let ar, i;
		ar = pmt(["+", "-"]);
		for (i = 0; i < ar.length; i++) {
			answer.push(cc(x + ar[i]));
		}
	}
	function cc(arg) {
		return Function(`"use strict";return (` + arg + `)`)();
	}
	function pmt (nums) {
		let answer2 = [];
		if (nums.length === 1) {
			for (let i = 0; i < nums.length; i++) {
				answer[i] = [nums[i]];
			}
		} else {
			for (let i = 0; i < nums.length; i++) {
				let parts = nums.slice(0)
				parts.splice(i, 1)[0]
				let row = factorial(parts, nums.length - 1)
				for (let j = 0; j < row.length; j++) {
					answer2.push([nums[i]].concat(row[j]))
				}
			}
		}
		return answer2;
	}
	pmt();
	return answer;
}
//ベジェ曲線での座標一覧を取得する関数
//第一引数 => [[x1, y1], [x2, y2]]
//第二引数 => 間隔(全部で求めたい座標の数)
//戻り値 => 座標(二次元配列形式)
function g_bz(arg, intv) {
	arg.unshift([0, 0]);
	arg.push([100, 100]);
	let answer, i, count, ppn;
	answer = new Array();
	function rf(ary, ppn) {
		if (1 < ary.length) {
			let list;
			list = new Array();
			for (let i = 0; i < ary.length - 1; i++) {
				let x, y;
				x = (ary[i + 1][0] - ary[i][0]) * ppn + ary[i][0];
				y = (ary[i + 1][1] - ary[i][1]) * ppn + ary[i][1];
				list.push([x, y]);
			}
			if (ary.length === 2) {
				return [list[0][0], list[0][1]];
			}
			return rf(list, ppn);
		}
	}
	for (i = 1; i <= intv; i++) {
		answer.push(rf(arg, i / intv));
	}
	return answer;
}
function sp2(ary, in2) {
	let i, answer;
	answer = new Array();
	for (i = 0; i < ary.length / in2; i++) {
		answer.push(ary.slice(i * in2, (i + 1) * in2));
	}
	return answer;
}
function av_ary(ary) {
	let answer;
	answer = ary.map(e => e.reduce((sum, element) => (sum + element), 0) / e.length);
	return answer;
}
function on_fn() {
	document.getElementById("v1-rg").disabled = false;
	ers("v1-svgx");
}
function ers(x) {
	x = (typeof x === "string") ? document.getElementById(x) : x;
	while(x.firstChild) {
		x.removeChild(x.firstChild);
	}
}