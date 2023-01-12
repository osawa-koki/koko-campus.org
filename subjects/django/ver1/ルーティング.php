<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>ルーティング</h2>
ルーティングでは、urlをパターンマッチングして処理経路を制御します。<br />パターンマッチングはurlのドメイン名以降を対象とします。
<img src="../pics/ルーティング・パス.png" alt="ルーティング" />
ルーティングはurls.pyファイルを操作することで実現します。
<h2>サーバの起動</h2>
ルーティングを設定する前にサーバを起動させてみましょう♪<br />プロジェクトディレクトリから以下のコマンドを実行してサーバを起動させましょう♪
<code class="python">
	python manage.py runserver
</code>
<img src="../pics/runserver.png" alt="サーバの起動 runserver" />
この状態で「http://127.0.0.1:8000」にアクセスして下さい。<br />以下のページが表示されると思います。
<img src="../pics/django-run.png" alt="サーバ動作画面" />
この状態ではルーティングを何も設定していないため、「http://127.0.0.1:8000/」以降のパスはadminを除いて考慮しません。<br />デフォルトではadminルーティングが設定されているため、これにアクセスしてみましょう♪<br />「http://127.0.0.1:8000/admin」へアクセスしてみましょう♪<br />以下の画面が表示されます。
<img src="../pics/admin-表示画面.png" alt="admin ルーティング" />
これ以降は「admin」以外のパスに対して適切なルーティングをするための設定を行います。
<h2>urls.py(proj)</h2>
プロジェクトのurls.pyの中は以下のようになっています。
<code class="python">
	from django.contrib import admin
	from django.urls import path, include

	urlpatterns = [
		path('admin/', admin.site.urls),
	]
</code>
この中のurlpatterns配列を変更します。<br />第一引数に指定した文字列にurlがマッチした場合に第二引数で指定した処理が実行されます。<br />デフォルトでは第一引数として「admin/」が設定され、これにマッチしたurl(https://koko-campus.org/admin/～～～)を受け取った際には第二引数の処理を実行します。<br />これは管理サイト用のルーティングです。<br /><br />通常はあるパターンにマッチした場合はその処理を当該アプリケーションのurls.pyに委譲します。<br />この場合にはurlpatterns配列に以下の要素を追加します。
<code class="python">
	path("パターン名", include("パターン名.urls"))
</code>
ここでは、「app1」アプリケーションを想定するため、これを追加します。
<code class="python">
	from django.contrib import admin
	from django.urls import path, include

	urlpatterns = [
		path('admin/', admin.site.urls),
		path("app1/", include("app1.urls")),
	]
</code>
<h2>urls.py(app)</h2>
アプリケーション用のurls.pyは自動で生成されないため、自分で作成する必要があります。<br />以下のように記述します。
<code class="python">
	from django.urls import path
	from . import views

	urlpatterns = [
		path("", views.Index.as_view(), name="index"),
		path("sec1/", views.view1.as_view(), name="view1"),
		path("sec2/", views.view2.as_view(), name="view2"),
		path("sec3/", views.view3.as_view(), name="view3"),
	]
</code>
第一引数ではパターン文字列を指定し、第二引数では使用するビューを指定します。<br />指定するビューは以下のように記述します。
<code class="python">
	# 関数ベースのビュー
	ビュー名.views
	
	# クラスベースのビュー
	views.ビュー名.as_view()
</code>
<p>ビューについては後ほど詳しく説明します。<br />ユーザインターフェースを定義する部分だと思ってください。</p>
第三引数はルーティング名を指定します。<br />ルーティング設定からurlを生成する際に使用します。<br />第三引数は省略することもできます。
<h2>パスコンバータ</h2>
今までの単純なパターンマッチングではurlのパス名をピンポイントで指定する必要がありましたが、パスコンバータを使用することで数字た文字列などのざっくりとしたパスを指定することもできます。<br />パスコンバータとしては以下のものが使用可能です。
<table>
	<caption>パスコンバータ</caption>
	<tbody>
		<tr>
			<th>str</th>
			<td>空文字と「/(スラッシュ)」を除く文字列を意味します。</td>
		</tr>
		<tr>
			<th>path</th>
			<td>空文字を除く文字列を意味します。<br />strと異なり「/(スラッシュ)」を含むことに注意してください。</td>
		</tr>
		<tr>
			<th>int</th>
			<td>数字(0と正の整数)を意味します。</td>
		</tr>
		<tr>
			<th>slug</th>
			<td>半角英数字と「-(ハイフン)」と「_(アンダースコア)」だけで構成された文字列を意味します。</td>
		</tr>
	</tbody>
</table>
<h3>パスコンバータの使用</h3>
パスコンバータをパターンマッチングで使用するには以下のように書きます。
<code class="python">
	path("&lt;パスコンバータ:変数名&gt;/", views.ビュー名.as_view(), name="ルーティング名")
</code>
変数名にはマッチした部分を格納するために使用します。<br />格納したデータは後ほど説明するdjango内での処理で用います。
<?php footer(); ?>