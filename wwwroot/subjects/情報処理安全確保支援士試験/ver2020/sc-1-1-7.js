"use strict";

window.addEventListener("load", function() {
	const doc = document.getElementById("mailing_div");
	const width = document.getElementById("main").clientWidth;
	doc.style.width = width * 0.9;
})
const count_x = [43, 50, 72, 100, 110];
const count_y = [68, 42, 36, 42, 68];
let x_lock_mail = 0;
window.addEventListener("load", function() {
	const doc = document.getElementById("mail_next");
	const mail = document.getElementById("mail_pic0_0");
	let count = 0;
	doc.addEventListener("click", function() {
		if (x_lock_mail === 0) {
			x_lock_mail = 1;
			count += 1;
			let arrows = document.getElementsByClassName("arrow");
			for (let i = 0; i < arrows.length; i++) {
				arrows[i].style.fill = "#808080";
			}
			show_info(count);
			if (count === 5) {
				count = 0;
				mail.setAttribute("x", count_x[0]);
				mail.setAttribute("y", count_y[0]);
				document.getElementById("mail_pic0_1").setAttribute("points", "43,68 47.55,71 51.6,68");
				x_lock_mail = 0;
			} else {
				let x = count_x[count] - count_x[count - 1];
				let y = count_y[count] - count_y[count - 1];
				move_x(count_x[count - 1], x);
				move_y(count_y[count - 1], y);
				follow(count_x[count - 1], x, count_y[count - 1], y);
			}
			document.getElementById(`arrow${count}`).style.fill = "#ff0000";
		}
	})
})
function move_x(now, num) {
	let doc0 = document.getElementById("mail_pic0_0");

	let count = 0;
	var interval_id = setInterval(() => {
		count += 1;
		doc0.setAttribute("x", num * count / 100 + now);
		if (count > 100) {
			clearInterval(interval_id);
		}
	}, 10)
}
function move_y(now, num) {
	let doc0 = document.getElementById("mail_pic0_0");

	let count = 0;
	var interval_id = setInterval(() => {
		count += 1;
		doc0.setAttribute("y", num * count / 100 + now);
		if (count > 100) {
			clearInterval(interval_id);
		}
	}, 10)
}
function follow(now_x, num_x, now_y, num_y) {
	let doc1 = document.getElementById("mail_pic0_1");

	let count = 0;
	var interval_id = setInterval(() => {
		count += 1;
		let x = num_x * count / 100 + now_x;
		let y = num_y * count / 100 + now_y;
		let points = `${x},${y} ${x + 4.35},${y + 2.5} ${x + 8.6},${y}`;
		doc1.setAttribute("points", points);
		if (count > 100) {
			clearInterval(interval_id);
			x_lock_mail = 0;
		}
	}, 10)
}
const words = ["MUA<br>(Mail User Agent)<br>メールの発信・受信", "MSA<br>(Mail Submission Agent)<br>メールの投稿受付・ユーザ認証", "MTA<br>(Mail Transfer Agent)<br>メールの中継", "MDA<br>(Mail Delivery Agent)<br>メールの格納", "MRA<br>(Mail Retrieval Agent)<br>受信したメールの取り出し", "MUA<br>(Mail User Agent)<br>メールの発信・受信", "MSA<br>(Mail Submission Agent)<br>メールの投稿受付・ユーザ認証"];
const comments = [
"MSAがMUAに対して識別・認証を行います。(ここで用いられる認証が<span class = 'underline'>SMTP-AUTH</span>です)<br>この通信の際に用いられるプロトコルは<span class = 'underline0'>SMTP</span>です。",
"MSAが認証に成功したMUAから受け取ったメールをMTAに送信します。<br>セキュリティの観点から、MTAは「MSAからメールを受け取る用のMTA」と「送信先にメールを送信する用のMTA」に分かれる場合が多いです。<br>この通信の際に用いられるプロトコルは<span class = 'underline2'>SMTP</span>です。",
"上の図では省略しましたが、送信元のMTAは最初に送信先のMTAにメールを送信します。<br>次に、送信先のMTAは受け取ったメールをMDAに渡して、メールをメールBOXに格納します。<br>この通信の際に用いられるプロトコルは<span class = 'underline2'>SMTP</span>です。",
"実際にはMDAとMRAは直接やり取りはせず、MDAがメールをメールBOXに預けて、MRAはそれを取り出します。",
"MRAは受信者(MUA)からの要求を受けると、受信者の識別・認証を完成させた後にメールBOXからメールを取り出してMUAに送信します。<br>この通信の際に用いられるプロトコルは<span class = 'underline2'>POP・IMAP</span>です。",
"MSAがMUAに対して識別・認証を行います。(ここで用いられる認証が<span class = 'underline0'>SMTP-AUTH</span>です)<br>この通信の際に用いられるプロトコルは<span class = 'underline2'>SMTP</span>です。"
]
function show_info(num) {
	document.getElementById("mail_from").innerHTML = words[num];
	document.getElementById("mail_to").innerHTML = words[num + 1];
	document.getElementById("mailing_comment").innerHTML = comments[num];
}
let mail_num = 0;
window.addEventListener("load", function() {
	const collection = document.getElementById("mail_commant_collection").getElementsByClassName("explanation");
	for (let j = 1; j < collection.length; j++) {
		collection[j].classList.add("hidden");
	}
	const trigger = document.getElementById("mail_commant_trigger").getElementsByTagName("li");
	for (let i = 0; i < trigger.length; i++) {
		trigger[i].addEventListener("click", function() {
			for (let j = 0; j < collection.length; j++) {
				collection[j].classList.add("hidden");
			}
			collection[i].classList.remove("hidden");
			mail_num = i;
			scroll_to(document.getElementById("mail_commant_collection"))
		})
	}
})
window.addEventListener("load", function() {
	const button = document.getElementById("mail_next0");
	const collection = document.getElementById("mail_commant_collection").getElementsByClassName("explanation");
	button.addEventListener("click", function() {
		mail_num += 1;
		if (mail_num === 8) {
			mail_num = 0;
		}
		for (let j = 0; j < collection.length; j++) {
			collection[j].classList.add("hidden");
		}
		collection[mail_num].classList.remove("hidden");
	})
})
let dns_go = 0;
window.addEventListener("load", function() {
	const trigger_normal = document.getElementById("cache_normal");
	const moving = document.getElementById("moving_comment");
	const box = document.getElementById("comment_box");
	const arrow0 = document.getElementsByClassName("dns_arrow_normal");
	trigger_normal.addEventListener("click", function() {
		if (dns_go === 0) {
			dns_go = 1;
			for (let i = 0; i < arrow0.length; i++) {
				arrow0[i].style.fill = "white";
			}
			document.getElementById("dns_poison_arrow3").style.fill = "none";
			arrow0[0].setAttribute("d", "M -79.999997,90 -127.6314,7.499999 l -47.6314,-82.499996 95.262801,-3e-6 95.262792,-3e-6 -47.631396,82.500004 z");
			arrow0[0].setAttribute("transform", "matrix(0,-0.02777405,0.11224748,0,48.106061,53.340576)");
			box.style.fill = "#FFFF66";
			box.style.fillOpacity = 0.5;
			moving.style.fill = "#FF33CC";
			document.getElementById("cache_abnormal").style.backgroundColor = "#808080";
			moving.getElementsByTagName("tspan")[0].textContent = "koko-campus.orgの";
			moving.getElementsByTagName("tspan")[1].textContent = "IPアドレス教えて~";
			moving.getElementsByTagName("tspan")[0].setAttribute("x", 8);
			moving.getElementsByTagName("tspan")[1].setAttribute("x", 8);
			arrow0[0].style.fill = "#ff0000";
			setTimeout(function() {
				moving.getElementsByTagName("tspan")[0].textContent = "任せてね~~~";
				moving.getElementsByTagName("tspan")[1].textContent = "ちょっと待ってね♪";
				box.setAttribute("cx", 70);
				moving.getElementsByTagName("tspan")[0].setAttribute("x", 55);
				moving.getElementsByTagName("tspan")[1].setAttribute("x", 55);
				setTimeout(function() {
					moving.getElementsByTagName("tspan")[0].textContent = "koko-campus.orgの";
					moving.getElementsByTagName("tspan")[1].textContent = "IPアドレス知ってる???";
					box.setAttribute("cx", 85);
					moving.getElementsByTagName("tspan")[0].setAttribute("x", 70);
					moving.getElementsByTagName("tspan")[1].setAttribute("x", 70);
					arrow0[0].style.fill = "none";
					arrow0[1].style.fill = "#ff0000";
					setTimeout(function() {
						moving.getElementsByTagName("tspan")[0].textContent = "下のサーバ君に聞いたら";
						moving.getElementsByTagName("tspan")[1].textContent = "分かると思うよ!!";
						box.setAttribute("cx", 110);
						box.setAttribute("cy", 20);
						moving.getElementsByTagName("tspan")[0].setAttribute("x", 92);
						moving.getElementsByTagName("tspan")[1].setAttribute("x", 92);
						moving.getElementsByTagName("tspan")[0].setAttribute("y", 18);
						moving.getElementsByTagName("tspan")[1].setAttribute("y", 23);
						setTimeout(function() {
							moving.getElementsByTagName("tspan")[0].textContent = "知ってるよ♪";
							moving.getElementsByTagName("tspan")[1].textContent = "0.1.2.3だよ♪";
							box.setAttribute("cx", 110);
							box.setAttribute("cy", 50);
							moving.getElementsByTagName("tspan")[0].setAttribute("x", 100);
							moving.getElementsByTagName("tspan")[1].setAttribute("x", 100);
							moving.getElementsByTagName("tspan")[0].setAttribute("y", 50);
							moving.getElementsByTagName("tspan")[1].setAttribute("y", 55);
							arrow0[1].style.fill = "none";
							arrow0[2].style.fill = "#ff0000";
							setTimeout(function() {
								moving.getElementsByTagName("tspan")[0].textContent = "OK!!!助かった!!";
								moving.getElementsByTagName("tspan")[1].textContent = "ありがとね♪";
								box.setAttribute("cx", 85);
								box.setAttribute("cy", 32);
								moving.getElementsByTagName("tspan")[0].setAttribute("x", 75);
								moving.getElementsByTagName("tspan")[1].setAttribute("x", 75);
								moving.getElementsByTagName("tspan")[0].setAttribute("y", 30);
								moving.getElementsByTagName("tspan")[1].setAttribute("y", 35);
								arrow0[1].style.fill = "#ff0000";
								setTimeout(function() {
									moving.getElementsByTagName("tspan")[0].textContent = "koko-campus.orgの";
									moving.getElementsByTagName("tspan")[1].textContent = "IPアドレスは0.1.2.3だって♪";
									box.setAttribute("cx", 70);
									moving.getElementsByTagName("tspan")[0].setAttribute("x", 55);
									moving.getElementsByTagName("tspan")[1].setAttribute("x", 50);
									arrow0[1].style.fill = "none";
									arrow0[2].style.fill = "none";
									arrow0[0].style.fill = "#ff0000";
									arrow0[0].removeAttribute("transform");
									arrow0[0].setAttribute("d", "m 39.687618,55.609351 9.253606,-1.369751 9.253605,-1.36975 0.01339,2.6458 0.01339,2.645799 L 48.95461,56.8854 Z");
									setTimeout(function() {
										moving.getElementsByTagName("tspan")[0].textContent = "OKOK!!!";
										moving.getElementsByTagName("tspan")[1].textContent = "ありがとね♪";
										box.setAttribute("cx", 25);
										moving.getElementsByTagName("tspan")[0].setAttribute("x", 12);
										moving.getElementsByTagName("tspan")[1].setAttribute("x", 12);
										document.getElementById("cache_abnormal").style.backgroundColor = "#FFFF66";
										dns_go = 0;
									}, 1500);
								}, 1500);
							}, 1500);
						}, 1500);
					}, 1500);
				}, 1500);
			}, 1500);
		}
	})
})
window.addEventListener("load", function() {
	const trigger_abnormal = document.getElementById("cache_abnormal");
	const moving = document.getElementById("moving_comment");
	const box = document.getElementById("comment_box");
	const arrow0 = document.getElementsByClassName("dns_arrow_normal");
	trigger_abnormal.addEventListener("click", function() {
		if (dns_go === 0) {
			dns_go = 1;
			for (let i = 0; i < arrow0.length; i++) {
				arrow0[i].style.fill = "#ffffff";
			}
			document.getElementById("dns_poison_arrow3").style.fill = "none";
			arrow0[0].setAttribute("d", "M -79.999997,90 -127.6314,7.499999 l -47.6314,-82.499996 95.262801,-3e-6 95.262792,-3e-6 -47.631396,82.500004 z");
			arrow0[0].setAttribute("transform", "matrix(0,-0.02777405,0.11224748,0,48.106061,53.340576)");
			box.style.fill = "#FFFF66";
			box.style.fillOpacity = 0.5;
			moving.style.fill = "#FF33CC";
			document.getElementById("cache_normal").style.backgroundColor = "#808080";
			moving.getElementsByTagName("tspan")[0].textContent = "koko-campus.orgの";
			moving.getElementsByTagName("tspan")[1].textContent = "IPアドレス教えて~";
			moving.getElementsByTagName("tspan")[0].setAttribute("x", 8);
			moving.getElementsByTagName("tspan")[1].setAttribute("x", 8);
			arrow0[0].style.fill = "#ff0000";
			setTimeout(function() {
				moving.getElementsByTagName("tspan")[0].textContent = "任せてね~~~";
				moving.getElementsByTagName("tspan")[1].textContent = "ちょっと待ってね♪";
				box.setAttribute("cx", 70);
				moving.getElementsByTagName("tspan")[0].setAttribute("x", 55);
				moving.getElementsByTagName("tspan")[1].setAttribute("x", 55);
				setTimeout(function() {
					moving.getElementsByTagName("tspan")[0].textContent = "koko-campus.orgの";
					moving.getElementsByTagName("tspan")[1].textContent = "IPアドレス知ってる???";
					box.setAttribute("cx", 85);
					moving.getElementsByTagName("tspan")[0].setAttribute("x", 70);
					moving.getElementsByTagName("tspan")[1].setAttribute("x", 70);
					arrow0[1].style.fill = "#ff0000";
					arrow0[0].style.fill = "none";
					setTimeout(function() {
						moving.getElementsByTagName("tspan")[0].textContent = "知ってるでござる。";
						moving.getElementsByTagName("tspan")[1].textContent = "4.6.4.9でござる。";
						box.setAttribute("cx", 110);
						box.setAttribute("cy", 100);
						box.style.fill = "#663399";
						box.style.fillOpacity = 1;
						moving.getElementsByTagName("tspan")[0].setAttribute("x", 95);
						moving.getElementsByTagName("tspan")[1].setAttribute("x", 95);
						moving.getElementsByTagName("tspan")[0].setAttribute("y", 98);
						moving.getElementsByTagName("tspan")[1].setAttribute("y", 103);
						arrow0[1].style.fill = "none";
						moving.style.fill = "#ffffff";
						document.getElementById("dns_poison_arrow3").style.fill = "#800080";
							setTimeout(function() {
								moving.getElementsByTagName("tspan")[0].textContent = "OK!!!助かった!!";
								moving.getElementsByTagName("tspan")[1].textContent = "ありがとね♪";
								box.setAttribute("cx", 85);
								box.setAttribute("cy", 32);
								moving.getElementsByTagName("tspan")[0].setAttribute("x", 75);
								moving.getElementsByTagName("tspan")[1].setAttribute("x", 75);
								moving.getElementsByTagName("tspan")[0].setAttribute("y", 30);
								moving.getElementsByTagName("tspan")[1].setAttribute("y", 35);
								document.getElementById("dns_poison_arrow3").style.fill = "none";
								setTimeout(function() {
									moving.getElementsByTagName("tspan")[0].textContent = "koko-campus.orgの";
									moving.getElementsByTagName("tspan")[1].textContent = "IPアドレスは4.6.4.9だって♪";
									box.setAttribute("cx", 70);
									moving.getElementsByTagName("tspan")[0].setAttribute("x", 55);
									moving.getElementsByTagName("tspan")[1].setAttribute("x", 50);
									arrow0[0].style.fill = "#800080";
									arrow0[0].removeAttribute("transform");
									arrow0[0].setAttribute("d", "m 39.687618,55.609351 9.253606,-1.369751 9.253605,-1.36975 0.01339,2.6458 0.01339,2.645799 L 48.95461,56.8854 Z");
									setTimeout(function() {
										moving.getElementsByTagName("tspan")[0].textContent = "OKOK!!!";
										moving.getElementsByTagName("tspan")[1].textContent = "ありがとね♪";
										box.setAttribute("cx", 25);
										moving.getElementsByTagName("tspan")[0].setAttribute("x", 12);
										moving.getElementsByTagName("tspan")[1].setAttribute("x", 12);
										document.getElementById("cache_normal").style.backgroundColor = "#FFFF66";
										dns_go = 0;
									}, 1500);
								}, 1500);
							}, 1500);
					}, 1000);
				}, 1500);
			}, 1500);
		}
	})
})
window.addEventListener("load", function() {
	const trigger = document.getElementById("session_button");
	const box = document.getElementsByClassName("session_box");
	const txt = document.getElementsByClassName("session_txt");
	const arrow = document.getElementsByClassName("arw");
	let count = 0;
	reset_session();
 	trigger.addEventListener("click", function() {
 		count += 1;
 		reset_session();
	 	for (let i = 0; i < count; i++) {
			box[i].style.stroke = "#000000";
		}
		for (let i = 0; i < count; i++) {
			txt[i].style.fill = "#000000";
		}
		for (let i = 0; i < count; i++) {
			arrow[i].style.fill = "#000000";
		}
		if (count === 3) {
			count = 0;
		}
	})
})
function reset_session() {
	const trigger = document.getElementById("session_button");
	const box = document.getElementsByClassName("session_box");
	const txt = document.getElementsByClassName("session_txt");
	const arrow = document.getElementsByClassName("arw");
	for (let i = 0; i < box.length; i++) {
		box[i].style.stroke = "none";
	}
	for (let i = 0; i < txt.length; i++) {
		txt[i].style.fill = "none";
	}
	for (let i = 0; i < arrow.length; i++) {
		arrow[i].style.fill = "none";
	}
}