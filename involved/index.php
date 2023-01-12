<!DOCTYPE html>
<html lang = "ja">
	<head>
		<meta charset ="utf-8" />
		<title>koko-campusへの参加</title>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="author" content="koko" />
		<meta name = "description" content = "koko-campusへの参加" />
		<link rel="stylesheet" href="index.css" />
	</head>
	<body>
		<main>
			<div class="announce">現在、一時的に募集を停止しています。<br />再開の時期は未定です。</div>
			<p>トップページは<a href="../index">こちら</a>。</p>
			<h1>koko-campusへの参加</h1>
			koko-campusではメンバーを募集しています。<br />koko-campusでの活動に興味がある方は是非協力をお願いします。
			<h2>koko-campusの目的</h2>
			「IT&times;教育」で日本の教育水準の向上を目指しています。
			<h2>募集内容</h2>
			以下の3つの内容で募集しています。
			<br />
			<ul>
				<li>授業科目の作成</li>
				<li>デザイン系</li>
				<li>プログラマ</li>
			</ul>
			<br />
			求められるスキルは以下の通りです。
			<table border="1">
				<tbody>
					<tr>
						<td>授業科目の作成</td>
						<td>
							<ul class="x">
								<li>その科目に対するある程度の理解</li>
								<li>html・cssに関する基本的な知識</li>
							</ul>
							<p class="r">科目は特に制限はありませんが、ITと会計に関してはkokoが作成したいので、それ以外でお願いします。</p>
						</td>
					</tr>
					<tr>
						<td>デザイン系</td>
						<td>
							<ul class="x">
								<li>inkscape・illustratorの簡単なスキル</li>
								<li>センス</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>プログラマ</td>
						<td>
							<ul class="x">
								<li>javascript・phpに関するスキル</li>
							</ul>
							<p class="r">最近vpsからレンタルサーバに変更したので、そこまで高度なスキルは求められません。</p>
						</td>
					</tr>
				</tbody>
			</table>
			そんなに難しくないです。<br />分からなかったら僕が教えるので大丈夫です♪
			<h2>報酬</h2>
			なし
			<h2>応募方法</h2>
			以下のフォームから応募してください。
			<div id="form">
				名前<small>(ニックネームでok!)</small>
				<br />
				<input type="text" id="name" size="20" minlength="3" maxlength="10" pattern="[^\[\]]+" required/>
				<br /><br />
				メールアドレス
				<br />
				<input type="text" id="mail" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" requierd/>
				<br /><br />
				応募する内容
				<br />
				<select id="type">
					<option value="sj">授業科目の作成</option>
					<option value="dz">デザイン系</option>
					<option value="pg">プログラマ</option>
					<option value="el">その他</option>
				</select>
				<br /><br />
				質問があればこちらに記載してください
				<br />
				<textarea id="q"></textarea>
				<br /><br />
				<input type="button" id="button" value="参加する!!">
				<div class="announce">一時的に募集を停止しています。<br />再開の時期は未定です。</div>
			</div>
			<script type="text/javascript" charset="utf-8">
				"use strict";
				(() => {
					const
						name = document.getElementById("name"),
						mail = document.getElementById("mail"),
						type = document.getElementById("type"),
						q = document.getElementById("q")
					;
					document.getElementById("button").addEventListener("click", () => {
						// 一時停止中
					});
				})();
			</script>
		</main>
	</body>
</html>