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
<h2>時間の取得</h2>
コンピュータと言えばやっぱり、時間の処理ですよね♪<br />違いますかね、、、<br />現在時刻を取得するにはDateオブジェクトを使用します。
<code class="javascript">
	let now = new Date();
</code>
Dateオブジェクトから以下で紹介するメソッドを使用して年・月・日・時間・分・秒・etc...を取得します。
<div class="scroll-600w">
	<table>
		<caption>Dateオブジェクト</caption>
		<tbody>
			<tr>
				<th>getFullYear</th>
				<td>年を取得します。</td>
			</tr>
			<tr>
				<th>getMonth</th>
				<td>月を取得します。<br />一月が「0」、二月が「1」、三月が「2」、、、となります。</td>
			</tr>
			<tr>
				<th>getDate</th>
				<td>日を取得します。</td>
			</tr>
			<tr>
				<th>getDay</th>
				<td>曜日を取得します。<br />日曜日が「0」、月曜日が「1」、火曜日が「2」、、、となります。</td>
			</tr>
			<tr>
				<th>getHours</th>
				<td>時間を取得します。</td>
			</tr>
			<tr>
				<th>getMinutes</th>
				<td>分を取得します。</td>
			</tr>
			<tr>
				<th>getSeconds</th>
				<td>秒を取得します。</td>
			</tr>
			<tr>
				<th>getMilliseconds</th>
				<td>ミリ秒を取得します。<br />(0 ～ 999)</td>
			</tr>
			<tr>
				<th>getTime</th>
				<td>UNIX時間を取得します。<br />UNIX時間とはコンピュータ界の時間で、1970年1月1日0時0分0秒からのミリ秒単位の経過時間です。</td>
			</tr>
			<tr>
				<th>setFullYear</th>
				<td>年を設定します。</td>
			</tr>
			<tr>
				<th>setMonth</th>
				<td>月を設定します。<br />一月が「0」、二月が「1」、三月が「2」、、、となります。</td>
			</tr>
			<tr>
				<th>setDate</th>
				<td>日を設定します。</td>
			</tr>
			<tr>
				<th>setDay</th>
				<td>曜日を設定します。<br />日曜日が「0」、月曜日が「1」、火曜日が「2」、、、となります。</td>
			</tr>
			<tr>
				<th>setHours</th>
				<td>時間を設定します。</td>
			</tr>
			<tr>
				<th>setMinutes</th>
				<td>分を設定します。</td>
			</tr>
			<tr>
				<th>setSeconds</th>
				<td>秒を設定します。</td>
			</tr>
			<tr>
				<th>setMilliseconds</th>
				<td>ミリ秒を設定します。<br />(0 ～ 999)</td>
			</tr>
			<tr>
				<th>setTime</th>
				<td>UNIX時間を設定します。</td>
			</tr>
		</tbody>
	</table>
</div>
<p class="r">下半分のset〇〇〇はスルーしてok!です。</p>
具体的には以下のように記述します。
<code class="javascript">
	var now = new Date();

	var y = now.getFullYear();
	var m = now.getMonth();
	var d = now.getDate();
	var h = now.getHours();
	var mm = now.getMinutes();
	var s = now.getSeconds();
</code>
月は「0」から始まる数字を返すため、この段階で「1」を加算してもok!です。
<code class="javascript">
	var now = new Date();

	var y = now.getFullYear();
	var m = now.getMonth();
	var d = now.getDate();
	var h = now.getHours();
	var mm = now.getMinutes();
	var s = now.getSeconds();

	console.log(`${y}年${m + 1}月${d}日 ${h}時${mm}分${s}秒♪`);
</code>
<img class="no-max" src="../pics/Date.gif" alt="Dateオブジェクト" />
<h2>setTimeout</h2>
何秒後に指定した関数を実行します。<br />以下のように書きます。
<code class="javascript">
	setTimeout(関数, ミリ秒);
</code>
例えば1秒(1000ミリ秒)後にhello関数を実行するには以下のように書きます。
<code class="javascript">
	function hello() {
		window.alert("hello!!");
	}
	setTimeout(hello, 1000);
</code>
<img class="no-max" src="../pics/setTimeout.gif" alt="setTimeout" />
少し難しいんですけど、javascriptは他の言語と異なり非同期で実行されるため、時間がかかる処理は一旦飛ばして後で実行します。<br />例えば以下のコードを見てください。
<code class="javascript">
	console.log(1);
	setTimeout(() => {console.log(3)}, 1000);
	console.log(3);
</code>
<img class="no-max" src="../pics/setTimeout-非同期.gif" alt="setTimeout" />
「1」「2」「3」と順番に実行されません。<br />javascriptは非同期であるため、時間がかかる処理は一旦スキップして無限ループをします。<br />そのループの中で実際に1秒以上経過していたらスキップした処理を実行します。
<img src="../pics/非同期.png" alt="非同期処理" />
言い換えれば、setTimeoutで指定する秒数ピッタリに実行されるとは限りません。<br />ループ一周に時間が多くかかった場合は指定した時間を過ぎて実行されることもあります。<br /><br />どうしても順番に実行したい場合はsetTimeoutを連鎖させる必要があります。
<code class="javascript">
	setTimeout(() => {
		console.log(1);
		setTimeout(() => {
			console.log(2);
			setTimeout(() => {
				console.log(3);
				setTimeout(() => {
					console.log(4);
					setTimeout(() => {
						console.log(5);
					}, 1000);
				}, 1000);
			}, 1000);
		}, 1000);
	}, 1000);
</code>
汚いコードですね、、、<br />こういった、引数に渡す関数を連鎖させてとんでもないことになることコールバック地獄と呼びます。<br />Promiseオブジェクトを使用すれば綺麗に書けますが、入門で扱う内容ではないのでここでは省略します。
<h2>setInterval</h2>
一定間隔ごとに処理を繰り返し、ある条件を満たしたらこれを中断します。<br />以下のように書きます。
<code class="javascript">
	const intv = setInterval(() => {
		//繰り返す処理...
		if (条件式) {
			clearInterval(intv);
		}
	}, 時間);
</code>
では1秒にごとに経過時間を表示して、10秒数え終わったら「Finish!!」って表示しましょう♪
<code class="javascript">
	let i = 0;
	const intv = setInterval(() => {
		i++;
		console.log(`${秒経過}`);
		if (i === 10) {
			clearInterval(intv);
			console.log("Finish!!");
		}
	}, 1000);
</code>
<img class="no-max" src="../pics/setInterval.gif" alt="setInterval" />
<div id="incode-timer_div">
	<div id="incode-timer_clock_body">
		<div id="incode-timer_clock_line"></div>
	</div>
</div>
<script type="text/javascript">
	(function() {
		const l = document.getElementById("incode-timer_clock_line");
		let i = 0;
		setInterval(() => {
			i++;
			l.style.transform = `rotate(${i % 360}deg)`;
		}, 1000);
	})();
</script>
<?php footer(); ?>