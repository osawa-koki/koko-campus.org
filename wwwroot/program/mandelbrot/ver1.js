"use strict";

const color = document.getElementById("v1-color"),
	lim = document.getElementById("v1-lim"),
	z = document.getElementById("v1-z");

function belongsToMandelbrotSet(x, y) {
	const LIMIT = parseInt(lim.value);
	const COMPLEX_NUMBER_THRESHOLD = parseInt(z.value);

	let realComponent = x;
	let imaginaryComponent = y;

	for (let i = 0; i < LIMIT; i++) {
		const _realComponent = realComponent ** 2 - imaginaryComponent ** 2 + x; //Zの二乗 + C(実部)
		const _imaginaryComponent = 2 * realComponent * imaginaryComponent + y; //Zの二乗 + C(虚部)

		realComponent = _realComponent;
		imaginaryComponent = _imaginaryComponent;

		if (realComponent * imaginaryComponent > COMPLEX_NUMBER_THRESHOLD) {
			return (i / LIMIT * 100)
		}
	}

	return 0;
}

document.getElementById("v1-btn").addEventListener("click", () => {
	const canvas = document.getElementsByTagName("canvas")[0];
	const ctx = canvas.getContext("2d");
	ctx.clearRect(0, 0, canvas.width, canvas.height);

	const resolution = 150;
	const panX = 2.5;
	const panY = 1.8;

	for (let x = 0; x < canvas.width; x++) {
		for (let y = 0; y < canvas.height; y++) {
			const belongsToSet = belongsToMandelbrotSet(x / resolution - panX, y / resolution - panY);

			if (belongsToSet === 0) {
				ctx.fillStyle = '#000';
				ctx.fillRect(x, y, 1, 1);
			} else {
				ctx.fillStyle = `hsl(${color.value}, 50%, ${belongsToSet}%)`;
				ctx.fillRect(x, y, 1, 1);
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