'use strict';

window.addEventListener("load", function() {
	show_hide();
	document.getElementsByTagName("img")[1].setAttribute("src", "../../../pics/no-menu.png")
})

// 準純粋関数
// show_hideクラスを持ったドキュメントに対してtoggle->hiddenを実施する環境を構成
function show_hide() {
	const show_hide = document.getElementsByClassName("show_hide");
	for (let i = 0; i < show_hide.length; i++) {
		show_hide[i].addEventListener("click", function() {
			this.nextElementSibling.classList.toggle("hidden");
		})
	}
}