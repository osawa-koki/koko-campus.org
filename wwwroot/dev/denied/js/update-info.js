"use strict";
(() => {
	const add_tr = (k, v) => {
		const
			tr = document.createElement("tr"),
			th = document.createElement("th"),
			td = document.createElement("td"),
			td2 = document.createElement("td"),
			ip = document.createElement("input"),
			ip2 = document.createElement("input")
		;
		th.textContent = k;
		ip.type = "text";
		ip.value = v.replace("https://koko-campus.org", "");
		ip.size = "35";
		ip2.type = "button";
		ip2.value = "削除";
		ip2.addEventListener("click", function() {
			const tr_parent = this.parentNode.parentNode;
			section_hold = true;
			if (window.confirm(`「 ${tr_parent.getElementsByTagName("th")[0].textContent} 」を削除します。\nよろしいですか???`)) {
				tr_parent.remove();
			}
			setTimeout(() => {
				section_hold = false;
			}, 300);
		});
		td.appendChild(ip);
		td2.appendChild(ip2);
		tr.appendChild(th);
		tr.appendChild(td);
		tr.appendChild(td2);
		return tr;
	}
	const create_table = () => [
		document.createElement("table"),
		document.createElement("tbody"),
	];
	const create_caption = () => {
		const
			caption = document.createElement("caption"),
			add = document.createElement("input"),
			del= document.createElement("input")
		;
		add.type = "button";
		add.classList.add("add");
		add.value = "フィールドの追加";
		add.addEventListener("click", function() {
			const written_k = prompt("属性を入力して下さい。");
			if (written_k && written_k !== "") {
				this.parentNode.parentNode.appendChild(add_tr(written_k, ""));
			}
		});
		del.type = "button";
		del.classList.add("del");
		del.value = "タスクの削除";
		del.addEventListener("click", function() {
			section_hold = true;
			if (window.confirm("本当にタスクを削除してもよろしいでしょうか???")) {
				this.parentNode.parentNode.remove();
				setTimeout(() => {
					section_hold = false;
				}, 300);
			}
		});
		caption.appendChild(add);
		caption.appendChild(del);
		return caption;
	}
	const
		dt = new Date(),
		y = dt.getFullYear(),
		m = dt.getMonth() + 1,
		d = dt.getDate(),
		select_Y = document.getElementById("update-info_dt_select-year"),
		select_M = document.getElementById("update-info_dt_select-month"),
		select_D = document.getElementById("update-info_dt_select-day"),
		container = document.getElementById("update-info_containing-box")
	;
	let Y_toSend, M_toSend, D_toSend;
	for (let i = 2020; i <= parseInt(y); i++) { // Y
		const option = document.createElement("option");
		option.value = i;
		option.textContent = i;
		if (parseInt(y) === i) {
			option.selected = true;
		}
		select_Y.appendChild(option);
	}
	for (let i = 1; i <= 12; i++) { // M
		const option = document.createElement("option");
		option.value = i;
		option.textContent = i;
		if (parseInt(dt.getMonth()) + 1 === i) {
			option.selected = true;
		}
		select_M.appendChild(option);	
	}
	for (let i = 1; i <= 31; i++) { // D
		const option = document.createElement("option");
		option.value = i;
		option.textContent = i;
		if (parseInt(dt.getDate()) === i) {
			option.selected = true;
		}
		select_D.appendChild(option);		
	}
	document.getElementById("update-info_dt-button").addEventListener("click", () => {
		while (container.firstChild) {
			container.removeChild(container.firstChild);
		}
		Y_toSend = select_Y.value;
		M_toSend = select_M.value.toString().padStart(2, "0");
		D_toSend = select_D.value.toString().padStart(2, "0");
		document.getElementById("update-info_pointing-date").textContent = `${Y_toSend}年 ${M_toSend}月 ${D_toSend}日`;
		const
			url = "../update/information",
			json_data = {
				"get": "for-register",
				"year": Y_toSend,
				"month": M_toSend,
				"date": D_toSend
			},
			data = {
				method: "POST",
				mode: "cors",
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/x-www-form-urlencoded",
				}
			}
		;
		data["body"] = Object.keys(json_data).map(k => k + "=" + encodeURIComponent(json_data[k])).join("&");
		fetch(url, data)
		.then(response => response.json())
		.then(response => {
			response.forEach(e => {
				const [tb, tbd] = create_table();
				(() => {
					tb.appendChild(create_caption());
				})();
				for (let [k, v] of Object.entries(e)) {
					tbd.appendChild(add_tr(k, v));
				}
				tb.appendChild(tbd);
				container.appendChild(tb);
			});
			(() => { // テーブル追加ルーチン
				const button = document.createElement("div");
				button.classList.add("add-button");
				button.textContent = "実施したタスクの追加";
				button.addEventListener("click", function() {
					const [tb, tbd] = create_table();
					["type", "contents", "url"].forEach(e => {
						tbd.appendChild(add_tr(e, ""));
					});
					tb.appendChild(create_caption());
					tb.appendChild(tbd);
					this.parentNode.insertBefore(tb, this);
				});
				container.appendChild(button); 
			})();
			(() => { // 登録完了ルーチン
				const button = document.createElement("div");
				button.classList.add("put-button");
				button.textContent = "タスクを確定して登録♪";
				button.addEventListener("click", function() {
					const data_toSend = new Array();
					Array.from(container.getElementsByTagName("table")).forEach(e => {
						const struct = new Object();
						Array.from(e.getElementsByTagName("tr")).forEach(tr => {
							const
								k = tr.getElementsByTagName("th")[0].textContent,
								v = tr.querySelectorAll("input[type=text]")[0].value,
								url_prefix = "https://koko-campus.org";
							;
							struct[k] = (k === "url") // urlの場合に先頭の「/」の有無を調整
							? url_prefix + v.replace(/^\w/, "/$&") : v;
						});
						data_toSend.push(struct);
					});
					const
						json = JSON.stringify(data_toSend),
						url = "../update/information",
						json_data = {
							"put": "from-devtool",
							"token": TOKEN,
							"year": Y_toSend,
							"month": M_toSend,
							"date": D_toSend,
							"contents": json
						},
						data = {
							method: "POST",
							mode: "cors",
							headers: {
								"Content-Type": "application/x-www-form-urlencoded",
							}
						}
					;
					data["body"] = Object.keys(json_data).map(k => k + "=" + encodeURIComponent(json_data[k])).join("&");
					fetch(url, data)
					.then(r => r.text())
					.then(r => window.alert("更新に成功しました♪"))
					.catch(e => window.alert("更新に失敗しました。\n再度、登録を行ってください。"));
				});
				container.appendChild(button); 
			})();
		});
	});
})();