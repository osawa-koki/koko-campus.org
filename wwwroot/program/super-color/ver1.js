"use strict";

window.addEventListener("load", () => {
	rainbow();
	document.getElementById("v1-rainbow").addEventListener("click", on_rainbow);
	document.getElementById("v1-tri").addEventListener("click", flog);
});


function rainbow() {
	let r = document.getElementById("v1-rainbow");
	let x = [];
	for (let i = 0; i <= 360; i = i + 5) {
		x.push(`hsl(${i}, 100%, 50%) ${Math.round(i / 0.036) / 100}%`);
	}
	r.style.background = `linear-gradient(to right, ${x.join(", ")})`;
}
function on_rainbow(e) {
	if(!e.target.closest("#v1-pointer")) {
		let x = e.offsetX;
		document.getElementById("v1-pointer").style.left = x - 10 + "px";
		document.getElementById("v1-flog").setAttribute("transform", `translate(${x - 10}, 10)`);
		Array.from(document.getElementsByClassName("v1-tri")).forEach(e => {
			try {
				e.setAttribute("d", e.getAttribute("d").replace(/\d+/, x));
			} catch(e) {}
		});
		document.getElementById("v1-clr").setAttribute("stop-color", `hsl(${360 * x / 300}, 100%, 50%)`);
	}
}
function flog(e) {
	if(!e.target.closest("#v1-flog")) {
		let x = e.offsetX;
		let y = e.offsetY;
		document.getElementById("v1-flog").setAttribute("transform", `translate(${x - 10}, ${y - 10})`);
	}
}










