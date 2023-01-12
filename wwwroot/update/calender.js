"use strict";

let
	date_object = new Date(),
	y = date_object.getFullYear(),
	m = date_object.getMonth(),
	arys,
	ym_data,
	last_selected
;

const
	back = document.getElementById("go-back-calender"),
	next = document.getElementById("go-next-calender"),
	caption = document.getElementById("calender-caption"),
	tbd = document.getElementById("days-container"),
	detail_box = document.getElementById("update-detail-box")
;

const put_eventlistener = () => {
	const
		url = "update/information",
		json_data = {
			"get": "for-calender",
			"year": y,
			"month": (m + 1).toString().padStart(2, "0")
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
		ym_data = response;
		const active_cells = Array.from(document.getElementsByClassName("active-calender-cell")); // 引数でhtmlコレクションを渡した方がいいかも、、、
		for (const [k, v] of Object.entries(response)) {
			const n = parseInt(k) - 1;
			active_cells[n].classList.add("something-done");
			active_cells[n].addEventListener("click", function() {
				while(detail_box.firstChild) {
					detail_box.removeChild(detail_box.firstChild);
				}
				const idx = active_cells.indexOf(this);
				ym_data[(idx + 1).toString().padStart(2, "0")].forEach(e => {
					const p = document.createElement("p");
					p.textContent = e["contents"];
					if (e["url"]) {
						const a = document.createElement("a");
						a.href = e["url"];
						a.appendChild(p);
						detail_box.appendChild(a);
					} else {
						detail_box.appendChild(p);
					}
				});
				if (last_selected) {
					last_selected.classList.remove("selected");
				}
				this.classList.add("selected");
				last_selected = this;
			});
		}
	})
};

const create_calender = (y, m) => {
	while(tbd.firstChild) {
		tbd.removeChild(tbd.firstChild);
	}
	while(detail_box.firstChild) {
		detail_box.removeChild(detail_box.firstChild);
	}
	const
		ym = new Date(y, m),
		fd = ym.getDay() === 0 ? 6 : ym.getDay() - 1, // 初日の曜日
		dys = new Date(y, m + 1, 0).getDate(), // その月の日付の数
		rest = 7 - fd + 1, // 最初の週の余りの日付
		lines = Math.ceil((dys - rest + 1) / 7) + 1 // その月の週の数
	;
	arys = new Array(lines * 7);
	for (let [i, count] = [fd, 1]; count <= dys; i++, count++) {
		arys[i] = count;
	}
	for (let i = 0; i < lines; i++) {
		const tr = document.createElement("tr");
		for (let j = 0; j < 7; j++) {
			const
				td = document.createElement("td"),
				dt = arys.shift();
			;
			if (dt) {
				const
					td1 = document.createElement("div"),
					td2 = document.createElement("div"),
					today = new Date()
				;
				td1.classList.add("calender-cell-date");
				td1.textContent = `${dt}日`;
				td2.classList.add("calender-cell-content");
				td.appendChild(td1);
				td.appendChild(td2);
				td.classList.add("active-calender-cell");
				td.addEventListener("click", calender_clicked);
				if (today.getFullYear() === y && today.getMonth() === m && today.getDate() === dt) {
					td.classList.add("today");
				}
			} else {
				td.classList.add("blank-calender-cell");
			}
			tr.appendChild(td);
		}
		tbd.appendChild(tr);
	}
	caption.textContent = `${y}年 ${m + 1}月`;
	put_eventlistener();
}

back.addEventListener("click", () => {
	if (m === 0) {
		m = 11;
		y--;
	} else {
		m--;
	}
	create_calender(y, m);
});
next.addEventListener("click", () => {
	if (m === 11) {
		m = 0;
		y++;
	} else {
		m++;
	}
	create_calender(y, m);
});

const calender_clicked = function() {
	const idx = arys.indexOf(this);
}

create_calender(y, m);
