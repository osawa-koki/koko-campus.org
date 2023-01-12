"use strict";



// 年表記を年度表記に変更
window.addEventListener("load", function() {
	const e = document.getElementsByClassName("exam");
	for (let i of e) {
		i.innerHTML = i.innerHTML.replace(/(?<=[令和|平成]\d*)年(?=[春|秋]試験[午前|午後])/g, "年度");
	}
})


