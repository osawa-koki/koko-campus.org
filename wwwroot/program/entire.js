"use stript";

/*

こんにちは、プログラムのソースコードに興味を持ってくれてありがとうございます。

このコードはサイト全体の調整用のjsプログラムです。
各プログラムのソースコードを見たい人は、「verなんとか.js」って名前のファイルを見つけてください。

では、そのプログラムコードで会いましょう♪

*/

(function() {
	const menu_img = document.getElementById("menu-img"),
		menu = document.getElementById("menu"),
		w = window.innerWidth;

	["resize", "load"].forEach(e => {
		window.addEventListener(e, () => {
			if (w <= 1000) {
				lock_menu = false;
				menu_img.addEventListener("click", show_menu, false);
			} else {
				menu_img.removeEventListener("click", show_menu);
			}
		});
	});
	let lock_menu = false;
	const show_menu = () => {
		if (!lock_menu) {
			lock_menu = true;
			menu_img.style.transform = "rotate(360deg)";
			menu.style.bottom = "30px";
			menu.style.left = "30px";
		} else {
			lock_menu = false;
			menu_img.style.transform = "rotate(0deg)";
			menu.style.bottom = "100%";
			menu.style.left = "100%";
		}
	}
	const xhr = new XMLHttpRequest();
	xhr.addEventListener("load", function() {
		const url = location.href.split("/"),
			now = decodeURI(url[url.length - 1]).replace(".php", ""),
			ttl = decodeURI(url[url.length - 2]),
			elm = document.createElement("div"),
			ary = this.responseText.replace(/ \t/g, "").split(/\r\n|\r|\n/);
		elm.classList.add("title");
		elm.textContent = ttl;
		menu.appendChild(elm);
		ary.forEach(e => {
			if (e !== "---") {
				const elm = document.createElement("a");
				elm.textContent = e;
				if (e === now) {
					elm.classList.add("on");
				} else {
					elm.setAttribute("href", e);
				}
				menu.appendChild(elm);
			} else {
				const elm = document.createElement("div");
				elm.classList.add("separator");
				menu.appendChild(elm);
			}
		});
	});
	xhr.open("GET", "menu.txt");
	xhr.send();
	window.addEventListener("load", () => {
		document.getElementById("wrapper").classList.remove("hidden");
	});
})();