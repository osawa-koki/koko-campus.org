<?php


require(__DIR__. "/../functions.php");
if (!isset($_POST["name"]) || !isset($_POST["mail"]) || !isset($_POST["url"]) || !isset($_POST["contents"])) {
	header();
}

$name = preg_replace("/\[\]/", "", nl2br(htmlspecialchars($_POST["name"])));
$mail = preg_replace("/\[\]/", "", nl2br(htmlspecialchars($_POST["mail"])));
$url = preg_replace("/\[\]/", "", nl2br(htmlspecialchars($_POST["url"])));
$contents = preg_replace("/\[\]/", "", nl2br(htmlspecialchars($_POST["contents"])));

$data = "name[{$name}] mail[{$mail}] url[{$url}] contents[{$contents}]\n";

file_put_contents(__DIR__. "/yet.txt", $data, FILE_APPEND);

?>
<!DOCTYPE html>
<html lang = "ja">
	<head>
		<meta charset ="utf-8" />
		<title>koko-campus問合せ</title>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="author" content="koko" />
		<meta name = "description" content = "koko-campusに関する問合せ" />
		<meta http-equiv="refresh" content="3;URL=<?php echo $url; ?>">
		<link rel="stylesheet" href="index.css" />
	</head>
	<body>
		<div id="main">
			<div class="ib-left">
				貴重なご意見ありがとうございます。<br /><br />3秒後に元いたurlへリダイレクトされます。
			</div>
		</div>
	</body>
</html>