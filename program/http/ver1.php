<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-03-05",
	"updated" => "2022-03-05",
);
head($obj);
?>
<h1>http通信メーカー</h1>
<div id="v1">
	<form action="show1" method="post">
		<div id="url-box">
			https://
			<input id="url" name="url" type="text" required />
		</div>
		<div class="container">
			<div class="flex-item">
				<div class="scroll">
					<table border="1">
						<caption>ヘッダ部</caption>
						<tbody></tbody>
					</table>
				</div>
				<textarea></textarea>
				<div id="headers" class="button register">登録</div>
			</div>
			<div class="flex-item">
				<div class="scroll">
					<table border="1">
						<caption>ボディ部</caption>
						<tbody></tbody>
					</table>
				</div>
				<textarea></textarea>
				<div id="body-" class="button register">登録</div>
			</div>
		</div>
		<div id="hidden-field"></div>
		<input type="submit" value="送信" id="send-button" class="button" />
	</form>
</div>



<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>