<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-08",
	"updated" => "2021-12-08",
);
head($obj);
?>
<div id="v2-main">
	<div id="v2-x">
		<span>/</span>
		<input type="text" id="v2-a"/>
		<span>/</span>
		<span id="v2-mode">g</span>
	</div>
	<div id="v2-ms">
		<div><label><input type="checkbox" value="g" checked />g</label></div>
		<div><label><input type="checkbox" value="m" />m</label></div>
		<div><label><input type="checkbox" value="i" />i</label></div>
		<div><label><input type="checkbox" value="s" />s</label></div>
	</div>
	<div id="v2-clue">
		<span>正規表現のヒント!&nbsp;</span>
		<select id="v2-sl">
			<option value="none">選択なし</option>
			<option value="mail">メールアドレス</option>
			<option value="phone">電話番号(携帯)</option>
			<option value="post">郵便番号</option>
			<option value="url">url</option>
		</select>
	</div>
	<div id="v2-yz">
		<div id="v2-y">
			<span>検索対象の文字列</span>
			<textarea id="v2-txt"></textarea>
		</div>
		<div id="v2-z">
			<span>検索結果</span>
			<div id="v2-sc">
				<table>
					<tbody id="v2-tb"</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script charset = "UTF-8" type="text/javascript" src = "ver2.js" defer></script>
<?php footer(); ?>