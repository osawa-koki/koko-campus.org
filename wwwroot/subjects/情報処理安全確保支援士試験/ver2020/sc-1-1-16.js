"use strict";





const word = [
	"情報セキュリティに対する組織としての姿勢(統一的・基本的な考え方)や方針を示すものを言います。<br>従業員だけではなく、外部の関係者にも通知します。",
	"情報セキュリティポリシを実現するための具体的な遵守事項や基準のことを言います。",
	"情報セキュリティ基準を実際に実行するための詳細な手続きや手順を記載します。"
]
window.addEventListener("load", function() {
	let e = document.getElementById("policy").getElementsByTagName("li");
	for (let i = 0; i < e.length; i++) {
		e[i].addEventListener("click", function() {
			for (let i = 0; i < e.length; i++) {
				e[i].removeAttribute("style");
			}
			this.style.color = "red";
			document.getElementById("policy_p").innerHTML = word[i];
		})
	}
})













