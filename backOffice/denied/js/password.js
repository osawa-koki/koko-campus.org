(() => {
	(() => {
		const [k, i] = getElm(["pw-key", "pwName-input"]);
		i.addEventListener("input", function() {
			(() => {
				ers(k);
			})();
			const xhr = new XMLHttpRequest();
			xhr.open("POST", "receiver");
			xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=UTF-8");
			xhr.onload = function() {
				const r = JSON.parse(this.responseText);
				r.forEach(e => { // 予測候補を追加
					const elm = document.createElement("option");
					elm.value = e;
					k.appendChild(elm);
				});
			};
			xhr.send(`type=password&action=GET&contents=${this.value.trim()}&token=${TOKEN}`); // 入力した文字を送信
		});
	})();
	(() => { // 詳細データの取得に関する処理
		let target;
		const [del, cp, mkLine] = [
			function () {
				const tr = this.parentNode.parentNode;
				const k = tr.getElementsByTagName("input")[0];
				if (window.confirm(`本当に「 ${k.value} 」を削除しますか???`)) {
					tr.remove();
				}
			},
			function () {
				const ip = this.parentNode.parentNode.getElementsByTagName("input")[1];
				ip.select();
				document.execCommand("copy");
				this.value = "OK!!!";
				this.classList.add("copied");
				setTimeout(() => {
					ip.disabled = true;
					this.value = "コピー♪";
					this.classList.remove("copied");
				}, 1000);
			},
			function (k, v) {
				const [tr, th, td, tdBtn, ip1, ip2, ip3, ip4] = mkElm(["tr", "th", "td", "td", "input", "input", "input", "input"]);
				[ip1.value, ip2.value, ip3.value, ip4.value] = [k, v, "コピー♪", "削除"];
				[ip1.type, ip2.type, ip3.type, ip4.type] = ["text", "text", "button", "button"];
				th.appendChild(ip1);
				ip1.width = "100px";
				ip1.dataset.check = k;
				td.appendChild(ip2);
				ip2.width = "300px";
				ip2.dataset.check = v;
				tdBtn.appendChild(ip3);
				tdBtn.appendChild(ip4);
				tr.appendChild(th);
				tr.appendChild(td);
				ip3.addEventListener("click", cp);
				ip4.addEventListener("click", del);
				tr.appendChild(tdBtn);
				return tr;
			}
		];
		const bx = document.getElementById("pw-box"); // tableの外のdiv
		let tb, tbd, cpt;
		document.getElementById("pw-button").addEventListener("click", () => { // 詳細データの取得処理(クリックイベント)
			console.log(1);
			const [v, tgt] = getElm(["pwName-input", "pw-target"]);
			const xhr = new XMLHttpRequest();
			ers(bx);
			xhr.open("POST", "receiver");
			xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=UTF-8");
			xhr.onload = function() {
				console.log(1);
				[tb, tbd, cpt] = mkElm(["table", "tbody", "caption"]);
				let r;
				if (this.responseText !== "false") {
					r = JSON.parse(this.responseText);
				} else {
					if (!window.confirm(`「 ${v.value} 」は登録されていません。\n新しく作成しますか?`)) {
						return true;
					}
					r = [
						{"keyword": "id", "value": ""},
						{"keyword": "pw", "value": ""}
					];
				}
				cpt.textContent = v.value;
				tb.appendChild(cpt);
				tb.appendChild(tbd);
				r.forEach(e => {
					tbd.appendChild(mkLine(e.keyword, e.value));
				});
				bx.appendChild(tb);
				(() => { // ボタンboxに関する処理
					const [acb, add, cfm, dlt] = mkElm(["div", "div", "div", "div"]);
					[add.textContent, cfm.textContent, dlt.textContent] = ["追加", "確定", "削除"];
					acb.id = "pw-button-box";
					add.addEventListener("click", () => { // 追加ボタンの処理
						tbd.appendChild(mkLine("", ""));
					});
					cfm.addEventListener("click", () => { // 確定ボタンの処理
						if (window.confirm("登録しますか?")) {
							const [contents, tr] = [
								[], Array.from(document.getElementById("pw-box").getElementsByTagName("tr"))
							];
							tr.forEach(kv => {
								const I = kv.querySelectorAll("input[type=text]");
								contents.push({
									"keyword": I[0].value,
									"value": I[1].value,
									"changed": !(I[0].value === I[0].dataset.check && I[1].value === I[1].dataset.check)
								});
							});
							(() => {
								const xhr = new XMLHttpRequest();
								xhr.open("POST", "receiver");
								xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=UTF-8");
								xhr.onload = function() {
									window.alert("登録成功♪");
								};
								xhr.error = function() {
									window.alert("登録失敗、、、\n通信環境の良いところでもう一度行ってください。");
								}
								xhr.send(`type=password&action=POST&target=${target}&token=${TOKEN}&contents=${JSON.stringify(contents)}`);
							})();
						}
					});
					dlt.addEventListener("click", () => { // 削除ボタンの処理
						if (window.confirm(`本当に「 ${v.value} 」を削除しますか?`)) {
							xhr.open("POST", "receiver");
							xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=UTF-8");
							xhr.onload = function() {
								window.alert("削除完了♪");
							};
							xhr.error = function() {
								window.alert("削除失敗、、、\n通信環境の良いところでもう一度行ってください。");
							}
							xhr.send(`type=password&action=DELETE&target=${target}&token=${TOKEN}`);
						}
					});
					[add, cfm, dlt].map(e => acb.appendChild(e));
					bx.appendChild(acb);
				})();
			};
			xhr.send(`type=password&action=SELECT&contents=${v.value}&token=${TOKEN}`);
			target = v.value;
		});
	})();
})();














