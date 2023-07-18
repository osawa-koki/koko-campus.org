"use strict";

class complex {
	constructor(real, imag) {
		let answer;
		if (!isNaN(real) && !isNaN(imag)) { //両方とも数字ならば、、、
			this.real = real;
			this.imag = imag;
			answer = true;
		} else {
			answer = false;
		}
		return false;
	}
	power(n) {
		let i,
			real = 0,
			imag = 0;
		const pAry = this._pascal_triangle(n); //パスカルの三角形を取得
		for (i = 0; i <= n; i++) { //2乗なら「3(1 2 1)」、3乗なら「4(1 3 3 1)」
			if (i === 0) { //虚数部の指数が「0」だったら(先頭)、、、
				real += this.real ** n * pAry[i] //pAry[i]は必ず「1」(ダミー)
			} else { //
				if (i % 2 === 0) { //虚数部が「2n」だったら「-1」(4nではない2n)または「1」(4n)となって実数部へ減算
					if (i % 4 === 0) {
						real += (this.real ** (n - i)) * (this.imag ** i) * pAry[i];
					} else {
						real -= (this.real ** (n - i)) * (this.imag ** i) * pAry[i];
					}
				} else if (i % 2 === 1) { //虚数部が「2n+1」だったら「i」のまま虚数部へ
					if ((i - 1) % 4 === 0 || i === 1) {
						imag += (this.real ** (n - i)) * (this.imag ** i) * pAry[i];
					} else {
						imag -= (this.real ** (n - i)) * (this.imag ** i) * pAry[i];
					}
				}
			}
		}
		return [real, imag]
	}
	_pascal_triangle(n) {
		let answer = [1, 1],
			i;
		for (i = 1; i < n; i++) {
			let temp = [],
				j;
			temp.push(1);
			for (j = 0; j < answer.length - 1; j++) {
				temp.push(answer[j] + answer[j + 1])
			}
			temp.push(1);
			answer = temp.slice();
		}
		return answer;
	}
}

new Vue({
	el: "#v2",
	data: {
		canvas_size: 0, //dummy
		canvas: null, //dummy
		ctx: null, //dummy
		color: 0,
		power: 2,
		limit: 20,
		upto: 10,
		resolution: 150,
		Re: 2.5,
		Im: 1.8,
	},
	mounted() {
		this.canvas = this.$refs.canvas;
		this.ctx = this.canvas.getContext("2d");
		this.canvas_size = this.canvas.width;
	},
	computed: {
		bgColor: function() {
			return `hsl(${this.color}, 100%, 50%)`;
		}
	},
	methods: {
		run: function(e) {
			const obj = e.target;
			obj.classList.add("off");
			setTimeout(() => {
				this.ctx.clearRect(0, 0, this.canvas_size, this.canvas_size);
				let x, y;
				for (x = 0; x < this.canvas_size; x++) {
					for (y = 0; y < this.canvas_size; y++) {
						const result = this.check(x / this.resolution - this.Re, y / this.resolution - this.Im);
						if (result === 0) {
							this.ctx.fillStyle = '#000';
							this.ctx.fillRect(x, y, 1, 1);
						} else {
							this.ctx.fillStyle = `hsl(${this.color}, 50%, ${result}%)`;
							this.ctx.fillRect(x, y, 1, 1);
						}
					}
				}
				obj.classList.remove("off");
			}, 500);
		},
		check: function(x, y) {
			let real = x,
				imag = y,
				i;
			for (i = 0; i < this.limit; i++) {
				const c = new complex(real, imag),
					ReIm = c.power(this.power);
				real = ReIm[0] + x; //Zの二乗 + C(実部)
				imag = ReIm[1] + y; //Zの二乗 + C(虚部)
		
				if (this.upto < real * imag) {
					return (i / this.limit * 100)
				}
			}
			return 0;
		}
	}
});