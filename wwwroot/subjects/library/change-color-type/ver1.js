"use strict";
function change_color_type(arg) {
	if (arg.match(/#[a-fA-F0-9]{3}(?!.+)/)) {
		arg = arg.replace(/[^#]/g, "$&$&");
	}
	let s = new Array;
	if (arg.match(/#[a-fA-F0-9]{6}/)) {
		arg.match(/[^#]{2}/g).forEach(function(e) {
			s.push(parseInt(e, 16));
		});
	}
	return `rgb(${s.join(",")})`;
}