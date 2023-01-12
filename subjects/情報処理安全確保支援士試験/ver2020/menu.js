"use strict";

window.addEventListener("load", function() {
	const width = window.innerWidth; // windowサイズを求める
	const menu = document.getElementById("menu"); // メニューdivドキュメントオブジェクトを取得
	if (width <= 700) {
		menu.style.left = "10px";
		menu.style.right = "10px";
	} else if (width < 1000) {
		const d = (width - 700) / 2;
		menu.style.left = `${d}px`;
		menu.style.right = `${d}px`;
	} else {
		menu.style.left = "50px";
		menu.style.right = "50px";
	}
	let html = menu.innerHTML; // メニューをデフォルトに設定するための処理
	html = html.replace(/<div>/g, "<div class = 'hidden'>");
	menu.innerHTML = html;
	document.getElementById("menu_img").addEventListener("click", function() { // メニューボタンのクリックでdisplay:showをtoggle
		menu.classList.toggle("hidden");
	})
	const m = document.getElementsByClassName("m");
	for (let i = 0; i < m.length; i++) {
		m[i].addEventListener("click", function() { // メニューの分類をクリックするとそれ以下の分類をtoggle
			this.nextElementSibling.classList.toggle("hidden");
		})
	}
	let now = window.location.href.replace(/\?.*/, ""); // thisファイルを取得
	now = now.split(/[\/|\\]/g); // thisファイルのファイル名を取得する準備(パスを配列型に変換)
	now = now[now.length - 1]; // 配列の最終要素(thisファイル名)を取得
	now = now.replace(/\.php/, ""); // php拡張子があればそれを削除
	const a = document.getElementById("menu").getElementsByTagName("a"); // menu div内のaタグを取得
	for (let i = 0; i < a.length; i++) {
		a[i].textContent = "・・・" + a[i].textContent;
		let sc0 = where_am_i(a[i].parentElement.parentElement.parentElement.parentElement, "dummy"); // テクノロジ系かマネジメント系かの判定=>それぞれ「1」か「2」を返す
		let sc1 = where_am_i(a[i].parentElement, "div"); // 小分類のインデックス番号(start1)を取得=>セキュリティ・ネットワーク・データベース・システム開発技術・etc..順に「1」「2」「3」「4」を返す
		let sc2 = where_am_i(a[i], "a"); // thisファイルが小分類に中の何番目かについてのインデックス番号(start1)を取得
		let adjust = 0; // 中分類をファイル名にいれていないため調整が必要
		let sc3 = where_am_i(a[i].parentElement.parentElement, "dm"); // munu.htmlで中分類divに対してdmクラスを付しているため
		if (parseInt(sc3) === 2) {
			adjust += 3;
		}
		let href = `sc-${sc0}-${sc1 + adjust}-${sc2}`; // scの後の{x}-{y}-{z}=>x[大分類]-y-[小分類]-z-[thisファイル]
		a[i].setAttribute("href", href);
		if (href === now) { // thisファイルが該当するaタグにマッチした際の処理
			a[i].style.color = "#FFFF00";
			a[i].style.fontWeight = "bold";
			if (i !== 0 && i !== a.length - 1) {
				var href_back = i - 1;
				var href_next = i + 1;
			} else if (i === 0) {
				var href_back = "start";
				var href_next = i + 1;
			} else if (i === a.length - 1) {
				var href_back = i - 1;
				var href_next = "final";
			}
		}
	}
	if (typeof href_back === "undefined" && typeof href_next === "undefined") { // finalファイルでの処理
		document.getElementById("button_back").setAttribute("href", a[a.length - 1].getAttribute("href"));
		document.getElementById("button_next").setAttribute("href", "top");
	} else if (href_back === "start") { //sc-1-1-1の場合は戻るボタンのhref属性値にtopを設定
		document.getElementById("button_back").setAttribute("href", "top");
		document.getElementById("button_next").setAttribute("href", a[href_next].getAttribute("href"));
	} else if (href_next === "final") { //最後のファイルならば次へボタンの属性値はfinに設定
		document.getElementById("button_back").setAttribute("href", a[href_back].getAttribute("href"));
		document.getElementById("button_next").setAttribute("href", "final"); // 午後は一旦保留
	} else { // その他は通常の処理
		document.getElementById("button_back").setAttribute("href", a[href_back].getAttribute("href"));
		document.getElementById("button_next").setAttribute("href", a[href_next].getAttribute("href"));
	}
})

// 純粋関数
// 第一引数=>親要素の何番目の要素か求めたい子要素
// 第二引数=>親要素が含むどの子要素をカウントの対象とするか(aタグ・divタグ・その他のクラス属性値)
// 戻り値=>親要素に対して何番目か(1から始まる)
function where_am_i(me, da) {
	let p;
	if (da === "div" || da === "a") {
		p = me.parentElement.getElementsByTagName(da);
	} else {
		p = me.parentElement.getElementsByClassName(da);
	}
	p = Array.from(p);
	let index = p.indexOf(me);
	return index + 1;
}