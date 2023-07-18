"use strict";

window.addEventListener("load", () => {
	slide();
	Array.from(document.getElementById("v1-c").getElementsByClassName("v2-slider")).forEach(e => {
		e.addEventListener("input", slide);
	});
	Array.from(document.getElementById("v1-c").getElementsByClassName("v2-value")).forEach(e => {
		e.addEventListener("change", value);
	});
	Array.from(document.getElementById("v2-z").getElementsByClassName("v2-c")).forEach(e => {
		e.addEventListener("input", check);
	});
});
let z_idx = 0;
function slide() {
	let z = [];
	let x = Array.from(document.getElementById("v1-c").getElementsByClassName("v2-slider"));
	let v = Array.from(document.getElementById("v1-c").getElementsByClassName("v2-value"));
	x.forEach(e => {
		z.push(e.value);
	});
	let i = 0;
	x.forEach(e => {
		let cp = [];
		z.forEach(j => {
			cp.push(j);
		});
		cp[i] = "change";
		e.parentNode.style.background = `linear-gradient(to right, rgba(${cp.join(",").replace("change", e.getAttribute("min"))}), rgba(${cp.join(",").replace("change", e.getAttribute("max"))}))`;
		e.parentNode.nextElementSibling.firstElementChild.value = z[i];
		i++;
	});
	z_idx++;
	let p = document.getElementById("v2-s");
	let e = document.createElement("div");
	e.style.zIndex = z_idx;
	e.style.borderColor = `rgba(${z.join(",")})`;
	e.addEventListener("animationend", faded);
	p.appendChild(e);
	e.classList.add("fadeout");
	let cp = Array.from(document.getElementById("v2-z").getElementsByClassName("v2-d"));
	cp[0].value = `rgba(${z.join(",")})`;
	cp[1].value = `#${arrange(z[0]) + arrange(z[1]) + arrange(z[2])}`;
	let xy = Array.from(document.getElementById("v2-z").getElementsByClassName("v2-c"));
	for (let i = 0; i < cp.length; i++) {
		if (xy[i].checked) {
			cp[i].select();
			document.execCommand("copy");
		}
	}
}
function value() {
	this.parentNode.previousElementSibling.firstElementChild.value = this.value;
	slide();
}
function faded() {
	this.remove();
}
function check() {
	let tf = this.checked;
	Array.from(document.getElementById("v2-z").getElementsByClassName("v2-c")).forEach(e => {
		e.checked = false;
	});
	this.checked = (tf) ? true : false;
	if (this.id === "v2-copy0") {
		document.getElementsByClassName("v2-d")[0].select();
		document.execCommand("copy");
	} else if (this.id === "v2-copy1") {
		document.getElementsByClassName("v2-d")[1].select();
		document.execCommand("copy");
	}
}

function arrange(x) {
	let z = parseInt(x).toString(16).toUpperCase();
	return (Array(2).join("0") + z).slice(-2);
}