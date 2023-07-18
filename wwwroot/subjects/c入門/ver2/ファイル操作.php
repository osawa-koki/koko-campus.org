<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-04",
	"updated" => "2022-01-04"
);
head($obj);
?>
<h2>ファイル操作</h2>
ファイル操作は以下の3つの手順で行います。
<img src="../pics/ファイル操作.png" alt="ファイル操作の手順" />
<h2>ファイルのオープン</h2>
ファイルを開くためには以下のように記述します。
<code class="c">
	FILE *fp;
	fp = fopen("ファイルへのパス", "モード");
</code>
「FILE *fp」でファイルを操作するために使用するファイルストリームへのポインタを保存する変数を宣言します。<br />fopen関数の戻り値として、「fp」変数にはファイルストリームを指すポインタが格納されます。<br />これを用いてファイルの操作・ファイルのクローズを行います。<br />第一引数には操作対象のファイルへのパスを、第二引数にはファイルの操作モードを指定します。
<table>
	<caption>ファイル操作モード</caption>
	<tbody>
		<tr>
			<th>r</th>
			<td>テキストファイルの読み込みモードです。</td>
		</tr>
		<tr>
			<th>w</th>
			<td>テキストファイルの書き込みモードです。<br />新たに書込みをした場合は前に存在したファイルの内容は全て削除されます。</td>
		</tr>
		<tr>
			<th>a</th>
			<td>テキストファイルの追記モードです。<br />今ある内容に追記します。</td>
		</tr>
		<tr>
			<th>rb</th>
			<td>バイナリファイルの読み込みモードです。</td>
		</tr>
		<tr>
			<th>wb</th>
			<td>バイナリファイルの書き込みモードです。</td>
		</tr>
		<tr>
			<th>ab</th>
			<td>バイナリファイルの追記モードです。</td>
		</tr>
	</tbody>
</table>
「"r + w"」のように「+」を用いて複数のモードを使用することもできます。<br /><br />「指定したファイルへのパスにファイルが存在しなかった場合はfpには「NULL」が格納されます。
<h2>ファイルのクローズ</h2>
以下のコードを実行します。
<code class="c">
	fclose(fp);
</code>
ファイルを開いたら、忘れずにファイルを閉じるようにして下さい。<br />ファイルのオープンとファイルのクローズの2つを利用してファイルが存在すかどうかを判定するプログラムを作ってみましょう♪
<code class="c">
	int main(void) {
		char f[10];
		FILE *fp;
		scanf("%s", f);
		fp = fopen(f, "r");
		if (fp != NULL) {
			puts("ファイルが存在します。");
			fclose(fp);
		} else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
scanf関数は危険であるため、scanf_s関数を使用するように警告された場合は以下のコードを実行してください。
<code class="c">
	int main(void) {
		char f[10];
		FILE *fp;
		scanf_s("%s", &f, 10);
		fopen_s(&fp, f, "r");
		if (fp != NULL) {
			puts("ファイルが存在します。");
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
<img src="../pics/file-exist.gif" alt="file存在判定プログラム" />
<h2>ファイルの読み込み</h2>
では今度は開いたファイルの中身を読み込んでコンソール画面に出力してみましょう♪<br />ファイルストリームからデータを取得するにはscanf関数を使用します。
<code class="c">
	fscanf(fp, "書式化文字列", 引数1, 引数2, ...);
</code>
scanf関数の先頭の引数にファイルストリームを追加しただけです。<br />fscanf関数は戻り値として読み取った項目の数を返すのでこれを用いてファイルの内容を全て読み取ります。<br /><br />では以下のファイルを読み取ってコンソール画面に表示してみましょう♪
<code class="file-dot-txt">
	おはよう
	今日も
	良い天気だね♪
</code>
<code class="c">
	int main(void) {
		char name[50];
		FILE *fp;
		fp = fopen_s("file.txt", "r");
		if (fp != NULL) {
			while (fscanf(fp, "%s", name) == 1) {
				printf("%s\n", name);
			}
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
fscanf関数の使用が推奨されていない環境では以下のコードになります。
<code class="c">
	int main(void) {
		char name[50];
		FILE* fp;
		fopen_s(&fp, "file.txt", "r");
		if (fp != NULL) {
			while (fscanf_s(fp, "%s", name, 50) == 1) {
				printf("%s\n", name);
			}
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
<img src="../pics/fscanf.gif" alt="fscanf関数" />
僕はシェルで実行しているのでコンソール画面の文字コードの指定が可能なのですが、IDE(visual stusio等)で実行する場合は文字コードが正しく設定できていない場合があるので、極力半角英数字を使用してください。
<p class="r">シェル起動時のコマンドライン引数を設定する方法もあるのですが、ここでは割愛!!</p>
<h2>ファイルへの書き込み</h2>
では、今度はファイルへ書き込んでみましょう♪<br />fprintf関数を使用します。<br />print関数の先頭の引数にファイルストリームを追加しただけです。
<code class="c">
	fprintf(fp, "書式化文字列", 引数1, 引数2, ...);
</code>
では今度はコンソール画面に入力したテキストをファイルに保存するプログラムを作成しましょう♪
<code class="c">
	int main(void) {
		char txt[50];
		FILE *fp;
		fp = fopen("file.txt", "w");
		if (fp != NULL) {
			scanf("%s", txt); /*コンソール画面から入力を受け取って*/
			fprintf(fp, "%s", txt); /*ファイルに書き込む*/
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
scanf関数の使用が推奨されていない環境では以下のコードになります。
<code class="c">
	int main(void) {
		char txt[50];
		FILE *fp;
		fopen_s(&fp, "file.txt", "w");
		if (fp != NULL) {
			scanf_s("%s", txt, 50); /*コンソール画面から入力を受け取って*/
			fprintf(fp, "%s", txt); /*ファイルに書き込む*/
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
<img src="../pics/fprintf(w).gif" alt="fprintf関数" />
「type ファイル名」はファイルの中身を表示するwindowsシェル(コマンドプロンプト)用のコマンドです。<br />linuxでいうcatコマンドです。
<h2>ファイルへの追記</h2>
先ほどは「w」モードでファイルへ書き込んだため、元のデータを新しいデータで上書しましたね♪<br />今度は元のファイルに追記するプログラムを作成しましょう♪<br />といっても「w」を「a」に替えるだけです。
<code class="c">
	int main(void) {
		char txt[50];
		FILE *fp;
		fp = fopen("file.txt", "a");
		if (fp != NULL) {
			scanf("%s", txt); /*コンソール画面から入力を受け取って*/
			fprintf(fp, "%s", txt); /*ファイルに書き込む*/
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
scanf関数の使用が推奨されていない環境では以下のコードになります。
<code class="c">
	int main(void) {
		char txt[50];
		FILE *fp;
		fopen_s(&fp, "file.txt", "a");
		if (fp != NULL) {
			scanf_s("%s", txt, 50); /*コンソール画面から入力を受け取って*/
			fprintf(fp, "%s", txt); /*ファイルに書き込む*/
			fclose(fp);
		}
		else {
			puts("ファイルが存在しません。");
		}
		return 0;
	}
</code>
<img src="../pics/fprintf(a).gif" alt="fprintf関数" />
<div class="separator"></div>
お疲れさまでした。<br />「c言語入門-ver2」は以上です。<br />中級編を完成させたら今度はもっと面白くゲーム感覚で学べるようにver3を作成しようと考えています。<br />既に学習が完了した皆さんには不要だと思いますけど、、、<br /><br />とにかく、お疲れ様でした!!<br />次は「c言語中級」もしくは「rust入門」へ進んでみてはいかがでしょうか???
<div class="subjects-container">
	<a href="../../c言語中級/branch" class="link-subject to-c言語中級"></a>
	<a href="../../rust入門/branch" class="link-subject to-rust入門"></a>
</div>
<?php footer(); ?>