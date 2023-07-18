(() => {
	const [meta1, meta2, meta3, meta4, page, pageC, fs, btn] = getElm(["upload-meta1-select", "upload-meta2-select", "upload-meta3-select", "upload-meta4-select", "upload-page-select", "upload-textarea", "upload-filesInput", "upload-button"]);
	let subject, level, version;
	const pageReset = () => {
		ers(page);
		fs.disabled = true;
		pageC.value = "";
		btn.disabled = true;
	};
	(() => {
		pageReset();
		fetch("receiver", {
			method: "POST",
			mode: "cors",
			cache: "no-cache",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: obj2qstr({
				"type": "get-category",
				"token": TOKEN
			})
		})
		.then(r => r.json())
		.then(r => {
			const opt = document.createElement("option");
			opt.value = "xxxx";
			opt.textContent = "選択して下さい。";
			meta1.appendChild(opt);
			r.forEach(e => {
				const opt = document.createElement("option");
				opt.value = e.category;
				opt.textContent = e.category_name;
				meta1.appendChild(opt);
			});
		});
	})();
	meta1.addEventListener("change", () => {
		pageReset();
		ers(meta2);
		ers(meta3);
		ers(meta4);
		fetch("receiver", {
			method: "POST",
			mode: "cors",
			cache: "no-cache",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: obj2qstr({
				"type": "upload-files",
				"action": "GET",
				"step": "subject",
				"category": meta1.value,
				"token": TOKEN
			})
		})
		.then(r => r.json())
		.then(r => {
			const opt = document.createElement("option");
			opt.value = "xxxx";
			opt.textContent = "選択して下さい。";
			meta2.appendChild(opt);
			r.forEach(e => {
				const opt = document.createElement("option");
				opt.value = e.subject;
				opt.textContent = e.subject_name;
				meta2.appendChild(opt);
			});
		});
	});
	meta2.addEventListener("change", () => {
		pageReset();
		ers(meta3);
		ers(meta4);
		fetch("receiver", {
			method: "POST",
			mode: "cors",
			cache: "no-cache",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: obj2qstr({
				"type": "upload-files",
				"action": "GET",
				"step": "level",
				"subject": meta2.value,
				"token": TOKEN
			})
		})
		.then(r => r.json())
		.then(r => {
			const opt = document.createElement("option");
			opt.value = "xxxx";
			opt.textContent = "選択して下さい。";
			meta3.appendChild(opt);
			r.forEach(e => {
				const opt = document.createElement("option");
				opt.value = e.level;
				opt.textContent = e.level;
				meta3.appendChild(opt);
			});
		});
	});
	meta3.addEventListener("change", () => {
		pageReset();
		ers(meta4);
		fetch("receiver", {
			method: "POST",
			mode: "cors",
			cache: "no-cache",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: obj2qstr({
				"type": "upload-files",
				"action": "GET",
				"step": "version",
				"subject": meta2.value,
				"level": meta3.value,
				"token": TOKEN
			})
		})
		.then(r => r.json())
		.then(r => {
			const opt = document.createElement("option");
			opt.value = "xxxx";
			opt.textContent = "選択して下さい。";
			meta4.appendChild(opt);
			r.forEach(e => {
				const opt = document.createElement("option");
				opt.value = e.version;
				opt.textContent = e.version;
				meta4.appendChild(opt);
			});
		});
	});
	meta4.addEventListener("change", () => {
		subject = meta2.value;
		level = meta3.value;
		version = meta4.value;
		fetch("receiver", {
			method: "POST",
			mode: "cors",
			cache: "no-cache",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: obj2qstr({
				"type": "upload-files",
				"action": "GET",
				"step": "page",
				"subject": meta2.value,
				"level": meta3.value,
				"version": meta4.value,
				"token": TOKEN
			})
		})
		.then(r => r.json())
		.then(r => {
			fs.disabled = false;
			const opt = document.createElement("option");
			opt.value = "all";
			opt.textContent = "一括アップロード";
			page.appendChild(opt);
			r.forEach(e => {
				const opt = document.createElement("option");
				opt.value = e.page;
				opt.textContent = e.page;
				page.appendChild(opt);
			});
		});
	});
	page.addEventListener("change", function() {
		if (this.value !== "all") {
			fetch("receiver", {
				method: "POST",
				mode: "cors",
				cache: "no-cache",
				credentials: "same-origin",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: obj2qstr({
					"type": "upload-files",
					"action": "GET",
					"step": "contents",
					"subject": meta2.value,
					"level": meta3.value,
					"version": meta4.value,
					"page": this.value,
					"token": TOKEN
				})
			})
			.then(r => r.json())
			.then(r => {
				pageC.value = r["contents"];
			});
		}
	});
	fs.addEventListener("change", function(e) {
		btn.disabled = (this.value === "");
		if (this.value) {
			pageC.value = "";
			for (let i = 0; i < this.files.length; i++) {
				const [f, reader] = [this.files[i], new FileReader()];
				if (f.name.match(/^\d+\.html?$/)) {
					reader.onload = () => {
						pageC.value += `+++++ ++++++++++ +++++\n`;
						pageC.value += `+++++ ${f.name} +++++\n`;
						pageC.value += `+++++ ++++++++++ +++++\n\n\n`;
						pageC.value += reader.result;
						pageC.value += `\n\n\n`;
						pageC.value += `+++++ ++++++++++ +++++\n`;
						pageC.value += `+++++ ++++++++++ +++++\n`;
						pageC.value += `\n\n\n\n\n`;
					};
					reader.readAsText(f);
				} else {
					window.alert(`「${f.name}」はファイル名が正しくありません。\nファイルは登録されません。`);
				}
			};
		}
	});
	btn.addEventListener("click", () => {
		if (window.confirm("登録しますか???")) {
			const formData = new FormData();
			const target = [];
			formData.append("type", "upload-files");
			formData.append("action", "POST");
			formData.append("subject", subject);
			formData.append("level", level);
			formData.append("version", version);
			formData.append("token", TOKEN);
			formData.append("method", (page.value === "all"));
			const files = new Array();
			const filesExcept = new Array();
			for (let i = 0; i < fs.files.length; i++) {
				const f = fs.files[i];
				if (f.name.match(/^\d+\.html?$/)) {
					formData.append(f.name, f);
					files.push(f.name);
					target.push(f.name.match(/^\d+/)[0]);
				} else {
					filesExcept.push(f.name);
				}
			};
			formData.append("target", JSON.stringify(target));
			fetch("receiver", { 
				method: "POST", 
				body: formData
			})
			.then(r => {
				window.alert("登録に成功しました。");
			})
			.catch(e => {
				window.alert("登録に失敗しました。\n通信環境を確認してもう一度アップロードして下さい。");
			});
		}
	});
})();