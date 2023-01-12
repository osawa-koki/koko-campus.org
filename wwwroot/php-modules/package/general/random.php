<?php

namespace koko\general\random;

DEFINE("start_N", 48);
DEFINE("start_Lalpha", 65);
DEFINE("start_Ualpha", 97);
DEFINE("end_N", 57);
DEFINE("end_Lalpha", 90);
DEFINE("end_Ualpha", 122);
DEFINE("len_N", 10);
DEFINE("len_alpha", 26);

function randStr($n, $m=1) {
	return ((random_int(1, 36) <= 5) ? chr(random_int(start_N, end_N)) : ((random_int(1, 2) === 1) ? chr(random_int(start_Lalpha, end_Lalpha)) : chr(random_int(start_Ualpha, end_Ualpha))))
	. (($m < $n) ? randStr($n, $m+1) : "");
}

function randTime() {
	
}




?>