<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20",
);
head($obj);
?>

<script charset = "UTF-8" type="text/javascript">
const calc_d = gon => {
	const r = 50;
	let answer = {
		"points" : {},
		"length" : {},
	};
	(function() { //外接
		let theta = 180 / gon,
			x = Math.cos(Math.PI * theta / 180) * r,
			y = Math.tan(Math.PI * theta / 180) * x,
			xy,
			len,
			ary = [];
		for (i = 0; i < gon; i++) {
			xy = rotate(x, y, 360 * i / gon);
			ary.push(`${xy[0] + r} ${xy[1] + r}`);
		}
		len = Math.tan(Math.PI * theta / 180) * x * gon * 2;
		answer["points"]["out"] = ary.join(", ");
		answer["length"]["out"] = len;
	})();
	(function() { //内接

	})();
	return answer;
}
const rotate = (x, y, deg) => {
	let xx = (Math.cos(Math.PI * deg / 180) * x) - (Math.sin(Math.PI * deg / 180) * y),
		yy = (Math.sin(Math.PI * deg / 180) * x) + (Math.cos(Math.PI * deg / 180) * y);
	return [xx, yy].map(e => Math.round(e * 10000) / 10000);
}
console.log(calc_d(3));







</script>
<?php footer(); ?>