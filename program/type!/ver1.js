"use strict";

const on = document.getElementById("v1-on"),
	show = document.getElementById("v1-show"),
	button = document.getElementById("v1-button");
button.addEventListener("click", function() {
	this.style.display = "none";
	try {
		tbl.remove();
	} catch (error) {}
	count = 0;
	bad = 0;
	type_count = [0, 0];
	on.textContent = 3;
	const time = 100;
	setTimeout(() => {
		on.textContent = 2;
		setTimeout(() => {
			on.textContent = 1;
			setTimeout(() => {
				on.textContent = "";
				root();
			}, time);
		}, time);
	}, time);
});
let nw,
	nl,
	wds,
	idx = 0,
	ary = [],
	count = 0,
	bad = 0,
	timer,
	type_count = [0, 0],
	tbl;
const root = () => {
	wds = shuffle(js);
	put_wds();
	window.addEventListener("keydown", ki);
	timer = new Date().getTime();
}
const ki = e => {
	let k = e.key;
	if (k.length === 1) {
		if (nl === k) {
			ary[idx].classList.remove("now");
			document.getElementById(`v1_key-${ary[idx].textContent.toLowerCase()}`).getElementsByTagName("rect")[0].style.fill = "none";
			idx++;
			if (idx < ary.length) { //最後の文字以外
				ary[idx].classList.add("now");
				nl = ary[idx].textContent;
				document.getElementById(`v1_key-${ary[idx].textContent.toLowerCase()}`).getElementsByTagName("rect")[0].style.fill = "orange";
			} else { //最後の文字
				if (count < 30) {
					put_wds();
				} else {
					let tbd, tr, th, td, i,
						th2 = ["時間(秒)", "単語数", "文字数", "誤回答数"],
						td2 = [(new Date().getTime() - timer) / 1000, type_count[0], type_count[1], bad];
					ers();
					tbl = document.createElement("table");
					tbl.style.fontSize = "12px";
					tbd = document.createElement("tbody");
					tbl.appendChild(tbd);
					for (i = 0; i < th2.length; i++) {
						tr = document.createElement("tr");
						th = document.createElement("th");
						th.textContent = th2[i];
						td = document.createElement("td");
						td.textContent = td2[i];
						tr.appendChild(th);
						tr.appendChild(td);
						tbd.appendChild(tr);
					}
					tr = document.createElement("tr");
					td = document.createElement("td");
					td.setAttribute("colspan", "2");
					button.style.display = "";
					tr.appendChild(td);
					td.appendChild(button);
					tbd.appendChild(tr);
					show.appendChild(tbl)
				}
			}
		} else {
			sound("square", 0.12);
			bad++;
		}
	}
}
const put_wds = () => {
	let i;
	type_count[0]++;
	count++;
	ary = [];
	idx = 0;
	ers();
	nw = wds.shift();
	nw = nw.split("");
	for (i = 0; i < nw.length; i++) {
		type_count[1]++;
		let elm = document.createElement("span");
		elm.textContent = nw[i];
		if (i === 0) {
			elm.classList.add("now");
			nl = nw[i];
		}
		ary.push(elm);
		on.appendChild(elm);
	}
	document.getElementById(`v1_key-${on.firstChild.textContent.toLowerCase()}`).getElementsByTagName("rect")[0].style.fill = "orange";
}
let js = [
	"let",
	"const",
	"var",
	"document",
	"window",
	"addEventListener",
	"function",
	"setTimeout",
	"setInterval",
	"split",
	"promise",
	"getElementById",
	"getElementsByTagName",
	"getElementsByClassName",
	"classList",
	"removeEventListener",
	"for",
	"forEach",
	"length",
	"textContent",
	"console",
	"match",
	"replace",
	"join",
	"parseInt",
	"toString",
	"for",
	"while",
	"switch",
	"if",
	"pop",
	"push",
	"shift",
	"unshift",
	"of",
	"in",
	"preventDefault",
	"value",
	"input",
	"Date",
];
const shuffle = ([...array]) => {
	for (let i = array.length - 1; i >= 0; i--) {
		const j = Math.floor(Math.random() * (i + 1));
		[array[i], array[j]] = [array[j], array[i]];
	}
	return array;
}
const ers = () => {
	while(on.firstChild){
		on.removeChild(on.firstChild);
	}
}
const sound = (type, sec) => {
	const ctx = new AudioContext()
	const osc = ctx.createOscillator()
	osc.type = type
	osc.connect(ctx.destination)
	osc.start()
	osc.stop(sec)
}






