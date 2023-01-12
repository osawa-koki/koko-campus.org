"use strict";

const btn = document.getElementById("v2-btn"),
	limit_obj = document.getElementById("v2-n"),
	canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = canvas.width,
	h = canvas.height,
	range = 2,
	lighter = 0.01,
	infinite_judge = 500;
ctx.fillStyle = "#000";
ctx.fillRect(0, 0, w, h);
const canvas_render = n => {
	const zoom = w / (range * 2);
	return parseInt((n + range) * zoom);
}
const R = () => Math.random() * range * 2 - range;
btn.addEventListener("click", run);
function run() {
	btn.removeEventListener("click", run);
	btn.classList.add("off");
	setTimeout(() => {
		const n = parseInt(limit_obj.value);
		let i;
		ctx.fillStyle = `rgba(255, 0, 0, ${lighter})`;
		for (i = 0; i < n; i++) {
			const cx = R(),
				cy = R();
			let real = 0,
				imag = 0,
				_real,
				_imag,
				j,
				ary = [],
				check = false;
			for (j = 0; j < infinite_judge; j++) {
				_real = real ** 2 - imag ** 2 + cx;
				_imag = 2 * real * imag + cy;
				real = _real;
				imag = _imag;
				ary.push([real, imag]);
				if (4 < (real ** 2 + imag ** 2)) {
					check = true;
					break;
				}
			}
			if (check) {
				ary.forEach(e => {
					ctx.fillRect(canvas_render(e[0]), canvas_render(e[1]), 1, 1);
				});
			}
		}
		btn.classList.remove("off");
		btn.addEventListener("click", run);
	}, 100);
}
function sync() {
	const v = limit_obj.value,
		nxt = limit_obj.parentNode.nextElementSibling;
	nxt.textContent = v;
}
limit_obj.addEventListener("input", () => {
	sync();
});
window.addEventListener("load", () => {
	sync();
});
