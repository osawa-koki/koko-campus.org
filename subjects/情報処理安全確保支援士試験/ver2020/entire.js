'use strict';

window.addEventListener("load", function() {
	document.getElementsByTagName("h1")[0].textContent = document.getElementsByTagName("title")[0].textContent;
})

window.addEventListener("load", function() {

	wrap_h2();
	give_span_to_h1();
	give_span_to_h2();
	put_h3();
	give_span_to_h3();
	give_highlight();
	svg();

})

// 準純粋関数
// show_hideクラスを持ったドキュメントに対してtoggle->hiddenを実施する環境を構成
window.addEventListener("load", function() {

	const show_hide = document.getElementsByClassName("show_hide");

	for (let i = 0; i < show_hide.length; i++) {
		show_hide[i].addEventListener("click", function() {
			this.nextElementSibling.classList.toggle("hidden");
		})
	}
})

// 非純粋関数
// h2間section-divで囲む
function wrap_h2() {
	let body = document.getElementsByTagName("body");
	let doc = body[0].outerHTML;
	let count = (doc.match(/<h2>.*?<\/h2>/g) || []).length;
	for (let i = 0; i < count; i++) {
		if (i === 0) {
			let matched = doc.match(/<h2>.*?<\/h2>/);
			// 2回目以降に整理されたh2タグが再度マッチしないようにdummyクラスを付しておく
			matched = matched[0].replace(/<h2>/, "<h2 class = 'dummy'>");
			let insert = "<div class = 'section'>" + matched;
			doc = doc.replace(/<h2>.*?<\/h2>/, insert);
		} else
		if (0 < i && i < count - 1) {
			let matched = doc.match(/<h2>.*?<\/h2>/);
			// 2回目以降に整理されたh2タグが再度マッチしないようにdummyクラスを付しておく
			matched = matched[0].replace(/<h2>/, "<h2 class = 'dummy'>");
			let insert = "</div><div class = 'section'>" + matched;
			doc = doc.replace(/<h2>.*?<\/h2>/, insert);
		}else
		if (i === count - 1) {
			let matched = doc.match(/<h2>.*?<\/h2>/);
			// 2回目以降に整理されたh2タグが再度マッチしないようにdummyクラスを付しておく
			// 最終回のh2タグはあくまで調整用で実質的な意味は持たないから、固有のidを付して後で削除してもいいかも♪
			matched = matched[0].replace(/<h2>/, "<h2 class = 'for_delete'>");
			let insert = "</div>" + matched;
			doc = doc.replace(/<h2>.*?<\/h2>/, insert);
		}
	}
	body[0].outerHTML = doc;
}

// 準純粋関数
// h1のinnerHTMLに対してh1_spanクラスを付す
function give_span_to_h1() {
	let h1 = document.getElementsByTagName("h1");

	for (let i = 0; i < h1.length; i++) {
		let content = h1[i].innerHTML;
		content = "<span class = 'h1_span'>" + content + "</span>";
		h1[i].innerHTML = content;
	}
}

// 準純粋関数
// h2のinnerHTMLに対してh2_spanクラスを付す
function give_span_to_h2() {
	let h2 = document.getElementsByTagName("h2");

	for (let i = 0; i < h2.length; i++) {
		let content = h2[i].innerHTML;
		content = "<span class = 'h2_span'>" + content + "</span>";
		h2[i].innerHTML = content;
	}
}

// 準純粋関数
// h3の仮想divの最後にseparatorを付与
function put_h3() {
	const s = document.getElementsByClassName("section");
	for (let i = 0; i < s.length; i++) {
		let h = s[i].getElementsByTagName("h3");
		for (let j = 1; j < h.length; j++) {
			h[j].outerHTML = `<div class = "separator"></div>${h[j].outerHTML}`;
		}
	}
}

// 準純粋関数
// h3のinnerHTMLに対してh3_spanクラスを付す
function give_span_to_h3() {
	let h3 = document.getElementsByTagName("h3");

	for (let i = 0; i < h3.length; i++) {
		let content = h3[i].innerHTML;
		content = "<span class = 'h3_span'>" + content + "</span>";
		h3[i].innerHTML = content;
	}
}

// underlineクラスに3つごとに別のクラスを付与してカラフルにする
function give_highlight() {
	let highlight = document.getElementsByClassName("underline");

	for (let i = 0; i < highlight.length; i++) {
		let remainder = i % 3;

		switch (remainder) {
			case 0:
			highlight[i].classList.add("underline0");
			break;
			case 1:
			highlight[i].classList.add("underline1");
			break;
			case 2:
			highlight[i].classList.add("underline2");
			break;
		}
	}
}

// 本文のaタグにブランク属性を付ける
// 最後のボタンコンテイナー部分には付けない(確認テストは付ける)
window.addEventListener("load", function() {
	const main = document.getElementById("main");
	const a_tag = main.getElementsByTagName("a");

	for (let i = 0; i < a_tag.length; i++) {
		a_tag[i].setAttribute("target", "_blank");
	}
})

// テーブル作成用の引用のmargin-left属性値をtableのmargin-left属性値に合わせる。
window.addEventListener("load", function() {
	let quote = document.getElementsByClassName("quote");
	for (let i = 0; i < quote.length; i++) {
		let p = quote[i].previousElementSibling;
		let margin_left = window.getComputedStyle(p)["marginLeft"];
		quote[i].style.marginLeft = margin_left;
		p.style.marginBottom = 0;
	}
})

function svg() {
	const svg = document.getElementsByTagName("svg");
	for (let i = 0; i < svg.length; i++) {
		let width = svg[i].parentNode.clientWidth;
		svg[i].setAttribute("width", width * 0.9);
		svg[i].setAttribute("height", width * 0.6);
	}
}

window.addEventListener("load", function() {
	let sup = document.getElementsByClassName("sup");
	for (let i = 0; i < sup.length; i++) {
		let small = sup[i].nextElementSibling;
		small.classList.add("hidden");
		sup[i].addEventListener("click" ,function() {
			small.classList.toggle("hidden");
		})
	}
})

window.addEventListener("load", function() {
	const step = document.getElementsByClassName("step");
	const width = document.getElementById("main").clientWidth;
	for (let i = 0; i < step.length; i++) {
		step[i].style.width = width * 0.9;
		step[i].insertAdjacentHTML('afterbegin','<div class = "step_text">対策</div><br>');
	}
})

window.addEventListener("load", function() {
	const doc = document.getElementsByClassName("explanation");
	const width = document.getElementById("main").clientWidth;
	for (let i = 0; i < doc.length; i++) {
		doc[i].style.width = width * 0.9;
	}
})

window.addEventListener("load", function() {
	const doc = document.getElementsByClassName("how");
	const width = document.getElementById("main").clientWidth;
	for (let i = 0; i < doc.length; i++) {
		doc[i].style.width = width * 0.9;
	}
})

function scroll_to(doc, speed = 50, propotion = 4) {
	let scrolled = window.scrollY;
	let height = window.innerHeight / propotion;
	let between = doc.getBoundingClientRect().top + window.pageYOffset - scrolled - height;
	let count = 0;
	var interval_id = setInterval(() => {
		count += 1;
		scrollTo(0, between * count / speed + scrolled);
		if (count > speed) {
			clearInterval(interval_id);
		}
	}, 5)
}

window.addEventListener("load", function() {
	const quiz = document.getElementsByClassName("quiz");
	for (let i = 0; i < quiz.length; i++) {
		quiz[i].textContent = "答え";
		const answer_div = quiz[i].nextElementSibling;
		answer_div.classList.add("hidden", "quiz_div");
		answer_div.children[0].classList.add("quiz_answer0");
		answer_div.children[1].classList.add("quiz_answer1");
		quiz[i].addEventListener("click", function() {
			this.nextElementSibling.classList.remove("hidden");
			this.style.backgroundColor = "#999999";
		})
	}
})

window.addEventListener("load", function() {
	if (window.innerWidth <= 700) {
	} else if (window.innerWidth <= 1000) {
		const w = document.querySelectorAll("br.w");
		for (let i = 0; i < w.length; i++) {
			w[i].remove();
		}
	} else {
		const w = document.querySelectorAll("br.w");
		for (let i = 0; i < w.length; i++) {
			w[i].remove();
		}
		const wz = document.querySelectorAll("br.wz");
		for (let i = 0; i < wz.length; i++) {
			wz[i].remove();
		}
	}
})

window.addEventListener("load", function() {
	let l = document.getElementsByClassName("lili");
	for (let i = 0; i < l.length; i++) {
		let h = l[i].outerHTML;
		h = `<div class = "li_container">${h}</div>`;
		l[i].outerHTML = h;
	}
})