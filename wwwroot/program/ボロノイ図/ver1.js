"use strict";

const canvas = document.getElementsByTagName("canvas")[0],
	ctx = canvas.getContext("2d"),
	w = canvas.width,
	h = canvas.height;

let pts = [];

canvas.addEventListener("click", e => {
	ctx.clearRect(0, 0, w, h);
	const rect = e.target.getBoundingClientRect();

	// ブラウザ上での座標を求める
	const viewX = e.clientX - rect.left,
		viewY = e.clientY - rect.top;

	// 表示サイズとキャンバスの実サイズの比率を求める(同じだから考慮しなくてもok!)
	const scaleWidth = canvas.clientWidth / canvas.width,
		scaleHeight = canvas.clientHeight / canvas.height;

	// ブラウザ上でのクリック座標をキャンバス上に変換
	const canvasX = Math.floor(viewX / scaleWidth),
		canvasY = Math.floor(viewY / scaleHeight);

	run(canvasX,canvasY);
});

function run(x, y) {
	let i,
		check = true;
	for (i = 0; i < pts.length; i++) {
		if (Math.abs((pts[i][0] - x) + (pts[i][1] - y)) < 5) {  //もし仮に存在したら削除
			check = false;
			pts.splice(i, 1);
			break;
		}
	}
	if (check) { //無かったら追加
		ctx.fillStyle = "red";
		ctx.beginPath();
		ctx.arc(x, y, 5, 0, Math.PI * 2);
		ctx.fill();
		pts.push([x, y])
	}
	pts.forEach(e => { //描写のし直し(その位置だけ削除が困難であるため、位置から書き直し、、、)
		ctx.fillStyle = "red";
		ctx.beginPath();
		ctx.arc(e[0], e[1], 5, 0, Math.PI * 2);
		ctx.fill();
	});
	//////////////////
	//[[x, y][x, y][x, y]]から実際に線を書く
}
