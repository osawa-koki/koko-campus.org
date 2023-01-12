/*
【2022/06/10】
・ datasetによる管理から毎回ajaxを行う処理へ変更



*/
(() => {
	let S, L, V, P;
	(() => {
		const [btn, code, name, category] = getElm(["manageSubject-button", "manageSubjects-code", "manageSubjects-name", "manageSubjects-category"]);
		const tbd = document.getElementById("manageSubjects-tbody");
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
			category.appendChild(opt);
			r.forEach(e => {
				const opt = document.createElement("option");
				opt.value = e.category;
				opt.textContent = e.category_name;
				category.appendChild(opt);
			});
		});
		btn.addEventListener("click", () => {
			fetch("receiver", {
				method: "POST",
				mode: "cors",
				cache: "no-cache",
				credentials: "same-origin",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: obj2qstr({
					"type": "manage-subjects",
					"action": "GET",
					"subject": code.value,
					"subject_name": name.value,
					"category": category.value,
					"token": TOKEN
				})
			})
			.then(r => r.json())
			.then(r => {
				ers(tbd);
				r.forEach(e => {
					const [tr, code, span, name, desc] = mkElm(["tr", "th", "span", "td", "td"]);
					[span.textContent, name.textContent, desc.textContent] = [
						e["subject"], e["subject_name"], e["description"]
					];
					span.addEventListener("click", getDetail);
					code.appendChild(span);
					tr.appendChild(code);
					tr.appendChild(name);
					tr.appendChild(desc);
					tbd.appendChild(tr);
				});
			});
		});
	})();
	const detail = document.getElementById("manageSubjects-detail");
	const getDetail = function() {
		S = this.textContent;
		fetch("receiver", {
			method: "POST",
			mode: "cors",
			cache: "no-cache",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: obj2qstr({
				"type": "manage-subjects",
				"action": "SELECT",
				"subject": S,
				"token": TOKEN
			})
		})
		.then(r => r.json())
		.then(r => putDetail(r));
	};
	const putDetail = obj => {
		ers(detail);
		const subjectLine = (() => { // 「subjectLine」
			const target = obj.subjectLine;
			const [box, table, tbody, tr1, tr2, tr3] = [
				...mkElm(["div", "table", "tbody"]),
				(() => {
					const [tr, th, td, ip] = mkElm(["tr", "th", "td", "input"]);
					th.textContent = "名前";
					ip.value = target.subject_name;
					td.appendChild(ip);
					tr.appendChild(th);
					tr.appendChild(td);
					return tr;
				})(),
				(() => {
					const [tr, th, td, ip] = mkElm(["tr", "th", "td", "textarea"]);
					th.textContent = "説明";
					ip.value = target.description;
					td.appendChild(ip);
					tr.appendChild(th);
					tr.appendChild(td);
					return tr;
				})(),
				(() => {
					const [tr, th, td, ip] = mkElm(["tr", "th", "td", "input"]);
					th.textContent = "状態";
					ip.type = "checkbox";
					ip.checked = (target.status === 1);
					td.appendChild(ip);
					tr.appendChild(th);
					tr.appendChild(td);
					return tr;
				})()
			];
			tbody.appendChild(tr1);
			tbody.appendChild(tr2);
			tbody.appendChild(tr3);
			table.appendChild(tbody);
			box.appendChild(table);
			box.classList.add("subjectLine");
			return box;
		})();
		let subjectTreeEX;
		const subjectTree = (() => {
			subjectTreeEX = obj.subjectTree;
			const container = document.createElement("div");
			const [box1, t1, s1] = mkElm(["box", "div", "select"]);

			// レベルの選択
			t1.textContent = "レベル";
			const opt = document.createElement("option");
			opt.value = "";
			opt.textContent = "";
			s1.appendChild(opt);
			Object.keys(subjectTreeEX).forEach(e => {
				const opt = document.createElement("option");
				opt.value = e;
				opt.textContent = e;
				s1.appendChild(opt);
			});
			s1.dataset.json = JSON.stringify(subjectTreeEX);
			s1.addEventListener("change", createVersion);
			box1.appendChild(t1);
			box1.appendChild(s1);
			box1.classList.add("subjectsTreeStep");

			const createVersion = function() {
				// バージョンの選択
				ersForward(this.parentNode);
				const [box2, t2, s2] = mkElm(["div", "div", "select"]);
				t2.textContent = "バージョン";
				const opt = document.createElement("option");
				opt.value = "";
				opt.textContent = "";
				s2.appendChild(opt);
				Object.keys(JSON.parse(this.dataset.json)[this.value] || []).forEach(f => {
					const opt = document.createElement("option");
					opt.value = f;
					opt.textContent = f;
					s2.appendChild(opt);
				});
				s2.dataset.json = JSON.stringify(JSON.parse(this.dataset.json)[this.value]);
				s2.addEventListener("change", createPage);
				box2.appendChild(t2);
				box2.appendChild(s2);
				box2.classList.add("subjectsTreeStep");
				container.appendChild(box2);
			};

			const createPage = function() {
				// ページの選択
				ersForward(this.parentNode);
				const [box3, t3, s3] = mkElm(["div", "div", "select"]);
				t3.textContent = "ページ";
				const opt = document.createElement("option");
				opt.value = "";
				opt.textContent = "";
				s3.appendChild(opt);
				(JSON.parse(this.dataset.json)[this.value] || []).forEach(g => {
					const opt = document.createElement("option");
					opt.value = g;
					opt.textContent = g;
					s3.appendChild(opt);
				});
				box3.appendChild(t3);
				box3.appendChild(s3);
				box3.classList.add("subjectsTreeStep");
				container.appendChild(box3);
			};

			container.appendChild(box1);
			return container;
		})();

		detail.appendChild(subjectLine);
		detail.appendChild(subjectTree);
	};

})();