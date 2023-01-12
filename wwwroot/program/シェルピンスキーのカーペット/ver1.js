"use strict";

const btn = document.getElementById("v1-btn"),
	color = document.getElementById("v1-color"),
	n_obj = document.getElementById("v1-n"),
	canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = canvas.width,
	h = canvas.height;

const mixup2 = arg => {
	let answer = [];
	arg.forEach(e => {
		arg.forEach(f => {
			answer.push([e, f]);
		});
	});
	return answer;
}

function fx(x, y, size, n) {
	if (n <= parseInt(n_obj.value)) {
		if (n / 2 === 0) {
			ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
		} else {
			ctx.fillStyle = "#fff";
		}
		//3*3の座標を取得
		const cd = [
			1 / 9 * size,
			4 / 9 * size,
			7 / 9 * size
		];
		mixup2(cd).forEach(e => {
			ctx.fillRect(
				e[0] + x,
				e[1] + y,
				size / 9,
				size / 9
			);
			setTimeout(() => {
				fx(
					e[0] + x - size / 9,
					e[1] + y - size / 9,
					size / 3,
					n + 1
				);
			}, 300);
		});
	} else {
		btn.addEventListener("click", run);
	}
}

function run() {
	this.removeEventListener("click", run);
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	const size = 400,
		start = (w - size) / 2;
	(function() {
		ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
		ctx.fillRect(start, start, size, size);
	})();
	setTimeout(() => {
		ctx.fillStyle = "#fff";
		const size2 = size / 3,
			start2 = start + size2;
		ctx.fillRect(start2, start2, size2, size2);
		setTimeout(() => {
			fx(start, start, size, 1);
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