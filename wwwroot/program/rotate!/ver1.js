"use strict";

/*
純粋関数
引数=>[[元のx座標, 基準のx座標, 回転後のx座標], [元のy座標, 基準のy座標, 回転後のy座標]
戻り値=>[xの始まり, yの始まり, 長さ] //svgのviewBox用
*/
const calc = ary => {
	/*
	1.x,yの最小値を算出
	2.x,yの範囲を取得
	3.大きい方の範囲を返す
	*/
	let answer = [],
		minx = Math.min(ary[0][0], ary[0][1], ary[0][2]),
		maxx = Math.max(ary[0][0], ary[0][1], ary[0][2]),
		miny = Math.min(ary[1][0], ary[1][1], ary[1][2]),
		maxy = Math.max(ary[1][0], ary[1][1], ary[1][2]);
	answer.push(minx);
	answer.push(Math.abs(miny));
	let rangex = maxx - minx,
		rangey = maxy - miny,
		range = Math.max(rangex, rangey);
	answer.push(range);
	return answer;
}
/*
純粋関数
引数=>[[元のx座標, 元のy座標], [基準のx座標, 基準のy座標], 回転角度], 精度
戻り値=>[回転後のx座標, 回転後のy座標]
*/
const rotate = (obj, acc=10000) => {
	let deg = Math.PI * obj[2] / 180,
		xx = obj[0][0] - obj[1][0],
		yy = obj[0][1] - obj[1][1],
		x = Math.cos(deg) * xx - Math.sin(deg) * yy,
		y = Math.sin(deg) * xx + Math.cos(deg) * yy;
	x = Math.round((x + obj[1][0]) * acc) / acc;
	y = Math.round((y + obj[1][1]) * acc) / acc;
	return [x, y];
}

let app = new Vue({
	el: "#app",
	data: {
		x: 0,
		y: 5,
		xb: 5,
		yb: 0,
		deg: 90,
		xs: 0,
		ys: 0,
		rot_x: 0,
		rot_y: 5,
		vb: [0, 0], //[xの始まり, yの始まり, 長さ]
		len: 5,
		viewbox: "viewBox", //バインドに関して動的引数で実行しないとキャメルケース属性を設定できない
		fill: "none",
		stroke: "aqua",
	},
	methods: {
		changed: function() {
			const xb = this.xb,
				yb = this.yb,
				xs = this.xs,
				ys = this.ys,
				xy = rotate([[xb, yb], [xs, ys], this.deg]),  //回転先座標を取得--->[x座標, y座標]
				vb = calc([[xb, xs, xy[0]], [yb, ys, xy[1]]]); //viewBoxを算出
			this.rot_x = xy[0];
			this.rot_y = xy[1];
			this.vb = vb.slice(0, 2);
			this.len = vb[2];
			this.x = xy[0];
			this.y = xy[1];
		}
	},
	computed: {
		get_vb: function() {
			const vb = this.vb,
				len = this.len;
			return `${vb[0]} ${vb[1]} ${len} ${len}`;
		},
		r: function() {
			return this.len / 50;
		},
	}
});