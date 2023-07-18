"use strict";

window.addEventListener("load", () => {
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
