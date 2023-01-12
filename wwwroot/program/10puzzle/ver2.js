"use strict";

window.addEventListener("load", () => {
	const info = document.getElementById("info");
	Array.from(document.getElementsByTagName("input")).forEach((e) => {
		e.addEventListener("keydown", (x) => {
			e.value = "";
			if (!x.key.match(/\d/)) {
				info.textContent = "数字(0-9)を入力してください。"
			} else {
				info.textContent = "";
			}
		});
		e.addEventListener("keyup", (x) => {
			if (x.key === "-") {
				e.value = "";
			}
			let ok = true;
			Array.from(document.getElementsByTagName("input")).forEach((e) => {
				if (e.value === "") {
					ok = false;
				}
			})
			if (ok === true) {
				document.getElementById("button").addEventListener("click", pushed);
				document.getElementById("button").classList.remove("pushed");
			}
		});
	});
});
function move_svg(list) {
	document.getElementById("fined").innerHTML = "";
	document.getElementById("ono").classList.remove("hidden");
	let count = 0;
	Array.from(document.getElementsByClassName("txt")).forEach((e) => {
		let k = $$(e);
		document.getElementsByClassName("txt")[count].textContent = list[count];
		setTimeout(function() {
			k.move(225, 320, mochituki, 150);
		}, 1000);
		count++;
	});
}
function mochituki() {
	document.getElementById("ono").classList.add("ono-ono");
	const comment = document.getElementById("comment");
	let count = 0;
	const comment_w = ["ソイヤッ", "コラサッ", "エイヤッ", "ホイヤッ", "ヘイヨッ"];
	const comment_x = [220, 300, 280, 260, 290];
	const comment_y = [220, 150, 200, 200, 150];
	var interval_id = setInterval(() => {
		count++;
		comment.textContent = comment_w[count % 5];
		comment.setAttribute("x", comment_x[count % 5]);
		comment.setAttribute("y", comment_y[count % 5]);
		if (count > 8) {
			comment.textContent = "";
			clearInterval(interval_id);
		}
	}, 650)
}
const word_place_x = [50, 220, 400, 580];
document.getElementById("ono").addEventListener("animationend", () => {
	document.getElementById("ono").classList.remove("ono-ono");
	document.getElementById("ono").classList.add("hidden");
	setTimeout(function() {
		if (g !== false) {
			console.log(g);
			document.getElementById("fined").innerHTML = "できたよ!!&nbsp;&nbsp;" + g.replace("*", "&times").replace("/", "&divide;");
			document.getElementById("fined").setAttribute("x", 150);
		} else {
			document.getElementById("fined").innerHTML = "ごめんね、できなかった、(´;ω;｀)";
			document.getElementById("fined").setAttribute("x", 50);
		}
		let count = 0;
		let txt = document.getElementsByClassName("txt");
		for (let i = 0; i < txt.length; i++) {
			txt[i].textContent = "";
			txt[i].setAttribute("x", word_place_x[i]);
			txt[i].setAttribute("y", 50);
		}
	}, 500);
});
function pushed() {
	document.getElementById("button").removeEventListener("click", pushed);
	document.getElementById("button").classList.add("pushed");
	let list = Array.from(document.getElementsByTagName("input")).map((e) => parseInt(e.value));
	move_svg(list);
	make10(list);
}
let g = false;
function make10 (list) {
	let ok = false;
	const operants = ["+", "-", "*", "/"];
	let length = list.length;
	let f = factorial(list);
	let p = dup_permutation(operants, list.length - 1);
	let k = put_between(f, p);
	for (let i = 0; i < k.length; i++) {
		if (calculate(k[i]) === 10) {
			g = k[i]
			ok = true;
		}
	}
	if (ok === false) {
		g = false;
	}
}
function put_between(x, y) {
	let answer = new Array;
	for (let i = 0; i < x.length; i++) {
		for (let j = 0; j < y.length; j++) {
			answer.push(put_between2(x[i], y[j]));
		}
	}
	return answer;
}
function put_between2 (x, y) {
	let answer = new Array;
	for (let i = 0; i < x.length; i++) {
		if (i === x.length - 1) {
			answer.push(x[i]);
		} else {
			answer.push(x[i]);
			answer.push(y[i]);
		}
	}
	let k = answer.join("");
	return answer.join("");
}
function permutation (nums, k) {
	let ans = []
	if (nums.length < k) {
		return []
	}
	if (k === 1) {
		for (let i = 0; i < nums.length; i++) {
			ans[i] = [nums[i]]
		}
	} else {
		for (let i = 0; i < nums.length; i++) {
			let parts = nums.slice(0)
			parts.splice(i, 1)[0]
			let row = permutation(parts, k - 1)
			for (let j = 0; j < row.length; j++) {
				ans.push([nums[i]].concat(row[j]))
			}
		}
	}
	return ans;
}
function dup_permutation (nums, k) {
	let ans = [];
	if (nums.length < k) {
		return [];
	}
	if (k === 1) {
		for (let i = 0; i < nums.length; i++) {
			ans[i] = [nums[i]];
		}
	} else {
		for (let i = 0; i < nums.length; i++) {
			let parts = nums.slice(0); //与えられた数字の配列をコピー(元の配列を変更してはいけない)->非破壊的
			parts.splice(i, 1);
			let row = dup_permutation(nums, k - 1); //再帰関数->n(i)番目の要素を削除された配列からもう一度permutation関数を実行->「k===1」になったらループ終了!徐々にループを遡ってくるよ♪
			for (let j = 0; j < row.length; j++) {
				ans.push([nums[i]].concat(row[j]));
			}
		}
	}
	return ans;
}
function calculate(arg) {
	return Function(`"use strict";return (` + arg + `)`)();
}
function factorial (nums) {
	let answer = []
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
				answer.push([nums[i]].concat(row[j]))
			}
		}
	}
	return answer;
}
function $$(arg) {
	let tag = arg.tagName.toLowerCase();
	if (tag === "path") {
		let obj = {
			"doc": arg,
			"m": arg.getAttribute("d"),
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
				}, 10)
			}
		}
		obj["x_b"] = parseFloat(obj.m.match(/\d+\.*\d*(?=,)/));
		obj["y_b"] = parseFloat(obj.m.match(/,\d+\.*\d*/)[0].replace(",", ""));
		obj["rest"] = obj.m.replace(/m\s\d+\.*\d*,\d+\.*\d*\s/, "");
		return obj;
	} else if (tag === "circle" || tag === "ellipse") {
		let obj = {
			"doc": arg,
			"x": arg.getAttribute("x"),
		}
		return obj;
	} else if (tag === "rect") {
		let obj = {
			"doc": arg,
			"x_b": arg.getAttribute("x"),
			"y_b": arg.getAttribute("y"),
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
				}, 10)
			}
		}
		return obj;
	} else if (tag === "text") {
		let obj = {
			"doc": arg,
			"x_b": arg.getAttribute("x"),
			"y_b": arg.getAttribute("y"),
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
						if (typeof(cb) === "function") {
							cb();
						}
					}
				}, 10)
			}
		}
		return obj;
	}
}