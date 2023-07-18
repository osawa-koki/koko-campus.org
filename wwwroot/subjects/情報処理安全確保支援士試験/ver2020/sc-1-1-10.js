"use strict";





function check_rlo() {
	document.getElementById("rlo_button_div").parentNode.remove();
	const select = document.getElementsByClassName("rlo_select");
	for (let i = 0; i < select.length; i++) {
		select[i].setAttribute("disabled", true);
	}
	const answer = document.getElementsByClassName("rlo_answer");
	for (let i = 0; i < answer.length; i++) {
		answer[i].style.fill = "#000000";
	}
	scroll_to(document.getElementById("rlo"));
}







