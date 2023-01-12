"use strict";

function copy() {
	let txt = document.getElementById("this-blog").getElementsByTagName("input")[0];
	txt.select();
	document.execCommand("copy");
	this.textContent = "copied!";
	this.style.backgroundColor = "#FF00FF";
	this.removeEventListener("click", copy);
}
window.addEventListener("load", () => {
	document.getElementById("copy").addEventListener("click", copy);
	(function() {
		document.querySelectorAll("ul:not(.x), ol:not(.x)").forEach(e => {
			let a, b,
				p = e.parentNode;
			a = document.createElement("br");
			b = document.createElement("br");
			p.insertBefore(a, e);
			p.insertBefore(b, e.nextSibling);
		});
	})();
});
