<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-04",
	"updated" => "2022-01-04"
);
head($obj);
?>
<h2>構造体</h2>
構造体とは複数の変数をひとつにまとめたものです。<br />例えば、ポケモンに関するデータとして、「図鑑番号」「名前」「タイプ」がありますね♪<br />これに関する変数をひとつずつ定義するには困難ですよね、、、<br />例えばチコリータとヒノアラシとワニノコに関する変数を作成してみましょう♪
<code class="c">
	int no_chikorita = 152;
	char name_chikorita[] = "チコリータ";
	char type_chikorita[] = "くさ";
	int no_hinoarashi = 155;
	char name_hinosrashi[] = "ヒノアラシ";
	char type_hinosrashi[] = "ほのお";
	int no_waninoko = 158;
	char name_waninoko[] = "ワニノコ";
	char type_waninoko[] = "みず";
</code>
共通する部分をひとつにまとめたものが構造体です。<br />構造体を構成する各要素はメンバと呼ばれます。
<h2>構造体の定義</h2>
構造体は以下のように定義します。
<code class="c">
	struct 構造体名 {
		データ型 メンバ名;
		データ型 メンバ名;
		データ型 メンバ名;
	};
</code>
では、実際にポケモン用の構造体を定義してみましょう♪
<code class="c">
	struct pokemon {
		int no;
		char name[11]; /*(5 × 2 + 1)ポケモンの名前は最大で5文字で全角(× 2)、さらにnull文字分を加えて(+ 1)*/
		char type[11]; /*タイプも最大5文字*/
	};
</code>
<h2>構造体インスタンスの生成</h2>
定義した構造体から実際に特定のポケモンのデータを指定して作成されたデータを構造体インスタンスと呼びます。<br />構造体インスタンスは以下のように作成します。
<code class="c">
	struct 構造体名 変数 = {
		一つ目のメンバ用のデータ,
		二つ目のメンバ用のデータ,
		三つ目のメンバ用のデータ
	};
</code>
ではチコリータ・ヒノアラシ・ワニノコの構造体インスタンスを実際に生成してみましょう♪
<code class="c">
	struct pokemon chikorita = {
		152,
		"チコリータ",
		"くさ"
	};
	struct pokemon hinosrashi = {
		155,
		"ヒノアラシ",
		"ほのお"
	};
	struct pokemon waninoko = {
		158,
		"ワニノコ",
		"みず"
	};
</code>
<h2>ドット演算子</h2>
ドット演算子は生成された構造体のメンバへアクセスするための記法です。<br />以下のように書きます。
<code class="c">
	構造体.メンバ
</code>
では先ほど作成したチコリータ構造体インスタンスのメンバにアクセスしてみましょう♪
<code class="c">
	struct pokemon {
		int no;
		char name[11]; /*(5 × 2 + 1)ポケモンの名前は最大で5文字で全角(× 2)、さらにnull文字分を加えて(+ 1)*/
		char type[11]; /*タイプも最大5文字*/
	};
	int main() {
		struct pokemon chikorita = {
			152,
			"チコリータ",
			"くさ"
		};
		printf("%d\n", chikorita.no);
		printf("%s\n", chikorita.name);
		printf("%s\n", chikorita.type);
		return 0;
	}
	/* &darr; コンソール &darr;
	152
	チコリータ
	くさ
	*/
</code>
おめでとうございます!!<br />チコリータがベイリーフに進化しました♪<br />ということで、チコリータ構造体インスタンスも変更しましょう♪<br />タイプは「くさ」のままですので、「図鑑番号」と「名前」を変更します。<br />数字は簡単に変更できると思いますが文字列はポインタを理解できてないと、難しいかもしれません、、、<br />何度も説明した通り、文字列はc言語では文字型の配列であり、配列はそれ自体を変更できませんので、ポインタを用いてエイリアスを作成して、その指定先を変更する必要があります。
<code class="c">
	struct pokemon {
		int no;
		char *name; /*ポインタによって文字列を作成*/
		char type[11];
	};
	int main() {
		struct pokemon chikorita = {
			152,
			"チコリータ",
			"くさ"
		};
		chikorita.no += 1; /*図鑑番号に「1」を加算*/
		chikorita.name = "ベイリーフ"; /*名前はベイリーフに*/
		printf("%d\n", chikorita.no);
		printf("%s\n", chikorita.name);
		printf("%s\n", chikorita.type);
		return 0;
	};
	/* &darr; コンソール &darr;
	153
	ベイリーフ
	くさ
	*/
</code>
「chikorita.no += 1;」は「chikorita.no = chikorita.no + 1;」の省略記法です。<br />理解できましたか???
<h2>アロー演算子</h2>
ポケモンの構造体インスタンスを生成して、そのメンバを変更することまで行いました。<br />次は構造体インスタンスの変更を関数で実行しましょう♪<br />引数として渡されたデータを変更しても元のデータには影響を及ぼさないことは既に学習済みですね♪<br />したがって引数として渡したデータそのものを変更する場合には、関数の引数はポインタである必要があり、関数内ではそのポインタが指定するデータを変更する必要があります。<br />では受け取った構造体インスタンスの中身を全てピカチュウに書き換える関数を作成してみましょう♪
<code class="c">
	struct pokemon {
		int no;
		char *name;
		char *type;
	};
	void pikachu(struct pokemon *p) { /*引数の受取りはポインタで*/
		(*p).no = 25;
		(*p).name = "ピカチュウ";
		(*p).type = "でんき";
	}
	int main() {
		struct pokemon chikorita = {
			152,
			"チコリータ",
			"くさ"
		};
		pikachu(&chikorita); /*引数はポインタで渡す*/
		printf("%d\n", chikorita.no);
		printf("%s\n", chikorita.name);
		printf("%s\n", chikorita.type);
		return 0;
	};
	/* &darr; コンソール &darr;
	25
	ピカチュウ
	でんき
	*/
</code>
上のコードで「(*p).no = 25」を「*p.no = 25」と書いてはいけません。<br />理由は「.(ドット)」演算子の優先順位は「*(間接)」演算子よりも高いため、「*(p.no) = 25」となってしまうからです。<br />ですけど、これをいちいち書くのは大変ですよね、、、<br />そこで利用するのが「-&gt;演算子」です。<br />「-&gt;」が矢(アロー)の形に似ているため、アロー演算子と呼ばれます。<br />先ほどのコードをアロー演算子を用いて簡単に書いてみましょう♪
<code class="c">
	struct pokemon {
		int no;
		char *name; /*変更する可能性のある文字列だからポインタで!!*/
		char *type; /*変更する可能性のある文字列だからポインタで!!*/
	};
	void pikachu(struct pokemon *p) {
		p-&gt;no = 25;
		p-&gt;name = "ピカチュウ";
		p-&gt;type = "でんき";
	}
	int main() {
		struct pokemon chikorita = {
			152,
			"チコリータ",
			"くさ"
		};
		pikachu(&chikorita);
		printf("%d\n", chikorita.no);
		printf("%s\n", chikorita.name);
		printf("%s\n", chikorita.type);
		return 0;
	};
	/* &darr; コンソール &darr;
	25
	ピカチュウ
	でんき
	*/
</code>
こっちの方が簡単で見やすいですね♪
<h2>構造体の型</h2>
列挙体と同様の問題を出しますね♪<br />是非とも正解してもらいたい問題です。<br />以下で定義されている構造体のデータ型は何でしょう???
<code class="c">
	struct pokemon {
		int no;
		char name[11];
		char type[11];
	};
</code>
<ol class="x">
	<li>struct型</li>
	<li>pokemon型</li>
	<li>struct pokemon型</li>
</ol>
<br /><br /><br />
正解は「3」の「struct pokemon型」です。<br />これも長いですね、、、<br />typedef宣言をして簡単にしましょう♪
<h3>typedef宣言</h3>
以下のように書きます。<br />列挙体の時の説明と同じです。
<code class="c">
	typedef 書き換える型名 書き換え先の型名
</code>
では「struct pokemon」型をPOKEというデータ型に変更しましょう♪
<code class="c">
	typedef struct pokemon {
		int no;
		char name[11];
		char type[11];
	} POKE;
	int main() {
		POKE chikorita = {
			152,
			"チコリータ",
			"くさ"
		};
		printf("%d\n", chikorita.no);
		printf("%s\n", chikorita.name);
		printf("%s\n", chikorita.type);
		return 0;
	};
	/* &darr; コンソール &darr;
	152
	チコリータ
	くさ
	*/
</code>
<?php footer(); ?>