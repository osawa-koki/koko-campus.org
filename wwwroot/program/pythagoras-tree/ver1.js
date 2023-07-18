"use strict";

const n_obj = document.getElementById("v1-n"),
	svg = document.getElementsByTagName("svg")[0],
	w = 100,
	h = 100;

function fx(p1, p2, angle, size, n) {
	if (n - 1 < parseInt(n_obj.value)) {
		let clr = colors.shift();
		(function() {
			let len = size / 2, //大きさは二分の一
				dg = 150, //60 + 90
				rect = document.createElementNS("http://www.w3.org/2000/svg", "rect"),
				sp, k;
			sp = {
				width: len,
				height: len,
				x: p1[0],
				y: p1[1],
				transform: `rotate(${-(angle + dg)}, ${p1[0]}, ${p1[1]})`
			};
			for (k in sp) {
				rect.setAttribute(k, sp[k]);
			}
			rect.style.fill = `hsl(${320 * n / parseInt(n_obj.value)}, 100%, 50%)`;
			svg.appendChild(rect);

			let x1, y1, x2, y2;
			x1 = Math.cos((angle + 150) * Math.PI / 180) * len + p1[0];
			y1 = p1[1] - Math.sin((angle + 150) * Math.PI / 180) * len;
			x2 = Math.cos((angle + 60) * Math.PI / 180) * len + x1;
			y2 = y1 - Math.sin((angle + 60) * Math.PI / 180) * len;
			fx([x1, y1], [x2, y2], (angle + 60) % 360, len, n + 1);
		})();
		(function() {
			let len = size * Math.sqrt(3) / 2, //大きさはルート三分の一
				dg = 150, //30 + 90
				rect = document.createElementNS("http://www.w3.org/2000/svg", "rect"),
				sp, k;
			sp = {
				width: len,
				height: len,
				x: p2[0],
				y: p2[1],
				transform: `rotate(${-(angle + dg)}, ${p2[0]}, ${p2[1]})`
			};
			for (k in sp) {
				rect.setAttribute(k, sp[k]);
			}
			rect.style.fill = `hsl(${320 * n / parseInt(n_obj.value)}, 100%, 50%)`;
			svg.appendChild(rect);

			let x1, y1, x2, y2; //逆の順番で求める
			x2 = Math.cos((angle + 60) * Math.PI / 180) * len + p2[0];
			y2 = p2[1] - Math.sin((angle + 60) * Math.PI / 180) * len;
			x1 = Math.cos((angle + 150) * Math.PI / 180) * len + x2;
			y1 = y2 - Math.sin((angle + 150) * Math.PI / 180) * len;
			fx([x1, y1], [x2, y2], (angle - 30) % 360, len, n + 1);
		})();
	}
}

let colors;

document.getElementById("v1-btn").addEventListener("click", () => {
	while (svg.firstChild) {
		svg.removeChild(svg.firstChild);
	}
	colors = [];
	for (let i = 0; i <= parseInt(n_obj.value); i++) {
		colors.push(`hsl(${320 * i / parseInt(n_obj.value)}, 100%, 50%)`)
	}
	const size = 15;
	let rect, sp, k;
	rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
	sp = {
		width: size,
		height: size,
		x: 26,
		y: 70
	};
	for (k in sp) {
		rect.setAttribute(k, sp[k]);
	}
	rect.style.fill = colors.shift();
	svg.appendChild(rect);
	fx([26, 70], [41, 70], 0, size, 1);
});

n_obj.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});