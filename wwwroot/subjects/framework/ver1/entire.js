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
	underline();
	quote();
	explanation();
	focused();
	board();
	document.getElementById("js").classList.remove("hidden");
});

["resize"].forEach(function(e) {
	addEventListener(e, function() {
		responsive();
	});
});


function responsive() {
	let w = window.innerWidth;
	if (w < 700) {
		["ttl"].forEach(function(e) {
			document.getElementById(e).classList.add("hidden");
		});
		document.getElementById("h1").classList.remove("hidden");
		document.getElementById("main").style.width = "";
		document.getElementById("menu_img").addEventListener("click", show_menu, false);
	} else {
		["ttl"].forEach(function(e) {
			document.getElementById(e).classList.remove("hidden");
		});
		document.getElementById("h1").classList.add("hidden");
		document.getElementById("menu").classList.remove("hidden");
		document.getElementById("main").style.width = `${w - 250}px`;
		document.getElementById("menu").style.height = "";
		document.getElementById("menu_img").removeEventListener("click", show_menu, false);
	}
}
let lock_menu = false;
function show_menu() {
	if (lock_menu === false) {
		lock_menu = true;
		document.getElementById("menu_img").style.transform = "rotate(360deg)";
		document.getElementById("menu").classList.add("menu_move");
		document.getElementById("menu").style.height = `${window.innerHeight - 100}px`;
		document.getElementById("board").classList.add("hidden");
	} else {
		lock_menu = false;
		document.getElementById("menu_img").style.transform = "rotate(0deg)";
		document.getElementById("menu").classList.remove("menu_move");
		document.getElementById("menu").style.height = "0px";
		document.getElementById("board").classList.remove("hidden");
	}
}
function menu() {
	let now = location.href.split(/\\|\//);
	now = decodeURI(now[now.length - 1]).replace(/[x|y|z]/, "");
	Array.from(document.getElementById("menu").querySelectorAll(".module, .supplement, .mylog")).forEach(function(e) {
		let ary = new String;
		e.textContent.replace(/\t/g, "").split(/\n/).forEach(function(f) {
			let add = new String;
			let mark = new String;
			if (e.classList.contains("module")) {
				add = "x";
				mark = "---"
			} else if (e.classList.contains("supplement")) {
				add = "y";
				mark = "・";
			} else if (e.classList.contains("mylog")) {
				add = "z";
				mark = "・";
			}
			if (f !== "" && f !== now) {
				ary += `<a href="${add}-${f}"><span class="line">${mark} </span>${f}</a><br>`;
			} else if (f !== "" && f === now) {
				ary += `<a href="${add}-${f}" class="pointing" style="pointer-events: none;">${mark} ${f}!!!</a><br>`;
			}
		});
		e.innerHTML = ary;
	});
}
function table() {
	Array.from(document.querySelectorAll("table:not(.norble)")).forEach(function(e) {
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
	Array.from(document.querySelectorAll("h2")).forEach(function(e) {
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
	Array.from(document.querySelectorAll("h3")).forEach(function(e) {
		e.outerHTML = `<div class="separator"></div><h3><div class="h3_rect"></div><span>${e.textContent}</span></h3>`;
	});
}
function underline() {
	let u = document.getElementById("main").querySelectorAll("span.u");
	const color = ["#66FF33", "#6633FF", "#FF773E", "#00FF3B", "#FF00FF"];
	for (let i = 0; i < u.length; i++) {
		u[i].style.background = `linear-gradient(to bottom, transparent 0 80%, ${color[i % 5]} 80% 95%, transparent 95% 100%)`;
	}
}
function quote() {
	Array.from(document.getElementById("main").querySelectorAll("div.q")).forEach(function(e) {
		e.innerHTML = `※参考(引用)元サイトは<a href="${e.textContent}">こちら</a>。`;
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
function board() {
	// 綺麗とは言い難いコード、、、
	// 1.g_boardに配列形式でテキストをpushした後に、ループ処理の回数をforeachスコープ内変数(board_count)に保存してclickイベントで呼び出せるように設定する。
	// 2.clickイベントではforeachスコープ内変数(board_count)を準グローバル変数(g_board_me)に設定する。
	// 3.animationendイベントでは、準グローバル変数(g_board_me)に保存されたインデックス番号からg_board配列の要素テキストを特定。
	// 反省点=>span.rタグを取得する関数が築くスコープとanimationend関数が形成するスコープが両立している点@解決はかなり困難???以下の3つの関数をまとめた包括的関数を設定してその中で共有可能変数を設定することで変数汚染問題は解決可能だが事実上意味をなさないような、、、
	let g_board_ttl = new Array;
	let g_board = new Array;
	let board_showing = false;
	let board_count = 0;
	let g_board_me;
	(function() {
		Array.from(document.getElementById("main").querySelectorAll("span.r")).forEach(function(e) {
			g_board_ttl.push(e.innerHTML.match(/!.+?(?=!)/)[0].replace("!", ""));
			g_board.push(e.innerHTML.match(/\?.+?(?=\?)/)[0].replace("?", ""));
			let element = document.createElement("div");
			element.innerHTML = `???&nbsp;${e.innerHTML.match(/!.+?(?=!)/)[0].replace("!", "")}とは&nbsp;???`;
			element.classList.add("ref_button");
			let g_board_now = board_count;
			element.addEventListener("click", function() {
				g_board_me = g_board_now;
				document.getElementById("board").style.height = "300px";
				document.getElementById("board").style.borderWidth = "10px";
			});
			e.parentNode.insertBefore(element, e.nextSibling);
			e.remove();
			board_count++;
		});
	}());
	(function() {
		document.getElementById("board").addEventListener("transitionend", function(y) {
			if (board_showing === false) {
				document.getElementById("chalk").style.backgroundColor = "white";
				document.getElementById("chalk").classList.add("chalking");
			}
		});
	}());
	(function() {
		document.getElementById("chalk").addEventListener("animationend", function() {
			if (board_showing === false) {
				board_showing = true;
				document.getElementById("chalk").style.backgroundColor = "transparent";
				document.getElementById("chalk").classList.remove("chalking");
				document.getElementById("board_content").innerHTML = g_board_ttl[g_board_me] + "<br><br>" + g_board[g_board_me];
				document.getElementById("eraser").style.backgroundColor = "orange";
				document.getElementById("eraser").classList.add("eraser_b4");
			}
		});
	}());
	(function() {
		document.addEventListener("click", (e) => {
			if (board_showing === true) {
				if(!e.target.closest("#board")) {
					let b = document.getElementById("board");
					b.style.height = "0";
					b.style.borderWidth = "0";
					document.getElementById("chalk").style.backgroundColor = "transparent";
					document.getElementById("chalk").classList.remove("chalking");
					document.getElementById("board_content").textContent = "";
					document.getElementById("eraser").style.backgroundColor = "transparent";
					document.getElementById("eraser").classList.remove("eraser_b4");
					setTimeout(function() {
						board_showing = false;
					}, 1000);
				}
			}
		});
	}());
}














