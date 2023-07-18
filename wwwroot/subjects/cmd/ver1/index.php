<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>cmd</h2>
windows上でのシェルです。<br />linuxではシェル、macOSではターミナルと呼ばれます。<br /><br />なんか、ハッカーが黒い画面にカチカチ打ち込んでるイメージのアレです。
<img src="../pics/cmd.gif" alt="cmd" />
windowsはGUIを特徴としていますが、CUIもマスターできれば業務の効率化は間違いなしです。<br />是非マスターしましょう♪<br /><br />それでは、Let's dance!!!
<h2>環境構築</h2>
cmdを実行するのに環境構築なんて必要ありません。<br />スタートメニューから「cmd」と検索して、コマンドプロンプトを起動してください。<br /><br />開いたら、試しに以下のコマンドを実行してみて下さい。
<code class="cmd">
	whoami
</code>
<img src="../pics/whoami.gif" alt="whoami" />
コンピュータ名とユーザ名が表示されると思います。<br />こんな感じでコマンドを実行します。<br />では、もうひとつ、以下のコマンドを実行してください。
<code class="cmd">
	netstat -a
</code>
現在のネットワーク環境を表示します。
<h2>コマンドの構造</h2>
では、先ほど実行したコマンドの構造を簡単に説明します。
















<?php footer(); ?>