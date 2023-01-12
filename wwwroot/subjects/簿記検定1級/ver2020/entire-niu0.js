"use strict";

/*
ひとつの関数にまとまると、デバグが困難、、、
*/

["load"].forEach(function(e){
	window.addEventListener(e, function() {
		document.getElementById("js").classList.remove("hidden");
		let w = window.innerWidth;
		if (w < 700) {
			["ttl"].forEach(function(e) {
				document.getElementById(e).classList.add("hidden");
			});
			let lock_menu = false;
			document.getElementById("menu_img").addEventListener("click", function() {
				if (lock_menu === false) {
					lock_menu = true;
					document.getElementById("menu_img").style.transform = "rotate(360deg)";
					document.getElementById("menu").classList.add("menu_move");
					document.getElementById("menu").style.height = `${window.innerHeight - 100}px`;
				} else {
					lock_menu = false;
					document.getElementById("menu_img").style.transform = "rotate(0deg)";
					document.getElementById("menu").classList.remove("menu_move");
					document.getElementById("menu").style.height = "0px";
				}
			});
		} else {
			document.getElementById("h1").classList.add("hidden");
			document.getElementById("menu").classList.remove("hidden");
			document.getElementById("main").style.width = `${w - 250}px`;
		}
		const menu = Array.from(document.getElementById("menu").querySelectorAll(".s0, .s1"));
		let now = location.href.split(/\\|\//);
		now = now[now.length - 1];
		now = decodeURI(now);
		for (let i = 0; i < menu.length; i++) {
			let m = menu[i].textContent.replace(/\t/g, "").split(/\n/);
			let ary = new String;
			m.forEach(function(f) {
				if (f !== "" && f !== now) {
					ary += `<a href="z${i}-${f}"><span class="line">--- </span>${f}</a><br>`;
				} else if (f !== "" && f === now) {
					ary += `<a href="z${i}-${f}" class="pointing" style="pointer-events: none;">--- ${f}!!!</a><br>`;
				}
			});
			menu[i].innerHTML = ary;
		}
		Array.from(document.querySelectorAll("table:not(.norble)")).forEach(function(e) {
			e.setAttribute("border", "1");
			e.outerHTML = `<div class="scroll_x">${e.outerHTML}</div>`;
		});
		Array.from(document.querySelectorAll("#main > a")).forEach(function(e) {
			e.setAttribute("target", "_blank");
		});
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
		Array.from(document.querySelectorAll("h3")).forEach(function(e) {
			e.outerHTML = `<div class="separator"></div><h3><div class="h3_rect"></div><span>${e.textContent}</span></h3>`;
		});
		(function() {
			let u = document.getElementById("main").querySelectorAll("span.u");
			const color = ["#66FF33", "#6633FF", "#FF773E", "#00FF3B", "#FF00FF"];
			for (let i = 0; i < u.length; i++) {
				u[i].style.background = `linear-gradient(to bottom, transparent 0 70%, ${color[i % 5]} 70% 80%, transparent 80% 100%)`;
			}
		}());
		(function() {
			Array.from(document.getElementById("main").querySelectorAll("div.q")).forEach(function(e) {
				e.innerHTML = `※参考(引用)元サイトは<a href="${e.textContent}">こちら</a>。`;
			});
		}());
		(function() {
			Array.from(document.getElementById("main").querySelectorAll("div.e")).forEach(function(e) {
				let i = e.innerHTML.replace(/\t/g, "").split(/\n/g);
				i[0] = `<div class="exp_ttl">${i[0]}とは???</div><div class="separator"></div>`;
				e.innerHTML = i.join("");
			});
		}());
		(function() {
			Array.from(document.getElementById("main").querySelectorAll("div.f")).forEach(function(e) {
				let c = e.innerHTML;
				let item = c.match(/(?<=!).*?(?=!)/)[0];
				c = c.replace(/!.*?!/, "");
				e.innerHTML = `<div class="important"><span class="important_slide">&nbsp;${item}&nbsp;</span></div>${c}`;
			});
		}());
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
				g_board_ttl.push(e.innerHTML.match(/(?<=!).+?(?=!)/)[0]);
				g_board.push(e.innerHTML.match(/(?<=\?).+?(?=\?)/)[0]);
				let element = document.createElement("div");
				element.innerHTML = `???&nbsp;${e.innerHTML.match(/(?<=!).+?(?=!)/)[0]}とは&nbsp;???`;
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
		(function() {
			Array.from(document.getElementById("main").querySelectorAll("div.t")).forEach(function(e) {
				let t = new String;
				let c = e.innerHTML.replace(/\t/g, "");
				let item = c.match(/(?<=!).+?(?=!)/)[0];
				if (c.match(/(?<=\?).+?(?=\?)/)) {
					t += `<tr class="transaction_tr"><th width="50%" colspan="2"><span class="debit">借方</span></th><th width="50%" colspan="2"><span class="credit">貸方</th></tr>`;
				}
				c = c.replace(/!.*?!/, "");
				c.split(/\n/).forEach(function(j) {
					if (j !== "") {
						let k = j.split(",");
						let a = (k[0].match(/.+?(?=\d)/)) ? `(${k[0].match(/.+?(?=\d)/)[0]})` : "";
						let b = (k[0].match(/\d+/)) ? parseInt(k[0].match(/\d+/)[0]).toLocaleString() : "";
						let c = (k[1].match(/.+?(?=\d)/)) ? `(${k[1].match(/.+?(?=\d)/)[0]})` : "";
						let d = (k[1].match(/\d+/)) ? parseInt(k[1].match(/\d+/)[0]).toLocaleString() : "";
						t += `<tr><td>${a}</td><td>${b}</td><td>&nbsp;</td><td>${c}</td><td>${d}</td></tr>`;
					}
				});
				e.outerHTML = `<table border="1" class="nowrap_table transaction_table"><caption>${item}</caption><tbody>${t}</tbody></table>`;
			});
		}());
		(function() {
			Array.from(document.getElementById("main").querySelectorAll("div.pl")).forEach(function(e) {
				let c = e.textContent;
				let t = new String;
				let o = new Object;
				c.match(/\d+\[.+\]/g).forEach(function(j) {
					o[parseInt(j.match(/\d+/))] = j.match(/(?<=\[).+(?=\])/)[0].split(",");
				});
				let total = new Number;
				const pl_ttl = ["売上高", "売上原価", "販管費", "営業外収益", "営業外費用", "特別利益", "特別損失"];
				let v = new Array(7);
				for (let i = 0; i < v.length; i++) {
					v[i] = new Number;
				}
				let profit = ["営業利益", "経常利益", "税引前当期純利益", "当期純利益"];
				let profit_count = 0;
				[1, 2, 3, 4, 5, 6, 7].forEach(function(x) {
					if (x === 1) {
						total += parseInt(o[x][0].match(/\d+/)[0]);
						t += `<tr><td class="bb">&#${8543 + x};</td><td class="bb" colspan="2">${pl_ttl[x - 1]}</td><td>&nbsp;&nbsp;&nbsp;</td><td></td><td>&nbsp;&nbsp;&nbsp;</td><td class="r">${total.toLocaleString()}</td></tr>`;
					} else if (x === 2) {
						total -= parseInt(o[x][0].match(/\d+/)[0]) + parseInt(o[x][1].match(/\d+/)[0]) - parseInt(o[x][2].match(/\d+/)[0]);
						t += `<tr><td class="bb">&#${8543 + x};</td><td class="bb" colspan="2">${pl_ttl[x - 1]}</td><td></td><td colspan="3"></td></tr>`;
						t += `<tr><td></td><td>1</td><td>期首商品棚卸高</td><td></td><td class="r">${parseInt(o[x][0].match(/\d+/)[0]).toLocaleString()}</td><td></td><td></td></tr>`;
						t += `<tr><td></td><td>2</td><td>当期商品仕入高</td><td></td><td class="u1 r">${parseInt(o[x][1].match(/\d+/)[0]).toLocaleString()}</td><td></td><td></td></tr>`;
						t += `<tr><td></td><td></td><td>合計</td><td></td><td class="r">${(parseInt(o[x][0].match(/\d+/)[0]) + parseInt(o[x][1].match(/\d+/)[0])).toLocaleString()}</td><td></td><td></td></tr>`;
						t += `<tr><td></td><td>3</td><td>期末商品棚卸高</td><td></td><td class="u1 r">${o[x][2].match(/\d+/)[0]}</td><td></td><td class="u1 r">${(parseInt(o[x][0].match(/\d+/)[0]) + parseInt(o[x][1].match(/\d+/)[0]) - parseInt(o[x][2].match(/\d+/)[0])).toLocaleString()}</td></tr>`;
						t += `<tr><td></td><td></td><td class="font_red">売上総利益</td><td></td><td></td><td></td><td class="r">${total}</td></tr>`;
					} else {
						t += `<tr><td class="bb">&#${8543 + x};</td><td class="bb" colspan="2">${pl_ttl[x - 1]}</td><td></td><td colspan="3"></td></tr>`;
					}
					if (typeof o[x] !== "undefined" && x !== 1 && x !== 2) {
						for (let i = 0; i < o[x].length; i++) {
							v[x - 1] += parseInt(o[x][i].match(/\d+/)[0]);
							if (i !== o[x].length - 1) {
								t += `<tr><td></td><td>${i + 1}</td><td>${o[x][i].match(/[^\d]*/)}</td><td></td><td class="r">${parseInt(o[x][i].match(/\d+/)[0]).toLocaleString()}</td><td></td><td></td></tr>`;
							} else if (i === o[x].length - 1) {
								if (x.toString().match(/(4|6)/)) {
									t += `<tr><td></td><td>${i + 1}</td><td>${o[x][i].match(/[^\d]*/)}</td><td></td><td class="u1 r">${parseInt(o[x][i].match(/\d+/)[0]).toLocaleString()}</td><td></td><td class="r">${v[x-1]}</td></tr>`;
								} else {
									t += `<tr><td></td><td>${i + 1}</td><td>${o[x][i].match(/[^\d]*/)}</td><td></td><td class="u1 r">${parseInt(o[x][i].match(/\d+/)[0]).toLocaleString()}</td><td></td><td class="u1 r">${v[x-1]}</td></tr>`;
								}
							}
							if (x.toString().match(/(4|6)/)) {
								total += parseInt(o[x][i].match(/\d+/)[0]);
							} else {
								total -= parseInt(o[x][i].match(/\d+/)[0]);
							}
						}
					}
					if (x.toString().match(/(3|5|7)/)) {
						t += `<tr><td></td><td></td><td class="font_red">${profit[profit_count]}</td><td></td><td></td><td></td><td class="r">${total}</td></tr>`;
						profit_count++;
					}
				});
				total -= parseInt(o[8]);
				t += `<tr><td></td><td colspan="2">法人税等</td><td></td><td class="r"></td><td></td><td class="u1 r">${parseInt(o[8]).toLocaleString()}</td></tr>`;
				t += `<tr><td></td><td></td><td class="font_red">当期純利益</td><td></td><td></td><td></td><td class="u2 r">${total}</td></tr>`;
				e.outerHTML = `<div class="scroll_x" style="padding: 0.3rem; border: 1px black solid;"><table class="tb nowrap_table"><caption>損益計算書</caption><tbody>${t}</tbody></table></div>`;
			});
		}());
	});
});
/*
["resize"].forEach(function(trigger) {
	window.addEventListener(trigger, function(e) {
		window.location.reload();
	});
});
*/















