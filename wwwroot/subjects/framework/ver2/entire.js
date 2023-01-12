"use script";

/*

*/

window.addEventListener("load", function() {
	responsive();
	menu();
	table();
	a_tag();
	h2();
	h3();
	h4();
	underline();
	quote();
	explanation();
	focused();
	document.getElementById("wrapper").classList.remove("hidden");
});

["resize"].forEach(function(e) {
	addEventListener(e, function() {
		responsive();
	});
});


function responsive() {
	let w = window.innerWidth;
	if (w < 700) {
		document.getElementById("menu_img").addEventListener("click", show_menu, false);
	} else {

	}
}
let lock_menu = false;
function show_menu() {
	if (lock_menu === false) {
		lock_menu = true;
		document.getElementById("menu_img").style.transform = "rotate(360deg)";
		document.getElementById("menu").style.bottom = "30px";
		document.getElementById("menu").style.left = "30px";
	} else {
		lock_menu = false;
		document.getElementById("menu_img").style.transform = "rotate(0deg)";
		document.getElementById("menu").style.bottom = "100%";
		document.getElementById("menu").style.left = "100%";
	}
}
let menu_state = false;
window.addEventListener("load", function() {
	document.getElementById("menu_img").addEventListener("transitionend", function() {
		menu_state = (menu_state) ? false : true;
		this.setAttribute("src", (menu_state) ? "../../../pics/menu-on.png" : "../../../pics/menu.png")
	});
});
function menu() {
	let now = location.href.split(/\\|\//);
	let current_url = decodeURI(now[now.length - 1]).replace(".php", "");
	now = current_url.replace(/[x|y|z]-/, "");
	let a_list = new Array;
	Array.from(document.getElementById("menu").querySelectorAll(".module, .supplement, .mylog")).forEach(function(e) {
		let ary = new String;
		e.textContent.replace(/\t/g, "").split(/\n/).forEach(function(f) {
			let add = new String;
			let mark = new String;
			if (e.classList.contains("module")) {
				add = "x";
				mark = "---";
			} else if (e.classList.contains("supplement")) {
				add = "y";
				mark = "・";
			} else if (e.classList.contains("mylog")) {
				add = "z";
				mark = "・";
			}
			if (f !== "") {
				a_list.push(add + "-" + f);
			}
			if (f !== "" && f !== now) {
				ary += `<a href="${add}-${f}"><span class="line">${mark} </span>${f}</a><br>`;
			} else if (f !== "" && f === now) {
				ary += `<a href="${add}-${f}" class="pointing" style="pointer-events: none;"><span class="line">${mark}</span> ${f}!!!</a><br>`;
			}
		});
		if (e.classList.contains("supplement")) {
			ary += `<a href="../../../contact/index"><span class="line">・ </span>問い合わせ</a><br>`;
			a_list.push("y-問い合わせ");
		}
		e.innerHTML = ary;
	});
	footer(a_list, current_url);
}
function table() {
	Array.from(document.querySelectorAll("table:not(.norble, .x)")).forEach(function(e) {
		e.setAttribute("border", "1");
		e.outerHTML = `<div class="scroll_x">${e.outerHTML}</div>`;
	});
}
function a_tag() {
	Array.from(document.querySelectorAll("#main > a")).forEach(function(e) {
		e.setAttribute("target", "_blank");
	});
}
function h2() {
	let h2_count = true;
	Array.from(document.querySelectorAll("h2:not(.x)")).forEach(function(e) {
		let add = "";
		if (h2_count !== true) {
			add = `<div class="super_separator"></div>`;
		} else {
			h2_count = false;
		}
		e.innerHTML = `${add}<h2><div class="h2_rect"></div><span>${e.textContent}</span></h2>`;
	});
}
function h3() {
	Array.from(document.querySelectorAll("h3:not(.x)")).forEach(function(e) {
		e.outerHTML = `<div class="separator"></div><h3><div class="h3_rect"></div><span>${e.textContent}</span></h3>`;
	});
}
function h4() {
	Array.from(document.querySelectorAll("h4:not(.x)")).forEach(function(e) {
		e.outerHTML = `<h4><div class="h4_rect"></div><span>${e.textContent}</span></h4>`;
	});
}
function underline() {
	let u = document.getElementById("main").querySelectorAll("span.u");
	const color = ["#66FF33", "#6633FF", "#FF773E", "#00FF3B", "#FF00FF"];
	for (let i = 0; i < u.length; i++) {
		u[i].style.background = `linear-gradient(to bottom, transparent 0 80%, ${color[i % 5]} 80% 90%, transparent 90% 100%)`;
	}
}
function quote() {
	Array.from(document.getElementById("main").querySelectorAll("span.q")).forEach(function(e) {
		e.outerHTML = `※参考(引用)元サイトは<a href="${e.textContent}">こちら</a>。`;
	});
}
function explanation() {
	Array.from(document.getElementById("main").querySelectorAll("div.e")).forEach(function(e) {
		let i = e.innerHTML.replace(/\t/g, "").split(/\n/g);
		i[0] = `<div class="exp_ttl">${i[0]}とは???</div><div class="separator"></div>`;
		e.innerHTML = i.join("");
	});
}
function focused() {
	Array.from(document.getElementById("main").querySelectorAll("div.f")).forEach(function(e) {
		let c = e.innerHTML;
		let item = c.match(/!.+?(?=!)/g)[0].replace("!", "");
		c = c.replace(/!.*?!/, "");
		e.innerHTML = `<div class="important"><span class="important_slide">&nbsp;${item}&nbsp;</span></div>${c}`;
	});
}
function footer(a_list, now) {
	now = now.replace(/\.php/g, "");
	let idx = a_list.indexOf(now);
	let a = document.getElementsByTagName("footer")[0].getElementsByTagName("a");
	a[0].setAttribute("href", (idx === 0) ? "disabled" : a_list[idx - 1]);
	a[1].setAttribute("href", "top");
	a[2].setAttribute("href", (idx === a_list.length - 1) ? "disabled" : a_list[idx + 1]);
}

