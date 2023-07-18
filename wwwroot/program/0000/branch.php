<?php

function cmp($x, $y) {
	preg_match("/(?<=ver)\d+/", $x, $m1);
	preg_match("/(?<=ver)\d+/", $y, $m2);
	return $m2[0] - $m1[0];
}

$f = preg_replace("/\.php/", "", array_diff(glob("ver*.php"), array(basename(__FILE__))));
usort($f, "cmp");
header("Location: {$f[0]}");

?>