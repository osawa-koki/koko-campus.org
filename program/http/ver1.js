"use strict";

const v1 = document.getElementById("v1");


function put_url() {
	const v = this.value;
	this.value = v.replace(/^https?:\/\//g, "");
}
document.getElementById("url").addEventListener("change", put_url);

Array.from(v1.getElementsByTagName("textarea")).forEach(e => {
	const w = e.parentNode.clientWidth;
	e.style.width= `${w - 50}px`;
});


function remove_tr() {
	this.parentNode.remove();
}

Array.from(v1.getElementsByClassName("register")).forEach(e => {
	e.addEventListener("click", function() {
		const tp = this.id,
		txt = this.previousElementSibling,
		tb = txt.parentNode.getElementsByTagName("tbody")[0];
		txt.value.split(/\n\r|\n|\r/g).forEach(ln => {
			if (ln.match(": ")) {
				const kv = ln.split(": ").map(m => m.replace(/ \t/g, "")),
				tr = document.createElement("tr"),
				th = document.createElement("th"),
				td = document.createElement("td"),
				td2 = document.createElement("td");
				if (kv[0] !== "") {
					th.textContent = kv[0];
					td.textContent = kv[1];
					td2.classList.add("delete-button");
					td2.textContent = "削除";
					td2.addEventListener("click", remove_tr);
					tr.appendChild(th);
					tr.appendChild(td);
					tr.appendChild(td2);
					tb.appendChild(tr);
					txt.value = "";
				}
			}
		});
	});
});
document.getElementById("send-button").addEventListener("click", function(e) {
	e.preventDefault();
	const hd = document.getElementById("hidden-field");
	let headers, body = {},
		i;
	const tb = v1.getElementsByTagName("tbody");
	for (i = 0; i < tb.length; i++) {
		Array.from(tb[i].getElementsByTagName("tr")).forEach(e => {
			const idf = ((i === 0) ? "h" : "b") + "-",
				k = e.getElementsByTagName("th")[0].textContent,
				v = e.getElementsByTagName("td")[0].textContent;
			hd.appendChild(get_input(k, v, idf));
		});
	}
	v1.getElementsByTagName("form")[0].submit();
});
function get_input(k, v, idf) {
	const elm = document.createElement("input");
	elm.name = idf + k;
	elm.value = v;
	elm.type = "hidden";
	return elm;
}