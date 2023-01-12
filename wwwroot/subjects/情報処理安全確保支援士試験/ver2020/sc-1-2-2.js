"use strict";






window.addEventListener("load", function() {
	const tb = document.getElementsByClassName("header")
	for (let i = 0; i < tb.length; i++) {
		let tr = tb[i].getElementsByTagName("tr");
		for (let i = 0; i < tr.length; i++) {
			let c = tr[i].children[2].textContent;
			if (!isNaN(c)) {
				c = `${c}(ビット)`;
				tr[i].children[2].textContent = c;
			}
		}
	}
})





window.addEventListener("load", function() {
	const s = document.getElementsByClassName("sp_address");
	s[1].classList.add("hidden");
	document.getElementById("sp_ad").addEventListener("change", function() {
		for (let i = 0; i < s.length; i++) {
			s[i].classList.add("hidden");
		}
		if (parseInt(this.value) === 0) {
			s[0].classList.remove("hidden");
		} else {
			s[1].classList.remove("hidden");
		}
	})
})




const fqdn_exp = [
	"スキーム名<br><small>通信の手段(プロトコル)を指定します。<br>例) http https ftp</small>",
	"スキームを特定するための識別子です。",
	"ホスト名(サブドメイン名)を表します。",
	"ドメイン名を示します。",
	"使用するポート番号を指定します。<br><small></small>",
	"ファイルまでのパス(道のり)を示します。",
	"ファイルの名前を示します。",
	"#以降の文字列はアンカーを意味して、ページ内のリンクを指定します。<br><small>ページ内のその位置(id)まで飛びます。</small>",
	"?以降はクエリストリング(URLパラメータ)を意味します。<br><small>HTTPのGETメソッドでデータのやり取りをする際に用いられます。</small>"
]

window.addEventListener("load", function() {
	const u = document.getElementById("fqdn_show").getElementsByTagName("span");
	const l = document.getElementById("ffqqddnn").getElementsByTagName("span");
	for (let i = 0; i < u.length; i++) {
		u[i].addEventListener("click", function() {
			for (let i = 0; i < u.length; i++) {
				u[i].style.color = "#000000";
			}
			document.getElementById("ffqqddnn").classList.remove("hidden");
			l[0].textContent = this.textContent;
			l[1].innerHTML = fqdn_exp[i];
			this.style.color = "#FF00FF";
		})
	}
})













