"use strict";

new Vue({
	el: "#v2",
	data: {
		canvas_size: 0, //dummy
		canvas: null, //dummy
		ctx: null, //dummy
		color: 0,
		size: 1000,
		count: 5,
		deg: 60,
		standing: 4000,
		boots: 1500,
		x_lock: false
	},
	mounted() {
		this.canvas = this.$refs.canvas;
		this.ctx = this.canvas.getContext("2d");
		this.canvas_size = this.canvas.width;
		this.run(false);
	},
	computed: {
		bg: function() {
			const base = this.standing / 100;
			return `linear-gradient(to right, transparent 0% ${base - 2}%, ${`hsl(${this.color}, 100%, 50%)`} ${base - 2}% ${base + 2}%, transparent ${base + 2}% 100%)`;
		},
		show_size: function() {
			return (this.size < 1600) ? "小":
				(this.size < 2400) ? "中" : "大";
		},
		hsl: function() {
			return `hsl(${this.color}, 100%, 50%)`;
		}
	},
	methods: {
		run: function(arg) {
			if (!this.x_lock) {
				this.x_lock = true;
				this.i = 0;
				this.del();
				this.ctx.fillStyle = `hsl(${this.color}, 100%, 50%)`;
				this.ctx.fillRect(
					this.standing - this.size / 2,
					this.canvas_size - this.size - this.boots,
					this.size,
					this.size
				);
				this.go(
					[this.standing - this.size / 2, this.canvas_size - this.size - this.boots],
					[this.standing + this.size / 2, this.canvas_size - this.size - this.boots],
					this.size,
					0,
					(arg) ? this.count - 1 : 0,
					1
				);
			}
		},
		go: function(p1, p2, size, angle, n, i) {
			if (0 <= n) {
				const h = (320 / (this.count + 1) * i + this.color) % 360;
				this.ctx.fillStyle = `hsl(${h}, 100%, 50%)`;
				(() => { //左側の準備-thisが正しいスコープを指すようにアロー関数で定義
					const smalled_size = Math.cos(this.deg * Math.PI / 180) * size, //サイズの縮小
						pt_left = this.left(
							p1[0],
							p1[1],
							smalled_size,
							angle
						);
					this.ctx.fillStyle = `hsl(${h}, 100%, 50%)`;
					this.ctx.beginPath();
					this.ctx.moveTo(pt_left[0][0], pt_left[0][1]);
					this.ctx.lineTo(pt_left[1][0], pt_left[1][1]);
					this.ctx.lineTo(pt_left[2][0], pt_left[2][1]);
					this.ctx.lineTo(pt_left[3][0], pt_left[3][1]);
					this.ctx.fill();
					setTimeout(() => {
						this.go(
							[pt_left[3][0], pt_left[3][1]],
							[pt_left[2][0], pt_left[2][1]],
							smalled_size,
							angle + this.deg,
							n - 1,
							i + 1
						);
					}, 300);
				})();
				(() => { //右側の準備thisが正しいスコープを指すようにアロー関数で定義
					const smalled_size = Math.sin(this.deg * Math.PI / 180) * size, //サイズの縮小
						pts = this.right(
							p2[0], //*1*ここでsize分右に移動
							p2[1],
							smalled_size,
							angle
						);
					this.ctx.fillStyle = `hsl(${h}, 100%, 50%)`;
					this.ctx.beginPath();
					this.ctx.moveTo(pts[0][0], pts[0][1]);
					this.ctx.lineTo(pts[1][0], pts[1][1]);
					this.ctx.lineTo(pts[2][0], pts[2][1]);
					this.ctx.lineTo(pts[3][0], pts[3][1]);
					this.ctx.fill();
					setTimeout(() => {
						this.go(
							[pts[2][0], pts[2][1]],
							[pts[1][0], pts[1][1]],
							smalled_size,
							angle - (90 - this.deg),
							n - 1,
							i + 1
						);
					}, 300);
				})();
			} else {
				this.x_lock = false;
			}
		},
		left: function(x, y, size, angle) {
			//p1, p2, p3, p4は接点から反時計回りに
			const answer = [
				[
					x,
					y
				],
				[
					x + Math.cos((angle + this.deg) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg) * Math.PI / 180) * size
				],
				[
					x + Math.cos((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2),
					y - Math.sin((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2)
				],
				[
					x + Math.cos((angle + this.deg + 90) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg + 90) * Math.PI / 180) * size
				],
			];
			return answer;
		},
		right: function(x, y, size, angle) {
			//p1, p2, p3, p4は接点から反時計回りに
			const answer = [
				[
					x,
					y
				],
				[
					x + Math.cos((angle + this.deg) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg) * Math.PI / 180) * size
				],
				[
					x + Math.cos((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2),
					y - Math.sin((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2)
				],
				[
					x + Math.cos((angle + this.deg + 90) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg + 90) * Math.PI / 180) * size
				],
			];
			return answer;
		},
		del: function() {
			this.ctx.clearRect(0, 0, this.canvas_size, this.canvas_size);
		}
	}
});