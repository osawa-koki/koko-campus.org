<?php
if (isset($_SERVER["HTTP_REFERER"])) {
	$url = $_SERVER["HTTP_REFERER"];
	$file = file_get_contents($url);
	preg_match("/(?<=<title>).*?(?=<\/title>)/", $file, $title);
} else {
	$url = "https://koko-campus.org";
	$title = array("なし");;
}
$index_or_recieved = !isset($_POST["receive"]);
?>
<!DOCTYPE html>
<html lang = "ja">
	<head>
		<meta charset ="utf-8" />
		<title>koko-campus問合せ</title>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="author" content="koko" />
		<meta name = "description" content = "koko-campusに関する問合せフォーム" />
		<?php echo ($index_or_recieved) ? "" : "<meta http-equiv='refresh' content='3;URL={$url}'>"; ?>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<?php
			if ($index_or_recieved) {
				?>
				<form method="post">
					<input type="hidden" name="receive" />
					<h1>問合せフォーム</h1>
					<div>
						お名前<small>(公表されません)</small><span class="must"></span>
						<input type="text" name="name" size="20" minlength="3" maxlength="10" required />
					</div>
					<div>
						連絡先メールアドレス<small>(公表されません)</small>
						<input type="text" name="mail" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
					</div>
					<div>
						遷移元のurl<span class="readonly"></span>
						<input type="text" name="url" size="40" value="<?php echo urldecode($url); ?>" readonly />
					</div>
					<div>
						遷移元のタイトル<span class="readonly"></span>
						<input type="text" name="title" size="30" value="<?php echo $title[0]; ?>" readonly />
					</div>
					<div>
						問い合わせ内容<small>(公表される可能性があります)</small><span class="must"></span>
						<textarea name="contents" rows="10" cols="50" minlength="25" required></textarea>
					</div>
					<div><input type="submit" value="送信" /></div>
				</form>
				<?php
			} else if (isset($_POST["name"], $_POST["mail"], $_POST["url"], $_POST["contents"])) {
				$crlf = "/\r\n|\r|\n/";
				$br = "<br />";
				$name = preg_replace($crlf, $br, $_POST["name"]);
				$mail = preg_replace($crlf, $br, $_POST["mail"]);
				$url = preg_replace($crlf, $br, $_POST["url"]);
				$contents = preg_replace($crlf, $br, $_POST["contents"]);
				
				$data = array(
					"name" => $name,
					"mail" => $mail,
					"url" => $url,
					"contents" => $contents
				);
				$key = date("Y-m-d H:i:s");
				
				$path = __DIR__. "/data-warehouse/data-to-handle.txt";
				$json = json_decode(file_get_contents($path), true);
				if (!array_key_exists($key, $json)) { // 重複していなければ、、、
					$json[$key] = $data;
					echo "<p>ありがとうございます。<br />お問い合わせを承りました。<br /><br />3秒後に元いたページへリダイレクトします。</p>";
				} else {
					echo "<p>処理に失敗しました。<br />お手数ですが、もう一度入力をお願いします。</p>";
				}
				file_put_contents(__DIR__. "/data-warehouse/data-to-handle.txt", json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
			}
			?>
		</main>
	</body>
</html>