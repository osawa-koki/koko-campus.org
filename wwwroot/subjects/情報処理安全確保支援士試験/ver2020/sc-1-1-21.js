"use strict";




window.addEventListener("load", function() {
	let last_num = 0; // 前回クリックして表示した要素を非表示するか判定するための変数(最初は存在しないため0)
	let last; // 前回クリックされた要素を保持する変数
	let h = document.getElementById("is_step_show").querySelectorAll("div:not(.exam, .separator)");
	let l = document.getElementsByClassName("is_li");
	for (let i = 0; i < h.length; i++) {
		h[i].classList.add("hidden");
		let h0 = h[i].innerHTML.split(/\n/);
		h0.unshift(`<span class = "is_ttl">${l[i].textContent}</span><br><br>`); // 最初の列にis_ttlクラスを付す
		h[i].innerHTML = h0.join("");
	}
	for (let i = 0; i < l.length; i++) {
		l[i].addEventListener("click", function() {
			scroll_to(document.getElementById("is_step_show"));
			if (last_num === 0) {
				last_num = 1;
			} else {
				last.classList.add("hidden");
			}
			h[i].classList.remove("hidden");
			this.classList.add("isli");
			last = h[i];
		})
	}
})











