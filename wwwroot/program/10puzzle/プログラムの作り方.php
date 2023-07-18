<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-24",
	"updated" => "2021-12-07",
);
head($obj);
?>
<h2>構成</h2>
4つの引数から10を作る演算を算出するプログラムは以下のように作りました。
<p class="r">あくまでのkokoのやり方であって、これ以外にも方法はあります。</p>
<ol>
	<li>4つの数字の取得</li>
	<li>4つの配列の全ての組み合わせの算出</li>
	<li>4つの演算子から3つの組み合わせの算出</li>
	<li>4つの数字と3つ演算子をミックス</li>
	<li>文字列から実際に演算</li>
</ol>
<br />
以下でひとつずつ説明していきますが、あくまでも機能だけの説明だけします。
<p class="r">それ以外のユーザビリティの部分の説明はしません。</p>
<p class="r">kokoは私立文系であるため、数学的な用語の意味には興味がありません。<br />間違って使っているかもです。</p>
<h3>4つの数字の取得</h3>
僕の場合は計算ボタンを押したら4つの数字を取得して演算プログラムを実行するのでまずは、この部分を作成しましょう♪
<code class="js">
	 //idがボタンの要素にクリック時のイベントリスナーを付けてコールバック関数でそのあとの処理を指定します
	document.getElementById("button").addEventListener("click", () => {

		 //inputタグの値を全て取得して、それを整数型に変換して配列に保存します
		let nums_list = Array.from(document.getElementsByTagName("input")).map(e => parseInt(e.value));

		 //4つの数字を引数として渡して全ての組み合わせを戻り値として取得(関数については後述)
		let f = factorial(list);

		 //4つの演算子から3つの並びを重複あり順列で算出(関数については後述)
		let p = dup_permutation(operants, 3)
		 ;
		 //4つの数字と3つの演算子をミックス
		let k = put_between(f, p);

		 //4つの数字と3つ演算子がミックス文字列を実際に計算(関数については後述)
		k.forEach(e => {
			let a = calculate(e);
			if (a === 10) { //10になったらなんらかの処理をする
				console.log(e);
			}
		});
	});
</code>
とりあえず、概要を説明しました。<br />ここでは、kokoが作成した関数を4つ使用しています。<br />「factorial」「dup_permutation」「put_between」「calculate」です。<br /><br />それぞれ、4つの数字を引数として受け取って全ての組み合わせを戻り値として返す、4つの文字列を受け取って3つの並びを重複あり順列で算出して戻り値として返す、n個の配列とn-1個の配列を引数として受け取って、それをミックスして戻り値として返す、文字列として表された演算式を実行する、役割を担っています。
<h3>4つの配列の全ての組み合わせの算出</h3>
受け取った配列の全ての組み合わせを戻り値として返します。<br />ここでは、再帰関数という少し高度な技法を使用します。
<code class="js">
	function factorial (nums) {

		戻り値として返す用の変数を作成
		let answer = []

		if (nums.length === 1) { //受け取った配列の要素の数が1つだけならば、そのままそのデータを返す
			for (let i = 0; i < nums.length; i++) {
				answer[i] = [nums[i]];
			}
		} else { //受け取った配列の要素数が2つ以上ならば、もう一度関数を実行
			for (let i = 0; i < nums.length; i++) { //要素の数だけループ処理を実行
				let parts = nums.slice(0) //要素をコピー(非破壊的な処理をしたい)
				parts.splice(i, 1)[0] //ループの回数(i)の部分の数字を固定し、それ以外を取得
				let row = factorial(parts, nums.length - 1) //固定されていない部分でもう一度関数を実行
				for (let j = 0; j < row.length; j++) {
					answer.push([nums[i]].concat(row[j])); //num.lengthが1になった際にはそれまでのデータ一覧を戻り値用の配列に追加
				}
			}
		}
		return answer;
	}
</code>
<h3>4つの演算子から3つの組み合わせの算出</h3>
数学的に言えば<sub>4</sub>P<sub>3</sub>ですね、きっと。<br />これを実行してくれる関数を作ってみましょう♪<br /><br />ver1では間違って重複ナシにしていました。<br />これだと、「1+2+3+4=10」ができないんです。<br />気づきませんでした。
<code class="js">
	function dup_permutation (nums, k) {

		 //戻り値として返す用の変数を作成
		let answer = [];

		if (k === 1) { //返す値が1つだけならそのままそれを返す
			for (let i = 0; i < nums.length; i++) {
				answer[i] = [nums[i]];
			}
		} else { //返す値が2つ以上あれば、最初の値を固定して残りに関してもう一度関数を実行
			for (let i = 0; i < nums.length; i++) {
				let parts = nums.slice(0); //与えられた数字の配列をコピー(非破壊的に)
				parts.splice(i, 1); //固定する部分を切り捨てる
				let row = dup_permutation(nums, k - 1); //固定しない部分に関してもう一度関数を実行
				for (let j = 0; j < row.length; j++) {
					answer.push([nums[i]].concat(row[j])); //kが1になった際にはそれまでのデータ一覧を戻り値用の配列に追加
				}
			}
		}
		return answer;
	}
</code>
<h3>4つの数字と3つ演算子をミックス</h3>
4つの数字の全並びと4つの演算子から3つを取り出した際の並びをミックスして全ての演算パターンを作りましょう♪<br /><br />関数をひとつにまとめることもできますが、分かりやすさのために2つに分解しています。
<code class="js">
	function put_between(x, y) {

		 //戻り値として返す用の変数を作成
		let answer = [];

		 //外側のループで4つの数字の並びをループさせる
		for (let i = 0; i < x.length; i++) {
			 //内側のループで3つ演算子の並びをループさせる
			for (let j = 0; j < y.length; j++) {
				answer.push(put_between2(x[i], y[j])); //実際に数字と演算子を結合してひとつの文字列化
			}
		}
		return answer;
	}
	function put_between2 (x, y) {

		 //戻り値として返す用の変数を作成
		let answer = new Array;

		 //受け取った数字の数だけループ(4回)
		for (let i = 0; i < x.length; i++) {
			if (i === x.length - 1) {
				answer.push(x[i]); //最後の演算子は不要
			} else {
				answer.push(x[i]);
				answer.push(y[i]);
			}
		}
		return answer.join(""); //配列を文字列化して返す
	}
</code>
<h3>文字列から演算</h3>
では全てのパターンを算出しました。<br />このパターンは文字列型ですので、このままでは計算できません。<br />eval関数を用いて強制的に実行する方法もあるのですが、呼び出し元の権限において実行されることからセキュリティ上好ましくないです。<br />また、実行効率も悪いため推奨されません。<br />ということで、ここではFunctionを使用します。
<code class="js">
	function calculate(arg) {
		return Function(`"use strict";return (` + arg + `)`)();
	}
</code>
なんだかよくわからないと思いますが、これで文字列として表された演算を実行できます。
<div class="separator"></div>
一応完成ですが、これだと重複した演算を省いていないことと、括弧を用いた演算ができません。<br />これの克服方法は少し複雑になるので、とりあえず今回はここまでとします。<br /><br />なんだか複雑ですね、、、<br />なにか不具合があれば、<a href="../../contact/index">問い合わせ</a>から教えてください。
<script charset = "UTF-8" type="text/javascript" src = "../../package/js-modules/koko-code/ver1.js" defer></script>
<?php footer(); ?>