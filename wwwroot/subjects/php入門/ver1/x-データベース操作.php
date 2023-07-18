<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-26",
	"updated" => "2021-11-26"
);
head($obj);
?>
<h2>sql</h2>
sqlとは「structed query language」の略で、構造化問合せ言語と訳されます。<br />データベースを操作するための言語です。<br /><br />webシステムにおいて特に重要なデータを管理する際には、効率化・セキュリティの観点から通常のファイルではなくてデータベースを利用することが推奨されます。<br /><br />ここではデータベースをphpで操作するための方法について学びましょう♪
<h2>RDBMS</h2>
「relational database maangement system」の略で、実際にデータベースを操作してくれるプログラムを指します。<br /><br />データベース操作に関しては一般にphpプログラムで直接データベースを操作することはせずに、phpプログラムがRDBMSへsqlと言われる命令文を出してそれを受け取ったRDBMSが代わりにデータベースを操作します。<br /><br />RDBMSには以下の種類があります。
<br />
<ul>
	<li>MySQL</li>
	<li>MariaDB</li>
	<li>PostgreSQL</li>
	<li>SQLite</li>
</ul>
<br />
ほとんどのRDBMSはANSIやISOによって標準化されていため処理は同じですが、種類によっては少し記述方法が異なる場合があります。<br /><br />ここでは、phpにおいて最も一般的に使用される「MySQL」を用いて説明します。
<h2>データベースの仕組み</h2>
データベースはひとつのシステムにつき原則ひとつだけ作成して、その下に複数のテーブルを作成します。
<img class="n" src="../pics/データベース.png" alt="データベースの画像" />
ひとつのテーブルはエクセルのように行(レコード)と列(カラム・フィールド)を持ちます。
<table id="detabase" border="1" class="x">
	<thead>
		<tr>
			<td>id</td>
			<td>name</td>
			<td>pw</td>
			<td>last_login</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>id0123</td>
			<td>koko</td>
			<td>pw1234</td>
			<td>2021-10-25</td>
		</tr>
		<tr>
			<td>id1234</td>
			<td>mr koko</td>
			<td>p@ssw0rd</td>
			<td>2021-10-31</td>
		</tr>
		<tr>
			<td>id0120</td>
			<td>mrs koko</td>
			<td>qwert</td>
			<td>2021-11-25</td>
		</tr>
	</tbody>
</table>
横のラインが「行(レコード)」で、縦のラインが「列(カラム・フィールド)」です。
<h2>MySQLの設定</h2>
では、今度はデータベースの設定に入りましょう♪<br /><br />xamppの画面から「mysql」のstartボタンを押して下さい。
<img src="../pics/xampp.png" alt="xamppの画像" />
次に「<a href="http://localhost" target="_blank">http://localhost</a>」にアクセスしてください。<br />以下の画面が表示されますので、右上の「phpMyAdmin」をクリックしてください。
<img class="n" src="../pics/phpMyAdmin.png" alt="phpMyAdminの画像" />
これがデータベースを管理する画面です。<br />ではまず肝心なデータベースを作成しましょう♪<br />データベースの画面に移ってください。
<img class="n" src="../pics/phpMyAdmin-データベース.png" alt="phpMyAdminのデータベースの画面" />
こんな感じの画面に遷移すると思います。
<img class="n" src="../pics/phpMyAdmin-データベース-charset.png" alt="phpMyAdminのデータベース(文字コード指定)の画面" />
この画面ではデータベースの名前と文字コードを設定します。<br />ここでは「koko_project」に設定しました。<br />原則として半角の英数字を指定してください。<br />また「-(ハイフン)」を使用するとその後のエスケープ処理が必要となるため極力避けてください。<br />代わりに「_(アンダースコア)」を使用してください。<br /><br />文字コードでは「utf8_general_ci」ないしは「utf8_unicode_ci」を指定してください。<br /><br />両者の違いは、「utf8_general_ci」が半角と全角の区別するのに対して、「utf8_unicode_ci」は半角と全角の違いを区別しません。<br /><br />ユーザが半角と全角を混同するリスクも考えると「utf8_unicode_ci」を使用するべきだとkokoは思います。<br /><br />ユーザの入力時に全角チェックを入れればokな話ですが、、、<br /><br />では「作成」ボタンを押してテーブルの作成画面へ移りましょう♪
<img class="n" src="../pics/phpMyAdmin-テーブル作成.png" alt="phpMyAdminのテーブル作成の画面" />
テーブル名ではその名の通りテーブル名を命名してください。<br />テーブル名はsql文で毎回記述するため、その実体を表すできるだけ短い文字列をオススメします。<br />ここでは会員情報を登録することを想定して「member」というテーブルを作成します。<br /><br />データベース名同様に、半角英数字を使用して「-(ハイフン)」の使用は避けてください。<br /><br />カラム数ではデータの属性の数を指定します。<br /><br />後からでも容易に追加可能ですのでここではデフォルトの「4」とします。<br /><br />次にカラムデータを登録しましょう♪
<img class="n" src="../pics/phpMyAdmin-カラムデータ登録.png" alt="phpMyAdminのカラムデータ登録の画面" />
ここではカラムにどのようなデータが入るのかを設定します。
<br />
具体的には以下の内容を設定します。
<br />
<ul>
	<li>名前</li>
	<li>タイプ</li>
	<li>長さ/値</li>
	<li>デフォルト値</li>
	<li>照合順序</li>
	<li>属性</li>
	<li>null</li>
	<li>インデックス</li>
	<li>AI</li>
</ul>
<h4>名前</h4>
カラムを指定する際に使用します。<br />よく使用するため極力短く設定することをオススメします。
<h4>タイプ</h4>
データの型を指定します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>INT</th>
			<td>整数型です。<br />小数以外の数値データではこれを使用してください。</td>
		</tr>
		<tr>
			<th>DOUBLE</th>
			<td>倍制度浮動小数点型です。<br />小数データはこちらを使用してください。</td>
		</tr>
		<tr>
			<th>VARCHAR</th>
			<td>可変長文字列で、テキストデータではこちらを使用して下さい。<br />似たような型に「TEXT」がありますが、DBMSによっては制約がある場合があるので還俗こちらを使用することをオススメします。</td>
		</tr>
		<tr>
			<th>DATE</th>
			<td>日付型です。<br />時間も扱う場合には以下の「DATETIME」型を使用してください。</td>
		</tr>
		<tr>
			<th>DATETIME</th>
			<td>日付時間型です。<br />日付 + 時間のデータです。</td>
		</tr>
		<tr>
			<th>JSON</th>
			<td>json(連想配列っぽいデータ)を格納します。<br />僕はJSON型なんてあるのを知らないで、VARCHAR型で無理やり保存していました。</td>
		</tr>
	</tbody>
</table>
<h4>長さ/値</h4>
データの長さを設定します。<br />上限は以下に記載します。<br /><small>近似値です。</small>
<br /><br />
<table>
	<tbody>
		<tr>
			<th>INT</th>
			<td>-20億から20億が上限です。</td>
		</tr>
		<tr>
			<th>FLOAT</th>
			<td>有効桁15桁で、指数範囲は「E±308」。</td>
		</tr>
		<tr>
			<th>VARCHAR</th>
			<td>65,535が上限です。</td>
		</tr>
		<tr>
			<th>DATE</th>
			<td>「1000-01-01」から「9999-12-31」。</td>
		</tr>
		<tr>
			<th>DATETIME</th>
			<td>「1000-01-01 00:00:00」から「9999-12-31 23:59:59」。</td>
		</tr>
		<tr>
			<th>JSON</th>
			<td>厳密な上限は設定されていません。<br />mysqlの公式サイトでは「JSON ドキュメントの格納に必要な領域は、LONGBLOB または LONGTEXT の場合とほぼ同じです。」とされているため、一般的には「2GB」程度でしょうか?<br /><small>※引用元は<a href="https://dev.mysql.com/doc/refman/8.0/ja/json.html">こちら</a>。</small></td>
		</tr>
	</tbody>
</table>
<h4>デフォルト値</h4>
レコード作成時にデータが挿入されなかった場合に設定されます。<br />通常では、「なし」となっていますが、データが格納されていないことを明確にするために「NULL」に設定しておくことをオススメします。
<h4>照合順序</h4>
「1 < 5」や「3 < 7」や「5 === 5」は理解できると思いますが、この比較演算は実は文字にも適用できるんです。<br /><br />「あ < ア」や「あ < 亜」などの定義です。<br />特に大切なのは「a === A」(大文字小文字の区別)と「ｱ === ア」(半角全角の区別)ですが、最初のうちは特に設定する必要はありません。
<h4>属性</h4>
僕は設定したことはありません。<br />省略します。
<h4>非ナル制約</h4>
ナルを許すかどうかです。<br />許しましょう♪(空白でok!)
<h4>インデックス</h4>
大量のデータから効率的にデータを検索するため使用されます。<br />「id」などのユニーク(重複がない)カラムに対して設定することでデータ処理が効率化されます。
<h4>AI</h4>
「Auto Increment」の略で、「1」から始まる連番を自動的に設定してくれます。
<h2>sqlの実行手順</h2>
では、いよいよphpからsqlを実行しましょう♪<br /><br />まずはコードを掲示しますね♪<br />データベースに会員情報を登録しています。
<br /><br />
<code class="php">
	$dsn = "mysql:dbname=koko_project;host=localhost;charset=utf8";
	$user = "root"; //ユーザ名をセット(デフォルトでは「root」です。)
	$pw = ""; //パスワードをセット(デフォルトでは「なし」です。)
	$dbh = new PDO($dsn, $user, $pw);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO member (id,pw) VALUES (?,?)"; //sqlインジェクションというハッキング対策のため入力データを組み合わせてsql文は作成しません
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array($id, $pw));

	$dbh = null;
</code>
<br />
コードの解説をしますね♪<br />sqlの実行は以下の3つの手順を踏みます。
<br />
<ol>
	<li>データベースに接続</li>
	<li>sql文の実行</li>
	<li>データベースから切断</li>
</ol>
<br />
<h3>データベースに接続</h3>
<code class="php">
	$dsn = "mysql:dbname=koko_project;host=localhost;charset=utf8";
	$user = "root"; //ユーザ名をセット(デフォルトでは「root」です。)
	$pw = ""; //パスワードをセット(デフォルトでは「なし」です。)
	$dbh = new PDO($dsn, $user, $pw);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
</code>
<br />
<p>1行目ではデータベースに関する情報を設定します。「dbname=」の部分にデータベースの名前を、「host=」の部分にデータベースサーバの名前を設定します。<br />ここでは、データベース名は各自で設定した名前を、データベースサーバ名は「localhost」を使用してください。</p>
<p>2行目ではユーザ名を設定します。<br />xamppのデフォルトでは「root」に設定されています。</p>
<p>3行目ではパスワードを設定します。<br />xamppのデフォルトでは設定されていないため、空文字列("")とします。</p>
<p>上記3つのデータを引数に渡してPDOというデータベースを操作するオブジェクトを作成して、$dbhという変数に代入します。</p>
<p>PDOが格納されている$dbhにデータベースを操作する際の指示をします。<br />ここでは、「PDO::ATTR_ERRMODE」(エラーレポート/エラーが発生した際の処理について)を「PDO::ATTR_ERRMODE_EXCEPTION」(例外処理を実行)を設定します。<br />簡単に言えばデータベースをうまく操作できなかった際には、良い感じにそれをキャッチしてユーザに伝えます。</p>
<h3>sql文の実行</h3>
<code class="php">
	$sql = "INSERT INTO member (id,pw) VALUES (?,?)"; //sqlインジェクションというハッキング対策のため入力データを組み合わせてsql文は作成しません
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array($id, $pw));
</code>
<br />
<strong>絶対に以下のコードのようにユーザの入力データから直接sql文を作成しないでください。</strong>
<code class="php">
	/*warning! 絶対にNG warning!*/
	$sql = "INSERT INTO member (id,pw) VALUES (". $_POST["id"]. ",". $_POST["pw"]. ")";
	/*warning! 絶対にNG warning!*/
</code>
<br />
ユーザがデータベースを不正に操作するコードを「id」や「パスワード」に設定した際に備えて、バインド機構(プリペアードステートメント)を使用します。<br />バインド機構(プリペアードステートメント)っていう名前はここでは覚えなくてok!です。<br /><br />とりあえず、ユーザの入力データから直接sql文を作成するのは絶対にng!とだけ覚えてください。
<p>1行目では上で説明した通り、sql文の模型を作成します。<br />ユーザの入力データを挿入する部分にはここでは「?」としておきます。</p>
<p>2行目ではPDOオブジェクトに対して上で作成したsql文の模型を引数にprepareメソッドを実行します。</p>
<p>最後に1行目の「?」で設定した部分にユーザの入力データを挿入します。<br />「?」の順番で配列を作成してそれを引数にPDOのexecuteメソッドそ実行します。<br />ここで引数として渡された配列内のデータは単純なデータとして扱われるため悪意あるコードを入力されてもデータベースは不正に操作されません。</p>
<br /><br />
ここでは、挿入用のsqlを取り扱いました。<br />次の授業ではこのsqlについてより詳細に扱います。
<h3>データベースから切断</h3>
<code class="php">
	$dbh = null;
</code>
最近のDBMSはデータベースから切断し忘れても一定の時間が経てば自動で切断してくれますが、データベースに接続してsql文を実行した後にはデータベースから切断することを忘れないでください。<br />
<?php footer(); ?>