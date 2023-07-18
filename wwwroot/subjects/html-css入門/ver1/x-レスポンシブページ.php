<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<h2>レスポンシブ</h2>
従来はwebサイトを閲覧するのはパソコンから行うのが主流だったのでwebサイトを作成する際にはパソコンで表示する際のレイアウトのみ意識すればok!でしたが、最近ではタブレット・スマホの普及も進んできているためパソコン・タブレット・スマホでの表示を意識して作成する必要があります。<br /><br />パソコン用に作成されたページをスマホで表示すると文字が小さくなって表示されてしまい、ユーザビリティが損なわれます。<br /><br />これに関して、パソコン用のページ・タブレット用のページ・スマホ用のページと分けることも可能ですが、ユーザビリティの観点から適切とは言えません。<br /><br />ということで、1つのページでパソコン・タブレット・スマホでそれぞれ良い感じに表示するための技術を学びましょう♪
<h2>viewport</h2>
パソコン用に作成された大きなページをスマホなどの小さな端末で表示する際は、どこをパソコン用ページのどこを表示すれば良いのかという問題が発生します。
<svg id="viewport-svg" width="90%" version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<g id="device" transform="translate(100 100)" stroke="#000" stroke-linecap="round" stroke-linejoin="round">
		<path d="m-24.724-69.856c-17.356 0-31.328 13.974-31.328 31.33v97.32c0 17.356 13.972 31.328 31.328 31.328h46.572c17.356 0 31.328-13.972 31.328-31.328v-97.32c0-17.356-13.972-31.33-31.328-31.33zm-23.092 18.268h92.787v112.55h-92.787z" fill="#000006" stroke-width="1.8429" style="paint-order:markers stroke fill"/>
		<circle cx="-1.6739" cy="75.886" r="8.8071" fill="#fff" stroke-width="2.7682" style="paint-order:markers stroke fill"/>
	</g>
</svg>
<script charset = "UTF-8" type="text/javascript">
	"use strict";
	window.addEventListener("load", () => {
		const s = document.getElementById("viewport-svg"),
			d = document.getElementById("device"),
			w = s.clientWidth,
			h = s.clientHeight;
		s.addEventListener("click", e => {
			let x = e.offsetX,
				y = e.offsetY,
				xr = x * 600 / w,
				yr = y * 400 / h;
			d.setAttribute("transform", `translate(${xr} ${yr})`);
		});
	});
</script>
無理やりページを縮小して表示する方法もありますが、この方法だと文字が小さくなってしまいます。
<img id="viewport-img" class="x" src="../pics/viewport2.png" alt="viewportの画像" />
ということで、パソコン・タブレット・スマホで良い感じに表示してくれる呪文を紹介します。<br />「&lt;meta name="viewport" content="width=device-width,initial-scale=1"&gt;」です。<br />これをhtmlの「head」タグ内に記述します。
<code class="html">
	&lt;head&gt;
		&lt;meta charset="utf-8" /&gt;
		&lt;title>タイトル&lt;/title&gt;
		&lt;meta name="viewport" content="width=device-width,initial-scale=1"&gt;
	&lt;head&gt;
</code>
これが何を意味するのかに関してはここでは特に理解する必要はありません。<br /><small>※知りたい方は<a href="../../../blog/index?date=20211219">こちら</a>。</small><br />簡単に説明すれば、ページの表示幅は使用している端末に合わせてね♪ってことです。
<h2>メディアクエリ</h2>
先ほど設定したviewportでページの表示幅が「〇〇px」未満の時はこんな感じで表示して、「〇〇px」以上「〇〇px」未満の時はこんな感じで表示して、「〇〇px」以上の時はこんな感じで表示して、と指示します。<br /><br />具体的には以下のように記述します。
<code class="css">
	@media screen and (max-width: 540px) {
		/*スマホ用の設定*/
	}
	@media screen and (min-width: 541px) and (max-width: 970px) {
		/*タブレット用の設定*/
	}
	@media screen and (min-width: 971px) {
		/*パソコン用の設定*/
	}
	/*全体に共通する設定*/
</code>
<h3>ブレイクポイント</h3>
何px未満がスマホで、何px以上が何px未満がタブレットで、何px以上がパソコンと判定できるでしょうか???<br /><br />ピンポイントで指定することはできませんが、一般に「～540px」がスマホ、「541px～970px」がタブレット、「971px～」がパソコンであると判定すればok!です。<br /><br />僕は面倒くさいので「～700px」と「701px～」で分類しています。<br /><small>※詳しくは<a href="../../../blog/index?date=20211217">こちら</a>。</small>
<div class="separator"></div>
実際にこのブレイクポイントでどのように表示を変えるかはデザインによるので説明しがたいですが、僕の場合はメニューの部分をスマホでは右上のボタンで画面全体に表示できるようにするため「display: fixed」を設定して、パソコンでは左に表示するように「display: block」(デフォルト)に設定して、同時にこれをフレックスボックスで表示するために親要素に「display: flex」を設定しています。<br />





<?php footer(); ?>