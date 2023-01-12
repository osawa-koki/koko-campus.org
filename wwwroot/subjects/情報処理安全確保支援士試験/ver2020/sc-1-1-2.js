"use strict";

window.addEventListener("load", function() {
	venn_left();
	venn_right();
	venn_center();
	thread();
})




function venn_left() {
	const venn = document.getElementsByClassName("venn_left");
	for (let i = 0; i < venn.length; i++) {
		venn[i].addEventListener('click', function() {
			reset_venn();
			document.getElementById("venn_left").style.opacity = "1";
			document.getElementById("text_left").style.fontSize = "35px";
			document.getElementById("text_left").style.fontWeight = "1000";
		})
	}
}

function venn_right() {
	const venn = document.getElementsByClassName("venn_right");
	for (let i = 0; i < venn.length; i++) {
		venn[i].addEventListener('click', function() {
			reset_venn();
			document.getElementById("venn_right").style.opacity = "1";
			document.getElementById("text_right").style.fontSize = "35px";
			document.getElementById("text_right").style.fontWeight = "1000";
		})
	}
}

function venn_center() {
	const venn = document.getElementsByClassName("venn_center");
	for (let i = 0; i < venn.length; i++) {
		venn[i].addEventListener('click', function() {
			reset_venn();
			document.getElementById("venn_center").style.fill = "#FF3300";
			document.getElementById("text_center").style.fontSize = "35px";
			document.getElementById("text_center").style.fontWeight = "1000";

			document.getElementById("risk").setAttribute("x", 246);
		})
	}
}

function reset_venn() {
	document.getElementById("venn_left").style.opacity = "0.5";
	document.getElementById("text_left").style.fontSize = "24px";
	document.getElementById("text_left").style.fontWeight = "100";

	document.getElementById("venn_right").style.opacity = "0.5";
	document.getElementById("text_right").style.fontSize = "24px";
	document.getElementById("text_right").style.fontWeight = "100";

	document.getElementById("venn_center").style.fill = "#FF6699";
	document.getElementById("text_center").style.fontSize = "24px";
	document.getElementById("text_center").style.fontWeight = "100";
	document.getElementById("risk").setAttribute("x", 260);
}






function thread() {

	const thread = document.getElementById("thread_list").getElementsByTagName("li");
	for (let i = 0; i < thread.length; i++) {
		thread[i].addEventListener('click', function() {

			let comment;
			let title = thread[i].textContent;

			switch (i) {
				case 0:
				comment = "いわゆるハプニングのことです。予期しない悪い結果をもたらします。";
				break;
				case 1:
				comment = "地震や台風等の自然災害のみならず、異常な盛り土による土砂などの人的災害も該当します。";
				break;
				case 2:
				comment = "機械が経年劣化等で正常に動作しなくなることです。";
				break;
				case 3:
				comment = "機械がその使用用途を達成できない状態にされることです。";
				break;
				case 4:
				comment = "そのままで、盗まれることです。";
				break;
				case 5:
				comment = "許された人のみが入れる領域に許されざる人が入ることです。";
				break;
				case 6:
				comment = "許された人のみがアクセス可能な情報資産に許されざる人がアクセスすることです。";
				break;
				case 7:
				comment = "盗聴っていうと「盗み聞き」って感じがしますけど、ITセキュリティにおける盗聴とはネットワーク上のデータを不正に盗み取ることを指します。";
				break;
				case 8:
				comment = "ある人が別の人であると詐称してシステムを利用することです。";
				break;
				case 9:
				comment = "データを不正に書き換えることです。";
				break;
				case 10:
				comment = "想定外の出来事が発生してプログラムが正常に動作しないことです。<br>コンピュータってすべての動作を明確に指示しとかないと動いてくれないんです、、、";
				break;
				case 11:
				comment = "ITを用いて不正な行為をすることです。ハッカーって聞くと悪い人を思い浮かべる人が多いと思いますが、正確にはハッカーとはコンピュータにすごく詳しい人のことを指し、クラッカーが悪い人のことを指します。<br>クラッカーがする悪い行為がクラッキングと言います。";
				break;
				case 12:
				comment = "BEC(Business Email Compromise)と略されます。<br>企業に対して不正な請求をしてお金を盗むことです。(オレオレ詐欺(死語?)の対企業バージョンです。)<br>2018年1月に日本航空(JAL)がこのBECに引っかかって3.8億円盗まれちゃいましたよね、、、";
				break;
				case 13:
				comment = "ユーザが与えられているアクセス権限を超える権限を取得することです。";
				break;
				case 14:
				comment = "字面通り、誤った操作をすることです。";
				break;
				case 15:
				comment = "そのまんま、無くすことです。";
				break;
				case 16:
				comment = "機械等が壊れることです。";
				break;
				case 17:
				comment = "ユーザの後ろ・隣に立って入力したデータを気づかれずに見ることです。<br>カメラを設置するケースもあります。";
				break;
				case 18:
				comment = "許されざる人がそのシステムを利用することです。<br>クレジットカードの不正利用などが有名ですね。";
				break;
				case 19:
				comment = "カタカナ語でかっこいいですけど、会社のゴミとかをあさって情報を盗むことです。";
				break;
				case 20:
				comment = "秘密の情報が外部に流れ出ることです。";
				break;
				case 21:
				comment = "意図的にやることです。";
				break;
				case 22:
				comment = "不注意で起こす失敗のことです。";
				break;
				case 23:
				comment = "データの誤りのことです。";
				break;
				case 24:
				comment = "企業内部の従業員等が不正を行うことです。";
				break;
				case 25:
				comment = "システムの想定される動作の実行を妨げることです。";
				break;
				case 26:
				comment = "SNSを通じて誹謗中傷等を行うことです。";
				break;
			}
			document.getElementById("thread_detail").getElementsByTagName("span")[0].innerHTML = title;
			document.getElementById("thread_detail").getElementsByTagName("span")[1].innerHTML = comment;
		})
	}
}

window.addEventListener("load", function() {
	const where = $("#thread_detail").offset().top;
	const window_height = window.innerHeight / 3;

	$("#thread_list li").on("click", function() {
		$("html, body").animate({scrollTop: where - window_height}, 1000, "swing");
	})
})








window.addEventListener("load", function() {

	const misleading_security = document.getElementById("misleading_security");
	let i = 0;

	misleading_security.addEventListener("click", function() {

		if (i % 2 == 0) {
			document.getElementById("misleading_security_show").innerHTML = "<small>(引用元は<a href = 'https://www.ipa.go.jp/security/txt/2013/04outline.html'>こちら</a>。)</small>";
		} else

		if (i % 2 == 1) {
			document.getElementById("misleading_security_show").innerHTML = "";
		}
		i++;
	})
})



window.addEventListener("load", function() {

	const race_condition = document.getElementById("race_condition");
	let i = 0;

	race_condition.addEventListener("click", function() {

		if (i % 2 == 0) {
			document.getElementById("race_condition_show").innerHTML = "<small>(引用元は<a href = 'https://www.ipa.go.jp/security/awareness/vendor/programmingv2/contents/c803.html'>こちら</a>。)</small>";
		} else

		if (i % 2 == 1) {
			document.getElementById("race_condition_show").innerHTML = "";
		}
		i++;
	})
})












