<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-07",
	"updated" => "2021-12-07",
);
head($obj);
?>
<div id="puzzle10">
	<p>4つの与えられた数字から「10」をつくる演算を返しますね♪</p>
	<div id="info"></div>
	<div id="input-box">
		<input type="number" id="n1" maxlength="1" />
		<input type="number" id="n2" maxlength="1" />
		<input type="number" id="n3" maxlength="1" />
		<input type="number" id="n4" maxlength="1" />
	</div>
	<div id="button" class="pushed">計算!!</div>
	<div id="v4-r">
		<div id="v4-r0">結果一覧</div>
		<div id="v4-r1"></div>
		<table class="v4-table">
			<tbody id="v4-k"></tbody>
		</table>
	</div>
	<div id="v4-c">
		<div id="v4-c0">演算一覧</div>
		<div id="v4-c1"></div>
		<table class="v4-table">
			<tbody id="v4-t"></tbody>
		</table>
	</div>
</div>
<script charset = "UTF-8" type="text/javascript">
	window.addEventListener("load", () => {
		document.getElementById("n1").focus();
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
				} else { //フォーカスを次に移動
					try {
						e.nextElementSibling.focus();
					} catch(e) {
						document.getElementById("n1").focus();
					}
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
function pushed() {
	document.getElementById("button").removeEventListener("click", pushed);
	document.getElementById("button").classList.add("pushed");
	let list = Array.from(document.getElementsByTagName("input")).map((e) => parseInt(e.value));
	let r = make10(list);
	let t = document.getElementById("v4-t");
	let k = document.getElementById("v4-k");
	while(t.firstChild){
		t.removeChild(t.firstChild);
	}
	while(k.firstChild){
		k.removeChild(k.firstChild);
	}
	r["all"].forEach(e => {
		let m = document.createElement("tr");
		let m0 = document.createElement("td");
		m0.appendChild(document.createTextNode(operant_pretify(e)));
		let m1 = document.createElement("td");
		m1.appendChild(document.createTextNode("="));
		let m2 = document.createElement("td");
		m2.appendChild(document.createTextNode(calculate(e)));
		m.appendChild(m0);
		m.appendChild(m1);
		m.appendChild(m2);
		t.insertBefore(m, e.firstChild);
	});
	if (r["ok"].length === 0) {
		let m = document.createElement("tr");
		let m0 = document.createElement("td");
		m0.appendChild(document.createTextNode("10になる演算を見つけられませんでした。"));
		m0.setAttribute("colspan", "3");
		m.appendChild(m0);
		k.insertBefore(m, k.firstChild);
	} else {
		r["ok"].forEach(e => {
			let m = document.createElement("tr");
			let m0 = document.createElement("td");
			m0.appendChild(document.createTextNode(operant_pretify(e)));
			let m1 = document.createElement("td");
			m1.appendChild(document.createTextNode("="));
			let m2 = document.createElement("td");
			m2.appendChild(document.createTextNode("10"));
			m.appendChild(m0);
			m.appendChild(m1);
			m.appendChild(m2);
			k.insertBefore(m, k.firstChild);
		});
	}
	document.getElementById("v4-r1").textContent = `${r["ok"].length}件の演算`;
	document.getElementById("v4-c1").textContent = `${r["all"].length}件の演算`;
}
function make10 (list) {
	let answer = {
		"ok" : [],
		"all" : []
	};
	let f = factorial(list);
	let p = dup_permutation(["+", "-", "*", "/"], list.length - 1);
	let k = put_between(f, p);
	let j = put_brackets(k);
	let s = Array.from(new Set(j));
	s.forEach(e => {
		answer["all"].push(e);
		if (calculate(e) === 10) {
			answer["ok"].push(e);
			ok = true;
		}
	});
	return answer;
}
function put_brackets(x) {
	//あくまでも限定した括弧付け処理->綺麗ではないコード(要修正)
	let answer = [];
	x.forEach(e => {
		answer.push(e);
		if (!e.match(/^\d[\+\-]\d[\+\-]\d[\+\-]\d$/) && !e.match(/^\d[\*\/]\d[\*\/]\d[\*\/]\d$/)) { //4つ全て和算演算ないしは積商演算以外のケース
			if (e.match(/^\d[\+\-]\d[\+\-]\d[\*\/]/)) { //和差演算が2つ + 「×|÷」
				answer.push(e.replace(/^\d[\+\-]\d[\+\-]\d/, `($&)`));
			} else if (e.match(/[\*\/]\d[\+\-]\d[\+\-]\d$/)) { //「×|÷」 + 和差演算が2つ
				answer.push(e.replace(/\d[\+\-]\d[\+\-]\d$/, `($&)`));
			} else if ((e.match(/\d[\+\-]\d/g) || []).length === 2) { //「+|-」「*|/」「+|-」の順番の場合
				answer.push(e.replace(/\d[\+\-]\d/, `($&)`));
			}
			if (e.match(/^\d[\+\-]\d[\*\/]/)) { //最初の演算子が和差演算である場合
				answer.push(e.replace(/^\d[\+\-]\d/, `($&)`));
			} else if (e.match(/[\*\/]\d[\+\-]\d$/)) { //最後の演算子が和差演算である場合
				answer.push(e.replace(/\d[\+\-]\d$/, `($&)`));
			}
			if (e.match(/^\d[\*\/]\d[\+\-]\d[\*\/]\d$/)) { //10puzzleの高難易度の問題ではこれが必要になる
				answer.push(e.replace(/^\d[\*\/]\d[\+\-]\d/, `($&)`));
				answer.push(e.replace(/\d[\+\-]\d[\*\/]\d$/, `($&)`));
			}
		}
	});
	return answer;
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
			let parts = nums.slice(0);
			parts.splice(i, 1);
			let row = dup_permutation(nums, k - 1);
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
	let answer = [];
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
function operant_pretify(x) {
	return x.replace(/\*/g, "×").replace(/\//g, "÷");
}
window.addEventListener("load", () => {
	["v4-r", "v4-c"].forEach(e => {
		document.getElementById(e).addEventListener("scroll", function() {
			this.firstElementChild.style.top = this.scrollTop + "px";
			this.firstElementChild.nextElementSibling.style.bottom = "-" + this.scrollTop + "px";
		});
	});
});
</script>
<?php footer(); ?>