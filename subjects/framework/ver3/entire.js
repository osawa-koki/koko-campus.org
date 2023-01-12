"use script";

/*

*/

//グローバル変数の宣言・初期化
const main = document.getElementsByTagName("main")[0],
	img = document.getElementById("menu-img"),
	menu = document.getElementsByTagName("aside")[0];

let lock_menu = false;
function show_menu() {
	if (lock_menu) {
		lock_menu = false;
		this.style.transform = "rotate(0deg)";
		menu.style.bottom = "100%";
		menu.style.left = "100%";
	} else {
		lock_menu = true;
		this.style.transform = "rotate(360deg)";
		menu.style.bottom = "30px";
		menu.style.left = "30px";
	}
}

const root = () => {
	(function() {
		img.addEventListener("click", show_menu, false);
	})();
	(function() {
		if (1000 < window.innerWidth) {
			window.addEventListener("scroll", () => {
				menu.style["margin-top"] = window.scrollY + "px";
			}, false);
		}
	})();
	(function() {
		let url = location.href.split(/\\|\//),
			a_list = [],
			menu = document.getElementsByTagName("aside")[0],
			elm = document.createElement("div"),
			menu_content = menu.textContent.replace(/\t/g, "").split(/\r\n|\n|\r/).filter(e => e !== "");
		while(menu.firstChild){
			menu.removeChild(menu.firstChild);
		}
		now = decodeURI(url[url.length - 1]).replace(/\?.*/, "").replace(/#.*/, "");
		sbj = decodeURI(url[url.length - 3]);
		fetch("../../subjectsName-converter.json")
		.then((response) => response.json())
		.then((response) => {
			elm.textContent = (sbj in response) ? response[sbj] : sbj;
			elm.classList.add("menu-title");
			menu.appendChild(elm);
			menu_content.forEach(e => {
				let ary = "",
					a = document.createElement("a"),
					br = document.createElement("br");
				a_list.push(e);
				a.setAttribute("href", e);
				a.textContent = e;
				menu.appendChild(a);
				menu.appendChild(br);
				if (now === e) {
					a.classList.add("me-now");
				}
			});
			(function(a_list, now) {
				let idx = a_list.indexOf(now),
					a = document.getElementsByTagName("footer")[0].getElementsByTagName("a");
				a[0].setAttribute("href", (idx === 0) ? "disabled" : a_list[idx - 1]);
				a[1].setAttribute("href", "index");
				a[2].setAttribute("href", (idx === a_list.length - 1) ? "disabled" : a_list[idx + 1]);
			})(a_list, now);
		});
	})();
	(function() {
		Array.from(main.querySelectorAll("table:not(.x)")).forEach(e => {
			e.setAttribute("border", "1");
		});
	})();
	(function() {
		Array.from(main.querySelectorAll("a:not(.footer-button, .x)")).forEach(e => {
			e.setAttribute("target", "_blank");
		});
	})();
	(function() {
		const u = main.querySelectorAll("span.u"),
			color = ["#66FF33", "#6633FF", "#FF773E", "#FF00FF"];
		for (let i = 0; i < u.length; i++) {
			u[i].style.background = `linear-gradient(to bottom, transparent 0 80%, ${color[i % color.length]} 80% 90%, transparent 90% 100%)`;
		}
	})();
	(function() {
		let i,
			h = main.querySelectorAll("h2:not(.x)");
		for (i = 1; i < h.length; i++) {
			let e = document.createElement("div");
			e.classList.add("separator-h2");
			h[i].parentNode.insertBefore(e, h[i]);
		}
	})();
	(function() {
		let i,
			s = document.createElement("section"),
			idx = document.createElement("div"),
			container = document.createElement("ul"),
			h2 = main.getElementsByTagName("h2");
		main.insertBefore(s, main.firstChild);
		idx.textContent = "目次";
		idx.classList.add("index-title");
		s.appendChild(idx);
		container.classList.add("index-container");
		container.classList.add("x");
		s.appendChild(container);
		for (i = 0; i < h2.length; i++) {
			let f = document.createElement("li"),
				n,
				obj;
			f.textContent = h2[i].textContent;
			container.appendChild(f);
			obj = scroll_obj(f, h2[i]);
			obj.prepare();
		}
		function scroll_obj(from, to) {
			let answer = {
				"from" : from,
				"to" : to,
				"prepare" : function() {
					this.from.addEventListener("click", () => {
						let f = window.scrollY,
							t = window.pageYOffset + this.to.getBoundingClientRect().top,
							d = t - f,
							count = 0,
							interval,
							gap = 50;
						interval = setInterval(() => {
							scrollTo(0, count * d / gap + f - 100);
							if (gap <= count) {
								clearInterval(interval);
								this.to.style.color = "red";
								setTimeout(() => {
									this.to.style.color = "black";
								}, 1000);
							}
							count++;
						}, 10);
					});
				},
			};
			return answer;
		}
	})();
	(function() {
		let to = new URL(window.location.href).searchParams.get("to"),
			doc;
		if (to) {
			doc = document.getElementById(to);
			if (doc) {
				let f = window.scrollY,
					t = window.pageYOffset + doc.getBoundingClientRect().top,
					d = t - f,
					count = 0,
					interval,
					gap = 50;
				interval = setInterval(() => {
					scrollTo(0, count * d / gap + f - 100);
					if (gap <= count) {
						clearInterval(interval);
						doc.style.color = "blue";
						setTimeout(() => {
							doc.style.color = "black";
						}, 1000);
					}
					count++;
				}, 10);
			}
		}
	})();
	(function() {
		Array.from(main.querySelectorAll("ul:not(.x), ol:not(.x), img:not(.x)")).forEach(e => {
			const p = e.parentNode,
				p_tag = p.tagName.toLowerCase(),
				x = document.createElement("br"),
				y = document.createElement("br");
			if (p_tag !== "th" && p_tag !== "td") {
				p.insertBefore(x, e);
				p.insertBefore(y, e.nextSibling);
			}
		});
	})();
	(function() {
		Array.from(main.querySelectorAll("div.solution")).forEach(e => {
			e.innerHTML = e.textContent.replace(/\r\n|\r|\n/, "").replace(/\r\n|\r|\n/g, "<br />");

		});
	})();
}
window.addEventListener("load", () => {
	[main, menu].map(e => e.classList.remove("hidden"));
	root();
	let menu_state = false;
	img.addEventListener("transitionend", function() {
		menu_state = (menu_state) ? false : true;
	});
});