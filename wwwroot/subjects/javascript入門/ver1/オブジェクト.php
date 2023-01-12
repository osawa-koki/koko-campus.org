<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-15",
	"updated" => "2022-01-15"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>オブジェクト</h2>
既に学習済みですがもう一度説明しますね♪<br />オブジェクト(object)、直訳すると「モノ」です。<br />オブジェクトはひとつ、ないしは複数のプロパティ(値)とメソッド(関数)を保有します。
<img src="../pics/オブジェクト.png" alt="オブジェクト" />
う～～～ん、、、<br />分かりにくいですね、、、<br />それもそのはず、オブジェクト指向を開発した天才プログラマであるアラン・ケイはIT業界のノーベル賞とも呼ばれるチューリング賞を獲得しています。<br />そんな人が考案した技術はそう簡単に理解できませんよね、、、<br />オブジェクトについて説明する前に連想配列について説明します。
<h2>連想配列</h2>
配列の進化バージョンです。<br />配列が配列内の要素をインデックス番号で管理するのに対して、連想配列では独自に「キー」を設定して配列内の要素を管理します。
<img src="../pics/連想配列.png" alt="連想配列" />
<h2>連想配列の定義</h2>
連想配列は「{}(ブレース)」を用いて定義します。<br />連想配列の要素は「キー」と「バリュー」を「:(コロン)」で区切って、各要素は「,(カンマ)」で区切って表します。
<code class="javascript">
	let pika = {
		no: 25,
		name: "ピカチュウ",
		type1: "でんき",
		type2: null
	};
</code>
<p class="r">キーを「"(ダブルクォーテーション)」で囲むことで「-(ハイフン)」などの特殊文字を用いることができるようになりますが、原則として変数と同様の命名規則に従うべきです。</p>
連想配列内の各要素のアクセスするには2つの方法があります。
<ul>
	<li>[](ブレース)によるアクセス</li>
	<li>.(ドット)によるアクセス</li>
</ul>
<h3>[](ブレース)によるアクセス</h3>
配列と同じ方法です。
<code class="javacsript">
	let pika = {
		no: 25,
		name: "ピカチュウ",
		type1: "でんき",
		type2: null
	};
	console.log(pika["no"]);
	console.log(pika["name"]);
</code>
<img class="no-max" src="../pics/object要素へのアクセス(1).gif" alt="object型" />
<h3>.(ドット)によるアクセス</h3>
以下のように記述します。
<code class="javascript">
	連想配列.キー
</code>
この方法だとキーに変数で指定することができません。<br />連想配列では上の[](ブレース)によるアクセスを使用すればok!ですが、後ほど説明するオブジェクトで関数にアクセスする場合にはこの方法を用います。
<code class="javacsript">
	let pika = {
		no: 25,
		name: "ピカチュウ",
		type1: "でんき",
		type2: null
	};
	console.log(pika.no);
	console.log(pika.name);
</code>
<img class="no-max" src="../pics/object要素へのアクセス(2).gif" alt="object型" />
<div class="separator"></div>
以下のコードで連想配列の要素を削除することもできますが、連想配列という性質上ほとんど用いることはありません。
<code class="javascript">
	delete 連想配列["キー"];
</code>
<h2>連想配列の走査</h2>
連想配列を走査するには配列の走査同様に以下の2通りの方法があります。
<ul>
	<li>for</li>
	<li>forEach</li>
</ul>
<h3>for</h3>
配列の走査とは少し異なり、以下のようなコードになります。
<code class="javascript">
	for (let k in 連想配列) {
		//キーは「k」で取得
		//バリューは「連想配列[k]」で取得
	}
</code>
ではピカチュウ連想配列をforで走査してみましょう♪
<code class="javascript">
	let pika = {
		no: 25,
		name: "ピカチュウ",
		type1: "でんき",
		type2: null
	};
	for (let k in pika) {
		console.log(k + "は" + pika[k]);
	}
</code>
<img class="no-max" src="../pics/連想配列の走査(for).gif" alt="連想配列の走査" />
<h3>forEach</h3>
配列の走査と異なります。
<code class="javascript">
	Object.keys(連想配列).forEach(k => {
		//キーは「k」で取得
		//バリューは「連想配列[k]」で取得
	});
</code>
ではピカチュウ連想配列をforで走査してみましょう♪
<code class="javascript">
	let pika = {
		no: 25,
		name: "ピカチュウ",
		type1: "でんき",
		type2: null
	};
	Object.keys(pika).forEach(k => {
		console.log(k + "は" + pika[k]);
	});
</code>
<img class="no-max" src="../pics/連想配列の走査(forEach).gif" alt="連想配列の走査" />
<div class="separator"></div>
通常はforを用いればok!です。
<h2>オブジェクト</h2>
では、本題です。<br />オブジェクトです。<br />正確には先ほど説明した連想配列はjavascriptではオブジェクトと呼ばれます。<br />あの!!オブジェクトです。<br />先ほどの説明ではあくまでも複数のプロパティを持つ集合体でしたのでオブジェクトっぽくなかったんですよね、、、<br />他のプログラミング言語ではオブジェクトと区別して連想配列なんて呼びますが、、、<br />では、オブジェクトに関数を含めてtheオブジェクトを完成させましょう♪<br />オブジェクトに関数を加えるには以下のように書きます。
<code class="javascript">
	変数 = {
		キー: プロパティ,
		キー: プロパティ,
		キー: function() {
			//関数内の処理
		},
		キー: function() {
			//関数内の処理
		}
	};
</code>
オブジェクト内の関数は特にメソッドと呼ぶことが多いので、これ以降は正確にメソッドと書きます。<br />同一オブジェクト内のプロパティにアクセスするには「this.キー」と書きます。
<div class="separator"></div>
では長方形オブジェクトを作成してみましょう♪<br />プロパティは高さと幅で、メソッドは面積を取得するget_areaと対角線の長さを取得するget_diagonalです。
<code class="javascript">
	let rect1 = {
		width: 30,
		height: 40,
		get_area: function() {
			return this.width * this.height;
		},
		get_diagonal: function() {
			return Math.sqrt(this.width ** 2 + this.height ** 2);
		}
	};
	console.log(rect1.get_area());
	console.log(rect1.get_diagonal());
</code>
<img class="no-max" src="../pics/object-メソッド.gif" alt="メソッド" />
<div class="separator"></div>
メソッドに引数を渡すこともできます。<br />例えば以下のコードではcryメソッドの引数で指定した回数だけ猫が泣きます。
<code class="javascript">
	let cat = {
		voice: "キャンキャン!!",
		cry: function(n) {
			for (let i = 0; i < n; i++) {
				console.log(this.voice);
			}
		}
	};
	cat.cry(5);
</code>
<img class="no-max" src="../pics/メソッド引数.gif" alt="メソッドの引数" />
<h2>関数からのオブジェクトの作成</h2>
先ほどは予め「30×40」の長方形を直接作成しましたけど、実際はオブジェクトのプロパティはその場で決まることが多いです。<br />ということで、オブジェクトを作成したそれを返す関数を作成しましょう♪<br />関数の戻り値に作成したオブジェクトを設定すればok!です。<br />メソッドを少し変更して、戻り値を返すのではなくデータをそのままコンソール画面に表示しています。
<code class="javascript">
	function make_rect(w, h) {
		return {
			width: w,
			height: h,
			get_area: function() {
				console.log(this.width * this.height);
			},
			get_diagonal: function() {
				console.log(Math.sqrt(this.width ** 2 + this.height ** 2));
			}
		};
	}
	let rect1 = make_rect(50, 70); //「50×70」の長方形オブジェクトを作成
	let rect2 = make_rect(20, 30); //「20×30」の長方形オブジェクトを作成
	rect1.get_area();
	rect2.get_diagnal();
</code>
Math.sqrt(n)はnの平方根を求めるメソッドです。
<img class="no-max" src="../pics/関数によるオブジェクトの作成.gif" alt="オブジェクト" />
<h2>破壊的・非破壊的メソッド</h2>
メソッドはそのプロパティを変更するかどうかで破壊的メソッドか非破壊的メソッドに分類できます。
<h3>破壊的メソッド</h3>
メソッドが同一オブジェクトのプロパティを直接変更します。<br />例えば以下のメソッドが破壊的メソッドに該当します。
<code class="javacript">
	let obj = {
		count: 10,
		add1: function() {
			this.count++;
		}
	};
</code>
add1メソッドを実行するとプロパティ内のcountプロパティそのものが変更されます。
<code class="javascript">
	let obj = {
		count: 10,
		add1: function() {
			this.count++;
		},
		get_count: function() {
			console.log(this.count);
		}
	};
	for (let i = 0; i < 10; i++) {
		obj.add1();
	}
	obj.get_count();
</code>
<img class="no-max" src="../pics/破壊的メソッド.gif" alt="破壊的メソッド" />
<h3>非破壊的メソッド</h3>
オブジェクトのプロパティを加工したものを戻り値として返却します。<br />この方法は元のオブジェクトのデータは変更しません。<br />例えば、以下のメソッドが該当します。
<code class="javascript">
	let obj = {
		x: 5,
		y: 6,
		z: 7,
		add_xy: function() {
			return this.x + this.y;
		},
		add_all: function() {
			return this.x + this.y + this.z;
		}
	};
	console.log(obj.add_xy);
	console.log(obj.add_all);
</code>
<img class="no-max" src="../pics/非破壊的メソッド.gif" alt="非破壊的メソッド" />
<?php footer(); ?>