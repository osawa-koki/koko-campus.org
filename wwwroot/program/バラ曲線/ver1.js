"use strict";

const n = document.getElementById("v1-n"),
	k = document.getElementById("v1-k"),
	canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = canvas.width,
	h = canvas.height;

function fx() {
	let i;
	const a = parseInt(n.value),
		b = parseInt(k.value);
	for (i = 0; i < 360 * parseInt(k.value); i = i + 0.3) {
		const th = i * Math.PI / 180,
			x = Math.sin((a * i / b) * Math.PI / 180) * Math.cos(th),
			y = Math.sin((a * i / b) * Math.PI / 180) * Math.sin(th),
			zoom = 500 / 2 - 30;
		ctx.fillRect(x * zoom + w / 2, y * zoom + h / 2, 1, 1);
	}
}

document.getElementById("v1-btn").addEventListener("click", () => {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.fillStyle = "#000";
	fx();
});

n.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});
k.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});