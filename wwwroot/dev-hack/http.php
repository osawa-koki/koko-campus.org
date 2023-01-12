<?php
echo "\n\n\n-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+\n\n\n";
echo "*****リクエストヘッダ*****\n\n";
foreach (getallheaders() as $k => $v) {
	echo "{$k} - {$v}\n";
}
echo "\n\n\n";
echo "*****クッキー*****\n\n";
foreach ($_COOKIE as $k => $v) {
	echo "{$k} - {$v}\n";
}
echo "\n\n\n";
echo "*****ペイロード部*****\n\n";
foreach ($_POST as $k => $v) {
	echo "{$k} - {$v}\n";
}
echo "\n\n\n-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+\n\n\n";
?>