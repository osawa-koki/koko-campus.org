<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-16",
	"updated" => "2022-02-16"
);
head($obj);
?>
<h2>azureへの登録</h2>
まずはazureアカウントを作成しましょう♪<br />30日間使用可能な22,500円相当のクレジットを受け取ることができます。<br />以下のリンクから登録をして下さい。<br />登録にはクレジットカードが必要です。
<a href="https://signup.azure.com" class="link to-azure">azure</a>
学生であれば「azure for students」へ登録してください。<br />クレジットカードが不要で、同じ内容のサービスを利用できます。
<a href="https://azure.microsoft.com/ja-jp/free/students" class="link to-azure">azure for students</a>
<h2>ポータルサイト</h2>
登録が完了したらマイページへログインしましょう♪<br />登録完了メールに添付されたurlから、または以下のリンクからアクセスしてください。
<a href="https://portal.azure.com" class="link to-azure">azure portal</a>
こんなページが表示されると思います。
<img class="no-max border" src="../pics/ポータルサイト.png" alt="ポータルサイト" />
このページをポータルサイトと呼び、この画面から仮想マシンの管理やデータベースの管理やリソースの監視などのazureに関する様々な処理を行います。
<img src="../pics/azure-portal.png" alt="azure portal" />
<h2>リソースの作成</h2>
では、実際にリソースを作成しましょう♪<br />作成するのは仮想マシンで、OSは無料で使用可能なlinuxのubuntuとします。<br />ここではあくまでもこんな感じで操作するんだな程度に覚えておいてください。<br />後ほど詳しく説明します。
<img class="no-max" src="../pics/リソースの作成.gif" alt="リソースの作成" />
確認が終了したら実際にリソースを作成します。<br />認証方法で鍵ペアを選択した場合は公開鍵と秘密鍵ペアが生成されますので、これを適当な場所に保存してください。
<img class="no-max" src="../pics/リソースの作成-確認.gif" alt="リソースの作成" />
<h2>ARM</h2>
「azure resources manager」の略で、azure上のリソースを管理するための機能です。<br />一般的にはデプロイ(プログラムを実際に使用できる環境に配置すること)時に自動で作成されます。<br />我々が操作するポータルサイトや後ほど説明する「azure powershell」からリソースを管理する際の仲介役としての役割を果たします。<br /><br /><a href="https://docs.microsoft.com/ja-jp/azure/azure-resource-manager/management/overview">azure 公式サイト</a>に分かりやすい画像があったので紹介します。
<img src="../pics/azure-resource-manager.png" alt="azure resource manager" />
<h2>azure powershell</h2>
先ほどはポータルサイトからリソースの操作をしましたね♪<br />次はコマンドライン(powershell)からazureリソースを管理しましょう♪
<img src="../pics/azure-powershell.png" alt="azure powershell" />
windowsでのコマンドラインはコマンドプロンプトとpowershellの2つがありますが、より高機能なpowershellをデフォルトとして使用します。<br />設定画面からpowershellをデフォルトのコンソールアプリに登録してください。
<img src="../pics/デフォルトシェルの設定.gif" alt="デフォルトコンソールアプリ" />
ここではwindows powershellのバージョンは「7」を想定しています。<br />アップグレードは簡単ですので、バージョン「7」未満の方はアップグレードしてから操作してください。<br /><br />powershellを起動したら「新しいタブ」から「azure cloud shell」を選択します。<br />後は指示通りです。<br />コードが表示されますので、それを指定されたurlへ飛んで入力してください。
<img src="../pics/azure-powershell_初期設定.gif" alt="azure powershell" />
コードを入力したら次回以降もこれを使用するか聞かれるので、「y」と入力します。
<p class="r">他人も使用する環境では、セキュリティの観点から「n」と答えてください。</p>
これで完了です。<br />次回以降は「azure cloud shell」を開いたら自動でログインできます。<br /><br />次回以降ログインする場合には最初にコンテナを選択します。<br />選択肢が表示されるのでそれ通りに入力して下さい。
<img src="../pics/azure-powershell_ログイン.gif" alt="azure powershell" />
<div class="separator"></div>
専用のコマンドから実行する方法もありますが、バージョン7からはより簡単に接続できるようになったので、ここでは深く説明しません。<br />上で説明した方法を用いればok!ですが、理由があってバージョン7が使用できない方はpowershellで以下のコマンドを実行してください。
<code class="powershell">
	Install-Module az
</code>
幾つかの設定が必要ですが、「y」と答えればok!です。<br />信頼できない環境では使用しないでください。<br /><br />ログインする際には以下のコマンドを実行します。
<code class="powershell">
	Connect-AzAcount
</code>
ブラウザが起動されますので、認証を完了させてください。<br />既定のブラウザが登録されていない場合は失敗します。<br />「設定 &gt; アプリ &gt; 既定のアプリ」からブラウザを登録してください。
<img src="../pics/既定のブラウザの登録.gif" alt="既定のブラウザ" />
これでazure powershellを使用できる環境が構築されました。<br />次回以降もこのログイン環境を保持したい場合には以下のコマンドを実行します。
<code class="powershell">
	Enable-AzContextAutosave
</code>
反対に、ログイン情報を自動保存したくない場合には以下のコマンドを実行します。<br />デフォルトではこれが採用されています。
<code class="powershell">
	Disable-AzContextAutosave
</code>
現在のログイン環境の自動保存の状況を確認するには以下のコマンドを実行します。
<code class="powershell">
	Get-AzContextAutosaveSetting
</code>
<h2>azure CLI</h2>
コマンドラインツールでazureを操作する方法もあります。<br />azure CLIと呼ばれます。
<img src="../pics/azure-cli.png" alt="azure CLI" />
主にunix・linux系で操作する場合に使用されます。<br />pythonインタプリタを使用します。<br /><br />unix・linuxに関する知識が必要となるため、ここでは省略します。
<h2>クラウドシェル</h2>
ポータルサイトからコマンドラインで操作する方法もあります。<br />詳細な処理はpowershell(CLI)で、簡単な処理はポータルサイト(GUI)で行うのが基本ですので、ほとんど使用しませんが、環境によってはこちらを使用することもあります。
<img src="../pics/クラウドシェル.gif" alt="クラウドシェル" />
<div class="separator"></div>
初回起動時には「Bash」か「PowerShell」の選択が求められます。
<img src="../pics/azure-cloudshell-bash_powershell.png" alt="azure クラウドシェル" />
<table>
	<thead>
		<tr>
			<th width="50%">Bash</th>
			<th width="50%">PowerShell</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>azure CLIを使用する場合はこちらを選択します。<br />Bashとはlinuxで動作するシェルのことで、linuxで操作する場合と同じ環境で操作します。</td>
			<td>azure powershellを使用する場合はこちらを選択します。<br />powershellはwindowsで動作するシェルですので、windowsで操作する場合と同じ環境で操作します。</td>
		</tr>
	</tbody>
</table>
また、この方法は若干の費用がかかりますが、価格も高くないほか、無料試用版も存在します。<br />料金表は<a href="https://azure.microsoft.com/ja-jp/pricing/details/storage/files/">こちら</a>。<br />次にストレージのリージョンを選択します。<br />デフォルトの東南アジアでok!です。<br /><br />クラウドシェルの左上のボタンから「Bash」と「PowerShell」を切り替えることができます。
<img src="../pics/クラウドシェル-切り替え.gif" alt="azure クラウドシェル" />
<?php footer(); ?>