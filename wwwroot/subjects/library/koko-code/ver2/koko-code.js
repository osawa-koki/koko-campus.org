'use strict';

function info() {
	let s = new String;
	[
		"プログラム名=>koko-code_ver2",
		"プログラムシリーズ名=>koko-code",
		"プログラムバージョン=>version2",
		"作成日=>2021年10月25日",
		"作成者=>koko",
		"url=>https://koko-campus.com",
		"修正点=>\n・tableの不具合を修正\n・タブの自動調整機能\n・",
		"収穫=>\n・replaceメソッドのcb関数(https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Global_Objects/String/replace)",
		"問題点=>\n・preタグを用いていない(先頭タブの修正のため)\n",
		"次回=>safariで正規表現の後読みが対応されたら開発開始予定\nspanで囲むためのデータを一括してjsonオブジェクトで定義する!!"
	].forEach(function(e) {
		s += e;
		s += "\n" + "-".repeat(25) + "\n";
	});
	console.log(s);
}



window.addEventListener("load", function() {
	let this_path;
	Array.from(document.getElementsByTagName("script")).forEach(function(e) {
		if (e.src.match(/.+ver2\/(?=koko-code\.js)/)) {
			this_path = e.src.match(/.+ver2\/(?=koko-code\.js)/)[0];
		}
	});
	(function () {
		let e = document.createElement("link");
		e.setAttribute("rel", "stylesheet");
		e.setAttribute("href", this_path + "koko-code.css");
		document.getElementsByTagName("head")[0].appendChild(e);
	}());
});


window.addEventListener("load", function() {
	Array.from(document.getElementsByTagName("code")).forEach(function(e) {
		//先頭のインデントとしてのタブの最小値を取得
		let m = e.innerHTML.replace(/^\n/g, "").replace(/\n$/g, "");
		let min = 999;
		let a = m.split("\n");
		a.forEach(function(j) {
			try {min = ((j.match(/\t/g ) || []).length < min) ? j.match(/\t/g).length : min} catch (e) {};
		});
		for (let k = 0; k < a.length; k++) {
			for (let int = 0; int < min; int++) {
				a[k] = a[k].replace("\t", "");
			}
		}
		let cls = e.className.toLowerCase();
		if (["js", "javascript", "es", "ecmascript"].includes(cls)) {
			cls = "js";
		} else if (["php"].includes(cls)) {
			cls = "php"
		} else if (["py", "python"].includes(cls)) {
			cls = "py";
		} else if (["c"].includes(cls)) {
			cls = "c";
		} else if (["html", "htm"].includes(cls)) {
			cls = "html";
		} else if (["css"].includes(cls)) {
			cls = "css";
		} else if (["linux", "Linux", "lx"].includes(cls)) {
			cls = "linux";
		} else if (["ubuntu"].includes(cls)) {
			cls = "ubuntu";
		} else if (["centos"].includes(cls)) {
			cls = "centos"
		}
		e.className = cls;
		e.innerHTML = code_cuter(cls, a.join("\n")).replace(/\n/g, "<br>").replace(/\t/g, "&nbsp".repeat(4));
	});
});
function code_cuter(cls, a) {
	if (cls === "js") {
		a = a.replace(/ \/\/.+/g, (x) => {
			x = x.split("");
			x = x.map((y) => {
				return `<span class='comment-out'>${y}</span>`;
			});
			return x.join("");
		});
		a = a.replace(/(.)(".*?")(.)/g, (x, x1, x2, x3) => { //`<span class='string'>$&</span>`
			if (x1 === ">" && x3 === "<") {
				return x;
			} else {
				return `${x1}<span class='string'>${x2}</span>${x3}`;
			}
		});
		a = a.replace(/function (.*?)\((.*?)\)/g, function(match, p1, p2) {
			let p = new Array;
			if (p2 !== "") {
				p2.replace(" ", "").split(",").forEach(function(r) {
					p.push(`<span class="arg">${r}</span>`);
				});
			}
			return `<span class="keywords">function</span> <span class="key">${p1}</span>(${p.join(", ")})`;
		});
		a = a.replace(/(\.)(.+?)(\(.*?\))/g, function(match, p1, p2, p3) {
			return `${p1}<span class="method">${p2}</span>${p3}`;
		});
		a = a.replace(/(\w+?)\((.*?)\)/g, (x, x1, x2) => {
			return `<span class='function'>${x1}</span><span class='mark'>(</span><span class='arg'>${x2}</span><span class='mark'>)</span>`;
		});
		a = a.replace(/return/g, "<span class='return'>return</span>");
		["window", "console", "document"].forEach(function(j) {
			let r = new RegExp(j, "g");
			a = a.replace(r, function(match) {
				return `<span class="top-obj">${match}</span>`;
			});
		});
		["let", "var", "const", "forEach", "for", "new"].forEach(function(j) {
			let r = new RegExp(j, "g");
			a = a.replace(r, function(match) {
				return `<span class="prefix">${match}</span>`;
			});
		});
		["this"].forEach(function(j) {
			let r = new RegExp(j, "g");
			a = a.replace(r, function(match) {
				return `<span class="this">${match}</span>`;
			});
		});
	} else if (cls === "c") {
		a = a.replace(/\/\*(.|\s)*?\*\//g, x => { //`<span class='comment-out'>$&</span>`
			x = x.split("");
			x = x.map((y) => {
				return `<span class='comment-out'>${y}</span>`;
			});
			return x.join("");
		});
		a = a.replace(/".*?"/g, `<span class='string'>$&</span>`);
		a = a.replace(/(\w+?)\((.*?)\)/g, (x, x1, x2) => {
			let answer = new String;
			x1 = x1.split("");
			x1 = x1.map((y) => {
				return `<span class='function'>${y}</span>`;
			});
			answer += x1.join("");
			x2 = x2.split(",").map(e => {
				return `<span class='arg'>${e}</span>`;
			});
			answer += `(${x2.join(",")})`;
			return answer;
		});
		a = a.replace(/return/g, `<span class='return'>$&</span>`);
		["int", "double", "short", "long", "char", "float", "for", "new"].forEach(function(j) {
			let r = new RegExp(j, "g");
			a = a.replace(r, function(match) {
				return `<span class="prefix">${match}</span>`;
			});
		});
	} else if (cls === "php") {
		a = a.replace(/ \/\/.+/g, (x) => {
			x = x.split("");
			x = x.map((y) => {
				return `<span class='comment-out'>${y}</span>`;
			});
			return x.join("");
		});
		//a = a.replace(/\/\/.*/g, `<span class='comment-out'>$&</span>`);
		a = a.replace(/\/\*(.|\s)*?\*\//g, x => { //`<span class='comment-out'>$&</span>`
			x = x.split("");
			x = x.map((y) => {
				return `<span class='comment-out'>${y}</span>`;
			});
			return x.join("");
		});
		a = a.replace(/__.*?__/g, `<span class='magical'>$&</span>`);
		a = a.replace(/".*?"/g, `<span class='string'>$&</span>`);
		a = a.replace(/\w+(?=\()/g, `<span class='function'>$&</span>`);
		a = a.replace(/function (\w+?)\((.*?)\)/g, function(match, p1, p2) {
			let p = new Array;
			if (p2 !== "") {
				p2.replace(" ", "").split(",").forEach(function(r) {
					p.push(`<span class="arg">${r}</span>`);
				});
			}
			return `<span class="keywords">function</span> <span class="key">${p1}</span>(${p.join(", ")})`;
		});
	} else if (cls === "py") {

	} else if (cls === "html") {
		a = a.replace(/&lt;!--(.*?)--&gt;/g, (x, x1) => {
			x1 = x1.split("");
			x1 = x1.map(e => `<span class='comment-out'>${e}</span>`).join("");
			const hf2 = "<span class='comment-out'>-</span>".repeat(2);
			return `<span class='comment-out'>&lt;</span><span class='comment-out'>!</span>${hf2}${x1}${hf2}<span class='comment-out'>&gt;</span>`;
		});
		a = a.replace(/([a-z]+?)=(".+?")/g, (x, x1, x2) => {
			if (x.match(/comment-out|<|>/)) {
				return x;
			} else {
				return `<span class='atr'>${x1}</span><span class='equal'>=</span><span class='value'>${x2}</span>`;
			}
		});
		a = a.replace(/".*?"/g, `<span class="string">$&</span>`);
		a = a.replace(/&lt;(\w+?)(?= )/g, `&lt;<span class="tagname">$1</span>`);
		a = a.replace(/&lt;(\w+?)&gt;/g, `&lt;<span class="tagname">$1</span>&gt;`);
		a = a.replace(/&lt;\/(\w+?)&gt;/g, `&lt;\/<span class="tagname">$1</span>&gt;`);
		a = a.replace(/&lt;\/?(?!<\/span)|&lt;(?!<)|\/&gt;|&gt;(?!<)/g, `<span class="tag">$&</span>`);
	} else if (cls === "css") {
		a = a.replace(/\/\*.*\*\//g, x => x.split("").map(e => `<span class='comment-out'>${e}</span>`).join(""));
		a = a.replace(/\.[\w\-_]+(?= {)/g, x => x.split("").map(e => `<span class='class'>${e}</span>`).join(""))
		a = a.replace(/#[\w\-_]+(?= {)/g, x => x.split("").map(e => `<span class='id'>${e}</span>`).join(""))
		a = a.replace(/[\w\-_]+(?= {)/g, x => x.split("").map(e => `<span class='tag-css'>${e}</span>`).join(""))
	}
	return a;
}










