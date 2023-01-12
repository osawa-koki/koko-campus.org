"use strict";






window.addEventListener("load", function() {
	const arw_go = document.getElementsByClassName("arw_go");
	const arw_back = document.getElementsByClassName("arw_back");
	document.getElementById("smurf_txt1").style.fill = "none";
	document.getElementById("tori").style.fill = "none";
	const smurf_return = document.getElementsByClassName("smurf_return");
	for (let i = 0; i < arw_go.length; i++) {
		arw_go[i].style.fill = "none";
		arw_back[i].style.fill = "none";
	}
	for (let i = 0; i < smurf_return.length; i++) {
		smurf_return[i].style.fill = "none";
	}
	document.getElementById("poizoned").style.fill = "none";
	document.getElementById("smurf_button").addEventListener("click", function() {
		document.getElementById("smurf_txt1").style.fill = "#000000";
		document.getElementById("tori").style.fill = "#000077";
		this.classList.add("hidden");
		for (let i = 0; i < arw_go.length; i++) {
			arw_go[i].style.fill = "#800080";
		}
		setTimeout(function() {
			for (let i = 0; i < smurf_return.length; i++) {
				smurf_return[i].style.fill = "#000000";
			}
			setTimeout(function() {
				for (let i = 0; i < arw_back.length; i++) {
					smurf_return[i].textContent = "tori! これを受け取って!!";
				}
				setTimeout(function() {
					for (let i = 0; i < arw_back.length; i++) {
						arw_back[i].style.fill = "#ff0000";
					}
					for (let i = 0; i < arw_back.length; i++) {
						smurf_return[i].textContent = "tori! これを受け取って!!";
					}
					for (let i = 0; i < arw_go.length; i++) {
						arw_go[i].style.fill = "none";
					}
					document.getElementById("smurf_txt1").style.fill = "none";
					document.getElementById("tori").style.fill = "none";
					setTimeout(function() {
						for (let i = 0; i < smurf_return.length; i++) {
							smurf_return[i].style.fill = "none";
						}
						setTimeout(function() {
							document.getElementById("poizoned").style.fill = "#b200b2";
						}, 300)
					}, 1000)
				}, 1000)
			}, 1500)
		}, 1500)
	})
})














let ping_go = 0;
window.addEventListener("load", function() {
	const arrow = document.getElementsByClassName("arw");
	const words = document.getElementsByClassName("session_txt");
	for (let i = 0; i < arrow.length; i++) {
		arrow[i].style.fill = "none";
	}
	for (let i = 0; i < words.length; i++) {
		words[i].style.fill = "none";
	}
	document.getElementById("ping_attack_button").addEventListener("click", function() {
		if (ping_go === 0) {
			ping_go = 0;
			this.classList.add("hidden");
			ping0();
		}
	})
})
function ping0() {
	let count = 0;
	let limit = document.getElementsByClassName("arw").length;
	var interval_id = setInterval(() => {
		if (count >= limit - 1) {
			clearInterval(interval_id);
			setTimeout(ping1, 500);
		}
		document.getElementsByClassName("arw")[count].style.fill = "#000000";
		document.getElementsByClassName("session_txt")[count].style.fill = "#000000";
		count += 1;
	}, 100)
}
function ping1(deg = 45) {
	const q = document.getElementsByClassName("q");
	let direction = 0;
	let count = 0;
	for(let i = 0; i < q.length; i++) {
		q[i].style.fill = "#000000";
	}
	let x = deg * -1;
	var interval_id = setInterval(() => {
		count += 1;
		if (direction === 0) {
			x += 1;
		}
		if (direction === 1) {
			x -= 1;
		}
		q[0].setAttribute("transform", `rotate(${x} 95 7)`);
		q[1].setAttribute("transform", `rotate(${x * -1} 145 7)`);
		if (count >= 545) {
			clearInterval(interval_id);
		}
		if (x === deg) {
			direction = 1;
		}
		if (x === (deg * -1)) {
			direction = 0;
		}
	}, 10)
}







window.addEventListener("load", function() {
	const arw_go = document.getElementsByClassName("reflection_arw_go");
	const arw_back = document.getElementsByClassName("reflection_arw_back");
	document.getElementById("reflection_txt1").style.fill = "none";
	document.getElementById("reflection_tori").style.fill = "none";
	const smurf_return = document.getElementsByClassName("reflection_return");
	for (let i = 0; i < arw_go.length; i++) {
		arw_go[i].style.fill = "none";
		arw_back[i].style.fill = "none";
	}
	for (let i = 0; i < smurf_return.length; i++) {
		smurf_return[i].style.fill = "none";
	}
	document.getElementById("reflection_poizoned").style.fill = "none";
	document.getElementById("reflection_button").addEventListener("click", function() {
		document.getElementById("reflection_txt1").style.fill = "#000000";
		document.getElementById("reflection_tori").style.fill = "#000077";
		this.classList.add("hidden");
		for (let i = 0; i < arw_go.length; i++) {
			arw_go[i].style.fill = "#800080";
		}
		setTimeout(function() {
			for (let i = 0; i < smurf_return.length; i++) {
				smurf_return[i].style.fill = "#000000";
			}
			setTimeout(function() {
				for (let i = 0; i < arw_back.length; i++) {
					smurf_return[i].textContent = "tori! これを受け取って!!";
				}
				setTimeout(function() {
					for (let i = 0; i < arw_back.length; i++) {
						arw_back[i].style.fill = "#ff0000";
					}
					for (let i = 0; i < arw_back.length; i++) {
						smurf_return[i].textContent = "tori! これを受け取って!!";
					}
					for (let i = 0; i < arw_go.length; i++) {
						arw_go[i].style.opacity = 0.3;
					}
					document.getElementById("reflection_txt1").style.fill = "none";
					document.getElementById("reflection_tori").style.fill = "none";
					setTimeout(function() {
						for (let i = 0; i < smurf_return.length; i++) {
							smurf_return[i].style.fill = "none";
						}
						setTimeout(function() {
							document.getElementById("reflection_poizoned").style.fill = "#b200b2";
						}, 300)
					}, 1000)
				}, 1000)
			}, 1500)
		}, 1500)
	})
})














window.addEventListener("load", function() {
	const arw = document.getElementsByClassName("amp_arw");
	const arw0 = document.getElementsByClassName("amp_arw0");
	const arw1 = document.getElementsByClassName("amp_arw1");
	const arw2 = document.getElementsByClassName("amp_arw2");
	document.getElementById("amp_poisoned").style.fill = "none";
	for (let i = 0; i < arw.length; i++) {
		arw[i].style.fill = "none";
	}
	document.getElementById("amp_button").addEventListener("click", function() {
		this.classList.add("hidden");
		setTimeout(function() {
			for (let i = 0; i < arw0.length; i++) {
				arw0[i].style.fill = "#b200b2";
				arw0[i].style.opacity = "0.6";
			}
			setTimeout(function() {
				for (let i = 0; i < arw1.length; i++) {
					arw1[i].style.fill = "#800080";
					arw1[i].style.opacity = "0.8";
				}
				setTimeout(function() {
					for (let i = 0; i < arw2.length; i++) {
						arw2[i].style.fill = "#800080";
					}
					setTimeout(function() {
						document.getElementById("amp_poisoned").style.fill = "#b200b2";
					}, 100)
				}, 700)
			}, 700)
		}, 300)
	})
})


































