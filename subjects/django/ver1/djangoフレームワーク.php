<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>django</h2>
djangoとはwebアプリケーション作成用のpythonフレームワークです。<br />他のフレームワークとしては「ruby on rails(ruby)」や「laravel(php)」などがありますが、pythonシェアが高まる傾向の中で、djangoフレームワークが採用されるケースも増えています。<br /><br />2005年にオープンソースとして公開されて以降、多くの企業・政府機関で採用されています。<br />代表的なところでは、youtubeやinstagramもdjangoフレームワークで開発されています。
<h2>APサーバとwebサーバ</h2>
一般的なwebサーバとAPサーバのつながりを説明します。webサーバはwebブラウザからリクエストを受けて、静的なページであればそのまま対象のファイルをレスポンスとして返します。<br />動的なページであれば、AP(アプリケーション)サーバへ処理を依頼します。<br />処理を受けたAPサーバは必要があればDB(データベース)サーバと通信をして、処理の結果をwebサーバへ返します。<br />APサーバから処理されたデータを受け取ったwebサーバは最終的にこのデータをレスポンスとしてwebブラウザに返却します。
<img src="../pics/webアプリ-構成.png" alt="webアプリ 構造" />
<h2>djangoのインストール</h2>
では、早速djangoをインストールしてみましょう♪<br />以下のコマンドでインストールします。
<code class="shell">
	pip install django
</code>
<img src="../pics/django-インストール.gif" alt="django インストール" />
インストールが正常にできたかは以下のコマンドで確認します。
<code class="shell">
	python -m django --version
</code>
<img src="../pics/django-インストール-確認.png" alt="django インストール 確認" />
バージョンが表示されればdjangoのインストールが完了しています。
<h2>djangoの構造</h2>
djangoはwebアプリケーション全体をプロジェクトと呼ばれる単位で管理します。<br />プロジェクトはその下に複数のひとつの機能を担当するアプリケーションを保有します。<br />また、複数のアプリケーションに関する設定を保持するプロジェクト設定ファイル群を持ちます。
<img src="../pics/djangoプロジェクト-構造.png" alt="django プロジェクト" />
<h2>プロジェクトの作成</h2>
プロジェクトは以下のコマンドで生成します。
<code class="shell">
	django-admin startproject プロジェクト名
</code>
ここでは、プロジェクト名を「proj1」として、djangoプロジェクトを生成してみましょう♪
<code class="shell">
	django-admin startproject proj1
</code>
カレントディレクトリに「proj1」という名前のディレクトリが生成されます。<br /><br />プロジェクト内には「manage.py」ファイルと「proj1」ディレクトリがあり、「proj1」ディレクトリ内には以下のファイルがあります。
<ul>
	<li>__init__.py</li>
	<li>asgi.py</li>
	<li>setting.py</li>
	<li>url.py</li>
	<li>wsgi.py</li>
</ul>
<img src="../pics/プロジェクト-ディレクトリ.gif" alt="django プロジェクト" />
<table>
	<tbody>
		<tr>
			<th>manage.py</th>
			<td>コマンドを実行するためのファイルです。<br />アプリケーションを作成する際にはこのpythonファイルを実行します。</td>
		</tr>
		<tr>
			<th>asgi.py</th>
			<td>webサーバとwebアプリケーション通信を管理するインターフェース定義の非同期バージョンです。</td>
		</tr>
		<tr>
			<th>setting.py</th>
			<td>プロジェクトの設定用のファイルです。</td>
		</tr>
		<tr>
			<th>urls.py</th>
			<td>プロジェクト用のルーティング定義ファイルです。</td>
		</tr>
		<tr>
			<th>wsgi.py</th>
			<td>デプロイ用のファイルです。<br />webサーバとAPサーバが通信するための、標準化されたインタフェース定義を記述します。</td>
		</tr>
	</tbody>
</table>
<h2>アプリケーションの作成</h2>
アプリケーションは以下のコマンドで作成します。<br />先ほど作成したプロジェクトディレクトリへ移動する必要があります。
<code class="shell">
	python manage.py startapp アプリケーション名
</code>
では、アプリケーション名を「app1」としてコマンドを実行してみましょう♪
<code class="python">
	python manage.py startapp app1
</code>
プロジェクトディレクトリ内に新たにアプリケーション名のディレクトリが生成され、その中には「migration」ディレクトリと以下のファイルが生成されます。
<ul>
	<li>__init__.py</li>
	<li>admin.py</li>
	<li>apps.py</li>
	<li>models.py</li>
	<li>tests.py</li>
	<li>views.py</li>
</ul>
また、「migration」ディレクトリ内には「__init__.py」ファイルが生成されています。
<img src="../pics/アプリケーション-ディレクトリ.gif" alt="django アプリケーション" />
<table>
	<tbody>
		<tr>
			<th>migration</th>
			<td>マイグレーションファイルを格納するためのディレクトリです。</td>
		</tr>
		<tr>
			<th>__init__.py</th>
			<td>pythonファイルであることを示すファイルです。</td>
		</tr>
		<tr>
			<th>admin.py</th>
			<td>管理サイトの設定用のファイルです。</td>
		</tr>
		<tr>
			<th>apps.py</th>
			<td>アプリケーション構成設定ファイルです。</td>
		</tr>
		<tr>
			<th>models.py</th>
			<td>モデルを定義するファイルです。</td>
		</tr>
		<tr>
			<th>tests.py</th>
			<td>テストコードを記述するファイルです。</td>
		</tr>
		<tr>
			<th>views.py</th>
			<td>ビューを定義するファイルです。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>