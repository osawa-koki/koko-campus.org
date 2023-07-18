"use strict";

const param = [
	"len",
	"angle",
	"shrink",
	"n"
];

const obj = new Object();
param.forEach(e => {
	let o = document.getElementById(`v1-${e}`)
	obj[e] = o;
	//obj.v = function()...は大人の事情で中止
	o.addEventListener("input", sync);
});

function sync() {
	this.parentNode.nextElementSibling.textContent = this.value;
}
const canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = parseInt(canvas.width),
	h = parseInt(canvas.height);

function tree(x, y, angle, n) {
	if (n <= parseInt(obj.n.value)) {
		const len = parseFloat(obj.shrink.value) ** n * parseInt(obj.len.value);
		(function() { //右側
			const ang = (angle - parseInt(obj.angle.value)) % 360,
				moved_x = x + Math.cos(ang * Math.PI / 180) * len,
				moved_y = (ang !== 90 && ang !== 270) ? y + Math.tan(ang * Math.PI / 180) * (x - moved_x) :
					(ang === 90) ? y - len : y + len; //tag90とtan270はダメ!!
			ctx.beginPath();
			ctx.moveTo(x, y);
			ctx.lineTo(moved_x, moved_y);
			ctx.closePath();
		    ctx.stroke();
			setTimeout(() => {
				tree(moved_x, moved_y, ang, n + 1);
			}, 300);
		})();
		(function() { //左側
			const ang = (angle + parseInt(obj.angle.value)) % 360,
				moved_x = x + Math.cos(ang * Math.PI / 180) * len,
				moved_y = (ang !== 90 && ang !== 270) ? y + Math.tan(ang * Math.PI / 180) * (x - moved_x) :
					(ang === 90) ? y - len : y + len; //tag90とtan270はダメ!!
			ctx.beginPath();
			ctx.moveTo(x, y);
			ctx.lineTo(moved_x, moved_y);
			ctx.closePath();
		    ctx.stroke();
			setTimeout(() => {
				tree(moved_x, moved_y, ang, n + 1);
			}, 300);
		})();
	}
}

document.getElementById("v1-btn").addEventListener("click", () => {
	ctx.clearRect(0, 0, w, h);
	ctx.strokeStyle = "green";
	ctx.beginPath();
	ctx.moveTo(w / 2, h);
	ctx.lineTo(w / 2, (h - parseInt(obj.len.value)) * 0.9);
	ctx.closePath();
    ctx.stroke();

	tree(
		parseInt(w / 2),
		parseInt((h - parseInt(obj.len.value)) * 0.9),
		90,
		1
	);
});