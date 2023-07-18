"use strict";

window.addEventListener("load", () => {
	document.getElementById("v2-a").addEventListener("input", check);
	document.getElementById("v2-txt").addEventListener("input", check);
	Array.from(document.getElementById("v2-ms").getElementsByTagName("input")).forEach(e => {
		e.addEventListener("change", () => {
			mode();
			check();
		});
	});
	const t = {
		"mail" : "^[a-zA-Z0-9-_\\.]+@[a-zA-Z0-9-_\\.]+$",
		"phone" : "^\\d{3}-?\\d{4}-?\\d{4}$",
		"post" : "^\\d{3}-\\d{4}$",
		"url" : "^https?:\\/\\/[\\w-]+\\.\\w+.*$",
	}
	document.getElementById("v2-sl").addEventListener("change", function() {
		if (this.value !== "none") {
			document.getElementById("v2-a").value = t[this.value];
		}
		check();
	});
});
function check() {
	let r = document.getElementById("v2-a").value;
	let t = document.getElementById("v2-txt").value;
	let tb = document.getElementById("v2-tb");
	while(tb.firstChild){
		tb.removeChild(tb.firstChild);
	}
	try {
		let mode = [];
		Array.from(document.querySelectorAll("input:checked")).forEach(e => {
			mode.push(e.value);
		});
		let preg = new RegExp(r, mode.join(""));
		let f = t.match(preg);
		if (f !== null) {
			for (let i = 0; i < f.length; i++) {
				let m = document.createElement("tr");
				let m0 = document.createElement("td");
				m0.appendChild(document.createTextNode(i));
				let m1 = document.createElement("td");
				m1.appendChild(document.createTextNode("-->"));
				let m2 = document.createElement("td");
				m2.appendChild(document.createTextNode(f[i]));
				m.appendChild(m0);
				m.appendChild(m1);
				m.appendChild(m2);
				tb.appendChild(m);
			}
		} else {
			let m = document.createElement("tr");
			let m0 = document.createElement("td");
			m0.appendChild(document.createTextNode("マッチしませんでした。"));
			m.appendChild(m0);
			tb.appendChild(m);
		}
	} catch (e) {
		let m = document.createElement("tr");
		let m0 = document.createElement("td");
		m0.appendChild(document.createTextNode("正規表現が不正です。"));
		m.appendChild(m0);
		tb.appendChild(m);
	}
}
function mode() {
	let mode = [];
	Array.from(document.querySelectorAll("input:checked")).forEach(e => {
		mode.push(e.value);
	});
	document.getElementById("v2-mode").textContent = mode.join("");
}
/*
document.addEventListener("keydown", function(e) {
	if (event.ctrlKey && event.key === "z") {
		alert('Undo!');
	}
});
document.addEventListener("keydown", function(e) {
	if (event.ctrlKey && event.key === "Z") {
		alert('Redo!');
	}
});
*/
