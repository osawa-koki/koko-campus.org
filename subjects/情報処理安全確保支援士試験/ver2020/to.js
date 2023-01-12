"use strict";

// 外部ページからの#リンクがスマホだと適切に機能しないから応急処置としてのjsプログラム
// 単純に外部ページから遷移した場合に#リンクまで強制的にスクロールさせる処理を行う

window.addEventListener("load", function() {
	setTimeout(function() {
		let link = location.href;
		link = link.match(/\?.*to=.+/);
		if (link !== null) {
			link = link[0].match(/to=.+/)[0].replace("to=", "");
			scroll_to(document.getElementById(link));
		}
	}, 100);
})