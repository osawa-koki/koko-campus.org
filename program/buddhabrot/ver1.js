"use strict";

const color = document.getElementById("v1-color"),
	lim = document.getElementById("v1-lim"),
	z = document.getElementById("v1-z");

let box = new Array(); //500x500の「0」を要素とする二次元配列を作成(後でインクリメントするから空要素ではダメ!)
for (let i = 0; i < 500; i++) {
	let ary = [];
	for (let j = 0; j < 500; j++) {
		ary.push(0);
	}
	box.push(ary);
}

const panX = 2;
const panY = 2;
const iter_count = 10000;

let max = 0;

const canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = canvas.width,
	h = canvas.height;

//引数=>実数, 虚数, canvas上のx(実数), canvas上のy(虚数)
function buddha(x, y) {
	const LIMIT = parseInt(lim.value);

	let real = panX * 2 * x / w - panX;
	let imag = panY * 2 * y / h - panY;

	let temp = [];
	for (let i = 0; i < LIMIT; i++) {
		const _real = real ** 2 - imag ** 2 + real;
		const _imag = 2 * real * imag + imag;

		//real,imagからx, yの逆算
		temp.push([parseInt(w * (real + panX) / 2 / panX), parseInt(h * (real + panY) / 2 / panY)]);

		real = _real;
		imag = _imag;

		if (real ** 2 * imag ** 2 > 4) {
			while (1 < temp.length) {
				try {
					let tp = temp.shift();
					box[tp[0]][tp[1]]++;
					if (max < box[tp[0]][tp[1]]) {
						max = box[tp[0]][tp[1]];
					}
					//console.log(box[tp[0]][tp[1]]);
				} catch (e) {}
			}
			break;
		}
		box[x][y]++;
		if (max < box[x][y]) {
			max = box[x][y];
		}
	}
}
document.getElementById("v1-btn").addEventListener("click", () => {
	ctx.clearRect(0, 0, w, h);
	for (let i = 0; i < w; i++) {
		for (let j = 0; j < w; j++) {
			buddha(i, j);
		}
	}
	//box内の二次元配列を展開
	for (let i = 0; i < w; i++) {
		for (let j = 0; j < w; j++) {
			if (box[i][j] === 0) {
				//ctx.fillStyle = "#000";
				//ctx.fillRect(i, j, 1, 1);
			} else {
				ctx.fillStyle = `hsl(${color.value}, 100%, ${box[i][j] / max * 100}%)`;
				ctx.fillRect(i, j, 1, 1);
			}
		}
	}
});
color.parentNode.nextElementSibling.style.backgroundColor = `hsl(0, 100%, 50%)`;
color.addEventListener("input", function() {
	this.parentNode.nextElementSibling.style.backgroundColor = `hsl(${this.value}, 100%, 50%)`;
});
lim.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});
z.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});
