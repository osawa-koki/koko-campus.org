"use strict";

let
	number,
	lastchecked,
	first_submit = true
;

const
	checkbox = Array.from(document.getElementsByClassName("questionaire-checkbox")),
	button = document.getElementById("submit-questionaire")
;

const clicked = function() {
	button.classList.add("ok");
	const
		e = this.getElementsByClassName("questionaire-checkbox")[0],
		idx = checkbox.indexOf(e) // 何番目の選択肢がクリックされたかを取得
	;
	if (lastchecked) {
		lastchecked.classList.remove("checked");
	}
	e.classList.add("checked");
	lastchecked = e;
	number = idx;
	if (first_submit) {
		first_submit = false;
		button.addEventListener("click", submit); // 何らかの選択肢が選択されたらボタンを有効化
	}
};

checkbox.forEach(e => {
		e.parentNode.parentNode.addEventListener("click", clicked);
});

const submit = function() {
	checkbox.forEach(e => {
		e.parentNode.parentNode.removeEventListener("click", clicked); // 選択肢の変更を不可に
	});
	checkbox[number].style.borderColor = "#EEEEEE #CCCCCC #AAAAAA #888888"; // 選択された選択肢をいい感じに演出(CSSアニメーション)
	this.classList.remove("ok"); // ボタンを無効化
	this.removeEventListener("click", submit); // ボタンのイベントリスナーを削除
	const
		questionaire_id = document.cookie.match(/[A-Z]{2}\d{4}/g)[0],
		data = {
			"put-questionaire" : "ILoveYou",
			"questionaire-id" : questionaire_id,
			"selected-option" : number
		},
		url = "questionaire/questionaire-api",
		method = "POST",
		headers = {
			'Accept': 'application/json',
			'Content-Type': 'application/json'
		},
		body = JSON.stringify(data)
	;
	fetch(url, {method, headers, body})
	.then(response => response.json())
	.then(response => show_bar_chart(response))
};

const show_bar_chart = results => {
	const
		total = results.reduce((previous, current) => parseInt(previous) + parseInt(current)),
		bar_chart = Array.from(document.getElementById("questionaire").getElementsByClassName("bar-chart"))
	;
	for (let i = 0; i < results.length; i++) {
		const
			propotion = parseInt(results[i]) / parseInt(total),
			obj = move_propotion(bar_chart[i], propotion)
		;
		obj.move(results[i]);
	}
};

const move_propotion = (element, propotion) => {
	propotion *= 100;
	const obj = {
		element : element,
		propotion : propotion,
		move : function(n) {
			let count = 0;
			const interval_id = setInterval(() => {
				this.element.style.width = `${count}%`;
				if (propotion < count) {
					clearInterval(interval_id);
					this.element.parentNode.getElementsByClassName("voted-show")[0].textContent = `(${Math.round(propotion)}%/${n}票)`;
				}
				count++;
			}, 100);
		}
	};
	return obj;
};