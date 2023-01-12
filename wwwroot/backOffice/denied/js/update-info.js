(() => {
	const del = function() {
		if (window.confirm("削除しますか？")) {
			this.parentNode.remove();
		}
	}
	const getYMD = () => [
		new Date().getFullYear(),
		new Date().getMonth() + 1,
		new Date().getDate(),
	];
	const addIpTxt = (a, b, c, d, e) => {
		const [DEL, A, B, C, D, E, Z] = mkElm(["div", "input", "input", "input", "input", "textarea", "div"]);
		DEL.textContent = "削除";
		DEL.classList.add("deleteButton");
		DEL.addEventListener("click", del);
		[A, B, C, D].map(P => P.type = "text");
		A.value = a;
		B.value = b;
		C.value = c;
		D.value = d;
		E.value = e;
		Z.classList.add("update-info_oneItem");
		[DEL, A, B, C, D, E].map(P => Z.appendChild(P));
		return Z;
	}
	const [y, m, d] = getYMD(),
		[selectY, selectM, selectD, container, containerButton] = getElm(["update-info_dt_select-year", "update-info_dt_select-month", "update-info_dt_select-day", "update-info_containing-box", "update-info_button_containing-box"]);
	let Y_toSend, M_toSend, D_toSend;
	for (let i = 2020; i <= parseInt(y); i++) { // Y
		const option = document.createElement("option");
		option.value = i;
		option.textContent = i;
		if (parseInt(y) === i) {
			option.selected = true;
		}
		selectY.appendChild(option);
	}
	for (let i = 1; i <= 12; i++) { // M
		const option = document.createElement("option");
		option.value = i;
		option.textContent = i;
		if (parseInt(m) === i) {
			option.selected = true;
		}
		selectM.appendChild(option);	
	}
	for (let i = 1; i <= 31; i++) { // D
		const option = document.createElement("option");
		option.value = i;
		option.textContent = i;
		if (parseInt(d) === i) {
			option.selected = true;
		}
		selectD.appendChild(option);		
	}
	document.getElementById("update-info_dt-button").addEventListener("click", () => {
		ers(container);
		ers(containerButton);
		Y_toSend = selectY.value;
		M_toSend = selectM.value.toString().padStart(2, "0");
		D_toSend = selectD.value.toString().padStart(2, "0");
		document.getElementById("update-info_pointing-date").textContent = `${Y_toSend}年 ${M_toSend}月 ${D_toSend}日`;
		const
			url = "receiver",
			json_data = {
				"type": "update-info",
				"action": "SELECT",
				"date": `${Y_toSend}-${M_toSend}-${D_toSend}`,
				"token": TOKEN
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
				container.appendChild(addIpTxt(...e));
			});
			(() => { // ニュース追加ルーチン
				const button = document.createElement("div");
				button.classList.add("add-button");
				button.textContent = "新しいタスクを追加♪";
				button.addEventListener("click", function() {
					const oneDiv = addIpTxt(`${Y_toSend}-${M_toSend}-${D_toSend}`, "", "", "", "");
					container.appendChild(oneDiv);
				});
				containerButton.appendChild(button); 
			})();
			(() => { // 登録完了ルーチン
				const button = document.createElement("div");
				button.classList.add("put-button");
				button.textContent = "タスクを確定して登録♪";
				button.addEventListener("click", function() {
					const data_toSend = new Array();
					Array.from(container.getElementsByClassName("update-info_oneItem")).forEach(e => {
						const oneLine = new Array();
						Array.from(e.querySelectorAll("input, textarea")).map(E => oneLine.push(E.value));
						data_toSend.push(oneLine);
					});
					const
						json = JSON.stringify(data_toSend),
						url = "receiver",
						json_data = {
							"type": "update-info",
							"action": "UPDATE",
							"token": TOKEN,
							"date": `${Y_toSend}-${M_toSend}-${D_toSend}`,
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
					.then(r => window.alert((r === "true") ? "更新に成功しました♪" : "入力内容に誤りがあります。"))
					.catch(e => window.alert("通信に失敗しました。\n再度、登録を行ってください。"));
				});
				containerButton.appendChild(button);
			})();
		});
	});
})();