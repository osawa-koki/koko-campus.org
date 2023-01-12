'use strict';



window.addEventListener("load", function() {
	venn_left();
	venn_right();
	venn_center();
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





window.addEventListener("load", function() {

	const question = document.getElementById("question_cyberattack");
	question.addEventListener("click", function() {
		question.nextElementSibling.classList.remove("hidden");
		question.style.backgroundColor = "#C0C0C0"
	})
})




