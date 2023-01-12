"use strict";

function copy() {
	const txt = document.getElementById("this-blog").getElementsByTagName("input")[0];
	txt.select();
	document.execCommand("copy");
	this.textContent = "copied!";
	this.classList.add("copied");
	setTimeout(() => {
		this.textContent = "copy";
		this.classList.remove("copied");
	}, 1000);
}
window.addEventListener("load", () => {
	document.getElementById("copy").addEventListener("click", copy);
	(() => {
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
