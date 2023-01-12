"use strict";

new Vue({
	el: "#v2",
	data: {
		canvas: null,
		ctx: null,
		canvas_size: 0,
		pts: [0, 0],
		rto: [0, 0],
		pai: "???????",
		count: 10000,
		on_off: true
	},
	mounted() {
		this.canvas = this.$refs.canvas;
		this.ctx = this.canvas.getContext("2d");
		this.canvas_size = this.canvas.width;
		this.draw();
	},
	methods: {
		draw: function() {
			this.ctx.fillStyle = "#000";
			this.ctx.beginPath();
		    this.ctx.arc(this.canvas_size / 2, this.canvas_size / 2, this.canvas_size / 2, 0, Math.PI * 2, true); // 外の円
			this.ctx.closePath();
		    this.ctx.stroke();
		},
		run: function() {
			this.on_off = false;
			let i;
			for (i = 0; i < this.count; i++) {
				const center = this.canvas_size / 2,
					x = Math.random() * this.canvas_size,
					y = Math.random() * this.canvas_size,
					r = Math.sqrt((x - center) ** 2 + (y - center) ** 2),
					k = (r <= center) ? 0 : 1;
				this.ctx.fillStyle = (r <= center) ? "#f00" : "#00f";
				this.ctx.fillRect(x, y, 1, 1);
				this.pts[k]++;
			}
			this.rto[0] = this.pts[0] / (this.pts[0] + this.pts[1]) * 100;
			this.rto[1] = this.pts[1] / (this.pts[0] + this.pts[1]) * 100;
			this.pai = 4 * this.pts[0] / (this.pts[0] + this.pts[1]);
			this.on_off = true;
		}
	}
});