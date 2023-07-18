"use strict";

fetch('https://koko-campus.org/module/change-color-type/ver1')
	.then(r=>r.text())
	.then(t=>eval(t));

// クラスコンストラクタ関数
// 引数=>操作対象のドキュメントオブジェクト
// 戻り値=>インスタンスオブジェクト
// メソッド(move,style)
function svg_operation(arg) {
	let tag = document.getElementById(arg).tagName.toLowerCase();
	if (tag === "path") {
		let obj = {
			"doc": document.getElementById(arg),
			"m": document.getElementById(arg).getAttribute("d"),
			"move": function(x, y, cb, speed = 100) {
				let dx = parseFloat(x) - this.x_b;
				let dy = parseFloat(y) - this.y_b;
				let count = 0;
				var interval_id = setInterval(() => {
					count += 1;
					let put = `m ${(dx * count / speed + this.x_b) + "," + (dy * count / speed + this.y_b)} ${this.rest}`;
					this.doc.setAttribute("d", put);
					if (count > speed) {
						clearInterval(interval_id);
						if (typeof(cb) == "function") {
							cb();
						}
					}
				}, 10);
			},
			"style": function(ppt, to) {
				this.doc.style
			}
		}
		obj["x_b"] = parseFloat(obj.m.match(/\d+\.*\d*(?=,)/));
		obj["y_b"] = parseFloat(obj.m.match(/,\d+\.*\d*/)[0].replace(",", ""));
		obj["rest"] = obj.m.replace(/m\s\d+\.*\d*,\d+\.*\d*\s/, "");
		return obj;
	} else if (tag === "circle" || tag === "ellipse") {
		let obj = {
			"doc": document.getElementById(arg),
			"x": document.getElementById(arg).getAttribute("x"),
		}
		return obj;
	} else if (tag === "rect") {
		let obj = {
			"doc": document.getElementById(arg),
			"x_b": document.getElementById(arg).getAttribute("x"),
			"y_b": document.getElementById(arg).getAttribute("y"),
			"move": function(x, y, cb, speed = 100) {
				let dx = parseFloat(x) - parseFloat(this.x_b);
				let dy = parseFloat(y) - parseFloat(this.y_b);
				let count = 0;
				var interval_id = setInterval(() => {
					count += 1;
					this.doc.setAttribute("x", (dx * count / speed + parseFloat(this.x_b)));
					this.doc.setAttribute("y", (dy * count / speed + parseFloat(this.y_b)));
					if (count > speed) {
						clearInterval(interval_id);
						if (typeof(cb) == "function") {
							cb();
						}
					}
				}, 10);
			}
		}
		return obj;
	}
}




