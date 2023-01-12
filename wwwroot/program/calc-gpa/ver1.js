"use strict";

new Vue({
	el: "#v1",
	data: {
		now: [0, 0, 0, 0, 0],
	},
	computed: {
		gpa: function() {
			const tf = this.get_grads() !== 0;
			return (tf) ? this.get_gp() / this.get_grads() : 0;
		}
	},
	methods: {
		change: e => {
			const diff = 30,
				max = 150,
				obj = e.target,
				v = parseInt(e.target.value),
				nxt = obj.parentNode.nextElementSibling;
			obj.setAttribute("min", (0 < v - diff) ? v - diff : 0);
			obj.setAttribute("max", (v + diff < max) ? v + diff : max);
			nxt.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 50%)`;
			setTimeout(() => {
				nxt.style.backgroundColor = "transparent";
			}, 300);
		},
		change_tgt: e => {
			const diff = 0.5,
				max = 3,
				obj = e.target,
				v = parseFloat(e.target.value),
				nxt = obj.parentNode.nextElementSibling;
			obj.setAttribute("min", (0 < v - diff) ? v - diff : 0);
			obj.setAttribute("max", (v + diff < max) ? v + diff : max);
			nxt.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 50%)`;
			setTimeout(() => {
				nxt.style.backgroundColor = "transparent";
			}, 300);
		},
		get_gp: function() {
			const now = this.now;
			let i,
				n = 0;
			for (i = 0; i < now.length; i++) {
				n += i * now[i];
			}
			return n;
		},
		get_grads: function() {
			const reducer = (sum, now) => sum + now;
			return this.now.slice(1).reduce(reducer);
		}
	}
});