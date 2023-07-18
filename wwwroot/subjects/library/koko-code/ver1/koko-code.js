'use strict';

function info() {
	let info = new String;
	let s = "-------------------------";
	info += "プログラム名=>koko-code_ver1";
	info += "\n" + s + "\n";
	info += "プログラムシリーズ名=>koko-code";
	info += "\n" + s + "\n";
	info += "プログラムバージョン=>version1";
	info += "\n" + s + "\n";
	info += "作成日=>2021年10月26日"
	info += "\n" + s + "\n";
	info += "作成者=>koko";
	info += "\n" + s + "\n";
	info += "url=>https://koko-campus.com";
	info += "\n" + s + "\n";
	info += "中止";
	info += "\n" + s + "\n";
	info += "<修正点>\n\n脱jquery\ninline-block化\n";
	info += "\n" + s + "\n";
	info += "<問題点>\n\n"
	info += "\n" + s + "\n";
	info += "<次回に向けて>\n\ninnerHTML,outerHTMLの使用を避けてcreateElementで対応\n";
	info += "\n" + s + "\n";
	info += "copyright to me";
	info += "free use is ok under copyleft";
	info += "おつかれさま♪♪♪";
	console.log(info);
}

let this_path;
window.addEventListener("load", function() {
	Array.from(document.getElementsByTagName("script")).forEach(function(e) {
		if (e.src.match(/.+ver1\/(?=koko-code\.js)/)) {
			this_path = e.src.match(/.+ver1\/(?=koko-code\.js)/)[0];
		}
	});
	(function () {
		let e = document.createElement("link");
		e.setAttribute("rel", "stylesheet");
		e.setAttribute("href", this_path + "koko-code.css");
		document.getElementsByTagName("head")[0].appendChild(e);
	}());
	get_code_json();
});



function get_code_json() {
	let oReq = new XMLHttpRequest();
	oReq.addEventListener("load", function() {
		koko_code(JSON.parse(this.responseText));
	});
	oReq.open("GET", this_path + "koko-code.json");
	oReq.send();
}


// 非純粋関数=>各codeに「色付け・li_split」されたhtmlを挿入
// jsonオブジェクト
// 戻り値なし(準戻り値として各codeタグに処理されたinner_htmlを挿入)
function koko_code(json) {
	Array.from(document.getElementsByTagName("code")).forEach(function(e) {
		let html = escaping(e.innerHTML);
		let cls = e.className;
		let c = code_splitter(coloring_code(html, cls, json));
		let caption = get_caption(cls);
		e.parentNode.outerHTML = "<div class = 'code_div'><table class = 'code_table'>" + caption + "<tbody>" + c + "</tbody></table><div>";
	});
}



function escaping(content) {
	content = content
	.replace(/</g, "&lt;").replace(/>/g, "&gt;")
	.replace(/\$/g, "&dollar;");
	return content;
}


// 純粋関数
// 引数=>各precode内のhtml
// 戻り値=>指定要素のstyle:colorをspanタグで囲まれたhtml
function coloring_code(html, cls, json) {
	for (let k in json) {
		if (cls === k) {
			for (let j in json[k]) {
				json[k][j].forEach(function(o) {
					let r = new RegExp(o, "g")
					let item = (html.match(r));
					if (item !== null) {
						item = `<span klass="code-${j}">${o}</span>`
						html = html.replace(o, item);
					}
				});
			}
		}
	}
	html = html.replace(/klass/g, "class");
	return html;
}
function coloring_coe(html, cls, json) {
	if (cls === "html") {
		for (let key in json["html"]) {
			let target = new RegExp("&lt;" + key + "&gt;", "g");
			let changed = "&lt;<span style = 'color: " + checker_html[key] + "''>" + key + "</span>&gt;";
			html = html.replace(target, changed);
			target = new RegExp("&lt;/" + key + "&gt;", "g");
			changed = "&lt;/<span style = 'color: " + checker_html[key] + "''>" + key + "</span>&gt;";
			html = html.replace(target, changed);
		}
	}
	 return html;
}

// 純粋関数
// 引数=>各precode内のhtml
// 戻り値=>各行がliタグで囲まれたhtml
function code_splitter(html) {
	 let line = html.split("\n");
	 let html_splitted = new String();
	 let count = 0;
	 for (let i = 0; i < line.length; i++) {
		  if (line[i] == "") {
			   continue;
		  }
		  count += 1;
	 let list_added = "<tr><th>" + count + "</th><td>" + line[i] + "</td></tr>";
	 html_splitted += list_added;
	 }
	 return html_splitted;
}



function get_caption(cls) {
	switch(cls) {
		case "html":
		return "<caption>html</caption>";
		case "js":
		return "<caption>javascript</caption>";
		case "jq":
		return "<caption>jquery</caption>";
		case "php":
		return "<caption>php</caption>"
	}
}




