<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-04",
	"updated" => "2022-01-04"
);
head($obj);
?>
<h2>列挙体</h2>
配列に似ているような、配列とは異なるような、、、<br />列挙体はそんなデータ型です。<br />配列とは逆に列挙体の各要素(メンバ)に対して識別子を振ることで列挙体の各要素(メンバ)を管理します。<br />インデックス番号から要素名を指定するのではなくて、要素名からインデックス番号を指定します。
<p class="r">正確には列挙体ではインデックス番号と呼びません、、、</p>
例えば、月を考えてください。<br />一月がJanuary、二月がFebruary、三月がMarch、、、と続きますね♪<br />これを「January =&gt; 1」の順番で管理します。<br />配列は逆ですね♪<br /><br />さらに、列挙体ではインデックス番号を「0」から連番ではなくてある程度自由に設定できます。
<h2>列挙体の定義</h2>
列挙体は以下のように定義します。
<code class="c">
	enum 列挙体タグ {
		列挙定数1,
		列挙定数2,
		列挙定数3
	};
</code>
enumの定義も文ですので最後に「;(セミコロン)」を付けます。<br />例えば、月に関する列挙体は以下のように定義します。
<code class="c">
	enum Month {
		January,
		February,
		March,
		April,
		May,
		June,
		July,
		August,
		September,
		October,
		November,
		December
	};
</code>
「enum」は「enumeration」の略で「イニューム」と発音します。
<p class="r">たまに「イーナム」と発音している人も見かけます。<br />そっとしておいてあげて下さい。</p>
<h2>列挙体のインスタンスの生成</h2>
インスタンスとは定義された列挙体(模型)から中のデータを指定して作成されたデータを言います。<br />以下のように記述します。
<code class="c">
	enum 列挙体タグ 変数;
	変数 = メンバ名;
</code>
<img src="../pics/enum.png" alt="enum型" />
例えば僕は誕生日が10月25日なので僕の誕生月変数を作成してみましょう♪
<code class="c">
	int main() {
		enum Month koko_birthmonth;
		koko_birthmonth = October;
		printf("%i", koko_birthmonth);
		return 0;
	}
	/* &darr; コンソール &darr;
	9
	*/
</code>
番号は「0」から割り振られてしまうので、現実のものと異なってしまいますね、、、<br />ということで、これを修正しましょう♪<br />列挙体の定義の際に「メンバ = 整数」とすることでそのメンバが該当する数字を指定できます。<br />整数を指定した場合、それ以降のメンバには指定した数字以降の整数が割り振られます。<br />月は「1」から始めたいので先ほどの「enum month」列挙体を定義しなおしましょう♪
<code class="c">
	enum Month {
		January = 1,
		February,
		March,
		April,
		May,
		June,
		July,
		August,
		September,
		October,
		November,
		December
	};
	int main() {
		enum Month koko_birthmonth;
		koko_birthmonth = October;
		printf("%i", koko_birthmonth);
		return 0;
	}
	/* &darr; コンソール &darr;
	10
	*/
</code>
途中から連番を変更することもできます。
<code class="c">
	enum Month {
		January = 1,
		February,
		March,
		April,
		May,
		June,
		July,
		August,
		September,
		October,
		November,
		December
	};
	int main() {
		enum Month koko_birthmonth;
		koko_birthmonth = October;
		printf("%i", koko_birthmonth);
		return 0;
	}
	/* &darr; コンソール &darr;
	10002
	*/
</code>
<h2>列挙体の型</h2>
質問です。<br />以下のコードで定義されている列挙体のデータ型は何でしょうか???
<code class="c">
	enum Month {
		January = 1,
		February,
		March,
		April,
		May,
		June,
		July,
		August,
		September,
		October,
		November,
		December
	};
</code>
<ol class="x">
	<li>enum型</li>
	<li>Month型</li>
	<li>enum Month型</li>
</ol>
<br /><br /><br />
正解は「3」の「enum Month型」です。<br />したがって、ここから列挙体インスタンスを生成するには以下のコードのように「enum Month」と書く必要があります。
<p class="r">先ほどのコードです。</p>
<code class="c">
	enum Month koko_birthmonth;
</code>
いちいち「enum Month」って書くのは大変ですね、、、<br />ということで型に別名を付けましょう♪<br />「typedef」宣言で型に別名を付けることが可能です。
<h3>typedef宣言</h3>
typedef宣言は以下のように記述します。
<code class="c">
	typedef 書き換える型名 書き換え先の型名
</code>
これを用いて先ほどの「enum Month」型を「MONTH」型として定義しましょう♪
<code class="c">
	typedef enum Month {
		January = 1,
		February,
		March,
		April,
		May,
		June,
		July,
		August,
		September,
		October,
		November,
		December
	} MONTH;
</code>
複数行になっているので少し分かりにくいかもしれません。<br />これで「enum Month」型を「MONTH」型として定義することができました。<br />これ以降はインスタンスを生成する際には「MONTH」型とします。
<code class="c">
	typedef enum Month {
		January = 1,
		February,
		March,
		April,
		May,
		June,
		July,
		August,
		September,
		October,
		November,
		December
	} MONTH;
	int main() {
		MONTH koko_birthmonth; /*「MONTH」型として使用*/
		koko_birthmonth = October;
		printf("%i", koko_birthmonth);
		return 0;
	}
	/* &darr; コンソール &darr;
	10
	*/
</code>
<?php footer(); ?>