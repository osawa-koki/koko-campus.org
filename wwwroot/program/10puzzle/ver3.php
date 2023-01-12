<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-01",
	"updated" => "2021-12-01",
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
	<div id="its10-box"><div>計算方法 &rarr;</div><div id="its10"></div></div>
	<div id="calculate-list"></div>
</div>
<script charset = "UTF-8" type="text/javascript">
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
function pushed() {
	document.getElementById("button").removeEventListener("click", pushed);
	document.getElementById("button").classList.add("pushed");
	let list = Array.from(document.getElementsByTagName("input")).map((e) => parseInt(e.value));
	make10(list);
}
function make10 (list) {
	let ok = false;
	const operants = ["+", "-", "*", "/"];
	let length = list.length;
	let f = factorial(list); //4つの数字の順列全てを求める
	let p = dup_permutation(operants, list.length - 1); //4つの演算子から3つの演算子の並び替え
	let k = put_between(f, p); //4つの数字と3つの演算子の融合
	 //ここで「+」「-」の数字の括弧で囲むパターンを追加
	let parent = document.getElementById("calculate-list");
	parent.classList.add("show");
	for (let i = 0; i < k.length; i++) {
		let element = document.createElement("div");
		let text = document.createTextNode(`${k[i]}---->${calculate(k[i])}`);
		element.appendChild(text);
		parent.insertBefore(element, parent.firstChild);
		if (calculate(k[i]) === 10) {
			let its10 = k[i].replace("*", "&times;").replace("/", "&divide;");
			document.getElementById("its10").innerHTML = its10;
			ok = true;
			break;
		}
	}
	if (ok === false) {
		document.getElementById("its10").textContent = "見つけられませんでした、、、";
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
			parts.splice(i, 1); //コピーされた配列(直前にコピーされているため非破壊)のn(i)番目の要素を削除=>例)1回目は[1, 2, 3, 4]のうちの[2, 3, 4]を取得、2回目は[1, 3, 4]を取得、、、
			let row = permutation(parts, k - 1); //再帰関数->n(i)番目の要素を削除された配列からもう一度permutation関数を実行->「k===1」になったらループ終了!徐々にループを遡ってくるよ♪
			for (let j = 0; j < row.length; j++) {
				ans.push([nums[i]].concat(row[j]));
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
</script>
<?php footer(); ?>