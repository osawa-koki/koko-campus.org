<?php

function keyword_pretify($string) {
	return mb_strtolower($string);
}

require(__DIR__. "/template.php");
head();

if (isset($_GET["word"])) { // 表示
	if (file_exists(__DIR__. "/manage/words/{$_GET["word"]}.html")) { // 用語が登録されていれば、、、
		$entire_content = file_get_contents(__DIR__. "/manage/words/{$_GET["word"]}.html");
		$content = preg_replace("/{.*?}/s", "", $entire_content);
		echo "<h2>{$_GET['word']}</h2>";
		echo $content;
	} else { // 用語がなければ、、、(通常は起こりえない)
		echo "<h2>404. 用語が見つかりませんでした、、、</h2>";
		echo "<p>リンクに誤りがあるか、用語が削除された可能性があります。<br />検索フォームからキーワードで検索してください。</p>";
	}
} else { // 一覧表示
	if (!isset($_GET["search"])) { // デフォルト
		echo "<h2>トップページ</h2>";
		?>
		<p id="announce">
			「IT dictionary」へようこそ♪<br /><br />このサイトでは、ITに関連する用語を解説しています。<br />下のリンクから興味のあるページへ飛ぶか、メニューからキーワードを検索して下さい。<br /><br /><span class="media-query small">メニューは右上のメニューボタンから開けます。</span><span class="media-query large">メニューはページ右上に表示されています。</span><br /><br />検索アルゴリズムの性質により、「重要度・カテゴリ &rarr; キーワードの部分一致 &rarr; キーワードの完全一致」の順で表示の優先度が高くなっています。<br /><br />また、キーワードを指定する際には、英数字は半角で、日本語文字は全角で入力して下さい。<br />大文字と小文字は区別しません。
		</p>
		<?php
	} else { // 検索結果
		echo "<h2>検索結果</h2>";
		?>
		<p id="announce">
			以下の内容で検索を実行しました。
		</p>
		<table id="searched-condition" border="1">
			<tbody>
				<tr>
					<th>キーワード</th>
					<td><?php echo (isset($_POST["keyword"])) ? ($_POST["keyword"] !== "") ? $_POST["keyword"] : "なし" : "なし"; ?></td>
				</tr>
				<tr>
					<th>カテゴリ</th>
					<td><?php echo (isset($_POST["category"])) ? ($_POST["category"] === "all") ? "全て" : $_POST["category"] : "なし"; ?></td>
				</tr>
				<tr>
					<th>重要度</th>
					<td>
						<div id="importance-show">
							<?php
							if (isset($_POST["importance"]) && is_numeric($_POST["importance"]) && 1 <= (int)$_POST["importance"] && (int)$_POST["importance"] <= 5) {
								$importance_check = true;
								echo $_POST["importance"]. "<span class='ijou'>以上</span>";
							} else {
								$importance_check = false;
								echo "なし";
							}
							?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<div id="results-container">
			<?php
			$results_containerA = [];
			$results_containerB = [];
			$results_containerC = [];

			$json = json_decode(file_get_contents(__DIR__. "/manage/office/access-ristricted/metadata.json"), true);

			if (isset($_POST["keyword"], $_POST["category"]) && $importance_check) {
				$keyword = $_POST["keyword"];
				foreach ($json as $key => $value) {
					if (keyword_pretify($key) === keyword_pretify($keyword)) {
						$results_containerA[] = $key;
					} else if (2 <= mb_strlen($keyword) && preg_match("/{$keyword}/", $key)) {
						$results_containerB[] = $key;
					}
					$category_match = false;
					foreach ($value["カテゴリ"] as $category_key) {
						if (($_POST["category"] === "all" || $category_key === $_POST["category"]) && (int)$_POST["importance"] <= (int)$value["重要度"]) {
							$results_containerC[] = $key;
						}
					}
				}
			}
			shuffle($results_containerA);
			shuffle($results_containerB);
			shuffle($results_containerC);
			$merged_array = array_merge($results_containerA, $results_containerB, $results_containerC);
			$results_container = array_unique(array_splice($merged_array, 0, 30));
			$results_exist = false;
			foreach ($results_container as $the_word) {
				echo "<a href='?word={$the_word}'>{$the_word}</a>";
				$results_exist = true;
			}
			if (!$results_exist) {
				echo "<p>検索結果がありません。<br />条件を変えて、再度検索してください。</p>";
			}
			?>
		</div>
		<?php
	}
}
footer() ?>