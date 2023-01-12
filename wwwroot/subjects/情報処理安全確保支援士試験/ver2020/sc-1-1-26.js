"use strict";


window.addEventListener("load", function() {
	Array.from(document.getElementById("ok_security").getElementsByTagName("thead")).forEach(function(e) {
		let td = e.getElementsByTagName("th");
		td[1].setAttribute("width", td[0].clientWidth);
	});
});


