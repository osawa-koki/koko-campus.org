"use strict";

const btn = document.getElementById("v1-btn"),
	color = document.getElementById("v1-color"),
	n_obj = document.getElementById("v1-n"),
	canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = canvas.width,
	h = canvas.height;

const draw = (x, y, size) => {
	const p1_x = x + size / 2, //中央下
		p1_y = y - Math.sin(-60 * Math.PI / 180) * size,
		p2_x = x + size, //右
		p2_y = y;
	ctx.beginPath();
	ctx.moveTo(x, y);
	ctx.lineTo(p1_x, p1_y);
	ctx.lineTo(p2_x, p2_y);
	ctx.fill();
}

function fx(x, y, size, n) {
	if (n <= parseInt(n_obj.value)) {
		if (n / 2 === 0) {
			ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
		} else {
			ctx.fillStyle = `#fff`;
		}
		const p1_x = Math.cos(240 * Math.PI / 180) * 1 / 4 * size + x, //上
			p1_y = y - Math.sin(240 * Math.PI / 180) * 1 / 4 * size,
			p2_x = Math.cos(240 * Math.PI / 180) * 3 / 4 * size + x, //左下
			p2_y = y - Math.sin(240 * Math.PI / 180) * 3 / 4 * size,
			p3_x = p2_x + size / 2, //右下
			p3_y = p2_y;
		draw(p1_x, p1_y, size / 4);
		draw(p2_x, p2_y, size / 4);
		draw(p3_x, p3_y, size / 4);
		setTimeout(() => {
			fx(x, y, size / 2, n + 1);
			fx(
				Math.cos(240 * Math.PI / 180) * 1 / 2 * size + x,
				y - Math.sin(240 * Math.PI / 180) * 1 / 2 * size,
				size / 2,
				n + 1
			);
			fx(
				Math.cos(-60 * Math.PI / 180) * 1 / 2 * size + x,
				y - Math.sin(-60 * Math.PI / 180) * 1 / 2 * size,
				size / 2,
				n + 1
			);
		}, 300);


	} else {
		btn.addEventListener("click", run);
	}
}

function run() {
	this.removeEventListener("click", run);
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	const size = 400,
		start = 70;
	(function() {
		ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
		ctx.beginPath();
		ctx.moveTo(w / 2, start);
		const p2_x = Math.cos(240 * Math.PI / 180) * size + w / 2, //180 + 60 = 240
			p2_y = start - Math.sin(240 * Math.PI / 180) * size; //180 + 60 = 240
		ctx.lineTo(p2_x, p2_y);
		ctx.lineTo(p2_x + size, p2_y);
		ctx.fill();
	})();
	setTimeout(() => {
		ctx.fillStyle = `#fff`;
		const p1_x = Math.cos(240 * Math.PI / 180) * size / 2 + w / 2,
			p1_y = start - Math.sin(240 * Math.PI / 180) * size / 2,
			p2_x = Math.cos(-60 * Math.PI / 180) * size / 2 + p1_x, //「x + size / 2」の方が簡単
			p2_y = p1_y - Math.sin(-60 * Math.PI / 180) * size / 2;
		ctx.beginPath();
		ctx.moveTo(p1_x, p1_y);
		ctx.lineTo(p2_x, p2_y);
		ctx.lineTo(p1_x + size / 2, p1_y);
		ctx.fill();
		setTimeout(() => {
			fx(w / 2, start, size, 1);
		}, 300);
	}, 300);
}

btn.addEventListener("click", run);

color.parentNode.nextElementSibling.style.backgroundColor = `hsl(0, 100%, 50%)`;
color.addEventListener("input", function() {
	this.parentNode.nextElementSibling.style.backgroundColor = `hsl(${this.value}, 100%, 50%)`;
});
n_obj.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});