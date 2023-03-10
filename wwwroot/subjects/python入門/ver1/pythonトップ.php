<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2021-12-28",
	"updated" => "2021-12-28"
);
head($obj);
?>
<h2>python</h2>
pythonとはグイド・ヴァン・ロッサムにより1991年にリリースされたプログラミング言語です。<br />AI・IoT時代の代表ともいえるプログラミング言語で、人気急成長中で、かつ、簡単に学ぶことができるのが特徴です。<br />kokoのブログでプログラミング言語の人気度推移について調査したのでよかったら参考にして下さい。
<p class="r">リンクは<a href="http://koko-campus.org/blog/index?date=20211213">こちら</a>。</p>
間違いなくこれから学ぶべき言語第一位です。<br />ということで、pythonプログラミング学習を早速始めましょう♪<br /><br />最初にpythonの公式ページを紹介します。
<a class="link to-python" href="https://www.python.org/">python</a>
このサイトではpythonの公式サイトの情報と個人で実行した得た情報を分かりやすく解説することを目的としているため、python公式サイトが提供する一次情報に比べて完全性・網羅性・正確性にかけていることがあります。<br />慣れてきたらpythonの公式サイトも参照して下さい。
<p class="r">このサイトでも完全性・網羅性・正確性のある情報の提供を心がけてはいますが、一次情報には絶対に勝てませんので、、、</p>
<h2>pythonの特徴</h2>
pythonの特徴を簡単に説明します。
<ul>
	<li>準備が簡単</li>
	<li>書きやすい</li>
	<li>読みやすい</li>
	<li>数的処理に最適</li>
	<li>汎用的</li>
	<li>ユーザが多い</li>
	<li>拡張的</li>
</ul>
<h3>準備が簡単</h3>
theプログラミング言語と言えるC/C++やJavaなどはいわゆるコンパイラ型の言語であって環境構築・コンパイル・ビルド...といった煩雑な作業が必要なのに対してpythonはインタプリタ型の言語である為こういった処理をせず、ソフトウェアをインストールするだけで実行可能です。
<h3>書きやすい</h3>
書きやすいです。<br />説明するときりがないですが、、、いくつか他の言語と決定的に異なる点を紹介します。<br /><br />多くの言語では「{...}」を用いてスコープ(範囲)の管理を行いますが、pythonではインデント(最初の空行)でそれを行います。<br />数的処理に必要な機能を自作することなく使用可能です。<br />pythonではpipというパッケージを管理するツールを用いて簡単にパッケージを管理することができます。<br />tkinterというモジュールを用いれば簡単にGUIアプリケーションを作成できます。<br />などなど、、、<br /><br />とにかく簡単にプログラミングができます。
<h3>読みやすい</h3>
他の言語では異なる様々な書き方ができるところを、pythonでは一通りのまたは少しの書き方しかできません。<br />これが良いか悪いかはさておき、読みやすさの向上につながっていることは間違いなしです。<br />ソフトウェアの寿命が伸びてコードの保守性(修正のしやすさ)が重要視される今日ではこの「読みやすさ」はとっても大事です。
<h3>数的処理に最適</h3>
pythonの最大の特徴ともいえます。<br />「pandas・scipy・scikit-learn」など数的処理に最適なモジュールを使用可能です。<br />AI・RPAやIoTに携わる際にはとっても強力な武器になります。
<h3>汎用的</h3>
数的処理に最適と説明しましたが、pythonは数的処理以外にもほとんどすべての処理を実行可能です。<br />数的処理が得意な言語はRやscalaなどがありますが、pythonはこれらの言語と異なり、その目的に制限がありません。
<h3>ユーザが多い</h3>
pythonユーザの人口がおおいため、分からないことがあっても調べれば簡単に解決できます。<br />プログラミングではデバッグが大きな仕事となる以上、こういった要因も重要です。
<h3>拡張的</h3>
pythonはモジュールを組みあわせて使用することができ、かつ、モジュールの簡易も容易である為、拡張性に優れていると言えます。
<h2>pythonの弱点</h2>
上ではpythonの良い点のみを紹介しましたが、pythonの弱点についても紹介します。
<ul>
	<li>実行速度が遅い</li>
	<li>コピペエンジニアに、、、</li>
</ul>
<h3>実行速度が遅い</h3>
簡単・便利の反面、pythonのプログラム実行速度はC/C++と比べてかなり遅いです。<br />インタプリタ型であることや機能が豊富であることが原因です。<br />近年はハードウェアの性能も向上しているためそこまで問題視されることはないですが、システムの基盤となる部分ではこの理由からpythonが用いられないことが多いです。
<h3>コピペエンジニアに、、、</h3>
書きやすい・読みやすいという長所は、換言すれば書き方が制限されるため、みんなが同じようなコードを書くということになります。<br />確かに良い点とも捉えられますが、既にあるコードをコピペすればok!となってしまいプログラミングスキルの向上につながりません。
<div class="separator"></div>
短所に関しては気にすることはありません。<br />長所だけ言うのはフェアではないと思ったので書いただけです。<br />python、始めましょう♪
<h2>インストール</h2>
では、早速pythonをインストールしましょう♪<br />下のリンクに飛んで「download &gt; Windows(macOS)」から、「Download Python 3.**.**」を選択してダウンロードして下さい。
<a class="link to-python" href="https://www.python.org/downloads/">pythonダウンロード</a>
ダウンロードが完了したらダブルクリックして起動します。<br />インストールの選択画面が表示されますので、「add Python 3.**.** to PATH」にチェックを入れて「Install Now」をクリックしてください。
<img src="../pics/インストール.png" alt="pythonインストールの説明画像" />
これでインストール完了です。
<h2>IDLE</h2>
プログラミングっていわゆる「コーディング(コードを書く)」「テスト」「デバッグ」「修正(コーディング)」...って感じなんですけどをこれを「All in one」で行うための環境をIDE(Integrated Developing Environment/統合開発環境)と言います。<br />他の言語ではVisual studio・ecliipse・PyCharmなどのIDEにそれぞれのプログラミング言語用のプラグインを使用するのですがpythonには予めIDLEという便利なIDEが備わっているためこれを用いましょう♪<br />では早速IDLEを起動してください。<br />スタートからIDLEと検索すれば出てきます。
<img src="../pics/idle.png" alt="IDLEの画像" />
こんな画面が表示されます。<br />試しに「1+1」と入力してエンターキーを押してください。<br />「2」と表示されるはずです。
<img src="../pics/1+1.png" alt="IDLEの画像" />
では他の演算もしてみましょう♪「1+10」「4-2」「1+6」、、、<br />演算結果が表示されると思います。
<p class="r">とりあえずここでは足し算と引き算のみでok!です。</p>
これで完了です!!と言いたいのですが、IDLEの設定を若干変更しましょう♪
<p class="r">あくまでも見やすさの問題ですのでそのままでもok!です。</p>
「Options &gt; Configure IDLE」から設定が変更できます。<br />Font Faceを僕が大好きな「consolas」に設定、Sizeを12に設定します。
<div class="separator"></div>
これで準備は完了です♪<br />ではプログラミング学習に入りましょう♪
<?php footer(); ?>