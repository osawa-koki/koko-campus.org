<!DOCTYPE html>
	<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>pw管理ページ</title>
		<link rel="stylesheet" href="style.css">
		<meta name="robots" content="none">
	</head>
	<body>
		<main>
			<input id="key-suggestion_form" type="text" autocomplete="on" list="key" />
			<datalist id="key"></datalist>
			<input id="button" type="button" value="検索" />
			<h1 id="target"></h1>
			<div id="show-box"></div>
			<script type="text/javascript" charset="utf-8">
				"use strict";
				const TOKEN = "<?php echo TOKEN; ?>"; 
				(() => { // 予測変換の取得処理
					const
						k = document.getElementById("key"),
						s = document.getElementById("key-suggestion_form")
					;
					s.addEventListener("input", function() {
						(() => {
							while(k.firstChild) {
								k.removeChild(k.firstChild); // 予測候補の中身をすべて削除
							}
						})();
						const v = this.value;
						const xhr = new XMLHttpRequest();
						xhr.open("POST", "get-suggestion");
						xhr.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=UTF-8");
						xhr.onload = function() {
							const r = JSON.parse(this.responseText);
							r.forEach(e => { // 予測候補を追加
								const elm = document.createElement("option");
								elm.value = e;
								k.appendChild(elm);
							});
						};
						xhr.send(`token=${TOKEN}&suggestion=${v.replace(/\(|\)|\./g, "\\$&")}`); // 入力した文字を送信
					});
				})();
				(() => { // 詳細データの取得に関する処理
					function tgl() { // ダブルクリックされたら、disabledのトグル処理
						const ipt = this.firstElementChild;
						ipt.disabled = !ipt.disabled;
					}
					function del() { // trタグの削除処理
						const tr = this.parentNode.parentNode,
							k = tr.getElementsByTagName("input")[0];
						if (window.confirm(`本当に「 ${k.value} 」を削除しますか???`)) {
							tr.remove();
						}
					}
					function cp() {
						const ip = this.previousElementSibling;
						ip.disabled = false;
						ip.select();
						document.execCommand("copy");
						this.value = "ok!";
						this.classList.add("copied");
						setTimeout(() => {
							ip.disabled = true;
							this.value = "copy";
							this.classList.remove("copied");
						}, 1000);
					}
					function up() {
						const tr = this.parentNode.parentNode;
						if (tr.previousElementSibling) {
							tr.parentNode.insertBefore(tr, tr.previousElementSibling);
						}
					}
					function down() {
						const tr = this.parentNode.parentNode;
						if (tr.nextElementSibling) {
							tr.parentNode.insertBefore(tr.nextElementSibling, tr);
						}
					}
					const bx = document.getElementById("show-box"); // tableの外のdiv
					let tb, tbd; // 詳細データのtable, rbodyを格納する用
					function add_tr(kx="", vx="") {
						const
							tr = document.createElement("tr"),
							th = document.createElement("th"),
							td1 = document.createElement("td"),
							td1_bt = document.createElement("input"),
							td2 = document.createElement("td"),
							td2_bt = document.createElement("input"),
							td3 = document.createElement("td"),
							td3_up = document.createElement("input"),
							td3_down = document.createElement("input"),
							ip_th = document.createElement("input"),
							ip_td = document.createElement("input")
						;
						[ip_th, ip_td].forEach(e => {
							e.type = "text";
							e.disabled = true;
						});
						th.classList.add("pw-table-k");
						ip_th.value = kx;
						ip_th.size = "5";
						ip_td.value = vx;
						ip_td.size = "20";
						th.appendChild(ip_th);
						td1.classList.add("pw-table-v");
						td1.appendChild(ip_td);
						td1.appendChild(td1_bt);
						td2.classList.add("pw-table-d");
						td1_bt.type = "button";
						td1_bt.value = "copy!";
						td1_bt.addEventListener("click", cp);
						td2_bt.type = "button";
						td2_bt.value = "削除";
						td3.classList.add("pw-table-ud")
						td3_up.classList.add("up");
						td3_up.type = "button";
						td3_up.value = "上へ";
						td3_up.addEventListener("click", up);
						td3_down.classList.add("down");
						td3_down.type = "button";
						td3_down.value = "下へ";
						td3_down.addEventListener("click", down);
						td3.appendChild(td3_up);
						td3.appendChild(td3_down);
						tr.appendChild(th);
						tr.appendChild(td1);
						tr.appendChild(td2);
						tr.appendChild(td3);
						tbd.appendChild(tr);
						[th, td1].forEach(e => {
							e.ondblclick = tgl;
						});
						td2_bt.addEventListener("click", del);
						td2.appendChild(td2_bt);
					}
					const b = document.getElementById("button");
					b.addEventListener("click", () => { // 詳細データの取得処理(クリックイベント)
						const
							v = document.getElementById("key-suggestion_form").value,
							xhr = new XMLHttpRequest(),
							h1 = document.getElementById("target")
						;
						while(bx.firstChild) {
							bx.removeChild(bx.firstChild);
						}
						xhr.open("POST", "get-detail");
						xhr.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=UTF-8");
						xhr.onload = function() {
							tb = document.createElement("table");
							tbd = document.createElement("tbody");
							let r;
							try {
								r = JSON.parse(this.responseText);
							} catch {
								if (!window.confirm(`「 ${v} 」は登録されていません。\n新しく作成しますか?`)) {
									return; // クリックイベントから抜け出す
								}
								r = {
									"id": "",
									"pw": ""
								}
							}
							tb.appendChild(tbd);
							tb.setAttribute("border", "1");
							for (const [kx, vx] of Object.entries(r)) {
								add_tr(kx, vx);
							}
							bx.appendChild(tb);
							h1.textContent = v;
							(() => { // ボタンboxに関する処理
								const acb = document.createElement("div"),
									add = document.createElement("div"),
									cfm = document.createElement("div"),
									dlt = document.createElement("div");
								acb.classList.add("button-box");
								add.addEventListener("click", () => { // 追加ボタンの処理
									add_tr();
								});
								cfm.addEventListener("click", () => { // 確定ボタンの処理
									if (window.confirm("登録しますか?")) {
										const json = new Object(),
											kv = new Object(),
											tr = Array.from(document.getElementById("show-box").getElementsByTagName("tr"));
										json["token"] = TOKEN;
										tr.forEach(tre => {
											const kv_ip = tre.getElementsByTagName("input"),
												kk = kv_ip[0],
												vv = kv_ip[1];
											kv[kk.value] = vv.value;
										});
										json[h1.textContent] = kv;
										(() => {
											const xhr = new XMLHttpRequest();
											xhr.open("POST", "set-pwds");
											xhr.setRequestHeader("content-type","application/json;charset=UTF-8");
											xhr.onload = function() {
												window.alert("登録成功♪");
											};
											xhr.error = function() {
												window.alert("登録失敗、、、\n通信環境の良いところでもう一度行ってください。");
											}
											xhr.send(JSON.stringify(json));
										})();
									}
								});
								dlt.addEventListener("click", () => { // 削除ボタンの処理
									if (window.confirm(`本当に「 ${v} 」を削除しますか?`)) {
										const json = {
											"token": TOKEN,
											"name": h1.textContent,
											"contents": new Object()
										},
											tr = Array.from(document.getElementById("show-box").getElementsByTagName("tr"));
										tr.forEach(e => {
											const ip2 = e.getElementsByTagName("input"),
												k2 = ip2[0].value,
												v2 = ip2[1].value;
												json["contents"][k2] = [v2];
										});
										xhr.open("POST", "delete-pwds");
										xhr.setRequestHeader("content-type","application/json;charset=UTF-8");
										xhr.onload = function() {
											window.alert("削除完了♪");
										};
										xhr.error = function() {
											window.alert("削除失敗、、、\n通信環境の良いところでもう一度行ってください。");
										}
										xhr.send(JSON.stringify(json));
									}
								});
								add.textContent = "追加";
								cfm.textContent = "確定";
								dlt.textContent = "削除";
								acb.appendChild(add);
								acb.appendChild(cfm);
								acb.appendChild(dlt);
								bx.appendChild(acb);
							})();
						};
						xhr.send(`token=${TOKEN}&keyword=${v}`);
					});
				})();
				(() => { // 一定時間操作がなければログアウト
					const time_given = 60 * 60;
					let time_left = time_given;
					setInterval(() => {
						time_left--;
						if (time_left < 0) {
							location.href = "";
						}
					}, 1000);
					["click", "scroll", "input"].forEach(e => { // 何らかの操作があればリセット
						window.addEventListener(e, () => {
							time_left = time_given;
						});	
					});
				})();
			</script>
			<div id="generate-pw">
				<table>
					<tbody>
						<tr>
							<th>長さ</th>
							<td><input id="length" type="range" min="8" max="100" step="2" value="16" /></td>
							<td id="length-show">16</td>
						</tr>
						<tr>
							<th>特殊文字</th>
							<td colspan="2">
								<ul id="marks">
									<li><input id="bikkuri" type="checkbox" checked /><label for="bikkuri">!(ビックリマーク)</label></li>
									<li><input id="q-mark" type="checkbox" checked /><label for="q-mark">?(Qマーク)</label></li>
									<li><input id="sharp" type="checkbox" /><label for="sharp">#(シャープ)</label></li>
									<li><input id="at-mark" type="checkbox" /><label for="at-mark">@(アットマーク)</label></li>
									<li><input id="percent" type="checkbox" /><label for="percent">%(パーセント)</label></li>
									<li><input id="dollor" type="checkbox" /><label for="dollor">$(ドルマーク)</label></li>
									<li><input id="hyphen" type="checkbox" /><label for="hyphen">-(ハイフン)</label></li>
									<li><input id="underscore" type="checkbox" /><label for="underscore">_(アンダースコア)</label></li>
									<li><input id="and-mark" type="checkbox" /><label for="and-mark">&amp;(アンド)</label></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td colspan="3"><input id="button-to-generate-pw" type="button" value="生成" /></td>
						</tr>
						<tr>
							<td colspan="2"><input id="created-pw" type="text" value="p@ssw0rd" readonly /></td>
							<td><input id="button-to-copy" type="button" value="copy" /></td>
						</tr>
					</tbody>
				</table>
				<script type="text/javascript" charset="utf-8">
					"use strict";
					(() => {
						const
							length = document.getElementById("length"),
							len_show = document.getElementById("length-show"),
							marks = document.getElementById("marks").getElementsByTagName("input"),
							mk_ary = "!?#@%$-_&".split(""),
							button = document.getElementById("button-to-generate-pw"),
							cp = document.getElementById("button-to-copy"),
							zone_for_pw = document.getElementById("created-pw"),
							pw_words = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789".split(""),
							my_pw = new Array()
						;
						length.addEventListener("input", function() {
							len_show.textContent = this.value;
						});
						button.addEventListener("click", () => {
							const temp_pw_words = [...pw_words];
							for (let i = 0; i < mk_ary.length; i++) {
								if (marks[i].checked) {
									temp_pw_words.push(mk_ary[i]);
								}
							}
							for (let i = 0; i < parseInt(length.value); i++) {
								my_pw.push(temp_pw_words[Math.floor(Math.random() * temp_pw_words.length)]);
							}
							zone_for_pw.value = my_pw.join("");
							my_pw.splice(0);
						});
						cp.addEventListener("click", function() {
							zone_for_pw.select();
							document.execCommand("copy");
							this.classList.add("copied");
							this.value = "ok";
							setTimeout(() => {
								this.classList.remove("copied")
								this.value = "copy";
							}, 1000);
						});
					})();
				</script>
			</div>
		</main>
	</body>
</html>