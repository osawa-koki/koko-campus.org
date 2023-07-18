"use strict";

window.addEventListener("load", () => {
	coloring();
	Array.from(document.getElementById("v1-c").getElementsByTagName("input")).forEach(e => {
		e.addEventListener("input", coloring);
	});
});
let z_idx = 0;
function coloring() {
	let z = [];
	let x = Array.from(document.getElementById("v1-c").getElementsByTagName("input"));
	x.forEach(e => {
		z.push(e.value);
	});
	let i = 0;
	x.forEach(e => {
		let cp = []; //jsでは参照渡しであるため、「let cp = z」後に「cp」を変更すると「z」も変更されてしまう
		z.forEach(j => {
			cp.push(j);
		});
		cp[i] = "change";
		e.parentNode.style.background = `linear-gradient(to right, rgba(${cp.join(",").replace("change", e.getAttribute("min"))}), rgba(${cp.join(",").replace("change", e.getAttribute("max"))}))`;
		e.parentNode.nextElementSibling.textContent = z[i];
		i++;
	});
	z_idx++;
	let p = document.getElementById("v1-s");
	let e = document.createElement("div");
	e.style.zIndex = z_idx;
	e.style.backgroundColor = `rgba(${z.join(",")})`;
	p.appendChild(e);
	setTimeout(() => {
		p.firstElementChild.remove();
		z_idx--;
	}, 500);
}