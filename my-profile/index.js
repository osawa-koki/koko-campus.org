"use strict";

let xhr;
xhr = new XMLHttpRequest();
xhr.addEventListener("load", function() {
	let doc = document.getElementById("lang"),
		ary,
		ary2 = [];
	ary = this.responseText.split(/\r\n|\n|\r/).filter(e => e !== "").map(e => e.split(","));
	while (ary.length) {
		let i,
			idx,
			max = 0;
		for (i = 0; i < ary.length; i++) {
			if (max < parseInt(ary[i][1])) {
				max = parseInt(ary[i][1]);
				idx = i;
			}
		}
		ary2.push(ary.splice(idx, 1)[0]);
	}
	ary2.forEach(e => {
		let tr, th, td;
		tr = document.createElement("tr");
		th = document.createElement("th");
		td = document.createElement("td");
		th.textContent = e[0];
		td.textContent = `${e[1]} (h)`;
		td.style["text-align"] = "right";
		td.style["padding-right"] = "25px";
		tr.appendChild(th);
		tr.appendChild(td);
		doc.appendChild(tr);
	});
});
xhr.addEventListener("error", () => {
	let tr, td;
	tr = document.createElement("tr");
	td = document.createElement("td");
	td.setAttribute("colspan", "2");
	td.textContent = "データの取得に失敗しました。";
	tr.appendChild(td);
	document.getElementById("lang").appendChild(tr);
});
xhr.open("GET", "lang.csv");
xhr.send();

window.addEventListener("load", () => {
	document.getElementsByTagName("main")[0].classList.remove("hidden");
});



